<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Store</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        /* Banda de aviso */
        .header-announcement {
            background-color: #2c2c2c; /* Gris oscuro */
            color: #fff;
            text-align: center;
            padding: 5px 0;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed; /* Fija la banda en la parte superior */
            top: 0;
            left: 0;
            width: 100%;
            box-sizing: border-box;
            z-index: 1; /* Asegura que la banda esté por encima del contenido */
        }

        .header-announcement img {
            margin-right: 10px;
            vertical-align: middle;
            max-height: 20px; /* Ajusta la altura según sea necesario */
        }

        /* Estilos del header */
        header {
            background: linear-gradient(to right, #000000 30%, #1a1a1C); /* Degradado de negro a gris oscuro */
            color: #fff;
            padding: 15px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            height: 110px;
            box-sizing: border-box;
            position: fixed; /* Fija el header en la parte superior */
            top: 30px; /* Ajusta el espacio para que no se superponga con la banda de envíos */
            left: 0;
            z-index: 2; /* Asegura que el header esté por encima del contenido */
        }

        header img {
            max-height: 100px;
        }

        /* Contenedor para centrar los botones */
        .nav-container {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        nav {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        nav li {
            margin: 0 20px; /* Separación ajustada */
        }

        nav a {
            color: #ddd;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            position: relative;
        }

        nav a:hover {
            color: #fff;
        }

        nav a::after {
            content: '';
            display: block;
            height: 2px;
            background-color: #fff; /* Línea blanca */
            width: 0;
            position: absolute;
            bottom: -5px; /* Espacio debajo del texto */
            left: 50%;
            transform: translateX(-50%);
            transition: width 0.3s ease;
        }

        nav a:hover::after {
            width: 100%;
        }

        /* Estilo para las imágenes de carrito y cuenta */
        .icon-container {
            display: flex;
            align-items: center;
        }

        .icon-container img {
            max-height: 40px;
            margin-left: 20px;
        }

        .account-icon img {
            max-height: 50px; /* Tamaño de imagen aumentado */
        }

        /* Asegúrate de agregar suficiente margen superior al contenido para que no se esconda detrás del header */
        body {
            margin-top: 120px; /* Ajusta este valor si es necesario */
        }
    </style>
</head>
<body>
    <!-- Banda de aviso -->

    <!-- Header -->
    <header>

        <div class="header-announcement">
            <img src="assets/images/truck.png" alt="Camión">
            Envíos gratis a partir de $99,999
        </div>

        <!-- Logo -->
        <div>
            <a href="index.php">
                <img src="assets/images/logo.png" alt="Logo">
            </a>
        </div>
        <!-- Contenedor de navegación centrada -->
        <div class="nav-container">
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="shop.php">Tienda</a></li>
                    <li><a href="contact.php">Contacto</a></li>
                </ul>
            </nav>
        </div>
        <!-- Imágenes a la derecha -->
        <div class="icon-container">
            <a href="cart.php">
                <img src="assets/images/carrito.png" alt="Carrito de compras">
            </a>
            <a href="account.php" class="account-icon">
                <img src="assets/images/cuenta.png" alt="Cuenta">
            </a>
        </div>
    </header>
</body>
</html>