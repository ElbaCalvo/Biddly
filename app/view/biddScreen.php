<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pujas</title>
    <link rel="stylesheet" href="biddScreen.css">
</head>

<body>
    <?php
    session_start();

    require_once '../controller/productController.php';
    $productController = new ProductController();

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

    $productId = isset($_GET['product_id']) ? $_GET['product_id'] : 0;  // Se obtiene el ID del producto desde la URL
    $producto = $productController->getProductById($productId); // El producto utilizando el ID del producto
    ?>

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
            <input type="number" name="puja">
            <button class="bidButton">Pujar</button>
            <div class="orangeLine2"></div>
            <strong>Registro de pujas</strong><br>
            <div class="biddingRegister">
                <p>Ejemeplo1</p>
            </div>
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