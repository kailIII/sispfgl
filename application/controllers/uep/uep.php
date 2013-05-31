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
                    'departamentos' => $this->comp24->getDepartamentos()
                    ));
    }
    
    /**
     * 
     */
    public function loadActividades($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->comp24->select_data('uep_mem_actividades',array('acs_id'=>$id));
        echo $this->librerias->json_out($d,'acs_id');
    }
    
    public function gestionActividades($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $tabla = 'uep_mem_actividades';
        $campo = 'acs_id';
        $index = $this->input->post('id');
        
        $data = array(
            'acs_mem_id'       => $id,          //id padre
            'acs_correlativo'   => $this->input->post('acs_correlativo'),
            'acs_descripcion'=> $this->input->post('acs_descripcion')
        );
        
        switch ($this->input->post('oper')){ 
        	case 'add':  $this->comp24->insert_row($tabla, $data); break;
        	case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data); break;
        	case 'del':  $this->comp24->db_row_delete($tabla, $campo, $index); break;
        }
    }
    
    public function loadAcuerdos($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->comp24->select_data('uep_mem_acuerdos',array('acu_id'=>$id));
        echo $this->librerias->json_out($d,'acu_id');
    }
    
    public function gestionAcuerdos($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $tabla = 'uep_mem_acuerdos';
        $campo = 'acu_id';
        $index = $this->input->post('id');
        
        $data = array(
            'acu_mem_id'       => $id,          //id padre
            'acu_correlativo'   => $this->input->post('acu_correlativo'),
            'acu_descripcion'=> $this->input->post('acu_descripcion')
        );
        
        switch ($this->input->post('oper')){ 
        	case 'add':  $this->comp24->insert_row($tabla, $data); break;
        	case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data); break;
        	case 'del':  $this->comp24->db_row_delete($tabla, $campo, $index); break;
        }
    }
    
    public function loadAyudas($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->comp24->select_data($this->dbPrefix.'memorias',array('mem_mun_id'=>$id));
        echo $this->librerias->json_out($d,'mem_id',array('mem_id','mem_fecha','mem_nombre'));
    }
    
    public function gestionAyudas($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $tabla = $this->dbPrefix.'memorias';
        $campo = 'mem_id';
        $index = $this->input->post('id');
        
        $data = array(
            'acu_mem_id'       => $id,          //id padre
            'acu_correlativo'   => $this->input->post('acu_correlativo'),
            'acu_descripcion'=> $this->input->post('acu_descripcion')
        );
        
        switch ($this->input->post('oper')){ 
        	//case 'add':  $this->comp24->insert_row($tabla, $data); break;
        	//case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data); break;
        	case 'del':  $this->comp24->db_row_delete($tabla, $campo, $index); break;
        }
    }
    
    /**
     * A. 
     */
    public function ayudaMemorias($id=false, $mun_id = false){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $tabla = $this->dbPrefix.'memorias';
        $campo = 'mem_id';
        $prefix = 'mem_';
        
        $view = array(
            'titulo'        => 'Componente UEP',
            'user_uid'      => $this->tank_auth->get_user_id(),
            'username'      => $this->tank_auth->get_username(),
            'menu'          => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->comp24->getDepartamentos(),
            'tabla_id'      => $id,
            'prefix'        => $prefix
        );
        
        //si es nuevo crear
        if($id == 'new' && $mun_id > 0){
            $this->comp24->insert_row($tabla,array($prefix.'mun_id'=>$mun_id));
            $id = $this->comp24->last_id($tabla,$campo);
            $t = explode('/new/' . $mun_id,current_url());
            redirect($t[0].'/'.$id);
        }
        
        if($id > 0 && !isset($_POST['mod']) | $mun_id > 0 ){
            $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            $_POST = get_object_vars($tmp);
            //print_r($_POST);die();    //test
            $_POST[$prefix.'fecha'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha']);
        }
        
        //Cargamos el municipio y departamento
        if(isset($_POST['mem_mun_id']) && $_POST['mem_mun_id'] > 0){
            $_POST['depto'] = $this->comp24->getDepto($_POST['mem_mun_id'])->dep_nombre;
            $_POST['muni']  = $this->comp24->get_by_Id('municipio','mun_id',$_POST['mem_mun_id'])->mun_nombre;    
        }
        
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('numeric', '*');
        
        $config = array(
            array('field' => 'depto', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean' ),
            array('field' => $prefix.'id'           , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'area'         , 'label' => '', 'rules' => 'trim|xss_clean|required'),
            array('field' => $prefix.'nombre'       , 'label' => '', 'rules' => 'trim|xss_clean|required'),
            array('field' => $prefix.'fecha'    , 'label' => '', 'rules' => 'trim|xss_clean|required'),
            array('field' => $prefix.'comentarios', 'label' => '', 'rules' => 'trim|xss_clean'),

        );
        
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            $datos = array(
                $prefix.'area'          =>  $this->form_validation->set_value($prefix.'area'),
                $prefix.'nombre'        =>  $this->form_validation->set_value($prefix.'nombre'),
                $prefix.'fecha'     =>  $this->comp24->changeDate($this->form_validation->set_value($prefix.'fecha')),
                $prefix.'comentarios'   =>  $this->form_validation->set_value($prefix.'comentarios')
            );
            
            if(!is_null($data = $this->comp24->update_row($tabla,$campo,$id,$datos)))
                {
                    $this->session->set_flashdata('message', 'Ok');
                    if($mun_id > 0){
                        $t = explode('/new/' . $mun_id,current_url());
                        redirect($t[0].'/'.$id);
                    }
                    $t = explode('/' . $id,current_url());
                    redirect($t[0]);
                }
                else
                {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)    $data['errors'][$k] = $this->lang->line($v);
                }          
        }
        
        //Cargar Areas
        $view['mem_area'] = $this->getDataDropbox('mem_areas','are_id','are_nombre',true);
        
        //Cargar Modalidades
        //$view['cap_modalidad'] = $this->getDataDropbox('modalidades','mod_id','mod_nombre');
        
        $this->load->view($this->ruta.'ayudaMemoria',$view);
    }
    
    /**
     * 
     */
    public function loadObjetivos($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->comp24->select_data('uep_per_objetivos',array('obj_id'=>$id));
        echo $this->librerias->json_out($d,'obj_id');
    }
    
    public function gestionObjetivos($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $tabla = 'uep_per_objetivos';
        $campo = 'obj_id';
        $index = $this->input->post('id');
        
        $data = array(
            'obj_per_id'       => $id,          //id padre
            'obj_correlativo'   => $this->input->post('obj_correlativo'),
            'obj_descripcion'=> $this->input->post('obj_descripcion')
        );
        
        switch ($this->input->post('oper')){ 
        	case 'add':  $this->comp24->insert_row($tabla, $data); break;
        	case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data); break;
        	case 'del':  $this->comp24->db_row_delete($tabla, $campo, $index); break;
        }
    }
    
    public function loadEventos($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->comp24->select_data('uep_per_desarrollo',array('des_id'=>$id));
        echo $this->librerias->json_out($d,'des_id');
    }
    
    public function gestionEventos($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $tabla = 'uep_per_desarrollo';
        $campo = 'des_id';
        $index = $this->input->post('id');
        
        $data = array(
            'des_per_id'       => $id,          //id padre
            'des_correlativo'   => $this->input->post('des_correlativo'),
            'des_descripcion'=> $this->input->post('des_descripcion'),
            'des_responsable'=> $this->input->post('des_responsable'),
        );
        
        switch ($this->input->post('oper')){ 
        	case 'add':  $this->comp24->insert_row($tabla, $data); break;
        	case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data); break;
        	case 'del':  $this->comp24->db_row_delete($tabla, $campo, $index); break;
        }
    }
    
    public function loadPerfiles($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->comp24->select_data($this->dbPrefix.'perfiles',array('per_mun_id'=>$id));
        echo $this->librerias->json_out($d,'per_id',array('per_id','per_fecha_ini','per_nombre'));
    }
    
    public function gestionPerfiles($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $tabla = $this->dbPrefix.'memorias';
        $campo = 'mem_id';
        $index = $this->input->post('id');
        
        $data = array(
            'acu_mem_id'       => $id,          //id padre
            'acu_correlativo'   => $this->input->post('acu_correlativo'),
            'acu_descripcion'=> $this->input->post('acu_descripcion')
        );
        
        switch ($this->input->post('oper')){ 
        	//case 'add':  $this->comp24->insert_row($tabla, $data); break;
        	//case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data); break;
        	case 'del':  $this->comp24->db_row_delete($tabla, $campo, $index); break;
        }
    }
    
    /**
     * B. 
     */
    public function perfilesEventos($id=false, $mun_id = false){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $tabla = $this->dbPrefix.'perfiles';
        $campo = 'per_id';
        $prefix = 'per_';
        
        $view = array(
            'titulo'        => 'Componente UEP',
            'user_uid'      => $this->tank_auth->get_user_id(),
            'username'      => $this->tank_auth->get_username(),
            'menu'          => $this->librerias->creaMenu($this->tank_auth->get_username()),
            'departamentos' => $this->comp24->getDepartamentos(),
            'tabla_id'      => $id,
            'prefix'        => $prefix
        );
        
        //si es nuevo crear
        if($id == 'new' && $mun_id > 0){
            $this->comp24->insert_row($tabla,array($prefix.'mun_id'=>$mun_id));
            $id = $this->comp24->last_id($tabla,$campo);
            $t = explode('/new/' . $mun_id,current_url());
            redirect($t[0].'/'.$id);
        }
        
        if($id > 0 && !isset($_POST['mod']) | $mun_id > 0 ){
            $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            $_POST = get_object_vars($tmp);
            //print_r($_POST);die();    //test
            $_POST[$prefix.'fecha_ini'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_ini']);
            $_POST[$prefix.'fecha_fin'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_fin']);
        }
        
        //Cargamos el municipio y departamento
        if(isset($_POST['per_mun_id']) && $_POST['per_mun_id'] > 0){
            $_POST['depto'] = $this->comp24->getDepto($_POST['per_mun_id'])->dep_nombre;
            $_POST['muni']  = $this->comp24->get_by_Id('municipio','mun_id',$_POST['per_mun_id'])->mun_nombre;    
        }
        
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('numeric', '*');
        
        $config = array(
            array('field' => 'depto', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean' ),
            array('field' => $prefix.'id'           , 'label' => '', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'nombre'       , 'label' => '', 'rules' => 'trim|xss_clean|required'),
            array('field' => $prefix.'fecha_ini'    , 'label' => '', 'rules' => 'trim|xss_clean|required'),
            array('field' => $prefix.'fecha_fin'    , 'label' => '', 'rules' => 'trim|xss_clean|required'),
            array('field' => $prefix.'lugar'        , 'label' => '', 'rules' => 'trim|xss_clean|required'),
            array('field' => $prefix.'participantes' , 'label' => '', 'rules' => 'trim|xss_clean|required'),
            array('field' => $prefix.'objetivo'     , 'label' => '', 'rules' => 'trim|xss_clean|required'),
            array('field' => $prefix.'observaciones', 'label' => '', 'rules' => 'trim|xss_clean'),

        );
        
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            $datos = array(
                $prefix.'nombre'        =>  $this->form_validation->set_value($prefix.'nombre'),
                $prefix.'fecha_ini'     =>  $this->comp24->changeDate($this->form_validation->set_value($prefix.'fecha_ini')),
                $prefix.'fecha_fin'     =>  $this->comp24->changeDate($this->form_validation->set_value($prefix.'fecha_fin')),
                $prefix.'lugar'        =>  $this->form_validation->set_value($prefix.'lugar'),
                $prefix.'participantes'        =>  $this->form_validation->set_value($prefix.'participantes'),
                $prefix.'objetivo'        =>  $this->form_validation->set_value($prefix.'objetivo'),
                $prefix.'observaciones'   =>  $this->form_validation->set_value($prefix.'observaciones')
            );
            
            if(!is_null($data = $this->comp24->update_row($tabla,$campo,$id,$datos)))
                {
                    $this->session->set_flashdata('message', 'Ok');
                    if($mun_id > 0){
                        $t = explode('/new/' . $mun_id,current_url());
                        redirect($t[0].'/'.$id);
                    }
                    $t = explode('/' . $id,current_url());
                    redirect($t[0]);
                }
                else
                {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)    $data['errors'][$k] = $this->lang->line($v);
                }          
        }
        
        $this->load->view($this->ruta.'perfilEvento',$view);
    }

}

?>
