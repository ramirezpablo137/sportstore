<?php
include 'includes/header.php';
include 'includes/functions.php';
include 'includes/db.php';

session_start();
$user_id = $_SESSION['user_id'];

$orders = getOrdersByUserId($pdo, $user_id);
?>

<main>
    <h2>Mis Pedidos</h2>
    <?php if (empty($orders)): ?>
        <p>No tienes pedidos.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['id']); ?></td>
                        <td><?php echo htmlspecialchars($order['fecha']); ?></td>
                        <td>$<?php echo number_format($order['total'], 2); ?></td>
                        <td><?php echo htmlspecialchars($order['estado']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>
