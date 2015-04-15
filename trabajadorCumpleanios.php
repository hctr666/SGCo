<?php
    $listaTrabajador
?>

<center>
   <h1>Cumpleaños de este Mes</h1>
    <form name=frmBuscar>
        <table class="ismtable">
            <thead>
            	<tr>
            		<th>DNI</th>
            		<th>Ap. Paterno</th>
            		<th>Ap. Materno</th>
            		<th>Nombre</th>
            		<th>Día</th>
            	</tr>
            </thead>
            <tbody>		
            <?php
            if (count($listaTrabajador) > 0) {
                foreach ($listaTrabajador as $trabajador) {
                    echo "<tr>";
                    echo "<td>$trabajador->nume_dni</td>";
                    echo "<td>$trabajador->appa_trab</td>";
                    echo "<td>$trabajador->apma_trab</td>";
                    echo "<td>$trabajador->nomb_trab</td>";                
                    echo "<td>$trabajador->dia</td>";     
                    echo "</tr>";
                }
            }
            ?>
            </tbody>
        </table><br/>    
    </form>
</center>
<script type="text/javascript">
    $("#areaTrabajo").load(function(){
        $(".spinner2").delay(1000).fadeOut('slow');
        $(".rect1").delay(1000).fadeOut('slow');
        $(".rect2").delay(1000).fadeOut('slow');
        $(".rect3").delay(1000).fadeOut('slow');
        $(".rect4").delay(1000).fadeOut('slow');
        $(".rect5").delay(1000).fadeOut('slow');
    });
</script>