<?php
include_once "../models/BBDD/mysql.php";
include "../includes/login.php";
include_once "../models/servicios/servicioLogin.php";


class LoginController {

    function __construct() {
    }
    function index() {
        try {
            session_start();
            if (isset($_POST["enviar"])) {
                $email = $_POST["email"];
                $pass = $_POST["password"];

                if (ServicioLogin::validarUserPass($email, $pass)) {
                    $_SESSION["autenticado"] = true;
                    $_SESSION["nombre"] = $email;

                    header("Location:../index.php");
                    exit();
                } else {
                   echo "Identificación no válida.";
                }
            }

        } catch (Exception $e) {
            $err_msg = $e->getMessage();
            echo "<script>console.log($err_msg)</script>";
        } finally {
            require_once "../includes/login.php";
        }
    }

    function cerrar() {
        session_destroy();
        header("location:../index.php");
    }
}
$login = new LoginController();
$test = $login->index();
?>