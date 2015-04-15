<?php
  $fechaIni = date('d/m/Y', strtotime($_SESSION['contrato']->fech_inic));

  if($_SESSION['contrato']->indt_cont==1)
    $fechaFin='Indeterminado';
  else
    $fechaFin = date('d/m/Y', strtotime($_SESSION['contrato']->fech_fin));

  
  $texto="
<html>
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1' />
    
  </head>

  <body lang=ES-PE>




  <h1>                 <b>CONTRATO DE TRABAJO SUJETO A MODALIDAD</b></h1>

  <br/>


<p align='justify'>Conste por el presente documento, el CONTRATO DE TRABAJO SUJETO A MODALIDAD que celebran y suscriben:</p>

<p align='justify'><b>I.DATOS DEL EMPLEADOR:</b></p>


<p align='justify'>EMBOTELLADORA SAN MIGUEL DEL SUR S.A.C., con R.U.C. No. 20413940568, con domicilio principal en Calle Florida N° 204-206-Huaranguillo–Sachaca-Arequipa y sucursal en Panamericana Norte KM 154 – Huaura, debidamente representada por su Representante Legal, Señor Eber Valdez Nolasco, identificado con DNI No. 15693253, según facultades inscritas en la partida Electrónica N° 01194749 en el Registro de Personas Jurídicas de la Oficina Registral de Arequipa, Sede Arequipa; y, de la otra parte:</p>

<p align='justify'><b>II.DATOS DEL TRABAJADOR:</b></p>
<table border='1' >
  <tr>
      <td><b>NOMBRE:</b></td>
  </tr>
  <tr>
      <td>".$_SESSION['contrato']->nombre."</td>
  </tr>
  <tr>
      <td><b>DNI:</b></td>  
  </tr> 
  <tr>
      <td>".$_SESSION['contrato']->nume_dni."</td>  
  </tr> 
  <tr>
      <td><b>DIRECCION:</b></td>
  </tr> 
  <tr>
      <td>".$_SESSION['contrato']->dire_trab." - ".$_SESSION['contrato']->desc_dist."</td>
  </tr>
  <tr>
      <td><b>PUESTO:</b></td>
  </tr>
  <tr>
      <td>".$_SESSION['contrato']->desc_carg."</td>
  </tr>
  <tr>
      <td><b>REMUNERACION BRUTA BASICA:</b></td>
  </tr>
  <tr>
      <td>".$_SESSION['contrato']->mont_cont."</td>
  </tr>
  <tr>
      <td><b>BASE LEGAL DEL CONTRATO:</b></td>
  </tr>
  <tr>
      <td>".$_SESSION['contrato']->desc_cond."</td>
  </tr>
  <tr>
      <td><b>PLAZO DEL CONTRATO:</b></td>  
  </tr>
  <tr>
      <td>INICIO: ".$fechaIni." - TERMINO: ".$fechaFin."</td>
  </tr>  
</table>


<p align='justify'>Ambas partes declaran haber celebrado libremente el presente contrato, en los términos, condiciones y
cláusulas siguientes:</p>

<p align='justify'><b>PRIMERO:ANTECEDENTES</b></p>

<p align='justify'>Con fecha 16 de Enero del 2014 las partes iniciaron su relación laboral con la suscripción de un contrato de trabajo sujeto a la modalidad de Necesidades de Mercado al amparo del artículo 58° de la LPCL. Este contrato tuvo como sustento el incremento coyuntural de la producción que se originó como consecuencia de una variación sustancial en la demanda de los servicios prestados por EL EMPLEADOR, quien apreció un aumento de los pedidos de productos por parte de clientes y distribuidores. </p>

<p align='justify'>Recientemente EL EMPLEADOR ha verificado que las ventas que se reflejan en el PDT Impuesto General a las Ventas continúan reflejando un incremento coyuntural e imprevisible de la demanda como consecuencia del aumento en los pedidos de los productos que fabrica, factor objetivo y real que lo habilita a celebrar el presente contrato sujeto a la modalidad de Necesidades de Mercado, de conformidad con lo dispuesto por el artículo 58° de la LPCL. </p>

<p align='justify'><b>SEGUNDO: DEL OBJETO</b></p>

<p align='justify'>En razón a los argumentos expuestos y a la especial calificación acreditada por EL TRABAJADOR, EL  EMPLEADOR ha decidido, al amparo de lo previsto en el artículo 58º de la LPCL, contratar los servicios temporales de aquella persona para que realice las labores propias y complementarias en el puesto de Asistente de Investigación y Desarrollo en atención a la variación sustancial en la demanda de los servicios prestados por EL EMPLEADOR, de acuerdo a las estipulaciones contenidas en este Contrato.</p>

