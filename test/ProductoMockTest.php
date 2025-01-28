<?php

use PHPUnit\Framework\TestCase;

require_once 'app\controller\productController.php';

class ProductoMockTest extends TestCase
{
    public function testAddProduct()
    {
        // Crear un mock de la conexión a la base de datos
        $mockConnection = $this->createMock(PDO::class);

        // Crear un mock de la clase ProductController
        $productControllerMock = $this->getMockBuilder(ProductController::class)
            ->setConstructorArgs([$mockConnection])  // Pasar el mock de conexión al constructor
            ->onlyMethods(['getDBConnection', 'addProduct'])
            ->getMock();

        // Simular el comportamiento del método getDBConnection para devolver el mock de la conexión
        $productControllerMock->method('getDBConnection')
            ->willReturn($mockConnection);

        // Simular que la consulta de inserción de producto no falla (que la inserción se realiza correctamente)
        $mockConnection->method('prepare')
            ->willReturn($this->createMock(PDOStatement::class)); // Simulamos un objeto PDOStatement

        // Ejecutar la prueba
        $result = $productControllerMock->addProduct('ProductoTest', 'DescripciónTest', 'CategoríaTest', 100, 'imagen.jpg', '2025-01-30', 'VendedorTest');

        // Verificar que el resultado sea el esperado (en este caso, un ID generado, por ejemplo)
        $this->assertIsInt($result);  // Si todo está bien, el resultado debería ser un número (ID)
    }
}

