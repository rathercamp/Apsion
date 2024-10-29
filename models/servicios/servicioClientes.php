<?php 

    class ServicioClientes {

        public static function setCliente($usuario, $idUsua) {
            $daoClientes = new DaoClientes();
            $daoClientes->crear($usuario, $idUsua);
        }
        
    }
?>