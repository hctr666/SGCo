<div style="padding:20px;">
	<center>
		<h2>Seleccionar el tipo de Contrato</h2>
	</center>
	<div id="dial" style="padding:10px;">
		<form name="frmElegir">
			<table>
				<tr>
					<td>Indeterminado:</td>
                	<td>
                    	<input name="indt_cont" type="checkbox" id="indt_cont"/>
                	</td>
				</tr>
				<tr>
	                <td>Condicion:</td>
	                <td>
	                    <?php
		                    require_once('util/DataCombo.php');
	                        DataCombo::mostrar('codi_cond', $listaCondicion, 'codi_cond', 'desc_cond', '', '');
	                    ?>
	                </td>
				</tr>
				<tr><td></td><td></td></tr>
			</table>
			<br/>
			<center>
				<tr>
					<td><input type="button" name="btnenviar" id="btnenviar" value="Aceptar" onclick="validar(<?=$agr?>)"/></td>
					<td><input type="button" name="btncancelar" id="btncancelar" value="Cancelar" onclick="closeModal()"/></td>
				</tr>
			</center>
			<input type="hidden" name="agregando" id="agregando" value="<?=$agr?>">
			<input type="hidden" name="criterioBuscar" id="criterioBuscar" value="<?=$criterioBuscar?>">
		</form>
	</div>
</div>
<script>
	var indt_cont = false;
	$("#indt_cont").click(function(){
	    var el = $("#codi_cond");
	    if (el){
	        el.removeAttr("disabled");
	        if (this.checked){
	            el.attr("disabled", "disabled");
	            indt_cont = true;
	            //alert(indt_cont);   
	        } else {
	        	indt_cont = false;
	        	//alert(indt_cont);
	        }
	    }
	});

	function validar(agr){
		codi_cond = document.frmElegir.codi_cond.value;
		criterioBuscar = document.frmElegir.criterioBuscar.value;
		$("#areaTrabajo").load("util/preload2.php");
		$("#areaTrabajo").load("controller/contratoController.php?accion=nuevoContrato&codi_cond="
			+codi_cond+"&criterioBuscar="+criterioBuscar+"&agr="+agr+"&indt_cont="+indt_cont);
		closeModal();
		subir();
	}
</script>