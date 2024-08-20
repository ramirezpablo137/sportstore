<?php
include 'includes/header.php';
include 'includes/functions.php';
include 'includes/db.php';

session_start();
if ($_SESSION['user_level'] !== 'admin') {
    header('Location: index.php');
    exit;
}

$orders = getAllOrders($pdo); // Se necesita una función para obtener todos los pedidos
?>

<main>
    <h2>Gestión de Pedidos</h2>
    <?php if (empty($orders)): ?>
        <p>No hay pedidos.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['id']); ?></td>
                        <td><?php echo htmlspecialchars($order['cliente']); ?></td>
                        <td><?php echo htmlspecialchars($order['fecha']); ?></td>
                        <td>$<?php echo number_format($order['total'], 2); ?></td>
                        <td><?php echo htmlspecialchars($order['estado']); ?></td>
                        <td>
                            <form action="update_order.php" method="POST">
                                <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order['id']); ?>">
                                <select name="status">
                                    <option value="pendiente" <?php echo $order['estado'] === 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                                    <option value="enviado" <?php echo $order['estado'] === 'enviado' ? 'selected' : ''; ?>>Enviado</option>
                                    <option value="entregado" <?php echo $order['estado'] === 'entregado' ? 'selected' : ''; ?>>Entregado</option>
                                </select>
                                <button type="submit">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>
