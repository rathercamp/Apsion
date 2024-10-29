<?php include_once "../models/Cita.php";
include_once "../models/BBDD/mysql.php";
include_once "../models/servicios/servicioLogin.php";
include_once "../models/servicios/servicioCitas.php";
include_once "../models/DAO/daoCitas.php";
?>
<link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
/>
<link rel="stylesheet" href="../style/agenda.css" />
<link rel="stylesheet" href="../style/apsion.css" />

<title>Agenda</title>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div id="navDiv">
        <a href="../index.php"
            ><img src="../media/Original.svg" alt="logo-apsion" id="logo"
        /></a>
    </div>
    <?php
        session_start();

        $cita = Cita::fromBody();

        $citas = ServicioCitas::getCitas();
       
    ?>
    
    <h2>Agenda</h2>
    <h3>Listado de citas</h3>
        <?php
            
            if(count($citas) > 0){
                foreach($citas as $cita){
                    if(isset($cita)): ?>
                        <div class="border marginbot">
                            <div class="marginbot">
                                <div class="division">
                                    <span class="contenido"><?php echo "Cita con el Dr. " . $cita->nombre_psicologo; ?></span>
                                    <span class="contenido"><?php echo $cita->fecha_cita; ?></span> 
                                </div>
                                <form class="division" action="delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $cita->fecha_cita;?>">
                                    <input type="submit" name="delete" value="Eliminar cita" class = "contenido2 button-delete">
                                </form>
                                <div class="division">
                                    <span class="cotenido"><?php echo $cita->modalidad; ?></span>
                                </div> 
                            </div>
                        </div>
                    
                    <?php endif;
                }
            }
            else{
                echo "No tienes citas reservadas";
            }
        ?>
    </div>
</body>
</html>