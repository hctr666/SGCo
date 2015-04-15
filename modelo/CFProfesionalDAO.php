<?php 

	require_once("MySQL.php");
	require_once("CFProfesional.php");

	class CFProfesionalDAO {
		
	    function listar($codi_empr) {
	        $sql = "select * from cfprof where codi_empr='$codi_empr' ";
	        $lista = MySQL::arrayObject($sql);
	        return $lista;
	    }

	    function listarPor($codi_empr, $codi_cfp){
	        $sql = "SELECT * FROM cfprof WHERE codi_empr='$codi_empr' AND codi_cfp=$codi_cfp";
	        $lista = MySQL::arrayObject($sql);
	        return $lista[0];
	    }

	    function editar(CFProfesional $cfprofesional) {
	    	$sql = "UPDATE cfprof SET desc_cfp='$cfprofesional->desc_cfp', ruc_cfp='$cfprofesional->ruc_cfp',
	    		   dir_cfp='$cfprofesional->dir_cfp', rep_cfp='$cfprofesional->rep_cfp' 
	    		   WHERE codi_cfp='$cfprofesional->codi_cfp' AND codi_empr='$cfprofesional->codi_empr'";
	    	return MySQL::abrirQuery($sql);
	    }

	    function nuevo(CFProfesional $cfprofesional) {
	        try {
	            $sql = "select max(codi_cfp) as cod from cfprof where codi_empr='$cfprofesional->codi_empr'";
	            $lista = MySQL::arrayObject($sql);
	            $correlativo = $lista[0]->cod;
	            $correlativo = $correlativo + 1;
	        } catch (Exception $ex) {
	            $correlativo = 1;
	        }

	        $sql = "INSERT INTO cfprof(codi_empr, codi_cfp, desc_cfp, ruc_cfp, dir_cfp, rep_cfp) 
	                              VALUES('$cfprofesional->codi_empr','$correlativo','$cfprofesional->desc_cfp','$cfprofesional->ruc_cfp',
	                                     '$cfprofesional->dir_cfp','$cfprofesional->rep_cfp')";
	        
	        return MySQL::abrirQuery($sql);
	    }
	}
 ?>