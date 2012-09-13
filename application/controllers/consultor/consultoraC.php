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
        $ultimoCodigo = $this->consul->ultimoCodigo();
        $informacion['ultimoCodigo'] = $ultimoCodigo[0]->cons_id + 1;

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
            $this->load->view('consultor/registrar_consultora_view', $informacion);
            $this->load->view('plantilla/footer', $informacion);
        } else {
            //SI ESTA CORRECTO
            $cons_nombre = $this->input->post("cons_nombre");
            $cons_direccion = $this->input->post("cons_direccion");
            $cons_telefono = $this->input->post("cons_telefono");
            $cons_telefono2 = $this->input->post("cons_telefono2");
            $cons_fax = $this->input->post("cons_fax");
            $cons_email = $this->input->post("cons_email");
            $cons_repres_legal = $this->input->post("cons_repres_legal");
            $cons_observaciones = $this->input->post("cons_observaciones");
            $this->load->model('consultor/consultora', 'cons');

            $this->cons->insertarConsultora($cons_nombre, $cons_direccion, $cons_telefono, $cons_telefono2, $cons_fax, $cons_email, $cons_repres_legal, $cons_observaciones);
            $informacion['mensaje'] = 'Se inserto correctamente';
            $informacion['titulo'] = 'Gestión de Consultores y Consultores de los Proyectos PEP';
            $informacion['user_id'] = $this->tank_auth->get_user_id();
            $informacion['username'] = $this->tank_auth->get_username();
            $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());

            $this->load->view('plantilla/header', $informacion);
            $this->load->view('plantilla/menu', $informacion);
            $this->load->view('consultor/muestra_consultora_view', $informacion);
            $this->load->view('plantilla/footer', $informacion);
        }
    }

    public function editarConsultora($cons_id) {
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
            $this->load->model('consultor/consultora', 'consul');
            $consultoras = $this->consul->obtenerConsultoraPorId($cons_id);
            foreach ($consultoras as $consultora) {
                $informacion["cons_id_b"] = $consultora->cons_id;
                $informacion["cons_nombre_b"] = $consultora->cons_nombre;
                $informacion["cons_direccion_b"] = $consultora->cons_direccion;
                $informacion["cons_telefono_b"] = $consultora->cons_telefono;
                $informacion["cons_telefono2_b"] = $consultora->cons_telefono2;
                $informacion["cons_fax_b"] = $consultora->cons_fax;
                $informacion["cons_email_b"] = $consultora->cons_email;
                $informacion["cons_repres_legal_b"] = $consultora->cons_repres_legal;
                $informacion["cons_observaciones_b"] = $consultora->cons_observaciones;
            }
            $informacion['titulo'] = 'Editar Consultoras';
            $informacion['user_id'] = $this->tank_auth->get_user_id();
            $informacion['username'] = $this->tank_auth->get_username();
            $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());

            $this->load->view('plantilla/header', $informacion);
            $this->load->view('plantilla/menu', $informacion);
            $this->load->view('consultor/editar_consultora_view', $informacion);
            $this->load->view('plantilla/footer', $informacion);
        } else {
            //SI ESTA CORRECTO

            $cons_nombre = $this->input->post("cons_nombre");
            $cons_direccion = $this->input->post("cons_direccion");
            $cons_telefono = $this->input->post("cons_telefono");
            $cons_telefono2 = $this->input->post("cons_telefono2");
            $cons_fax = $this->input->post("cons_fax");
            $cons_email = $this->input->post("cons_email");
            $cons_repres_legal = $this->input->post("cons_repres_legal");
            $cons_observaciones = $this->input->post("cons_observaciones");
            $this->load->model('consultor/consultora', 'cons');

            $this->cons->editarConsultora($cons_id, $cons_nombre, $cons_direccion, $cons_telefono, $cons_telefono2, $cons_fax, $cons_email, $cons_repres_legal, $cons_observaciones);
            $informacion['mensaje'] = 'Se inserto correctamente';
            $informacion['titulo'] = 'Gestión de Consultores y Consultores de los Proyectos PEP';
            $informacion['user_id'] = $this->tank_auth->get_user_id();
            $informacion['username'] = $this->tank_auth->get_username();
            $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());

            $this->load->view('plantilla/header', $informacion);
            $this->load->view('plantilla/menu', $informacion);
            $this->load->view('consultor/muestra_consultora_view', $informacion);
            $this->load->view('plantilla/footer', $informacion);
        }
    }

    public function consultores() {

        $informacion['titulo'] = 'Gestión de Consultores de los Proyectos PEP';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());

        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('consultor/muestra_consultores_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarConsultores() {
        $this->load->model('consultor/consultor', 'con');
        $this->load->model('proyectoPep/proyecto_pep', 'propep');
        $consultores = $this->con->obtenerConsultores();
        $numfilas = count($consultores);

        $i = 0;
        foreach ($consultores as $aux) {
            $rows[$i]['id'] = $aux->con_id;
            $proyectoPep = $this->propep->obtenerNombreProyectos($aux->pro_pep_id);
            foreach ($proyectoPep as $pro_pep) {
                $rows[$i]['cell'] = array($aux->con_id,
                    $aux->con_nombre . ' ' . $aux->con_apellido,
                    $pro_pep->pro_pep_nombre,
                    $pro_pep->mun_nombre
                );
            }
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

    public function registrarConsultor() {

        /* REGLAS DE VALIDACIÒN */
        $this->form_validation->set_rules('con_nombre', 'Nombre del Consultor', 'required|max_length[75]');
        $this->form_validation->set_rules('con_apellido', 'Apellidos del Consultor', 'required|max_length[74]');
        $this->form_validation->set_rules('con_telefono', 'Teléfono', 'required|max_length[9]');
        $this->form_validation->set_rules('con_email', 'Correo Electrónico', 'required|max_length[200]|valid_email');
        $this->form_validation->set_rules('proyectoPep', '', '');
        $this->form_validation->set_rules('consultora', '', '');

        if ($this->form_validation->run() == FALSE) {

            $informacion['titulo'] = 'Registrar Consultoras';
            $informacion['user_id'] = $this->tank_auth->get_user_id();
            $informacion['username'] = $this->tank_auth->get_username();
            $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
            /* OBTENER REGIONES DEL PAIS */
            $this->load->model('pais/region');
            $informacion['regiones'] = $this->region->obtenerRegiones();
            /* REGIONES */
            /* OBTENER CONSULTORAS */
            $this->load->model('consultor/consultora', 'consul');
            $informacion['consultoras'] = $this->consul->obtenerConsultora();
            /* CONSULTORAS */
            $this->load->view('plantilla/header', $informacion);
            $this->load->view('plantilla/menu', $informacion);
            $this->load->view('consultor/registra_consultor_view', $informacion);
            $this->load->view('plantilla/footer', $informacion);
        } else {
            //SI ESTA CORRECTO
            $con_nombre = $this->input->post("con_nombre");
            $con_apellido = $this->input->post("con_apellido");
            $con_telefono = $this->input->post("con_telefono");
            $con_email = $this->input->post("con_email");
            $proyectoPep = $this->input->post("proyectoPep");
            $consultora = $this->input->post("selConsultoras");
            $this->load->model('consultor/consultor', 'con');

            /* CREAR USUARIO EN BASE DE DATOS*/
            $this->con->insertarConsultor($con_nombre, $con_apellido, $con_telefono, $con_email, $proyectoPep, $consultora);
            $posicion=strpos($con_email, '@');
            $nuevoUsuario=  strtolower(substr($con_email, 0,$posicion));
            $password= strtolower(substr($con_email, 0,$posicion));
            $email_activation = $this->config->item('email_activation', 'tank_auth');
                      
            $informacion2=$this->tank_auth->create_user($nuevoUsuario, $con_email, $password,3, $email_activation);
            $informacion2['site_name']	= 'SIS-PFGL';
            $informacion2['activation_period'] = (60 * 60 * 24 * 20) / 3600;
            $this->_enviar_correo('activate', $con_email, $informacion2);
            $this->con->editarUsuarioConsultor($con_email,$nuevoUsuario);
            /* FIN DE CREAR USUARIO */
            $informacion['titulo'] = 'Gestión de Consultores y Consultores de los Proyectos PEP';
            $informacion['user_id'] = $this->tank_auth->get_user_id();
            $informacion['username'] = $this->tank_auth->get_username();
            $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());

            $this->load->view('plantilla/header', $informacion);
            $this->load->view('plantilla/menu', $informacion);
            $this->load->view('consultor/muestra_consultores_view', $informacion);
            $this->load->view('plantilla/footer', $informacion);
        }
    }
    
      function _enviar_correo($type, $email, &$informacion)
	{
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $informacion['site_name']);
		$this->email->to($email);
		$this->email->subject('Bienvenido a '.$informacion['site_name']);
		$this->email->message($this->load->view('email/'.$type.'-html', $informacion, TRUE));
		$this->email->send();
	}

}

?>
