<?php
require_once __DIR__ . '/../model/usuario.php';

class UsuarioController {
    public function addUsuario($nombreUsuario, $contrasena, $correo, $telefono, $dni) {
        $usuario = new Usuario();
        $usuario->setUsuario($nombreUsuario);
        $usuario->setCorreo($correo);
        $usuario->setContrasena($contrasena);
        $usuario->setDni($dni);
        $usuario->setTelefono($telefono);
        return $usuario->addUsuario();
    }

    public function comprobarUsuario($nombreUsuario, $contrasena) {
        $usuario = new Usuario();
        $usuario->setUsuario($nombreUsuario);
        $usuario->setContrasena($contrasena);
        return $usuario->comprobarUsuario();
    }

    public function updateUsuario($usuario, $correo, $contrasena, $dni, $telefono, $direccion, $cuentaBanco) {
        try {
            $conn = getDBConnection();
            $sql = $conn->prepare("UPDATE usuarios SET Contraseña = :contrasena, Correo_electronico = :correo, TELEFONO = :telefono, DNI = :dni, Direccion = :direccion, Cuenta_bancaria = :cuentaBanco WHERE Nombre = :nombre");
            $sql->bindParam(':nombre', $usuario);
            $sql->bindParam(':contrasena', $contrasena);
            $sql->bindParam(':correo', $correo);
            $sql->bindParam(':telefono', $telefono);
            $sql->bindParam(':dni', $dni);
            $sql->bindParam(':direccion', $direccion);
            $sql->bindParam(':cuentaBanco', $cuentaBanco);
            $sql->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>