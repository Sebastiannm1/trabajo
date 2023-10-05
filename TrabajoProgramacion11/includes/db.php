<?php
class Database {
    private $host = "localhost"; // Nombre del servidor de la base de datos
    private $usuario = "tu_usuario_db"; // Nombre de usuario de la base de datos
    private $contrasena = "tu_contraseña_db"; // Contraseña de la base de datos
    private $nombre_db = "cartelera_cine"; // Nombre de la base de datos
    public $conexion;

    // Método para conectar a la base de datos
    public function conectar() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->nombre_db);

        if ($this->conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conexion->connect_error);
        }
    }

    // Método para desconectar de la base de datos
    public function desconectar() {
        $this->conexion->close();
    }
}

// Crear una instancia de la clase Database para utilizarla en otros archivos
$database = new Database();
$database->conectar();
?>
