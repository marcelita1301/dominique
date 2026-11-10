<?php
require_once __DIR__ . '/includes/config.php';
mysqli_report(MYSQLI_REPORT_OFF);
$conexion = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conexion) {
    http_response_code(500);
    die('No se pudo conectar a la base de datos. Revisa que MySQL esté encendido en XAMPP y los datos de includes/config.php.');
}
mysqli_set_charset($conexion, 'utf8mb4');
