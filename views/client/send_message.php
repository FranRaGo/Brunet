<?php
$admin_email = "fran.rago03@gmail.com";

$nombre = htmlspecialchars($_POST['nombre']);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$mensaje = htmlspecialchars($_POST['mensaje']);

if (!$nombre || !$email || !$mensaje) {
    echo "Error: Todos los campos son obligatorios y el email debe ser válido.";
    exit;
}

$asunto = "Nuevo mensaje desde el formulario de contacto";
$contenido = "Has recibido un nuevo mensaje:\n\n";
$contenido .= "Nombre: $nombre\n";
$contenido .= "Email: $email\n";
$contenido .= "Mensaje:\n$mensaje\n";

$cabeceras = "From: $email\r\n";
$cabeceras .= "Reply-To: $email\r\n";
$cabeceras .= "Content-Type: text/plain; charset=UTF-8\r\n";

if (mail($admin_email, $asunto, $contenido, $cabeceras)) {
    echo "<script>
        alert('Mensaje enviado correctamente');
        window.location.href = 'contactar.php'; // redirección
    </script>";
} else {
    echo "<script>
        alert('El mensaje no se ha enviado correctamente');
        window.location.href = 'contactar.php'; // redirección
    </script>";
}
?>