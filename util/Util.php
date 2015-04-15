<?php
	class Util{

		public static function encodeURIComponent($str){
        	//$revert = array('%20'=>' ','%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    		//return strtr(rawurlencode($str), $revert);
    		return str_replace($str, ' ', '%20%');
        
        }	
	}
?>
