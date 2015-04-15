<?php

	ob_start();
	require_once("pdf_core.php");

	$pdf = new RepContrato();
	$pdf->SetMargins(20,22,20);
	$pdf->SetAutoPageBreak(true, 25);
	$pdf->AddPage();

	#Colocando el título
	$pdf->SetFont('Arial','B',13);
	$title = "CONTRATO DE TRABAJO SUJETO A MODALIDAD";
	$w = $pdf->GetStringWidth($title)+6;

	$pdf->SetX((210-$w)/2);
	$pdf->Cell($w,9,utf8_decode($title),0,0,'C',false);
	$pdf->Ln(15);

	#linea 1
	$pdf->SetFont('Arial', '', 10);
	$pdf->MultiCell(0,5,"Conste por el presente documento, el CONTRATO DE TRABAJO SUJETO A MODALIDAD que celebran y suscriben:");
	$pdf->Ln(7);

	#capitulo 1
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,"I.	DATOS DEL EMPLEADOR:",'I');
	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("EMBOTELLADORA SAN MIGUEL DEL SUR S.A.C., con R.U.C. No. 20413940568, con domicilio  principal en Calle Florida N° 204-206 - Huaranguillo - Sachaca - Arequipa y sucursal en Panamericana Norte KM 154 - Huaura, debidamente representada por su Representante Legal, Señor Eber Leonardo Valdez Nolasco, identificado con DNI No. 15693253, según facultades inscritas en la Partida Electrónica N° 01194749 en el Registro de Personas Jurídicas de la Oficina Registral de Arequipa, Sede Arequipa; y, de la otra parte:");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(7);

	#capitulo 2
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,0,"II.	DATOS DEL TRABAJADOR:",'I');
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(65,7,"	Nombres",1,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode('	'.$registro->appa_trab.' '.$registro->apma_trab.' '.$registro->nomb_trab);
	$pdf->Cell(0,7,$nom,1,0,'',false);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(65,7,"	DNI",1,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode('	'.$registro->nume_dni);
	$pdf->Cell(0,7,$nom,1,0,'',false);
	$pdf->Ln(7);
	
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(65,7,utf8_decode("	Dirección"),1,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode('	'.$registro->dire_trab);
	$pdf->Cell(0,7,$nom,1,0,'',false);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(65,7,"	Puesto",1,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode('	'.$registro->desc_carg);
	$pdf->Cell(0,7,$nom,1,0,'',false);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(65,7,utf8_decode("	Remuneración Bruta Básica"),1,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode('	S./ '.$registro->mont_cont);
	$pdf->Cell(0,7,$nom,1,0,'',false);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(65,7,utf8_decode("	Base legal del Contrato"),1,0,'I',false);
	$pdf->SetFont('Arial','',9);
	$nom = utf8_decode('	'.$registro->desc_cond);
	$pdf->Cell(0,7,$nom,1,0,'',false);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(65,7,utf8_decode("	Inicio"),1,0,'I',false);
	$pdf->SetFont('Arial','',10);
	$nom = utf8_decode('	'.date("d/m/Y", strtotime($registro->fech_inic)));
	$pdf->Cell(0,7,$nom,1,0,'',false);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(65,7,utf8_decode("	Término"),1,0,'I',false);
	$pdf->SetFont('Arial','',10);
	
	if ($registro->indt_cont == 1) {
		$nom = "Indeterminado";
	} else {
		$nom = utf8_decode('	'.date("d/m/Y", strtotime($registro->fech_fin)));
	}

	$pdf->Cell(0,7,$nom,1,0,'',false);
	$pdf->Ln(15);	

	$titulos = array("PRIMERO.- ANTECEDENTES", "TERCERO.- Remuneración",
					 "CUARTO.- Plazo del Contrato", "QUINTO.- Buena Fe Contractual", "SEXTO.- Exclusividad",
					 "SÉTIMO.-Jornada y Horario", "OCTAVO.- Reserva, confidencialidad y competencia",
					 "NOVENO.- Sobre los elementos de propiedad industrial o intelectual de EL EMPLEADOR y/o sobre los que éste tenga derechos bajo cualquier título",
					 "DÉCIMO.- Traslados","DÉCIMO PRIMERA.- Presentación personal", "DÉCIMO SEGUNDA.- Resolución y/o término",
					 "DÉCIMO TERCERA.- Cumplimiento del plazo del contrato.", "DÉCIMO CUARTA.- Sistema de Gestión de la Seguridad y Salud en el Trabajo.",
					 "DÉCIMO QUINTA .- Legislación aplicable.-");

	$textos = array("../reporte/articulo57sin/txt1.txt","../reporte/articulo57sin/txt3.txt",
					"../reporte/articulo57sin/txt4.txt","../reporte/articulo57sin/txt5.txt","../reporte/articulo57sin/txt6.txt",
					"../reporte/articulo57sin/txt7.txt","../reporte/articulo57sin/txt8.txt","../reporte/articulo57sin/txt9.txt",
					"../reporte/articulo57sin/txt10.txt","../reporte/articulo57sin/txt11.txt","../reporte/articulo57sin/txt11.txt",
					"../reporte/articulo57sin/txt13.txt","../reporte/articulo57sin/txt14.txt","../reporte/articulo57sin/txt15.txt");

	for ($i=0; $i < 1; $i++) { 
		$pdf->PrintChapter(utf8_decode($titulos[$i]), $textos[$i]);
	}

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,"SEGUNDO: Del Objeto",'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("En razón a los argumentos expuestos y a la especial calificación acreditada por EL TRABAJADOR, EL  EMPLEADOR ha decidido, al amparo de lo previsto en el artículo 57º de la LPCL, contratar los servicios temporales de aquel para que realice las labores propias y complementarias del puesto de  $registro->desc_carg en atención a al incremento de actividades de los servicios prestados por EL EMPLEADOR, de acuerdo a las estipulaciones contenidas en este Contrato.");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(5);

	for ($i=1; $i < 7; $i++) {
		$pdf->PrintChapter(utf8_decode($titulos[$i]), $textos[$i]);		
	}

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(0,1,"1.-	RESERVA Y CONFIDENCIALIDAD",'I');
	$pdf->Ln(4);

	$tex = utf8_decode(file_get_contents("../reporte/articulo57sin/txt8.1.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,'	'.$tex);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(0,0,"2.-	COMPETENCIA",'I');
	$pdf->Ln(4);

	$tex2 = utf8_decode(file_get_contents("../reporte/articulo57sin/txt8.2.txt"));
   	$tex2 = ltrim($tex2, '?');
	$pdf->MultiCell(0,5,'	'.$tex2);
	$pdf->Ln(5);

	for ($i=7; $i < 14; $i++) { 
		$pdf->PrintChapter(utf8_decode($titulos[$i]), $textos[$i]);
	}

	#lineas finales
	$pdf->SetFont('Arial','',10);

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

	$l3 = utf8_decode("Extendido por triplicado en la Ciudad de Huaura el día $di de $nommes del $yi ");
	$pdf->Cell(0,0,$l3,'D');
	$pdf->Ln(35);

	#firma del trabajador
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,'________________________________________','R');
	$pdf->Ln(6);

	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,utf8_decode("Nombres:	$registro->appa_trab $registro->apma_trab, $registro->nomb_trab"),'R');
	$pdf->Ln(6);	

	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,utf8_decode("DNI:	$registro->nume_dni"),'R');
	$pdf->Ln(10);	

	$pdf->Output();
	ob_end_flush();

	$titulos = null;
	$textos = null;

?>
