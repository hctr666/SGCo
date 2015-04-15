<?
session_start();
//$_SESSION['ruc']='20413940568';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">-->
    	<!--<meta charset='UTF-8'>-->	
        
        <link rel="shortcut icon" href="/img/money.ico" />
        <link rel="stylesheet" type="text/css" href="css/estilo.css"></link>    
        <title>GESTOR VIRTUAL</title>
        <link href="css/jquery-ui.css"  rel="stylesheet"/>
        <link href="css/estilo.css"  rel="stylesheet"/>
        <script type="text/javascript" src="js/jquery-1.10.2.js" ></script>           
        <script type="text/javascript" src="js/jquery-ui.js"  ></script>   
    </head>
    <style>
    	#button{
    		width:100px;
    		height:25px;
            border-radius: 0px;
    	}
    </style>
    <body >   
        <div id="principal">
            <div id="cabecera">
                <table width="100%" height="55" border="0" cellpadding="0" cellspacing="0" background="img/fondo_footer.jpg">
                    <tr>
                        <td><img src="img/imagen_cabecera.jpg" /></td>
                    </tr>
                    <tr>
                        <td><div id="encabezado"  >
                                <div id="empresa" style="float:left;width:50%;color:#FFFFFF;padding-left: 30px;font-size: 8pt; ">&nbsp;</div>
                                <div style="float:left;width:50%;text-align: right; color:#FFFFFF; "><div></div></div>
                            </div>
                        </td>
                    </tr>

                </table>
            </div>

            <div id="cuerpo" style="height:100%">
                <div style="width:100%; margin-top: 30px; ">
                    <div id ="grafico" style="float:left;width:55%; ">
                        <center>
                            <img  src="img/logo00000001.jpg" width="680" height="260" />
                        </center>
                    </div>
                    <div id ="detalle" style="float:left;width:45%;color:#000 ">
                    <h1>Inicio de Sesi髇</h1>
                        <form id="frmInicio" name="frmInicio" method="POST" action="controller/usuarioController.php">
                            <table width="300">
                                <tr>
                                    <td style="font-size: 14px;color:#1D537F;">Empresa</td>
                                    <td>
                                        <select name="empresa">
                                            <option value="00000001">EMBOTELLADORA SAN MIGUEL DEL SUR S.A.C.</option>                        
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; color: #1D537F">Planta/Distrib.</td>
                                    <td>
                                        <select name="sede-distrib">
                                            <option value="1">Planta Huaura</option>
                                            <option value="2">Planta Arequipa</option>
                                            <option value="3">Sede Lima</option>
                                            <option value="4">G&A</option>
                                            <option value="5">Silver Lake</option>                       
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;color:#1D537F;">Usuario</td>
                                    <td><input class="estilotextarea" type="text" name="usua" id="usua" /></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;color:#1D537F;">Clave</td>
                                    <td><input  class="estilotextarea" type="password" name="clav" id="clav" /></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><br/><input type="submit"  name="button" class="estiloboton" id="button" value="Iniciar" onclick="validarUsuario()" /><input type="hidden" name="accion" value="validar"/></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        <div class="pie" style="position:absolute; bottom:0; right:0;">Sistema de Gesti髇 Administrativa Virtual - Gestor 2014 - Derechos Reservados</div>
</div>
</body>
</html>
<script>
    $(function(){
    	$("#usua").focus();
    });
    function validarUsuario() {
        empresa = document.forms[0].empresa.value;
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
        document.forms[0].submit();
        //$("#cuerpo").load("controller/usuarioController.php?empresa="+empresa+"&usua="+usua+"&clav="+clav+"&accion="+accion);
        
    }
                function cambiarClave() {

            }
            function enContruccion() {
                alert("Disculpe, esta opcion esta en contrucciÃ³n")
            }
            function noValida() {
            }
            function mostrarCargando() {
                document.getElementById("cargando").innerHTML = "<center><img src='img/loading.gif' /> Cargando...</center>";
            }
            function ocultarCargando() {
                document.getElementById("cargando").innerHTML = "";
            }

	//asignar botón por defecto
    $(document).ready(function () {
        $("input").bind("keydown", function (event) {
            var keycode = (event.keyCode ? event.keyCode : (event.which ? event.which : event.charCode));
            if (keycode == 13) {
                document.getElementById('button').click();
                return false;
            } else {
                return true;
            }
        });
    });      

</script>