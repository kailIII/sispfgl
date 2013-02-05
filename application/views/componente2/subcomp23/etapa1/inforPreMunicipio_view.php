<script type="text/javascript">        
    $(document).ready(function(){
        
        $("#guardar").button().click(function() {
            borrador= $('#inf_pre_fecha_borrador').datepicker("getDate");
            observacion=$( "#inf_pre_fecha_observacion" ).datepicker("getDate");
            aprobacion=$( "#inf_pre_aceptacion" ).datepicker("getDate");
            if(borrador==null){
                $( "#inf_pre_fecha_observacion" ).val('');
                $( "#inf_pre_aceptacion" ).val('');
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('componente2/comp23_E1/guardarInformePreliminar/' . $inf_pre_id); ?>',
                    data: $("#informePreliminarForm").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $('#efectivo').dialog('open');
                    }
                });
                return false;
            }else{
                if(observacion==null){
                    $("#inf_pre_aceptacion" ).val('');
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('componente2/comp23_E1/guardarInformePreliminar/' . $inf_pre_id); ?>',
                        data: $("#informePreliminarForm").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $('#efectivo').dialog('open');
                        }
                    });
                    return false;
                }else{
                    if(borrador< observacion){
                        if(aprobacion==null){
                            $.ajax({
                                type: "POST",
                                url: '<?php echo base_url('componente2/comp23_E1/guardarInformePreliminar/' . $inf_pre_id); ?>',
                                data: $("#informePreliminarForm").serialize(), // serializes the form's elements.
                                success: function(data)
                                {
                                    $('#efectivo').dialog('open');
                                }
                            });
                            return false;
                        }else{
                            if(observacion < aprobacion){
                                $.ajax({
                                    type: "POST",
                                    url: '<?php echo base_url('componente2/comp23_E1/guardarInformePreliminar/' . $inf_pre_id); ?>',
                                    data: $("#informePreliminarForm").serialize(), // serializes the form's elements.
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
            }  
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url("componente2/comp23_E1/InformePreliminar"); ?>';
        });
        /*  PARA SUBIR EL ARCHIVO  */
        var button = $('#btn_subir'), interval;
        new AjaxUpload('#btn_subir', {
            action: '<?php echo base_url('componente2/comp23_E1/subirArchivo') . '/informe_preliminar/' . $inf_pre_id . '/inf_pre_id'; ?>',
            onSubmit : function(file , ext){
                if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                    $('#extension').dialog('open');
                    return false;
                } else {
                    $('#vinieta').val('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response,ext){
                if(response!='error'){
                    $('#vinieta').val('Subido con Exito');
                    this.enable();			
                    ext= (response.substring(response.lastIndexOf("."))).toLowerCase();
                    nombre=response.substring(response.lastIndexOf("/")).toLowerCase().replace('/','');
                    $('#vinietaD').val('Descargar '+nombre);
                    $('#inf_pre_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                    if (ext=='.pdf'){
                        $('#btn_descargar').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_blank'
                        });
                    }
                    else{
                        $('#btn_descargar').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_self'
                        });
                    }
                }else{
                    $('#vinieta').val('El Archivo debe ser menor a 1 MB.');
                    this.enable();			
                 
                }
                 
            }	
        });
        $('#btn_descargar').click(function() {
            $.get($(this).attr('href'));
        });
        /*PARA EL DATEPICKER*/
        $( "#inf_pre_fecha_borrador" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        
        $( "#inf_pre_fecha_observacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#inf_pre_aceptacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        /*FIN DEL DATEPICKER*/
        /*ZONA DE VALIDACIONES*/
        function validaSexo(value, colname) {
            if (value == 0 ) return [false,"Seleccione el Sexo del Participante"];
            else return [true,""];
        }
        /*FIN ZONA VALIDACIONES*/
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
        /*FIN DIALOGOS VALIDACION*/
            
    });
    
    
</script>

