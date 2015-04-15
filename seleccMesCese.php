<center>
	<div>
	<h1>Contratos por culminar</h1>
		<table>
			<tr>
				<td>Contratos que cesan el mes de </td>
				<td>
			 		<select id="cmbMes" name="cmbMes">
						<?php 
                        	echo "<option>seleccionar</option>";
							for ($i=0; $i < sizeof($meses); $i++) { 
								echo "<option>$meses[$i]</option>";
							}
						 ?>
					</select>
				</td>
			</tr>
		</table>
	</div>
</center>
<script type="text/javascript">
	$(function(){
        $(document).on('change','#cmbMes', function(e){
            mes = this.options[e.target.selectedIndex].text;
            $("#area2").load("util/preload2.php");
            $("#area2").load("controller/contratoController.php?accion=mostrarContratosPorMes&mes=" + mes);
        });
    });
</script>