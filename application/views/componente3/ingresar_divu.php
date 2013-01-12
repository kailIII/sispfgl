<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_act_div" ).datepicker({
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
       
       
	});
   
</script>
<?php 
	$this->load->helper('form'); 
	include("select_generator.php"); 
?>
<?php if(isset($aviso))
	echo $aviso;?>
<h1>3.3 Divulgaci&oacute;n</h1>
<br/>
<?php $attributes = array('id' => 'myform');
echo form_open('componente3/componente3/guardar_dsat',$attributes);?>

	<label>Nombre Actividad: </label>
	<input type="text" name="nombre_act_div" id="nombre_act_div"  size="45" align="left"><br/><br/>
	
	<label>Fecha de Actividad:</label>
	<input readonly="readonly"  type="text" name="fecha_act_div" id="fecha_act_div"  size="10" align="left">
	
	&nbsp;&nbsp;&nbsp;<label>Tipo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<select name="tipo_act_div" size="1">
		<option value="1"<?php echo set_select('tipo_act_div', '1'); ?>>Foro</option>
	</select>
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Responsable: </label>
	<input type="text" name="res_act_div" id="res_act_div"  size="22" align="left"><br/><br/>
	
	<label>Departamento: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<?php echo form_dropdown_from_db('dep_id', "SELECT dep_id,dep_nombre FROM departamento");?>
		
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Municipio: </label>
	<?php echo form_dropdown_from_db('mun_id', "SELECT mun_id,mun_nombre FROM municipio order by mun_nombre");
				//podrian presentarse solo los del depto seleccionado, por el momento estan todos?>
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="button" value="Agregar" name="agregar_div" id="agregar_div" align="left"><br/>
	
	<br/><br/>
	
	<h2>Aqui va el qgrid</h2>
	
	<br/>
		
		<label>Nombre: </label>
		<input type="text" name="nombre_div" id="nombre_div"  size="22" align="left">
		
		<select name="sexo_div" size="1">
			<option value="f"<?php echo set_select('sexo_div', 'f'); ?>>Femenino</option>
			<option value="m"<?php echo set_select('sexo_div', 'm'); ?>>Masculino</option>
		</select>
		
		<label>Sector: </label>
		<select name="sector_div" size="1">
			<option value="1"<?php echo set_select('sector_div', '1'); ?>>Politico</option>
		</select>
		
		<label>Cargo: </label>
		<input type="text" name="cargo_div" id="cargo_div"  size="10" align="left">
		
		<input type="button" value="Agregar" name="agregar_persona" id="agregar_persona" align="left"><br/>
		
		<h2>Aqui va el qgrid</h2>
		
<?php echo form_close();?>
<div id="mensaje1" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para realizar esta acci&oacute;n.</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe completar los datos de la actividad para continuar.</p>
</div>
<div id="mensaje3" class="mensaje" title="Aviso">
    <p>No ha ingresado ninguna actividad.</p>
</div>
