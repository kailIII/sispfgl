<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_act_div" ).datepicker({
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
        
        $("#agregar_div_act").button().click(function() {
			// var records=$('#actividades').jqGrid('getGridParam','records');
			 
			 var name = $('#nombre_act_div').val();
			 var fecha = $('#fecha_act_div').val();
			 var tipo = $('#tipo_act_div').val();
			 var responsable = $('#res_act_div').val();
			 var muni = $('#selMun').val();

			 if (responsable!="" && name!="" && fecha!="" && muni!="0") {
				 var newrow = {act_id:"0", act_nombre:""+name, act_fecha:""+fecha, act_tipo:""+tipo,act_responsable:""+responsable,act_mun:""+muni};
				 
				 $.post('<?php echo base_url('componente3/componente3/guardar_divu') ?>', newrow,function(){
					 tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
					 });
				$('#nombre_act_div').val("");
				$('#fecha_act_div').val("");
				$('#tipo_act_div').val("");
				$('#res_act_div').val("");
				$('#selMun').val("");
				
			 }
			 else $('#mensaje2').dialog('open');
        });
        
        $("#agregar_persona").button().click(function() {
			 
			 var name = $('#nombre_asis').val();
			 var sexo = $('#sexo_asis').val();
			 var sector = $('#sector_asis').val();
			 var cargo = $('#cargo_asis').val();
			 if (cargo!="" && name!=""){
				var divu_id = tabla.jqGrid('getGridParam','selrow');
				if( divu_id != null ){
					var newrow = {act_id:""+divu_id, par_nombre:""+name, par_sexo:""+sexo,par_cargo:""+cargo,par_sector:""+sector}; 
					var new_url= '<?php echo base_url('componente3/componente3/cargarAsistentes_divu/') ?>'+'/'+divu_id;
					
					$.post('<?php echo base_url('componente3/componente3/guardar_asis_divu') ?>', newrow,function(){
					 tab.jqGrid('setGridParam',{datatype:'json', loadonce:true}).trigger('reloadGrid');
					 });
					
					
				    tab.clearGridData(false);
				    tab.jqGrid('setGridParam',{datatype:'json',loadonce:true, url: ''+new_url}).trigger('reloadGrid');
					$('#nombre_asis').val("");
					$('#sexo_asis').val("");
					$('#sector_asis').val("");
					$('#cargo_asis').val("");
				}
				else $('#mensaje5').dialog('open');
			 }
			 else $('#mensaje4').dialog('open');
        });
       
       /*Grid Actividades*/
       
       var tabla=$("#actividades");
        tabla.jqGrid({
            url:'<?php echo base_url('componente3/componente3/cargar_act_divu') ?>',
            editurl: '<?php echo base_url('componente3/componente3/guardar_divu') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Fecha','Tipo','Responsable','Departamento','Municipio'],
            colModel:[
                {name:'act_id',index:'act__id', width:40,editable:false,editoptions:{size:15} },
                {name:'act_nombre',index:'act_nombre',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Nombre",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'act_fecha',index:'act_fecha',width:70,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Fecha",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'act_tipo',index:'act_tipo',editable:true,edittype:"select",width:80,
                    editoptions:{ value: 'Foro:Foro;Presentacion:Presentacion;Seminario:Seminario;Taller:Taller;Cabildo Abierto:Cabildo Abierto' }, 
                    formoptions:{ label: "Tipo",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'act_responsable',index:'act_responsable',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{ label: "Responsable",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'act_dep',index:'act_dep',editable:true,edittype:"select",width:125,
                    editoptions:{ value: '0:Seleccione;1:Ahuachapan' }, 
                    formoptions:{ label: "Departamento",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'act_mun',index:'act_mun',editable:true,edittype:"select",width:125,
                    editoptions:{ value: '0:Seleccione;1:Ahuachapan' }, 
                    formoptions:{ label: "Municipio",elmprefix:"(*)"},
                    editrules:{required:true}
                }
            ],
            multiselect: false,
            caption: "Actividades",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerActividades'),
            viewrecords: true,
            onSelectRow: function(id){
				  var new_url= '<?php echo base_url('componente3/componente3/cargarAsistentes_divu/') ?>'+'/'+id;
				  tab.clearGridData(false);
				  tab.jqGrid('setGridParam',{datatype:'json',loadonce:true, url: ''+new_url}).trigger('reloadGrid');
			   }
        }).jqGrid('navGrid','#pagerActividades',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('act_id');
    
    
    
    /*Grid de participantes************************/
    var tab=$("#asistentes");
        tab.jqGrid({
            url:'<?php echo base_url('componente3/componente3/cargarAsistentes_divu/') ?>',
            //editurl: 'clientArray',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombres','Sexo','Cargo','Sector'],
            colModel:[
                {name:'act_id',index:'act_id', width:40,editable:false,editoptions:{size:15} },
                {name:'act_nombre',index:'act_nombre',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'act_sexo',index:'act_sexo',editable:true,edittype:"select",width:40,
                    editoptions:{ value: '0:Seleccione;f:Femenino;m:Masculino' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'act_cargo',index:'act_cargo',width:250,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'act_sector',index:'act_sector',editable:true,edittype:"select",width:125,
                    editoptions:{ value: '0:Seleccione;po:Politico;ed:Educacion;ju:Juventud;si:Sindical;em:Empresarial;mu:Mujer;ot:Otro' }, 
                    formoptions:{ label: "Sector",elmprefix:"(*)"},
                    editrules:{required:true}
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
                tab.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('act_id');
    
    
    
    
    
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        
        /*m*/
 
       
       
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
	
	<table id="actividades"></table>
	<div id="pagerActividades"></div>
	
	<br/><br/>
			
	<table id="asistentes"></table>
	<div id="pagerAsistentes"></div>
		

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
    <p>Seleccione la actividad a la cual pertenece la persona a ingresar.</p>
</div>
