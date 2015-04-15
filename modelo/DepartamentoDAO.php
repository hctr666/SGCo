<?php 

	require_once("MySQL.php");

	class DepartamentoDAO
	{
		function listar($codi_empr) {
	        $sql = "select * from departamento where codi_empr='$codi_empr'";
	        $lista = MySQL::arrayObject($sql);
	        return $lista;
	    }

	}

 ?>