<script type="text/javascript">
    $(document).ready(function() {
        $("#guardar").button().click(function() {
            $("#capacitacionForm").submit(function(event) {
                if ($("#capacitacionForm").validate().form() == true) {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('componente2/comp22/guardarCapacitacion') ?>',
                        data: $("#capacitacionForm").serialize(), // serializes the form's elements.
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
        $('#btn_upload').button();

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
        /*  PARA SUBIR EL ARCHIVO  */
        new AjaxUpload('#btn_upload', {
            action: '<?php echo base_url('componente2/comp23_E1/subirArchivo') . '/c22_capacitaciones/' . $cap_id . '/cap_id'; ?>',
            onSubmit: function(file, ext) {
                if (!(ext && /^(pdf|doc|docx)$/.test(ext))) {
                    $('#vineta').html('<span class="error">Extension no Permitida</span>');
                    return false;
                } else {
                    $('#vineta').html('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response, ext) {
                if (response != 'error') {
                    $('#vineta').html('Subido con éxito');
                    this.enable();
                    ext = (response.substring(response.lastIndexOf("."))).toLowerCase();
                    $('#cap_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                    if (ext == '.pdf') {
                        $('#btn_download').attr({
                            'href': '<?php echo base_url(); ?>' + response,
                            'target': '_blank'
                        });
                    }
                    else {
                        $('#btn_download').attr({
                            'href': '<?php echo base_url(); ?>' + response,
                            'target': '_self'
                        });
                    }
                } else {
                    $('#vineta').html('<span class="error">Debe ser menor a 1 MB</span>');
                    this.enable();

                }
            }
        });
        $('#btn_download').button().click(function() {
            $.get($(this).attr('href'));
        });

        $("#cap_fecha_ini").datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd-mm-yy'
        });

        $('#capacitacionForm').validate({
            rules: {
                mod_id: {
                    required: true
                },
                cap_proceso: {
                    required: true,
                    maxlength: 20
                },
                cap_area: {
                    required: true,
                    maxlength: 200
                },
                cap_nombre: {
                    maxlength: 200
                },
                cap_entidad: {
                    maxlength: 200
                },
                cap_facilitador: {
                    maxlength: 200
                },
                cap_fecha_ini: {
                    required: true
                },
                cap_duracion: {
                    required: true,
                    number: true,
                    min: 0
                },
                cap_duracion_tipo: {
                    required: true
                }
            }
        });
        $("#regresar").button().click(function() {
            document.location.href = '<?php echo base_url('componente2/comp22/registroCapacitaciones'); ?>';
        });
    });
</script>
<h2 class="h2Titulos">Capacitaciones</h2>
<h2 class="h2Titulos">Registro de Procesos de Formación</h2>

<div id="rpt_frm_bdy">
    <div id="formulario">
        <form id="capacitacionForm" method="post"> 
            <div class="campo">
                <input hidden="hidden" id="cap_id" name="cap_id" type="text" readonly="readonly" style="width: 100px;" value="<?php echo $cap_id ?>"  />
            </div>
            <div class="campo">
                <label>No. Proceso de Formación:</label>
                <input id="cap_proceso" name="cap_proceso" type="text" value="<?php echo $cap_proceso ?>" />
            </div>
            <div class="campo">
                <label>Area de Capacitación o Tema:</label>
                <input id="cap_area" name="cap_area" type="text" value="<?php echo $cap_area ?>" />
            </div>
            <div class="campo">
                <label>Nombre de la Sede:</label>
                <input id="cap_sede" name="cap_sede" type="text" value="<?php echo $cap_sede ?>" />
            </div>
            <div class="campo">
                <label>Modalidad del proceso:</label>
                <select id='mod_id' name='mod_id'>
                    <option value='0'>--Seleccione--</option>
                    <?php
                    foreach ($modalidades as $aux) {
                        if ($mod_id == $aux->mod_id) {
                            ?>
                            <option value='<?php echo $aux->mod_id; ?>' selected="selected"><?php echo $aux->mod_nombre; ?></option>
                        <?php } else { ?>
                            <option value='<?php echo $aux->mod_id; ?>' ><?php echo $aux->mod_nombre; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="campo">
                <label>Nombre del Capacitación:</label>
                <input id="cap_nombre" name="cap_nombre" type="text" value="<?php echo $cap_nombre ?>" />
            </div>
            <div class="campo">
                <label>Entidad Capacitadora:</label>
                <input id="cap_entidad" name="cap_entidad" type="text" value="<?php echo $cap_entidad ?>" />
            </div>
            <div class="campo">
                <label>Nivel al que va dirigido:</label>
                <select id="cap_nivel" name="cap_nivel" >
                    <option value="0" selected="selected">Seleccione--</option>
                    <option <?php if ($cap_nivel == 'Dirección') echo 'selected="selected"' ?> value="Dirección">Dirección</option>
                    <option <?php if ($cap_nivel == 'Administrativo') echo 'selected="selected"' ?> value="Administrativo">Administrativo</option>
                    <option <?php if ($cap_nivel == 'Técnico') echo 'selected="selected"' ?> value="Técnico">Técnico</option>
                    <option <?php if ($cap_nivel == 'Operativo') echo 'selected="selected"' ?> value="Operativo">Operativo</option>
                </select> 

            </div>
            <div class="campo">
                <label>Nombre del Facilitador:</label>
                <input id="cap_facilitador" name="cap_facilitador" type="text" value="<?php echo $cap_facilitador ?>"/>
            </div>
            <div class="campo">
                <label>Fecha de Inicio:</label>
                <input id="cap_fecha_ini" name="cap_fecha_ini" value="<?php echo $cap_fecha_ini ?>" type="text" readonly="readonly" style="width: 100px;"/>
            </div>
            <div class="campo">
                <label>Duración:</label>
                <input id="cap_duracion" name="cap_duracion" type="text"  style="width: 145px;" value="<?php echo $cap_duracion ?>"/>
                <select id="cap_duracion_tipo" name="cap_duracion_tipo" style="width: 100px;" >
                    <option value="0" selected="selected">Seleccione--</option>
                    <option <?php if ($cap_duracion_tipo == 'Años') echo 'selected="selected"' ?> value="Años">Años</option>
                    <option <?php if ($cap_duracion_tipo == 'Meses') echo 'selected="selected"' ?> value="Meses">Meses</option>
                    <option <?php if ($cap_duracion_tipo == 'Días') echo 'selected="selected"' ?> value="Días">Días</option>
                    <option <?php if ($cap_duracion_tipo == 'Horas') echo 'selected="selected"' ?> value="Horas">Horas</option>
                </select>        
            </div>
            <div class="campo">
                <label>Descripción:</label>
                <textarea id="cap_descripcion" name="cap_descripcion" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo $cap_descripcion ?></textarea>
            </div>
            <div style="width: 100%;">
                <div style="width: 50%; display: inline-block;">
                    <div class="campoUp">
                        <label style="text-align: left;">Observaciones:</label>
                        <textarea id="cap_observaciones" name="cap_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo $cap_observaciones ?></textarea>
                    </div>
                </div>
                <div class="campoUp" style="display: inline-block;">
                    <label>Cargar archivo:</label>
                    <div id="fileUpload" style="margin-left: 20px;">
                        <div id="btn_upload" style="display: inline-block;">Subir Acuerdo</div>
                        <a id="btn_download" href="<?php echo base_url($cap_ruta_archivo) ?>" style="display: inline-block;">Descargar</a>
                        <div id="vineta" style="display: inline-block;"></div>
                        <div class="uploadText" style="width: 300px;">Para actualizar un archivo basta con subir nuevamente el archivo y este se reemplaza automáticamente. Solo se permiten archivos con extensión pdf, doc, docx</div>
                    </div>
                </div>
            </div>
            <input id="cap_ruta_archivo" value="<?php echo $cap_ruta_archivo ?>" name="cap_ruta_archivo" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
            <div id="actions" style="position: relative;top: 20px">
                <input type="submit" id="guardar" value="Guardar" />
                <input type="button" id="regresar" value="regresar" />
            </div>
        </form>
    </div>
</div>
<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>