<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 0
 * Del Componente 2.4
 *
 * @author Alexis Beltran
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comp24_E0 extends CI_Controller {

    private $ruta = "componente2/subcomp24/etapa0/";
    private $tbl_acuerdo_municipal = 'acuerdo_municipal2';

    public function __construct() {
        parent::__construct();
        $this->load->model('pais/departamento');
        $this->load->model('componente2/comp24');
        $this->load->library('librerias');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        $this->form_validation->set_message('is_natural_no_zero', '* Obligatorio');
    }

    /**
     * Funciones Generales de la etapa
     */

    /**
     * Compueba si el elemento a es mayor que el a.
     * Form_validation Callback
     */
    public function periodo_check($a, $b = false) {
        $b = $this->form_validation->set_value($b);
        if ($b != false) {
            if ($a > $b) {
                return true;
            }
        }
        $this->form_validation->set_message('periodo_check', 'Debe ser mayor.');
        return false;
    }

    /**
     * Obtener Departamentos por permiso.
     * by Alexis Beltran
     * 
     * Retorna un array con id,dep_nombre, si posee permiso.
     */
    public function getDepartamentos() {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $deptos = $this->db->get_where('c24_user_depto', array('user_id' => $this->tank_auth->get_user_id()));
        if ($deptos->num_rows() > 0) {
            $deptos = explode(',', $deptos);
            $this->db->where_in('dep_id', $deptos);
        }
        $this->db->order_by('dep_id', 'ASC');
        $salida['0'] = 'Seleccione';
        foreach ($this->db->get('departamento')->result() as $row) {
            $salida[$row->dep_id] = $row->dep_nombre;
        }
        //print_r($salida);
        return $salida;
    }

    /**
     * Genera un listado de los municipio que posee un departameneto
     * para se ingresado en un select.
     */
    public function getMunicipios($depto_id, $selected = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $this->db->where('dep_id', $depto_id);
        $this->db->order_by('mun_id', 'asc');
        $res = $this->db->get('municipio');
        $salida = "<option value=\"0\">-- Seleccione --</option>\n";
        foreach ($res->result() as $row) {
            $salida = $salida . '<option value="' . $row->mun_id . '" ';
            if ($selected && $selected == $row->mun_id) {
                $salida = $salida . 'selected="selected"';
            }
            $salida = $salida . '>' . $row->mun_nombre . "</option>\n";
        }
        echo $salida;
    }

    /**
     * @param 
     */
    function getConsultores($selected = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $this->db->order_by('con_nombre', 'asc');
        $res = $this->db->get('cat_consultores');
        $salida = "<option value=\"0\">-- Seleccione --</option>\n";
        foreach ($res->result() as $row) {
            $salida = $salida . '<option value="' . $row->con_id . '" ';
            if ($selected && $selected == $row->con_id) {
                $salida = $salida . 'selected="selected"';
            }
            $salida = $salida . ">$row->con_id| $row->con_nombre</option>\n";
        }
        return $salida;
    }

    /**
     * Cuenta la cantidad de personas por sexo
     */
    function count_sexo($tabla, $campo_sexo, $campo_index, $index) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in
        echo json_encode($this->comp24->count_sexo($tabla, $campo_sexo, $campo_index, $index));
    }

    /**
     * Subir un archivo.
     * Library upload
     * 
     * @return ruta del archivo guardado.
     */
    function uploadFile($tabla, $campo, $index, $id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $config['upload_path'] = './documentos/' . $tabla;
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = '1024';
        $config['overwrite'] = true;
        $nombre = end(explode('_', $campo));
        $ext = end(explode('.', $_FILES['userfile']['name']));
        $config['file_name'] = $nombre . '_' . $id . '.' . $ext;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            echo 'error';
        } else {
            $res = $this->upload->data();
            //meter en db
            $ruta = "documentos/$tabla/" . $config['file_name'];
            $this->comp24->update_row($tabla, $index, $id, array($campo => $ruta));
            echo base_url() . $ruta;
        }
    }

    function setNewId($tabla, $campo, $data) {
        $this->db->insert($tabla, $data);
        echo $this->db->last_query();
        $lastId = $this->db->query("SELECT $campo FROM $tabla ORDER BY $campo DESC LIMIT 1;")->row()->$campo;
        return $lastId;
    }

    public function index() {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $this->load->view('componente2/subcomp24/front', array('titulo' => 'Componente',
            'user_uid' => $this->tank_auth->get_user_id(),
            'username' => $this->tank_auth->get_username(),
            'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->comp24->getDepartamentos()
        ));
    }

    public function setUserDepto() {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $users = '';
        foreach ($this->comp24->select_data('users', array('rol_id' => 8))->result() as $row) {
            $users .= $row->username . '!' . $row->id . "<br/>\n";
        }

        $this->load->view('componente2/subcomp24/admin', array('titulo' => 'Componente',
            'user_uid' => $this->tank_auth->get_user_id(),
            'username' => $this->tank_auth->get_username(),
            'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'users' => $users
        ));
    }

    public function loadUserRol8() {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in
        $data = $this->comp24->select_data('c24_user_depto');
        echo $this->librerias->json_out($data, 'uxd_id', array('uxd_id', 'user_id', 'deptos'));
    }

    public function gestionUserRol8() {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $tabla = 'c24_user_depto';
        $campo = 'uxd_id';
        $index = $this->input->post('id');

        $data = array(
            $campo => $lastId = $this->db->query("SELECT $campo FROM $tabla ORDER BY $campo DESC LIMIT 1;")->row()->$campo + 1,
            'user_id' => $this->input->post('user_id'),
            'deptos' => $this->input->post('deptos')
        );

        switch ($this->input->post('oper')) {
            case 'add': $this->comp24->insert_row($tabla, $data);
                break;
            case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data);
                break;
            case 'del': $this->comp24->db_row_delete($tabla, $campo, $index);
                break;
        }
    }

    public function solicitudAyuda() {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $config = array(
            array('field' => 'mun_id', 'label' => 'Municipio', 'rules' => 'trim|required|xss_clean|is_natural_no_zero'),
            array('field' => 'f_emision', 'label' => 'Emision', 'rules' => 'trim|required|xss_clean'),
            array('field' => 'f_recepcion', 'label' => 'Recepcion', 'rules' => 'required|xss_clean')
        );

        $this->form_validation->set_rules($config);

        $data['errors'] = array();
        $mensaje = false;

        if ($this->form_validation->run()) {
            if (!is_null($data = $this->comp24->insert_solicitud_ayuda(
                            $this->form_validation->set_value('mun_id'), $this->form_validation->set_value('f_emision'), $this->form_validation->set_value('f_recepcion')
                    ))) {
                $this->session->set_flashdata('message', 'Ok');
                redirect(current_url());
            } else {
                $errors = $this->tank_auth->get_error_message();
                foreach ($errors as $k => $v)
                    $data['errors'][$k] = $this->lang->line($v);
            }
        }


        $this->load->view($this->ruta . 'solicitudAyuda_view', array('titulo' => 'Solicitud de Ayuda',
            'user_uid' => $this->tank_auth->get_user_id(),
            'username' => $this->tank_auth->get_username(),
            'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->comp24->getDepartamentos(),
            'mensaje' => $mensaje
        ));
    }

    /**
     * B. Acuerdos Municipales
     */
    public function acuerdoMunicipal($id = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in
        $tabla = 'acuerdo_municipal2';
        $campo = 'acu_mun_id';
        $prefix = 'acu_mun_';

        if ($id && !isset($_POST['mod'])) {
            if (!($tmp = $this->comp24->get_by_id($tabla, $campo, $id))) {
                $this->comp24->insert_row($tabla, array($campo => $id, 'mun_id' => $id));
                $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            }
            $_POST = get_object_vars($tmp);
            $_POST['acu_mun_fecha_conformacion'] = $this->librerias->parse_output('date', $_POST['acu_mun_fecha_conformacion']);
            $_POST['acu_mun_fecha_acuerdo'] = $this->librerias->parse_output('date', $_POST['acu_mun_fecha_acuerdo']);
            $_POST['acu_mun_fecha_recepcion'] = $this->librerias->parse_output('date', $_POST['acu_mun_fecha_recepcion']);
        }

        if (isset($_POST['mun_id']) && $_POST['mun_id'] > '0') {
            $_POST['depto'] = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni'] = $this->comp24->get_by_Id('municipio', 'mun_id', $_POST['mun_id'])->mun_nombre;
        }

        $config = array(
            array('field' => 'depto', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'mun_id', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'acu_mun_fecha_conformacion', 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => 'acu_mun_fecha_acuerdo', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => 'acu_mun_fecha_recepcion', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => 'acu_mun_archivo_acuerdo', 'label' => 'Fecha', 'rules' => 'trim|alpha_dash|xss_clean'),
            array('field' => 'acu_mun_observaciones', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean')
        );

        $this->form_validation->set_rules($config);

        $data['errors'] = array();
        $mensaje = false;

        if ($this->form_validation->run()) {
            $datos = array(
                $prefix . 'fecha_conformacion' => $this->librerias->parse_input('date', $this->form_validation->set_value('acu_mun_fecha_conformacion')),
                $prefix . 'fecha_acuerdo' => $this->librerias->parse_input('date', $this->form_validation->set_value('acu_mun_fecha_acuerdo')),
                $prefix . 'fecha_recepcion' => $this->librerias->parse_input('date', $this->form_validation->set_value('acu_mun_fecha_recepcion')),
                $prefix . 'observaciones' => $this->form_validation->set_value('acu_mun_observaciones')
            );

            if ($id > '0') {
                if (!is_null($data = $this->comp24->update_row($tabla, $campo, (int) $id, $datos))) {
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/' . $id, current_url());
                    redirect($t[0]);
                }
            } else {
                if (!is_null($data = $this->comp24->insert_acuerdo_municipal(
                                $this->form_validation->set_value('mun_id'), $this->form_validation->set_value('acu_mun_fecha_acuerdo'), $this->form_validation->set_value('acu_mun_fecha_recepcion'), $this->form_validation->set_value('acu_mun_fecha_conformacion'), $this->form_validation->set_value('acu_mun_observaciones')
                        ))) {
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/0', current_url());
                    redirect($t[0]);
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $data['errors'][$k] = $this->lang->line($v);
                }
            }
        } else if (($mun = $this->input->post('mun_id')) != '0' && $id == false) {
            //
            redirect(current_url() . '/' . $this->setNewId($tabla, $campo, array('mun_id' => $mun)));
        }

        $this->load->view($this->ruta . 'acuerdoMunicipal', array('titulo' => 'Solicitud de Ayuda',
            'user_uid' => $this->tank_auth->get_user_id(),
            'username' => $this->tank_auth->get_username(),
            'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->comp24->getDepartamentos(),
            $campo => $id
        ));
    }

    function getAcuerdosMunicipales($mun_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in
        $data = $this->comp24->select_data('acuerdo_municipal2', array('mun_id' => $mun_id));
        echo $this->librerias->json_out($data, 'acu_mun_id', array('acu_mun_id', 'acu_mun_fecha_conformacion'));
    }

    public function acuMun_loadMiembros($id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $d = $this->comp24->select_data('acumun_miembros', array('acu_mun_id' => $id));

        echo $this->librerias->json_out($d, 'mie_id');
    }

    /**
     * Procesa las solicitudes para la tabla acumun_miembros
     */
    public function acuMun_gestionMiembros($id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $tabla = 'acumun_miembros';
        $campo = 'mie_id';
        $index = $this->input->post('id');

        $data = array(
            'acu_mun_id' => $id,
            'mie_nombre' => $this->input->post('mie_nombre'),
            'mie_apellidos' => $this->input->post('mie_apellidos'),
            'mie_sexo' => $this->input->post('mie_sexo'),
            'mie_cargo' => $this->input->post('mie_cargo'),
            'mie_nivel' => $this->input->post('mie_nivel'),
            'mie_edad' => $this->input->post('mie_edad'),
            'mie_telefono' => $this->librerias->parse_input('phone', $this->input->post('mie_telefono'))
        );

        switch ($this->input->post('oper')) {
            case 'add': $this->comp24->insert_row($tabla, $data);
                break;
            case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data);
                break;
            case 'del': $this->comp24->db_row_delete($tabla, $campo, $index);
                break;
        }
    }

    /**
     * C. Asistencia Tecnica
     */
    public function solicitudAsistenciaTecnica($id = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in
        $tabla = 'asistencia_tecnica';
        $campo = 'asi_tec_id';
        $prefix = 'asi_tec_';
        
        if ($id && !isset($_POST['mod'])) {
            if (!($tmp = $this->comp24->get_by_id($tabla, $campo, $id))) {
                $this->comp24->insert_row($tabla, array($campo => $id, 'mun_id' => $id));
                $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            }
            $_POST = get_object_vars($tmp);
            $_POST[$prefix . 'fecha_solicitud'] = $this->librerias->parse_output('date', $_POST[$prefix . 'fecha_solicitud']);
            $_POST[$prefix . 'fecha_emision'] = $this->librerias->parse_output('date', $_POST[$prefix . 'fecha_emision']);
            $_POST[$prefix . 'fecha_envio'] = $this->librerias->parse_output('date', $_POST[$prefix . 'fecha_envio']);
            $_POST[$prefix . 'fecha_inicio'] = $this->librerias->parse_output('date', $_POST[$prefix . 'fecha_inicio']);
         /*   $_POST[$prefix . 'consultor'] = $this->form_validation->set_value($_POST[$prefix . 'consultor']);
            $_POST[$prefix . 'observaciones'] = $this->form_validation->set_value($_POST[$prefix . 'observaciones']);*/
        }

        if (isset($_POST['mun_id']) && $_POST['mun_id'] > 0) {
            $_POST['depto'] = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni'] = $this->comp24->get_by_Id('municipio', 'mun_id', $_POST['mun_id'])->mun_nombre;
        }

        $config = array(
            array('field' => 'depto', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'fecha_solicitud', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'fecha_emision', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'fecha_envio', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'fecha_inicio', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'archivo_perfil', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'archivo_trd', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'archivo_acuerdo', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'observaciones', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'consultor', 'label' => 'Consultor', 'rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean')
        );

        $this->form_validation->set_rules($config);

        $data['errors'] = array();
        $mensaje = false;

        if ($this->form_validation->run()) {
            $datos = array(
                $prefix . 'fecha_solicitud' => $this->librerias->parse_input('date', $this->form_validation->set_value($prefix . 'fecha_solicitud')),
                $prefix . 'fecha_emision' => $this->librerias->parse_input('date', $this->form_validation->set_value($prefix . 'fecha_emision')),
                $prefix . 'fecha_envio' => $this->librerias->parse_input('date', $this->form_validation->set_value($prefix . 'fecha_envio')),
                $prefix . 'fecha_inicio' => $this->librerias->parse_input('date', $this->form_validation->set_value($prefix . 'fecha_inicio')),
                $prefix . 'observaciones' => $this->form_validation->set_value($prefix . 'observaciones'),
                $prefix . 'consultor' => $this->form_validation->set_value($prefix . 'consultor')
                ); 
            if ($id > 0) {
                if (!is_null($data = $this->comp24->update_row($tabla, $campo, $id, $datos))) {
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/' . $id, current_url());
                    redirect($t[0]);
                }
            } else {
                if (!is_null($data = $this->comp24->insert_solicitud_asistencia_tecnica(
                                $this->form_validation->set_value('mun_id'), 
                                $this->form_validation->set_value('asi_tec_fecha_solicitud'), 
                                $this->form_validation->set_value('asi_tec_fecha_emision'), 
                                $this->form_validation->set_value('asi_tec_fecha_envio'),
                                $this->form_validation->set_value('asi_tec_fecha_inicio'),
                                $this->form_validation->set_value('asi_tec_archivo_perfil'), 
                                $this->form_validation->set_value('asi_tec_archivo_tdr'),
                                $this->form_validation->set_value('asi_tec_archivo_acuerdo'),
                                $this->form_validation->set_value('asi_tec_observaciones'),
                                $this->form_validation->set_value('asi_tec_consultor')
                        ))) {
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/0', current_url());
                    redirect($t[0]);
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $data['errors'][$k] = $this->lang->line($v);
                }
            }
        } else if (($mun = $this->input->post('mun_id')) != 0 && $id == false) {
            //
            redirect(current_url() . '/' . $this->setNewId($tabla, $campo, array('mun_id' => $mun)));
        }

        $this->load->view($this->ruta . 'solicitudAsistenciaTecnica', array('titulo' => 'Solicitud de Asistencia Tecnica',
            'user_uid' => $this->tank_auth->get_user_id(),
            'username' => $this->tank_auth->get_username(),
            'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->comp24->getDepartamentos(),
           /* 'consultores' => $this->getConsultores(),*/
            $campo => $id
        ));
    }

    public function getAsistenciasTecnicas($mun_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $data = $this->comp24->select_data('asistencia_tecnica', array('mun_id' => $mun_id));
        echo $this->librerias->json_out($data, 'asi_tec_id', array('asi_tec_id'));
                /*, 
               'asi_tec_fecha_solicitud','asi_tec_fecha_emision',
               'asi_tec_fecha_envio','asi_tec_fecha_inicio',
               'asi_tec_observaciones','asi_tec_consultor'));*/
    }

    public function asiTec_loadMiembros($id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in
        $d = $this->comp24->select_data('asitec_miembros', array('asi_tec_id' => $id));
        echo $this->librerias->json_out($d, 'mie_id');
    }

    public function asitec_gestionMiembros($id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $tabla = 'asitec_miembros';
        $campo = 'mie_id';
        $index = $this->input->post('id');

        $data = array(
            'asi_tec_id' => $id,
            'mie_nombre' => $this->input->post('mie_nombre'),
            'mie_apellidos' => $this->input->post('mie_apellidos'),
            'mie_sexo' => $this->input->post('mie_sexo'),
            'mie_cargo' => $this->input->post('mie_cargo'),
            'mie_nivel' => $this->input->post('mie_nivel'),
            'mie_edad' => $this->input->post('mie_edad'),
            'mie_telefono' => $this->librerias->parse_input('phone', $this->input->post('mie_telefono'))
        );

        switch ($this->input->post('oper')) {
            case 'add': $this->comp24->insert_row($tabla, $data);
                break;
            case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data);
                break;
            case 'del': $this->comp24->db_row_delete($tabla, $campo, $index);
                break;
        }
    }

    /**
     * D. Indicadores de Desempeno Administrativo y Financiero Municipal 1
     */
    public function indicadoresDesempenoAdmin($id = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in
        $tabla = 'indicadores_desempeno1';
        $campo = 'ind_des_id';
        $prefix = 'ind_des_';

        if ($id && !isset($_POST['mod'])) {
            if (!($tmp = $this->comp24->get_by_id($tabla, $campo, $id))) {
                $this->comp24->insert_row($tabla, array($campo => $id, 'mun_id' => $id));
                $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            }
            $_POST = get_object_vars($tmp);
            //print_r($_POST);die();    //test
            $_POST[$prefix . 'fecha'] = $this->librerias->parse_output('date', $_POST[$prefix . 'fecha']);
        }

        if (isset($_POST['mun_id']) && $_POST['mun_id'] > 0) {
            $_POST['depto'] = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni'] = $this->comp24->get_by_Id('municipio', 'mun_id', $_POST['mun_id'])->mun_nombre;
        }

        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('numeric', '*');

        $config = array(
            array('field' => 'depto', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean'),
            array('field' => 'mun_id', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'fecha', 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix . 'periodo_inicio', 'label' => 'Periodo', 'rules' => 'trim|required|integer|xss_clean'),
            array('field' => $prefix . 'periodo_fin', 'label' => 'Periodo', 'rules' => 'trim|required|integer|xss_clean|callback_periodo_check[ind_des_periodo_inicio]'),
            array('field' => $prefix . 'grupo1_pascir', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo1_deucorpla', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo1_int', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo1_ahoope', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo1_intdeu', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo1_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo2_deumuntot', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo2_ingopeper', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo2_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'observaciones', 'label' => 'Fecha', 'rules' => 'trim|xss_clean')
        );

        $this->form_validation->set_rules($config);

        $data['errors'] = array();
        $mensaje = false;

        if ($this->form_validation->run()) {
            $datos = array(
                $prefix . 'fecha' => $this->comp24->changeDate($this->form_validation->set_value($prefix . 'fecha')),
                $prefix . 'periodo_inicio' => $this->form_validation->set_value($prefix . 'periodo_inicio'),
                $prefix . 'periodo_fin' => $this->form_validation->set_value($prefix . 'periodo_fin'),
                $prefix . 'grupo1_pascir' => $this->form_validation->set_value($prefix . 'grupo1_pascir'),
                $prefix . 'grupo1_deucorpla' => $this->form_validation->set_value($prefix . 'grupo1_deucorpla'),
                $prefix . 'grupo1_int' => $this->form_validation->set_value($prefix . 'grupo1_int'),
                $prefix . 'grupo1_ahoope' => $this->form_validation->set_value($prefix . 'grupo1_ahoope'),
                $prefix . 'grupo1_intdeu' => $this->form_validation->set_value($prefix . 'grupo1_intdeu'),
                $prefix . 'grupo1_total' => $this->form_validation->set_value($prefix . 'grupo1_total'),
                $prefix . 'grupo2_deumuntot' => $this->form_validation->set_value($prefix . 'grupo2_deumuntot'),
                $prefix . 'grupo2_ingopeper' => $this->form_validation->set_value($prefix . 'grupo2_ingopeper'),
                $prefix . 'grupo2_total' => $this->form_validation->set_value($prefix . 'grupo2_total'),
                $prefix . 'observaciones' => $this->form_validation->set_value($prefix . 'observaciones')
            );

            if (!is_null($data = $this->comp24->update_row($tabla, $campo, $id, $datos))) {
                $this->session->set_flashdata('message', 'Ok');
                $t = explode('/' . $id, current_url());
                redirect($t[0]);
            } else {
                $errors = $this->tank_auth->get_error_message();
                foreach ($errors as $k => $v)
                    $data['errors'][$k] = $this->lang->line($v);
            }
        }

        $this->load->view($this->ruta . 'D', array('titulo' => 'Elaboracion de Diagnostico',
            'user_uid' => $this->tank_auth->get_user_id(),
            'username' => $this->tank_auth->get_username(),
            'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->comp24->getDepartamentos(),
            $campo => $id
        ));
    }

    /**
     * 
     * E. 
     */
    public function E($id = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in
        $tabla = 'indicadores_desempeno2';
        $campo = 'ind_des_id';
        $prefix = 'ind_des_';

        if ($id && !isset($_POST['mod'])) {
            if (!$tmp = $this->comp24->get_by_id($tabla, $campo, $id)) {
                $this->comp24->insert_row($tabla, array($campo => $id, 'mun_id' => $id));
                $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            }
            $_POST = get_object_vars($tmp);
            $_POST[$prefix . 'fecha'] = $this->librerias->parse_output('date', $_POST[$prefix . 'fecha']);
        }

        if (isset($_POST['mun_id']) && $_POST['mun_id'] > 0) {
            $_POST['depto'] = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni'] = $this->comp24->get_by_Id('municipio', 'mun_id', $_POST['mun_id'])->mun_nombre;
        }

        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('numeric', '*');

        $config = array(
            array('field' => 'depto', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean'),
            array('field' => 'mun_id', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'fecha', 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix . 'periodo_inicio', 'label' => 'Periodo', 'rules' => 'trim|required|integer|xss_clean'),
            array('field' => $prefix . 'periodo_fin', 'label' => 'Periodo', 'rules' => 'trim|required|integer|xss_clean|callback_periodo_check[ind_des_periodo_inicio]'),
            array('field' => $prefix . 'grupo1_ingtotpre', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo1_gastotdev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo1_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo2_ingprodev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo2_totingdev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo2_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo3_moningpro', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo3_totingdev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo3_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo4_moningpro', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo4_moningpre', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo4_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo5_totingtas', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo5_totingpro', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo5_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo6_totingimp', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo6_totingpro', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo6_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'observaciones', 'label' => 'Fecha', 'rules' => 'trim|xss_clean')
        );

        $this->form_validation->set_rules($config);

        $data['errors'] = array();
        $mensaje = false;

        if ($this->form_validation->run()) {
            $datos = array(
                $prefix . 'fecha' => $this->comp24->changeDate($this->form_validation->set_value($prefix . 'fecha')),
                $prefix . 'periodo_inicio' => $this->form_validation->set_value($prefix . 'periodo_inicio'),
                $prefix . 'periodo_fin' => $this->form_validation->set_value($prefix . 'periodo_fin'),
                $prefix . 'grupo1_ingtotpre' => $this->form_validation->set_value($prefix . 'grupo1_ingtotpre'),
                $prefix . 'grupo1_gastotdev' => $this->form_validation->set_value($prefix . 'grupo1_gastotdev'),
                $prefix . 'grupo1_total' => $this->form_validation->set_value($prefix . 'grupo1_total'),
                $prefix . 'grupo2_ingprodev' => $this->form_validation->set_value($prefix . 'grupo2_ingprodev'),
                $prefix . 'grupo2_totingdev' => $this->form_validation->set_value($prefix . 'grupo2_totingdev'),
                $prefix . 'grupo2_total' => $this->form_validation->set_value($prefix . 'grupo2_total'),
                $prefix . 'grupo3_moningpro' => $this->form_validation->set_value($prefix . 'grupo3_moningpro'),
                $prefix . 'grupo3_totingdev' => $this->form_validation->set_value($prefix . 'grupo3_totingdev'),
                $prefix . 'grupo3_total' => $this->form_validation->set_value($prefix . 'grupo3_total'),
                $prefix . 'grupo4_moningpro' => $this->form_validation->set_value($prefix . 'grupo4_moningpro'),
                $prefix . 'grupo4_moningpre' => $this->form_validation->set_value($prefix . 'grupo4_moningpre'),
                $prefix . 'grupo4_total' => $this->form_validation->set_value($prefix . 'grupo4_total'),
                $prefix . 'grupo5_totingtas' => $this->form_validation->set_value($prefix . 'grupo5_totingtas'),
                $prefix . 'grupo5_totingpro' => $this->form_validation->set_value($prefix . 'grupo5_totingpro'),
                $prefix . 'grupo5_total' => $this->form_validation->set_value($prefix . 'grupo5_total'),
                $prefix . 'grupo6_totingimp' => $this->form_validation->set_value($prefix . 'grupo6_totingimp'),
                $prefix . 'grupo6_totingpro' => $this->form_validation->set_value($prefix . 'grupo6_totingpro'),
                $prefix . 'grupo6_total' => $this->form_validation->set_value($prefix . 'grupo6_total'),
                $prefix . 'observaciones' => $this->form_validation->set_value($prefix . 'observaciones')
            );

            if (!is_null($data = $this->comp24->update_row($tabla, $campo, $id, $datos))) {
                $this->session->set_flashdata('message', 'Ok');
                $t = explode('/' . $id, current_url());
                redirect($t[0]);
            } else {
                $errors = $this->tank_auth->get_error_message();
                foreach ($errors as $k => $v)
                    $data['errors'][$k] = $this->lang->line($v);
            }
        }

        $this->load->view($this->ruta . 'E', array('titulo' => 'Elaboracion de Diagnostico',
            'user_uid' => $this->tank_auth->get_user_id(),
            'username' => $this->tank_auth->get_username(),
            'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->comp24->getDepartamentos(),
            $campo => $id
        ));
    }

    /**
     * F.
     */
    public function F($id = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in
        $tabla = 'indicadores_desempeno3';
        $campo = 'ind_des_id';
        $prefix = 'ind_des_';

        if ($id && !isset($_POST['mod'])) {
            if (!($tmp = $this->comp24->get_by_id($tabla, $campo, $id))) {
                $this->comp24->insert_row($tabla, array($campo => $id, 'mun_id' => $id));
                $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            }
            $_POST = get_object_vars($tmp);
            $_POST[$prefix . 'fecha'] = $this->librerias->parse_output('date', $_POST[$prefix . 'fecha']);
        }

        if (isset($_POST['mun_id']) && $_POST['mun_id'] > 0) {
            $_POST['depto'] = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni'] = $this->comp24->get_by_Id('municipio', 'mun_id', $_POST['mun_id'])->mun_nombre;
        }

        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('numeric', '*');

        $config = array(
            array('field' => 'depto', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean'),
            array('field' => 'mun_id', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'fecha', 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix . 'periodo_inicio', 'label' => 'Periodo', 'rules' => 'trim|required|integer|xss_clean'),
            array('field' => $prefix . 'periodo_fin', 'label' => 'Periodo', 'rules' => 'trim|required|integer|xss_clean|callback_periodo_check[ind_des_periodo_inicio]'),
            array('field' => $prefix . 'grupo1_ingcorpre', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo1_gascordev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo1_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo2_gascordev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo2_totgascor', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo2_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo3_ejegasinv', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo3_totgasinv', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo3_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo4_gascordev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo4_ingcorper', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo4_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo5_armderdeu', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo5_egrtotdev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo5_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo6_gascordev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo6_egrtotdev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo6_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo7_gastotinv', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo7_egrtotdev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo7_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo8_gasinvinf', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo8_ejegastot', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo8_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo9_ingcorper', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo9_gascordev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo9_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo10_gastotper', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo10_ingcorper', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo10_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo11_ingproper', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo11_gascordev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo11_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo12_valdefser', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo12_gastotser', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'grupo12_total', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix . 'observaciones', 'label' => 'Fecha', 'rules' => 'trim|xss_clean')
        );



        $this->form_validation->set_rules($config);

        $data['errors'] = array();
        $mensaje = false;

        if ($this->form_validation->run()) {
            $datos = array(
                $prefix . 'fecha' => $this->comp24->changeDate($this->form_validation->set_value($prefix . 'fecha')),
                $prefix . 'periodo_inicio' => $this->form_validation->set_value($prefix . 'periodo_inicio'),
                $prefix . 'periodo_fin' => $this->form_validation->set_value($prefix . 'periodo_fin'),
                $prefix . 'grupo1_ingcorpre' => $this->form_validation->set_value($prefix . 'grupo1_ingcorpre'),
                $prefix . 'grupo1_gascordev' => $this->form_validation->set_value($prefix . 'grupo1_gascordev'),
                $prefix . 'grupo1_total' => $this->form_validation->set_value($prefix . 'grupo1_total'),
                $prefix . 'grupo2_gascordev' => $this->form_validation->set_value($prefix . 'grupo2_gascordev'),
                $prefix . 'grupo2_totgascor' => $this->form_validation->set_value($prefix . 'grupo2_totgascor'),
                $prefix . 'grupo2_total' => $this->form_validation->set_value($prefix . 'grupo2_total'),
                $prefix . 'grupo3_ejegasinv' => $this->form_validation->set_value($prefix . 'grupo3_ejegasinv'),
                $prefix . 'grupo3_totgasinv' => $this->form_validation->set_value($prefix . 'grupo3_totgasinv'),
                $prefix . 'grupo3_total' => $this->form_validation->set_value($prefix . 'grupo3_total'),
                $prefix . 'grupo4_gascordev' => $this->form_validation->set_value($prefix . 'grupo4_gascordev'),
                $prefix . 'grupo4_ingcorper' => $this->form_validation->set_value($prefix . 'grupo4_ingcorper'),
                $prefix . 'grupo4_total' => $this->form_validation->set_value($prefix . 'grupo4_total'),
                $prefix . 'grupo5_armderdeu' => $this->form_validation->set_value($prefix . 'grupo5_armderdeu'),
                $prefix . 'grupo5_egrtotdev' => $this->form_validation->set_value($prefix . 'grupo5_egrtotdev'),
                $prefix . 'grupo5_total' => $this->form_validation->set_value($prefix . 'grupo5_total'),
                $prefix . 'grupo6_gascordev' => $this->form_validation->set_value($prefix . 'grupo6_gascordev'),
                $prefix . 'grupo6_egrtotdev' => $this->form_validation->set_value($prefix . 'grupo6_egrtotdev'),
                $prefix . 'grupo6_total' => $this->form_validation->set_value($prefix . 'grupo6_total'),
                $prefix . 'grupo7_gastotinv' => $this->form_validation->set_value($prefix . 'grupo7_gastotinv'),
                $prefix . 'grupo7_egrtotdev' => $this->form_validation->set_value($prefix . 'grupo7_egrtotdev'),
                $prefix . 'grupo7_total' => $this->form_validation->set_value($prefix . 'grupo7_total'),
                $prefix . 'grupo8_gasinvinf' => $this->form_validation->set_value($prefix . 'grupo8_gasinvinf'),
                $prefix . 'grupo8_ejegastot' => $this->form_validation->set_value($prefix . 'grupo8_ejegastot'),
                $prefix . 'grupo8_total' => $this->form_validation->set_value($prefix . 'grupo8_total'),
                $prefix . 'grupo9_ingcorper' => $this->form_validation->set_value($prefix . 'grupo9_ingcorper'),
                $prefix . 'grupo9_gascordev' => $this->form_validation->set_value($prefix . 'grupo9_gascordev'),
                $prefix . 'grupo9_total' => $this->form_validation->set_value($prefix . 'grupo9_total'),
                $prefix . 'grupo10_gastotper' => $this->form_validation->set_value($prefix . 'grupo10_gastotper'),
                $prefix . 'grupo10_ingcorper' => $this->form_validation->set_value($prefix . 'grupo10_ingcorper'),
                $prefix . 'grupo10_total' => $this->form_validation->set_value($prefix . 'grupo10_total'),
                $prefix . 'grupo11_ingproper' => $this->form_validation->set_value($prefix . 'grupo11_ingproper'),
                $prefix . 'grupo11_gascordev' => $this->form_validation->set_value($prefix . 'grupo11_gascordev'),
                $prefix . 'grupo11_total' => $this->form_validation->set_value($prefix . 'grupo11_total'),
                $prefix . 'grupo12_valdefser' => $this->form_validation->set_value($prefix . 'grupo12_valdefser'),
                $prefix . 'grupo12_gastotser' => $this->form_validation->set_value($prefix . 'grupo12_gastotser'),
                $prefix . 'grupo12_total' => $this->form_validation->set_value($prefix . 'grupo12_total'),
                $prefix . 'observaciones' => $this->form_validation->set_value($prefix . 'observaciones')
            );

            if (!is_null($data = $this->comp24->update_row($tabla, $campo, $id, $datos))) {
                $this->session->set_flashdata('message', 'Ok');
                $t = explode('/' . $id, current_url());
                redirect($t[0]);
            } else {
                $errors = $this->tank_auth->get_error_message();
                foreach ($errors as $k => $v)
                    $data['errors'][$k] = $this->lang->line($v);
            }
        }

        $this->load->view($this->ruta . 'F', array('titulo' => 'Elaboracion de Diagnostico',
            'user_uid' => $this->tank_auth->get_user_id(),
            'username' => $this->tank_auth->get_username(),
            'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->comp24->getDepartamentos(),
            $campo => $id
        ));
    }

    /**
     * 
     * G. Perfil del municipio
     */
    public function perfilMunicipio($id = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in
        $tabla = 'perfil_municipio';
        $campo = 'mun_id';
        $prefix = 'per_mun_';

        if ($id && !isset($_POST['mod'])) {
            if (!($tmp = $this->comp24->get_by_id($tabla, $campo, $id))) {
                $this->comp24->insert_row($tabla, array($campo => $id));
                $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            }
            $_POST = get_object_vars($tmp);
        }

        if (isset($_POST['mun_id']) && $_POST['mun_id'] > 0) {
            $_POST['depto'] = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni'] = $this->comp24->get_by_Id('municipio', 'mun_id', $_POST['mun_id'])->mun_nombre;
        }

        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('numeric', '*');
        $this->form_validation->set_message('integer', '*');

        $config = array(
            array('field' => 'depto', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean'),
            array('field' => 'mun_id', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'partido', 'label' => 'Partido', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'territorio', 'label' => 'Territorio', 'rules' => 'trim|numeric|xss_clean'),
            array('field' => $prefix . 'tipologia', 'label' => 'Tipologia', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'urbana_hombres', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|required|integer'),
            array('field' => $prefix . 'urbana_mujeres', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|required|integer'),
            array('field' => $prefix . 'rural_hombres', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|required|integer'),
            array('field' => $prefix . 'rural_mujeres', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|required|integer'),
            array('field' => $prefix . 'poblacion', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|integer'),
            array('field' => $prefix . 'observaciones', 'label' => 'Fecha', 'rules' => 'trim|xss_clean')
        );

        $this->form_validation->set_rules($config);

        $data['errors'] = array();
        $mensaje = false;

        if ($this->form_validation->run()) {
            $datos = array(
                $prefix . 'partido' => $this->form_validation->set_value($prefix . 'partido'),
                $prefix . 'territorio' => $this->form_validation->set_value($prefix . 'territorio'),
                $prefix . 'tipologia' => $this->form_validation->set_value($prefix . 'tipologia'),
                $prefix . 'urbana_hombres' => $this->form_validation->set_value($prefix . 'urbana_hombres'),
                $prefix . 'urbana_mujeres' => $this->form_validation->set_value($prefix . 'urbana_mujeres'),
                $prefix . 'rural_hombres' => $this->form_validation->set_value($prefix . 'rural_hombres'),
                $prefix . 'rural_mujeres' => $this->form_validation->set_value($prefix . 'rural_mujeres'),
                $prefix . 'poblacion' => $this->form_validation->set_value($prefix . 'poblacion'),
                $prefix . 'observaciones' => $this->form_validation->set_value($prefix . 'observaciones')
            );

            if (!is_null($data = $this->comp24->update_row($tabla, $campo, $id, $datos))) {
                $this->session->set_flashdata('message', 'Ok');
                $t = explode('/' . $id, current_url());
                redirect($t[0]);
            } else {
                $errors = $this->tank_auth->get_error_message();
                foreach ($errors as $k => $v)
                    $data['errors'][$k] = $this->lang->line($v);
            }
        }

        $this->load->view($this->ruta . 'G', array('titulo' => 'Diagnostico del Municipio',
            'user_uid' => $this->tank_auth->get_user_id(),
            'username' => $this->tank_auth->get_username(),
            'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->comp24->getDepartamentos(),
            $campo => $id
        ));
    }

    /**
     * H. Perfil Municipio 2
     */
    public function H($id = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in
        $tabla = 'empleados_municipales';
        $campo = 'emp_mun_id';
        $prefix = 'emp_mun_';

        if ($id && !isset($_POST['mod'])) {
            if (!($tmp = $this->comp24->get_by_id($tabla, $campo, $id))) {
                $this->comp24->insert_row($tabla, array($campo => $id, 'mun_id' => $id));
                $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            }
            $_POST = get_object_vars($tmp);
        }

        if (isset($_POST['mun_id']) && $_POST['mun_id'] > 0) {
            $_POST['depto'] = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni'] = $this->comp24->get_by_Id('municipio', 'mun_id', $_POST['mun_id'])->mun_nombre;
        }

        $config = array(
            array('field' => 'depto', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'organigrama', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'observaciones', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean')
        );

        $this->form_validation->set_rules($config);

        $data['errors'] = array();
        $mensaje = false;

        if ($this->form_validation->run()) {
            $datos = array(
                $prefix . 'organigrama' => $this->form_validation->set_value($prefix . 'organigrama'),
                $prefix . 'observaciones' => $this->form_validation->set_value($prefix . 'observaciones')
            );

            if (!is_null($data = $this->comp24->update_row($tabla, $campo, $id, $datos))) {
                $this->session->set_flashdata('message', 'Ok');
                $t = explode('/' . $id, current_url());
                redirect($t[0]);
            } else {
                $errors = $this->tank_auth->get_error_message();
                foreach ($errors as $k => $v)
                    $data['errors'][$k] = $this->lang->line($v);
            }
        }

        $this->load->view($this->ruta . 'H', array('titulo' => 'Diagnostico del Municipio',
            'user_uid' => $this->tank_auth->get_user_id(),
            'username' => $this->tank_auth->get_username(),
            'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->comp24->getDepartamentos(),
            $campo => $id
        ));
    }

    public function getEmpleadosMunicipales($emp_mun_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $data = $this->comp24->select_data('asistencia_tecnica', array('mun_id' => $emp_mun_id));
        echo $this->librerias->json_out($data, 'asi_tec_id', array('emp_mun_id', 'asi_tec_fecha_solicitud'));
    }

    public function loadEmpleados($id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in
        $d = $this->comp24->select_data('empleados', array('emp_mun_id' => $id));
        echo $this->librerias->json_out($d, 'emp_id');
    }

    public function gestionEmpleados($id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $tabla = 'empleados';
        $campo = 'emp_mun_id';
        $index = $this->input->post('id');
        
               
        
        $emp_n = $this->input->post('emp_nivel');
        if ($emp_n){
           $emp_n = 0; 
        }
        
        
        
        $data = array(
            $campo => $id,
            'emp_nombre' => $this->input->post('emp_nombre'),
            'emp_apellidos' => $this->input->post('emp_apellidos'),
            'emp_sexo' => $this->input->post('emp_sexo',true),
            'emp_edad' => $this->input->post('emp_edad',true),
            'emp_cargo' => $this->input->post('emp_cargo',true),
            'emp_nivel' => $this->input->post('emp_nivel',true),
            'emp_titulo' => $this->input->post('emp_titulo',true),
            'emp_experiencia' => $this->input->post('emp_experiencia',true)
        );

        switch ($this->input->post('oper')) {
            case 'add': $this->comp24->insert_row($tabla, $data);
                break;
            case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data);
                break;
            case 'del': $this->comp24->db_row_delete($tabla, $campo, $index);
                break;
        }
    }

    /**
     * I. Manuales 
     */
    public function I($id = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in
        $tabla = 'manuales_administrativos';
        $campo = 'man_adm_id';
        $prefix = 'man_adm_';

        if ($id && !isset($_POST['mod'])) {
            $_POST = get_object_vars($this->comp24->get_by_id($tabla, $campo, $id));
            $_POST[$prefix . 'elaboracion'] = $this->librerias->parse_output('date', $_POST[$prefix . 'elaboracion']);
            $_POST[$prefix . 'aprobacion'] = $this->librerias->parse_output('date', $_POST[$prefix . 'aprobacion']);
        }

        if (isset($_POST['mun_id']) && $_POST['mun_id'] > 0) {
            $_POST['depto'] = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni'] = $this->comp24->get_by_Id('municipio', 'mun_id', $_POST['mun_id'])->mun_nombre;
        }

        $config = array(
            array('field' => 'depto', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'mun_id', 'label' => 'Municipio', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix . 'elaboracion', 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix . 'aprobacion', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'nombre', 'label' => 'Nombre', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix . 'vigente', 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix . 'utilizado', 'label' => 'Utilizado', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix . 'comentario', 'label' => 'Comentario', 'rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean')
        );

        $this->form_validation->set_rules($config);

        $data['errors'] = array();
        $mensaje = false;

        if ($this->form_validation->run()) {
            $datos = array(
                $prefix . 'nombre' => $this->form_validation->set_value($prefix . 'nombre'),
                $prefix . 'elaboracion' => $this->librerias->parse_input('date', $this->form_validation->set_value($prefix . 'elaboracion')),
                $prefix . 'aprobacion' => $this->librerias->parse_input('date', $this->form_validation->set_value($prefix . 'aprobacion')),
                $prefix . 'vigente' => $this->form_validation->set_value($prefix . 'vigente'),
                $prefix . 'utilizado' => $this->form_validation->set_value($prefix . 'utilizado'),
                $prefix . 'comentario' => $this->form_validation->set_value($prefix . 'comentario')
            );

            if ($id > 0) {
                if (!is_null($data = $this->comp24->update_row($tabla, $campo, $id, $datos))) {
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/' . $id, current_url());
                    redirect($t[0]);
                }
            } else {
                $datos['mun_id'] = $this->form_validation->set_value('mun_id');
                if (!is_null($data = $this->comp24->insert_row($tabla, $datos))) {
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/0', current_url());
                    redirect($t[0]);
                }
            }
        }

        $this->load->view($this->ruta . 'I', array('titulo' => 'Diagnostico del Municipio',
            'user_uid' => $this->tank_auth->get_user_id(),
            'username' => $this->tank_auth->get_username(),
            'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->comp24->getDepartamentos(),
            'mun_id' => $this->form_validation->set_value('mun_id'),
            $campo => $id
        ));
    }

    public function getManuales($mun_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $data = $this->comp24->select_data('manuales_administrativos', array('mun_id' => $mun_id));
        echo $this->librerias->json_out($data, 'mun_id', array('mun_id'));
    }

    function _show_message($path, $message) {
        $this->session->set_flashdata('message', $message);
        redirect('/componente2/comp24_E0' + $path);
    }

     public function manualesAdministrativos($id = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in
        $tabla = 'manuales_administrativos';
        $campo = 'mun_id';
        $prefix = 'man_adm_';
        
        if ($id && !isset($_POST['mod'])) {
            if (!($tmp = $this->comp24->get_by_id($tabla, $campo, $id))) {
                $this->comp24->insert_row($tabla, array($campo => $id, 'mun_id' => $id));
                $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            }
            $_POST = get_object_vars($tmp);
         /*   $_POST[$prefix . 'numero1'] = $this->librerias->parse_output('date', $_POST[$prefix . 'numero1']);
            $_POST[$prefix . 'numero2'] = $this->librerias->parse_output('date', $_POST[$prefix . 'numero2']);*/
           
        }

        if (isset($_POST['mun_id']) && $_POST['mun_id'] > 0) {
            $_POST['depto'] = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni'] = $this->comp24->get_by_Id('municipio', 'mun_id', $_POST['mun_id'])->mun_nombre;
        }

        $config = array(
            array('field' => 'depto', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'elaboracion', 'label' => 'elaboracion', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'numero1', 'label' => 'numero1','rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'numero2', 'label' => 'numero2','rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'numero3', 'label' => 'numero3','rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'numero4', 'label' => 'numero4','rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'numero5', 'label' => 'numero5','rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'numero6', 'label' => 'numero6','rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'numero7', 'label' => 'numero7','rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'numero8', 'label' => 'numero8','rules' => 'trim|xss_clean'),
            array('field' => $prefix . 'observaciones', 'label' => 'observaciones', 'rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean')
        );

        $this->form_validation->set_rules($config);

        $data['errors'] = array();
        $mensaje = false;

        if ($this->form_validation->run()) {
            $datos = array(
                $prefix . 'elaboracion' => $this->librerias->parse_input('date', $this->form_validation->set_value($prefix . 'elaboracion')),
                $prefix . 'numero1' => $this->form_validation->set_value($prefix . 'numero1'),
                $prefix . 'numero2' => $this->form_validation->set_value($prefix . 'numero2'),
                $prefix . 'numero3' => $this->form_validation->set_value($prefix . 'numero3'),
                $prefix . 'numero4' => $this->form_validation->set_value($prefix . 'numero4'),
                $prefix . 'numero5' => $this->form_validation->set_value($prefix . 'numero5'),
                $prefix . 'numero6' => $this->form_validation->set_value($prefix . 'numero6'),
                $prefix . 'numero7' => $this->form_validation->set_value($prefix . 'numero7'),
                $prefix . 'numero8' => $this->form_validation->set_value($prefix . 'numero8'),
                $prefix . 'observaciones' => $this->form_validation->set_value($prefix . 'observaciones'),
                
                ); 
            if ($id > 0) {
               /* if ($man_adm_numero1 == "")
                    $man_adm_numero1 = null;
                if ($man_adm_numero2 == "")
                    $man_adm_numero2 = null;*/
                
                if (!is_null($data = $this->comp24->update_row($tabla, $campo, $id, $datos))) {
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/' . $id, current_url());
                    redirect($t[0]);
                }
            } else {
                /*if ($man_adm_numero1 == "")
                    $man_adm_numero1 = null;
                if ($man_adm_numero2 == "")
                    $man_adm_numero2 = null;*/
                
                if (!is_null($data = $this->comp24->insert_manuales_administrativos(
                                $this->form_validation->set_value('mun_id'), 
                                $this->form_validation->set_value($prefix . 'elaboracion'),
                                $this->form_validation->set_value($prefix .'numero1'), 
                                $this->form_validation->set_value($prefix .'numero2'),
                                $this->form_validation->set_value($prefix .'numero3'),
                                $this->form_validation->set_value($prefix .'numero4'),
                                $this->form_validation->set_value($prefix .'numero5'),
                                $this->form_validation->set_value($prefix .'numero6'),
                                $this->form_validation->set_value($prefix .'numero7'),
                                $this->form_validation->set_value($prefix .'numero8'),
                                $this->form_validation->set_value($prefix .'observaciones')
                                
                        ))) {
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/0', current_url());
                    redirect($t[0]);
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $data['errors'][$k] = $this->lang->line($v);
                }
            }
        } else if (($mun = $this->input->post('mun_id')) != 0 && $id == false) {
            //
            redirect(current_url() . '/' . $this->setNewId($tabla, $campo, array('mun_id' => $mun)));
        }

        $this->load->view($this->ruta . 'manualesAdministrativos', array('titulo' => 'Manuales Administrativos',
            'user_uid' => $this->tank_auth->get_user_id(),
            'username' => $this->tank_auth->get_username(),
            'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->comp24->getDepartamentos(),
           /* 'consultores' => $this->getConsultores(),*/
            $campo => $id
        ));
    }
}


?>
