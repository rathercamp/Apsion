<?php 

    class ServicioUsuarios {

        public static function setUsuario($usuario) {
            $daoUsuarios = new DaoUsuarios();
            $daoUsuarios->crear($usuario);
        }

        public static function getIdUsuario($usuario) {
            $daoUsuarios = new DaoUsuarios();
            $daoUsuarios->buscarId($usuario);
        }
        
    }
?>