<?php
require_once 'conexion.php';
require_once 'pelicula.php';

$conexion = new Conexion();
$pelicula = new repositorio($conexion->conexion);

$peliculas = $pelicula->obtenerPeliculas();

// Procesar el formulario de agregar película
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $publico = $_POST['publico'];
    $origen = $_POST['origen'];
    $duracion = $_POST['duracion'];
    $idioma = $_POST['idioma'];
    $director = $_POST['director'];
    $precio = $_POST['precio'];

    $pelicula->agregarPelicula($nombre, $publico, $origen, $duracion, $idioma, $director, $precio);
    
    // Redirigir para evitar el reenvío del formulario al actualizar la página
    header("Location: index.php");
    exit();
}

// Procesar la eliminación de películas
if (isset($_GET['eliminar'])) {
    $idEliminar = $_GET['eliminar'];
    $pelicula->eliminarPelicula($idEliminar);
    
    // Redirigir para actualizar la página después de eliminar la película
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Cine MAX</title>
</head>

<body>
    <div class="cabecera">
        <!-- Contenido de la cabecera -->
        <div class="anchocabecera">
            <div class="imagen-principal">
                <img class="logo" src="">
            </div>
            <div class="buscador">
                <select>
                    <option>Selecciona tu cine</option>
                    <option>Rosario Sur</option>
                    <option>Rosario Norte</option>
                    <option>Rosario Centro</option>
                </select>
                <input type="button" value="Ver cartelera" onclick="before">
            </div>
            <div class="IniciarSesion">
                <a href="entrar.php" type="button" class="boton">Iniciar sesión</a>
            </div>
        </div>
    </div>

    <nav class="navegador">
        <!-- Contenido del navegador -->
        <div class="anchonavegador">
            <ul>
                <li>
                    <a href="">Inicio</a>
                </li>
                <li>
                    <a href="">Cartelera</a>
                </li>
                <li>
                    <a href="">Estrenos</a>
                </li>
                <li>
                    <a href="">Próximos estrenos</a>
                </li>
                <li>
                    <a href="">Eventos/Fiestas</a>
                </li>
                <li>
                    <a href="">Galería</a>
                </li>
            </ul>
            <ul>

            </ul>
        </div>
        
    </nav>

    <div class="imagen-slider">
        <!-- Contenido del slider de imágenes -->
        <div id="banners">
            <img class="imagenes-banners" src="img/banners/.png">


        </div>
        <div class="botonesSigAnt">
            <button class="b-anterior" onclick="beforeImage()">-</button>
            <button class="b-siguiente" onclick="nextImage()">+</button>
        </div>
        <script>
            var slider_content = document.getElementById('banners');

            var image = ["tortugas", "venecia", "oppenheimer", "hablame", "barbie", "tortugas"];

            var i = image.length;

            function nextImage() {
                if (i < image.length) {
                    i = i + 1;
                    if (i == image.length) {
                        i = 1;
                    }
                } else {
                    i = 1;
                }
                slider_content.innerHTML = "<img class=\"imagenes-banners\" src=\"img/banners/" + image[i] + ".png\">";
            }

            function beforeImage() {
                if (i < image.length + 1 && i > 1) {
                    i = i - 1;
                } else {
                    i = image.length;
                }
                slider_content.innerHTML = "<img class=\"imagenes-banners\" src=img/banners/" + image[i - 1] + ".png>";
            }
        </script>
    </div>

    <div class="peliculas">
    <h2>Películas</h2>
    <div class="listapeliculas">
        <?php
        $contador = 0;
        foreach ($peliculas as $pelicula) {
            if ($contador % 3 == 0) {
                echo '<div class="grupo-peliculas">';
            }
        ?>
            <div class="pelicula-info">
                <!-- Contenido de la película -->
                <h3><?php echo $pelicula['nombre']; ?></h3>
                <p>Trama: <?php echo $pelicula['trama']; ?></p>
                <p>Clasificación: <?php echo $pelicula['publico']; ?></p>
                <p>Origen: <?php echo $pelicula['origen']; ?></p>
                <p>Duración: <?php echo $pelicula['duracion']; ?> min</p>
                <p>Idioma: <?php echo $pelicula['idioma']; ?></p>
                <p>Director: <?php echo $pelicula['director']; ?></p>
                <p>Precio: $<?php echo $pelicula['precio']; ?></p>
                <a href="editar_pelicula.php?id=<?php echo $pelicula['id_pelicula']; ?>">Editar</a>
                <a href="index.php?eliminar=<?php echo $pelicula['id_pelicula']; ?>">Eliminar</a>
            </div>
        <?php
            if ($contador % 3 == 2 || $contador == count($peliculas) - 1) {
                echo '</div>';
            }
            $contador++;
        }
        ?>
    </div>
</div>

<div class="agregar-pelicula">
    <!-- Contenido del formulario de agregar película -->
    <form action="index.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="publico">Clasificación:</label>
        <input type="text" id="publico" name="publico" required><br>
        <label for="origen">Origen:</label>
        <input type="text" id="origen" name="origen" required><br>
        <label for="duracion">Duración (minutos):</label>
        <input type="number" id="duracion" name="duracion" required><br>
        <label for="idioma">Idioma:</label>
        <input type="text" id="idioma" name="idioma" required><br>
        <label for="director">Director:</label>
        <input type="text" id="director" name="director" required><br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required><br>
        <button type="submit">Agregar Película</button>
    </form>         
</div>

<div class="pie">
    <!-- Contenido del pie de página -->
    <div class="pie-padre">
            <div class="pie-izquierda">
                <h2>Cine MAX</h2> </div>
            <div class="pie-centro"></div>
            <div class="pie-derecha">
                <h3>Siguenos</h3>
                <ul>
                    <li>
                        <a href=""><img src="img/icons/Facebook_16px.png"> Facebook</a>
                    </li>
                    <li>
                        <a href=""><img src="img/icons/Instagram_16px.png"> Instagram</a>
                    </li>
                    <li>
                        <a href=""><img src="img/icons/Twitter_16px.png"> Twitter</a>
                    </li>
                </ul>



            </div>
        </div>
</div>
    <script src="funciones.js"></script>
</body>
</html>
