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
		#require_once('../util/zonahoraria.php');#establecer zona horaria (para host en la nube)

		$hoy = date("Y-m-d");
		
		#$hoy = strtotime('-1 day', strtotime($hoy));#<===problema fecha resuelta##
		#$hoy = date("Y-m-d",$hoy);
		###########################

		$di = substr($hoy, 8, 2);
		$me = substr($hoy, 5, 2);
		$añ = substr($hoy, 0, 4);

		#el nombre del mes
		require_once('../util/fechas.php');
		$mes = new Fechas();
		$nommes = $mes::getMes($me);      

	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(0,5,utf8_decode("Huaura, $di de $nommes del $añ"),0 ,0 ,"R", false);
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
	$p1 = utf8_decode("									Por la presente cumplimos con comunicarle  que la relación laboral con la empresa se extingue el $dfin de $mesfin  del $añofin  por  lo que deberá acercarse a la oficina de Recursos Humanos en horario de oficina hasta en un plazo máximo de 48 horas siguientes a su cese, para que haga entrega de los bienes de propiedad de la empresa que le fueron entregados (uniforme, epp, etc..); así como para hacerle entrega de su certificado.");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(7);

	$p2 = utf8_decode("									Así mismo, cumplimos con informarle que culminando la relación laboral con nuestra representada, y a efectos de cumplir con lo dispuesto por el Artículo 49 de la Ley N°29783; es obligatorio que se le efectué el correspondiente examen médico acorde a las labores desempeñadas por su persona en su récord histórico en la organización, dándole énfasis a los riesgos a los que estuvo expuesto a lo largo de desempeño laboral. Estos exámenes médicos deberán ser realizados respetando lo dispuesto en los Documentos Técnicos de la Vigilancia de la Salud de los Trabajadores expedidos por el Ministerio de Salud, o por el organismo competente, según corresponda.
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

	$p3 = utf8_decode("									En ese sentido, le solicitamos gentilmente se apersone a la Clínica Ramazinni sito en Prolongación San Martin 156 Huacho, el $de de $me del $ae de 08:00 am a 11:00 am.  La no asistencia a la presente citación es de entera responsabilidad de su persona.");
	$pdf->MultiCell(0,5,$p3);
	$pdf->Ln(20);	

	#firma
	$pdf->Cell(0,5,utf8_decode("															Atentamente,"),0 ,0 ,"I", false);
	$pdf->Ln(15);	

	$pdf->Output();
	ob_end_flush();
?>
