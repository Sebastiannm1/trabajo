<?php

require_once 'Repositorio.php';

class pelicula {

    public $nombre;
    public $publico;
    public $origen;
    public $duracion; 
    public $idioma;
    public $director; 
    public $precio;

    public function __construct($nombre, $publico, $origen, $duracion, $idioma, $director, $precio)
    {
        $this->nombre = $nombre;
        $this->publico = $publico;
        $this->origen=  $origen ;
        $this->duracion= $duracion;
        $this->idioma=$idioma;
        $this->director=$director;
        $this->precio =$precio;
    }
    
    public function __toString()
    {
        return "Nombre: ". $this->nombre . ", publico: " . $this->publico. ", origen: ". $this->origen. ", precio". $this->precio;
    }

}