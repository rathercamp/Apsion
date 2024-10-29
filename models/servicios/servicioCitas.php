<?php 

    class ServicioCitas {

        public static function setCita($cita) {
            $daoCitas = new DaoCitas();
            $daoCitas->crearCita($cita);
        }

        public static function getCitas(){
            $resultado = Mysql::consultaLectura("SELECT * FROM citas WHERE EMAIL_CITA = ?", $_SESSION["nombre"]);

            $retorno = array();
            foreach($resultado as $fila){
                $modalidad = $fila["MODALIDAD_CITA"]=="PR" ? "Presencial" : "On-line";
                $id= $fila["ID_CITA"];
                $cita = new Cita($fila["NOM_APE_CITA"], $fila["EMAIL_CITA"], $fila["NOMBRE_PSIC_CITA"], $fila["FECHA_CITA"], $modalidad);
                array_push($retorno, $cita);
            }
            return $retorno;
        }

        public static function getIdCita($cita) {
            $daoCitas = new DaoCitas();
            $daoCitas->buscarId($cita);
        }

        public static function deleteCita($id) {
            $daoCitas = new DaoCitas();
            $daoCitas->eliminar($id);
        }
        
    }
?>