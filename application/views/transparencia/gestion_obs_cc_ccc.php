<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_conformacion" ).datepicker({
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
        
        $('#selMun').change(function(){
			var id_mun=$('#selMun').val();
			var new_url= '<?php echo base_url('transparencia/observaciones_cc_ccc/cargar_cc') ?>'+'/'+id_mun;
			var new_url2= '<?php echo base_url('transparencia/observaciones_cc_ccc/cargar_ccc') ?>'+'/'+id_mun;
			tab.clearGridData(false);
			tab2.clearGridData(false);
			tab.jqGrid('setGridParam',{datatype:'json',loadonce:true, url: ''+new_url}).trigger('reloadGrid');
			tab2.jqGrid('setGridParam',{datatype:'json',loadonce:true, url: ''+new_url2}).trigger('reloadGrid');
			tab3.clearGridData(false);
		});
        
        
        
        $("#tipo_obs1").click( function() {
				$("#div_ccc").hide();
				$("#bo_ccc").hide();
				$("#div_cc").show();
				$("#div_obs").show();
				tab3.clearGridData(false);
				$("#bo_cc").show();
		});
		
		$("#tipo_obs2").click( function() {
				$("#div_cc").hide();
				$("#bo_cc").hide();
				$("#div_ccc").show();
				$("#div_obs").show();
				tab3.clearGridData(false);
				$("#bo_ccc").show();
		});
		
		$("#eliminar_cc").button().click(function(){
            var rowid = tab3.jqGrid('getGridParam','selrow');
            if( rowid != null ){
				if(confirm("Desea eliminar el comentario?")){
					var id=tab3.jqGrid('getCell',rowid,'coment_id');
					var datos = {coment_id:id}
					$.post('<?php echo base_url('transparencia/observaciones_cc_ccc/eliminar_coment_cc') ?>', datos,function(){
						tab3.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
						});
					$('#mensaje2').dialog('open');
				}
			 } 
            else $('#mensaje1').dialog('open');
        });
        
        $("#eliminar_ccc").button().click(function(){
            var rowid = tab3.jqGrid('getGridParam','selrow');
            if( rowid != null ){
				if(confirm("Desea eliminar el comentario?")){
					var id=tab3.jqGrid('getCell',rowid,'coment_id');
					var datos = {coment_id:id}
					$.post('<?php echo base_url('transparencia/observaciones_cc_ccc/eliminar_coment_ccc') ?>', datos,function(){
						tab3.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
						});
					$('#mensaje2').dialog('open');
				}
			 } 
            else $('#mensaje1').dialog('open');
        });
        
        $("#ver_cc").button().click(function(){
            var rowid = tab3.jqGrid('getGridParam','selrow');
            if( rowid != null ){
				
					var coment=tab3.jqGrid('getCell',rowid,'comentario');
					$('#ver').remove();
					$('<p id="ver">'+coment+'</p>').appendTo('#mensaje3');
					$('#mensaje3').dialog('open');
					
			 } 
            else $('#mensaje1').dialog('open');
        });
        
        $("#ver_ccc").button().click(function(){
            var rowid = tab3.jqGrid('getGridParam','selrow');
            if( rowid != null ){
				
					var coment=tab3.jqGrid('getCell',rowid,'comentario');
					$('#ver').remove();
					$('<p id="ver">'+coment+'</p>').appendTo('#mensaje3');
					$('#mensaje3').dialog('open');
					
			 } 
            else $('#mensaje1').dialog('open');
        });
       
             
       var tab=$("#cc");
        tab.jqGrid({
            //url:'<?php echo base_url('transparencia/observaciones_cc_ccc/cargar_cc') ?>',
            //editurl: '<?php echo base_url('') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Municipio','Fecha','Lugar de Conformacion','Mujeres Participantes','Hombres Participantes','Acta Final','Listado de Asistencia'],
            colModel:[
                {name:'cc_id',index:'cc_id', width:40,editable:false,editoptions:{size:15} },
                {name:'mun_id',index:'mun_id',width:130,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Municipio",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'cc_fecha',index:'cc_fecha',width:60,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Fecha",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'cc_lugar',index:'cc_lugar',width:160,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Lugar Conformacion",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'total_mujeres',index:'total_mujeres',width:100,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Mujeres Participantes",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'total_hombres',index:'total_hombres',width:100,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Hombres Participantes",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'acta_final',index:'acta_final',width:60,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Acta Final",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'listado_asistencia',index:'listado_asistencia',width:120,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Listado Asistencia",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Consulta Ciudadana Registrados",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerCC'),
            viewrecords: true,
            onSelectRow: function(id){
				  var new_url= '<?php echo base_url('transparencia/observaciones_cc_ccc/cargar_comentarios_cc/') ?>'+'/'+id;
				  tab3.clearGridData(false);
				  tab3.jqGrid('setGridParam',{datatype:'json',loadonce:true, url: ''+new_url}).trigger('reloadGrid');
			   }
        }).jqGrid('navGrid','#pagerCC',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tab.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('cc_id');
    
	var tab2=$("#ccc");
        tab2.jqGrid({
            //url:'<?php echo base_url('transparencia/observaciones_cc_ccc/cargar_ccc') ?>',
            //editurl: '<?php echo base_url('') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Municipio','Fecha de Conformacion','Lugar de Conformacion'],
            colModel:[
                {name:'ccc_id',index:'ccc_id', width:40,editable:false,editoptions:{size:15} },
                {name:'mun_id',index:'mun_id',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Municipio",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fecha_conformacion',index:'fecha_conformacion',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Fecha",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'lugar_conformacion',index:'lugar_conformacion',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Lugar",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Comites de Contraloria Ciudadana Registrados",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerCCC'),
            viewrecords: true,
            onSelectRow: function(id){
				  var new_url= '<?php echo base_url('transparencia/observaciones_cc_ccc/cargar_comentarios_ccc/') ?>'+'/'+id;
				  tab3.clearGridData(false);
				  tab3.jqGrid('setGridParam',{datatype:'json',loadonce:true, url: ''+new_url}).trigger('reloadGrid');
			   }
        }).jqGrid('navGrid','#pagerCCC',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tab2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('ccc_id');
    
     var tab3=$("#obs");
        tab3.jqGrid({
            //url:'<?php echo base_url('transparencia/observaciones_cc_ccc/cargar_cc') ?>',
            //editurl: '<?php echo base_url('') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['coment_id','id','nombre_persona','email','comentario','fecha_coment'],
            colModel:[
                {name:'coment_id',index:'coment_id', width:40,editable:false,editoptions:{size:15} },
                {name:'id',index:'id', width:40,editable:false,editoptions:{size:15} },
                {name:'nombre_persona',index:'nombre_persona',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Nombre Persona",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'email',index:'email',width:100,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Correo electronico",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'comentario',index:'comentario',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Comentario Realizado",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fecha_coment',index:'fecha_coment',width:100,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Fecha del Comentario",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Comentarios Ingresados",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerObs'),
            viewrecords: true
            //onSelectRow: function(id){
				//  var new_url= '<?php echo base_url('componente3/componente3/cargarActividadess_epi/') ?>'+'/'+id;
				 // tabla.clearGridData(false);
				  //tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true, url: ''+new_url}).trigger('reloadGrid');
			   //}
        }).jqGrid('navGrid','#pagerCC',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tab3.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('coment_id').hideCol('id');
	
	
     $('#myform').submit(function(){
		 
		 if($("#tipo_obs1").is(':checked'))
				var tipo = $("#tipo_obs1").val();
		 else
			if($("#tipo_obs2").is(':checked'))
				var tipo = $("#tipo_obs2").val();
			else{
				$('#mensaje3').dialog('open');
				return false;
				}
		 
		 if(tipo=='cc')
			var rowid = tab.jqGrid('getGridParam','selrow');
		 else
			var rowid = tab2.jqGrid('getGridParam','selrow');
			
		 if($('#email').val()!='' && $('#observacion').val()!=''){
			if(rowid!=null){
				$('<input type="hidden" />').attr('name', 'id').attr('value',rowid).appendTo('#divpost');
				if($('#nombre_persona').val()=='')
					$('#nombre_persona').val("Anonimo");
				return true;
			}
			else{
				$('#mensaje1').dialog('open');
				return false;
			}
		 }
		 else{
		 $('#mensaje2').dialog('open');
		 return false;
		 } 
	});
		
		
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        };
        
         function isNumber(n) {
			return !isNaN(parseFloat(n)) && isFinite(n);
		};
    
});
   
</script>
<?php
	$this->load->helper('form');
	include("select_generator.php");  
?>

<?php if(isset($aviso))
	echo $aviso;?>
	
<h1>Observaciones Realizadas a Consulta Ciudadana/Comit&eacute; de Contralor&iacute;a Ciudadana</h1>
<br/>

<?php $attributes = array('id' => 'myform');
	echo form_open('transparencia/observaciones_cc_ccc/guardar_nueva_obs',$attributes);
?>	
   <label><b>Seleccione el Departamento y Municipio:</b></label><br/><br/>
	<label>Departamento: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<?php echo form_dropdown_from_db('dep_id','selDepto' ,"SELECT dep_id,dep_nombre FROM departamento");?>
	<br/><br/>
		
	<label>Nombre del Municipio: </label>&nbsp;
	<select id='selMun' name='mun_id'>
                <option value='0'>--Seleccione--</option>
    </select>
    <br/><br/>
    
    <div>		
		<label><b>&#191;Qu&eacute; Tipo de Observaciones realizadas desea ver&#63;</b></label>
		<br/><br/>
		<input type="radio" name="tipo_obs" id="tipo_obs1" value="cc" <?php echo set_radio('tipo_obs', 'cc'); ?> />Consulta Ciudadana<br/>
		<input type="radio" name="tipo_obs" id="tipo_obs2" value="ccc" <?php echo set_radio('tipo_obs', 'ccc'); ?> />Comit&eacute; de Contralor&iacute;a Ciudadana
	</div></br></br>
		
		<div id="div_cc"  hidden="hidden">
		<label><b>Seleccione la Consulta Ciudadana para ver los comentarios realizados:</b></label><br/><br/>
		<table id="cc"></table>
		<div id="pagerCC"></div></br>
		</div>

		<div id="div_ccc"  hidden="hidden">
		<label><b>Seleccione el Comit&eacute; de Contralor&iacute;a Ciudadana para ver los comentarios realizados:</b></label><br/><br/>
		<table id="ccc"></table>
		<div id="pagerCCC"></div></br>
		</div>
		
		<div id="div_obs"  hidden="hidden">
		<label><b>Comentarios realizados:</b></label><br/><br/>
		<table id="obs"></table>
		<div id="pagerObs"></div>
		</div>
		
		<br/><div id="bo_cc"  hidden="hidden">
			<input type="button" value="Ver Comentario Completo" name="ver_cc" id="ver_cc" align="left">
			<input type="button" value="Eliminar Comentario" name="elminar_cc" id="eliminar_cc" align="left">
			<input type="button" value="Responder Comentario" name="res_cc" id="res_cc" align="left"><br/><br/>
		</div>
		<div id="bo_ccc"  hidden="hidden">
			<input type="button" value="Ver Comentario Completo" name="ver_ccc" id="ver_ccc" align="left">
			<input type="button" value="Eliminar Comentario" name="elminar_ccc" id="eliminar_ccc" align="left">
			<input type="button" value="Responder Comentario" name="res_ccc" id="res_ccc" align="left"><br/><br/><br/><br/>
		</div>
		
	</br></br>
	
	<!--<label>Observaci&oacute;n: </label><br/>
	<textarea rows="5" cols="75" maxlength="500" name="observacion" id="observacion" align="center"></textarea>
	</br></br>-->
    

	<div id="divpost" ></div>
<?php echo form_close();?>

<div id="mensaje" class="mensaje" title="Aviso">
    <p>Ok.</p>
</div>
<div id="mensaje1" class="mensaje" title="Aviso">
    <p>Debe seleccionar un comentario para realizar esta acci&oacute;n.</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Comentario Eliminado Correctamente.</p>
</div>
<div id="mensaje3" class="mensaje" title="Comentario Enviado:">
    <p id="ver">Coment Inicial.</p>
</div>
