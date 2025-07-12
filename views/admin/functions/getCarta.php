<?php
// Conexión a la base de datos
$host = 'localhost';
$usuario = 'root';
$clave = 'root';
$bd = 'brunet_db';

$conexion = new mysqli($host, $usuario, $clave, $bd, 8889);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta
$sql = "SELECT * FROM platos";
$resultado = $conexion->query($sql);

$datos = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $datos[] = $fila;
    }
}

// Devolver JSON
header('Content-Type: application/json');
echo json_encode($datos);

$conexion->close();
?>