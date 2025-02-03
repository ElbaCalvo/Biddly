<?php
require_once __DIR__ . '/../../config/dbConnection.php';

/**
 * Clase Bid que representa una oferta en el sistema.
 */
class Bid {
    private $id;
    private $producto;
    private $comprador;
    private $precio;

    /**
     * Establece el ID de la oferta.
     *
     * @param int $id El ID de la oferta.
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Establece el ID del producto.
     *
     * @param int $producto El ID del producto.
     */
    public function setProducto($producto) {
        $this->producto = $producto;
    }

    /**
     * Establece el ID del comprador.
     *
     * @param int $comprador El ID del comprador.
     */
    public function setComprador($comprador) {
        $this->comprador = $comprador;
    }

    /**
     * Establece el precio de la oferta.
     *
     * @param float $precio El precio de la oferta.
     */
    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    /**
     * Añade una nueva oferta a la base de datos.
     *
     * @return bool True si la oferta fue añadida correctamente, false en caso contrario.
     */
    public function addBid() {
        $conn = getDBConnection();
        $sql = $conn->prepare('INSERT INTO ofertas (Producto,Comprador,Precio) VALUES (?,?,?)');
        $sql->bindParam(1, $this->producto);
        $sql->bindParam(2, $this->comprador);
        $sql->bindParam(3, $this->precio);
        return $sql->execute();
    }

    /**
     * Obtiene todas las ofertas para un producto específico.
     *
     * @param int $productId El ID del producto.
     * @return array|null Un array de ofertas si se encontraron, null en caso contrario.
     */
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