<script type="text/javascript">        
    $(document).ready(function(){
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        /*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){
            $('#Mensajito').hide();
            $("#propuestaTecnicaForm").hide();
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
            $('#propuestaTecnicaForm')[0].reset();
            $("#propuestaTecnicaForm").hide();
            $.getJSON('<?php echo base_url('componente2/procesoAdministrativo/cargarPropuestaTecnica') . "/" ?>'+$('#selMun').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=="records"){
                        if(val=="0"){
                            $('#Mensajito').show();
                            $('#Mensajito').val("Este proyecto no esta registrado");
                        }
                    }
                    if(key=='rows'){
                        $.each(val, function(id, registro){
                            $('#Mensajito').hide();
                            $('#pro_id').val(registro['cell'][0]);
                            $('#pro_numero').val(registro['cell'][1]);
                            $('#pro_fsolicitud').val(registro['cell'][2]);
                            $('#pro_frecepcion').val(registro['cell'][3]);
                            $('#pro_faperturatecnica').val(registro['cell'][4]);
                            $('#pro_faperturafinanciera').val(registro['cell'][5]);
                            $('#pro_fcierre_negociacion').val(registro['cell'][6]);
                            $('#pro_ffirma_contrato').val(registro['cell'][7]);
                            $('#pro_observacion2').val(registro['cell'][8]);
                            $("#propuestaTecnicaForm").show();
                        });                    
                    }
                });
            });              
        });
        
        $("#pro_fsolicitud" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        
        /*FIN DEL DATEPICKER*/
        
        /*PARA EL DATEPICKER*/
        $( "#pro_frecepcion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        
        $( "#pro_faperturatecnica" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#pro_faperturafinanciera" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#pro_fcierre_negociacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#pro_ffirma_contrato" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        /*FIN DEL DATEPICKER*/
        $("#guardar").button().click(function() {
            fSolicitud= $('#pro_fsolicitud').datepicker("getDate");
            fRecepcion=$( "#pro_frecepcion" ).datepicker("getDate");
            fApertura=$( "#pro_faperturatecnica" ).datepicker("getDate");
            fFinanciera= $('#pro_faperturafinanciera').datepicker("getDate");
            fCierre=$( "#pro_fcierre_negociacion" ).datepicker("getDate");
            fContrato=$( "#pro_ffirma_contrato" ).datepicker("getDate");
            if(fSolicitud==null){
                $( "#pro_frecepcion" ).val('');
                $( "#pro_faperturatecnica" ).val('');
                $('#pro_faperturafinanciera').val('')
                $( "#pro_fcierre_negociacion" ).val('')
                $( "#pro_ffirma_contrato" ).val('')
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('componente2/procesoAdministrativo/guardarProceso') . "/4" ?>',
                    data: $("#propuestaTecnicaForm").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $('#efectivo').dialog('open');
                    }
                });
                return false;
            }else{
                if(fRecepcion==null){
                    $("#pro_faperturatecnica" ).val('');
                    $('#pro_faperturafinanciera').val('')
                    $( "#pro_fcierre_negociacion" ).val('')
                    $( "#pro_ffirma_contrato" ).val('')
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('componente2/procesoAdministrativo/guardarProceso') . "/4" ?>',
                        data: $("#propuestaTecnicaForm").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $('#efectivo').dialog('open');
                        }
                    });
                    return false;
                }else{
                    if(fSolicitud< fRecepcion){
                        if(fApertura==null){
                            $.ajax({
                                type: "POST",
                                url: '<?php echo base_url('componente2/procesoAdministrativo/guardarProceso') . "/4" ?>',
                                data: $("#propuestaTecnicaForm").serialize(), // serializes the form's elements.
                                success: function(data)
                                {
                                    $('#efectivo').dialog('open');
                                }
                            });
                            return false;
                        }else{
                            if(fRecepcion < fApertura){
                                $.ajax({
                                    type: "POST",
                                    url: '<?php echo base_url('componente2/procesoAdministrativo/guardarProceso') . "/4" ?>',
                                    data: $("#propuestaTecnicaForm").serialize(), // serializes the form's elements.
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
        $("#propuestaTecnicaForm").hide();               
    });
</script>



<center>
    <h2 class="h2Titulos">Pedido de propuesta técnica y financiera</h2>
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
<form id="propuestaTecnicaForm" method="post">
    <table class="procesoAdmin" border="0" cellspacing="0" >
        <tr>
        <td class="textD"><strong>No. Proceso: </strong></td>
        <td> <input value="" id="pro_numero" name="pro_numero" type="text" size="10" readonly="readonly" style="border: none; background: white;"/></td>
        </tr>
        <tr>
        <td class="textD"><strong>Fecha de solicitud: </strong></td> 
        <td><input value="" id="pro_fsolicitud" name="pro_fsolicitud" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td class="textD"> <strong>Fecha de recepción: </strong></td>
        <td><input value="" id="pro_frecepcion" name="pro_frecepcion" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td colspan="2" class="fechaAdmin" >Fecha de apertura</td>
        </tr>
        <tr>
        <td class="textD fechaAdmin"> <strong>Técnica: </strong></td>
        <td class="fechaAdmin"><input value="" id="pro_faperturatecnica" name="pro_faperturatecnica" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td class="textD fechaAdmin"> <strong>Financiera: </strong></td>
        <td class="fechaAdmin"><input value="" id="pro_faperturafinanciera" name="pro_faperturafinanciera" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td colspan="2" class="fechaAdmin" ></td>
        </tr>
        <tr>
        <td class="textD"> <strong>Fecha de cierre de negociación: </strong></td>
        <td><input value="" id="pro_fcierre_negociacion" name="pro_fcierre_negociacion" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td class="textD"> <strong>Fecha de firma de contrato: </strong></td>
        <td><input value="" id="pro_ffirma_contrato" name="pro_ffirma_contrato" type="text" size="10" readonly="readonly"/></td>
        </tr>
    </table>
    <br/><br/>
    <table style="position: relative;top: 15px;">
        <tr>
        <td>
            <p>Observaciones:<br/><textarea id="pro_observacion2" name="pro_observacion2" cols="48" rows="5"></textarea></p>
        </td>
        <td style="width: 50px"></td>
        </tr>
    </table>
    <center style="position: relative;top: 20px">
        <input type="submit" id="guardar" value="Guardar" />
        <input type="button" id="cancelar" value="Cancelar" />
    </center>
    <input id="pro_id" name="pro_id" value="" style="visibility: hidden"/>    
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
