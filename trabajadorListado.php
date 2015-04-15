<?php 
    if ($buscar=='no') {
        echo "<div style='float:right;'><input type='button' name='btnNuevo' onclick='nuevo()' value='Nuevo Trabajador'/></div>";
    }
 ?>
<br>
<center>
    <?php
        if ($buscar=='si'){
            echo "<br/>";
        } else if(isset($criterioBuscar) && $criterioBuscar != ""){
            echo "<h3>Listado de Colaboradores que empiecen con '$criterioBuscar'</h3>";
        } else {
            echo "<h3>Listado de Colaboradores</h3>";
        }
    ?>
<h4><?php echo "Total: " . count($listaTrabajador) . " registros"; ?></h4>
    <form name=frmBuscar>
        <table class="ismtable">
            <thead>
            	<tr>
            		<th>Codigo</th>
            		<th>Ap. Paterno</th>
            		<th>Ap. Materno</th>
            		<th>Nombre</th>
            		<th>DNI</th>
		                <?php
    		                if ($buscar=='no'){
    		                    echo "<th>Dirección</th>";
                                echo "<th>Distrito</th>";
                                echo "<th>F/Naci.</th>";
                                echo "<th>Editar</th>";
                                echo "<th>Imprimir</th>";
    		                }else{
    		                    echo "<th>Seleccionar</th>";
                            }
		                ?>
            	</tr>
            </thead>
            <tbody>
            <?php
            if (count($listaTrabajador) > 0) {
                foreach ($listaTrabajador as $trabajador) {
                    $fecha = date('d/m/Y', strtotime($trabajador->fech_naci));
                    $nombre=$trabajador->appa_trab." ".$trabajador->apma_trab." ".$trabajador->nomb_trab;
                    echo "<tr>";
                    echo "<td>$trabajador->codi_sap</td>";
                    echo "<td>$trabajador->appa_trab</td>";
                    echo "<td>$trabajador->apma_trab</td>";
                    echo "<td>$trabajador->nomb_trab</td>";
                    echo "<td>$trabajador->nume_dni</td>";
                    if ($buscar=='no') {
                        echo "<td>$trabajador->dire_trab</td>";
                        echo "<td>$trabajador->desc_dist</td>";
                        echo "<td>$fecha</td>";
                        echo "<td align=center><input type='button' name='editar' onclick='e($trabajador->codi_trab)' /></td>";
                        echo "<td align=center><input type='button' name='imprimir' onclick='i($trabajador->codi_trab);'/></td>";
                    } else {       
                       
                        $nombre=rawurlencode($nombre);
                        echo "<td align=center><input type=button name=selec onclick=s($trabajador->codi_trab,'$nombre') /></td>";
                        
                    }
                    echo "</tr>";
                }
            }
            ?>
            </tbody>
        </table>
        <br/>
        <input type='hidden' name='criterioBuscar'  value='<?=$criterioBuscar;?>' />
        <input type='hidden' name='buscar'  value='<?=$buscar;?>' />

        <?php
        if (count($listaTrabajador) == 0) {
            echo "<font color='red'>No existen elementos con ese criterio!</font>";
        }
        ?>
        <br/>
        <?php
            if ($buscar=='no') {
                echo "<input type='button' name='btnNuevo' onclick='nuevo()' value='Nuevo Trabajador'/>";
                echo "<input type='button' name='btnBuscar' onclick='buscarTrab()' value='Nueva Busqueda'/>";
            }
        ?>
    </form>
</center>
<script>

    $(function(){
        buscar = document.frmBuscar.buscar.value;
        if (buscar == 'si') {
            $("#detalleBusqueda").load(function(){
                $(".spinner2").delay(1000).fadeOut('slow');
                $(".rect1").delay(1000).fadeOut('slow');
                $(".rect2").delay(1000).fadeOut('slow');
                $(".rect3").delay(1000).fadeOut('slow');
                $(".rect4").delay(1000).fadeOut('slow');
                $(".rect5").delay(1000).fadeOut('slow');
            });
        } else {
            $("#area2").load(function(){
                $(".spinner2").delay(1000).fadeOut('slow');
                $(".rect1").delay(1000).fadeOut('slow');
                $(".rect2").delay(1000).fadeOut('slow');
                $(".rect3").delay(1000).fadeOut('slow');
                $(".rect4").delay(1000).fadeOut('slow');
                $(".rect5").delay(1000).fadeOut('slow');
            });
        }
    });

    function s(codi_trab,nombre)
    {
        var myTextField  =document.getElementById('txtNombre');
        myTextField.value=decodeURIComponent(nombre);
        //document.frmEditar.nombre.value=nombre;        
        document.frmEditar.codi_trab.value=codi_trab;

        $('#bgmodal').remove();
        $('#bgtransparent').remove();
        
         
        
        /*document.frmEditar.nombre.value=nombre;
        document.frmEditar.nombre.value=nombre;*/
    }

    function e(id)
    {
        criterioBuscar = document.frmBuscar.criterioBuscar.value;  
        buscar= document.frmBuscar.buscar.value;
        $("#areaTrabajo").load("util/preload2.php");
        $("#areaTrabajo").load("controller/trabajadorController.php?accion=editar&id="+id+"&criterioBuscar="+criterioBuscar+"&buscar="+buscar);
		subir();
	}
    
    function i(id)
    {
        var actionPath = "controller/trabajadorController.php?accion=imprimir&id="+id;
        var opciones = "toolbar=0, menubar=0,scrollbars=1,width=600,height=400,left=10, top=10,titlebar=no,resizable=1"
        window.open(actionPath, '', opciones);
    }
    function nuevo(){   
        criterioBuscar = document.frmBuscar.criterioBuscar.value;    
        buscar= document.frmBuscar.buscar.value; 
        $("#areaTrabajo").load("util/preload2.php");
        $("#areaTrabajo").load("controller/trabajadorController.php?accion=nuevo&criterioBuscar="+criterioBuscar+"&buscar="+buscar);
        subir();
    }
    function eliminar(){
        alert('Usted no puede utilizar esta opcion');
    }  
    function buscarTrab()
    {
        criterioBuscar = document.frmBuscar.criterioBuscar.value;    
        buscar= document.frmBuscar.buscar.value;    
        $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=trabajador&val=0&criterioBuscar="+criterioBuscar+"&buscar="+buscar);
        document.body.scrollTop = document.documentElement.scrollTop = 0;
    }
</script>