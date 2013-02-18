<script type="text/javascript">        
    $(document).ready(function(){
        /*VARIABLES*/
        $("#guardar").button().click(function() {
            fecha1= $('#pla_tra_forden_inicio').datepicker("getDate");
            fecha2=$( "#pla_tra_fentrega_plan" ).datepicker("getDate");
            fecha3=$( "#pla_tra_frecepcion_obs" ).datepicker("getDate");
            fecha4= $('#pla_tra_fsuperacion_obs').datepicker("getDate");
            fecha5=$( "#pla_tra_fvisto_bueno" ).datepicker("getDate");
            fecha6=$( "#pla_tra_fpresentacion" ).datepicker("getDate");
            fecha7=$( "#pla_tra_frecepcion" ).datepicker("getDate");
            if(fecha1==null){
                $( "#pla_tra_fentrega_plan" ).val('');
                $( "#pla_tra_frecepcion_obs" ).val('');
                $('#pla_tra_fsuperacion_obs').val('');
                $( "#pla_tra_fvisto_bueno" ).val('');
                $( "#pla_tra_fpresentacion" ).val('');
                $( "#pla_tra_frecepcion" ).val('');
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('componente2/comp23_E0/guardarPlanTrabajo'); ?>',
                    data: $("#planTrabajoConsulForm").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $('#efectivo').dialog('open');
                    }
                });
                return false;
            }else{
                if(fecha2==null){
                    $( "#pla_tra_frecepcion_obs" ).val('');
                    $('#pla_tra_fsuperacion_obs').val('');
                    $( "#pla_tra_fvisto_bueno" ).val('');
                    $( "#pla_tra_fpresentacion" ).val('');
                    $( "#pla_tra_frecepcion" ).val('');
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('componente2/comp23_E0/guardarPlanTrabajo'); ?>',
                        data: $("#planTrabajoConsulForm").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $('#efectivo').dialog('open');
                        }
                    });
                    return false;
                }else{
                    if(fecha1<fecha2){
                        if(fecha3==null){
                            $('#pla_tra_fsuperacion_obs').val('');
                            $( "#pla_tra_fvisto_bueno" ).val('');
                            $( "#pla_tra_fpresentacion" ).val('');
                            $( "#pla_tra_frecepcion" ).val('');
                            $.ajax({
                                type: "POST",
                                url: '<?php echo base_url('componente2/comp23_E0/guardarPlanTrabajo'); ?>',
                                data: $("#planTrabajoConsulForm").serialize(), // serializes the form's elements.
                                success: function(data)
                                {
                                    $('#efectivo').dialog('open');
                                }
                            });
                            return false;
                        }else{
                            if(fecha2<fecha3){
                                if(fecha4==null){
                                    $( "#pla_tra_fvisto_bueno" ).val('');
                                    $( "#pla_tra_fpresentacion" ).val('');
                                    $( "#pla_tra_frecepcion" ).val('');
                                    $.ajax({
                                        type: "POST",
                                        url: '<?php echo base_url('componente2/comp23_E0/guardarPlanTrabajo'); ?>',
                                        data: $("#planTrabajoConsulForm").serialize(), // serializes the form's elements.
                                        success: function(data)
                                        {
                                            $('#efectivo').dialog('open');
                                        }
                                    });
                                    return false;
                                }else{
                                    if(fecha3<fecha4){
                                        if(fecha5==null){
                                            $( "#pla_tra_fpresentacion" ).val('');
                                            $( "#pla_tra_frecepcion" ).val('');
                                            $.ajax({
                                                type: "POST",
                                                url: '<?php echo base_url('componente2/comp23_E0/guardarPlanTrabajo'); ?>',
                                                data: $("#planTrabajoConsulForm").serialize(), // serializes the form's elements.
                                                success: function(data)
                                                {
                                                    $('#efectivo').dialog('open');
                                                }
                                            });
                                            return false;
                                        }else{
                                            if(fecha4<fecha5){
                                                if(fecha6==null){
                                                    $( "#pla_tra_frecepcion" ).val('');
                                                    $.ajax({
                                                        type: "POST",
                                                        url: '<?php echo base_url('componente2/comp23_E0/guardarPlanTrabajo'); ?>',
                                                        data: $("#planTrabajoConsulForm").serialize(), // serializes the form's elements.
                                                        success: function(data)
                                                        {
                                                            $('#efectivo').dialog('open');
                                                        }
                                                    });
                                                    return false;
                                                }else{
                                                    if(fecha5<fecha6){
                                                        if(fecha7==null){
                                                            $.ajax({
                                                                type: "POST",
                                                                url: '<?php echo base_url('componente2/comp23_E0/guardarPlanTrabajo'); ?>',
                                                                data: $("#planTrabajoConsulForm").serialize(), // serializes the form's elements.
                                                                success: function(data)
                                                                {
                                                                    $('#efectivo').dialog('open');
                                                                }
                                                            });
                                                            return false;
                                                        }else{
                                                            if(fecha6<fecha7){
                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: '<?php echo base_url('componente2/comp23_E0/guardarPlanTrabajo'); ?>',
                                                                    data: $("#planTrabajoConsulForm").serialize(), // serializes the form's elements.
                                                                    success: function(data)
                                                                    {
                                                                        $('#efectivo').dialog('open');
                                                                    }
                                                                });
                                                                return false;
                                                            }else{
                                                                $('#fechaValidacion').dialog('open');
                                                                return false;
                                                            }
                                                        }
                                                    }else{
                                                        $('#fechaValidacion').dialog('open');
                                                        return false;
                                                    }
                                                }
                                            }else{
                                                $('#fechaValidacion').dialog('open');
                                                return false;
                                            }
                                        }
                                    }else{
                                        $('#fechaValidacion').dialog('open');
                                        return false;
                                    }
                                }
                            }else{
                                $('#fechaValidacion').dialog('open');
                                return false;
                            }
                        }
                    }else{
                        $('#fechaValidacion').dialog('open');
                        return false;
                    }
                }
            }
        });
        
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        $('#selConsul').change(function(){ 
            $("#planTrabajoConsulForm").hide();
            $('#selDepto').children().remove();
            $.getJSON('<?php echo base_url('componente2/comp23_E0/cargarDeptosPorConsultora') ?>/'+$('#selConsul').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#selDepto').append('<option value="0">-- Seleccione --</option>');
                        $.each(val, function(id, registro){
                            $('#selDepto').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });
            $('#selMun').children().remove();
            $('#selMun').append('<option value="0">-- Seleccione --</option>');
        });
        $('.mensaje').dialog({
            autoOpen: false,
            width: 400,
            buttons: {
                "Ok": function() {
                    $(this).dialog("close");
                }
            }
        });
        /*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){   
            $('#selMun').children().remove();
            $.getJSON('<?php echo base_url('componente2/comp23_E0/cargarMuniPorConsultora') ?>/'+$('#selDepto').val()+'/'+$('#selConsul').val(),  
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#selMun').append('<option value="0">--Seleccione Municipio--</option>');
                        $.each(val, function(id, registro){
                            $('#selMun').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        $('#selMun').change(function(){   
            $('#planTrabajoConsulForm')[0].reset();
            $.getJSON('<?php echo base_url('componente2/comp23_E0/cargarPlanTrabajo') . "/" ?>'+$('#selMun').val(), 
            function(data) {
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $.each(val, function(id, registro){
                            $('#pla_tra_id').val(registro['cell'][0]);
                            $('#pla_tra_forden_inicio').val(registro['cell'][1]);
                            $('#pla_tra_fentrega_plan').val(registro['cell'][2]);
                            $('#pla_tra_frecepcion_obs').val(registro['cell'][3]);
                            $('#pla_tra_fsuperacion_obs').val(registro['cell'][4]);
                            $('#pla_tra_fvisto_bueno').val(registro['cell'][5]);
                            $('#pla_tra_fpresentacion').val(registro['cell'][6]);
                            $('#pla_tra_frecepcion').val(registro['cell'][7]);
                            if(registro['cell'][8]!=null){
                                if(registro['cell'][8]=='t')
                                    $('input:radio[name=pla_tra_firmada_mun]')[0].checked = true;
                                else
                                    $('input:radio[name=pla_tra_firmada_mun]')[1].checked = true;
                            }
                            if(registro['cell'][9]!=null){
                                if(registro['cell'][9]=='t')
                                    $('input:radio[name=pla_tra_firmada_isdem]')[0].checked = true;
                                else
                                    $('input:radio[name=pla_tra_firmada_isdem]')[1].checked = true;
                            }
                            if(registro['cell'][10]!=null){
                                if(registro['cell'][10]=='t')
                                    $('input:radio[name=pla_tra_firmada_uep]')[0].checked = true;
                                else
                                    $('input:radio[name=pla_tra_firmada_uep]')[1].checked = true;
                            }
                            $('#pla_tra_ruta_archivo').val(registro['cell'][11]);
                            $('#pla_tra_observaciones').val(registro['cell'][12]);
                            $('#vinietaD').val(registro['cell'][13]);
                            $("#planTrabajoConsulForm").show();
                        });                    
                    }
                });
            }); 
        
        });
        /*PARA LOS DATEPICKER*/
        $( "#pla_tra_forden_inicio" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#pla_tra_fentrega_plan" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#pla_tra_frecepcion_obs" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#pla_tra_fsuperacion_obs" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#pla_tra_fvisto_bueno" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#pla_tra_fpresentacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#pla_tra_frecepcion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
   
        /*FIN DEL DATEPICKER*/
        $("#planTrabajoConsulForm").hide();
        var button = $('#btn_subir'), interval;
        new AjaxUpload('#btn_subir', {
            action: '<?php echo base_url('componente2/comp23_E1/subirArchivo') . '/plan_trabajo/'; ?>'+ $('#pla_tra_id').val()+ '/pla_tra_id',
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
                    $('#pla_tra_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
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
     
  
    });
</script>
<h2 class="h2Titulos">Etapa 0: Selección de Municipios</h2>
<h2 class="h2Titulos">Plan de trabajo de las consultoras</h2>
<br/>
<center>
    <table>
        <tr>
        <td class="textD" ><strong>Consultora</strong></td>
        <td> <select id='selConsul'>
                <option value='0'>--Seleccione Consultora--</option>
                <?php foreach ($consultoras as $consultora) { ?>
                    <option value='<?php echo $consultora->cons_id; ?>'><?php echo $consultora->cons_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>     
        <tr>
        <td class="textD" ><strong>Departamento</strong></td>
        <td>
            <select id='selDepto'>
                <option value='0'>--Seleccione Departamento--</option>
            </select>
        </td>
        </tr>
        <tr>
        <td class="textD" ><strong>Municipio</strong></td>
        <td>
            <select id='selMun'>
                <option value='0'>--Seleccione Municipio--</option>
            </select>
        </td>
        </tr>
    </table>
</center>
<br/>
<form id="planTrabajoConsulForm" method="post">
    <table>
        <tr><td style="width: 100px"> 
        <td class="textD"><strong>Fecha de orden de inicio: </strong> </td>
        <td>
            <input id="pla_tra_forden_inicio" name="pla_tra_forden_inicio" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>   
        <tr><td style="width: 100px"> 
        <td class="textD"><strong>Fecha de entrega de plan: </strong> </td>
        <td>
            <input id="pla_tra_fentrega_plan" name="pla_tra_fentrega_plan" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>  
        <tr><td style="width: 100px"> 
        <td class="textD"><strong>Fecha de recepción de observaciones: </strong> </td>
        <td>
            <input id="pla_tra_frecepcion_obs" name="pla_tra_frecepcion_obs" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>  
        <tr><td style="width: 100px"> 
        <td class="textD"><strong>Fecha de visto bueno: </strong> </td>
        <td>
            <input id="pla_tra_fsuperacion_obs" name="pla_tra_fsuperacion_obs" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>  
        <tr><td style="width: 100px"> 
        <td class="textD"><strong>Fecha de visto bueno al plan: </strong> </td>
        <td>
            <input id="pla_tra_fvisto_bueno" name="pla_tra_fvisto_bueno" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>  
        <tr><td style="width: 100px"> 
        <td class="textD"><strong>Fecha de presentación al concejo municipal: </strong> </td>
        <td>
            <input id="pla_tra_fpresentacion" name="pla_tra_fpresentacion" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>  
        <tr><td style="width: 100px"> 
        <td class="textD"><strong>Fecha de recepción del producto final UEP: </strong> </td>
        <td>
            <input id="pla_tra_frecepcion" name="pla_tra_frecepcion" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>  

    </table>
    <br/>
    <table><tr><td style="width: 50px"> <td><p><strong>¿Acta de aceptación contiene firmas?</strong></p></td></tr></table>
    <table>
        <tr><td style="width: 100px"> 
        <td>Municipalidad</td>
        <td>
            <input type="radio" name="pla_tra_firmada_mun" value="true">SI </input>
            <input type="radio" name="pla_tra_firmada_mun" value="false">NO </input>
        </td>
        <td style="width: 150px"> </td>
        <td><div id="btn_subir"></div></td>
        <td><input class="letraazul" type="text" id="vinieta" readonly="readonly" value="Subir Acta" size="30" style="border: none"/></td>
        </tr>
        <tr><td style="width: 100px"> 
        <td>ISDEM</td>
        <td>
            <input type="radio" name="pla_tra_firmada_isdem" value="true"  >SI </input>
            <input type="radio" name="pla_tra_firmada_isdem" value="false" >NO </input>
        </td>
        <td style="width: 150px"> </td>
        <td><a id="btn_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
        <td><input class="letraazul" type="text" id="vinietaD" readonly="readonly" size="35" style="border: none"/></td>
        </tr>
        <tr><td style="width: 100px"> 
        <td>UEP</td>
        <td>
            <input type="radio" name="pla_tra_firmada_uep" value="true" >SI </input>
            <input type="radio" name="pla_tra_firmada_uep" value="false">NO </input>
        </td>
        <td style="width: 150px"> </td>
        <td>
        </td>
        </tr>
    </table>
    <center>
        <table style="position: relative;top: 15px;">
            <tr>
            <td>
                <p>Comentarios:<br/><textarea id="pla_tra_observaciones" name="pla_tra_observaciones" cols="60" rows="5"><?php if (isset($pla_tra_observaciones)) echo $pla_tra_observaciones; ?></textarea></p>
            </td>
            <td style="width: 50px"></td>


            </tr>
        </table>
    </center>
    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Guardar Solicitud" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
    <input id="pla_tra_ruta_archivo" name="pla_tra_ruta_archivo" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
    <input id="pla_tra_id" name="pla_tra_id" value="" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
</form>
<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>
<div id="extension" class="mensaje" title="Error">
    <p>Solo se permiten archivos con la extensión pdf|doc|docx</p>
</div>
<div id="fechaValidacion" class="mensaje" title="Error en fechas">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/cancel.png'); ?>" class="imagenError" />Las fechas deben de ir en orden ascendente</p>
    </center>
</div>
