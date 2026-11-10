<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
requerir();

$rol = rol_actual();
$yo = $_SESSION['documento'];
encabezado('Bienvenido/a, ' . $_SESSION['nombre']);

if ($rol === 'secretario') {
    $n = array();
    foreach (array('estudiante', 'docente', 'mama', 'papa') as $t) {
        $r = db_one("SELECT COUNT(*) AS n FROM $t");
        $n[$t] = $r ? $r['n'] : 0;
    }
    $pen = db_one("SELECT COUNT(DISTINCT estudiante) AS n FROM pension WHERE estado = 'por pagar' AND anio = ? AND mes <= ?", 'ii', array((int)date('Y'), min((int)date('n'), MESES_ESCOLARES)));
    ?>
    <p>Desde aquí puedes administrar todo el centro educativo.</p>
    <div class="rejilla">
      <a class="dato" href="lista.php?e=estudiante"><b><?php echo (int)$n['estudiante']; ?></b>Estudiantes</a>
      <a class="dato" href="lista.php?e=docente"><b><?php echo (int)$n['docente']; ?></b>Docentes</a>
      <a class="dato" href="lista.php?e=mama"><b><?php echo (int)$n['mama']; ?></b>Madres</a>
      <a class="dato" href="lista.php?e=papa"><b><?php echo (int)$n['papa']; ?></b>Padres</a>
      <a class="dato" href="pensiones.php"><b><?php echo $pen ? (int)$pen['n'] : 0; ?></b>Estudiantes con pensión pendiente</a>
    </div>
    <div class="tarjeta">
      <h2>Registrar nuevo</h2>
      <p>
        <a class="boton" href="form.php?e=mama">Madre</a>
        <a class="boton" href="form.php?e=papa">Padre</a>
        <a class="boton" href="form.php?e=estudiante">Estudiante</a>
        <a class="boton" href="form.php?e=docente">Docente</a>
        <a class="boton" href="form.php?e=secretario">Secretario/a</a>
        <a class="boton" href="form.php?e=grados">Grado</a>
      </p>
      <p class="pequeno">Orden recomendado para una familia nueva: primero la madre y el padre, luego el estudiante.</p>
    </div>
    <?php
} elseif ($rol === 'docente') {
    $d = db_one('SELECT d.grado, g.nombre AS gnombre FROM docente d LEFT JOIN grados g ON g.codigo = d.grado WHERE d.documento = ?', 's', array($yo));
    $c = $d ? db_one('SELECT COUNT(*) AS n FROM estudiante WHERE grado = ?', 's', array((string)$d['grado'])) : null;
    ?>
    <div class="rejilla">
      <a class="dato" href="lista.php?e=estudiante"><b><?php echo $c ? (int)$c['n'] : 0; ?></b>Estudiantes de <?php echo h($d ? $d['gnombre'] : 'tu grado'); ?></a>
      <a class="dato" href="anecdotario.php"><b>＋</b>Anecdotario</a>
    </div>
    <?php
} else {
    if ($rol === 'mama') {
        $hijos = db_all('SELECT e.documento, e.nombre, e.apellidos, g.nombre AS grado FROM estudiante e LEFT JOIN grados g ON g.codigo = e.grado WHERE e.mama = ? ORDER BY e.nombre', 's', array($yo));
    } elseif ($rol === 'papa') {
        $hijos = db_all('SELECT e.documento, e.nombre, e.apellidos, g.nombre AS grado FROM estudiante e LEFT JOIN grados g ON g.codigo = e.grado WHERE e.papa = ? ORDER BY e.nombre', 's', array($yo));
    } else {
        $hijos = db_all('SELECT e.documento, e.nombre, e.apellidos, g.nombre AS grado FROM estudiante e LEFT JOIN grados g ON g.codigo = e.grado WHERE e.documento = ?', 's', array($yo));
    }
    echo $rol === 'estudiante' ? '<p>Estos son tus documentos.</p>' : '<p>Estos son tus hijos/as matriculados/as.</p>';
    if (!$hijos) echo '<div class="tarjeta"><p>No hay estudiantes asociados a tu cuenta. Comunícate con la secretaría.</p></div>';
    foreach ($hijos as $h) {
        $d = h($h['documento']);
        echo '<div class="tarjeta"><h2>' . h($h['nombre'] . ' ' . $h['apellidos']) . '</h2>';
        echo '<p class="pequeno">Documento ' . $d . ' · Grado: ' . h($h['grado']) . '</p><p>';
        echo '<a class="boton" href="certificado.php?doc=' . $d . '">Certificado de estudio</a> ';
        echo '<a class="boton" href="pazysalvo.php?doc=' . $d . '">Paz y salvo</a> ';
        echo '<a class="boton" href="pensiones.php?doc=' . $d . '">Pensiones</a> ';
        echo '<a class="boton" href="anecdotario.php?doc=' . $d . '">Anecdotario</a>';
        echo '</p></div>';
    }
}
pie();
