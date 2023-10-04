<?php
require_once 'classes/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = $_POST["nombre_usuario"];
    $clave = $_POST["clave"];

    $usuario = new Usuario();
    $sesionExitosa = $usuario->iniciarSesion($nombreUsuario, $clave);

    if ($sesionExitosa) {
        header("Location: gestion_peliculas.php");
        exit();
    } else {
        // Manejar error de inicio de sesión
    }
}
?>


