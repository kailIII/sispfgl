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
        $informacion['titulo'] = 'Fortalecimiento de Gobiernos Locales';
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu');
        $this->load->view('componente2/subcomp23/principal_view');
        $this->load->view('plantilla/footer', $informacion);
    }

   
    
    
}

?>
