<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 3
 * Del Componente 2.4
 *
 * @author Alexis Beltran
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comp24_E4 extends CI_Controller {
    
    private $ruta = "componente2/subcomp24/etapa4/";

    public function __construct() {
        parent::__construct();
        $this->load->model('pais/departamento');
        $this->load->model('componente2/comp24');
        $this->load->library('librerias');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        $this->form_validation->set_message('is_natural_no_zero', '* Obligatorio');
    }
    
    public function gestionConocimiento($id = false){
   	    if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $tabla = 'gestion_conocimiento';
        $campo = 'gescon_id';
        $prefix = 'gescon_';
        
        if($id && !isset($_POST['mod'])){
            $_POST = get_object_vars($this->comp24->get_by_id($tabla, $campo, $id));
            $_POST[$prefix.'fecha'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha']);
        }
        
        if(isset($_POST['mun_id']) && $_POST['mun_id'] > 0){
            $_POST['depto'] = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni']  = $this->comp24->get_by_Id('municipio','mun_id',$_POST['mun_id'])->mun_nombre;    
        }
        
        $config = array(
            array('field' => 'depto', 'label' => 'Municipio','rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio','rules' => 'trim|xss_clean'),
            array('field' => 'mun_id', 'label' => 'Municipio','rules' => 'trim|xss_clean'),
            array('field' => $prefix.'fecha', 'label' => 'Fecha','rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'tematica', 'label' => 'Fecha','rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'observaciones', 'label' => 'Fecha','rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean' )
        );
             
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            $datos = array(
                $prefix . 'fecha'  => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix .'fecha')),
                $prefix . 'tematica'       => $this->form_validation->set_value($prefix .'tematica'),
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
       
       $this->load->view($this->ruta.'gestionConocimiento',
            array('titulo' => 'Solicitud de Ayuda',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos(),
                    $campo=>$id
                    ));
    }
    
    public function loadGescon($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->comp24->select_data('gestion_conocimiento',array('mun_id'=>$id));
        echo $this->librerias->json_out($d,'gescon_id',array('gescon_id','gescon_fecha'));
    }
    
    public function loadParticipantes($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->comp24->select_data('gescon_participante',array('gescon_id'=>$id));
        echo $this->librerias->json_out($d,'par_id');
    }
    
    public function gestionParticipantes($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $tabla = 'gescon_participante';
        $campo = 'par_id';
        $index = $this->input->post('id');
        
        $data = array(
            'gescon_id'       => $id,
            'par_nombre'      => $this->input->post('par_nombre'),
            'par_apellidos'   => $this->input->post('par_apellidos'),
            'par_institucion' => $this->input->post('par_institucion'),
            'par_cargo'       => $this->input->post('par_cargo'),
            'par_telefono'    => $this->librerias->parse_input('phone',$this->input->post('par_telefono'))
        );
        
        switch ($this->input->post('oper')){ 
        	case 'add':  $this->comp24->insert_row($tabla, $data); break;
        	case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data); break;
        	case 'del':  $this->comp24->db_row_delete($tabla, $campo, $index); break;
        }
    }
	
	/**
     * Alias para llamar a la funcion B
     */
    public function capacitacionConcejoMunicipal($id=false){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $tabla = 'capacitaciones';
        $campo = 'cap_id';
        $prefix = 'cap_';
        
        if($id && !isset($_POST['mod'])){
            $_POST = get_object_vars($this->comp24->get_by_id($tabla, $campo, $id));
            $_POST[$prefix.'fecha'] = $this->librerias->parse_output('date',$_POST[$prefix.'fecha']);
        }
        
        if(isset($_POST['mun_id']) && $_POST['mun_id'] > 0){
            $_POST['depto'] = $this->comp24->getDepto($_POST['mun_id'])->dep_nombre;
            $_POST['muni']  = $this->comp24->get_by_Id('municipio','mun_id',$_POST['mun_id'])->mun_nombre;    
        }
        
        $config = array(
            array('field' => 'depto', 'label' => 'Municipio','rules' => 'trim|xss_clean'),
            array('field' => 'muni', 'label' => 'Municipio','rules' => 'trim|xss_clean'),
            array('field' => 'mun_id', 'label' => 'Municipio','rules' => 'trim|xss_clean'),
            array('field' => $prefix.'fecha', 'label' => 'Fecha','rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'tema', 'label' => 'Fecha','rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'lugar', 'label' => 'Fecha','rules' => 'trim|required|xss_clean'),
            array('field' => $prefix.'facilitadores', 'label' => 'Fecha','rules' => 'trim|xss_clean'),
            array('field' => $prefix.'observaciones', 'label' => 'Fecha','rules' => 'trim|xss_clean'),
            array('field' => 'mod', 'label' => 'Mod', 'rules' => 'required|xss_clean' )
        );
             
        $this->form_validation->set_rules($config);
        
        $data['errors'] = array();
        $mensaje = false;
        
        if ($this->form_validation->run())
        {
            $datos = array(
                $prefix . 'fecha'  => $this->librerias->parse_input('date',$this->form_validation->set_value($prefix .'fecha')),
                $prefix . 'tema'       => $this->form_validation->set_value($prefix .'tema'),
                $prefix . 'lugar'       => $this->form_validation->set_value($prefix .'lugar'),
                $prefix . 'facilitadores'       => $this->form_validation->set_value($prefix .'facilitadores'),
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
              
        $this->load->view($this->ruta.'capacitacionConcejoMunicipal',
            array('titulo' => 'Solicitud de Ayuda',
                    'user_uid' => $this->tank_auth->get_user_id(),
                    'username' => $this->tank_auth->get_username(),
                    'menu' => $this->librerias->creaMenu($this->tank_auth->get_username()),
                    'departamentos' => $this->departamento->obtenerDepartamentos(),
                    $campo=>$id
                    ));
    }
    
    public function getCapacitaciones($mun_id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->comp24->select_data('capacitaciones',array('mun_id'=>$mun_id));
        echo $this->librerias->json_out($d,'cap_id',array('cap_id','cap_fecha'));
    }
    
    public function loadConcejo($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->comp24->select_data('cap_participante',array('gescon_id'=>$id));
        echo $this->librerias->json_out($d,'gescon_id');
    }
    
    public function gestionConcejo($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $tabla = 'cap_participante';
        $campo = 'par_id';
        $index = $this->input->post('id');
        
        $data = array(
            'cap_id'       => $id,          //id padre
            'par_nombre'   => $this->input->post('par_nombre'),
            'par_apellidos'=> $this->input->post('par_apellidos'),
            'par_sexo'     => $this->input->post('par_sexo'),
            'par_edad'     => $this->input->post('par_edad'),
            'par_cargo'    => $this->input->post('par_cargo'),
            'par_telefono' => $this->librerias->parse_input('phone',$this->input->post('par_telefono'))
        );
        
        switch ($this->input->post('oper')){ 
        	case 'add':  $this->comp24->insert_row($tabla, $data); break;
        	case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data); break;
        	case 'del':  $this->comp24->db_row_delete($tabla, $campo, $index); break;
        }
    }
    
    public function loadComision($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->comp24->select_data('acumun_miembros',array('acu_mun_id'=>$id));
        echo $this->librerias->json_out($d,'acu_mun_id');
    }
    
    public function gestionComision($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $tabla = 'acumun_miembros';
        $campo = 'par_id';
        $index = $this->input->post('id');
        
        $data = array(
            'cap_id'       => $id,          //id padre
            'mie_nombre'   => $this->input->post('mie_nombre'),
            'mie_apellidos'=> $this->input->post('mie_apellidos'),
            'mie_sexo'     => $this->input->post('mie_sexo'),
            'mie_edad'     => $this->input->post('mie_edad'),
            'mie_cargo'    => $this->input->post('mie_cargo'),
            'mie_telefono' => $this->librerias->parse_input('phone',$this->input->post('mie_telefono'))
        );
        
        switch ($this->input->post('oper')){ 
        	case 'add':  $this->comp24->insert_row($tabla, $data); break;
        	case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data); break;
        	case 'del':  $this->comp24->db_row_delete($tabla, $campo, $index); break;
        }
    }
    
    public function loadOtros($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        $d = $this->comp24->select_data('cap_participante',array('cap_id'=>$id));
        echo $this->librerias->json_out($d,'cap_id');
    }
    
    public function gestionOtros($id){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        
        $tabla = 'cap_participante';
        $campo = 'par_id';
        $index = $this->input->post('id');
        
        $data = array(
            'cap_id'       => $id,          //id padre
            'par_nombre'   => $this->input->post('par_nombre'),
            'par_apellidos'=> $this->input->post('par_apellidos'),
            'par_sexo'     => $this->input->post('par_sexo'),
            'par_edad'     => $this->input->post('par_edad'),
            'par_cargo'    => $this->input->post('par_cargo'),
            'par_telefono' => $this->librerias->parse_input('phone',$this->input->post('par_telefono'))
        );
        
        switch ($this->input->post('oper')){ 
        	case 'add':  $this->comp24->insert_row($tabla, $data); break;
        	case 'edit': $this->comp24->update_row($tabla, $campo, $index, $data); break;
        	case 'del':  $this->comp24->db_row_delete($tabla, $campo, $index); break;
        }
    }
    
    /**
     * Cuanta los sexos de los participantes.
     * Advertencia:
     */
    public function count_sexo(){
        if (!$this->tank_auth->is_logged_in()) redirect('/auth');                // logged in
        echo json_encode($this->comp24->count_sexo($tabla,$campo_sexo,$campo_index,$index));
    }

}

?>
