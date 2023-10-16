CREATE DATABASE IF NOT EXISTS Basededatos;

USE Basededatos;

CREATE TABLE Usuario (
    id INT(10) unsigned NOT NULL AUTO_INCREMENT,
    nombre_usuario VARCHAR(45) NOT NULL UNIQUE,
    clave INT(255) NOT NULL,
    nombre VARCHAR(200) NOT NULL,
    apellido VARCHAR(200) NOT NULL,
    rol VARCHAR(45) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE pelicula (
    id_pelicula INT NOT NULL,
    titulo VARCHAR(255) NOT NULL UNIQUE,
    categoria VARCHAR(255) NOT NULL,
    duracion DECIMAL NOT NULL,
    director VARCHAR(255) NOT NULL,
    Pais_origen VARCHAR(255) NOT NULL,
    publico_destinado VARCHAR(255) NOT NULL,
    formato VARCHAR(45) NOT NULL,
    precio DECIMAL NOT NULL,
    id_usuario INT NOT NULL,
    PRIMARY KEY (id_pelicula),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);