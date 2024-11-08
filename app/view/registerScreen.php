<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registerScreen.css">
    <title>Sing In</title>
</head>

<body>
    <header class="topBar">
        <div class="logoContainer">
            <a href="mainScreen.php"><img class="logo" src="../../img/logoText.png" alt="Logo Biddly"></a>
        </div>
    </header>
    <div class="orangeLine"></div>

    <div class="mainContent">
        <div class="registerContainer">
            <a href="mainScreen.php">
                <div class="closeButton">✕</div>
            </a>
            <form class="registerForm">
                <label>Nombre de Usuario</label>
                <input type="text" id="username" placeholder="Juan" required>

                <label>Correo electrónico</label>
                <input type="email" id="email" placeholder="juan@gmail.com" required>

                <label>Contraseña</label>
                <input type="password" id="password" placeholder="••••••••" required>

                <label>Repetir contraseña</label>
                <input type="password" id="password2" placeholder="••••••••" required>

                <label>DNI/NIF</label>
                <input type="text" id="dni" placeholder="12345678A" required>

                <label>Teléfono</label>
                <input type="text" id="phone" placeholder="+34666666666" required>

                <button type="submit" class="registerButton">Registrarse</button>

                <div class="loginLink">
                    <span>¿Ya tienes cuenta?</span> <a href="signInScreen.php">Inicia sesión</a>
                </div>
            </form>
            </form>
        </div>
    </div>
</body>

</html>

<?php include 'footer.php'; ?>