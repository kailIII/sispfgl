<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_ini" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'dd/mm/yy'
       })
	});
   $(document).ready(function(){
	   $( "#fecha_fin" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'dd/mm/yy'
       })
	});
</script>
<?php 
	$this->load->helper('form'); 
	include("select_generator.php"); 
?>

<h1>3.2.2 Elaboracion del Plan de Implementaci&oacute;n</h1>
<br>

<?php echo form_open('componente3/guardar_dsat');?>

	<label>Nombre Actividad:&nbsp;</label>
	<input type="text" name="nombre_act_imp" id="nombre_act_imp"  size="45" align="left"><br><br>
		
	<div  style="float:left;height:200px;">
		<label>Fecha de Inicio:</label>
		<input readonly="readonly"  type="text" name="fecha_ini" id="fecha_ini"  size="10" align="left"><br><br>

		<label>Responsable: &nbsp;&nbsp;</label>
		<input type="text" name="res_act_imp" id="res_act_imp"  size="22" align="left"><br><br>
		
		<label>Descripci&oacute;n: </label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<textarea rows="5" cols="21" maxlength="150" name="desc_act_imp" id="desc_act_imp" align="left"></textarea><br><br>
			
	</div>
	<div style="float:left;height:200px;">
		
		&nbsp;&nbsp;<label>Fecha de Fin:</label>
		<input readonly="readonly"  type="text" name="fecha_fin" id="fecha_fin"  size="10" align="left"><br><br>
		
		&nbsp;&nbsp;<label>Cargo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name="cargo_asis" id="cargo_asis"  size="10" align="left"><br><br>
		
		&nbsp;&nbsp;<label>Recursos: </label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<textarea rows="5" cols="21" maxlength="150" name="recu_act_imp" id="recu_act_imp" align="left"></textarea><br><br>
		
	</div>
	<div style="height:200px;">
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Estado Actividad: </label>
		<select name="estado_act_imp" size="1">
			<option value="1"<?php echo set_select('estado_act_imp', '1'); ?>>Ejecutandoce</option>
		</select><br><br>
		
		<br><br><br><br><br><br><br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" value="Agregar" name="agregar" id="agregar" align="left">
		
	</div>
	
	<h2>Aqui va el qgrid</h2>	
		
<?php echo form_close();?>



