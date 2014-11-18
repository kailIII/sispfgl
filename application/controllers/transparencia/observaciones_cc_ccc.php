<?php

/**
 * Controlador para componente 3
 *
 * @author Carlos Romero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class  observaciones_cc_ccc extends CI_Controller {
	
	public function index() {

    }
	
    public function agregar_obs() {
		
		$informacion['titulo'] = 'Agregar Observaci&oacute;n a CC o CCC';
        //$informacion['user_id'] = $this->tank_auth->get_user_id();
        //$informacion['username'] = $this->tank_auth->get_username();
        //$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('transparencia/agregar_obs_cc_ccc');
        $this->load->view('plantilla/footer', $informacion);
        
    }
    
    public function gestion_obs_cc_ccc() {
		
		$informacion['titulo'] = 'Observaciones Realizadas a CC y CCC';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('transparencia/gestion_obs_cc_ccc');
        $this->load->view('plantilla/footer', $informacion);
        
    }
    
    public function responder_obs_cc($id) {
		
		$informacion['id']=$id;
		$informacion['tipo']='cc';
		$informacion['titulo'] = 'Responder Observacion Realizada';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('transparencia/responder_obs_cc_ccc', $informacion);
        $this->load->view('plantilla/footer', $informacion);
        
    }
    
    public function responder_obs_ccc($id) {
		
		$informacion['id']=$id;
		$informacion['tipo']='ccc';
		$informacion['titulo'] = 'Responder Observacion Realizada';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('transparencia/responder_obs_cc_ccc', $informacion);
        $this->load->view('plantilla/footer', $informacion);
        
    }
    
    public function enviar_respuesta($id){
		$this->load->library('email');
		$envio=$_POST;
		
		$this->load->model('transparencia/transparencia_model');
		if($envio['tipo']=='cc')
			$datos=$this->transparencia_model->get_datos_obs_cc($id);
		else
			$datos=$this->transparencia_model->get_datos_obs_ccc($id);
		
		$informacion['nombre_persona']=$datos->nombre_persona;
		$informacion['email']=$datos->email;
		$informacion['comentario']=$datos->comentario;
		
		$this->email->from($envio['email'], $envio['nombre_persona']);
		$this->email->to($datos->email);
		$this->email->subject('SISPFGL - Respuesta a su Comentario Publico realizado.');
		$this->email->message($envio['resp']);	
		if(!$this->email->send())
			$informacion['estatus']='<span style="color:red">Se ha producido un error en el env&iacute;o del Mensaje. Intente nuevamente.</span>';
		else
			$informacion['estatus']='<span style="color:blue">Su mensaje ha sido enviado con exito.</span>';
		
		$informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
		$this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('transparencia/respuesta_enviada', $informacion);
        $this->load->view('plantilla/footer', $informacion);
		
		}   
    
    public function validar_email(){
		$this->load->helper('email');
		$email=$this->input->post("email");

		if (valid_email($email))
			{
				echo '1';
			}
		else
			{
				echo '0';
			}
	}
    
    public function guardar_nueva_obs(){
		//Verificacion del captcha
				require_once('resource/recaptcha-php-1.11/recaptchalib.php');
				$privatekey = "6Lfi_-ESAAAAAEm23hZQntP1t9POUWRNOMoXYpCV";
				$resp = recaptcha_check_answer ($privatekey,
											$_SERVER["REMOTE_ADDR"],
											$_POST["recaptcha_challenge_field"],
											$_POST["recaptcha_response_field"]);

				if (!$resp->is_valid) {
					// What happens when the CAPTCHA was entered incorrectly
					$msg="El c&oacute;digo de CAPTCHA no fue ingresado correctamente. Intente nuevamente." .
					"(reCAPTCHA said: " . $resp->error . ")";
					
					$informacion['titulo'] = 'Agregar Observaci&oacute;n a CC o CCC';
					//$informacion['user_id'] = $this->tank_auth->get_user_id();
					//$informacion['username'] = $this->tank_auth->get_username();
					//$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
					$informacion['aviso'] = '<p style="color:blue">'.$msg.'.</p>';         
					$this->load->view('plantilla/header', $informacion);
					$this->load->view('plantilla/menu', $informacion);
					$this->load->view('transparencia/agregar_obs_cc_ccc');
					$this->load->view('plantilla/footer', $informacion);
				} else {
					// Your code here to handle a successful verification
					$this->load->model('transparencia/transparencia_model');
					$datos_obs = $_POST;
					unset($datos_obs['guardar']);
					if($datos_obs['tipo_obs']=='cc')
					$this->transparencia_model->insertar_obs_cc($datos_obs);
					else
					$this->transparencia_model->insertar_obs_ccc($datos_obs);
					
					$informacion['titulo'] = 'Agregar Observaci&oacute;n a CC o CCC';
					//$informacion['user_id'] = $this->tank_auth->get_user_id();
					//$informacion['username'] = $this->tank_auth->get_username();
					//$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
					$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>';         
					$this->load->view('plantilla/header', $informacion);
					$this->load->view('plantilla/menu', $informacion);
					$this->load->view('transparencia/agregar_obs_cc_ccc');
					$this->load->view('plantilla/footer', $informacion);
					
				}
		
	}
	
	public function cargar_cc($id_mun){
		$this->load->model('transparencia/transparencia_model');
        $cc = $this->transparencia_model->get_cc($id_mun);
        $numfilas = count($cc);

        $i = 0;
        foreach ($cc as $aux) {
			
			if($aux->acta_final!='')
				$arch1='<a href="'.base_url().''.$aux->acta_final.'">Descargar</a>';
            else $arch1='No disponible';
            
            if($aux->listado_asistencia!='')
				$arch2='<a href="'.base_url().''.$aux->listado_asistencia.'">Descargar</a>';
            else $arch2='No disponible';
            
            $rows[$i]['id'] = $aux->cc_id;
            $rows[$i]['cell'] = array($aux->cc_id,
                $this->transparencia_model->get_mun_nombre($aux->mun_id),
                $aux->cc_fecha,
                $aux->cc_lugar,
                $aux->total_mujeres,
                $aux->total_hombres,
                $arch1,
                $arch2
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array('0', 'No hay Registros', ' ', ' ', ' ', ' ',' ',' ',' ');
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
	
	public function cargar_ccc($id_mun){
		$this->load->model('transparencia/transparencia_model');
        $ccc = $this->transparencia_model->get_ccc($id_mun);
        $numfilas = count($ccc);
        $i = 0;
        foreach ($ccc as $aux) {
            $rows[$i]['id'] = $aux->ccc_id;
            $rows[$i]['cell'] = array($aux->ccc_id,
                $this->transparencia_model->get_mun_nombre($aux->mun_id),
                $aux->fecha_conformacion,
                $aux->lugar_conformacion
            );
            $i++;
        }
        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array('0', 'No hay Registros', ' ', ' ');
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
        
                
        public function cargar_etm($id_mun){
		$this->load->model('transparencia/transparencia_model');
        $etm = $this->transparencia_model->get_etm($id_mun);
        $numfilas = count($etm);
        $i = 0;
        foreach ($etm as $aux) {   
            $rows[$i]['id'] = $aux->etm_id;
            $rows[$i]['cell'] = array($aux->etm_id,
                $aux->lugar_conformacion,
                $aux->total_hombres,
                $aux->total_mujeres
            );
            $i++;
	}

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array('0', ' ', 'No hay ETM.', ' ');
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
        
        
       
        
	
	public function cargar_comentarios_cc($id){
		$this->load->model('transparencia/transparencia_model');
		$comentarios = $this->transparencia_model->get_coment_cc($id);
			
        $numfilas = count($comentarios);

        $i = 0;
        
			foreach ($comentarios as $aux) {
				
				$rows[$i]['id'] = $aux->coment_id;
				$rows[$i]['cell'] = array($aux->coment_id,
					$aux->cc_id,
					$aux->nombre_persona,
					$aux->email,
					$aux->comentario,
					$aux->fecha_coment
				);
				$i++;
			}

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array('0', ' ', 'No hay comentarios aun.', ' ');
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

	public function cargar_comentarios_ccc($id){
		$this->load->model('transparencia/transparencia_model');
		$comentarios = $this->transparencia_model->get_coment_ccc($id);
			
        $numfilas = count($comentarios);

        $i = 0;
        
        foreach ($comentarios as $aux) {
				
				$rows[$i]['id'] = $aux->coment_id;
				$rows[$i]['cell'] = array($aux->coment_id,
					$aux->ccc_id,
					$aux->nombre_persona,
					$aux->email,
					$aux->comentario,
					$aux->fecha_coment
				);
				$i++;
			}

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array('0', ' ', 'No hay comentarios aun.', ' ');
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
	
	public function eliminar_coment_cc(){
			$coment_id=$this->input->post("coment_id");
			$this->load->model('transparencia/transparencia_model');
			$this->transparencia_model->eliminar_obs_cc($coment_id);
	}
	
	public function eliminar_coment_ccc(){
			$coment_id=$this->input->post("coment_id");
			$this->load->model('transparencia/transparencia_model');
			$this->transparencia_model->eliminar_obs_ccc($coment_id);
	}

}
?>
