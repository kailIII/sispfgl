<script type="text/javascript">        
    $(document).ready(function(){
        /*PARA EL DATEPICKER*/
        $( "#pro_fenvio_informacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        
        /*FIN DEL DATEPICKER*/
        
        /*PARA EL DATEPICKER*/
        $( "#pro_flimite_recepcion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $("#guardar").button().click(function() {
            fEnvio= $('#pro_fenvio_informacion').datepicker("getDate");
            fRecepcion=$( "#pro_flimite_recepcion" ).datepicker("getDate");
            if(fEnvio==null){
                $("#pro_flimite_recepcion" ).val('');
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('componente2/procesoAdministrativo/guardarProceso') . "/3" ?>',
                    data: $("#SeleccionConsultoraForm").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $('#efectivo').dialog('open');
                    }
                });
                return false;
            }else{
                if(fRecepcion==null){
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('componente2/procesoAdministrativo/guardarProceso') . "/3" ?>',
                        data: $("#SeleccionConsultoraForm").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $('#efectivo').dialog('open');
                        }
                    });
                    return false;
                }else{
                    if(fEnvio< fRecepcion){
                        $.ajax({
                            type: "POST",
                            url: '<?php echo base_url('componente2/procesoAdministrativo/guardarProceso') . "/3" ?>',
                            data: $("#SeleccionConsultoraForm").serialize(), // serializes the form's elements.
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
            document.location.href='<?php echo base_url(); ?>';
        });
        
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
        
        /*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){   
            $('#Mensajito').hide();
            $("#SeleccionConsultoraForm").hide();
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
        
        $('#selGrupo').change(function(){
            $("#SeleccionConsultoraForm").hide();
            $('#consultoresInteres').setGridParam({
                url:'<?php echo base_url('componente2/procesoAdministrativo/cargarConsultoraInteres3') . '/0' ?>',
                datatype:'json'
            }).trigger('reloadGrid');
            $('#SeleccionConsultoraForm')[0].reset();
            $("#SeleccionConsultoraForm").hide();
            $("#grup_id_pep").val($('#selGrupo').val());
            $.getJSON('<?php echo base_url('componente2/procesoAdministrativo/cargarSeleccionConsultora') . "/" ?>'+$('#selGrupo').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=="records"){
                        if(val=="0"){
                            $('#Mensajito').show();
                            $('#Mensajito').val("Este proyecto no esta registrado para el grupo seleccionado");
                        }
                    }
                    if(key=='rows'){
                        $.each(val, function(id, registro){
                            if(registro['cell'][4]!=null){
                                $('#Mensajito').hide();
                                $( "#pro_fenvio_informacion" ).datepicker( "option", "minDate", registro['cell'][4] ); 
                                $( "#pro_flimite_recepcion" ).datepicker( "option", "minDate", registro['cell'][4] ); 
                                $('#consultoresInteres').setGridParam({
                                    url:'<?php echo base_url('componente2/procesoAdministrativo/cargarConsultoraInteres3') . '/' ?>'+registro['cell'][0],
                                    editurl:'<?php echo base_url('componente2/procesoAdministrativo/gestionarConsultoresInteres') . '/'; ?>'+registro['cell'][0],
                                    datatype:'json'
                                }).trigger('reloadGrid');
                                $('#pro_id').val(registro['cell'][0]);
                                $('#pro_numero').val(registro['cell'][1]);
                                $('#pro_fenvio_informacion').val(registro['cell'][2]);
                                $('#pro_flimite_recepcion').val(registro['cell'][3]);
                                $("#SeleccionConsultoraForm").show();
                            }else{
                                $('#Mensajito').show();
                                $('#Mensajito').val("Debe de registrar primero las fechas de la etapa: Expresión de Interés");
                            }
                        });                    
                    }
                });
            });              
        });
        
        var tabla=$("#consultoresInteres");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/procesoAdministrativo/cargarConsultoraInteres3') . '/0'; ?>',
            editurl:'<?php echo base_url('componente2/procesoAdministrativo/gestionarConsultoresInteres') . '/0'; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Tipo','Seleccionada',''],
            colModel:[
                {name:'con_int_id',index:'con_int_id', width:40,editable:false,editoptions:{size:15} },
                {name:'con_int_nombre',index:'con_int_nombre',width:650,editable:false,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombre:",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'con_int_tipo',index:'con_int_tipo',editable:false,edittype:"select",width:60,
                    editoptions:{ value: '0:Seleccione;Empresa:Empresa;ONG:ONG' }, 
                    formoptions:{ label: "Tipo:",elmprefix:"(*)"}
                },
                {name:'con_int_seleccionada',index:'con_int_seleccionada',width:80,align:'center',editable:true,edittype:"checkbox",editoptions:{value:"Si:No"}},
                {name:'actions',formatter:"actions",editable:false,fixed:true,width:60,
                    formatoptions:{"keys":true,delbutton: false}
                }
            ],
            multiselect: false,
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
             
        $("#SeleccionConsultoraForm").hide();
    });
</script>
<center>
    <h2 class="h2Titulos">Selección de consultoras</h2>
    <br/>
    <table>
<!--        <tr>
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
        <tr>
        <td colspan="2">Seleccione el grupo para agregarle las consultoras</td>
        </tr>        </tr>-->

        <tr>
        <td><strong>Grupo</strong></td>
        <td><select name='selGrupo' id="selGrupo">
                <option value='0'>--Seleccione--</option>
                <?php foreach ($grupos as $grupo) { ?>
                    <option value='<?php echo $grupo->gru_id; ?>'><?php echo $grupo->gru_numero; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
    </table>
</center>
<br/><br/>
<input value="" class="error" id="Mensajito" type="text" size="100" readonly="readonly" style="border: none;"/>
<form id="SeleccionConsultoraForm" method="post">
    <table class="procesoAdmin">
        <tr>
        <td class="textD"><strong>No. Proceso: </strong></td>
        <td><input value="" id="pro_numero" name="pro_numero" type="text" size="10" readonly="readonly" style="border: none; background: white;"/></td>
        </tr>
        <tr>
        <td class="textD"><strong>Fecha de envio de la información: </strong></td> 
        <td><input value="" id="pro_fenvio_informacion" name="pro_fenvio_informacion" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td class="textD"> <strong>Fecha límite de recepción de la información: </strong></td>
        <td><input value="" id="pro_flimite_recepcion" name="pro_flimite_recepcion" type="text" size="10" readonly="readonly"/></td>
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
            <p><input type="submit" id="guardar" value="Guardar Selección" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
    <input id="pro_id" name="pro_id" value="" style="visibility: hidden"/>
    <input id="grup_id_pep" name="grup_id_pep" style="visibility: hidden"/>
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