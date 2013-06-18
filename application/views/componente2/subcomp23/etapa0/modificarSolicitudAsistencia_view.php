<script type="text/javascript">        
    $(document).ready(function(){
        /*VARIABLES*/
               
        $("#modificar").button().click(function() {
            $("#seleccionMunicipiosForm").submit(function(event){
                if ($("#seleccionMunicipiosForm").validate().form() == true){      
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('componente2/comp23_E0/actualizarSolicitud'); ?>',
                        data: $("#seleccionMunicipiosForm").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $('#efectivo').dialog('open');
                        }
                    });
                    return false;
                }
            });
        });
        
        
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/comp23_E0/gestionsolicitudAsistencia'); ?>';
        });

        /*PARA EL DATEPICKER*/
        $( "#solicitud_fecha" ).datepicker({
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
 
        var button = $('#btn_subir'), interval;
        new AjaxUpload('#btn_subir', {
            action: '<?php echo base_url('componente2/comp23_E1/subirArchivo') . '/solicitud_asistencia/' . $idfila . '/sol_asis_id'; ?>',
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
                    $('#sol_asis_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
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
        $('#telefono').mask("9999-9999",{placeholder:"_"}); 
        $('#seleccionMunicipiosForm').validate({
            rules: {
                leido_cri: {
                    required: true
                },
                cumple_cri: {
                    required: true
                },
                solicitud_fecha: {
                    required: true
                },
                nombre_solicitante: {
                    required: true,
                    maxlength: 50
                },
                cargo: {
                    required: true,
                    maxlength: 50
                },
                telefono:{
                    required: true
                }
                
            }
        });   
    });
</script>


<form id="seleccionMunicipiosForm" method="post">
    <h2 class="h2Titulos">Solicitud de asistencia técnica para la elaboración de planes estratégicos participativos</h2>
    <br/>
    <br/>
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
    <p>
        Los criterios que establece el manual operativo del PFGL para poder solicitar asistencia técnica para la elaboración de planes estratégicos participativos de desarrollo con énfasis en
        desarrollo económico de su territorio son los siguientes:
    </p>

    <ol>
        <?php
        foreach ($criterios as $criterio) {
            ?>    
            <li><?php echo $criterio->criterio_nombre; ?></li>
            <?php
        }
        ?>
    </ol>
    <p><strong>Nota:</strong> para que el registro sea valido deberá 
        entregar al asesor-a del ISDEM que visita su municipio la solicitud 
        original firmada y sellada en el plazo de 30 días a partir del 
        registro en línea.  
        <br/>
        El asesor-a firmará de visto bueno el cumplimiento de criterios que respaldan la solicitud.</p>
    <br/>

    <table>
        <tr><td style="width: 100px"></td>
        <td style="width: 600px"> 
            He leido los criterios que establece el manual operativo 
            <input type="radio" name="leido_cri" value="true"<?php if (isset($leido_cri) && $leido_cri == 't') { ?> checked <?php } ?>>SI </input>
            <input type="radio" name="leido_cri" value="false"<?php if (isset($leido_cri) && $leido_cri == 'f') { ?> checked <?php } ?> >NO </input>
        </td>
        </tr>

        <tr><td style="width: 100px"></td>
        <td style="width: 600px"> 
            La municipalidad cumple con los criterios establecidos 
            <input type="radio" name="cumple_cri" value="true" <?php if (isset($cumple_cri) && $cumple_cri == 't') { ?> checked <?php } ?> >SI </input>
            <input type="radio" name="cumple_cri" value="false" <?php if (isset($cumple_cri) && $cumple_cri == 'f') { ?> checked <?php } ?>>NO </input>
        </td>
        </tr>
    </table>

    <br/>
    <br/>
    <table>

        <tr>
        <td class="textD"><strong>Fecha de solicitud: </strong> </td>
        <td>
            <input <?php if (isset($solicitud_fecha)) { ?> value='<?php echo date('d/m/y', strtotime($solicitud_fecha)); ?>'<?php } ?>id="solicitud_fecha" name="solicitud_fecha" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>
        <tr>
        <td class="textD"><strong>Nombre del solicitante: </strong></td>
        <td><input id="nombre_solicitante" name="nombre_solicitante" type="text" size="50" value="<?php echo $nombre_solicitante ?>" /></td>
        </tr>
        <tr>
        <td class="textD"><strong>Cargo: </strong></td>
        <td><input id="cargo" name="cargo" type="text" size="50" value="<?php echo $cargo ?>"/><br/></td>
        </tr>
        <tr>
        <td class="textD"><strong>Telefono:</strong> </td>
        <td><input id="telefono" name="telefono"type="text" size="9" value="<?php echo $telefono ?>"/></td>
        </tr>
    </table> 

    <table style="position: relative;top: 15px;">
        <tr>
        <td>
            <p>Comentarios:<br/><textarea id="comentarios" name="comentarios" cols="48" rows="5"><?php if (isset($comentarios)) echo$comentarios; ?></textarea></p>
        </td>
        <td style="width: 50px"></td>
        <td>
            <table>
                <tr><td colspan="2">Para actualizar un archivo basta con subir nuevamente el archivo y este se reemplaza automáticamente. Solo se permiten archivos con extensión pdf, doc, docx</td></tr>
                <tr>
                <td><div id="btn_subir"></div></td>
                <td><input class="letraazul" type="text" id="vinieta" readonly="readonly" value="Subir Solicitud" size="30" style="border: none"/></td>
                </tr>
                <tr>
                <td><a <?php if (isset($sol_asis_ruta_archivo) && $sol_asis_ruta_archivo != '') { ?> href="<?php echo base_url() . $sol_asis_ruta_archivo; ?>"<?php } ?>  id="btn_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
                <td><input class="letraazul" type="text" id="vinietaD" readonly="readonly" <?php if (isset($sol_asis_ruta_archivo) && $sol_asis_ruta_archivo != '') { ?>value="Descargar <?php echo $nombreArchivo ?>"<?php } else { ?> value="No Hay Solicitudes Por Descargar" <?php } ?>size="35" style="border: none"/></td>
                </tr>
            </table> 
        </td>
        </tr>
    </table>

    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="modificar" value="Modificar Solicitud" />
                <input type="button" id="cancelar" value="Regresar" />
            </p>
        </div>
    </center>
    <input id="sol_asis_ruta_archivo" name="sol_asis_ruta_archivo" <?php if (isset($sol_asis_ruta_archivo) && $sol_asis_ruta_archivo != '') { ?>value="<?php echo $sol_asis_ruta_archivo; ?>"<?php } ?> type="text" size="100" readonly="readonly" style="visibility: hidden"/>
    <input id="idfila" type="text" name="idfila" value="<?php echo $idfila ?>" style="visibility: hidden"/>
    <input id="id_mun" type="text" name="id_mun" value="<?php echo $id_mun ?>" style="visibility: hidden"/>
</form>
<div id="extension" class="mensaje" title="Error">
    <p>Solo se permiten archivos con la extensión pdf|doc|docx</p>
</div>
<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>