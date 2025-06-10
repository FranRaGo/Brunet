<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer brunet</title>

    <!-- Favicon -->

    <!-- Box Icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="/brunet/styles/styles.css">
    <link rel="stylesheet" href="/brunet/styles/responsive.css">
    <link rel="stylesheet" href="/brunet/styles/footer.css">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Italiana&family=Lexend:wght@100..900&family=Nova+Flat&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

</head>

<body>
    <footer class="footer">
        <div class="menu_footer">
            <ul>
                <li><a href="/brunet/index.php"><i class='bx bx-home'></i> Inicio</a></li>
                <li><a href="/brunet/views/client/reservar_client.php"><i class='bx bx-calendar'></i> Reservas</a></li>
                <li><a href="/brunet/views/client/contactar.php"><i class='bx bx-phone'></i> Contacto</a></li>
            </ul>
        </div>

        <div class="separator"></div>

        <div class="avisos_footer">
            <img src="/brunet/assets/media/img/logo.png" alt="favicon">
            <p>&copy; <?php echo date("Y"); ?> El Brunet - Todos los derechos reservados.</p>
            <li><a href="/brunet/views/legalSites/politica_privacidad.php">Política de Privacidad</a></li>
            <li><a href="/brunet/views/legalSites/terminos.php">Términos y Condiciones</a></li>
            <p>Made with ❤️ by Wekre8</p>
        </div>

        <div class="separator"></div>

        <div class="map_footer">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5965.653672452447!2d2.0772018552893194!3d41.616256097424476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4eb73e963986d%3A0x2c647ae6971d83da!2sMasia%20El%20Brunet!5e0!3m2!1ses!2ses!4v1746613085337!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </footer>
</body>

</html>