<?php
ob_start(); // Inicia el almacenamiento en búfer de salida

include 'includes/header.php';
include 'includes/functions.php';
include 'includes/db.php';

// Inicializar variables para los mensajes de error
$registerError = $loginError = "";

// Registro de nuevo usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (empty($nombre) || empty($email) || empty($_POST['password'])) {
        $registerError = "Todos los campos son requeridos.";
    } else {
        $sql = "INSERT INTO usuario (nombre, email, passworda, nivel) VALUES (?, ?, ?, 'user')";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([$nombre, $email, $password]);
            header('Location: index.php');
            exit();
        } catch (PDOException $e) {
            $registerError = "Error al registrar el usuario: " . $e->getMessage();
        }
    }
}

// Inicio de sesión de usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $loginError = "Todos los campos son requeridos.";
    } else {
        $sql = "SELECT * FROM usuario WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['passworda'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nombre'];
            $_SESSION['user_level'] = $user['nivel'];

            if ($user['nivel'] === 'admin') {
                header('Location: admin.php');
            } else {
                header('Location: index.php');
            }
            exit();
        } else {
            $loginError = "Credenciales incorrectas.";
        }
    }
}

// Limpia el almacenamiento en búfer de salida
ob_end_flush();
?>

<main>
    <section>
        <h2>Registro</h2>
        <form action="account.php" method="POST">
            <label for="register-name">Nombre:</label>
            <input type="text" id="register-name" name="nombre" required>
            <label for="register-email">Email:</label>
            <input type="email" id="register-email" name="email" required>
            <label for="register-password">Contraseña:</label>
            <input type="password" id="register-password" name="password" required>
            <button type="submit" name="register">Registrarse</button>
            <?php if ($registerError): ?>
                <p><?php echo htmlspecialchars($registerError); ?></p>
            <?php endif; ?>
        </form>
    </section>

    <section>
        <h2>Inicio de Sesión</h2>
        <form action="account.php" method="POST">
            <label for="login-email">Email:</label>
            <input type="email" id="login-email" name="email" required>
            <label for="login-password">Contraseña:</label>
            <input type="password" id="login-password" name="password" required>
            <button type="submit" name="login">Iniciar Sesión</button>
            <?php if ($loginError): ?>
                <p><?php echo htmlspecialchars($loginError); ?></p>
            <?php endif; ?>
        </form>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
