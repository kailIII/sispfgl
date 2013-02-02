<script type="text/javascript">        
    $(document).ready(function(){
        /*CARGAR MUNICIPIOS*/
        $( "#etapas" ).tabs().hide();
        $('#Mensajito').hide();
        $('#selDepto').change(function(){   
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
            $( "#etapas" ).hide();
            $('#Mensajito').hide();
            $.getJSON('<?php echo base_url('componente2/procesoAdministrativo/cargarPropuestaTecnica') . "/" ?>'+$('#selMun').val(), 
            function(data) {
                $.each(data, function(key, val) {
                    if(key=="records"){
                        if(val=="0"){
                        $('#Mensajito').show();
                        $('#Mensajito').val("Este municipio no tiene proyecto para registrar");
                        }
                    }
                    if(key=='rows'){
                        $.each(val, function(id, registro){
                            $("#etapas").show();
                            $('#pro_id').val(registro['cell'][0]);
                            $('#pro_numero').val(registro['cell'][1]);
                            $('#pro_fsolicitud').val(registro['cell'][2]);
                            $('#pro_frecepcion').val(registro['cell'][3]);
                            $('#pro_faperturatecnica').val(registro['cell'][4]);
                            $('#pro_faperturafinanciera').val(registro['cell'][5]);
                            $('#pro_fcierre_negociacion').val(registro['cell'][6]);
                            $('#pro_ffirma_contrato').val(registro['cell'][7]);
                            $('#pro_observacion2').val(registro['cell'][8]);
                        });                    
                    }
                    
            });
        });              
    });
    /*DIALOGOS DE VALIDACION*/
    $('.Mensajito').dialog({
        autoOpen: false,
        width: 300,
        buttons: {
            "Ok": function() {
                $(this).dialog("close");
            }
        }
    });
        
<?php foreach ($etapas as $etapa) { ?>
        $("#guardar<?php echo $etapa->pes_pro_id; ?>").button();
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
<input value="" id="Mensajito" type="text" size="150" readonly="readonly" style="border: none;"/>
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
                        Observaciones:<br/><textarea id="pro_eta_observacion_<?php echo $etapa->pes_pro_id; ?>" name="pro_observacion2" cols="48" rows="5"></textarea>
                    </td></tr>
                    <tr><td colspan="3" align="center">
                        <input type="submit" id="guardar<?php echo $etapa->pes_pro_id; ?>" value="Guardar <?php echo $etapa->pes_pro_nombre; ?>" />
                        <input type="button" id="cancelar<?php echo $etapa->pes_pro_id; ?>" value="Cancelar" />
                    </td>
                    </tr>
                </table>
            </form>
        </div>
    <?php } ?>
</div>
<br/><br/><br/>
<div id="Mensajito" class="Mensajito" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
