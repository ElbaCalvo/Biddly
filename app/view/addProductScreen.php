<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="addProductScreen.css">
</head>
<body>
    <?php
    require_once "../controller/productController.php";
    $productController = new ProductController();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addProductForm'])) {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $categoria = $_POST['categoria'];
        $descripcion = $_POST['descripcion'];
        $img = $_POST['url'];
        $vendedor = "_SESSION['usuario']";
        $fecha = $_POST['fecha'];

        $productController->addProduct($nombre,$descripcion,$categoria,$precio,$img,$fecha,$vendedor);

        echo "<script>alert('Producto registrado con exito.')</script>";
        header('Location: mainScreen.php');
        exit();
    }

    ?>
        <!-- Logo, barra de busqueda y botones de inicio de favoritos y usuario. -->
        <header class="topBar">
            <div class="logoContainer">
                <a href="loggedMainScreen.php"><img class="logo" src="../../img/logoText.png" alt="Logo Biddly"></a>
            </div>

            <div class="buttonSection">
                <a href="favoritesScreen.php"><img src="../../img/favoritesIcon.png" alt="Imagen de favoritos" class="favoritesImage"></a>
                <a href="profileScreen.php"><img src="../../img/logoUser.png" alt="Imagen de perfil" class="profileImage"></a>
                <span class="profileName">NombreUsuario</span>
            </div>
        </header>

        <div class="orangeLine"></div>
        <div class="title">Información del producto</div>

        <div class="mainContent">
        <div class="addProductContainer">
            <a href="loggedMainScreen.php">
                <div class="closeButton">✕</div>
            </a>
            <form class="addProductForm" method="POST" action="addProductScreen.php">
                <input type="hidden" name="addProductForm">
                <label>Nombre del producto</label>
                <input type="text" name="nombre" id="name" placeholder="Mandos XBOX" required>

                <label>Precio del producto</label>
                <input type="number" name="precio" id="price" placeholder="50€" required>

                <label>Categoría</label>
                <select name="categoria" id="categoria" required>
                    <option value="">Seleccione una categoría</option>
                    <option value="ropa">Ropa</option>
                    <option value="deporte">Deporte</option>
                    <option value="tecnologia">Tecnología</option>
                    <option value="vehiculo">Vehículos</option>
                    <option value="vehiculo">Libros</option>
                    <option value="mobiliario">Mobiliario</option>
                </select>

                <label>URL de la imagen</label>
                <input type="text" id="url" name="url" placeholder="https://safetypricelectronics.com/spcontents/u/2022/07/games-g664c6d5aa_1920.jpg" required>

                <label>Fecha de la subasta</label>
                <input type="datetime-local" name="fecha" id="date" placeholder="14/06/2024, 22:00" required>

                <label>Descripción del producto</label>
                <input type="text" name="descripcion" id="description" placeholder="descripción" required>

                <button type="submit" class="addButton">Subir producto</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php include 'footer.php'; ?>