<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 1
 * Del Componente 2.4
 *
 * @author Alexis Beltran
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comp24_E1 extends CI_Controller {
    
    private $ruta = "componente2/subcomp24/etapa1/";

    public function __construct() {
        parent::__construct();
        $this->load->model('pais/departamento');
        $this->load->model('componente2/comp24');
        $this->load->library('librerias');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        $this->form_validation->set_message('is_natural_no_zero', '* Obligatorio');
    }
    
    public function index(){
   	    if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        redirect(current_url() . '/revisionAprobacionProductos');
    }
	
	public function revisionAprobacionProductos($id = false){
	   if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
	   $tabla = 'revapro_productos';
        $campo = 'rea_pro_id';
        $prefix = 'rea_pro_';
        
        if($id && !isset($_POST['mod'])){
            if(!$tmp = $this->comp24->get_by_id($tabla, $campo, $id)){
                $this->comp24->insert_row($tabla,array($campo=>$id,'mun_id'=>$id));
                $tmp = $this->comp24->get_by_id($tabla, $campo, $id);
            }
            $_POST = get_object_vars($tmp);
            $_POST[$prefix.'fecha_presentacion'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_presentacion']);
            $_POST[$prefix.'fecha_vistobueno']   = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_vistobueno']);
            $_POST[$prefix.'fecha_aprobacion']   = $this->librerias->parse_output('date',$_POST[$prefix.'fecha_aprobacion']);
            $_POST['depto']                      = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni']                       = $this->comp24->get_by_Id('municipio','mun_id',$_POST['mun_id'])->mun_nombre;
        }
        
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('numeric', '*');
        
        $config = array(
            array('field' => 'depto', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean' ),
            array('field' => 'mun_id', 'label' => 'Municipio', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'fecha_presentacion'  , 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'fecha_vistobueno'    , 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'fecha_aprobacion'    , 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'is_plan_trabajo'     , 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'is_perfil'           , 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'is_ind_endeudamiento', 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'is_ind_comp'         , 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'is_informe_diag'     , 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'is_visto_bueno'      , 'label' => 'Fecha', 'rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'archivo_acta'        , 'label' => 'Fecha', 'rules' => 'trim|xss_clean'),
            array('field' => $prefix.'observaciones'       , 'label' => 'Fecha', 'rules' => 'trim|xss_clean')
        );
             
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            $datos = array(
                $prefix.'fecha_presentacion'  =>  $this->comp24->changeDate($this->form_validation->set_value($prefix.'fecha_presentacion')),
                $prefix.'fecha_vistobueno'    =>  $this->comp24->changeDate($this->form_validation->set_value($prefix.'fecha_vistobueno')),
                $prefix.'fecha_aprobacion'    =>  $this->comp24->changeDate($this->form_validation->set_value($prefix.'fecha_aprobacion')),
                $prefix.'is_plan_trabajo'     =>  $this->form_validation->set_value($prefix.'is_plan_trabajo'),
                $prefix.'is_perfil'           =>  $this->form_validation->set_value($prefix.'is_perfil'),
                $prefix.'is_ind_endeudamiento'=>  $this->form_validation->set_value($prefix.'is_ind_endeudamiento'),
                $prefix.'is_ind_comp'         =>  $this->form_validation->set_value($prefix.'is_ind_comp'),
                $prefix.'is_informe_diag'     =>  $this->form_validation->set_value($prefix.'is_informe_diag'),
                $prefix.'is_visto_bueno'      =>  $this->form_validation->set_value($prefix.'is_visto_bueno'),
                $prefix.'archivo_acta'        =>  $this->form_validation->set_value($prefix.'archivo_acta'),
                $prefix.'observaciones'       =>  $this->form_validation->set_value($prefix.'observaciones')
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
       
       $this->load->view($this->ruta.'revisionAprobacionProductos',
            array('titulo' => 'Solicitud de Ayuda',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos(),
                    $campo=>$id
                    ));
       
	}

}

?>
