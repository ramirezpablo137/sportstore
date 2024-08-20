<footer style="background: linear-gradient(to bottom, #000000, #4d4d4d); padding: 40px 20px; color: #ffffff; text-align: center;">
    <style>
        footer {
            background: linear-gradient(to bottom, #000000, #4d4d4d);
            padding: 40px 20px;
            color: #ffffff;
            text-align: center;
            position: relative; /* Para asegurar que el bloque de derechos reservados esté en la parte inferior */
        }

        footer h3 {
            font-size: 18px;
            margin-bottom: 10px;
            border-bottom: 2px solid #ffffff;
            display: inline-block;
            padding-bottom: 5px;
        }

        footer p {
            margin: 10px 0;
            max-width: 100%;
            width: calc(100% - 20px);
        }

        footer a {
            display: inline-block;
            transition: transform 0.3s;
        }

        footer a img {
            max-width: 100px;
            display: block;
            margin: 10px auto;
            padding: 5px;
            box-sizing: border-box;
        }

        footer a img:hover {
            transform: scale(1.1);
        }

        footer .social-icons img {
            max-width: 100px;
            padding: 5px;
            box-sizing: border-box;
        }

        footer .reserved-rights {
            background-color: #000000;
            padding: 10px 0;
            margin-top: 20px;
            font-size: 14px;
            width: 100%;
            text-align: center;
            position: absolute;
            bottom: 0;
            left: 0;
        }
    </style>

    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; flex-wrap: wrap; align-items: flex-start;">
        
        <div style="flex: 1; margin-bottom: 20px; text-align: left;">
            <h3>Asistencia al Cliente</h3>
            <p>Estamos aquí para ayudarte. Si tienes alguna pregunta o necesitas soporte, no dudes en contactarnos.</p>
            <a href="contact.php">
                <img src="assets/images/contacto.png" alt="Ir a Contacto">
            </a>
        </div>

        <div style="flex: 1; margin-bottom: 20px; text-align: left;">
            <h3>Mantente Conectado</h3>
            <p>Síguenos en nuestras redes sociales para estar al tanto de las últimas novedades y ofertas.</p>
            <div style="margin-top: 10px;" class="social-icons">
                <a href="https://www.instagram.com/josehernandez_tecnica7" target="_blank" style="margin-right: 15px;">
                    <img src="assets/images/instagram.png" alt="Instagram">
                </a>
                <!-- Puedes añadir más iconos de redes sociales aquí -->
            </div>
        </div>

    </div>
    
    <div class="reserved-rights">
        <p>&copy; 2024 Equipo de Técnicos. Jose Hernandez. Todos los derechos reservados.</p>
    </div>
    
    <script src="assets/js/script.js"></script>
</footer>
