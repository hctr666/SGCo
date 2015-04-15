<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mancu
 *
 * @author CARLOS
 */
require_once("UsuarioDAO.php");
require_once("Usuario.php");
class Mancu {
    function usuarioValidar(Usuario $usuario) {
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->validar($usuario);
    }
}

?>
