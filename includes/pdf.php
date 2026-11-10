<?php
require_once __DIR__ . '/../fpdf/fpdf.php';

function t($s) {
    $r = @iconv('UTF-8', 'windows-1252//TRANSLIT', (string)$s);
    return $r === false ? (string)$s : $r;
}

function fecha_larga($ts = null) {
    $meses = array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
    if ($ts === null) $ts = time();
    return date('j', $ts) . ' de ' . $meses[(int)date('n', $ts) - 1] . ' de ' . date('Y', $ts);
}

class DocPDF extends FPDF {
    public $cab = null;

    function Header() {
        $img = __DIR__ . '/../index2/imagenes/encabezadooo.jpg';
        if (file_exists($img)) $this->Image($img, 30, 10, 150);
        $this->SetY(50);
    }
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, t('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function NbLines($w, $txt) {
        $cw = $this->CurrentFont['cw'];
        if ($w == 0) $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', (string)$txt);
        $nb = strlen($s);
        if ($nb > 0 && $s[$nb - 1] == "\n") $nb--;
        $sep = -1; $i = 0; $j = 0; $l = 0; $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") { $i++; $sep = -1; $j = $i; $l = 0; $nl++; continue; }
            if ($c == ' ') $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) { if ($i == $j) $i++; }
                else $i = $sep + 1;
                $sep = -1; $j = $i; $l = 0; $nl++;
            } else $i++;
        }
        return $nl;
    }

    function CabeceraTabla($titulos, $anchos) {
        $this->cab = array($titulos, $anchos);
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(230, 230, 230);
        foreach ($titulos as $i => $tt) $this->Cell($anchos[$i], 8, t($tt), 1, 0, 'C', true);
        $this->Ln();
        $this->SetFont('Arial', '', 10);
    }

    function Fila($datos, $anchos, $alto = 6) {
        $nb = 1;
        foreach ($datos as $i => $d) $nb = max($nb, $this->NbLines($anchos[$i], $d));
        $h = $alto * $nb;
        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage($this->CurOrientation);
            if ($this->cab) $this->CabeceraTabla($this->cab[0], $this->cab[1]);
        }
        foreach ($datos as $i => $d) {
            $w = $anchos[$i];
            $x = $this->GetX(); $y = $this->GetY();
            $this->Rect($x, $y, $w, $h);
            $this->MultiCell($w, $alto, $d, 0, 'L');
            $this->SetXY($x + $w, $y);
        }
        $this->Ln($h);
    }
}
