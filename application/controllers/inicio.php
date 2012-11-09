<?php

/**
 * Controlador principal del Proyecto SMPFGL
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->lang->load('tank_auth');
    }

    public function index() {
        if (!$this->tank_auth->is_logged_in()) {
            $informacion['titulo'] = 'Sistema de Información y Seguimiento del Programa de Fortalecimiento de Gobiernos Locales';
            //CARGAR VISTA
            $this->load->view('plantilla/header', $informacion);
           // $this->load->view('plantilla/menu', $informacion);
            $this->load->view('inicio/construccion_view');
            $this->load->view('plantilla/footer', $informacion);
        } else {
            //ESTAS LINEAS SIEMPRE DEBEN IR PARA GENERAR EL MENU Y COLOCAR EL LOGOUT
            $informacion['titulo'] = 'Sistema de Información y Seguimiento del Programa de Fortalecimiento de Gobiernos Locales';
            $informacion['user_id'] = $this->tank_auth->get_user_id();
            $informacion['username'] = $this->tank_auth->get_username();
            $informacion['menu']=  $this->librerias->creaMenu($this->tank_auth->get_username());
            //CARGAR VISTAS
            $this->load->view('plantilla/header', $informacion);
            $this->load->view('plantilla/menu', $informacion);
            $this->load->view('inicio/inicio_view');
            $this->load->view('plantilla/footer', $informacion);
        }
    }

//FIN DEL INDEX
}
