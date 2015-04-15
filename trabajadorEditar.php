<center>
    <H1>
        <?php 
            if ($agregando <> 1) {
                echo "EDITAR TRABAJADOR";
            } else {
                echo "AGREGAR TRABAJADOR";
            }
         ?>
    </H1>
    <form name="frmEditar">
        <table>
            <tr>
                <td>Ap. Paterno</td>
                <td><input type="text" maxlength="100" name="appa_trab" id="appa_trab" size="50" value="<?php
					if ($agregando <> 1) {
    					echo $registro->appa_trab;
					}
				?>"/>
				</td>
            </tr>   
            <tr>
                <td>Ap. Materno</td>
                <td><input type="text" maxlength="100" name="apma_trab" id="apma_trab" size="50" value="<?php
						if ($agregando <> 1) {
    						echo $registro->apma_trab;
						}
					?>">
				</td>
            </tr>   
            <tr>
                <td>Nombres</td>
                <td><input type="text" maxlength="100" name="nomb_trab" id="nomb_trab" size="50" value="<?php
						if ($agregando <> 1) {
    						echo $registro->nomb_trab;
						}
					?>">
                </td>
            </tr>
            <tr>
                <td>Sexo</td>
                <td>
                    <select id="cmbSex" name="cmbSex">
                        <?php 
                            if ($registro->sex_trab == 'M') {
                                echo "<option value='M'>Masculino</option>";
                                echo "<option value='F'>Femenino</option>";
                            } else {
                                echo "<option value='F'>Femenino</option>";
                                echo "<option value='M'>Masculino</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>  
            <tr>
                <td>Codigo SAP</td>
                <td><input type="text" maxlength="6" name="codi_sap" id="codi_sap" value="<?php
                        if ($agregando <> 1) {
                           echo $registro->codi_sap;
                        }
					?>"></td>
            </tr>
            <tr>
                <td>DNI</td>
                <td><input type="text" maxlength="8" name="nume_dni" id="nume_dni" value="<?php
                        if ($agregando <> 1) {
                           echo $registro->nume_dni;
                        }
					?>">
				</td>
            </tr>
            <tr>
                <td>Dirección</td>
                <td><input type="text" maxlength="100" name="dire_trab" size="50" id="dire_trab" value="<?php
                        if ($agregando <> 1) {
                           echo $registro->dire_trab;
                        }
					?>"/>
				</td>
            </tr>
        	<tr>
                <td>Departamento</td>
                <td>
                    <?php 
                        require_once('util/DataCombo.php');
                        if($agregando<>1) 
                            DataCombo::mostrar('codi_depa',$listaDepa, 'codi_depa', 'desc_depa', $registro->codi_depa,'actualizaProv()');
                        else
                            DataCombo::mostrar('codi_depa',$listaDepa, 'codi_depa', 'desc_depa', '','actualizaProv()');
                    ?>
                </td>
            </tr>
            <tr>
                <td>Provincia</td>
                <td>
	                <div id="cmbProv">
	                	<?php 
	                        require_once('util/DataCombo.php');
	                        if($agregando<>1) 
	                            DataCombo::mostrar('codi_prov',$listaProv, 'codi_prov', 'desc_prov', $registro->codi_prov,'actualizaDist()');
	                        else
	                            DataCombo::mostrar('codi_prov',$listaProv, 'codi_prov', 'desc_prov', '','actualizaDist()');
	                    ?>
	                </div>
                </td>
            </tr>
        	<tr>
                <td>Distrito</td>
                <td>
	                <div id="cmbDist">
	                    <?php 
	                        require_once('util/DataCombo.php');
	                        if($agregando<>1) 
	                            DataCombo::mostrar('codi_dist',$listaDist, 'codi_dist', 'desc_dist', $registro->codi_dist,'');
	                        else
	                            DataCombo::mostrar('codi_dist',$listaDist, 'codi_dist', 'desc_dist', '','');
	                    ?>
	                </div>	   
                </td>
            </tr>
            <tr>
                <td>Fecha Naci.</td>
                <td><input type="text"  id="datepicker" maxlength="10" name="fech_naci" id="fech_naci" value="<?php
                       if ($agregando <> 1) {
                           $fecha=date('d/m/Y' ,strtotime($registro->fech_naci));
                           echo $fecha;
                       }
					?>"/>
				</td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <?php
                        if ($agregando <> 1)
                            echo "<input type='button' name='grabar' onclick='validarUsuario(0,$registro->codi_trab);' value='Guardar Cambios'/>";
                        else
                            echo "<input type='button' name='grabar' onclick='validarUsuario(1);' value='Grabar Trabajador'/>";
                        ?>
                </td>
                <td>
                    <input type='button' name='cancelar' onclick='c();' value='Cancelar Operación'/>
                    <input type='hidden' name='criterioBuscar' value='<?=$criterioBuscar?>' />
                    <input type='hidden' name='buscar' value='<?=$buscar?>' />
                    <input type="hidden" name="agregando" value="<?=$agregando?>" />
                    <!--<input type='hidden' name='cod_prov' value='<?=$listaProv->codi_prov?>'>-->
                </td>
            </tr>
        </table>
    </form>
</center>
<script>
    $("#areaTrabajo").load(function(){
        $(".spinner2").delay(1000).fadeOut('slow');
        $(".rect1").delay(1000).fadeOut('slow');
        $(".rect2").delay(1000).fadeOut('slow');
        $(".rect3").delay(1000).fadeOut('slow');
        $(".rect4").delay(1000).fadeOut('slow');
        $(".rect5").delay(1000).fadeOut('slow');
    });

	$(document).ready(function(){
		$('#appa_trab').focus();
	});

    $(function() {
        $( "#datepicker" ).datepicker();
    });
    function c(){
        buscar=encodeURIComponent(document.forms[0].buscar.value);
        criterioBuscar=encodeURIComponent(document.forms[0].criterioBuscar.value);
        $("#area2").load("controller/trabajadorController.php?accion=buscar&criterioBuscar="+criterioBuscar+"&buscar="+buscar);
        $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=trabajador&val=0&buscar="+buscar);
    }
    function validarUsuario(agregando,id) {
        appa_trab = encodeURIComponent(document.forms[0].appa_trab.value);
        apma_trab = encodeURIComponent(document.forms[0].apma_trab.value);
        nomb_trab = encodeURIComponent(document.forms[0].nomb_trab.value);
        codi_sap = encodeURIComponent(document.forms[0].codi_sap.value);
        nume_dni = encodeURIComponent(document.forms[0].nume_dni.value);
        dire_trab = encodeURIComponent(document.forms[0].dire_trab.value);
        codi_dist = encodeURIComponent(document.forms[0].codi_dist.value);
        codi_prov = encodeURIComponent(document.forms[0].codi_prov.value);
        codi_depa = encodeURIComponent(document.forms[0].codi_depa.value);
        sex_trab = $('#cmbSex').find(":selected").val();//<== nuevo

        fech_naci = encodeURIComponent(document.forms[0].fech_naci.value);
        criterioBuscar = encodeURIComponent(document.forms[0].criterioBuscar.value);
        buscar=encodeURIComponent(document.forms[0].buscar.value);

        if (appa_trab.length == 0) {
            alert("Debes ingresar Ap.Paterno");
            document.forms[0].appa_trab.focus();
            return;
        }        
        if (apma_trab.length == 0) {
            alert("Debes ingresar Ap.Materno");
            document.forms[0].apma_trab.focus();
            return;
        }
        if (nomb_trab.length == 0) {
            alert("Debes ingresar Nombre");
            document.forms[0].nomb_trab.focus();
            return;
        }
        if (codi_sap.length == 0) {
            alert("Debes ingresar Codigo SAP");
            document.forms[0].codi_sap.focus();
            return;
        }
        if (nume_dni.length == 0) {
            alert("Debes ingresar DNI");
            document.forms[0].nume_dni.focus();
            return;
        }
        if (dire_trab.length == 0) {
            alert("Debes ingresar Direccion");
            document.forms[0].dire_trab.focus();
            return;
        }
        if (codi_dist.length == 0) {
            alert("Debes ingresar Distrito");
            document.forms[0].codi_dist.focus();
            return;
        }
        if (fech_naci.length == 0) {
            alert("Debes ingresar Fecha Nac");
            document.forms[0].fech_naci.focus();
            return;
        }
        if(agregando==0){
            $("#areaTrabajo").load("util/preload2.php");            
            $("#area2").load("controller/trabajadorController.php?accion=grabar_editar&criterioBuscar="+criterioBuscar+
                "&buscar="+buscar+"&id="+id+"&appa_trab="+appa_trab+"&apma_trab="+apma_trab+
                "&nomb_trab="+nomb_trab+"&codi_sap="+codi_sap+"&nume_dni="+nume_dni+"&dire_trab="+
                dire_trab+"&codi_dist="+codi_dist+"&fech_naci="+fech_naci+"&codi_prov="+codi_prov+"&codi_depa="+codi_depa+
                "&sex_trab="+sex_trab);
            $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=trabajador&val=0&buscar="+buscar);

        } else {
            $("#areaTrabajo").load("util/preload2.php");            
            $("#area2").load("controller/trabajadorController.php?accion=grabar_nuevo&criterioBuscar="+criterioBuscar+
                "&buscar="+buscar+"&appa_trab="+appa_trab+"&apma_trab="+apma_trab+"&nomb_trab="+nomb_trab+
                "&codi_sap="+codi_sap+"&nume_dni="+nume_dni+"&dire_trab="+dire_trab+"&codi_dist="+codi_dist+
                "&fech_naci="+fech_naci+"&codi_prov="+codi_prov+"&codi_depa="+codi_depa+"&sex_trab="+sex_trab);
            $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=trabajador&val=0&buscar="+buscar);     
        }
    }

	function actualizaProv(){
       agregando= document.frmEditar.agregando.value;	
       if (agregando == '') {
       		agregando = 0;
       };
       codi_depa = document.frmEditar.codi_depa.value;
       codi_dist = document.frmEditar.codi_dist.value;
       $("#cmbProv").load("controller/menuOpcionesController.php?accion=comboProv&codi_depa="+codi_depa+"&agregando="+agregando+"&codi_dist="+codi_dist);
       //$("#cmbDist").load("controller/menuOpcionesController.php?accion=comboDist&codi_prov="+codi_prov+"&agregando="+agregando);
       codi_prov = document.frmEditar.codi_dist.value;
       actualizaDist();
       $("#cmbDist").load("controller/menuOpcionesController.php?accion=comboDist&codi_prov="+codi_prov+"&agregando="+agregando);
	}

	function actualizaDist(){
       agregando= document.frmEditar.agregando.value;	
       if (agregando == '') {
       	   agregando = 0;
       };
       codi_prov = document.frmEditar.codi_prov.value;
       $("#cmbDist").load("controller/menuOpcionesController.php?accion=comboDist&codi_prov="+codi_prov+"&agregando="+agregando);
	};

	agregando = document.frmEditar.agregando.value;
	if (agregando == 1) {
		$("#appa_trab").val('');
		$("#apma_trab").val('');
		$("#nomb_trab").val('');
		$("#codi_sap").val('')
		$("#nume_dni").val('');
		$("#dire_trab").val('');
		$("#fech_naci").val('');
	};

    $(function(){
       document.frmEditar.appa_trab.focus();
    });

</script>