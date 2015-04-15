<?php

require_once("MySQL.php");
require_once("Contrato.php");

class ContratoDAO {

    function listar($contrato) {
        $sql = "select * from contrato where codi_empr='$contrato->codi_empr' and codi_trab='$contrato->codi_trab' ";
        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

    function listar_todo($contrato){
        $sql = "SELECT c.*,t.nume_dni, concat(t.appa_trab,' ', t.apma_trab,' ', t.nomb_trab) as nombre,r.desc_tipo,g.desc_carg,o.desc_cond,d.desc_dist,dire_trab,sex_trab,fech_naci
        FROM contrato c 
        INNER JOIN trabajador t on c.codi_trab=t.codi_trab and c.codi_empr=t.codi_empr
        INNER JOIN tipo_trabajador r on r.codi_tipo=c.codi_tipo and c.codi_empr=r.codi_empr
        INNER JOIN cargo g on c.codi_carg=g.codi_carg and c.codi_empr=g.codi_empr
        INNER JOIN condicion o on c.codi_cond=o.codi_cond and c.codi_empr=o.codi_empr 
        INNER JOIN distrito d on t.codi_dist=d.codi_dist and t.codi_empr=d.codi_empr where  c.codi_empr='$contrato->codi_empr'";    
        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

    function seleccionarReporte($contrato, $criterio) {
        $criterio = $criterio . '%';
        $sql = "SELECT c.*,t.nume_dni, concat(t.appa_trab,' ', t.apma_trab,' ', t.nomb_trab) as nombre,r.desc_tipo,g.desc_carg,o.desc_cond,d.desc_dist,dire_trab,sex_trab,fech_naci
        FROM contrato c 
        INNER JOIN trabajador t on c.codi_trab=t.codi_trab and c.codi_empr=t.codi_empr
        INNER JOIN tipo_trabajador r on r.codi_tipo=c.codi_tipo and c.codi_empr=r.codi_empr
        INNER JOIN cargo g on c.codi_carg=g.codi_carg and c.codi_empr=g.codi_empr
        INNER JOIN condicion o on c.codi_cond=o.codi_cond and c.codi_empr=o.codi_empr 
        INNER JOIN distrito d on t.codi_dist=d.codi_dist and t.codi_empr=d.codi_empr where  c.codi_empr='$contrato->codi_empr' and t.appa_trab like '$criterio' ";
        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

    function buscar($codi_empr, $texto) {
        $sql = "SELECT t.*,desc_dist FROM trabajador t inner join distrito d on t.codi_dist=d.codi_dist and appa_trab like '" . $texto . "%' and t.codi_empr='$codi_empr' order by appa_trab,apma_trab,nomb_trab  ";

        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

    function listarPorMes($mes, $codi_empr){
        $sql = "SELECT c.*,t.nume_dni, concat(t.appa_trab,' ', t.apma_trab,' ', t.nomb_trab) as nombre,r.desc_tipo,g.desc_carg,o.desc_cond,d.desc_dist,dire_trab,sex_trab,fech_naci
        FROM contrato c 
          INNER JOIN trabajador t on c.codi_trab=t.codi_trab and c.codi_empr=t.codi_empr
          INNER JOIN tipo_trabajador r on r.codi_tipo=c.codi_tipo and c.codi_empr=r.codi_empr
          INNER JOIN cargo g on c.codi_carg=g.codi_carg and c.codi_empr=g.codi_empr
          INNER JOIN condicion o on c.codi_cond=o.codi_cond and c.codi_empr=o.codi_empr 
          INNER JOIN distrito d on t.codi_dist=d.codi_dist and t.codi_empr=d.codi_empr 
        WHERE c.codi_empr='$codi_empr' and date_format(c.fech_fin,'%m')='$mes' and date_format(c.fech_fin,'%y')=date_format(now(), '%y') and c.indt_cont=1";
        $lista = MySQL::arrayObject($sql);
        return $lista;
    }

    function seleccionar(Contrato $contrato) {
        $sql = "SELECT c.*,t.nume_dni, concat(t.appa_trab,' ', t.apma_trab,' ', t.nomb_trab) as nombre,
        r.desc_tipo,g.desc_carg,o.desc_cond,d.desc_dist, a.codi_area, a.desc_area,dire_trab,sex_trab,fech_naci,indt_cont,mont_cont,ref_cont
        FROM contrato c 
	        INNER JOIN trabajador t on c.codi_trab=t.codi_trab and c.codi_empr=t.codi_empr
	        INNER JOIN tipo_trabajador r on r.codi_tipo=c.codi_tipo and c.codi_empr=r.codi_empr
	        INNER JOIN cargo g on c.codi_carg=g.codi_carg and c.codi_empr=g.codi_empr
	        INNER JOIN condicion o on c.codi_cond=o.codi_cond and c.codi_empr=o.codi_empr 
	        INNER JOIN distrito d on t.codi_dist=d.codi_dist and t.codi_empr=d.codi_empr
	        INNER JOIN area a on c.codi_area = a.codi_area and c.codi_empr = d.codi_empr 
        WHERE c.codi_empr='$contrato->codi_empr' and c.codi_contr=$contrato->codi_contr and c.cesado=0";

        $lista = MySQL::arrayObject($sql);
        return $lista[0];
    }

    function seleccionarImpre($codi_empr,$id) {
    
       $sql= "SELECT c.*, t.appa_trab, t.apma_trab, t.nomb_trab, t.nume_dni, t.sex_trab, g.desc_carg, o.desc_cond, 
       					d.desc_dist, t.dire_trab, t.fech_naci, p.desc_prov, dep.desc_depa, a.desc_area
              FROM contrato c INNER JOIN trabajador t on c.codi_trab=t.codi_trab and c.codi_empr=t.codi_empr
                              INNER JOIN cargo g on c.codi_carg=g.codi_carg and c.codi_empr=g.codi_empr 
                              INNER JOIN condicion o on c.codi_cond=o.codi_cond and c.codi_empr=o.codi_empr 
                              INNER JOIN distrito d on t.codi_dist=d.codi_dist and t.codi_empr=d.codi_empr
                              INNER JOIN provincia p on t.codi_prov=p.codi_prov and t.codi_empr=p.codi_empr
                              INNER JOIN departamento dep on t.codi_depa=dep.codi_depa and t.codi_empr=dep.codi_empr
                              INNER JOIN area a on c.codi_area=a.codi_area and c.codi_empr=a.codi_empr
                              

              WHERE c.codi_empr='$codi_empr' and c.codi_contr='$id' and c.cesado=0";        
       $lista=MySQL::arrayObject($sql);       
       return $lista[0];
    }

    function seleccionarDetaPrac($codi_empr, $id, $codi_trab){
        $sql = "SELECT dp.*, cf.desc_cfp, cf.ruc_cfp, cf.dir_cfp, cf.rep_cfp
                FROM detalle_practic dp INNER JOIN cfprof cf on dp.codi_cfp=cf.codi_cfp
                WHERE dp.codi_empr='$codi_empr' and dp.codi_contr='$id' and dp.codi_trab='$codi_trab'";

        $lista = MySQL::arrayObject($sql);
        return $lista[0];
    }

    function agregar(Contrato $contrato) {
        try {
            $sql = "select max(codi_contr) as codi from contrato where codi_empr='$contrato->codi_empr'  ";
            $lista = MySQL::arrayObject($sql);
            $correlativo = $lista[0]->codi;
            $correlativo = $correlativo + 1;
        } catch (Exception $ex) {
            $correlativo = 1;
        }

        $sql = "INSERT INTO contrato(codi_empr,codi_contr,codi_trab,codi_tipo,
                                      codi_carg,codi_cond,fech_inic,fech_fin, 
                                      indt_cont,mont_cont, codi_area, ref_cont, cesado) 
                              VALUES('$contrato->codi_empr','$correlativo','$contrato->codi_trab','$contrato->codi_tipo',
                                     '$contrato->codi_carg','$contrato->codi_cond','$contrato->fech_inic','$contrato->fech_fin',
                                     $contrato->indt_cont,$contrato->mont_cont, '$contrato->codi_area', '$contrato->ref_cont',0)";

        
        return MySQL::abrirQuery($sql);
    }

    function editar(Contrato $contrato) {
        $sql = "UPDATE contrato SET codi_tipo='$contrato->codi_tipo',
       								codi_carg='$contrato->codi_carg',
			                        codi_cond='$contrato->codi_cond',
			                        fech_inic='$contrato->fech_inic',
               								fech_fin='$contrato->fech_fin',
               								indt_cont=$contrato->indt_cont,
               								mont_cont=$contrato->mont_cont,
               								codi_area='$contrato->codi_area',
               								ref_cont='$contrato->ref_cont',
				                      codi_trab=$contrato->codi_trab                     
       							WHERE codi_contr=$contrato->codi_contr  AND 
       								    codi_empr='$contrato->codi_empr' ";


        return MySQL::abrirQuery($sql);
    }

    function cargarFechaTmpAlta($year_tmp){
    	  $sql = "SELECT * FROM tmp_alta WHERE year_tmp=$year_tmp";
        $lista = MySQL::arrayObject($sql);
        return $lista[0];
    }

    function ingresarFechaEMO($codi_contr, $codi_empr, $codi_trab, $fech_emo){
    	$sql = "UPDATE contrato SET fech_emo='$fech_emo' 
    			WHERE codi_empr='$codi_empr' 
    				AND codi_trab=$codi_trab AND codi_contr=$codi_contr";
        return MySQL::abrirQuery($sql);
    }

    function guardarFechTmp($year, $fech_inic, $fech_fin){
      $sql = "UPDATE tmp_alta SET ini_tmp='$fech_inic', fin_tmp='$fech_fin' WHERE year_tmp='$year'";
      return MySQL::abrirQuery($sql);
    }
}
?>