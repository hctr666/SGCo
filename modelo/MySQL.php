<?php
    
class MySQL {
    
    function conectar() {
        $con = mysql_connect("localhost", "root", "FUCKn0k14c300") or die(":(");
        mysql_select_db("ism") or die("Problemas al conectar con la BD:(");
        mysql_query("set names utf8");
        return $con;
    }

    function desconectar($con) {
        mysql_close($con);
    }

    public static function numeroRegistros($consulta) {
        $con = new MySQL();
        $cn = $con->conectar();
        $result = mysql_query($consulta);
        $row = mysql_fetch_row($result);
        $con->desconectar($cn);
        return $row[0];
    }

    public static function ejecutarQuery($consulta) {
        $con = new MySQL();
        $cn = $con->conectar();
        $valor = mysql_query($consulta);
        $arr = mysql_fetch_array($valor);
        $con->desconectar($cn);
        return $arr[0];
    }

    public static function abrirQuery($consulta) {
        $con = new MySQL();
        $cn = $con->conectar();
        $valor = mysql_query($consulta);
        $con->desconectar($cn);
        return $valor;
    }

    public static function arrayObject($consulta) {
        try {
            $conec = new MySQL();
            $cn = $conec->conectar();
            $query = mysql_query($consulta);
            $filas = mysql_num_rows($query);
            $conec->desconectar($cn);
            for ($i = 0; $i < $filas; $i++) {
                $array[$i] = mysql_fetch_object($query);
            }
            if (isset($array))
                return $array;
            else
                return array();
        } catch (Exception $e) {
            return array();
        }
    }

    public static function abrirObject($consulta) {
        $conec = new MySQL;
        $con = $conec->conectar();
        $query = mysql_query($con, $consulta);
        $filas = mysql_num_rows($query);
        $conec->desconectar($con);
        for ($i = 0; $i < $filas; $i++) {
            $array[$i] = mysql_fetch_object($query, $i);
        }
        return $array[0];
    }

    function arrayQuery($consulta) {
        $conec = new MySQL;
        $con = $conec->conectar();
        $valor = mysql_query($con, $consulta);
        $conec->desconectar($con);
        return $valor;
    }

    function abrirRow($consulta) {
        $conec = new MySQL;
        $con = $conec->conectar();
        $valor = pg_exec($con, $consulta);
        $arr = pg_fetch_array($valor);
        $conec->desconectar($con);
        return $arr;
    }

}

?>