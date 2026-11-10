<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
require_once __DIR__ . '/includes/entidades.php';
requerir(array('secretario'));
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: inicio.php'); exit; }
csrf_validar();

$clave = isset($_POST['e']) ? $_POST['e'] : '';
$e = entidad($clave);
if (!$e) error_pagina('Esa sección no existe.', 404);

$idOriginal = isset($_POST['id_original']) ? $_POST['id_original'] : '';
$editando = ($idOriginal !== '');
$errores = array();
$datos = array();

$pk = trim(isset($_POST[$e['pk']]) ? $_POST[$e['pk']] : '');
if ($editando) $pk = $idOriginal;
if (!ctype_digit($pk) || (int)$pk < 1 || (int)$pk > 2147483647) $errores[] = $e['pk_l'] . ' debe ser un número válido.';

$actual = array();
if ($editando && !$errores) {
    $actual = db_one("SELECT * FROM {$e['tabla']} WHERE {$e['pk']} = ?", 's', array($pk));
    if (!$actual) error_pagina('El registro que intentas editar no existe.', 404);
} elseif (!$editando && !$errores) {
    if (db_one("SELECT 1 AS x FROM {$e['tabla']} WHERE {$e['pk']} = ?", 's', array($pk))) {
        $errores[] = 'Ya existe un registro con ese ' . strtolower($e['pk_l']) . '.';
    }
}

$hash = null;
if ($e['pass']) {
    $clavePost = isset($_POST['__password']) ? $_POST['__password'] : '';
    if (!$editando && $clavePost === '') $errores[] = 'La contraseña es obligatoria.';
    if ($clavePost !== '') {
        if (strlen($clavePost) < 6) $errores[] = 'La contraseña debe tener al menos 6 caracteres.';
        elseif (!columna_larga($e['tabla'], $e['pass'])) $errores[] = 'Falta ejecutar el archivo migracion.sql en phpMyAdmin (la columna de contraseña es muy corta).';
        else $hash = password_hash($clavePost, PASSWORD_DEFAULT);
    }
}

foreach ($e['campos'] as $c) {
    $n = $c['n'];
    $v = trim(isset($_POST[$n]) ? $_POST[$n] : '');
    $max = isset($c['max']) ? $c['max'] : 50;
    if ($v === '') {
        if (!empty($c['r'])) $errores[] = $c['l'] . ' es obligatorio.';
        $datos[$n] = '';
        continue;
    }
    if ($c['t'] === 'text' || $c['t'] === 'email' || $c['t'] === 'tel') {
        if (mb_strlen($v) > $max) $errores[] = $c['l'] . " no puede tener más de $max caracteres.";
    }
    if ($c['t'] === 'email' && !filter_var($v, FILTER_VALIDATE_EMAIL)) $errores[] = $c['l'] . ' no es un correo válido.';
    if ($c['t'] === 'tel' && !preg_match('/^[0-9 +\-]{6,20}$/', $v)) $errores[] = $c['l'] . ' no es un teléfono válido.';
    if ($c['t'] === 'date') {
        $d = DateTime::createFromFormat('Y-m-d', $v);
        if (!$d || $d->format('Y-m-d') !== $v) $errores[] = $c['l'] . ' no es una fecha válida.';
    }
    if ($c['t'] === 'select') {
        $permitidos = array_keys($c['o']);
        $antiguo = isset($actual[$n]) ? (string)$actual[$n] : null;
        if (!in_array($v, array_map('strval', $permitidos), true) && $v !== $antiguo) $errores[] = $c['l'] . ' no es válido.';
    }
    if ($c['t'] === 'fk') {
        $fk = $c['fk'];
        if (!ctype_digit($v) || !db_one("SELECT 1 AS x FROM {$fk['tabla']} WHERE {$fk['v']} = ?", 's', array($v))) {
            $errores[] = $c['l'] . ' no es válido.';
        }
    }
    $datos[$n] = $v;
}

if ($errores) {
    foreach ($errores as $m) flash($m, 'error');
    $_SESSION['old'] = $_POST;
    header('Location: form.php?e=' . urlencode($clave) . ($editando ? '&id=' . urlencode($idOriginal) : ''));
    exit;
}

if ($editando) {
    $sets = array(); $tipos = ''; $par = array();
    foreach ($datos as $n => $v) { $sets[] = "`$n` = ?"; $tipos .= 's'; $par[] = $v; }
    if ($hash !== null) { $sets[] = "`{$e['pass']}` = ?"; $tipos .= 's'; $par[] = $hash; }
    $tipos .= 's'; $par[] = $pk;
    $r = db_exec("UPDATE {$e['tabla']} SET " . implode(', ', $sets) . " WHERE `{$e['pk']}` = ?", $tipos, $par);
} else {
    $cols = array("`{$e['pk']}`"); $marcas = array('?'); $tipos = 's'; $par = array($pk);
    foreach ($datos as $n => $v) { $cols[] = "`$n`"; $marcas[] = '?'; $tipos .= 's'; $par[] = $v; }
    if ($e['pass']) { $cols[] = "`{$e['pass']}`"; $marcas[] = '?'; $tipos .= 's'; $par[] = $hash; }
    $r = db_exec("INSERT INTO {$e['tabla']} (" . implode(', ', $cols) . ') VALUES (' . implode(', ', $marcas) . ')', $tipos, $par);
}

if ($r === false) {
    flash('No se pudo guardar. Revisa los datos e inténtalo de nuevo. (' . db_error() . ')', 'error');
    $_SESSION['old'] = $_POST;
    header('Location: form.php?e=' . urlencode($clave) . ($editando ? '&id=' . urlencode($idOriginal) : ''));
    exit;
}
flash($e['titulo'] . ($editando ? ' actualizado/a' : ' guardado/a') . ' correctamente.');
header('Location: lista.php?e=' . urlencode($clave));
exit;
