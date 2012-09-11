<?php
$con_nombre = array(
	'name'	=> 'con_nombre',
	'id'	=> 'con_nombre',
	'value'	=> set_value('con_nombre'),
	'maxlength'	=> 75,
	'size'	=> 35,
);
$con_apellido = array(
	'name'	=> 'con_apellido',
	'id'	=> 'con_apellido',
	'value'	=> set_value('con_apellido'),
        'maxlength'	=> 75,
	'size'	=> 35,
);
$con_telefono = array(
	'name'	=> 'con_telefono',
	'id'	=> 'con_telefono',
	'value'	=> set_value('con_telefono'),
	'size'	=> 15,
        'maxlength'=> 9,
);
$con_email = array(
	'name'	=> 'con_email',
	'id'	=> 'con_email',
	'value'	=> set_value('con_email'),
	'size'	=> 35,
        'maxlength'=> 100,
);
?>
<script type="text/javascript">        
    $(document).ready(function(){  
        $('#ingresar').button();
        $("#regresar").button().click(function() {
            document.location.href='<?php echo base_url('consultor/consultoraC/consultores'); ?>';
        });
        
         /*CARGAR DEPARTAMENTOS*/
        $('#selRegion').change(function(){   
            $('#selDepto').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarDepartamentos') ?>?reg_id='+$('#selRegion').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#selDepto').append('<option value="0">--Seleccione Departamento--</option>');
                        $.each(val, function(id, registro){
                            $('#selDepto').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        /*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){   
            $('#selMun').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id='+$('#selDepto').val(), 
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
        /*CARGAR PROYECTOS PEP*/
        $('#selMun').change(function(){
            $('#proPep').setGridParam({
                url:'<?php echo base_url('componente2/proyectoPep/cargarProyectosPorMunicipio') ?>?mun_id='+$('#selMun').val(),
                editurl:'<?php echo base_url('componente2/proyectoPep/gestionProyectoPep') ?>?mun_id='+$('select.#selMun').val(),
                datatype:'json'
            }).trigger("reloadGrid"); 
        });
        var tabla=$("#proPep");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/proyectoPep/cargarProyectosPorMunicipio') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['pro_pep_id','Nombre Proyecto','Etapa I','Etapa II','Etapa III','Etapa IV'],
            colModel:[
                {name:'id',index:'id', editable:false,editoptions:{size:15} },
                {name:'pro_pep_nombre',index:'pro_pep_nombre',editable:true,
                    edittype:"textarea",editoptions:{rows:"4",cols:"50"},width:'450', 
                    formoptions:{label: "Nombre",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'etapa1',index:'etapa1',editable:false,
                    edittype:"checkbox",width:60,
                    editoptions: { value:"SI:NO" }
                },
                {name:'etapa2',index:'etapa2',editable:false,
                    edittype:"checkbox",width:60,
                    editoptions: { value:"SI:NO"}
                },
                {name:'etapa3',index:'etapa3',editable:false,
                    edittype:"checkbox",width:60,
                    editoptions: { value:"SI:NO"}
                },
                {name:'etapa4',index:'etapa4',editable:false,
                    edittype:"checkbox",width:60,
                    editoptions: { value:"SI:NO"}
                }
            ],
            multiselect: false,
            caption: "Proyectos PEP",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pager'),
            viewrecords: true     
        }).jqGrid('navGrid','#pager',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}
            ).trigger('reloadGrid');}
        }
    ).hideCol(['id']);
});
</script>
    <h2 class="demoHeaders" align="Center">Registrar Consultor</h2>
    <center>
    <?php echo form_open(base_url('consultor/consultoraC/registrarConsultora')); ?>
    
    <table align="center" style=" border-color: #2F589F; border-style: solid" >
        <tr>
                <td colspan="5"></br></td>
        </tr>
	
        <tr>
                <td width="50px"></td>
		<td class="letraazul">Nombres del Consultor</td>
		<td><?php echo form_input($con_nombre); ?></td>
		<td class="error"><?php echo form_error('con_nombre'); ?></td>
                <td width="50px"></td>
	</tr>
        <tr>
                <td width="50px"></td>
		<td class="letraazul">Apellidos del Consultor</td>
		<td><?php echo form_input($con_apellido); ?></td>
		<td class="error"><?php echo form_error('con_apellido'); ?></td>
                <td width="50px"></td>
	</tr>
        <tr>
                <td width="50px"></td>
		<td class="letraazul">Teléfono Personal</td>
		<td><?php echo form_input($con_telefono); ?></td>
		<td class="error"><?php echo form_error('con_telefono'); ?></td>
                <td width="50px"></td>
	</tr>
        <tr>
                <td width="50px"></td>
		<td class="letraazul">Correo Electrónico</td>
		<td><?php echo form_input($con_email); ?></td>
		<td class="error"><?php echo form_error('con_email'); ?></td>
                <td width="50px"></td>
	</tr>
        <tr>
                <td width="50px"></td>
		<td class="letraazul"></td>
		<td><?php echo form_input($con_email); ?></td>
		<td class="error"><?php echo form_error('con_email'); ?></td>
                <td width="50px"></td>
	</tr>
        
        <tr>
                <td colspan="5" align="center"></br>
                    <input type="submit" value="Ingresar" id="ingresar" />
                    <input type="button" value="Regresar" id="regresar" />
                </td>
        </tr>
    </table>
    
    </center>
</form>
