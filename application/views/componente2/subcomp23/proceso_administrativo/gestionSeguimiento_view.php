<script type="text/javascript">        
    $(document).ready(function(){
        $("#guardar").button().click(function() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('componente2/procesoAdministrativo/guardarGestionSeguimiento') ?>',
                data: $("#seguimientoForm").serialize(),
                success: function(data)
                {
                    $('#efectivo').dialog('open');
                }
            });
            return false;
        });
        
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url("componente2/procesoAdministrativo/gestionSeguimiento"); ?>';
        });
        $('.mensaje').dialog({
            autoOpen: false,
            width: 300,
            buttons: {
                "Ok": function() {
                    $(this).dialog("close");
                }
            }
        });
        /*PARA EL DATEPICKER*/
        $( "#ges_seg_fentrega" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#ges_seg_fvobo" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#ges_seg_fconcejo" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        /*  PARA SUBIR EL ARCHIVO  */
        var button = $('#btn_acu_subir'), interval;
        new AjaxUpload('#btn_acu_subir', {
            action: '<?php echo base_url('componente2/procesoAdministrativo/subirArchivo2') . '/gestion_seguimiento/' . $ges_seg_id . '/ges_seg_id/ges_seg_acu_'; ?>',
            onSubmit : function(file , ext){
                if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                    $('#extension').dialog('open');
                    return false;
                } else {
                    $('#vinietaAcu').val('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response,ext){
                if(response!='error'){
                    $('#vinietaAcu').val('Subido con Exito');
                    this.enable();			
                    ext= (response.substring(response.lastIndexOf("."))).toLowerCase();
                    nombre=response.substring(response.lastIndexOf("/")).toLowerCase().replace('/','');
                    $('#vinietaDAcu').val('Descargar '+nombre);
                    $('#ges_seg_acu_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                    if (ext=='.pdf'){
                        $('#btn_descargarAcu').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_blank'
                        });
                    }
                    else{
                        $('#btn_descargarAcu').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_self'
                        });
                    }
                }else{
                    $('#vinietaAcu').val('El Archivo debe ser menor a 1 MB.');
                    this.enable();
                }
            }	
        });
        $('#btn_descargarAcu').click(function() {
            $.get($(this).attr('href'));
        });
        
        var button2 = $('#btn_act_subir'), interval;
        new AjaxUpload('#btn_act_subir', {
            action: '<?php echo base_url('componente2/procesoAdministrativo/subirArchivo2') . '/gestion_seguimiento/' . $ges_seg_id . '/ges_seg_id/ges_seg_act_'; ?>',
            onSubmit : function(file , ext){
                if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                    $('#extension').dialog('open');
                    return false;
                } else {
                    $('#vinietaAct').val('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response,ext){
                if(response!='error'){
                    $('#vinietaAct').val('Subido con Exito');
                    this.enable();			
                    ext= (response.substring(response.lastIndexOf("."))).toLowerCase();
                    nombre=response.substring(response.lastIndexOf("/")).toLowerCase().replace('/','');
                    $('#vinietaDAct').val('Descargar '+nombre);
                    $('#ges_seg_act_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                    if (ext=='.pdf'){
                        $('#btn_descargarAct').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_blank'
                        });
                    }
                    else{
                        $('#btn_descargarAct').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_self'
                        });
                    }
                }else{
                    $('#vinietaAct').val('El Archivo debe ser menor a 1 MB.');
                    this.enable();
                }
            }	
        });
        $('#btn_descargarAct').click(function() {
            $.get($(this).attr('href'));
        });
        
        var button3 = $('#btn_poa_subir'), interval;
        new AjaxUpload('#btn_poa_subir', {
            action: '<?php echo base_url('componente2/procesoAdministrativo/subirArchivo2') . '/gestion_seguimiento/' . $ges_seg_id . '/ges_seg_id/ges_seg_poa_'; ?>',
            onSubmit : function(file , ext){
                if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                    $('#extension').dialog('open');
                    return false;
                } else {
                    $('#vinietaPoa').val('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response,ext){
                if(response!='error'){
                    $('#vinietaPoa').val('Subido con Exito');
                    this.enable();			
                    ext= (response.substring(response.lastIndexOf("."))).toLowerCase();
                    nombre=response.substring(response.lastIndexOf("/")).toLowerCase().replace('/','');
                    $('#vinietaDPoa').val('Descargar '+nombre);
                    $('#ges_seg_poa_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                    if (ext=='.pdf'){
                        $('#btn_descargarPoa').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_blank'
                        });
                    }
                    else{
                        $('#btn_descargarPoa').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_self'
                        });
                    }
                }else{
                    $('#vinietaPoa').val('El Archivo debe ser menor a 1 MB.');
                    this.enable();
                }
            }	
        });
        $('#btn_descargarPoa').click(function() {
            $.get($(this).attr('href'));
        });
        
        var button4 = $('#btn_pip_subir'), interval;
        new AjaxUpload('#btn_pip_subir', {
            action: '<?php echo base_url('componente2/procesoAdministrativo/subirArchivo2') . '/gestion_seguimiento/' . $ges_seg_id . '/ges_seg_id/ges_seg_pip_'; ?>',
            onSubmit : function(file , ext){
                if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                    $('#extension').dialog('open');
                    return false;
                } else {
                    $('#vinietaPip').val('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response,ext){
                if(response!='error'){
                    $('#vinietaPip').val('Subido con Exito');
                    this.enable();			
                    ext= (response.substring(response.lastIndexOf("."))).toLowerCase();
                    nombre=response.substring(response.lastIndexOf("/")).toLowerCase().replace('/','');
                    $('#vinietaDPip').val('Descargar '+nombre);
                    $('#ges_seg_pip_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                    if (ext=='.pdf'){
                        $('#btn_descargarPip').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_blank'
                        });
                    }
                    else{
                        $('#btn_descargarPip').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_self'
                        });
                    }
                }else{
                    $('#vinietaPip').val('El Archivo debe ser menor a 1 MB.');
                    this.enable();
                }
            }	
        });
        $('#btn_descargarPip').click(function() {
            $.get($(this).attr('href'));
        });
        
        var button5 = $('#btn_doc_subir'), interval;
        new AjaxUpload('#btn_doc_subir', {
            action: '<?php echo base_url('componente2/procesoAdministrativo/subirArchivo2') . '/gestion_seguimiento/' . $ges_seg_id . '/ges_seg_id/ges_seg_doc_'; ?>',
            onSubmit : function(file , ext){
                if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                    $('#extension').dialog('open');
                    return false;
                } else {
                    $('#vinietaDoc').val('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response,ext){
                if(response!='error'){
                    $('#vinietaDoc').val('Subido con Exito');
                    this.enable();			
                    ext= (response.substring(response.lastIndexOf("."))).toLowerCase();
                    nombre=response.substring(response.lastIndexOf("/")).toLowerCase().replace('/','');
                    $('#vinietaDDoc').val('Descargar '+nombre);
                    $('#ges_seg_Doc_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                    if (ext=='.pdf'){
                        $('#btn_descargarDoc').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_blank'
                        });
                    }
                    else{
                        $('#btn_descargarDoc').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_self'
                        });
                    }
                }else{
                    $('#vinietaDoc').val('El Archivo debe ser menor a 1 MB.');
                    this.enable();
                }
            }	
        });
        $('#btn_descargarDoc').click(function() {
            $.get($(this).attr('href'));
        });
    });
