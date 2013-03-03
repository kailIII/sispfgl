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

    public function __construct() {
        parent::__construct();
        $this->load->model('pais/departamento');
        $this->load->model('componente2/comp24');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        $this->form_validation->set_message('is_natural_no_zero', '* Obligatorio');
    }
    
    function index()
    {/*
        if ($message = $this->session->flashdata('message')) {
            $this->load->view('mensaje', array('message' => $message));
        } else {
            redirect('/');
        }*/
    }
	
    public function solicitudAyuda(){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $config = array(
            array('field'   => 'selMun',   'label' => 'Municipio',   'rules' => 'trim|required|xss_clean|is_natural_no_zero'),
            array('field'   => 'f_emision',    'label' => 'Emision',    'rules' => 'trim|required|xss_clean'),
            array('field'   => 'f_recepcion',   'label' => 'Recepcion',   'rules' => 'required|xss_clean')
        );
             
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            if(!is_null($data = $this->comp24->insert_solicitud_ayuda(
                $this->form_validation->set_value('selMun'),
                $this->form_validation->set_value('f_emision'),
                $this->form_validation->set_value('f_recepcion')
                )))
                {
                    $this->session->set_flashdata('message', 'Ok');
                    redirect(current_url());
                }
                else
                {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)    $data['errors'][$k] = $this->lang->line($v);
                }          
        }
        
        
        $this->load->view($this->ruta.'solicitudAyuda_view',
            array('titulo' => 'Solicitud de Ayuda',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos(),
                    'mensaje'   =>  $mensaje
                    ));
	   
	}
    
    public function acuerdoMunicipal(){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $config = array(
            array('field'   => 'selMun',            'label' => 'Municipio',     'rules' => 'trim|required|xss_clean|is_natural_no_zero'),
            array('field'   => 'f_conformacion',    'label' => 'Fecha',         'rules' => 'trim|required|xss_clean'),
            array('field'   => 'f_acuerdo',         'label' => 'Fecha',         'rules' => 'trim|required|xss_clean'),
            array('field'   => 'f_recepcion',       'label' => 'Fecha',         'rules' => 'trim|required|xss_clean'),
            array('field'   => 't_observaciones',   'label' => 'Fecha',         'rules' => 'trim|required|xss_clean')
        );
             
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            if(!is_null($data = $this->comp24->insert_acuerdo_municipal(
                $this->form_validation->set_value('selMun'),
                $this->form_validation->set_value('f_acuerdo'),
                $this->form_validation->set_value('f_recepcion'),
                $this->form_validation->set_value('f_conformacion'),
                '',//$this->form_validation->set_value(''),
                $this->form_validation->set_value('t_observaciones')
                )))
                {
                    $this->session->set_flashdata('message', 'Ok');
                    redirect(current_url());
                }
                else
                {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)    $data['errors'][$k] = $this->lang->line($v);
                }          
        }
	
        $this->load->view($this->ruta.'acuerdoMunicipal',
            array('titulo' => 'Solicitud de Ayuda',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
					
    }
    
    //public function acuerdoMunicipal_
    
    public function solicitudAsistenciaTecnica(){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $config = array(
            array('field'   => 'selMun',            'label' => 'Municipio',     'rules' => 'trim|required|xss_clean|is_natural_no_zero'),
            array('field'   => 'f_solicitud',    'label' => 'Fecha',         'rules' => 'trim|required|xss_clean'),
            array('field'   => 'f_emision',         'label' => 'Fecha',         'rules' => 'trim|required|xss_clean'),
            array('field'   => 'f_envio',       'label' => 'Fecha',         'rules' => 'trim|required|xss_clean'),
            array('field'   => 'f_orden',       'label' => 'Fecha',         'rules' => 'trim|required|xss_clean'),
            array('field'   => 't_consultor',            'label' => 'Consultor',     'rules' => 'trim|required|xss_clean|is_natural_no_zero'),
            array('field'   => 't_observaciones',   'label' => 'Fecha',         'rules' => 'trim|required|xss_clean')
        );
             
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            if(!is_null($data = $this->comp24->insert_acuerdo_municipal(
                $this->form_validation->set_value('selMun'),
                $this->form_validation->set_value('f_acuerdo'),
                $this->form_validation->set_value('f_recepcion'),
                $this->form_validation->set_value('f_conformacion'),
                '',//$this->form_validation->set_value(''),
                $this->form_validation->set_value('t_observaciones')
                )))
                {
                    $this->session->set_flashdata('message', 'Ok');
                    redirect(current_url());
                }
                else
                {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)    $data['errors'][$k] = $this->lang->line($v);
                }          
        }
	
        $this->load->view($this->ruta.'solicitudAsistenciaTecnica',
            array('titulo' => 'Solicitud de Asistencia Tecnica',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
    }
    
    /**
     * D. Indicadores de Desempeno Administrativo y Financiero Municipal 1
     */
    public function indicadoresDesempenoAdmin(){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('decimal', '*');
        
        $config = array(
            array('field'   => 'selMun',            'label' => 'Municipio',     'rules' => 'trim|required|xss_clean|is_natural_no_zero'),
            array('field'   => 'fecha',    'label' => 'Fecha',         'rules' => 'trim|required|xss_clean'),
            array('field'   => 'periodo_ini',         'label' => 'Fecha',         'rules' => 'trim|required|xss_clean'),
            array('field'   => 'periodo_fin',       'label' => 'Fecha',         'rules' => 'trim|required|xss_clean'),
            array('field'   => 't_pasCir',       'label' => 'Fecha',         'rules' => 'trim|required|xss_clean|decimal'),
            array('field'   => 't_deuCorPla',       'label' => 'Fecha',         'rules' => 'trim|required|xss_clean|decimal'),
            array('field'   => 't_interes',       'label' => 'Fecha',         'rules' => 'trim|required|xss_clean|decimal'),
            array('field'   => 't_ahoOper',       'label' => 'Fecha',         'rules' => 'trim|required|xss_clean|decimal'),
            array('field'   => 't_intDueda',       'label' => 'Fecha',         'rules' => 'trim|required|xss_clean|decimal'),
            array('field'   => 't_icp',       'label' => 'Fecha',         'rules' => 'trim|required|xss_clean|decimal'),
            array('field'   => 't_deuMunTotal',       'label' => 'Fecha',         'rules' => 'trim|required|xss_clean|decimal'),
            array('field'   => 't_ingOpePer',       'label' => 'Fecha',         'rules' => 'trim|required|xss_clean|decimal'),
            array('field'   => 't_iop',       'label' => 'Fecha',         'rules' => 'trim|required|xss_clean|decimal'),
            array('field'   => 't_observaciones',   'label' => 'Fecha',         'rules' => 'trim|required|xss_clean')
        );
             
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        $tbl = 'ind_des_';
        
        if ($this->form_validation->run())
        {
            if(!is_null($data = $this->comp24->insert_indicadores1(array(
                'mun_id'                =>  $this->form_validation->set_value('selMun'),
                $tbl.'fecha'            =>  $this->comp24->changeDate($this->form_validation->set_value('fecha')),
                $tbl.'periodo_inicio'   =>  $this->form_validation->set_value('periodo_ini'),
                $tbl.'periodo_fin'      =>  $this->form_validation->set_value('periodo_fin'),
                $tbl.'grupo1_pascir'    =>  $this->form_validation->set_value('t_pasCir'),
                $tbl.'grupo1_deucorpla' =>  $this->form_validation->set_value('t_deuCorPla'),
                $tbl.'grupo1_int'       =>  $this->form_validation->set_value('t_interes'),
                $tbl.'grupo1_ahoope'    =>  $this->form_validation->set_value('t_ahoOper'),
                $tbl.'grupo1_intdeu'    =>  $this->form_validation->set_value('t_intDueda'),
                $tbl.'grupo1_total'     =>  $this->form_validation->set_value('t_icp'),
                $tbl.'grupo2_deumuntot' =>  $this->form_validation->set_value('t_deuMunTotal'),
                $tbl.'grupo2_ingopeper' =>  $this->form_validation->set_value('t_ingOpePer'),
                $tbl.'grupo2_total'     =>  $this->form_validation->set_value('t_iop'),
                $tbl.'observaciones'    =>  $this->form_validation->set_value('t_observaciones')
            ))))
                {
                    $this->session->set_flashdata('message', 'Ok');
                    redirect(current_url());
                }
                else
                {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)    $data['errors'][$k] = $this->lang->line($v);
                }          
        }
        
        $this->load->view($this->ruta.'D',
            array('titulo' => 'Elaboracion de Diagnostico',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
    }
    
    /**
     * 
     * E. 
     */
    public function E(){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $this->load->view($this->ruta.'E',
            array('titulo' => 'Elaboracion de Diagnostico',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
    }
    
    public function F(){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $this->load->view($this->ruta.'F',
            array('titulo' => 'Elaboracion de Diagnostico',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
    }
    
    /**
     * 
     * G. Perfil del municipio
     */
    public function perfilMunicipio(){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $this->load->view($this->ruta.'G',
            array('titulo' => 'Diagnostico del Municipio',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
    }
    
    public function H(){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $this->load->view($this->ruta.'H',
            array('titulo' => 'Diagnostico del Municipio',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
    }
    
    public function I(){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $this->load->view($this->ruta.'I',
            array('titulo' => 'Diagnostico del Municipio',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
    }
    
    function _show_message($path, $message)
    {
        $this->session->set_flashdata('message', $message);
        redirect('/componente2/comp24_E0'+$path);
    }

}

?>
