<?php if (isset($_SESSION['codi_usua'])): ?>
<!--Modal para datos del practicante-->
<div id="boxes" style="padding:30px;">
	<center>
		<h2>
		<?php 
            if ($agregando <> 1) {
                echo "EDITAR DATOS DEL PRACTICANTE";
            } else {
                echo "AGREGAR DATOS DEL PRACTICANTE";
            }
         ?>	
		</h2>
	</center>
    <div id="dialog" style="padding:10px">
        <form name="frmpracticas">
            <table>
            	<tr>
                	<td>Situación:</td>
                	<td><input type="text" size="40px" name="txtsit" id="txtsit" 
                		value="<?php 
	                				if ($agregando <> 1) {
	                               		echo $registro->situ_prac;
	                           		}
                			 	?>" >
                	</td>
            	</tr>
            	<tr>
                	<td>Centro de formación prof.:</td>
                	<td>
                		<?php
                    		require_once('util/DataCombo.php');
                    		if ($agregando <> 1)
                        		DataCombo::mostrar('codi_cfp', $listaCfprof, 'codi_cfp', 'desc_cfp', $registro->codi_cfp, '');
                    		else
                        		DataCombo::mostrar('codi_cfp', $listaCfprof, 'codi_cfp', 'desc_cfp', '', '');
                    	?>
                	</td>
            	</tr>
            	<tr>
                	<td>Ocupación mat. capacitación:</td>
                	<td><input type="text" size="40" name="txtcmcap" id="txtcmcap" 
                		value="<?php 
                					if ($agregando <> 1) {
                						echo $registro->mcap_prac;
                					}
                				 ?>" />
                	</td>
            	</tr>
            	<tr>
                	<td>Profesión o Especialidad:</td>
                	<td><input type="text" size="40px" name="txtprof" id="txtprof" 
                		value="<?php 
                					if ($agregando <> 1) {
                						echo $registro->esp_prac;
                					}
                				 ?>" />
                	</td>
            	</tr>
            </table>
        	<br/>
        	<center>
        		<table>
        			<tr>
	        			<?php 
		                    if ($agregando <> 1)
	                        	echo "<td><input type='button' value='Guardar cambios ' onclick='grabarDatos(0, $registro->codi_contr)' /></td>";
	                    	else
	                        	echo "<td><input type='button' value='Guardar' onclick='grabarDatos(1)' /></td>";
	                    ?>
            			<td><input type="button" value="Cancelar" onclick="closeModal()"></td>
        			</tr>
        		</table>
        	</center>
        	<input type="hidden" name="codi_cond" id="codi_cond" value="<?=$codi_cond?>">
        </form>
    </div>
</div>
<script type="text/javascript">

	function grabarDatos(agregando, id){

		//recuperando data de los campos
        codi_cond = encodeURIComponent(document.frmpracticas.codi_cond.value);
		txtsit = encodeURIComponent(document.frmpracticas.txtsit.value);
		txtprof = encodeURIComponent(document.frmpracticas.txtprof.value);
		txtcmcap = encodeURIComponent(document.frmpracticas.txtcmcap.value);
		txtcfp = encodeURIComponent(document.frmpracticas.codi_cfp.value);

		if (txtsit.length == 0) {
			alert("Debe ingresar la Situación actual del practicante");
			document.frmpracticas.txtsit.focus();
			return;
		};

		if (txtprof.length == 0) {
			alert("Debe ingresar la la Profesión o Especialidad");
			document.frmpracticas.txtprof.focus();
			return;
		};

		if (txtcmcap.length == 0) {
			alert("Debe ingresar la materia de capacitación del practicante");
			document.frmpracticas.txtcmcap.focus();
			return;
		};

		if (txtcfp.length == 0 && codi_cond == '09') {
			alert("Debe ingresar el Centro de formación Profesional");
			document.frmpracticas.txtcfp.focus();
			return;
		};		

		if (agregando == 1) {
			$("#area2").load("controller/contratoController.php?accion=grabar_nuevo&criterioBuscar="+nombre+
			  				 "&codi_contr="+codi_contr+"&codi_trab="+codi_trab+"&nombre="+nombre+
			  				 "&codi_tipo="+codi_tipo+"&codi_carg="+codi_carg+"&codi_cond="+codi_cond+
			  				 "&fech_inic="+fech_inic+"&fech_fin="+fech_fin+"&indt_cont="+indt_cont+
			  				 "&mont_cont="+mont_cont+"&situ_prac="+txtsit+"&esp_prac="+txtprof+
			  				 "&mcap_prac="+txtcmcap+"&codi_cfp="+txtcfp);
			   
	    	$("#areaTrabajo").load("controller/menuOpcionesController.php?accion=contratos&val=0");
	    	closeModal();
		} else {
			$("#area2").load("controller/contratoController.php?accion=grabar_editar&criterioBuscar="+nombre+
			  				 "&codi_contr="+codi_contr+"&codi_trab="+codi_trab+"&nombre="+nombre+
			  				 "&codi_tipo="+codi_tipo+"&codi_carg="+codi_carg+"&codi_cond="+codi_cond+
			  				 "&fech_inic="+fech_inic+"&fech_fin="+fech_fin+"&indt_cont="+indt_cont+
			  				 "&mont_cont="+mont_cont+"&situ_prac="+txtsit+"&esp_prac="+txtprof+
			  				 "&mcap_prac="+txtcmcap+"&codi_cfp="+txtcfp);
	    	$("#areaTrabajo").load("controller/menuOpcionesController.php?accion=contratos&val=0");
			closeModal();
		}
	}
</script>
<?php else: ?>
     <?php header("Location: http://192.168.1.4/contratos/"); ?>
<?php endif ?>