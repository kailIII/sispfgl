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
        
        
        $('#subcom').change(function(){
            $.getJSON('<?php echo base_url('gestion_componentes/financiera/get_new_macroact_cod');?>'+'?com_id='+$('#subcom').val(), 
            function(data) {
                        $('#macroact_cod').val(data.cod);
            });
        });
        
        
        $('#mod_cod').click(function() { 
			if ($('#subcom_cod').attr("readonly") == 'readonly') 
			{ 
				$('#subcom_cod').removeAttr("readonly"); 
			} 
		});
		
		$('#com').change(function(){   
            $('#subcom').children().remove();
            $.getJSON('<?php echo base_url('gestion_componentes/financiera/get_subcom');?>'+'?com_id='+$('#com').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#subcom').append('<option value="0">--Seleccione Subcomponente--</option>');
                        $.each(val, function(id, registro){
                            $('#subcom').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
        
	});
</script>


<?php 
	$this->load->helper('form'); 
	include("select_generator.php"); 
?>
<?php if(isset($aviso))
	echo $aviso;?>
<h1>Agregar Macroactividad</h1>
<br/>

<?php $attributes = array('id' => 'myform');
echo form_open_multipart('gestion_componentes/financiera/guardar_macroact', $attributes);?>

	<label>Componente: </label>
    <?php echo form_dropdown_from_db('com','com',"SELECT com_id,com_codigo || '.  ' || com_nombre FROM componente where com_tipo='Componente'");?><br/><br/>
	
	<label>Subcomponente: </label>
	<select id='subcom' name='subcom'>
                <option value='0'>--Seleccione--</option>
    </select>
    
    <br/><br/><br/><label>Nombre de Macroactividad: </label>
	<input type="text" name="macroact_nombre" id="macroact_nombre"  size="35"><br/><br/>
	
	<label>C&oacute;digo a asignar: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="macroact_cod" id="macroact_cod"  size="10" readonly="readonly">&nbsp;
	<!--<input type="button" id="mod_cod" value="Modificar C&oacute;digo" name="mod_cod">--><br/><br/>
	
	<label>Descripci&oacute;n: </label><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<textarea name="macroact_desc" id="macroact_desc" rows="5" cols="50" maxlength="500" ></textarea><br/>
	
	<input type="submit" id="guardar" value="Guardar" align="right" name="guardar">
	
<?php echo form_close();?>



<div id="mensaje1" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para realizar esta acci&oacute;n</p>
</div>

