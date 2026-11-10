<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
requerir();

$meses = array(1 => 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre');
$anio = (int)date('Y');
if (isset($_REQUEST['anio']) && ctype_digit($_REQUEST['anio']) && (int)$_REQUEST['anio'] >= 2000 && (int)$_REQUEST['anio'] <= 2100) $anio = (int)$_REQUEST['anio'];

if (!isset($_GET['doc']) && !isset($_POST['doc'])) {
    requerir(array('secretario'));
    $q = trim(isset($_GET['q']) ? $_GET['q'] : '');
    $limite = min((int)date('n'), MESES_ESCOLARES);
    $tipos = 'iii'; $par = array($anio, $limite, $anio);
    $donde = '';
    if ($q !== '') { $donde = " WHERE CONCAT_WS(' ', e.documento, e.nombre, e.apellidos) LIKE ?"; $tipos .= 's'; $par[] = '%' . $q . '%'; }
    $filas = db_all("SELECT e.documento, e.nombre, e.apellidos, g.nombre AS grado,
        (SELECT COUNT(*) FROM pension p WHERE p.estudiante = e.documento AND p.anio = ? AND p.mes <= ? AND p.estado = 'por pagar') AS pendientes,
        (SELECT COUNT(*) FROM pension p2 WHERE p2.estudiante = e.documento AND p2.anio = ?) AS generadas
        FROM estudiante e LEFT JOIN grados g ON g.codigo = e.grado" . $donde . ' ORDER BY e.nombre, e.apellidos', $tipos, $par);
    encabezado('Pensiones ' . $anio);
    ?>
    <form method="get" action="pensiones.php" class="buscador herramientas">
      <input type="number" name="anio" value="<?php echo (int)$anio; ?>" min="2000" max="2100" style="max-width:110px">
      <input type="search" name="q" placeholder="Buscar estudiante..." value="<?php echo h($q); ?>">
      <button class="boton" type="submit">Buscar</button>
    </form>
    <div class="tabla-caja"><table>
      <thead><tr><th>Documento</th><th>Nombre</th><th>Grado</th><th>Meses pendientes</th><th></th></tr></thead>
      <tbody>
      <?php foreach ($filas as $f): ?>
        <tr><td><?php echo h($f['documento']); ?></td><td><?php echo h($f['nombre'] . ' ' . $f['apellidos']); ?></td><td><?php echo h($f['grado']); ?></td>
        <td><?php echo $f['generadas'] ? (int)$f['pendientes'] : 'Sin generar'; ?></td>
        <td class="acciones"><a href="pensiones.php?doc=<?php echo h($f['documento']); ?>&amp;anio=<?php echo (int)$anio; ?>">Abrir</a></td></tr>
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
    requerir(array('secretario'));
    csrf_validar();
    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';
    if ($accion === 'generar') {
        $creadas = 0;
        for ($m = 1; $m <= MESES_ESCOLARES; $m++) {
            $r = db_exec("INSERT IGNORE INTO pension (estudiante, anio, mes, valor, concepto, estado) VALUES (?, ?, ?, ?, 'mensualidad', 'por pagar')", 'siii', array($doc, $anio, $m, PENSION_VALOR));
            if ($r === false) { flash('No se pudieron generar las pensiones. ¿Ya ejecutaste migracion.sql? (' . db_error() . ')', 'error'); $creadas = -1; break; }
            $creadas += $r;
        }
        if ($creadas >= 0) flash($creadas > 0 ? "Se generaron $creadas mensualidad(es) de $anio." : 'Las mensualidades de ese año ya estaban generadas.');
    } elseif ($accion === 'pagar' || $accion === 'anular') {
        $mes = isset($_POST['mes']) ? $_POST['mes'] : '';
        if (ctype_digit($mes) && (int)$mes >= 1 && (int)$mes <= MESES_ESCOLARES) {
            if ($accion === 'pagar') db_exec("UPDATE pension SET estado = 'pagada', fecha_pago = CURDATE() WHERE estudiante = ? AND anio = ? AND mes = ?", 'sii', array($doc, $anio, (int)$mes));
            else db_exec("UPDATE pension SET estado = 'por pagar', fecha_pago = NULL WHERE estudiante = ? AND anio = ? AND mes = ?", 'sii', array($doc, $anio, (int)$mes));
            flash($accion === 'pagar' ? 'Pago registrado.' : 'Pago anulado.');
        }
    }
    header('Location: pensiones.php?doc=' . urlencode($doc) . '&anio=' . $anio);
    exit;
}

$filas = db_all('SELECT * FROM pension WHERE estudiante = ? AND anio = ? ORDER BY mes', 'si', array($doc, $anio));
$porMes = array();
foreach ($filas as $f) $porMes[(int)$f['mes']] = $f;

encabezado('Pensiones de ' . $est['nombre'] . ' ' . $est['apellidos']);
?>
<p class="pequeno">Documento <?php echo h($doc); ?> · Grado: <?php echo h($est['gnombre']); ?></p>
<form method="get" action="pensiones.php" class="buscador herramientas">
  <input type="hidden" name="doc" value="<?php echo h($doc); ?>">
  <label style="display:inline-block">Año <input type="number" name="anio" value="<?php echo (int)$anio; ?>" min="2000" max="2100" style="max-width:110px"></label>
  <button class="boton claro" type="submit">Ver</button>
  <?php if (es_admin()): ?><a class="boton claro" href="pensiones.php">Volver a la lista</a><?php endif; ?>
</form>

<?php if (!$filas): ?>
  <div class="tarjeta">
    <p>No hay mensualidades generadas para <?php echo (int)$anio; ?>.</p>
    <?php if (es_admin()): ?>
    <form method="post" action="pensiones.php">
      <?php echo csrf_campo(); ?>
      <input type="hidden" name="doc" value="<?php echo h($doc); ?>">
      <input type="hidden" name="anio" value="<?php echo (int)$anio; ?>">
      <input type="hidden" name="accion" value="generar">
      <button class="boton" type="submit">Generar mensualidades (<?php echo MESES_ESCOLARES; ?> meses, $<?php echo number_format(PENSION_VALOR, 0, ',', '.'); ?>)</button>
    </form>
    <?php else: ?><p class="pequeno">Consulta con la secretaría.</p><?php endif; ?>
  </div>
<?php else: ?>
  <div class="tabla-caja"><table>
    <thead><tr><th>Mes</th><th>Valor</th><th>Estado</th><th>Fecha de pago</th><?php if (es_admin()): ?><th></th><?php endif; ?></tr></thead>
    <tbody>
    <?php for ($m = 1; $m <= MESES_ESCOLARES; $m++): $f = isset($porMes[$m]) ? $porMes[$m] : null; ?>
      <tr>
        <td><?php echo h($meses[$m]); ?></td>
        <td><?php echo $f ? '$' . number_format($f['valor'], 0, ',', '.') : '-'; ?></td>
        <td><?php echo $f ? ($f['estado'] === 'pagada' ? '<span class="etq ok">Pagada</span>' : '<span class="etq mal">Por pagar</span>') : '-'; ?></td>
        <td><?php echo $f && $f['fecha_pago'] ? h($f['fecha_pago']) : '-'; ?></td>
        <?php if (es_admin()): ?>
        <td>
          <?php if ($f): ?>
          <form method="post" action="pensiones.php">
            <?php echo csrf_campo(); ?>
            <input type="hidden" name="doc" value="<?php echo h($doc); ?>">
            <input type="hidden" name="anio" value="<?php echo (int)$anio; ?>">
            <input type="hidden" name="mes" value="<?php echo $m; ?>">
            <?php if ($f['estado'] === 'pagada'): ?>
              <input type="hidden" name="accion" value="anular"><button class="boton claro pequeno-boton" type="submit">Anular pago</button>
            <?php else: ?>
              <input type="hidden" name="accion" value="pagar"><button class="boton pequeno-boton" type="submit">Registrar pago</button>
            <?php endif; ?>
          </form>
          <?php endif; ?>
        </td>
        <?php endif; ?>
      </tr>
    <?php endfor; ?>
    </tbody></table></div>
  <p><a class="boton" href="pazysalvo.php?doc=<?php echo h($doc); ?>&amp;anio=<?php echo (int)$anio; ?>">Generar paz y salvo</a></p>
<?php endif; ?>
<?php pie();
