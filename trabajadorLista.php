<?php 
	if ($buscar == 'si') {
		echo "<div style='padding:20px;'>";
	} else {
		echo "<div>";
	}
 ?>
<center>
    <?php
        if ($buscar == 'si'){
            echo '<h1>Buscar Colaborador</h1>';
        } else {
            echo '<h1>Gestión del Colaborador</h1>';
        }
    ?>
    <form name=frmBusquedaTrabajador action="javascript:<?php if ($buscar == 'si') {echo 'buscarTrabSi()';} else {echo 'buscarTrabNo()';} ?>">
    <?php 
        echo "<input type='hidden' name='val' value=$val>";
     ?>
        <table>
            <tr>
                <th>Búsqueda por apellido:</th>
                <th><input type='text' name='criterioBuscar' id="criterioBuscar"></th><th>
                    <input type='button' value='Buscar' onclick='
                    <?php        
                        if ($buscar == 'si') 
                            echo "buscarTrabSi()";
                        else
                            echo "buscarTrabNo()";
                    ?>'>
                </th>
            </tr>        
        </table>
        <div id="detalleBusqueda">    </div>
        <div style="padding-top:15px;">	
	        <?php
	            if ($buscar == 'si') {
	                echo "<input type=button onclick='closeModal()' value='Cancelar Busqueda' />";
	            }
	                echo "<input type=hidden name=buscar value='$buscar' />";
	        ?>
        </div>
    </form>
</center>
</div>
<script>

    $(function(){
        $('#criterioBuscar').focus();
    });

    val = document.frmBusquedaTrabajador.val.value;
    if (val == 1) {
        criterioBuscar = encodeURIComponent(document.frmBusquedaTrabajador.criterioBuscar.value);
        buscar=encodeURIComponent(document.frmBusquedaTrabajador.buscar.value);
        $("#area2").load("controller/trabajadorController.php?accion=mostrartodo&criterioBuscar="+criterioBuscar+"&buscar="+buscar);
    }

    function buscarTrabSi(){
        criterioBuscar=encodeURIComponent(document.frmBusquedaTrabajador.criterioBuscar.value);
        buscar=encodeURIComponent(document.frmBusquedaTrabajador.buscar.value);
        
        if(criterioBuscar.length >= 1){
             $("#detalleBusqueda").load("util/preload2.php");
             $("#detalleBusqueda").load("controller/trabajadorController.php?accion=buscar&criterioBuscar="+criterioBuscar+"&buscar="+buscar);
        } else {
            alert('Debe de ingresar mínimamente un caracter');
        }
    }
    function buscarTrabNo(){
        criterioBuscar=encodeURIComponent(document.frmBusquedaTrabajador.criterioBuscar.value);
        buscar=encodeURIComponent(document.frmBusquedaTrabajador.buscar.value);
        
        if(criterioBuscar.length>=1){
            $("#area2").load("util/preload2.php");
            $("#area2").load("controller/trabajadorController.php?accion=buscar&criterioBuscar="+criterioBuscar+"&buscar="+buscar);
        } else {
            alert('Debe de ingresar mínimamente un caracter');
        }
    }
   
</script>