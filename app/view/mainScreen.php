<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biddly</title>
    <link rel="stylesheet" href="css/mainScreen.css">

</head>

<body>
    <?php
        require_once "../controller/productController.php";
        $productController = new ProductController();

        $productController->updateExpiredProducts();

        $productos = $productController->getTopLikedProducts(''); // Obtener los 3 productos con más likes.
    ?>
 
    <!-- Logo, barra de busqueda y botones de inicio de sesión y registro. -->
    <header class="topBar">
        <div class="logoContainer">
            <a href="mainScreen.php"><img class="logo" src="../../img/logoText.png" alt="Logo Biddly"></a>
        </div>

        <input class="searchBar" type="text" placeholder="Empieza a buscar por categoria o nombre...">
        <a href="signInScreen.php"><button class="topBarButtons">Sign In</button></a>
        <a href="registerScreen.php"><button class="topBarButtons">Register</button></a>
    </header>

    <div class="orangeLine"></div>

    <!-- seccion de Favoritos -->
    <div class="comunityFavorites">Favoritos de la comunidad</div>

    <div class="favoritesContainer">
    <?php
        foreach ($productos as $producto) {
            echo '
            <div class="contentContainer" data-product-id="' . $producto['ID'] . '">
                <img src="' . $producto['URL_Imagen'] . '" alt="' . $producto['Nombre'] . '">
                <div class="price">' . $producto['Precio'] . '€</div>
                <div class="productName">' . $producto['Nombre'] . '</div>
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
            </div>';
        }
    ?>
    </div>

    <!-- Barra naranja de separacion -->
    <div class="orangeLine2"></div>

    <div class="comunityFavorites">Categorías</div>

    <!-- Categorías -->
    <div class="categoryContainer">
        <a href="categoryScreen.php?category_id=1">
            <button class="contentContainer">
                <img class="image" src="../../img/clothes.jpg" alt="clothes">
                <div class="cat">ROPA</div>
            </button>
        </a>
        <a href="categoryScreen.php?category_id=2">
            <button class="contentContainer">
                <img class="image" src="../../img/sports.jpg" alt="sports">
                <div class="cat">DEPORTES</div>
            </button>
        </a>
        <a href="categoryScreen.php?category_id=3">
            <button class="contentContainer">
                <img class="image" src="../../img/tecnology.jpg" alt="tecnology">
                <div class="cat">TECNOLOGÍA</div>
            </button>
        </a>
        <a href="categoryScreen.php?category_id=4">
            <button class="contentContainer">
                <img class="image" src="../../img/vehicles.jpg" alt="vehicles">
                <div class="cat">VEHÍCULOS</div>
            </button>
        </a>
        <a href="categoryScreen.php?category_id=5">
            <button class="contentContainer">
                <img class="image" src="../../img/books.jpg" alt="books">
                <div class="cat">LIBROS</div>
            </button>
        </a>
        <a href="categoryScreen.php?category_id=6">
            <button class="contentContainer">
                <img class="image" src="../../img/furniture.jpg" alt="furniture">
                <div class="cat">MOBILIARIA</div>
            </button>
        </a>
    </div>
</body>

</html>

<?php include 'footer.php'; ?>