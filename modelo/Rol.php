<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rol
 *
 * @author CARLOS
 */
class Rol {

    var $codi_rol;
    var $desc_rol;

    function __construct($codi_rol, $desc_rol) {
        $this->codi_rol = $codi_rol;
        $this->desc_rol = $desc_rol;
    }

}

?>
