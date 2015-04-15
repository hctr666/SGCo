<?php
   class Conec{
        function conectar(){
            $con = pg_connect("host=localhost port=5432 password=local user=postgres dbname=Unab") or die(":(");
			pg_set_client_encoding($con , "UTF-8");
            if (pg_ErrorMessage($con))
            {
                echo "<p><b>Ocurrio un error conectando a la base de datos: .</b></p>";
                exit;
            }
            return $con;
        }

        function desconectar($con){
            pg_close($con);
        }
		public static function numeroRegistros($consulta)
		{
			$con= new Conec();
			$cn=$con->conectar();
			$valor=pg_exec($cn,$consulta);		
			$num_row=pg_num_rows($valor);
			$con->desconectar($cn);
			return $num_row;
				
		}
        public static function ejecutarQuery($consulta){
			$con= new Conec();
			$cn=$con->conectar();
            $valor=pg_exec($cn,$consulta);			
            $arr = pg_fetch_array($valor);
	        $con->desconectar($cn);
            return $arr[0];
        }
        public static function abrirQuery($consulta){
			$con= new Conec();
			$cn=$con->conectar();
            $valor=pg_query($cn,$consulta);
            $con->desconectar($cn);
            return $valor;
        }
		public static function arrayObject($consulta){
            $conec = new Conec;
            $cn=$conec->conectar();            
            $query=pg_exec($cn,$consulta);            
            $filas=pg_numrows($query);            
            $conec->desconectar($cn);
            for($i=0;$i<$filas;$i++){
                $array[$i]=pg_Fetch_Object($query, $i);
            }            
			return $array;
        }	
		public static function abrirObject($consulta){
            $conec = new Conec;
            $con=$conec->conectar();
            $query=pg_exec($con,$consulta);
            $filas=pg_numrows($query);
            $conec->desconectar($con);
            for($i=0;$i<$filas;$i++){
                $array[$i]=pg_Fetch_Object($query, $i);
            }
			return $array[0];
        }
		function arrayQuery($consulta){
            $conec = new Conec;
            $con=$conec->conectar();
            $valor=pg_exec($con,$consulta);
			$conec->desconectar($con);
			return $valor;
        }
		function arrayQueryComercializacion($consulta){
            $conec = new Conec;
            $con=$conec->conectarComercializacion();
            $valor=pg_exec($con,$consulta);
			$conec->desconectar($con);
			return $valor;
        }
        function abrirRow($consulta){
            $conec = new Conec;
            $con=$conec->conectar();
            $valor=pg_exec($con,$consulta);
			$arr = pg_fetch_array($valor);
            $conec->desconectar($con);
            return $arr;
        }
		 function abrirRowComercializacion($consulta){
            $conec = new Conec;
            $con=$conec->conectarComercializacion();
            $valor=pg_exec($con,$consulta);
			$arr = pg_fetch_array($valor);
            $conec->desconectar($con);
            return $arr;
        }
        
		function arrayObjectComercializacion($consulta){
            $conec = new Conec;
            $con=$conec->conectarComercializacion();            
            $query=pg_exec($con,$consulta);            
            $filas=pg_numrows($query);            
            $conec->desconectar($con);
            for($i=0;$i<$filas;$i++){
                $array[$i]=pg_Fetch_Object($query, $i);
            }            
			return $array;
        }
        

   }
?>