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
    }
	
	public function solicitudAyuda(){
	   
       $this->load->view($this->ruta.'solicitudAyuda_view',
            array('titulo' => 'Solicitud de Ayuda',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username())
                    ));
	   
	}
    
    public function acuerdoMunicipal(){
        
    }
    
    public function solicitudAsistenciaTecnica(){
        
    }
    
    public function D(){
        
    }
    
    public function E(){
        
    }
    
    public function F(){
        
    }
    
    public function G(){
        
    }
    
    public function H(){
        
    }
    
    public function I(){
        
    }

}

?>
