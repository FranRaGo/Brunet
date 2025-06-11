<?php
// filepath: c:\wamp64\www\brunet\config\db.php

// Configuración de la base de datos
define('DB_HOST', 'localhost'); // o 127.0.0.1
define('DB_PORT', '8889'); // Puerto por defecto de MySQL
define('DB_USER', 'root'); // Usuario
define('DB_PASS', 'root'); // Contraseña
define('DB_NAME', 'brunet_db'); // Nombre de la base de datos

try {
    $db = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}
?>