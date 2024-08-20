<?php
// db.php
$host = 'localhost'; // o tu host
$dbname = 'sportstore'; // o tu nombre de base de datos
$user = 'root'; // o tu usuario de base de datos
$password = ''; // o tu contraseña de base de datos

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
