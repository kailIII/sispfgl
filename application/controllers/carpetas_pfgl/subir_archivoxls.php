<?php

/**
 * Controlador para mostrar mapas
 *
 * @author Carlos Romero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subir_archivoxls extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
    public function index() {

        $informacion['titulo'] = 'Subir Archivo de Excel Carpetas PFGL';
        //require_once 'excel_reader2.php';
                
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('carpetas_pfgl/subir_archivoxls_view',array('error' => ' ' ));
        $this->load->view('plantilla/footer', $informacion);
    }
    
    function do_upload()
	{
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'xls';
		$config['max_size']	= '1024';
		$config['file_name'] = 'carpetas_pfgl';
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$informacion['titulo'] = 'Subida de Archivo';
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('carpetas_pfgl/subir_archivoxls_view',$error);
			$this->load->view('plantilla/footer', $informacion);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());				
			$data2 = $this->upload->data();
			//$this->load->view('upload_success', $data);
			include("excel_reader2.php"); 
			$excel = new Spreadsheet_Excel_Reader("uploads/".$data2['file_name']."");
			
			//$this->excel_todb($data2['file_name']);
			
			$informacion['titulo'] = 'Subida de Archivo: '.$data2['file_name'].' name: '.$excel->val(10,'A');
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('carpetas_pfgl/subida_exitosa_view',$data);
			$this->load->view('plantilla/footer', $informacion);
		}
	}
	
	public function excel_todb($nombre_archivo) {
		$this->load->model('carpetas_pfgl/excel_todb_model');
		$this->excel_todb_model->insertar_data($nombre_archivo);
	}

}

?>
