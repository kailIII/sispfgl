<script type="text/javascript">        
   $(document).ready(function(){
	   $( "#fecha_conformacion" ).datepicker({
           showOn: 'both',
           buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
           buttonImageOnly: true, 
           dateFormat: 'yy/mm/dd',
           minDate: (new Date(2013, 0, 1))
       });
       
       

       $( "#fecha_con_cm" ).datepicker({
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
        
        $('#total_mujeres_cm').change(function(){   
            var m = $('#total_mujeres_cm').val();
            var h = $('#total_hombres_cm').val();
            var total = 0;
            if(!isNumber(m) || m % 1 != 0 || m<0){
					$('#mensaje5').dialog('open');
					$('#total_mujeres_cm').val("");
					return false;
			}
			else{
				if(h=="")
					total=parseFloat(m);
				else
					total=parseFloat(m)+parseFloat(h);
				$('#total_cm').val(""+total);
			}
			             
        });
        
        $('#total_hombres_cm').change(function(){   
            var m = $('#total_mujeres_cm').val();
            var h = $('#total_hombres_cm').val();
            var total = 0;
            if(!isNumber(h) || h % 1 != 0 || h<0){
					$('#mensaje6').dialog('open');
					$('#total_hombres_cm').val("");
					return false;
			}
			else{
				if(m=="")
					total=parseFloat(h);
				else
					total=parseFloat(m)+parseFloat(h);
				$('#total_cm').val(""+total);
			}
			             
        });
        
        
        $("#agregar_cm_asis").button().click(function() {
			
			 var records=$('#cm_asis').jqGrid('getGridParam','records');
			 
			 var nombre_asis = $('#nombre_cm_asis').val();

			 var resp_asis = 'N/A'; //antes: $('#resp_asis_cm').val();

			 var resp_asis = $('#resp_asis_cm').val(); //antes: ;'N/A'

			 var sexo_asis = $('#sexo_cm_asis').val();
			 		 
			 if ( nombre_asis!="" && resp_asis!="" && sexo_asis!="") {
				 				
				 var newrow = {id:""+records, nombre_asis:""+nombre_asis, resp_asis:""+resp_asis, sexo_asis:""+sexo_asis};
				 
				$("#cm_asis").addRowData(""+records, newrow);
				
				//sumar totales hombres y mujeres
					var m = $('#total_mujeres_cm').val();
						if (m=='') m=0;
					var h = $('#total_hombres_cm').val();
						if (h=='') h=0;
					var total = 0;
					if(sexo_asis=='F'){
						total=parseFloat(m)+1;
						var suma=total+parseFloat(h);
						$('#total_mujeres_cm').val(""+total);
						$('#total_cm').val(""+suma);
					}
					else{
						total=parseFloat(h)+1;
						var suma=total+parseFloat(m);
						$('#total_hombres_cm').val(""+total);
						$('#total_cm').val(""+suma);
					}
					///////////////
				
				$('#nombre_cm_asis').val("");
				$('#resp_asis_cm').val("");
				$('#sexo_cm_asis').val("");
				
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
        
        
       
             
       
    var tabla3=$("#cm_asis");
        tabla3.jqGrid({
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
            caption: "Integrantes CM",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerAsisCM'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerAsisCM',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla3.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('id');
    
   
     $('#myform').submit(function() {
		 
			if($('#selMun').val()!='' && $('#lugar_convocatoria').val()!='' && $('#fecha_conformacion').val()!='')
			{
				

			var numberOfRecords = $("#Proyectos").getGridParam("records");
			for(i=0;i<numberOfRecords;i++)
			{
				var rowId = $("#Proyectos").getRowData(i); 
						  //put all rows for your grid
				$('<input type="hidden" />').attr('name', 'nombre_proy'+i).attr('value',rowId['nombre_proy']).appendTo('#divpost');
				$('<input type="hidden" />').attr('name', 'com_beneficiadas'+i).attr('value',rowId['com_beneficiadas']).appendTo('#divpost');
				$('<input type="hidden" />').attr('name', 'pob_beneficiada'+i).attr('value',rowId['pob_beneficiada']).appendTo('#divpost');	
			}
			$('<input type="hidden" />').attr('name', 'cant_proy').attr('value',numberOfRecords).appendTo('#divpost');
			
			
			
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

			var numberOfRecords = $("#ccc_asis").getGridParam("records");
			for(i=0;i<numberOfRecords;i++)
			{
				var rowId = $("#ccc_asis").getRowData(i);
						  //put all rows for your grid
				$('<input type="hidden" />').attr('name', 'nombre_ccc_asis'+i).attr('value',rowId['nombre_asis']).appendTo('#divpost');
				$('<input type="hidden" />').attr('name', 'sexo_ccc_asis'+i).attr('value',rowId['sexo_asis']).appendTo('#divpost');
				$('<input type="hidden" />').attr('name', 'resp_asis_ccc'+i).attr('value',rowId['resp_asis']).appendTo('#divpost');	
			}
			$('<input type="hidden" />').attr('name', 'cant_ccc_asis').attr('value',numberOfRecords).appendTo('#divpost');


			var numberOfRecords = $("#cm_asis").getGridParam("records");
			for(i=0;i<numberOfRecords;i++)
			{
				var rowId = $("#cm_asis").getRowData(i);
						  //put all rows for your grid
				$('<input type="hidden" />').attr('name', 'nombre_cm_asis'+i).attr('value',rowId['nombre_asis']).appendTo('#divpost');
				$('<input type="hidden" />').attr('name', 'sexo_cm_asis'+i).attr('value',rowId['sexo_asis']).appendTo('#divpost');
				$('<input type="hidden" />').attr('name', 'resp_asis_cm'+i).attr('value',rowId['resp_asis']).appendTo('#divpost');	
			}
			$('<input type="hidden" />').attr('name', 'cant_cm_asis').attr('value',numberOfRecords).appendTo('#divpost');
			
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
<h1>Comisi&oacute;n de  Mantenimiento</h1>
<br/>
<?php $attributes = array('id' => 'myform');

echo form_open('componente2/componente21/guardar_ccc',$attributes);?>

	
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
	<br/>
             
		<!--<input type="radio" name="cm" id="cm" value="Nuevo Nombramiento" <?php echo set_radio('cm', 'Nuevo Nombramiento'); ?> />Nuevo Nombramiento-->
		
		
		
		<!--<br/><input type="radio" name="cm" id="cm" value="Cambio de GL" <?php echo set_radio('cm', 'Cambio de GL'); ?> />Por Cambio de GL-->
		<br/><br/>
		
		<label>Nombre: </label>
		<input type="text" name="nombre_cm_asis" id="nombre_cm_asis"  size="17" align="left">
		
		<select name="sexo_cm_asis" size="1" id="sexo_cm_asis">
			<option value="F"<?php echo set_select('sexo_cm_asis', 'F'); ?>>Femenino</option>
			<option value="M"<?php echo set_select('sexo_cm_asis', 'M'); ?>>Masculino</option>
		</select>
		
		<label>Responsabilidad: </label>
		<select name="resp_asis_cm" size="1" id="resp_asis_cm">
			<option value="Presidente"<?php echo set_select('resp_asis_cm', 'Presidente'); ?>>Presidente</option>
			<option value="Secretario"<?php echo set_select('resp_asis_cm', 'Secretario'); ?>>Secretario</option>
			<option value="Contralor Financiero"<?php echo set_select('resp_asis_cm', 'Contralor Financiero'); ?>>Contralor Financiero</option>
			<option value="Vigilante Ambiental y Social"<?php echo set_select('resp_asis_cm', 'Vigilante Ambiental y Social'); ?>>Vigilante Ambiental y Social</option>
			<option value="Procurador de Genero"<?php echo set_select('resp_asis_cm', 'Procurador de Genero'); ?>>Procurador de Genero</option>
			<option value="Contralor Comunitario"<?php echo set_select('resp_asis_cm', 'Contralor Comunitario'); ?>>Contralor Comunitario</option>
		</select>
				
		<input type="button" value="Agregar" name="agregar_cm_asis" id="agregar_cm_asis" align="left"><br/>
		
		<br/>
		
		<table id="cm_asis"></table>
		<div id="pagerAsisCM"></div>
	
		
		<br/>
		
		<table id="Proyectos"></table>
		
		<div style="float:left;height:200px;width:500px;">
			&nbsp;&nbsp;&nbsp;&nbsp;<label>Comisi&oacute;n de Mantenimiento: </label>
			<br/><br/>
			
			<label>Total de Mujeres: &nbsp;</label>
			<input type="text" readonly="readonly" name="total_mujeres_cm" id="total_mujeres_cm"  size="3" >&nbsp;&nbsp;&nbsp;
			
			<label>Total de Hombres: </label>
			<input type="text" readonly="readonly" name="total_hombres_cm" id="total_hombres_cm"  size="3" >&nbsp;&nbsp;&nbsp;
			
			<label>Total: </label>
			<input readonly="readonly" type="text" name="total_cm" id="total_cm"  size="3"><br/><br/>
		</div>
	<!--<div style="float:left;height:200px;width:330px;">
		
	</div>
	
	<div style="float:left;height:200px;">
		
	</div>-->
        <br/><br/>
	<input type="submit" id="guardar" name="guardar" value="Guardar" align="right">
	<div id="divpost" ></div>
	
<?php echo form_close();?>
<div id="mensaje" class="mensaje" title="Aviso">
    <p>Ok.</p>
</div>
<div id="mensaje1" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para realizar esta acci&oacute;n.-</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe completar los datos de la actividad para continuar.-</p>
</div>
<div id="mensaje3" class="mensaje" title="Aviso">
    <p>No ha ingresado ninguna actividad.</p>
</div>
<div id="mensaje4" class="mensaje" title="Aviso">
    <p>Debe completar los datos de la persona para continuar.-</p>
</div>
<div id="mensaje5" class="mensaje" title="Aviso">
    <p>La cantidad de mujeres no es valida.-</p>
</div>
<div id="mensaje6" class="mensaje" title="Aviso">
    <p>La cantidad de hombres no es valida.-</p>
</div>
<div id="mensaje7" class="mensaje" title="Aviso">
    <p>Especifique el Monto del Subproyecto a seguimiento.</p>
</div>
