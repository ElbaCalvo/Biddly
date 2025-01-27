<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../app/controller/UsuarioController.php';

class UsuarioTest extends TestCase {

    public function testAddUsuario() {
        $controller = new UsuarioController();
        $this->assertTrue($controller->addUsuario("UsuPrueba4", "1234",
        "usuprueba4@gmail.com", "123456789", "12345678A"));
    }
}
?>

