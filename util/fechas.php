<?php 
	class Fechas
	{

		function getDia($d){
		}

		public static function getMes($m)
		{
			switch ($m) {
				case '01':
					return 'Enero';
					break;
				case '02':
					return 'Febrero';
					break;
				case '03':
					return 'Marzo';
					break;
				case '04':
					return 'Abril';
					break;
				
				case '05':
					return 'Mayo';
					break;
				case '06':
					return 'Junio';
					break;
				case '07':
					return 'Julio';
					break;
				case '08':
					return 'Agosto';
					break;
				case '09':
					return 'Setiembre';
					break;
				case '10':
					return 'Octubre';
					break;
				
				case '11':
					return 'Noviembre';
					break;
				case '12':
					return 'Diciembre';
					break;			
			}
		}

		public static function getNumMes($m)
		{
			switch ($m) {
				case 'Enero':
					return '01';
					break;
				case 'Febrero':
					return '02';
					break;
				case 'Marzo':
					return '03';
					break;
				case 'Abril':
					return '04';
					break;
				case 'Mayo':
					return '05';
					break;
				case 'Junio':
					return '06';
					break;
				case 'Julio':
					return '07';
					break;
				case 'Agosto':
					return '08';
					break;
				case 'Setiembre':
					return '09';
					break;
				case 'Octubre':
					return '10';
					break;
				case 'Noviembre':
					return '11';
					break;
				case 'Diciembre':
					return '12';
					break;			
			}
		}
	}
 ?>