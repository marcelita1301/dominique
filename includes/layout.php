<?php
function menu_rol() {
    $rol = rol_actual();
    $m = array(array('inicio.php', 'Inicio'));
    if ($rol === 'secretario') {
        $m[] = array('lista.php?e=estudiante', 'Estudiantes');
        $m[] = array('lista.php?e=docente', 'Docentes');
        $m[] = array('lista.php?e=mama', 'Madres');
        $m[] = array('lista.php?e=papa', 'Padres');
        $m[] = array('lista.php?e=grados', 'Grados');
        $m[] = array('lista.php?e=secretario', 'Secretarios');
        $m[] = array('anecdotario.php', 'Anecdotario');
        $m[] = array('pensiones.php', 'Pensiones');
        $m[] = array('documentos.php', 'Formatos');
    } elseif ($rol === 'docente') {
        $m[] = array('lista.php?e=estudiante', 'Mis estudiantes');
        $m[] = array('anecdotario.php', 'Anecdotario');
        $m[] = array('documentos.php', 'Formatos');
    } else {
        $m[] = array('documentos.php', 'Formatos');
    }
    return $m;
}

function mostrar_flash() {
    if (!empty($_SESSION['flash'])) {
        foreach ($_SESSION['flash'] as $f) {
            echo '<div class="aviso ' . ($f[0] === 'error' ? 'error' : 'ok') . '">' . h($f[1]) . '</div>';
        }
        unset($_SESSION['flash']);
    }
}

function encabezado($titulo) {
    ?><!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo h($titulo); ?> · Centro Educativo Dominique</title>
<link href="index2/imagenes/imagencorporativa.jpg" rel="icon">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400" rel="stylesheet">
<link rel="stylesheet" href="css/app.css">
</head>
<body>
<header id="cabecera">
  <div class="cab-interior">
    <a class="logo" href="inicio.php"><img src="assets/img/imagencorporativa.jpg" alt="Centro Educativo Dominique"></a>
    <input type="checkbox" id="menu-check" class="menu-check">
    <label for="menu-check" class="menu-boton" aria-label="Abrir menú">&#9776;</label>
    <nav>
      <?php foreach (menu_rol() as $item): ?>
        <a href="<?php echo h($item[0]); ?>"><?php echo h($item[1]); ?></a>
      <?php endforeach; ?>
    </nav>
    <a class="pildora" href="salir.php">Cerrar sesión</a>
  </div>
</header>
<section class="banner"><div class="banner-interior"><h1><?php echo h($titulo); ?></h1></div></section>
<main class="contenido">
<?php
    mostrar_flash();
}

function pie() {
    ?></main>
<footer class="pie">Centro Educativo Dominique · La Ceja, Antioquia</footer>
</body>
</html>
<?php
}

function encabezado_form($titulo, $claseBody = '') {
    ?><!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo h($titulo); ?></title>
<link href="index2/imagenes/imagencorporativa.jpg" rel="icon">
<link rel="stylesheet" href="cssform2.css">
<link rel="stylesheet" href="css/form_extra.css">
</head>
<body<?php echo $claseBody !== '' ? ' class="' . h($claseBody) . '"' : ''; ?>>
<h1><?php echo h($titulo); ?></h1>
<?php
    mostrar_flash();
}

function pie_form() {
    ?></body>
</html>
<?php
}
