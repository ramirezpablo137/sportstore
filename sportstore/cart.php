<?php
session_start();
include 'includes/header.php';
include 'includes/functions.php';
include 'includes/db.php'; // Incluye este archivo para definir $pdo

// Inicializar el carrito si no existe
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Función para agregar, actualizar o eliminar un producto del carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            // Verificar si el producto ya está en el carrito
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                $_SESSION['cart'][$product_id] = $quantity;
            }
            break;

        case 'update':
            // Actualizar la cantidad del producto en el carrito si la cantidad es mayor que cero
            if ($quantity > 0) {
                $_SESSION['cart'][$product_id] = $quantity;
            } else {
                unset($_SESSION['cart'][$product_id]); // Eliminar el producto si la cantidad es cero o menos
            }
            break;

        case 'remove':
            // Eliminar el producto del carrito
            if (isset($_SESSION['cart'][$product_id])) {
                unset($_SESSION['cart'][$product_id]);
            }
            break;
    }

    // Redirigir para evitar el reenvío del formulario
   
}

// Obtener detalles del carrito
$cart_items = [];
$total = 0;

foreach ($_SESSION['cart'] as $id => $quantity) {
    if ($quantity > 0) { // Asegurarse de que la cantidad sea válida
        $product = getProductById($pdo, $id);
        if ($product) {
            $product['quantity'] = $quantity;
            $product['subtotal'] = $product['Precio'] * $quantity;
            $total += $product['subtotal'];
            $cart_items[] = $product;
        }
    }
}
?>

<main>
    <h1>Carrito</h1>
    <?php if (empty($cart_items)): ?>
        <p>Tu carrito</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>cantidad</th>
                    <th>Subtotal</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_items as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['Nombre']); ?></td>
                        <td>$<?php echo number_format($item['Precio'], 2); ?></td>
                        <td>
                            <form action="cart.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $item['Id']; ?>">
                                <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                                <button type="submit" name="action" value="update">Actualizar</button>
                            </form>
                        </td>
                        <td>$<?php echo number_format($item['subtotal'], 2); ?></td>
                        <td>
                            <form action="cart.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $item['Id']; ?>">
                                <button type="submit" name="action" value="remove">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p>Total: $<?php echo number_format($total, 2); ?></p>
        <a href="checkout.php">Proceder al pago</a>
    <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>