<p align='justify'><b>TERCERO.- Remuneración</b></p>
<p align='justify'>Como  remuneración, EL TRABAJADOR percibirá la suma bruta que bajo el rubro REMUNERACIÓN se establece en la introducción del presente contrato, sección Datos de EL TRABAJADOR. Esta suma se encuentra afecta a las retenciones y descuentos de Ley.</p>

<p align='justify'>Ambas partes acuerdan que la modalidad y fecha de pago de la remuneración será fijada y modificada por EL EMPLEADOR de acuerdo con sus necesidades operativas y/o administrativas. </p>

<p align='justify'>EL TRABAJADOR tendrá derecho a percibir, además de su remuneración, los beneficios que otorga la Ley a trabajadores sujetos a Régimen Laboral de la Actividad Privada, en los términos y condiciones que ella establece. </p>

<p align='justify'><b>CUARTO.- Plazo del Contrato</b></p>

<p align='justify'>El plazo del presente es el pactado por la partes en la introducción, sección Datos de EL TRABAJADOR, a cuyo vencimiento se entenderá por concluida la relación laboral que mantienen las partes. Se deja constancia que no es necesario cursar una comunicación señalando la conclusión de la relación laboral por vencimiento del plazo pactado </p>


<p align='justify'><b>QUINTO.- Buena Fe Contractual</b></p>

<p align='justify'>EL TRABAJADOR se compromete a poner a disposición de EL EMPLEADOR toda su capacidad y lealtad, obligándose siempre y en todo caso a obrar de buena fe con relación a su empleo. Asimismo, EL TRABAJADOR  se compromete a observar las políticas y normas que disponga EL EMPLEADOR, teniendo como objetivo su progreso y permanente desarrollo. A la firma del presente contrato se hace entrega al  trabajador  de un ejemplar del Reglamento Interno de Trabajo de la empresa, aprobado por Decreto Subdirectoral N° 1061-2011-GRA-GRTPE-SDRG y N° 1082- 2011-GRA-GRTPE-SDRG</p>

<p align='justify'><b>SEXTO.- Exclusividad</b></p>


<p align='justify'>EL TRABAJADOR es contratada en forma exclusiva por EL EMPLEADOR, de manera tal
que no podrá dedicarse a otra actividad distinta que la que emana de este
contrato, salvo autorización previa expresa y escrita de EL EMPLEADOR.</p>

<p  align='justify'><b>SETIMO. -Jornada y Horario</b></p>

<p align='justify'>Ambas partes convienen en que la jornada laboral será de lunes a sábado y en horario de oficina. En uso de sus facultades directrices el EMPLEADOR podrá efectuar modificaciones razonables en la jornada de trabajo de acuerdo a las necesidades operativas respetando el máximo legal de 48 horas semanales, sin que dichas variaciones  signifiquen menoscabo de categoría y/o remuneración.</p>

<p align='justify'>EL TRABAJADOR  tendrá derecho a un tiempo de refrigerio de dos (2) horas.  El refrigerio se tomará en el horario que indique EL EMPLEADOR. El tiempo de refrigerio no forma parte de la jornada laboral.</p>

<p align='justify'><b>OCTAVO.- Reserva, confidencialidad y competencia</b></p>
<p align='justify'> EL TRABAJADOR asume la obligación de mantener en absoluta reserva, confidencialidad y secreto toda aquella información: contable, tributaria, administrativa, laboral, industrial y de cualquier otra índole que por el hecho del desempeño de sus funciones, su simple presencia en las instalaciones de la empresa, o por el contacto o interacción con otros empleados de la empresa, dentro o fuera de las instalaciones de la misma; pueda ser de mi conocimiento y cuya difusión pueda o no causar daño o atentar contra los intereses de la empresa. Queda entendido que la obligación asumida
perdurará inclusive una vez concluida la relación laboral con EL EMPLEADOR; Asimismo asume la obligación de no competir con la empresa empleadora; siendo de aplicación en ambos casos las reglas que a continuación se detallan:</p>

<p>1.-<u>RESERVA Y CONFIDENCIALIDAD</u></p>

<p align='justify'>a.  A observarante cualquier persona, entidad o empresa una discreción absoluta sobre cualquier actividad o información sobre EL EMPLEADOR y/o sus representantes, a las que hubiera tenido acceso con motivo de la prestación de sus servicios para EL EMPLEADOR.</p>

<p align='justify'>b.  A no revelar a ninguna persona, entidad o empresa, ni usar para ningún propósito, en
provecho propio o de terceros, cualquier información vinculada a EL EMPLEADOR de cualquier naturaleza.</p>

