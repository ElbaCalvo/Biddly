<?php
require_once '../model/product.php';

class ProductController {
    public function addProduct($nombre,$desc,$categoria,$precio,$img,$fecha,$vendedor) {
        $product = new Product();
        $product->setNombre($nombre);
        $product->setDesc($desc);
        $product->setCategoria($categoria);
        $product->setPrecio($precio);
        $product->setImg($img);
        $product->setFecha($fecha);
        $product->setVendedor($vendedor);
        return $product->addProduct();
    }
}