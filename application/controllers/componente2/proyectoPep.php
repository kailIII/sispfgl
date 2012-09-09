<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas relacionadas
  a la gestión de los proyectos PEP
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProyectoPep extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $informacion['titulo'] = 'Proyectos para la Planeación Estratégica Participativa (PEPS)';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        
        /*OBTENER REGIONES DEL PAIS*/
        $this->load->model('pais/region');
        $informacion['regiones']=$this->region->obtenerRegiones();
        /*REGIONES*/
        
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('proyectopep/proyecto_pep_view',$informacion);
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function cargarDepartamentos() {
        $reg_id = $this->input->get("reg_id");
        $this->load->model('pais/departamento', 'depto');
        $departamentos = $this->depto->obtenerDepartamentosPorRegion($reg_id);
        $combo = "<select name='dep_id'>";
        $combo.= " <option value='0'> Seleccione</option>";
        foreach ($departamentos as $aux)
            $combo.= " <option value='" . $aux->dep_id . "'>" . $aux->dep_nombre . "</option>";
        $combo.="</select>";

        echo $combo;
    }

}

?>
