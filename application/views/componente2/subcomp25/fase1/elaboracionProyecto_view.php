<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            /* fecha1= $('#ela_pro_fentrega_idem').datepicker("getDate");
            fecha2=$( "#ela_pro_fentrega_uep" ).datepicker("getDate");
            fecha3=$( "#ela_pro_fconformacion" ).datepicker("getDate");
            if(fecha1==null){
                $( "#ela_pro_fentrega_uep" ).val('');
                $( "#ela_pro_fconformacion" ).val('');*/
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('componente2/comp25/guardarElaboracionProyecto') ?>',
                data: $("#elaboracionProyectoForm").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $('#efectivo').dialog('open');
                }
            });
            return false;
            /* }else{
                if(fecha2==null){
                    $("#ela_pro_fconformacion" ).val('');
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('componente2/comp25/guardarElaboracionProyecto') ?>',
                        data: $("#elaboracionProyectoForm").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $('#efectivo').dialog('open');
                        }
                    });
                    return false;
                }else{
                    if(fecha1< fecha2){
                        if(fecha3==null){
                            $.ajax({
                                type: "POST",
                                url: '<?php echo base_url('componente2/comp25/guardarElaboracionProyecto') ?>',
                                data: $("#elaboracionProyectoForm").serialize(), // serializes the form's elements.
                                success: function(data)
                                {
                                    $('#efectivo').dialog('open');
                                }
                            });
                            return false;
                        }else{
                            if(fecha2 < fecha3){
                                $.ajax({
                                    type: "POST",
                                    url: '<?php echo base_url('componente2/comp25/guardarElaboracionProyecto') ?>',
                                    data: $("#elaboracionProyectoForm").serialize(), // serializes the form's elements.
                                    success: function(data)
                                    {
                                        $('#efectivo').dialog('open');
                                    }
                                });
                                return false;
                            }else{
                                $('#fechaValidacion').dialog('open');
                                return false
                            }
                        }
                    }else{
                        $('#fechaValidacion').dialog('open');
                        return false
                    }
                }
            }  */
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        $("#elaboracionProyectoForm").hide();
        /*CARGAR MUNICIPIOS*/
        $('#dep_id').change(function(){ 
            $("#elaboracionProyectoForm").hide();
            $('#mun_id').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id='+$('#dep_id').val(), 
            function(data) {
                var i=0;
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
        
        $('#mun_id').change(function(){
            $('#elaboracionProyectoForm')[0].reset();
            $.getJSON('<?php echo base_url('componente2/comp25/cargarElaboracionProyecto') . "/" ?>'+$('#mun_id').val(), 
            function(data) {
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $.each(val, function(id, registro){
                            $('#ela_pro_id').val(registro['cell'][0]);
                            if(registro['cell'][1]!=null){
                                if(registro['cell'][1]=="t")
                                    $('input:radio[name=ela_pro_carta_exp]')[0].checked = true; 
                                else
                                    $('input:radio[name=ela_pro_carta_exp]')[1].checked = true; 
                            }
                            $('#ela_pro_fentrega_idem').val(registro['cell'][2]);
                            $('#ela_pro_fentrega_uep').val(registro['cell'][3]);
                            if(registro['cell'][4]!=null){
                                if(registro['cell'][4]=="t")
                                    $('input:radio[name=ela_pro_carta_confirmacion]')[0].checked = true; 
                                else
                                    $('input:radio[name=ela_pro_carta_confirmacion]')[1].checked = true; 
                            }
                            $('#ela_pro_fconformacion').val(registro['cell'][5]);
                            $('#ela_pro_fecha2').val(registro['cell'][6]);
                            $('#recibidoMunicipalidad').setGridParam({
                                url:'<?php echo base_url('componente2/comp25/recibidoMunicipalidad') ?>/'+registro['cell'][0],
                                editurl:'<?php echo base_url('componente2/comp25/guardarRecibidoMunicipalidad') ?>/'+registro['cell'][0],
                                datatype:'json'
                            }).trigger('reloadGrid');
                            $('#equipoTecnico').setGridParam({
                                url:'<?php echo base_url('componente2/comp25/cargarParticipantesET') ?>/ela_pro_id/'+registro['cell'][0],
                                editurl:'<?php echo base_url('componente2/comp23_E1/gestionParticipantes') ?>/elaboracion_proyecto/ela_pro_id/'+registro['cell'][0],
                                datatype:'json'
                            }).trigger('reloadGrid');
                            $("#elaboracionProyectoForm").show();
                        });                    
                    }
                });
            });              
           
        });
        /*ZONA DATEPICKER*/
        $( "#ela_pro_fentrega_idem" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        
        $( "#ela_pro_fentrega_uep" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#ela_pro_fconformacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        /*ZONA GRID*/
        var tabla=$("#recibidoMunicipalidad");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp25/cargarParticipantesET') ?>/ela_pro_id/'+0,
            editurl:'<?php echo base_url('componente2/comp23_E1/gestionParticipantes') ?>/elaboracion_proyecto/ela_pro_id/'+0,
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Correlativo','Fecha de recibido municipalidad','Observaciones'],
            colModel:[
                {name:'rec_mun_id',index:'rec_mun_id', width:40,editable:false,editoptions:{size:15} },
                {name:'rec_mun_correlativo',index:'rec_mun_correlativo', width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Correlativo",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'rec_mun_frecibido',index:'rec_mun_frecibido',width:200,editable:true,
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
                    formoptions:{label: "Fecha de recibido municipalidad",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'rec_mun_observacion',index:'rec_mun_observacion',
                    editable:true,width:400,edittype:"textarea",
                    editoptions:{rows:"4",cols:"50"},
                    formoptions:{label: "Observaciones"}
                }
            ],
            multiselect: false,
            //caption: "Fuentes de Información Primarias",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerRecibidoMunicipalidad'),
            viewrecords: true     
        }).jqGrid('navGrid','#pagerRecibidoMunicipalidad',
        {edit:true,add:true,del:true,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        },//OPCIONES
        {closeAfterEdit:true,editCaption: "Editando de Fecha de recibido ",width:700,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }    
        },//EDITAR
        {closeAfterAdd:true,addCaption: "Agregar Fecha de recibido",width:700,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        },//AGREGAR
        {msg: "¿Desea Eliminar a esta fecha de recibido?",caption:"Eliminando....",
            align:'center',reloadAfterSubmit:true,processData: "Cargando...",width:300,
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');                            
            }
        }//ELIMINAR
    ).hideCol('rec_mun_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        
        var tabla2=$("#equipoTecnico");
        tabla2.jqGrid({
            url:'<?php echo base_url('componente2/comp25/cargarParticipantesET') ?>/ela_pro_id/'+$('#ela_pro_id').val(),
            editurl:'<?php echo base_url('componente2/comp23_E1/gestionParticipantes') ?>/elaboracion_proyecto/ela_pro_id/'+$('#ela_pro_id').val(),
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Apellido','Cargo'],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_nombre',index:'par_nombre',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_apellido',index:'par_apellido',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Apellidos",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_cargo',index:'par_cargo',width:250,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
            ],
            multiselect: false,
            caption: "Equipo Técnico municipal o referente",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerEquipoTecnico'),
            viewrecords: true     
        }).jqGrid('navGrid','#pagerEquipoTecnico',
        {edit:true,add:true,del:true,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        },//OPCIONES
        {closeAfterEdit:true,editCaption: "Editando participante",width:350,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar2,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }   
        },//EDITAR
        {closeAfterAdd:true,addCaption: "Agregar participante",width:350,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar2,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        },//AGREGAR
        {msg: "¿Desea Eliminar este participante?",caption:"Eliminando ",
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');                            
            }
        }//ELIMINAR
    ).hideCol('par_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar2() {
            tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        
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
                
    });
