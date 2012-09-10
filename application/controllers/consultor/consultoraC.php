<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas relacionadas
 * a las Consultoras y Consultores.
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ConsultoraC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
    }

    public function index() {
        $informacion['titulo'] = 'Gestión de Consultores y Consultores de los Proyectos PEP';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());

        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('consultor/muestra_consultora_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarConsultoras() {
        $this->load->model('consultor/consultora', 'consul');
        $consultoras = $this->consul->obtenerConsultora();
        $numfilas = count($consultoras);

        $i = 0;
        foreach ($consultoras as $aux) {
            $rows[$i]['id'] = $aux->cons_id;
            $rows[$i]['cell'] = array($aux->cons_id,
                $aux->cons_nombre,
                $aux->cons_telefono
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array(' ', ' ', ' ');
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function registrarConsultora() {
        $this->load->model('consultor/consultora', 'consul');
        $ultimoCodigo=$this->consul->ultimoCodigo();
        $informacion['ultimoCodigo']=  $ultimoCodigo[0]->cons_id+1;
        
        /* REGLAS DE VALIDACIÒN */
        $this->form_validation->set_rules('cons_nombre', 'Nombre Consultora', 'required');
        $this->form_validation->set_rules('cons_direccion', 'Dirección', 'required|max_length[200]');
        $this->form_validation->set_rules('cons_telefono', 'Teléfono', 'required|max_length[9]');
        $this->form_validation->set_rules('cons_telefono2', ';', 'max_length[9]');
        $this->form_validation->set_rules('cons_fax', 'Fax', 'required|max_length[9]');
        $this->form_validation->set_rules('cons_email', 'Correo Electrónico', 'required|max_length[200]|valid_email');
        $this->form_validation->set_rules('cons_repres_legal', 'Representante Legal', 'required|max_length[100]');
        $this->form_validation->set_rules('cons_observaciones', 'Observaciones', '');

        if ($this->form_validation->run() == FALSE) {
          
            $informacion['titulo'] = 'Registrar Consultoras';
            $informacion['user_id'] = $this->tank_auth->get_user_id();
            $informacion['username'] = $this->tank_auth->get_username();
            $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());

            $this->load->view('plantilla/header', $informacion);
            $this->load->view('plantilla/menu', $informacion);
            $this->load->view('consultor/registrar_consultora_view',$informacion);
            $this->load->view('plantilla/footer', $informacion);
        } else {
            //SI ESTA CORRECTO
            $this->load->view('form_success');
        }
    }

}

?>
