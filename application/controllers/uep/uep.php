<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 1
 * Del PEP por los consultores asignados.
 *
 * @author Alexis Beltran
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class uep extends CI_Controller {
    
    private $ruta = "uep/";
    private $rol  = 0;
    private $dbPrefix = "uep_";    

    public function __construct() {
        parent::__construct();
        $this->load->model('pais/departamento');
        $this->load->model('componente2/comp24');
        $this->load->model('componente2/model22');
        $this->load->library('librerias');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        $this->form_validation->set_message('is_natural_no_zero', '* Obligatorio');
    }
    
    function getDataDropbox($tabla,$campo,$valor,$add_id=false){
        $data = $this->db->get($this->dbPrefix.$tabla);
        $salida = array('0'=>'Seleccione');
        foreach($data->result() as $row){
            if($add_id)
                $salida[$row->$campo] = $row->$campo . '| ' . $row->$valor;
            else
                $salida[$row->$campo] = $row->$valor;
        }
        return $salida; 
    }
    
    /**
     * Index
     */
    public function index(){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $this->load->view($this->ruta.'comp22index',
            array('titulo' => 'Componente 2.2: Capacitaciones',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos()
                    ));
    }
    
    /**
     * 
     */
    public function loadParticipantesSolicitud($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $data = $this->model22->getParticipantes($id);
        echo $this->librerias->json_out($data,'par_id');
    }
    
    public function loadParticipantesInscritos($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $data = $this->model22->getInscritos($id);
        echo $this->librerias->json_out($data,'cxp_id');
    }
    
    /**
     * B. 
     */
    public function ayudaMemorias($id=false){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $tabla = $this->dbPrefix.'capacitaciones';
        $campo = 'cap_id';
        $prefix = 'cap_';
        
        $view = array(
            'titulo'        => 'Componente UEP',
            'user_uid'      => $this->tank_auth->get_user_id(),
            'username'      => $this->tank_auth->get_username(),
            'menu'          => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->departamento->obtenerDepartamentos(),
            'tabla_id'      => $id,
            'prefix'        => $prefix
        );
        
        if($id && !isset($_POST['mod'])){
            if(!($tmp = $this->comp24->get_by_id($tabla, $campo, $id))){
                $id = $this->comp24->insert_row($tabla,array('cap_add'=>date('Y-m-d')));
                $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            }
            $_POST = get_object_vars($tmp);
            //print_r($_POST);die();    //test
            $_POST[$prefix.'fecha_ini'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_ini']);
        }
        
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('numeric', '*');
        
        $config = array(
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean' ),
            array('field' => $prefix.'id'           , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => 'sed_id'               , 'label' => '', 'rules' => 'trim|required|xss_clean'),
            array('field' => 'mod_id'               , 'label' => '', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'proceso'      , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'area'         , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'nombre'       , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'entidad'      , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'nivel'        , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'facilitador'  , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'fecha_ini'    , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'duracion'     , 'label' => '', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'duracion_tipo', 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'descripcion'  , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'observaciones', 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'archivo'      , 'label' => '', 'rules' => 'trim|xss_clean'),
        );
        
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            $datos = array(
                'sed_id'                =>  $this->form_validation->set_value('sed_id'),
                'mod_id'                =>  $this->form_validation->set_value('mod_id'),
                $prefix.'proceso'       =>  $this->form_validation->set_value($prefix.'proceso'),
                $prefix.'area'          =>  $this->form_validation->set_value($prefix.'area'),
                $prefix.'nombre'        =>  $this->form_validation->set_value($prefix.'nombre'),
                $prefix.'entidad'       =>  $this->form_validation->set_value($prefix.'entidad'),
                $prefix.'nivel'         =>  $this->form_validation->set_value($prefix.'nivel'),
                $prefix.'facilitador'   =>  $this->form_validation->set_value($prefix.'facilitador'),
                $prefix.'fecha_ini'     =>  $this->comp24->changeDate($this->form_validation->set_value($prefix.'fecha_ini')),
                $prefix.'duracion'      =>  $this->form_validation->set_value($prefix.'duracion'),
                $prefix.'duracion_tipo' =>  $this->form_validation->set_value($prefix.'duracion_tipo'),
                $prefix.'descripcion'   =>  $this->form_validation->set_value($prefix.'descripcion'),
                $prefix.'archivo'       =>  $this->form_validation->set_value($prefix.'archivo'),
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
        
        //Cargar Sedes
        $view['cap_sede'] = $this->getDataDropbox('sedes','sed_id','sed_nombre',true);
        
        //Cargar Modalidades
        $view['cap_modalidad'] = $this->getDataDropbox('modalidades','mod_id','mod_nombre');
        
        $this->load->view($this->ruta.'ayudaMemorias',$view);
    }
    
    /**
     * C. 
     */
    public function asignacionParticipantes($id=false){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $tabla = $this->dbPrefix.'capacitaciones';
        $campo = 'cap_id';
        $prefix = 'cap_';
        $view = array(
            'titulo'        => 'Componente 2.2: Capacitaciones',
            'user_uid'      => $this->tank_auth->get_user_id(),
            'username'      => $this->tank_auth->get_username(),
            'menu'          => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->departamento->obtenerDepartamentos(),
            'tabla_id'      => $id,
            'prefix'        => $prefix
        );
        
        if($id && !isset($_POST['mod'])){
            if(!($tmp = $this->comp24->get_by_id($tabla, $campo, $id))){
                $id = $this->comp24->insert_row($tabla,array('cap_add'=>date('Y-m-d')));
                $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            }
            $_POST = get_object_vars($tmp);
            //print_r($_POST);die();    //test
            $_POST[$prefix.'fecha_ini'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_ini']);
        }
        
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('numeric', '*');
        
        $config = array(
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean' ),
            array('field' => $prefix.'id'           , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => 'sed_id'               , 'label' => '', 'rules' => 'trim|required|xss_clean'),
            array('field' => 'mod_id'               , 'label' => '', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'proceso'      , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'area'         , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'nombre'       , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'entidad'      , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'nivel'        , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'facilitador'  , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'fecha_ini'    , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'duracion'     , 'label' => '', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'duracion_tipo', 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'descripcion'  , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'observaciones', 'label' => '', 'rules' => 'trim|xss_clean')
        );
        
        $this->form_validation->set_rules($config);
        $this->form_validation->run();
                //Cargar Sedes
        $view['cap_sede'] = $this->getDataDropbox('sedes','sed_id','sed_nombre',true);
        
        //Cargar Modalidades
        $view['cap_modalidad'] = $this->getDataDropbox('modalidades','mod_id','mod_nombre');
        
        $this->load->view($this->ruta.'asignacionParticipantes',$view);
    }
    
    public function loadCapacitaciones(){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->comp24->select_data($this->dbPrefix.'capacitaciones');
        echo $this->librerias->json_out($d,'cap_id',array('cap_id','cap_proceso','cap_nombre','cap_fecha_ini'));
    }
    
    public function inscribirParticipante($cap_id,$par_id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        if($cap_id+$par_id>0){
            $data = array(
                'cxp_cap_id' => $cap_id,
                'cxp_par_id' => $par_id
                );
            echo $this->model22->insert_row($this->dbPrefix.'cxp_inscritos',$data);
        }else{
            return 'error';
        }
    }
    
    public function desinscribirParticipante($cxp_id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        if($cxp_id>0){
            echo $this->model22->db_row_delete($this->dbPrefix.'cxp_inscritos','cxp_id',$cxp_id);
            //echo $this->model22->insert_row($this->dbPrefix.'cxp_inscritos',$data);
        }else{
            return 'error';
        }
    }
    
    /**
     * D.
     */
    public function resultadosParticipantes($id=false){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $tabla = $this->dbPrefix.'capacitaciones';
        $campo = 'cap_id';
        $prefix = 'cap_';
        $view = array(
            'titulo'        => 'Componente 2.2: Capacitaciones',
            'user_uid'      => $this->tank_auth->get_user_id(),
            'username'      => $this->tank_auth->get_username(),
            'menu'          => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->departamento->obtenerDepartamentos(),
            'tabla_id'      => $id,
            'prefix'        => $prefix
        );
        
        if($id && !isset($_POST['mod'])){
            if(!($tmp = $this->comp24->get_by_id($tabla, $campo, $id))){
                $id = $this->comp24->insert_row($tabla,array('cap_add'=>date('Y-m-d')));
                $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            }
            $_POST = get_object_vars($tmp);
            //print_r($_POST);die();    //test
            $_POST[$prefix.'fecha_ini'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_ini']);
        }
        
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('numeric', '*');
        
        $config = array(
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean' ),
            array('field' => $prefix.'id'           , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => 'sed_id'               , 'label' => '', 'rules' => 'trim|required|xss_clean'),
            array('field' => 'mod_id'               , 'label' => '', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'proceso'      , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'area'         , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'nombre'       , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'entidad'      , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'nivel'        , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'facilitador'  , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'fecha_ini'    , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'duracion'     , 'label' => '', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'duracion_tipo', 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'descripcion'  , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'observaciones', 'label' => '', 'rules' => 'trim|xss_clean')
        );
        
        $this->form_validation->set_rules($config);
        $this->form_validation->run();
                //Cargar Sedes
        $view['cap_sede'] = $this->getDataDropbox('sedes','sed_id','sed_nombre',true);
        
        //Cargar Modalidades
        $view['cap_modalidad'] = $this->getDataDropbox('modalidades','mod_id','mod_nombre');
        $this->load->view($this->ruta.'resultadosParticipantes',$view);
    }
    
    public function loadResultados($cap_id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->model22->getResultados($cap_id);
        echo $this->librerias->json_out($d,'cxp_id');
    }
    
    public function gestionResultados(){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $tabla = $this->dbPrefix . 'cxp_inscritos';
        $campo = 'cxp_id';
        $index = $this->input->post('id');
        
        $data = array(
            'cxp_estado'        => $this->input->post('cxp_estado'),
            'cxp_promedio'      => $this->input->post('cxp_promedio'),
            'cxp_constancia'    => $this->input->post('cxp_constancia'),
            'cxp_observaciones' => $this->input->post('cxp_observaciones')
        );
        
        switch ($this->input->post('oper')){ 
        	//case 'add':  $this->comp24->insert_row($tabla, $data); break;
        	case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data); break;
        	//case 'del':  $this->comp24->db_row_delete($tabla, $campo, $index); break;
        }
    }
    
    
    /**
     * A. 
     */
    public function solicitudInscripcion($id=false){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $tabla = $this->dbPrefix . 'participantes';
        $campo = 'par_id';
        $prefix = 'par_';
        $view = array(
            'titulo'        => 'Componente 2.2: Capacitaciones',
            'user_uid'      => $this->tank_auth->get_user_id(),
            'username'      => $this->tank_auth->get_username(),
            'menu'          => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->departamento->obtenerDepartamentos(),
            'tabla_id'      => $id,
            'prefix'        => $prefix
        );
        
        if($id && !isset($_POST['mod'])){
            if(!($tmp = $this->comp24->get_by_id($tabla, $campo, $id))){
                $this->comp24->insert_row($tabla,array($campo=>$id,'mun_id'=>$id));
                $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            }
            $_POST = get_object_vars($tmp);
            //print_r($_POST);die();    //test
            $_POST[$prefix.'birthday'] = $this->librerias->parse_output('date',$_POST[$prefix.'birthday']);
        }
        
        //Cargamos el municipio y departamento
        if(isset($_POST['mun_id']) && $_POST['mun_id'] > 0){
            $_POST['depto'] = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni']  = $this->comp24->get_by_Id('municipio','mun_id',$_POST['mun_id'])->mun_nombre;    
        }
        
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('numeric', '*');
        
        $config = array(
            array('field' => 'depto', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean' ),
            array('field' => 'mun_id', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'nombres'      , 'label' => '', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'apellidos'    , 'label' => '', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'birthplace'   , 'label' => '', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'birthday'     , 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'sexo'         , 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'dui'          , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'dir_tipo'     , 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'dir_nombre'   , 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'dir_calle'    , 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'dir_casa'     , 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'dir_municipio', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'telefono'     , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'movil'        , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'nivel'        , 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'titulos'      , 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'ins_municipio', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'ins_cargo'    , 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'ins_categoria', 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'ins_nivel'    , 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'ins_tiempo'   , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'ins_tiempo2'  , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'ins_servicio' , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'ins_servicio2', 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'ins_telefono' , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'ins_movil'    , 'label' => 'Fecha', 'rules' => 'trim|xss_clean|numeric'),
            array('field' => $prefix.'acepta'       , 'label' => 'Fecha', 'rules' => 'trim|xss_clean')
        );
        
        //
        $view['capacitaciones'] = $this->getDataDropbox('capacitaciones','cap_id','cap_area',true);
        
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            $datos = array(
                $prefix.'nombres'      =>  $this->form_validation->set_value($prefix.'nombres'),
                $prefix.'apellidos'    =>  $this->form_validation->set_value($prefix.'apellidos'),
                $prefix.'birthplace'   =>  $this->form_validation->set_value($prefix.'birthplace'),
                $prefix.'birthday'     =>  $this->comp24->changeDate($this->form_validation->set_value($prefix.'birthday')),
                $prefix.'sexo'         =>  $this->form_validation->set_value($prefix.'sexo'),
                $prefix.'dui'          =>  $this->form_validation->set_value($prefix.'dui'),
                $prefix.'dir_tipo'     =>  $this->form_validation->set_value($prefix.'dir_tipo'),
                $prefix.'dir_nombre'   =>  $this->form_validation->set_value($prefix.'dir_nombre'),
                $prefix.'dir_calle'    =>  $this->form_validation->set_value($prefix.'dir_calle'),
                $prefix.'dir_casa'     =>  $this->form_validation->set_value($prefix.'dir_casa'),
                $prefix.'dir_municipio'=>  $this->form_validation->set_value($prefix.'dir_municipio'),
                $prefix.'telefono'     =>  $this->form_validation->set_value($prefix.'telefono'),
                $prefix.'movil'        =>  $this->form_validation->set_value($prefix.'movil'),
                $prefix.'nivel'        =>  $this->form_validation->set_value($prefix.'nivel'),
                $prefix.'titulos'      =>  $this->form_validation->set_value($prefix.'titulos'),
                $prefix.'ins_municipio'=>  $this->form_validation->set_value($prefix.'ins_municipio'),
                $prefix.'ins_cargo'    =>  $this->form_validation->set_value($prefix.'ins_cargo'),
                $prefix.'ins_categoria'=>  $this->form_validation->set_value($prefix.'ins_categoria'),
                $prefix.'ins_nivel'    =>  $this->form_validation->set_value($prefix.'ins_nivel'),
                $prefix.'ins_tiempo'   =>  $this->form_validation->set_value($prefix.'ins_tiempo'),
                $prefix.'ins_tiempo2'  =>  $this->form_validation->set_value($prefix.'ins_tiempo2'),
                $prefix.'ins_servicio' =>  $this->form_validation->set_value($prefix.'ins_servicio'),
                $prefix.'ins_servicio2'=>  $this->form_validation->set_value($prefix.'ins_servicio2'),
                $prefix.'ins_telefono' =>  $this->form_validation->set_value($prefix.'ins_telefono'),
                $prefix.'ins_movil'    =>  $this->form_validation->set_value($prefix.'ins_movil'),
                $prefix.'acepta'       =>  $this->form_validation->set_value($prefix.'acepta'),
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
        
        $this->load->view($this->ruta.'solicitudInscripcion',$view);
    }
    
    public function addSolicitud($par_id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $tabla = $this->dbPrefix . 'cxp_solicitud';
        
        $datos = array(
            'par_id' => $par_id,
            'cap_id' => $this->input->post('cap_id'),
            'cxp_justificacion' => $this->input->post('cxp_justificacion')
            );
        
        if(!is_null($data = $this->comp24->insert_row($tabla,$datos))){
            $this->session->set_flashdata('message', 'Ok');
            redirect(base_url('componente2/comp22/solicitudInscripcion/'.$par_id));
        }
        else {
            $errors = $this->tank_auth->get_error_message();
            foreach ($errors as $k => $v)    $data['errors'][$k] = $this->lang->line($v);
        }
    }

}

?>
