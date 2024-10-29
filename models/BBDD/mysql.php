<?php

class MySql {

    private static function conectarBDD() {
        static $conexion = null;
        $config = parse_ini_file(__DIR__ . "/../../config.ini");

        if (!$conexion) {
            $conexion = new mysqli($config["host"], $config["user"], $config["pass"], $config["bd"]);
        }

        if ($conexion->connect_error) {
            echo("<script>console.log('Conexión fallida');</script>");
            die("Falló la conexión: " . $conexion->connect_error);
        }
        echo("<script>console.log('Conexión realizada correctamente');</script>");

        return $conexion;
    }

    private static function preparar($conexion, $consulta, $parametros) {
        $preConsulta = $conexion -> prepare($consulta);
        if ($parametros) {
            $tipos = "";
            foreach ($parametros as $param) {
                $tipos .= is_integer($param) ? "i" : "s";
            }
            $preConsulta -> bind_param($tipos, ...$parametros);
        }
        return $preConsulta;
    }

    public static function consultaLectura($consulta, ...$parametros) {
        $conexion = self::conectarBDD();

        $return = array();
        $preConsulta = self::preparar($conexion, $consulta, $parametros);
        $preConsulta -> execute();
        $resultado = $preConsulta -> get_result();

        while ($fila = $resultado -> fetch_assoc()) {
            array_push($return, $fila);
        }

        return $return;
    }

    public static function consultaEscritura($consulta, ...$parametros) {
        $conexion = self::conectarBDD();

        $preConsulta = self::preparar($conexion, $consulta, $parametros);
        $preConsulta -> execute();
    }
}

?>