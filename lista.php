<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
require_once __DIR__ . '/includes/entidades.php';
requerir(array('secretario', 'docente'));

$clave = isset($_GET['e']) ? $_GET['e'] : '';
$e = entidad($clave);
if (!$e) error_pagina('Esa sección no existe.', 404);
if (rol_actual() === 'docente' && $clave !== 'estudiante') error_pagina('No tienes permiso para ver esta sección.');

$q = trim(isset($_GET['q']) ? $_GET['q'] : '');
$donde = array(); $tipos = ''; $par = array();

if (rol_actual() === 'docente') {
    $d = db_one('SELECT grado FROM docente WHERE documento = ?', 's', array($_SESSION['documento']));
    $donde[] = 't.' . $e['filtro_docente'] . ' = ?';
    $tipos .= 's'; $par[] = $d ? (string)$d['grado'] : '-1';
}
if ($q !== '') {
    $partes = array();
    foreach ($e['buscar'] as $c) $partes[] = 't.' . $c;
    $donde[] = "CONCAT_WS(' ', " . implode(', ', $partes) . ") LIKE ?";
    $tipos .= 's'; $par[] = '%' . $q . '%';
}
$sql = 'SELECT * FROM (' . $e['sql'] . ') t' . (count($donde) ? ' WHERE ' . implode(' AND ', $donde) : '') . ' ORDER BY t.nombre IS NULL, t.pk';
if ($clave === 'grados') $sql = 'SELECT * FROM (' . $e['sql'] . ') t' . (count($donde) ? ' WHERE ' . implode(' AND ', $donde) : '') . ' ORDER BY t.pk';
$filas = db_all($sql, $tipos, $par);

encabezado(rol_actual() === 'docente' ? 'Mis estudiantes' : $e['plural']);
?>
<div class="herramientas">
  <form method="get" action="lista.php" class="buscador">
    <input type="hidden" name="e" value="<?php echo h($clave); ?>">
    <input type="search" name="q" placeholder="Buscar..." value="<?php echo h($q); ?>">
    <button class="boton" type="submit">Buscar</button>
    <?php if ($q !== ''): ?><a class="boton claro" href="lista.php?e=<?php echo h($clave); ?>">Quitar filtro</a><?php endif; ?>
  </form>
  <?php if (es_admin()): ?><a class="boton" href="form.php?e=<?php echo h($clave); ?>">+ Nuevo</a><?php endif; ?>
</div>
<p class="pequeno"><?php echo count($filas); ?> registro(s)</p>
<div class="tabla-caja">
<table>
  <thead><tr>
    <?php foreach ($e['cols'] as $et): ?><th><?php echo h($et); ?></th><?php endforeach; ?>
    <th>Acciones</th>
  </tr></thead>
  <tbody>
  <?php foreach ($filas as $f): ?>
    <tr>
      <?php foreach ($e['cols'] as $alias => $et): ?><td><?php echo h($f[$alias]); ?></td><?php endforeach; ?>
      <td class="acciones">
        <?php
        if (es_admin()) {
            echo '<a href="form.php?e=' . h($clave) . '&amp;id=' . h($f['pk']) . '">Editar</a>';
            echo '<a class="peligro" href="eliminar.php?e=' . h($clave) . '&amp;id=' . h($f['pk']) . '">Eliminar</a>';
        }
        if (isset($e['extra'])) {
            foreach ($e['extra'] as $x) {
                if (in_array(rol_actual(), $x[2], true)) {
                    echo '<a href="' . h(str_replace('{pk}', $f['pk'], $x[1])) . '">' . h($x[0]) . '</a>';
                }
            }
        }
        ?>
      </td>
    </tr>
  <?php endforeach; ?>
  <?php if (!$filas): ?><tr><td colspan="<?php echo count($e['cols']) + 1; ?>">No hay registros.</td></tr><?php endif; ?>
  </tbody>
</table>
</div>
<?php pie();
