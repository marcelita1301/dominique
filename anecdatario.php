<?php
require('Libreria/fpdf186/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()   
    {   
    $this->Image("index2/imagenes/encabezadooo.jpg",37,10,150);
    $this->SetFont('Arial','B',10); 
{
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,80,'ANECDOTARIO DEL ALUMNO',2,0,'C');
    // Salto de línea
    $this->Ln(60);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-10);
    // Arial italic 8
    $this->SetFont('Arial','I',-1);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    
}

function EspecialChars($text)
    {
        return iconv('UTF-8', 'windows-1252', $text);
    }
}


}
$pdf = new PDF();
$pdf->AddPage();


$pdf->SetFont('Arial', 'B', 11);
 

$cellWidth2 = 200;
$cellWidth1 = 130;  // Ancho de cada celda
$cellWidth = 30;  // Ancho de cada celda
$cellHeight = 9; // Alto de cada celda
$marginLeft = 15; // Margen izquierdo para la tabla
$marginTop = 30;  // Margen superior para la tabla


// Agregar encabezados de columna
$pdf->SetX($marginLeft);
$pdf->Cell($cellWidth, $cellHeight, 'FECHA', 1, 0, 'C');
$pdf->Cell($cellWidth1, $cellHeight, 'COMPORTAMIENTOS ESPECIFICOS OBSERVADOS EN EL ALUMNO', 1, 0, 'C');
$pdf->Cell($cellWidth, $cellHeight, 'FIRMAS', 1, 0, 'C');

//SetFillColor()





    
$pdf->Output();
?>
