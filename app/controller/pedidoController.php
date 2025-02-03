<?php
require_once '../model/pedido.php';

/**
 * Controlador para gestionar los pedidos.
 */
class pedidoController
{
    /**
     * Conexión a la base de datos.
     *
     * @var PDO
     */
    private $conn;

    /**
     * Constructor de pedidoController.
     *
     * Inicializa la conexión a la base de datos.
     */
    public function __construct()
    {
        $this->conn = getDBConnection();
    }

    /**
     * Agrega un nuevo pedido.
     *
     * Crea una instancia de Pedido, asigna sus propiedades y guarda el pedido en la base de datos.
     *
     * @param mixed  $idProducto   Identificador del producto.
     * @param mixed  $idUsuario    Identificador del usuario.
     * @param string $fechaEntrega Fecha de entrega del pedido.
     *
     * @return mixed Resultado de la operación de inserción.
     */
    public function addPedido($idProducto, $idUsuario, $fechaEntrega)
    {
        $pedido = new Pedido();
        $pedido->setIdProducto($idProducto);
        $pedido->setIdUsuario($idUsuario);
        $pedido->setFechaEntrega($fechaEntrega);
        return $pedido->addPedido();
    }
}

?>