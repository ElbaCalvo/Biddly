<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ .'app\controller\productController.php';


class ProductoTest extends TestCase
{

    public function testGetCategoryById()
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
