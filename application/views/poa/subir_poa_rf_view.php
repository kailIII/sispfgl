<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_doc" ).datepicker({
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
        
        $('#doc_gr').change(function() {
			var archivo = $('#doc_gr').val();
			var ext = archivo.substring(archivo.lastIndexOf("."), archivo.length);
			if(ext!='.xls'&&ext!='.xlsx'){
				//$("#notvalid").text("Archivo no valido! Extenciones permitidas: .pdf | .doc | .docx | .rtf").show().fadeOut(10000);
				$('#mensaje1').dialog('open');
				$('#doc_gr').val('');
			}
		});
		
		$('#archivo_comp').change(function() {
			var archivo = $('#archivo_comp').val();
			var ext = archivo.substring(archivo.lastIndexOf("."), archivo.length);
			if(ext!='.doc'&&ext!='.docx'&&ext!='.pdf'&&ext!='.xls'&&ext!='.rtf'){
				//$("#notvalid").text("Archivo no valido! Extenciones permitidas: .pdf | .doc | .docx | .rtf").show().fadeOut(10000);
				$('#mensaje1').dialog('open');
				$('#archivo_comp').val('');
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
		
		var tabla=$("#docsGR");
        tabla.jqGrid({
            url:'<?php echo base_url('poa/poa/cargar_docs_gr') ?>',
            //editurl: '<?php echo base_url('componente3/componente3/guardar_divu') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Municipio','Anio','Estado','Documento'],
            colModel:[
                {name:'id',index:'id', width:40,editable:false,editoptions:{size:15} },
                {name:'nombre_muni',index:'nombre_muni',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Municipio",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'anio',index:'anio',width:80,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Anio POA",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'estado',index:'estado',editable:true,width:200,
                    editoptions:{ size:25,maxlength:20 }, 
                    formoptions:{ label: "Estado",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'documento',index:'documento',width:100,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{ label: "Documento",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "POA - Documentos de Gestion de Riesgo",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerDocs'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerDocs',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('id');

     
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
       
	});
</script>
<?php 
	$this->load->helper('form'); 
	include("select_generator.php"); 
?>
<?php if(isset($aviso))
	echo $aviso;?>
<h1>Subir Archivo POA - Rescate Financiero</h1>
<br/>
<?php $attributes = array('id' => 'myform');
echo form_open_multipart('poa/poa/guardar_poa_rf',$attributes);?>
	
	<div  style="float:left;height:80px;width:350px;">
		
		<label>Departamento: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<?php echo form_dropdown_from_db('dep_id','selDepto' ,"SELECT dep_id,dep_nombre FROM departamento");?>
		<br/><br/>
			
		<label>Nombre del Municipio: </label>&nbsp;
		<select id='selMun' name='mun_id'>
					<option value='0'>--Seleccione--</option>
		</select>
		<br/><br/>
		
		<!--<label>Fecha: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input readonly="readonly"  type="text" name="fecha_doc" id="fecha_doc"  size="7" align="left"><br/><br/>-->
		
	</div>
	
	<div  style="float:left;height:80px;width:550px;">
		<label>Estado: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="estado_rg" size="1" id="estado_rg">
			<option value="En Ejecucion"<?php echo set_select('estado_rg', 'En Ejecucion'); ?>>En Ejecuci&oacute;n</option>
			<option value="Finalizado"<?php echo set_select('estado_rg', 'Finalizado'); ?>>Finalizado</option>
			<option value="Retrasado"<?php echo set_select('estado_rg', 'Retrasado'); ?>>Retrasado</option>
			<option value="Cancelado"<?php echo set_select('estado_rg', 'Cancelado'); ?>>Cancelado</option>
		</select>
		<br/><br/>
		
		<label>Doc. Rescate Financiero: </label>
		<input type="file" id="doc_gr" name="doc_rf" size="10" />
	</div>
	
	<div  style="float:left;height:45px;width:700px;">	
		
		<input type="submit" id="guardar" name="guardar" value="Guardar" align="right">
		
	</div>
	<div  style="float:left;height:250px;width:700px;">	
		<table id="docsGR"></table>
		<div id="pagerDocs"></div>
	</div>
		
<?php echo form_close();?>
<div id="mensaje1" class="mensaje" title="Aviso">
    <p>Archivo no valido! Extenciones permitidas: .xls | .xlsx</p>
</div>
