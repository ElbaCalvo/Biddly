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

    // Incluir el controlador de productos
    require_once '../controller/productController.php';
    $productController = new ProductController();

    // Eliminar producto si es necesario
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['usuario'] == 'Admin') {
        $productController->deleteProduct($_POST['deleteProduct']);
    }

    // Obtener el ID de la categoría de la URL
    $categoryId = isset($_GET['category_id']) ? $_GET['category_id'] : 0;

    // Obtener los productos de la categoría seleccionada
    $productos = $productController->getProductsByCategory($categoryId);

    // Obtener la información de la categoría
    $category = $productController->getCategoryById($categoryId);

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
        echo ' <form action=loggedCategoryScreen.php?category_id='.$_GET['category_id'].' method="POST">
        <div class="contentContainer">
            <img src="' . $producto['URL_Imagen'] . '" alt="' . $producto['Nombre'] . '">
            <div class="info">
                <div class="productName">' . $producto['Nombre'] . '</div>
                <div class="price">' . $producto['Precio'] . '€' . '</div>';
        if ($_SESSION["usuario"] = "Admin") {
            echo '<button class="deleteButton" name="deleteProduct" value="' . $producto['ID'] . '">Eliminar</button>';
        } else {
            echo '<button class="likeButton"></button>
                <button class="bidButton">Pujar</button>';
        }
        echo '<div class="description">
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