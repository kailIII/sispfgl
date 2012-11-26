<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_con" ).datepicker({
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

<h2>3.2.1 Formaci&oacute;n de Concenso y Discusi&oacute;n de la Politica de Descentralizaci&oacute;n</h2>
<br/>

<?php echo form_open('componente3/guardar_fcdp');?>

	<div  style="float:left;">
		
		<label>Fecha de Actividad:</label>
		<input readonly="readonly"  type="text" name="fecha_con" id="fecha_con"  size="10" align="left"><br/>
		
		<label>Tematica: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="tematica_con" id="tematica_con"  size="45" align="left">
		
	</div>
	<div style="">
		<table>
			<tr>
				<td><input type="radio" name="ultimo_con" value="1" <?php echo set_radio('ultimo_con', '1'); ?> /></td>
				<td><label>&Uacute;ltima reuni&oacute;n</label></td>
			</tr>
		</table>
	</div>
	
	
	
		<br/><br/><br/>
		<p align="center"><b>Asistentes</b></p>
		
		<label>Nombre Asistente: </label>
		<input type="text" name="nombre_asis" id="nombre_asis"  size="22" align="left">
		
		<select name="sexo_asis" size="1">
			<option value="f"<?php echo set_select('sexo_asis', 'f'); ?>>Femenino</option>
			<option value="m"<?php echo set_select('sexo_asis', 'm'); ?>>Masculino</option>
		</select>
		
		<label>Sector: </label>
		<select name="sector_asis" size="1">
			<option value="1"<?php echo set_select('sector_asis', '1'); ?>>Politico</option>
		</select>
		
		<label>Cargo: </label>
		<input type="text" name="cargo_asis" id="cargo_asis"  size="10" align="left">
		
		<input type="button" value="Agregar" name="agregar" id="agregar" align="left"><br/>
		
		<h2>Aqui va el qgrid</h2>
		
		<label>Observaciones: </label><br/>
		<textarea rows="5" cols="80" maxlength="500" name="observaciones" id="observaciones" align="center"></textarea><br/><br/>
		
		<label>Archivo de Reporte: </label>
		<input type="file" name="archivo_reporte" size="20" /><br/><br/>
		
		<input type="submit" value="Guardar" align="right">
		
		
<?php echo form_close();?>



