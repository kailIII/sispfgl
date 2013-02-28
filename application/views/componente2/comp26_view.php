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
		
		$('#total_mujeres').change(function(){   
            var m = $('#total_mujeres').val();
            if(!isNumber(m) || m % 1 != 0 || m<0){
					$('#mensaje5').dialog('open');
					$('#total_mujeres').val("");
			}
        });
        
        $('#total_hombres').change(function(){   
            var h = $('#total_hombres').val();
            if(!isNumber(h) || h % 1 != 0 || h<0){
					$('#mensaje6').dialog('open');
					$('#total_hombres').val("");
			}
        });
        
        $('#monto_cap').change(function(){   
            var m = $('#monto_cap').val();
            if(!isNumber(m) || m<0){
					$('#mensaje7').dialog('open');
					$('#monto_cap').val("0");
			}
        });
        
        $('#monto_con').change(function(){   
            var m = $('#monto_con').val();
            if(!isNumber(m) || m<0){
					$('#mensaje7').dialog('open');
					$('#monto_con').val("0");
			}
        });
        
        $('#monto_equi').change(function(){   
            var m = $('#monto_equi').val();
            if(!isNumber(m) || m<0){
					$('#mensaje7').dialog('open');
					$('#monto_equi').val("0");
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
        
        /*botones*/
        
        $("#agregar_cap").button().click(function() {
			// var records=$('#actividades').jqGrid('getGridParam','records');
			 var nombre_cap = $('#nombre_cap').val();
			 var fecha_cap = $('#fecha_cap').val();
			 var nomb_capacitador = $('#nomb_capacitador').val();
			 var m = $('#total_mujeres').val();
			 var h = $('#total_hombres').val();
			 var monto_cap = $('#monto_cap').val();
			 var entidad = "";
			
			 if (!isEntCheck()){
				$('#mensaje8').dialog('open');
				return false;}
				
				if($("#entidad1").is(':checked'))
				entidad = $("#entidad1").val();
			 if($("#entidad2").is(':checked'))
				entidad = $("#entidad2").val();
			if($("#entidad3").is(':checked'))
				entidad = $("#entidad3").val();
			if($("#entidad4").is(':checked'))
				entidad = $("#entidad4").val();
			if($("#entidad5").is(':checked'))
				entidad = $("#entidad5").val();

			 if (nombre_cap!="" && fecha_cap!="" && nomb_capacitador!="" && m!="" && h!="" && monto_cap!="" && entidad!="") {
				 if(!isNumber(m) || m % 1 != 0 || m<0){
					$('#mensaje5').dialog('open');
					return false;}
				if(!isNumber(h) || h % 1 != 0 || h<0){
					$('#mensaje6').dialog('open');
					return false;}
				if(!isNumber(monto_cap) || monto_cap<0){
					$('#mensaje7').dialog('open');
					return false;}
				
				 var newrow = {id:"0", nombre_cap:""+nombre_cap, fecha_cap:""+fecha_cap, nomb_capacitador:""+nomb_capacitador,total_mujeres:""+m,total_hombres:""+h,
				 monto_cap:""+monto_cap, entidad:""+entidad};
				 
				 $.post('<?php echo base_url('componente2/componente26/guardar_comp26_cap') ?>', newrow,function(){
					 tablacap.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
					 });
				$('#nombre_cap').val("");
				$('#fecha_cap').val("");
				$('#nomb_capacitador').val("");
				$('#total_mujeres').val("");
				$('#total_hombres').val("");
				$('#monto_cap').val("");
				
			 }
			 else $('#mensaje2').dialog('open');
        });
        
        $("#agregar_equi").button().click(function() {
			// var records=$('#actividades').jqGrid('getGridParam','records');
			 var desc_equi = $('#desc_equi').val();
			 var fecha_equi = $('#fecha_equi').val();
			 var monto_equi = $('#monto_equi').val();
			 var entidad = "";
			
			if (!isEntCheck()){
				$('#mensaje8').dialog('open');
				return false;}
				
				if($("#entidad1").is(':checked'))
				entidad = $("#entidad1").val();
			 if($("#entidad2").is(':checked'))
				entidad = $("#entidad2").val();
			if($("#entidad3").is(':checked'))
				entidad = $("#entidad3").val();
			if($("#entidad4").is(':checked'))
				entidad = $("#entidad4").val();
			if($("#entidad5").is(':checked'))
				entidad = $("#entidad5").val();

			 if (desc_equi!="" && fecha_equi!="" && monto_equi!="" && entidad!="") {
				
				if(!isNumber(monto_equi) || monto_equi<0){
					$('#mensaje7').dialog('open');
					return false;}
					
				 var newrow = {id:"0", desc_equi:""+desc_equi, fecha_equi:""+fecha_equi, monto_equi:""+monto_equi,
					entidad:""+entidad};
				 
				 $.post('<?php echo base_url('componente2/componente26/guardar_comp26_equi') ?>', newrow,function(){
					 tablaequi.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
					 });
				$('#desc_equi').val("");
				$('#fecha_equi').val("");
				$('#monto_equi').val("");
				
				
			 }
			 else $('#mensaje2').dialog('open');
        });
        
        $("#agregar_con").button().click(function() {
			// var records=$('#actividades').jqGrid('getGridParam','records');
			 var nombre_con = $('#nombre_con').val();
			 var fecha_con = $('#fecha_con').val();
			 var nomb_consultor = $('#nomb_consultor').val();
			 var monto_con = $('#monto_con').val();
			 var entidad = "";
			 
			 if (!isEntCheck()){
				$('#mensaje8').dialog('open');
				return false;}
			 
			 if($("#entidad1").is(':checked'))
				entidad = $("#entidad1").val();
			 if($("#entidad2").is(':checked'))
				entidad = $("#entidad2").val();
			if($("#entidad3").is(':checked'))
				entidad = $("#entidad3").val();
			if($("#entidad4").is(':checked'))
				entidad = $("#entidad4").val();
			if($("#entidad5").is(':checked'))
				entidad = $("#entidad5").val();
			 
			 
			 if (nombre_con!="" && fecha_con!="" && nomb_consultor!="" && monto_con!="" && entidad!="") {
				
				if(!isNumber(monto_con) || monto_con<0){
					$('#mensaje7').dialog('open');
					return false;}
					
				 var newrow = {id:"0", nombre_con:""+nombre_con, fecha_con:""+fecha_con, nomb_consultor:""+nomb_consultor,
				 monto_con:""+monto_con, entidad:""+entidad};
				 
				 $.post('<?php echo base_url('componente2/componente26/guardar_comp26_con') ?>', newrow,function(){
					 tablacon.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
					 });
				$('#nombre_con').val("");
				$('#fecha_con').val("");
				$('#nomb_consultor').val("");
				$('#monto_con').val("");
				
			 }
			 else $('#mensaje2').dialog('open');
        });
       
       /*Grid Capacitaciones*/
       
       var tablacap=$("#Capacitaciones");
        tablacap.jqGrid({
            url:'<?php echo base_url('componente2/componente26/cargar_capacitaciones') ?>',
            //editurl: '<?php echo base_url('componente3/componente3/guardar_divu') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Tema Capacitacion','Fecha','Nombre Capacitador','Total de mujeres','Total de hombres','Monto','Entidad'],
            colModel:[
                {name:'id',index:'id', width:40,editable:false,editoptions:{size:15} },
                {name:'nombre_cap',index:'nombre_cap',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Nombre Capacitacion",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fecha_cap',index:'fecha_cap',width:60,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Fecha Capacitacion",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'nombre_capacitador',index:'nombre_capacitador',editable:true,width:180,
                    editoptions:{ size:25,maxlength:20 }, 
                    formoptions:{ label: "Nombre Capacitador",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'total_mujeres',index:'total_mujeres',width:100,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{ label: "Total Mujeres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'total_hombres',index:'total_hombres',editable:true,width:100,
                    editoptions:{ size:25,maxlength:20 }, 
                    formoptions:{ label: "Total Hombres",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'monto',index:'monto',width:100,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Monto",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'entidad',index:'entidad',width:55,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Entidad",elmprefix:"(*)"},
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
                tablacap.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('id');

        
         function isNumber(n) {
			return !isNaN(parseFloat(n)) && isFinite(n);
		}
		
		function isEntCheck(){
			if($("#entidad1").is(':checked')||$("#entidad2").is(':checked')||$("#entidad3").is(':checked')||$("#entidad4").is(':checked')||$("#entidad5").is(':checked')) {  
				return true;
			} else {  
				return false;
			}
		}
	
	/*Grid Consultorias*/
       
       var tablacon=$("#Consultorias");
        tablacon.jqGrid({
            url:'<?php echo base_url('componente2/componente26/cargar_consultorias') ?>',
            //editurl: '<?php echo base_url('componente3/componente3/guardar_divu') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre Consultoria','Fecha','Nombre Consultor','Monto','Entidad'],
            colModel:[
                {name:'id',index:'id', width:40,editable:false,editoptions:{size:15} },
                {name:'nombre_con',index:'nombre_con',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Nombre Consultoria",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fecha_con',index:'fecha_con',width:60,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Fecha Consultoria",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'nombre_consultoria',index:'nombre_consultoria',editable:true,width:180,
                    editoptions:{ size:25,maxlength:20 }, 
                    formoptions:{ label: "Nombre Consultoria",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'monto',index:'monto',width:100,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Monto",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'entidad',index:'entidad',width:55,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Entidad",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Consultorias",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerConsultorias'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerConsultorias',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tablacon.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('id');
    
	/*Grid Equipamiento*/
       
       var tablaequi=$("#Equipamientos");
        tablaequi.jqGrid({
            url:'<?php echo base_url('componente2/componente26/cargar_equipamientos') ?>',
            //editurl: '<?php echo base_url('componente3/componente3/guardar_divu') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Descripcion Equipamiento','Fecha','Monto', 'Entidad'],
            colModel:[
                {name:'id',index:'id', width:40,editable:false,editoptions:{size:15} },
                {name:'desc_equi',index:'desc_equi',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Descripcion Equipamiento",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fecha_equi',index:'fecha_equi',width:60,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Fecha Equipamiento",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'monto',index:'monto',width:100,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Monto",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'entidad',index:'entidad',width:55,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Entidad",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Equipamientos",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerEquipamientos'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerEquipamientos',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tablaequi.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('id');

    
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
		<input type="radio" name="entidad" id="entidad1" value="ISDEM" <?php echo set_radio('entidad', 'ISDEM'); ?> />ISDEM<br/>
		<input type="radio" name="entidad" id="entidad2" value="COMURES" <?php echo set_radio('entidad', 'COMURES'); ?> />COMURES<br/>
		<input type="radio" name="entidad" id="entidad3" value="SSDT" <?php echo set_radio('entidad', 'SSDT'); ?> />SSDT<br/>
		<input type="radio" name="entidad" id="entidad4" value="MH" <?php echo set_radio('entidad', 'MH'); ?> />MH<br/>
		<input type="radio" name="entidad" id="entidad5" value="FISDL" <?php echo set_radio('entidad', 'FISDL'); ?> />FISDL
	</div>
	
	<div id="div_cap" style="float:left;height:500px;"  hidden="hidden">
		
		<label>Tema de Capacitaci&oacute;n: </label>
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
		<input type="button" value="Agregar" name="agregar_cap" id="agregar_cap" align="left"><br/><br/>
		
		<table id="Capacitaciones"></table>
		<div id="pagerCapacitaciones"></div>
		
	</div>
	
	<div id="div_con" style="float:left;height:500px;"  hidden="hidden">
		
		<label>Nombre de la Consultor&iacute;a: </label>
		<input type="text" name="nombre_con" id="nombre_con"  size="25">
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Fecha: </label>
		<input readonly="readonly"  type="text" name="fecha_con" id="fecha_con"  size="4" align="left">
		<br/><br/>
		
		<label>Nombre de Consultor: </label>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="nomb_consultor" id="nomb_consultor"  size="25"><br/><br/>
		
		<label>Monto &#40;&#36;&#41;: </label>
		<input type="text" name="monto_con" id="monto_con"  size="5" align="left">
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" value="Agregar" name="agregar_con" id="agregar_con" align="left"><br/><br/>
		
		<table id="Consultorias"></table>
		<div id="pagerConsultorias"></div>
		
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
		
		<table id="Equipamientos"></table>
		<div id="pagerEquipamientos"></div>
		
	</div>
	
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
<div id="mensaje7" class="mensaje" title="Aviso">
    <p>El monto ingresado no es valido.</p>
</div>
<div id="mensaje8" class="mensaje" title="Aviso">
    <p>Seleccione la entidad a la que pertenece.</p>
</div>

