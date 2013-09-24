<script type="text/javascript">        
   $(document).ready(function(){
        
        $('.mensaje').dialog({
            autoOpen: false,
            width: 300,
            buttons: {
                "Ok": function() {
                    $(this).dialog("close");
                }
            }
        });
        
        $('#userfile').change(function() {
			var archivo = $('#userfile').val();
			var ext = archivo.substring(archivo.lastIndexOf("."), archivo.length);
			if(ext!='.xls'&&ext!='.xlsx'){
				//$("#notvalid").text("Archivo no valido! Extenciones permitidas: .pdf | .doc | .docx | .rtf").show().fadeOut(10000);
				$('#mensaje1').dialog('open');
				$('#userfile').val('');
			}
		});
		
		$('#myform').submit(function() {
		 if($('#subs').is(':checked')){
					return confirm('El Archivo POA Base, que se utiliza actualmente para realizar la evaluacion, sera substituido. ¿Desea continuar?');
			}
		});
		
		$('#subir').button().click(function() {
		});
		
	});
</script>

<h3>Seleccione el archivo de excel que desea subir &#40;Resumen de Asignacion Financiera POA&#41;.</h3>
<!--<h4>Esto actualizar&aacute; la base de datos de los Proyectos</h4>-->

<?php echo $error;?>
<?php $attributes = array('id' => 'myform');
	  echo form_open_multipart('index.php/poa/poa/do_upload', $attributes);?>

	<input type="file" id="userfile" name="userfile" size="20" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" id="subs" name="subs" value="1" <?php echo set_checkbox('subs', '1'); ?> />
	<label>Substituir Archivo POA Base.</label>
	<br/><br/>
	
	<label>Trimestre: </label>
	<select name="trim" size="1" id="trim">
			<option value="1"<?php echo set_select('trim', '1'); ?>>1°</option>
			<option value="2"<?php echo set_select('trim', '2'); ?>>2°</option>
			<option value="3"<?php echo set_select('trim', '3'); ?>>3°</option>
			<option value="4"<?php echo set_select('trim', '4'); ?>>4°</option>
	</select>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label>A&ntilde;o: </label>
	<select name="anio" size="1" id="anio">
			<option value="2011"<?php echo set_select('anio', '2011'); ?>>2011</option>
			<option value="2012"<?php echo set_select('anio', '2012'); ?>>2012</option>
			<option value="2013"<?php echo set_select('anio', '2013'); ?>>2013</option>
			<option value="2014"<?php echo set_select('anio', '2014'); ?>>2014</option>
			<option value="2015"<?php echo set_select('anio', '2015'); ?>>2015</option>
	</select>
	

	<br/><br/>
	<input type="submit" id="subir" value="Subir" />
	
<br/><br/><br/><p><b>Nota:</b> Para realizar una comparaci&oacute;n exitosa, el Archivo a subir, debe tener <br/>una estructura similar al Archivo POA Base.</p>
<p>&#8226; El Archivo POA Base, es el archivo base contra el cual se comparan los <br/>demas archivos que se ingresan para un determinado trimestre y a&ntilde;o.</p>
</form>
<div id="mensaje1" class="mensaje" title="Aviso">
    <p>Archivo no valido! Extenciones permitidas: .xls | .xlsx</p>
</div>
