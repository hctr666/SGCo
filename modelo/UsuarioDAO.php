<?php

require_once("MySQL.php");
require_once("Usuario.php");

class UsuarioDAO {

    function existe($usuario) {
        $sql = "select count(*) from usuario where codi_empr='" . $usuario->codi_empr . "' and logi_usua='" . $usuario->logi_usua . "' and pass_usua='" . $usuario->pass_usua . "'";
        $cantidad = MySQL::numeroRegistros($sql);
        if ($cantidad > 0)
            return true;
        return false;
    }

    function cargar($codi_empr, $logi_usua) {
        $sql = "select * from usuario where codi_empr='$codi_empr' and logi_usua='$logi_usua' ";
        $listaUsuarios = MySQL::arrayObject($sql);
        return $listaUsuarios[0];
    }

}

?>