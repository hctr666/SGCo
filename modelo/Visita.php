<?php

class Visita {

    public $codi_empr;
    public $codi_usua;
    public $fech_regi;
    

    function __construct($codi_empr, $codi_usua) {
        $this->codi_empr = $codi_empr;
        $this->codi_usua = $codi_usua;        
    }

}

?>