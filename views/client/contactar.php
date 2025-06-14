<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactar - Restaurante Brunet</title>

    <!-- Favicon -->
    <link rel="icon" href="/brunet/assets/media/img/logo.png" type="image/x-icon">

    <!-- Box Icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="/brunet/styles/styles.css">
    <link rel="stylesheet" href="/brunet/styles/responsive.css">
    <link rel="stylesheet" href="/brunet/styles/contacto.css">
    <link rel="stylesheet" href="/brunet/styles/sweetAlert.css">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nova+Flat&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Incluir el header -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/brunet/assets/includes/header.php'; ?>

    <main class="container">
        <section class="info_contact">
            <h2>Contacto</h2>
            <div class="info_contact_details">
                <div class="info_contact_item">
                    <i class='bx bxs-phone'></i>
                    <p>+34 633 616 417</p>
                </div>
                <div class="info_contact_item">
                    <i class='bx bxs-envelope'></i>
                    <p>info@elbrunet.com</p>
                </div>
                <div class="info_contact_item">
                    <i class='bx bxs-map'></i>
                    <p>Carretera de Sant Llorenç, Km 7,9, 08211 Castellar del Vallès, Barcelona</p>
                </div>
            </div>
            <div class="separator"></div>
            <div class="social_sites">
                <a href="https://www.instagram.com/elbrunet/" target="_blank"><i class='bx bxl-instagram'></i></a>
                <a href="https://www.facebook.com/elbrunet" target="_blank"><i class='bx bxl-facebook'></i></a>
                <a href="https://www.tripadvisor.es/Restaurant_Review-g1064230-d1064231-Reviews-El_Brunet-Castellar_del_Valles_Catalonia.html" target="_blank"><i class='bx bxl-trip-advisor'></i></a>
                <a href="https://www.google.com/maps/place/Masia+El+Brunet/@41.6162561,2.0772019,17z/data=!3m1!4b1!4m5!3m4!1s0x12a4eb73e963986d:0x2c647ae6971d83da!8m2!3d41.6162561!4d2.0793906" target="_blank"><i class='bx bxl-google'></i></a>
            </div>
            <button class="btn" onclick="window.location.href='/brunet/views/client/reservar_client.php'"><i class='bx bx-calendar'></i>Reserva tu mesa</button>
            <div class="mouse-ball"></div>
        </section>
        <section class="section_form_contact">
            <div class="map_contact">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5965.653672452447!2d2.0772018552893194!3d41.616256097424476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4eb73e963986d%3A0x2c647ae6971d83da!2sMasia%20El%20Brunet!5e0!3m2!1ses!2ses!4v1746613085337!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="contact_datas">
                <div class="form_contact">
                    <form action="send_message.php" method="POST" class="contact_form">
                        <h2>Formulario de contacto</h2>
                        <div class="form_group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" required placeholder="Tu nombre">
                        </div>
                        <div class="form_group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required placeholder="Tu email">
                        </div>
                        <div class="form_group">
                            <label for="mensaje">Mensaje</label>
                            <textarea id="mensaje" name="mensaje" required placeholder="Tu mensaje"></textarea>
                        </div>
                        <button type="submit" class="btn"> <i class='bx bx-send'></i> Enviar</button>
                    </form>
                    <div class="form_messages">
                        <div class="message horario">
                            <h3> <i class='bx bx-time'></i> Horario</h3>
                            <p>Martes a Jueves: <span>13:00 - 17:00</span></p>
                            <p>Viernes y Sábado: <span>13:00 - 17:00 y 20:30 - 24:00</span></p>
                            <p>Lunes: <span>Cerrado</span></p>
                        </div>
                        <div class="message alergias">
                            <h3> <i class='bx bx-info-circle'></i> Alergias</h3>
                            <p>Si tienes alguna alergia o intolerancia alimentaria, por favor, indícalo en el mensaje o en el restaurante.</p>
                        </div>
                        <div class="message reserva">
                            <h3> <i class='bx bx-calendar'></i> Reservas</h3>
                            <p>Si quieres reservar una mesa, puedes hacerlo a través de nuestro formulario de reserva o por teléfono.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/brunet/assets/includes/footer.php'; ?>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Reservar Script -->
    <script src="/brunet/assets/js/contacto.js"></script>

    <script src="/brunet/assets/js/url_message.js"></script>


</body>

</html>