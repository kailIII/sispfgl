<?php

/**
 * Controlador para componente 24a
 *
 * @author Carlos Romero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class  componente24a extends CI_Controller {
	
	public function index() {

    }
	
    public function capacitaciones() {

        $informacion['titulo'] = 'Componente 2.4.a, Capacitaciones';
        //$informacion['user_id'] = $this->tank_auth->get_user_id();
        //$informacion['username'] = $this->tank_auth->get_username();
        //$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/comp24a_cap_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function cargar_capacitaciones() {
        $this->load->model('componente2/componente24a_model');
        $capacitaciones = $this->componente24a_model->get_capacitaciones();
        $numfilas = count($capacitaciones);

        $i = 0;
        foreach ($capacitaciones as $aux) {
            $rows[$i]['id'] = $aux->comp_id;
            $rows[$i]['cell'] = array($aux->comp_id,
				$this->componente24a_model->get_mun_nombre($aux->mun_id),
                $aux->fecha_cap,
                $aux->tema_cap,
                $aux->total_mujeres,
                $aux->total_hombres,
                $aux->fecha_instalacion,
                $aux->fecha_operacion,
                $aux->observaciones
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
    
    public function guardar_comp24a_cap() {
        
        $mun_id = $this->input->post("nombre_muni");
        $fecha_cap = $this->input->post("fecha_cap");
        $tema_cap = strtoupper($this->input->post("tema_cap"));
        $total_mujeres = $this->input->post("total_mujeres");
        $total_hombres = $this->input->post("total_hombres");
        $fecha_instalacion = $this->input->post("fecha_inst");
        $fecha_operacion = $this->input->post("fecha_ope");
        $observaciones = $this->input->post("observaciones");

        $this->load->model('componente2/componente24a_model');
        $this->componente24a_model->insertar_comp24a_cap($mun_id, $fecha_cap, $tema_cap, $total_mujeres, $total_hombres, $fecha_instalacion, $fecha_operacion, $observaciones);

    }
}
?>
