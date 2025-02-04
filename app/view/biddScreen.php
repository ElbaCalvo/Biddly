<?php
session_start();

require_once '../controller/productController.php';
require_once '../controller/bidController.php';

$productController = new ProductController();
$bidController = new BidController();

// Si no hay una sesión iniciada, redirige al usuario a la pantalla principal
if (!isset($_SESSION['usuario'])) {
    header("Location: mainScreen.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['manageLikes'])) {
    $productId = $_POST['productId'];
    if (isset($_SESSION['usuario'])) {
        $userId = $_SESSION['usuario'];
        $productController->manageLikes($productId, $userId);
        header("Location: biddScreen.php?product_id=" . $productId . "#product-" . $productId);
        exit();
    } else {
        header("Location: signInScreen.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addBid'])) {
    $productId = $_POST['productId'];
    $precio = $_POST['precio'];
    $comprador = $_SESSION['usuario'];
    $bids = $bidController->getBidsByProduct($productId);
    $highestBid = 0;
    if ($bids) {
        foreach ($bids as $bid) {
            if ($bid['precio'] > $highestBid) {
                $highestBid = $bid['precio'];
            }
        }
    }

    // Verificar si la puja es válida
    if (($highestBid > 0 && $precio > $highestBid) || ($highestBid == 0 && $precio > $producto['Precio'])) {
        $bidController->addBid($productId, $comprador, $precio);
        $productController->updateProductPrice($productId, $precio);
        header("Location: biddScreen.php?product_id=" . $productId . "#product-" . $productId);
        exit();
    } else {
        echo "<script>alert('La puja debe ser superior al precio del producto o a la puja más alta existente.');</script>";
    }
}

$productId = isset($_GET['product_id']) ? $_GET['product_id'] : 0;
$producto = $productController->getProductById($productId);
$bids = $bidController->getBidsByProduct($productId);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pujas</title>
    <link rel="stylesheet" href="css/biddScreen.css">
</head>

<body>
    <header class="topBar">
        <div class="logoContainer">
            <a href="loggedMainScreen.php"><img class="logo" src="../../img/logoText.png" alt="Logo Biddly"></a>
        </div>

        <div class="buttonSection">
            <a href="favoritesScreen.php"><img src="../../img/favoritesIcon.png" alt="Imagen de favoritos"
                    class="favoritesImage"></a>
            <a href="profileScreen.php"><img src="../../img/logoUser.png" alt="Imagen de perfil"
                    class="profileImage"></a>
            <?php
            echo '<span class="profileName">' . $_SESSION['usuario'] . '</span>';
            ?>
        </div>
    </header>

    <div class="orangeLine1"></div>

    <?php
    $liked = $productController->isLikedByUser($producto['ID'], $_SESSION['usuario']);
    $likeButtonClass = $liked ? 'likeButton liked' : 'likeButton';

    echo '
    <div class="content">
        <div class="contentLeft">
            <img class="imgContent" src="' . $producto['URL_Imagen'] . '" alt="' . $producto['Nombre'] . '">
            <div class="user">
                <img src="../../img/logoUser.png" alt="Icono Usuario">
                ' . $producto['Vendedor'] . '
            </div>
            <div class="description">
                <strong>Descripción</strong><br>
                <p>' . $producto['Descripcion'] . '</p>
            </div>
        </div>
        <div class="contentRight">
            <div class="price">' . $producto['Precio'] . '€</div>
            <div class="productName">' . $producto['Nombre'] . '</div>
            <form method="POST" action="biddScreen.php?product_id=' . $producto['ID'] . '#product-' . $producto['ID'] . '">
                <input type="hidden" name="productId" value="' . $producto['ID'] . '">
                <button type="submit" name="manageLikes" class="' . $likeButtonClass . '"></button>
            </form>
            <form method="POST" action="biddScreen.php?product_id=' . $producto['ID'] . '">
                <input type="hidden" name="productId" value="' . $producto['ID'] . '">
                <input type="number" name="precio" placeholder="Introduce tu puja" required>
                <button type="submit" name="addBid" class="bidButton">Pujar</button>
            </form>
            <div class="orangeLine2"></div>
            <strong>Registro de pujas</strong><br>
            <div class="biddingRegister">';
    if ($bids) {
        foreach ($bids as $bid) {
            echo '<p>' . $bid['comprador'] . ' pujó ' . $bid['precio'] . '€</p>';
        }
    } else {
        echo '<p>No hay pujas para este producto.</p>';
    }
    echo '</div>
            <div class="bidTime">
                ' . date("j M. Y, H:i", strtotime($producto['Fecha_fin_subasta'])) . '
            </div>
        </div>
    </div>
    ';
    ?>
</body>

</html>
<?php include 'footer.php'; ?>