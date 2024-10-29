<?php
    class DaoClientes {

        public function crear($usuario, $idUsua){
            $nombreApe = $usuario->nombre . " " . $usuario->apellidos;
            $email = $usuario->email;
            $consulta = "INSERT INTO clientes (ID_CLIE, ID_USUA_CLIE, NOM_APE_CLIE, EMAIL_CLIE, ULTIMA_CITA_CLIE, ACTIVO_CLIE, FECHA_REGI_CLIE, FECHA_ACTU_CLIE)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            MySql::consultaEscritura($consulta, "", $idUsua, $nombreApe, $email, NULL, 1, NULL, NULL);
        }


    }



?>