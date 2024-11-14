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
    ?>
    <!-- Logo, barra de busqueda y botones de inicio de favoritos y usuario. -->
    <header class="topBar">
        <div class="logoContainer">
            <a href="loggedMainScreen.php"><img class="logo" src="../../img/logoText.png" alt="Logo Biddly"></a>
        </div>

        <input class="searchBar" type="text" placeholder="Empieza a buscar por categoria o nombre...">

        <div class="buttonSection">
            <a href="addProductScreen.php"><img src="../../img/addProductEmpty.png" alt="Boton añadir prducto" class="addButton"></a>
            <a href="favoritesScreen.php"><img src="../../img/favoritesIcon.png" alt="Imagen de favoritos" class="favoritesImage"></a>
            <a href="profileScreen.php"><img src="../../img/logoUser.png" alt="Imagen de perfil" class="profileImage"></a>
            <?php
            echo '<span class="profileName">' . $_SESSION['usuario'] . '</span>';
            ?>
            
        </div>
    </header>

    <div class="orangeLine"></div>

    <!-- seccion de Favoritos -->
    <div class="comunityFavorites">Favoritos de la comunidad</div>

    <div class="favoritesContainer">
        <div class="contentContainer">
            <img src="../../img/mando.png" alt="Xbox Elite Controller">
            <div class="price">50€</div>
            <div class="productName">XBOX ELITE 2 Core Edition</div>
            <button class="likeButton"></button>
            <button class="bidButton">Pujar</button>
            <div class="description">
                <strong>Descripción</strong><br>
                <p>descripción descripción descripción descripción descripción descripción descripción descripción descripción descripción descripción...</p>
            </div>
            <div class="bidTime">
                3 Dec. 2024, 08:41
            </div>
        </div>

        <div class="contentContainer">
            <img src="../../img/mando.png" alt="Xbox Elite Controller">
            <div class="price">50€</div>
            <div class="productName">XBOX ELITE 2 Core Edition</div>
            <button class="likeButton"></button>
            <button class="bidButton">Pujar</button>
            <div class="description">
                <strong>Descripción</strong><br>
                <p>descripción descripción descripción descripción descripción descripción descripción descripción descripción descripción descripción...</p>
            </div>
            <div class="bidTime">
                3 Dec. 2024, 08:41
            </div>
        </div>

        <div class="contentContainer">
            <img src="../../img/mando.png" alt="Xbox Elite Controller">
            <div class="price">50€</div>
            <div class="productName">XBOX ELITE 2 Core Edition</div>
            <button class="likeButton"></button>
            <button class="bidButton">Pujar</button>
            <div class="description">
                <strong>Descripción</strong><br>
                <p>descripción descripción descripción descripción descripción descripción descripción descripción descripción descripción descripción...</p>
            </div>
            <div class="bidTime">
                3 Dec. 2024, 08:41
            </div>
        </div>
    </div>

    <!-- Barra naranja de separacion -->
    <div class="orangeLine2"></div>

    <div class="comunityFavorites">Categorías</div>

    <!-- Categorías -->
    <div class="categoryContainer">
        <a href="loggedCategoryScreen.php">
            <button class="contentContainer">
                <img class="image" src="../../img/clothes.jpg" alt="clothes">
                <div class="cat">ROPA</div>
            </button>
        </a>
        <a href="loggedCategoryScreen.php">
            <button class="contentContainer">
                <img class="image" src="../../img/sports.jpg" alt="sports">
                <div class="cat">DEPORTES</div>
            </button>
        </a>
        <a href="loggedCategoryScreen.php">
            <button class="contentContainer">
                <img class="image" src="../../img/tecnology.jpg" alt="tecnology">
                <div class="cat">TECNOLOGÍA</div>
            </button>
        </a>
        <a href="loggedCategoryScreen.php">
            <button class="contentContainer">
                <img class="image" src="../../img/vehicles.jpg" alt="vehicles">
                <div class="cat">VEHÍCULOS</div>
            </button>
        </a>
        <a href="loggedCategoryScreen.php">
            <button class="contentContainer">
                <img class="image" src="../../img/books.jpg" alt="books">
                <div class="cat">LIBROS</div>
            </button>
        </a>
        <a href="loggedCategoryScreen.php">
            <button class="contentContainer">
                <img class="image" src="../../img/furniture.jpg" alt="furniture">
                <div class="cat">MOBILIARIA</div>
            </button>
        </a>
    </div>
</body>
</html>

<?php include 'footer.php'; ?>