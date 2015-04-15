<?php

class Area {

    public $codi_area;
    public $desc_area;

    function __construct($codi_area, $desc_area) {
        $this->codi_area = $codi_area;
        $this->desc_area = $desc_area;
    }

}

?>