<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 3
 * Del Componente 2.4
 *
 * @author Alexis Beltran
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comp24_Final extends CI_Controller {
    
    private $ruta = "componente2/subcomp24/final/";

    public function __construct() {
       parent::__construct();
        $this->load->model('pais/departamento');
        $this->load->model('componente2/comp24');
        $this->load->library('librerias');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        $this->form_validation->set_message('is_natural_no_zero', '* Obligatorio');
    }
    
    public function gestionRiesgos($id=false){
   	   if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
	   $tabla = 'gestion_riesgo';
        $campo = 'gesrie_id';
        $prefix = 'gesrie_';
        
        if($id && !isset($_POST['mod'])){
            $_POST = get_object_vars($this->comp24->get_by_id($tabla, $campo, $id));
            $_POST[$prefix.'fecha_orden'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_orden']);
            $_POST[$prefix.'fecha_acta'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_acta']);
            $_POST[$prefix.'fecha_diagnostico'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_diagnostico']);
            $_POST[$prefix.'fecha_socializacion'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_socializacion']);
            $_POST[$prefix.'fecha_aprobacion'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_aprobacion']);
            $_POST[$prefix.'fecha_inicio'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_inicio']);
            $_POST[$prefix.'fecha_aprob_comite'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_aprob_comite']);
            $_POST[$prefix.'fecha_acuerdo'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_acuerdo']);
            $_POST[$prefix.'fecha_presentacion'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_presentacion']);
            $_POST[$prefix.'fecha_seguimiento'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_seguimiento']);
        }
        
        if(isset($_POST['mun_id']) && $_POST['mun_id'] > 0){
            $_POST['depto'] = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni']  = $this->comp24->get_by_Id('municipio','mun_id',$_POST['mun_id'])->mun_nombre;    
        }
        
        $config = array(
            array('field' => 'depto', 'label' => 'Municipio','rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio','rules' => 'trim|xss_clean'),
            array('field' => 'mun_id', 'label' => 'Municipio','rules' => 'trim|xss_clean'),
            array('field' => $prefix.'fecha_orden', 'label' => 'Fecha','rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'fecha_acta', 'label' => 'Fecha','rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'fecha_diagnostico', 'label' => 'Fecha','rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'fecha_socializacion', 'label' => 'Fecha','rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'fecha_aprobacion', 'label' => 'Fecha','rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'fecha_inicio', 'label' => 'Fecha','rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'fecha_aprob_comite', 'label' => 'Fecha','rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'fecha_acuerdo', 'label' => 'Fecha','rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'fecha_presentacion', 'label' => 'Fecha','rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'fecha_seguimiento', 'label' => 'Fecha','rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'observaciones', 'label' => 'Fecha','rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean' )
        );
             
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            $datos = array(
                $prefix . 'fecha_orden'  => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix .'fecha_orden')),
                $prefix . 'fecha_acta'  => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix .'fecha_acta')),
                $prefix . 'fecha_diagnostico'  => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix .'fecha_diagnostico')),
                $prefix . 'fecha_socializacion'  => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix .'fecha_socializacion')),
                $prefix . 'fecha_aprobacion'  => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix .'fecha_aprobacion')),
                $prefix . 'fecha_inicio'  => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix .'fecha_inicio')),
                $prefix . 'fecha_aprob_comite'  => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix .'fecha_aprob_comite')),
                $prefix . 'fecha_acuerdo'  => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix .'fecha_acuerdo')),
                $prefix . 'fecha_presentacion'  => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix .'fecha_presentacion')),
                $prefix . 'fecha_seguimiento'  => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix .'fecha_seguimiento')),
                $prefix . 'observaciones'       => $this->form_validation->set_value($prefix .'observaciones')
            );
            
            if($id > 0){
                if(!is_null($data = $this->comp24->update_row($tabla,$campo,$id,$datos))){
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/' . $id,current_url());
                    redirect($t[0]);
                }
            }else{
                $datos['mun_id'] = $this->form_validation->set_value('mun_id');
                if(!is_null($data = $this->comp24->insert_row($tabla,$datos))){
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/0',current_url());
                    redirect($t[0]);
                }
            }           
        }else if($mun = $this->form_validation->set_value('mun_id') != 0 && $id == 0){
            //
            //$id = $this->setNewId($this->tbl_acuerdo_municipal,'acu_mun_id');
            $t = explode('/0',current_url());
            redirect($t[0] . '/' . $this->librerias->setNewId($tabla,$campo,array('mun_id'=>$mun)));
        }
       
       $this->load->view($this->ruta.'gestionRiesgo',
            array('titulo' => 'Solicitud de Ayuda',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos(),
                    $campo=>$id
                    ));
    }
    
    public function loadGesRie($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->comp24->select_data('gestion_riesgo',array('mun_id'=>$id));
        echo $this->librerias->json_out($d,'gesrie_id');
    }
    
    public function loadParticipantes($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->comp24->select_data('gesrie_participan',array('gesrie_id'=>$id));
        echo $this->librerias->json_out($d,'par_id');
    }
    
    public function gestionParticipantes($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $tabla = 'gesrie_participan';
        $campo = 'par_id';
        $index = $this->input->post('id');
        
        $data = array(
            'gesrie_id'       => $id,
            'par_nombre'      => $this->input->post('par_nombre'),
            'par_institucion' => $this->input->post('par_institucion'),
            'par_cargo'       => $this->input->post('par_cargo')
        );
        
        switch ($this->input->post('oper')){ 
        	case 'add':  $this->comp24->insert_row($tabla, $data); break;
        	case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data); break;
        	case 'del':  $this->comp24->db_row_delete($tabla, $campo, $index); break;
        }
    }
}

?>
