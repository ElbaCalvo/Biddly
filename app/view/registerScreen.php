<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registerScreen.css">
    <title>Register</title>
</head>

<body>
    <?php
    require_once "../controller/UsuarioController.php";

    session_start();

    $usuarioController = new UsuarioController();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registerForm'])) {

        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
        $contrasena = filter_input(INPUT_POST, 'contrasena', FILTER_SANITIZE_STRING);
        $correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
        $dni = filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_STRING);
        if (!$usuario && !$correo && !$contrasena && !$dni) {

            $isRegistered = $usuarioController->addUsuario($usuario, $contrasena, $correo, $_POST['telefono'], $dni);
            if ($isRegistered) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['contrasena'] = $contrasena;
                header("Location: loggedMainScreen.php");
                exit();
            } else {
                echo "<script>alert('Error al registrar el usuario.')</script>";
            }
        } else {
            echo "<script>alert('Error al registrar el usuario, caracteres no válidos.')</script>";
        }
    }
    ?>
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
            <form class="registerForm" action="registerScreen.php" method="POST">
                <input type="hidden" name="registerForm">
                <label>Nombre de Usuario</label>
                <input type="text" name="usuario" id="username" placeholder="Juan" required>

                <label>Correo electrónico</label>
                <input type="email" name="correo" id="email" placeholder="juan@gmail.com" required>

                <label>Contraseña</label>
                <input type="password" name="contrasena" id="password" placeholder="••••••••" required>

                <label>Repetir contraseña</label>
                <input type="password" id="password2" placeholder="••••••••" required>

                <label>DNI/NIF</label>
                <input type="text" name="dni" id="dni" placeholder="12345678A" required>

                <label>Teléfono</label>
                <input type="text" name="telefono" id="telefono" placeholder="+34666666666" required>

                <button type="submit" class="registerButton">Registrarse</button>

                <div class="loginLink">
                    <span>¿Ya tienes cuenta?</span> <a href="signInScreen.php">Inicia sesión</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php include 'footer.php'; ?>