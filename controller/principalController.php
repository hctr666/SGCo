<?php

session_start();
$accion = $_GET['accion'];
switch ($accion) {
    case 'inicio':
        require_once('../index.php');
        break;
    case 'salir':
        session_destroy();
        header('Location: ../index.php');
        //require_once('../index.php');
        break;
    case 'mnuContratos':
        require_once('../menuOpciones.php');
        break;
    case 'mnuReportes':
        require_once('../menuReportes.php');
        break;
    case 'mostrarFondo':
        echo '<h1 align="center">BIENVENIDOS A LA PLATAFORMA VIRTUAL<br>DEL SISTEMA INTEGRAL DE GESTION ADMINISTRATIVA<br/><br/><br/><img  src="img/logo00000001.jpg" width="680" height="260"></h1>';
        break;
}
?>
