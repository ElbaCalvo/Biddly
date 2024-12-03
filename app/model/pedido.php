<?php
require_once "../../config/dbConnection.php";

class Pedido
{
    private $idPedido;
    private $idProducto;
    private $idUsuario;
    private $fechaEntrega;

    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;
    }

    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;
    }

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

// Al cargar mainscreen, select de las fechas anteriores a la actual y que este active="yes", hacer que se cambien todas a active="no"
?>