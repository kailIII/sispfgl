<script type="text/javascript">        
     $(document).ready(function(){
        /*Date Picker*/
        $( "#fecha_act" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd',
           minDate: (new Date(2013, 0, 1))
       });
                
        /*botones*/
        /*$("#agregar").button().click(function(){
            tabla.jqGrid('editGridRow',"new",
            {closeAfterAdd:true,addCaption: "Agregar ",
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                bottominfo:"Campos marcados con (*) son obligatorios", 
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                }
            });
        });*/
        
        $("#agregar").button().click(function() {
			 var records=$('#asistentes').jqGrid('getGridParam','records');
			 var name = $('#nombre_asis').val();
			 var sexo = $('#sexo_asis').val();
			 var sector = $('#sector_asis').val();
			 var cargo = $('#cargo_asis').val();
			 if (cargo!="" && name!=""){
				 var newrow = {par_id:""+records, par_nombre:""+name, par_apellido:"", par_sexo:""+sexo,par_cargo:""+cargo,par_sector:""+sector};
				 $("#asistentes").addRowData(""+records, newrow);
				 $('#nombre_asis').val("");
				 $('#sexo_asis').val("");
				 $('#sector_asis').val("");
				 $('#cargo_asis').val("");
			 }
			 else $('#mensaje2').dialog('open');
        });
        
        /*$("#editar").button().click(function(){
            var gr = tabla.jqGrid('getGridParam','selrow');
            if( gr != null )
                tabla.jqGrid('editGridRow',gr,
            {closeAfterEdit:true,editCaption: "Editando ",
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                bottominfo:"Campos marcados con (*) son obligatorios", 
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                    ;}
            });
            else $('#mensaje2').dialog('open'); 
        });
        
        $("#eliminar").button().click(function(){
            var grs = tabla.jqGrid('getGridParam','selrow');
            if( grs != null ) tabla.jqGrid('delGridRow',grs,
            {msg: "Desea Eliminar esta ?",caption:"Eliminando ",
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');                            
                }}); 
            else $('#mensaje2').dialog('open'); 
        });
        */
                
        $("#eliminar").button().click(function(){
            var rowid = tabla.jqGrid('getGridParam','selrow');
            if( rowid != null ){
				if(confirm("Desea eliminar el asistente?"))
				 tabla.jqGrid('delRowData',rowid);
			 } 
            else $('#mensaje1').dialog('open');
        });
        
        /*
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url(); ?>';
        });
        
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });*/
                
        /*validaciones*/
        
        function validaSexo(value, colname) {
            if (value == 0 ) return [false,"Seleccione el Sexo del Asistente"];
            else return [true,""];
        }
        
        function validaSector(value, colname) {
            if (value == 0 ) return [false,"Seleccione la Procedencia del Asistente"];
            else return [true,""];
        }
        /*grid*/
        
        var tabla=$("#asistentes");
        tabla.jqGrid({
            //url:'<?php echo base_url('componente3/componente3/cargarAsistentes_dsat') ?>',
            //editurl: 'clientArray',
            datatype:'clientSide',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombres','Sexo','Cargo','Procedencia'],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_nombre',index:'par_nombre',width:250,editable:true,
                    editoptions:{size:38,maxlength:50}, 
                    formoptions:{label: "Nombres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_sexo',index:'par_sexo',editable:true,edittype:"select",width:75,
                    editoptions:{ value: '0:Seleccione;F:Femenino;M:Masculino' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaSexo}
                },
                {name:'par_cargo',index:'par_cargo',width:220,editable:true,
                    editoptions:{size:34,maxlength:30}, 
                    formoptions:{ label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_sector',index:'par_sector',editable:true,edittype:"select",width:150,
                    editoptions:{ value: '0:Seleccione;Gobierno Central:Gobierno Central;Gobierno Municipal:Gobierno Municipal;Asamblea Legislativa:Asamblea Legislativa;ONG:ONG;Academico:Academico;Sociedad Civil:Sociedad Civil;Otro:Otro' }, 
                    formoptions:{ label: "Sector",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaSector}
                }
            ],
            multiselect: false,
            caption: "Asistentes",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerAsistentes'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerAsistentes',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('par_id');
    
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        
        
        /*DIALOGOS DE VALIDACION*/
        $('.mensaje').dialog({
            autoOpen: false,
            width: 300,
            buttons: {
                "Ok": function() {
                    $(this).dialog("close");
                }
            }
        });
        
        
        
        $("#ed1").button().click( function() { 
			var selected=$('#asistentes').jqGrid('getGridParam','selrow');
			if( selected != null )
				$("#asistentes").jqGrid('editRow',""+selected);
			else $('#mensaje1').dialog('open');
			
		});
		
		$("#sv1").button().click( function() {
			var selected=$('#asistentes').jqGrid('getGridParam','selrow');
			if( selected != null )
				if ($("tr#"+selected).attr("editable") === "1") 
					$("#asistentes").jqGrid('saveRow',""+selected, {"url": 'clientArray'}); 
				else $('#mensaje4').dialog('open');
			else $('#mensaje1').dialog('open');
		});
		
		$('#myform').submit(function() {
				
			var numberOfRecords = $("#asistentes").getGridParam("records");
			for(i=0;i<numberOfRecords;i++)
			{
				
				var rowId = $("#asistentes").getRowData(i);
						  
						  //put all rows for your grid
				 
						  
				$('<input type="hidden" />').attr('name', 'par_nombre'+i).attr('value',rowId['par_nombre']).appendTo('#divpost');
				$('<input type="hidden" />').attr('name', 'par_sexo'+i).attr('value',rowId['par_sexo']).appendTo('#divpost');
				$('<input type="hidden" />').attr('name', 'par_cargo'+i).attr('value',rowId['par_cargo']).appendTo('#divpost');
				$('<input type="hidden" />').attr('name', 'par_sector'+i).attr('value',rowId['par_sector']).appendTo('#divpost');
			}
			$('<input type="hidden" />').attr('name', 'cant_asis').attr('value',numberOfRecords).appendTo('#divpost');
			if ($('#archivo_reporte').val()!='')
				$('<input type="hidden" />').attr('name', 'adjunto').attr('value','si').appendTo('#divpost');
			else
				$('<input type="hidden" />').attr('name', 'adjunto').attr('value','no').appendTo('#divpost');
			return true;
			
		});
		
		$('#archivo_reporte').change(function() {
			var archivo = $('#archivo_reporte').val();
			var ext = archivo.substring(archivo.lastIndexOf("."), archivo.length);
			if(ext!='.doc'&&ext!='.docx'&&ext!='.pdf'&&ext!='.xls'&&ext!='.rtf'){
				//$("#notvalid").text("Archivo no valido! Extenciones permitidas: .pdf | .doc | .docx | .rtf").show().fadeOut(10000);
				$('#mensaje3').dialog('open');
				$('#archivo_reporte').val('');
			}
		});
		
		/*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){   
            $('#selMun').children().remove();
            $.getJSON('<?php echo base_url('componente3/componente3/cargarMunicipios');?>'+'?dep_id='+$('#selDepto').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#selMun').append('<option value="0">--Seleccione Municipio--</option>');
                        $.each(val, function(id, registro){
                            $('#selMun').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
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
<h1>3.1 Diagnosticos Sectoriales y Analisis Transversales</h1>
<br/>

<?php $attributes = array('id' => 'myform');
echo form_open_multipart('componente3/componente3/guardar_dsat', $attributes);?>

	<div  style="float:left;height:120px;">
		<label>Fecha de Actividad:</label>
		<input readonly="readonly"  type="text" name="fecha_act" id="fecha_act"  size="10" align="left"><br/><br/>

		<label>Nombre Actividad:&nbsp;</label>
		<input type="text" name="nombre_act" id="nombre_act"  size="35" align="left"><br/><br/>

		<label>Departamento: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<?php echo form_dropdown_from_db('dep_id','selDepto',"SELECT dep_id,dep_nombre FROM departamento");?>
		
		<label>Municipio: </label>
		<select id='selMun' name='mun_id'>
                <option value='0'>--Seleccione--</option>
            </select>
		
	</div>
	<div style="height:120px;">
		<label>&#8226; Sector:</label><br/>
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
				<td><label>Agua y Saneamiento</label></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;<input type="checkbox" name="sector_act4" value="4" <?php echo set_checkbox('sector_act4', '4'); ?> /></td>
				<td><label>Obras Publicas y Transporte</label></td>
			</tr>
			<tr>
				<td colspan="2"><label>&#8226; &Aacute;reas de Estudio:</label></td>
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
	
		<br/><br/><br/><br/>
		<p align="center"><b>Asistentes</b></p>
		
		<label>Nombre: </label>
		<input type="text" name="nombre_asis" id="nombre_asis"  size="17" align="left">
		
		<select name="sexo_asis" size="1" id="sexo_asis">
			<option value="F"<?php echo set_select('sexo_asis', 'F'); ?>>Femenino</option>
			<option value="M"<?php echo set_select('sexo_asis', 'M'); ?>>Masculino</option>
		</select>
		
		<label>Procedencia: </label>
		<select name="sector_asis" size="1" id="sector_asis">
			<option value="Gobierno Central"<?php echo set_select('sector_asis', 'Gobierno Central'); ?>>Gobierno Central</option>
			<option value="Gobierno Municipal"<?php echo set_select('sector_asis', 'Gobierno Municipal'); ?>>Gobierno Municipal</option>
			<option value="Asamblea Legislativa"<?php echo set_select('sector_asis', 'Asamblea Legislativa'); ?>>Asamblea Legislativa</option>
			<option value="ONG"<?php echo set_select('sector_asis', 'ONG'); ?>>ONG</option>
			<option value="Academico"<?php echo set_select('sector_asis', 'Academico'); ?>>Academico</option>
			<option value="Sociedad Civil"<?php echo set_select('sector_asis', 'Sociedad Civil'); ?>>Sociedad Civil</option>
			<option value="Otro"<?php echo set_select('sector_asis', 'Otro'); ?>>Otro</option>
		</select>
		
		<label>Cargo: </label>
		<input type="text" name="cargo_asis" id="cargo_asis"  size="7" align="left">
		
		<input type="button" value="Agregar" name="agregar" id="agregar" align="left"><br/>
		
		<br/>
		<table id="asistentes"></table>
		<div id="pagerAsistentes"></div>
		
		

		<div style="position: relative;left: 275px; top: 5px;">
			<input  type="button" id="eliminar" value="  Eliminar  " />
			<input  type="button" id="ed1" value="  Editar  " />
			<input  type="button" id="sv1" value="  Guardar  " />
		</div>
		
		<label>Observaciones: </label><br/>
		<textarea rows="5" cols="80" maxlength="500" name="observaciones" id="observaciones" align="center"></textarea><br/><br/>
		
		<label>Archivo de Reporte: </label>
		<input type="file" name="archivo_reporte" size="20" id="archivo_reporte"/><span style="color:blue"; id="notvalid"></span><br/><br/>
		
		
		<input type="submit" id="guardar" value="Guardar" align="right" name="guardar">
		
		<div id="divpost" ></div>
<?php echo form_close();?>



<div id="mensaje1" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para realizar esta acci&oacute;n</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe completar los datos del asistente para continuar</p>
</div>
<div id="mensaje3" class="mensaje" title="Aviso">
    <p>Archivo no valido! Extenciones permitidas: .pdf | .doc | .docx | .rtf</p>
</div>
<div id="mensaje4" class="mensaje" title="Aviso">
    <p>No se encuentra editando la fila seleccionada.</p>
</div>
