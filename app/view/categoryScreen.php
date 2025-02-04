<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="css/categoryScreen.css">
</head>

<body>
    <?php
        // Incluir el controlador de productos
        require_once '../controller/productController.php';
        $productController = new ProductController();

        // Obtener el ID de la categoría de la URL
        $categoryId = isset($_GET['category_id']) ? $_GET['category_id'] : 0;

        // Obtener los productos de la categoría seleccionada
        $productos = $productController->getProductsByCategory($categoryId, '');

        // Obtener la información de la categoría
        $category = $productController->getCategoryById($categoryId);
    ?>
    <header class="topBar">
        <div class="logoContainer">
            <a href="mainScreen.php"><img class="logo" src="../../img/logoText.png" alt="Logo Biddly"></a>
        </div>

        <div class="buttonSection">
            <a href="signInScreen.php"><button class="topBarButtons" alt="">Sign In</button></a>
            <a href="registerScreen.php"><button class="topBarButtons" alt="">Register</button></a>
        </div>
    </header>

    <div class="orangeLine"></div>
    <div class="categoryTypeContainer">
        <?php echo'<div class="categoryType">' . $category['Nombre'] . '</div>'; ?>
    </div>


    <div class="categoryForm">
        <form action="">
            <input class="searchBar" type="search" name="searchBar">
            <img src="../../img/orderIcon.png" alt="icono de Orden">
            <select class="order" name="orden">
                <option>Precio más alto primero</option>
                <option>Precio más bajo primero</option>
            </select>
        </form>
    </div>

    <?php
    foreach ($productos as $producto) {
        echo '
        <form action="signInScreen.php">
        <div class="contentContainer">
            <img src="' . $producto['URL_Imagen'] . '" alt="' . $producto['Nombre'] . '">
            <div class="info">
                <div class="productName">' . $producto['Nombre'] . '</div>
                <div class="price">' . $producto['Precio'] . '€' . '</div>
                <form method="POST" action="signInScreen.php">
                    <input type="hidden" name="productId" value="' . $producto['ID'] . '">
                    <button type="submit" name="likeProduct" class="likeButton"></button>
                </form>
                <form method="POST" action="signInScreen.php">
                    <button type="submit" class="bidButton">Pujar</button>
                </form>
                <div class="description">
                    <strong>Descripción</strong><br>
                    <p>' . $producto['Descripcion'] . '</p>
                </div>
                <div class="bidTime">
                    ' . $producto['Fecha_fin_subasta'] . '
                </div>
            </div>
        </div>
        </form>';
    }
    ?>
</body>

</html>

<?php include 'footer.php'; ?>