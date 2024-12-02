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
    session_start();
    require_once "../controller/productController.php";
    $productController = new ProductController();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addProductForm'])) {

        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $precio = $_POST['precio'];
        $descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING);
        $img = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
        $categoria = $_POST['categoria'];
        $vendedor = $_SESSION['usuario'];
        $fecha = $_POST['fecha'];

        if ($nombre && $precio && $categoria && $descripcion && $img && $vendedor && $fecha){
        $product_id = $productController->addProduct($nombre, $descripcion, $categoria, $precio, $img, $fecha, $vendedor);

        if ($product_id) {
            header("Location: biddScreen.php?product_id=$product_id");
            exit();
        } else {
            echo "<script>alert('Error al registrar el producto en la base de datos.')</script>";
        }
    } 
}

    ?>
        <!-- Logo, barra de busqueda y botones de inicio de favoritos y usuario. -->
        <header class="topBar">
            <div class="logoContainer">
                <a href="loggedMainScreen.php"><img class="logo" src="../../img/logoText.png" alt="Logo Biddly"></a>
            </div>

        <div class="buttonSection">
            <a href="favoritesScreen.php"><img src="../../img/favoritesIcon.png" alt="Imagen de favoritos"
                    class="favoritesImage"></a>
            <a href="profileScreen.php"><img src="../../img/logoUser.png" alt="Imagen de perfil"
                    class="profileImage"></a>
            <?php
            echo '<span class="profileName">' . $_SESSION['usuario'] . '</span>';
            ?>
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
                <input type="number" name="precio" id="price" placeholder="50€" min=1 required>

                <label>Categoría</label>
                <select name="categoria" id="categoria" required>
                    <option value="">Seleccione una categoría</option>
                    <option value="1">Ropa</option>
                    <option value="2">Deporte</option>
                    <option value="3">Tecnología</option>
                    <option value="4">Vehículos</option>
                    <option value="5">Libros</option>
                    <option value="6">Mobiliario</option>
                </select>

                <label>URL de la imagen</label>
                <input type="text" id="url" name="url" placeholder="https://safetypricelectronics.com/spcontents/u/2022/07/games-g664c6d5aa_1920.jpg" required>

                <label>Fecha de la subasta</label>
                <input type="datetime-local" name="fecha" id="date" min=<?php echo date('Y-m-d\TH:i') ?> required> <!-- \T es la separacion y H:i la hora actual -->

                <label>Descripción del producto</label>
                <input type="text" name="descripcion" id="description" placeholder="descripción" required>

                <button type="submit" class="addButton">Subir producto</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php include 'footer.php'; ?>