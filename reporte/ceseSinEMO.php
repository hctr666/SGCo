<?php

	ob_start();
	require_once("pdf_core.php");

	$pdf = new RepContrato();
	$pdf->SetMargins(23,22,23);
	$pdf->SetAutoPageBreak(true, 25);
	$pdf->AddPage();

	#colocar logos
	$pdf->Image('../img/ism_header.png','PNG');
	$pdf->Ln(17);

		#colocar fecha
		#dividir fecha 'd-m-y'
		#require_once('../util/zonahoraria.php');#establecer zona horaria

		$hoy = date("Y-m-d");
		
		#$hoy = strtotime('-1 day', strtotime($hoy));#<===problema fecha resuelta##
		#$hoy = date("Y-m-d",$hoy);
		###########################

		$di = substr($hoy, 8, 2);
		$me = substr($hoy, 5, 2);
		$year = substr($hoy, 0, 4);

		#el nombre del mes
		require_once('../util/fechas.php');
		$mes = new Fechas();
		$nommes = $mes::getMes($me);      

	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(0,5,utf8_decode("Huaura, $di de $nommes del $year"),0 ,0 ,"R", false);
	$pdf->Ln(14);

	#dirigido a..
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(0,5,utf8_decode("Señor (a):"),0 ,0 ,"I", false);
	$pdf->Ln(5);
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(0,5,utf8_decode($registro->nomb_trab." ".$registro->appa_trab." ".$registro->apma_trab),0 ,0 ,"I", false);
	$pdf->Ln(12);

	$pdf->SetFont('Arial','B',12);
	if (isset($fechRen)) {
		$title = 'Referencia: RENUNCIA VOLUNTARIA';
	} else {
		$title = 'Referencia: TERMINO DE CONTRATO';
	}
	$w = $pdf->GetStringWidth($title)+6;

	$pdf->SetX((150-$w)/2);
	$pdf->Cell($w,9,utf8_decode($title),0, 0, 'I', false);
	$pdf->Ln(14);

	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(0,5,utf8_decode("De  nuestra consideración:"),0 ,0 ,"I", false);
	$pdf->Ln(14);
	
		#dividir fecha final del contrato
		if (isset($fechRen)) {
			#dd-mm-yyyy
			$d = substr($fechRen, 0, 2);
			$m = substr($fechRen, 3, 2);
			$y = substr($fechRen, 6, 4);
			$fech_fin = $y.'-'.$m.'-'.$d;	
		} else {
			$fech_fin = $registro->fech_fin;
		}
		
		$dfin = substr($fech_fin, 8, 2);
		$mesfin = substr($fech_fin, 5, 2);
		$añofin = substr($fech_fin, 0, 4);

		require_once('../util/fechas.php');
		$mes = new Fechas();
		$mesfin = $mes::getMes($mesfin);

	$pdf->SetFont('Arial', '', 10);
	$p1 = utf8_decode("									Por la presente cumplimos con comunicarle  que la relación laboral con la empresa se extingue el $dfin de $mesfin del $añofin por lo que deberá acercarse a la oficina de Recursos Humanos en horario de oficina hasta en un plazo máximo de 48 horas siguientes a su cese, para que haga entrega de los bienes de propiedad de la empresa y que le fueron entregados (uniforme, epp, etc..); así como para cobrar su liquidación de Beneficios Sociales, y hacerle entrega de su certificado de trabajo y carta liberatoria de CTS.");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(7);

	$p2 = utf8_decode("									A efectos de cumplir con lo dispuesto en la Ley N°29783 sobre Seguridad y Salud en el Trabajo se le informa que de acuerdo al Protocolos de Exámenes Médico Ocupacionales RM 312-2011 dice sobre la  Evaluación Médico Ocupacional de Retiro o de Egreso: Evaluación médica realizada al trabajador respecto de su estado y condición de salud días previos al cese laboral, tendrán validez los exámenes ocupacionales realizados con una antigüedad no mayor de 2 meses.
");
	$pdf->MultiCell(0,5,$p2);
	$pdf->Ln(7);

		#dividir fecha final del contrato
		$fech_emo = $registro->fech_emo;
		$de = substr($fech_emo, 8, 2);
		$me = substr($fech_emo, 5, 2);
		$ae = substr($fech_emo, 0, 4);

		require_once('../util/fechas.php');
		$mes = new Fechas();
		$me = $mes::getMes($me);	

	$p3 = utf8_decode("									Por lo expuesto y encontrándonos dentro del plazo determinado por la Ley, el EMO realizado el $de de $me del $ae, teniendo como resultado APTO - Examen Médico.");
	$pdf->MultiCell(0,5,$p3);
	$pdf->Ln(20);	

	#firma
	$pdf->Cell(0,5,utf8_decode("															Atentamente,"),0 ,0 ,"I", false);
	$pdf->Ln(15);	

	$pdf->Output();
	ob_end_flush();
?>
