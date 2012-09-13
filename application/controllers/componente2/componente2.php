<?php

/**
 * Contendrá todos los metodos utilizados para definir el componente 2
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Componente2 extends CI_Controller {

    public function index() {
        $informacion['titulo'] = 'Fortalecimiento de Gobiernos Locales';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
         $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/componente2_view');
        $this->load->view('plantilla/footer', $informacion);
    }

}

?>
