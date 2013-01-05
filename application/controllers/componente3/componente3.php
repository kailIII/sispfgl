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
                        
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_dsat');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function form_conc_disc_poli() {

        $informacion['titulo'] = '3.2.1 Formacion de Concenso y Discusion de la Politica de Descentralizacion';
                        
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_fcdp');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function elab_plan_imp() {

        $informacion['titulo'] = '3.2.2 Elaboracion del Plan de Implementaci&oacute;n';
                        
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_epi');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function divu() {

        $informacion['titulo'] = '3.3 Divulgaci&oacute;n';
                        
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_divu');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function docs_desc() {

        $informacion['titulo'] = 'Documentos Concernientes a Descentralizaci&oacute;n';
                        
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_dd');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function guardar_dsat() {

        $datos_dsat = $_POST;
		unset($datos_dsat["guardar"]);
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
