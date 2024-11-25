<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="loggedCategoryScreen.css">
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
            header("Location: loggedCategoryScreen.php?category_id=" . $_GET['category_id'] . "#product-" . $productId);
            exit();
        } else {
            header("Location: signInScreen.php");
            exit();
        }
    }

    // Obtener el ID de la categoría de la URL
    $categoryId = isset($_GET['category_id']) ? $_GET['category_id'] : 0;

    // Eliminar producto si es necesario
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['usuario'] == 'Admin') {
        $productController->deleteProduct($_POST['deleteProduct']);
    }

    $productos = $productController->getProductsByCategory($categoryId); // Obtener los productos de la categoría seleccionada
    $category = $productController->getCategoryById($categoryId); // Obtener la información de la categoría
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
    <div class="categoryTypeContainer">
        <?php echo '<div class="categoryType">' . $category['Nombre'] . '</div>'; ?>
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
        $liked = $productController->isLikedByUser($producto['ID'], $_SESSION['usuario']);
        $likeButtonClass = $liked ? 'likeButton liked' : 'likeButton';

        echo '
        <div id="product-' . $producto['ID'] . '" class="contentContainer">
            <img src="' . $producto['URL_Imagen'] . '" alt="' . $producto['Nombre'] . '">
            <div class="info">
                <div class="productName">' . $producto['Nombre'] . '</div>
                <div class="price">' . $producto['Precio'] . '€' . '</div>';
        if ($_SESSION["usuario"] == "Admin") {
            echo '<form method="POST" action="loggedCategoryScreen.php?category_id=' . $categoryId . '#product-' . $producto['ID'] . '">
            <button class="deleteButton" name="deleteProduct" value="' . $producto['ID'] . '">Eliminar</button>
            </form>';
        } else {
            echo '
                <form method="POST" action="loggedCategoryScreen.php?category_id=' . $categoryId . '#product-' . $producto['ID'] . '">
                    <input type="hidden" name="productId" value="' . $producto['ID'] . '">
                    <button type="submit" name="manageLikes" class="' . $likeButtonClass . '"></button>
                    </form>  
                    <a href="biddScreen.php?product_id=' . $producto['ID'] . '"><button class="bidButton">Pujar</button></a>';
                
        }
        echo ' 
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