<?php
require_once('includes/db.php');

// Ahora puedes utilizar $database para realizar consultas a la base de datos
$sql = "SELECT * FROM peliculas";
$resultado = $database->conexion->query($sql);

if ($resultado) {
    // Procesar los resultados y mostrar la cartelera de películas
} else {
    echo "Error al consultar la base de datos: " . $database->conexion->error;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartelera de Cine</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Tu contenido HTML aquí -->
    <header>
        <h1>Cartelera de Cine</h1>
        <!-- Resto de la cabecera -->
    </header>

    <main>
        <h2>Bienvenido, <?php echo $_SESSION["nombre"]; ?></h2>
        <!-- Mostrar la cartelera de películas -->
        <div class="cartelera">
            <!-- Aquí puedes mostrar las películas de la cartelera -->
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Cartelera de Cine</p>
    </footer>
</body>
</html>