</script>
<form id="seguimientoForm" method="post">
   <h2 class="h2Titulos">Gestión y Seguimiento</h2> <br/><br/>
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
        <td colspan="3"><center><strong>Cumplimiento de los elementos mínimos</strong></center></td>
        </tr>
        <tr>
        <td width="360">Acuerdo Municipal de compromiso con el PEP</td>
        <td><input type="radio" name="ges_seg_op1" value="true" <?php if (!strcasecmp($ges_seg_op1, 't')) { ?>checked <?php } ?> >SI </input>
            <input type="radio" name="ges_seg_op1" value="false"<?php if (!strcasecmp($ges_seg_op1, 'f')) { ?>checked <?php } ?>>NO </input>
        </td>
        <td width="5"></td>
        <td><strong>Fecha de entrega de producto: </strong>
            <input id="ges_seg_fentrega" <?php if (isset($ges_seg_fentrega)) { ?>value="<?php echo date('d-m-Y', strtotime($ges_seg_fentrega)); ?>"<?php } ?>  name="ges_seg_fentrega" type="text" size="7" />
        </td>
        </tr>
        <tr>
        <td>Acta de constitución de instancia de Participación permanente (PP)</td>
        <td><input type="radio" name="ges_seg_op2" value="true" <?php if (!strcasecmp($ges_seg_op2, 't')) { ?>checked <?php } ?> >SI </input>
            <input type="radio" name="ges_seg_op2" value="false"<?php if (!strcasecmp($ges_seg_op2, 'f')) { ?>checked <?php } ?>>NO </input>
        </td>
        <td></td>
        <td><strong>Fecha de visto bueno: </strong>
            <input id="ges_seg_fvobo" <?php if (isset($ges_seg_fvobo)) { ?>value="<?php echo date('d-m-Y', strtotime($ges_seg_fvobo)); ?>"<?php } ?>  name="ges_seg_fvobo" type="text" size="7" />
        </td>
        </tr>
        <tr>
        <td>Programa de capacitación IPP</td>
        <td><input type="radio" name="ges_seg_op3" value="true" <?php if (!strcasecmp($ges_seg_op3, 't')) { ?>checked <?php } ?> >SI </input>
            <input type="radio" name="ges_seg_op3" value="false"<?php if (!strcasecmp($ges_seg_op3, 'f')) { ?>checked <?php } ?>>NO </input>
        </td>
        <td></td>
        <td><strong>Fecha de aprobación del concejo municipal: </strong>
            <input id="ges_seg_fconcejo" <?php if (isset($ges_seg_fconcejo)) { ?>value="<?php echo date('d-m-Y', strtotime($ges_seg_fconcejo)); ?>"<?php } ?>  name="ges_seg_fconcejo" type="text" size="7" />
        </td>
        </tr>
        <tr>
        <td>Plan Operativo Anual (POA)</td>
        <td><input type="radio" name="ges_seg_op4" value="true" <?php if (!strcasecmp($ges_seg_op4, 't')) { ?>checked <?php } ?> >SI </input>
            <input type="radio" name="ges_seg_op4" value="false"<?php if (!strcasecmp($ges_seg_op4, 'f')) { ?>checked <?php } ?>>NO </input>
        </td>
        <td></td>
        <td><strong>¿Acta de recepción contiene firmas? </strong>
        </td>
        </tr>
        <tr>
        <td>Plan de Inversión Participativa (PIP)</td>
        <td><input type="radio" name="ges_seg_op5" value="true" <?php if (!strcasecmp($ges_seg_op5, 't')) { ?>checked <?php } ?> >SI </input>
            <input type="radio" name="ges_seg_op5" value="false"<?php if (!strcasecmp($ges_seg_op5, 'f')) { ?>checked <?php } ?>>NO </input>
        </td>
        <td></td>
        <td rowspan="3">
            <table>
                <tr>
                <td> <strong>Concejo Municipalidad </strong></td>
                <td><input type="radio" name="ges_seg_concejo_mun" value="true" <?php if (!strcasecmp($ges_seg_concejo_mun, 't')) { ?>checked <?php } ?> >SI </input>
                    <input type="radio" name="ges_seg_concejo_mun" value="false"<?php if (!strcasecmp($ges_seg_concejo_mun, 'f')) { ?>checked <?php } ?>>NO </input>
                </td>
                </tr>
                <tr>
                <td><strong>ISDEM</strong></td>
                <td>
                    <input type="radio" name="ges_seg_isdem" value="true" <?php if (!strcasecmp($ges_seg_isdem, 't')) { ?>checked <?php } ?> >SI </input>
                    <input type="radio" name="ges_seg_isdem" value="false"<?php if (!strcasecmp($ges_seg_isdem, 'f')) { ?>checked <?php } ?>>NO </input>      
                </td>
                </tr>
                <tr>
                <td><strong>UEP</strong></td>
                <td><input type="radio" name="ges_seg_uep" value="true" <?php if (!strcasecmp($ges_seg_uep, 't')) { ?>checked <?php } ?> >SI </input>
                    <input type="radio" name="ges_seg_uep" value="false"<?php if (!strcasecmp($ges_seg_uep, 'f')) { ?>checked <?php } ?>>NO </input></td>
                </tr>
            </table>
        </td>
        </tr>
        <tr>
        <td>Implementación de Estratégias de Seguimiento y Evaluación</td>
        <td><input type="radio" name="ges_seg_op6" value="true" <?php if (!strcasecmp($ges_seg_op6, 't')) { ?>checked <?php } ?> >SI </input>
            <input type="radio" name="ges_seg_op6" value="false"<?php if (!strcasecmp($ges_seg_op6, 'f')) { ?>checked <?php } ?>>NO </input>
        </td>
        <td></td>

        </tr>
        <tr>
        <td>Documento Síntesis del PEP</td>
        <td><input type="radio" name="ges_seg_op7" value="true" <?php if (!strcasecmp($ges_seg_op7, 't')) { ?>checked <?php } ?> >SI </input>
            <input type="radio" name="ges_seg_op7" value="false"<?php if (!strcasecmp($ges_seg_op7, 'f')) { ?>checked <?php } ?>>NO </input>
        </td>
        </tr>

    </table>
    <br/><br/>
    <table >
        <tr>
        <td colspan="4">Para actualizar un archivo basta con subir nuevamente el archivo y este se reemplaza automáticamente. Solo se permiten archivos con extensión pdf, doc, docx</td></tr>
        <tr>
        <td>
            <div id="btn_acu_subir"></div>
        </td>
        <td>
            <input class="letraazul" type="text" id="vinietaAcu" readonly="readonly" value="Subir Acuerdo Municipal" size="40" style="border: none"/>
        </td>
        <td>
            <div id="btn_act_subir"></div>
        </td>
        <td>
            <input class="letraazul" type="text" id="vinietaAct" readonly="readonly" value="Subir Acta Constitución IPP" size="40" style="border: none"/>
        </td>
        </tr>
        <tr>
        <td>
            <a <?php if (isset($ges_seg_acu_ruta_archivo) && $ges_seg_acu_ruta_archivo != '') { ?> href="<?php echo base_url() . $ges_seg_acu_ruta_archivo; ?>"<?php } ?>  id="btn_descargarAcu"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a>
        </td>
        <td>
            <input class="letraazul" type="text" id="vinietaDAcu" readonly="readonly" <?php if (isset($ges_seg_acu_ruta_archivo) && $ges_seg_acu_ruta_archivo != '') { ?>value="Descargar <?php echo $nombre_acu ?>"<?php } else { ?> value="No hay Acuerdo Municipal para descargar" <?php } ?>size="40" style="border: none"/>
        </td>
        <td>
            <a <?php if (isset($ges_seg_act_ruta_archivo) && $ges_seg_act_ruta_archivo != '') { ?> href="<?php echo base_url() . $ges_seg_act_ruta_archivo; ?>"<?php } ?>  id="btn_descargarAct"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a>
        </td>
        <td>
            <input class="letraazul" type="text" id="vinietaDAct" readonly="readonly" <?php if (isset($ges_seg_act_ruta_archivo) && $ges_seg_act_ruta_archivo != '') { ?>value="Descargar <?php echo $nombre_act ?>"<?php } else { ?> value="No hay Acta de Constitución para descargar" <?php } ?>size="40" style="border: none"/>
        </td>
        </tr>
        <tr>
        <td>
            <div id="btn_poa_subir"></div>
        </td>
        <td>
            <input class="letraazul" type="text" id="vinietaPoa" readonly="readonly" value="Subir POA" size="40" style="border: none"/>
        </td>
        <td>
            <div id="btn_pip_subir"></div>
        </td>
        <td>
            <input class="letraazul" type="text" id="vinietaPip" readonly="readonly" value="Subir PIP" size="40" style="border: none"/>
        </td>
        </tr>
        <tr>
        <td>
            <a <?php if (isset($ges_seg_poa_ruta_archivo) && $ges_seg_poa_ruta_archivo != '') { ?> href="<?php echo base_url() . $ges_seg_poa_ruta_archivo; ?>"<?php } ?>  id="btn_descargarPoa"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a>
        </td>
        <td>
            <input class="letraazul" type="text" id="vinietaDPoa" readonly="readonly" <?php if (isset($ges_seg_poa_ruta_archivo) && $ges_seg_poa_ruta_archivo != '') { ?>value="Descargar <?php echo $nombre_poa ?>"<?php } else { ?> value="No hay POA para descargar" <?php } ?>size="40" style="border: none"/>
        </td>
        <td>
            <a <?php if (isset($ges_seg_pip_ruta_archivo) && $ges_seg_pip_ruta_archivo != '') { ?> href="<?php echo base_url() . $ges_seg_pip_ruta_archivo; ?>"<?php } ?>  id="btn_descargarPip"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a>
        </td>
        <td>
            <input class="letraazul" type="text" id="vinietaDPip" readonly="readonly" <?php if (isset($ges_seg_pip_ruta_archivo) && $ges_seg_pip_ruta_archivo != '') { ?>value="Descargar <?php echo $nombre_pip ?>"<?php } else { ?> value="No hay ninguna PIP para descargar" <?php } ?>size="40" style="border: none"/>
        </td>
        </tr>
        <tr>
        <td>
            <div id="btn_doc_subir"></div>
        </td>
        <td>
            <input class="letraazul" type="text" id="vinietaDoc" readonly="readonly" value="Subir Documento Síntesis del PEP" size="40" style="border: none"/>
        </td>
        <td>
        </td>
        <td>
        </td>
        </tr>
        <tr>
        <td>
            <a <?php if (isset($ges_seg_doc_ruta_archivo) && $ges_seg_doc_ruta_archivo != '') { ?> href="<?php echo base_url() . $ges_seg_doc_ruta_archivo; ?>"<?php } ?>  id="btn_descargarDoc"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a>
        </td>
        <td>
            <input class="letraazul" type="text" id="vinietaDDoc" readonly="readonly" <?php if (isset($ges_seg_doc_ruta_archivo) && $ges_seg_doc_ruta_archivo != '') { ?>value="Descargar <?php echo $nombre_doc ?>"<?php } else { ?> value="No hay documento de síntesis para descargar" <?php } ?>size="40" style="border: none"/>
        </td>
        <td>
        </td>
        <td>
        </td>
        </tr>
    </table>
    <p>Observaciones y/o Recomendaciones:<br/>
        <textarea name="ges_seg_observacion" cols="48" rows="5"><?php if (isset($ges_seg_observacion) && $ges_seg_observacion != '') echo $ges_seg_observacion; ?></textarea></p>
    <center>
        <p > 
            <input type="submit" id="guardar" value="Guardar Gestión y Seguimiento" />
            <input type="button" id="cancelar" value="Regresar" />
        </p>
    </center>
    <input id="ges_seg_id" name="ges_seg_id" value="<?php echo $ges_seg_id?>" style="visibility: hidden"/>
    <input id="ges_seg_acu_ruta_archivo" name="ges_seg_acu_ruta_archivo" value="<?php echo $ges_seg_acu_ruta_archivo?>" style="visibility: hidden"/>
    <input id="ges_seg_act_ruta_archivo" name="ges_seg_act_ruta_archivo" value="<?php echo $ges_seg_act_ruta_archivo?>" style="visibility: hidden"/>
    <input id="ges_seg_poa_ruta_archivo" name="ges_seg_poa_ruta_archivo" value="<?php echo $ges_seg_poa_ruta_archivo?>" style="visibility: hidden"/>
    <input id="ges_seg_pip_ruta_archivo" name="ges_seg_pip_ruta_archivo" value="<?php echo $ges_seg_pip_ruta_archivo?>" style="visibility: hidden"/>
    <input id="ges_seg_doc_ruta_archivo" name="ges_seg_doc_ruta_archivo" value="<?php echo $ges_seg_doc_ruta_archivo?>" style="visibility: hidden"/>
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