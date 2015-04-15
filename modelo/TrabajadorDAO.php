<?php

require_once("MySQL.php");
require_once("Trabajador.php");

class TrabajadorDAO {

    function listar($codi_empr) {
        $sql = "select * from trabajador where codi_empr='$codi_empr' and cesado=0 order by appa_trab,apma_trab,nomb_trab";

        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

    function listarCumpleaniosMes(){
        $sql="select nume_dni,appa_trab ,apma_trab, nomb_trab, DATE_FORMAT(fech_naci,'%d') as dia from trabajador where date_format (fech_naci, '%m') = date_format (now(), '%m') and cesado=0 order by DATE_FORMAT(fech_naci,'%d/%m')";
        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

    function buscar($codi_empr, $texto) {
        $sql = "SELECT t.*,desc_dist FROM trabajador t inner join distrito d on t.codi_dist=d.codi_dist 
                and appa_trab like '" . $texto . "%' and t.codi_empr='$codi_empr' where t.cesado=0 
                order by appa_trab,apma_trab,nomb_trab  ";

        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

    function listar_todo($codi_empr) {
        $sql = "SELECT t.*,desc_dist FROM trabajador t inner join distrito d on t.codi_dist=d.codi_dist 
                where t.codi_empr='$codi_empr' and t.cesado=0 order by appa_trab,apma_trab,nomb_trab";
        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

    function seleccionar($codi_empr, $codi_trab) {
        $sql = "SELECT * FROM trabajador 
        		WHERE codi_trab='".$codi_trab ."'AND codi_empr='$codi_empr' AND cesado=0 ORDER BY appa_trab,apma_trab,nomb_trab ";

        $lista = MySQL::arrayObject($sql);
        return $lista[0];
    }

    function agregar(Trabajador $trabajador) {
        try {
            $sql = "select max(codi_trab) as codi from trabajador where codi_empr='$trabajador->codi_empr' order by appa_trab,apma_trab,nomb_trab ";
            $lista = MySQL::arrayObject($sql);
            $correlativo = $lista[0]->codi;
            $correlativo = $correlativo + 1;
        } catch (Exception $ex) {
            $correlativo = 1;
        }

        $sql = "INSERT INTO trabajador(codi_empr,codi_trab,codi_sap,nume_dni,
                                      appa_trab,apma_trab,nomb_trab,fech_naci, 
                                      dire_trab,codi_dist, codi_prov, codi_depa,cesado,sex_trab) 
                              VALUES('$trabajador->codi_empr',$correlativo,'$trabajador->codi_sap','$trabajador->nume_dni',
                                     '$trabajador->appa_trab','$trabajador->apma_trab','$trabajador->nomb_trab','$trabajador->fech_naci',
                                     '$trabajador->dire_trab','$trabajador->codi_dist','$trabajador->codi_prov', '$trabajador->codi_depa',
                                     0,'$trabajador->sex_trab')";


        return MySQL::abrirQuery($sql);
    }

    function editar(Trabajador $trabajador) {
        $sql = "UPDATE trabajador SET codi_sap='$trabajador->codi_sap', nume_dni='$trabajador->nume_dni',
                                    appa_trab='$trabajador->appa_trab', apma_trab='$trabajador->apma_trab',
	       							nomb_trab='$trabajador->nomb_trab', fech_naci='$trabajador->fech_naci',
	       							dire_trab='$trabajador->dire_trab', codi_dist='$trabajador->codi_dist',
	                                codi_prov='$trabajador->codi_prov', codi_depa='$trabajador->codi_depa',
                                    sex_trab='$trabajador->sex_trab' 
	       						WHERE codi_trab='$trabajador->codi_trab' AND codi_empr='$trabajador->codi_empr'";



        return MySQL::abrirQuery($sql);
    }

}

?>