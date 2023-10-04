-- Tabla de Usuarios
CREATE TABLE usuarios (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  nombre_usuario varchar(45) NOT NULL,
  clave varchar(255) NOT NULL,
  nombre varchar(200) NOT NULL,
  apellido varchar(200) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY usuario (nombre_usuario)
) ENGINE=InnoDB;

-- Tabla de Películas
CREATE TABLE peliculas (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  id_usuario int(10) unsigned NOT NULL,
  titulo varchar(200) NOT NULL,
  genero varchar(100) NOT NULL,
  duracion int(3) NOT NULL,
  descripcion text NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
) ENGINE=InnoDB;
