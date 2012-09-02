<script type="text/javascript">        
    $(document).ready(function(){    
        $("input[name='reset']").button();
    });
</script>
<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table align="center" style=" border-color: #2F589F; border-style: solid" >
    <tr>
        <td colspan="5" align="center">
            <img src="<?php echo base_url("resource/imagenes/olvido-pass") ?>"/>
        </td>
    </tr>
	<tr>
             <td width="50px"></td>
		<td class="letraazul"><?php echo form_label($login_label, $login['id']); ?></td>
		<td><?php echo form_input($login); ?></td>
		<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
                 <td width="50px"></td>
	</tr>
        <tr>
            <td colspan="5" align="center"><?php echo form_submit('reset', 'Obtener Nueva Contraseña'); ?></td>
        </tr>
</table>

<?php echo form_close(); ?>