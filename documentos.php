<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
requerir();

$permitidas = array('doc', 'docx', 'pdf', 'xls', 'xlsx', 'png', 'jpg', 'jpeg');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    requerir(array('secretario'));
    csrf_validar();
    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';
    if ($accion === 'subir') {
        $nombre = trim(isset($_POST['nombre']) ? $_POST['nombre'] : '');
        $f = isset($_FILES['archivo']) ? $_FILES['archivo'] : null;
        if ($nombre === '' || mb_strlen($nombre) > 50) {
            flash('Escribe un nombre para el formato (máximo 50 caracteres).', 'error');
        } elseif (!$f || $f['error'] !== UPLOAD_ERR_OK) {
            flash('No se pudo recibir el archivo. Revisa que no pese demasiado.', 'error');
        } elseif ($f['size'] > 5 * 1024 * 1024) {
            flash('El archivo supera los 5 MB.', 'error');
        } else {
            $ext = strtolower(pathinfo($f['name'], PATHINFO_EXTENSION));
            if (!in_array($ext, $permitidas, true)) {
                flash('Tipo de archivo no permitido. Usa: ' . implode(', ', $permitidas) . '.', 'error');
            } else {
                $limpio = preg_replace('/[^A-Za-z0-9._ -]/', '_', basename($f['name']));
                if ($limpio === '' || $limpio[0] === '.') $limpio = 'archivo.' . $ext;
                if (file_exists(DIR_DOCUMENTOS . $limpio)) $limpio = time() . '_' . $limpio;
                if (!is_dir(DIR_DOCUMENTOS)) @mkdir(DIR_DOCUMENTOS, 0755, true);
                if (!move_uploaded_file($f['tmp_name'], DIR_DOCUMENTOS . $limpio)) {
                    flash('No se pudo guardar el archivo en el servidor.', 'error');
                } elseif (db_exec('INSERT INTO documentos (nombre, contenido) VALUES (?, ?)', 'ss', array($nombre, $limpio)) === false) {
                    flash('El archivo se subió pero no se pudo registrar. (' . db_error() . ')', 'error');
                } else {
                    flash('Formato subido correctamente.');
                }
            }
        }
    } elseif ($accion === 'borrar') {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        if (ctype_digit($id)) {
            $d = db_one('SELECT contenido FROM documentos WHERE id = ?', 'i', array((int)$id));
            if ($d) {
                db_exec('DELETE FROM documentos WHERE id = ?', 'i', array((int)$id));
                $otros = db_one('SELECT COUNT(*) AS n FROM documentos WHERE contenido = ?', 's', array($d['contenido']));
                if ($otros && (int)$otros['n'] === 0 && file_exists(DIR_DOCUMENTOS . basename($d['contenido']))) @unlink(DIR_DOCUMENTOS . basename($d['contenido']));
                flash('Formato eliminado.');
            }
        }
    }
    header('Location: documentos.php');
    exit;
}

$docs = db_all('SELECT * FROM documentos ORDER BY nombre, id');
encabezado('Formatos');
?>
<div class="tabla-caja"><table>
  <thead><tr><th>Nombre</th><th>Archivo</th><th>Acciones</th></tr></thead>
  <tbody>
  <?php foreach ($docs as $d): ?>
    <tr>
      <td><?php echo h($d['nombre']); ?></td>
      <td><?php echo h($d['contenido']); ?></td>
      <td class="acciones">
        <a href="descargar.php?id=<?php echo (int)$d['id']; ?>">Descargar</a>
        <?php if (es_admin()): ?>
        <form method="post" action="documentos.php" style="display:inline" onsubmit="return confirm('¿Eliminar este formato?');">
          <?php echo csrf_campo(); ?><input type="hidden" name="accion" value="borrar"><input type="hidden" name="id" value="<?php echo (int)$d['id']; ?>">
          <button class="enlace peligro" type="submit">Eliminar</button>
        </form>
        <?php endif; ?>
      </td>
    </tr>
  <?php endforeach; ?>
  <?php if (!$docs): ?><tr><td colspan="3">No hay formatos.</td></tr><?php endif; ?>
  </tbody></table></div>

<?php if (es_admin()): ?>
<form method="post" action="documentos.php" enctype="multipart/form-data" class="formulario">
  <h2>Subir un formato</h2>
  <?php echo csrf_campo(); ?><input type="hidden" name="accion" value="subir">
  <label>Nombre *<input type="text" name="nombre" required maxlength="50"></label>
  <label>Archivo * (Word, Excel, PDF o imagen, máx. 5 MB)<input type="file" name="archivo" required></label>
  <p><button class="boton" type="submit">Subir</button></p>
</form>
<?php endif; ?>
<?php pie();
