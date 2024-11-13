<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profileScreen.css">
    <title>Profile</title>
</head>
<body>
    <!-- Barra superior con el logo -->
    <header class="topBar">
        <div class="logoContainer">
            <a href="loggedMainScreen.php"><img class="logo" src="../../img/logoText.png" alt="Logo Biddly"></a>
        </div>

        <div class="profileSection">
            <img src="../../img/logoUser.png" alt="Imagen de perfil" class="profileImage">
            <span class="profileName">NombreUsuario</span>
        </div>
    </header>

    <div class="orangeLine"></div>
    <div class="title">Editar perfil</div>

    <div class="mainContent">
        <!-- Contenedor del formulario de editar perfil -->
        <div class="profileContainer">
            <a href="mainScreen.php">
                <div class="closeButton">✕</div>
            </a>

            <form class="profileForm">
                <div class="name">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" placeholder="Sonia">
                </div>

                <div class="email">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" placeholder="sonia@gmail.com">
                </div>

                <div class="password">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" placeholder="••••••••">
                </div>

                <div class="password2">
                    <label for="repeatPassword">Repetir contraseña</label>
                    <input type="password" id="repeatPassword" placeholder="••••••••">
                </div>

                <div class="dni">
                    <label for="dni">DNI</label>
                    <input type="text" id="dni" placeholder="12345678A">
                </div>

                <div class="phone">
                    <label for="phone">Teléfono</label>
                    <input type="tel" id="phone" placeholder="123456789">
                </div>

                <div class="address">
                    <label for="address">Dirección</label>
                    <input type="text" id="address" placeholder="Calle Falsa 123">
                </div>

                <div class="bankAccount">
                    <label for="bankAccount">Cuenta bancaria</label>
                    <input type="text" id="bankAccount" placeholder="ES12 3456 7891 2345 6789">
                </div>

                <button type="submit" class="saveButton" formaction="profileScreen.php">Guardar</button>

            </form>
            <form action = "mainScreen">
                <button type="submit" class="closeSession">Cerrar sesión</button>
            </form> 
            
        </div>
    </div>
</body>
</html>

<?php include 'footer.php'; ?>


