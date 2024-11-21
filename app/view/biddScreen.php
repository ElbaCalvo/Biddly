<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="biddScreen.css">
</head>

<body>
    <?php
    session_start();

    require_once '../controller/productController.php';
    $productController = new ProductController();
    $producto = $productController->getProductsById(24);

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
    echo '
    <div class="content">
        <div class="contentLeft">
            <img src="' . $producto['URL_Imagen'] . '" alt="' . $producto['Nombre'] . '">
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
            <button class="likeButton"></button>
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