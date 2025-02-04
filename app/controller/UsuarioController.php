<?php
require_once __DIR__ . '/../model/usuario.php';

/**
 * Controlador para gestionar usuarios en Biddly.
 */
class UsuarioController {

    /**
     * Agrega un nuevo usuario.
     *
     * Crea una instancia de Usuario, establece sus propiedades y lo añade a la base de datos.
     *
     * @param string $nombreUsuario Nombre de usuario.
     * @param string $contrasena    Contraseña del usuario.
     * @param string $correo        Correo electrónico del usuario.
     * @param string $telefono      Teléfono del usuario.
     * @param string $dni           DNI del usuario.
     *
     * @return mixed Resultado de la operación para agregar el usuario.
     */
    public function addUsuario($nombreUsuario, $contrasena, $correo, $telefono, $dni) {
        $usuario = new Usuario();
        $usuario->setUsuario($nombreUsuario);
        $usuario->setCorreo($correo);
        $usuario->setContrasena($contrasena);
        $usuario->setDni($dni);
        $usuario->setTelefono($telefono);
        return $usuario->addUsuario();
    }
    
    /**
     * Comprueba las credenciales de un usuario.
     *
     * Crea una instancia de Usuario, establece el nombre y contraseña y verifica la existencia de las credenciales.
     *
     * @param string $nombreUsuario Nombre de usuario.
     * @param string $contrasena    Contraseña a comprobar.
     *
     * @return mixed Resultado de la comprobación.
     */
    public function comprobarUsuario($nombreUsuario, $contrasena, $usuario = null) {
        if ($usuario === null) {
            $usuario = new Usuario();
        }
        $usuario->setUsuario($nombreUsuario);
        $usuario->setContrasena($contrasena);
        return $usuario->comprobarUsuario();
    }

    /**
     * Actualiza los datos de un usuario existente.
     *
     * Modifica los datos del usuario especificado y actualiza los campos en la base de datos.
     *
     * @param string $usuario     Nombre del usuario.
     * @param string $correo      Nuevo correo electrónico.
     * @param string $contrasena  Nueva contraseña.
     * @param string $dni         Nuevo DNI.
     * @param string $telefono    Nuevo teléfono.
     * @param string $direccion   Nueva dirección.
     * @param string $cuentaBanco Nueva cuenta bancaria.
     *
     * @return bool True en caso de éxito, false en caso de error.
     */
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