<?php

require_once("MySQL.php");
require_once("Condicion.php");

class CondicionDAO {

    function listar($codi_empr) {
        $sql = "select * from condicion where codi_empr='$codi_empr' ";
        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

 	function listarPorTipo($codi_empr, $tipo_cond) {
        $sql = "select * from condicion where codi_empr='$codi_empr' and tipo_cond='$tipo_cond'";
        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

    function listarPorCod($codi_empr, $codi_cond){
        $sql = "SELECT * FROM condicion WHERE codi_empr='$codi_empr' and codi_cond='$codi_cond'";
        $lista = MySQL::arrayObject($sql);
        return $lista;    	
    }
}

?>