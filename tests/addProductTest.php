<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../app/controller/productController.php';
require_once __DIR__ . '/../app/model/product.php';

class addProductTest extends TestCase {
    public function testAddProduct() {
        $productController = new productController();
        $this->assertNotFalse( $productController->addProduct("Producto", "Descripcion del producto", 2, 100.00, "https://cdn-icons-png.flaticon.com/512/1581/1581884.png", "2099-12-31 10:15:00", "Admin") );
    }
}
?>