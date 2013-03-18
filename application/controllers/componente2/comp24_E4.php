<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 3
 * Del Componente 2.4
 *
 * @author Alexis Beltran
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comp24_E4 extends CI_Controller {
    
    private $ruta = "componente2/subcomp24/etapa4/";

    public function __construct() {
        parent::__construct();
        $this->load->model('pais/departamento');
    }
    
    public function gestionConocimiento(){
   	    if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
	   
       
       $this->load->view($this->ruta.'gestionConocimiento',
            array('titulo' => 'Solicitud de Ayuda',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
    }
	
	/**
     * Alias para llamar a la funcion B
     */
    public function capacitacionConcejoMunicipal(){
   	    if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
	   
       
       $this->load->view($this->ruta.'capacitacionConcejoMunicipal',
            array('titulo' => 'Solicitud de Ayuda',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
    }

}

?>
