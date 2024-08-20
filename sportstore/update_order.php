<?php
include 'includes/functions.php';
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE orders SET estado = ? WHERE id = ?");
    $stmt->execute([$status, $order_id]);

    header('Location: admin_orders.php');
    exit;
}
?>
