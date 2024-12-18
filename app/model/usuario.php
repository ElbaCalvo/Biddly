<?php
require_once "../../config/dbConnection.php";

class Usuario {
    private $usuario;
    private $correo;
    private $contrasena;
    private $dni;
    private $telefono;

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

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