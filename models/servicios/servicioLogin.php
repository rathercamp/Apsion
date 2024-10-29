<?php 

    class ServicioLogin {

        public static function validarUserPass($email, $password) {
            $verify = false;

            $resultado = MySql::consultaLectura("SELECT PASS_LOGIN FROM login WHERE EMAIL_LOGIN = ?", $email);

            if ($resultado) {
                $verify = password_verify($password, $resultado[0]["PASS_LOGIN"]);
            }

            return count($resultado) == 1 && $verify;
        }

    }
?>