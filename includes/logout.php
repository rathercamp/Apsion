<?php
    include "../controllers/loginController.php";

    $login = new LoginController();
    $test = $login->cerrar();
?>