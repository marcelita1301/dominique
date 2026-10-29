<?php
require"fpdf/fpdf.php";
include("conexion.php");
$date=date('d-m-Y');
class PDF extends FPDF 
{
    function Header()   
    {   
    $this->Image("index2/imagenes/encabezadooo.jpg",37,10,150);
    $this->SetFont('Arial','B',10);
    //Movernos a la derecha
    $this->Cell(80);
    $this->Cell(30,67,'LA DIRECTORA DEL CENTRO EDUCATIVO DOMINIQUE',10,80,'C');
    //Salto de linea
    //$this->Cell(3);
    $this->Cell(30,0,'HACE CONSTAR QUE',0,0,'C');
    $this->Ln(20);
    }
    function Footer ()
    {
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Pagina'.$this->PageNo().'/{nb}',0,0,'C');
    }
}
    
    $pdf= new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','I',10);
    $documento=$_POST["documento"];
    $registros=mysqli_query($conexion,"select * from estudiante where documento='$documento'") or die ("problemas en el select".mysqli_error($conexion));
    while ($reg=mysqli_fetch_array($registros)) {
        $pdf->Write(5,'El/la estudiante: '); 
        $pdf->cell(30,5,$reg["nombre"],0,0,'C',0);
        $pdf->cell(25,5,$reg["apellidos"],0,0,'C',0);
        $pdf->Write(5,', identificado/a con registro civil de nacimiento: ');
        $pdf->cell(25,5,$reg["documento"],0,0,'C',0);
        $pdf->Write(5,', de La ceja Antioquia, se encuentra matriculado/a en el Centro Educativo DOMINIQUE, establecimiento privado.');
        $pdf->Cell(150);
        $pdf->Write(15,'El valor a cancelar por pension es de: $452.200.');
        $pdf->Cell(0);
        $pdf->Write(15,'Se expide esta constancia a solicitud del interesado, en la fecha: ');
        $pdf->cell(20,15,$date,0,0,'C',0);

        
        $pdf->Write(50,'Atentamente:');
        $pdf->Image("index2/imagenes/imagenfirma.jpg",100,170,100);
        $pdf->Cell(1);
        $pdf->Write(95,'HERMANA ALBA LUCIA.');
        

    }

    
$pdf->Output();

?>