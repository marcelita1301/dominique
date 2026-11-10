<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
$est = estudiante_solicitado();
$doc = (string)$est['documento'];

$meses = array(1 => 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre');
$anio = (int)date('Y');
if (isset($_GET['anio']) && ctype_digit($_GET['anio']) && (int)$_GET['anio'] >= 2000 && (int)$_GET['anio'] <= 2100) $anio = (int)$_GET['anio'];

$filas = db_all('SELECT * FROM pension WHERE estudiante = ? AND anio = ? ORDER BY mes', 'si', array($doc, $anio));
$porMes = array();
foreach ($filas as $f) $porMes[(int)$f['mes']] = $f;

$limite = ($anio < (int)date('Y')) ? MESES_ESCOLARES : min((int)date('n'), MESES_ESCOLARES);
if ($anio > (int)date('Y')) $limite = 0;
$pendientes = array();
for ($m = 1; $m <= $limite; $m++) {
    if (!isset($porMes[$m]) || $porMes[$m]['estado'] !== 'pagada') $pendientes[] = $m;
}

if (!$filas || $pendientes) {
    encabezado('Paz y salvo de ' . $est['nombre']);
    echo '<div class="tarjeta">';
    if (!$filas) {
        echo '<p>Todavía no hay mensualidades registradas para ' . h($anio) . '. La secretaría debe generarlas antes de expedir el paz y salvo.</p>';
    } else {
        $lista = array();
        foreach ($pendientes as $m) $lista[] = $meses[$m];
        echo '<div class="aviso error">No se puede expedir el paz y salvo: hay pensiones pendientes de ' . h($anio) . '.</div>';
        echo '<p>Meses pendientes: <b>' . h(implode(', ', $lista)) . '</b>.</p>';
    }
    echo '<p><a class="boton" href="pensiones.php?doc=' . h($doc) . '&amp;anio=' . h($anio) . '">Ver pensiones</a> <a class="boton claro" href="inicio.php">Volver</a></p></div>';
    pie();
    exit;
}

require_once __DIR__ . '/includes/pdf.php';
$pdf = new DocPDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->SetMargins(25, 10, 25);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 8, t('PAZ Y SALVO'), 0, 1, 'C');
$pdf->Ln(4);
$pdf->SetFont('Arial', '', 12);
$nombre = trim($est['nombre'] . ' ' . $est['apellidos']);
$pdf->MultiCell(0, 8, t('La directora del ' . NOMBRE_CENTRO . ' hace constar que el/la estudiante ' . $nombre . ', identificado/a con documento No. ' . $est['documento'] . ', del grado ' . $est['gnombre'] . ', se encuentra a PAZ Y SALVO por concepto de pensión correspondiente al año ' . $anio . ($limite > 0 ? ' hasta el mes de ' . $meses[$limite] : '') . '.'), 0, 'J');
$pdf->Ln(6);

$anchos = array(60, 40, 50);
$pdf->CabeceraTabla(array('MES', 'ESTADO', 'FECHA DE PAGO'), $anchos);
for ($m = 1; $m <= MESES_ESCOLARES; $m++) {
    $f = isset($porMes[$m]) ? $porMes[$m] : null;
    $estado = $f ? ($f['estado'] === 'pagada' ? 'Pagada' : 'Por pagar') : '-';
    $pdf->Fila(array(t($meses[$m]), t($estado), t($f && $f['fecha_pago'] ? $f['fecha_pago'] : '-')), $anchos, 7);
}
$pdf->Ln(8);
$pdf->MultiCell(0, 8, t('Se expide a solicitud del interesado, el ' . fecha_larga() . '.'), 0, 'J');
$pdf->Ln(8);
$firma = __DIR__ . '/index2/imagenes/imagenfirma.jpg';
if (file_exists($firma)) $pdf->Image($firma, 25, $pdf->GetY(), 90);
$pdf->SetY($pdf->GetY() + 20);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 8, t(NOMBRE_DIRECTORA), 0, 1);
$pdf->Output('I', 'pazysalvo_' . $doc . '.pdf');
