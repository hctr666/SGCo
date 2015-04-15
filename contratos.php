<?php
    #session_start();
    if (isset($_SESSION['codi_usua'])):
?>
<div style="float:right;"><input type='button' name='btnNuevo' onclick='nuevoContrato()' value='Nuevo Contrato'/></div>
<br>
<center>
    <?php 
        if (isset($criterioBuscar) && $criterioBuscar != "") {
            echo "<h3>Listado de Contratos de Trabajadores que empiecen con '$criterioBuscar'</h3>";
        } else {
            echo "<h3>Listado de Contratos</h3>";
        }
     ?>
    <h4><?php echo "Total: " . count($listacontratos) . " registros"; ?></h4>
        <!--<h3>Listado de Contratos:</h3>-->
        <form name=frmBuscar>
            <table class="ismtable">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>                        
                    <th>Tipo</th>            
                    <th>Cargo</th>
                    <th>Condicion</th>
                    <th>Inicio</th>
                    <th>Fin</th>            
                    <!--<th Indt.</th>-->           
                    <th>Monto</th>                                    
                    <th>Editar</th>
                    <th>Cese</th>
                    <th>Renuncia</th>
                    <th>Imprimir</th>
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
                            #echo "<td  ALIGN='CENTER' >Si</td>";
                        }
                        else{
                            echo "<td>$fechaFin</td>";
                            #echo "<td  ALIGN='CENTER'>No</td>";
                        }
                        
                        echo "<td>$contrato->mont_cont</td>";
                        //echo "<td>$fecha</td>";            
                        echo "<td align=center><input type='button' name='s' onclick=editContrato('$contrato->codi_contr','$contrato->codi_trab','$contrato->codi_cond',$contrato->indt_cont) /></td>";
                        
                        if ($contrato->indt_cont == 0) {
                            echo "<td align=center><input disabled='true' type='button' name='i' onclick=ceseContrato(0,'$contrato->codi_contr','$contrato->codi_trab')></td>";
                            echo "<td align=center><input type='button' name='i' onclick=ceseContrato(1,'$contrato->codi_contr','$contrato->codi_trab') /></td>";
                            echo "<td align=center><input disabled='true' type='button' name='i' onclick=impriContrato('$contrato->codi_contr','$contrato->codi_trab') /></td>";
                        } else {
                            echo "<td align=center><input type='button' name='i' onclick=ceseContrato(0,'$contrato->codi_contr','$contrato->codi_trab')></td>";
                            echo "<td align=center><input type='button' name='i' onclick=ceseContrato(1,'$contrato->codi_contr','$contrato->codi_trab')></td>";
                            echo "<td align=center><input type='button' name='i' onclick=impriContrato('$contrato->codi_contr','$contrato->codi_trab') /></td>";
                        }
                        echo "</tr>";
                    }
                }
                ?>
            <tbody>
            </table><br/>    

            <input type='hidden' name='criterioBuscar'  value='<?=$criterioBuscar;?>' />
            <?php
            if (count($listacontratos) == 0) {
                echo "<font color='red'>No existen contratos para el trabajador seleccionado</font>";
            }
            ?>
            <br/>    
            <input type='button' name='btnNuevo' onclick='nuevoContrato()' value='Nuevo Contrato'/>
            <input type='button' name='btnBuscar' onclick='buscarContrato()' value='Nueva Busqueda'/>
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
    
    function editContrato(codi_contr,codi_trab,codi_cond,indt_cont){
        //criterioBuscar = document.frmBuscar.criterioBuscar.value;
        $("#areaTrabajo").load("util/preload2.php");
        $("#areaTrabajo").load("controller/contratoController.php?accion=editarContrato&codi_contr="+
            codi_contr+"&codi_trab="+codi_trab+"&criterioBuscar="+
            criterioBuscar+"&codi_cond="+codi_cond+"&indt_cont="+indt_cont);
        subir();
    }

    function ceseContrato(b,codi_contr, codi_trab){
        if (b == 1) {
            creaModal(400,240);
        } else {
            creaModal(400,200);
        }

        criterio = document.frmBuscar.criterioBuscar.value;
        $("#bgmodal").load("controller/contratoController.php?accion=seleccionadorCese&codi_contr="+
            codi_contr+"&codi_trab="+codi_trab+"&tipo="+b);
    }

    function i(id) {
        subir();
        //criterioBuscar = document.frmBuscar.criterioBuscar.value;   
        //$("#areaTrabajo").load("controller/trabajadorController.php?accion=editar&id="+id+"&criterioBuscar="+criterioBuscar);
        var actionPath = "controller/trabajadorController.php?accion=imprimir&id="+id;
        var opciones = "toolbar=0, menubar=0,scrollbars=1,width=600,height=400,left=10, top=10,titlebar=no,resizable=1"
        window.open(actionPath, '', opciones);    
    }
    
    function nuevoContrato(){   
        //criterioBuscar = document.frmBuscar.criterioBuscar.value;    
        //$("#areaTrabajo").load("controller/contratoController.php?accion=nuevo&criterioBuscar="+criterioBuscar);
        subir();
        agregando = 0;
        cargaSeleccionador(650,200,0);
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
        //alert('Usted no esta autorizado para usar esta funcion');
        criterio = document.frmBuscar.criterioBuscar.value;
    }

    function cargaSeleccionador(w,h,agr){
        creaModal(w,h);
        criterio = document.frmBuscar.criterioBuscar.value;
        $("#bgmodal").load("controller/contratoController.php?accion=seleccionador&agr="+agr+"&criterioBuscar="+criterio);
    }

    function closeModal(){
        $('#bgmodal').remove();
        $('#bgtransparent').remove();
    }
    
    function eliminar(){
        alert('Usted no puede utilizar esta opci¨®n');
    }  
    
    function buscarContrato()
    {
        $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=contratos&val=0");
        subir();
        //document.body.scrollTop = document.documentElement.scrollTop = 0;
    }

    function impriContrato(id, idtrab){
        subir();
        criterioBuscar = document.frmBuscar.criterioBuscar.value;    
        var actionPath = "controller/contratoController.php?accion=imprimirContrato&id="+id+"&idtrab="+idtrab;
        var opciones = "toolbar=0, menubar=0,scrollbars=1,width=600,height=400,left=10, top=10,titlebar=no,resizable=1"
        window.open(actionPath, '', opciones);    
    }
</script>
<?php else: ?>
     <?php header("Location: http://localhost/contratos-ism/"); ?>
<?php endif ?>