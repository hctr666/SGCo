<?php

session_start();
$accion = $_GET['accion'];
$codi_usua = $_SESSION['codi_usua'];
$codi_empr = $_SESSION['codi_empr'];
switch ($accion) {
    case 'condiciones':
        require_once('../modelo/CondicionDAO.php');
        $condicionDAO = new CondicionDAO();
        $listaCondicion = $condicionDAO->listar($codi_empr);
        require_once('../condicionLista.php');
        break;

    case 'area':
        require_once('../modelo/AreaDAO.php');
        $areaDAO = new AreaDAO();
        $listaArea = $areaDAO->listar($codi_empr);
        require_once('../areaLista.php');
        break;

    case 'comboProv':
    	$agregando = $_GET['agregando'];
    	$codi_depa = $_GET['codi_depa'];
    	#$codi_prov = $_GET['codi_prov'];
    	$codi_dist = $_GET['codi_dist'];
    	require_once('../modelo/Provincia.php');
    	require_once('../modelo/ProvinciaDAO.php');
    	$provincia = new Provincia($codi_empr, '','',$codi_depa);
    	$provinciadao = new ProvinciaDAO();
    	$listaProv = $provinciadao->listarPorDepa($provincia);

    	require_once '../util/DataCombo.php';    	
    	if ($agregando <> 1) {
    		DataCombo::mostrar('codi_prov', $listaProv, 'codi_prov', 'desc_prov', 1, 'actualizaDist()');
    	} else {
    		DataCombo::mostrar('codi_prov', $listaProv, 'codi_prov', 'desc_prov', '', 'actualizaDist()');
    	} 
    	break;

	case 'comboDist':
    	$agregando = $_GET['agregando'];
    	$codi_prov = $_GET['codi_prov'];
    	require_once('../modelo/Distrito.php');
    	require_once('../modelo/DistritoDAO.php');

    	$distrito = new Distrito();
    	$distrito->codi_empr = $codi_empr;
    	$distrito->codi_prov = $codi_prov;

    	$distritodao = new DistritoDAO();
    	$listaDist = $distritodao->listarPorProv($distrito);

    	require_once '../util/DataCombo.php';    	
    	if ($agregando <> 1) {
    		DataCombo::mostrar('codi_dist', $listaDist, 'codi_dist', 'desc_dist', '01', '');
    	} else {
    		DataCombo::mostrar('codi_dist', $listaDist, 'codi_dist', 'desc_dist', '', '');
    	}

    	break;

    case 'comboCargos':
        $agregando = $_GET['agregando'];
        $codi_tipo = $_GET['codi_tipo'];
        require_once('../modelo/CargoDAO.php');
        require_once('../modelo/Cargo.php');
        $cargo = new Cargo($codi_empr, '', '', $codi_tipo);
        $cargoDAO = new CargoDAO();

        if ($codi_tipo == '3' || $codi_tipo == '4') {
   	        $listaCargo = $cargoDAO->listarTodo($cargo);
        } else {
	        $listaCargo = $cargoDAO->listar($cargo);        	
        }

        require_once('../util/DataCombo.php');
        
        if ($agregando <> 1)
            DataCombo::mostrar('codi_carg', $listaCargo, 'codi_carg', 'desc_carg', 1, '');
        else
            DataCombo::mostrar('codi_carg', $listaCargo, 'codi_carg', 'desc_carg', '', '');
        break;

    case 'cargos':
        if (!isset($_GET['codi_tipo']))
            $codi_tipo = 1;
        else
            $codi_tipo = $_GET['codi_tipo'];
        require_once('../modelo/TipoDAO.php');
        $tipoDAO = new TipoDAO();
        $listaTipo = $tipoDAO->listar($codi_empr);
        require_once('../modelo/CargoDAO.php');
        require_once('../modelo/Cargo.php');
        $cargo = new Cargo($codi_empr, '', '', $codi_tipo);
        $cargoDAO = new CargoDAO();
        $listaCargo = $cargoDAO->listar($cargo);
        require_once('../cargoLista.php');
        break;
        
    case 'trabajador':
        if (isset($_GET['val'])) {
            $val = $_GET['val'];
        }

        $buscar = $_GET['buscar'];
        if(isset($_GET['criterioBuscar']))
            $criterioBuscar = $_GET['criterioBuscar'];
        require_once('../trabajadorLista.php');      
        break;

    case 'cumpleanios':
        require_once('../modelo/TrabajadorDAO.php');
        $trabajadorDAO = new TrabajadorDAO();
        $listaTrabajador = $trabajadorDAO->listarCumpleaniosMes();
        require_once('../trabajadorCumpleanios.php');
        break;

    case 'contratos':
        if (isset($_GET['val'])) {
            $val = $_GET['val'];
        }  
        require_once('../contratoLista.php');
        break;

    case 'temporada':
        require_once '../modelo/ContratoDAO.php';
        $contratoDAO = new ContratoDAO();
        $anio_act = substr(date("Y-m-d"), 0,4);
        #echo "<script>alert($anio_act);</script>";
        $regFecha = $contratoDAO->cargarFechaTmpAlta($anio_act);
        require_once('../asignaTmpAlta.php');
        break;

    case 'ceseMesActual':

        #obteniendo el mes actual
        $hoy = date("Y-m-d");
        $hoy = strtotime("-1 day", strtotime($hoy));
        $hoy = date("Y-m-d", $hoy);
        $year = substr($hoy, 0, 4);

        $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio',
            'Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre');

        require_once('../seleccMesCese.php');
        break;   

    case 'cfprofesional':
        require_once '../modelo/CFProfesionalDAO.php';
        $cfprof = new CFProfesionalDAO();
        $regcfprof = $cfprof->listar($codi_empr);
        require_once '../cfprofLista.php';
        break;
}
?>
