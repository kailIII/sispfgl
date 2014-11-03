<script type="text/javascript">        
   $(document).ready(function(){
	 $( "#fecha_conformacion" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd',
           minDate: (new Date(2013, 0, 1))
       });   
       
       $( "#fecha_ind_etm" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd',
           minDate: (new Date(2013, 0, 1))
       });
       
       $( "#fecha_cap_etm" ).datepicker({
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
        
        $('#si_posee').change(function(){
			if($('#si_posee').is(':checked'))
				$('#monto_ap').prop('disabled', false);
		});
		
		 $('#no_posee').change(function(){
			if($('#no_posee').is(':checked'))
				$('#monto_ap').prop('disabled', true);
		});
		
		$('#no_aplica').change(function(){
			if($('#no_aplica').is(':checked'))
				$('#monto_ap').prop('disabled', true);
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
        
       
         $("#agregar_etm_asis").button().click(function() {
			
			 var records=$('#etm_asis').jqGrid('getGridParam','records');
			 
			 var nombre_asis = $('#nombre_etm_asis').val();
			 var resp_asis = $('#resp_asis_etm').val();
			 var sexo_asis = $('#sexo_etm_asis').val();
			 		 
			 if ( nombre_asis!="" && resp_asis!="" && sexo_asis!="") {
				 				
				 var newrow = {id:""+records, nombre_asis:""+nombre_asis, resp_asis:""+resp_asis, sexo_asis:""+sexo_asis};
				 
				$("#etm_asis").addRowData(""+records, newrow);
		
					//sumar totales hombres y mujeres
					var m = $('#total_mujeres_etm').val();
						if (m=='') m=0;
					var h = $('#total_hombres_etm').val();
						if (h=='') h=0;
					var total = 0;
					if(sexo_asis=='F'){
						total=parseFloat(m)+1;
						var suma=total+parseFloat(h);
						$('#total_mujeres_etm').val(""+total);
						$('#total_etm').val(""+suma);
					}
					else{
						total=parseFloat(h)+1;
						var suma=total+parseFloat(m);
						$('#total_hombres_etm').val(""+total);
						$('#total_etm').val(""+suma);
					}
					///////////////
				
				$('#nombre_etm_asis').val("");
				$('#resp_asis_etm').val("");
				$('#sexo_etm_asis').val("");
				
			 }
			 else $('#mensaje2').dialog('open');
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
        
        
       
             
       var tabla=$("#etm_asis");
        tabla.jqGrid({
            //url:'<?php echo base_url('componente2/componente24a/cargar_capacitaciones') ?>',
            //editurl: '<?php echo base_url('componente3/componente3/guardar_divu') ?>',
            datatype:'clientSide',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Responsabilidad','Sexo'],
            colModel:[
                {name:'id',index:'id', width:40,editable:false,editoptions:{size:15} },
                {name:'nombre_asis',index:'nombre_asis',width:300,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Nombre",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'resp_asis',index:'resp_asis',width:300,editable:true,
                    editoptions:{size:25,maxlength:20}, 
                    formoptions:{label: "Responsabilidad",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'sexo_asis',index:'sexo_asis',editable:true,width:150,
                    editoptions:{ size:25,maxlength:20 }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{required:true}
                }
            ],
            multiselect: false,
            caption: "Integrantes ETM",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerAsisETM'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerAsisETM',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('id');
        
    
     $('#myform').submit(function() {
		 
			if($('#selMun').val()!='' && $('#lugar_convocatoria').val()!='' && $('#fecha_conformacion').val()!='')
			{
				
			
			var numberOfRecords = $("#etm_asis").getGridParam("records");
			for(i=0;i<numberOfRecords;i++)
			{
				var rowId = $("#etm_asis").getRowData(i);
						  //put all rows for your grid
				$('<input type="hidden" />').attr('name', 'nombre_etm_asis'+i).attr('value',rowId['nombre_asis']).appendTo('#divpost');
				$('<input type="hidden" />').attr('name', 'sexo_etm_asis'+i).attr('value',rowId['sexo_asis']).appendTo('#divpost');
				$('<input type="hidden" />').attr('name', 'resp_asis_etm'+i).attr('value',rowId['resp_asis']).appendTo('#divpost');	
			}
			$('<input type="hidden" />').attr('name', 'cant_etm_asis').attr('value',numberOfRecords).appendTo('#divpost');

			
			return true;
		}
		else{ 
			
			$('#mensaje2').dialog('open');
			return false;
			}
			
		});
		
		
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
<h1>Equipo T&eacute;cnico Municipal</h1>
<br/>
<?php $attributes = array('id' => 'myform');

echo form_open('componente2/componente21/guardar_etm',$attributes);?>

	
	<label>Departamento: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<?php echo form_dropdown_from_db('dep_id','selDepto' ,"SELECT dep_id,dep_nombre FROM departamento");?>
		
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Nombre del Municipio: </label>&nbsp;
	<select id='selMun' name='mun_id'>
                <option value='0'>--Seleccione--</option>
    </select>
    <br/><br/>
    
    <label>Fecha de Conformaci&oacute;n: </label>
	<input readonly="readonly"  type="text" name="fecha_conformacion" id="fecha_conformacion"  size="8">
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Lugar de Conformaci&oacute;n: </label>
	<input type="text" name="lugar_convocatoria" id="lugar_convocatoria"  size="20">
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label>Fase: </label>

		<select name="fase_ccc" size="1" id="fase_ccc">
			<option value="Preinscripcion"<?php echo set_select('fase_ccc', 'Preinscripcion'); ?>>Formulaci&oacute;n</option>
			<option value="Ejecucion"<?php echo set_select('fase_ccc', 'Ejecucion'); ?>>Ejecuci&oacute;n</option>
			<option value="Cierre"<?php echo set_select('fase_ccc', 'Cierre'); ?>>Cierre</option>
			<option value="Mantenimiento"<?php echo set_select('fase_ccc', 'Mantenimiento'); ?>>Mantenimiento</option>

		<select name="fase_etm" size="1" id="fase_ccc">
			<option value="Preinscripcion"<?php echo set_select('fase_etm', 'Preinscripcion'); ?>>Formulaci&oacute;n</option>
			<option value="Ejecucion"<?php echo set_select('fase_etm', 'Ejecucion'); ?>>Ejecuci&oacute;n</option>
			<option value="Cierre"<?php echo set_select('fase_etm', 'Cierre'); ?>>Cierre</option>
			<option value="Mantenimiento"<?php echo set_select('fase_etm', 'Mantenimiento'); ?>>Mantenimiento</option>

	</select>
	<br/><br/><br/>
	<hr color="green" size=1 width="700"><br/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><b>Equipo Tecnico Municipal:</b></br> </label>
	<br/>
	<input type="radio" name="etm" id="etm" value="Nombramiento" <?php echo set_radio('etm', 'Nombramiento'); ?> />Nombramiento
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Fecha de Inducci&oacute;n: </label>
	<input readonly="readonly"  type="text" name="fecha_ind_etm" id="fecha_ind_etm"  size="8">
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Fecha de Capacitaci&oacute;n: </label>
	<input readonly="readonly"  type="text" name="fecha_cap_etm" id="fecha_cap_etm"  size="8">
	
	<br/><input type="radio" name="etm" id="etm" value="Cambio de Gobierno" <?php echo set_radio('etm', 'Por Cambio de Gobierno'); ?> />Por Cambio de Gobierno
	<br/><br/>
	
	<label>Nombre: </label>
		<input type="text" name="nombre_etm_asis" id="nombre_etm_asis"  size="17" align="left">
		
		<select name="sexo_etm_asis" size="1" id="sexo_etm_asis">
			<option value="F"<?php echo set_select('sexo_etm_asis', 'F'); ?>>Femenino</option>
			<option value="M"<?php echo set_select('sexo_etm_asis', 'M'); ?>>Masculino</option>
		</select>
		
		<!--<label>Procedencia: </label>
		<select name="sector_asis" size="1" id="sector_asis">
			<option value="Gobierno Municipal">Gobierno Municipal</option>
		</select>-->
		
		<label>Responsabilidad: </label>
		<select name="resp_asis_etm" size="1" id="resp_asis_etm">
			<option value="Logistica"<?php echo set_select('resp_asis_etm', 'Logistica'); ?>>Logistica</option>
			<option value="Sistematizacion"<?php echo set_select('resp_asis_etm', 'Sistematizacion'); ?>>Sistematizacion</option>
			<option value="Coordinador"<?php echo set_select('resp_asis_etm', 'Coordinador'); ?>>Coordinador</option>
			<option value="Documentador"<?php echo set_select('resp_asis_etm', 'Documentador'); ?>>Documentador</option>
		</select>
				
		<input type="button" value="Agregar" name="agregar_etm_asis" id="agregar_etm_asis" align="left"><br/>
		
		<br/>
		
		<table id="etm_asis"></table>
		<div id="pagerAsisETM"></div>
	
		<br/>
		<hr color="green" size=1 width="700"><br/>
		
		<div style="float:left;height:200px;width:500px;">
			&nbsp;&nbsp;&nbsp;&nbsp;<label>Conformaci&oacute;n del ETM: </label>
			<br/><br/>
			
			<label>Total de Mujeres: &nbsp;</label>

			<input type="text" readonly="readonly" name="total_mujeres_etm" id="total_mujeres_etm"  size="1" >
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label>Total de Hombres: </label>
			<input type="text" readonly="readonly" name="total_hombres_etm" id="total_hombres_etm"  size="1" >
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Total: </label>
			<input readonly="readonly" type="text" name="total_etm" id="total_etm"  size="1">

			<input type="text" readonly="readonly" name="total_mujeres_etm" id="total_mujeres_etm" value="0" size="3" >
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label>Total de Hombres: </label>
			<input type="text" readonly="readonly" name="total_hombres_etm" id="total_hombres_etm" value="0"  size="3" >
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Total: </label>
			<input readonly="readonly" type="text" name="total_etm" id="total_etm" value="0" size="3">

		</div></br></br></br></br></br>
		
	<!--<div style="float:left;height:200px;width:330px;">
		
	</div>
	
	<div style="float:left;height:200px;">
		
	</div>-->
       
	<input type="submit" id="guardar" name="guardar" value="Guardar" align="left">
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
