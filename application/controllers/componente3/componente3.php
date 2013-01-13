<?php

/**
 * Controlador para componente 3
 *
 * @author Carlos Romero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class  componente3 extends CI_Controller {
	
	public function index() {

    }
	
    public function diag_sect_anal_tran() {

        $informacion['titulo'] = '3.1 Diagnostico Sectorial y Analisis Transversales';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_dsat');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function form_conc_disc_poli() {

        $informacion['titulo'] = '3.2.1 Formacion de Concenso y Discusion de la Politica de Descentralizacion';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());                 
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_fcdp');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function elab_plan_imp() {

        $informacion['titulo'] = '3.2.2 Elaboracion del Plan de Implementaci&oacute;n';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());                 
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_epi');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function divu() {

        $informacion['titulo'] = '3.3 Divulgaci&oacute;n';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());                 
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_divu');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function docs_desc() {

        $informacion['titulo'] = 'Documentos Concernientes a Descentralizaci&oacute;n';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());                 
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_dd');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function guardar_dsat() {

        $datos_dsat = $_POST;
		unset($datos_dsat['guardar']);
		
		//configuracion del archivo adjunto a subir
		$config['upload_path'] = 'documentos/dsat/';
		$config['allowed_types'] = 'doc|docx|pdf|rtf';
		$config['max_size']	= '2048';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('archivo_reporte'))//retorna falso si hubo un error y entonces entra al if
		{
			$error_upload = $this->upload->display_errors('<p style="color:red">Error: ', '</p>');
			$informacion['titulo'] = '3.1 Diagnostico Sectorial y Analisis Transversales';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = $error_upload; 
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente3/ingresar_dsat',$informacion);
			$this->load->view('plantilla/footer', $informacion);
		}
		else
		{
			$datos_arch = $this->upload->data();
			$ruta=$config['upload_path'].$datos_arch['file_name'];
			
			$this->load->model('componente3/componente3_model');
			$this->componente3_model->insertar_dsat($datos_dsat,$ruta);				
			
			$informacion['titulo'] = '3.1 Diagnostico Sectorial y Analisis Transversales';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>';         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente3/ingresar_dsat',$informacion);
			$this->load->view('plantilla/footer', $informacion);
		
		}
		//$prueba=$this->componente3_model->insertar_dsat($datos_dsat);
		//for($i=0;$i<2;$i++)
		//	echo $prueba[$i]['sec_id'];
		
    }
    
    public function guardar_fcdp() {

        $datos_fcdp = $_POST;
		unset($datos_fcdp['guardar']);
		
		//configuracion del archivo adjunto a subir
		$config['upload_path'] = 'documentos/fcdp/';
		$config['allowed_types'] = 'doc|docx|pdf|rtf';
		$config['max_size']	= '2048';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('archivo_reporte'))//retorna falso si hubo un error y entonces entra al if
		{
			$error_upload = $this->upload->display_errors('<p style="color:red">Error: ', '</p>');
			$informacion['titulo'] = '3.2.1 Formacion de Concenso y Discusion de la Politica de Descentralizacion';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = $error_upload;         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente3/ingresar_fcdp',$informacion);
			$this->load->view('plantilla/footer', $informacion);
		}
		else
		{
			$datos_arch = $this->upload->data();
			$ruta=$config['upload_path'].$datos_arch['file_name'];
			
			$this->load->model('componente3/componente3_model');
			$this->componente3_model->insertar_fcdp($datos_fcdp,$ruta);				
			
			$informacion['titulo'] = '3.2.1 Formacion de Concenso y Discusion de la Politica de Descentralizacion';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = '<p style="color:blue">Se ha realizado el registro correctamete.</p>';         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente3/ingresar_fcdp',$informacion);
			$this->load->view('plantilla/footer', $informacion);
		
		}
		//$prueba=$this->componente3_model->insertar_dsat($datos_dsat);
		//for($i=0;$i<2;$i++)
		//	echo $prueba[$i]['sec_id'];
		
    }
    
    public function guardar_epi() {

        $datos_epi = $_POST;
		unset($datos_epi['guardar']);
		
			
			$this->load->model('componente3/componente3_model');
			$r=$this->componente3_model->insertar_epi($datos_epi);
							
			if(!$r)
				$informacion['aviso'] = '<p style="color:red">Error al tratar ingresar el registro.</p>';
			else
				$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>';
				
			$informacion['titulo'] = '3.2.2 Elaboracion del Plan de Implementaci&oacute;n';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente3/ingresar_epi',$informacion);
			$this->load->view('plantilla/footer', $informacion);
		
		
		//$prueba=$this->componente3_model->insertar_epi($datos_epi);
		//for($i=0;$i<2;$i++)
		//	echo $prueba[$i]['sec_id'];
		
    }
    
    public function guardar_dd() {

        $datos_dd = $_POST;
		unset($datos_dd['guardar']);
		
		//configuracion del archivo adjunto a subir
		$config['upload_path'] = 'documentos/dd/';
		$config['allowed_types'] = 'doc|docx|pdf|rtf';
		$config['max_size']	= '2048';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('archivo_ejec'))//retorna falso si hubo un error y entonces entra al if
		{
			$error_upload = $this->upload->display_errors('<p style="color:red">Error en archivo resumen: ', '</p>');
			$informacion['titulo'] = 'Documentos Concernientes a Descentralizaci&oacute;n';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = $error_upload; 
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente3/ingresar_dd',$informacion);
			$this->load->view('plantilla/footer', $informacion);
		}
		else{
			$datos_arch1 = $this->upload->data();
			if ( ! $this->upload->do_upload('archivo_comp'))//retorna falso si hubo un error y entonces entra al if
				{
					$error_upload = $this->upload->display_errors('<p style="color:red">Error en archivo completo: ', '</p>');
					$informacion['titulo'] = 'Documentos Concernientes a Descentralizaci&oacute;n';
					$informacion['user_id'] = $this->tank_auth->get_user_id();
					$informacion['username'] = $this->tank_auth->get_username();
					$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
					$informacion['aviso'] = $error_upload; 
					$this->load->view('plantilla/header', $informacion);
					$this->load->view('plantilla/menu', $informacion);
					$this->load->view('componente3/ingresar_dd',$informacion);
					$this->load->view('plantilla/footer', $informacion);
				}
			else
				{
					$datos_arch2 = $this->upload->data();
					
					$ruta1=$config['upload_path'].$datos_arch1['file_name'];
					$ruta2=$config['upload_path'].$datos_arch2['file_name'];
					
					$this->load->model('componente3/componente3_model');
					$this->componente3_model->insertar_dd($datos_dd,$ruta1,$ruta2);				
					
					$informacion['titulo'] = 'Documentos Concernientes a Descentralizaci&oacute;n';
					$informacion['user_id'] = $this->tank_auth->get_user_id();
					$informacion['username'] = $this->tank_auth->get_username();
					$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
					$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>';         
					$this->load->view('plantilla/header', $informacion);
					$this->load->view('plantilla/menu', $informacion);
					$this->load->view('componente3/ingresar_dd',$informacion);
					$this->load->view('plantilla/footer', $informacion);
				
				}
		}
		//$prueba=$this->componente3_model->insertar_dd($datos_dd);
		//for($i=0;$i<2;$i++)
		//	echo $prueba[$i]['sec_id'];
		
    }
    
    
    public function cargarAsistentes_dsat() {
        $numfilas=0;
        
        $rows[0]['id'] = 0;
        $rows[0]['cell'] = array(' ', ' ', ' ', ' ', ' ', ' ');

        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

/*	total:	total pages for the query
	page:	current page of the query
	records:	total number of records for the query
	rows:	an array that contains the actual data
	id:	the unique id of the row
	cell: an array that contains the data for a row
		
		{ 
		  "total": "xxx", 
		  "page": "yyy", 
		  "records": "zzz",
		  "rows" : [
			{"id" :"1", "cell" :["cell11", "cell12", "cell13"]},
			{"id" :"2", "cell":["cell21", "cell22", "cell23"]},
			  ...
		  ]
		}
	*/

        echo $jsonresponse;
    }
    
    
    

}

?>
