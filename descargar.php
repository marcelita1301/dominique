<?php
require_once __DIR__ . '/includes/auth.php';
requerir();

$id = isset($_GET['id']) ? $_GET['id'] : '';
if (!ctype_digit($id)) error_pagina('Formato no válido.', 400);
$d = db_one('SELECT nombre, contenido FROM documentos WHERE id = ?', 'i', array((int)$id));
if (!$d) error_pagina('El formato no existe.', 404);

$archivo = basename($d['contenido']);
$ruta = null;
foreach (array(DIR_DOCUMENTOS, DIR_FORMATOS) as $dir) {
    if (file_exists($dir . $archivo)) { $ruta = $dir . $archivo; break; }
}
if (!$ruta) error_pagina('El archivo "' . $archivo . '" no se encontró en el servidor.', 404);

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . str_replace('"', '', $archivo) . '"');
header('Content-Length: ' . filesize($ruta));
readfile($ruta);
exit;
