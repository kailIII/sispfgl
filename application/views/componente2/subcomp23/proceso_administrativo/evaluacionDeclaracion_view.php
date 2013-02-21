<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        /*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){  
            $('#Mensajito').hide();
            $("#AdquisicionyContratacionForm").hide();
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
        
        /*PARA EL DATEPICKER*/
        
        
        /*FIN DEL DATEPICKER*/
        
        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            fInicio= $('#pro_finicio').datepicker("getDate");
            fFin=$( "#pro_ffinalizacion" ).datepicker("getDate");
            if(fInicio==null){
                $("#pro_ffinalizacion" ).val('');
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('componente2/procesoAdministrativo/guardarProceso') . "/2" ?>',
                    data: $("#AdquisicionyContratacionForm").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $('#efectivo').dialog('open');
                    }
                });
                return false;
            }else{
                if(fFin==null){
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('componente2/procesoAdministrativo/guardarProceso') . "/2" ?>',
                        data: $("#AdquisicionyContratacionForm").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $('#efectivo').dialog('open');
                        }
                    });
                    return false;
                }else{
                    if(fInicio< fFin){
                        $.ajax({
                            type: "POST",
                            url: '<?php echo base_url('componente2/procesoAdministrativo/guardarProceso') . "/2" ?>',
                            data: $("#AdquisicionyContratacionForm").serialize(), // serializes the form's elements.
                            success: function(data)
                            {
                                $('#efectivo').dialog('open');
                            }
                        });
                        return false;
                    }else{
                        $('#fechaValidacion').dialog('open');
                        return false;
                    }
                }
            }  
        });
       
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/procesoAdministrativo/evaluacionExpresionInteres'); ?>';
        });
        $( "#pro_finicio" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        
        $("#pro_ffinalizacion").datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        
        $('#selMun').change(function(){
            $('#AdquisicionyContratacionForm')[0].reset();
            $("#AdquisicionyContratacionForm").hide();
            $('#consultoresInteres').setGridParam({
                url:'<?php echo base_url('componente2/procesoAdministrativo/cargarConsultoraInteres2') . '/0' ?>',                datatype:'json'
            }).trigger('reloadGrid');
            $.getJSON('<?php echo base_url('componente2/procesoAdministrativo/cargarEvaluacionDeclaracion') . "/" ?>'+$('#selMun').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=="records"){
                        if(val=="0"){
                            $('#Mensajito').show();
                            $('#Mensajito').val("Este proyecto no esta registrado");
                        }
                    }
                    if(key=='rows'){
                        $.each(val, function(id, registro){
                            if(registro['cell'][4]!=null){
                                $('#Mensajito').hide();
                                $( "#pro_finicio" ).datepicker( "option", "minDate", registro['cell'][4] ); 
                                $( "#pro_ffinalizacion" ).datepicker( "option", "minDate", registro['cell'][4] ); 
                                $('#consultoresInteres').setGridParam({
                                    url:'<?php echo base_url('componente2/procesoAdministrativo/cargarConsultoraInteres2') . '/' ?>'+registro['cell'][0],
                                    editurl:'<?php echo base_url('componente2/procesoAdministrativo/gestionarConsultoresInteres') . '/'; ?>'+registro['cell'][0],
                                    datatype:'json'
                                }).trigger('reloadGrid');
                                $('#pro_id').val(registro['cell'][0]);
                                $('#pro_numero').val(registro['cell'][1]);
                                $('#pro_finicio').val(registro['cell'][2]);
                                $('#pro_ffinalizacion').val(registro['cell'][3]);
                                $("#AdquisicionyContratacionForm").show();
                            }else{
                                $('#Mensajito').show();
                                $('#Mensajito').val("Debe de registrar primero las fechas de la etapa: Proceso de Adquisición y Contrataciones");
                            }
                        });                    
                    }
                });
            });              
        });
        $("#AdquisicionyContratacionForm").hide();
        /*DIALOGOS DE VALIDACION*/
       
        $('.mensaje').dialog({
            autoOpen: false,
            width: 300,
            buttons: {
                "Ok": function() {
                    $(this).dialog("close");
                }
            }
        });
        /*FIN ZONA VALIDACIONES*/
     
        /*VARIABLES*/
        var tabla=$("#consultoresInteres");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/procesoAdministrativo/cargarConsultoraInteres2') . '/0'; ?>',
            editurl:'<?php echo base_url('componente2/procesoAdministrativo/gestionarConsultoresInteres') . '/0'; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Tipo','Aplica',''],
            colModel:[
                {name:'con_int_id',index:'con_int_id', width:40,editable:false,editoptions:{size:15} },
                {name:'con_int_nombre',index:'con_int_nombre',width:650,editable:false
                },
                {name:'con_int_tipo',index:'con_int_tipo',editable:false,width:60
                },
                {name:'con_int_aplica',index:'con_int_aplica',width:60,align:'center',editable:true,edittype:"checkbox",editoptions:{value:"Si:No"}},
                {name:'actions',formatter:"actions",editable:false,fixed:true,width:60,
                    formatoptions:{"keys":true,delbutton: false}
                }
            ],
            multiselect: false,
            caption: "Consultoras que han manifestado interés",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerConsultoresInteres'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerConsultoresInteres',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('con_int_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        
                
    });
</script>

<center>
    <h2 class="h2Titulos">Evaluación de expresión de interés</h2>
    <h2 class="h2Titulos">Proceso de evaluación</h2>
    <br/>
    <table>
        <tr>
        <td><strong>Departamento</strong></td>
        <td><select id='selDepto'>
                <option value='0'>--Seleccione--</option>
                <?php foreach ($departamentos as $depto) { ?>
                    <option value='<?php echo $depto->dep_id; ?>'><?php echo $depto->dep_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
        <td><strong>Municipio</strong></td>
        <td><select id='selMun' name='selMun'>
                <option value='0'>--Seleccione--</option>
            </select>
        </td>
        </tr>
    </table>
</center>
<br/><br/>
<input class="error" value="" id="Mensajito" type="text" size="100" readonly="readonly" style="border: none;"/>
<form id="AdquisicionyContratacionForm" method="post">
    <br/>        <br/>
    <table class="procesoAdmin">
        <tr>
        <td class="textD"><strong>No. Proceso: </strong></td>
        <td> <input value="" id="pro_numero" name="pro_numero" type="text" size="10" readonly="readonly" style="border: none; background: white;"/></td>
        </tr>
        <tr>
        <td class="textD"><strong>Fecha de inicio: </strong></td> 
        <td><input value="" id="pro_finicio" name="pro_finicio" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td class="textD"> <strong>Fecha de finalización: </strong></td>
        <td><input value="" id="pro_ffinalizacion" name="pro_ffinalizacion" type="text" size="10" readonly="readonly"/></td>
        </tr>
    </table>
    <br/><br/>
    <center>
        <table id="consultoresInteres"></table>
        <div id="pagerConsultoresInteres"></div>
        <br/>
    </center>

    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Guardar Evaluación" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
    <input id="pro_id" name="pro_id" value="" style="visibility: hidden"/>
</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>
<div id="fechaValidacion" class="mensaje" title="Error en fechas">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/cancel.png'); ?>" class="imagenError" />Las fechas deben de ir en orden ascendente</p>
    </center>
</div>