<p align='justify'>c.  A no revelar a ninguna persona dentro de EL EMPLEADOR, ningún tipo de información
confidencial o de propiedad de EL EMPLEADOR, salvo que dicha persona necesite conocer tal información por razón de sus funciones.  Si hubiese cualquier duda sobre lo que constituye información confidencial, o sobre si la información debe
ser revelada y a quién, EL TRABAJADOR se obliga a solicitar autorización de sus superiores.</p>

<p align='justify'>d.  A no usar de forma inapropiada ni revelar información confidencial alguna o de propiedad de la persona, entidad o empresa para la cual laboró con anterioridad a ser contratado por EL EMPLEADOR, así como a no introducir en las instalaciones de EL EMPLEADOR ningún documento que no haya sido publicado ni ninguna clase de bien que pertenezca a cualquiera de dichas personas, entidades o empresas, sin su consentimiento previo. EL TRABAJADOR se obliga igualmente a no violar ningún convenio de confidencialidad o sobre derechos de propiedad que haya firmado en conexión con tales personas, entidades o empresas.</p>

<p align='justify'>e.  A devolver a EL EMPLEADOR, al terminar o resolverse el presente contrato, sea cual fuere la causa, cualquier documento, materiales de estudio, disquetes y casettes y cualquier otro material contenido o fijado en cualquier otro medio que contenga o revele información que sea confidencial o de propiedad de EL EMPLEADOR.</p>

<p>2.-<u>COMPETENCIA</u></p>

<p align='justify'>a.  A no realizar ningún tipo de inversión en empresas o instituciones de cualquier tipo cuyas actividades puedan estar en conflicto con los intereses de EL EMPLEADOR.</p>

<p align='justify'>b.  A no prestar servicios en forma dependiente o independiente para personas, instituciones o empresas que compiten, directa o indirectamente, con EL EMPLEADOR.</p>

<p align='justify'>c.  A no utilizar la información de carácter reservado que le fue proporcionada por EL EMPLEADOR para desarrollar por cuenta propia o de terceros, actividades que compitan con las que realiza o planeara realizar EL EMPLEADOR.</p>

<p align='justify'>d.  A no inducir o intentar influenciar, ni directa ni indirectamente, a ningún trabajador de EL EMPLEADOR a que termine su empleo con EL EMPLEADOR para que trabaje para EL TRABAJADOR o para cualquier otra persona, entidad, institución o empresa, que compita con EL EMPLEADOR.</p>

<p align='justify'>Las obligaciones que EL TRABAJADOR asume en los literales a), b), c) y d) del numeral 1 y en el literal c) del numeral 2 de esta cláusula regirán indefinidamente, con prescindencia de la vigencia del presente contrato.  Las demás obligaciones regirán hasta Tres (3) años después de concluido el presente contrato de trabajo.  El incumplimiento por parte de EL TRABAJADOR de cualquiera de las obligaciones contenidas en esta cláusula, facultará a EL EMPLEADOR a iniciar las acciones legales que pudieran corresponder en defensa de sus derechos y a obtener la indemnización por daños y perjuicios a que hubiera lugar.</p>


<p align='justify'><b>NOVENO.- Sobre los elementos de propiedad industrial o intelectual de EL EMPLEADOR y/o sobre
los que éste tenga derechos bajo cualquier título</b></p>

<p align='justify'>EL TRABAJADOR declara conocer que el utilizar, incitar, o estimular a otro trabajador o trabajadores o a terceros, en el uso indebido de bienes o elementos de propiedad industrial o intelectual tales como marcas o signos distintivos de los que EL EMPLEADOR  es propietario o  haya convenido con otras para el uso o explotación con fines de su desarrollo Empresarial tanto al interior o exterior del Centro Laboral configurará la comisión de una infracción grave laboral por EL TRABAJADOR y un incumplimiento de los deberes esenciales que emanan del presente contrato de trabajo, y en tal sentido, hará irrazonable e insubsistente la continuidad de la relación laboral al atentar gravemente
contra el desarrollo de la actividad productiva que da lugar al vínculo laboral entre ambas partes, de conformidad a lo previsto en el artículo 25 del &quot;Texto Único Ordenado del Decreto Legislativo No. 728, Ley de Productividad y Competitividad Laboral”, aprobado por el Decreto Supremo No. 003-97-TR, y por su Reglamento, aprobado por el Decreto Supremo No. 001-96-TR..</p>

