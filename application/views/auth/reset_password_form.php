<script type="text/javascript">        
    $(document).ready(function(){    
        $("input[name='change']").button();
    });
</script>
<?php
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table align="center" style="position: relative; border-color: #2F589F; border-style: solid" >
    <tr>
        <td colspan="5" align="center">
            <img src="<?php echo base_url("resource/imagenes/cambiar-contrasenia") ?>"/>
        </td>
    </tr>
    <tr>
	<td width="50px"></td>
        <td class="letraazul"><?php echo form_label('Nueva Contraseña', $new_password['id']); ?></td>
		<td><?php echo form_password($new_password); ?></td>
		<td class="error"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?></td>
                <td width="50px"></td>	
        </tr>
	<tr>
            <td width="50px"></td>
            <td class="letraazul"><?php echo form_label('Confirmar Contraseña', $confirm_new_password['id']); ?></td>
		<td><?php echo form_password($confirm_new_password); ?></td>
		<td class="error"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?></td>
                <td width="50px"></td>	
	</tr>
        <tr>
        <td colspan="5" align="center">
            <p><?php echo form_submit('change', 'Cambiar Contraseña'); ?></p>
        </td>
    </tr>
</table>

<?php echo form_close(); ?>