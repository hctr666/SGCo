<?php

	ob_start();
	require_once("pdf_core.php");

	$pdf = new RepContrato();
	$pdf->SetMargins(23,10,23);
	$pdf->SetAutoPageBreak(true, 25);
	$pdf->AddPage();

	#colocar logos
	$pdf->Image('../img/ism_header_small.png','PNG');
	$pdf->Ln(10);

		#colocar fecha
		#dividir fecha 'd-m-y'
		$hoy = date("Y-m-d");#<===devuelve un dia siguiente		
		#$hoy = strtotime('-1 day', strtotime($hoy));#<===problema fecha resuelta##
		#$hoy = date("Y-m-d",$hoy);
		###########################

		$di = substr($hoy, 8, 2);
		$me = substr($hoy, 5, 2);
		$añ = substr($hoy, 0, 4);

		#el nombre del mes
		require_once('../util/fechas.php');
		$mes = new Fechas();
		$nmes = $mes::getMes($me);      

	$pdf->SetFont('Arial', '', 8);
	$fecha = "Fecha: $di/$me/$añ";
	$hora = date("H:i:s");
	$w_ = $pdf->GetStringWidth($fecha)+165;
	$w_ = $pdf->GetStringWidth($hora)+165;

	$pdf->Cell($w_,5,utf8_decode($fecha),0 ,0 ,"R", false);
	$pdf->Ln(5);
	$pdf->Cell($w_,5,utf8_decode($hora),0 ,0 ,"R", false);

	$pdf->Ln(12);

	$pdf->SetFont('Arial','B',11);
	$title = "Contratos que culminan el mes de $mes__";
	$w = $pdf->GetStringWidth($title)+6;

	$pdf->SetX((210-$w)/2);
	$pdf->Cell($w,9,utf8_decode($title),0,0,'C',false);
	$pdf->Ln(15);

	$x_ = $pdf->GetX();
	$x_ = $x_-13;
	$pdf->SetX($x_);

	$header = array(
	             array(utf8_decode('Cód.'), 12), 
	             array('Nombres', 35), 
	             array('Tipo', 23),
	             array('Cargo', 30),
	             array(utf8_decode('Condición'), 30),
	             array('Inicio', 20),
	             array('Fin', 20),
	             array('Monto', 20)
	          );
	
	$pdf->CreateHeader($header);
	$pdf->SetWidths(array(12, 35, 23, 30, 30, 20, 20, 20));

	if (count($listacontratos > 0)) {
        $pdf->SetTextColor(0);
        $pdf->SetFont('Arial','',8);

		foreach ($listacontratos as $row) {
	   		$pdf->SetX($x_);
	        $fechaIni = date('d/m/Y', strtotime($row->fech_inic));
	        $fechaFin = date('d/m/Y', strtotime($row->fech_fin));
			$pdf->Row(array($row->codi_contr, $row->nombre, $row->desc_tipo, 
							$row->desc_carg, $row->desc_cond, $fechaIni, $fechaFin, $row->mont_cont));
		}
	}

	$pdf->Output();
	ob_end_flush();
?>
