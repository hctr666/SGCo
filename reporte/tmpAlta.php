<?php
	#inicia el buffer
	ob_start();
	require_once("pdf_core.php");

	$pdf = new RepContrato();

	#configurando las paginas
	$pdf->SetMargins(20,22,20);
	$pdf->SetAutoPageBreak(true, 25);
	$pdf->AddPage();

	#Colocando el título
	$pdf->SetFont('Arial','B',12);
	$title = "CONTRATO INDIVIDUAL DE TRABAJO SUJETO A LA MODALIDAD DE TEMPORADA";
	$w = $pdf->GetStringWidth($title)+6;

	$pdf->SetX((210-$w)/2);
	$pdf->Cell($w,9,utf8_decode($title),0,0,'C',false);
	$pdf->Ln(15);

	#párrafo inicial
	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode(
			"Conste por el presente documento, que se extiende por triplicado, el CONTRATO INDIVIDUAL DE TRABAJO SUJETO A LA MODALIDAD DE TEMPORADA celebrado dentro de los alcances del artículo 67º del Texto Único Ordenado del Decreto Legislativo No. 728, Ley de Productividad y Competitividad Laboral (en adelante, la LPCL), aprobado mediante el Decreto Supremo No. 003-97-TR, que celebran, de una parte, EMBOTELLADORA SAN MIGUEL DEL SUR S.A.C., con Registro Único del Contribuyente No. 20413940568, con domicilio en Panamericana Norte Km. 154, distrito de Huaura, Provincia de Huaura, departamento de Lima, debidamente representada por el señor Eber Leonardo Valdez Nolasco,  identificado con DNI No15693253, facultado según poderes inscritos en la Partida No. N° 01194749 del Registro de Personas Jurídicas de Lima, a quien en adelante se le denominará EL EMPLEADOR; y, de la otra, $registro->appa_trab $registro->apma_trab $registro->nomb_trab identificado con DNI No. $registro->nume_dni, de nacionalidad peruana, con domicilio en $registro->dire_trab Distrito de $registro->desc_dist; a quien en adelante se le denominará EL TRABAJADOR, según los términos y condiciones que se señalan a continuación:");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(10);

	#primera: el empleador
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,"PRIMERA: EL EMPLEADOR",'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/tmpAlta/primera.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);

	#segunda: el trabajador
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,"SEGUNDA: EL TRABAJADOR",'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$text = utf8_decode("EL TRABAJADOR acredita contar con experiencia en labores de $registro->desc_carg, por lo que cumple las exigencias que requiere la posición que desempeñará en la empresa.");
	$pdf->MultiCell(0,5,$text);
	$pdf->Ln(7);

	#tercera: objeto del contrato
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,"TERCERA: OBJETO DEL CONTRATO",'I');
	$pdf->Ln(4);

		#dividir fecha inicio temporada 'd-m-y'
		$dit = substr($tmp_alta->ini_tmp, 8, 2);
		$mit = substr($tmp_alta->ini_tmp, 5, 2);
		$yit = substr($tmp_alta->ini_tmp, 0, 4);

		#dividir fecha final temporada 'd-m-y'
		$dft = substr($tmp_alta->fin_tmp, 8, 2);
		$mft = substr($tmp_alta->fin_tmp, 5, 2);
		$yft = substr($tmp_alta->fin_tmp, 0, 4);

		#el nombre del mes 
		require_once('../util/fechas.php');
		$mes = new Fechas();
		$mit = $mes::getMes($mit);
		$mft = $mes::getMes($mft);

	$pdf->SetFont('Arial','',10);
	$text = utf8_decode("EL EMPLEADOR requiere incrementar temporalmente la producción a fin de atender el incremento de la demanda de bebidas gasificadas y no gasificadas que se origina regularmente todos los años en la Temporada de Verano, la cual el presente año empieza el $dit de $mit del $yit  y culmina en $mft de $yft.");
	$pdf->MultiCell(0,5,$text);
	$pdf->Ln(4);
	
	$text2 = utf8_decode("Teniendo en cuenta este factor objetivo y temporal, EL EMPLEADOR requiere temporalmente contratar personal para el cargo de de $registro->desc_carg.");
	$pdf->MultiCell(0,5,$text2);
	$pdf->Ln(4);

	$text3 = utf8_decode("En razón a los argumentos expuestos y al inicio de la Temporada de Verano, LA EMPRESA contrata los servicios temporales de EL TRABAJADOR al amparo de lo previsto en el artículo 67º de la LPCL para que realice las labores propias y complementarias del puesto de $registro->desc_carg.");
	$pdf->MultiCell(0,5,$text3);
	$pdf->Ln(4);	

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/tmpAlta/tercera.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);

	#Cuarta: labores a desarrollar
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,"CUARTA: LABORES A DESARROLLAR",'I');
	$pdf->Ln(4);
	
	$pdf->SetFont('Arial','',10);
	$text = utf8_decode("EL EMPLEADOR contrata los servicios de EL TRABAJADOR bajo la modalidad y condiciones estipuladas por el presente contrato para que, en forma personal, individual y subordinada, se desempeñe como de $registro->desc_carg y realice las labores propias y complementarias referidas a su cargo.");
	$pdf->MultiCell(0,5,$text);
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/tmpAlta/cuarta.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);	

	#Quinta: régimen laboral
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,utf8_decode("QUINTA: RÉGIMEN LABORAL"),'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/tmpAlta/quinta.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);

	#Sexta: PLAZO DE VIGENCIA DE LA RELACIÓN LABORAL 
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,utf8_decode("SEXTA: PLAZO DE VIGENCIA DE LA RELACIÓN LABORAL"),'I');
	$pdf->Ln(4);

		#dividir fecha inicial 'd-m-y'
		$di = substr($registro->fech_inic, 8, 2);
		$mi = substr($registro->fech_inic, 5, 2);
		$yi = substr($registro->fech_inic, 0, 4);

		#dividir fecha final 'd-m-y'
		$df = substr($registro->fech_fin, 8, 2);
		$mf = substr($registro->fech_fin, 5, 2);
		$yf = substr($registro->fech_fin, 0, 4);

		#el nombre del mes 
		require_once('../util/fechas.php');
		$mes = new Fechas();
		$nommes_ini = $mes::getMes($mi);
		$nommes_fin = $mes::getMes($mf);

		#condicionar si el fin del contrato es indeterminado
		if ($registro->indt_cont == 1) {
			$fechafin = "con plazo Indeterminado";
		} else {
			$fechafin = "al $df de $nommes_fin del $yf";
		}

	$pdf->SetFont('Arial','',10);
	$text = utf8_decode("El plazo de vigencia del presente contrato es el de la Temporada de Verano, esto se inicia el $di de $nommes_ini del $yi y culmina indefectiblemente el $df de $nommes_fin del $yf.");
	$pdf->MultiCell(0,5,$text);
	$pdf->Ln(7);

	#SETIMA: JORNADA Y HORARIO DE TRABAJO
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,utf8_decode("SÉTIMA: JORNADA Y HORARIO DE TRABAJO"),'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/tmpAlta/setima.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);

	#OCTAVA: REMUNERACIÓN 
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,utf8_decode("OCTAVA: REMUNERACIÓN"),'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$text = utf8_decode("EL TRABAJADOR, en contraprestación por los servicios realizados, percibirá como remuneración mensual la cantidad de S/. $registro->mont_cont Nuevos Soles, así como las demás bonificaciones y beneficios que otorgue EL EMPLEADOR a todos sus trabajadores, conforme a la normatividad vigente y las disposiciones de EL EMPLEADOR. Estas cifras se encuentran afectas a los impuestos, aportaciones y retenciones que conforme a Ley le correspondan.");
	$pdf->MultiCell(0,5,$text);
	$pdf->Ln(4);

	$tex = utf8_decode(file_get_contents("../reporte/tmpAlta/octava.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);

	#NOVENA  : FISCALIZACIÓN DEL USO DE BIENES Y HERRAMIENTAS ENTREGADAS POR EL EMPLEADOR
	$pdf->SetFont('Arial','B',10);
	$pdf->MultiCell(0,5,utf8_decode("NOVENA: FISCALIZACIÓN DEL USO DE BIENES Y HERRAMIENTAS ENTREGADAS POR EL EMPLEADOR"),'I');
	$pdf->Ln(3);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/tmpAlta/novena.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);	

	#DECIMO : Buena Fe Contractual
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,utf8_decode("DÉCIMO: BUENA FE CONTRACTUAL"),'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/tmpAlta/decima.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);

	#Décimo primera: Jurisdicción competente
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,utf8_decode("DÉCIMO PRIMERA:	JURISDICCIÓN COMPETENTE"),'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/tmpAlta/decprim.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);

	#Décimo segunda: Validez del Contrato
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,utf8_decode("DÉCIMO SEGUNDA:	VALIDEZ DEL CONTRATO"),'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/tmpAlta/decseg.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);	

	#Décimo tercera: De la comunicación a la autoridad
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,utf8_decode("DÉCIMO TERCERA: DE LA COMUNICACIÓN A LA AUTORIDAD"),'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/tmpAlta/decter.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(5);

		#Restarle una dia a la fecha inicio
		$fechaant = strtotime('-1 day', strtotime($registro->fech_inic));
		$fechaant = date("Y-m-d", $fechaant);
		$mesant = $mes::getMes(substr($fechaant, 5, 2));

	$pdf->SetFont('Arial','',10);
	$text = utf8_decode("Firmado en señal de conformidad y aprobación, en tres ejemplares el día ".substr($fechaant, 8, 2)." de $mesant de ".substr($fechaant, 0, 4).".");
	$pdf->MultiCell(0,5,$text);
	$pdf->Ln(27);		

	#firma del trabajador
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,'____________________________________________','R');
	$pdf->Ln(6);

	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,utf8_decode("Nombres:	$registro->appa_trab $registro->apma_trab, $registro->nomb_trab"),'R');
	$pdf->Ln(6);	

	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,utf8_decode("DNI:	$registro->nume_dni"),'R');

	#Se da salida al pdf
	$pdf->Output();

 	#cierra el buffer
 	ob_end_flush();
 ?>