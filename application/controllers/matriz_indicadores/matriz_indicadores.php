<?php

/**
 * 
 *
 * @author
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class matriz_indicadores extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
    public function gestion_matriz($comp) {
		if(!isset($comp))
			$comp='1';
        $informacion['titulo'] = 'Matriz de Indicadores del Componente '.$comp;
        $informacion['componente']=$comp;
        //$informacion['user_id'] = $this->tank_auth->get_user_id();
        //$informacion['username'] = $this->tank_auth->get_username();
        //$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('matriz_indicadores/matriz_indicadores_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
        
        
    }
    
    public function cargar_indicadores($comp) {
        $this->load->model('matriz_indicadores/matriz_indicadores_model');
        $ind = $this->matriz_indicadores_model->get_indicadores($comp);
        $numfilas = count($ind);

        $i = 0;
        foreach ($ind as $aux) {
			
            $rows[$i]['id'] = $aux->id;
            $rows[$i]['cell'] = array($aux->id,
                $aux->cod,
                $aux->indicador,
                $aux->linea_base,
                $aux->anio_1,
                $aux->anio_2,
                $aux->anio_3,
                $aux->anio_4,
                $aux->anio_5,
                $aux->total,
                $aux->comentario
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            //$rows[0]['id'] = 0;
           // $rows[0]['cell'] = array('0', ' ', ' ', ' ', ' ', ' ');
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
    
     public function actualizar_indicador() {
			 $indicador = $_POST;
			 $this->load->model('matriz_indicadores/matriz_indicadores_model');
			 $this->matriz_indicadores_model->actualizar_indicador($indicador);
	}
    
}
?>
