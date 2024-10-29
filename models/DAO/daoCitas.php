<?php
    class DaoCitas {
        public function crearCita($cita){
            if ($cita->modalidad == "Presencial"){
                $modalidad = "PR";
            }else{
                $modalidad = "ON";
            }
            $consulta = "INSERT INTO citas (NOM_APE_CITA, EMAIL_CITA, NOMBRE_PSIC_CITA, FECHA_CITA, MODALIDAD_CITA) 
            VALUES (?, ?, ?, ?, ?)";
            MySql::consultaEscritura($consulta, $cita->nombre, $cita->email, $cita->nombre_psicologo, $cita->fecha_cita, $modalidad);
        }

        public function buscarId($cita) {
            $resultado = MySql::consultaLectura("SELECT ID_CITA FROM citas WHERE FECHA_CITA = ?", $cita->fecha_cita);

            return $resultado;
        }

        public function buscarCitas(){
            $resultado = Mysql::consultaLectura("SELECT * FROM citas");

            $retorno = array();
            foreach($resultado as $fila){
                $modalidad = $fila["MODALIDAD_CITA"]=="PR" ? "Presencial" : "On-line";
                $cita = new Cita($fila["NOM_APE_CITA"], $fila["EMAIL_CITA"], $fila["NOMBRE_PSIC_CITA"], $fila["FECHA_CITA"], $modalidad);
                array_push($retorno, $cita);
            }
            return $retorno;
        }

        public function eliminar($id){
            $consulta = "DELETE FROM citas WHERE FECHA_CITA = ?";

            Mysql::consultaEscritura($consulta, $id);
        }
    }
?>