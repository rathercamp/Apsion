<?php
include_once "../models/Cita.php";
include_once "../models/BBDD/mysql.php";
include_once "../models/servicios/servicioLogin.php";
include_once "../models/servicios/servicioCitas.php";
include_once "../models/DAO/daoCitas.php";
include_once "agenda.php";

if (isset($_POST["delete"])){
    $id = $_POST["id"];
    $query = ServicioCitas::deleteCita($id);
    
    echo '<script>alert("Cita eliminada")</script>';
    header("location:agenda.php");
}
?>