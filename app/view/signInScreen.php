<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signInScreen.css">
    <title>Sing In</title>
</head>

<body>
    <?php
    require_once "../controller/UsuarioController.php";

    session_start();

    $usuarioController = new UsuarioController();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signInForm'])) {
        $usuario = htmlspecialchars($_POST['usuario']);
        $contrasena = htmlspecialchars($_POST['contrasena']);

        if ($usuario && $contrasena) {
            $isRegistered = $usuarioController->comprobarUsuario($_POST['usuario'], $_POST['contrasena']);
            if ($isRegistered) {
                $_SESSION['usuario'] = $_POST['usuario'];
                $_SESSION['contrasena'] = $_POST['contrasena'];
                header("Location: loggedMainScreen.php");
                exit();
            } else {
                echo "<p>Error al iniciar sesión. Por favor, inténtelo de nuevo.</p>";
            }
        } else {
            echo "Valores no validos";
        }

    }
    ?>
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
            <form class="signInForm" action="signInScreen.php" method="POST">
                <input type="hidden" name="signInForm">
                <label>Usuario</label>
                <input type="text" name="usuario" id="usuario" placeholder="Usuario" required>

                <label>Contraseña</label>
                <input type="password" name="contrasena" id="contrasena" placeholder="••••••••" required>

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