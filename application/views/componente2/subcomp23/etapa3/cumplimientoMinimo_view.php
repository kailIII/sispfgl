<script type="text/javascript">        
    $(document).ready(function(){
        $("#guardar").button().click(function() {
            borrador= $('#pro_pep_fecha_borrador').datepicker("getDate");
            observacion=$( "#pro_pep_fecha_observacion" ).datepicker("getDate");
            aprobacion=$( "#pro_pep_fecha_aprobacion" ).datepicker("getDate");
            if(borrador==null){
                $("#pro_pep_fecha_observacion" ).val('');
                $("#pro_pep_fecha_aprobacion" ).val('');
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('componente2/comp23_E3/guardarCumplimientosMinimos') . '/' . $pro_pep_id; ?>',
                    data: $("#cumplimientosForm").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $('#efectivo').dialog('open');
                    }
                });
                return false;
                
            }else{
                if(observacion==null){
                    $( "#pro_pep_fecha_aprobacion" ).val('');
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('componente2/comp23_E3/guardarCumplimientosMinimos') . '/' . $pro_pep_id; ?>',
                        data: $("#cumplimientosForm").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $('#efectivo').dialog('open');
                        }
                    });
                    return false;
                }else{
                    if(borrador < observacion){
                        if(aprobacion==null){
                            $.ajax({
                                type: "POST",
                                url: '<?php echo base_url('componente2/comp23_E3/guardarCumplimientosMinimos') . '/' . $pro_pep_id; ?>',
                                data: $("#cumplimientosForm").serialize(), // serializes the form's elements.
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
                                    url: '<?php echo base_url('componente2/comp23_E3/guardarCumplimientosMinimos') . '/' . $pro_pep_id; ?>',
                                    data: $("#cumplimientosForm").serialize(), // serializes the form's elements.
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
            document.location.href='<?php echo base_url("componente2/comp23_E3/cumplimientosMinimos"); ?>';
        });
        
        /*  PARA SUBIR EL ARCHIVO  */
        var button = $('#btn_subir'), interval;
        new AjaxUpload('#btn_subir', {
            action: '<?php echo base_url('componente2/comp23_E1/subirArchivo') . '/proyecto_pep/' . $pro_pep_id . '/pro_pep_id'; ?>',
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
                    $('#pro_pep_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
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
        $( "#pro_pep_fecha_borrador" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        
        $( "#pro_pep_fecha_observacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#pro_pep_fecha_aprobacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
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
        /*FIN DIALOGOS VALIDACION*/
    });
</script>
<form id="cumplimientosForm" method="post">
    <h2 class="h2Titulos">Etapa 3: Plan Estratégico Participativo</h2>
    <h2 class="h2Titulos">Cumplimientos de los elementos mínimos del PEP</h2>

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
        <fieldset style="width:400px;">
            <legend><strong>Cumplimiento de los elementos minimos del PEP</strong></legend>
            <table>
                <?php foreach ($cumplimientosMinimos as $aux) { ?>
                    <tr>
                    <td><?php echo $aux->cum_min_nombre; ?></td>
                    <td><input type="radio" name="cum_<?php echo $aux->cum_min_id; ?>" value="true" <?php if (!strcasecmp($aux->cum_pro_valor, 't')) { ?>checked <?php } ?> >SI </input></td>
                    <td><input type="radio" name="cum_<?php echo $aux->cum_min_id; ?>" value="false"<?php if (!strcasecmp($aux->cum_pro_valor, 'f')) { ?>checked <?php } ?>>NO </input></td>
                    </tr>
                <?php } ?>
            </table>  

        </fieldset>
        </td>  
        <td style="width: 20px"></td>
        <td>
            <table>
                <tr style="width: 300px"> <td ><strong>Fecha de entrega de producto: </strong><input id="pro_pep_fecha_borrador" <?php if (isset($pro_pep_fecha_borrador)) { ?>  value="<?php echo date('d-m-Y', strtotime($pro_pep_fecha_borrador)); ?>" <?php } ?> name="pro_pep_fecha_borrador" type="text" size="7" /></td></tr>
                <tr><td><strong>Fecha de visto bueno: </strong><input id="pro_pep_fecha_observacion" <?php if (isset($pro_pep_fecha_observacion)) { ?>value="<?php echo date('d-m-Y', strtotime($pro_pep_fecha_observacion)); ?>"<?php } ?>  name="pro_pep_fecha_observacion" type="text" size="7" /></td></tr>
                <tr> <td><strong>Fecha de aprobacion del concejo municipal: </strong><input id="pro_pep_fecha_aprobacion" <?php if (isset($pro_pep_fecha_aprobacion)) { ?> value="<?php echo date('d-m-Y', strtotime($pro_pep_fecha_aprobacion)); ?>"<?php } ?>  name="pro_pep_fecha_aprobacion" type="text" size="7" /></td></tr>
            </table>
            <p><strong>¿Acta de aceptación contiene firmas?</strong></p>
            <table>
                <tr>
                <td><strong>concejo municipalidad</strong></td>
                <td><input type="radio" name="pro_pep_firmacm" value="true" <?php if (!strcasecmp($pro_pep_firmacm, 't')) { ?>checked <?php } ?>>SI </input></td>
                <td><input type="radio" name="pro_pep_firmacm" value="false" <?php if (!strcasecmp($pro_pep_firmacm, 'f')) { ?>checked <?php } ?>>NO </input></td>
                </tr>
                <tr>
                <td><strong>ISDEM </strong></td>
                <td><input type="radio" name="pro_pep_firmais" value="true" <?php if (!strcasecmp($pro_pep_firmais, 't')) { ?>checked <?php } ?>>SI </input></td>
                <td><input type="radio" name="pro_pep_firmais" value="false"<?php if (!strcasecmp($pro_pep_firmais, 'f')) { ?>checked <?php } ?>>NO </input></td>    
                </tr>
                <tr>
                <td><strong>UEP</strong></td>
                <td><input type="radio" name="pro_pep_firmaue" value="true" <?php if (!strcasecmp($pro_pep_firmaue, 't')) { ?>checked <?php } ?>>SI </input></td>
                <td><input type="radio" name="pro_pep_firmaue" value="false" <?php if (!strcasecmp($pro_pep_firmaue, 'f')) { ?>checked <?php } ?>>NO </input></td> 
                </tr>
            </table> 
        </td>
        </tr>
    </table>
    <table>
        <tr><td colspan="2">Para actualizar un archivo basta con subir nuevamente el archivo y este se reemplaza automáticamente. Solo se permiten archivos con extensión pdf, doc, docx</td></tr>
        <tr>
        <td><div id="btn_subir"></div></td>
        <td><input class="letraazul" type="text" id="vinieta" readonly="readonly" value="Subir Acta" size="60" style="border: none"/></td>
        </tr>
        <tr>
        <td><a <?php if (isset($pro_pep_ruta_archivo) && $pro_pep_ruta_archivo != '') { ?> href="<?php echo base_url() . $pro_pep_ruta_archivo; ?>"<?php } ?>  id="btn_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
        <td><input class="letraazul" type="text" id="vinietaD" readonly="readonly" <?php if (isset($pro_pep_ruta_archivo) && $pro_pep_ruta_archivo != '') { ?>value="Descargar <?php echo $nombreArchivo ?>"<?php } else { ?> value="No hay ninguna acta para descargar" <?php } ?>size="50" style="border: none"/></td>
        </tr>
    </table>
    <p>Observaciones y/o Recomendaciones:<br/>
        <textarea name="pro_pep_observacion" cols="48" rows="5"><?php echo $pro_pep_observacion; ?></textarea></p>

    <center>
        <p > 
            <input type="submit" id="guardar" value="Guardar Cumplimientos Mínimos" />
            <input type="button" id="cancelar" value="Regresar" />
        </p>
    </center>

    <input id="pro_pep_ruta_archivo" name="pro_pep_ruta_archivo" <?php if (isset($pro_pep_ruta_archivo) && $pro_pep_ruta_archivo != '') { ?>value="<?php echo $pro_pep_ruta_archivo; ?>"<?php } ?> type="text" size="100" readonly="readonly" style="visibility: hidden"/>
</form>
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
