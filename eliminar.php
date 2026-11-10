<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
require_once __DIR__ . '/includes/entidades.php';
requerir(array('secretario'));

$clave = isset($_REQUEST['e']) ? $_REQUEST['e'] : '';
$e = entidad($clave);
if (!$e) error_pagina('Esa sección no existe.', 404);
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
if (!ctype_digit($id)) error_pagina('Registro no válido.', 400);

$fila = db_one("SELECT * FROM {$e['tabla']} WHERE {$e['pk']} = ?", 's', array($id));
if (!$fila) error_pagina('El registro no existe.', 404);
if ($clave === 'secretario' && (string)$id === (string)$_SESSION['documento']) error_pagina('No puedes eliminar tu propia cuenta.');

$avisos = array();
$cuenta = function ($sql) use ($id) { $r = db_one($sql, 's', array($id)); return $r ? (int)$r['n'] : 0; };
if ($clave === 'mama') { $n = $cuenta('SELECT COUNT(*) AS n FROM estudiante WHERE mama = ?'); if ($n) $avisos[] = "Se eliminarán también $n estudiante(s) asociado(s) a esta madre."; }
if ($clave === 'papa') { $n = $cuenta('SELECT COUNT(*) AS n FROM estudiante WHERE papa = ?'); if ($n) $avisos[] = "Se eliminarán también $n estudiante(s) asociado(s) a este padre."; }
if ($clave === 'grados') {
    $n = $cuenta('SELECT COUNT(*) AS n FROM estudiante WHERE grado = ?'); if ($n) $avisos[] = "Se eliminarán también $n estudiante(s) de este grado.";
    $n = $cuenta('SELECT COUNT(*) AS n FROM docente WHERE grado = ?'); if ($n) $avisos[] = "Se eliminarán también $n docente(s) de este grado.";
}
if ($clave === 'estudiante') $avisos[] = 'Se eliminarán también su anecdotario y sus pensiones.';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_validar();
    if ($clave === 'estudiante') {
        db_exec('DELETE FROM anecdatario WHERE documentoestudiante = ?', 's', array($id));
        db_exec('DELETE FROM pension WHERE estudiante = ?', 's', array($id));
    }
    $r = db_exec("DELETE FROM {$e['tabla']} WHERE {$e['pk']} = ?", 's', array($id));
    if ($r === false) flash('No se pudo eliminar: el registro está siendo usado en otra parte. (' . db_error() . ')', 'error');
    else flash($e['titulo'] . ' eliminado/a.');
    header('Location: lista.php?e=' . urlencode($clave));
    exit;
}

$nombre = isset($fila['nombre']) ? $fila['nombre'] : (isset($fila['nombrem']) ? $fila['nombrem'] : (isset($fila['nombrep']) ? $fila['nombrep'] : $id));
encabezado('Eliminar ' . strtolower($e['titulo']));
?>
<div class="tarjeta">
  <p>¿Seguro que quieres eliminar a <b><?php echo h($nombre); ?></b> (<?php echo h($e['pk_l'] . ' ' . $id); ?>)? Esta acción no se puede deshacer.</p>
  <?php foreach ($avisos as $a): ?><div class="aviso error"><?php echo h($a); ?></div><?php endforeach; ?>
  <form method="post" action="eliminar.php">
    <?php echo csrf_campo(); ?>
    <input type="hidden" name="e" value="<?php echo h($clave); ?>">
    <input type="hidden" name="id" value="<?php echo h($id); ?>">
    <button class="boton peligro" type="submit">Sí, eliminar</button>
    <a class="boton claro" href="lista.php?e=<?php echo h($clave); ?>">No, volver</a>
  </form>
</div>
<?php pie();
