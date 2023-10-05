<?php
require_once('includes/db.php');
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Código PHP para editar películas en la base de datos
    // Obtener datos de la película a editar y realizar la actualización
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Película</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Tu contenido HTML aquí -->
    <header>
        <h1>Editar Película</h1>
        <!-- Resto de la cabecera -->
    </header>

    <main>
        <!-- Formulario para editar una película -->
        <form action="" method="POST">
            <!-- Campos del formulario -->
        </form>
    </main>

    <footer>
        <p>&copy; 2023 Cartelera de Cine</p>
    </footer>
</body>
</html>
