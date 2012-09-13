<script type="text/javascript">        
    $(document).ready(function(){    
        $("input[name='iniciar']").button();
    });
</script>
<?php
$login = array(
    'name' => 'login',
    'id' => 'login',
    'value' => set_value('login'),
    'maxlength' => 80,
    'size' => 20,
);
if ($login_by_username AND $login_by_email) {
    $login_label = 'Correo o Usuario';
} else if ($login_by_username) {
    $login_label = 'Usuario';
} else {
    $login_label = 'Correo';
}
$password = array(
    'name' => 'password',
    'id' => 'password',
    'size' => 20,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table align="center" style=" border-color: #2F589F; border-style: solid" >
    <tr>
        <td colspan="5" align="center">
            <img src="<?php echo base_url("resource/imagenes/login") ?>"/>
        </td>
    </tr>
    <tr>
        <td width="50px"></td>
        <td class="letraazul"><?php echo form_label($login_label, $login['id']); ?></td>
        <td><?php echo form_input($login); ?></td>
        <td class="error"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']]) ? $errors[$login['name']] : ''; ?></td>
        <td width="50px"></td>
    </tr>
    <tr>
        <td width="50px"></td>
        <td class="letraazul">
            <?php echo form_label('Contraseña', $password['id']); ?>
        </td>
        <td><?php echo form_password($password); ?></td>
        <td class="error"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']]) ? $errors[$password['name']] : ''; ?></td>
        <td width="50px"></td>
    </tr>
    <tr>
        <td width="50px"></td>
        <td colspan="3" align="right">
             <?php echo anchor('/auth/forgot_password/', 'Olvido Contraseña?'); ?>
            <p align="center"><?php echo form_submit('iniciar', 'Iniciar Sesión'); ?></p>
            
        </td>
        <td width="50px"></td>
    </tr>
</table>

<?php echo form_close(); ?>
