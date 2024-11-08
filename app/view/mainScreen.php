<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mainScreen.css">
</head>
<body>
<<<<<<< Updated upstream
    <header class="topBar">  
=======
    <!-- Logo, barra de busqueda y botones de inicio de sesión y registro. -->
    <header class="topBar">
>>>>>>> Stashed changes
        <div class="logoContainer">
            <a href="mainScreen.php"><img class="logo" src="../../img/logoText.png" alt="Logo Biddly"></a>
        </div>

        <input class="searchBar" type="text" placeholder="Empieza a buscar por categoria o nombre...">
        <a href="signInScreen.php"><img class="topBarButtons" src="../../img/signin.png" alt=""></a>
        <a href="registerScreen.php"><img class="topBarButtons" src="../../img/register.png" alt=""></a>
    </header>

    <!-- navegacion por Categorias -->
    <nav>
        <a href=""><li class="selected">Todos</li></a>
        <a href=""><li>Ropa</li></a>
        <a href=""><li>Deporte</li></a>
        <a href=""><li>Tecnología</li></a>
        <a href=""><li>Mobiliario</li></a>
        <a href=""><li>Vehículo</li></a>
    </nav>

<<<<<<< Updated upstream
    <div class="contentContainer">
        <div class="comunityFavorites">Favoritos de la comunidad</div>
        <img src="../../img/mando.png" alt="Xbox Elite Controller">
        <div class="price">50€</div>
        <div class="productName">XBOX ELITE 2 Core Edition</div>
        <button class="bidButton">Pujar</button>
        <div class="description">
            <strong>Descripción</strong><br>
            <p>descripción descripción descripción descripción descripción descripción descripción descripción descripción descripción descripción...</p>
=======
    <!-- seccion de Favoritos -->
    <div class="favoritesContainer">
        <div class="contentContainer">
            <div class="comunityFavorites">Favoritos de la comunidad</div>
            <img src="../../img/mando.png" alt="Xbox Elite Controller">
            <div class="price">50€</div>
            <div class="productName">XBOX ELITE 2 Core Edition</div>
            <button class="bidButton">Pujar</button>
            <div class="description">
                <strong>Descripción</strong><br>
                <p>descripción descripción descripción descripción descripción descripción descripción descripción descripción descripción descripción...</p>
            </div>
            <div class="bidTime">
                3 Dec. 2024, 08:41
            </div>
>>>>>>> Stashed changes
        </div>
        <div class="bidTime">
            3 Dec. 2024, 08:41
        </div>
    </div>

    <!-- Barra naranja de separacion -->
    <div class="orangeLine"></div>
</body>
</html>

<?php include 'footer.php'; ?>