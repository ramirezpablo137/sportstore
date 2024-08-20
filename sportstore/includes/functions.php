<?php

// Función para obtener todos los productos
function getProducts($pdo) {
    $sql = "SELECT * FROM productos";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para obtener todas las categorías (si existen en la base de datos)
// Parece que no tienes una tabla de categorías según el esquema proporcionado
function getCategories($pdo) {
    // Si no tienes una tabla de categorías, puedes eliminar esta función o implementarla si tienes una tabla de categorías
    return [];
}

// Función para obtener un producto específico por su ID
function getProductById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM productos WHERE Id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


// Ejemplo de función para obtener detalles del usuario
function getUserById($pdo, $user_id) {
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE id = ?");
    $stmt->execute([$user_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Ejemplo de función para obtener pedidos del usuario
function getOrdersByUserId($pdo, $user_id) {
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE user_id = ?");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function register($pdo, $email, $password, $name) {
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO usuario (nombre, email, passworda, nivel) VALUES (?, ?, ?, 'user')");
    return $stmt->execute([$name, $email, $hash]);
}

function getAllOrders($pdo) {
    $stmt = $pdo->prepare("SELECT o.id, u.nombre as cliente, o.fecha, o.total, o.estado FROM orders o JOIN usuario u ON o.user_id = u.id");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



?>