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
	  echo form_open_multipart('poa/poa/do_upload', $attributes);?>

<input type="file" id="userfile" name="userfile" size="20" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" id="subs" name="subs" value="1" <?php echo set_checkbox('subs', '1'); ?> />
<label>Substituir Archivo POA Base.</label>
<br/>
<br/>
<input type="submit" id="subir" value="Subir" />
<br/><br/><br/><p><b>Nota:</b> Para realizar una comparaci&oacute;n exitosa, el Archivo a subir, <br/>debe tener una estructura similar al Archivo POA Base.</p>
</form>
<div id="mensaje1" class="mensaje" title="Aviso">
    <p>Archivo no valido! Extenciones permitidas: .xls | .xlsx</p>
</div>
