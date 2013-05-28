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
					die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
					"(reCAPTCHA said: " . $resp->error . ")");
				} else {
				// Your code here to handle a successful verification
				echo "good!!!";
				}
		//Guardar la observacion realizada
		
	}


}
?>
