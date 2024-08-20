<?php
include 'includes/header.php';
include 'includes/functions.php';
include 'includes/db.php';

$products = getProducts($pdo);
?>

<style>
.products-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 20px;
    background: linear-gradient(135deg, #f0f0f0 0%, #e0e0e0 100%);
}

.products-box {
    background: #fafafa;
    border-radius: 15px;
    padding: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    max-width: 1200px;
    margin: 0 auto;
    border: 1px solid #ddd;
    position: relative;
}

.products-box::before {
    content: "";
    position: absolute;
    top: 5px;
    left: 5px;
    right: 5px;
    bottom: 5px;
    border: 2px solid #ddd;
    border-radius: 15px;
    pointer-events: none;
}

.products {
    display: flex;
    flex-wrap: wrap;
    gap: 15px; /* Reducido el espacio entre tarjetas */
    justify-content: center;
}

.card {
    background: linear-gradient(180deg, #ffffff 0%, #f7f7f7 100%);
    border: 2px solid #ddd;
    border-radius: 12px; /* Bordes menos redondeados */
    padding: 15px; /* Reducido el padding */
    text-align: center;
    width: 25%; /* Reducido el ancho para permitir más tarjetas por fila */
    box-sizing: border-box;
    min-height: 250px; /* Altura mínima reducida */
    transition: transform 0.3s, box-shadow 0.3s, border-color 0.3s;
    overflow: hidden;
}

.card:hover {
    transform: scale(1.03);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    border-color: #333;
}

.card img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    transition: transform 0.3s;
}

.card img:hover {
    transform: scale(1.05);
}

.card h3 {
    font-size: 16px; /* Tamaño de fuente reducido */
    margin-bottom: 8px;
    color: #333;
    font-family: 'Arial', sans-serif;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
}

.card p {
    font-size: 12px; /* Tamaño de fuente reducido */
    margin-bottom: 12px;
    color: #666;
    font-family: 'Arial', sans-serif;
    transition: color 0.3s;
}

.card p:hover {
    color: #000;
}

.card .price {
    font-size: 14px; /* Tamaño de fuente reducido */
    font-weight: bold;
    color: #333;
    margin-bottom: 12px;
}

.card .btn {
    display: inline-block;
    background-color: #000;
    color: #fff;
    padding: 8px 16px; /* Tamaño reducido del botón */
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px; /* Tamaño de fuente reducido */
    border: 2px solid #000;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
}

.card .btn:hover {
    background-color: #333;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.card .btn::before {
    content: '🛒';
    margin-right: 6px;
    font-size: 16px;
    vertical-align: middle;
}
</style>

<main>
    <div class="products-box">
        <div class="products">
            <?php if (empty($products)): ?>
                <p>Producto no disponible</p>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($product['Imagen']); ?>" alt="<?php echo htmlspecialchars($product['Nombre']); ?>">
                        <h3><?php echo htmlspecialchars($product['Nombre']); ?></h3>
                        <p><?php echo htmlspecialchars($product['Descripcion']); ?></p>
                        <p class="price">$<?php echo number_format($product['Precio'], 2); ?></p>
                        <form action="cart.php" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['Id']); ?>">
                            <input type="number" name="quantity" value="1" min="1" style="width: 50px; margin-right: 8px;"> <!-- Reducido el ancho -->
                            <button type="submit" class="btn" name="action" value="add">Añadir al carrito</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>