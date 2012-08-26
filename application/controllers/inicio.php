<?php

/**
 * Controlador principal del Proyecto SMPFGL
 *
 * @author Ing. Karen Peñate
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function index() {

        $informacion['titulo'] = 'Sistema de Información y Seguimiento del Programa de Fortalecimiento de
Gobiernos Locales';

        $this->load->view('plantilla/header', $informacion);
        $this->load->view('inicio/inicio_view');
        $this->load->view('plantilla/footer', $informacion);
    }

}
