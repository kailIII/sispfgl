<?php
$login = array(
    'name' => 'login',
    'id' => 'login',
    'value' => set_value('login'),
    'maxlength' => 80,
    'size' => 12
);
if ($login_by_username AND $login_by_email) {
    $login_label = 'Email o Usuario';
} else if ($login_by_username) {
    $login_label = 'Usuario';
} else {
    $login_label = 'Email';
}
$password = array(
    'name' => 'password',
    'id' => 'password',
    'size' => 12,
);
?>
<script type="text/javascript">
    $(function(){ 
        
    });
</script>
<div style="position: absolute;left: 680px;top:-140px;">
    <?php echo form_open($this->uri->uri_string()); ?>
    <p class="letraazul"><?php echo form_label($login_label, $login['id']); ?><?php echo form_input($login); ?></p>
    <label class="error" style="position:relative; top: -100;right: 10 " ><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']]) ? $errors[$login['name']] : ''; ?></label>


    <p class="letraazul"><?php echo form_label('Contraseña', $password['id']); ?><?php echo form_password($password); ?></p>
    <label class="error"><?php echo form_error($password['name']); ?>
        <?php echo isset($errors[$password['name']]) ? $errors[$password['name']] : ''; ?>
    </label>

<p align="center"><?php echo anchor('/autentica/forgot_password/', 'Olvido Contraseña?'); ?></p>     
<?php echo form_submit('entrar', 'Iniciar Sesión'); ?>
<?php echo form_close(); ?>
</div> 