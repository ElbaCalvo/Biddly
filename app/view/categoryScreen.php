<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="categoryScreen.css">
</head>

<body>
    <header class="topBar">
        <div class="logoContainer">
            <a href="mainScreen.php"><img class="logo" src="../../img/logoText.png" alt="Logo Biddly"></a>
        </div>

        <div class="buttonSection">
            <a href="signInScreen.php"><img class="topBarButtons" src="../../img/signin.png" alt=""></a>
            <a href="registerScreen.php"><img class="topBarButtons" src="../../img/register.png" alt=""></a>
        </div>
    </header>

    <div class="orangeLine"></div>
    <div class="categoryTypeContainer">
        <div class="categoryType">Ropa</div>
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

    <div class="contentContainer">
        <img src="../../img/mando.png" alt="Xbox Elite Controller">
        <div class="info">
            <div class="productName">XBOX ELITE 2 Core Edition</div>
            <div class="price">50€</div>
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
</body>

</html>