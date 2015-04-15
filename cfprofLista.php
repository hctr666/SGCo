<?php if (isset($_SESSION['codi_usua'])): ?>
<center>
	<div>
		<table>
			<tr><td><input type="button" value="Nuevo Centro de formación" onclick="nuevoCentro(1)" /></td></tr>
		</table>
		<h3>Listado de Centros de Formación Profesional</h3>
		<br/>
		<table class="ismtable">
			<thead>
				<th>Codigo</th>
				<th>Descripción</th>
				<th>RUC</th>
				<th>Dirección</th>
				<th>Representante</th>
				<th>Editar</th>
			</thead>
			<tbody>
			<?php 
				if (count($regcfprof > 0)) {
					foreach ($regcfprof as $registro) {
						echo "<tr>";
						echo "<td>$registro->codi_cfp</td>";
						echo "<td>$registro->desc_cfp</td>";
						echo "<td>$registro->ruc_cfp</td>";
						echo "<td>$registro->dir_cfp</td>";
						echo "<td>$registro->rep_cfp</td>";
						echo "<td><input type='button' onclick='editar($registro->codi_cfp, 0)'></td>";
						echo "</tr>";
					}
				}
			 ?>
			</tbody>
		</table>
	</div>
</center>
<script type="text/javascript">
	function editar (codi_cfp, val) {
		$("#areaTrabajo").load("controller/cfpProfesionalController.php?accion=edit&"+"val="+val+"&codi_cfp="+codi_cfp);
		//alert(codi_cfp);
	}

	function nuevoCentro(val) {
		$("#areaTrabajo").load("controller/cfpProfesionalController.php?accion=new&val="+val);
		//alert(codi_cfp);
	}
</script>
<?php else: ?>
     <?php header("Location: http://192.168.1.4/contratos/index.php"); ?>
<?php endif ?>