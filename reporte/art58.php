<?php

	ob_start();
	require_once("pdf_core.php");

	$pdf = new RepContrato();
	$pdf->SetMargins(20,22,20);
	$pdf->SetAutoPageBreak(true, 25);
	$pdf->AddPage();

	#Colocando el título
	$pdf->SetFont('Arial','B',11);
	$title = "CONTRATO DE TRABAJO SUJETO A LA MODALIDAD DE NECESIDADES DE MERCADO ";
	$w = $pdf->GetStringWidth($title)+6;

	$pdf->SetX((210-$w)/2);
	$pdf->Cell($w,9,utf8_decode($title),0,0,'C',false);
	$pdf->Ln(15);

	#linea 1
	$pdf->SetFont('Arial', '', 10);
	$pdf->MultiCell(0,5,utf8_decode("Conste por el presente documento el Contrato de Trabajo sujeto a la Modalidad de Necesidades de Mercado (en adelante el 'Contrato')  que suscriben de conformidad con el Artículo 58° del Decreto Supremo No. 003-97-TR, Texto Único Ordenado de la Ley de Productividad y Competitividad Laboral (en adelante, la LPCL), de una parte:"));
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("EMBOTELLADORA SAN MIGUEL DEL SUR S.A.C. (en adelante, 'EL EMPLEADOR'), con Registro Único de Contribuyentes No. 20413940568, con domicilio para estos efectos en la Calle Florida No. 204-206, distrito de Huaranguillo, Sachaca, provincia y departamento de Arequipa y sucursal en Panamericana Norte KM 154 - Distrito de Huaura, provincia de Huaura y Departamento de Lima, debidamente representado por , Señor Eber  Valdez Nolasco, identificado con DNI No. 15693253, según facultades inscritas en la Partida Electrónica N° 1308212 DEL Registro de Personas Jurídicas de Lima  y, de la otra parte;");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("El(la) Señor(a) $registro->appa_trab $registro->apma_trab $registro->nomb_trab (en adelante, 'EL TRABAJADOR'), peruano, identificado con Documento Nacional de Identidad No. $registro->nume_dni, con domicilio $registro->dire_trab - Distrito de $registro->desc_dist, Provincia de $registro->desc_prov y Departamento de $registro->desc_depa;");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(10);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,"PRIMERA: Antecedentes",'I');
	$pdf->Ln(4);	

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("EL EMPLEADOR es una persona jurídica de derecho privado, constituida con arreglo a las leyes peruanas, dedicado a la elaboración de bebidas gasificadas, aguas minerales y bienes afines.

EL EMPLEADOR ha verificado que se ha producido un incremento coyuntural de las labores a las que se dedica originado por la variación sustancial de la demanda en el mercado de su producción, como resultado del aumento temporal y circunstancial de los volúmenes  de pedidos de cajas y/o botellas de los productos que fabrica por parte de los clientes y distribuidores, situación temporal e imprevisible que afecta a todo el proceso productivo de EL EMPLEADOR, el que incluye el proceso fabril y las actividades administrativas necesarias para la atención de los pedidos recibidos. 

Esta situación se ha visto reflejada en el PDT Impuesto General a las Ventas, donde se puede apreciar un incremento coyuntural e imprevisible de la demanda como consecuencia del aumento en los pedidos de los productos, factor objetivo y real que habilita a las partes a celebrar el presente contrato sujeto a la modalidad de Necesidades de Mercado, de conformidad con lo dispuesto por el artículo 58° de la LPCL.
");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,"SEGUNDA: Del Objeto",'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("En razón a los argumentos expuestos y a la especial calificación acreditada por EL TRABAJADOR, EL  EMPLEADOR ha decidido, al amparo de lo previsto en el artículo 58º de la LPCL, contratar los servicios temporales de aquel para que realice las labores propias y complementarias del puesto de $registro->desc_carg en atención a que dicha actividad califica como una nueva actividad, de acuerdo a las estipulaciones contenidas en este Contrato.");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,"TERCERA: Vigencia",'I');
	$pdf->Ln(4);

			#dividir fecha inicial 'd-m-y'
		$di_ = substr($registro->fech_inic, 8, 2);
		$mi_ = substr($registro->fech_inic, 5, 2);
		$yi_ = substr($registro->fech_inic, 0, 4);

		#dividir fecha final 'd-m-y'
		$df_ = substr($registro->fech_fin, 8, 2);
		$mf_ = substr($registro->fech_fin, 5, 2);
		$yf_ = substr($registro->fech_fin, 0, 4);

		#el nombre del mes 
		require_once('../util/fechas.php');
		$mes = new Fechas();
		$nommes_ini = $mes::getMes($mi_);
		$nommes_fin = $mes::getMes($mf_);

		#condicionar si el fin del contrato es indeterminado
		if ($registro->indt_cont == 1) {
			$fechafin = "con plazo Indeterminado";
		} else {
			$fechafin = "al $df de $nommes_fin del $yf";
		}

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("Las labores que desarrollará EL TRABAJADOR se contabilizarán desde el día $di_ de $nommes_ini del $yi_ concluirán el $df_ de $nommes_fin del $yf_.");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(7);		

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,"CUARTA: De los Servicios",'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("Las labores que desempeñará EL TRABAJADOR serán llevadas a cabo por este, exclusivamente a favor de EL EMPLEADOR.

Del mismo modo, queda claramente establecido que la asignación o reasignación de funciones y/o de cargo de EL TRABAJADOR es potestad exclusiva de EL EMPLEADOR.

Asimismo, las partes declaran que el presente Contrato no implica pacto de labor ni de ubicación geográfica fija, de tal manera que EL EMPLEADOR está facultado a asignar o reasignar las  funciones y/o cargos de manera razonable, en función a la capacidad y aptitud de EL TRABAJADOR y las necesidades y requerimientos de EL EMPLEADOR. 

De acuerdo a lo pactado anteriormente, EL EMPLEADOR podrá destacar a EL TRABAJADOR a cualquier otro lugar dentro de la República del Perú donde EL EMPLEADOR realice actividades, para el desempeño de las labores que se le asignen.
");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,"QUINTA: DE LAS OBLIGACIONES ",'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("EL TRABAJADOR deberá cumplir con las directivas que emanen de sus jefes y/o superiores, así como con las normas propias del centro de trabajo y las contenidas en las políticas de EL EMPLEADOR.

Asimismo, EL TRABAJADOR declara haber recibido el Reglamento Interno de Trabajo, el Reglamento de Seguridad y Salud en el Trabajo, las Recomendaciones en Seguridad y Salud en el Trabajo emitidas de conformidad con lo establecido por el Artículo 35° de la Ley No. 29783 y las demás normas internas que resultan de obligatoria observancia en el cumplimiento de sus funciones. 

Ambas partes declaran que EL TRABAJADOR cumplirá escrupulosamente las normas dispuestas por EL EMPLEADOR con relación a su presentación personal y uso de uniforme, las cuales declara conocer y aceptar. 
");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,"SEXTA: DE LA JORNADA DE TRABAJO ",'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("La jornada de trabajo aplicable a EL TRABAJADOR será de lunes a sábado. Asimismo, cumplirá el horario de trabajo y turno rotativo que oportunamente le designe EL EMPLEADOR. EL TRABAJADOR registrará, según la forma prevista en dicho centro de trabajo, su ingreso y salida, de conformidad con el artículo 1° del Decreto Supremo No. 004-2006-TR. 

EL TRABAJADOR tendrá derecho a un tiempo de refrigerio de $registro->ref_cont minutos diarios, el cual se tomará en el horario que establezca EL EMPLEADOR y no forma parte de la jornada de trabajo.

Sin perjuicio de lo señalado, las partes acuerdan que, atendiendo a la naturaleza de sus actividades, la jornada, horario de trabajo, días de labores y de descansos remunerados, etc. serán establecidos y modificados según las necesidades de EL EMPLEADOR y observando la legislación laboral. Asimismo, EL EMPLEADOR se reserva el derecho de establecer, en cualquier momento, jornadas atípicas o discontinuas. 

EL TRABAJADOR declara conocer que se encuentra prohibida de permanecer en el centro de trabajo fuera de la jornada de trabajo establecida, salvo que obtuviera autorización expresa y por escrito de EL EMPLEADOR.
");

	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(7);	

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("SEPTIMA: DE LA REMUNERACIÓN Y BENEFICIOS"),'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("EL EMPLEADOR abonará a EL TRABAJADOR por los servicios que éste le preste de conformidad con lo dispuesto en este Contrato, la suma de S/. $registro->mont_cont Con 00/100 Nuevos Soles por concepto de remuneración bruta mensual, además de los beneficios que por Ley le corresponden.

Las partes declaran que los únicos beneficios a los que tendrá derecho EL TRABAJADOR son los estipulados en las leyes laborales, en el presente Contrato y los que EL EMPLEADOR voluntariamente decida otorgar.
");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("OCTAVA: GOCE DE VACACIONES"),'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("Conforme a las normas legales aplicables, EL TRABAJADOR tiene derecho a treinta (30) días de goce físico vacacional por cada año completo de servicios. La oportunidad del descanso vacacional será fijada de común acuerdo entre EL TRABAJADOR y EL EMPLEADOR teniendo en cuenta las modalidades, las necesidades y el desarrollo de las actividades de EL EMPLEADOR. En caso de no arribarse a acuerdo alguno, decidirá EL EMPLEADOR.");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,"NOVENA: DE LA BUENA FE LABORAL",'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("EL TRABAJADOR se obliga, en forma expresa, a poner al servicio de EL EMPLEADOR toda su capacidad, diligencia, lealtad y a guardar confidencialidad en asuntos que conozca con ocasión de la prestación de sus servicios.");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("DÉCIMA: USO DE BIENES DE TRABAJO"),'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("Los medios de trabajo proporcionados por EL EMPLEADOR deberán ser utilizados por EL TRABAJADOR exclusivamente para el cumplimiento de las funciones asignadas por EL EMPLEADOR en virtud del presente Contrato, reconociendo expresamente que no pueden ser empleados para asuntos ajenos a sus funciones.

En especial, EL TRABAJADOR declara conocer que no podrá emplear los bienes y servicios de EL EMPLEADOR para adherirse o difundir comunicados que sean ilegales o que violen cualquier política de EL EMPLEADOR, en especial aquellos que sean difamatorios, obscenos, racistas, sexistas o que ofendan creencias religiosas.
");
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,1,utf8_decode("DÉCIMO PRIMERA: RESERVA, CONFIDENCIALIDAD Y COMPETENCIA"),'I');
	$pdf->Ln(4);

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("EL TRABAJADOR asume la obligación de mantener en absoluta reserva, confidencialidad y secreto toda aquella información contable, tributaria, administrativa, laboral, industrial y de cualquier otra índole a la que acceda por cualquier medio con ocasión del desempeño de sus funciones, su simple presencia en las instalaciones de EL EMPLEADOR o por el contacto o interacción con otros trabajadores dentro o fuera del centro de trabajo y de operaciones. ");	
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(3);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(0,0,utf8_decode("Las partes acuerdan que EL TRABAJADOR deberá cumplir las reglas que a continuación se detallan:"),'I');
	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(0,1,"1.	RESERVA Y CONFIDENCIALIDAD",'I');
	$pdf->Ln(3);	

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/articulo58/txt11.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(0,1,"2.	COMPETENCIA",'I');
	$pdf->Ln(3);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/articulo58/txt12.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(3);

	$pdf->SetFont('Arial','',10);
	$p1 = utf8_decode("Las obligaciones que EL TRABAJADOR asume de conformidad con los literales a), b), c) y d) del numeral 1 y en el literal c) del numeral 2 de la presente cláusula regirán indefinidamente, con prescindencia de la vigencia del presente contrato o de la relación laboral. Las demás obligaciones regirán inclusive hasta tres (3) años después de concluida la relación laboral. 

El incumplimiento por parte de EL TRABAJADOR de cualquiera de las obligaciones contenidas en la presente cláusula facultará a EL EMPLEADOR a aplicar las sanciones disciplinarias que faculta la legislación laboral vigente, iniciar las acciones legales que pudieran corresponder en defensa de sus derechos y a obtener la indemnización por daños y perjuicios a que hubiera lugar.
");	
	$pdf->MultiCell(0,5,$p1);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->MultiCell(0,5,utf8_decode("DÉCIMO SEGUNDA: SOBRE LOS ELEMENTOS DE PROPIEDAD INDUSTRIAL O INTELECTUAL DE 
EL EMPLEADOR Y/O SOBRE LOS QUE ÉSTE TENGA DERECHOS BAJO CUALQUIER TÍTULO
"),'I');
	$pdf->Ln(1);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/articulo58/txt13.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->MultiCell(0,5,utf8_decode("DECIMO TERCERA: SISTEMA DE GESTIÓN DE LA SEGURIDAD Y SALUD EN EL TRABAJO"),'I');
	$pdf->Ln(1);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/articulo58/txt14.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->MultiCell(0,5,utf8_decode("DÉCIMO CUARTA: DEL RÉGIMEN APLICABLE"),'I');
	$pdf->Ln(1);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/articulo58/txt15.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->MultiCell(0,5,utf8_decode("DECIMO QUINTA.- Período de prueba.-"),'I');
	$pdf->Ln(1);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/articulo58/txt16.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->MultiCell(0,5,utf8_decode("DÉCIMO SEXTA: DEL DOMICILIO Y JURISDICCIÓN .-"),'I');
	$pdf->Ln(1);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/articulo58/txt17.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->MultiCell(0,5,utf8_decode("DÉCIMO SETIMA: DEL REGISTRO ADMINISTRATIVO .-"),'I');
	$pdf->Ln(1);

	$pdf->SetFont('Arial','',10);
	$tex = utf8_decode(file_get_contents("../reporte/articulo58/txt18.txt"));
   	$tex = ltrim($tex, '?');
	$pdf->MultiCell(0,5,''.$tex);
	$pdf->Ln(3);

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

	$l3 = utf8_decode("En fe de lo cual, las partes se ratifican y suscriben el presente Contrato en señal de conformidad y aceptación, en dos ejemplares de igual tenor en Huaura, el día $di de $nommes del $yi ");
	$pdf->MultiCell(0,5, $l3);
	$pdf->Ln(28);

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

	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,0,'Trabajador','R');
	$pdf->Ln(6);	

	$pdf->Output();
	ob_end_flush();

	$titulos = null;
	$textos = null;

?>
