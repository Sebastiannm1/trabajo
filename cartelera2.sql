
create schema cartelera2;


CREATE TABLE administrador (
  id_adm INT NOT NULL AUTO_INCREMENT,
  nom_usuario VARCHAR(255) NOT NULL,
  apellido_usuario VARCHAR(255) NOT NULL,
  clave_usuario INT NOT NULL,
  rol VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_adm)
);

CREATE TABLE pelicula (
  id_pelicula INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  trama VARCHAR(255) NOT NULL,
  id_categoria INT NOT NULL,
  publico VARCHAR(255) NOT NULL,
  origen VARCHAR(255) NOT NULL,
  duracion INT NOT NULL,
  idioma VARCHAR(255) NOT NULL,
  director VARCHAR(255) NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (id_pelicula),
  FOREIGN KEY (id_categoria) REFERENCES categoria (id_categoria)
);

CREATE TABLE proyeccion (
  id_proyeccion INT NOT NULL AUTO_INCREMENT,
  fecha DATETIME NOT NULL,
  id_pelicula INT NOT NULL,
  PRIMARY KEY (id_proyeccion),
  FOREIGN KEY (id_pelicula) REFERENCES pelicula (id_pelicula)
);

CREATE TABLE categoria (
  id_categoria INT NOT NULL AUTO_INCREMENT,
  nom_categoria VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_categoria)
);