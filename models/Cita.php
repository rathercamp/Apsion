<?php
class Cita{
    public string $nombre;
    public string $email;
    public string $nombre_psicologo;
    public string $fecha_cita;
    public string $modalidad;

    function __construct(string $nombre, string $email, string $nombre_psicologo, string $fecha_cita, $modalidad){
        $this->nombre = $nombre;
        $this->email = $email;
        $this->nombre_psicologo = $nombre_psicologo;
        $this->fecha_cita = $fecha_cita;
        $this->modalidad = $modalidad;
    }

    public static function fromBody(){
        if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["nombre_psicologo"]) && isset($_POST["fecha_cita"]) && isset($_POST["modalidad"])){
            return new Cita($_POST["nombre"], $_POST["email"], $_POST["nombre_psicologo"], $_POST["fecha_cita"], $_POST["modalidad"]);
        }
    }
} 
?>