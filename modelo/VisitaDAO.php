<?php

require_once("MySQL.php");
require_once("Visita.php");

class VisitaDAO {

    function agregar(Visita $visita) {
        $sql = "INSERT INTO visita 
                              VALUES('$visita->codi_empr','$visita->codi_usua',CURRENT_TIMESTAMP())";


        return MySQL::abrirQuery($sql);
    }

}

?>