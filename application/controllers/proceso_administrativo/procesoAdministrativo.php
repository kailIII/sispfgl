<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 1
 * Del PEP por los consultores asignados.
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProcesoAdministrativo extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    
        public function gestion_criterios() {
        $informacion['titulo'] = 'Proceso de Adquisicion y Contrataciones';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('proceso_administrativo/seleccionConsultoraporGrupo_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function seleccion_consultora() {
        $informacion['titulo'] = 'Proceso de Adquisicion y Contrataciones';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('proceso_administrativo/seleccionConsultoraporGrupo_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
  
    

    



}

?>
