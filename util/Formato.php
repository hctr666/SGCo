<?php
class Formato
{
	public static function  formatear_array($template, $array)
	{
    	if (!is_array($array) || empty($template))
    	{
        	return false;
    	}
    	$string = '';
    	foreach ($array as $valor)
    	{
        	$string .= str_replace('%s', $valor, $template);
    	}
		$tam=strlen($string);
		$string=substr($string,0,$tam-2);
    	return $string;
		
	}
}
?>