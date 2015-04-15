<?php

	ob_start();
	require_once("pdf_core.php");

	$pdf = new RepContrato();
	$pdf->SetMargins(23,22,23);
	$pdf->SetAutoPageBreak(true, 25);
	$pdf->AddPage();

	#Nombre del año
	$pdf->SetFont('Arial','B',11);
	$title = "CONVENIO DE PRÁCTICAS PROFESIONALES";
	$w = $pdf->GetStringWidth($title)+6;

	$pdf->SetX((210-$w)/2);
	$pdf->Cell($w,9,utf8_decode($title),0, 0, 'C', false);
	$pdf->Ln(15);

	#INTRO
	$pdf->SetFont('Arial', '', 10);
	$p1 = utf8_decode("Conste por el presente documento que se firma por triplicado, el Convenio de Prácticas Profesionales, celebrado de conformidad con el artículo 13º y siguientes de la Ley Nº 28518, Ley sobre Modalidades Formativas Laborales, y su Reglamento, aprobado mediante el Decreto Supremo N° 007-2005-TR, que celebran entre LA EMPRESA y EL (LA) EGRESADO (A), identificados en este documento, de acuerdo a los términos y  condiciones siguientes:");
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

	#el egresado
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(0,5,utf8_decode("C. EL(LA) EGRESADO(A)"),0 ,0 ,"I", false);
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
	$pdf->Cell(70,7,utf8_decode("Ocupación materia de la capacitación:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$reg2->mcap_prac");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Condición:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$reg2->situ_prac");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Profesión Universitaria o Profesión Técnica:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$reg2->esp_prac");
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
	$nom = utf8_decode("Lunes a Sábado.");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Horario de las prácticas:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("Lunes a Viernes de 08:00 a 13:15 hrs - 14:00 a 17:30 hrs.");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("                  "),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("Refrigerio de 13:15 a 14:00 hrs. Sábados de 08:00 a 12:15 hrs.");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Subvención Económica:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("S/. $registro->mont_cont Nuevos Soles mensual");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("Área donde se realiza"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("              ");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode("las Prácticas Profesionales:"),0,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode("$reg2->mcap_prac");
	$pdf->Cell(0,7,$nom,0,0,'',false);
	$pdf->Ln(20);

	#clausulas del convenio
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("CLÁUSULAS DEL CONVENIO"),'I');
	$pdf->Ln(7);

	#primero
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("PRIMERO:"),'I');
	$pdf->Ln(5);

		#fecha de presentación
		$dp = substr($reg2->fpres_prac, 8, 2);
		$mp = substr($reg2->fpres_prac, 5, 2);
		$yp = substr($reg2->fpres_prac, 0, 4);

		#el nombre del mes
		require_once('../util/fechas.php');
		$mes = new Fechas();
		$mp = $mes::getMes($mp);

	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode("El(La) Decano(a) de la Facultad de $reg2->facu_prac de EL CENTRO DE FORMACIÓN PROFESIONAL; $reg2->dec_prac, mediante comunicación de fecha $dp de $mp del $yp, presenta a EL (LA) EGRESADO (A) para que se le permita realizar sus Prácticas Profesionales en LA EMPRESA.");
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#segundo
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("SEGUNDO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/prof/segundo.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);	

	#tercer
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("TERCERO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode("EL  (LA)  EGRESADO  (A)  desempeñará  las  actividades  formativas  de Practicante  en el área de $reg2->mcap_prac en el domicilio de la empresa ubicado  en  Carretera Panamericana Norte Km 154 - Huaura, de acuerdo a las condiciones generales señalados en el literal c).");
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#CUARTO
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("CUARTO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode(file_get_contents("../reporte/prof/cuarto.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#QUINTO
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("QUINTO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode(file_get_contents("../reporte/prof/quinto.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#SEXTO
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("SEXTO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode(file_get_contents("../reporte/prof/sexto.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#SETIMO
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("SÉTIMO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode("LA EMPRESA concederá a EL (LA) EGRESADO (A) una subvención económica mensual de $registro->mont_cont Nuevos soles (no menor a una Remuneración Mínima Vital).

De conformidad con el artículo 47° de la Ley N° 28518, esta subvención económica mensual no tiene carácter remunerativo y no está afecta al pago del Impuesto a la Renta, otros impuestos, contribuciones ni aportaciones de ningún tipo a cargo de LA EMPRESA.

La subvención económica mensual no está sujeta a ningún tipo de retención a cargo de EL (LA) EGRESADO (A), salvo afiliación facultativa por parte de éste a un sistema pensionario.
");
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#OCTAVO
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("OCTAVO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode(file_get_contents("../reporte/prof/octavo.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#NOVENO
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("NOVENO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode(file_get_contents("../reporte/prof/noveno.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(7);

	#DECIMO
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("DÉCIMO:"),'I');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);	
	$tex = utf8_decode(file_get_contents("../reporte/prof/decimo.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,$tex);
	$pdf->Ln(10);


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

	$l3 = utf8_decode("Suscrito en la Ciudad de Huaura a los $di del mes de $nommes del $yi ");
	$pdf->Cell(0,0,$l3,'D');
	$pdf->Ln(28);

	#firma del trabajador
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,'________________________________________','R');
	$pdf->Ln(6);

	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,utf8_decode("Egresado(a):	$registro->appa_trab $registro->apma_trab, $registro->nomb_trab"),'R');
	$pdf->Ln(6);	

	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,utf8_decode("DNI:	$registro->nume_dni"),'R');
	$pdf->Ln(10);	


	$pdf->Output();
	ob_end_flush();
?>
