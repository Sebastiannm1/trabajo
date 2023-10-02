<?php
require_once 'Pelicula.php';
require_once 'Cartelera.php';
require_once 'borrar_peliculas.php';

// Crear instancias de películas
$pelicula1 = new Pelicula(1, "Película 1", "Acción", "120 minutos");
$pelicula2 = new Pelicula(2, "Película 2", "Comedia", "95 minutos");
$pelicula3 = new Pelicula(3, "Película 3", "Drama", "110 minutos");

// Crear una instancia de la cartelera
$cartelera = new Cartelera();

// Agregar películas a la cartelera
$cartelera->agregarPelicula($pelicula1);
$cartelera->agregarPelicula($pelicula2);
$cartelera->agregarPelicula($pelicula3);

// Página principal para mostrar y editar películas
include 'templates/header.php';
include 'templates/cartelera.php';
include 'templates/footer.php';

//Para Borrar peliculas
<script>
    function borrarPelicula(id) {
        // Preguntar al usuario si está seguro de borrar la película
        if (confirm("¿Estás seguro de que deseas borrar esta película?")) {
            // Enviar una solicitud para borrar la película en el servidor (puedes usar AJAX)
            // En este ejemplo, simplemente redireccionamos la página después de la confirmación
            window.location.href = 'borrar_pelicula.php?id=' + id;
        }
    }
</script>

?>