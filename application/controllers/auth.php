<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * ***************************************
 * @modify By:      Ing. Karen Peñate   *
 * @date:           25/Agosto/2012      *
 * ***************************************
 */

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->lang->load('tank_auth');
        $this->load->model('users');
    }

    function index() {
        if ($message = $this->session->flashdata('message')) {
            $informacion['titulo'] = 'SIS-PFGL';

            if ($this->tank_auth->get_user_id() <> 0) {
                $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
                $informacion['user_id'] = $this->tank_auth->get_user_id();
                $informacion['username'] = $this->tank_auth->get_username();
            }
            $this->load->view('plantilla/header', $informacion);
            $this->load->view('plantilla/menu', $informacion);
            $this->load->view('auth/general_message', array('message' => $message));
            $this->load->view('plantilla/footer', $informacion);
        }
        else
            redirect('/auth/login/');
    }

    /* MUESTRA LOS USUARIOS REGISTRADO CON SU DETERMINADO ROL */

    function muestraUsuario() {
        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('auth/muestra_usuarios_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarUsuariosJson() {
        $this->load->model('tank_auth/users');
        $usuarios = $this->users->obtenerUsuarios();
        $numfilas = count($usuarios);

        $i = 0;
        $rows = array();
        foreach ($usuarios as $aux) {
            $rows[$i]['id'] = $aux->id;
            $rows[$i]['cell'] = array($aux->id,
                $aux->username,
                $aux->email,
                $aux->rol_nombre
            );
            $i++;
        }
        array_multisort($rows, SORT_ASC);

        $datos = json_encode($rows);
        $pages = floor($numfilas / 20) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }
public function cargarUsuariosJsonConsultor() {
        $this->load->model('tank_auth/users');
        $usuarios = $this->users->obtenerUsuariosconsultores();
        $numfilas = count($usuarios);

        $i = 0;
        $rows = array();
        foreach ($usuarios as $aux) {
            $rows[$i]['id'] = $aux->id;
            $rows[$i]['cell'] = array($aux->id,
                $aux->username,
                $aux->email,
                $aux->rol_nombre
            );
            $i++;
        }
        array_multisort($rows, SORT_ASC);

        $datos = json_encode($rows);
        $pages = floor($numfilas / 20) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }
    public function eliminarUsuario($id) {
        $this->load->model('tank_auth/users');
        $this->users->eliminarUsuario($id);
    }

    /**
     * Login user on the site
     *
     * @return void
     */
    function login() {
        if ($this->tank_auth->is_logged_in()) {         // logged in
            redirect('');
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {      // logged in, not activated
            redirect('/auth/send_again/');
        } else {
            $informacion['login_by_username'] = ($this->config->item('login_by_username', 'tank_auth') AND
                    $this->config->item('use_username', 'tank_auth'));
            $informacion['login_by_email'] = $this->config->item('login_by_email', 'tank_auth');

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

            $informacion['errors'] = array();

            if ($this->form_validation->run()) {        // validation ok
                if ($this->tank_auth->login(
                                $this->form_validation->set_value('login'), $this->form_validation->set_value('password'), $this->form_validation->set_value('remember'), $informacion['login_by_username'], $informacion['login_by_email'])) {        // success
                    redirect('');
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    if (isset($errors['banned'])) {        // banned user
                        $this->_show_message($this->lang->line('auth_message_banned') . ' ' . $errors['banned']);
                    } elseif (isset($errors['not_activated'])) {    // not activated user
                        redirect('/auth/send_again/');
                    } else {             // fail
                        foreach ($errors as $k => $v)
                            $informacion['errors'][$k] = $this->lang->line($v);
                    }
                }
            }
            $informacion['titulo'] = 'Iniciar Sesión en SISPFGL';
            $informacion['mostrar'] = false;
            $this->load->view('plantilla/header', $informacion);
            $this->load->view('plantilla/menu', $informacion);
            $this->load->view('auth/login_form', $informacion);
            $this->load->view('plantilla/footer', $informacion);
        }
    }

    /**
     * Logout user
     *
     * @return void
     */
    function logout() {
        $this->tank_auth->logout();

        $this->_show_message($this->lang->line('auth_message_logged_out'));
    }

    /**
     * Register user on the site
     *
     * @return void
     */
    function register() {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in
        /* TODO: validar rol */

        $use_username = $this->config->item('use_username', 'tank_auth');
        if ($use_username) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[' . $this->config->item('username_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('username_max_length', 'tank_auth') . ']|alpha_dash');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[' . $this->config->item('password_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('password_max_length', 'tank_auth') . ']|alpha_dash');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');
        $this->form_validation->set_rules('rol_id', 'rol_id', 'callback_rolSeleccionado');
        $this->form_validation->set_rules('reg_id', 'reg_id', '');
        $informacion['errors'] = array();

        $email_activation = $this->config->item('email_activation', 'tank_auth');

        if ($this->form_validation->run()) {
            // var_dump($reg);
            // exit();
            if (!is_null($informacion = $this->tank_auth->create_user(
                            $use_username ? $this->form_validation->set_value('username') : '', $this->form_validation->set_value('email'), $this->form_validation->set_value('password'), $this->form_validation->set_value('rol_id'), $email_activation))) {         // success
                $informacion['site_name'] = $this->config->item('website_name', 'tank_auth');

                if ($email_activation) {

                    $this->tank_auth->activate_user($informacion['user_id'], '123456789qrtyuo');
                    if($this->form_validation->set_value('reg_id')!='0')
                        $this->users->actualizaRegion($this->form_validation->set_value('reg_id'), $informacion);
                    $this->_send_email('credenciales', $informacion['email'], $informacion);
                    $this->_show_message($this->lang->line('auth_message_registration_completed_3'));
                }
            } else {
                $errors = $this->tank_auth->get_error_message();
                foreach ($errors as $k => $v)
                    $informacion['errors'][$k] = $this->lang->line($v);
            }
        }

        $informacion['use_username'] = $use_username;
        $informacion['titulo'] = 'Registrar usuario para SISPFGL';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        /* LISTA DE ROLES */
        $this->load->model('admin/rol');
        $roles = $this->rol->obtenerRoles();
        $select = array();
        $select[0] = "--Seleccione un rol --";
        foreach ($roles as $aux)
            $select[$aux->rol_id] = $aux->rol_nombre;

        /* LISTA DE REGIONES */
        $this->load->model('pais/region');
        $regiones = $this->region->obtenerRegiones();
        $select2 = array();
        $select2[0] = "--Seleccione una region --";
        foreach ($regiones as $aux)
            $select2[$aux->reg_id] = $aux->reg_nombre;

        /* FIN DE LISTA DE ROLES */
        $informacion['lista'] = $select;
        $informacion['regiones'] = $select2;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('auth/register_form', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    /* PARA VALIDAR QUE SE HAYA SELECCIONADO EL ROL */

    function rolSeleccionado($valor) {
        if ($valor == '0') {
            $this->form_validation->set_message('rolSeleccionado', 'Debe Seleccionar un rol');
            return FALSE;
        }
        else
            return TRUE;
    }

    /* PARA VALIDAR QUE SE HAYA SELECCIONADO EL ROL */

    function regionSeleccionada($valor) {
        if ($valor == '0') {
            $this->form_validation->set_message('regionSeleccioanda', 'Debe Seleccionar una region');
            return FALSE;
        }
        else
            return TRUE;
    }

    /**
     * Send activation email again, to the same or new email address
     *
     * @return void
     */
    function send_again() {
        if (!$this->tank_auth->is_logged_in(FALSE)) {       // not logged in or activated
            redirect('/auth/login/');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

            $informacion['errors'] = array();

            if ($this->form_validation->run()) {        // validation ok
                if (!is_null($informacion = $this->tank_auth->change_email(
                                $this->form_validation->set_value('email')))) {   // success
                    $informacion['site_name'] = $this->config->item('website_name', 'tank_auth');
                    $informacion['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

                    $this->_send_email('activate', $informacion['email'], $informacion);

                    $this->_show_message(sprintf($this->lang->line('auth_message_activation_email_sent'), $informacion['email']));
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $informacion['errors'][$k] = $this->lang->line($v);
                }
            }
            $this->load->view('auth/send_again_form', $informacion);
        }
    }

    /**
     * Activate user account.
     * User is verified by user_id and authentication code in the URL.
     * Can be called by clicking on link in mail.
     *
     * @return void
     */
    function activate() {
        $user_id = $this->uri->segment(3);
        $new_email_key = $this->uri->segment(4);

        // Activate user
        if ($this->tank_auth->activate_user($user_id, $new_email_key)) {  // success
            $this->tank_auth->logout();
            $this->_show_message($this->lang->line('auth_message_activation_completed') . ' ' . anchor('/auth/login/', 'Login'));
        } else {                // fail
            $this->_show_message($this->lang->line('auth_message_activation_failed'));
        }
    }

    /**
     * Generate reset code (to change password) and send it to user
     *
     * @return void
     */
    function forgot_password() {
        if ($this->tank_auth->is_logged_in()) {         // logged in
            redirect('');
        } elseif ($this->tank_auth->is_logged_in(FALSE)) {      // logged in, not activated
            redirect('/auth/send_again/');
        } else {
            $this->form_validation->set_rules('login', 'Email or login', 'trim|required|xss_clean');

            $informacion['errors'] = array();

            if ($this->form_validation->run()) {        // validation ok
                if (!is_null($informacion = $this->tank_auth->forgot_password(
                                $this->form_validation->set_value('login')))) {

                    $informacion['site_name'] = $this->config->item('website_name', 'tank_auth');

                    // Send email with password activation link
                    $this->_send_email('forgot_password', $informacion['email'], $informacion);

                    $this->_show_message($this->lang->line('auth_message_new_password_sent'));
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $informacion['errors'][$k] = $this->lang->line($v);
                }
            }
            $informacion['titulo'] = 'Iniciar Sesión en SISPFGL';
            $this->load->view('plantilla/header', $informacion);
            $this->load->view('plantilla/menu', $informacion);
            $this->load->view('auth/forgot_password_form', $informacion);
            $this->load->view('plantilla/footer', $informacion);
        }
    }

    /**
     * Replace user password (forgotten) with a new one (set by user).
     * User is verified by user_id and authentication code in the URL.
     * Can be called by clicking on link in mail.
     *
     * @return void
     */
    function reset_password() {
        $user_id = $this->uri->segment(3);
        $new_pass_key = $this->uri->segment(4);

        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length[' . $this->config->item('password_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('password_max_length', 'tank_auth') . ']|alpha_dash');
        $this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

        $informacion['errors'] = array();

        if ($this->form_validation->run()) {        // validation ok
            if (!is_null($informacion = $this->tank_auth->reset_password(
                            $user_id, $new_pass_key, $this->form_validation->set_value('new_password')))) { // success
                $informacion['site_name'] = $this->config->item('website_name', 'tank_auth');

                // Send email with new password
                $this->_send_email('reset_password', $informacion['email'], $informacion);

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

        $informacion['titulo'] = 'Cambiando Contraseña';
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('auth/reset_password_form', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    /**
     * Change user password
     *
     * @return void
     */
    function change_password() {
        if (!$this->tank_auth->is_logged_in()) {        // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length[' . $this->config->item('password_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('password_max_length', 'tank_auth') . ']|alpha_dash');
            $this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

            $informacion['errors'] = array();

            if ($this->form_validation->run()) {        // validation ok
                if ($this->tank_auth->change_password(
                                $this->form_validation->set_value('old_password'), $this->form_validation->set_value('new_password'))) { // success
                    $this->_show_message($this->lang->line('auth_message_password_changed'));
                } else {              // fail
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $informacion['errors'][$k] = $this->lang->line($v);
                }
            }
            $informacion['user_id'] = $this->tank_auth->get_user_id();
            $informacion['username'] = $this->tank_auth->get_username();
            $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
            $informacion['titulo'] = 'Cambiando Contraseña';
            $this->load->view('plantilla/header', $informacion);
            $this->load->view('plantilla/menu', $informacion);
            $this->load->view('auth/change_password_form', $informacion);
            $this->load->view('plantilla/footer', $informacion);
        }
    }

    /**
     * Change user email
     *
     * @return void
     */
    function change_email() {
        if (!$this->tank_auth->is_logged_in()) {        // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

            $informacion['errors'] = array();

            if ($this->form_validation->run()) {        // validation ok
                if (!is_null($informacion = $this->tank_auth->set_new_email(
                                $this->form_validation->set_value('email'), $this->form_validation->set_value('password')))) {   // success
                    $informacion['site_name'] = $this->config->item('website_name', 'tank_auth');

                    // Send email with new email address and its activation link
                    $this->_send_email('change_email', $informacion['new_email'], $informacion);

                    $this->_show_message(sprintf($this->lang->line('auth_message_new_email_sent'), $informacion['new_email']));
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $informacion['errors'][$k] = $this->lang->line($v);
                }
            }
            $this->load->view('auth/change_email_form', $informacion);
        }
    }

    /**
     * Replace user email with a new one.
     * User is verified by user_id and authentication code in the URL.
     * Can be called by clicking on link in mail.
     *
     * @return void
     */
    function reset_email() {
        $user_id = $this->uri->segment(3);
        $new_email_key = $this->uri->segment(4);

        // Reset email
        if ($this->tank_auth->activate_new_email($user_id, $new_email_key)) { // success
            $this->tank_auth->logout();
            $this->_show_message($this->lang->line('auth_message_new_email_activated') . ' ' . anchor('/auth/login/', 'Login'));
        } else {                // fail
            $this->_show_message($this->lang->line('auth_message_new_email_failed'));
        }
    }

    /**
     * Delete user from the site (only when user is logged in)
     *
     * @return void
     */
    function unregister() {
        if (!$this->tank_auth->is_logged_in()) {        // not logged in or not activated
            redirect('/auth/login/');
        } else {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

            $informacion['errors'] = array();

            if ($this->form_validation->run()) {        // validation ok
                if ($this->tank_auth->delete_user(
                                $this->form_validation->set_value('password'))) {  // success
                    $this->_show_message($this->lang->line('auth_message_unregistered'));
                } else {              // fail
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $informacion['errors'][$k] = $this->lang->line($v);
                }
            }
            $this->load->view('auth/unregister_form', $informacion);
        }
    }

    /**
     * Show info message
     *
     * @param	string
     * @return	void
     */
    function _show_message($message) {
        $this->session->set_flashdata('message', $message);
        redirect('/auth/');
    }

    /**
     * Send email message of given type (activate, forgot_password, etc.)
     *
     * @param	string
     * @param	string
     * @param	array
     * @return	void
     */
    function _send_email($type, $email, &$informacion) {
        $this->load->library('email');
        $this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->to($email);
        $this->email->subject(sprintf($this->lang->line('auth_subject_' . $type), $this->config->item('website_name', 'tank_auth')));
        $this->email->message($this->load->view('email/' . $type . '-html', $informacion, TRUE));
        $this->email->send();
    }

    /**
     * Create CAPTCHA image to verify user as a human
     *
     * @return	string
     */
    function _create_captcha() {
        $this->load->helper('captcha');

        $cap = create_captcha(array(
            'img_path' => './' . $this->config->item('captcha_path', 'tank_auth'),
            'img_url' => base_url() . $this->config->item('captcha_path', 'tank_auth'),
            'font_path' => './' . $this->config->item('captcha_fonts_path', 'tank_auth'),
            'font_size' => $this->config->item('captcha_font_size', 'tank_auth'),
            'img_width' => $this->config->item('captcha_width', 'tank_auth'),
            'img_height' => $this->config->item('captcha_height', 'tank_auth'),
            'show_grid' => $this->config->item('captcha_grid', 'tank_auth'),
            'expiration' => $this->config->item('captcha_expire', 'tank_auth'),
                ));

        // Save captcha params in session
        $this->session->set_flashdata(array(
            'captcha_word' => $cap['word'],
            'captcha_time' => $cap['time'],
        ));

        return $cap['image'];
    }

    /**
     * Callback function. Check if CAPTCHA test is passed.
     *
     * @param	string
     * @return	bool
     */
    function _check_captcha($code) {
        $time = $this->session->flashdata('captcha_time');
        $word = $this->session->flashdata('captcha_word');

        list($usec, $sec) = explode(" ", microtime());
        $now = ((float) $usec + (float) $sec);

        if ($now - $time > $this->config->item('captcha_expire', 'tank_auth')) {
            $this->form_validation->set_message('_check_captcha', $this->lang->line('auth_captcha_expired'));
            return FALSE;
        } elseif (($this->config->item('captcha_case_sensitive', 'tank_auth') AND
                $code != $word) OR
                strtolower($code) != strtolower($word)) {
            $this->form_validation->set_message('_check_captcha', $this->lang->line('auth_incorrect_captcha'));
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Create reCAPTCHA JS and non-JS HTML to verify user as a human
     *
     * @return	string
     */
    function _create_recaptcha() {
        $this->load->helper('recaptcha');

        // Add custom theme so we can get only image
        $options = "<script>var RecaptchaOptions = {theme: 'custom', custom_theme_widget: 'recaptcha_widget'};</script>\n";

        // Get reCAPTCHA JS and non-JS HTML
        $html = recaptcha_get_html($this->config->item('recaptcha_public_key', 'tank_auth'));

        return $options . $html;
    }

    /**
     * Callback function. Check if reCAPTCHA test is passed.
     *
     * @return	bool
     */
    function _check_recaptcha() {
        $this->load->helper('recaptcha');

        $resp = recaptcha_check_answer($this->config->item('recaptcha_private_key', 'tank_auth'), $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);

        if (!$resp->is_valid) {
            $this->form_validation->set_message('_check_recaptcha', $this->lang->line('auth_incorrect_captcha'));
            return FALSE;
        }
        return TRUE;
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */