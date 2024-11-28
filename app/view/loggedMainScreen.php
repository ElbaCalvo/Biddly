<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biddly</title>
    <link rel="stylesheet" href="loggedMainScreen.css">
</head>

<body>
    <?php
    session_start();

    require_once "../controller/productController.php";
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
        } else {
            header("Location: signInScreen.php");
            exit();
        }
    }

    $productos = $productController->getTopLikedProducts(); // Obtener los 3 productos con más likes.
    ?>

    <!-- Logo, barra de busqueda y botones de inicio de favoritos y usuario. -->
    <header class="topBar">
        <div class="logoContainer">
            <a href="loggedMainScreen.php"><img class="logo" src="../../img/logoText.png" alt="Logo Biddly"></a>
        </div>

        <input class="searchBar" type="text" placeholder="Empieza a buscar por categoria o nombre...">

        <div class="buttonSection">
            <a href="addProductScreen.php"><img src="../../img/addProductEmpty.png" alt="Boton añadir prducto"
                    class="addButton"></a>
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

    <!-- seccion de Favoritos -->
    <div class="comunityFavorites">Favoritos de la comunidad</div>

    <div class="favoritesContainer">
    <?php
        foreach ($productos as $producto) {
            $liked = $productController->isLikedByUser($producto['ID'], $_SESSION['usuario']);
            $likeButtonClass = $liked ? 'likeButton liked' : 'likeButton';

            echo '
            <div class="contentContainer" data-product-id="' . $producto['ID'] . '">
                <img src="' . $producto['URL_Imagen'] . '" alt="' . $producto['Nombre'] . '">
                <div class="price">' . $producto['Precio'] . '€</div>
                <div class="productName">' . $producto['Nombre'] . '</div>
                ';
                if(!($_SESSION['usuario']=="Admin")){
                echo '<form method="POST" action="loggedMainScreen.php">
                    <input type="hidden" name="productId" value="' . $producto['ID'] . '">
                    <button type="submit" name="manageLikes" class="' . $likeButtonClass . '"></button>
                </form>
                <a href="biddScreen.php?product_id=' . $producto['ID'] . '"><button class="bidButton">Pujar</button></a>';
                }
                echo '<div class="description">
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
        <a href="loggedCategoryScreen.php?category_id=1">
            <button class="contentContainer">
                <img class="image" src="../../img/clothes.jpg" alt="clothes">
                <div class="cat">ROPA</div>
            </button>
        </a>
        <a href="loggedCategoryScreen.php?category_id=2">
            <button class="contentContainer">
                <img class="image" src="../../img/sports.jpg" alt="sports">
                <div class="cat">DEPORTES</div>
            </button>
        </a>
        <a href="loggedCategoryScreen.php?category_id=3">
            <button class="contentContainer">
                <img class="image" src="../../img/tecnology.jpg" alt="tecnology">
                <div class="cat">TECNOLOGÍA</div>
            </button>
        </a>
        <a href="loggedCategoryScreen.php?category_id=4">
            <button class="contentContainer">
                <img class="image" src="../../img/vehicles.jpg" alt="vehicles">
                <div class="cat">VEHÍCULOS</div>
            </button>
        </a>
        <a href="loggedCategoryScreen.php?category_id=5">
            <button class="contentContainer">
                <img class="image" src="../../img/books.jpg" alt="books">
                <div class="cat">LIBROS</div>
            </button>
        </a>
        <a href="loggedCategoryScreen.php?category_id=6">
            <button class="contentContainer">
                <img class="image" src="../../img/furniture.jpg" alt="furniture">
                <div class="cat">MOBILIARIA</div>
            </button>
        </a>
    </div>
</body>

</html>

<?php include 'footer.php'; ?>