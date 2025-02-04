<?php
require_once __DIR__ . '/../../config/dbConnection.php';

/**
 * Clase Product que representa un producto en el sistema.
 */
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

    /**
     * Establece el ID del producto.
     *
     * @param int $id El ID del producto.
     */
    public function setId ($id){
        $this->id = $id;
    }

    /**
     * Establece el nombre del producto.
     *
     * @param string $nombre El nombre del producto.
     */
    public function setNombre ($nombre){
        $this->nombre = $nombre;
    }

    /**
     * Establece la descripción del producto.
     *
     * @param string $desc La descripción del producto.
     */
    public function setDesc ($desc){
        $this->desc = $desc;
    }

    /**
     * Establece la categoría del producto.
     *
     * @param string $categoria La categoría del producto.
     */
    public function setCategoria ($categoria){
        $this->categoria = $categoria;
    }

    /**
     * Establece el precio del producto.
     *
     * @param float $precio El precio del producto.
     */
    public function setPrecio ($precio){
        $this->precio = $precio;
    }
    
    /**
     * Establece la URL de la imagen del producto.
     *
     * @param string $img La URL de la imagen del producto.
     */
    public function setImg ($img){
        $this->img = $img;
    }
    
    /**
     * Establece la fecha de fin de la subasta del producto.
     *
     * @param string $fecha La fecha de fin de la subasta del producto.
     */
    public function setFecha ($fecha){
        $this->fecha = $fecha;
    }
    
    /**
     * Establece el vendedor del producto.
     *
     * @param string $vendedor El vendedor del producto.
     */
    public function setVendedor ($vendedor){
        $this->vendedor = $vendedor;
    }
    
    /**
     * Establece el número de likes del producto.
     *
     * @param int $likes El número de likes del producto.
     */
    public function setLikes ($likes){
        $this->likes = $likes;
    }
    
    /**
     * Añade un nuevo producto a la base de datos.
     *
     * @return int El ID del producto recién insertado.
     */
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

    /**
     * Incrementa el número de likes de un producto.
     *
     * @param int $productId El ID del producto.
     */
    public function incrementLikes($productId) {
        $conn = getDBConnection();
        $sql = $conn->prepare('UPDATE productos SET Numero_Likes = Numero_Likes + 1 WHERE id = ?');
        $sql->bindParam(1, $productId);
        $sql->execute();
    }

    /**
     * Decrementa el número de likes de un producto.
     *
     * @param int $productId El ID del producto.
     */
    public function decrementLikes($productId) {
        $conn = getDBConnection();
        $sql = $conn->prepare('UPDATE productos SET Numero_Likes = Numero_Likes - 1 WHERE id = ?');
        $sql->bindParam(1, $productId);
        $sql->execute();
    }
    
    /**
     * Actualiza el precio de un producto.
     *
     * @param int $productId El ID del producto.
     * @param float $newPrice El nuevo precio del producto.
     * @return bool True si la actualización fue exitosa, false en caso contrario.
     */
    public function updatePrice($productId, $newPrice) {
        $conn = getDBConnection();
        $sql = $conn->prepare('UPDATE productos SET Precio = :precio WHERE ID = :id');
        $sql->bindParam(':precio', $newPrice);
        $sql->bindParam(':id', $productId);
        return $sql->execute();
    }
}