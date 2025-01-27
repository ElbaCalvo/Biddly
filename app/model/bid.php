<?php
require_once __DIR__ ."/../../config/dbConnection.php";

class Bid {
    private $id;
    private $producto;
    private $comprador;
    private $precio;

    public function setId($id) {
        $this->id = $id;
    }

    public function setProducto($producto) {
        $this->producto = $producto;
    }

    public function setComprador($comprador) {
        $this->comprador = $comprador;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function addBid() {
        $conn = getDBConnection();
        $sql = $conn->prepare('INSERT INTO ofertas (Producto,Comprador,Precio) VALUES (?,?,?)');
        $sql->bindParam(1, $this->producto);
        $sql->bindParam(2, $this->comprador);
        $sql->bindParam(3, $this->precio);
        return $sql->execute();
    }

    public function getBidsByProduct($productId) {
        try {
            $conn = getDBConnection();
            $sql = $conn->prepare('SELECT * FROM ofertas WHERE Producto = :producto ORDER BY ID DESC');
            $sql->bindParam(':producto', $productId);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }
}