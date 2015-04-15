<?php if (isset($_SESSION['codi_usua'])): ?>
<center>
	<h1>
		<?php 
			if ($val == 0) {
				echo "Editar Centro de Formación Profesional";
			} else {
				echo "Agregar Centro de Formación Profesional";
			}
		 ?>
	</h1>
	<div>
		<form name="frmEditar"> 
			<table>
				<tr>
					<td><label>Descripción</label></td>
					<td><input type="text" id="txtdesc" name="txtdesc" size="50" value="<?php if ($val == 0) {echo $registro->desc_cfp;} ?>" /></td>
				</tr>
				<tr>
					<td><label>RUC</label></td>
					<td><input type="text" id="txtruc" name="txtruc" size="13" maxlength="13" value="<?php if ($val == 0) {echo $registro->ruc_cfp;} ?>" /></td>
				</tr>
				<tr>
					<td><label>Dirección</label></td>
					<td><input type="text" id="txtdire" name="txtdire" size="50" value="<?php if ($val == 0) {echo $registro->dir_cfp;} ?>" /></td>
				</tr>
				<tr>
					<td><label>Representante</label></td>
					<td><input type="text" id="txtrep" name="txtrep" size="50" value="<?php if ($val == 0) {echo $registro->rep_cfp;} ?>" /></td>
				</tr>
			</table>
			<table>
				<tr>
					<td><input type="button" value="Grabar datos" onclick="validar(<?=$val?>)"></td>
					<td><input type="button" value="Cancelar" onclick="cancelar()"></td>
				</tr>
			</table>
			<input type="hidden" id="codi_cfp" name="codi_cfp" value="<?php if ($val == 0) {echo $codi_cfp;} ?>">
		</form>
	</div>
</center>
<script type="text/javascript">
	$(function(){
		$("#txtdesc").focus();
	});

	function validar(value) {

		desc_cfp = encodeURIComponent($("#txtdesc").val());
		ruc_cfp = encodeURIComponent($("#txtruc").val());
		dir_cfp = encodeURIComponent($("#txtdire").val());
		rep_cfp = encodeURIComponent($("#txtrep").val());

		if (desc_cfp.length == 0) {
			alert("Debe ingresar el nombre de la institución");
			$("#txtdesc").focus();
			return;
		}

		if (ruc_cfp.length == 0) {
			alert("Debe ingresar el RUC");
			$("#txtruc").focus();
			return;			
		}

		if (dir_cfp.length == 0) {
			alert("Debe ingresar la drección");
			$("#txtdire").focus();
			return;
		}

		if (rep_cfp.length == 0) {
			alert("Debe ingresar el representante de la institución");
			$("#txtrep").focus();
			return;
		}

		if (value == 0) {
			codi_cfp = encodeURIComponent($("#codi_cfp").val());
			$("#areaTrabajo").load(" ");
			$("#area2").load("controller/cfpProfesionalController.php?accion=edit_save&codi_cfp="+codi_cfp+"&desc_cfp="+desc_cfp+
								   "&ruc_cfp="+ruc_cfp+"&dir_cfp="+dir_cfp+"&rep_cfp="+rep_cfp);			
		} else {
			$("#areaTrabajo").load(" ");
			$("#area2").load("controller/cfpProfesionalController.php?accion=new_save&desc_cfp="+desc_cfp+"&ruc_cfp="+ruc_cfp+
								   "&dir_cfp="+dir_cfp+"&rep_cfp="+rep_cfp);			
		}
	}

	function cancelar(){
		$("#areaTrabajo").load(" ");
	}
</script>
<?php else: ?>
     <?php header("Location: http://192.168.1.4/contratos/index.php"); ?>
<?php endif ?>