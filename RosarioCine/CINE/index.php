<?php
require_once 'pelicula.php';
require_once 'Repositorio.php';

session_start();
$usuario_autenticado = false;

if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $usuario_autenticado = true;
}

$pelicula = new Repositorio();
$peliculas = array();

// Procesar el formulario de filtrado o agregar película
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['categoria'])) {
        $categoriaSeleccionada = $_POST['categoria'];
        $peliculas = ($categoriaSeleccionada == 'todos') ? $pelicula->obtenerPeliculas() : $pelicula->obtenerPeliculasPorCategoria($categoriaSeleccionada);
    }

    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $publico = $_POST['publico'];
        $origen = $_POST['origen'];
        $duracion = $_POST['duracion'];
        $idioma = $_POST['idioma'];
        $director = $_POST['director'];
        $precio = $_POST['precio'];
        $categoria = $_POST['categoria'];

        $pelicula->agregarPelicula($nombre, $publico, $origen, $duracion, $idioma, $director, $precio, $categoria);
    }
}

// Procesar la eliminación de películas
if (isset($_GET['eliminar'])) {
    $idEliminar = $_GET['eliminar'];
    $pelicula->eliminarPelicula($idEliminar);

    // Redirigir para actualizar la página después de eliminar la película
    header("Location: index.php");
    exit();
}

// Obtener todas las películas al cargar la página por primera vez
if (empty($peliculas)) {
    $peliculas = $pelicula->obtenerPeliculas();
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
                <form method="post" action="index.php">
                    <label for="categoria">Categoría:</label>
                    <select id="categoria" name="categoria" required>
                        <option value="todos" selected>Todos</option>
                        <?php
                        $categorias = $pelicula->obtenerCategorias();
                        foreach ($categorias as $categoria) {
                            echo '<option value="' . $categoria['id_categoria'] . '">' . $categoria['nom_categoria'] . '</option>';
                        }
                        ?>
                    </select>
                    <button type="submit">Filtrar</button>
                </form>
            </div>
            <style>
                .IniciarSesion {
                    display: flex;
                    align-items: center;
                }

                .IniciarSesion .boton {
                    margin-left: 10px; 
                }
            </style>

            <div class="IniciarSesion">
                <?php
                if ($usuario_autenticado) {
                    echo '<p>Bienvenido, ' . $usuario->nombre_usuario . '</p>';
                    echo '<a href="logout.php" type="button" class="boton">Cerrar sesión</a>';
                } else {
                    echo '<a href="entrar.php" type="button" class="boton">Iniciar sesión</a>';
                }
                ?>
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

    <div class="listapeliculas">
        <?php
        $contador = 0;
        $repositorio = new Repositorio();

        foreach ($peliculas as $pelicula) {
            if ($contador % 3 == 0) {
                echo '<div class="fila-peliculas">'; // Abre una nueva fila cada tres películas
            }
            ?>

            <div class="pelicula-info">
                <!-- Contenido de la película -->
                <h3><?php echo $pelicula['nombre']; ?></h3>
                <p>Trama: <?php echo $pelicula['trama']; ?></p>
                <p>Categoría: <?php echo $repositorio->obtenerNombreCategoria($pelicula['id_categoria']); ?></p>
                <p>Origen: <?php echo $pelicula['origen']; ?></p>
                <p>Clasificación: <?php echo $pelicula['publico']; ?></p>
                <p>Duración: <?php echo $pelicula['duracion']; ?> minutos</p>
                <p>Idioma: <?php echo $pelicula['idioma']; ?></p>
                <p>Director: <?php echo $pelicula['director']; ?></p>
                <p>Precio: $<?php echo $pelicula['precio']; ?></p>

                <?php
                // Verificar si el usuario está autenticado para mostrar los enlaces de editar y eliminar
                if ($usuario_autenticado) {
                    echo '<a href="editar_pelicula.php?id=' . $pelicula['id_pelicula'] . '">Editar</a>';
                    echo '<a href="index.php?eliminar=' . $pelicula['id_pelicula'] . '">Eliminar</a>';
                }
                ?>
            </div>

            <?php
            if ($contador % 3 == 2 || $contador == count($peliculas) - 1) {
                echo '</div>'; // Cierra la fila actual al final de cada conjunto de tres películas o cuando se alcance la última película.
            }
            $contador++;
        }
        ?>
    </div>

    <div class="agregar-pelicula">
        <!-- Contenido del formulario de agregar película -->
        <?php
        if ($usuario_autenticado) {
            echo '<form action="index.php" method="post">
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
                    
                    <!-- Agregamos el select para las categorías -->
                    <label for="categoria">Categoría:</label>
                    <select id="categoria" name="categoria" required>
                        <option value="">Selecciona una categoría</option>';
                        foreach ($categorias as $categoria) {
                            echo '<option value="' . $categoria['id_categoria'] . '">' . $categoria['nom_categoria'] . '</option>';
                        }
            echo '</select>
                    
                    <button type="submit">Agregar Película</button>
                  </form>';
        }
        ?>
    </div>

    <footer>
        <div class="pie">
            <!-- Contenido del pie de página -->
            <div class="pie-padre">
                <div class="pie-izquierda">
                    <h2>Cine MAX</h2>
                </div>
                <div class="pie-centro"></div>
                <div class="pie-derecha">
                    <h3>Síguenos</h3>
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
    </footer>
    <script src="funciones.js"></script>
</body>
</html>
