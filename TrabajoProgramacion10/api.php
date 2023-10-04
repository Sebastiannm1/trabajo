<?php
require_once 'classes/Pelicula.php';

$pelicula = new Pelicula();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $peliculas = $pelicula->obtenerPeliculas();
    echo json_encode($peliculas);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pelicula->agregarPelicula($_POST);
}
?>

