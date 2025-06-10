<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header brunet</title>

    <!-- Favicon -->
    
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="/brunet/styles/styles.css">
    <link rel="stylesheet" href="/brunet/styles/responsive.css">
    <link rel="stylesheet" href="/brunet/styles/header.css">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="header">
        <img src="/brunet/assets/media/img/logo.png" alt="logo" onclick="window.location.href='/brunet/index.php'">
        <div class="menu-toggle" id="menuToggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav>
            <ul>
                <li><a href="/brunet/index.php"><i class='bx bx-home'></i> Inicio</a></li>
                <li><a href="/brunet/views/client/reservar_client.php"><i class='bx bx-calendar'></i> Reservas</a></li>
                <li><a href="/brunet/views/client/contactar.php"><i class='bx bx-phone'></i> Contacto</a></li>
                <li class="idioma-dropdown">
                    <button class="idioma-btn" id="idiomaBtn" aria-haspopup="listbox" aria-expanded="false">
                        <span class="bandera-idioma">
                            <!-- España -->
                            <svg width="22" height="16" viewBox="0 0 22 16"><rect width="22" height="16" fill="#AA151B"/><rect y="4" width="22" height="8" fill="#F1BF00"/></svg>
                        </span>
                        <span>ES</span>
                        <i class='bx bx-chevron-down'></i>
                    </button>
                    <ul class="idioma-lista" id="idiomaLista" tabindex="-1" role="listbox" hidden>
                        <li data-value="es" role="option">
                            <span class="bandera-idioma">
                                <!-- España -->
                                <svg width="22" height="16" viewBox="0 0 22 16"><rect width="22" height="16" fill="#AA151B"/><rect y="4" width="22" height="8" fill="#F1BF00"/></svg>
                            </span>
                            Español
                        </li>
                        <li data-value="ca" role="option">
                            <span class="bandera-idioma">
                                <!-- Catalunya -->
                                <svg width="22" height="16" viewBox="0 0 22 16"><rect width="22" height="16" fill="#FCB131"/><rect y="2" width="22" height="2" fill="#C60C30"/><rect y="6" width="22" height="2" fill="#C60C30"/><rect y="10" width="22" height="2" fill="#C60C30"/><rect y="14" width="22" height="2" fill="#C60C30"/></svg>
                            </span>
                            Català
                        </li>
                        <li data-value="en" role="option">
                            <span class="bandera-idioma">
                                <!-- UK -->
                                <svg width="22" height="16" viewBox="0 0 22 16"><rect width="22" height="16" fill="#012169"/><path d="M0 0l22 16M22 0L0 16" stroke="#fff" stroke-width="3"/><path d="M0 0l22 16M22 0L0 16" stroke="#C8102E" stroke-width="2"/><rect x="9" width="4" height="16" fill="#fff"/><rect y="6" width="22" height="4" fill="#fff"/><rect x="10" width="2" height="16" fill="#C8102E"/><rect y="7" width="22" height="2" fill="#C8102E"/></svg>
                            </span>
                            English
                        </li>
                        <li data-value="fr" role="option">
                            <span class="bandera-idioma">
                                <!-- Francia -->
                                <svg width="22" height="16" viewBox="0 0 22 16"><rect width="22" height="16" fill="#fff"/><rect width="7.33" height="16" fill="#0055A4"/><rect x="14.66" width="7.34" height="16" fill="#EF4135"/></svg>
                            </span>
                            Français
                        </li>
                    </ul>
                    <input type="hidden" name="idioma" id="idiomaInput" value="es">
                </li>
            </ul>
        </nav>
    </div>
</body>

    <script src="/brunet/assets/js/header.js"></script> 
    
</html>