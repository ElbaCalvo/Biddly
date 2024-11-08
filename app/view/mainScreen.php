<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <!-- navegacion por Categorias -->
    <!-- <nav>
        <a href="">
            <li class="selected">Todos</li>
        </a>
        <a href="">
            <li>Ropa</li>
        </a>
        <a href="">
            <li>Deporte</li>
        </a>
        <a href="">
            <li>Tecnología</li>
        </a>
        <a href="">
            <li>Mobiliario</li>
        </a>
        <a href="">
            <li>Vehículo</li>
        </a>
    </nav> -->

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

    <div class="comunityFavorites">Categorias</div>

    <!-- Categorías -->
    <div class="malla">
        <div class="contentContainer">
            <img src="../../img/mando.png" alt="Xbox Elite Controller">
            <div class="cat">MODA</div>
        </div>
        <div class="contentContainer">
            <img src="../../img/mando.png" alt="Xbox Elite Controller">
            <div class="cat">MODA</div>
        </div>
        <div class="contentContainer">
            <img src="../../img/mando.png" alt="Xbox Elite Controller">
            <div class="cat">MODA</div>
        </div>
        <div class="contentContainer">
            <img src="../../img/mando.png" alt="Xbox Elite Controller">
            <div class="cat">MODA</div>
        </div>
        <div class="contentContainer">
            <img src="../../img/mando.png" alt="Xbox Elite Controller">
            <div class="cat">MODA</div>
        </div>
    </div>
    <!-- <div class="contentContainer">
        <img src="../../img/mando.png" alt="Xbox Elite Controller">
        <div class="price">50€</div>
        <div class="productName">XBOX ELITE 2 Core Edition</div>
        <button class="likeButton"></button>
        <button class="bidButton">Pujar</button>
        <div class="bidTime">
            3 Dec. 2024, 08:41
        </div>
    </div> -->

</body>

</html>

<?php include 'footer.php'; ?>