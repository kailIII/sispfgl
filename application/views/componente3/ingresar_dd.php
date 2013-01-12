<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_doc" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd'
       });
       
       $('.mensaje').dialog({
            autoOpen: false,
            width: 300,
            buttons: {
                "Ok": function() {
                    $(this).dialog("close");
                }
            }
        });
        
        $('#archivo_ejec').change(function() {
			var archivo = $('#archivo_ejec').val();
			var ext = archivo.substring(archivo.lastIndexOf("."), archivo.length);
			if(ext!='.doc'&&ext!='.docx'&&ext!='.pdf'&&ext!='.xls'&&ext!='.rtf'){
				//$("#notvalid").text("Archivo no valido! Extenciones permitidas: .pdf | .doc | .docx | .rtf").show().fadeOut(10000);
				$('#mensaje1').dialog('open');
				$('#archivo_ejec').val('');
			}
		});
		
		$('#archivo_comp').change(function() {
			var archivo = $('#archivo_comp').val();
			var ext = archivo.substring(archivo.lastIndexOf("."), archivo.length);
			if(ext!='.doc'&&ext!='.docx'&&ext!='.pdf'&&ext!='.xls'&&ext!='.rtf'){
				//$("#notvalid").text("Archivo no valido! Extenciones permitidas: .pdf | .doc | .docx | .rtf").show().fadeOut(10000);
				$('#mensaje1').dialog('open');
				$('#archivo_comp').val('');
			}
		});
		
		
       
	});
</script>
<?php 
	$this->load->helper('form'); 
	include("select_generator.php"); 
?>
<?php if(isset($aviso))
	echo $aviso;?>
<h1>Documentos Concernientes a Descentralizaci&oacute;n</h1>
<br/>
<?php $attributes = array('id' => 'myform');
echo form_open_multipart('componente3/componente3/guardar_dd',$attributes);?>
	
	<div  style="float:left;height:200px;width:480px;">
	
		<label>Fecha: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input readonly="readonly"  type="text" name="fecha_doc" id="fecha_doc"  size="10" align="left"><br/><br/>
		
		<label>Descripci&oacute;n: </label><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<textarea rows="5" cols="30" maxlength="150" name="desc_doc" id="desc_doc" align="left"></textarea>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</div>
	
	<div  style="float:left;height:200px;">
	<label>Tipo: </label>
		<table>
			<tr>
				<td>&nbsp;&nbsp;<input type="checkbox" name="sector_act1" value="1" <?php echo set_checkbox('sector_act1', '1'); ?> /></td>
				<td><label>Salud y Saneamiento Ambiental</label></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;<input type="checkbox" name="sector_act2" value="2" <?php echo set_checkbox('sector_act2', '2'); ?> /></td>
				<td><label>Educaci&oacute;n</label></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;<input type="checkbox" name="sector_act3" value="3" <?php echo set_checkbox('sector_act3', '3'); ?> /></td>
				<td><label>Agua y Sanemaiento</label></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;<input type="checkbox" name="sector_act4" value="4" <?php echo set_checkbox('sector_act4', '4'); ?> /></td>
				<td><label>Obras Publicas y Transporte</label></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;<input type="checkbox" name="sector_act5" value="5" <?php echo set_checkbox('sector_act5', '5'); ?> /></td>
				<td><label>Analisis Financiero y Neutralidad Fiscal</label></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;<input type="checkbox" name="sector_act6" value="6" <?php echo set_checkbox('sector_act6', '6'); ?> /></td>
				<td><label>Marco Legal</label></td>
			</tr>
		</table>
	</div>
	
	<div  style="float:left;height:160px;">	
		<label>Resumen Ejecutivo: </label>
		<input type="file" id="archivo_ejec" name="archivo_ejec" size="20" /><br/><br/>
		
		<label>Completo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="file" id="archivo_comp" name="archivo_comp" size="20" /><br/><br/>
		
		<input type="submit" id="guardar" name="guardar" value="Guardar" align="right">
	</div>
		
<?php echo form_close();?>
<div id="mensaje1" class="mensaje" title="Aviso">
    <p>Archivo no valido! Extenciones permitidas: .pdf | .doc | .docx | .rtf.</p>
</div>
