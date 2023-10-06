<?php
class Conexion {
    private $host = 'localhost';
    private $usuario = 'facundo';
    private $clave = 'falbano.106';
    private $nombreBaseDatos = 'cine';

    public $conexion;

    public function __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave, $this->nombreBaseDatos);
        if ($this->conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conexion->connect_error);
        }
    }

    public function obtenerConexion() {
        return $this->conexion;
    }
}
?>
