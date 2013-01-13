<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_con" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd'
       });
       
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
                
        $("#eliminar").button().click(function(){
            var rowid = tabla.jqGrid('getGridParam','selrow');
            if( rowid != null ){
				if(confirm("Desea eliminar el asistente?"))
				 tabla.jqGrid('delRowData',rowid);
			 } 
            else $('#mensaje1').dialog('open');
        });
                
        /*validaciones*/
        
        function validaSexo(value, colname) {
            if (value == 0 ) return [false,"Seleccione el Sexo del Asistente"];
            else return [true,""];
        }
        
        function validaSector(value, colname) {
            if (value == 0 ) return [false,"Seleccione el Sector del Asistente"];
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
            colNames:['id','Nombres','Apellidos','Sexo','Cargo','Sector'],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_nombre',index:'par_nombre',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_apellido',index:'par_apellido',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Apellidos",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_sexo',index:'par_sexo',editable:true,edittype:"select",width:40,
                    editoptions:{ value: '0:Seleccione;f:Femenino;m:Masculino' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaSexo}
                },
                {name:'par_cargo',index:'par_cargo',width:250,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_sector',index:'par_sector',editable:true,edittype:"select",width:125,
                    editoptions:{ value: '0:Seleccione;po:Politico;ed:Educacion;ju:Juventud;si:Sindical;em:Empresarial;mu:Mujer;ot:Otro' }, 
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
       
	});
   
</script>
<?php 
	$this->load->helper('form'); 
	include("select_generator.php"); 
?>
<?php if(isset($aviso))
	echo $aviso;?>
<h2>3.2.1 Formaci&oacute;n de Concenso y Discusi&oacute;n de la Politica de Descentralizaci&oacute;n</h2>
<br/>
<?php $attributes = array('id' => 'myform');
 echo form_open_multipart('componente3/componente3/guardar_fcdp', $attributes);?>

	<div  style="float:left;">
		
		<label>Fecha de Actividad:</label>
		<input readonly="readonly"  type="text" name="fecha_con" id="fecha_con"  size="10" align="left"><br/>
		
		<label>Tematica: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="tematica_con" id="tematica_con"  size="45" align="left">
		
	</div>
	<div style="">
		<table>
			<tr>
				<td><input type="checkbox" name="ultimo_con" value="1" <?php echo set_checkbox('ultimo_con', '1'); ?> /></td>
				<td><label>&Uacute;ltima reuni&oacute;n</label></td>
			</tr>
		</table>
	</div>
	
	
	
		<br/><br/><br/>
		<p align="center"><b>Asistentes</b></p>
		
		<label>Nombre Asistente: </label>
		<input type="text" name="nombre_asis" id="nombre_asis"  size="22" align="left">
		
		<select name="sexo_asis" id="sexo_asis" size="1">
			<option value="F"<?php echo set_select('sexo_asis', 'F'); ?>>Femenino</option>
			<option value="M"<?php echo set_select('sexo_asis', 'M'); ?>>Masculino</option>
		</select>
		
		<label>Sector: </label>
		<select name="sector_asis" size="1" id="sector_asis">
			<option value="Politico"<?php echo set_select('sector_asis', 'Politico'); ?>>Politico</option>
			<option value="Educacion"<?php echo set_select('sector_asis', 'Educacion'); ?>>Educacion</option>
			<option value="Juventud"<?php echo set_select('sector_asis', 'Juventud'); ?>>Juventud</option>
			<option value="Sindical"<?php echo set_select('sector_asis', 'Sindical'); ?>>Sindical</option>
			<option value="Empresarial"<?php echo set_select('sector_asis', 'Empresarial'); ?>>Empresarial</option>
			<option value="Mujer"<?php echo set_select('sector_asis', 'Mujer'); ?>>Mujer</option>
			<option value="Otro"<?php echo set_select('sector_asis', 'Otro'); ?>>Otro</option>
		</select>
		
		<label>Cargo: </label>
		<input type="text" name="cargo_asis" id="cargo_asis"  size="10" align="left">
		
		<input type="button" value="Agregar" name="agregar" id="agregar" align="left"><br/><br/>
		
		<table id="asistentes"></table>
		<div id="pagerAsistentes"></div>
		<div style="position: relative;left: 275px; top: 5px;">
			<input  type="button" id="eliminar" value="  Eliminar  " />
		</div>
		
		<label>Observaciones: </label><br/>
		<textarea rows="5" cols="80" maxlength="500" name="observaciones" id="observaciones" align="center"></textarea><br/><br/>
		
		<label>Archivo de Reporte: </label>
		<input type="file" name="archivo_reporte" id="archivo_reporte" size="20" /><span style="color:blue"; id="notvalid"></span><br/><br/>
		
		<input type="submit" name="guardar" value="Guardar" align="right">
		
		<div id="divpost" ></div>
<?php echo form_close();?>

<div id="mensaje1" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe completar los datos del asistente para continuar</p>
</div>
<div id="mensaje3" class="mensaje" title="Aviso">
    <p>Archivo no valido! Extenciones permitidas: .pdf | .doc | .docx | .rtf</p>
</div>

