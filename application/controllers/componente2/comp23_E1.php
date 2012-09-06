<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 1
 * Del PEP por los consultores asignados.
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comp23_E1 extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
         $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/etapa1_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarInstituciones() {
        //PARA CREAR LA LISTA DESPLEGABLE DE LA INSTITUCION
        $this->load->model('institucion', 'institucion');
        $institucion = $this->institucion->obtenerInstitucion();
        $combo = "<select name='par_institucion'>";
        $combo.= " <option value='0'> Seleccione</option>";
        foreach ($institucion as $aux)
            $combo.= " <option value='" . $aux->ins_id . "'>" . $aux->ins_nombre . "</option>";
        $combo.="</select>";

        echo $combo;
    }

    public function registrarReunion() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
         $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/registrarReunion_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarReunion() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        //PARA CREAR LA LISTA DESPLEGABLE DE LA INSTITUCION
        $this->load->model('institucion', 'institucion');
        $institucion = $this->institucion->obtenerInstitucion();
        $numfilas = count($institucion);
        $cadena = "0:Seleccione;";
        $i = 1;
        foreach ($institucion as $aux) {
            if ($i != $numfilas)
                $cadena.= $aux->ins_id . ":" . $aux->ins_nombre . ";";
            else
                $cadena.= $aux->ins_id . ":" . $aux->ins_nombre;
            $i++;
        }
        $lista["cadena"] = $cadena;

        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
         $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/registrarReunion_view', $lista);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function muestraReuniones() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $this->load->model('reunion');
        $informacion['reuniones'] = $this->reunion->obtenerReuniones();
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
         $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/reuniones_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function acuerdoMunicipal() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $this->load->model('criterio');
        $datos['criterios'] = $this->criterio->obtenerCriterios();
        $this->load->model('contrapartida');
        $datos['contrapartidas'] = $this->contrapartida->obtenerContrapartidas();
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
         $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/acuerdoMunicipal_view', $datos);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function declaracionInteres() {

        $informacion['titulo'] = 'Componente 2.3';
        $this->load->view('plantilla/header');
         $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/declaracionInteres_view');
        $this->load->view('plantilla/footer');
    }

}

?>
