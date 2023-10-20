<?php
session_start();
session_destroy();

// Redirige al login u otra página según tu necesidad
header('Location: entrar.php?mensaje=Sesión cerrada con éxito');
exit();
?>
