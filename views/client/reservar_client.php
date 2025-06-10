<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar - Restaurante Brunet</title>

    <!-- Favicon -->
    <link rel="icon" href="/brunet/assets/media/img/logo.png" type="image/x-icon">

    <!-- Box Icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="/brunet/styles/styles.css">
    <link rel="stylesheet" href="/brunet/styles/responsive.css">
    <link rel="stylesheet" href="/brunet/styles/reservar.css">
    <link rel="stylesheet" href="/brunet/styles/sweetAlert.css">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nova+Flat&display=swap" rel="stylesheet">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
    <!-- Incluir el header -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/brunet/assets/includes/header.php'; ?>
    <main class="container">
        <img src="/brunet/assets/media/img/platos/sartencilla-rb.png" alt="sartencilla" class="sartencilla_img">
        <img src="/brunet/assets/media/img/platos/calamares-rb.png" alt="calamares" class="calamares_img">
        <h2>EL BRUNET</h2>
        <div class="form-container">
            <h1>Reserva Por La Web.</h1>
            <form id="reservaForm" method="POST" action="/brunet/views/client/reservar.php">
                <div class="form-row">
                    <div class="form-column">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required>
                        <span id="error-nombre" class="error-message"></span>

                        <label for="telefono">Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" pattern="[0-9]{9}" required>
                        <span id="error-telefono" class="error-message"></span>

                        <label for="correo">Correo Electrónico:</label>
                        <input type="email" id="correo" name="correo" required>
                        <span id="error-correo" class="error-message"></span>
                    </div>

                    <div class="form-column">
                        <label for="zona">Zona:</label>
                        <select id="zona" name="zona" required>
                            <option value="comedor">Comedor</option>
                            <option value="terraza">Terraza</option>
                        </select>

                        <label for="fecha">Fecha:</label>
                        <input type="text" id="fecha" name="fecha" class="custom-select" placeholder="Seleccione una fecha" required>
                        <span id="error-fecha" class="error-message"></span>

                        <label for="hora">Hora:</label>
                        <select id="hora" name="hora" required>
                            <option value="13:00">13:00</option>
                            <option value="15:00">15:00</option>
                            <option value="20:30">20:30</option>
                            <option value="21:00">21:00</option>
                            <option value="21:30">21:30</option>
                            <option value="22:00">22:00</option>
                        </select>
                        <span id="error-hora" class="error-message"></span>
                    </div>

                    <div class="form-column">
                        <label for="personas">Número de personas:</label>
                        <input type="number" id="personas" name="personas" min="1" max="50" required>
                        <span id="error-personas" class="error-message"></span>

                        <div id="menuGrupoContainer" style="display: none;">
                            <label for="menu_grupo">Menú de grupo:</label>
                            <select id="menu_grupo" name="menu_grupo">
                                <option value="xuleta">Xuleta</option>
                                <option value="calçotada">Calçotada</option>
                                <option value="económico">Económico</option>
                                <option value="menuPara8">Menu de 8</option>
                            </select>
                            <span id="error-menu-grupo" class="error-message"></span>
                        </div>
                    </div>
                </div>

                <button class="btn" type="submit"> <i class='bx bx-calendar'></i> Reservar</button>
            </form>
        </div>
        <div class="container_info_form">
            <div class="container_buttons_form">
                <button id="infoImportanteBtn" class="btn">
                    <i class='bx bx-info-circle'></i> Información Importante
                </button>
                <button id="horarioBtn" class="btn-info">
                    <i class='bx bx-time'></i> Horario
                </button>
            </div>
        </div>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/brunet/assets/includes/footer.php'; ?>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Flatpickr Script -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Select2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Reservar Script -->
    <script src="/brunet/assets/js/reservar.js"></script>

    <script src="/brunet/assets/js/url_message.js"></script>

</body>

</html>