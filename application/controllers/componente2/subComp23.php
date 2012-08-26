<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 1
 * Del PEP por los consultores asignados.
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SubComp23 extends CI_Controller {

    public function __construct() {
        parent::__construct();
     }

    public function etapa1_producto1() {

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

        $this->load->view('plantilla/header', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/producto1', $lista);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function etapa1_producto11() {
   
        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $this->load->model('criterio');
        $datos['criterios'] = $this->criterio->obtenerCriterios();
        $this->load->model('contrapartida');
        $datos['contrapartidas'] = $this->contrapartida->obtenerContrapartidas();

        $this->load->view('plantilla/header', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/producto11', $datos);
        $this->load->view('plantilla/footer', $informacion);
    }

}

?>
