<?php

use PHPUnit\Framework\TestCase;
// use PHPUnit\Framework\DBTestCase;
// use PDO;

require_once 'app\controller\productController.php';


class ProductoTest extends TestCase
{

    public function testGetProductsByCategory()
    {

        $productController = new ProductController();

        //arrange
        $categoryId = 2;

        //act
        $products = $productController->getCategoryById($categoryId);

        //assert
        $this->assertEquals('Deportes', $products['Nombre']);
    }


}
