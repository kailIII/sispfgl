<?php

/**
 * Contendrá combinacion los mecombinacion utilizados para definir las pantallas relacionadas
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
            $rows = array();
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
        $this->form_validation->set_rules('cons_direccion', 'Dirección', 'max_length[200]');
        $this->form_validation->set_rules('cons_telefono', 'Teléfono', 'max_length[9]');
        $this->form_validation->set_rules('cons_telefono2', ';', 'max_length[9]');
        $this->form_validation->set_rules('cons_fax', 'Fax', 'max_length[9]');
        $this->form_validation->set_rules('cons_email', 'Correo Electrónico', 'max_length[200]|valid_email');
        $this->form_validation->set_rules('cons_repres_legal', 'Representante Legal', 'max_length[100]');
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

    public function coordinadores() {

        $informacion['titulo'] = 'Gestión de Coordinadores de los Proyectos PEP';
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
            $rows = array();
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

    public function registrarCoordinador() {

        /* REGLAS DE VALIDACIÒN */
        $this->form_validation->set_rules('con_nombre', 'Nombre del Consultor', 'required|max_length[75]');
        $this->form_validation->set_rules('con_apellido', 'Apellidos del Consultor', 'required|max_length[74]');
        $this->form_validation->set_rules('con_telefono', 'Teléfono', 'required|max_length[9]');
        $this->form_validation->set_rules('con_email', 'Correo Electrónico', 'required|max_length[200]|valid_email');
        $this->form_validation->set_rules('proyectoPep', '', '');
        $this->form_validation->set_rules('consultora', '', '');

        if ($this->form_validation->run() == FALSE) {

            $informacion['titulo'] = 'Registrar Coordinador';
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
            $this->load->model('proyectoPep/proyecto_pep', 'proPep');
            $this->load->model('consultor/consultor', 'con');
            $con_nombre = $this->input->post("con_nombre");
            $con_apellido = $this->input->post("con_apellido");
            $con_telefono = $this->input->post("con_telefono");
            $con_email = $this->input->post("con_email");
            $proyectoPep = $this->input->post("proyectoPep");
            $consultora = $this->input->post("selConsultoras");


            /* CREAR USUARIO EN BASE DE DATOS */
            $this->con->insertarConsultor($con_nombre, $con_apellido, $con_telefono, $con_email, $proyectoPep, $consultora);
            $con_id = $this->con->obtenerIdConsultorD();
            $resultado = $this->proPep->obtenerNombreDepMun($proyectoPep);
            $departamento = explode(" ", $resultado[0]->dep_nombre);
            $iniciales = substr(end($departamento), 0, 2);
            $nuevoUsuario = str_replace(" ", "", strtolower($iniciales) . $resultado[0]->dep_id . $resultado[0]->mun_id);
            $combinacion = "1234567890abcdefghijklmnopqrstuvwxyz";
             $contrasenia = substr(str_shuffle($combinacion), 0, 8);
            $email_activation = $this->config->item('email_activation', 'tank_auth');
            $informacion2 = $this->tank_auth->create_user($nuevoUsuario, $con_email, $contrasenia, 3, $email_activation);
            $informacion2['site_name'] = 'SIS-PFGL';
            $informacion2['activation_period'] = (60 * 60 * 24 * 20) / 3600;
            $this->_enviar_correo('activate', $con_email, $informacion2);
            $this->con->editarUsuarioConsultor($con_id[0]->con_id, $nuevoUsuario);

            $this->proPep->actualizarIndices('con_id', $con_id[0]->con_id, $proyectoPep);
            /* FIN DE CREAR USUARIO */
            redirect('consultor/consultoraC/coordinadores');
        }
    }

    public function editarCoordinador($con_id) {

        $informacion['titulo'] = 'Editar Coordinador';
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
        $this->load->model('consultor/consultor');
        $respuesta = $this->consultor->obtenerConsultor($con_id);
        $informacion['con_nombre'] = $respuesta[0]['con_nombre'];
        $informacion['con_apellido'] = $respuesta[0]['con_apellido'];
        $informacion['con_telefono'] = $respuesta[0]['con_telefono'];
        $informacion['con_email'] = $respuesta[0]['con_email'];
        $informacion['cons_id'] = $respuesta[0]['cons_id'];
        $pro_pep_id = $respuesta[0]['pro_pep_id'];
        $informacion['pro_pep_id'] = $pro_pep_id;
        $respuesta = $this->consultor->obtenerIdDepartamento($pro_pep_id);
        $informacion['reg_id'] = $respuesta[0]['Region'];
        $informacion['dep_id'] = $respuesta[0]['Depto'];
        $informacion['mun_id'] = $respuesta[0]['Muni'];
        $informacion['pro_pep_nombre'] = $respuesta[0]['Nombre'];
        $informacion['con_id'] = $con_id;
        /* CONSULTORAS */
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('consultor/editar_consultor_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarCoordinador($con_id) {
        $con_nombre = $this->input->post("con_nombre");
        $con_apellido = $this->input->post("con_apellido");
        $con_telefono = $this->input->post("con_telefono");
        $con_email = $this->input->post("con_email");
        $cons_id = $this->input->post("cons_id");
        if ($cons_id == 0)
            $cons_id = null;

        $this->load->model('consultor/consultor');
        $this->consultor->editarConsultor($con_email, $con_nombre, $con_apellido, $con_telefono,$cons_id,$con_id);

        redirect(base_url('consultor/consultoraC/coordinadores'));
    }

    function _enviar_correo($type, $email, &$informacion) {
        $this->load->library('email');
        $this->email->from($this->config->item('webmaster_email', 'tank_auth'), $informacion['site_name']);
        $this->email->to($email);
        $this->email->subject('Bienvenido a ' . $informacion['site_name']);
        $this->email->message($this->load->view('email/' . $type . '-html', $informacion, TRUE));
        $this->email->send();
    }

}

?>
