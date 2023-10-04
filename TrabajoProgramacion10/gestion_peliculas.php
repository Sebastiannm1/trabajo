<?php
require_once 'classes/Pelicula.php';

$pelicula = new Pelicula();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Obtener lista de películas
    $peliculas = $pelicula->obtenerPeliculas();
    // Mostrar películas en HTML
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar datos del formulario y agregar película
    $pelicula->agregarPelicula($_POST);
    // Actualizar la lista de películas
    header("Location: gestion_peliculas.php");
    exit();
}
?>
