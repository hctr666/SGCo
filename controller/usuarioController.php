<?php

session_start();
$accion = $_POST['accion'];
switch ($accion) {
    case 'validar':
        $codi_empr = $_POST['empresa'];
        $usua = $_POST['usua'];
        $clav = $_POST['clav'];
        require_once("../modelo/Usuario.php");
        $usuario = new Usuario($codi_empr, $usua, $clav);
        require_once("../modelo/UsuarioDAO.php");
        $usuarioDAO = new UsuarioDAO();
        $valor = $usuarioDAO->existe($usuario);
        if ($valor == true) {
            $usuario = $usuarioDAO->cargar($codi_empr, $usua);
            require_once("../modelo/PermisoDAO.php");
            $permisoDAO = new PermisoDAO();
            $rol = $permisoDAO->verificar($codi_empr, $usuario->codi_usua);
            if ($rol > 0) {
                $usuario = $usuarioDAO->cargar($codi_empr, $usua);
                $_SESSION['codi_usua'] = $usuario->codi_usua;
                $_SESSION['logi_usua'] = $usuario->logi_usua;
                $_SESSION['nomb_usua'] = $usuario->nomb_usua;
                $_SESSION['mail_usua'] = $usuario->mail_usua;
                $_SESSION['codi_empr'] = $usuario->codi_empr;
                require_once("../modelo/EmpresaDAO.php");
                $empresaDAO = new EmpresaDAO();
                $empresa = $empresaDAO->seleccionar($usuario->codi_empr);
                $_SESSION['nruc_empr'] = $empresa->nruc_empr;
                $_SESSION['desc_empr'] = $empresa->desc_empr;
                require_once("../modelo/VisitaDAO.php");
                require_once("../modelo/Visita.php");
                $visitaDAO= new VisitaDAO();
                $visita= new Visita($codi_empr, $usuario->codi_usua);
                $agrego = $visitaDAO->agregar($visita);

                header('Location: ../app.php');
                //require_once("../principal.php");
            } else {
                //$valor="sinRol";
                require_once("../error.php");
                header('Location: ../error.php?valor=sinRol');
            }
        } else {
            ///$valor="claveErrada";
            //require_once("../error.php");
            header('Location: ../error.php?valor=claveErrada');
        }
        break;
}
?>

