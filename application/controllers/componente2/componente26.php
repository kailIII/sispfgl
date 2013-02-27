<?php

/**
 * Controlador para componente 26
 *
 * @author Carlos Romero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class  componente26 extends CI_Controller {
	
	public function index() {

    }
    
    public function comp26() {

        $informacion['titulo'] = 'Componente 2.6';
        //$informacion['user_id'] = $this->tank_auth->get_user_id();
        //$informacion['username'] = $this->tank_auth->get_username();
        //$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/comp26_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function cargar_capacitaciones() {
        $this->load->model('componente2/componente26_model');
        $capacitaciones = $this->componente26_model->get_capacitaciones();
        $numfilas = count($capacitaciones);

        $i = 0;
        foreach ($capacitaciones as $aux) {
            $rows[$i]['id'] = $aux->comp_id;
            $rows[$i]['cell'] = array($aux->comp_id,
				$aux->nombre_cap,
                $aux->fecha_cap,
                $aux->nombre_capacitador,
                $aux->total_mujeres,
                $aux->total_hombres,
                $aux->monto_cap,
                $aux->entidad
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
    
    public function guardar_comp26_cap() {
        
        $nombre_cap = $this->input->post("nombre_cap");
        $fecha_cap = $this->input->post("fecha_cap");
        $nomb_capacitador = strtoupper($this->input->post("nomb_capacitador"));
        $total_mujeres = $this->input->post("total_mujeres");
        $total_hombres = $this->input->post("total_hombres");
        $monto_cap = $this->input->post("monto_cap");
        $entidad = $this->input->post("entidad");

        $this->load->model('componente2/componente26_model');
        $this->componente26_model->insertar_comp26_cap($nombre_cap, $fecha_cap, $nomb_capacitador, $total_mujeres, $total_hombres, $monto_cap, $entidad);

    }
    
    public function cargar_consultorias() {
        $this->load->model('componente2/componente26_model');
        $consultorias = $this->componente26_model->get_consultorias();
        $numfilas = count($consultorias);

        $i = 0;
        foreach ($consultorias as $aux) {
            $rows[$i]['id'] = $aux->comp_id;
            $rows[$i]['cell'] = array($aux->comp_id,
				$aux->nombre_con,
                $aux->fecha_con,
                $aux->nombre_consultor,
                $aux->monto_con,
                $aux->entidad
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
    
    public function guardar_comp26_con() {
        
        $nombre_con = $this->input->post("nombre_con");
        $fecha_con = $this->input->post("fecha_con");
        $nomb_consultor = $this->input->post("nomb_consultor");
        $monto_con = $this->input->post("monto_con");
        $entidad = $this->input->post("entidad");

        $this->load->model('componente2/componente26_model');
        $this->componente26_model->insertar_comp26_con($nombre_con, $fecha_con, $nomb_consultor, $monto_con, $entidad);

    }
    
    public function cargar_equipamientos() {
        $this->load->model('componente2/componente26_model');
        $equi = $this->componente26_model->get_equi();
        $numfilas = count($equi);

        $i = 0;
        foreach ($equi as $aux) {
            $rows[$i]['id'] = $aux->comp_id;
            $rows[$i]['cell'] = array($aux->comp_id,
				$aux->desc_equi,
                $aux->fecha_equi,
                $aux->monto_equi,
                $aux->entidad
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
    
    public function guardar_comp26_equi() {
        
        $desc_equi = $this->input->post("desc_equi");
        $fecha_equi = $this->input->post("fecha_equi");
        $monto_equi = $this->input->post("monto_equi");
        $entidad = $this->input->post("entidad");

        $this->load->model('componente2/componente26_model');
        $this->componente26_model->insertar_comp26_equi($desc_equi, $fecha_equi, $monto_equi, $entidad);

    }
    
}
?>
