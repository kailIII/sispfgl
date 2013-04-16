<script type="text/javascript">
    $(document).ready(function() {
        var tabla2 = $("#equipoTecnico");
        tabla2.jqGrid({
            url: '<?php echo base_url('componente2/comp25/cargarParticipantesSeg') ?>/seg_id/' + 0,
            editurl: '<?php echo base_url('componente2/comp23_E1/gestionParticipantes') ?>/seguimiento/seg_id/' + 0,
            datatype: 'json',
            altRows: true,
            height: "100%",
            hidegrid: false,
            colNames: ['id', 'Nombre', 'Apellido', 'Institución', 'Cargo'],
            colModel: [
                {name: 'par_id', index: 'par_id', width: 40, editable: false, editoptions: {size: 15}},
                {name: 'par_nombre', index: 'par_nombre', width: 200, editable: true,
                    editoptions: {size: 25, maxlength: 50},
                    formoptions: {label: "Nombres", elmprefix: "(*)"},
                    editrules: {required: true}
                },
                {name: 'par_apellido', index: 'par_apellido', width: 200, editable: true,
                    editoptions: {size: 25, maxlength: 50},
                    formoptions: {label: "Apellidos", elmprefix: "(*)"},
                    editrules: {required: true}
                },
                {name: 'par_institucion', index: 'par_institucion', editable: true,
                    edittype: "select", width: 250,
                    editoptions: {dataUrl: '<?php echo base_url('componente2/comp23_E1/cargarInstituciones'); ?>'},
                    formoptions: {label: "Institución:", elmprefix: "(*)"},
                    editrules: {custom: true, custom_func: validaInstitucion}
                },
                {name: 'par_cargo', index: 'par_cargo', width: 250, editable: true,
                    editoptions: {size: 25, maxlength: 30},
                    formoptions: {label: "Cargo", elmprefix: "(*)"},
                    editrules: {required: true}
                },
            ],
            multiselect: false,
            //   caption: "Equipo Técnico municipal o referente",
            rowNum: 10,
            rowList: [10, 20, 30],
            loadonce: true,
            pager: jQuery('#pagerEquipoTecnico'),
            viewrecords: true
        }).jqGrid('navGrid', '#pagerEquipoTecnico',
                {edit: true, add: true, del: true, search: false, refresh: false,
                    beforeRefresh: function() {
                        tabla.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
                    }
                }, //OPCIONES
        {closeAfterEdit: true, editCaption: "Editando participante", width: 350,
            align: 'center', reloadAfterSubmit: true,
            processData: "Cargando...", afterSubmit: despuesAgregarEditar2,
            bottominfo: "Campos marcados con (*) son obligatorios",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        }, //EDITAR
        {closeAfterAdd: true, addCaption: "Agregar participante", width: 350,
            align: 'center', reloadAfterSubmit: true,
            processData: "Cargando...", afterSubmit: despuesAgregarEditar2,
            bottominfo: "Campos marcados con (*) son obligatorios",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        }, //AGREGAR
        {msg: "¿Desea Eliminar este participante?", caption: "Eliminando ",
            align: 'center', reloadAfterSubmit: true,
            processData: "Cargando...",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        }//ELIMINAR
        ).hideCol('par_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar2() {
            tabla2.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
            return[true, '']; //no error
        }
        function validaInstitucion(value, colname) {
            if (value == 0)
                return [false, "Seleccione la institucion del Participante"];
            else
                return [true, ""];
        }

        $("#guardar").button().click(function() {
            fecha1 = $('#seg_forden_preparacion').datepicker("getDate");
            fecha2 = $("#seg_facta_recepcion").datepicker("getDate");
            fecha3 = $("#seg_forden_diagnostico").datepicker("getDate");
            fecha4 = $('#seg_fsocializacion').datepicker("getDate");
            fecha5 = $("#seg_facta_aprobacion_d").datepicker("getDate");
            fecha6 = $("#seg_forden_planificacion").datepicker("getDate");
            fecha7 = $('#seg_facta_aprobacion_p').datepicker("getDate");
            fecha8 = $('#seg_facuerdo_municipal').datepicker("getDate");
            fecha9 = $('#seg_fpresentacion_publica').datepicker("getDate");
            fecha10 = $('#seg_forden_seguimiento').datepicker("getDate");
            if (fecha1 == null) {
                $("#seg_facta_recepcion").val('');
                $("#seg_forden_diagnostico").val('');
                $('#seg_fsocializacion').val('');
                $("#seg_facta_aprobacion_d").val('');
                $("#seg_forden_planificacion").val('');
                $('#seg_facta_aprobacion_p').val('');
                $('#seg_facuerdo_municipal').val('');
                $('#seg_fpresentacion_publica').val('');
                $('#seg_forden_seguimiento').val('');
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('componente2/comp25_seguimiento/guardarSeguimiento') ?>',
                    data: $("#seguimientoForm").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $('#efectivo').dialog('open');
                    }
                });
                return true;
            } else {
                if (fecha2 == null) {
                    $("#seg_forden_diagnostico").val('');
                    $('#seg_fsocializacion').val('');
                    $("#seg_facta_aprobacion_d").val('');
                    $("#seg_forden_planificacion").val('');
                    $('#seg_facta_aprobacion_p').val('');
                    $('#seg_facuerdo_municipal').val('');
                    $('#seg_fpresentacion_publica').val('');
                    $('#seg_forden_seguimiento').val('');
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('componente2/comp25_seguimiento/guardarSeguimiento') ?>',
                        data: $("#seguimientoForm").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $('#efectivo').dialog('open');
                        }
                    });
                    return false;
                } else {
                    if (fecha1 < fecha2) {
                        if (fecha3 == null) {
                            $('#seg_fsocializacion').val('');
                            $("#seg_facta_aprobacion_d").val('');
                            $("#seg_forden_planificacion").val('');
                            $('#seg_facta_aprobacion_p').val('');
                            $('#seg_facuerdo_municipal').val('');
                            $('#seg_fpresentacion_publica').val('');
                            $('#seg_forden_seguimiento').val('');
                            $.ajax({
                                type: "POST",
                                url: '<?php echo base_url('componente2/comp25_seguimiento/guardarSeguimiento') ?>',
                                data: $("#seguimientoForm").serialize(), // serializes the form's elements.
                                success: function(data)
                                {
                                    $('#efectivo').dialog('open');
                                }
                            });
                            return false;
                        } else {
                            if (fecha2 < fecha3) {
                                if (fecha4 == null) {
                                    $("#seg_facta_aprobacion_d").val('');
                                    $("#seg_forden_planificacion").val('');
                                    $('#seg_facta_aprobacion_p').val('');
                                    $('#seg_facuerdo_municipal').val('');
                                    $('#seg_fpresentacion_publica').val('');
                                    $('#seg_forden_seguimiento').val('');
                                    $.ajax({
                                        type: "POST",
                                        url: '<?php echo base_url('componente2/comp25_seguimiento/guardarSeguimiento') ?>',
                                        data: $("#seguimientoForm").serialize(), // serializes the form's elements.
                                        success: function(data)
                                        {
                                            $('#efectivo').dialog('open');
                                        }
                                    });
                                    return false;
                                } else {
                                    if (fecha3 < fecha4) {
                                        if (fecha5 == null) {
                                            $("#seg_forden_planificacion").val('');
                                            $('#seg_facta_aprobacion_p').val('');
                                            $('#seg_facuerdo_municipal').val('');
                                            $('#seg_fpresentacion_publica').val('');
                                            $('#seg_forden_seguimiento').val('');
                                            $.ajax({
                                                type: "POST",
                                                url: '<?php echo base_url('componente2/comp25_seguimiento/guardarSeguimiento') ?>',
                                                data: $("#seguimientoForm").serialize(), // serializes the form's elements.
                                                success: function(data)
                                                {
                                                    $('#efectivo').dialog('open');
                                                }
                                            });
                                            return false;
                                        } else {
                                            if (fecha4 < fecha5) {
                                                if (fecha6 == null) {
                                                    $('#seg_facta_aprobacion_p').val('');
                                                    $('#seg_facuerdo_municipal').val('');
                                                    $('#seg_fpresentacion_publica').val('');
                                                    $('#seg_forden_seguimiento').val('');
                                                    $.ajax({
                                                        type: "POST",
                                                        url: '<?php echo base_url('componente2/comp25_seguimiento/guardarSeguimiento') ?>',
                                                        data: $("#seguimientoForm").serialize(), // serializes the form's elements.
                                                        success: function(data)
                                                        {
                                                            $('#efectivo').dialog('open');
                                                        }
                                                    });
                                                    return false;
                                                } else {
                                                    if (fecha5 < fecha6) {
                                                        if (fecha7 == null) {
                                                            $('#seg_facuerdo_municipal').val('');
                                                            $('#seg_fpresentacion_publica').val('');
                                                            $('#seg_forden_seguimiento').val('');
                                                            $.ajax({
                                                                type: "POST",
                                                                url: '<?php echo base_url('componente2/comp25_seguimiento/guardarSeguimiento') ?>',
                                                                data: $("#seguimientoForm").serialize(), // serializes the form's elements.
                                                                success: function(data)
                                                                {
                                                                    $('#efectivo').dialog('open');
                                                                }
                                                            });
                                                            return false;
                                                        } else {
                                                            if (fecha6 < fecha7) {
                                                                if (fecha8 == null) {
                                                                    $('#seg_fpresentacion_publica').val('');
                                                                    $('#seg_forden_seguimiento').val('');
                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: '<?php echo base_url('componente2/comp25_seguimiento/guardarSeguimiento') ?>',
                                                                        data: $("#seguimientoForm").serialize(), // serializes the form's elements.
                                                                        success: function(data)
                                                                        {
                                                                            $('#efectivo').dialog('open');
                                                                        }
                                                                    });
                                                                    return false;
                                                                } else {
                                                                    if (fecha7 < fecha8) {
                                                                        if (fecha9 == null) {
                                                                            $('#seg_forden_seguimiento').val('');
                                                                            $.ajax({
                                                                                type: "POST",
                                                                                url: '<?php echo base_url('componente2/comp25_seguimiento/guardarSeguimiento') ?>',
                                                                                data: $("#seguimientoForm").serialize(), // serializes the form's elements.
                                                                                success: function(data)
                                                                                {
                                                                                    $('#efectivo').dialog('open');
                                                                                }
                                                                            });
                                                                            return false;
                                                                        } else {
                                                                            if (fecha8 < fecha9) {
                                                                                if (fecha10 == null) {
                                                                                    $.ajax({
                                                                                        type: "POST",
                                                                                        url: '<?php echo base_url('componente2/comp25_seguimiento/guardarSeguimiento') ?>',
                                                                                        data: $("#seguimientoForm").serialize(), // serializes the form's elements.
                                                                                        success: function(data)
                                                                                        {
                                                                                            $('#efectivo').dialog('open');
                                                                                        }
                                                                                    });
                                                                                    return false;
                                                                                } else {
                                                                                    if (fecha9 < fecha10) {
                                                                                        $.ajax({
                                                                                            type: "POST",
                                                                                            url: '<?php echo base_url('componente2/comp25_seguimiento/guardarSeguimiento') ?>',
                                                                                            data: $("#seguimientoForm").serialize(), // serializes the form's elements.
                                                                                            success: function(data)
                                                                                            {
                                                                                                $('#efectivo').dialog('open');
                                                                                            }
                                                                                        });
                                                                                        return false;
                                                                                    } else {
                                                                                        $('#fechaValidacion').dialog('open');
                                                                                        return false;
                                                                                    }
                                                                                }
                                                                            } else {
                                                                                $('#fechaValidacion').dialog('open');
                                                                                return false;
                                                                            }
                                                                        }
                                                                    } else {
                                                                        $('#fechaValidacion').dialog('open');
                                                                        return false;
                                                                    }
                                                                }
                                                            } else {
                                                                $('#fechaValidacion').dialog('open');
                                                                return false;
                                                            }
                                                        }

                                                    } else {
                                                        $('#fechaValidacion').dialog('open');
                                                        return false;
                                                    }
                                                }
                                            } else {
                                                $('#fechaValidacion').dialog('open');
                                                return false;
                                            }
                                        }
                                    } else {
                                        $('#fechaValidacion').dialog('open');
                                        return false;
                                    }
                                }
                            } else {
                                $('#fechaValidacion').dialog('open');
                                return false;
                            }
                        }
                    } else {
                        $('#fechaValidacion').dialog('open');
                        return false;
                    }
                }
            }
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

        $("#seguimientoForm").hide();
        /*CARGAR MUNICIPIOS*/
        $('#dep_id').change(function() {
            $('#mun_id').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id=' + $('#dep_id').val(),
                    function(data) {
                        var i = 0;
                        $.each(data, function(key, val) {
                            if (key == 'rows') {
                                $('#mun_id').append('<option value="0">--Seleccione Municipio--</option>');
                                $.each(val, function(id, registro) {
                                    $('#mun_id').append('<option value="' + registro['cell'][0] + '">' + registro['cell'][1] + '</option>');
                                });
                            }
                        });
                    });
        });

        $('#mun_id').change(function() {
            $('#seguimientoForm')[0].reset();
            if ($('#mun_id').val() != 0) {
                $.getJSON('<?php echo base_url('componente2/comp25_seguimiento/cargarSeguimiento') . "/" ?>' + $('#mun_id').val(),
                        function(data) {
                            $.each(data, function(key, val) {
                                if (key == 'rows') {
                                    $.each(val, function(id, registro) {
                                        $('#seg_id').val(registro['cell'][0]);
                                        $('#seg_forden_preparacion').val(registro['cell'][1]);
                                        $('#seg_facta_recepcion').val(registro['cell'][2]);
                                        $('#seg_forden_diagnostico').val(registro['cell'][3]);
                                        $('#seg_fsocializacion').val(registro['cell'][4]);
                                        $('#seg_facta_aprobacion_d').val(registro['cell'][5]);
                                        $('#seg_forden_planificacion').val(registro['cell'][6]);
                                        $('#seg_facta_aprobacion_p').val(registro['cell'][7]);
                                        $('#seg_facuerdo_municipal').val(registro['cell'][8]);
                                        $('#seg_fpresentacion_publica').val(registro['cell'][9]);
                                        $('#seg_forden_seguimiento').val(registro['cell'][10]);
                                        $('#seg_comentario').val(registro['cell'][11]);
                                        $('#seg_ruta_archivo').val(registro['cell'][12]);
                                        $('#vinietaD').val(registro['cell'][13]);
                                        $('#equipoTecnico').setGridParam({
                                            url: '<?php echo base_url('componente2/comp25/cargarParticipantesSeg') ?>/seg_id/' + registro['cell'][0],
                                            editurl: '<?php echo base_url('componente2/comp23_E1/gestionParticipantes') ?>/seguimiento/seg_id/' + registro['cell'][0],
                                            datatype: 'json'
                                        }).trigger('reloadGrid');

                                        $("#seguimientoForm").show();
                                    });
                                }
                            });
                        });
            } else
                $("#seguimientoForm").hide();
        });

        /*ZONA DATEPICKER*/
        $("#seg_forden_preparacion").datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd-mm-yy'
        });
        $("#seg_facta_recepcion").datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd-mm-yy'
        });

        $("#seg_forden_diagnostico").datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd-mm-yy'
        });
        $("#seg_fsocializacion").datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd-mm-yy'
        });

        $("#seg_facta_aprobacion_d").datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd-mm-yy'
        });
        $("#seg_forden_planificacion").datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd-mm-yy'
        });

        $("#seg_facta_aprobacion_p").datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd-mm-yy'
        });

        $("#seg_facuerdo_municipal").datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd-mm-yy'
        });
        $("#seg_fpresentacion_publica").datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd-mm-yy'
        });
        $("#seg_forden_seguimiento").datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd-mm-yy'
        });

        var button = $('#btn_subir'), interval;
        new AjaxUpload('#btn_subir', {
            action: "<?php echo base_url('componente2/comp23_E1/subirArchivo/seguimiento') ; ?>/" + $('#seg_id').val() + "/seg_id",
            onSubmit: function(file, ext) {
                if (!(ext && /^(pdf|doc|docx)$/.test(ext))) {
                    $('#extension').dialog('open');
                    return false;
                } else {
                    $('#vinieta').val('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response, ext) {
                if (response != 'error') {
                    $('#vinieta').val('Subido con Exito');
                    $('#ayuda').val("<?php echo base_url('componente2/comp23_E1/subirArchivo') ; ?>/seguimiento/" + $('#seg_id').val() + "/seg_id");
                    this.enable();
                    ext = (response.substring(response.lastIndexOf("."))).toLowerCase();
                    nombre = response.substring(response.lastIndexOf("/")).toLowerCase().replace('/', '');
                    $('#vinietaD').val('Descargar ' + nombre);
                    $('#seg_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                    if (ext == '.pdf') {
                        $('#btn_descargar').attr({
                            'href': '<?php echo base_url(); ?>' + response,
                            'target': '_blank'
                        });
                    }
                    else {
                        $('#btn_descargar').attr({
                            'href': '<?php echo base_url(); ?>' + response,
                            'target': '_self'
                        });
                    }
                } else {
                    $('#vinieta').val('El Archivo debe ser menor a 1 MB.');
                    this.enable();

                }

            }
        });
        $('#btn_descargar').click(function() {
            $.get($(this).attr('href'));
        });
    });
