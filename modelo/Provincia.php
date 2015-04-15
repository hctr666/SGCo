<?php 
	
	class Provincia
	{
		public $codi_empr;
		public $codi_prov;
		public $desc_prov;
		public $codi_depa;

		function __construct($codi_empr, $codi_prov, $desc_prov, $codi_depa)
		{
			$this->codi_empr = $codi_empr;
			$this->codi_prov = $codi_prov;
			$this->desc_prov = $desc_prov;
			$this->codi_depa = $codi_depa;
		}
	}


 ?>