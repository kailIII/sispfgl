<script type="text/javascript">        
    $(document).ready(function(){
        /*VARIABLES*/
        $("#guardar").button().click(function() {
            if($('#selEta').val()==0){
                $('#selEtapa').dialog('open');
            }else{
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('componente2/comp23_E0/guardarAporteMunicipal'); ?>',
                    data: $("#registroAporteMunicipalForm").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $('#efectivo').dialog('open');
                    }
                });
            }
            return false;
        });
        
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });

        /*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){
            $('#selEta').val(0);
            $('#selMun').children().remove();
            $.getJSON('<?php echo base_url('componente2/comp23_E0/cargarMuniSeleccionados') ?>/'+$('#selDepto').val(), 
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
            $('#registroAporteMunicipalForm')[0].reset();
            $(".ck:checkbox:checked").removeAttr("checked");
            $('#especifique_6').hide();
            $('#lespecifique').hide();
            $('#selEta').val(0);
        });
        $('#selEta').change(function(){
            $('#registroAporteMunicipalForm')[0].reset();
            $(".ck:checkbox:checked").removeAttr("checked");
            $('#especifique_6').hide();
            $('#lespecifique').hide();
            if($('#selMun').val()!=0){
                $.getJSON('<?php echo base_url('componente2/comp23_E0/cargarAporteMunicipal') ?>/'+$('#selMun').val()+'/'+$('#selEta').val(), 
                function(data) {
                    $.each(data, function(key, val) {
                        if(key=='rows'){
                            $.each(val, function(id, registro){
                                $('#apo_mun_id').val(registro['cell'][0]);
                                $('#apo_mun_monto_estimado').val(registro['cell'][1]);
                                $('#apo_mun_faprobacion').val(registro['cell'][2]);
                                $('#apo_mun_observaciones').val(registro['cell'][3]);
                                $.each(registro['cell'][4], function(llave,valor ) {
                                    if(valor[1]=='t'){
                                        $("#con_"+valor[0]).attr("checked","checked");
                                        if(valor[3]=='Otro'){
                                            $('#especifique_'+valor[0]).show().val(valor[2]);
                                            $('#lespecifique').show();
                                        }
                                    }
                                });
                            });                    
                        }
                    });
                }); 
            }else{
                $('#municipio').dialog('open');
            }
        });
       
        /*PARA LOS DATEPICKER*/
        $( "#apo_mun_faprobacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
         
        /*FIN DEL DATEPICKER*/
<?php
foreach ($contrapartidas as $aux) {
    if (!strcasecmp($aux->con_nombre, 'Otro')) {
        ?>
                        $('#especifique_<?php echo $aux->con_id; ?>').hide();
                        $('#lespecifique').hide();
                        $("#con_<?php echo $aux->con_id; ?>").click(function() { 
                            if ($("#con_<?php echo $aux->con_id; ?>").is(':checked')) {  
                                $('#especifique_<?php echo $aux->con_id; ?>').show();
                                $('#lespecifique').show();
                            }else{
                                $('#especifique_<?php echo $aux->con_id; ?>').hide();
                                $('#lespecifique').hide();
                            }
                        });
        <?php
    }
}
?>
        $('.mensaje').dialog({
            autoOpen: false,
            width: 300,
            buttons: {
                "Ok": function() {
                    $(this).dialog("close");
                }
            }
        });
        $(".numeric").numeric();
    });
</script>
<h2 class="h2Titulos">Registro de Aportes de la Municipalidad</h2>
<br/>
<center>
    <table>
        <tr>
        <td class="textD"><strong>Departamento:</strong></td>
        <td>
            <select id='selDepto'>
                <option value='0'>--Seleccione Departamento--</option>
                <?php foreach ($departamentos as $depar) { ?>
                    <option value='<?php echo $depar->dep_id; ?>'><?php echo $depar->dep_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
        <tr>
        <td class="textD"><strong>Municipio:</strong></td>
        <td >
            <select id='selMun'>
                <option value='0'>--Seleccione Municipio--</option>
            </select>
        </td>    
        </tr>
    </table>
    <br/>

    <table>
        <tr>
        <td class="textD"><strong>Etapa a la que se aportará:</strong></td>
        <td>
            <select id='selEta'>
                <option value='0'>--Seleccione Etapa--</option>
                <?php foreach ($etapas as $eta) { ?>
                    <option value='<?php echo $eta->eta_id; ?>'><?php echo $eta->eta_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
    </table>
</center>

<form id="registroAporteMunicipalForm" method="post">
    <center>
        <table>
            <tr>
            <td class="textD"><strong>Fecha: </strong> </td>
            <td>
                <input id="apo_mun_faprobacion" name="apo_mun_faprobacion" type="text" size="10" readonly="readonly"/>
            </td>
            </tr>  
        </table>
        <br/>
        <table>
            <tr>
            <td>
                <table>
                    <tr>
                    <td colspan="2"><strong>Seleccione el tipo de aporte</strong></td>
                    </tr>
                    <?php foreach ($contrapartidas as $aux) { ?>
                        <tr>
                        <td><input class="ck" type="checkbox" name="con_<?php echo $aux->con_id; ?>" id="con_<?php echo $aux->con_id; ?>" value="local"></td>
                        <td><?php echo $aux->con_nombre; ?></td>
                        </tr>
                        <?php if (!strcasecmp($aux->con_nombre, 'Otro')) { ?>
                            <tr>
                            <td></td>
                            <td>
                                <input value="Especifique:" type="text" name="lespecifique" id="lespecifique" size="8" style="border:none;background: white;" readonly="readonly"/>
                                <input type="text" name="especifique_<?php echo $aux->con_id; ?>" id="especifique_<?php echo $aux->con_id; ?>" size="12"/>
                            </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                    <td style="width: 30px"></td>    
                    <td>El formato del monto es $99999.99 sin coma <br/>para separador de miles</td>    
                    </tr>
                    <tr>   
                    <td style="width: 30px"></td>    
                    <td><br/>
                        <strong>Monto estimado ($)</strong><input type="text" class="numeric" name="apo_mun_monto_estimado" id="apo_mun_monto_estimado" value="" size="15"/>
                    </td>
                    </tr>
                    <tr>
                    <td style="width: 30px"></td> 
                    <td>
                        <p><strong>Observaciones:</strong><br/><textarea id="apo_mun_observaciones" name="apo_mun_observaciones" cols="40" rows="5"></textarea></p>
                    </td>
                    </tr>
                </table>
            </td>
            </tr>
        </table>
    </center>
    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Guardar Registro" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
    <input type="text" name="apo_mun_id" id="apo_mun_id" size="12" style="visibility: hidden"/>
</form>
<div id="municipio" class="mensaje" title="Recordar:">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/cancel.png'); ?>" class="imagenError" />Debe seleccionar un municipio para registrar</p>
    </center>
</div>
<div id="selEtapa" class="mensaje" title="Recordar:">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/cancel.png'); ?>" class="imagenError" />Debe seleccionar una etapa para registrar su aporte</p>
    </center>
</div>
<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>