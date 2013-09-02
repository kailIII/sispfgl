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
        
         $('#ver_indicador').button().click(function() {
			var id=$('#matriz').jqGrid('getGridParam','selrow');
			if( id != null ){
				var row = $("#matriz").getRowData(id);
				$('#indicador_msj').empty();
				$('#indicador_msj').append(''+row['indicador']);
				$('#mensaje2').dialog('open');
			}
			else $('#mensaje1').dialog('open');
		});
		
		$('#ver_comentario').button().click(function() {
			var id=$('#matriz').jqGrid('getGridParam','selrow');
			if( id != null ){
				var row = $("#matriz").getRowData(id);
				$('#comentario_msj').empty();
				$('#comentario_msj').append(''+row['comentario']);
				$('#mensaje3').dialog('open');
			}
			else $('#mensaje1').dialog('open');
		});
		
		
		
		$('#editar').button().click(function() {
			var id=$('#matriz').jqGrid('getGridParam','selrow');
			if( id != null ){
				if(id && id!==lastsel){
								$('#editar').prop('disabled', true).button('refresh');
								$('#guardar').prop('disabled', false).button('refresh');
								$('#cancelar').prop('disabled', false).button('refresh');
								tabla.jqGrid('restoreRow',lastsel);
								tabla.jqGrid('editRow',id,false);
								
								lastsel=id;
								}
			}
			else $('#mensaje1').dialog('open');
		});
		
		$('#guardar').button().click(function() {
			tabla.jqGrid('saveRow',lastsel);
			$('#guardar').prop('disabled',true).button('refresh');
			$('#cancelar').prop('disabled',true).button('refresh');
			$('#editar').prop('disabled',false).button('refresh');
		});
		
		$('#cancelar').button().click(function() {
			tabla.jqGrid('restoreRow',lastsel);
			$('#guardar').prop('disabled',true).button('refresh');
			$('#cancelar').prop('disabled',true).button('refresh');
			$('#editar').prop('disabled',false).button('refresh');
		});
		
		var lastsel;
		var tabla=$("#matriz");
        tabla.jqGrid({
            url:'<?php echo base_url('matriz_indicadores/matriz_indicadores/cargar_indicadores/'.$componente) ?>',
            editurl: '<?php echo base_url('matriz_indicadores/matriz_indicadores/actualizar_indicador') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Cod','Indicador','Linea Base','2011','2012','2013','2014','2015','Total','Comentario'],
            colModel:[
                {name:'id',index:'id', width:40,editable:false,editoptions:{size:15} },
                {name:'cod',index:'cod',width:31,editable:true,
                    editoptions:{size:10,maxlength:6}, 
                    formoptions:{label: "Cod",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'indicador',index:'indicador',width:200,editable:true,
                    editoptions:{size:31,maxlength:350}, 
                    formoptions:{label: "Indicador",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'lineabase',index:'lineabase',editable:true,width:60,
                    editoptions:{ size:8,maxlength:5 }, 
                    formoptions:{ label: "Linea Base",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'2011',index:'2011',width:70,editable:true,
                    editoptions:{size:9,maxlength:90}, 
                    formoptions:{ label: "2011",elmprefix:"(*)"},
                    editrules:{required:false} 
                },
                {name:'2012',index:'2012',width:70,editable:true,
                    editoptions:{size:9,maxlength:100}, 
                    formoptions:{ label: "2012",elmprefix:"(*)"},
                    editrules:{required:false} 
                },
                {name:'2013',index:'2013',width:70,editable:true,
                    editoptions:{size:9,maxlength:100}, 
                    formoptions:{ label: "2013",elmprefix:"(*)"},
                    editrules:{required:false} 
                },
                {name:'2014',index:'2014',width:70,editable:true,
                    editoptions:{size:9,maxlength:100}, 
                    formoptions:{ label: "2014",elmprefix:"(*)"},
                    editrules:{required:false} 
                },
                {name:'2015',index:'2015',width:70,editable:true,
                    editoptions:{size:9,maxlength:100}, 
                    formoptions:{ label: "2015",elmprefix:"(*)"},
                    editrules:{required:false} 
                },
                {name:'total',index:'total',editable:true,width:90,
                    editoptions:{ size:13,maxlength:20 }, 
                    formoptions:{ label: "Total",elmprefix:"(*)"},
                    editrules:{required:false}
                },
                {name:'comentario',index:'comentario',editable:true,width:145,
                    editoptions:{ size:25,maxlength:500 }, 
                    formoptions:{ label: "Comentario",elmprefix:"(*)"},
                    editrules:{required:false}
                }
            ],
            multiselect: false,
            caption: "Matriz de Indicadores",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerMatriz'),
            viewrecords: true,
            emptyrecords: 'No hay indicadores registrados'
        }).jqGrid('navGrid','#pagerMatriz',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('id');
       
	});
</script>
<?php 
	$this->load->helper('form'); 
	//include("select_generator.php"); 
?>
<?php if(isset($aviso))
	echo $aviso;?>
<h1>Matriz de Indicadores del <?php if(isset($componente))echo $componente;?></h1>
<br/>
<?php $attributes = array('id' => 'myform');
echo form_open_multipart('poa/poa/guardar_poa_gr',$attributes);?>
	
		<table id="matriz"></table>
		<div id="pagerMatriz"></div>
		
		<br/>
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		<input type="button" id="ver_indicador" value="Ver Indicador"/>
		<input type="button" id="ver_comentario" value="Ver Comentario"/>
		
		
<?php echo form_close();?>
<div id="mensaje1" class="mensaje" title="Aviso">
    <p>Seleccione una fila para realizar esta acci&oacute;n.</p>
</div>
<div id="mensaje2" class="mensaje" title="Indicador">
    <p id="indicador_msj"></p>
</div>
<div id="mensaje3" class="mensaje" title="Indicador">
    <p id="comentario_msj"></p>
</div>