</script>
<center>
    <h2 class="h2Titulos">2.1. Elaboración de proyecto</h2>
    <h2 class="h2Titulos">2.1.1. Entrada</h2>
    <br/>
    <table>
        <tr>
        <td><strong>Departamento</strong></td>
        <td><select id='dep_id'>
                <option value='0'>--Seleccione--</option>
                <?php foreach ($departamentos as $depto) { ?>
                    <option value='<?php echo $depto->dep_id; ?>'><?php echo $depto->dep_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
        <td><strong>Municipio</strong></td>
        <td><select id='mun_id' name='mun_id'>
                <option value='0'>--Seleccione--</option>
            </select>
        </td>
        </tr>
    </table>
</center>
<form id="elaboracionProyectoForm" method="post">
    <p><strong>Municipalidad entrega a UEP la CARTA DE EXPRESIÓN DE INTERÉS EN EJECUTAR 
            EL COMPONENTE 2.5 </strong>
        <input type="radio" name="ela_pro_carta_exp" value="true" > SI </input>
        <input type="radio" name="ela_pro_carta_exp" value="false"> NO </input>
    </p>
    <p>
        <strong>Fecha en que municipalidad entrega a ISDEM: </strong>
        <input id="ela_pro_fentrega_idem" name="ela_pro_fentrega_idem" type="text" size="10" readonly="readonly"/>  
    </p>
    <p>
        <strong>Fecha en que ISDEM entrega a UEP: </strong>
        <input id="ela_pro_fentrega_uep" name="ela_pro_fentrega_uep" type="text" size="10" readonly="readonly"/>  
    </p>
    <p><strong>UEP entrega a municipalidad CARTA DE CONFIRMACIÓN DE EXPRESIÓN DE INTERÉS</strong>
        <input type="radio" name="ela_pro_carta_confirmacion" value="true" > SI </input>
        <input type="radio" name="ela_pro_carta_confirmacion" value="false"> NO APLICA</input>
    </p>
    <center>
        <table id="recibidoMunicipalidad"></table>
        <div id="pagerRecibidoMunicipalidad"></div>
    </center>

    <p>
        <strong>Fecha de conformación según acuerdo municipal: </strong>
        <input id="ela_pro_fconformacion" name="ela_pro_fconformacion" type="text" size="10" readonly="readonly"/>  
    </p>
    <center>
        <table id="equipoTecnico"></table>
        <div id="pagerEquipoTecnico"></div>
    </center>
    <p><strong>Observaciones:</strong><br/><textarea id="ela_pro_observacion" name="ela_pro_observacion" cols="48" rows="5"></textarea></p>
    <?php //if (strcmp($rol, 'gdrc') == 0) {?>
    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Guardar" />
            </p>
        </div>
    </center>
    <?php //} ?>
    <input id="ela_pro_id" name="ela_pro_id" value="" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
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