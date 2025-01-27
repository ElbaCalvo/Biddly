<?php
require_once __DIR__ .'/../model/product.php';
require_once __DIR__ .'/../model/bid.php';

class ProductController
{
    private $conn;

    public function __construct()
    {
        $this->conn = getDBConnection();
    }

    public function addProduct($nombre, $desc, $categoria, $precio, $img, $fecha, $vendedor)
    { //crea un nuevo producto
        $product = new Product();
        $product->setNombre($nombre);
        $product->setDesc($desc);
        $product->setCategoria($categoria);
        $product->setPrecio($precio);
        $product->setImg($img);
        $product->setFecha($fecha);
        $product->setVendedor($vendedor);
        return $product->addProduct();
    }

    public function updateProduct($productId, $nombre, $desc, $precio, $fecha)
    {
        try {
            $conn = getDBConnection();
            $sql = $conn->prepare('UPDATE productos SET Nombre = :nombre, Descripcion = :descripcion, Precio = :precio, Fecha_fin_subasta = :fecha WHERE ID = :id');
            $sql->bindParam(':id', $productId);
            $sql->bindParam(':nombre', $nombre);
            $sql->bindParam(':descripcion', $desc);
            $sql->bindParam(':precio', $precio);
            $sql->bindParam(':fecha', $fecha);
            $sql->execute();
            echo "<script>alert('Producto actualizado')</script>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getProductsByCategory($categoryId)
    {
        try {
            $conn = getDBConnection();
            $sql = $conn->prepare('SELECT * FROM productos WHERE categoria = :categoria AND activo = "yes"');
            $sql->bindParam(':categoria', $categoryId);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

    public function getCategoryById($categoryId)
    {
        try {
            $conn = getDBConnection();
            $sql = $conn->prepare('SELECT * FROM categorias WHERE id = :id');
            $sql->bindParam(':id', $categoryId);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

    public function getProductById($productId)
    {
        try {
            $conn = getDBConnection();
            $sql = $conn->prepare('SELECT * FROM productos WHERE id = :id AND activo = "yes"');
            $sql->bindParam(':id', $productId);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }
    public function updateProductPrice($productId, $newPrice)
    {
        $product = new Product();
        return $product->updatePrice($productId, $newPrice);
    }

    public function getTopLikedProducts()
    {
        try {
            $sql = $this->conn->prepare('SELECT * FROM productos where activo = "yes" ORDER BY Numero_Likes DESC LIMIT 3');
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

    public function manageLikes($productId, $userId)
    { // Añadir o eliminar un like.
        try {
            $sql = $this->conn->prepare('SELECT * FROM favoritos WHERE producto = :producto AND usuario = :usuario'); // Comprobar si el usuario ya ha dado like
            $sql->bindParam(':producto', $productId);
            $sql->bindParam(':usuario', $userId);
            $sql->execute();
            $like = $sql->fetch(PDO::FETCH_ASSOC); // Booleano que controla si existe un like o si no.

            if ($like) { // Si el booleano devuelve true, se elimina el like.
                $sql = $this->conn->prepare('DELETE FROM favoritos WHERE producto = :producto AND usuario = :usuario');
                $sql->bindParam(':producto', $productId);
                $sql->bindParam(':usuario', $userId);
                $sql->execute();

                // Restar un like sobre el número de likes que hay en la tabla productos.
                $sql = $this->conn->prepare('UPDATE productos SET Numero_Likes = Numero_Likes - 1 WHERE ID = :id');
                $sql->bindParam(':id', $productId);
                $sql->execute();
            } else { // Si el booleano devuelve false, añadir el like.
                $sql = $this->conn->prepare('INSERT INTO favoritos (producto, usuario) VALUES (:producto, :usuario)');
                $sql->bindParam(':producto', $productId);
                $sql->bindParam(':usuario', $userId);
                $sql->execute();

                // Sumar un like sobre el número de likes que hay en la tabla productos.
                $sql = $this->conn->prepare('UPDATE productos SET Numero_Likes = Numero_Likes + 1 WHERE ID = :id');
                $sql->bindParam(':id', $productId);
                $sql->execute();
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function isLikedByUser($productId, $userId)
    { // Comprobar si un usuario ha dado like a un producto.
        try {
            $sql = $this->conn->prepare('SELECT * FROM favoritos WHERE producto = :producto AND usuario = :usuario');
            $sql->bindParam(':producto', $productId);
            $sql->bindParam(':usuario', $userId);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC) ? true : false; // Devuelve true si el usuario ha dado like, false si no.
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function deleteProduct($ID)
    { //eliminar producto
        try {
            $conn = getDBConnection();
            $sql = $conn->prepare('DELETE FROM productos WHERE id = :id');
            $sql->bindParam(':id', $ID);
            $sql->execute();
            echo "<script>alert('Producto eliminado')</script>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

    public function updateExpiredProducts() {
        $conn = getDBConnection();
        $sql = $conn->prepare('SELECT * FROM productos WHERE Fecha_fin_subasta < CURDATE() AND activo = "yes"');
        $sql->execute();
        $products = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($products as $product) {
            // Obtener la puja más alta para el producto
            $sql = $conn->prepare('SELECT * FROM ofertas WHERE Producto = :producto ORDER BY Precio DESC LIMIT 1');
            $sql->bindParam(':producto', $product['ID']);
            $sql->execute();
            $bid = $sql->fetch(PDO::FETCH_ASSOC);

            if ($bid) {
                // Crear un pedido en la tabla pedidos
                $sql = $conn->prepare('INSERT INTO pedidos (idProducto, idUsuario, fechaEntrega) VALUES (:idProducto, :idUsuario, :fechaEntrega)');
                $sql->bindParam(':idProducto', $product['ID']);
                $sql->bindParam(':idUsuario', $bid['comprador']);
                $deliveryDate = date('Y-m-d', strtotime($product['Fecha_fin_subasta'] . ' + 14 days'));
                $sql->bindParam(':fechaEntrega', $deliveryDate);
                $sql->execute();
            }

            // Actualizar el estado del producto a inactivo
            $sql = $conn->prepare('UPDATE productos SET activo = "no" WHERE ID = :id');
            $sql->bindParam(':id', $product['ID']);
            $sql->execute();
        }
    }

    public function getUserFavoritesOrdered($userId, $order) {
        try {
            $order = ($order === 'asc') ? 'ASC' : 'DESC'; // Si el orden es ascendente, se ordena de forma ascendente, si no, de forma descendente.

            $sql = $this->conn->prepare('SELECT p.* FROM productos p JOIN favoritos f ON p.id = f.producto WHERE f.usuario = :userId ORDER BY p.precio ' . $order);
            $sql->bindParam(':userId', $userId, PDO::PARAM_INT);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }
    
}
