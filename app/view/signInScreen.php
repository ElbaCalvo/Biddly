<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signInScreen.css">
    <title>Sing In</title>
</head>

<body>
    <!-- Barra superior con el logo -->
    <header class="topBar">
        <div class="logoContainer">
            <a href="mainScreen.php"><img class="logo" src="../../img/logoText.png" alt="Logo Biddly"></a>
        </div>
    </header>

    <div class="orangeLine"></div>

    <div class="mainContent">
        <!-- Contenedor de inicio de sesión -->
        <div class="signInContainer">
            <a href="mainScreen.php">
                <div class="closeButton">✕</div>
            </a>
            <form class="signInForm">
                <label>Correo electrónico</label>
                <input type="email" id="email" placeholder="sonia@gmail.com" required>

                <label>Contraseña</label>
                <input type="password" id="password" placeholder="••••••••" required>

                <button type="submit" class="signInButton">Iniciar sesión</button>

                <div class="registerLink">
                    <span>¿No tienes cuenta?</span> <a href="registerScreen.php">Regístrate</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php include 'footer.php'; ?>