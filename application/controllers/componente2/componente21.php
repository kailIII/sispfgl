<?php

/**
 * Controlador para componente 21
 *
 * @author Carlos Romero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class  componente21 extends CI_Controller {
	
	public function index() {

    }
    
    public function cc() {

        $informacion['titulo'] = 'CC';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/cc_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function ccc() {

        $informacion['titulo'] = 'CCC';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/ccc_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
     public function guardar_cc() {

        $datos_cc = $_POST;
		unset($datos_cc['guardar']);
		
		//configuracion del archivo adjunto a subir
		$config['upload_path'] = 'documentos/cc/';
		$config['allowed_types'] = 'doc|docx|pdf|rtf';
		$config['max_size']	= '2048';
		
		$this->load->library('upload', $config);
		
		if ($datos_cc['acta']=='si')
		{
			
			if ( ! $this->upload->do_upload('acta_final'))//retorna falso si hubo un error y entonces entra al if
			{
				$error_upload = $this->upload->display_errors('<p style="color:red">Error: ', '</p>');
				$informacion['titulo'] = 'CC';
				$informacion['user_id'] = $this->tank_auth->get_user_id();
				$informacion['username'] = $this->tank_auth->get_username();
				$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
				$informacion['aviso'] = $error_upload; 
				$this->load->view('plantilla/header', $informacion);
				$this->load->view('plantilla/menu', $informacion);
				$this->load->view('componente2/cc_view');
				$this->load->view('plantilla/footer', $informacion);
			}
			else
			{			
				$datos_arch1 = $this->upload->data();
				$ruta1=$config['upload_path'].$datos_arch1['file_name'];
			}
		
		}
		else $ruta1=null;
		
		if($datos_cc['lista']=='si'){
			
			if ( ! $this->upload->do_upload('lista_asis'))//retorna falso si hubo un error y entonces entra al if
			{
				$error_upload = $this->upload->display_errors('<p style="color:red">Error: ', '</p>');
				$informacion['titulo'] = 'CC';
				$informacion['user_id'] = $this->tank_auth->get_user_id();
				$informacion['username'] = $this->tank_auth->get_username();
				$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
				$informacion['aviso'] = $error_upload; 
				$this->load->view('plantilla/header', $informacion);
				$this->load->view('plantilla/menu', $informacion);
				$this->load->view('componente2/cc_view');
				$this->load->view('plantilla/footer', $informacion);
			}
			else
			{			
				$datos_arch2 = $this->upload->data();
				$ruta2=$config['upload_path'].$datos_arch2['file_name'];
			}
			
		}
		else $ruta2=null;
			
			$this->load->model('componente2/comp21_model');
			$this->comp21_model->insertar_cc($datos_cc,$ruta1,$ruta2);				
			
			$informacion['titulo'] = 'CCC';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>';         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente2/ccc_view');
			$this->load->view('plantilla/footer', $informacion);
			
	}
	
	
	public function guardar_ccc() {

        $datos_ccc = $_POST;
		unset($datos_ccc['guardar']);
		
		$this->load->model('componente2/comp21_model');
		$this->comp21_model->insertar_ccc($datos_ccc);
		
		$informacion['titulo'] = '3.1 Diagnostico Sectorial y Analisis Transversales';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>';         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente2/cc_view');
			$this->load->view('plantilla/footer', $informacion);
		
	}
    
    
}
?>
