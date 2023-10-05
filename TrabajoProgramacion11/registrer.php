<?php
require_once('includes/db.php');
session_start();

if (isset($_SESSION["usuario_id"])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password !== $confirm_password) {
        echo "Las contraseñas no coinciden.";
    } else {
        // Verificar si el usuario ya existe en la base de datos
        $sql = "SELECT id FROM usuarios WHERE email = ?";
        $stmt = $database->conexion->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "El usuario ya existe. Por favor, inicia sesión o elige otro correo electrónico.";
        } else {
            // Hash de la contraseña antes de almacenarla en la base de datos
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Insertar el nuevo usuario en la base de datos
            $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
            $stmt = $database->conexion->prepare($sql);
            $stmt->bind_param("sss", $nombre, $email, $hashed_password);

            if ($stmt->execute()) {
                echo "Registro exitoso. <a href='login.php'>Iniciar sesión</a>";
            } else {
                echo "Error al registrar el usuario: " . $stmt->error;
            }
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Registrarse</h1>
        <!-- Resto de la cabecera -->
    </header>

    <main>
        <!-- Formulario para registrar un nuevo usuario -->
        <form action="" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            <br>

            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" required>
            <br>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            <br>

            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" name="confirm_password" required>
            <br>

            <input type="submit" value="Registrar">
        </form>
    </main>

    <footer>
        <p>&copy; 2023 Cartelera de Cine</p>
    </footer>
</body>
</html>
