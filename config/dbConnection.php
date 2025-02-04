<?php
/**
 * Establece una conexión a la base de datos.
 *
 * @return PDO|null Conexión PDO establecida o null en caso de error.
 */
function getDBConnection()
{
    $host = "localhost";
    $db_name = "biddly";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}
?>