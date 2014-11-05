<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_convocatoria" ).datepicker({
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
		
		$("#hora_convocatoria").click( function() {
			if($("#hora_convocatoria").val()=="hh:mm")
				$("#hora_convocatoria").val("");
		});
		
		$("#hora_convocatoria").change( function() {
			var hora = $("#hora_convocatoria").val();
			if(!horaValida(hora)){
				$('#mensaje7').dialog('open');
				$('#hora_convocatoria').val("08:00");
			}
		});
		
		$('#monto_proy').change(function(){   
            var m = $('#monto_proy').val();
            if(!isNumber(m) || m<0){
					$('#mensaje8').dialog('open');
					$('#monto_proy').val("0");
			}
        });
        
        $('#com_beneficiadas').change(function(){   
            var m = $('#com_beneficiadas').val();
            if(!isNumber(m) || m<0){
					$('#mensaje9').dialog('open');
					$('#com_beneficiadas').val("0");
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
        
        /*suma de totales*/
        $('#total_mujeres').change(function(){   
            var m = $('#total_mujeres').val();
            var h = $('#total_hombres').val();
            var total = 0;
            if(!isNumber(m) || m % 1 != 0 || m<0){
					$('#mensaje5').dialog('open');
					$('#total_mujeres').val("0");
					return false;
			}
			else{
				if(h=="")
					total=parseFloat(m);
				else
					total=parseFloat(m)+parseFloat(h);
				$('#total').val(""+total);
			}
			             
        });
        
        $('#total_hombres').change(function(){   
            var m = $('#total_mujeres').val();
            var h = $('#total_hombres').val();
            var total = 0;
            if(!isNumber(h) || h % 1 != 0 || h<0){
					$('#mensaje6').dialog('open');
					$('#total_hombres').val("0");
					return false;
			}
			else{
				if(m=="")
					total=parseFloat(h);
				else
					total=parseFloat(m)+parseFloat(h);
				$('#total').val(""+total);
			}
			             
        });
        /*botones*/
        
        $("#agregar_proy").button().click(function() {
			
			 var records=$('#Proyectos').jqGrid('getGridParam','records');
			 
			 var nombre_proy = $('#nombre_proy').val();
			 var monto_proy = $('#monto_proy').val();
			 var com_beneficiadas = $('#com_beneficiadas').val();
			 var pob_beneficiada = $('#pob_beneficiada').val();
			 		 
			
			if(!($("#tipo_proy1").is(':checked')) && !($("#tipo_proy2").is(':checked')))
			{
				$('#mensaje2').dialog('open');
				return false;
			}else{
				if($("#tipo_proy1").is(':checked'))
					var tipo_proy = $('#tipo_proy1').val();
				else var tipo_proy = $('#tipo_proy2').val();
				}
			
			 if ( nombre_proy!="" && monto_proy!="" && com_beneficiadas!="" && pob_beneficiada!="" && tipo_proy!="") {
				 				
				 var newrow = {id:""+records, nombre_proy:""+nombre_proy, monto_proy:""+monto_proy, com_beneficiadas:""+com_beneficiadas,
				 pob_beneficiada:""+pob_beneficiada,tipo_proy:""+tipo_proy};
				 
				 //$.post('<?php echo base_url('componente2/componente24a/guardar_comp24a_cap') ?>', newrow,function(){
					// tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
					 //});
				$("#Proyectos").addRowData(""+records, newrow);
				
				$('#nombre_proy').val("");
				$('#monto_proy').val("");
				$('#com_beneficiadas').val("");
				$('#pob_beneficiada').val("");
				
			 }
			 else $('#mensaje2').dialog('open');
        });
        
        $('#myform').submit(function() {
				
			var numberOfRecords = $("#Proyectos").getGridParam("records");
			for(i=0;i<numberOfRecords;i++)
			{
				
				var rowId = $("#Proyectos").getRowData(i);
						  
						  //put all rows for your grid
				 
						  
				$('<input type="hidden" />').attr('name', 'nombre_proy'+i).attr('value',rowId['nombre_proy']).appendTo('#divpost');
				$('<input type="hidden" />').attr('name', 'monto_proy'+i).attr('value',rowId['monto_proy']).appendTo('#divpost');
				$('<input type="hidden" />').attr('name', 'com_beneficiadas'+i).attr('value',rowId['com_beneficiadas']).appendTo('#divpost');
				$('<input type="hidden" />').attr('name', 'pob_beneficiada'+i).attr('value',rowId['pob_beneficiada']).appendTo('#divpost');
				$('<input type="hidden" />').attr('name', 'tipo_proy'+i).attr('value',rowId['tipo_proy']).appendTo('#divpost');
				
			}
			$('<input type="hidden" />').attr('name', 'cant_proy').attr('value',numberOfRecords).appendTo('#divpost');
			if ($('#acta_final').val()!='')
				$('<input type="hidden" />').attr('name', 'acta').attr('value','si').appendTo('#divpost');
			else
				$('<input type="hidden" />').attr('name', 'acta').attr('value','no').appendTo('#divpost');
			if ($('#lista_asis').val()!='')
				$('<input type="hidden" />').attr('name', 'lista').attr('value','si').appendTo('#divpost');
			else
				$('<input type="hidden" />').attr('name', 'lista').attr('value','no').appendTo('#divpost');

			return true;
			
		});
       
       /*Grid Capacitaciones*/
       
       var tabla=$("#Proyectos");
        tabla.jqGrid({
            //url:'<?php echo base_url('componente2/componente24a/cargar_capacitaciones') ?>',
            //editurl: '<?php echo base_url('componente3/componente3/guardar_divu') ?>',
            datatype:'clientSide',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre del Proyecto','Monto','Comunidades Beneficiadas','Poblacion Beneficiada','Tipo Proyecto'],
            colModel:[
                {name:'id',index:'id', width:40,editable:false,editoptions:{size:15} },
                {name:'nombre_proy',index:'nombre_proy',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Nombre del Proyecto",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'monto_proy',index:'monto_proy',width:70,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Monto",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'com_beneficiadas',index:'com_beneficiadas',editable:true,width:230,
                    editoptions:{ size:25,maxlength:20 }, 
                    formoptions:{ label: "Comunidades Beneficiadas",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'pob_beneficiada',index:'pob_beneficiada',width:140,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{ label: "Poblacion Beneficiada",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'tipo_proy',index:'tipo_proy',editable:true,width:90,
                    editoptions:{ size:25,maxlength:20 }, 
                    formoptions:{ label: "Tipo Proyecto",elmprefix:"(*)"},
                    editrules:{required:true}
                }
            ],
            multiselect: false,
            caption: "Proyectos",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerProyectos'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerProyectos',
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
		
		function horaValida(hora) {
			if(hora.length!=5 || hora=="" || hora.lastIndexOf(":")!=2 || (!isNumber(hora.substring(0, 2))) || (!isNumber(hora.substring(3, 5))) || 
				(hora.substring(0, 2))<0 || (hora.substring(0, 2))>23 || (hora.substring(3, 5))<0 || (hora.substring(3, 5))>59)
			return false;
			else return true;
		}
    
});
   
</script>
<?php 
	$this->load->helper('form');
	include("select_generator.php");  
?>
<?php if(isset($aviso))
	echo $aviso;?>
<h1>Consulta Ciudadana</h1>
<br/>
<?php $attributes = array('id' => 'myform');
echo form_open_multipart('componente2/componente21/guardar_cc',$attributes);?>
	
	<label>Departamento: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<?php echo form_dropdown_from_db('dep_id','selDepto' ,"SELECT dep_id,dep_nombre FROM departamento");?>
	<br/><br/>
		
	<label>Nombre del Municipio: </label>&nbsp;
	<select id='selMun' name='mun_id'>
                <option value='0'>--Seleccione--</option>
    </select>
    <br/><br/>
    
    <label>Fecha de Convocatoria: </label>
	<input readonly="readonly"  type="text" name="fecha_convocatoria" id="fecha_convocatoria"  size="4">
	
	<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Hora: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" value="hh:mm" name="hora_convocatoria" id="hora_convocatoria"  size="4">-->
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Lugar: </label>
	<input type="text" name="lugar_convocatoria" id="lugar_convocatoria"  size="8">
	<br/><br/><br/>
	
	<label>Nombre del Subproyecto: </label>&nbsp;&nbsp;
	<input type="text" name="nombre_proy" id="nombre_proy"  size="10">
	
	&nbsp;&nbsp;<label>Monto &#40;&#36;&#41;: </label>
	<input type="text" name="monto_proy" id="monto_proy"  size="4" >
	
	<table>
		<tr>
			<td rowspan="2">
				<input type="radio" name="tipo_proy" id="tipo_proy1" value="Cambio Subproyecto" <?php echo set_radio('tipo_proy','Cambio Subproyecto'); ?> />Cambio Subproyecto<br/>
				<input type="radio" name="tipo_proy" id="tipo_proy2" value="Nuevo Subproyecto" <?php echo set_radio('tipo_proy','Nuevo Subproyecto'); ?> />Nuevo Subproyecto
			</td>
		</tr>
	</table>
	
	<label>N&uacute;mero Aprox. de Comunidades Beneficiadas: </label>
	<input type="text" name="com_beneficiadas" id="com_beneficiadas"  size="5">
	
	<label>Poblaci&oacute;n Beneficiada: </label>
	<input type="text" name="pob_beneficiada" id="pob_beneficiada"  size="10">
	
	<input type="button" value="Agregar" name="agregar_proy" id="agregar_proy"><br/>
	<br/><br/>
	
	<table id="Proyectos"></table>
	<div id="pagerProyectos"></div>
	<br/><br/>
	
	<div style="float:left;height:200px;width:330px;">
		&nbsp;&nbsp;&nbsp;&nbsp;<label>Registro de Asistencia a la CC: </label>
		<br/><br/>
		
		<label>Total de Mujeres: &nbsp;</label>
		<input type="text" name="total_mujeres" id="total_mujeres"  size="3" ><br/><br/>
		
		<label>Total de Hombres: </label>
		<input type="text" name="total_hombres" id="total_hombres"  size="3" ><br/><br/>
		
		<label>Total: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input readonly="readonly" type="text" name="total" id="total"  size="1"><br/><br/>
	</div>
	
	<div style="float:left;height:200px;">
		&nbsp;&nbsp;&nbsp;&nbsp;<label>Archivos: </label>
		<br/><br/>
		
		<label>Acta de CC: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="file" id="acta_final" name="acta_final" size="20" /><br/><br/>
		
		<label>Listado de Asistencia: </label>
		<input type="file" id="lista_asis" name="lista_asis" size="20" /><br/><br/>
		
		<input type="submit" id="guardar" name="guardar" value="Guardar" align="right">
	</div>
	
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
    <p>La cantidad de hombres no es valida.-</p>
</div>
<div id="mensaje7" class="mensaje" title="Aviso">
    <p>La hora instroducida no es valida. Por favor utilice el formato [hh:mm], donde hh=horas y mm=minutos (dentro del rango valido).-</p>
</div>
<div id="mensaje8" class="mensaje" title="Aviso">
    <p>El monto ingresado no es valido.-</p>
</div>
<div id="mensaje9" class="mensaje" title="Aviso">
    <p>Se requiere un numero.-</p>
</div>
