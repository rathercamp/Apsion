<?php include_once "models/BBDD/mysql.php"; ?>
<?php include_once "models/Cita.php"; ?>
<?php include_once "models/DAO/daoCitas.php"; ?>
<?php include_once "models/servicios/servicioCitas.php"; ?>

<?php
  $cita = Cita::fromBody();
?>

<div id="pedirCita" class="apsion-layout-reserve">
    <div class="apsion-container-reserve">
      <div class="apsion-row-reserve">
        <div class="apsion-col-title">
          <img
            src="media/fixedwidthfixedheight2552-1i7-200h.png"
            alt="line"
            class="apsion-blueline"
          />
          <p class="apsion-title-reserve h2">Pide cita</p>
          <p class="apsion-paragraph-reserve paragraph">
              Encuentra al profesional que mejor se adapte a tus
              necesidades y reserva una cita.
          </p>
        </div>
        <div class="apsion-col-form">
          <form class="apsion-form" method="POST" action="index.php" id="form">
            <div class="apsion-nombreyapellidos">
                <input class="apsion-textform" placeholder="Nombre y apellidos" type="text" name="nombre" id="formNombre" required>
            </div>
            <div class="apsion-email">
                <input class="apsion-textform" placeholder="E-mail" type="text" name="email" id="formEmail" required>
            </div>
            <div class="apsion-form-2col">
              <label for="jugador" class="apsion-form-col apsion-titleform">Psicólogo</label>
              <select name="nombre_psicologo" id="formPsicologo" class="apsion-form-col apsion-textform">
                  <option>Luther Prosacco</option>
                  <option>Bryant Lindt</option>
                  <option>Melissa Pollich</option>
              </select>
            </div>
            <div class="apsion-form-2col">
              <label for="jugador" class="apsion-form-col apsion-titleform">Fecha</label>
              <input class="apsion-form-col apsion-textform" type="datetime-local" name="fecha_cita" id="formFecha">
            </div>
            <div class="apsion-form-2col">
                <label class="apsion-form-col apsion-titleform">Modalidad</label>
                <select name="modalidad" id="formModalidad" class="apsion-form-col apsion-textform">
                  <option>On-Line</option>
                  <option>Presencial</option>
                </select>
            </div>
              <button class="apsion-button-reserve apsion-titleform" name="reservar" value="reservar">RESERVAR</button>
            </div>
            <?php
            try {
                if (isset($_POST["reservar"])) {
                    if (isset($_SESSION["autenticado"])) {
                      ?><script>alert(<?$_POST["nombre"]?> +", le confirmamos que se ha reservado la cita con " + <?$_POST["nombre_psicologo"]?> + " en el dia " + <?$_POST["fecha_cita"]?> + " en la modalidad " + <?$_POST["modalidad"]?> + ". Recibirá un correo de confirmación en la dirección: " + <?$_POST["email"]?> + ".")</script><?php
                      //inserta en la tabla de citas
                      ServicioCitas::setCita($cita);

                      $idCita = ServicioCitas::getIdCita($cita);
    
                      if ($idCita != null) {
                        //NO inserta en la tabla de citas
                        ServicioCitas::setCita($cita, $idCita);
                      }
                    } else {
                      ?><script>alert("Inicie sesión para reservar cita")</script><?php
                    }
                }
            } catch (Exception $e) {
                $err_msg = $e->getMessage();
                echo "<script>console.log($err_msg)</script>";
            }
          ?>
          </form>
        </div>
    </div>
  </div>
</div>
