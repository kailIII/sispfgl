<?php

/**
 * Controlador para mostrar mapas
 *
 * @author Carlos Romero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Showmaps extends CI_Controller {

    public function index() {

        $informacion['titulo'] = 'Mapa de Partidos Politicos de Gobierno por Municipio';
         $informacion['tema'] = 'Mapa de Partidos Politicos de Gobierno por Municipio';

        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('mapas/partidos_politicos_view');
        $this->load->view('plantilla/footer', $informacion);
    }

}
