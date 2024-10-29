<?php include_once "../models/BBDD/mysql.php"; ?>
<?php include_once "../models/Usuario.php"; ?>
<?php include_once "../models/DAO/daoUsuarios.php"; ?>
<?php include_once "../models/DAO/daoClientes.php"; ?>
<?php include_once "../models/servicios/servicioUsuarios.php"; ?>
<?php include_once "../models/servicios/servicioClientes.php"; ?>
<link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
/>
<link rel="stylesheet" href="../style/form.css" />
<title>Registro</title>

<main class="main-page">
    

    <div id="navDiv">
        <a href="../index.php"
            ><img src="../media/Original.svg" alt="logo-apsion" id="logo"
        /></a>
        <h2 class="main-page_titulo">Registro</h2>
    </div>

    <?php
        $usuario = Usuario::fromBody();
    ?>

    <form class="form" method="POST" action="../includes/registro.php">
        <div class="form_field">
            <label class="form_label" for="tipo">Tipo de usuario</label>
            <select class="form_input" name="tipo" id="tipo" required>
                <option value="CLIE" >Cliente</option>
                <option value="PSIC" hidden>Psicólogo</option>
            </select>
        </div>
        <div class="form_field">
            <label class="form_label" for="nombre">Nombre</label>
            <input class="form_input" type="text" name="nombre" id="nombre" required>

        </div>
        <div class="form_field">
            <label class="form_label" for="apellidos">Apellidos</label>
            <input class="form_input" type="text" name="apellidos" id="apellidos" required>

        </div>
        <div class="form_field">
            <label class="form_label" for="telefono">Telefono</label>
            <input class="form_input" type="text" name="telefono" id="telefono" required>

        </div>
        <div class="form_field">
            <label class="form_label" for="email">Correo electrónico</label>
            <input class="form_input" type="text" name="email" id="email" required>

        </div>
        <div class="form_field">
            <label class="form_label" for="password">Contraseña</label>
            <input class="form_input" type="password" name="password" id="password" required>

        </div>
        <div class="form_field">
            <label class="form_label" for="pass2">Repite la contraseña</label>
            <input class="form_input" type="password" name="pass2" id="pass2" required>
        </div>
        <div class="form_buttons">
            <input class="form_button" type="submit" name="enviar" value="Registrarse">
        </div>
        <?php
            try {
                if (isset($_POST["enviar"])) {
                    if ($_POST["password"] != $_POST["pass2"]) {
                        echo "Las contraseñas no coinciden";
                    } else {
                        //inserta en la tabla de usuarios y la de login
                        ServicioUsuarios::setUsuario($usuario);

                        $idUsua = ServicioUsuarios::getIdUsuario($usuario);

                        if ($idUsua != null) {
                            //NO inserta en la tabla de clientes
                            ServicioClientes::setCliente($usuario, $idUsua);
                        }

                        //Pendiente desarrollo para psicólogos:
                        //campos de psicólogo (número de colegiado, email profesional...) e insertar en la tabla de psicólogos

                        header ("Location:../includes/login.php");
                    }
                }
            } catch (Exception $e) {
                $err_msg = $e->getMessage();
                echo "<script>console.log($err_msg)</script>";
            }
            
        ?>
    </form>
</main>