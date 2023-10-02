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
    public function borrarPelicula($id) {
        foreach ($this->peliculas as $key => $pelicula) {
            if ($pelicula->id == $id) {
                unset($this->peliculas[$key]);
                break;
            }
        }
        $this->peliculas = array_values($this->peliculas); // Reorganiza los índices
    }
}
?>