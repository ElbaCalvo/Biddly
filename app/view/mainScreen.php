<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biddly</title>
    <link rel="stylesheet" href="mainScreen.css">
</head>

<body>
    <!-- Logo, barra de busqueda y botones de inicio de sesión y registro. -->
    <header class="topBar">
        <div class="logoContainer">
            <a href="mainScreen.php"><img class="logo" src="../../img/logoText.png" alt="Logo Biddly"></a>
        </div>

        <input class="searchBar" type="text" placeholder="Empieza a buscar por categoria o nombre...">
        <a href="signInScreen.php"><img class="topBarButtons" src="../../img/signin.png" alt=""></a>
        <a href="registerScreen.php"><img class="topBarButtons" src="../../img/register.png" alt=""></a>
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
                <p>descripción descripción descripción descripción descripción descripción descripción descripción
                    descripción descripción descripción...</p>
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
                <p>descripción descripción descripción descripción descripción descripción descripción descripción
                    descripción descripción descripción...</p>
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
                <p>descripción descripción descripción descripción descripción descripción descripción descripción
                    descripción descripción descripción...</p>
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