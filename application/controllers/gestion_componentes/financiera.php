<?php

/**
 * Controlador para Asignacion Financiera por Componente
 *
 * @author Carlos Romero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class  financiera extends CI_Controller {
	
	public function index() {

    }
	
    public function agregar_subcomp() {

        $informacion['titulo'] = 'Agregar Subcomponente';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('gestion_componentes/agregar_subcomp_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function get_new_subcom_cod(){
		$com_id = $this->input->get("com_id");
		
		$this->load->model('gestion_componentes/financiera_model');
		
		$codpadre = $this->financiera_model->getcod_com($com_id);
		$codsubcomp= $codpadre.'-'.($this->financiera_model->total_hijos_com($com_id)+1);
		
		$newcodigo = json_encode($codsubcomp);
		$jsonresponse = '{
               "cod":' . $newcodigo . '}';

        echo $jsonresponse;
	}
	
	public function guardar_subcomp(){
		$datos = $_POST;
		unset($datos['guardar']);
		
		$this->load->model('gestion_componentes/financiera_model');
		$r=$this->financiera_model->insertar_subcom($datos);
		if($r==true)
			$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>'; 
		else
			$informacion['aviso'] = '<p style="color:red">Error, el c&oacute;digo ya existe.</p>';
		
		$informacion['titulo'] = 'Agregar Subcomponente';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());        
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('gestion_componentes/agregar_subcomp_view');
        $this->load->view('plantilla/footer', $informacion);	
		
	}
	
	public function agregar_macroact() {

        $informacion['titulo'] = 'Agregar Macroactividad';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('gestion_componentes/agregar_macroact_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
     public function get_subcom() {
       $com_id = $this->input->get("com_id");
       $this->load->model('gestion_componentes/financiera_model');
       $subcomp=$this->financiera_model->get_hijos('componente','com_com_id',$com_id);
       
        $numfilas = count($subcomp);

        $i = 0;
        foreach ($subcomp as $aux) {
            $rows[$i]['id'] = $aux->com_id;
            $rows[$i]['cell'] = array($aux->com_id,
                $aux->com_codigo.'.  '.$aux->com_nombre
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array(' ', ' ');
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
    
    public function get_new_macroact_cod(){
		$com_id = $this->input->get("com_id");
		
		$this->load->model('gestion_componentes/financiera_model');
		
		$codpadre = $this->financiera_model->getcod_com($com_id);
		$codmacroact= $codpadre.'.'.($this->financiera_model->total_hijos_subcom($com_id)+1);
		
		$newcodigo = json_encode($codmacroact);
		$jsonresponse = '{
               "cod":' . $newcodigo . '}';

        echo $jsonresponse;
	}
	
	public function guardar_macroact(){
		$datos = $_POST;
		unset($datos['guardar']);
		
		$this->load->model('gestion_componentes/financiera_model');
		$r=$this->financiera_model->insertar_macroact($datos);
		if($r==true)
			$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>'; 
		else
			$informacion['aviso'] = '<p style="color:red">Error, el c&oacute;digo ya existe.</p>';
		
		$informacion['titulo'] = 'Agregar Macroactividad';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());        
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('gestion_componentes/agregar_macroact_view');
        $this->load->view('plantilla/footer', $informacion);	
		
	}
	
	public function agregar_act() {

        $informacion['titulo'] = 'Agregar Actividad';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('gestion_componentes/agregar_act_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function get_macroact() {
       $com_id = $this->input->get("com_id");
       $this->load->model('gestion_componentes/financiera_model');
       $macroact=$this->financiera_model->get_hijos_sub('actividad','com_id',$com_id);
       
        $numfilas = count($macroact);

        $i = 0;
        foreach ($macroact as $aux) {
            $rows[$i]['id'] = $aux->act_id;
            $rows[$i]['cell'] = array($aux->act_id,
                $aux->act_codigo.'.  '.$aux->act_nombre
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array(' ', ' ');
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
    
    public function get_new_act_cod(){
		$act_id = $this->input->get("act_id");
		
		$this->load->model('gestion_componentes/financiera_model');
		
		$codpadre = $this->financiera_model->getcod_act($act_id);
		$codact= $codpadre.'.'.($this->financiera_model->total_hijos_macroact($act_id)+1);
		
		$newcodigo = json_encode($codact);
		$jsonresponse = '{
               "cod":' . $newcodigo . '}';

        echo $jsonresponse;
	}
    
    public function guardar_act(){
		$datos = $_POST;
		unset($datos['guardar']);
		
		$this->load->model('gestion_componentes/financiera_model');
		$r=$this->financiera_model->insertar_act($datos);
		if($r==true)
			$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>'; 
		else
			$informacion['aviso'] = '<p style="color:red">Error, el c&oacute;digo ya existe.</p>';
		
		$informacion['titulo'] = 'Agregar Actividad';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());        
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('gestion_componentes/agregar_act_view');
        $this->load->view('plantilla/footer', $informacion);	
		
	}
	
	public function agregar_subact() {

        $informacion['titulo'] = 'Agregar Subactividad';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('gestion_componentes/agregar_subact_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function get_act() {
       $act_id = $this->input->get("act_id");
       $this->load->model('gestion_componentes/financiera_model');
       $act=$this->financiera_model->get_hijos('actividad','act_act_id',$act_id);
       
        $numfilas = count($act);

        $i = 0;
        foreach ($act as $aux) {
            $rows[$i]['id'] = $aux->act_id;
            $rows[$i]['cell'] = array($aux->act_id,
                $aux->act_codigo.'.  '.$aux->act_nombre
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array(' ', ' ');
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
    
    public function get_new_subact_cod(){
		$act_id = $this->input->get("act_id");
		
		$this->load->model('gestion_componentes/financiera_model');
		
		$codpadre = $this->financiera_model->getcod_act($act_id);
		$codact= $codpadre.'-'.($this->financiera_model->total_hijos_macroact($act_id)+1);//en este caso busca hijos de act pero es misma logica
		
		$newcodigo = json_encode($codact);
		$jsonresponse = '{
               "cod":' . $newcodigo . '}';

        echo $jsonresponse;
	}
	
	public function guardar_subact(){
		$datos = $_POST;
		unset($datos['guardar']);
		
		$this->load->model('gestion_componentes/financiera_model');
		$r=$this->financiera_model->insertar_subact($datos);
		if($r==true)
			$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>'; 
		else
			$informacion['aviso'] = '<p style="color:red">Error, el c&oacute;digo ya existe.</p>';
		
		$informacion['titulo'] = 'Agregar Subactividad';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());        
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('gestion_componentes/agregar_subact_view');
        $this->load->view('plantilla/footer', $informacion);	
		
	}
	
	public function registrar_transferencias() {

        $informacion['titulo'] = 'Registrar Transferencias';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('gestion_componentes/registrar_transferencias_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function get_saldos(){
		$act_id = $this->input->get("act_id");
		
		$this->load->model('gestion_componentes/financiera_model');

		$go=$this->financiera_model->get_goes($act_id);
		$gm=$this->financiera_model->get_gmun($act_id);
		$bi= $this->financiera_model->get_birf($act_id);
		$s=$go+$gm+$bi;
		
		$goes=json_encode($go);
		$gmun=json_encode($gm);
		$birf=json_encode($bi);
		$saldo=json_encode($s);
		
		$newcodigo = 
		$jsonresponse = '{
               "goes":' . $goes . ',
               "gmun":' . $gmun . ',
               "birf":' . $birf . ',
               "saldo":'.$saldo. '}';

        echo $jsonresponse;
	}
	
	public function realizar_transferencia(){
		$datos = $_POST;
		unset($datos['guardar']);
		
		$this->load->model('gestion_componentes/financiera_model');
		$this->financiera_model->insertar_transfer($datos);

		$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>'; 
		
		
		$informacion['titulo'] = 'Registrar Transferencias';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());        
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('gestion_componentes/registrar_transferencias_view');
        $this->load->view('plantilla/footer', $informacion);
	}
	
	public function registrar_mov_subact() {

        $informacion['titulo'] = 'Registrar movimientos de Subactividades';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('gestion_componentes/registrar_mov_subact_view');
        $this->load->view('plantilla/footer', $informacion);
    }

}

?>
