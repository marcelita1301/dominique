<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
requerir(array('secretario', 'docente'));
$est = estudiante_solicitado();
$doc = (string)$est['documento'];

$campos = array(
    array('nombreestudiante', 'Nombres completos del estudiante', 'text', 50, true),
    array('fechanacimiento', 'Fecha de nacimiento', 'date', 0, true),
    array('direccion', 'Dirección de residencia', 'text', 50, true),
    array('nombremadre', 'Nombre de la madre', 'text', 50, true),
    array('documentom', 'Cédula de la madre', 'tel', 20, true),
    array('telefonom', 'Teléfono de la madre', 'tel', 20, true),
    array('nombrepadre', 'Nombre del padre', 'text', 50, true),
    array('documentop', 'Cédula del padre', 'tel', 20, true),
    array('telefonop', 'Teléfono del padre', 'tel', 20, true),
    array('acudiente', 'Otro acudiente (opcional)', 'text', 50, false),
    array('parentesco', 'Parentesco (opcional)', 'text', 50, false),
    array('telefonoacu', 'Teléfono del acudiente (opcional)', 'tel', 20, false),
    array('docente', 'Docente', 'text', 50, true),
    array('fechainiciacion', 'Fecha de inicio de la ficha', 'date', 0, true),
    array('anio', 'Año', 'number', 0, true),
);

$ficha = db_one('SELECT * FROM anecdatario WHERE documentoestudiante = ?', 's', array($doc));
$existe = (bool)$ficha;
if ($ficha) $ficha['anio'] = $ficha['año'];
if (!$ficha) {
    $m = db_one('SELECT * FROM mama WHERE documentom = ?', 's', array((string)$est['mama']));
    $p = db_one('SELECT * FROM papa WHERE documentop = ?', 's', array((string)$est['papa']));
    $d = db_one('SELECT * FROM docente WHERE grado = ? LIMIT 1', 's', array((string)$est['grado']));
    $ficha = array(
        'nombreestudiante' => trim($est['nombre'] . ' ' . $est['apellidos']),
        'fechanacimiento' => $est['fecha'], 'direccion' => $est['direccion'],
        'nombremadre' => $m ? trim($m['nombrem'] . ' ' . $m['apellidosm']) : '', 'documentom' => $m ? $m['documentom'] : '', 'telefonom' => $m ? $m['telefonom'] : '',
        'nombrepadre' => $p ? trim($p['nombrep'] . ' ' . $p['apellidosp']) : '', 'documentop' => $p ? $p['documentop'] : '', 'telefonop' => $p ? $p['telefonop'] : '',
        'acudiente' => '', 'parentesco' => '', 'telefonoacu' => '',
        'docente' => $d ? trim($d['nombre'] . ' ' . $d['apellidos']) : (rol_actual() === 'docente' ? $_SESSION['nombre'] : ''),
        'fechainiciacion' => date('Y-m-d'), 'anio' => date('Y'),
    );
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_validar();
    $errores = array(); $datos = array();
    foreach ($campos as $c) {
        list($n, $l, $t, $max, $req) = $c;
        $v = trim(isset($_POST[$n]) ? $_POST[$n] : '');
        if ($v === '') { if ($req) $errores[] = "$l es obligatorio."; $datos[$n] = ''; continue; }
        if ($max && mb_strlen($v) > $max) $errores[] = "$l es demasiado largo.";
        if ($t === 'date') { $dt = DateTime::createFromFormat('Y-m-d', $v); if (!$dt || $dt->format('Y-m-d') !== $v) $errores[] = "$l no es una fecha válida."; }
        if ($t === 'number' && !ctype_digit($v)) $errores[] = "$l debe ser un número.";
        if ($t === 'tel' && !preg_match('/^[0-9 +\-]{4,20}$/', $v)) $errores[] = "$l no es válido.";
        $datos[$n] = $v;
    }
    if (isset($datos['anio'])) { $datos['año'] = $datos['anio']; unset($datos['anio']); }
    if ($errores) {
        foreach ($errores as $m) flash($m, 'error');
        $ficha = array_merge($ficha, $_POST);
    } else {
        if ($existe) {
            $sets = array(); $par = array();
            foreach ($datos as $n => $v) { $sets[] = "`$n` = ?"; $par[] = $v; }
            $par[] = $est['grado']; $par[] = $doc;
            $r = db_exec('UPDATE anecdatario SET ' . implode(', ', $sets) . ', `grado` = ? WHERE documentoestudiante = ?', str_repeat('s', count($par)), $par);
        } else {
            $cols = array('documentoestudiante', 'grado'); $marc = array('?', '?'); $par = array($doc, $est['grado']);
            foreach ($datos as $n => $v) { $cols[] = "`$n`"; $marc[] = '?'; $par[] = $v; }
            $r = db_exec('INSERT INTO anecdatario (' . implode(', ', $cols) . ') VALUES (' . implode(', ', $marc) . ')', str_repeat('s', count($par)), $par);
        }
        if ($r === false) {
            flash('No se pudo guardar la ficha. ¿Ya ejecutaste migracion.sql? (' . db_error() . ')', 'error');
            $ficha = array_merge($ficha, $_POST);
        } else {
            flash('Ficha guardada.');
            header('Location: anecdotario.php?doc=' . urlencode($doc));
            exit;
        }
    }
}

encabezado_form(($existe ? 'Editar' : 'Crear') . ' ficha de ' . $est['nombre']);
?>
<form method="POST" action="anecdotario_form.php?doc=<?php echo h($doc); ?>" autocomplete="off">
<?php echo csrf_campo(); ?>
<input type="hidden" name="doc" value="<?php echo h($doc); ?>">
<section>
  <p>Documento <?php echo h($doc); ?> · Grado <?php echo h($est['gnombre']); ?><br><small>Los datos se llenaron con lo ya registrado; corrige lo que haga falta.</small></p>
  <?php foreach ($campos as $c): list($n, $l, $t, $max, $req) = $c; ?>
    <span class="mini"><?php echo h($l); ?></span>
    <input type="<?php echo h($t); ?>" placeholder="<?php echo h($l); ?>" name="<?php echo h($n); ?>" <?php echo $req ? 'required' : ''; ?> <?php echo $max ? 'maxlength="' . (int)$max . '"' : ''; ?> value="<?php echo h(isset($ficha[$n]) ? $ficha[$n] : ''); ?>"/>
  <?php endforeach; ?>
</section>
<input type="submit" class="button" value="Guardar">
<a class="button gris" href="anecdotario.php?doc=<?php echo h($doc); ?>">Cancelar</a>
</form>
<?php pie_form();
