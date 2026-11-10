<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
requerir();

$puedeEditar = in_array(rol_actual(), array('secretario', 'docente'), true);

if (!isset($_GET['doc']) && !isset($_POST['doc'])) {
    requerir(array('secretario', 'docente'));
    $q = trim(isset($_GET['q']) ? $_GET['q'] : '');
    $donde = array(); $tipos = ''; $par = array();
    if (rol_actual() === 'docente') {
        $d = db_one('SELECT grado FROM docente WHERE documento = ?', 's', array($_SESSION['documento']));
        $donde[] = 'e.grado = ?'; $tipos .= 's'; $par[] = $d ? (string)$d['grado'] : '-1';
    }
    if ($q !== '') {
        $donde[] = "CONCAT_WS(' ', e.documento, e.nombre, e.apellidos) LIKE ?"; $tipos .= 's'; $par[] = '%' . $q . '%';
    }
    $sql = 'SELECT e.documento, e.nombre, e.apellidos, g.nombre AS grado, (SELECT COUNT(*) FROM anecdatario a WHERE a.documentoestudiante = e.documento) AS ficha FROM estudiante e LEFT JOIN grados g ON g.codigo = e.grado'
         . (count($donde) ? ' WHERE ' . implode(' AND ', $donde) : '') . ' ORDER BY e.nombre, e.apellidos';
    $filas = db_all($sql, $tipos, $par);
    encabezado('Anecdotario');
    ?>
    <form method="get" action="anecdotario.php" class="buscador herramientas">
      <input type="search" name="q" placeholder="Buscar estudiante..." value="<?php echo h($q); ?>">
      <button class="boton" type="submit">Buscar</button>
    </form>
    <div class="tabla-caja"><table>
      <thead><tr><th>Documento</th><th>Nombre</th><th>Grado</th><th>Ficha</th><th>Acciones</th></tr></thead>
      <tbody>
      <?php foreach ($filas as $f): ?>
        <tr><td><?php echo h($f['documento']); ?></td><td><?php echo h($f['nombre'] . ' ' . $f['apellidos']); ?></td><td><?php echo h($f['grado']); ?></td>
        <td><?php echo $f['ficha'] ? 'Creada' : 'Pendiente'; ?></td>
        <td class="acciones"><a href="anecdotario.php?doc=<?php echo h($f['documento']); ?>">Abrir</a></td></tr>
      <?php endforeach; ?>
      <?php if (!$filas): ?><tr><td colspan="5">No hay estudiantes.</td></tr><?php endif; ?>
      </tbody></table></div>
    <?php
    pie();
    exit;
}

$est = estudiante_solicitado();
$doc = (string)$est['documento'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$puedeEditar) error_pagina('No tienes permiso para modificar el anecdotario.');
    csrf_validar();
    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';
    if ($accion === 'agregar') {
        $fecha = trim(isset($_POST['fecha']) ? $_POST['fecha'] : '');
        $texto = trim(isset($_POST['comportamiento']) ? $_POST['comportamiento'] : '');
        $firma = trim(isset($_POST['firma']) ? $_POST['firma'] : '');
        $d = DateTime::createFromFormat('Y-m-d', $fecha);
        if (!db_one('SELECT 1 AS x FROM anecdatario WHERE documentoestudiante = ?', 's', array($doc))) {
            flash('Primero crea la ficha del estudiante.', 'error');
        } elseif (!$d || $d->format('Y-m-d') !== $fecha || $texto === '' || $firma === '' || mb_strlen($firma) > 100) {
            flash('Completa la fecha, el comportamiento observado y la firma.', 'error');
        } elseif (db_exec('INSERT INTO anecdota (documentoestudiante, fecha, comportamiento, firma) VALUES (?, ?, ?, ?)', 'ssss', array($doc, $fecha, $texto, $firma)) === false) {
            flash('No se pudo guardar la observación. ¿Ya ejecutaste migracion.sql? (' . db_error() . ')', 'error');
        } else {
            flash('Observación agregada.');
        }
    } elseif ($accion === 'borrar') {
        $idObs = isset($_POST['id_obs']) ? $_POST['id_obs'] : '';
        if (ctype_digit($idObs)) {
            db_exec('DELETE FROM anecdota WHERE id = ? AND documentoestudiante = ?', 'is', array((int)$idObs, $doc));
            flash('Observación eliminada.');
        }
    }
    header('Location: anecdotario.php?doc=' . urlencode($doc));
    exit;
}

$ficha = db_one('SELECT * FROM anecdatario WHERE documentoestudiante = ?', 's', array($doc));
$obs = db_all('SELECT * FROM anecdota WHERE documentoestudiante = ? ORDER BY fecha, id', 's', array($doc));
$firmaPorDefecto = '';
if (rol_actual() === 'docente') $firmaPorDefecto = $_SESSION['nombre'];

