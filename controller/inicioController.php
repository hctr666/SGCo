<?php

include('../model/UsuarioDAO.php');
include('../model/SedeDAO.php');
header("Content-Type: text/plain utf-8");
$siiev = $_POST["ext-gen1011"]; //bimeNoCierre
$user = $_POST["ext-gen1013"];
$pass = $_POST["ext-gen1014"];
$resul = 'f';
$usuarioDAO = new UsuarioDAO();
$resul = $usuarioDAO->validar($user, $pass, $siiev);
if ($resul == 't') {
    session_start();
    $_SESSION['appName'] = $siiev;
    $_SESSION['app'] = 'ok';

    $_SESSION['bime'] = $usuarioDAO->Periodo(4); // '02';//BIMESTRE ASISTENCIA/DATA 
    $_SESSION['bimeAlum'] = $usuarioDAO->Periodo(2); //'02';//BIMESTRE ALUMNO
    $_SESSION['bimeNoCierre'] = $usuarioDAO->Periodo(3); //'02';//BIMESTRE DE CONDUCTA
    $_SESSION['bimeNota'] = $usuarioDAO->Periodo(5); //'02';//BIMESTRE DE LIBRETA Periodo
    $_SESSION['bimeDoc'] = $usuarioDAO->Periodo(1); //'02';//BIMESTRE DOCENTE

    $_SESSION['ciclo'] = '201201';
    $_SESSION['siiev'] = $siiev;

    if ($siiev == 'ADMINISTRATIVO') {
        $datoUsuario = $usuarioDAO->datos($user, $siiev);
        $_SESSION['codiUsua'] = $datoUsuario->CodiUsua;
        $_SESSION['CodiAcce'] = $datoUsuario->CodiAcce;
        $sedeDAO = new SedeDAO();
        $_SESSION['sede'] = $datoUsuario->CodiSede;
        $_SESSION['inedSede'] = $sedeDAO->ined_x_sede($_SESSION['sede']);
    }
    if ($siiev == 'DOCENTE') {
        $_SESSION['codiUsua'] = $user;
    }
    if ($siiev == 'ALUMNO') {
        $_SESSION['codiUsua'] = $user;
        $datoUsuario = $usuarioDAO->datos($user, $siiev);
        $_SESSION['sede'] = $datoUsuario->CodiSede;
        $_SESSION['inedSede'] = $datoUsuario->CodiIned;
        $_SESSION['Grado'] = $datoUsuario->CodiGrEd;
        $_SESSION['ApPaAlum'] = $datoUsuario->ApPaAlum;
        $_SESSION['ApMaAlum'] = $datoUsuario->ApMaAlum;
        $_SESSION['NombAlum'] = $datoUsuario->NombAlum;
        $_SESSION['CodiAlum'] = $datoUsuario->CodiAlum;


        require_once("../model/VisitaAlumno.php");
        $visitalum = new VisitaAlumno();
        $visitalum->almacenarVisitaAlumno($_SESSION['ciclo'], $_SESSION['codiUsua']);
    }
    echo '{"success": true, "login":{"web": "user"}}';
} else {
    echo '{"success": false, "errors":{"reason": "Usuario o contraseña incorrecta"}}';
}
?>
