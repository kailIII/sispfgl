<script type="text/javascript">
    $(document).ready(function() {
        /*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function() {
            $('#selMun').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id=' + $('#selDepto').val(),
                    function(data) {
                        var i = 0;
                        $.each(data, function(key, val) {
                            if (key == 'rows') {
                                $('#selMun').append('<option value="0">--Seleccione Municipio--</option>');
                                $.each(val, function(id, registro) {
                                    $('#selMun').append('<option value="' + registro['cell'][0] + '">' + registro['cell'][1] + '</option>');
                                });
                            }
                        });
                    });
        });
        $('#par_acepta').click(function() {
            $.getJSON('<?php echo base_url('componente2/comp22/agregarEmpleado') . "/" ?>' + $('#selMun').val(),
                    function(data) {
                        var i = 0;
                        $.each(data, function(key, val) {
                            if (key == 'rows') {
                                $.each(val, function(id, registro) {
                                    $('#par_id').val(registro['cell'][0]);
                                    $("#propuestaTecnicaForm").show();
                                    $('#Formulario').show();
                                    $('#selDepto').attr('disabled', 'disabled');
                                    $('#selMun').attr('disabled', 'disabled');
                                    $('#par_acepta').attr('disabled', 'disabled');
                                    $('#solicitudCapacitaciones').setGridParam({
                                        url: '<?php echo base_url('componente2/comp22/cargarCapacitacionesPar'); ?>/' + registro['cell'][0],
                                        editurl: '<?php echo base_url('componente2/comp22/guardarCapacitaciones'); ?>/' + registro['cell'][0],
                                        datatype: 'json',
                                        colModel: [
                                            {name: 'id', index: 'id', width: 40, editable: false, editoptions: {size: 15}},
                                            {name: 'cap_id', index: 'cap_id', editable: true,
                                                edittype: "select", width: 450,
                                                editoptions: {dataUrl: '<?php echo base_url('componente2/comp22/cargarCapacitaciones') ?>/' + registro['cell'][0]},
                                                formoptions: {label: "Proceso de formación en que desea participar:", elmprefix: "(*)"},
                                                editrules: {custom: true, custom_func: validaInstitucion}
                                            },
                                            {name: 'cxp_justificacion', index: 'cxp_justificacion', width: 400, editable: true,
                                                edittype: "textarea", editoptions: {rows: "4", cols: "50"},
                                                formoptions: {label: "Justifique por qué desea participar"}
                                            }
                                        ]
                                    }).trigger('reloadGrid');
                                });
                            }
                        });
                    });
        });
        $('#Formulario').hide();

        /*PARA EL DATEPICKER*/
        $("#acu_mun_fecha_conformacion").datepicker({
            showOn: 'both',
            maxDate: '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd/mm/yy',
            onClose: function(selectedDate) {
                $("#acu_mun_fecha_acuerdo").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#acu_mun_fecha_acuerdo").datepicker({
            showOn: 'both',
            maxDate: '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd/mm/yy',
            onClose: function(selectedDate) {
                $("#acu_mun_fecha_recepcion").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#par_birthday").datepicker({
            showOn: 'both',
            maxDate: '+1D',
            changeYear: true,
            changeMonth: true,
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd/mm/yy'
        });

        $("#guardar").button().click(function() {
            $("#solicitudInscripcion").submit(function(event) {
                if ($("#solicitudInscripcion").validate().form() == true) {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('componente2/comp22/guardarSolicitud') ?>/' + $('#selMun').val(),
                        data: $("#solicitudInscripcion").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $('#efectivo').dialog('open');
                            $("#regresar").show();
                            $("#cancelar").hide();
                        }
                    });
                    return false;
                }
            });
        });
        $(".telefono").mask("9999-9999");
        $("#par_dui").mask("99999999-9");
        $('#solicitudInscripcion').validate({
            rules: {
                par_apellidos: {
                    required: true,
                    maxlength: 100
                },
                par_nombres: {
                    required: true,
                    maxlength: 100
                },
                par_birthplace: {
                    required: true,
                    maxlength: 200
                },
                par_dir_nombre: {
                    maxlength: 100
                },
                par_dir_calle: {
                    maxlength: 100
                },
                par_dir_casa: {
                    maxlength: 100
                },
                par_ins_cargo: {
                    maxlength: 200
                },
                par_ins_categoria: {
                    maxlength: 100
                },
                par_ins_nivel: {
                    maxlength: 100
                },
                par_ins_tiempo: {
                    number: true,
                    min: 0
                },
                par_ins_tiempo2: {
                    number: true,
                    min: 0
                },
                par_ins_servicio: {
                    number: true,
                    min: 0
                },
                par_ins_servicio2: {
                    number: true,
                    min: 0
                },
                par_sexo: {
                    required: true
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

        $("#cancelar").button().click(function() {
            document.location.href = '<?php echo base_url('componente2/comp22/borrarSolicitud') . '/'; ?>' + $('#par_id').val();
        });
        $("#regresar").button().click(function() {
            document.location.href = '<?php echo base_url('') ; ?>';
        });
        function validaInstitucion(value, colname) {
            if (value == 0)
                return [false, "Seleccione un proceso de formación"];
            else
                return [true, ""];
        }
        /*GRID Otros asistentes*/
        var tabla = $("#solicitudCapacitaciones");
        tabla.jqGrid({
            url: '<?php echo base_url('componente2/comp22/cargarCapacitacionesPar'); ?>/' + $('#par_id').val(),
            editurl: '<?php echo base_url('componente2/comp22/guardarCapacitaciones'); ?>/' + $('#par_id').val(),
            datatype: 'json',
            altRows: true,
            height: "100%",
            hidegrid: false,
            colNames: ['id', 'Proceso de Formación', 'Justificacion'],
            colModel: [
                {name: 'id', index: 'id', width: 40, editable: false, editoptions: {size: 15}},
                {name: 'cap_id', index: 'cap_id', editable: true,
                    edittype: "select", width: 450,
                    editoptions: {dataUrl: '<?php echo base_url('componente2/comp22/cargarCapacitaciones') ?>/' + $('#par_id').val()},
                    formoptions: {label: "Proceso de formación en que desea participar:", elmprefix: "(*)"},
                    editrules: {custom: true, custom_func: validaInstitucion}
                },
                {name: 'cxp_justificacion', index: 'cxp_justificacion', width: 400, editable: true,
                    edittype: "textarea", editoptions: {rows: "4", cols: "50"},
                    formoptions: {label: "Justifique por qué desea participar"}
                }
            ],
            multiselect: false,
            // caption: "Fuentes de Información Primarias",
            rowNum: 10,
            rowList: [10, 20, 30],
            loadonce: true,
            pager: jQuery('#solicitudCapacitacionesPager'),
            viewrecords: true
        }).jqGrid('navGrid', '#solicitudCapacitacionesPager',
                {edit: false, add: false, del: false, search: false, refresh: false,
                    beforeRefresh: function() {
                        tabla.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
                    }
                }
        ).hideCol('id');

        $("#agregar").button().click(function() {
            tabla.jqGrid('editGridRow', "new",
                    {closeAfterAdd: true, addCaption: "Agregar Proceso de Formación", width: 750,
                        align: 'center', reloadAfterSubmit: true, recreateForm: true,
                        processData: "Cargando...", afterSubmit: despuesAgregarEditar,
                        bottominfo: "Campos marcados con (*) son obligatorios",
                        onclickSubmit: function(rp_ge, postdata) {
                            $('#mensaje').dialog('open');
                        }
                    });
        });
        $("#eliminar").button().click(function() {
            var grs = tabla.jqGrid('getGridParam', 'selrow');
            if (grs != null)
                tabla.jqGrid('delGridRow', grs,
                        {msg: "¿Desea Eliminar este Proceso de Formación?", caption: "Eliminando ",
                            align: 'center', reloadAfterSubmit: true,
                            processData: "Cargando...",
                            onclickSubmit: function(rp_ge, postdata) {
                                $('#mensaje').dialog('open');
                            }});
            else
                $('#mensaje2').dialog('open');
        });
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
            return[true, '']; //no error
        }
        $("#regresar").hide();

    });
</script>


<center>
    <h2 class="h2Titulos">Capacitaciones</h2>
    <h2 class="h2Titulos">Formulario de Registro y Preselección</h2>
    <br/>
    <table>
        <tr>
        <td><strong>Departamento</strong></td>
        <td><select id='selDepto'>
                <option value='0'>--Seleccione--</option>
                <?php foreach ($departamentos as $grupo) { ?>
                    <option value='<?php echo $grupo->dep_id; ?>'><?php echo $grupo->dep_nombre; ?></option>
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
<p><strong>Criterios de Preselección/elegibilidad para aplicar a Procesos de Formación por parte de los empleados municipales.</strong></p>
<ul>
    <li>Ser empleado/a de municipio clasificado como de pobreza extrema alta, severa y moderada (en este orden de prioridad)</li>
    <li> Tiempo mínimo de trabajo en la municipalidad de 3 años</li>
    <li>Nivel mínimo de estudios: Bachillerato</li>
    <li>Relación entre proceso formativo al que aplica y funciones del puesto de trabajo del solicitante</li>
</ul>
<input id="par_acepta" type="checkbox" value="1" name="par_acepta">
He leido los criterios de Preselección/elegibilidad para aplicar a Procesos de Formación
</input>
<div id="Formulario">
    <form id="solicitudInscripcion" method="post"> 
        <fieldset style="width: 700px; display: block; vertical-align: top; margin-left: 89px;">
            <legend>Datos Generales</legend>
            <div class="campo">
                <label style="width: 200px;">Apellidos:</label>
                <input id="par_apellidos" name="par_apellidos" type="text" />
            </div>
            <div class="campo">
                <label style="width: 200px;">Nombres:</label>
                <input id="par_nombres" name="par_nombres" type="text" />
            </div>
            <div class="campo">
                <label style="width: 200px;">Lugar de Nacimiento:</label>
                <input id="par_birthplace" name="par_birthplace" type="text" />
            </div>
            <div class="campo">
                <label style="width: 200px;">Fecha de Nacimiento:</label>
                <input id="par_birthday" name="par_birthday" type="text" readonly="readonly" style="width: 150px;"/>
                <span>Masculino</span><input type="radio" name="par_sexo" value="M"/>
                <span>Femenino</span><input type="radio" name="par_sexo" value="F"/>
            </div>
            <div class="campo">
                <label style="width: 200px;">DUI:</label>
                <input id="par_dui" name="par_dui" type="text"/>
            </div>
        </fieldset>
        <fieldset style="width: 700px; display: block; vertical-align: top; margin-left: 89px;">
            <legend>Domicilio de Residencia Actual</legend>
            <div class="campo">
                <label style="width: 200px;"></label>
                <span>Barrio</span><input type="radio" name="par_dir_tipo" value="Barrio"/>
                <span>Colonia</span><input type="radio" name="par_dir_tipo" value="Colonia"/>
                <span>Cantón</span><input type="radio" name="par_dir_tipo" value="Canton"/>
            </div>
            <div class="campo">
                <label style="width: 200px;">Nombre:</label>
                <input id="par_dir_nombre" name="par_dir_nombre" type="text"/>
            </div>
            <div class="campo">
                <label style="width: 200px;">Calle:</label>
                <input id="par_dir_calle" name="par_dir_calle" type="text" />
            </div>
            <div class="campo">
                <label style="width: 200px;">No. de Casa:</label>
                <input id="par_dir_casa" name="par_dir_casa" type="text"/>
            </div>
        </fieldset>
        <fieldset style="width: 700px; display: block; vertical-align: top; margin-left: 89px;">
            <legend>Telefonos de Contacto</legend>
            <div class="campo">
                <label style="width: 200px;">Municipales:</label>
                <input id="par_ins_telefono" class="telefono" name="par_ins_telefono" type="text" style="width: 150px;"/>
                <input id="par_ins_movil" class="telefono" name="par_ins_movil" type="text"  style="width: 150px;"/>
            </div>
            <div class="campo">
                <label style="width: 200px;">Personales:</label>
                <input id="par_telefono" name="par_telefono" class="telefono" type="text" style="width: 150px;"/>
                <input id="par_movil" name="par_movil" class="telefono" type="text" style="width: 150px;"/>
            </div>
        </fieldset>
        <fieldset style="width: 700px; display: block; vertical-align: top; margin-left: 89px;">
            <legend>Información Academica</legend>
            <div class="campo">
                <label style="width: 200px;">Nivel de Estudios Cursados:</label>
                <select id='par_nivel' name="par_nivel">
                    <option value='0'>--Seleccione--</option>
                    <option value='Maestria'>Maestría</option>
                    <option value='Posgrado'>Posgrado</option>
                    <option value='Grado Universitario'>Grado Universitario</option>
                    <option value='Bachillerato'>Bachillerato</option>
                    <option value='Tecnico'>Técnico</option>
                    <option value='Educacion Primaria'>Educación Primaria</option>
                </select>
            </div>
            <div class="campo">
                <label style="width: 200px;">Titulos Obtenidos:</label>
                <textarea id="par_titulos" name="par_titulos" cols="30" rows="5" wrap="virtual" maxlength="100"></textarea>
            </div>
        </fieldset>
        <fieldset style="width: 700px; display: block; vertical-align: top; margin-left: 89px;">
            <legend>Información sobre la Institución</legend>
            <!--
             <div class="campo">
                 <label style="width: 200px;">Municipalidad:</label>
                 <input id="par_ins_municipio" name="par_ins_municipio" type="text"/>
             </div>-->
            <div class="campo">
                <label style="width: 200px;">Categoria:</label>
                <input id="par_ins_categoria" name="par_ins_categoria" value=" " type="text" />
            </div>
            <div class="campo">
                <label style="width: 200px;">Denominación del Cargo:</label>
                <input id="par_ins_cargo" name="par_ins_cargo" value=" " type="text" />
            </div>
            <div class="campo">
                <label style="width: 200px;">Nivel:</label>
                <input id="par_ins_nivel" name="par_ins_nivel" value=" " type="text" />
            </div>
            <div class="campo">
                <label style="width: 200px;">Tiempo de Servicio:</label>
                <input id="par_ins_tiempo" name="par_ins_tiempo" value="0" type="text" />
                <span>Años</span>
                <input id="par_ins_tiempo2" name="par_ins_tiempo2" value="0" type="text" style="width: 75px;"/>
                <span>Meses</span>
            </div>
            <div class="campo">
                <label style="width: 200px;">Tiempo en Cargo Actual:</label>
                <input id="par_ins_servicio" name="par_ins_servicio" type="text" value="0" style="width: 75px;"/>
                <span>Años</span>
                <input id="par_ins_servicio2" name="par_ins_servicio2" type="text" value="0" style="width: 75px;"/>
                <span>Meses</span>
            </div>
        </fieldset>
        <input type="text" value="" id="par_id" name="par_id" hidden="hidden"/>

        <center style="position: relative;top: 20px">
            <input type="submit" id="guardar" value="Guardar" />
            <input type="button" id="regresar" value="Regresar" />
            <input type="button" id="cancelar" value="Cancelar" />
        </center>
    </form>
    <br/><br/><br/>
    <center>
        <table id="solicitudCapacitaciones"></table>
        <div id="solicitudCapacitacionesPager"></div>    
        <input type="button" id="agregar" value="Agregar" />
        <input type="button" id="eliminar" value="Eliminar" />
    </center>
</div>

<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>