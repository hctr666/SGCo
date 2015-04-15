<?php

require_once("MySQL.php");
require_once("Area.php");

class AreaDAO {

    function listar($codi_empr){
        $sql = "select * from area where codi_empr='$codi_empr' ";
        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

    function listarPor(Area $area){
    	$sql = "SELECT * FROM area WHERE codi_empr='$area->codi_empr' AND codi_area='$area->codi_area'";
    	$lista = MySQL::arrayObject($sql);
    	return $lista;
    }

}

?>