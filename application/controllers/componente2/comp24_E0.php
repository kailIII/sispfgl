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
    }
	
	public function solicitudAyuda(){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
	   
       
       $this->load->view($this->ruta.'solicitudAyuda_view',
            array('titulo' => 'Solicitud de Ayuda',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
	   
	}
    
    public function acuerdoMunicipal(){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
	
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

}

?>
