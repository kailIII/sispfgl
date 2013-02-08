<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_cap" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd',
           minDate: (new Date(2013, 0, 1))
       });
       
       $( "#fecha_con" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd',
           minDate: (new Date(2013, 0, 1))
       });
       
       $( "#fecha_equi" ).datepicker({
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
<h1>Componente 2.6</h1>
<br/>
<?php $attributes = array('id' => 'myform');
echo form_open('componente3/componente3/guardar_dsat',$attributes);?>
	
	<div style="float:left;height:155px;width:250px;"></div>
	<div  style="float:left;height:150px;width:250px;">		
		<label><b>Tipo de Actividad</b></label>
		<br/><br/>
		<input type="radio" name="tipo_act" id="tipo_act_cap" value="Capacitacion" <?php echo set_radio('tipo_act', 'Capacitacion'); ?> />Capacitaci&oacute;n<br/>
		<input type="radio" name="tipo_act" id="tipo_act_con" value="Consultoria" <?php echo set_radio('tipo_act', 'Consultoria'); ?> />Consultor&iacute;a<br/>
		<input type="radio" name="tipo_act" id="tipo_act_equi" value="Equipamiento" <?php echo set_radio('tipo_act', 'Equipamiento'); ?> />Equipamiento
	</div>
	
	<div  style="float:left;height:155px;width:250px;">
		<label><b>Entidad</b></label>
		<br/><br/>
		<input type="radio" name="entidad" id="entidad" value="ISDEM" <?php echo set_radio('entidad', 'ISDEM'); ?> />ISDEM<br/>
		<input type="radio" name="entidad" id="entidad" value="COMURES" <?php echo set_radio('entidad', 'COMURES'); ?> />COMURES<br/>
		<input type="radio" name="entidad" id="entidad" value="SSDT" <?php echo set_radio('entidad', 'SSDT'); ?> />SSDT<br/>
		<input type="radio" name="entidad" id="entidad" value="MH" <?php echo set_radio('entidad', 'MH'); ?> />MH<br/>
		<input type="radio" name="entidad" id="entidad" value="FISDL" <?php echo set_radio('entidad', 'FISDL'); ?> />FISDL
	</div>
	
	<div id="div_cap" style="float:left;height:300px;"  hidden="hidden">
		
		<label>Nombre de la Capacitaci&oacute;n: </label>
		<input type="text" name="nombre_cap" id="nombre_cap"  size="25">
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Fecha: </label>
		<input readonly="readonly"  type="text" name="fecha_cap" id="fecha_cap"  size="4" align="left">
		<br/><br/>
		
		<label>Nombre de Capacitador: </label>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="nomb_capacitador" id="nomb_capacitador"  size="25"><br/><br/>
		
		<label>Total de Mujeres: &nbsp;</label>
		<input type="text" name="total_mujeres" id="total_mujeres"  size="1" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<label>Total de Hombres: </label>
		<input type="text" name="total_hombres" id="total_hombres"  size="1" align="left"><br/><br/>
		
		<label>Monto &#40;&#36;&#41;: </label>&nbsp;&nbsp;&nbsp;
		<input type="text" name="monto_cap" id="monto_cap"  size="5" align="left">
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" value="Agregar" name="agregar_cap" id="agregar_cap" align="left"><br/>
		
	</div>
	
	<div id="div_con" style="float:left;height:300px;"  hidden="hidden">
		
		<label>Nombre de la Consulto&iacute;a: </label>
		<input type="text" name="nombre_con" id="nombre_con"  size="25">
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Fecha: </label>
		<input readonly="readonly"  type="text" name="fecha_con" id="fecha_con"  size="4" align="left">
		<br/><br/>
		
		<label>Nombre de Consultor: </label>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="nomb_consultor" id="nomb_consultor"  size="25"><br/><br/>
		
		<label>Monto &#40;&#36;&#41;: </label>
		<input type="text" name="monto_con" id="monto_con"  size="5" align="left">
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" value="Agregar" name="agregar_con" id="agregar_con" align="left"><br/>
		
	</div>
	
	<div id="div_equi" style="float:left;height:400px;"  hidden="hidden">
		
		<label>Descripci&oacute;n del Equipo</label>
		<input type="text" name="desc_equi" id="desc_equi"  size="25">
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Fecha: </label>
		<input readonly="readonly"  type="text" name="fecha_equi" id="fecha_equi"  size="4" align="left">
		<br/><br/>
		
		<label>Monto &#40;&#36;&#41;: </label>
		<input type="text" name="monto_equi" id="monto_equi"  size="5" align="left">
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" value="Agregar" name="agregar_equi" id="agregar_equi" align="left"><br/><br/>
		
		<table id="Capacitaciones"></table>
		<div id="pagerCapacitaciones"></div>
		
	</div>
	
<?php echo form_close();?>
<div id="mensaje" class="mensaje" title="Aviso">
    <p>Chivo.</p>
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
