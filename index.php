<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brunet Home</title>

    <!-- Favicon -->
    <link rel="icon" href="/brunet/assets/media/img/logo.png" type="image/x-icon">

    <!-- Box Icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="/brunet/styles/styles.css">
    <link rel="stylesheet" href="/brunet/styles/home.css">
    <link rel="stylesheet" href="/brunet/styles/sweetAlert.css">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Italiana&family=Lexend:wght@100..900&family=Nova+Flat&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

    <!-- Animaciones -->
    <link rel="stylesheet" href="/brunet/styles/animate.css">

</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/brunet/assets/includes/header.php'; ?>
    <main class="main__home">
        <div class="social_icons">
            <ul>
                <li><a href="https://www.instagram.com/elbrunet/?hl=es" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                <li><a href="https://www.facebook.com/elbrunetmasia/?locale=es_ES" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                <li><a href="https://www.tripadvisor.es/Restaurant_Review-g1064013-d3675432-Reviews-Restaurant_El_Brunet-Castellar_del_Valles_Catalonia.html" target="_blank"><i class='bx bxl-trip-advisor'></i></a></li>
            </ul>
        </div>
        <div id="scrollDown" class="scrollDown">
            <i class='bx bx-chevron-down'></i>
        </div>
        <div class="container">
            <img class="pulpo_img" src="/brunet/assets/media/img/platos/pulpo-rb.png" alt="pulpo a la brasa">
            <img class="foie_img" src="/brunet/assets/media/img/platos/foie-rb.png" alt="Huevos rotos con foie">
            <div class="info_home">
                <h1>EL BRUNET</h1>
                <p>Disfruta de una experiencia única en nuestro restaurante.</p>
                <div class="buttons_home" data-aos="fade-left">
                    <button class="btn" onclick="window.location.href='#home__tarjetas'" class="btn"><i class='bx bx-book-open'></i> Ver Carta y Menús</button>
                    <button class="btn btn-reservar" onclick="window.location.href='/brunet/views/client/reservar_client.php'" class="btn"><i class='bx bx-calendar'></i> Reservar</button>
                </div>
            </div>
            <div class="border_home">
                <div class="home__content">

                </div>
            </div>
        </div>
        <div id="home__tarjetas" class="home__tarjetas">
            <div class="tarjeta carta">
                <h2>Carta</h2>
                <p>Disfruta de una amplia variedad de platos al estilo tradicional.</p>
                <button class="btn" onclick="openModal()"><i class='bx bx-book-open'></i> Ver Carta</button>
            </div>
            <div class="tarjeta">
                <h2>Menú entre semana</h2>
                <p>Disfruta de nuestro menú entre semana para una experiencia especial.</p>
                <button class="btn" onclick="openModalDiario()"><i class='bx bx-book-open'></i> Ver Menú</button>
            </div>
            <div class="tarjeta menu_grupos">
                <h2>Menús de grupo</h2>
                <p>Disfruta de nuestros menú de grupos para celebraciones especiales.</p>
                <button class="btn" onclick="openModalMenus()"><i class='bx bx-book-open'></i> Ver Menús de Grupo</button>
            </div>
            <div class="tarjeta vinos">
                <div class="info_vinos">
                    <h2>Vinos</h2>
                    <p>Consulta nuestra carta de vinos</p>
                    <button class="btn" onclick="openModalVinos()"> <i class='bx bx-wine'></i> Ver Vinos</button>
                </div>
                <div class="img_vinos">
                    <div class="carrousel_vinos"></div>
                </div>
            </div>
            <div class="sugerencias">
                <h2>Sugerencias del Chef</h2>
                <p>Descubre nuestras recomendaciones especiales.</p>
                <button class="btn" onclick="openModalSug()"><i class='bx bx-book-open'></i> Ver Sugerencias</button>
            </div>
            <div class="tarjeta postres">
                <div class="postres_info">
                    <h2>NUESTROS POSTRES</h2>
                    <p>Descubre nuestra variedad de postres. Disfruta de nuestra pasteleria casera <span>VILLARO</span></p>
                    <button class="btn" onclick="openModal()"><i class='bx bx-book-open'></i> Ver Postres</button>
                </div>
                <div class="imagenes_postres">
                    <img src="/brunet/assets/media/img/postres/postre01.JPG" alt="Postre 1" class="carrousel-postre-image active">
                    <img src="/brunet/assets/media/img/postres/postre02.JPG" alt="Postre 2" class="carrousel-postre-image">
                    <img src="/brunet/assets/media/img/postres/postre03.JPG" alt="Postre 3" class="carrousel-postre-image">
                    <img src="/brunet/assets/media/img/postres/postre04.JPG" alt="Postre 4" class="carrousel-postre-image">
                    <img src="/brunet/assets/media/img/postres/postre05.JPG" alt="Postre 5" class="carrousel-postre-image">
                </div>
            </div>
        </div>
        <div class="fotos_platos">
            <div class="carrousel_platos">
                <div class="column_carrousel">
                    <div class="container_carrousel_imgs"></div>
                    <div class="container_carrousel_imgs"></div>
                    <div class="container_carrousel_imgs"></div>
                </div>
                <div class="column_carrousel">
                    <div class="container_carrousel_imgs"></div>
                    <div class="container_carrousel_imgs"></div>
                    <div class="container_carrousel_imgs"></div>
                </div>
                <div class="column_carrousel">
                    <div class="container_carrousel_imgs"></div>
                    <div class="container_carrousel_imgs"></div>
                    <div class="container_carrousel_imgs"></div>
                </div>
                <div class="column_carrousel">
                    <div class="container_carrousel_imgs"></div>
                    <div class="container_carrousel_imgs"></div>
                    <div class="container_carrousel_imgs"></div>
                </div>
            </div>
        </div>
        <div class="contacto_index">
            <h2>Contacto</h2>
            <p>¿Tienes alguna pregunta o necesitas más información? ¡Contáctanos!</p>
            <div class="contacto_info">
                <div class="contacto_item">
                    <i class='bx bx-map'></i>
                    <p>Carretera de Sant Llorenç, Km 7,9, 08211 Castellar del Vallès, Barcelona</p>
                </div>
                <div class="contacto_item">
                    <i class='bx bx-phone'></i>
                    <p>Teléfono: +34 633 616 417</p>
                </div>
                <div class="contacto_item">
                    <i class='bx bx-envelope'></i>
                    <p>Email: <a href="mailto:info@elbrunet.com">info@elbrunet.com</a></p>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="modal-body">
                <!-- Contenido dinámico del modal -->
            </div>
        </div>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/brunet/assets/includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.6.2/dist/simpleParallax.min.js"></script>
    <script src="/brunet/assets/js/home.js"></script>
    <!-- Parallax -->
</body>

</html>