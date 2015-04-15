<?php if (isset($_SESSION['codi_usua'])): ?>
<center>
    <h1>
        <?php 
            if ($agr <> 0) {
                echo "EDITAR CONTRATO INDETERMINADO";
                #echo $indt_cont;
            } else {
                echo "AGREGAR CONTRATO INDETERMINADO";
            }
         ?>
    </h1>    
    <form name="frmEditar">
        <table>
            <tr>
                <td>Nombre</td>
                <td><input type="text" size="40" name="nombre" id="txtNombre" 
                value="<?php
                            if ($agr <> 0) {
                                echo $contratoreg->nombre;
                            }
                       ?>" readonly>
            <input type='button' name='buscarTrabajador' onclick='cargarBuscadorTrabajador()' value='...'/></td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>Area:</td>
                <td>
                    <?php
                    require_once('util/DataCombo.php');
                    if ($agr <> 0)
                        DataCombo::mostrar('codi_area', $listaArea, 'codi_area', 'desc_area', $contratoreg->codi_area, '');
                    else
                        DataCombo::mostrar('codi_area', $listaArea, 'codi_area', 'desc_area', '', '');
                    ?>
                </td>
            </tr>
            <tr>
                <td>Tipo:</td>
                <td>
                    <?php
                    require_once('util/DataCombo.php');
                    if ($agr <> 0)
                        DataCombo::mostrar('codi_tipo', $listaTipo, 'codi_tipo', 'desc_tipo', $contratoreg->codi_tipo, 'actu()');
                    else
                        DataCombo::mostrar('codi_tipo', $listaTipo, 'codi_tipo', 'desc_tipo', '', 'actu()');
                    ?>
                </td>
            </tr>   
            <tr>
                <td>Cargo:</td>
                <td><div id=comboCargo>
                        <?php
	                        require_once('util/DataCombo.php');
	                        if ($agr <> 0)
	                            DataCombo::mostrar('codi_carg', $listaCargo, 'codi_carg', 'desc_carg', $contratoreg->codi_carg, '');
	                        else
	                            DataCombo::mostrar('codi_carg', $listaCargo, 'codi_carg', 'desc_carg', '', '');
                        ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Fecha Inic:</td>
                <td><input type="text" id="fech_inic" maxlength="10" name="fech_inic" value="<?php
                    if ($agr <> 0) {
                        $fecha = date('d/m/Y', strtotime($contratoreg->fech_inic));
                        echo $fecha;
                    }
                    ?>"></td>
            </tr>
            <tr>
                <td>Refrigerio(minutos):</td>
                <td>
                    <input name="ref_cont" type="text" id="ref_cont" maxlength="3" size="5" value="<?php
                           if ($agr <> 0) {
                               echo $contratoreg->ref_cont;
                           }
                    ?>" />
                </td>
                <td><td/>
            </tr>
            <tr>
                <td>Monto</td>
                <td><input type="text"   maxlength="10" name="mont_cont" value="<?php
                           if ($agr <> 0) {
                               echo $contratoreg->mont_cont;
                           }
                    ?>"></td>
            </tr>
            <tr>
                <td>
                    <input type='hidden' name='criterioBuscar' value='<?=$criterioBuscar?>' />
                    <input type='hidden' name='agregando' value='<?=$agr?>' />                    
                    <input type='hidden' name='codi_contr' value='<?=$codi_contr?>' />                    
                    <input type='hidden' name='codi_trab' value='<?=$codi_trab?>' />                    
                    <input type='hidden' name='nombre' value='<?=$contrato->nombre?>' />
					<input type='hidden' name='codi_cond' value='<?=$codi_cond?>' />
					<input type='hidden' name='indt_cont' value='<?=$indt_cont?>' />
                </td>
            </tr>
        </table>
        <table>
        	<tr>
        		<td>
                    <?php
                    if ($agr <> 0)
                        echo "<input type='button' name='grabar' id='btngrabar' onclick='validarContrato(1,$contrato->codi_trab, $contrato->codi_contr);' value='Guardar cambios'/>";
                    else
                        echo "<input type='button' name='grabar' id='btngrabar' onclick='validarContrato(0);' value='Grabar Contrato'/>";
                    ?>
                </td>
                <td>
                    <input type='button' name='cancelar' onclick='c();' value='Cancelar Operación'/>
                </td>
        	</tr>
        </table>
        </div>
    </form>
