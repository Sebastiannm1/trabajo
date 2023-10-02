<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Llama al método para borrar la película
    $cartelera->borrarPelicula($id);
    
    // Redirecciona de nuevo a la página principal
    header('Location: index.php');
    exit();
}
?>
