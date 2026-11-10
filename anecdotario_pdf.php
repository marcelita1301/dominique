<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/pdf.php';
requerir();
$est = estudiante_solicitado();
$doc = (string)$est['documento'];

$ficha = db_one('SELECT * FROM anecdatario WHERE documentoestudiante = ?', 's', array($doc));
if (!$ficha) error_pagina('Este estudiante todavía no tiene ficha de anecdotario.', 404);
$obs = db_all('SELECT * FROM anecdota WHERE documentoestudiante = ? ORDER BY fecha, id', 's', array($doc));

$pdf = new DocPDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 8, t('ANECDOTARIO DEL ALUMNO'), 0, 1, 'C');
$pdf->Ln(2);

$linea = function ($etiqueta, $valor) use ($pdf) {
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(52, 6, t($etiqueta), 0, 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 6, t($valor));
};
$linea('Fecha de inicio de la ficha:', $ficha['fechainiciacion']);
$linea('Nombres completos:', $ficha['nombreestudiante']);
$linea('Documento:', $ficha['documentoestudiante']);
$linea('Fecha de nacimiento:', $ficha['fechanacimiento']);
$linea('Dirección de residencia:', $ficha['direccion']);
$linea('Nombre de la madre:', $ficha['nombremadre'] . '  -  C.C. ' . $ficha['documentom'] . '  -  Tel. ' . $ficha['telefonom']);
$linea('Nombre del padre:', $ficha['nombrepadre'] . '  -  C.C. ' . $ficha['documentop'] . '  -  Tel. ' . $ficha['telefonop']);
if (trim($ficha['acudiente']) !== '') $linea('Otro acudiente:', $ficha['acudiente'] . ' (' . $ficha['parentesco'] . ')  -  Tel. ' . $ficha['telefonoacu']);
$linea('Docente:', $ficha['docente']);
$linea('Grado:', $est['gnombre']);
$linea('Año:', $ficha['año']);
$pdf->Ln(4);

$anchos = array(28, 120, 42);
$pdf->CabeceraTabla(array('FECHA', 'COMPORTAMIENTOS ESPECÍFICOS OBSERVADOS EN EL ALUMNO', 'FIRMAS'), $anchos);
if (!$obs) {
    $pdf->Fila(array('', '', ''), $anchos, 8);
    $pdf->Fila(array('', '', ''), $anchos, 8);
}
foreach ($obs as $o) {
    $pdf->Fila(array(t($o['fecha']), t($o['comportamiento']), t($o['firma'])), $anchos, 6);
}
$pdf->Output('I', 'anecdotario_' . $doc . '.pdf');
