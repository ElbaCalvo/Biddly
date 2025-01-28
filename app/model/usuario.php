<?php
require_once "../../config/dbConnection.php";

/**
 * Class Usuario
 *
 * This class represents a user in the Biddly application.
 * It provides methods for adding a new user, checking user credentials,
 * and setting user properties.
 *
 */
class Usuario {
    /**
     * @var string $usuario The username of the user.
     */
    private $usuario;

    /**
     * @var string $correo The email address of the user.
     */
    private $correo;

    /**
     * @var string $contrasena The password of the user.
     */
    private $contrasena;

    /**
     * @var string $dni The DNI (National Identification Number) of the user.
     */
    private $dni;

    /**
     * @var string $telefono The phone number of the user.
     */
    private $telefono;

    /**
     * Sets the username of the user.
     *
     * @param string $usuario The username.
     */
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    /**
     * Sets the email address of the user.
     *
     * @param string $correo The email address.
     */
    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    /**
     * Sets the password of the user.
     *
     * @param string $contrasena The password.
     */
    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    /**
     * Sets the DNI (National Identification Number) of the user.
     *
     * @param string $dni The DNI.
     */
    public function setDni($dni) {
        $this->dni = $dni;
    }

    /**
     * Sets the phone number of the user.
     *
     * @param string $telefono The phone number.
     */
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    /**
     * Adds a new user to the database.
     *
     * @return bool Returns true if the user is added successfully, false otherwise.
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
     * Checks if the provided username and password match an existing user in the database.
     *
     * @return bool Returns true if the credentials are valid, false otherwise.
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
