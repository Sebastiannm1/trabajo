<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Bienvenido al sistema</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <link href="css/styleentrar.css" rel="stylesheet" type="text/css">
    </head>
    <body class="container">
      <div class="jumbotron text-center">
      <h1>Administrador cine MAX</h1>
      </div>    
      <div class="text-center">
        <h3>Login de usuario</h3>
        <?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

<form action="login.php" method="post">
    <input name="usuario" class="form-control form-control-lg" placeholder="Usuario"><br>
    <input name="clave" type="password" class="form-control form-control-lg" placeholder="Contraseña"><br>
    <input type="submit" value="Ingresar" class="btn btn-primary">
    
    <?php
    if ($mostrarBotonPerfil) {
        echo '<div class="perfil" style="float: right; margin-top: 10px;">
                  <button id="btn-profile" onclick="toggleDropdown()">
                      <i class="bi bi-file-person"></i>
                  </button>
                  <div id="profile-dropdown" class="dropdown-content">
                      <p class="dropdown-title">Cerrar sesión</p>
                      <a href="logout.php">Cerrar</a>
                      <a href="#" onclick="closeDropdown()">Cancelar</a>
                  </div>
              </div>';
    }
    ?>
</form>