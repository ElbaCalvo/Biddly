<?php
require_once "../../config/dbConnection.php";

/**
 * Clase Pedido que representa un pedido en el sistema.
 */
class Pedido
{
    private $idPedido;
    private $idProducto;
    private $idUsuario;
    private $fechaEntrega;

    /**
     * Establece el ID del pedido.
     *
     * @param int $idPedido El ID del pedido.
     */
    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;
    }

    /**
     * Establece el ID del producto.
     *
     * @param int $idProducto El ID del producto.
     */
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    /**
     * Establece el ID del usuario.
     *
     * @param int $idUsuario El ID del usuario.
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * Establece la fecha de entrega del pedido.
     *
     * @param string $fechaEntrega La fecha de entrega del pedido.
     */
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;
    }

    /**
     * Añade un nuevo pedido a la base de datos.
     *
     * @return bool True si el pedido fue añadido correctamente, false en caso contrario.
     */
    public function addPedido()
    {
        $conn = getDBConnection();
        $sql = $conn->prepare('INSERT INTO pedidos (idProducto,idUsuario,fechaEntrega) VALUES (?,?,?)');
        $sql->bindParam(1, $this->idProducto);
        $sql->bindParam(2, $this->idUsuario);
        $sql->bindParam(3, $this->fechaEntrega);
        return $sql->execute();
    }
}
?>