<p align='justify'>Ambas partes acuerdan que el incumplimiento de cualquiera de las obligaciones antes señaladas hará insubsistente la continuidad de la relación laboral y dará lugar a la terminación justa del vínculo laboral por la comisión de una falta grave, sin perjuicio de las acciones legales penales, civiles o de cualquier otra
índole que EL EMPLEADOR decida iniciar.</p>

<p align='justify'><b>DECIMO.- Traslados</b></p>
<p align='justify'>
EL TRABAJADOR es contratado para laborar en un lugar específico. Ambas partes acuerdan que EL EMPLEADOR  tendrá la facultad de disponer la realización de las labores para las cuales ha sido contratado EL TRABAJADOR, en cualquiera de sus áreas o centros de trabajo, incluyendo aquellos que se encuentren afuera de Lima y provincias.</p>

<p align='justify'><b>DÉCIMO PRIMERA.- Presentación personal</b></p>
<p align='justify'>Ambas partes acuerdan que EL TRABAJADOR, cumplirá escrupulosamente las normas que disponga EL EMPLEADOR con relación a su presentación personal y uso de uniforme. Desde ya, sin embargo, EL TRABAJADOR, declara conocer y acepta cumplir las reglas sobre el particular.</p>

<p align='justify'><b>DECIMO SEGUNDA: Resolución y/o término</b></p>
<p align='justify'> El presente contrato, podrá resolver en cualquier momento por mutuo acuerdo entre las partes, por renuncia del CONTRATO y por causas justas de despido, relacionadas con la conducta o capacidad del trabajador, debidamente comprobadas y a las que  se refiere el TUO de la Ley de Productividad y Competitividad Laboral, aprobado por Decreto
Supremo Nº 003-97-TR.</p>

<p align='justify'><b>DECIMO TERCERA – Cumplimiento del plazo del contrato</b></p>
<p align='justify'> La EMPRESA no está obligada a dar aviso alguno referente al término del presente contrato, el que concluirá de acuerdo a la cláusula cuarta, procediendo a pagar a EL TRABAJADOR, al vencimiento, los beneficios sociales que pudieran corresponderle dentro del plazo legal.</p>

<p align='justify'>Las partes acuerdan que si durante la vigencia del presente contrato se produjeran circunstancias o hechos no previstos al momento presente, que hicieran imposible la razón que motiva la contratación, como es el caso en una baja en la producción por falta de pedidos de los clientes, por resolución por parte de los clientes de los pedidos efectuados, entre otros;  y, como consecuencia de ello resultara innecesaria la prestación de los servicios contratados;  se resolverá el vinculo laboral, para lo cual se cursará a EL TRABAJADOR el aviso con una anticipación de tres días. En tal caso, la empresa solo quedará obligada al pago de la remuneración y beneficios que señala el artículo 76 del D.S. 003-97-TR.</p>

<p align='justify'><b>DECIMO CUARTA.- Sistema de Gestión de la Seguridad y Salud en el Trabajo</b></p>
<p align='justify'>EL TRABAJADOR  se compromete a cumplir fielmente las disposiciones contenidas en el Reglamento Interno de Trabajo de EL EMPLEADOR; aprobado por Decreto Subdirectoral N° 1061-2011-GRA-GRTPE-SDRG y N° 1082- 2011-GRA-GRTPE-SDRG; del mismo modo  las reguladas por el Reglamento de Seguridad y Salud en el Trabajo de EL EMPLEADOR; de conformidad con lo establecido por el D.S. 005-2012-TR y demás normas modificatorias y complementarias y toda norma interna que disponga
EL EMPLEADOR para el resguardo y aseguramiento de la seguridad y salud en el trabajo; asumiendo las consecuencias de las transgresiones lo normado por éstas. Asimismo  EL TRABAJADOR declara haber recibido a la firma del presente, el
Reglamento de Seguridad y Salud en el Trabajo de EL EMPLEADOR y las recomendaciones en seguridad y salud en el trabajo; de conformidad con lo establecido por el Artículo 35 de la Ley N° 29783.</p>

<p align='justify'><b>DÉCIMO QUINTA .- Legislación aplicable.</b></p>
<p align='justify'>El presente contrato de trabajo se regirá por las estipulaciones que contiene y por el &quot;Texto Único Ordenado del Decreto Legislativo No. 728, Ley de Productividad y Competitividad Laboral”, aprobado por el Decreto Supremo No. 003-97-TR, y por su Reglamento, aprobado por el Decreto Supremo No. 001-96-TR.</p>

<p align='justify'>Extendido por triplicado en la Ciudad de Huaura el  día         de                       del              </p>

<p></p>



<p>Nombre:……………………….</p>

<p>DNI:……………………………..</p>



</body>

</html>
";
?>