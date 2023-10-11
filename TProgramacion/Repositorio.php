<?php

require_once 'objpelicula';

class repositorio {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarPelicula($nombre, $publico, $origen, $duracion, $idioma, $director, $precio) {
        $query = "INSERT INTO pelicula (nombre, publico, origen, duracion, idioma, director, precio) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssiisd", $nombre, $publico, $origen, $duracion, $idioma, $director, $precio);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editarPelicula($id_pelicula, $nombre, $publico, $origen, $duracion, $idioma, $director, $precio) {
        $query = "UPDATE pelicula SET nombre = ?, publico = ?, origen = ?, duracion = ?, idioma = ?, director = ?, precio = ? WHERE id_pelicula = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssiisdi", $nombre, $publico, $origen, $duracion, $idioma, $director, $precio, $id_pelicula);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarPelicula($id_pelicula) {
        $query = "DELETE FROM pelicula WHERE id_pelicula = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id_pelicula);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerPeliculas() {
        $query = "SELECT * FROM pelicula";
        $result = $this->conexion->query($query);
        $peliculas = [];

        while ($row = $result->fetch_assoc()) {
            $peliculas[] = $row;
        }

        return $peliculas;
    }
    public function obtenerPeliculaPorId($id) {
        $query = "SELECT * FROM pelicula WHERE id_pelicula = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }
}
?>
