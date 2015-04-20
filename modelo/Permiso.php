<?php

class Permiso {

    var $codi_usua;
    var $codi_rol;

    function __construct($codi_usua, $codi_rol) {
        $this->codi_usua = $codi_usua;
        $this->codi_rol = $codi_rol;
    }

}

?>
