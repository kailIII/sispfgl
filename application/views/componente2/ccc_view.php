<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_convocatoria" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd',
           minDate: (new Date(2013, 0, 1))
       });
       
       $( "#fecha_ind_etm" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd',
           minDate: (new Date(2013, 0, 1))
       });
       
       $( "#fecha_cap_etm" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd',
           minDate: (new Date(2013, 0, 1))
       });
       
       $( "#fecha_con_ccc" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd',
           minDate: (new Date(2013, 0, 1))
       });
       
       $( "#fecha_cap_ccc" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd',
           minDate: (new Date(2013, 0, 1))
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
        
         /*suma de totales*/
        $('#total_mujeres_etm').change(function(){   
            var m = $('#total_mujeres_etm').val();
            var h = $('#total_hombres_etm').val();
            var total = 0;
            if(!isNumber(m) || m % 1 != 0 || m<0){
					$('#mensaje5').dialog('open');
					$('#total_mujeres_etm').val("");
					return false;
			}
			else{
				if(h=="")
					total=parseFloat(m);
				else
					total=parseFloat(m)+parseFloat(h);
				$('#total_etm').val(""+total);
			}
			             
        });
        
        $('#total_hombres_etm').change(function(){   
            var m = $('#total_mujeres_etm').val();
            var h = $('#total_hombres_etm').val();
            var total = 0;
            if(!isNumber(h) || h % 1 != 0 || h<0){
					$('#mensaje6').dialog('open');
					$('#total_hombres_etm').val("");
					return false;
			}
			else{
				if(m=="")
					total=parseFloat(h);
				else
					total=parseFloat(m)+parseFloat(h);
				$('#total_etm').val(""+total);
			}
			             
        });
        
        $('#total_mujeres_ccc').change(function(){   
            var m = $('#total_mujeres_ccc').val();
            var h = $('#total_hombres_ccc').val();
            var total = 0;
            if(!isNumber(m) || m % 1 != 0 || m<0){
					$('#mensaje5').dialog('open');
					$('#total_mujeres_ccc').val("");
					return false;
			}
			else{
				if(h=="")
					total=parseFloat(m);
				else
					total=parseFloat(m)+parseFloat(h);
				$('#total_ccc').val(""+total);
			}
			             
        });
        
        $('#total_hombres_ccc').change(function(){   
            var m = $('#total_mujeres_ccc').val();
            var h = $('#total_hombres_ccc').val();
            var total = 0;
            if(!isNumber(h) || h % 1 != 0 || h<0){
					$('#mensaje6').dialog('open');
					$('#total_hombres_ccc').val("");
					return false;
			}
			else{
				if(m=="")
					total=parseFloat(h);
				else
					total=parseFloat(m)+parseFloat(h);
				$('#total_ccc').val(""+total);
			}
			             
        });
        
        $('#total_mujeres_cm').change(function(){   
            var m = $('#total_mujeres_cm').val();
            var h = $('#total_hombres_cm').val();
            var total = 0;
            if(!isNumber(m) || m % 1 != 0 || m<0){
					$('#mensaje5').dialog('open');
					$('#total_mujeres_cm').val("");
					return false;
			}
			else{
				if(h=="")
					total=parseFloat(m);
				else
					total=parseFloat(m)+parseFloat(h);
				$('#total_cm').val(""+total);
			}
			             
        });
        
        $('#total_hombres_cm').change(function(){   
            var m = $('#total_mujeres_cm').val();
            var h = $('#total_hombres_cm').val();
            var total = 0;
            if(!isNumber(h) || h % 1 != 0 || h<0){
					$('#mensaje6').dialog('open');
					$('#total_hombres_cm').val("");
					return false;
			}
			else{
				if(m=="")
					total=parseFloat(h);
				else
					total=parseFloat(m)+parseFloat(h);
				$('#total_cm').val(""+total);
			}
			             
        });
        
        
		
		$("#tipo_act_cap").click( function() {
				$("#div_con").hide();
				$("#div_equi").hide();
				$("#div_cap").show();
		});
		
		$("#tipo_act_con").click( function() {
				$("#div_equi").hide();
				$("#div_cap").hide();
				$("#div_con").show();
		});
		
		$("#tipo_act_equi").click( function() {
				$("#div_cap").hide();
				$("#div_con").hide();
				$("#div_equi").show();
				
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
        
        /*botones*/
        
        $("#agregar_cap").button().click(function() {
			// var records=$('#actividades').jqGrid('getGridParam','records');
			 var muni = $('#selMun').val();
			 var fecha_cap = $('#fecha_cap').val();
			 var tema = $('#tema_cap').val();
			 var m = $('#total_mujeres').val();
			 var h = $('#total_hombres').val();
			 var fecha_inst = $('#fecha_inst').val();
			 var fecha_ope = $('#fecha_ope').val();
			 var observaciones = $('#observaciones').val();
			 
			

			 if (muni!=0 && fecha_cap!="" && tema!="" && m!="" && h!="" && fecha_inst!="" && fecha_ope!="" && observaciones!="") {
				 if(!isNumber(m) || m % 1 != 0){
					$('#mensaje5').dialog('open');
					return false;}
				if(!isNumber(h) || h % 1 != 0){
					$('#mensaje6').dialog('open');
					return false;}
				
				 var newrow = {id:"0", nombre_muni:""+muni, fecha_cap:""+fecha_cap, tema_cap:""+tema,total_mujeres:""+m,total_hombres:""+h,
				 fecha_inst:""+fecha_inst,fecha_ope:""+fecha_ope,observaciones:""+observaciones};
				 
				 $.post('<?php echo base_url('componente2/componente24a/guardar_comp24a_cap') ?>', newrow,function(){
					 tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
					 });
				$('#selMun').val("");
				$('#fecha_cap').val("");
				$('#tema_cap').val("");
				$('#total_mujeres').val("");
				$('#total_hombres').val("");
				$('#fecha_inst').val("");
				$('#fecha_ope').val("");
				$('#observaciones').val("");
				
			 }
			 else $('#mensaje2').dialog('open');
        });
       
       /*Grid Capacitaciones*/
       
       var tabla=$("#Capacitaciones");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/componente24a/cargar_capacitaciones') ?>',
            //editurl: '<?php echo base_url('componente3/componente3/guardar_divu') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Municipio','Fecha Capacitacion','Tema','Mujeres','Hombres','Fecha Instalacion','Fecha Operacion','Observaciones'],
            colModel:[
                {name:'id',index:'id', width:40,editable:false,editoptions:{size:15} },
                {name:'nombre_muni',index:'act_nombre',width:100,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Municipio",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fecha_cap',index:'fecha_cap',width:100,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Fecha Capacitacion",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'tema_cap',index:'tema_cap',editable:true,width:150,
                    editoptions:{ size:25,maxlength:20 }, 
                    formoptions:{ label: "Tema",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'total_mujeres',index:'total_mujeres',width:20,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{ label: "Total Mujeres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'total_hombres',index:'total_hombres',editable:true,width:20,
                    editoptions:{ size:25,maxlength:20 }, 
                    formoptions:{ label: "Total Hombres",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'fecha_inst',index:'fecha_inst',width:100,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Fecha Instalacion",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fecha_ope',index:'fecha_ope',width:100,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Fecha Operacion",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'observaciones',index:'observaciones',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Observaciones",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Capacitaciones",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerCapacitaciones'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerCapacitaciones',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('id');

     
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        
         function isNumber(n) {
			return !isNaN(parseFloat(n)) && isFinite(n);
		}
    
});
   
</script>
<?php 
	$this->load->helper('form');
	include("select_generator.php");  
?>
<?php if(isset($aviso))
	echo $aviso;?>
<h1>Comit&eacute; de Contralor&iacute;a Ciudadana</h1>
<br/>
<?php $attributes = array('id' => 'myform');
echo form_open('componente3/componente3/guardar_dsat',$attributes);?>
	
	<label>Departamento: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<?php echo form_dropdown_from_db('dep_id','selDepto' ,"SELECT dep_id,dep_nombre FROM departamento");?>
	<br/><br/>
		
	<label>Nombre del Municipio: </label>&nbsp;
	<select id='selMun' name='mun_id'>
                <option value='0'>--Seleccione--</option>
    </select>
    <br/><br/>
    
    <label>Fecha de Conformaci&oacute;n: </label>
	<input readonly="readonly"  type="text" name="fecha_conformacion" id="fecha_conformacion"  size="4">
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Lugar de Conformaci&oacute;n: </label>
	<input type="text" name="lugar_convocatoria" id="lugar_convocatoria"  size="8">
	<br/><br/><br/>
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Nuevo ETM: </label>
	<br/>
	<input type="radio" name="etm" id="etm" value="Nuevo Nombramiento" <?php echo set_radio('etm', 'Nuevo Nombramiento'); ?> />Nuevo Nombramiento
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Fecha de Inducci&oacute;n: </label>
	<input readonly="readonly"  type="text" name="fecha_ind_etm" id="fecha_ind_etm"  size="4">
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Fecha de Capacitaci&oacute;n: </label>
	<input readonly="readonly"  type="text" name="fecha_cap_etm" id="fecha_cap_etm"  size="4">
	
	<br/><input type="radio" name="etm" id="etm" value="Cambio de GL" <?php echo set_radio('etm', 'Cambio de GL'); ?> />Por Cambio de GL
	<br/><br/>
	
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
		
		<input type="button" value="Agregar" name="agregar_asis" id="agregar_asis" align="left"><br/>
		
		<br/>
		
		<p>Aqui va el Grid.</p>
		<br/>
		
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Nuevo CCC: </label>
		<br/>
		<input type="radio" name="ccc" id="ccc" value="Nuevo Nombramiento" <?php echo set_radio('ccc', 'Nuevo Nombramiento'); ?> />Nuevo Nombramiento
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Fecha de Constituci&oacute;n: </label>
		<input readonly="readonly"  type="text" name="fecha_con_ccc" id="fecha_con_ccc"  size="4">
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Fecha de Capacitaci&oacute;n: </label>
		<input readonly="readonly"  type="text" name="fecha_cap_ccc" id="fecha_cap_ccc"  size="4">
		
		<br/><input type="radio" name="ccc" id="ccc" value="Cambio de GL" <?php echo set_radio('ccc', 'Cambio de GL'); ?> />Por Cambio de GL
		<br/><br/><br/>
		
		
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Comisi&oacute;n Mantenimiento: </label>
		<br/>
		<input type="radio" name="cm" id="cm" value="Nuevo Nombramiento" <?php echo set_radio('cm', 'Nuevo Nombramiento'); ?> />Nuevo Nombramiento
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Fecha de Constituci&oacute;n: </label>
		<input readonly="readonly"  type="text" name="fecha_con_cm" id="fecha_con_cm"  size="4">
		
		<br/><input type="radio" name="cm" id="cm" value="Cambio de GL" <?php echo set_radio('cm', 'Cambio de GL'); ?> />Por Cambio de GL
		<br/><br/>
		
		<label>Nombre de Subproyecto a seguimiento: </label>
		<input type="text" name="nombre_proy" id="nombre_proy"  size="10">
		
		<label>Nombres Comunidades: </label>
		<input type="text" name="com_beneficiadas" id="com_beneficiadas"  size="5">
		
		<label>Comunidades Beneficiadas: </label>
		<input type="text" name="pob_beneficiada" id="pob_beneficiada"  size="5">
		
		<input type="button" value="Agregar" name="agregar_proy" id="agregar_proy"><br/>
		
		<p>Aqui va el grid.</p>
		<br/><br/>
		
		<div style="float:left;height:200px;width:300px;">
			&nbsp;&nbsp;&nbsp;&nbsp;<label>Conformaci&oacute;n del ETM: </label>
			<br/><br/>
			
			<label>Total de Mujeres: &nbsp;</label>
			<input type="text" name="total_mujeres_etm" id="total_mujeres_etm"  size="1" ><br/><br/>
			
			<label>Total de Hombres: </label>
			<input type="text" name="total_hombres_etm" id="total_hombres_etm"  size="1" ><br/><br/>
			
			<label>Total: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input readonly="readonly" type="text" name="total_etm" id="total_etm"  size="1"><br/><br/>
		</div>
		<div style="float:left;height:200px;width:300px;">
			&nbsp;&nbsp;&nbsp;&nbsp;<label>Conformaci&oacute;n de CCC: </label>
			<br/><br/>
			
			<label>Total de Mujeres: &nbsp;</label>
			<input type="text" name="total_mujeres_ccc" id="total_mujeres_ccc"  size="1" ><br/><br/>
			
			<label>Total de Hombres: </label>
			<input type="text" name="total_hombres_ccc" id="total_hombres_ccc"  size="1" ><br/><br/>
			
			<label>Total: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input readonly="readonly" type="text" name="total_ccc" id="total_ccc"  size="1"><br/><br/>
		</div>
		<div style="float:left;height:200px;width:300px;">
			&nbsp;&nbsp;&nbsp;&nbsp;<label>Comisi&oacute;n de Mantenimiento: </label>
			<br/><br/>
			
			<label>Total de Mujeres: &nbsp;</label>
			<input type="text" name="total_mujeres_cm" id="total_mujeres_cm"  size="1" ><br/><br/>
			
			<label>Total de Hombres: </label>
			<input type="text" name="total_hombres_cm" id="total_hombres_cm"  size="1" ><br/><br/>
			
			<label>Total: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input readonly="readonly" type="text" name="total_cm" id="total_cm"  size="1"><br/><br/>
		</div>
	<!--<div style="float:left;height:200px;width:330px;">
		
	</div>
	
	<div style="float:left;height:200px;">
		
	</div>-->
	
	
<?php echo form_close();?>
<div id="mensaje" class="mensaje" title="Aviso">
    <p>Ok.</p>
</div>
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
    <p>Debe completar los datos de la persona para continuar.</p>
</div>
<div id="mensaje5" class="mensaje" title="Aviso">
    <p>La cantidad de mujeres no es valida.</p>
</div>
<div id="mensaje6" class="mensaje" title="Aviso">
    <p>La cantidad de hombres no es valida.</p>
</div>
