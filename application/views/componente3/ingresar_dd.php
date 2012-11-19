<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_doc" ).datepicker({
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

<h1>Documentos Concernientes a Descentralizaci&oacute;n</h1>
<br>

<?php echo form_open('componente3/guardar_dsat');?>
	
	<label>Fecha: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<input readonly="readonly"  type="text" name="fecha_doc" id="fecha_doc"  size="10" align="left">
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label>Tipo: </label>
	<input type="text" name="tipo_doc" id="tipo_doc"  size="22" align="left"><br><br>
	
	<label>Descripci&oacute;n: </label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<textarea rows="5" cols="30" maxlength="150" name="desc_doc" id="desc_doc" align="left"></textarea><br><br>
	
		
	<label>Resumen Ejecutivo: </label>
	<input type="file" name="ejecutivo_doc" size="20" /><br><br>
	
	<label>Completo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<input type="file" name="compelto_doc" size="20" /><br><br>
	
	<input type="submit" value="Guardar" align="right">
		
<?php echo form_close();?>



