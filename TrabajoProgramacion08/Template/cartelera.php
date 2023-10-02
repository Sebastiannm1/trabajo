<main>
    <section id="peliculas">
        <?php
        foreach ($cartelera->obtenerPeliculas() as $pelicula) {
            echo '<div class="pelicula">';
            echo '<h2>' . $pelicula->titulo . '</h2>';
            echo '<p>Género: ' . $pelicula->genero . '</p>';
            echo '<p>Duración: ' . $pelicula->duracion . '</p>';
            echo '<button onclick="editarPelicula(' . $pelicula->id . ')">Editar</button>';
            echo '</div>';
        }
        ?>
    </section>
</main>