</script>
<center>
    <h2 class="h2Titulos">Gestión de Riesgos</h2>
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
        <td width="50px"></td>
        <td><strong>Municipio</strong></td>
        <td><select id='mun_id' name='mun_id'>
                <option value='0'>--Seleccione--</option>
            </select>
        </td>
        </tr>
    </table>
</center>

<br/><br/>
<form id="seguimientoForm" method="post">

    <table align="center">
        <tr>
        <td colspan="2">
            <strong>Preparación</strong>
            <hr size=2 width=100%/>
        </td>
        </tr>

        <tr>
        <td class="textD">
            <strong>Fecha de orden de inicio</strong>
        </td>
        <td> 
            <input id="seg_forden_preparacion" name="seg_forden_preparacion" type="text" size="10" readonly="readonly"/>        
        </td>
        </tr>
        <tr>
        <td class="textD">
            <strong>Fecha de acta de recepción</strong>
        </td>
        <td>
            <input id="seg_facta_recepcion" name="seg_facta_recepcion" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>

        <tr></tr>
        <tr>    
        <td colspan="2">
            <strong>Diagnóstico</strong> 
            <hr size=2 width=100%/>
        </td>
        </tr>

        <tr>
        <td class="textD">
            <strong>Fecha de orden de inicio del diagnóstico</strong> 
        </td>
        <td>
            <input id="seg_forden_diagnostico" name="seg_forden_diagnostico" type="text" size="10" readonly="readonly"/>        
        </td>
        </tr>
        <tr>
        <td class="textD"> 
            <strong>Fecha de socialización</strong>
        </td>
        <td>
            <input id="seg_fsocializacion" name="seg_fsocializacion" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>


        <tr></tr>
        <tr>
        <td colspan="2">
            <table id="equipoTecnico"></table>
            <div id="pagerEquipoTecnico"></div>
        </td>
        </tr>

        <tr>
        <td class="textD"> 
            <strong>Fecha de acta de aprobación</strong>
        </td>
        <td>
            <input id="seg_facta_aprobacion_d" name="seg_facta_aprobacion_d" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>

        <tr>    
        <td colspan="2">
            <strong>Planificación para la gestión de riesgos</strong> 
            <hr size=2 width=100%/>
        </td>
        </tr>

        <tr></tr>
        <tr>
        <td class="textD">
            <strong>Fecha de inicio</strong> 
        </td>
        <td>
            <input id="seg_forden_planificacion" name="seg_forden_planificacion" type="text" size="10" readonly="readonly"/>        
        </td>

        <tr>
        <td class="textD">
            <strong>Fecha de acta de aprobación(comite evaluador)</strong> 
        </td>
        <td>
            <input id="seg_facta_aprobacion_p" name="seg_facta_aprobacion_p" type="text" size="10" readonly="readonly"/>        
        </td>
        </tr>
        <tr>
        <td class="textD"> 
            <strong>Fecha de acuerdo municipal de aprobación de plan</strong>
        </td>
        <td>
            <input id="seg_facuerdo_municipal" name="seg_facuerdo_municipal" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>

        <tr>
        <td class="textD"> 
            <strong>Fecha de presentación pública del plan GDR</strong>
        </td>
        <td>
            <input id="seg_fpresentacion_publica" name="seg_fpresentacion_publica" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>

        <tr></tr>
        <tr>   
        <td colspan="2">
            <strong>Seguimiento</strong> 
            <hr size=2 width=100%/>
        </td>
        </tr>
        <tr>
        <td class="textD">
            <strong>Fecha de inicio</strong> 
        </td>
        <td>
            <input id="seg_forden_seguimiento" name="seg_forden_seguimiento" type="text" size="10" readonly="readonly"/>        
        </td>
        </tr>
        <tr>    
        <td colspan="2">
        </td>
        </tr>
        <tr>
        <td colspan="2" style=" alignment-adjust: central">
            <strong>Comentarios:</strong><br/><textarea id="seg_comentario" name="seg_comentario" cols="50" rows="3"></textarea>
        </td>
        </tr>
        <!--
        <tr>
        <td colspan="2">
            <table>
                <tr><td colspan="2">Para actualizar un archivo basta con subir nuevamente el archivo y este se reemplaza automáticamente. Solo se permiten archivos con extensión pdf, doc, docx</td></tr>
                <tr>
                <td><div id="btn_subir"></div></td>
                <td><input class="letraazul" type="text" id="vinieta" readonly="readonly" value="Subir listado de participantes" size="30" style="border: none"/></td>
                </tr>
                <tr>
                <td><a id="btn_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
                <td><input class="letraazul" type="text" id="vinietaD" readonly="readonly" size="30" style="border: none"/></td>
                </tr>
            </table>
        </td>
        -->
        </tr>
        <tr>
        <td colspan="2" align="center">
            <input type="button" id="guardar" value="Guardar" />  
        </td>
        </tr>
    </table>
    <input id="seg_id" name="seg_id" type="text" size="100" readonly="readonly" hidden="hidden"/>
    <input id="seg_ruta_archivo" name="seg_ruta_archivo" type="text" size="100" hidden="hidden" readonly="readonly"/>
    <input id="ayuda" name="ayuda" type="text" size="100" hidden="hidden" readonly="readonly"/>
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
<div id="extension" class="mensaje" title="Error">
    <p>Solo se permiten archivos con la extensión pdf|doc|docx</p>
</div>