<?php
    class DaoUsuarios {
        private function crearUsuario($usuario){
            $nombreApe = $usuario->nombre . " " . $usuario->apellidos;
            $consulta = "INSERT INTO usuarios (TIPO_USUA, NOM_APE_USUA, EMAIL_USUA, TELF_USUA, ACTIVO_USUA, FECHA_REG_USUA, FECHA_ACTU_USUA)
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
            MySql::consultaEscritura($consulta, $usuario->tipo, $nombreApe, $usuario->email, $usuario->telefono, 1, NULL, NULL);
        }

        private function crearLogin($usuario){
            $hashedPass = password_hash($usuario->password, PASSWORD_BCRYPT, ['cost' => 12]);
            
            $consulta = "INSERT INTO login (EMAIL_LOGIN, PASS_LOGIN, ACTIVO_LOGIN, FECHA_REGI_LOGIN, FECHA_ACTU_LOGIN)
                        VALUES (?, ?, ?, ?, ?)";
            MySql::consultaEscritura($consulta, $usuario->email, $hashedPass, 1, NULL, NULL);
        }

        public function crearCliente($usuario, $idUsua){
            $nombreApe = $usuario->nombre . " " . $usuario->apellidos;
            $consulta = "INSERT INTO clientes (ID_USUA_CLIE, NOM_APE_CLIE, EMAIL_CLIE, ULTIMA_CITA_CLIE, ACTIVO_CLIE, FECHA_REGI_CLIE, FECHA_ACTU_CLIE)
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
            MySql::consultaEscritura($consulta, $idUsua, $nombreApe, $usuario->email, NULL, 1, NULL, NULL);
        }

        private function crearPsicologo($usuario){
            $numColegiado = $usuario->numColegiado ? $usuario->numColegiado : 0;
            $emailProf = $usuario->emailProf ? $usuario->emailProf : $usuario->email;
            $nombreApe = $usuario->nombre . " " . $usuario->apellidos;
            $idUsua = MySql::consultaLectura("SELECT ID_USUA FROM usuarios WHERE EMAIL_CLIE = ?", $usuario->email);
            $imagen = NULL;
            $cv = NULL;
            $consulta = "INSERT INTO psicologos (ID_PSIC, ID_USUA_PSIC, NOM_APE_PSIC, NUM_COLEG_PSIC, IMAGEN_PSIC, CV_PSIC, EMAIL_PROF_PSIC, TELF_PROF_PSIC, ACTIVO_PSIC, FECHA_REGI_PSIC, FECHA_ACTU_PSIC)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            MySql::consultaEscritura($consulta, "", $idUsua, $nombreApe, $numColegiado, $imagen, $cv, $emailProf, NULL, 1, NULL, NULL);
        }

        public function crear($usuario) {
            $this->crearUsuario($usuario);
            $this->crearLogin($usuario);

            /*if ($usuario->tipo == "PSIC") {
                $this->crearPsicologo($usuario);
            } else {
                $this->crearCliente($usuario);
            }*/

        }

        public function buscarId($usuario) {
            $resultado = MySql::consultaLectura("SELECT ID_USUA FROM usuarios WHERE EMAIL_USUA = ?", $usuario->email);
            
            if (count($resultado) < 1) {
                return null;
            } else {
                return $resultado;
            }
        }


    }



?>