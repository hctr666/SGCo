<?php

require_once("MySQL.php");

class TipoDAO {

    function listar($codi_empr) {
        $sql = "select * from tipo_trabajador where codi_empr='$codi_empr' ";
        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

}

?>