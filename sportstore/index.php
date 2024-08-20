<?php include 'includes/header.php'; ?>

<style>
    /* Estilos para la banda de aviso */
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
        z-index: 1000; /* Asegura que la banda esté sobre el contenido */
    }

    .header-announcement img {
        margin-right: 10px;
        vertical-align: middle;
        max-height: 20px; /* Ajusta la altura según sea necesario */
    }

    /* Estilos para el slider del banner */
    .banner-slider {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 400px; /* Ajusta según sea necesario */
        z-index: 500; /* Asegura que el slider esté debajo de la banda de anuncio pero encima del contenido de la página */
    }

    .banner-slider-container {
        display: flex;
        transition: transform 0.5s ease-in-out;
        height: 100%; /* Asegúrate de que el contenedor tenga la altura completa */
    }

    .banner-slide {
        min-width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
    }

    .banner-slider-controls {
        position: absolute;
        top: 50%;
        width: 100%;
        display: flex;
        justify-content: space-between;
        transform: translateY(-50%);
        z-index: 1000; /* Asegura que los controles del slider estén sobre el slider pero debajo del header y la banda de anuncio */
    }

    .banner-prev, .banner-next {
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        padding: 10px;
        cursor: pointer;
        font-size: 24px;
    }

    /* Estilos para los productos destacados */
    .highlights {
        margin-top: 20px; /* Ajusta el margen superior si es necesario */
    }

    .slider {
        display: flex;
        justify-content: space-between;
    }

    .card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 15px;
        text-align: center;
        width: 30%; /* Ajusta el ancho de la tarjeta */
        box-sizing: border-box;
    }

    .card img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .card h3 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .card p {
        font-size: 16px;
        margin-bottom: 15px;
    }

    .card .btn {
        display: inline-block;
        background-color: #000; /* Color negro para el botón */
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
    }

    .card .btn:hover {
        background-color: #333; /* Color negro más oscuro para el hover */
    }

    /* Estilos para la nueva sección del banner con texto */
    .banner-with-text {
        position: relative;
        width: 100%;
        height: 400px; /* Ajusta según sea necesario */
        margin-top: 20px; /* Ajusta el margen superior si es necesario */
        overflow: hidden;
    }

    .banner-with-text img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .banner-text {
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
        color: #fff;
        background: rgba(0, 0, 0, 0.5); /* Fondo semitransparente para el texto */
        padding: 20px;
        border-radius: 5px;
        max-width: 500px; /* Ajusta según sea necesario */
    }

    .banner-text h2 {
        margin: 0 0 10px;
    }

    .banner-text p {
        margin: 0 0 20px;
    }

    .register-now-btn {
        display: inline-block;
        background-color: #000; /* Color negro para el botón */
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        text-align: center;
    }

    .register-now-btn:hover {
        background-color: #333; /* Color negro más oscuro para el hover */
    }

    /* Estilos para el header */
    header {
        background: linear-gradient(to right, #000000 30%, #1a1a1C); /* Degradado de negro a gris oscuro */
        color: #fff;
        padding: 15px 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        box-sizing: border-box;
        position: fixed; /* Fija el header en la parte superior */
        top: 30px; /* Ajusta el espacio para que no se superponga con la banda de envíos */
        left: 0;
        z-index: 2000; /* Asegura que el header esté por encima del slider y la banda de anuncio */
    }

    /* Asegúrate de agregar suficiente margen superior al contenido para que no se esconda detrás del header */
    body {
        margin-top: 120px; /* Ajusta este valor si es necesario */
    }
</style>

<main>
    <!-- Slider del Banner Principal -->
    <section class="banner-slider">
        <div class="banner-slider-container">
            <div class="banner-slide" style="background-image: url('assets/images/banner1.png');"></div>
            <div class="banner-slide" style="background-image: url('assets/images/banner2.png');"></div>
            <div class="banner-slide" style="background-image: url('assets/images/banner3.png');"></div>
        </div>
        <!-- Controles del Slider -->
        <div class="banner-slider-controls">
            <span class="banner-prev">&lt;</span>
            <span class="banner-next">&gt;</span>
        </div>
    </section>

    <!-- Productos Destacados -->
    <section class="highlights">
        <h2>Productos Destacados</h2>
        <div class="slider">
            <div class="card">
                <img src="assets/images/p11.png" alt="Product 1">
                <h3>Remera Argentina 2024</h3>
                <a href="shop.php" class="btn">Ver más</a>
            </div>
            <div class="card">
                <img src="assets/images/p3.png" alt="Product 2">
                <h3>Boca Juniors Titular</h3>
                <a href="shop.php" class="btn">Ver más</a>
            </div>
            <div class="card">
                <img src="assets/images/p12.png" alt="Product 3">
                <h3>CAI Alternativa Azul</h3>
                <a href="shop.php" class="btn">Ver más</a>
            </div>
        </div>
    </section>

    <!-- Banner con Texto Superpuesto -->
    <section class="banner-with-text">
        <img src="assets/images/banner.png" alt="Banner Advertisement">
        <div class="banner-text">
            <h2>¡No Te Pierdas Nuestras Ofertas Exclusivas!</h2>
            <p>¿Quieres estar al tanto de nuestras últimas promociones, productos exclusivos y descuentos especiales? Regístrate ahora y sé el primero en recibir nuestras novedades directamente en tu bandeja de entrada. ¡No te lo pierdas!</p>
            <a href="account.php" class="register-now-btn">Registrarse Ahora</a>
        </div>
    </section>
</main>

<script>
    // JavaScript para el slider del banner
    const bannerSliderContainer = document.querySelector('.banner-slider-container');
    const bannerSlides = document.querySelectorAll('.banner-slide');
    const bannerPrevBtn = document.querySelector('.banner-prev');
    const bannerNextBtn = document.querySelector('.banner-next');

    let bannerCurrentIndex = 0;

    function showBannerSlide(index) {
        const slideWidth = bannerSlides[0].clientWidth;
        bannerSliderContainer.style.transform = `translateX(${-index * slideWidth}px)`;
    }

    bannerNextBtn.addEventListener('click', () => {
        bannerCurrentIndex = (bannerCurrentIndex + 1) % bannerSlides.length;
        showBannerSlide(bannerCurrentIndex);
    });

    bannerPrevBtn.addEventListener('click', () => {
        bannerCurrentIndex = (bannerCurrentIndex - 1 + bannerSlides.length) % bannerSlides.length;
        showBannerSlide(bannerCurrentIndex);
    });

    // Auto slide
    setInterval(() => {
        bannerCurrentIndex = (bannerCurrentIndex + 1) % bannerSlides.length;
        showBannerSlide(bannerCurrentIndex);
    }, 5000);
</script>

<?php include 'includes/footer.php'; ?>
