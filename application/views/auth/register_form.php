<script type="text/javascript">        
$(document).ready(function(){    
  $("input[name='register']").button();
   
});
</script>
<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 20,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 20,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 20,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 20,
);
$rol_id = array(
	'name'	=> 'rol_id',
	'id'	=> 'rol_id',
	'value' => set_value('rol_id'),
);
?>
<h2 class="demoHeaders" align="Center">Registro de Usuario</h2>
<?php echo form_open($this->uri->uri_string()); ?>
<table align="center">
	<?php if ($use_username) { ?>
	<tr>
		<td class="letraazul"><?php echo form_label('Usuario', $username['id']); ?></td>
		<td><?php echo form_input($username); ?></td>
		<td class="error"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></td>
	</tr>
	<?php } ?>
	<tr>
		<td class="letraazul"><?php echo form_label('Correo Electrónico', $email['id']); ?></td>
		<td><?php echo form_input($email); ?></td>
		<td class="error"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
	</tr>
	<tr>
		<td class="letraazul"><?php echo form_label('Contraseña', $password['id']); ?></td>
		<td><?php echo form_password($password); ?></td>
		<td class="error"><?php echo form_error($password['name']); ?></td>
	</tr>
	<tr>
		<td class="letraazul"><?php echo form_label('Confirmar Contraseña', $confirm_password['id']); ?></td>
		<td><?php echo form_password($confirm_password); ?></td>
		<td class="error"><?php echo form_error($confirm_password['name']); ?></td>
	</tr>
        <tr>
                <td class="letraazul">Rol:</td>
                <td>
                    <?php echo form_dropdown('rol_id', $lista);?>
                </td>
                <td class="error"><?php echo form_error($rol_id['name']); ?><?php echo isset($errors[$rol_id['name']])?$errors[$rol_id['name']]:''; ?></td>
         </tr> 
        <tr>
                <td colspan="3" align="center"><?php echo form_submit('register', 'Registrar'); ?></td>
        </tr>
  
       

	
</table>
<?php echo form_close(); ?>