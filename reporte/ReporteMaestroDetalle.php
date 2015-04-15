<?php

require('../fpdf/fpdf.php');

class ReporteMaestroDetalle extends FPDF {

// Page header
    function Header() {
        // Logo
        $codi_empr=$_SESSION['codi_empr'];
       // $this->Image('../img/'.$codi_empr.'.png', 10, 6, 30);
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

    function cabeceraVertical($cabecera)
    {
        $this->SetXY(10, 40); //Seleccionamos posición
        $this->SetFont('Arial','B',10); //Fuente, Negrita, tamaño
 
        foreach($cabecera as $columna)
        {
            //Parámetro con valor 2, cabecera vertical
            $this->Cell(30,7, utf8_decode($columna),1, 2 , 'L' );
        }
    }
    function datosVerticales($datos)
    {
        $this->SetXY(40, 40); //40 = 10 posiciónX_anterior + 30ancho Celdas de cabecera
        $this->SetFont('Arial','',10); //Fuente, Normal, tamaño
        foreach($datos as $columna)
        {
            $this->Cell(80,7, utf8_decode($columna),1, 2 , 'L' );
        }
    }
 
 
    function cabeceraHorizontal($cabecera)
    {
        $this->SetXY(10, 70);
        $this->SetFont('Arial','B',10);
        foreach($cabecera as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(24,7, utf8_decode($fila),1, 0 , 'L' );
        }
    }

}

