<?php
require_once '../model/bid.php';

class bidController {
    private $conn;

    public function __construct() {
        $this->conn = getDBConnection();
    }

    public function addBid($producto,$comprador,$precio) {
        $bid = new Bid();
        $bid->setProducto($producto);
        $bid->setComprador($comprador);
        $bid->setPrecio($precio);
        return $bid->addBid();
    }

    public function getBidsByProduct($productId) {
        try {
            $conn = getDBConnection();
            $sql = $conn->prepare('SELECT * FROM ofertas WHERE Producto = :producto');
            $sql->bindParam(':producto', $productId);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }
}