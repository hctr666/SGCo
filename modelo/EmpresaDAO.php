<?php

require_once("MySQL.php");

class EmpresaDAO {

    function seleccionar($codi_empr) {
        $sql = "select * from empresa where codi_empr='$codi_empr'";
        $lista = MySQL::arrayObject($sql);
        return $lista[0];
    }

}

?>