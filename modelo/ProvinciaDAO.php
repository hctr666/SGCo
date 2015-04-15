<?php 

	require_once('MySQL.php');
	require_once('Provincia.php');

	class ProvinciaDAO
	{
		function listarPorDepa(Provincia $provincia) {
	        $sql = "select * from provincia where codi_empr='$provincia->codi_empr' and codi_depa='$provincia->codi_depa'";
	        $lista = MySQL::arrayObject($sql);
	        return $lista;
	    }

	    function listarTodo($codi_empr){
	        $sql = "select * from cargo where codi_empr='$codi_empr'";
	        $lista = MySQL::arrayObject($sql);
	        return $lista;
    	}
	}
 ?>