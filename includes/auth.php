<?php
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params(array('httponly' => true, 'samesite' => 'Lax'));
    session_start();
}
require_once __DIR__ . '/../conexion.php';
require_once __DIR__ . '/db.php';

function h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

function rol_actual() { return isset($_SESSION['rol']) ? $_SESSION['rol'] : ''; }
function es_admin() { return rol_actual() === 'secretario'; }
function es_acudiente() { return in_array(rol_actual(), array('mama', 'papa'), true); }

function flash($mensaje, $tipo = 'ok') { $_SESSION['flash'][] = array($tipo, $mensaje); }

function error_pagina($mensaje, $codigo = 403) {
    http_response_code($codigo);
    require_once __DIR__ . '/layout.php';
    encabezado('Aviso');
    echo '<div class="tarjeta"><p>' . h($mensaje) . '</p><p><a class="boton" href="inicio.php">Volver al inicio</a></p></div>';
    pie();
    exit;
}

function requerir($roles = array()) {
    if (!isset($_SESSION['rol'])) { header('Location: login.php'); exit; }
    if (count($roles) && !in_array($_SESSION['rol'], $roles, true)) {
        error_pagina('No tienes permiso para ver esta página.');
    }
}

function csrf() {
    if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(16));
    return $_SESSION['csrf'];
}
function csrf_campo() { return '<input type="hidden" name="csrf" value="' . h(csrf()) . '">'; }
function csrf_validar() {
    $ok = !empty($_POST['csrf']) && !empty($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $_POST['csrf']);
    if (!$ok) error_pagina('La solicitud no es válida o la página expiró. Vuelve atrás, recárgala e inténtalo de nuevo.', 400);
}

function verificar_password($ingresada, $guardada) {
    if (strpos($guardada, '$2y$') === 0 || strpos($guardada, '$argon') === 0) {
        return password_verify($ingresada, $guardada);
    }
    return hash_equals((string)$guardada, (string)$ingresada);
}

function puede_ver_estudiante($doc) {
    $rol = rol_actual();
    $yo = isset($_SESSION['documento']) ? (string)$_SESSION['documento'] : '';
    if ($rol === 'secretario') return true;
    $e = db_one('SELECT documento, mama, papa, grado FROM estudiante WHERE documento = ?', 's', array((string)$doc));
    if (!$e) return false;
    if ($rol === 'docente') {
        $d = db_one('SELECT grado FROM docente WHERE documento = ?', 's', array($yo));
        return $d && (string)$d['grado'] === (string)$e['grado'];
    }
    if ($rol === 'mama') return (string)$e['mama'] === $yo;
    if ($rol === 'papa') return (string)$e['papa'] === $yo;
    if ($rol === 'estudiante') return (string)$e['documento'] === $yo;
    return false;
}

function estudiante_solicitado() {
    requerir();
    $doc = isset($_GET['doc']) ? $_GET['doc'] : (isset($_POST['doc']) ? $_POST['doc'] : '');
    if (!ctype_digit((string)$doc)) error_pagina('Falta indicar el estudiante.', 400);
    if (!puede_ver_estudiante($doc)) error_pagina('No tienes permiso para ver a este estudiante.');
    $e = db_one('SELECT e.*, g.nombre AS gnombre FROM estudiante e LEFT JOIN grados g ON g.codigo = e.grado WHERE e.documento = ?', 's', array((string)$doc));
    if (!$e) error_pagina('El estudiante no existe.', 404);
    return $e;
}
