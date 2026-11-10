<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
require_once __DIR__ . '/includes/entidades.php';
requerir(array('secretario'));

$clave = isset($_GET['e']) ? $_GET['e'] : '';
$e = entidad($clave);
if (!$e) error_pagina('Esa sección no existe.', 404);

$id = isset($_GET['id']) ? $_GET['id'] : '';
$editando = ($id !== '');
$fila = array();
if ($editando) {
    if (!ctype_digit($id)) error_pagina('Registro no válido.', 400);
    $fila = db_one("SELECT * FROM {$e['tabla']} WHERE {$e['pk']} = ?", 's', array($id));
    if (!$fila) error_pagina('El registro no existe.', 404);
}
$viejo = isset($_SESSION['old']) ? $_SESSION['old'] : null;
unset($_SESSION['old']);
$val = function ($nombre) use ($viejo, $fila) {
    if ($viejo !== null && isset($viejo[$nombre])) return $viejo[$nombre];
    return isset($fila[$nombre]) ? $fila[$nombre] : '';
};

encabezado_form(($editando ? 'Editar ' : 'Nuevo/a ') . strtolower($e['titulo']));
?>
<form action="guardar.php" method="POST" autocomplete="off">
<?php echo csrf_campo(); ?>
<input type="hidden" name="e" value="<?php echo h($clave); ?>">
<input type="hidden" name="id_original" value="<?php echo h($id); ?>">
<section>
  <p>Información <?php echo $clave === 'grados' ? 'del grado' : 'personal'; ?></p>

  <span class="mini"><?php echo h($e['pk_l']); ?></span>
  <input type="number" placeholder="<?php echo h($e['pk_l']); ?>" name="<?php echo h($e['pk']); ?>" required min="1" value="<?php echo h($val($e['pk'])); ?>" <?php echo $editando ? 'readonly style="background:#eee"' : ''; ?>/>

  <?php if ($e['pass']): ?>
  <span class="mini">Contraseña<?php echo $editando ? ' (vacía = no cambiarla)' : ''; ?></span>
  <input type="password" placeholder="Contraseña" name="__password" <?php echo $editando ? '' : 'required'; ?> minlength="6" autocomplete="new-password"/>
  <?php endif; ?>

  <?php foreach ($e['campos'] as $c):
      $actual = $val($c['n']);
      $req = !empty($c['r']) ? 'required' : '';
  ?>
    <span class="mini"><?php echo h($c['l']); ?></span>
    <?php if ($c['t'] === 'select'):
        $ops = $c['o'];
        if ($actual !== '' && !isset($ops[$actual])) $ops[$actual] = $actual;
    ?>
      <select name="<?php echo h($c['n']); ?>" <?php echo $req; ?>>
        <option value="" <?php echo $actual === '' ? 'selected' : ''; ?> disabled hidden><?php echo h($c['l']); ?></option>
        <?php foreach ($ops as $v => $txt): ?>
          <option value="<?php echo h($v); ?>" <?php echo ((string)$actual === (string)$v) ? 'selected' : ''; ?>><?php echo h($txt); ?></option>
        <?php endforeach; ?>
      </select>
    <?php elseif ($c['t'] === 'fk'): ?>
      <select name="<?php echo h($c['n']); ?>" <?php echo $req; ?>>
        <option value="" <?php echo $actual === '' ? 'selected' : ''; ?> disabled hidden><?php echo h($c['l']); ?></option>
        <?php foreach (opciones_fk($c['fk']) as $o): ?>
          <option value="<?php echo h($o['v']); ?>" <?php echo ((string)$actual === (string)$o['v']) ? 'selected' : ''; ?>><?php echo h($o['x']); ?></option>
        <?php endforeach; ?>
      </select>
    <?php else:
        $tipo = array('text' => 'text', 'number' => 'number', 'tel' => 'tel', 'date' => 'date', 'email' => 'email');
    ?>
      <input type="<?php echo h($tipo[$c['t']]); ?>" placeholder="<?php echo h($c['l']); ?>" name="<?php echo h($c['n']); ?>" <?php echo $req; ?> maxlength="<?php echo isset($c['max']) ? (int)$c['max'] : 50; ?>" value="<?php echo h($actual); ?>"/>
    <?php endif; ?>
  <?php endforeach; ?>
</section>
<input type="submit" class="button" value="Guardar">
<a class="button gris" href="lista.php?e=<?php echo h($clave); ?>">Cancelar</a>
</form>
<?php pie_form();
