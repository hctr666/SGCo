<?php if (isset($_SESSION['codi_usua'])): ?>
<div style="width:100%; margin-top: 30px; ">
    <div id ="grafico" style="float:left;width:55%; ">
        <center><img  src="img/logo00000001.jpg" width="499" height="409"/></center>
    </div>
    <div id ="detalle" style="float:left;width:45%;color:#000 ">
        <h1> Inicio de Sesión</h1>

        <form id="frmInicio" name="frmInicio" method="get" action="">
            <table width="300">
                <tr>
                    <td style="font-size: 14px;color:#1D537F;">Empresa</td>
                    <td>
                        <select name="cmbEmpresa">
                            <option value="00000001">EMBOTELLADORA SAN MIGUEL DEL SUR S.A.C.</option>                        
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 14px;color:#1D537F;">Usuario</td>
                    <td>
                        <input class="estilotextarea" type="text" name="usua" id="usua" /></td>
                </tr>
                <tr>
                    <td style="font-size: 14px;color:#1D537F;">Clave</td>
                    <td ><input  class="estilotextarea" type="password" name="clav" id="clav" /></td>
                </tr>
                <tr>
                    <td >&nbsp;</td>
                    <td ><br/>
                        <input type="button" name="button" class="estiloboton" id="button" value="Iniciar" onclick="validarUsuario()" />
                        <input type="hidden" name="accion" value="validar"/>                                
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<script>
    function validarUsuario() {
        empresa = document.forms[0].cmbEmpresa.value;
        usua = document.forms[0].usua.value;
        clav = document.forms[0].clav.value;
        accion=document.forms[0].accion.value;
        if (empresa.length == 0) {
            alert("Debes ingresar RUC de Empresa");
            document.forms[0].cmbEmpresa.focus();
            return;
        }
        if (usua.length == 0) {
            alert("Debes ingresar Usuario");
            document.forms[0].usua.focus();
            return;
        }
        if (clav.length == 0) {
            alert("Debes ingresar Clave");
            document.forms[0].clav.focus();
            return;
        }
        $("#cuerpo").load("controller/usuarioController.php?empresa="+empresa+"&usua="+usua+"&clav="+clav+"&accion="+accion);        
    }
</script>
<?php else: ?>
     <?php header("Location: http://192.168.1.4/contratos/index.php"); ?>
<?php endif ?>