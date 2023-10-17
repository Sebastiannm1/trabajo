<?php
require_once 'usuario.php';
require_once 'credenciales.php';
require_once 'pelicula.php';


class repositorio {
    private static $conexion = null;

    public function __construct() {
        if(is_null(self::$conexion)) {
            $credenciales = credenciales();
            self::$conexion= new mysqli(
                $credenciales['host'],
                $credenciales['usuario'],
                $credenciales['clave'],
                $credenciales['nombreBaseDatos'],
            );
            if (self::$conexion->connect_error){
                $error = 'error de conexion' . self::$conexion->connect_error;
                self::$conexion = null;
                die($error);
            }
            self::$conexion->set_charset('utf8mb4');
        }
    }
     /**
     * Verifica el login de usuario, y retorna una instancia de la clase Usuario
     * si tiene éxito.
     *
     * @param string $nombre_usuario El nombre de usuario ingresado en el login
     * @param string $clave          La contraseña ingresada en el login
     *
     * @return mixed Si el login fracasa, retorna el valor booleano false.
     *               Si tiene éxito, retorna una instancia de la clase Usuario
     *               con los datos del usuario autenticado.
     */
    public function login($nombre_usuario, $clave)  
    {
        $q = "SELECT id, nombre, apellido, clave FROM administrador WHERE usuario= ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("s", $nombre_usuario);
        if ($query->execute()){
            $query->bind_result($id_adm, $nombre, $apellido, $clave_encriptada);
            if ($query->fetch() ) {
                if ( password_verify($clave, $clave_encriptada)) {
                    return new Usuario($nombre_usuario, $nombre,  $apellido, $id);
                }
            }
        }
        return false;
    }
    /**
     * Crea un nuevo usuario en la BD. Retorna el id asignado por la base de
     * datos, o el valor booleano false si hubo algún error.
     *
     * @param usuario $usuario El objeto de la clase Usuario a guardar.
     * @param string  $clave   La contraseña elegida por el nuevo usuario.
     *
     * @return mixed El valor booleano false si hubo error, o el id de usuario
     *               asignado automáticamente por la BD (valor entero).
     */
    public function save(Usuario $usuario, $clave)
    {
        $q = "INSERT INTO administrador (usuario, nombre, apellido, clave) ";
        $q.= "VALUES (?, ? , ? , ?)";
        $query = self::$conexion->prepare($q);

        $nombre_usuario = $usuario->nombre_usuario;       
        $nombre = $usuario->nombre;
        $apellido = $usuario->apellido;
        $clave = password_hash($clave, PASSWORD_DEFAULT);

        $query->bind_param("ssss", $nombre_usuario, $nombre, $apellido, $clave);

        if ($query->execute())  {
            return self::$conexion->insert_id;
        } else {
            return false;
        }
    }

    /**
     * Elimina el usuario de la BD. Retorna true si tuvo éxito, false si no.
     *
     * @params Usuario $usuario El objeto usuario a eliminar de la BD.
     *
     * @return boolean true si tuvo éxito, false de lo contrario
     */

    public function agregarPelicula($nombre, $publico, $origen, $duracion, $idioma, $director, $precio) {
        $query = "INSERT INTO pelicula (nombre, publico, origen, duracion, idioma, director, precio) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt =self::$conexion->prepare($query);
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
}
?>
