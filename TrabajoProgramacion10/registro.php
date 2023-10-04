<?php
require_once 'classes/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = $_POST["nombre_usuario"];
    $clave = $_POST["clave"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];

    $usuario = new Usuario();
    $registroExitoso = $usuario->registrar($nombreUsuario, $clave, $nombre, $apellido);

    if ($registroExitoso) {
        header("Location: inicio_sesion.php");
        exit();
    } else {
        // Manejar error de registro
    }
}
?>


