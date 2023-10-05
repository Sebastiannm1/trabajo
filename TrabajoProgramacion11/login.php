<?php
require_once('includes/db.php');
session_start();

if (isset($_SESSION["usuario_id"])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Código PHP para el inicio de sesión
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validar credenciales y redirigir al usuario
    $sql = "SELECT id, nombre, password FROM usuarios WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($usuario_id, $nombre, $hash_password);
        $stmt->fetch();

        if (password_verify($password, $hash_password)) {
            $_SESSION["usuario_id"] = $usuario_id;
            $_SESSION["nombre"] = $nombre;
            header("Location: index.php");
            exit;
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Tu contenido HTML aquí -->
    <header>
        <h1>Iniciar Sesión</h1>
        <!-- Resto de la cabecera -->
    </header>

    <main>
        <!-- Formulario de inicio de sesión -->
        <form action="" method="POST">
            <!-- Campos del formulario -->
        </form>
    </main>

    <footer>
        <p>&copy; 2023 Cartelera de Cine</p>
    </footer>
</body>
</html>
