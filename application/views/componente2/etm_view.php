<script type="text/javascript">        
   $(document).ready(function(){
       $("#guardar").button().click(function() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('componente2/componente21/guardarGeneralEtm') ?>',
                data: $("#generalesEtm").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $('#efectivo').dialog('open');
                }
            });
            return false;
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
        
      
       	/*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){
          
            $('#mun_id').children().remove();
            $.getJSON('<?php echo base_url('componente3/componente3/cargarMunicipios');?>'+'?dep_id='+$('#selDepto').val(), 
            
            function(data) {
                var i=0;
               // document.write($('#mun_id').val());
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#mun_id').append('<option value="0">--Seleccione Municipio--</option>');
                        $.each(val, function(id, registro){
                            $('#mun_id').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
        $('#mun_id').change(function() {
        $("#lugar_conformacion").val('');
        $("#total_mujeres").val('');
        $("#total_hombres").val('');
        var id_mun=$('#mun_id').val();
//        $('input[type="submit"]').attr('disabled','disabled')
        if(id_mun !=0){
        $.getJSON('<?php echo base_url('componente2/componente21/cargarGeneralEtm') . "/" ?>' + id_mun,
        function(data) {
              $("#lugar_conformacion").val(data.lugar_conformacion);
              $("#total_mujeres").val(data.total_mujeres);
              $("#total_hombres").val(data.total_hombres);
              $("#etm_id").val(data.etm_id);
              $("#etm_fechas").setGridParam({
                  url:'<?php echo base_url('componente2/componente21/cargar_etm_asis')."/" ?>'+$('#etm_id').val(),
                  editurl:'<?php echo base_url('componente2/componente21/modificar_etm_asis')."/" ?>'+$('#etm_id').val(),
                  datatype:'json'
                  }).trigger('reloadGrid');
               $("#etm_asis").setGridParam({
                  url:'<?php echo base_url('componente2/componente21/cargar_etm_asis2')."/" ?>'+$('#etm_id').val(),
                  editurl:'<?php echo base_url('componente2/componente21/modificar_etm_asis2')."/" ?>'+$('#etm_id').val(),
                  datatype:'json'
                  }).trigger('reloadGrid');
             })               
          }
          
 });
                    
        var tabla=$("#etm_fechas");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/componente21/cargar_etm_asis')."/" ?>'+$('#etm_id').val(),
            editurl:'<?php echo base_url('componente2/componente21/modificar_etm_asis')."/" ?>'+$('#etm_id').val(),
//            datatype:'clientSide',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Causa','F. Confor.','F. Inducc.','F. Capaci.'],
            colModel:[
                {name:'id_motivo_fecha',index:'id_motivo_fecha', width:30,editable:false,editoptions:{size:15} },
                {name:'motivo_fecha',index:'motivo_fecha',width:100,editable:true,
                    edittype:"select",editoptions:{value:"Nombramiento:Nombramiento;Cambio de Gobierno:Cambio de Gobierno"} 
                },
                {name: 'fecha_conformacion', index: 'fecha_conformacion', width: 80, editable: true,
                    editoptions: {
                        size: 10, maxlengh: 10,
                        dataInit: function(element) {
                            $(element).datepicker({
                                showOn: 'both',
                                buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
                                buttonImageOnly: true,
                                dateFormat: 'dd-mm-yy'
                            })
                        }
                    },
                    formoptions: {label: "Fecha Conformacion"},
                    editrules: {required: true}
                },
                 {name: 'fecha_induccion', index: 'fecha_induccion', width: 80, editable: true,
                    editoptions: {
                        size: 10, maxlengh: 10,
                        dataInit: function(element) {
                            $(element).datepicker({
                                showOn: 'both',
                                buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
                                buttonImageOnly: true,
                                dateFormat: 'dd-mm-yy'
                            })
                        }
                    },
                    formoptions: {label: "Fecha de Inducción:"},
                    editrules: {required: true}
                },
                 {name: 'fecha_capacitacion', index: 'fecha_capacitacion', width: 80, editable: true,
                    editoptions: {
                        size: 10, maxlengh: 10,
                        dataInit: function(element) {
                            $(element).datepicker({
                                showOn: 'both',
                                buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
                                buttonImageOnly: true,
                                dateFormat: 'dd-mm-yy'
                            })
                        }
                    },
                    formoptions: {label: "Fecha de Capacitación:"},
                    editrules: {required: true}
                }
                
                
            ],
            
            multiselect: false,
            //caption: "Fuentes de Información Primarias",
            rowNum: 10,
            rowList: [10, 20, 30],
            loadonce: true,
            pager: jQuery('#pageretm_fechas'),
            viewrecords: true
        }).jqGrid('navGrid', '#pageretm_fechas',
        {edit: true, add: true, del: true, search: false, refresh: false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
            }
        }, //OPCIONES
        {closeAfterEdit: true, editCaption: "Editando las fechas de ETM", width: 700,
            align: 'center', reloadAfterSubmit: true,
            processData: "Cargando...", afterSubmit: despuesAgregarEditar1,
            bottominfo: "Campos marcados con (*) son obligatorios",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        }, //EDITAR
        {closeAfterAdd: true, addCaption: "Agregando Nuevas fechas del ETM", width: 700,
            align: 'center', reloadAfterSubmit: true,
            processData: "Cargando...", afterSubmit: despuesAgregarEditar1,
            bottominfo: "Campos marcados con (*) son obligatorios",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        }, //AGREGAR
        {msg: "¿Desea Eliminar estas fechas?", caption: "Eliminando....",
            align: 'center', reloadAfterSubmit: true, processData: "Cargando...", width: 300,
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        }//ELIMINAR
    ).hideCol('id').hideCol('id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar1() {
            tabla.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
            return[true, '']; //no error
        }
        
        
        
        
        
             /* Aqui se almancenan las personas que conforman el ETM*/
       var tabla1=$("#etm_asis");
        tabla1.jqGrid({
            url:'<?php echo base_url('componente2/componente21/cargar_etm_asis2') ?>'+$('#etm_id').val(),
            editurl: '<?php echo base_url('componente2/componente21/modificar_etm_asis2') ?>'+$('#etm_id').val(),
            //datatype:'clientSide',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Responsabilidad','Sexo'],
            colModel:[
                {name:'asis_etm_id',index:'asis_etm_id', width:40,editable:false,editoptions:{size:15} },
                {name:'nombre_asis',index:'nombre_asis',width:300,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Nombre",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'responsabilidad',index:'responsabilidad',width:300,editable:true,
                    edittype:"select",editoptions:{value:"Logistica:Logistica; Sistematizacion:Sistematizacion;Coordinador:Coordinador;Documentador:Documentador"} 
                },
                {name:'sexo',index:'sexo', width:90, editable: true,edittype:"select",editoptions:{value:"Masculino:Masculino; Femenino:Femenino"}}
                
            ],
            
            multiselect: false,
            //caption: "Fuentes de Información Primarias",
            rowNum: 10,
            rowList: [10, 20, 30],
            loadonce: true,
            pager: jQuery('#pageretm_asis'),
            viewrecords: true
        }).jqGrid('navGrid', '#pageretm_asis',
        {edit: true, add: true, del: true, search: false, refresh: false,
            beforeRefresh: function() {
                tabla1.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
            }
        }, //OPCIONES
        {closeAfterEdit: true, editCaption: "Editando las personas del ETM", width: 700,
            align: 'center', reloadAfterSubmit: true,
            processData: "Cargando...", afterSubmit: despuesAgregarEditar,
            bottominfo: "Campos marcados con (*) son obligatorios",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        }, //EDITAR
        {closeAfterAdd: true, addCaption: "Agregar personas al ETM", width: 700,
            align: 'center', reloadAfterSubmit: true,
            processData: "Cargando...", afterSubmit: despuesAgregarEditar,
            bottominfo: "Campos marcados con (*) son obligatorios",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        }, //AGREGAR
        {msg: "¿Desea Eliminar a esta persona?", caption: "Eliminando....",
            align: 'center', reloadAfterSubmit: true, processData: "Cargando...", width: 300,
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        }//ELIMINAR
    ).hideCol('id').hideCol('id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla1.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
            return[true, '']; //no error
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
<h1>Equipo T&eacute;cnico Municipal</h1>
<br/>
<?php $attributes = array('id' => 'generalesEtm');

echo form_open('componente2/componente21/guardarGeneralEtm',$attributes);?>

	
	<label>Departamento: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<?php echo form_dropdown_from_db('dep_id','selDepto' ,"SELECT dep_id,dep_nombre FROM departamento");?>
		
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Nombre del Municipio: </label>&nbsp;
	<select id='mun_id' name='mun_id'>
                <option value='0'>--Seleccione--</option>
    </select>
    <br/><br/>
    
    <form id="generalesEtm" method="post">
	<p>Lugar de Convocatoria:<br/><input type="text "id="lugar_conformacion" name="lugar_conformacion" size="120" maxlength="250" ></p>
	<p>Total de Mujeres Asistentes:<input type="text" name="total_mujeres" id="total_mujeres" size="5" maxlength="5" ></p>
        <p>Total de Hombres Asistentes: <input type="text" name="total_hombres" id="total_hombres" size="5" maxlength="5" >
        <input type="hidden" id="modifica" name="modifica" value="Modificar" align="left" disabled >
        <input type="submit" id="guarda" name="guarda" value="Guardar" align="left" >
        <input type="hidden" name="etm_id" id="etm_id" value="0" size="5" maxlength="5" >
        	<br/><br/><br/>
  
	<br/><br/>
<div id="etmfechas">	
                <table id="etm_fechas"></table>
		<div id="pageretm_fechas"></div>
                </div>
        <br/><br/>
          </form>
		<table id="etm_asis"></table>
		<div id="pageretm_asis"></div>
	
		<br/>
		<hr color="green" size=1 width="700"><br/>
		
		</br></br></br></br></br>
		
	       
	<div id="divpost" ></div>
	
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
    <p>Especifique el Monto del Subproyecto a seguimiento.</p>
</div>
