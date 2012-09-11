<?php
$cons_nombre = array(
	'name'	=> 'cons_nombre',
	'id'	=> 'cons_nombre',
	'value'	=> $cons_nombre_b,
	'maxlength'	=> 200,
	'size'	=> 35,
);
$cons_direccion = array(
	'name'	=> 'cons_direccion',
	'id'	=> 'cons_direccion',
	'value'	=> $cons_direccion_b,
	'size'	=> 35,
);
$cons_telefono = array(
	'name'	=> 'cons_telefono',
	'id'	=> 'cons_telefono',
	'value'	=> $cons_telefono_b,
	'size'	=> 15,
        'maxlength'=> 9,
);
$cons_telefono2 = array(
	'name'	=> 'cons_telefono2',
	'id'	=> 'cons_telefono2',
	'value'	=> $cons_telefono2_b,
	'size'	=> 15,
        'maxlength'=> 9,
);
$cons_fax = array(
	'name'	=> 'cons_fax',
	'id'	=> 'cons_fax',
	'value'	=> $cons_fax_b,
	'size'	=> 15,
        'maxlength'=> 9,
);
$cons_email = array(
	'name'	=> 'cons_email',
	'id'	=> 'cons_email',
	'value'	=> $cons_email_b,
	'size'	=> 35,
        'maxlength'=> 200,
);        
$cons_repres_legal = array(
	'name'	=> 'cons_repres_legal',
	'id'	=> 'cons_repres_legal',
	'value'	=> $cons_repres_legal_b,
	'size'	=> 35,
        'maxlength'=> 100,
);          


$this->form_validation->set_rules('cons_observaciones', 'Observaciones', '');


?>
<script type="text/javascript">        
    $(document).ready(function(){  
        $('#enviar').button();
});
</script>
    <h2 class="demoHeaders" align="Center">Editar Consultora</h2>
    <center>
    <?php echo form_open(base_url('consultor/consultoraC/editarConsultora/'.$cons_id_b)); ?>
    
    <table align="center" style=" border-color: #2F589F; border-style: solid" >
        <tr>
                <td colspan="5"></br></td>
        </tr>
	<tr>
                <td align="center" colspan="5"  class="letraazul">Codigo: <?php echo $cons_id_b; ?></td>
		
	</tr>
        <tr>
                <td colspan="5"></br></td>
        </tr>
        <tr>
                <td width="50px"></td>
		<td class="letraazul">Nombre de la Consultora</td>
		<td><?php echo form_input($cons_nombre); ?></td>
		<td class="error"><?php echo form_error('cons_nombre'); ?></td>
                <td width="50px"></td>
	</tr>
        <tr>
                <td width="50px"></td>
		<td class="letraazul">Dirección</td>
		<td><?php echo form_input($cons_direccion); ?></td>
		<td class="error"><?php echo form_error('cons_direccion'); ?></td>
                <td width="50px"></td>
	</tr>
        <tr>
                <td width="50px"></td>
		<td class="letraazul">Teléfono Oficina</td>
		<td><?php echo form_input($cons_telefono); ?></td>
		<td class="error"><?php echo form_error('cons_telefono'); ?></td>
                <td width="50px"></td>
	</tr>
        <tr>
                <td width="50px"></td>
		<td class="letraazul"></td>
		<td><?php echo form_input($cons_telefono2); ?></td>
		<td class="error"><?php echo form_error('cons_telefono2'); ?></td>
                <td width="50px"></td>
	</tr>
        <tr>
                <td width="50px"></td>
		<td class="letraazul">Fax</td>
		<td><?php echo form_input($cons_fax); ?></td>
		<td class="error"><?php echo form_error('cons_fax'); ?></td>
                <td width="50px"></td>
	</tr>
        <tr>
                <td width="50px"></td>
		<td class="letraazul">Correo Electrónico</td>
		<td><?php echo form_input($cons_email); ?></td>
		<td class="error"><?php echo form_error('cons_email'); ?></td>
                <td width="50px"></td>
	</tr>
        <tr>
                <td width="50px"></td>
		<td class="letraazul">Representante Legal</td>
		<td><?php echo form_input($cons_repres_legal); ?></td>
		<td class="error"><?php echo form_error('cons_repres_legal'); ?></td>
                <td width="50px"></td>
	</tr>
        <tr>
                <td width="50px"></td>
		<td class="letraazul">Observaciones</td>
                <td><textarea id="cons_observaciones" name="cons_observaciones" cols="32" rows="4"><?php echo $cons_observaciones_b; ?></textarea></td>
		<td class="error"><?php echo form_error('cons_observaciones'); ?></td>
                <td width="50px"></td>
	</tr>
        <tr>
                <td colspan="5" align="center"></br>
                    <input type="submit" value="Enviar" id="enviar" /></td>
        </tr>
    </table>
    
    </center>
</form>

