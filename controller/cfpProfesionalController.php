<?php 

session_start();
$accion = $_GET['accion'];
$codi_empr = $_SESSION['codi_empr'];

	switch ($accion) {
		case 'edit':
			$val = $_GET['val'];
			$codi_cfp = $_GET['codi_cfp'];
			require_once '../modelo/CFProfesionalDAO.php';
			$cfprofesionaldao = new CFProfesionalDAO();
			$registro = $cfprofesionaldao->listarPor($codi_empr, $codi_cfp);
			#echo $registro->desc_cfp;
			require_once '../cfprofesionalEditar.php';
			break;
		
		case 'new':
			$val = $_GET['val'];
			require_once '../cfprofesionalEditar.php';
			break;

		case 'edit_save':
			$codi_cfp = $_GET['codi_cfp'];
			$desc_cfp = $_GET['desc_cfp'];
			$ruc_cfp = $_GET['ruc_cfp'];
			$dir_cfp = $_GET['dir_cfp'];
			$rep_cfp = $_GET['rep_cfp'];

			require_once '../modelo/CFProfesional.php';
			$cfprofesional = new cfprofesional($codi_empr,$codi_cfp,$desc_cfp,$ruc_cfp,$dir_cfp,$rep_cfp);
			require_once '../modelo/CFProfesionalDAO.php';
			$cfprofesionaldao = new CFProfesionalDAO();

			if ($cfprofesionaldao->editar($cfprofesional) == 1) {
				echo "<script>alert('Cambios guardados :)');</script>";
			}else{
				echo "<script>alert('Error: no se guardó nada :(');</script>";
			}
			$regcfprof = $cfprofesionaldao->listar($codi_empr);
        	require_once '../cfprofLista.php';
			#header("Location:menuOpcionesController.php?accion=cfprofesional");
			#require_once 'menuOpcionesController.php';
			break;

		case 'new_save':
			$desc_cfp = $_GET['desc_cfp'];
			$ruc_cfp = $_GET['ruc_cfp'];
			$dir_cfp = $_GET['dir_cfp'];
			$rep_cfp = $_GET['rep_cfp'];

			require_once '../modelo/CFProfesional.php';
			$cfprofesional = new cfprofesional($codi_empr,' ',$desc_cfp,$ruc_cfp,$dir_cfp,$rep_cfp);
			require_once '../modelo/CFProfesionalDAO.php';
			$cfprofesionaldao = new CFProfesionalDAO();

			if ($cfprofesionaldao->nuevo($cfprofesional) == 1) {
				echo "<script>alert('Se registró correctamente :)');</script>";
			}else{
				echo "<script>alert('Error: no se registró nada :(');</script>";
			}
			$regcfprof = $cfprofesionaldao->listar($codi_empr);
        	require_once '../cfprofLista.php';
			break;
	}


 ?>