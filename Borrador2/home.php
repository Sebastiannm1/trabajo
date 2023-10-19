<?php
require_once 'usuario.php';

// Retomamos la sesión previamente iniciada, y recuperamos el objeto Usuario
// que contiene los datos del usuario autenticado:
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $nomApe = $usuario->getNombreApellido();
} else {
    // Si no hay usuario autenticado, redirigimos al login.
    header('Location: entrar.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Administrador</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body class="container">
      <div class="jumbotron text-center">
      <h1>Administrador Cine MAX</h1>
      </div>
      <div class="text-center">
        <h3>Hola <?php echo $nomApe;?></h3>

        <?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>
        <p><a href="index.php">Inicio</a></p>
        <p><a href="datos_modificar.php">Modificar datos de mi usuario</a></p>
        <p><a href="confirmar_delete.php">Eliminar mi usuario</a></p>
        <!-- Botón desplegable con el ícono "bi bi-file-person" -->
        <div class="icono-desplegable">
            <button class="icono-boton" onclick="mostrarCerrarSesionDropdown()"><i class="bi bi-file-person"></i></button>
            <div id="cerrar-sesion-dropdown-content" class="cerrar-sesion-dropdown-content">
                <a href="logout.php">Cerrar Sesión</a>
                <a href="#" onclick="ocultarCerrarSesionDropdown()">Cancelar</a>
            </div>
        </div>
            
        </div>
    </div>

    </body>
</html>