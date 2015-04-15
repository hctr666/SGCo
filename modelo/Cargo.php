<?php

class Cargo {

    public $codi_empr;
    public $codi_carg;
    public $desc_carg;
    public $codi_tipo;

    function __construct($codi_empr, $codi_carg, $desc_carg, $codi_tipo) {
        $this->codi_empr = $codi_empr;
        $this->codi_carg = $codi_carg;
        $this->desc_carg = $desc_carg;
        $this->codi_tipo = $codi_tipo;
    }

}

?>