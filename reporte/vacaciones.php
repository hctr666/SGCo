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
	$pdf->SetFont('Arial','B',13);
	$title = "CONTRATO DE TRABAJO A PLAZO FIJO DE SUPLENCIA";
	$w = $pdf->GetStringWidth($title)+6;

	$pdf->SetX((210-$w)/2);
	$pdf->Cell($w,9,utf8_decode($title),0,0,'C',false);
	$pdf->Ln(15);

	#párrafo inicial
	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("Conste por el presente documento, el Contrato de Suplencia que al amparo del Artículo 61º del D.S.-003-97-TR, Texto Único Ordenado del Decreto Legislativo No. 728, Ley de Productividad y Competitividad Laboral, celebran de una parte EMBOTELLADORA SAN MIGUEL DEL SUR S.A.C. (en adelante, 'EL EMPLEADOR'), con Registro Único de Contribuyentes No. 20413940568, con domicilio para estos efectos en la Calle Florida No. 204-206, distrito de Huaranguillo, Sachaca, provincia y departamento de Arequipa y sucursal en Panamericana Norte KM 154 - Distrito de Huaura, provincia de Huaura y Departamento de Lima, debidamente representado por , Señor Eber  Valdez Nolasco, identificado con DNI No. 15693253, según facultades inscritas en la Partida Electrónica N° 1308212 DEL Registro de Personas Jurídicas de Lima  y, de la otra parte; $registro->appa_trab $registro->apma_trab, $registro->nomb_trab; identificado con Documento de Identidad No. $registro->nume_dni con domicilio en $registro->dire_trab, Distrito de $registro->desc_dist, Provincia de $registro->desc_prov, Departamento de $registro->desc_depa; a quien en adelante se le denominará 'EL TRABAJADOR', en los términos y condiciones siguientes:");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(10);

	#Antecedentes
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,"ANTECEDENTES",'I');
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,"Primera:",'I');
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/vacaciones/primera.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,"Segunda:",'I');
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$text = utf8_decode("EL EMPLEADOR requiere cubrir temporalmente el puesto de $registro->desc_carg, en el área de $registro->desc_area, en razón de que el titular de dicho puesto reemplazará puestos por vacaciones.");
	$pdf->MultiCell(0,5,$text);
	$pdf->Ln(7);

	#objeto del contrato
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,"OBJETO DEL CONTRATO",'I');
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,"Tercera:",'I');
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$text = utf8_decode("Por lo señalado en la cláusula precedente, EL EMPLEADOR contrata temporalmente los servicios personales del TRABAJADOR, para que se desempeñe como $registro->desc_carg en el área de $registro->desc_area");
	$pdf->MultiCell(0,5,$text);
	$pdf->Ln(3);
	$pdf->MultiCell(0,5,utf8_decode("Queda entendido que la prestación de servicios deberá ser efectuada de manera personal, no pudiendo el TRABAJADOR ser reemplazado ni ayudado por tercera persona."));
	$pdf->Ln(7);

	#Jornada de trabajo
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,"JORNADA DE TRABAJO",'I');
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,"Cuarta:",'I');
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$text = utf8_decode("Las partes estipulan que la jornada laboral del trabajador será de 48 horas semanales flexibles y que los horarios de trabajo serán establecidos por la Empresa de acuerdo a sus necesidades, dentro de esta jornada. Asimismo, las partes acuerdan que la Empresa podrá introducir modificaciones al horario y jornada de trabajo, establecer jornadas acumulativas, alternativas y flexibles, compensatorias y horarios diferenciados, respetando la jornada máxima establecida  por ley, con $registro->ref_cont minutos de refrigerio que no es computable para efectos de la citada jornada, de acuerdo a lo dispuesto por la Ley de Productividad y Competitividad Laboral.");
	$pdf->MultiCell(0,5,$text);
	$pdf->Ln(25);

	#PLAZO
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,"PLAZO",'I');
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,"Quinta:",'I');
	$pdf->Ln(5);

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
	$text = utf8_decode("La duración del presente Contrato cuenta a partir del $di de $nommes_ini del $yi $fechafin, sin más obligación para las partes que las determinadas por ley; salvo prorroga o renovación expresa a que se refiere la cláusula sexta.");
	$pdf->MultiCell(0,5,$text);
	$pdf->Ln(6);

	$pdf->PrintChapter("Sexta:", "../reporte/suplencia/sexta.txt");

	#Remuneración
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,utf8_decode("REMUNERACIÓN"),'I');
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,utf8_decode("Sétima:"),'I');
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$text = utf8_decode("EL EMPLEADOR abonará a 'EL TRABAJADOR' como contraprestación económica, por todo concepto, por sus labores una remuneración mensual de S/. $registro->mont_cont con 00/100 Nuevos Soles. ");
	$pdf->MultiCell(0,5,$text);
	$pdf->Ln(3);

	$pdf->SetFont('Arial','',10);
	$text = utf8_decode(file_get_contents("../reporte/suplencia/setima.txt"));
   	$text = ltrim($text, '?');
	$pdf->MultiCell(0,5,$text);
	$pdf->Ln(7);

	$pdf->PrintChapter("Octava:", "../reporte/suplencia/octava.txt");
	$pdf->PrintChapter("Novena:", "../reporte/suplencia/novena.txt");
	$pdf->PrintChapter(utf8_decode("Décima:"), "../reporte/suplencia/decima.txt");

		#restarle una dia a la fecha inicio
		$fechaant = strtotime('-1 day', strtotime($registro->fech_inic));
		$fechaant = date("Y-m-d", $fechaant);
		$mesant = $mes::getMes(substr($fechaant, 5, 2));

	$pdf->SetFont('Arial','',10);
	$text = utf8_decode("En señal de conformidad las partes suscriben este documento en original y copia en la ciudad de Huaura, a los ".substr($fechaant, 8, 2)." días del mes de $mesant de ".substr($fechaant, 0, 4).".");
	$pdf->MultiCell(0,5,$text);
	$pdf->Ln(27);

	#firma del trabajador
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,'________________________________________','R');
	$pdf->Ln(6);

	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,utf8_decode("Nombres:	$registro->appa_trab $registro->apma_trab, $registro->nomb_trab"),'R');
	$pdf->Ln(6);	

	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,utf8_decode("DNI:	$registro->nume_dni"),'R');
	$pdf->Ln(5);

	$pdf->Output();
 	#cierra el buffer
 	ob_end_flush();
 ?>