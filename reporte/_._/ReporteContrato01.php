<?php

require_once('../fpdf/html2pdf.php');

$pdf = new PDF_HTML();
$pdf->SetFont('Arial', '', 12);
$pdf->AddPage();


$doc = new DOMDocument();

$condi=$_SESSION['contrato']->codi_cond;


require_once("$condi.php");

$text = $texto;

if (ini_get('magic_quotes_gpc') == '1')
    $text = stripslashes($text);
$pdf->WriteHTML($text);

$pdf->Output();
exit;
?>