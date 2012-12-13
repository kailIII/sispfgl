<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_act" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'dd/mm/yy'
       })
	});

var posicionCampo=2;
	
	function agregarFila(){
	var nuevaFila = document.getElementById("cargo_asis").insertRow(-1);
	nuevaFila.id=posicionCampo;
	var nuevaCelda=nuevaFila.insertCell(-1);
	nuevaCelda=nuevaFila.insertCell(-1);
	nuevaFila.innerHTML="<tr><td>Nombre:</td>"
		+"<td><input type='text' size='10' name='nombre_caracteristica["+posicionCampo+"]'></td></tr>";
	nuevaCelda=nuevaFila.insertCell(-1);
	nuevaCelda.innerHTML="<td><input type='button' class='button-submit' value='Eliminar' onclick='eliminar(this)'></td>";
	posicionCampo++;
	}
	
	function eliminar(obj){

		var oTr = obj;
		while(oTr.nodeName.toLowerCase()!='tr'){
		oTr=oTr.parentNode;
		}
		var root = oTr.parentNode;
		root.removeChild(oTr);
		}
	

</script>
<?php 
	$this->load->helper('form'); 
	include("select_generator.php"); 
?>

<h1>3.1 Diagnosticos Sectoriales y Analisis Transversales</h1>
<br>

<?php echo form_open('index.php/componente3/componente3/guardar_dsat');?>

	<div  style="float:left;height:120px;">
		<label>Fecha de Actividad:</label>
		<input readonly="readonly"  type="text" name="fecha_act" id="fecha_act"  size="10" align="left"><br><br>

		<label>Nombre Actividad:&nbsp;</label>
		<input type="text" name="nombre_act" id="nombre_act"  size="35" align="left"><br><br>

		<label>Departamento: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<?php echo form_dropdown_from_db('dep_id', "SELECT dep_id,dep_nombre FROM departamento");?>
		
		<label>Municipio: </label>
		<?php echo form_dropdown_from_db('mun_id', "SELECT mun_id,mun_nombre FROM municipio order by mun_nombre");
				//podrian presentarse solo los del depto seleccionado, por el momento estan todos?>
		
	</div>
	<div style="height:120px;">
		<label>Sector:</label><br>
		<table>
			<tr>
				<td>&nbsp;&nbsp;<input type="radio" name="sector_act" value="1" <?php echo set_radio('sector_act', '1'); ?> /></td>
				<td><label>Salud y Saneamiento Ambiental</label></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;<input type="radio" name="sector_act" value="2" <?php echo set_radio('sector_act', '2'); ?> /></td>
				<td><label>Educaci&oacute;n</label></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;<input type="radio" name="sector_act" value="3" <?php echo set_radio('sector_act', '3'); ?> /></td>
				<td><label>Agua y Sanemaiento</label></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;<input type="radio" name="sector_act" value="4" <?php echo set_radio('sector_act', '4'); ?> /></td>
				<td><label>Obras Publicas y Transporte</label></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;<input type="radio" name="sector_act" value="5" <?php echo set_radio('sector_act', '5'); ?> /></td>
				<td><label>Analisis Financiero y Neutralidad Fiscal</label></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;<input type="radio" name="sector_act" value="6" <?php echo set_radio('sector_act', '6'); ?> /></td>
				<td><label>Marco Legal</label></td>
			</tr>
		</table>
	</div>
	
		<br><br><br>
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
		
		<input type="button" value="Agregar" name="agregar" id="agregar" align="left" onClick="agregarFila();"><br>
		
		
		<h2>Aqui va el qgrid</h2>
		
		<label>Observaciones: </label><br>
		<textarea rows="5" cols="80" maxlength="500" name="observaciones" id="observaciones" align="center"></textarea><br><br>
		
		<label>Archivo de Reporte: </label>
		<input type="file" name="archivo_reporte" size="20" /><br><br>
		
		<input type="submit" value="Guardar" align="right" name="guardar">
		
		
<?php echo form_close();?>



