<?php
require_once "../../config/dbConnection.php";

class Product {
    private $id;
    private $nombre;
    private $desc;
    private $categoria;
    private $precio;
    private $img;
    private $fecha;
    private $vendedor;
    private $likes;


    public function setId ($id){
        $this->id = $id;
    }

    public function setNombre ($nombre){
        $this->nombre = $nombre;
    }

    public function setDesc ($desc){
        $this->desc = $desc;
    }

    public function setCategoria ($categoria){
        $this->categoria = $categoria;
    }

    public function setPrecio ($precio){
        $this->precio = $precio;
    }
    
    public function setImg ($img){
        $this->img = $img;
    }
    
    public function setFecha ($fecha){
        $this->fecha = $fecha;
    }
    
    public function setVendedor ($vendedor){
        $this->vendedor = $vendedor;
    }
    
    public function setLikes ($likes){
        $this->likes = $likes;
    }
    
    public function addProduct(){
        $conn = getDBConnection();
        $sql = $conn->prepare('INSERT INTO productos (Nombre,Descripcion,Categoria,Precio,URL_imagen,Fecha_fin_subasta,Vendedor,Numero_Likes) VALUES (?,?,?,?,?,?,?,0)');
        $sql->bindParam(1, $this->nombre);
        $sql->bindParam(2, $this->desc);
        $sql->bindParam(3, $this->categoria);
        $sql->bindParam(4, $this->precio);
        $sql->bindParam(5, $this->img);
        $sql->bindParam(6, $this->fecha);
        $sql->bindParam(7, $this->vendedor);
        $sql->execute();
        return $conn->lastInsertId(); // Devuelve el ID del producto recién insertado
    }

    public function incrementLikes($productId) {
        $conn = getDBConnection();
        $sql = $conn->prepare('UPDATE productos SET Numero_Likes = Numero_Likes + 1 WHERE id = ?');
        $sql->bindParam(1, $productId);
        $sql->execute();
    }

    public function decrementLikes($productId) {
        $conn = getDBConnection();
        $sql = $conn->prepare('UPDATE productos SET Numero_Likes = Numero_Likes - 1 WHERE id = ?');
        $sql->bindParam(1, $productId);
        $sql->execute();
    }

    public function updatePrice($productId, $newPrice) {
        $conn = getDBConnection();
        $sql = $conn->prepare('UPDATE productos SET Precio = :precio WHERE ID = :id');
        $sql->bindParam(':precio', $newPrice);
        $sql->bindParam(':id', $productId);
        return $sql->execute();
    }
}