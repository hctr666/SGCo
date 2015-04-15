<?php if (isset($_SESSION['codi_usua'])): ?>
<center>
    <h1>Listado de Condiciones Laborales</h1>
    <form name='FrmAreas'>
        <table class="ismtable">
        	<thead>
	            <tr>
	            	<th><?=utf8_encode("Código")?></th>
	            	<th><?=utf8_encode("Descripción")?></th>
	            	<th>Editar</th>
	            </tr>
        	</thead>
        	<tbody>
            <?php
            foreach ($listaCondicion as $condicion) {
                echo "<tr>";
                echo "<td>$condicion->codi_cond</td>";
                echo "<td>$condicion->desc_cond</td>";
                echo "<td align=center><input type='button' name='editar' onclick='enContruccion()' /></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
        <br/>
        <input type='button' name='nuevo' onclick='enContruccion()' value='Agregar Cargo' />
    </form>
</center>
<script>
    function enContruccion()
    {
        alert('En Construccion');
    }
</script>
<?php else: ?>
     <?php header("Location: http://192.168.1.4/contratos/index.php"); ?>
<?php endif ?>