<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E2/guardarDiagnostico/' . $dia_id); ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/comp23_E2'); ?>';
        });
        /*  PARA SUBIR EL ARCHIVO  */
        var button = $('#btn_subir'), interval;
        new AjaxUpload('#btn_subir', {
            action: '<?php echo base_url('componente2/comp23_E1/subirArchivo') . '/diagnostico/' . $dia_id . '/dia_id'; ?>',
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
                    $('#vinietaD').val('Descargar Archivo');
                    $('#dia_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                    ext= (response.substring(response.lastIndexOf("."))).toLowerCase(); 
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
        $( "#dia_fecha_borrador" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        
        $( "#dia_fecha_observacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#dia_fecha_concejo_muni" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
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
        
    });
</script>

<form method="post">
    <h2 class="h2Titulos">Etapa 2: Diagnóstico del municipio</h2>
    <h2 class="h2Titulos">Producto 6:Elementos mínimos del diagnóstico</h2>

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
            <legend><strong>¿ Contiene el diagnóstico del municipio los elementos mínimos siguientes?</strong></legend>
            <table>
                <?php foreach ($cumplimientosMinimos as $aux) { ?>
                    <tr>
                    <td><?php echo $aux->cum_min_nombre; ?></td>
                    <td><input type="radio" name="cum_<?php echo $aux->cum_min_id; ?>" value="true" <?php if (!strcasecmp($aux->cum_dia_valor, 't')) { ?>checked <?php } ?> >SI </input></td>
                    <td><input type="radio" name="cum_<?php echo $aux->cum_min_id; ?>" value="false"<?php if (!strcasecmp($aux->cum_dia_valor, 'f')) { ?>checked <?php } ?>>NO </input></td>
                    </tr>
                <?php } ?>
            </table>  

        </fieldset>
        </td>  
        <td>
            <table>
                <tr> <td ><strong>Fecha de presentación del borrador: </strong><input id="dia_fecha_borrador" <?php if (isset($dia_fecha_borrador)) { ?>  value="<?php echo date('d/m/y', strtotime($dia_fecha_borrador)); ?>" <?php } ?> name="dia_fecha_borrador" type="text" size="5" /></td></tr>
                <tr><td><strong>Fecha de superación de observaciones: </strong><input id="dia_fecha_observacion" <?php if (isset($dia_fecha_observacion)) { ?>value="<?php echo date('d/m/y', strtotime($dia_fecha_observacion)); ?>"<?php } ?>  name="dia_fecha_observacion" type="text" size="5" /></td></tr>
                <tr> <td><strong>Fecha de aprobacion del Consejo Municipal: </strong><input id="dia_fecha_concejo_muni" <?php if (isset($dia_fecha_concejo_muni)) { ?> value="<?php echo date('d/m/y', strtotime($dia_fecha_concejo_muni)); ?>"<?php } ?>  name="dia_fecha_concejo_muni" type="text" size="5" /></td></tr>
            </table>
            </tr>
    </table>
    <p><strong>¿El diagnóstico da una visión integral de la situación actual del municipio?</strong>
        <input type="radio" name="dia_vision" value="true" <?php if (!strcasecmp($dia_vision, 't')) { ?>checked <?php } ?>>SI </input>
        <input type="radio" name="dia_vision" value="false" <?php if (!strcasecmp($dia_vision, 'f')) { ?>checked <?php } ?>>NO </input>

    </p>
    <br/><br/>

    <p>Observaciones y/o Recomendaciones:<br/>
        <textarea name="dia_observacion" cols="48" rows="5"><?php echo $dia_observacion; ?></textarea></p>

    <table>
        <tr>
        <td><div id="btn_subir"></div></td>
        <td><input class="letraazul" type="text" id="vinieta" value="Subir Documentos" size="60" style="border: none"/></td>
        </tr>
        <tr>
        <td><a <?php if (isset($dia_ruta_archivo) && $dia_ruta_archivo != '') { ?> href="<?php echo base_url() . $dia_ruta_archivo; ?>"<?php } ?>  id="btn_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
        <td><input class="letraazul" type="text" id="vinietaD" <?php if (isset($dia_ruta_archivo) && $dia_ruta_archivo != '') { ?>value="Descargar Documento"<?php } else { ?> value="No hay ningún documento para descargar" <?php } ?>size="50" style="border: none"/></td>
        </tr>
    </table>

    <center>
        <p > 
            <input type="submit" id="guardar" value="Guardar Diagnóstico" />
            <input type="button" id="cancelar" value="Cancelar" />
        </p>
    </center>
    <input id="dia_ruta_archivo" name="dia_ruta_archivo" <?php if (isset($dia_ruta_archivo) && $dia_ruta_archivo != '') { ?>value="<?php echo $dia_ruta_archivo; ?>"<?php } ?> type="text" size="100" readonly="readonly" style="visibility: hidden"/>
</form>

<div id="extension" class="mensaje" title="Error">
    <p>Solo se permiten archivos con la extensión pdf|doc|docx</p>
</div>
