<?php if (isset($_SESSION['codi_usua'])): ?>
<center>
    <font color="#1d537f"><h1>Gestión de Contratos</h1></font>
    <form name=frmBusquedaTrabajador action="javascript:buscar()">
    <?php 
        echo "<input type='hidden' name='val' value=$val>";
     ?>
        <table>
            <tr>
              <th>Busqueda por apellido</th>
              <th><input type='text' id="criterioBuscar" name='criterioBuscar' /></th>
              <th><input type='button' class="default" value='Buscar' onclick="buscar()" /></th>
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

    $(function(){
        $("#criterioBuscar").focus();
    });

    val = document.frmBusquedaTrabajador.val.value;
    if (val == 1) {
        criterioBuscar = encodeURIComponent(document.frmBusquedaTrabajador.criterioBuscar.value);
        $("#area2").load("util/preload2.php");
        $("#area2").load("controller/contratoController.php?accion=mostrartodo&criterioBuscar="+criterioBuscar);
    }

    function buscar(){
        criterioBuscar=encodeURIComponent(document.frmBusquedaTrabajador.criterioBuscar.value);
        if(criterioBuscar.length>=1){
            $("#area2").load("util/preload2.php");
            $("#area2").load("controller/contratoController.php?accion=mostrarContratos&criterioBuscar="+criterioBuscar);
        }
        else
            alert('Debe de ingresar minimamente un caracter');
    }
</script>
<?php else: ?>
     <?php header("Location: http://192.168.1.4/contratos/index.php"); ?>
<?php endif ?>