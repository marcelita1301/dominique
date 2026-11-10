<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/pdf.php';
requerir();
$est = estudiante_solicitado();

$pdf = new DocPDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->SetMargins(25, 10, 25);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 7, t('LA DIRECTORA DEL ' . NOMBRE_CENTRO), 0, 1, 'C');
$pdf->Cell(0, 7, t('HACE CONSTAR QUE'), 0, 1, 'C');
$pdf->Ln(8);

$pdf->SetFont('Arial', '', 12);
$nombre = trim($est['nombre'] . ' ' . $est['apellidos']);
$texto = 'El/la estudiante ' . $nombre . ', identificado/a con documento de identidad No. ' . $est['documento']
       . ', expedido en ' . $est['expedicion'] . ', se encuentra matriculado/a en el ' . ucwords(strtolower(NOMBRE_CENTRO))
       . ', establecimiento privado de La Ceja, Antioquia, cursando el grado ' . $est['gnombre'] . '.';
$pdf->MultiCell(0, 8, t($texto), 0, 'J');
$pdf->Ln(4);
$pdf->MultiCell(0, 8, t('El valor a cancelar por pensión mensual es de: $' . number_format(PENSION_VALOR, 0, ',', '.') . '.'), 0, 'J');
$pdf->Ln(4);
$pdf->MultiCell(0, 8, t('Se expide esta constancia a solicitud del interesado, el ' . fecha_larga() . '.'), 0, 'J');
$pdf->Ln(12);
$pdf->Cell(0, 8, t('Atentamente:'), 0, 1);

$firma = __DIR__ . '/index2/imagenes/imagenfirma.jpg';
if (file_exists($firma)) $pdf->Image($firma, 25, $pdf->GetY() + 2, 90);
$pdf->SetY($pdf->GetY() + 22);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 8, t(NOMBRE_DIRECTORA), 0, 1);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 6, t('Directora'), 0, 1);

$pdf->Output('I', 'certificado_' . $est['documento'] . '.pdf');
