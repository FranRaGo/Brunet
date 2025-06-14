<?php
// filepath: c:\wamp64\www\brunet\views\client\reservar.php
require_once $_SERVER['DOCUMENT_ROOT'] . '/brunet/config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $zona = trim($_POST['zona'] ?? '');
    $fecha = trim($_POST['fecha'] ?? '');
    $hora = trim($_POST['hora'] ?? '');
    $personas = intval($_POST['personas'] ?? 0);
    $menuGrupo = trim($_POST['menu_grupo'] ?? '');
    $token = bin2hex(random_bytes(16));

    // Horarios válidos por turno
    $horariosValidos = [
        'mañana' => ['13:00', '13:30', '14:00', '14:30', '15:00', '15:30'],
        'noche' => ['20:30', '21:00', '21:30', '22:00']
    ];

    // Determinar el turno basado en la hora
    $turno = '';
    if (in_array($hora, $horariosValidos['mañana'])) {
        $turno = 'mañana';
    } elseif (in_array($hora, $horariosValidos['noche'])) {
        $turno = 'noche';
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Horario no válido.']);
        exit;
    }

    // Validaciones del servidor
    if (empty($nombre) || empty($telefono) || empty($zona) || empty($fecha) || empty($hora) || $personas <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'Todos los campos son obligatorios.']);
        exit;
    }

    // Validar que no se pueda reservar para el mismo día
    $hoy = date('Y-m-d');
    if ($fecha === $hoy) {
        echo json_encode(['status' => 'error', 'message' => 'No puedes reservar para el mismo día.']);
        exit;
    }

    // Validar que no se puedan reservar más de 50 personas por turno
    $query = "SELECT SUM(personas) AS total_personas FROM reservas WHERE fecha = :fecha AND turno = :turno";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':turno', $turno);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalPersonas = $result['total_personas'] ?? 0;

    if (($totalPersonas + $personas) > 50) {
        echo json_encode(['status' => 'error', 'message' => 'No se pueden reservar más de 50 personas en este turno.']);
        exit;
    }

    // Validar que un número de teléfono no pueda reservar más de una vez al día o en un turno
    $query = "SELECT COUNT(*) AS total_reservas FROM reservas WHERE telefono = :telefono AND fecha = :fecha AND turno = :turno";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':turno', $turno);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalReservas = $result['total_reservas'] ?? 0;

    if ($totalReservas > 0) {
        echo json_encode(['status' => 'error', 'message' => 'El número de teléfono ya tiene una reserva para este día o turno.']);
        exit;
    }

    if ($personas > 5 && empty($menuGrupo)) {
        echo json_encode(['status' => 'error', 'message' => 'Debes seleccionar un menú para grupos de más de 5 personas.']);
        exit;
    }

    try {
        // Preparar la consulta para insertar la reserva
        $query = "INSERT INTO reservas (nombre, telefono, zona, fecha, hora, personas, turno, menu_escogido, token_cancelacion) 
                  VALUES (:nombre, :telefono, :zona, :fecha, :hora, :personas, :turno, :menu_escogido,:token)";
        $stmt = $db->prepare($query);

        // Vincular los parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':zona', $zona);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':personas', $personas, PDO::PARAM_INT);
        $stmt->bindParam(':turno', $turno);
        $stmt->bindParam(':menu_escogido', $menuGrupo);
        $stmt->bindParam(':token', $token);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Reserva realizada con éxito.']);
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(['status' => 'error', 'message' => 'Correo electrónico no válido.']);
                exit;
            }

            $para = $correo;
            $asunto = "=?UTF-8?B?" . base64_encode("Confirmación de reserva - Restaurante Brunet") . "?=";
$cancelUrl = "http://localhost:8888/brunet/views/client/cancelar_reserva.php?" . http_build_query([
    'token' => $token,
    'correo' => $correo,
    'nombre' => $nombre,
    'fecha' => $fecha,
    'hora' => $hora,
    'zona' => $zona,
]);            
$mensaje = "
    <html>
    <head>
    <title>Confirmación de reserva</title>
    </head>
    <body>
    <h2>Reserva confirmada</h2>
    <p>Gracias, <strong>$nombre</strong>, por tu reserva en el Restaurante Brunet.</p>
    <p><strong>Fecha:</strong> $fecha<br>
       <strong>Hora:</strong> $hora<br>
       <strong>Zona:</strong> $zona<br>
       <strong>Personas:</strong> $personas<br>" .
                ($personas > 5 ? "<strong>Menú de grupo:</strong> $menuGrupo<br>" : "") .
                "</p>
    <p>Te esperamos. Si necesitas cambiar o cancelar tu reserva, por favor usa el siguiente botón:</p>
    <p>
        <a href='$cancelUrl' style='background-color:#e74c3c;color:#fff;padding:10px 20px;text-decoration:none;border-radius:5px;'>
            Cancelar reserva
        </a>
    </p>
    </body>
    </html>
";

            $cabeceras = "MIME-Version: 1.0" . "\r\n";
            $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $cabeceras .= "From: elbrunetmasia@gmail.com" . "\r\n";

            mail($para, $asunto, $mensaje, $cabeceras);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No se pudo guardar la reserva.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
    }
    exit;
}
