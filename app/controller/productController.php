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

    public function getProductsByCategory($categoryId) {
        try {
            $conn = getDBConnection();
            $sql = $conn->prepare('SELECT * FROM productos WHERE categoria = :categoria');
            $sql->bindParam(':categoria', $categoryId);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }

    public function getCategoryById($categoryId) {
        try {
            $conn = getDBConnection();
            $sql = $conn->prepare('SELECT * FROM categorias WHERE id = :id');
            $sql->bindParam(':id', $categoryId);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

    public function deleteProduct($ID){
        try {
            $conn = getDBConnection();
            $sql = $conn->prepare('DELETE FROM productos WHERE id = :id');
            $sql->bindParam(':id', $ID);
            $sql->execute();
            echo "<scrip>alert('Producto eliminado')</script>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }
}