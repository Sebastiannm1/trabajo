<?php
require_once 'conexion.php';
require_once 'Repositoriopelicula.php';

$conexion = new Conexion();
$pelicula = new Pelicula($conexion->conexion);

$peliculas = $pelicula->obtenerPeliculas();

// Procesar el formulario de agregar película
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $publico = $_POST['publico'];
    $origen = $_POST['origen'];
    $duracion = $_POST['duracion'];
    $idioma = $_POST['idioma'];
    $director = $_POST['director'];
    $precio = $_POST['precio'];

    $pelicula->agregarPelicula($nombre, $publico, $origen, $duracion, $idioma, $director, $precio);
    
    // Redirigir para evitar el reenvío del formulario al actualizar la página
    header("Location: index.php");
    exit();
}

// Procesar la eliminación de películas
if (isset($_GET['eliminar'])) {
    $idEliminar = $_GET['eliminar'];
    $pelicula->eliminarPelicula($idEliminar);
    
    // Redirigir para actualizar la página después de eliminar la película
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Rosario Cine</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Cartelera de Cine</h1>

    <ul class="peliculas-list">
        <?php foreach ($peliculas as $pelicula) { ?>
            <li class="pelicula-item">
                <div class="pelicula-info">
                    <h2><?php echo $pelicula['nombre']; ?></h2>
                    <p>Trama: <?php echo $pelicula['trama']; ?></p>
                    <p>Clasificación: <?php echo $pelicula['publico']; ?></p>
                    <p>Origen: <?php echo $pelicula['origen']; ?></p>
                    <p>Duración: <?php echo $pelicula['duracion']; ?> minutos</p>
                    <p>Idioma: <?php echo $pelicula['idioma']; ?></p>
                    <p>Director: <?php echo $pelicula['director']; ?></p>
                    <p>Precio: $<?php echo $pelicula['precio']; ?></p>
                    <a href="editar_pelicula.php?id=<?php echo $pelicula['id_pelicula']; ?>">Editar</a>
                    <a href="index.php?eliminar=<?php echo $pelicula['id_pelicula']; ?>">Eliminar</a>
                </div>
            </li>
        <?php } ?>
    </ul>

    <h2>Agregar Película</h2>
    <form action="index.php" method="post">
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
