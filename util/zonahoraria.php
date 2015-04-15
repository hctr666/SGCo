<?php
	$timezone = "America/Lima"; // sets the timezone or region
	if(function_exists('date_default_timezone_set')){
	    date_default_timezone_set($timezone); 
	    console.log(date("Y-m-d"));
	}
?>