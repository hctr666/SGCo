<?php if (isset($_SESSION['codi_usua'])): ?>
<center>
<font color="#1d537f"><h1>Gesti¨®n de Contratos</h1></font>
    <h3>Listado de Trabajadores que empiecen con '<?=$criterioBuscar?>'</h3>
    <form name=frmBuscar>
    
    <table border="1">
        <tr><th>Codigo</th><th>Ap. Paterno</th><th>Ap. Materno</th><th>Nombre</th><th>DNI</th><th>Direcci¨®n</th><th>Distrito</th><th>F/Naci.</th>
            <th>Seleccionar</th></tr>
        <?php
        if(count($listaTrabajador)>0){
            foreach ($listaTrabajador as $trabajador) {               
                $fecha=date('d/m/Y' ,strtotime($trabajador->fech_naci));
                echo "<tr>";
                echo "<td>$trabajador->codi_sap</td>";
                echo "<td>$trabajador->appa_trab</td>";
                echo "<td>$trabajador->apma_trab</td>";
                echo "<td>$trabajador->nomb_trab</td>";
                echo "<td>$trabajador->nume_dni</td>";            
                echo "<td>$trabajador->dire_trab</td>";            
                echo "<td>$trabajador->desc_dist</td>";            
                echo "<td>$fecha</td>";            
                echo "<td align=center><input type='button' name='s' onclick='seleccionar($trabajador->codi_trab)' /></td>";
            
                
                echo "</tr>";
            }
        }        
        ?>
    </table><br/>    
    
        <input type='hidden' name='criterioBuscar'  value='<?=$criterioBuscar;?>' />
    
    <?php
        if(count($listaTrabajador)==0){
            echo "<font color='red'>No existen elementos con ese criterio!</font>";
        }
    ?>
    <br/>    
    <input type='button' name='btnBuscar' onclick='buscar()' value='Nueva Busqueda'/>
    </form>
</center>
<script>
    function seleccionar(id)
    {
        criterioBuscar = document.frmBuscar.criterioBuscar.value;   
        $("#areaTrabajo").load("controller/contratoController.php?accion=mostrarContratos&id="+id+"&criterioBuscar="+criterioBuscar);
    }
    function i(id)
    {
        //criterioBuscar = document.frmBuscar.criterioBuscar.value;   
        //$("#areaTrabajo").load("controller/trabajadorController.php?accion=editar&id="+id+"&criterioBuscar="+criterioBuscar);
        
        var actionPath = "controller/trabajadorController.php?accion=imprimir&id="+id;
        var opciones = "toolbar=0, menubar=0,scrollbars=1,width=600,height=400,left=10, top=10,titlebar=no,resizable=1"
        window.open(actionPath, '', opciones);
        
    }
    function nuevo(){   
        criterioBuscar = document.frmBuscar.criterioBuscar.value;    
        $("#areaTrabajo").load("controller/trabajadorController.php?accion=nuevo&criterioBuscar="+criterioBuscar);
    }
    function eliminar(){
         alert('Usted no puede utilizar esta opci¨®n');
    }  
    function buscar()
    {
        $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=contratos");
    }
   
</script>
<?php else: ?>
     <?php header("Location: http://192.168.1.4/contratos/index.php"); ?>
<?php endif ?>