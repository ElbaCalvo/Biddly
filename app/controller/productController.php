<?php
require_once __DIR__ . '/../model/product.php';
require_once __DIR__ . '/../model/bid.php';

/**
 * Controlador para gestionar productos en Biddly.
 */
class ProductController
{
    /**
     * Conexión a la base de datos.
     *
     * @var PDO
     */
    private $conn;

    /**
     * Constructor de ProductController.
     *
     * Inicializa la conexión a la base de datos.
     */
    public function __construct()
    {
        $this->conn = getDBConnection();
    }

    /**
     * Crea un nuevo producto.
     *
     * @param string $nombre    Nombre del producto.
     * @param string $desc      Descripción del producto.
     * @param mixed  $categoria Identificador de la categoría.
     * @param float  $precio    Precio del producto.
     * @param string $img       Ruta o URL de la imagen.
     * @param string $fecha     Fecha asociada al producto.
     * @param mixed  $vendedor  Identificador del vendedor.
     *
     * @return mixed Resultado de la operación para agregar el producto.
     */
    public function addProduct($nombre, $desc, $categoria, $precio, $img, $fecha, $vendedor)
    {
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

    /**
     * Actualiza un producto existente.
     *
     * @param mixed  $productId Identificador del producto.
     * @param string $nombre    Nuevo nombre del producto.
     * @param string $desc      Nueva descripción del producto.
     * @param float  $precio    Nuevo precio del producto.
     * @param string $fecha     Nueva fecha fin de subasta.
     *
     * @return void
     */
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

    /**
     * Obtiene los productos de una categoría especificada.
     *
     * @param mixed $categoryId Identificador de la categoría.
     *
     * @return array|null Arreglo de productos o null en caso de error.
     */
    public function getProductsByCategory($categoryId, $usuario)
    {
        try {
            $conn = getDBConnection();
            $sql = $conn->prepare('SELECT * FROM productos WHERE categoria = :categoria AND Vendedor != :usuario AND activo = "yes"');
            $sql->bindParam(':categoria', $categoryId);
            $sql->bindParam(':usuario', $usuario);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

    /**
     * Obtiene una categoría por su identificador.
     *
     * @param mixed $categoryId Identificador de la categoría.
     *
     * @return array|null Arreglo asociativo con la categoría o null en caso de error.
     */
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

    /**
     * Obtiene un producto por su identificador.
     *
     * @param mixed $productId Identificador del producto.
     *
     * @return array|null Devuelve los productos en caso de encontrarlos, o null en caso contrario.
     */
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

        /**
     * Obtiene un producto por su vendedor.
     *
     * @param mixed $seller Identificador del vendedor.
     *
     * @return array|null Devuelve los productos en caso de encontrarlos, o null en caso contrario.
     */
    public function getProductBySeller($seller)
    {
        try {
            $conn = getDBConnection();
            $sql = $conn->prepare('SELECT * FROM productos WHERE Vendedor = :vendedor AND activo = "yes"');
            $sql->bindParam(':vendedor', $seller);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

    /**
     * Actualiza el precio de un producto.
     *
     * @param mixed $productId Identificador del producto.
     * @param float $newPrice  Nuevo precio del producto.
     *
     * @return mixed Resultado de la operación de actualización.
     */
    public function updateProductPrice($productId, $newPrice)
    {
        $product = new Product();
        return $product->updatePrice($productId, $newPrice);
    }

    /**
     * Obtiene los productos con mayor número de likes.
     *
     * @return array|null Devuelve los productos por los mas gustados en caso de encontrarlos, o null en caso contrario.
     */
    public function getTopLikedProducts($usuario)
    {
        try {
            $sql = $this->conn->prepare('SELECT * FROM productos where activo = "yes" AND Vendedor != :vendedor ORDER BY Numero_Likes DESC LIMIT 3');
            $sql->bindParam(':vendedor', $usuario);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

    /**
     * Gestiona los likes de un producto.
     *
     * Añade o elimina un like y actualiza el contador de likes en el producto.
     *
     * @param mixed $productId Identificador del producto.
     * @param mixed $userId    Identificador del usuario.
     *
     * @return void
     */
    public function manageLikes($productId, $userId)
    {
        try {
            $sql = $this->conn->prepare('SELECT * FROM favoritos WHERE producto = :producto AND usuario = :usuario');
            $sql->bindParam(':producto', $productId);
            $sql->bindParam(':usuario', $userId);
            $sql->execute();
            $like = $sql->fetch(PDO::FETCH_ASSOC);

            if ($like) {
                $sql = $this->conn->prepare('DELETE FROM favoritos WHERE producto = :producto AND usuario = :usuario');
                $sql->bindParam(':producto', $productId);
                $sql->bindParam(':usuario', $userId);
                $sql->execute();

                $sql = $this->conn->prepare('UPDATE productos SET Numero_Likes = Numero_Likes - 1 WHERE ID = :id');
                $sql->bindParam(':id', $productId);
                $sql->execute();
            } else {
                $sql = $this->conn->prepare('INSERT INTO favoritos (producto, usuario) VALUES (:producto, :usuario)');
                $sql->bindParam(':producto', $productId);
                $sql->bindParam(':usuario', $userId);
                $sql->execute();

                $sql = $this->conn->prepare('UPDATE productos SET Numero_Likes = Numero_Likes + 1 WHERE ID = :id');
                $sql->bindParam(':id', $productId);
                $sql->execute();
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    /**
     * Verifica si un usuario ha marcado como favorito un producto.
     *
     * @param mixed $productId Identificador del producto.
     * @param mixed $userId    Identificador del usuario.
     *
     * @return bool True si el producto está marcado como favorito, false en caso contrario.
     */
    public function isLikedByUser($productId, $userId)
    {
        try {
            $sql = $this->conn->prepare('SELECT * FROM favoritos WHERE producto = :producto AND usuario = :usuario');
            $sql->bindParam(':producto', $productId);
            $sql->bindParam(':usuario', $userId);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC) ? true : false;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    /**
     * Elimina un producto.
     *
     * @param mixed $ID Identificador del producto.
     *
     * @return void
     */
    public function deleteProduct($ID)
    {
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

    /**
     * Actualiza los productos expirados.
     *
     * Para cada producto que ha expirado, obtiene la puja más alta, crea el pedido correspondiente y marca el producto como inactivo.
     *
     * @return void
     */
    public function updateExpiredProducts()
    {
        $conn = getDBConnection();
        $sql = $conn->prepare('SELECT * FROM productos WHERE Fecha_fin_subasta < CURDATE() AND activo = "yes"');
        $sql->execute();
        $products = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($products as $product) {
            $sql = $conn->prepare('SELECT * FROM ofertas WHERE Producto = :producto ORDER BY Precio DESC LIMIT 1');
            $sql->bindParam(':producto', $product['ID']);
            $sql->execute();
            $bid = $sql->fetch(PDO::FETCH_ASSOC);

            if ($bid) {
                $sql = $conn->prepare('INSERT INTO pedidos (idProducto, idUsuario, fechaEntrega) VALUES (:idProducto, :idUsuario, :fechaEntrega)');
                $sql->bindParam(':idProducto', $product['ID']);
                $sql->bindParam(':idUsuario', $bid['comprador']);
                $deliveryDate = date('Y-m-d', strtotime($product['Fecha_fin_subasta'] . ' + 14 days'));
                $sql->bindParam(':fechaEntrega', $deliveryDate);
                $sql->execute();
            }

            $sql = $conn->prepare('UPDATE productos SET activo = "no" WHERE ID = :id');
            $sql->bindParam(':id', $product['ID']);
            $sql->execute();
        }
    }

    /**
     * Obtiene la lista de productos favoritos de un usuario ordenados por precio.
     *
     * @param mixed  $userId Identificador del usuario.
     * @param string $order  Orden de clasificación ('asc' para ascendente, 'desc' para descendente).
     *
     * @return array|null Devuelve los productos favoritos ordenados por precio en caso de encontrarlos, o null en caso contrario.
     */
    public function getUserFavoritesOrdered($userId, $order)
    {
        try {
            $order = ($order === 'asc') ? 'ASC' : 'DESC';
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