<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profileScreen.css">
    <title>Profile</title>
</head>

<body>
    <?php
    session_start();
    // Si no hay una sesión iniciada, redirige al usuario a la pantalla principal
    if (!isset($_SESSION['usuario'])) {
        header("Location: mainScreen.php");
        exit();
    }

    if (isset($_GET['cerrarsesion']) && $_GET['cerrarsesion'] === 'true') {
        session_destroy();
        header("Location: mainScreen.php");
        exit();
    }
    
    ?>
    <!-- Barra superior con el logo -->
    <header class="topBar">
        <div class="logoContainer">
            <a href="loggedMainScreen.php"><img class="logo" src="../../img/logoText.png" alt="Logo Biddly"></a>
        </div>

        <div class="profileSection">
            <img src="../../img/logoUser.png" alt="Imagen de perfil" class="profileImage">
            <?php
            echo '<span class="profileName">' . $_SESSION['usuario'] . '</span>';
            ?>

        </div>
    </header>

    <div class="orangeLine"></div>
    <div class="title">Mi Perfil</div>

    <div class="profileContent">
        <!-- Contenedor del formulario de editar perfil -->
        <a href="profileScreen.php" class="saveButton2 perfil">Editar perfil</a>
        <a href="misPujas.php" class="saveButton2 misPujas">Mis pujas</a>
        <a href="myProductsScreem.php" class="saveButton2 misProductos">Mis productos</a>
        <a href="profile.php?cerrarsesion=true" class="closeSession cerrar">Cerrar sesión</a>
    </div>
</body>

</html>

<?php include 'footer.php'; ?>