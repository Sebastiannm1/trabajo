<?php
require_once 'conexion.php';
require_once 'pelicula.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conexion = new Conexion();
    $pelicula = new pelicula($conexion->obtenerConexion());

    $id_pelicula = $_POST['id_pelicula'];
    $nombre = $_POST['nombre'];
    $trama = $_POST['trama'];
    $publico = $_POST['publico'];
    $origen = $_POST['origen'];
    $duracion = $_POST['duracion'];
    $idioma = $_POST['idioma'];
    $director = $_POST['director'];
    $precio = $_POST['precio'];

    $pelicula->editarPelicula($id_pelicula, $nombre, $trama, $publico, $origen, $duracion, $idioma, $director, $precio);

    // Redirigir a la página de índice después de guardar los cambios.
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id_pelicula = $_GET['id'];
    $conexion = new Conexion();
    $pelicula = new repositorio($conexion->obtenerConexion());

    $datos_pelicula = $pelicula->obtenerPeliculaPorId($id_pelicula);

    if (!$datos_pelicula) {
        die("La película no existe.");
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Película</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Película</h1>
    <form method="post" action="editar_pelicula.php">
        <input type="hidden" name="id_pelicula" value="<?php echo $datos_pelicula['id_pelicula']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $datos_pelicula['nombre']; ?>" required><br>
        <label for="trama">Trama:</label>
        <textarea id="trama" name="trama" required><?php echo $datos_pelicula['trama']; ?></textarea><br>
        <label for="publico">Clasificación:</label>
        <input type="text" id="publico" name="publico" value="<?php echo $datos_pelicula['publico']; ?>" required><br>
        <label for="origen">Origen:</label>
        <input type="text" id="origen" name="origen" value="<?php echo $datos_pelicula['origen']; ?>" required><br>
        <label for="duracion">Duración (minutos):</label>
        <input type="number" id="duracion" name="duracion" value="<?php echo $datos_pelicula['duracion']; ?>" required><br>
        <label for="idioma">Idioma:</label>
        <input type="text" id="idioma" name="idioma" value="<?php echo $datos_pelicula['idioma']; ?>" required><br>
        <label for="director">Director:</label>
        <input type="text" id="director" name="director" value="<?php echo $datos_pelicula['director']; ?>" required><br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" value="<?php echo $datos_pelicula['precio']; ?>" required><br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
