<?php //if (isset($_SESSION['codi_usua'])): ?>
<div style="padding:20px;">
	<center>
		<h2>Datos de la Carta de presentación</h2>
	</center>
	<div id="dial" style="padding:10px;">
		<form name="frmCarta">
			<table>
				<tr>
					<td>Nombres:</td>
                	<td>
                    	<input name="txtnom" type="text" id="txtnom"/>
                	</td>
				</tr>
				<tr>
					<td>Apellidos:</td>
                	<td>
                    	<input name="txtapel" type="text" id="txtapel"/>
                	</td>
				</tr>
				<tr>
					<td>Especialidad técnica:</td>
                	<td>
                    	<input name="txtesp" type="text" id="txtesp"/>
                	</td>
				</tr>
				<tr><td></td><td></td></tr>
			</table>
			<br/>
			<center>
				<tr>
					<td><input type="button" name="btnenviar" id="btnenviar" value="Imprimir" onclick="validar()"/></td>
					<td><input type="button" name="btncancelar" id="btncancelar" value="Cancelar" onclick="closeModal()"/></td>
				</tr>
			</center>
		</form>
	</div>
</div>
<script>

	function validar(){
		txtnom = document.frmCarta.txtnom.value;
		txtapel = document.frmCarta.txtapel.value;
		txtesp = document.frmCarta.txtesp.value;

		if (txtnom.length == 0) {
			alert("Debe ingresar los nombres del estudiante");
			document.frmCarta.txtnom.focus();
			return;
		}

		if (txtapel.length == 0) {
			alert("Debe ingresar los Apellidos del estudiante");
			document.frmCarta.txtapel.focus();
			return;			
		}

		if (txtesp.length == 0) {
			alert("Debe indicar la especialidad del estudiante");
			document.frmCarta.txtesp.focus();
			return;
		}

		subir();
        var actionPath = "controller/contratoController.php?accion=imprimirCartaSenati&nom="+txtnom+"&apel="+txtapel+
        				 "&esp="+txtesp;
        var opciones = "toolbar=0, menubar=0,scrollbars=1,width=600,height=400,left=10, top=10,titlebar=no,resizable=1"
        window.open(actionPath, '', opciones); 
        closeModal();
	}

</script>
<?php //else: ?>
     <?php //header("Location: http://localhost/contratos-ism/"); ?>
<?php //endif ?>