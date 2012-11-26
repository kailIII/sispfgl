<?php
$cons_nombre = array(
	'name'	=> 'cons_nombre',
	'id'	=> 'cons_nombre',
	'value'	=> set_value('cons_nombre'),
	'maxlength'	=> 200,
	'size'	=> 35,
);
$cons_direccion = array(
	'name'	=> 'cons_direccion',
	'id'	=> 'cons_direccion',
	'value'	=> set_value('cons_direccion'),
	'size'	=> 35,
);
$cons_telefono = array(
	'name'	=> 'cons_telefono',
	'id'	=> 'cons_telefono',
	'value'	=> set_value('cons_telefono'),
	'size'	=> 15,
        'maxlength'=> 9,
);
$cons_telefono2 = array(
	'name'	=> 'cons_telefono2',
	'id'	=> 'cons_telefono2',
	'value'	=> set_value('cons_telefono2'),
	'size'	=> 15,
        'maxlength'=> 9,
);
$cons_fax = array(
	'name'	=> 'cons_fax',
	'id'	=> 'cons_fax',
	'value'	=> set_value('cons_fax'),
	'size'	=> 15,
        'maxlength'=> 9,
);
$cons_email = array(
	'name'	=> 'cons_email',
	'id'	=> 'cons_email',
	'value'	=> set_value('cons_email'),
	'size'	=> 35,
        'maxlength'=> 200,
);        
$cons_repres_legal = array(
	'name'	=> 'cons_repres_legal',
	'id'	=> 'cons_repres_legal',
	'value'	=> set_value('cons_repres_legal'),
	'size'	=> 35,
        'maxlength'=> 100,
);          


$this->form_validation->set_rules('cons_observaciones', 'Observaciones', '');


?>
<script type="text/javascript">        
    $(document).ready(function(){  
        $('#ingresar').button();
        $("#regresar").button().click(function() {
            document.location.href='<?php echo base_url('consultor/consultoraC'); ?>';
        });
});
</script>
    <h2 class="demoHeaders" align="Center">Registrar Consultoras</h2>
    <center>
    <?php echo form_open(base_url('consultor/consultoraC/registrarConsultora')); ?>
    
    <table align="center" style=" border-color: #2F589F; border-style: solid" >
        <tr>
                <td colspan="5"><br/></td>
        </tr>
	<tr>
                <td align="center" colspan="5"  class="letraazul">Codigo: <?php echo $ultimoCodigo; ?></td>
		
	</tr>
        <tr>
                <td colspan="5"><br/></td>
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
                <td><textarea id="cons_observaciones" name="cons_observaciones" cols="32" rows="4"><?php echo set_value('cons_observaciones'); ?></textarea></td>
		<td class="error"><?php echo form_error('cons_observaciones'); ?></td>
                <td width="50px"></td>
	</tr>
        <tr>
                <td colspan="5" align="center"><br/>
                    <input type="submit" value="Ingresar" id="ingresar" />
                    <input type="button" value="Regresar" id="regresar" />
                </td>
        </tr>
    </table>
    
    </center>
</form>

