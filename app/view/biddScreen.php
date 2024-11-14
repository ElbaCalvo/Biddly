<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="biddScreen.css">
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

    <div class="orangeLine1"></div>

    <div class="content">
        <div class="contentLeft">
            <img class="imgContent" src="../../img/mando.png" alt="Xbox Elite Controller">
            <div class="user">
                <img src="../../img/logoUser.png" alt="Icono Usuario">
                Angel Carballo Gonzalez
            </div>
            <div class="description">
                <strong>Descripción</strong><br>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            </div>
        </div>
        <div class="contentRight">
            <div class="price">50€</div>
            <div class="productName">XBOX ELITE 2 Core Edition</div>
            <button class="likeButton"></button>
            <input type="number" name="puja">
            <button class="bidButton">Pujar</button>
            <div class="orangeLine2"></div>
            <strong>Registro de pujas</strong><br>
            <div class="biddingRegister">
                <p>Ejemeplo1</p>
            </div>
            <div class="bidTime">
                3 Dec. 2024, 08:41
            </div>
        </div>
    </div>
</body>

</html>
<?php include 'footer.php'; ?>