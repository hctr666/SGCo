<?php

require_once("MySQL.php");
require_once("Distrito.php");

class DistritoDAO {

    function listar($codi_empr) {
        $sql = "select * from distrito where codi_empr='$codi_empr'";
        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

    function listarPorProv(Distrito $distrito){
    	$sql = "select * from distrito where codi_empr='$distrito->codi_empr' and 
    			codi_prov='$distrito->codi_prov'";
        $lista = MySQL::arrayObject($sql);
        return $lista;
    }
}

?>
