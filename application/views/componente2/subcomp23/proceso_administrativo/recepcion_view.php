<script type="text/javascript">        
    $(document).ready(function(){
        /*CARGAR MUNICIPIOS*/
        $( "#etapas" ).tabs().hide();
        $('#Mensajito').hide();
        $('#selDepto').change(function(){  
            $("#etapas").hide();
            $('#Mensajito').hide();
            $('#selMun').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id='+$('#selDepto').val(), 
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
            $("#etapas").hide();
            $('#Mensajito').hide();
            $.getJSON('<?php echo base_url('componente2/procesoAdministrativo/cargarAprobacionProductos') . "/" ?>'+$('#selMun').val(), 
            function(data) {
                $("#etapas").hide();
                $('#Mensajito').hide();
                $.each(data, function(key, val) {
                    if(key=="records"){
                        if(val=="0"){
                            $('#Mensajito').show();
                            $('#Mensajito').val("Este proyecto no esta registrado");
                        }
                    }
                    if(key=='rows'){
                        i=0;
                        $.each(val, function(id, registro){
                            j=1;
                            $('#pro_eta_id_'+(i+1)).val(registro['cell'][0]);
                            $('#pro_eta_observacion_'+(i+1)).val(registro['cell'][2]);
                            $.each(registro['cell'][1], function(id, valor){
                                $("#eta"+(i+1)+"_fecha"+j).val(valor); 
                                j++;
                            });
                            i++;
                        });
                        if(i!=0){
                            $("#etapas").show();
                        }
                    }
                });
            });              
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
<?php foreach ($etapas as $etapa) { ?>
            $("#guardar<?php echo $etapa->pes_pro_id; ?>").button().click(function() {
                fecha1=$( "#eta<?php echo $etapa->pes_pro_id; ?>_fecha1" ).datepicker("getDate");
                fecha2=$( "#eta<?php echo $etapa->pes_pro_id; ?>_fecha2" ).datepicker("getDate");
                fecha3= $("#eta<?php echo $etapa->pes_pro_id; ?>_fecha3").datepicker("getDate");
                fecha4=$( "#eta<?php echo $etapa->pes_pro_id; ?>_fecha4" ).datepicker("getDate");
                fecha5=$( "#eta<?php echo $etapa->pes_pro_id; ?>_fecha5" ).datepicker("getDate");
                if(fecha1==null){
                    $( "#eta<?php echo $etapa->pes_pro_id; ?>_fecha2" ).val('');
                    $("#eta<?php echo $etapa->pes_pro_id; ?>_fecha3").val('');
                    $( "#eta<?php echo $etapa->pes_pro_id; ?>_fecha4" ).val('');
                    $( "#eta<?php echo $etapa->pes_pro_id; ?>_fecha5" ).val('');
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('componente2/procesoAdministrativo/guardarAprobacionProductos') . "/" . $etapa->pes_pro_id; ?>',
                        data: $("#recepcionAprobacion_<?php echo $etapa->pes_pro_id; ?>").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $('#efectivo').dialog('open');
                        }
                    });
                    return false;
                }else{
                    if(fecha2==null){
                        $("#eta<?php echo $etapa->pes_pro_id; ?>_fecha3").val('');
                        $( "#eta<?php echo $etapa->pes_pro_id; ?>_fecha4" ).val('');
                        $( "#eta<?php echo $etapa->pes_pro_id; ?>_fecha5" ).val('');
                        $.ajax({
                            type: "POST",
                            url: '<?php echo base_url('componente2/procesoAdministrativo/guardarAprobacionProductos') . "/" . $etapa->pes_pro_id; ?>',
                            data: $("#recepcionAprobacion_<?php echo $etapa->pes_pro_id; ?>").serialize(), // serializes the form's elements.
                            success: function(data)
                            {
                                $('#efectivo').dialog('open');
                            }
                        });
                        return false;
                    }else{
                        if(fecha1<fecha2){
                            if(fecha3==null){
                                $( "#eta<?php echo $etapa->pes_pro_id; ?>_fecha4" ).val('');
                                $( "#eta<?php echo $etapa->pes_pro_id; ?>_fecha5" ).val('');
                                $.ajax({
                                    type: "POST",
                                    url: '<?php echo base_url('componente2/procesoAdministrativo/guardarAprobacionProductos') . "/" . $etapa->pes_pro_id; ?>',
                                    data: $("#recepcionAprobacion_<?php echo $etapa->pes_pro_id; ?>").serialize(), // serializes the form's elements.
                                    success: function(data)
                                    {
                                        $('#efectivo').dialog('open');
                                    }
                                });
                                return false;
                            }else{
                                if(fecha2<fecha3){
                                    if(fecha4==null){
                                        $( "#eta<?php echo $etapa->pes_pro_id; ?>_fecha5" ).val('');
                                        $.ajax({
                                            type: "POST",
                                            url: '<?php echo base_url('componente2/procesoAdministrativo/guardarAprobacionProductos') . "/" . $etapa->pes_pro_id; ?>',
                                            data: $("#recepcionAprobacion_<?php echo $etapa->pes_pro_id; ?>").serialize(), // serializes the form's elements.
                                            success: function(data)
                                            {
                                                $('#efectivo').dialog('open');
                                            }
                                        });
                                        return false;
                                    }else{
                                        if(fecha3<fecha4){
                                            if(fecha5==null){
                                                $.ajax({
                                                    type: "POST",
                                                    url: '<?php echo base_url('componente2/procesoAdministrativo/guardarAprobacionProductos') . "/" . $etapa->pes_pro_id; ?>',
                                                    data: $("#recepcionAprobacion_<?php echo $etapa->pes_pro_id; ?>").serialize(), // serializes the form's elements.
                                                    success: function(data)
                                                    {
                                                        $('#efectivo').dialog('open');
                                                    }
                                                });
                                                return false;
                                            }else{
                                                if(fecha4<fecha5){
                                                    $.ajax({
                                                        type: "POST",
                                                        url: '<?php echo base_url('componente2/procesoAdministrativo/guardarAprobacionProductos') . "/" . $etapa->pes_pro_id; ?>',
                                                        data: $("#recepcionAprobacion_<?php echo $etapa->pes_pro_id; ?>").serialize(), // serializes the form's elements.
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
                }
                        
            });
                        
            $("#cancelar<?php echo $etapa->pes_pro_id; ?>").button();
    <?php foreach ($fechas as $fecha) { ?>
                    $("#eta<?php echo $etapa->pes_pro_id; ?>_fecha<?php echo $fecha->nom_fec_apr_id; ?>").datepicker({
                        showOn: 'both',
                        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
                        buttonImageOnly: true, 
                        dateFormat: 'dd-mm-yy'
                    });
        <?php
    }
}
?>
        
    });
</script>
<center>
    <h2 class="h2Titulos">Procesos de recepción y aprobación de productos</h2>
    <br/>
    <table>
        <tr>
        <td><strong>Departamento</strong></td>
        <td><select id='selDepto'>
                <option value='0'>--Seleccione--</option>
                <?php foreach ($departamentos as $depto) { ?>
                    <option value='<?php echo $depto->dep_id; ?>'><?php echo $depto->dep_nombre; ?></option>
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
<br/><br/><br/>
<input value="" id="Mensajito" type="text" size="100" readonly="readonly" style="border: none;"/>
<div id="etapas">
    <ul>
        <?php foreach ($etapas as $etapa) { ?>
            <li><a href="#eta<?php echo $etapa->pes_pro_id; ?>"><?php echo $etapa->pes_pro_nombre; ?></a></li>
        <?php } ?>
    </ul>
    <?php foreach ($etapas as $etapa) { ?>
        <div id="eta<?php echo $etapa->pes_pro_id; ?>">
            <form id="recepcionAprobacion_<?php echo $etapa->pes_pro_id; ?>" method="post">
                <table class="procesoAdmin">
                    <?php foreach ($fechas as $fecha) { ?>
                        <tr>
                        <td class="textD"><strong><?php echo $fecha->nom_fec_apro_nombre; ?></strong></td>
                        <td width="15px"></td>
                        <td><input value="" id="eta<?php echo $etapa->pes_pro_id; ?>_fecha<?php echo $fecha->nom_fec_apr_id; ?>" name="eta<?php echo $etapa->pes_pro_id; ?>_fecha<?php echo $fecha->nom_fec_apr_id; ?>" type="text" size="10" readonly="readonly"/></td>
                        </tr>
                    <?php } ?>
                    <tr><td colspan="3" >
                        Observaciones:<br/><textarea id="pro_eta_observacion_<?php echo $etapa->pes_pro_id; ?>" name="pro_eta_observacion_<?php echo $etapa->pes_pro_id; ?>" cols="48" rows="5"></textarea>
                    </td></tr>
                    <tr><td colspan="3" align="center">
                        <input type="submit" id="guardar<?php echo $etapa->pes_pro_id; ?>" value="Guardar <?php echo $etapa->pes_pro_nombre; ?>" />
                        <input type="button" id="cancelar<?php echo $etapa->pes_pro_id; ?>" value="Cancelar" />
                    </td>
                    </tr>
                </table>
                <input id="pro_eta_id_<?php echo $etapa->pes_pro_id; ?>" name="pro_eta_id_<?php echo $etapa->pes_pro_id; ?>" style="visibility:hidden" ></input>
            </form>
        </div>
    <?php } ?>
</div>
<br/><br/><br/>
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

