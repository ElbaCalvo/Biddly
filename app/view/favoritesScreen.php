<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites</title>
    <link rel="stylesheet" href="favoritesScreen.css">
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
            header("Location: favoritesScreen.php");
            exit();
        } else {
            header("Location: signInScreen.php");
            exit();
        }
    }

    $userId = $_SESSION['usuario'];
    $favoriteProductIds = $productController->getUserFavorites($userId); // Obtener los IDs de los productos favoritos del usuario
    $productos = [];
    foreach ($favoriteProductIds as $favoriteProductId) {
        $producto = $productController->getProductById($favoriteProductId['producto']);
        if ($producto) {
            $productos[] = $producto;
        }
    }
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

    <div class="orangeLine"></div>
    <div class="favoritesForm">
        <form action="">
            Favoritos
            <input class="searchBar" type="search" name="searchBar">
            <img src="../../img/orderIcon.png" alt="icono de Orden">
            <select class="order" name="orden">
                <option>Precio más alto primero</option>
                <option>Precio más bajo primero</option>
            </select>
        </form>
    </div>

    <?php
    if (!empty($productos)) {
        foreach ($productos as $producto) {
            $liked = $productController->isLikedByUser($producto['ID'], $userId);
            $likeButtonClass = $liked ? 'likeButton liked' : 'likeButton';

            echo '
            <div class="contentContainer">
                <img src="' . $producto['URL_Imagen'] . '" alt="' . $producto['Nombre'] . '">
                <div class="info">
                    <div class="productName">' . $producto['Nombre'] . '</div>
                    <div class="price">' . $producto['Precio'] . '€</div>
                    <form method="POST" action="favoritesScreen.php">
                        <input type="hidden" name="productId" value="' . $producto['ID'] . '">
                        <button type="submit" name="manageLikes" class="' . $likeButtonClass . '"></button>
                    </form>
                    <a href="biddScreen.php?product_id=' . $producto['ID'] . '"><button class="bidButton">Pujar</button></a>
                    <div class="description">
                        <strong>Descripción</strong><br>
                        <p>' . $producto['Descripcion'] . '</p>
                    </div>
                    <div class="bidTime">
                        ' . $producto['Fecha_fin_subasta'] . '
                    </div>
                </div>
            </div>';
        }
    }
    ?>
</body>

</html>

<?php include 'footer.php'; ?>