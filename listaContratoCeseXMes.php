<?php if (isset($_SESSION['codi_usua'])): ?>
<center>
    <!--<font color="#1d537f"><h1>Gestión de Contratos</h1></font>-->
    <h3>Listado de Contratos que cesan el mes de <?php echo $mes; ?> </h3>
    <h4><?php echo "Total: " . count($listacontratos) . " contratos"; ?></h4>
        <br>
        <span style='margin:5px;'>
            <a href="#" style="text-decoration:none;" onclick="imprimir()"><img src="img/print.ico" style="width:1.8%; margin-right:5px;">
                <span>Imprimir</span>
            </a>
        </span>
    <br></br>
    <!--<font color="#1d537f"><h1>Gestión de Contratos</h1></font>-->
	<h3>Listado de Contratos que cesan el mes de <?php echo $mes; ?> </h3>
        <!--<h3>Listado de Contratos:</h3>-->
        <form name=frmBuscar>
            <table class="ismtable">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>                        
                    <th>Tipo</th>            
                    <th>Cargo</th>
                    <th>Condición</th>
                    <th>Inicio</th>
                    <th>Fin</th>            
                    <th>Monto</th>                                    
                    <th>Cese</th>
                    <th>Renuncia</th>
                </tr>
            </thead>
            <tbody>     
                <?php
                if (count($listacontratos) > 0) {
                    foreach ($listacontratos as $contrato) {
                        $fechaIni = date('d/m/Y', strtotime($contrato->fech_inic));
                        $fechaFin = date('d/m/Y', strtotime($contrato->fech_fin));
                        
                        echo "<tr>";
                        echo "<td>$contrato->codi_contr</td>";
                        echo "<td>$contrato->nombre</td>";
                        echo "<td>$contrato->desc_tipo</td>";
                        echo "<td>$contrato->desc_carg</td>";

                        if ($contrato->indt_cont==1) {
                            echo "<td>$contrato->desc_cond</td>";
                        } else {
                            echo "<td  ALIGN='CENTER'>-</td>";
                        }

                        echo "<td>$fechaIni</td>";                        
                        if($contrato->indt_cont==0){
                            echo "<td>Indeterminado</td>";
                        } else {
                        	echo "<td>$fechaFin</td>";
                        }
                        
                        echo "<td>$contrato->mont_cont</td>";
                        echo "<td align=center><input type='button' name='i' onclick=ceseContrato(0,'$contrato->codi_contr','$contrato->codi_trab')></td>";
                        echo "<td align=center><input type='button' name='i' onclick=ceseContrato(1,'$contrato->codi_contr','$contrato->codi_trab')></td>";
                        echo "</tr>";
                    }
                }
                ?>
            <tbody>
            </table><br/>    

            <?php
                if (count($listacontratos) == 0) {
                    echo "<font color='red'>No existen contratos que cesen en $mes</font>";
                }
            ?>
            <br/>    
        <input type="hidden" id="mes" name="mes" value="<?php echo $mes; ?>" />   
        </form>
    </div>
</center>
<script>

    $("#area2").load(function(){
        $(".spinner2").delay(1000).fadeOut('slow');
        $(".rect1").delay(1000).fadeOut('slow');
        $(".rect2").delay(1000).fadeOut('slow');
        $(".rect3").delay(1000).fadeOut('slow');
        $(".rect4").delay(1000).fadeOut('slow');
        $(".rect5").delay(1000).fadeOut('slow');
    });

    function ceseContrato(b,codi_contr, codi_trab){
        if (b == 1) {
            creaModal(400,240);
        } else {
            creaModal(400,200);
        }

        $("#bgmodal").load("controller/contratoController.php?accion=seleccionadorCese&codi_contr="+
            codi_contr+"&codi_trab="+codi_trab+"&tipo="+b);
    }

    function creaModal(w,h){
        var ancho = w; 
        var alto = h;       
        var bgdiv = $('<div>').attr({
            className: 'bgtransparent',
            id: 'bgtransparent'
        });

        bgdiv.css('position','fixed');
        bgdiv.css('left','0');
        bgdiv.css('top','0');
        bgdiv.css('background-color','#000');
        bgdiv.css('opacity','0.6');
        bgdiv.css('filter','alpha(opacity=60)');
        
        $('body').append(bgdiv);
        
        var wscr = $(window).width();
        var hscr = $(window).height();
                
        $('#bgtransparent').css("width", wscr);
        $('#bgtransparent').css("height", hscr);
               
        // ventana flotante
        var moddiv = $('<div>').attr({
            className: 'bgmodal',
            id: 'bgmodal'
        }); 
        
        moddiv.css('position','fixed');
        moddiv.css('border','0.05em solid black');
        moddiv.css('overflow','auto');
        moddiv.css('background-color','#fff');

        $('body').append(moddiv);
        //  $('#bgmodal').append(contenidoHTML);
        
        var wscr = $(window).width();
        var hscr = $(window).height();

        // estableciendo dimensiones de background
        $('#bgtransparent').css("width", wscr);
        $('#bgtransparent').css("height", hscr);
        
        // definiendo tama0Š9o del contenedor
        $('#bgmodal').css("width", ancho+'px');
        $('#bgmodal').css("height", alto+'px');
        
        // obtiendo tama0Š9o de contenedor
        var wcnt = $('#bgmodal').width();
        var hcnt = $('#bgmodal').height();
        
        // obtener posicion central
        var mleft = ( wscr - wcnt ) / 2;
        var mtop = ( hscr - hcnt ) / 2;
        
        // estableciendo posicion
        $('#bgmodal').css("left", mleft+'px');
        $('#bgmodal').css("top", mtop+'px');
    }

    function closeModal(){
        $('#bgmodal').remove();
        $('#bgtransparent').remove();
    }
    
    function eliminar(){
        alert('Usted no puede utilizar esta opción');
    }

    function imprimir() {
        //subir();
        //criterioBuscar = document.frmBuscar.criterioBuscar.value;
        mes = $("#mes").val();
        //alert(mes);
        var actionPath = "controller/contratoController.php?accion=impContratoCeseMesActual&mes="+mes;
        var opciones = "toolbar=0, menubar=0,scrollbars=1,width=600,height=400,left=10, top=10,titlebar=no,resizable=1"
        window.open(actionPath, '', opciones);        
    }
</script>
<?php else: ?>
     <?php header("Location: http://192.168.1.4/contratos/index.php"); ?>
<?php endif ?>