<?php 

	require_once("MySQL.php");
	require_once("DetallePracticante.php");

	class DetallePracticanteDAO
	{
		function agregarPracticante(DetallePracticante $detallePract){
			$sql = "select max(codi_contr) as codi from contrato where codi_empr='$detallePract->codi_empr'";
            $lista = MySQL::arrayObject($sql);
            $codi_contr = $lista[0]->codi;

			$sql = "INSERT INTO detalle_practic(codi_empr,situ_prac,codi_cfp,codi_trab,
                                      codi_contr,esp_prac,mcap_prac,facu_prac,fpres_prac,dec_prac) 
                              VALUES('$detallePract->codi_empr', '$detallePract->situ_prac',
                               		 '$detallePract->codi_cfp',".$detallePract->codi_trab.",".$codi_contr.",
                               		 '$detallePract->esp_prac','$detallePract->mcap_prac','$detallePract->facu_prac',
                               		 '$detallePract->fpres_prac','$detallePract->dec_prac')";

        
        	return MySQL::abrirQuery($sql);
		}

		function editarPracticante(DetallePracticante $detallePract){
			$sql = "UPDATE detalle_practic SET situ_prac='$detallePract->situ_prac', codi_cfp='$detallePract->codi_cfp',
											   esp_prac='$detallePract->esp_prac', mcap_prac='$detallePract->mcap_prac',
											   facu_prac='$detallePract->facu_prac', fpres_prac='$detallePract->fpres_prac',
											   dec_prac='$detallePract->dec_prac'
										   WHERE codi_trab=$detallePract->codi_trab AND codi_contr=$detallePract->codi_contr";
        	return MySQL::abrirQuery($sql);
		}

		function listarPor($codi_empr, $codi_trab, $codi_contr){
			$sql = "SELECT * FROM detalle_practic 
					WHERE codi_empr='$codi_empr' AND codi_trab=$codi_trab AND codi_contr=$codi_contr";
			$lista=MySQL::arrayObject($sql);       
       		return $lista[0];			 
 		}
	}

 ?>