<?php
require_once 'classes/Pelicula.php';
require_once 'classes/Cartelera.php';

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
?>
