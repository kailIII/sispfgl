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
        
        
        $('#com').change(function(){
            $.getJSON('<?php echo base_url('gestion_componentes/financiera/get_new_subcom_cod');?>'+'?com_id='+$('#com').val(), 
            function(data) {
                        $('#subcom_cod').val(data.cod);
            });
        });
        
        
        $('#mod_cod').click(function() { 
			if ($('#subcom_cod').attr("readonly") == 'readonly') 
			{ 
				$('#subcom_cod').removeAttr("readonly"); 
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
<h1>Agregar Subcomponente</h1>
<br/>

<?php $attributes = array('id' => 'myform');
echo form_open_multipart('gestion_componentes/financiera/guardar_subcomp', $attributes);?>

	<label>Componente: </label>
    <?php echo form_dropdown_from_db('com','com',"SELECT com_id,com_codigo || '.  ' || com_nombre FROM componente where com_tipo='Componente'");?><br/><br/><br/>
	
	<label>Nombre del Subcomponente: </label>
	<input type="text" name="subcom_nombre" id="subcom_nombre"  size="35"><br/><br/>
	
	<label>C&oacute;digo a asignar: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="subcom_cod" id="subcom_cod"  size="10" readonly="readonly">&nbsp;
	<!--<input type="button" id="mod_cod" value="Modificar C&oacute;digo" name="mod_cod">--><br/><br/>
	
	<label>Descripci&oacute;n: </label><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<textarea name="com_desc" id="com_desc" rows="5" cols="50" maxlength="500" ></textarea><br/>
	
	<input type="submit" id="guardar" value="Guardar" align="right" name="guardar">
	
<?php echo form_close();?>



<div id="mensaje1" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para realizar esta acci&oacute;n</p>
</div>

