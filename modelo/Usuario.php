<?php

class Usuario {

    public $codi_empr;
    public $codi_usua;
    public $appa_usua;
    public $apma_usua;
    public $nomb_usua;
    public $mail_usua;
    public $logi_usua;
    public $pass_usua;

    function __construct($codi_empr, $logi_usua, $pass_usua) {
        $this->codi_empr = $codi_empr;
        $this->logi_usua = $logi_usua;
        $this->pass_usua = $pass_usua;
    }

}

?>