<?php
class Cartelera {
    private $peliculas = [];

    public function agregarPelicula($pelicula) {
        $this->peliculas[] = $pelicula;
    }

    public function obtenerPeliculas() {
        return $this->peliculas;
    }

    public function editarPelicula($id, $titulo, $genero, $duracion) {
        foreach ($this->peliculas as &$pelicula) {
            if ($pelicula->id == $id) {
                $pelicula->titulo = $titulo;
                $pelicula->genero = $genero;
                $pelicula->duracion = $duracion;
                break;
            }
        }
    }
}
?>
