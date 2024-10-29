<?php include_once "../models/Usuario.php";
include_once "../models/BBDD/mysql.php";
include_once "../models/servicios/servicioLogin.php";
?>
<link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
/>
<link rel="stylesheet" href="../style/form.css" />
<title>Login</title>

<main class="main-page">
    <div id="navDiv">
        <a href="../index.php"
            ><img src="../media/Original.svg" alt="logo-apsion" id="logo"
        /></a>
        <h2 class="main-page_titulo">Identificación</h2>
    </div>
    <form class="form" method="POST" action="../includes/login.php">
        <div class="form_field">
            <label class="form_label" for="email">Correo electrónico</label>
            <input class="form_input" type="text" name="email" id="email">

        </div>
        <div class="form_field">
            <label class="form_label" for="password">Contraseña</label>
            <input class="form_input" type="password" name="password" id="password">

        </div>
        <div class="form_buttons">
            <input class="form_button" type="submit" name="enviar" value="Identificarse">
        </div>
        <?php
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
                       echo "Usuario y/o contraseña erróneos";
                    }
                }
    
            } catch (Exception $e) {
                $err_msg = $e->getMessage();
                echo "<script>console.log($err_msg)</script>";
            } finally {
                require_once "../includes/login.php";
            }
            
        ?>
    </form>
</main>