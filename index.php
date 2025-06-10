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
    <link rel="stylesheet" href="/brunet/styles/responsive.css">
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
                <button class="btn" onclick="openModal(`
                <div class='modern-menu'>
                    <h2 class='menu-title'>Carta del Restaurante</h2>

                    <div class='menu-section'>
                        <h3>Entrantes</h3>
                        <p><span>Ensalada de temporada</span> <strong>9,95 €</strong></p>
                        <p><span>Ensalada de queso de cabra y frutos secos</span> <strong>9,50 €</strong></p>
                        <p><span>Ensalada de tomate, cebolla tierna, anchoas y aceitunas</span> <strong>12,75 €</strong></p>
                        <p><span>Xató (ensalada catalana con bacalao, salsa romesco y aceitunas)</span> <strong>12,80 €</strong></p>
                        <p><span>Esqueixada de bacalao (ensalada de bacalao desmigado con tomate y aceitunas)</span> <strong>11,90 €</strong></p>
                        <p><span>Tostada con escalivada (verduras asadas) y anchoas</span> <strong>9,30 €</strong></p>
                        <p><span>Jamón ibérico cortado a mano</span> <strong>16,90 €</strong></p>
                        <p><span>Queso manchego curado</span> <strong>9,75 €</strong></p>
                        <p><span>Canelones de asado caseros</span> <strong>9,35 €</strong></p>
                        <p><span>Macarrones a la boloñesa</span> <strong>9,60 €</strong></p>
                        <p><span>Escalivada con anchoas</span> <strong>9,50 €</strong></p>
                        <p><span>Croquetas caseras de carne asada</span> <strong>7,90 €</strong></p>
                        <p><span>Alcachofas rebozadas</span> <strong>7,80 €</strong></p>
                        <p><span>Cazuelita de escalivada con queso de cabra</span> <strong>8,90 €</strong></p>
                        <p><span>Berenjenas con miel</span> <strong>8,85 €</strong></p>
                        <p><span>Patatas bravas</span> <strong>6,95 €</strong></p>
                    </div>

                    <div class='menu-section'>
                        <h3>Platos Tradicionales</h3>
                        <p><span>Cabrito empanado</span> <strong>22,90 €</strong></p>
                        <p><span>Albóndigas con setas</span> <strong>13,70 €</strong></p>
                        <p><span>Ternera con setas</span> <strong>14,95 €</strong></p>
                        <p><span>Carrilleras ibéricas deshuesadas</span> <strong>13,70 €</strong></p>
                        <p><span>Callos y morro</span> <strong>13,90 €</strong></p>
                        <p><span>Brandada de bacalao</span> <strong>16,90 €</strong></p>
                        <p><span>Calamares pequeños con cebolla confitada</span> <strong>10,90 €</strong></p>
                        <p><span>Caracoles en salsa</span> <strong>13,90 €</strong></p>
                    </div>

                    <div class='menu-section'>
                        <h3>A la Brasa</h3>
                        <p><span>Entrecot de ternera (aprox. 375g)</span> <strong>19,90 €</strong></p>
                        <p><span>Entrecot de vaca (aprox. 400g)</span> <strong>19,90 €</strong></p>
                        <p><span>Chuletón de vaca (aprox. 1kg)</span> <strong>47,00 €</strong></p>
                        <p><span>Hamburguesa de buey con foie y reducción de Pedro Ximénez</span> <strong>14,90 €</strong></p>
                        <p><span>Solomillo con escalivada y espárragos</span> <strong>23,00 €</strong></p>
                        <p><span>Solomillo con foie</span> <strong>26,90 €</strong></p>
                        <p><span>Manitas de cerdo</span> <strong>12,80 €</strong></p>
                        <p><span>Butifarra ibérica con alubias del ganxet</span> <strong>10,50 €</strong></p>
                        <p><span>Surtido de butifarras con alubias</span> <strong>14,45 €</strong></p>
                        <p><span>Pollo a la brasa (muslo o pechuga)</span> <strong>9,50 €</strong></p>
                        <p><span>Conejo a la brasa (muslo o paletilla)</span> <strong>9,95 €</strong></p>
                        <p><span>Cordero a la brasa (costilla, medallón y muslo)</span> <strong>14,50 €</strong></p>
                        <p><span>Costillas de cordero con pimientos</span> <strong>15,90 €</strong></p>
                    </div>
                </div>
                `)"><i class='bx bx-book-open'></i> Ver Carta</button>
            </div>
            <div class="tarjeta">
                <h2>Menú entre semana</h2>
                <p>Disfruta de nuestro menú entre semana para una experiencia especial.</p>
                <button class="btn" onclick="openModal(`
                    <div class='modern-menu'>
                        <h2 class='menu-title'>Menú diario - 19,80€</h2>
                        <p><em>Disponible a mediodía de martes a viernes, excepto festivos.</em></p>
                        <div class='menu-section'>
                            <h3>Primeros a elegir</h3>
                            <p>Ensalada de queso de cabra y frutos secos</p>
                            <p>Ensalada de bacalao desmigado con tomate y aceitunas (supl. 1 €)</p>
                            <p>Tostada de pan con verduras asadas y anchoas</p>
                            <p>Canelones caseros de carne asada</p>
                            <p>Macarrones a la boloñesa</p>
                            <p>Alcachofas rebozadas</p>
                            <p>Cazuelita de verduras asadas con queso de cabra</p>
                            <p>Berenjenas con miel</p>
                            <p>Mejillones de roca a la brasa</p>
                            <p>Espárragos trigueros a la plancha</p>
                            <p>Crema de calabaza</p>
                        </div>
                        <div class='menu-section'>
                            <h3>Segundos a elegir</h3>
                            <p>Butifarra a la brasa con alubias o patatas fritas</p>
                            <p>Carrilleras ibéricas deshuesadas</p>
                            <p>Ternera guisada con setas (supl. 2€)</p>
                            <p>Calamares pequeños con cebolla caramelizada</p>
                            <p>Pollo a la brasa con patata asada</p>
                            <p>Conejo a la brasa con patata asada</p>
                            <p>Paella (solo jueves)</p>
                            <p>Entrecot de ternera (supl. 5€)</p>
                            <p>Hamburguesa de buey con foie (supl. 6€)</p>
                            <p>Bacalao gratinado con muselina de ajo (supl. 6€)</p>
                        </div>
                        <div class='menu-section'>
                            <h3>Postres</h3>
                            <p>Flan con nata, tarta de queso, sorbete de limón o mango, trufas de chocolate, miel con requesón, helado de vainilla con chocolate caliente, yogur con crema de frutos rojos, delicias Brunet o crema catalana.</p>
                            <p>Villarin o Buvi (helado de turrón con chocolate negro) +1,90€</p>
                        </div>
                        <div class='menu-section'>
                            <h3>Incluye</h3>
                            <p>Copa de vino, agua y pan de coca (no incluye cerveza ni refrescos).</p>
                            <p><strong>*Máximo 8 personas. 19,80€</strong></p>
                        </div>
                    </div>
                `)"><i class='bx bx-book-open'></i> Ver Menú</button>
            </div>
            <div class="tarjeta menu_grupos">
                <h2>Menús de grupo</h2>
                <p>Disfruta de nuestros menú de grupos para celebraciones especiales.</p>
                <button class="btn" onclick="openGroupMenusModal()"><i class='bx bx-book-open'></i> Ver Menús de Grupo</button>
            </div>
            <div class="tarjeta vinos">
                <div class="info_vinos">
                    <h2>Vinos</h2>
                    <p>Consulta nuestra carta de vinos</p>
                    <button class="btn" onclick="openVinosModal()"> <i class='bx bx-wine'></i> Ver Vinos</button>
                </div>
                <div class="img_vinos">
                    <div class="carrousel_vinos"></div>
                </div>
            </div>
            <div class="sugerencias">
                <h2>Sugerencias del Chef</h2>
                <p>Descubre nuestras recomendaciones especiales.</p>
                <button class="btn" onclick="openModal(`
                <div class='modern-menu'>
                    <h2 class='menu-title'>Sugerencias del Chef</h2>
                    <div class='menu-section'>
                        <h3>Entrantes</h3>
                        <p>Huevos rotos con foie</p>
                        <p>Ensalada de bacalao desmigado con tomate y aceitunas</p>
                        <p>Steak tartar de ternera</p>
                    </div>
                    <div class='menu-section'>
                        <h3>Platos Tradicionales</h3>
                        <p>Albóndigas de carne con setas</p>
                        <p>Callos y morro de ternera guisados</p>
                        <p>Berenjenas rebozadas con miel</p>
                    </div>
                    <div class='menu-section'>
                        <h3>A la Brasa</h3>
                        <p>Chuletón de vaca madurado</p>
                        <p>Pulpo a la brasa</p>
                        <p>Costillas de cordero con pimientos</p>
                    </div>
                </div>
                `)"><i class='bx bx-book-open'></i> Ver Sugerencias</button>
            </div>
            <div class="tarjeta postres">
                <div class="postres_info">
                    <h2>NUESTROS POSTRES</h2>
                    <p>Descubre nuestra variedad de postres. Disfruta de nuestra pasteleria casera <span>VILLARO</span></p>
                    <button class="btn" onclick="openModal(`
                        <div class='modern-menu'>
                            <h2 class='menu-title'>Postres</h2>
                            <div class='menu-section'>
                                <h3>Postres Caseros</h3>
                                <p>Flan con nata</p>
                                <p>Tarta de queso</p>
                                <p>Sorbete de limón o mango</p>
                                <p>Trufas de chocolate</p>
                                <p>Miel con requesón</p>
                                <p>Helado de vainilla con chocolate caliente</p>
                                <p>Yogur con crema de frutos rojos</p>
                                <p>Delicias Brunet</p>
                                <p>Crema catalana</p>
                            </div>
                        </div>
                `)"><i class='bx bx-book-open'></i> Ver Postres</button>
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
                    <div class="container_carrousel_imgs"></div>>
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

    <script src="/brunet/assets/js/home.js"></script>
    <!-- Parallax -->
    <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.6.2/dist/simpleParallax.min.js"></script>
</body>

</html>