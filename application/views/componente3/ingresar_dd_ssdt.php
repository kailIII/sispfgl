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
        
        $('#archivo_ejec').change(function() {
			var archivo = $('#archivo_ejec').val();
			var ext = archivo.substring(archivo.lastIndexOf("."), archivo.length);
			if(ext!='.doc'&&ext!='.docx'&&ext!='.pdf'&&ext!='.xls'&&ext!='.rtf'){
				//$("#notvalid").text("Archivo no valido! Extenciones permitidas: .pdf | .doc | .docx | .rtf").show().fadeOut(10000);
				$('#mensaje1').dialog('open');
				$('#archivo_ejec').val('');
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
		
		var tabla=$("#documentos");
        tabla.jqGrid({
            url:'<?php echo base_url('componente3/componente3/cargar_dd') ?>',
            //editurl: '<?php echo base_url('componente3/componente3/guardar_divu') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Fecha','Descripcion','Tipo y Areas de Estudio','Resumen ejecutivo','Archivo Compelto'],
            colModel:[
                {name:'dd_id',index:'dd_id', width:40,editable:false,editoptions:{size:15} },
                {name:'dd_fecha',index:'dd_fecha',width:60,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Fecha",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'dd_descripcion',index:'dd_descripcion',width:180,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Descripcion",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'dd_sector',index:'dd_sector',width:250,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Sector",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'dd_archivo_resumen',index:'dd_archivo_resumen',editable:true,width:100,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{ label: "Resumen Ejecutivo",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'dd_archivo_completo',index:'dd_archivo_completo',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{ label: "Archivo Completo",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Documentos",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerDocumentos'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerActividades',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('dd_id');
		
       
	});
</script>
<?php 
	$this->load->helper('form'); 
	include("select_generator.php"); 
?>
<?php if(isset($aviso))
	echo $aviso;?>
<h1>Documentos Concernientes a Descentralizaci&oacute;n</h1>
<br/>

	<table id="documentos"></table>
	<div id="pagerDocumentos"></div>
	
<div id="mensaje1" class="mensaje" title="Aviso">
    <p>Archivo no valido! Extenciones permitidas: .pdf | .doc | .docx | .rtf.</p>
</div>
