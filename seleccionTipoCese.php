<div style="padding:20px;">
	<center>
		<h2>
            <?php 
                if ($tipo == 1) {
                    echo "Renuncia voluntaria";
                } else {
                    echo "Cese de Contrato";
                }
             ?>      
        </h2>
	</center>
	<div id="dial" style="padding:10px;">
		<form name="frmElegir">
			<table>
				<tr>
				    <td>Con EMO:</td>
                	<td>
                    	<input name="chk_emo" type="checkbox" id="chk_emo"/>
                	</td>
				</tr>
                <?php 
                    if ($tipo == 1) {
                        echo "<tr>";
                        echo "<td>Fecha Renuncia:</td>";
                        echo "<td><input type='text' id='fechRen' maxlength='10' name='fechRen'</td>";
                        echo "</tr>";
                    }
                 ?>
                <tr>
                    <td>Fecha Examen:</td>
                    <td><input type="text" id="fechEmo" maxlength="10" name="fechEmo"</td>
                </tr>
				<tr><td></td><td></td></tr>
			</table>
			<br/>
			<center>
				<tr>
					<td><input type="button" name="btnenviar" id="btnenviar" value="Aceptar" onclick="validar()"/></td>
					<td><input type="button" name="btncancelar" id="btncancelar" value="Cancelar" onclick="closeModal()"/></td>
				</tr>
			</center>

			<input type="hidden" name="criterioBuscar" id="criterioBuscar" value="<?=$criterioBuscar?>">
			<input type="hidden" name="codi_trab" id="codi_trab" value="<?=$codi_trab?>">
			<input type="hidden" name="codi_contr" id="codi_contr" value="<?=$codi_contr?>">
            <input type="hidden" name="tipo_" id="tipo_" value="<?=$tipo?>">
		</form>
	</div>
</div>
<script src="js/DatePicker.js"></script>
<script>

	$(function() {
        $("#fechEmo").datepicker({
            changeMonth: true,
            changeYear: true
        });

        $("#fechRen").datepicker({
            changeMonth: true,
            changeYear: true
        });
    });

    var emo = "sin";
	$("#chk_emo").click(function(){
        if (this.checked){
            emo = "con";
            //alert(emo);   
        } else {
        	emo = "sin";
        	//alert(emo);
        }
	});

    function validar(){
        fechEmo = document.frmElegir.fechEmo.value;

        if (fechEmo.length == 0) {
            alert("Debe seleccionar una fecha para el examen");
            document.frmElegir.fechEmo.value;
            return;
        };

        subir();
        criterioBuscar = document.frmElegir.criterioBuscar.value;
        codi_contr = document.frmElegir.codi_contr.value;
        codi_trab = document.frmElegir.codi_trab.value;
        tipo = document.frmElegir.tipo_.value;
        //alert(codi_contr + " - " + codi_trab);

        if (tipo == 1) {
            fechRen = document.frmElegir.fechRen.value
            
            if (fechRen.length == 0) {
                alert("Debe ingresar la fecha de Renuncia");
                document.frmElegir.fechRen.focus();
                return;
            }

            var actionPath = "controller/contratoController.php?accion=cesarContrato&codi_contr="+codi_contr+
                         "&codi_trab="+codi_trab+"&emo="+emo+"&fechEmo="+fechEmo+"&tipo="+tipo+"&fechRen="+fechRen;
            var opciones = "toolbar=0, menubar=0,scrollbars=1,width=600,height=400,left=10, top=10,titlebar=no,resizable=1";
        } else {
            var actionPath = "controller/contratoController.php?accion=cesarContrato&codi_contr="+codi_contr+
                             "&codi_trab="+codi_trab+"&emo="+emo+"&fechEmo="+fechEmo+"&tipo="+tipo;
            var opciones = "toolbar=0, menubar=0,scrollbars=1,width=600,height=400,left=10, top=10,titlebar=no,resizable=1";
        }

        closeModal();
        window.open(actionPath, '', opciones);
    }
</script>