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
    private $tbl_acuerdo_municipal = 'acuerdo_municipal2';

    public function __construct() {
        parent::__construct();
        $this->load->model('pais/departamento');
        $this->load->model('componente2/comp24');
        $this->load->library('librerias');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        $this->form_validation->set_message('is_natural_no_zero', '* Obligatorio');
    }
    
    function count_sexo($tabla,$campo_sexo,$campo_index,$index){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        echo json_encode($this->comp24->count_sexo($tabla,$campo_sexo,$campo_index,$index));
    }
    
    function upload_file($tabla, $campo, $index){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        
    }

    
    function setNewId($tabla,$campo,$data){
        $this->db->insert($tabla,$data);
        echo $this->db->last_query();
        $lastId = $this->db->query("SELECT $campo FROM $tabla ORDER BY $campo DESC LIMIT 1;")->row()->$campo;
        return $lastId;
    }
    
    function getAcuerdosMunicipales($mun_id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $data = $this->comp24->select_data('acuerdo_municipal2',array('mun_id'=>$mun_id));
        echo $this->json_out($data,'acu_mun_id',array('acu_mun_id','acu_mun_fecha_conformacion'));
        
    }
    
    function getAcuerdoMunicipal($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $data = $this->comp24->select_data('acuerdo_municipal2',array('acu_mun_id'=>$id));
        
        //echo $this->json_out($data,'acu_mun_id');
        
    }
    
    function json_out($result, $index,$campos='all',$rows=10){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        //$consultoresInt = $this->conInt->obtenerConsultoresInteres($pro_id);
        $numfilas = $result->num_rows();

        $i = 0;
        if ($numfilas != 0) {
            foreach ($result->result() as $aux) {
                $row = array();
                foreach ($aux as $r => $v){
                    //echo "r-$r;v-$v<br>\n";
                    if($campos != 'all' && in_array($r,$campos)){
                        array_push($row,$v);
                    }else if($campos == 'all'){
                        array_push($row,$v);
                    }
                }
                $data[$i]['id'] = $aux->$index;
                $data[$i]['cell'] = $row;
                $i++;
            }
            array_multisort($data, SORT_ASC);
        } else {
            $data = array();
        }

        $datos = json_encode($data);
        $pages = floor($numfilas / 10) + 1;
        
        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        return $jsonresponse;
    }
    
    function index()
    {/*
        if ($message = $this->session->flashdata('message')) {
            $this->load->view('mensaje', array('message' => $message));
        } else {
            redirect('/');
        }*/
        
    }
	
    public function solicitudAyuda(){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $config = array(
            array('field'   => 'selMun',   'label' => 'Municipio',   'rules' => 'trim|required|xss_clean|is_natural_no_zero'),
            array('field'   => 'f_emision',    'label' => 'Emision',    'rules' => 'trim|required|xss_clean'),
            array('field'   => 'f_recepcion',   'label' => 'Recepcion',   'rules' => 'required|xss_clean')
        );
             
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            if(!is_null($data = $this->comp24->insert_solicitud_ayuda(
                $this->form_validation->set_value('selMun'),
                $this->form_validation->set_value('f_emision'),
                $this->form_validation->set_value('f_recepcion')
                )))
                {
                    $this->session->set_flashdata('message', 'Ok');
                    redirect(current_url());
                }
                else
                {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)    $data['errors'][$k] = $this->lang->line($v);
                }          
        }
        
        
        $this->load->view($this->ruta.'solicitudAyuda_view',
            array('titulo' => 'Solicitud de Ayuda',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos(),
                    'mensaje'   =>  $mensaje
                    ));
	   
	}
    
    public function acuerdoMunicipal($id = false){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $tabla = 'acuerdo_municipal2';
        $campo = 'acu_mun_id';
        $prefix = 'acu_mun_';
        
        if($id && !isset($_POST['mod'])){
            $_POST = get_object_vars($this->comp24->get_by_id($tabla, $campo, $id));
            $_POST['acu_mun_fecha_conformacion'] = $this->librerias->parse_output('date',$_POST['acu_mun_fecha_conformacion']);
            $_POST['acu_mun_fecha_acuerdo']      = $this->librerias->parse_output('date',$_POST['acu_mun_fecha_acuerdo']);
            $_POST['acu_mun_fecha_recepcion']    = $this->librerias->parse_output('date',$_POST['acu_mun_fecha_recepcion']);
            $_POST['depto']                   = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni']                   = $this->comp24->get_by_Id('municipio','mun_id',$_POST['mun_id'])->mun_nombre;
        }
        
        $config = array(
            array('field'   => 'depto',            'label' => 'Municipio',     'rules' => 'trim|xss_clean'),
            array('field'   => 'muni',            'label' => 'Municipio',     'rules' => 'trim|xss_clean'),
            array('field'   => 'mun_id',            'label' => 'Municipio',     'rules' => 'trim|required|xss_clean|is_natural_no_zero'),
            array('field'   => 'acu_mun_fecha_conformacion',    'label' => 'Fecha',         'rules' => 'trim|required|xss_clean'),
            array('field'   => 'acu_mun_fecha_acuerdo',         'label' => 'Fecha',         'rules' => 'trim|xss_clean'),
            array('field'   => 'acu_mun_fecha_recepcion',       'label' => 'Fecha',         'rules' => 'trim|xss_clean'),
            array('field'   => 'acu_mun_archivo',       'label' => 'Fecha',         'rules' => 'trim|alpha_dash|xss_clean'),
            array('field'   => 'acu_mun_observaciones',   'label' => 'Fecha',         'rules' => 'trim|xss_clean'),
            array('field' => 'mod',             'label' => 'Mod',               'rules' => 'required|xss_clean' )
        );
             
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            $datos = array(
                $prefix . 'fecha_conformacion'  => $this->librerias->parse_input('date',$this->form_validation->set_value('acu_mun_fecha_conformacion')),
                $prefix . 'fecha_acuerdo'       => $this->librerias->parse_input('date',$this->form_validation->set_value('acu_mun_fecha_acuerdo')),
                $prefix . 'fecha_recepcion'     => $this->librerias->parse_input('date',$this->form_validation->set_value('acu_mun_fecha_recepcion')),
                $prefix . 'archivo'             => $this->form_validation->set_value('acu_mun_archivo'),
                $prefix . 'observaciones'       => $this->form_validation->set_value('acu_mun_observaciones')
            );
            
            if($id > 0){
                if(!is_null($data = $this->comp24->update_row($tabla,$campo,$id,$datos))){
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/' . $id,current_url());
                    redirect($t[0]);
                }
            }else{
                if(!is_null($data = $this->comp24->insert_acuerdo_municipal(
                    $this->form_validation->set_value('mun_id'),
                    $this->form_validation->set_value('acu_mun_fecha_acuerdo'),
                    $this->form_validation->set_value('acu_mun_fecha_recepcion'),
                    $this->form_validation->set_value('acu_mun_fecha_conformacion'),
                    $this->form_validation->set_value('acu_mun_archivo'),
                    $this->form_validation->set_value('acu_mun_observaciones')
                ))){
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/0',current_url());
                    redirect($t[0]);
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)    $data['errors'][$k] = $this->lang->line($v);
                }
            }           
        }else if($mun = $this->form_validation->set_value('mun_id') != 0 && $id == 0){
            //
            //$id = $this->setNewId($this->tbl_acuerdo_municipal,'acu_mun_id');
            $t = explode('/0',current_url());
            redirect($t[0] . '/' . $this->setNewId($tabla,$campo,array('mun_id'=>$mun)));
        }
	
        $this->load->view($this->ruta.'acuerdoMunicipal',
            array('titulo' => 'Solicitud de Ayuda',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos(),
                    $campo => $id
                    ));
					
    }
    
    public function acuMun_loadMiembros($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $d = $this->comp24->select_data('acumun_miembros',array('acu_mun_id'=>$id));
        
        echo $this->json_out($d,'mie_id');
    }
    
    /**
     * Procesa las solicitudes para la tabla acumun_miembros
     */
    public function acuMun_gestionMiembros($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $tabla = 'acumun_miembros';
        $campo = 'mie_id';
        $index = $this->input->post('id');
        
        $data = array(
            'acu_mun_id'    =>  $id,
            'mie_nombre'    => $this->input->post('mie_nombre'),
            'mie_apellidos' => $this->input->post('mie_apellidos'),
            'mie_sexo'      => $this->input->post('mie_sexo'),
            'mie_cargo'     => $this->input->post('mie_cargo'),
            'mie_nivel'     => $this->input->post('mie_nivel'),
            'mie_edad'      => $this->input->post('mie_edad'),
            'mie_telefono'  => $this->librerias->parse_input('phone',$this->input->post('mie_telefono'))
        );
        
        switch ($this->input->post('oper')){ 
        	case 'add':
                $this->comp24->insert_row($tabla, $data);
        	break;
        
        	case 'edit':
                $this->comp24->update_row($tabla, $campo, $index, $data);
        	break;
        
        	case 'del':
                $r = $this->comp24->db_row_delete($tabla, $campo, $index);
        	break;
        }
    }
    
    public function solicitudAsistenciaTecnica($id = false){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $tabla = 'asistencia_tecnica';
        $campo = 'asi_tec_id';
        $prefix = 'asi_tec_';
        
        if($id && !isset($_POST['mod'])){
            $_POST = get_object_vars($this->comp24->get_by_id($tabla, $campo, $id));
            $_POST[$prefix.'fecha_solicitud'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_solicitud']);
            $_POST[$prefix.'fecha_emision']      = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_emision']);
            $_POST[$prefix.'fecha_envio']    = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_envio']);
            $_POST[$prefix.'fecha_inicio']    = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_inicio']);
            $_POST['depto']                   = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni']                   = $this->comp24->get_by_Id('municipio','mun_id',$_POST['mun_id'])->mun_nombre;
        }
        
        $config = array(
            array('field'   => 'depto',            'label' => 'Municipio',     'rules' => 'trim|xss_clean'),
            array('field'   => 'muni',            'label' => 'Municipio',     'rules' => 'trim|xss_clean'),
            array('field'   => $prefix.'fecha_solicitud',    'label' => 'Fecha',         'rules' => 'trim|required|xss_clean'),
            array('field'   => $prefix.'fecha_emision',         'label' => 'Fecha',         'rules' => 'trim|xss_clean'),
            array('field'   => $prefix.'fecha_envio',       'label' => 'Fecha',         'rules' => 'trim|xss_clean'),
            array('field'   => $prefix.'fecha_inicio',       'label' => 'Fecha',         'rules' => 'trim|xss_clean'),
            array('field'   => $prefix.'consultor',            'label' => 'Consultor',     'rules' => 'trim|xss_clean|is_natural_no_zero'),
            array('field'   => $prefix.'observaciones',   'label' => 'Fecha',         'rules' => 'trim|xss_clean'),
            array('field' => 'mod',             'label' => 'Mod',               'rules' => 'required|xss_clean' )
        );
             
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            $datos = array(
                $prefix . 'fecha_solicitud' => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix.'fecha_solicitud')),
                $prefix . 'fecha_emision'   => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix.'fecha_emision')),
                $prefix . 'fecha_envio'     => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix.'fecha_envio')),
                $prefix . 'fecha_inicio'     => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix.'fecha_inicio')),
                $prefix . 'consultor'         => $this->form_validation->set_value($prefix.'consultor'),
                $prefix . 'observaciones'   => $this->form_validation->set_value($prefix.'observaciones')
            );
            
            if($id > 0){
                if(!is_null($data = $this->comp24->update_row($tabla,$campo,$id,$datos))){
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/' . $id,current_url());
                    redirect($t[0]);
                }
            }else{
                if(!is_null($data = $this->comp24->insert_acuerdo_municipal(
                    $this->form_validation->set_value('mun_id'),
                    $this->form_validation->set_value('acu_mun_fecha_acuerdo'),
                    $this->form_validation->set_value('acu_mun_fecha_recepcion'),
                    $this->form_validation->set_value('acu_mun_fecha_conformacion'),
                    $this->form_validation->set_value('acu_mun_archivo'),
                    $this->form_validation->set_value('acu_mun_observaciones')
                ))){
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/0',current_url());
                    redirect($t[0]);
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)    $data['errors'][$k] = $this->lang->line($v);
                }
            }           
        }else if($mun = $this->form_validation->set_value('mun_id') != 0 && $id == 0){
            //
            //$id = $this->setNewId($this->tbl_acuerdo_municipal,'acu_mun_id');
            $t = explode('/0',current_url());
            redirect($t[0] . '/' . $this->setNewId($tabla,$campo,array('mun_id'=>$mun)));
        }
	
        $this->load->view($this->ruta.'solicitudAsistenciaTecnica',
            array('titulo' => 'Solicitud de Asistencia Tecnica',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos(),
                    $campo => $id
                    ));
    }
    
    public function getAsistenciasTecnicas($mun_id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $data = $this->comp24->select_data('asistencia_tecnica',array('mun_id'=>$mun_id));
        echo $this->json_out($data,'asi_tec_id',array('asi_tec_id','asi_tec_fecha_solicitud'));
    }
    
    public function asiTec_loadMiembros($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $d = $this->comp24->select_data('asitec_miembros',array('asi_tec_id'=>$id));
        
        echo $this->json_out($d,'mie_id');
    }
    
    public function asitec_gestionMiembros($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $tabla = 'asitec_miembros';
        $campo = 'mie_id';
        $index = $this->input->post('id');
        
        $data = array(
            'asi_tec_id'    => $id,
            'mie_nombre'    => $this->input->post('mie_nombre'),
            'mie_apellidos' => $this->input->post('mie_apellidos'),
            'mie_sexo'      => $this->input->post('mie_sexo'),
            'mie_cargo'     => $this->input->post('mie_cargo'),
            'mie_nivel'     => $this->input->post('mie_nivel'),
            'mie_edad'      => $this->input->post('mie_edad'),
            'mie_telefono'  => $this->librerias->parse_input('phone',$this->input->post('mie_telefono'))
        );
        
        switch ($this->input->post('oper')){ 
        	case 'add':
                $this->comp24->insert_row($tabla, $data);
        	break;
        
        	case 'edit':
                $this->comp24->update_row($tabla, $campo, $index, $data);
        	break;
        
        	case 'del':
                $r = $this->comp24->db_row_delete($tabla, $campo, $index);
        	break;
        }
    }
    
    public function periodo_check($a,$b=false){
        $b = $this->form_validation->set_value($b);
        if($b != false){
            if($a > $b){
                return true;
            }
        }
        $this->form_validation->set_message('periodo_check','Debe ser mayor.');
        return false;
    }
    
    /**
     * D. Indicadores de Desempeno Administrativo y Financiero Municipal 1
     */
    public function indicadoresDesempenoAdmin($id = false){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $tabla = 'indicadores_desempeno1';
        $campo = 'ind_des_id';
        $prefix = 'ind_des_';
        
        if($id && !isset($_POST['mod'])){
            if(!$tmp = $this->comp24->get_by_id($tabla, $campo, $id)){
                $this->comp24->insert_row($tabla,array($campo=>$id,'mun_id'=>$id));
                $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            }
            $_POST = get_object_vars($tmp);
            $_POST[$prefix.'fecha'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha']);
            $_POST['depto']                   = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni']                   = $this->comp24->get_by_Id('municipio','mun_id',$_POST['mun_id'])->mun_nombre;
        }
        
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('numeric', '*');
        
        $config = array(
            array('field' => 'depto', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean' ),
            array('field' => 'mun_id', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'fecha'             , 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'periodo_inicio'    , 'label' => 'Periodo', 'rules' => 'trim|required|integer|xss_clean'),
            array('field' => $prefix.'periodo_fin'       , 'label' => 'Periodo', 'rules' => 'trim|required|integer|xss_clean|callback_periodo_check[ind_des_periodo_inicio]'),
            array('field' => $prefix.'grupo1_pascir'     , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo1_deucorpla'  , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo1_int'        , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo1_ahoope'    , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo1_intdeu'   , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo1_total'      , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo2_deumuntot'  , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo2_ingopeper'  , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo2_total'      , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'observaciones'     , 'label' => 'Fecha', 'rules' => 'trim|xss_clean')
        );
             
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            $datos = array(
                $prefix.'fecha'            =>  $this->comp24->changeDate($this->form_validation->set_value($prefix.'fecha')),
                $prefix.'periodo_inicio'   =>  $this->form_validation->set_value($prefix.'periodo_inicio'),
                $prefix.'periodo_fin'      =>  $this->form_validation->set_value($prefix.'periodo_fin'),
                $prefix.'grupo1_pascir'    =>  $this->form_validation->set_value($prefix.'grupo1_pascir'),
                $prefix.'grupo1_deucorpla' =>  $this->form_validation->set_value($prefix.'grupo1_deucorpla'),
                $prefix.'grupo1_int'       =>  $this->form_validation->set_value($prefix.'grupo1_int'),
                $prefix.'grupo1_ahoope'    =>  $this->form_validation->set_value($prefix.'grupo1_ahoope'),
                $prefix.'grupo1_intdeu'    =>  $this->form_validation->set_value($prefix.'grupo1_intdeu'),
                $prefix.'grupo1_total'     =>  $this->form_validation->set_value($prefix.'grupo1_total'),
                $prefix.'grupo2_deumuntot' =>  $this->form_validation->set_value($prefix.'grupo2_deumuntot'),
                $prefix.'grupo2_ingopeper' =>  $this->form_validation->set_value($prefix.'grupo2_ingopeper'),
                $prefix.'grupo2_total'     =>  $this->form_validation->set_value($prefix.'grupo2_total'),
                $prefix.'observaciones'    =>  $this->form_validation->set_value($prefix.'observaciones')
            );
            
            if(!is_null($data = $this->comp24->update_row($tabla,$campo,$id,$datos)))
                {
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/' . $id,current_url());
                    redirect($t[0]);
                }
                else
                {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)    $data['errors'][$k] = $this->lang->line($v);
                }          
        }
        
        $this->load->view($this->ruta.'D',
            array('titulo' => 'Elaboracion de Diagnostico',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos(),
                    $campo=>$id
                    ));
    }
    
    /**
     * 
     * E. 
     */
    public function E($id = false){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $tabla = 'indicadores_desempeno2';
        $campo = 'ind_des_id';
        $prefix = 'ind_des_';
        
        if($id && !isset($_POST['mod'])){
            if(!$tmp = $this->comp24->get_by_id($tabla, $campo, $id)){
                $this->comp24->insert_row($tabla,array($campo=>$id,'mun_id'=>$id));
                $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            }
            $_POST = get_object_vars($tmp);
            $_POST[$prefix.'fecha'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha']);
            $_POST['depto']                   = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni']                   = $this->comp24->get_by_Id('municipio','mun_id',$_POST['mun_id'])->mun_nombre;
        }
        
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('numeric', '*');
        
        $config = array(
            array('field' => 'depto' , 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'muni'  , 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'mod'   , 'label' => 'Mod'      , 'rules' => 'required|xss_clean' ),
            array('field' => 'mun_id', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'fecha'           , 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'periodo_inicio'  , 'label' => 'Periodo', 'rules' => 'trim|required|integer|xss_clean'),
            array('field' => $prefix.'periodo_fin'     , 'label' => 'Periodo', 'rules' => 'trim|required|integer|xss_clean|callback_periodo_check[ind_des_periodo_inicio]'),
            array('field' => $prefix.'grupo1_ingtotpre', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo1_gastotdev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo1_total'    , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo2_ingprodev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo2_totingdev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo2_total'    , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo3_moningpro', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo3_totingdev', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo3_total'    , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo4_moningpro', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo4_moningpre', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo4_total'    , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo5_totingtas', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo5_totingpro', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo5_total'    , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo6_totingimp', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo6_totingpro', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'grupo6_total'    , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'observaciones'   , 'label' => 'Fecha', 'rules' => 'trim|xss_clean')
        );
             
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            $datos = array(
                $prefix.'fecha'            =>  $this->comp24->changeDate($this->form_validation->set_value($prefix.'fecha')),
                $prefix.'periodo_inicio'   =>  $this->form_validation->set_value($prefix.'periodo_inicio'),
                $prefix.'periodo_fin'      =>  $this->form_validation->set_value($prefix.'periodo_fin'),
                $prefix.'grupo1_ingtotpre' =>  $this->form_validation->set_value($prefix.'grupo1_ingtotpre'),
                $prefix.'grupo1_gastotdev' =>  $this->form_validation->set_value($prefix.'grupo1_gastotdev'),
                $prefix.'grupo1_total'     =>  $this->form_validation->set_value($prefix.'grupo1_total'),
                $prefix.'grupo2_ingprodev' =>  $this->form_validation->set_value($prefix.'grupo2_ingprodev'),
                $prefix.'grupo2_totingdev' =>  $this->form_validation->set_value($prefix.'grupo2_totingdev'),
                $prefix.'grupo2_total'     =>  $this->form_validation->set_value($prefix.'grupo2_total'),
                $prefix.'grupo3_moningpro' =>  $this->form_validation->set_value($prefix.'grupo3_moningpro'),
                $prefix.'grupo3_totingdev' =>  $this->form_validation->set_value($prefix.'grupo3_totingdev'),
                $prefix.'grupo3_total'     =>  $this->form_validation->set_value($prefix.'grupo3_total'),
                $prefix.'grupo4_moningpro' =>  $this->form_validation->set_value($prefix.'grupo4_moningpro'),
                $prefix.'grupo4_moningpre' =>  $this->form_validation->set_value($prefix.'grupo4_moningpre'),
                $prefix.'grupo4_total'     =>  $this->form_validation->set_value($prefix.'grupo4_total'),
                $prefix.'grupo5_totingtas' =>  $this->form_validation->set_value($prefix.'grupo5_totingtas'),
                $prefix.'grupo5_totingpro' =>  $this->form_validation->set_value($prefix.'grupo5_totingpro'),
                $prefix.'grupo5_total'     =>  $this->form_validation->set_value($prefix.'grupo5_total'),
                $prefix.'grupo6_totingimp' =>  $this->form_validation->set_value($prefix.'grupo6_totingimp'),
                $prefix.'grupo6_totingpro' =>  $this->form_validation->set_value($prefix.'grupo6_totingpro'),
                $prefix.'grupo6_total'     =>  $this->form_validation->set_value($prefix.'grupo6_total'),
                $prefix.'observaciones'    =>  $this->form_validation->set_value($prefix.'observaciones')
            );
            
            if(!is_null($data = $this->comp24->update_row($tabla,$campo,$id,$datos)))
                {
                    $this->session->set_flashdata('message', 'Ok');
                    $t = explode('/' . $id,current_url());
                    redirect($t[0]);
                }
                else
                {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)    $data['errors'][$k] = $this->lang->line($v);
                }          
        }
        
        $this->load->view($this->ruta.'E',
            array('titulo' => 'Elaboracion de Diagnostico',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos(),
                    $campo=>$id
                    ));
    }
    
    public function F(){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $this->load->view($this->ruta.'F',
            array('titulo' => 'Elaboracion de Diagnostico',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
    }
    
    /**
     * 
     * G. Perfil del municipio
     */
    public function perfilMunicipio(){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $this->load->view($this->ruta.'G',
            array('titulo' => 'Diagnostico del Municipio',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
    }
    
    public function H(){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $this->load->view($this->ruta.'H',
            array('titulo' => 'Diagnostico del Municipio',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
    }
    
    public function I(){
		if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $this->load->view($this->ruta.'I',
            array('titulo' => 'Diagnostico del Municipio',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
    }
    
    function _show_message($path, $message)
    {
        $this->session->set_flashdata('message', $message);
        redirect('/componente2/comp24_E0'+$path);
    }

}

?>