<form id="informePreliminarForm" method="post">
    <h2 class="h2Titulos">Etapa 1: Condiciones Previas</h2>
    <h2 class="h2Titulos">Producto 6: Informe Preliminar del Municipio</h2>

    <br/><br/>
    <table>
        <tr>
        <td class="tdLugar" ><strong>Departamento:</strong></td>
        <td><?php echo $departamento ?></td>
        <td class="tdEspacio"></td>
        <td class="tdLugar"><strong>Municipio:</strong></td>
        <td ><?php echo $municipio ?></td>    
        </tr>
    </table>
    <br/><br/>

    <table>
        <tr>
        <td>
        <fieldset style="width:420px;">
            <legend><strong>Cumplimiento de los elementos minimos del informe</strong></legend>
            <table>
                <?php foreach ($cumplimientosMinimos as $aux) { ?>
                    <tr>
                    <td><?php echo $aux->cum_min_nombre; ?></td>
                    <td><input type="radio" name="cum_<?php echo $aux->cum_min_id; ?>" value="true" <?php if (!strcasecmp($aux->cum_inf_valor, 't')) { ?>checked <?php } ?> >SI </input></td>
                    <td><input type="radio" name="cum_<?php echo $aux->cum_min_id; ?>" value="false"<?php if (!strcasecmp($aux->cum_inf_valor, 'f')) { ?>checked <?php } ?>>NO </input></td>
                    </tr>
                <?php } ?>
            </table>  

        </fieldset>
        </td>  
        <td>
            <table>
                <tr><td><strong>Fecha de entrega de producto: </strong><input id="inf_pre_fecha_borrador" <?php if (isset($inf_pre_fecha_borrador)) { ?>  value="<?php echo date('d-m-Y', strtotime($inf_pre_fecha_borrador)); ?>" <?php } ?> name="inf_pre_fecha_borrador" type="text" size="7" /></td></tr>
                <tr><td><strong>Fecha de visto bueno: </strong><input id="inf_pre_fecha_observacion" <?php if (isset($inf_pre_fecha_observacion)) { ?>value="<?php echo date('d-m-Y', strtotime($inf_pre_fecha_observacion)); ?>"<?php } ?>  name="inf_pre_fecha_observacion" type="text" size="7" /></td></tr>
                <tr><td><strong>Fecha de aprobación del consejo municipal: </strong><input id="inf_pre_aceptacion" <?php if (isset($inf_pre_aceptacion)) { ?> value="<?php echo date('d-m-Y', strtotime($inf_pre_aceptacion)); ?>"<?php } ?>  name="inf_pre_aceptacion" type="text" size="7" /></td></tr>
            </table>
            <p><strong>¿Acta de aceptación contiene firmas?</strong></p>
            <table>
                <tr>
                <td>Municipalidad</td>
                <td><input type="radio" name="inf_pre_firmam" value="true" <?php if (!strcasecmp($inf_pre_firmam, 't')) { ?>checked <?php } ?>>SI </input></td>
                <td><input type="radio" name="inf_pre_firmam" value="false" <?php if (!strcasecmp($inf_pre_firmam, 'f')) { ?>checked <?php } ?>>NO </input></td>
                </tr>
                <tr>
                <td>ISDEM </td>
                <td><input type="radio" name="inf_pre_firmai" value="true" <?php if (!strcasecmp($inf_pre_firmai, 't')) { ?>checked <?php } ?>>SI </input></td>
                <td><input type="radio" name="inf_pre_firmai" value="false"<?php if (!strcasecmp($inf_pre_firmai, 'f')) { ?>checked <?php } ?>>NO </input></td>    
                </tr>
                <tr>
                <td>UEP</td>
                <td><input type="radio" name="inf_pre_firmau" value="true" <?php if (!strcasecmp($inf_pre_firmau, 't')) { ?>checked <?php } ?>>SI </input></td>
                <td><input type="radio" name="inf_pre_firmau" value="false" <?php if (!strcasecmp($inf_pre_firmau, 'f')) { ?>checked <?php } ?>>NO </input></td> 
                </tr>
            </table> 
        </td>
        </tr>
    </table>
    <br/><br/>
    <p>Observaciones y/o Recomendaciones:<br/>
        <textarea name="inf_pre_observacion" cols="48" rows="5"><?php echo $inf_pre_observacion; ?></textarea></p>

    <table>
        <tr><td colspan="2">Para actualizar un archivo basta con subir nuevamente el archivo y este se reemplaza automáticamente. Solo se permiten archivos con extensión pdf, doc, docx</td></tr>
        <tr>
        <td><div id="btn_subir"></div></td>
        <td><input class="letraazul" type="text" id="vinieta" readonly="readonly" value="Subir Informe Preliminar" size="60" style="border: none"/></td>
        </tr>
        <tr>
        <td><a <?php if (isset($inf_pre_ruta_archivo) && $inf_pre_ruta_archivo != '') { ?> href="<?php echo base_url() . $inf_pre_ruta_archivo; ?>"<?php } ?>  id="btn_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
        <td><input class="letraazul" type="text" id="vinietaD" readonly="readonly" <?php if (isset($inf_pre_ruta_archivo) && $inf_pre_ruta_archivo != '') { ?>value="Descargar <?php echo $nombreArchivo; ?>"<?php } else { ?> value="No hay ningún informe preliminar para descargar" <?php } ?>size="50" style="border: none"/></td>
        </tr>
    </table>

    <center>
        <p > 
            <input type="submit" id="guardar" value="Guardar Informe Preliminar" />
            <input type="button" id="cancelar" value="Regresar" />
        </p>
    </center>
    <input id="inf_pre_ruta_archivo" name="inf_pre_ruta_archivo" <?php if (isset($inf_pre_ruta_archivo) && $inf_pre_ruta_archivo != '') { ?>value="<?php echo $inf_pre_ruta_archivo; ?>"<?php } ?> type="text" size="100" readonly="readonly" style="visibility: hidden"/>
</form>

<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>
<div id="extension" class="mensaje" title="Error">
    <p>Solo se permiten archivos con la extensión pdf|doc|docx</p>
</div>
<div id="fechaValidacion" class="mensaje" title="Error en fechas">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/cancel.png'); ?>" class="imagenError" />Las fechas deben de ir en orden ascendente</p>
    </center>
</div>
<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>

