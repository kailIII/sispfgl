<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_cap" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd',
           minDate: (new Date(2013, 0, 1))
       });
       
       $( "#fecha_inst" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd',
           minDate: (new Date(2013, 0, 1))
       });
       
       $( "#fecha_ope" ).datepicker({
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
<h1>Componente 2.4.a, Capacitaciones</h1>
<br/>
<?php $attributes = array('id' => 'myform');
echo form_open('componente3/componente3/guardar_dsat',$attributes);?>

	<label>Departamento: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<?php echo form_dropdown_from_db('dep_id','selDepto' ,"SELECT dep_id,dep_nombre FROM departamento");?>
		
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Nombre del Municipio: </label>
	<select id='selMun' name='mun_id'>
                <option value='0'>--Seleccione--</option>
    </select>
    <br/><br/>
    
    <label>Fecha de capacitaci&oacute;n: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<input readonly="readonly"  type="text" name="fecha_cap" id="fecha_cap"  size="4" align="left">
    
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Tema: </label>
	<input type="text" name="tema_cap" id="tema_cap"  size="30" align="left">
	<br/><br/>
	
	<label>Total de Mujeres Participantes: &nbsp;&nbsp;&nbsp;</label>
	<input type="text" name="total_mujeres" id="total_mujeres"  size="1" align="left"><br/><br/>
	
	<label>Total de Hombres Participantes: &nbsp;&nbsp;</label>
	<input type="text" name="total_hombres" id="total_hombres"  size="1" align="left"><br/><br/>
	
	<label>Fecha de Instalaci&oacute;n: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<input readonly="readonly"  type="text" name="fecha_inst" id="fecha_inst"  size="4" align="left"><br/><br/>
	
	<label>Fecha de Inicio de Operaci&oacute;n: </label>
	<input readonly="readonly"  type="text" name="fecha_ope" id="fecha_ope"  size="4" align="left"><br/><br/>
	
	<label>Observaciones: </label><br/>
	<textarea rows="5" cols="75" maxlength="500" name="observaciones" id="observaciones" align="center"></textarea>
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="button" value="Agregar" name="agregar_cap" id="agregar_cap" align="left"><br/>
	
	<br/><br/>
		
	<table id="Capacitaciones"></table>
	<div id="pagerCapacitaciones"></div>
		
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
