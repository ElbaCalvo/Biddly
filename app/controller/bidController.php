<?php
require_once '../model/bid.php';

/**
 * Controlador para gestionar las ofertas (bids) en Biddly.
 */
class bidController {
    /**
     * Conexión a la base de datos.
     *
     * @var PDO
     */
    private $conn;

    /**
     * Constructor de bidController.
     *
     * Inicializa la conexión a la base de datos.
     */
    public function __construct() {
        $this->conn = getDBConnection();
    }

    /**
     * Agrega una nueva oferta a un producto.
     *
     * Crea una instancia de Bid, configura sus propiedades y la guarda en la base de datos.
     *
     * @param mixed $producto  Identificador del producto.
     * @param mixed $comprador Identificador del comprador.
     * @param float $precio    Precio ofrecido en la oferta.
     *
     * @return mixed Resultado de la operación de insertado.
     */
    public function addBid($producto, $comprador, $precio) {
        $bid = new Bid();
        $bid->setProducto($producto);
        $bid->setComprador($comprador);
        $bid->setPrecio($precio);
        return $bid->addBid();
    }

    /**
     * Obtiene todas las ofertas asociadas a un producto.
     *
     * Realiza una consulta a la base de datos para recuperar las ofertas correspondientes
     * al producto especificado.
     *
     * @param mixed $productId Identificador del producto.
     *
     * @return array|null Devuelve las ofertas en caso de encontrarlas, o null en caso contrario.
     */
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