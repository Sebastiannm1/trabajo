<?php
if (isset($_GET['id'])) {
    require_once 'conexion.php';
    require_once 'pelicula.php';

    $id_pelicula = $_GET['id'];
    $conexion = new Conexion();
    $pelicula = pelicula($conexion->conexion);

    // Realizar la eliminación en la base de datos
    $pelicula->eliminarPelicula($id_pelicula);

    // Redirigir de nuevo a index.php después de eliminar
    header("Location: index.php");
    exit();
}
?>
