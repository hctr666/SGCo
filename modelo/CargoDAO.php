<?php

require_once("MySQL.php");
require_once("Cargo.php");

class CargoDAO {

    function listar(Cargo $cargo) {
        $sql = "select * from cargo where codi_empr='$cargo->codi_empr' and codi_tipo='$cargo->codi_tipo'";
        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

    function listarTodo(Cargo $cargo){
        $sql = "select * from cargo where codi_empr='$cargo->codi_empr'";
        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

}

?>