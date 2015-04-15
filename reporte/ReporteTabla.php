<?php

require('../fpdf/fpdf.php');

class ReporteTabla extends FPDF {

// Page header
    function Header() {
        // Logo
        $codi_empr=$_SESSION['codi_empr'];
        //$this->Image('../img/'.$codi_empr.'.png', 10, 6, 30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell($_SESSION['anchoTituloReporte'], 10, $_SESSION['nombreReporte'], 1, 0, 'C');
        // Line break
        $this->Ln(20);
    }

// Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

