<?php
require_once('includes/db.php');
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Código PHP para eliminar películas de la base de datos
    // Obtener datos de la película a eliminar y realizar la eliminación
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Película</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Tu contenido HTML aquí -->
    <header>
        <h1>Eliminar Película</h1>
        <!-- Resto de la cabecera -->
    </header>

    <main>
        <!-- Formulario para eliminar una película -->
        <form action="" method="POST">
            <!-- Campos del formulario -->
        </form>
    </main>

    <footer>
        <p>&copy; 2023 Cartelera de Cine</p>
    </footer>
</body>
</html>