</center>
<script src="js/DatePicker.js"></script>

<script>
 

    $(function() {
        $("#fech_inic").datepicker({
            changeMonth: true,
            changeYear: true
        });
    });

    function actu()
    {
        agregando= document.frmEditar.agregando.value;
        if(agregando=='')
            agregando=0;
        codi_tipo= document.frmEditar.codi_tipo.value;
        $("#comboCargo").load("controller/menuOpcionesController.php?accion=comboCargos&codi_tipo="+codi_tipo+"&agregando="+agregando);
    }
    function c(){
        criterioBuscar=encodeURIComponent(document.forms[0].criterioBuscar.value);
        //$("#areaTrabajo").load("controller/contratoController.php?accion=buscar&criterioBuscar="+criterioBuscar);
        $("#area2").load("controller/contratoController.php?accion=mostrarContratos&criterioBuscar="+criterioBuscar);
        $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=contratos&val=0");
    }

    function validarContrato(agregando,id, idcontr) {
        idnombre= document.getElementById("txtNombre");
        nombre=encodeURIComponent(idnombre.value);

        codi_trab= encodeURIComponent(document.frmEditar.codi_trab.value);        
        indt_cont= encodeURIComponent(document.frmEditar.indt_cont.value);       
        
        codi_contr= encodeURIComponent(document.frmEditar.codi_contr.value);
        codi_tipo = encodeURIComponent(document.frmEditar.codi_tipo.value);
        codi_carg = encodeURIComponent(document.frmEditar.codi_carg.value);
        codi_cond = encodeURIComponent(document.frmEditar.codi_cond.value);
        fech_inic=encodeURIComponent(document.frmEditar.fech_inic.value);
        mont_cont=encodeURIComponent(document.frmEditar.mont_cont.value);

        codi_area = encodeURIComponent(document.frmEditar.codi_area.value);
        ref_cont = encodeURIComponent(document.frmEditar.ref_cont.value);
        criterioBuscar=encodeURIComponent(document.frmEditar.criterioBuscar.value);
        
        if (codi_trab.length == 0) {
            alert("Debes seleccionar un trabajador");
            document.frmEditar.buscarTrabajador.focus();
            return;
        }   

        if (codi_tipo.length == 0) {
            alert("Debes ingresar Tipo");
            document.frmEditar.codi_tipo.focus();
            return;
        }      

        if (codi_carg.length == 0) {
            alert("Debes ingresar Cargo");
            document.frmEditar.codi_carg.focus();
            return;
        }
        
        if (fech_inic.length == 0) {
            alert("Debes ingresar Fecha Inicio");
            document.frmEditar.fech_inic.focus();
            return;
        }

        if (mont_cont.length == 0) {
            alert("Debes ingresar Monto");
            document.frmEditar.mont_cont.focus();
            return;
        }

        if(agregando == 1){            
            //alert(codi_tipo +" - "+ codi_carg+" - "+codi_cond+ " - " +fech_inic+" - "+fech_fin+" - "+indt_cont+" - "+ mont_cont);
            $("#area2").load("controller/contratoController.php?accion=grabar_editar&criterioBuscar="+
            				nombre+"&codi_contr="+codi_contr+"&codi_trab="+codi_trab+"&nombre="+nombre+
            				"&codi_tipo="+codi_tipo+"&codi_carg="+codi_carg+"&codi_cond="+codi_cond+
            				"&fech_inic="+fech_inic+"&indt_cont="+indt_cont+
            				"&mont_cont="+mont_cont+"&codi_area="+codi_area+"&ref_cont="+ref_cont);
            $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=contratos&val=0");
        } else {
            $("#area2").load("controller/contratoController.php?accion=grabar_nuevo&criterioBuscar="+
            				nombre+"&codi_contr="+codi_contr+"&codi_trab="+codi_trab+"&nombre="+nombre+
            				"&codi_tipo="+codi_tipo+"&codi_carg="+codi_carg+"&codi_cond="+codi_cond+
            				"&fech_inic="+fech_inic+"&indt_cont="+indt_cont+
            				"&mont_cont="+mont_cont+"&codi_area="+codi_area+"&ref_cont="+ref_cont);   
            $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=contratos&val=0");
        }
    }
 
    function cargarBuscadorTrabajador(){
        //var contenidoHTML = '<h1>Ventana Modal Basica</h1><p>Un ventana modal con la configuracion basica necesaria para su practico funcionamiento. Bastara con especificar el contenido a mostrar (en formato de marcas HTML) y las dimensiones de la ventana: ancho y alto. Mejoras mas adelante por ahora eso es todo amigos!</p><p><a href=\'http://www.ribosomatic.com/\'>Mas detalles...</a></p><center><button onclick=\"closeModal()\">Cerrar</button></center>';
        var ancho = 700; 
        var alto = 350;
        
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
        
        // definiendo tamaño del contenedor
        $('#bgmodal').css("width", ancho+'px');
        $('#bgmodal').css("height", alto+'px');
        
        // obtiendo tamaño de contenedor
        var wcnt = $('#bgmodal').width();
        var hcnt = $('#bgmodal').height();
        
        // obtener posicion central
        var mleft = ( wscr - wcnt ) / 2;
        var mtop = ( hscr - hcnt ) / 2;
        
        // estableciendo posicion
        $('#bgmodal').css("left", mleft+'px');
        $('#bgmodal').css("top", mtop+'px');
        //alert('Usted no esta autorizado para usar esta funcion');

        $("#bgmodal").load("controller/menuOpcionesController.php?accion=trabajador&val=0&buscar=si&criterioBuscar=''");
    }

    function cargarPracticanteData(agregando, id, idcontr){
        //var contenidoHTML = '<h1>Ventana Modal Basica</h1><p>Un ventana modal con la configuracion basica necesaria para su practico funcionamiento. Bastara con especificar el contenido a mostrar (en formato de marcas HTML) y las dimensiones de la ventana: ancho y alto. Mejoras mas adelante por ahora eso es todo amigos!</p><p><a href=\'http://www.ribosomatic.com/\'>Mas detalles...</a></p><center><button onclick=\"closeModal()\">Cerrar</button></center>';
        var ancho = 600; 
        var alto = 300;
        
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
        
        // definiendo tamaño del contenedor
        $('#bgmodal').css("width", ancho+'px');
        $('#bgmodal').css("height", alto+'px');
        
        // obtiendo tamaño de contenedor
        var wcnt = $('#bgmodal').width();
        var hcnt = $('#bgmodal').height();
        
        // obtener posicion central
        var mleft = ( wscr - wcnt ) / 2;
        var mtop = ( hscr - hcnt ) / 2;
        
        // estableciendo posicion
        $('#bgmodal').css("left", mleft+'px');
        $('#bgmodal').css("top", mtop+'px');
        //alert('Usted no esta autorizado para usar esta funcion');

        if (agregando == 1) {
           $("#bgmodal").load("controller/contratoController.php?accion=practicanteData&agregando="+agregando+"&codi_trab="+id+"&codi_contr="+idcontr+"&codi_cond="+codi_cond);
        } else {
            $("#bgmodal").load("controller/contratoController.php?accion=practicanteDataEdt&agregando="+agregando+"&codi_trab="+id+"&codi_contr="+idcontr+"&codi_cond="+codi_cond);
        }
    }

    function closeModal(){
        $('#bgmodal').remove();
        $('#bgtransparent').remove();
    }
</script>
<?php else: ?>
     <?php header("Location: http://192.168.1.4/contratos/index.php"); ?>
<?php endif ?>