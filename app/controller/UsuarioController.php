<?php
require_once '../model/usuario.php';

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
}
?>