<?php
require_once '../model/pedido.php';

class pedidoController
{
    private $conn;

    public function __construct()
    {
        $this->conn = getDBConnection();
    }

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