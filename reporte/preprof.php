<?php

	ob_start();
	require_once("pdf_core.php");

	$pdf = new RepContrato();
	$pdf->SetMargins(23,22,23);
	$pdf->SetAutoPageBreak(true, 25);
	$pdf->AddPage();

	#Nombre del año
	$pdf->SetFont('Arial','B',11);
	$title = "CONVENIO DE PRÁCTICAS PREPROFESIONALES";
	$w = $pdf->GetStringWidth($title)+6;

	$pdf->SetX((210-$w)/2);
	$pdf->Cell($w,9,utf8_decode($title),0, 0, 'C', false);
	$pdf->Ln(15);

	#INTRO
	$pdf->SetFont('Arial', '', 10);
	$p1 = utf8_decode("Conste por el presente documento que se firma por cuadruplicado, el Convenio de Práctica Pre profesional, celebrado de conformidad con el artículo 12º y siguientes de la Ley Nº 28518, Ley sobre Modalidades Formativas Laborales, y su Reglamento, aprobado mediante el Decreto Supremo N° 007-2005-TR, que se celebra entre LA EMPRESA, EL CENTRO DE FORMACIÓN PROFESIONAL y EL (LA) PRACTICANTE, identificados en este documento, de acuerdo a los términos y condiciones siguientes:");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(10);
	
	#CONDICIONES GENERALES
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(0,5,utf8_decode("CONDICIONES GENERALES:"),0 ,0 ,"I", false);
	$pdf->Ln(10);

	#LA EMPRESA
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(0,5,utf8_decode("A. LA EMPRESA"),0 ,0 ,"I", false);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Razón Social:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("Embotelladora  San Miguel del  Sur SAC");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,"RUC:",0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("Nº  20413940568");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,"Domicilio:",0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("Panamericana Norte Km. 154 - Huaura");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Actividad Económica:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("Elaboración de bebidas No Alcohólicas");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Representante:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("Eber Leonardo Valdez Nolasco");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Doc. de Identidad del Representante:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("115693253");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(15);

	#EL CENTRO DE FORMACIÓN
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(0,5,utf8_decode("B. EL CENTRO DE FORMACIÓN PROFESIONAL"),0 ,0 ,"I", false);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Razón Social:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$reg2->desc_cfp");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("RUC:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$reg2->ruc_cfp");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Domicilio:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$reg2->dir_cfp");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Representante:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$reg2->rep_cfp");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(15);

	#el practicante
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(0,5,utf8_decode("C. EL(LA) PRACTICANTE"),0 ,0 ,"I", false);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Nombres:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$registro->appa_trab $registro->apma_trab, $registro->nomb_trab");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);	

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Doc. de Identidad:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$registro->nume_dni");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);	

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Nacionalidad:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("Peruana");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Fecha de Nacimiento:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);

		$fechnac = strtotime($registro->fech_naci);
		$fechnac = date("d-m-Y", $fechnac);
	
	$nom = utf8_decode("$fechnac");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Sexo:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	
	if ($registro->sex_trab == 'M') {
		$sex = 'Masculino';	
	}else{
		$sex = 'Femenino';
	}

	$pdf->Cell(0,7,$sex,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Domicilio:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$registro->dire_trab");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);	

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Situación del Practicante:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$reg2->situ_prac");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Centro de Formación que lo Representa:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$reg2->desc_cfp");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);	

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Especialidad:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$reg2->esp_prac");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);	

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Ocupación materia de la capacitación:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$reg2->mcap_prac");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(15);	

	#condiciones del convenio
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(0,5,utf8_decode("D. CONDICIONES DEL CONVENIO"),0 ,0 ,"I", false);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Plazo:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);

		#formatenado fechas del plazo
		$fechini = strtotime($registro->fech_inic);
		$fechini = date("d-m-Y", $fechini);

		$fechfin = strtotime($registro->fech_fin);
		$fechfin = date("d-m-Y", $fechfin);

	$nom = utf8_decode("desde el $fechini hasta el $fechfin");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Días de las prácticas:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("De Lunes a Viernes");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Horario de las prácticas:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("8:00am a 14:45 horas, lunes a sábado");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Subvención Económica:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("S/. $registro->mont_cont Nuevos Soles mensual");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Área donde se realiza las Prácticas:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$registro->desc_area");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(28);

	#clausulas del convenio
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("CLÁUSULAS DEL CONVENIO"),'I');
	$pdf->Ln(7);

	#primero
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("PRIMERO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/preprof/primero.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#segundo
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("SEGUNDO:"),'I');
	$text = utf8_decode("EL (LA) PRACTICANTE desempeñará las actividades formativas de Practicas Pre profesionales en el área de $reg2->mcap_prac en el domicilio de la empresa Ubicado en Panamericana Norte Km. 154 – Huaura .de acuerdo a las condiciones generales señalados en el literal d).");
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);
	$pdf->MultiCell(0,5,$text);
	$pdf->Ln(7);

	#tercero
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("TERCERO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/preprof/tercero.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);	

	#cuarto
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("CUARTO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode(file_get_contents("../reporte/preprof/cuarto.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#quinto
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("QUINTO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode(file_get_contents("../reporte/preprof/quinto.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#sexto
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("SEXTO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode(file_get_contents("../reporte/preprof/sexto.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#sétimo
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("SÉTIMO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode("LA EMPRESA concederá a EL (LA) PRACTICANTE una subvención económica mensual de  S/. $registro->mont_cont 00/100 Nuevos Soles.
De conformidad con el artículo 47° de la Ley Nº 28518, esta subvención económica mensual no tiene carácter remunerativo y no está afecta al pago del Impuesto a la Renta, otros impuestos, contribuciones ni aportaciones de ningún tipo a cargo de LA EMPRESA.
La subvención económica mensual no está sujeta a ningún tipo de retención a cargo de EL (LA) PRACTICANTE, salvo afiliación facultativa por parte de éste a un sistema pensionario.
");
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#octavo
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("OCTAVO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode(file_get_contents("../reporte/preprof/octavo.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#noveno
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("NOVENO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode(file_get_contents("../reporte/preprof/noveno.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#decimo
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("DÉCIMO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode(file_get_contents("../reporte/preprof/decimo.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#restarle una dia a la fecha inicio
	$fechaant = strtotime('-1 day', strtotime($registro->fech_inic));
	$fechaant = date("Y-m-d", $fechaant);

	#dividir fecha 'd-m-y'
	$di = substr($fechaant, 8, 2);
	$mi = substr($fechaant, 5, 2);
	$yi = substr($fechaant, 0, 4);

	#el nombre del mes
	require_once('../util/fechas.php');
	$mes = new Fechas();
	$nommes = $mes::getMes($mi);

	$l3 = utf8_decode("Suscrito en la Ciudad de Huaura el $di del mes de $nommes del $yi ");
	$pdf->Cell(0,0,$l3,'D');
	$pdf->Ln(28);

	#firma del trabajador
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,'________________________________________','R');
	$pdf->Ln(6);

	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,utf8_decode("Practicante:	$registro->appa_trab $registro->apma_trab, $registro->nomb_trab"),'R');
	$pdf->Ln(6);	

	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,utf8_decode("DNI:	$registro->nume_dni"),'R');
	$pdf->Ln(10);	


	$pdf->Output();
	ob_end_flush();
?>
