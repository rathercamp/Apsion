<?php

class Usuario {
    //public int $id;
    public string $nombre;
    public string $apellidos;
    public string $tipo;
    public string $telefono;
    public string $email;
    public string $password;

    private $error;


    function __construct(string $nombre, string $apellidos, string $tipo, string $telefono, string $email, string $password) {

        /*if (isset($data["id_cliente"])) {
            $this->setId($data["id_cliente"]);
        }*/
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->tipo = $tipo;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->password = $password;
    }

    function setNombre(string $value) {
        $this->nombre = $value;
    }
    function setApellidos(string $value) {
        $this->apellidos = $value;
    }

    function setTipo(string $value) {
        $this->tipo = $value;
    }

    function setTelefono(string $value) {
        $this->telefono = $value;
    }

    function setEmail(string $value) {

        $this->email = $value;
    }

    function setPassword(string $value) {

        $this->password = $value;
    }

    function getNombre() {
        return $this->nombre;
    }
    function getApellidos() {
        return $this->apellidos;
    }
    function getTipo() {
        return $this->tipo;
    }
    function getTelefono() {
        return $this->telefono;
    }
    function getEmail() {
        return $this->email;
    }
    function getPassword() {
        return $this->password;
    }

    public static function fromBody(){
        if (isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["tipo"]) && isset($_POST["telefono"]) && isset($_POST["email"]) && isset($_POST["password"])) {
            return new Usuario($_POST["nombre"], $_POST["apellidos"], $_POST["tipo"], $_POST["telefono"], $_POST["email"], $_POST["password"]);
        }
    }
}