<?php

/**
 * Controlador para las funciones de los roles del SISPFGL
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rol extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->lang->load('tank_auth');
    }

    public function consultarRolesJSON() {

        $this->load->model('rol');
        $roles = $this->rol->obtenerRoles();
        $select = "<select>";
        foreach ($roles as $aux) 
            $select .= "<option value=" . $aux->rol_id . ">" . $aux->rol_nombre  . "</option>";
        

        $select .= "</select>";

        echo $select;
        
    }

}

?>
