<?php
require_once 'usuario.php';
require_once 'credenciales.php';
require_once 'pelicula.php';

class Repositorio {
    private static $conexion = null;

    public function __construct() {
        if (is_null(self::$conexion)) {
            $credenciales = credenciales();
            self::$conexion = new mysqli(
                $credenciales['host'],
                $credenciales['usuario'],
                $credenciales['clave'],
                $credenciales['nombreBaseDatos']
            );
            if (self::$conexion->connect_error) {
                $error = 'error de conexion' . self::$conexion->connect_error;
                self::$conexion = null;
                die($error);
            }
            self::$conexion->set_charset('utf8mb4');
        }
    }

    public function login($nombre_usuario, $clave)
    {
        $q = "SELECT id, nombre, apellido, clave FROM administrador WHERE usuario= ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("s", $nombre_usuario);
        if ($query->execute()) {
            $query->bind_result($id_adm, $nombre, $apellido, $clave_encriptada);
            if ($query->fetch()) {
                if (password_verify($clave, $clave_encriptada)) {
                    return new Usuario($nombre_usuario, $nombre,  $apellido, $id_adm);
                }
            }
        }
        return false;
    }

    public function save(Usuario $usuario, $clave)
    {
        $q = "INSERT INTO administrador (usuario, nombre, apellido, clave) VALUES (?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);

        $nombre_usuario = $usuario->nombre_usuario;
        $nombre = $usuario->nombre;
        $apellido = $usuario->apellido;
        $clave = password_hash($clave, PASSWORD_DEFAULT);

        $query->bind_param("ssss", $nombre_usuario, $nombre, $apellido, $clave);

        if ($query->execute()) {
            return self::$conexion->insert_id;
        } else {
            return false;
        }
    }

    public function agregarPelicula($nombre, $publico, $origen, $duracion, $idioma, $director, $precio) {
        // Verifica que los campos no estén vacíos
        if (empty($nombre) || empty($publico) || empty($origen) || empty($duracion) || empty($idioma) || empty($director) || empty($precio)) {
            // Puedes manejar la validación de errores aquí, por ejemplo, mostrar un mensaje al usuario.
            return false;
        }

        // Continúa con el proceso de inserción en la base de datos
        $query = "INSERT INTO pelicula (nombre, publico, origen, duracion, idioma, director, precio) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("sssiisd", $nombre, $publico, $origen, $duracion, $idioma, $director, $precio);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editarPelicula($id_pelicula, $nombre, $publico, $origen, $duracion, $idioma, $director, $precio) {
        $query = "UPDATE pelicula SET nombre = ?, publico = ?, origen = ?, duracion = ?, idioma = ?, director = ?, precio = ? WHERE id_pelicula = ?";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("sssiisdi", $nombre, $publico, $origen, $duracion, $idioma, $director, $precio, $id_pelicula);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarPelicula($id_pelicula) {
        $query = "DELETE FROM pelicula WHERE id_pelicula = ?";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("i", $id_pelicula);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerPeliculas() {
        $query = "SELECT * FROM pelicula";
        $result = self::$conexion->query($query);
        $peliculas = [];

        while ($row = $result->fetch_assoc()) {
            $peliculas[] = $row;
        }

        return $peliculas;
    }

    public function obtenerPeliculaPorId($id) {
        $query = "SELECT * FROM pelicula WHERE id_pelicula = ?";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function obtenerCategorias() {
        $query = "SELECT * FROM categoria";
        $stmt = self::$conexion->prepare($query);
    
        if ($stmt) {
            $stmt->execute();
            $result = $stmt->get_result();
            $categorias = [];
    
            while ($row = $result->fetch_assoc()) {
                $categorias[] = $row;
            }
    
            return $categorias;
        } else {
            // Manejo de error si la preparación de la consulta falla
            return [];
        }
    }

    public function obtenerPeliculasPorCategoria($categoriaId) {
        $query = "SELECT * FROM pelicula WHERE id_categoria = ?";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("i", $categoriaId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $peliculas = [];
    
        while ($row = $result->fetch_assoc()) {
            $peliculas[] = $row;
        }
    
        return $peliculas;
    }    
}
?>
