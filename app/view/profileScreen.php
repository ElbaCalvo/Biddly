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
    require_once '../controller/UsuarioController.php';
    session_start();
    $UsuarioController = new UsuarioController();

    // Si no hay una sesión iniciada, redirige al usuario a la pantalla principal
    if (!isset($_SESSION['usuario'])) {
        header("Location: mainScreen.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateUser'])) {

        $contrasena = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $correo = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $dni = filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $bankAccount = filter_input(INPUT_POST, 'bankAccount', FILTER_SANITIZE_STRING);

        if ($_POST['password'] != $_POST['repeatPassword']) {
            echo "<script>alert('Las contraseñas no coinciden.')</script>";
        } else {
            $UsuarioController->updateUsuario($_SESSION["usuario"], $correo, $contrasena, $dni, $phone, $address, $bankAccount);
            echo "<script>alert('Perfil actualizado')</script>";
        }
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
    <div class="title">Editar perfil</div>

    <div class="mainContent">
        <!-- Contenedor del formulario de editar perfil -->
        <div class="profileContainer">
            <a href="profile.php">
                <div class="closeButton">✕</div>
            </a>

            <?php
            if ($_SESSION['usuario'] != 'Admin') {
                echo '<form class="profileForm" method="POST" action="profileScreen.php">

                <div class="email">
                    <label for="email">Correo electrónico</label>
                    <input type="email" name="email" value="sonia@gmail.com" required>
                </div>

                <div class="password">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>

                <div class="password2">
                    <label for="repeatPassword">Repetir contraseña</label>
                    <input type="password" name="repeatPassword" placeholder="••••••••" required>
                </div>

                <div class="dni">
                    <label for="dni">DNI</label>
                    <input type="text" name="dni" placeholder="12345678A" maxlength="9" required>
                </div>

                <div class="phone">
                    <label for="phone">Teléfono</label>
                    <input type="tel" name="phone" placeholder="123456789" maxlength="9" required>
                </div>

                <div class="address">
                    <label for="address">Dirección</label>
                    <input type="text" name="address" placeholder="Calle Falsa 123" maxlength="20" required>
                </div>

                <div class="bankAccount">
                    <label for="bankAccount">Cuenta bancaria</label>
                    <input type="text" name="bankAccount" placeholder="ES12 3456 7891 2345 6789" maxlength="24" required>
                </div>

                <button type="submit" class="saveButton" name="updateUser">Guardar</button>

            </form>';
            }
            ?>
        </div>
    </div>
</body>

</html>

<?php include 'footer.php'; ?>