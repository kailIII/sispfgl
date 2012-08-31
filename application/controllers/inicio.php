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
            //DATOS
            $informacion['titulo'] = 'Sistema de Información y Seguimiento del Programa de Fortalecimiento de
Gobiernos Locales';
            //CARGAR VISTA
            $this->load->view('plantilla/header', $informacion);
            $this->load->view('plantilla/menu', $informacion);
            $this->load->view('plantilla/footer', $informacion);
        } else {
            //DATOS
            $informacion['titulo'] = 'Sistema de Información y Seguimiento del Programa de Fortalecimiento de
Gobiernos Locales';
            $informacion['user_id'] = $this->tank_auth->get_user_id();
            $informacion['username'] = $this->tank_auth->get_username();

            //CARGAR VISTAS
            $this->load->view('plantilla/header', $informacion);
            $this->load->view('plantilla/menu', $informacion);
            $this->load->view('inicio/inicio_view');
            $this->load->view('plantilla/footer', $informacion);
        }
    }

//FIN DEL INDEX

    public function login() {
        if ($this->tank_auth->is_logged_in()) {         // logged in
            redirect(base_url());
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
                    redirect(base_url());
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    if (isset($errors['banned'])) {        // banned user
                        $this->_show_message($this->lang->line('auth_message_banned') . ' ' . $errors['banned']);
                    } elseif (isset($errors['not_activated'])) {    // not activated user
                        redirect('/auth/send_again/');
                    } else {             // fail
                        foreach ($errors as $k => $v)
                            $data['errors'][$k] = $this->lang->line($v);
                    }
                }
            }

            $informacion['titulo'] = 'Iniciar Sesión en SISPFGL';
            $this->load->view('plantilla/header', $informacion);
            $this->load->view('plantilla/menu', $informacion);
            $this->load->view('login/login_view', $data);
            $this->load->view('plantilla/footer', $informacion);
        }
    }

//FIN DE LOGIN

    function logout() {
        $this->tank_auth->logout();
        redirect(base_url());
    }

    function forgot_password() {
        if ($this->tank_auth->is_logged_in()) {         // logged in
            redirect('');
        } else {
            $this->form_validation->set_rules('login', 'Email or login', 'trim|required|xss_clean');

            $data['errors'] = array();

            if ($this->form_validation->run()) {        // validation ok
                if (!is_null($data = $this->tank_auth->forgot_password(
                                $this->form_validation->set_value('login')))) {

                    $data['site_name'] = $this->config->item('website_name', 'tank_auth');

                    // Send email with password activation link
                    $this->_send_email('forgot_password', $data['email'], $data);
                    $this->_show_message($this->lang->line('auth_message_new_password_sent'));
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $data['errors'][$k] = $this->lang->line($v);
                }
            }
            $informacion['titulo'] = 'Restauración de su contraseña de usuario';
            $this->load->view('plantilla/header', $informacion);
            $this->load->view('plantilla/menu', $informacion);
            $this->load->view('login/olvido_contrasenia_view', $data);
            $this->load->view('plantilla/footer', $informacion);
        }
    }

//FIN DE FORGOT_PASSWORD

    function reset_password() {
        $user_id = $this->uri->segment(3);
        $new_pass_key = $this->uri->segment(4);

        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length[' . $this->config->item('password_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('password_max_length', 'tank_auth') . ']|alpha_dash');
        $this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

        $data['errors'] = array();

        if ($this->form_validation->run()) {        // validation ok
            if (!is_null($data = $this->tank_auth->reset_password(
                            $user_id, $new_pass_key, $this->form_validation->set_value('new_password')))) { // success
                $data['site_name'] = $this->config->item('website_name', 'tank_auth');

                // Send email with new password
                $this->_send_email('reset_password', $data['email'], $data);

                $this->_show_message($this->lang->line('auth_message_new_password_activated') . ' ' . anchor('/auth/login/', 'Login'));
            } else {              // fail
                $this->_show_message($this->lang->line('auth_message_new_password_failed'));
            }
        } else {
            // Try to activate user by password key (if not activated yet)
            if ($this->config->item('email_activation', 'tank_auth')) {
                $this->tank_auth->activate_user($user_id, $new_pass_key, FALSE);
            }

            if (!$this->tank_auth->can_reset_password($user_id, $new_pass_key)) {
                $this->_show_message($this->lang->line('auth_message_new_password_failed'));
            }
        }
        $this->load->view('login/cambiar_contrasenia_view', $data);
    }

    function _show_message($message) {
        $informacion['titulo'] = 'Restauración de su contraseña de usuario';
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->session->set_flashdata('message', $message);
        $this->load->view('plantilla/footer', $informacion);
        redirect(base_url());
    }

    /**
     * Send email message of given type (activate, forgot_password, etc.)
     *
     * @param	string
     * @param	string
     * @param	array
     * @return	void
     */
    function _send_email($type, $email, &$data) {
        $this->load->library('email');
        $this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->to($email);
        $this->email->subject(sprintf($this->lang->line('auth_subject_' . $type), $this->config->item('website_name', 'tank_auth')));
        $this->email->message($this->load->view('email/' . $type . '-html', $data, TRUE));
        $this->email->send();
    }

}
