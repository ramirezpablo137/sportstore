<?php
include 'includes/header.php';
include 'includes/functions.php';
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    if (register($pdo, $email, $password, $name)) {
        echo "<p>Registro exitoso. <a href='account.php'>Inicia sesión aquí</a>.</p>";
    } else {
        echo "<p>Hubo un error en el registro.</p>";
    }
}
?>

<main>
    <h2>Registro</h2>
    <form action="register.php" method="POST">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Registrar</button>
    </form>
</main>

<?php include 'includes/footer.php'; ?>
