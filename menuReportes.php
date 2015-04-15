<script>
    function dehabilitado()
    {
        alert("Esta opción esta deshabilitado, hasta Autorización de Alta");
    }

    function consultaPagoXDNI()
    {
        dehabilitado();
        /*$("#areaTrabajo").load("<%=sWS%>/MenuCajaBancoAction.do?method=consultaXDni");*/
    }
    function cambiarContenidoPorFecha() {
        dehabilitado();
        /*        $("#areaTrabajo").load("<%=sWS%>/MenuCajaBancoAction.do?method=reporteXFecha");*/

    }
    function cambiarContenidoPorRangoFecha() {
        dehabilitado();/*
         $("#areaTrabajo").load("<%=sWS%>/MenuCajaBancoAction.do?method=reporteXRangoFecha");*/
    }
    function exportarExcel() {
        dehabilitado();/*
         $("#areaTrabajo").load("<%=sWS%>/MenuCajaBancoAction.do?method=tabuladoXEspecifica");*/
    }
/*    function bancoSubirArchivo()
    {
        var actionPath = "<%=sWS%>/MenuCajaBancoAction.do?method=bancoSubirArchivo";
        var opciones = "toolbar=0, menubar=0,scrollbars=1,width=600,height=400,left=10, top=10,titlebar=no,resizable=1"
        window.open(actionPath, 'reporte', opciones);
    }*/
	function operacionesBancoXFecha()
	{
		$("#areaTrabajo").load("<%=sWS%>/MenuCajaBancoAction.do?method=reporteBancoXFecha");
	}
	function operacionesBancoXFechaXTributo()
	{
		$("#areaTrabajo").load("<%=sWS%>/MenuCajaBancoAction.do?method=reporteBancoXFechaXTributo");
	}
        function operacionesBancoXFechaXClasificador()
	{
		$("#areaTrabajo").load("<%=sWS%>/MenuCajaBancoAction.do?method=reporteBancoXFechaXClasificador");
	}
        function constanciaPagoBanco()
	{
		$("#areaTrabajo").load("<%=sWS%>/MenuCajaBancoAction.do?method=constanciaPagoBanco");
	}
        
    function buscarReniec()
    {
        var actionPath = "https://cel.reniec.gob.pe/valreg/valreg.do?accion=ini";
        var opciones = "toolbar=0, menubar=0,scrollbars=1,width=620,height=500,left=10, top=10,titlebar=no,resizable=0"
        window.open(actionPath, 'reporte', opciones);
    }
    function actualizarDatosCliente()
    {
        var actionPath = "<%=sWS%>/MenuCajaBancoAction.do?method=actualizarDatosCliente";
       // var opciones = "toolbar=0, menubar=0,scrollbars=1,width=600,height=400,left=10, top=10,titlebar=no,resizable=1"
 //       window.open(actionPath, 'reporte', opciones);
   //     window.open('', 'reporte', opciones);
	   return actionPath;
    }
    function operacionesBancoXDia()
    {
        var actionPath = "<%=sWS%>/MenuCajaBancoAction.do?method=bancoSubirArchivo";
        var opciones = "toolbar=0, menubar=0,scrollbars=1,width=600,height=400,left=10, top=10,titlebar=no,resizable=1"
        window.open(actionPath, 'reporte', opciones);	
	}
</script>
<div class="menu_top_bg">OPERACIONES DEL SISTEMA </div> 
<div class="sub_menu"> 

    <ul>
        <li onclick="matricular()"><a href="#"  title="MATRICULAR">MATRICULAR ALUMNO</a></li>
        <li onclick="gestionAlumnos()"><a href="#" title="GESTIÓN ALUMNO">GESTIÓN DE ALUMNOS</a></li>        
    </ul>
</div> 
<div class="menu_top_bg">MANTENIMIENTO DE  TABLAS</div> 
<div class="sub_menu"> 
    <ul>                        
       
        <li onclick="buscarReniec()"><a href="#" title="TABLA GRADO - SECCIÓN">TABLA INSTITUCIÓN EDUCATIVA</a></li>
        <li onclick="buscarReniec()"><a href="#" title="TABLA GRADO - SECCIÓN">TABLA GRADO - SECCIÓN</a></li>        
         <li onclick="buscarReniec()"><a href="#" title="TABLA USUARIO">CONFIGURACION DE SEGURIDAD</a></li>
    </ul>

</div> 
