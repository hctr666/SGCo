<?php 
	
	class CFProfesional {
		
		public $codi_empr;
		public $codi_cfp;
		public $desc_cfp;
		public $ruc_cfp;
		public $dir_cfp;
		public $rep_cfp;

		function __construct($codi_empr, $codi_cfp, $desc_cfp, $ruc_cfp, $dir_cfp, $rep_cfp) {
			$this->codi_empr = $codi_empr;
			$this->codi_cfp = $codi_cfp;
			$this->desc_cfp = $desc_cfp;
			$this->ruc_cfp = $ruc_cfp;
			$this->dir_cfp = $dir_cfp;
			$this->rep_cfp = $rep_cfp;
		} 
	}
 ?>