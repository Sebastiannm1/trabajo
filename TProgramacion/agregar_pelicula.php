<?php
require_once 'conexion.php';s
require_once 'pelicula.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conexion = new Conexion();
    $pelicula = pelicula($conexion->conexion);

    $nombre = $_POST['nombre'];
    $publico = $_POST['publico'];
    $origen = $_POST['origen'];
    $duracion = $_POST['duracion'];
    $idioma = $_POST['idioma'];
    $director = $_POST['director'];
    $precio = $_POST['precio'];

    $pelicula->agregarPelicula($nombre, $publico, $origen, $duracion, $idioma, $director, $precio);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Película</title>
    <!-- Agrega aquí tus enlaces a hojas de estilo CSS si es necesario -->
</head>
<body>
    <h1>Agregar Película</h1>
    <form method="post" action="agregar_pelicula.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="publico">Clasificación:</label>
        <input type="text" id="publico" name="publico" required><br>

        <label for="origen">Origen:</label>
        <input type="text" id="origen" name="origen" required><br>

        <label for="duracion">Duración (minutos):</label>
        <input type="number" id="duracion" name="duracion" required><br>

        <label for="idioma">Idioma:</label>
        <input type="text" id="idioma" name="idioma" required><br>

        <label for="director">Director:</label>
        <input type="text" id="director" name="director" required><br>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required><br>

        <button type="submit">Agregar Película</button>
    </form>
</body>
</html>
