<?php

/**
 * Contendrá todos los metodos realacionados al registro del POA dentro del
 * sistema.
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Seguimiento extends CI_Controller {

    private $ruta = "poa/seguimiento/";
    private $dbPrefix = "poa_";

    public function __construct() {
        parent::__construct();
    }

    public function informacionComponente() {
        $informacion['titulo'] = 'Planificación Operativa Anual';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view($this->ruta.'gestion_componente_view');
        $this->load->view('plantilla/footer', $informacion);
    }

}

?>
