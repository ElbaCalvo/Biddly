<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/controller/UsuarioController.php';
require_once __DIR__ . '/../app/model/Usuario.php';


class UsuarioTest extends TestCase
{

    public function testAddUsuario() {
        $controller = new UsuarioController();
        $this->assertTrue($controller->addUsuario("UsuPrueba7", "1234",
        "usuprueba7@gmail.com", "123456789", "12345678A"));
    }

    public function testComprobarUsuario() {
        $mockUsuario = $this->createMock(Usuario::class);
        $mockUsuario->method('comprobarUsuario')->willReturn(true);

        $controller = new UsuarioController();

        $this->assertTrue($controller->comprobarUsuario("UsuPrueba4", "1234", $mockUsuario));
    }
}
