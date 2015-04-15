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
            require_once '../modelo/TrabajadorDAO.php';
            require_once '../modelo/Trabajador.php';
            $trabajadorDAO = new TrabajadorDAO();
            $listaTrabajador = $trabajadorDAO->buscar($codi_empr, $criterioBuscar);
            require_once '../contratoTrabajadorListado.php';
            break;
        case 'imprimir':
            $id = $_GET['id'];
            require_once '../modelo/Trabajador.php';
            break;
        case 'mostrarContratos':
            $criterioBuscar = $_GET['criterioBuscar'];
            require_once '../modelo/ContratoDAO.php';
            require_once '../modelo/Contrato.php';
            $contrato = new Contrato();
            $contrato->codi_empr = $codi_empr;
            $contratoDAO = new ContratoDAO();
            $listacontratos = $contratoDAO->seleccionarReporte($contrato, $criterioBuscar);
            require_once '../contratos.php';
            break;

        case 'mostrartodo':
            require_once("../modelo/ContratoDAO.php");
            require_once("../modelo/Contrato.php");
            $contrato = new Contrato();
            $contrato->codi_empr = $codi_empr;
            $contratoDAO = new ContratoDAO();
            $listacontratos = $contratoDAO->listar_todo($contrato);
            require_once '../contratos.php';
            break;

        case 'nuevo':
            $codi_trab = '';//$_GET['codi_trab'];
            $codi_contr ='';// $_GET['codi_contr'];
            $criterioBuscar = $_GET['criterioBuscar'];
            $agregando = true;

            require_once '../modelo/ContratoDAO.php';
            require_once '../modelo/Contrato.php';
            $contrato = new Contrato();
            $contrato->codi_empr = $codi_empr;
            $contrato->codi_contr = $codi_contr;
            //$contratoDAO = new ContratoDAO();
            //$contrato = $contratoDAO->seleccionar($contrato);
           
            require_once('../modelo/AreaDAO.php');
            $areaDao = new AreaDAO();
            $listaArea = $areaDao->listar($codi_empr);

            require_once '../modelo/TipoDAO.php';
            $tipoDAO = new TipoDAO();
            $listaTipo = $tipoDAO->listar($codi_empr);
                        
            require_once '../modelo/CargoDAO.php';
            require_once '../modelo/Cargo.php';
            $cargo = new Cargo($codi_empr, '', '', '1');
            $cargoDAO = new CargoDAO();
            $listaCargo = $cargoDAO->listar($cargo);
            
            require_once '../modelo/CondicionDAO.php';
            require_once '../modelo/Condicion.php';
            $condicionDAO = new CondicionDAO();
            $listaCondicion = $condicionDAO->listarPorTipo($codi_empr,'1');
            require_once '../contratoEditar.php';
            break;

        case 'editar':
            $codi_trab = $_GET['codi_trab'];
            $codi_contr = $_GET['codi_contr'];

            if (isset($_GET['criterioBuscar'])) {
                $criterioBuscar = $_GET['criterioBuscar'];
            }

            require_once '../modelo/TrabajadorDAO.php';
            require_once '../modelo/Trabajador.php';
            $agregando = false;
            $trabajador = new Trabajador();
            $trabajadorDAO = new TrabajadorDAO();
            $registro = $trabajadorDAO->seleccionar($codi_empr, $codi_trab);
            
            require_once '../modelo/ContratoDAO.php';
            require_once '../modelo/Contrato.php';
            $contrato = new Contrato();
            $contrato->codi_empr = $codi_empr;
            $contrato->codi_contr = $codi_contr;
            $contratoDAO = new ContratoDAO();
            $contrato = $contratoDAO->seleccionar($contrato);
           
            require_once '../modelo/TipoDAO.php';
            $tipoDAO = new TipoDAO();
            $listaTipo = $tipoDAO->listar($codi_empr);
                        
            require_once '../modelo/CargoDAO.php';
            require_once '../modelo/Cargo.php';
            $cargo = new Cargo($codi_empr, '', '', $contrato->codi_tipo);
            $cargoDAO = new CargoDAO();
            $listaCargo = $cargoDAO->listar($cargo);
            
            require_once '../modelo/CondicionDAO.php';
            require_once '../modelo/Condicion.php';
            $condicionDAO = new CondicionDAO();
            $listaCondicion = $condicionDAO->listar($codi_empr);

            require_once '../contratoEditar.php';
            break;
            
        case 'grabar_editar':
            require_once '../modelo/ContratoDAO.php';
            require_once '../modelo/Contrato.php';
            $contrato = new Contrato();
            $contrato->codi_empr = $codi_empr;
            $contrato->codi_contr = $_GET['codi_contr'];
            $contrato->codi_trab = $_GET['codi_trab'];
            $contrato->codi_tipo = $_GET['codi_tipo'];
            $contrato->codi_carg = $_GET['codi_carg'];
            $contrato->codi_cond = $_GET['codi_cond'];
            $contrato->indt_cont = $_GET['indt_cont'];
            $contrato->mont_cont = $_GET['mont_cont'];
            $contrato->codi_area = $_GET['codi_area'];
            $contrato->ref_cont = $_GET['ref_cont'];

            $yearIni = substr($_GET['fech_inic'], 6, 4);
            $monthIni = substr($_GET['fech_inic'], 3, 2);
            $dayIni = substr($_GET['fech_inic'], 0, 2);
            $contrato->fech_inic = $yearIni . '-' . $monthIni . '-' . $dayIni;

            if ($contrato->indt_cont == '1') {
                $yearFin = substr($_GET['fech_fin'], 6, 4);
                $monthFin = substr($_GET['fech_fin'], 3, 2);
                $dayFin = substr($_GET['fech_fin'], 0, 2);
                $contrato->fech_fin = $yearFin . '-' . $monthFin . '-' . $dayFin;
            }

            #grabar la data del contrato
            $contratoDAO = new ContratoDAO();
            $contrato->codi_empr = $codi_empr;
       
            if ($contratoDAO->editar($contrato) == 1) {
                $criterioBuscar = substr($_GET['nombre'], 0, 1);
                $listacontratos = $contratoDAO->seleccionarReporte($contrato, $criterioBuscar);
                echo "<script>alert('Contrato editado correctamente :)');</script>";
            } else {
                echo "<script>alert('No se editó el contrato :/');</script>";
            }

            #si el contrato es por convenio de pr¨¢cticas pre prof. o profesionales
            if ($contrato->codi_cond == '09' || $contrato->codi_cond == '10' && $contrato->indt_cont == '1') {
                require_once '../modelo/DetallePracticante.php';    
                require_once '../modelo/DetallePracticanteDAO.php'; 
                $detallePrac = new DetallePracticante();
                $detallePrac->codi_empr = $codi_empr;
                $detallePrac->codi_trab = $_GET['codi_trab'];
                $detallePrac->codi_cfp = $_GET['codi_cfp'];
                $detallePrac->fpres_prac = $_GET['fpres_prac'];
                $detallePrac->situ_prac = $_GET['situ_prac'];            
                $detallePrac->facu_prac = $_GET['facu_prac'];
                $detallePrac->mcap_prac = $_GET['mcap_prac'];
                $detallePrac->esp_prac = $_GET['esp_prac'];
                $detallePrac->codi_contr = $_GET['codi_contr'];
                $detallePrac->dec_prac = $_GET['dec_prac'];

                $fpresi_anio = substr($_GET['fpres_prac'], 6, 4);
                $fpresi_mes = substr($_GET['fpres_prac'], 3, 2);
                $fpresi_dia = substr($_GET['fpres_prac'], 0, 2);
                $detallePrac->fpres_prac = $fpresi_anio . '-' . $fpresi_mes . '-' . $fpresi_dia;

                $detallePracdao = new DetallePracticanteDAO();
                #grabar la data del practicante
                if ($detallePracdao->editarPracticante($detallePrac) == 1) {
                    #echo "<script>alert('Se editó el practicante');</script>";
                    $criterioBuscar = substr($_GET['nombre'], 0, 1);
                    #$listacontratos = $contratoDAO->seleccionarReporte($contrato, $criterioBuscar);
                } else {
                    echo "<script>alert('No se editó nada :(');</script>";
                }
            }
            
            $listacontratos = $contratoDAO->seleccionarReporte($contrato, $criterioBuscar);
            require_once '../contratos.php';
            break;

        case 'grabar_nuevo':
            require_once '../modelo/ContratoDAO.php';
            require_once '../modelo/Contrato.php';

            $contrato = new Contrato();
            $contrato->codi_empr = $codi_empr;
            #$contrato->codi_contr = $_GET['codi_contr'];
            $contrato->codi_trab = $_GET['codi_trab'];
            $contrato->codi_tipo = $_GET['codi_tipo'];
            $contrato->codi_carg = $_GET['codi_carg'];
            $contrato->codi_cond = $_GET['codi_cond'];
            $contrato->indt_cont = $_GET['indt_cont'];
            #echo $contrato->indt_cont;
            $contrato->mont_cont = $_GET['mont_cont'];
            $contrato->codi_area = $_GET['codi_area'];
            $contrato->ref_cont = $_GET['ref_cont'];

            $yearIni = substr($_GET['fech_inic'], 6, 4);
            $monthIni = substr($_GET['fech_inic'], 3, 2);
            $dayIni = substr($_GET['fech_inic'], 0, 2);
            $contrato->fech_inic = $yearIni . '-' . $monthIni . '-' . $dayIni;

            if ($contrato->indt_cont == 1) {
                $yearFin = substr($_GET['fech_fin'], 6, 4);
                $monthFin = substr($_GET['fech_fin'], 3, 2);
                $dayFin = substr($_GET['fech_fin'], 0, 2);
                $contrato->fech_fin = $yearFin . '-' . $monthFin . '-' . $dayFin;
            }

            #grabar la data del contrato
            $contratoDAO = new ContratoDAO();

            if ($contratoDAO->agregar($contrato) == 1) {
                $criterioBuscar = substr($_GET['nombre'], 0, 1);
                echo "<script>alert('Contrato agregado correctamente :)');</script>";
            } else {
                echo "<script>alert('No se agregó el cotrato :(');</script>";               
            }

            #si el contrato es por convenio de pr¨¢cticas pre prof. y profesionales
            if ($contrato->codi_cond == '09' || $contrato->codi_cond == '10') {
                require_once '../modelo/DetallePracticante.php';    
                require_once '../modelo/DetallePracticanteDAO.php'; 
                $detallePrac = new DetallePracticante();
                $detallePrac->codi_empr = $codi_empr;
                $detallePrac->codi_trab = $_GET['codi_trab'];
                $detallePrac->codi_cfp = $_GET['codi_cfp'];
                $detallePrac->fpres_prac = $_GET['fpres_prac'];
                $detallePrac->situ_prac = $_GET['situ_prac'];            
                $detallePrac->facu_prac = $_GET['facu_prac'];
                $detallePrac->mcap_prac = $_GET['mcap_prac'];
                $detallePrac->esp_prac = $_GET['esp_prac'];
                $detallePrac->dec_prac = $_GET['dec_prac'];

                $fpresi_anio = substr($_GET['fpres_prac'], 6, 4);
                $fpresi_mes = substr($_GET['fpres_prac'], 3, 2);
                $fpresi_dia = substr($_GET['fpres_prac'], 0, 2);
                $detallePrac->fpres_prac = $fpresi_anio . '-' . $fpresi_mes . '-' . $fpresi_dia;

                $detallePracdao = new DetallePracticanteDAO();
                #grabar la data del practicante
                if ($detallePracdao->agregarPracticante($detallePrac) == 1) {
                    #echo "<script>alert('se agregó el practicante');</script>";
                    $criterioBuscar = substr($_GET['nombre'], 0, 1);
                    #$listacontratos = $contratoDAO->seleccionarReporte($contrato, $criterioBuscar);
                } else {
                    echo "<script>alert('No se agregó nada :(');</script>";
                }
            }
            $listacontratos = $contratoDAO->seleccionarReporte($contrato, $criterioBuscar);
            require_once '../contratos.php';
            break;

        case 'imprimirContrato':
            $id = $_GET['id'];
            $idtrab = $_GET['idtrab'];
            $codi_empr = $_SESSION['codi_empr'];
            require_once '../modelo/ContratoDAO.php';
            require_once '../modelo/Contrato.php';

            $contratoDAO = new ContratoDAO();
            $contrato = new Contrato();
            $contrato->codi_empr = $codi_empr;
            $contrato->codi_contr = $id;
            $registro = $contratoDAO->seleccionarImpre($codi_empr,$id);
            #echo $id;

            switch ($registro->codi_cond) {
                case '01':
                    require_once('../reporte/art58.php');
                    break;  
                case '02':
                    require_once("../reporte/art58sinPrueba.php");
                    break;
                case '03':
                    require_once("../reporte/suplencia.php");
                    break;
                case '04':
                    require_once("../reporte/vacaciones.php");
                    break;

                case '05':
                    $anio_tmp = substr($registro->fech_inic, 0,4);
                    #$a0Š9oactual = substr(date("Y-m-d"), 0,4);
                    #echo "<script>alert($a0Š9o_tmp)</script>";
                    $tmp_alta = $contratoDAO->cargarFechaTmpAlta($anio_tmp);
                    #echo "<script>alert($tmp_alta->fin_tmp)</script>";

                    require_once("../reporte/tmpAlta.php");
                    break;

                case '06':
                    require_once("../reporte/art57.php");
                    break;

                case '08':
                    require_once("../reporte/art57sin.php");
                    break;

                case '09':
                    $reg2 = $contratoDAO->seleccionarDetaPrac($codi_empr, $id, $idtrab);
                    require_once("../reporte/preprof.php");
                    break;

                case '10':
                    $reg2 = $contratoDAO->seleccionarDetaPrac($codi_empr, $id, $idtrab);
                    require_once("../reporte/prof.php");
                    break;      
            }

        case 'cesarContrato':
            $codi_contr = $_GET['codi_contr'];
            $codi_trab = $_GET['codi_trab'];
            $codi_empr = $_SESSION['codi_empr'];
            $fech_emo = $_GET['fechEmo'];
            $emo = $_GET['emo'];

            if (isset($_GET['fechRen'])) {
                $fechRen = $_GET['fechRen'];
            }

            require_once '../modelo/ContratoDAO.php';
            require_once '../modelo/Contrato.php';

            $contratoDAO = new ContratoDAO();
            $contrato = new Contrato();
            $contrato->codi_empr = $codi_empr;
            $contrato->codi_contr = $codi_contr;

            $yearemo = substr($fech_emo, 6, 4);
            $monthemo = substr($fech_emo, 3, 2);
            $dayemo = substr($fech_emo, 0, 2);
            $fech_emo = $yearemo . '-' . $monthemo . '-' . $dayemo;

            $contratoDAO->ingresarFechaEMO($codi_contr,$codi_empr,$codi_trab,$fech_emo);
            $registro = $contratoDAO->seleccionarImpre($codi_empr,$codi_contr);

            switch ($emo) {
                case 'sin':
                    require_once '../reporte/ceseSinEMO.php';
                    break;
                
                default:
                    require_once '../reporte/ceseConEMO.php';
                    break;
            }

            break;

  #####################################################################

        case 'seleccionador':
            $agr = $_GET['agr'];
            $criterioBuscar = $_GET['criterioBuscar'];
            require_once '../modelo/CondicionDAO.php';
            require_once '../modelo/Condicion.php';
            $condicionDAO = new CondicionDAO();
            $listaCondicion = $condicionDAO->listarPorTipo($codi_empr,'1');
            require_once("../seleccionContrato.php");        
            break;

        case 'seleccionadorCese':
            $tipo = $_GET['tipo'];
            $codi_trab = $_GET['codi_trab'];
            $codi_contr = $_GET['codi_contr'];
            require_once '../seleccionTipoCese.php';
            break;

        case 'editarContrato':
            $codi_trab = $_GET['codi_trab'];
            $codi_contr = $_GET['codi_contr'];
            $codi_cond = $_GET['codi_cond'];
            $indt_cont = $_GET['indt_cont'];
            #echo($indt_cont);

            if (isset($_GET['criterioBuscar'])) {
                $criterioBuscar = $_GET['criterioBuscar'];
            }
            $agr = 1;

            require_once '../modelo/TrabajadorDAO.php';
            require_once '../modelo/Trabajador.php';
            $trabajador = new Trabajador();
            $trabajadorDAO = new TrabajadorDAO();
            $registro = $trabajadorDAO->seleccionar($codi_empr, $codi_trab);

            require_once '../modelo/ContratoDAO.php';
            require_once '../modelo/Contrato.php';
            $contrato = new Contrato();
            $contrato->codi_empr = $codi_empr;
            $contrato->codi_contr = $codi_contr;
            $contrato->codi_trab = $codi_trab;

            $contratoDAO = new ContratoDAO();
            $contratoreg = $contratoDAO->seleccionar($contrato);

            require_once '../modelo/TipoDAO.php';
            $tipoDAO = new TipoDAO();
            $listaTipo = $tipoDAO->listar($codi_empr);

            require_once '../modelo/CargoDAO.php';
            require_once '../modelo/Cargo.php';
            $cargo = new Cargo($codi_empr, '', '', $contratoreg->codi_tipo);
            $cargoDAO = new CargoDAO();
            $listaCargo = $cargoDAO->listar($cargo);

            require_once '../modelo/AreaDAO.php';
            $areaDao = new AreaDAO();
            $listaArea = $areaDao->listar($contratoreg->codi_empr);
            
            switch ($indt_cont) {
                case '1':
                    switch ($codi_cond) {
                        case '09':
                            require_once '../modelo/CFProfesionalDAO.php';
                            require_once '../modelo/CFProfesional.php';
                            $cfp = new CFProfesional($codi_empr, '', '', '', '', '');
                            $cfpdao = new CFProfesionalDAO();
                            $listaCfprof = $cfpdao->listar($codi_empr);

                            require_once '../modelo/DetallePracticanteDAO.php';
                            $detallePracdao = new DetallePracticanteDAO();
                            $detallePrac = $detallePracdao->listarPor($contratoreg->codi_empr,$codi_trab,$codi_contr);
                            require_once '../contratoEditarPracticas.php';
                            break;

                        case '10':
                            require_once '../modelo/CFProfesionalDAO.php';
                            require_once '../modelo/CFProfesional.php';
                            $cfp = new CFProfesional($codi_empr, '', '', '', '', '');
                            $cfpdao = new CFProfesionalDAO();
                            $listaCfprof = $cfpdao->listar($codi_empr);

                            require_once '../modelo/DetallePracticanteDAO.php';
                            $detallePracdao = new DetallePracticanteDAO();
                            $detallePrac = $detallePracdao->listarPor($contratoreg->codi_empr,$codi_trab,$codi_contr);
                            require_once '../contratoEditarPracticas.php';
                            break;

                        default:
                            require_once '../contratoEditarSmod.php';                           
                            break;
                    }
                    break;
                
                case '0':
                    require_once '../EditarContratoIndt.php';
                    break;
            }

            break;
        
        case 'nuevoContrato':

            $codi_trab = '';//$_GET['codi_trab'];
            $codi_contr ='';// $_GET['codi_contr'];
            $criterioBuscar = $_GET['criterioBuscar'];

            require_once '../modelo/ContratoDAO.php';
            require_once '../modelo/Contrato.php';
            $contrato = new Contrato();
            $contrato->codi_empr = $codi_empr;
            $contrato->codi_contr = $codi_contr;
            $contratoDAO = new ContratoDAO();

            $codi_cond = $_GET['codi_cond'];
            $criterioBuscar = $_GET['criterioBuscar'];
            $agr = $_GET['agr'];
            $indt_cont = $_GET['indt_cont'];
            require_once('../modelo/AreaDAO.php');
            $areaDao = new AreaDAO();
            $listaArea = $areaDao->listar($codi_empr);

            require_once '../modelo/TipoDAO.php';
            $tipoDAO = new TipoDAO();
            $listaTipo = $tipoDAO->listar($codi_empr);
                        
            require_once '../modelo/CargoDAO.php';
            require_once '../modelo/Cargo.php';
            $cargo = new Cargo($codi_empr, '', '', '1');
            $cargoDAO = new CargoDAO();
            $listaCargo = $cargoDAO->listar($cargo);

            require_once '../modelo/CondicionDAO.php';
            $condicionDAO = new CondicionDAO();
            $listaCond = $condicionDAO->listarPorCod($codi_empr,$codi_cond);
            //echo $listaCond->desc_cond;

            switch ($indt_cont) {
                case 'false':
                    $indt_cont = 1;
                    switch ($codi_cond) {
                        case '09':
                            require_once '../modelo/CFProfesionalDAO.php';
                            require_once '../modelo/CFProfesional.php';
                            $cfp = new CFProfesional($codi_empr, '', '', '', '', '');
                            $cfpdao = new CFProfesionalDAO();
                            $listaCfprof = $cfpdao->listar($codi_empr);
                            require_once '../contratoEditarPracticas.php';
                            break;

                        case '10':
                            require_once '../modelo/CFProfesionalDAO.php';
                            require_once '../modelo/CFProfesional.php';
                            $cfp = new CFProfesional($codi_empr, '', '', '', '', '');
                            $cfpdao = new CFProfesionalDAO();
                            $listaCfprof = $cfpdao->listar($codi_empr);
                            require_once '../contratoEditarPracticas.php';
                            break;

                        default:
                            #echo $indt_cont;
                            require_once '../contratoEditarSmod.php';
                            break;
                    }  
                break; 

                case 'true':
                    $indt_cont = 0;
                    #echo 'indeterminado';
                    require_once '../EditarContratoIndt.php';
                    break;
            }
        break; 

        case 'imprimirCartaSenati':
             $txtnom = $_GET['nom'];
             $txtapel = $_GET['apel'];
             $txtesp = $_GET['esp'];

             require_once("../reporte/cartaSENATI.php");
             break;

        case 'mostrarContratosPorMes':
             $mes = $_GET['mes'];

             #mes en numeral
             require_once '../util/fechas.php';
             $f = new Fechas();
             $nummes = $f::getNumMes($mes);

             require_once '../modelo/ContratoDAO.php';
             $contratoDAO = new ContratoDAO();
             $listacontratos = $contratoDAO->listarPorMes($nummes, $codi_empr);
             require_once '../listaContratoCeseXMes.php';
             break;

        case 'impContratoCeseMesActual':
             $mes = $_GET['mes'];
             $mes__ = (string) $mes;

             require_once '../util/fechas.php';
             $f = new Fechas();
             $nummes = $f::getNumMes($mes__);

             require_once '../modelo/ContratoDAO.php';
             $contratoDAO = new ContratoDAO();
             $listacontratos = $contratoDAO->listarPorMes($nummes, $codi_empr);
             require_once '../reporte/contratosCeseMesActual.php';
             break;
    }

} else {
    echo 'Usted no tiene acceso';
}
?>
