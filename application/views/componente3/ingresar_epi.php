<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_ini" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd',
           minDate: (new Date(2013, 0, 1))
       });
	
	   $( "#fecha_fin" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd',
           minDate: (new Date(2013, 0, 1))
       });
       
       $("#agregar").button().click(function() {
			 var records=$('#actividades').jqGrid('getGridParam','records');
			 var name = $('#nombre_act_imp').val();
			 var fecha_ini = $('#fecha_ini').val();
			 var fecha_fin = $('#fecha_fin').val();
			 //var estado = $('#estado_act_imp').val();
			 var responsable = $('#res_act_imp').val();			 
			 var cargo = $('#cargo_res').val();
			 var desc = $('#desc_act_imp').val();
			 var recu = $('#recu_act_imp').val();						
			 
			var fi = new Date(fecha_ini);
			var ff = new Date(fecha_fin);
			if(ff<fi){
				$('#mensaje4').dialog('open');
				return false;
			}
			 
			 if (name!="" && fecha_ini!="" && fecha_fin!="" && responsable!="" && cargo!="" && desc!="" && recu!=""){
				 var newrow = {act_id:""+records, act_nombre:""+name, act_inicio:""+fecha_ini, act_fin:""+fecha_fin,//act_estado:""+estado,
								act_responsable:""+responsable,act_cargo:""+cargo,act_desc:""+desc,act_recursos:""+recu};
				 $("#actividades").addRowData(""+records, newrow);
				 $('#nombre_act_imp').val("");
				 $('#fecha_ini').val("");
				 $('#fecha_fin').val("");
				 //$('#estado_act_imp').val("");
				 $('#res_act_imp').val("");			 
				 $('#cargo_res').val("");
				 $('#desc_act_imp').val("");
				 $('#recu_act_imp').val("");
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
        
        $("#ed1").button().click( function() { 
			var selected=$('#actividades').jqGrid('getGridParam','selrow');
			if( selected != null )
				$("#actividades").jqGrid('editRow',""+selected);
			else $('#mensaje1').dialog('open');
			
		});
		
		$("#sv1").button().click( function() {
			var selected=$('#actividades').jqGrid('getGridParam','selrow');
			if( selected != null )
				if ($("tr#"+selected).attr("editable") === "1") 
					$("#actividades").jqGrid('saveRow',""+selected, {"url": 'clientArray'}); 
				else $('#mensaje5').dialog('open');
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
        
        var tabla=$("#actividades");
        tabla.jqGrid({
            //url:'<?php echo base_url('componente3/componente3/cargaractividades_dsat') ?>',
            //editurl: 'clientArray',
            datatype:'clientSide',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Fecha Inicio','Fecha Fin','Responsable','Cargo','Descripcion','Costo'],
            colModel:[
                {name:'act_id',index:'act_id', width:40,editable:false,editoptions:{size:15} },
                {name:'act_nombre',index:'act_nombre',width:140,editable:true,
                    editoptions:{size:20,maxlength:50}, 
                    formoptions:{label: "Nombre",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'act_inicio',index:'act_inicio',width:65,editable:true,
                    editoptions:{size:10,maxlength:10}, 
                    formoptions:{label: "Fecha Inicio",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'act_fin',index:'act_fin',width:55,editable:true,
                    editoptions:{size:10,maxlength:10}, 
                    formoptions:{label: "Fecha Fin",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                /*{name:'act_estado',index:'act_estado',editable:true,edittype:"select",width:40,
                    editoptions:{ value: 'No iniciada:No iniciada;Ejecutandose:Ejecutandose;Finalizada:Finalizada;Detenida:Detenida' }, 
                    formoptions:{ label: "Estado",elmprefix:"(*)"},
                    editrules:{required:true}
                },*/
                {name:'act_responsable',index:'act_responsable',width:140,editable:true,
                    editoptions:{size:20,maxlength:50}, 
                    formoptions:{label: "Responsable",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'act_cargo',index:'act_cargo',width:120,editable:true,
                    editoptions:{size:20,maxlength:30}, 
                    formoptions:{ label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'act_desc',index:'act_desc',width:145,editable:true,
                    editoptions:{size:20,maxlength:150}, 
                    formoptions:{ label: "Descripcion",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'act_recursos',index:'act_recursos',width:145,editable:true,
                    editoptions:{size:20,maxlength:150}, 
                    formoptions:{ label: "Recursos",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Actividades",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pageractividades'),
            viewrecords: true
        }).jqGrid('navGrid','#pageractividades',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('act_id');
    
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
			
			
				
			var numberOfRecords = $("#actividades").getGridParam("records");
			if(numberOfRecords>0){
				for(i=0;i<numberOfRecords;i++)
				{
					
					var rowId = $("#actividades").getRowData(i);
							  
							  //put all rows for your grid
							  
					$('<input type="hidden" />').attr('name', 'act_nombre'+i).attr('value',rowId['act_nombre']).appendTo('#divpost');
					$('<input type="hidden" />').attr('name', 'act_inicio'+i).attr('value',rowId['act_inicio']).appendTo('#divpost');
					$('<input type="hidden" />').attr('name', 'act_fin'+i).attr('value',rowId['act_fin']).appendTo('#divpost');
					$('<input type="hidden" />').attr('name', 'act_estado'+i).attr('value',rowId['act_estado']).appendTo('#divpost');
					$('<input type="hidden" />').attr('name', 'act_responsable'+i).attr('value',rowId['act_responsable']).appendTo('#divpost');
					$('<input type="hidden" />').attr('name', 'act_cargo'+i).attr('value',rowId['act_cargo']).appendTo('#divpost');
					$('<input type="hidden" />').attr('name', 'act_desc'+i).attr('value',rowId['act_desc']).appendTo('#divpost');
					$('<input type="hidden" />').attr('name', 'act_recursos'+i).attr('value',rowId['act_recursos']).appendTo('#divpost');
				}
				$('<input type="hidden" />').attr('name', 'cant_act').attr('value',numberOfRecords).appendTo('#divpost');
				return true;
			}
			else{
				$('#mensaje3').dialog('open');
				return false;
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
<h1>3.2.2 Elaboraci&oacute;n del Plan Piloto</h1>
<br/>
<?php $attributes = array('id' => 'myform');
echo form_open('componente3/componente3/guardar_epi',$attributes);?>

	<label>Nombre Actividad:&nbsp;</label>
	<input type="text" name="nombre_act_imp" id="nombre_act_imp"  size="45" align="left" maxlength="150"><br/><br/>
		
	<div  style="float:left;height:200px;">
		<label>Fecha de Inicio:</label>
		<input readonly="readonly"  type="text" name="fecha_ini" id="fecha_ini"  size="10" align="left"><br/><br/>

		<label>Responsable: &nbsp;&nbsp;</label>
		<input type="text" name="res_act_imp" id="res_act_imp"  size="22" align="left" maxlength="100"><br/><br/>
		
		<label>Descripci&oacute;n: </label><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<textarea rows="5" cols="21" maxlength="150" name="desc_act_imp" id="desc_act_imp" align="left"></textarea><br/><br/>
			
	</div>
	<div style="float:left;height:200px;">
		
		&nbsp;&nbsp;<label>Fecha de Fin:</label>
		<input readonly="readonly"  type="text" name="fecha_fin" id="fecha_fin"  size="10" align="left"><br/><br/>
		
		&nbsp;&nbsp;<label>Cargo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name="cargo_res" id="cargo_res"  size="10" align="left" maxlength="50"><br/><br/>
		
		&nbsp;&nbsp;<label>Costo: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="recu_act_imp" id="recu_act_imp" size="10" align="left"><br/><br/><br/><br/>
		
		&nbsp;<input type="button" value="Agregar" name="agregar" id="agregar" align="left">
		
	</div>
	<div style="height:200px;">
		
	<!--	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Estado Actividad: </label>
		<select name="estado_act_imp" id="estado_act_imp" size="1">
			<option value="No iniciada"<?php echo set_select('estado_act_imp', 'No iniciada'); ?>>No iniciada</option>
			<option value="Ejecutandoce"<?php echo set_select('estado_act_imp', 'Ejecutandoce'); ?>>Ejecutandoce</option>
			<option value="Finalizada"<?php echo set_select('estado_act_imp', 'Finalizada'); ?>>Finalizada</option>
			<option value="Detenida"<?php echo set_select('estado_act_imp', 'Detenida'); ?>>Detenida</option>
		</select><br/><br/>
		
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
		
		
	</div>
	
	<br/><br/><br/><br/>
	
	<table id="actividades"></table>
	<div id="pageractividades"></div>
	<div style="position: relative;left: 275px; top: 5px;">
			<input  type="button" id="eliminar" value="  Eliminar  " />
			<input  type="button" id="ed1" value="  Editar  " />
			<input  type="button" id="sv1" value="  Guardar  " />
	</div>
	
	<input type="submit" id="guardar" value="Guardar" align="right" name="guardar">	
	<div id="divpost" ></div>	
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
<div id="mensaje4" class="mensaje" title="Aviso">
    <p>La fecha de finalizaci&oacute;n no puede ser menor a la fecha inicial de la actividad.</p>
</div>
<div id="mensaje5" class="mensaje" title="Aviso">
    <p>No se encuentra editando la fila seleccionada.</p>
</div>

