<?php

/**
 * Controlador principal del Proyecto SMPFGL
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('security');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
    }

    public function index() {
        if (!$this->tank_auth->is_logged_in()) {
            $informacion['titulo'] = 'Sistema de Información y Seguimiento del Programa de Fortalecimiento de
Gobiernos Locales';
            $this->load->view('plantilla/header', $informacion);
            $this->login();
            $this->load->view('login/login_view');
            $this->load->view('plantilla/footer', $informacion);
        } else {
            $informacion['titulo'] = 'Sistema de Información y Seguimiento del Programa de Fortalecimiento de
Gobiernos Locales';

            $this->load->view('plantilla/header', $informacion);
            $this->load->view('inicio/inicio_view');
            $this->load->view('login/login_view');
            $this->load->view('plantilla/footer', $informacion);
            // $data['user_id'] = $this->tank_auth->get_user_id();
            // $data['username'] = $this->tank_auth->get_username();
        }
    }

//FIN DEL INDEX

    public function login() {
        if ($this->tank_auth->is_logged_in()) {         // logged in
            redirect('');
        } else {
            $data['login_by_username'] = ($this->config->item('login_by_username', 'tank_auth') AND
                    $this->config->item('use_username', 'tank_auth'));
            $data['login_by_email'] = $this->config->item('login_by_email', 'tank_auth');

            $this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('remember', 'Remember me', 'integer');

            // Get login for counting attempts to login
            if ($this->config->item('login_count_attempts', 'tank_auth') AND
                    ($login = $this->input->post('login'))) {
                $login = $this->security->xss_clean($login);
            } else {
                $login = '';
            }

            $data['errors'] = array();

            if ($this->form_validation->run()) {        // validation ok
                if ($this->tank_auth->login(
                                $this->form_validation->set_value('login'), $this->form_validation->set_value('password'), $this->form_validation->set_value('remember'), $data['login_by_username'], $data['login_by_email'])) {        // success
                    redirect('');
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    if (isset($errors['banned'])) {        // banned user
                        $this->_show_message($this->lang->line('auth_message_banned') . ' ' . $errors['banned']);
                    } else {             // fail
                        foreach ($errors as $k => $v)
                            $data['errors'][$k] = $this->lang->line($v);
                    }
                }
            }

            return $this->load->view('login/login_view', $data);
        }
    }

//FIN DE LOGIN
}