encabezado('Anecdotario de ' . $est['nombre'] . ' ' . $est['apellidos']);
?>
<p class="pequeno">Documento <?php echo h($doc); ?> · Grado: <?php echo h($est['gnombre']); ?></p>
<?php if (!$ficha): ?>
  <div class="tarjeta">
    <p>Este estudiante todavía no tiene ficha de anecdotario.</p>
    <?php if ($puedeEditar): ?><p><a class="boton" href="anecdotario_form.php?doc=<?php echo h($doc); ?>">Crear ficha</a></p><?php endif; ?>
  </div>
<?php else: ?>
  <div class="tarjeta">
    <h2>Ficha</h2>
    <dl class="ficha">
      <dt>Nombre</dt><dd><?php echo h($ficha['nombreestudiante']); ?></dd>
      <dt>Fecha de nacimiento</dt><dd><?php echo h($ficha['fechanacimiento']); ?></dd>
      <dt>Dirección</dt><dd><?php echo h($ficha['direccion']); ?></dd>
      <dt>Madre</dt><dd><?php echo h($ficha['nombremadre'] . ' · C.C. ' . $ficha['documentom'] . ' · Tel. ' . $ficha['telefonom']); ?></dd>
      <dt>Padre</dt><dd><?php echo h($ficha['nombrepadre'] . ' · C.C. ' . $ficha['documentop'] . ' · Tel. ' . $ficha['telefonop']); ?></dd>
      <dt>Otro acudiente</dt><dd><?php echo h(trim($ficha['acudiente'] . ' ' . $ficha['parentesco'] . ' ' . $ficha['telefonoacu'])); ?></dd>
      <dt>Docente</dt><dd><?php echo h($ficha['docente']); ?></dd>
      <dt>Año / inicio de la ficha</dt><dd><?php echo h($ficha['año'] . ' · ' . $ficha['fechainiciacion']); ?></dd>
    </dl>
    <p>
      <a class="boton" href="anecdotario_pdf.php?doc=<?php echo h($doc); ?>" target="_blank">Descargar PDF</a>
      <?php if ($puedeEditar): ?><a class="boton claro" href="anecdotario_form.php?doc=<?php echo h($doc); ?>">Editar ficha</a><?php endif; ?>
    </p>
  </div>

  <div class="tarjeta">
    <h2>Comportamientos observados</h2>
    <div class="tabla-caja"><table>
      <thead><tr><th>Fecha</th><th>Comportamiento específico observado</th><th>Firma</th><?php if ($puedeEditar): ?><th></th><?php endif; ?></tr></thead>
      <tbody>
      <?php foreach ($obs as $o): ?>
        <tr>
          <td><?php echo h($o['fecha']); ?></td>
          <td><?php echo nl2br(h($o['comportamiento'])); ?></td>
          <td><?php echo h($o['firma']); ?></td>
          <?php if ($puedeEditar): ?><td>
            <form method="post" action="anecdotario.php" onsubmit="return confirm('¿Eliminar esta observación?');">
              <?php echo csrf_campo(); ?>
              <input type="hidden" name="doc" value="<?php echo h($doc); ?>">
              <input type="hidden" name="accion" value="borrar">
              <input type="hidden" name="id_obs" value="<?php echo (int)$o['id']; ?>">
              <button class="boton peligro pequeno-boton" type="submit">Eliminar</button>
            </form></td><?php endif; ?>
        </tr>
      <?php endforeach; ?>
      <?php if (!$obs): ?><tr><td colspan="4">Aún no hay observaciones.</td></tr><?php endif; ?>
      </tbody></table></div>
  </div>

  <?php if ($puedeEditar): ?>
  <form method="post" action="anecdotario.php" class="formulario">
    <h2>Agregar observación</h2>
    <?php echo csrf_campo(); ?>
    <input type="hidden" name="doc" value="<?php echo h($doc); ?>">
    <input type="hidden" name="accion" value="agregar">
    <label>Fecha *<input type="date" name="fecha" required value="<?php echo h(date('Y-m-d')); ?>"></label>
    <label>Comportamiento observado *<textarea name="comportamiento" rows="4" required maxlength="2000"></textarea></label>
    <label>Firma (nombre de quien registra) *<input type="text" name="firma" required maxlength="100" value="<?php echo h($firmaPorDefecto); ?>"></label>
    <p><button class="boton" type="submit">Agregar</button></p>
  </form>
  <?php endif; ?>
<?php endif; ?>
<?php pie();
