<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('componente2/comp25_fase1/guardarAprobacionPerfil') ?>',
                data: $("#aprobacionPerfilForm").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $('#efectivo').dialog('open');
                }
            });
        return false;
    });
        
    $("#aprobacionPerfilForm").hide();
    /*CARGAR MUNICIPIOS*/
    $('#dep_id').change(function(){ 
        $("#aprobacionPerfilForm").hide();
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
        $('#aprobacionPerfilForm')[0].reset();
        $('input:checkbox').removeAttr('checked');
        if($('#mun_id').val()!=0){
            $.getJSON('<?php echo base_url('componente2/comp25_fase1/cargarAprobacionPerfil') . "/" ?>'+$('#mun_id').val(), 
            function(data) {
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $.each(val, function(id, registro){
                            $('#per_pro_id').val(registro['cell'][0]);
                            $('#per_pro_fentrega_isdem').val(registro['cell'][1]);
                            $('#per_pro_fentrega_uep').val(registro['cell'][2]);
                            $('#per_pro_fnota_autorizacion').val(registro['cell'][3]);
                            $('#per_pro_fentrega_u_i').val(registro['cell'][4]);
                            $('#per_pro_ftdr').val(registro['cell'][5]);
                            $('#per_pro_fespecificacion').val(registro['cell'][6]);
                            $('#per_pro_fcarpeta_reducida').val(registro['cell'][7]);
                            $('#per_pro_frecibe_municipio').val(registro['cell'][8]);
                            $('#per_pro_femision_acuerdo').val(registro['cell'][9]);
                            $('#per_pro_fcertificacion').val(registro['cell'][10]);
                            $('#per_pro_frecibe').val(registro['cell'][11]);
                            $('#per_pro_fencio_fisdl').val(registro['cell'][12]);
                            if(registro['cell'][13]!=null){
                                if(registro['cell'][13]=="t")
                                    $('input:checkbox[name=per_pro_consultor_individual]').attr("checked","checked");
                                else
                                    $('input:checkbox[name=per_pro_consultor_individual]').attr("checked",false); 
                            }
                            if(registro['cell'][14]!=null){
                                if(registro['cell'][14]=="t")
                                    $('input:checkbox[name=per_pro_firma]').attr("checked","checked");
                                else
                                    $('input:checkbox[name=per_pro_firma]').attr("checked",false); 
                            }
                            if(registro['cell'][15]!=null){
                                if(registro['cell'][15]=="t")
                                    $('input:checkbox[name=per_pro_ong]').attr("checked","checked");
                                else
                                    $('input:checkbox[name=per_pro_ong]').attr("checked",false); 
                            }
                            $('#per_pro_observacion').val(registro['cell'][16]);
                            $('#per_pro_per_ruta_archivo').val(registro['cell'][17]);
                            $('#per_pro_perD').val(registro['cell'][18]);
                            $('#per_pro_tdr_ruta_archivo').val(registro['cell'][19]);
                            $('#per_pro_tdrD').val(registro['cell'][20]);
                            $('#per_pro_esp_ruta_archivo').val(registro['cell'][21]);
                            $('#per_pro_espD').val(registro['cell'][22]);
                            $('#per_pro_car_ruta_archivo').val(registro['cell'][23]);
                            $('#per_pro_carD').val(registro['cell'][24]);
                            $('#per_pro_acu_ruta_archivo').val(registro['cell'][25]);
                            $('#per_pro_acuD').val(registro['cell'][26]);
                            $("#aprobacionPerfilForm").show();
                        });                    
                    }
                });
            });              
        }else
            $("#aprobacionPerfilForm").hide();
    });
    /*ZONA DATEPICKER*/
       
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
    $( "#per_pro_fentrega_isdem" ).datepicker({
        showOn: 'both',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd-mm-yy'
    });
    $( "#per_pro_fentrega_uep" ).datepicker({
        showOn: 'both',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd-mm-yy'
    });
    $( "#per_pro_fnota_autorizacion" ).datepicker({
        showOn: 'both',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd-mm-yy'
    });
    $( "#per_pro_fentrega_u_i" ).datepicker({
        showOn: 'both',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd-mm-yy'
    });
    $( "#per_pro_ftdr" ).datepicker({
        showOn: 'both',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd-mm-yy'
    });
    $( "#per_pro_fespecificacion" ).datepicker({
        showOn: 'both',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd-mm-yy'
    });
    $( "#per_pro_fcarpeta_reducida" ).datepicker({
        showOn: 'both',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd-mm-yy'
    });
    $( "#per_pro_frecibe_municipio" ).datepicker({
        showOn: 'both',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd-mm-yy'
    });
    $( "#per_pro_femision_acuerdo" ).datepicker({
        showOn: 'both',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd-mm-yy'
    });
    $( "#per_pro_fcertificacion" ).datepicker({
        showOn: 'both',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd-mm-yy'
    });
    $( "#per_pro_frecibe" ).datepicker({
        showOn: 'both',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd-mm-yy'
    });
    $( "#per_pro_fencio_fisdl" ).datepicker({
        showOn: 'both',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd-mm-yy'
    });
    /*ZONA DE BOTONES DE DESCARGA*/
    var button1 = $('#btn_per_subir'), interval;
    new AjaxUpload('#btn_per_subir', {
        action: '<?php echo base_url('componente2/procesoAdministrativo/subirArchivo2') . '/perfil_proyecto/'; ?>' + $('#per_pro_id').val()+  '/per_pro_id/per_pro_per_',
        onSubmit : function(file , ext){
            if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                $('#extension').dialog('open');
                return false;
            } else {
                $('#per_pro_per').val('Subiendo....');
                this.disable();
            }
        },
        onComplete: function(file, response,ext){
            if(response!='error'){
                $('#per_pro_per').val('Subido con Exito');
                this.enable();
                ext= (response.substring(response.lastIndexOf("."))).toLowerCase();
                nombre=response.substring(response.lastIndexOf("/")).toLowerCase().replace('/','');
                $('#per_pro_perD').val('Descargar '+nombre);
                $('#per_pro_per_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                if (ext=='.pdf'){
                    $('#btn_per_descargar').attr({
                        'href': '<?php echo base_url(); ?>'+response,
                        'target':'_blank'
                    });
                }
                else{
                    $('#btn_per_descargar').attr({
                        'href': '<?php echo base_url(); ?>'+response,
                        'target':'_self'
                    });
                }
            }else{
                $('#per_pro_per').val('El Archivo debe ser menor a 1 MB.');
                this.enable();			
                 
            }
                 
        }	
    });
    $('#btn_per_descargar').click(function() {
        $.get($(this).attr('href'));
    });
        
    var button2 = $('#btn_tdr_subir'), interval;
    new AjaxUpload('#btn_tdr_subir', {
        action: '<?php echo base_url('componente2/procesoAdministrativo/subirArchivo2') . '/perfil_proyecto/'; ?>' + $('#per_pro_id').val()+  '/per_pro_id/per_pro_tdr_',
        onSubmit : function(file , ext){
            if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                $('#extension').dialog('open');
                return false;
            } else {
                $('#per_pro_tdr').val('Subiendo....');
                this.disable();
            }
        },
        onComplete: function(file, response,ext){
            if(response!='error'){
                $('#per_pro_tdr').val('Subido con Exito');
                this.enable();
                ext= (response.substring(response.lastIndexOf("."))).toLowerCase();
                nombre=response.substring(response.lastIndexOf("/")).toLowerCase().replace('/','');
                $('#per_pro_tdrD').val('Descargar '+nombre);
                $('#per_pro_tdr_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                if (ext=='.pdf'){
                    $('#btn_tdr_descargar').attr({
                        'href': '<?php echo base_url(); ?>'+response,
                        'target':'_blank'
                    });
                }
                else{
                    $('#btn_tdr_descargar').attr({
                        'href': '<?php echo base_url(); ?>'+response,
                        'target':'_self'
                    });
                }
            }else{
                $('#per_pro_tdr').val('El Archivo debe ser menor a 1 MB.');
                this.enable();			
                 
            }
                 
        }	
    });
    $('#btn_tdr_descargar').click(function() {
        $.get($(this).attr('href'));
    });
        
    var button3 = $('#btn_esp_subir'), interval;
    new AjaxUpload('#btn_esp_subir', {
        action: '<?php echo base_url('componente2/procesoAdministrativo/subirArchivo2') . '/perfil_proyecto/'; ?>' + $('#per_pro_id').val()+  '/per_pro_id/per_pro_esp_',
        onSubmit : function(file , ext){
            if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                $('#extension').dialog('open');
                return false;
            } else {
                $('#per_pro_esp').val('Subiendo....');
                this.disable();
            }
        },
        onComplete: function(file, response,ext){
            if(response!='error'){
                $('#per_pro_esp').val('Subido con Exito');
                this.enable();
                ext= (response.substring(response.lastIndexOf("."))).toLowerCase();
                nombre=response.substring(response.lastIndexOf("/")).toLowerCase().replace('/','');
                $('#per_pro_espD').val('Descargar '+nombre);
                $('#per_pro_esp_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                if (ext=='.pdf'){
                    $('#btn_esp_descargar').attr({
                        'href': '<?php echo base_url(); ?>'+response,
                        'target':'_blank'
                    });
                }
                else{
                    $('#btn_esp_descargar').attr({
                        'href': '<?php echo base_url(); ?>'+response,
                        'target':'_self'
                    });
                }
            }else{
                $('#per_pro_esp').val('El Archivo debe ser menor a 1 MB.');
                this.enable();			
                 
            }
                 
        }	
    });
    $('#btn_esp_descargar').click(function() {
        $.get($(this).attr('href'));
    });
    var button4 = $('#btn_car_subir'), interval;
    new AjaxUpload('#btn_car_subir', {
        action: '<?php echo base_url('componente2/procesoAdministrativo/subirArchivo2') . '/perfil_proyecto/'; ?>' + $('#per_pro_id').val()+  '/per_pro_id/per_pro_car_',
        onSubmit : function(file , ext){
            if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                $('#extension').dialog('open');
                return false;
            } else {
                $('#per_pro_car').val('Subiendo....');
                this.disable();
            }
        },
        onComplete: function(file, response,ext){
            if(response!='error'){
                $('#per_pro_car').val('Subido con Exito');
                this.enable();
                ext= (response.substring(response.lastIndexOf("."))).toLowerCase();
                nombre=response.substring(response.lastIndexOf("/")).toLowerCase().replace('/','');
                $('#per_pro_carD').val('Descargar '+nombre);
                $('#per_pro_car_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                if (ext=='.pdf'){
                    $('#btn_car_descargar').attr({
                        'href': '<?php echo base_url(); ?>'+response,
                        'target':'_blank'
                    });
                }
                else{
                    $('#btn_car_descargar').attr({
                        'href': '<?php echo base_url(); ?>'+response,
                        'target':'_self'
                    });
                }
            }else{
                $('#per_pro_car').val('El Archivo debe ser menor a 1 MB.');
                this.enable();			
                 
            }
                 
        }	
    });
    $('#btn_car_descargar').click(function() {
        $.get($(this).attr('href'));
    });
    var button5 = $('#btn_acu_subir'), interval;
    new AjaxUpload('#btn_acu_subir', {
        action: '<?php echo base_url('componente2/procesoAdministrativo/subirArchivo2') . '/perfil_proyecto/'; ?>' + $('#per_pro_id').val()+  '/per_pro_id/per_pro_acu_',
        onSubmit : function(file , ext){
            if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                $('#extension').dialog('open');
                return false;
            } else {
                $('#per_pro_acu').val('Subiendo....');
                this.disable();
            }
        },
        onComplete: function(file, response,ext){
            if(response!='error'){
                $('#per_pro_acu').val('Subido con Exito');
                this.enable();
                ext= (response.substring(response.lastIndexOf("."))).toLowerCase();
                nombre=response.substring(response.lastIndexOf("/")).toLowerCase().replace('/','');
                $('#per_pro_acuD').val('Descargar '+nombre);
                $('#per_pro_acu_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO 
                if (ext=='.pdf'){
                    $('#btn_acu_descargar').attr({
                        'href': '<?php echo base_url(); ?>'+response,
                        'target':'_blank'
                    });
                }
                else{
                    $('#btn_acu_descargar').attr({
                        'href': '<?php echo base_url(); ?>'+response,
                        'target':'_self'
                    });
                }
            }else{
                $('#per_pro_acu').val('El Archivo debe ser menor a 1 MB.');
                this.enable();			
                 
            }
                 
        }	
    });
    $('#btn_acu_descargar').click(function() {
        $.get($(this).attr('href'));
    });
});
</script>
<center>
    <h2 class="h2Titulos">2.1. Elaboración de proyecto</h2>
    <h2 class="h2Titulos">2.1.5. Aprobación del perfil del proyecto</h2>
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
<form id="aprobacionPerfilForm" method="post">
    <hr size=2 width= 100% />
    <h2 class="h2Titulos">Para tener la nota de autorización o de aprobación por parte de la UEP el asesor/a del ISDEM deberá 
        garantizar</h2>
    <h2 class="h2Titulos">tener el perfil del proyecto aprobado por la municipalidad.</h2>
    <table>
        <tr>
        <td width="600px"><strong>0. Fecha de entrega de municipalidad a ISDEM</strong></td>
        <td style="font-style: italic">Fecha de entrega</td>
        <td width="140px"><input id="per_pro_fentrega_isdem" name="per_pro_fentrega_isdem" type="text" size="10" readonly="readonly"/>  </td>
        </tr>
        <tr>
        <td width="600px"><strong>1. ISDEM entrega a UEP perfil de proyecto firmado por la municipalidad</strong></td>
        <td style="font-style: italic">Fecha de entrega</td>
        <td><input id="per_pro_fentrega_uep" name="per_pro_fentrega_uep" type="text" size="10" readonly="readonly"/>  </td>
        </tr>
        <tr>
        <td width="600px"><strong>2. UEP emite nota de autorización</strong></td>
        <td style="font-style: italic">Fecha de emisión</td>
        <td><input id="per_pro_fnota_autorizacion" name="per_pro_fnota_autorizacion" type="text" size="10" readonly="readonly"/>  </td>
        </tr>
        <tr>
        <td width="600px"><strong>3. UEP entrega a ISDEM nota de autorización</strong></td>
        <td style="font-style: italic">Fecha de entrega</td>
        <td><input id="per_pro_fentrega_u_i" name="per_pro_fentrega_u_i" type="text" size="10" readonly="readonly"/>  </td>
        </tr>
        <tr>
        <td colspan="3"><strong>4. Asistencia técnica del ISDEM a municipalidad en elaboración de:</strong></td>
        </tr>
        <tr>
        <td width="600px" style="text-align: center"><strong>TDR</strong></td>
        <td style="font-style: italic">Fecha de término</td>
        <td><input id="per_pro_ftdr" name="per_pro_ftdr" type="text" size="10" readonly="readonly"/>  </td>
        </tr>
        <tr>
        <td width="600px" style="text-align: center"><strong>Especificaciones</strong></td>
        <td style="font-style: italic">Fecha de término</td>
        <td><input id="per_pro_fespecificacion" name="per_pro_fespecificacion" type="text" size="10" readonly="readonly"/>  </td>
        </tr>
        <tr>
        <td width="600px" style="text-align: center"><strong>Carpeta reducida</strong></td>
        <td style="font-style: italic">Fecha de término</td>
        <td><input id="per_pro_fcarpeta_reducida" name="per_pro_fcarpeta_reducida" type="text" size="10" readonly="readonly"/>  </td>
        </tr>
        <tr>
        <td width="600px"><strong>5. Municipalidad recibe documentos de aprobación de parte de UEP-ISDEM</strong></td>
        <td style="font-style: italic">Fecha de recepción de municipalidad</td>
        <td><input id="per_pro_frecibe_municipio" name="per_pro_frecibe_municipio" type="text" size="10" readonly="readonly"/>  </td>
        </tr>
        <tr>
        <td colspan="3"><strong>6. Acuerdo municipalidad de aprobación del perfil del proyecto por UEP</strong></td>
        </tr>
        <tr>
        <td width="600px" style="text-align: right"><strong>Fecha de emisión del acuerdo</strong></td>
        <td style="font-style: italic"></td>
        <td><input id="per_pro_femision_acuerdo" name="per_pro_femision_acuerdo" type="text" size="10" readonly="readonly"/>  </td>
        </tr>
        <tr>
        <td width="600px" style="text-align: right"><strong>Fecha de certificación</strong></td>
        <td style="font-style: italic"></td>
        <td><input id="per_pro_fcertificacion" name="per_pro_fcertificacion" type="text" size="10" readonly="readonly"/>  </td>
        </tr>
        <tr>
        <td width="600px" style="text-align: right"><strong>Fecha en que recibe acuerdo ISDEM</strong></td>
        <td style="font-style: italic"></td>
        <td><input id="per_pro_frecibe" name="per_pro_frecibe" type="text" size="10" readonly="readonly"/>  </td>
        </tr>
        <tr>
        <td width="600px" style="text-align: right"><strong>Fecha en que ISDEM envió a FISDL</strong></td>
        <td style="font-style: italic"></td>
        <td><input id="per_pro_fencio_fisdl" name="per_pro_fencio_fisdl" type="text" size="10" readonly="readonly"/>  </td>
        </tr>
        <tr>
        <td><strong>7. TDR del plan GRD trabajados para:   </strong> </td>
        <td colspan="2">
            <input type="checkbox" name="per_pro_consultor_individual"/>Consultor Individual
            <input type="checkbox" name="per_pro_firma"/>Firma
            <input type="checkbox" name="per_pro_ong"/>ONG
        </td>
        </tr>
        <tr>
        <td colspan="3"><strong>Observaciones:</strong><br/><textarea id="per_pro_observacion" name="per_pro_observacion" cols="48" rows="5"></textarea></td>
        </tr>
    </table>
    <table>
        <tr>
        <td><div id="btn_per_subir"></div></td>
        <td><input class="letraazul" type="text" id="per_pro_per" readonly="readonly" value="Subir perfil" size="30" readonly="readonly" style="border: none"/></td>
        <td class="tdEspacio"></td>
        <td><div id="btn_tdr_subir"></div></td>
        <td><input class="letraazul" type="text" id="per_pro_tdr" readonly="readonly" value="Subir TDR" size="30" readonly="readonly" style="border: none"/></td>
        </tr>
        <tr>
        <td><a id="btn_per_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/></a></td>
        <td><input class="letraazul" type="text" id="per_pro_perD" readonly="readonly" value="No hay perfil para descargar" size="30" style="border: none"/></td>
        <td class="tdEspacio"></td>
        <td><a id="btn_tdr_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/></a></td>
        <td><input class="letraazul" type="text" id="per_pro_tdrD" readonly="readonly" value="No hay TDR para descargar" size="30" style="border: none"/></td>
        </tr>
        <tr>
        <td colspan="5"><br/><br/></td>
        </tr>
        <tr>
        <td><div id="btn_esp_subir"></div></td>
        <td><input class="letraazul" type="text" id="per_pro_esp" readonly="readonly" value="Subir Especificaciones Técnicas" size="30" readonly="readonly" style="border: none"/></td>
        <td class="tdEspacio"></td>
        <td><div id="btn_car_subir"></div></td>
        <td><input class="letraazul" type="text" id="per_pro_car" readonly="readonly" value="Subir Carpeta Reducida" size="30" readonly="readonly" style="border: none"/></td>
        </tr>
        <tr>
        <td><a id="btn_esp_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/></a></td>
        <td><input class="letraazul" type="text" id="per_pro_espD" readonly="readonly" value="No hay Especificaciones para descargar" size="30" style="border: none"/></td>
        <td class="tdEspacio"></td>    
        <td><a id="btn_car_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/></a></td>
        <td><input class="letraazul" type="text" id="per_pro_carD" readonly="readonly" value="No hay Carpeta para descargar" size="30" style="border: none"/></td>
        </tr>
        <tr>
        <td colspan="5"><br/><br/></td>
        </tr>
        <tr>
        <td><div id="btn_acu_subir"></div></td>
        <td><input class="letraazul" type="text" id="per_pro_acu" readonly="readonly" value="Subir Acuerdo Municipal" size="30" readonly="readonly" style="border: none"/></td>
        <td class="tdEspacio"></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
        <td><a id="btn_acu_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/></a></td>
        <td><input class="letraazul" type="text" id="per_pro_acuD" readonly="readonly" value="No hay Acuerdo para descargar" size="30" style="border: none"/></td>
        <td class="tdEspacio"></td>    
        <td></td>
        <td></td>
        </tr>
    </table>
    <input id="per_pro_id" name="per_pro_id" value="" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
    <center>
        <input type="submit" id="guardar" value="Guardar" />       
    </center>
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
