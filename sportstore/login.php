<?php
include 'includes/header.php';
include 'includes/functions.php';
include 'includes/db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['passworda'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nombre'];
        $_SESSION['user_level'] = $user['nivel'];
        header('Location: index.php');
        exit;
    } else {
        echo "<p>Credenciales incorrectas.</p>";
    }
}
?>

<main>
    <h2>Inicio de Sesión</h2>
    <form action="login.php" method="POST">
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Iniciar Sesión</button>
    </form>
</main>

<?php include 'includes/footer.php'; ?>
