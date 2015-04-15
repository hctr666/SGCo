<?php

session_start();
if (isset($_SESSION['codi_usua'])) {
    $accion = $_GET['accion'];
    $codi_usua = $_SESSION['codi_usua'];
    $codi_empr = $_SESSION['codi_empr'];
    if (isset($_GET['criterioBuscar'])) {
        $criterioBuscar = $_GET['criterioBuscar'];
    }
    switch ($accion) {

        case 'buscar':
            $criterioBuscar = $_GET['criterioBuscar'];
            require_once '../modelo/TrabajadorDAO.php';
            require_once '../modelo/Trabajador.php';
            $trabajadorDAO = new TrabajadorDAO();
            $listaTrabajador = $trabajadorDAO->buscar($codi_empr, $criterioBuscar);
            $buscar = $_GET['buscar'];
            require_once '../trabajadorListado.php';
            break;

        case 'mostrartodo':
            require_once '../modelo/TrabajadorDAO.php';
            require_once '../modelo/Trabajador.php';
            $trabajadorDAO = new TrabajadorDAO();
            $listaTrabajador = $trabajadorDAO->listar_todo($codi_empr);
            $buscar = $_GET['buscar'];
            require_once '../trabajadorListado.php';
            break;

        case 'nuevo':
            $buscar = $_GET['buscar'];
            require_once '../modelo/TrabajadorDAO.php';
            require_once '../modelo/Trabajador.php';
            $agregando = true;

            require_once '../modelo/DepartamentoDAO.php';
            $departdao = new DepartamentoDAO();
            $listaDepa = $departdao->listar($codi_empr);

            require_once '../modelo/ProvinciaDAO.php';
            require_once '../modelo/Provincia.php';
            $provincia = new Provincia($codi_empr, '', '', '1');
            $provinciaDAO = new ProvinciaDAO();
            $listaProv = $provinciaDAO->listarPorDepa($provincia);

            require_once '../modelo/DistritoDAO.php';
            require_once '../modelo/Distrito.php';
            $distrito = new Distrito();
            $distrito->codi_empr = $codi_empr;
            $distrito->codi_prov = '1';
            $distritoDAO = new DistritoDAO();
            $listaDist = $distritoDAO->listarPorProv($distrito);

            require_once '../trabajadorEditar.php';
            break;

        case 'editar':
            $buscar = $_GET['buscar'];
            #echo $buscar;
            $id = $_GET['id'];
            require_once '../modelo/TrabajadorDAO.php';
            require_once '../modelo/Trabajador.php';
            $agregando = false;

            $trabajadorDAO = new TrabajadorDAO();
            $registro = $trabajadorDAO->seleccionar($codi_empr, $id);

            require_once '../modelo/DepartamentoDAO.php';
            $departdao = new DepartamentoDAO();
            $listaDepa = $departdao->listar($codi_empr);

            require_once '../modelo/ProvinciaDAO.php';
            require_once '../modelo/Provincia.php';
            $provdao = new ProvinciaDAO();
            $provincia = new Provincia($codi_empr, '', '', $registro->codi_depa);
            $listaProv = $provdao->listarPorDepa($provincia);

            require_once '../modelo/DistritoDAO.php';
            require_once '../modelo/Distrito.php';
            $distritoDAO = new DistritoDAO();
            $distrito = new Distrito();

            $distrito->codi_empr = $codi_empr;
            $distrito->codi_prov = $registro->codi_prov;
            
            $listaDist = $distritoDAO->listarPorProv($distrito);
            require_once '../trabajadorEditar.php';
            break;

        case 'grabar_editar':
            require_once '../modelo/TrabajadorDAO.php';
            require_once '../modelo/Trabajador.php';
            $trabajador = new Trabajador();
            $criterioBuscar = $_GET['criterioBuscar'];
            $buscar = $_GET['buscar'];
            $trabajador->codi_trab = $_GET['id'];
            $trabajador->appa_trab = $_GET['appa_trab'];
            $trabajador->apma_trab = $_GET['apma_trab'];
            $trabajador->nomb_trab = $_GET['nomb_trab'];
            $trabajador->codi_sap = (string) $_GET['codi_sap'];
            $trabajador->nume_dni = (string) $_GET['nume_dni'];
            $trabajador->dire_trab = $_GET['dire_trab'];
            $trabajador->codi_dist = $_GET['codi_dist'];
            $trabajador->codi_prov = $_GET['codi_prov'];
            $trabajador->codi_depa = $_GET['codi_depa'];
            $trabajador->sex_trab = $_GET['sex_trab'];#<==nuevo

            $trabajador->codi_empr = $codi_empr;
            $year = substr($_GET['fech_naci'], 6, 4);
            $month = substr($_GET['fech_naci'], 3, 2);
            $day = substr($_GET['fech_naci'], 0, 2);
            $trabajador->fech_naci = $year . '-' . $month . '-' . $day;
            $trabajadorDAO = new TrabajadorDAO();
            if ($trabajadorDAO->editar($trabajador) == 1) {
                $criterioBuscar = substr($trabajador->appa_trab, 0, 1);
                $listaTrabajador = $trabajadorDAO->buscar($codi_empr, $criterioBuscar);
                echo "<script>alert('Los datos del Trabajador se editaron correctamente :)');</script>";
                require_once '../trabajadorListado.php';
            } else {
                echo "Error al grabar";
            }
            break;
        case 'grabar_nuevo':
            require_once '../modelo/TrabajadorDAO.php';
            require_once '../modelo/Trabajador.php';
            $trabajador = new Trabajador();
            $criterioBuscar = $_GET['criterioBuscar'];
            $buscar = $_GET['buscar'];
            $trabajador->codi_trab = '0';
            $trabajador->appa_trab = $_GET['appa_trab'];
            $trabajador->apma_trab = $_GET['apma_trab'];
            $trabajador->nomb_trab = $_GET['nomb_trab'];
            $trabajador->codi_sap = (string) $_GET['codi_sap'];
            $trabajador->nume_dni = (string) $_GET['nume_dni'];
            $trabajador->dire_trab = $_GET['dire_trab'];
            $trabajador->codi_dist = $_GET['codi_dist'];
            $trabajador->codi_prov = $_GET['codi_prov'];
            $trabajador->codi_depa = $_GET['codi_depa'];
            $trabajador->codi_empr = $codi_empr;
            $trabajador->sex_trab = $_GET['sex_trab'];

            $year = substr($_GET['fech_naci'], 6, 4);
            $month = substr($_GET['fech_naci'], 3, 2);
            $day = substr($_GET['fech_naci'], 0, 2);
            $trabajador->fech_naci = $year . '-' . $month . '-' . $day;
            $trabajadorDAO = new TrabajadorDAO();
            if ($trabajadorDAO->agregar($trabajador) == 1) {
                $criterioBuscar = substr($trabajador->appa_trab, 0, 1);
                $listaTrabajador = $trabajadorDAO->buscar($codi_empr, $criterioBuscar);
                echo "<script>alert('Trabajador registrado correctamente :)');</script>";
                require_once '../trabajadorListado.php';
            } else {
                echo "Error al grabar";
            }
            break;
        case 'imprimir':
            $id = $_GET['id'];
            $_SESSION['nombreReporte'] = 'Ficha del Trabajador';
            $_SESSION['anchoTituloReporte'] = 60;
            require_once '../modelo/TrabajadorDAO.php';
            $trabajadorDAO = new TrabajadorDAO();
            $registro = $trabajadorDAO->seleccionar($codi_empr, $id);
            require_once('../reporte/ReporteMaestroDetalle.php');
            $pdf = new ReporteMaestroDetalle();
            $pdf->AddPage();
            //Títulos que llevará la cabecera
            $miCabecera = array('Codigo SAP:', 'Ap.Paterno:', 'Ap.Materno:', 'Nombre');
            $misDatos = array($registro->codi_sap, $registro->appa_trab, $registro->apma_trab, $registro->nomb_trab);
            //Métodos llamados con el objeto $pdf
            $pdf->cabeceraVertical($miCabecera);
            $pdf->datosVerticales($misDatos);
            $pdf->Output(); //Salida al navegador
            break;
    }
} else {
    echo 'Usted no tiene acceso';
}
?>
