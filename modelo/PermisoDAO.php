<?php

require_once("MySQL.php");
require_once("Permiso.php");

class PermisoDAO {

    function verificar($codi_empr,$codi_usua) {
        try{
            $sql = "select codi_rol from permiso where codi_empr='$codi_empr' and codi_usua='$codi_usua'";       
            $lista=MySQL::arrayObject($sql);                   
            if(!empty($lista))
                return $lista[0]->codi_rol;
            else
                return 0;
        }
        catch(Exception $ex)
        {
            return 0;
        }
    }
}
?>
