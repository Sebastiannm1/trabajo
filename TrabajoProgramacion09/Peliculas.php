<?php
class Pelicula {
    public $id;
    public $titulo;
    public $genero;
    public $duracion;

    public function __construct($id, $titulo, $genero, $duracion) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->duracion = $duracion;
    }
}
?>
