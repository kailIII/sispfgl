<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_atm" ).datepicker({
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
        
        $('#monto_atm').change(function(){   
            var m = $('#monto_atm').val();
            if(!isNumber(m) || m<0){
					$('#mensaje5').dialog('open');
					$('#monto_atm').val("0");
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
        
        $("#agregar_atm").button().click(function() {
			// var records=$('#actividades').jqGrid('getGridParam','records');
			 var muni = $('#selMun').val();
			 var fecha_atm = $('#fecha_atm').val();
			 var area_atm = $('#area_atm').val();
			 var entidad_atm = $('#entidad_atm').val();
			 var nombre_atm = $('#nombre_atm').val();
			 var monto_atm = $('#monto_atm').val();
			 
			

			 if (muni!=0 && fecha_atm!="" && area_atm!="" && entidad_atm!="" && nombre_atm!="" && monto_atm!="") {
				 if(!isNumber(monto_atm) || monto_atm < 0){
					$('#mensaje5').dialog('open');
					return false;}
				
				 var newrow = {id:"0", nombre_muni:""+muni, fecha_atm:""+fecha_atm, area_atm:""+area_atm,entidad_atm:""+entidad_atm,nombre_atm:""+nombre_atm,
				 monto_atm:""+monto_atm};
				 
				 $.post('<?php echo base_url('componente2/componente24a/guardar_comp24a_atm') ?>', newrow,function(){
					 tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
					 });
				$('#selMun').val("");
				$('#fecha_atm').val("");
				$('#area_atm').val("");
				$('#entidad_atm').val("");
				$('#nombre_atm').val("");
				$('#monto_atm').val("");
				
			 }
			 else $('#mensaje2').dialog('open');
        });
       
       /*Grid Capacitaciones*/
       
       var tabla=$("#Asistencias");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/componente24a/cargar_asistencias') ?>',
            //editurl: '<?php echo base_url('componente3/componente3/guardar_divu') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Municipio','Fecha asistencia','Area de accion','Entidad que asesora','Nombre','Monto($)'],
            colModel:[
                {name:'id',index:'id', width:40,editable:false,editoptions:{size:15} },
                {name:'nombre_muni',index:'nombre_muni',width:100,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Municipio",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fecha_atm',index:'fecha_atm',width:100,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Fecha ATM",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'area_atm',index:'area_atm',editable:true,width:200,
                    editoptions:{ size:25,maxlength:20 }, 
                    formoptions:{ label: "Area de accion",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'entidad_atm',index:'entidad_atm',width:140,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Entidad que asesora",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'nombre_atm',index:'nombre_atm',width:120,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Nombre",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'monto_atm',index:'monto_atm',width:60,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Monto",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Asistencia Tecnica Municipal",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerAsistencias'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerAsistencias',
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
<h1>Componente 2.4.a Asistencia T&eacute;cnica a Municipios</h1>
<br/>
<?php $attributes = array('id' => 'myform');
echo form_open('componente3/componente3/guardar_dsat',$attributes);?>

	<label>Departamento: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<?php echo form_dropdown_from_db('dep_id','selDepto' ,"SELECT dep_id,dep_nombre FROM departamento");?>
	<br/><br/>
		
	<label>Nombre del Municipio: &nbsp;</label>
	<select id='selMun' name='mun_id'>
                <option value='0'>--Seleccione--</option>
    </select>
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Fecha: </label>
	<input readonly="readonly"  type="text" name="fecha_atm" id="fecha_atm"  size="4" align="left">
	<br/><br/>
    
	<label>&Aacute;rea de Acci&oacute;n: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo form_dropdown_from_db('id_area_accion','area_atm' ,"SELECT id_area_accion,nombre_area_accion FROM area_accion");?>
	<br/><br/>
	
	<label>Entidad que Asesora: </label>
	<select name="entidad_atm" size="1" id="entidad_atm">
			<option value="ONG"<?php echo set_select('entidad_atm', 'ONG'); ?>>ONG</option>
			<option value="Firma Consultora"<?php echo set_select('entidad_atm', 'Firma Consultora'); ?>>Firma Consultora</option>
			<option value="Consultor Individual"<?php echo set_select('entidad_atm', 'Consultor Individual'); ?>>Consultor Individual</option>
			<option value="Otro"<?php echo set_select('entidad_atm', 'Otro'); ?>>Otro</option>
	</select>
	<br/><br/>
	
	<label>Nombre: </label>
	<input type="text" name="nombre_atm" id="nombre_atm"  size="8" align="left"><br/><br/>
	
	<label>Monto &#40;&#36;&#41;: </label>
	<input type="text" name="monto_atm" id="monto_atm"  size="5" align="left">
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="button" value="Agregar" name="agregar_atm" id="agregar_atm" align="left"><br/>
	
	<br/><br/>
		
	<table id="Asistencias"></table>
	<div id="pagerAsistencias"></div>
		
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
    <p>El monto ingresado no es valido.</p>
</div>
