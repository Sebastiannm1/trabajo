<?php
// Retomamos la sesión iniciada, y la destruimos:
session_start();
session_destroy();

// Redirigimos al login.
header('Location: entrar.php?mensaje=Sesión cerrada con éxito');
