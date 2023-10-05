<?php
require_once('includes/db.php');
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

// Código PHP para mostrar la lista de películas desde la base de datos
$sql = "SELECT * FROM peliculas";
$resultado = $mysqli->query($sql);
if ($resultado) {
    // Procesar los resultados y mostrar la lista de películas
} else {
    echo "Error al consultar la base de datos: " . $mysqli->error;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Tu contenido HTML aquí -->
    <header>
        <h1>Películas</h1>
        <!-- Resto de la cabecera -->
    </header>

    <main>
        <!-- Lista de películas desde la base de datos -->
        <div class="lista-peliculas">
            <!-- Aquí puedes mostrar la lista de películas -->
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Cartelera de Cine</p>
    </footer>
</body>
</html>
