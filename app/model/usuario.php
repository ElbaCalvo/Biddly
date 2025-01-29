<?php
require_once "../../config/dbConnection.php";

/**
 * Clase Usuario que representa a un usuario en el sistema.
 */
class Usuario {
    private $usuario;
    private $correo;
    private $contrasena;
    private $dni;
    private $telefono;

    /**
     * Establece el nombre de usuario.
     *
     * @param string $usuario El nombre de usuario.
     */
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    /**
     * Establece el correo electrónico del usuario.
     *
     * @param string $correo El correo electrónico.
     */
    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    /**
     * Establece la contraseña del usuario.
     *
     * @param string $contrasena La contraseña.
     */
    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    /**
     * Establece el DNI del usuario.
     *
     * @param string $dni El DNI.
     */
    public function setDni($dni) {
        $this->dni = $dni;
    }

    /**
     * Establece el teléfono del usuario.
     *
     * @param string $telefono El teléfono.
     */
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    /**
     * Añade un nuevo usuario a la base de datos.
     *
     * @return bool True si el usuario fue añadido correctamente, false en caso contrario.
     */
    public function addUsuario() {
        try {
            $conn = getDBConnection();
            $sql = $conn->prepare("INSERT INTO usuarios (Nombre, Contraseña, Correo_electronico, TELEFONO, DNI) VALUES (:usuario, :contrasena, :correo, :telefono, :dni)");
            $sql->bindParam(':usuario', $this->usuario);
            $sql->bindParam(':contrasena', $this->contrasena);
            $sql->bindParam(':correo', $this->correo);
            $sql->bindParam(':telefono', $this->telefono);
            $sql->bindParam(':dni', $this->dni);
            $sql->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Comprueba si un usuario existe en la base de datos.
     *
     * @return bool True si el usuario existe, false en caso contrario.
     */
    public function comprobarUsuario() {
        try {
            $conn = getDBConnection();
            $sql = $conn->prepare("SELECT * FROM usuarios WHERE Nombre = :usuario && Contraseña = :contrasena");
            $sql->bindParam(':usuario', $this->usuario);
            $sql->bindParam(':contrasena', $this->contrasena);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>