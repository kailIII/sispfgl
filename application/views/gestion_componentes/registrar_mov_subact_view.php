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
        
        $('#subcom').change(function(){   
            $('#macroact').children().remove();
            $.getJSON('<?php echo base_url('gestion_componentes/financiera/get_macroact');?>'+'?com_id='+$('#subcom').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#macroact').append('<option value="0">--Seleccione Macroactividad--</option>');
                        $.each(val, function(id, registro){
                            $('#macroact').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
        $('#macroact').change(function(){   
            $('#act').children().remove();
            $.getJSON('<?php echo base_url('gestion_componentes/financiera/get_act');?>'+'?act_id='+$('#macroact').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#act').append('<option value="0">--Seleccione Actividad--</option>');
                        $.each(val, function(id, registro){
                            $('#act').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
        $('#act').change(function(){   
            $('#subact').children().remove();
            $.getJSON('<?php echo base_url('gestion_componentes/financiera/get_act');?>'+'?act_id='+$('#act').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#subact').append('<option value="0">--Seleccione Actividad--</option>');
                        $.each(val, function(id, registro){
                            $('#subact').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
        $('#comd').change(function(){   
            $('#subcomd').children().remove();
            $.getJSON('<?php echo base_url('gestion_componentes/financiera/get_subcom');?>'+'?com_id='+$('#comd').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#subcomd').append('<option value="0">--Seleccione Subcomponente--</option>');
                        $.each(val, function(id, registro){
                            $('#subcomd').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
        $('#subcomd').change(function(){   
            $('#macroactd').children().remove();
            $.getJSON('<?php echo base_url('gestion_componentes/financiera/get_macroact');?>'+'?com_id='+$('#subcomd').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#macroactd').append('<option value="0">--Seleccione Macroactividad--</option>');
                        $.each(val, function(id, registro){
                            $('#macroactd').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
        $('#macroactd').change(function(){   
            $('#actd').children().remove();
            $.getJSON('<?php echo base_url('gestion_componentes/financiera/get_act');?>'+'?act_id='+$('#macroactd').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#actd').append('<option value="0">--Seleccione Actividad--</option>');
                        $.each(val, function(id, registro){
                            $('#actd').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
        $('#actd').change(function(){   
            $('#subactd').children().remove();
            $.getJSON('<?php echo base_url('gestion_componentes/financiera/get_act');?>'+'?act_id='+$('#actd').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#subactd').append('<option value="0">--Seleccione Actividad--</option>');
                        $.each(val, function(id, registro){
                            $('#subactd').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
        $('#subact').change(function(){   
            $.getJSON('<?php echo base_url('gestion_componentes/financiera/get_saldos');?>'+'?act_id='+$('#subact').val(), 
            function(data) {
				 $('#goes').val(data.goes);
				 $('#gmun').val(data.gmun);
				 $('#birf').val(data.birf);
				 $('#saldo').val(data.saldo);
            });              
        });
        
        $('#subactd').change(function(){   
            $.getJSON('<?php echo base_url('gestion_componentes/financiera/get_saldos');?>'+'?act_id='+$('#subactd').val(), 
            function(data) {
				 $('#goesd').val(data.goes);
				 $('#gmund').val(data.gmun);
				 $('#birfd').val(data.birf);
				 $('#saldod').val(data.saldo);
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
<h1>Registrar Transferencias</h1>
<br/>

<?php $attributes = array('id' => 'myform');
echo form_open_multipart('gestion_componentes/financiera/realizar_transferencia', $attributes);?>
	<div  style="float:left;height:250px;width:800px;box-shadow: 1px 10px 5px #D3D1D1;">
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label><b>Cuenta Origen</b></label><br/><br/>
		
		<label>Componente: </label>
		<?php echo form_dropdown_from_db('com','com',"SELECT com_id,com_codigo || '.  ' || com_nombre FROM componente where com_tipo='Componente'");?><br/>
		
		<label>Subcomponente: </label>
		<select id='subcom' name='subcom'>
					<option value='0'>--Seleccione--</option>
		</select><br/>
		
		<label>Macroactividad: </label>
		<select id='macroact' name='macroact'>
					<option value='0'>--Seleccione--</option>
		</select><br/>
		
		<label>Actividad: </label>
		<select id='act' name='act'>
					<option value='0'>--Seleccione--</option>
		</select><br/>
		
		<label>Subactividad: </label>
		<select id='subact' name='subact'>
					<option value='0'>--Seleccione--</option>
		</select><br/>
		
		<label>Fuente de financiamiento: </label>&nbsp;&nbsp;&nbsp;&nbsp;
		
		<label>GOES </label>
		<input type="text" name="goes" id="goes"  size="6" readonly="readonly">&nbsp;&nbsp;
		
		<label>GMUN </label>
		<input type="text" name="gmun" id="gmun"  size="6" readonly="readonly">&nbsp;&nbsp;
		
		<label>BIRF </label>
		<input type="text" name="birf" id="birf"  size="6" readonly="readonly">&nbsp;&nbsp;
		
		<br/><br/><label>Saldo: </label>
		<input type="text" name="saldo" id="saldo"  size="6" readonly="readonly">&nbsp;&nbsp;
	
	</div>
	<div  style="float:left;height:500px;width:800px;box-shadow: 1px 10px 5px #D3D1D1;">
		<br/><br/>
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label><b>Movimiento</b></label><br/><br/>
		
		<label>Fecha Movimiento: </label>
		<input type="text" value='<?php echo date('Y-m-d')?>' readonly="readonly" name="mov_fecha" id="mov_fecha"  size="5"><br/><br/>
		
		<label>Unidad: </label>
		<input type="text" name="uni" id="uni"  size="6"><br/><br/>
		
		<label>Cantidad </label>
		<input type="text" name="can" id="can"  size="6"><br/><br/>
		
		<label>Costo </label>
		<input type="text" name="cos" id="cos"  size="6"><br/><br/>
		
		<label>Tipo de movimiento: </label>&nbsp;&nbsp;&nbsp;&nbsp;
		
		<input type="checkbox" name="mov_tipo" value="1" <?php echo set_checkbox('mov_tipo', '1'); ?> />
		<label>GOES</label>
		
		<input type="checkbox" name="mov_tipo" value="2" <?php echo set_checkbox('mov_tipo', '2'); ?> />
		<label>GMUN</label>
		
		<input type="checkbox" name="mov_tipo" value="3" <?php echo set_checkbox('mov_tipo', '3'); ?> />
		<label>BIRF</label><br/><br/>
		
		<label>GOES </label>
		<input type="text" name="goest" id="goest"  size="6">&nbsp;&nbsp;
		
		<label>GMUN </label>
		<input type="text" name="gmunt" id="gmunt"  size="6">&nbsp;&nbsp;
		
		<label>BIRF </label>
		<input type="text" name="birft" id="birft"  size="6">&nbsp;&nbsp;<br/><br/>
		
		<label>Monto total: </label>
		<input type="text" name="birft" id="birft"  size="6" readonly="readonly"><br/><br/>
		
		<label>Descricpion de la acci&oacute;n: </label>
		<input type="text" name="mov_desc" id="trans_desc"  size="25"><br/><br/>
		
		<label>Observaci&oacute;n o comentario: </label>
		<input type="text" name="mov_obs" id="trans_obs"  size="25">&nbsp;&nbsp;
		
		<input type="submit" id="guardar" value="Realziar Movimiento" align="right" name="guardar"><br/><br/>
	<div>


<?php echo form_close();?>



<div id="mensaje1" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para realizar esta acci&oacute;n</p>
</div>

