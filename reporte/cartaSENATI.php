<?php

	ob_start();
	require_once("pdf_core.php");

	$pdf = new RepContrato();
	$pdf->SetMargins(23,22,23);
	$pdf->SetAutoPageBreak(true, 25);
	$pdf->AddPage();

	#colocar logos
	$pdf->Image('../img/ism_header.png','PNG');
	$pdf->Ln(6);

	#Nombre del año
	$pdf->SetFont('Arial','',10);
	$title = '"Año de la Diversificación Productiva y del Fortalecimiento de la Educación"';
	$w = $pdf->GetStringWidth($title)+6;

	$pdf->SetX((210-$w)/2);
	$pdf->Cell($w,9,utf8_decode($title),0, 0, 'C', false);
	$pdf->Ln(20);

	#colocar fecha
		#colocar fecha
		#dividir fecha 'd-m-y'
		#require_once('../util/zonahoraria.php');#establecer zona horaria

		$hoy = date("Y-m-d");
		#$hoy = strtotime('-1 day', strtotime($hoy));#<===problema fecha resuelta##
		#$hoy = date("Y-m-d",$hoy);

		$di = substr($hoy, 8, 2);
		$me = substr($hoy, 5, 2);
		$year = substr($hoy, 0, 4);

		#el nombre del mes
		require_once('../util/fechas.php');
		$mes = new Fechas();
		$nommes = $mes::getMes($me);

	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(0,5,utf8_decode("Huaura, $di de $nommes del $year"),0 ,0 ,"I", false);
	$pdf->Ln(17);

	#dirigido a..
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(0,5,utf8_decode("Señores:"),0 ,0 ,"I", false);
	$pdf->Ln(5);
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(0,5,utf8_decode("SENATI - HUACHO"),0 ,0 ,"I", false);
	$pdf->Ln(5);
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(0,5,utf8_decode("Presente.- "),0 ,0 ,"I", false);
	$pdf->Ln(15);

	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(0,5,utf8_decode("De mi especial consideración:"),0 ,0 ,"I", false);
	$pdf->Ln(17);
	
	#contenido
	$pdf->SetFont('Arial', '', 10);
	$p1 = utf8_decode("Mediante el presente me dirijo a ustedes para saludarlos cordialmente y manifestar que, de acuerdo a los lineamientos del SENATI, estamos presentando al Señor $txtnom $txtapel, quien se encuentra cursando la especialidad de $txtesp.");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(7);
	$p2 = utf8_decode("Al respecto debo indicar que, la Empresa Embotelladora San Miguel del Sur SAC, con RUC 20413940568 quien; en virtud de los lineamientos como aportante al SENATI, es el Patrocinador del estudiante.");
	$pdf->MultiCell(0,5,$p2);
	$pdf->Ln(7);
	$pdf->Cell(0,5,utf8_decode("Es todo cuanto informo a usted para los fines del caso."),0 ,0 ,"I", false);
	$pdf->Ln(20);

	#firma
	$pdf->Cell(0,5,utf8_decode("Atentamente,"),0 ,0 ,"I", false);
	$pdf->Ln(15);	

	$pdf->Output();
	ob_end_flush();
?>