<script type="text/javascript">        
    $(document).ready(function(){    
        $("input[name='change']").button();
    });
</script>
<?php
$old_password = array(
	'name'	=> 'old_password',
	'id'	=> 'old_password',
	'value' => set_value('old_password'),
	'size' 	=> 20,
);
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 20,
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 20,
);
?>
<h1><center>Cambiar Contraseña</center> </h1>
<?php echo form_open($this->uri->uri_string()); ?>
<table align="center" style="position: relative; border-color: #2F589F; border-style: solid" >
    <tr>
        <td colspan="5" align="center">
            <img src="<?php echo base_url("resource/imagenes/cambiar-contrasenia") ?>"/>
        </td>
    </tr>
	<tr>
            <td width="50px"></td>
		<td class="letraazul textD"><?php echo form_label('Antigua Contraseña', $old_password['id']); ?></td>
		<td><?php echo form_password($old_password); ?></td>
		<td class="error"><?php echo form_error($old_password['name']); ?><?php echo isset($errors[$old_password['name']])?$errors[$old_password['name']]:''; ?></td>
                <td width="50px"></td>
	</tr>
	<tr>
            <td width="50px"></td>
		<td class="letraazul textD"><?php echo form_label('Nueva Contraseña', $new_password['id']); ?></td>
		<td><?php echo form_password($new_password); ?></td>
		<td class="error"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?></td>
                <td width="50px"></td>
	</tr>
	<tr>
	<td width="50px"></td>	
        <td class="letraazul textD"><?php echo form_label('Confirmación de contraseña', $confirm_new_password['id']); ?></td>
		<td><?php echo form_password($confirm_new_password); ?></td>
		<td class="error"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?></td>
                <td width="50px"></td>
	</tr>
          <td colspan="5" align="center">
            <p><?php echo form_submit('change', 'Cambiar Contraseña'); ?></p>
        </td>
</table>

<?php echo form_close(); ?>