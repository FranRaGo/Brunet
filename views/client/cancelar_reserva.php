<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/brunet/config/db.php';

if (!isset($_GET['token']) || !isset($_GET['correo'])) {
    die("Token o correo no válido.");
}

$token = $_GET['token'] ?? '';
$correo = $_GET['correo'] ?? '';
$nombre = $_GET['nombre'] ?? '';
$fecha = $_GET['fecha'] ?? '';
$hora = $_GET['hora'] ?? '';
$zona = $_GET['zona'] ?? '';


$stmt = $db->prepare("DELETE FROM reservas WHERE token_cancelacion = :token");
$stmt->bindParam(':token', $token);

if ($stmt->execute() && $stmt->rowCount() > 0) {

    $asunto = "=?UTF-8?B?" . base64_encode("Reserva cancelada - Restaurante Brunet") . "?=";
    $mensaje = "
        <html>
        <head><title>Reserva Cancelada</title></head>
        <body>
        <h2>Tu reserva ha sido cancelada</h2>
        <p>Lamentamos que hayas cancelado tu reserva. Esperamos verte en otra ocasión.</p>
        <p>Si ha sido un error, por favor vuelve a realizar tu reserva en nuestro sitio web.</p>
        </body>
        </html>
    ";
    $cabeceras = "MIME-Version: 1.0\r\n";
    $cabeceras .= "Content-type: text/html; charset=UTF-8\r\n";
    $cabeceras .= "From: elbrunetmasia@gmail.com\r\n";

    mail($correo, $asunto, $mensaje, $cabeceras);

        $mensaje = "
        <html>
        <head><title>Reserva Cancelada</title></head>
        <body>
        <h2>Una reserva ha sido cancelada</h2>
        <p>La reserva de $nombre en $zona a las $hora del $fecha ha sido cancelada.</p>
        </body>
        </html>
    ";

        mail('fran.rago03@gmail.com', $asunto, $mensaje, $cabeceras);

    echo "Tu reserva ha sido cancelada con éxito. Se ha enviado un correo de confirmación.";
} else {
    echo "No se pudo cancelar la reserva. Verifica que el enlace sea válido.";
}