<?php
// filepath: c:\wamp64\www\brunet\config\db.php

// Configuración de la base de datos
define('DB_HOST', 'localhost'); // Cambiar si el host es diferente
define('DB_USER', 'root'); // Cambiar por el usuario de la base de datos
define('DB_PASS', ''); // Cambiar por la contraseña del usuario
define('DB_NAME', 'brunet_db'); // Nombre de la base de datos

try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=brunet_db;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}
?>