<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 1
 * Del PEP por los consultores asignados.
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comp23 extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $informacion['titulo'] = 'Fortalecimiento de Gobiernos Locales';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/principal_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function revisionProducto() {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $informacion['titulo'] = 'Fortalecimiento de Gobiernos Locales';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/revisionProducto_view');
        $this->load->view('plantilla/footer', $informacion);
    }

}

?>
