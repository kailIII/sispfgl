<script type="text/javascript">
    $(document).ready(function() {
        $('#boton').button().click(function() {

            if ($('#trimestre').val() == 0 || $('#poa_com_id').val() == 0) {
                $('#mTrimestre').dialog('open');
                return false;
            } else {
                document.location.href = '<?php echo base_url($ruta . 'gestionSeguimientoTrimestral'); ?>/' + $('#anio').val() + "/" + $('#poa_com_id').val() + "/" + $('#trimestre').val();
            }


        });

        $('#reporte').button().click(function() {
            if ($('#trimestre').val() == 0) {
                $('#mReporte').dialog('open');
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    success: function(response)
                    {
                        window.open(response);
                    }
                });
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
    });
</script>


<center>
    <h2 class="h2Titulos">Planificación Operativa Anual</h2>
    <h2 class="h2Titulos">Seguimiento Trimestral del POA</h2>
    <br/>
    <form id="formulario" method="post" action="<?php echo base_url('reporte_poa/reportesPOATrimestral'); ?>">
        <select id="poa_com_id">
            <option selected="selected" value="0">Seleccione--</option>
            <?php foreach ($componentes as $aux) { ?>
                <option value='<?php echo $aux->poa_com_id; ?>'><?php echo $aux->poa_com_codigo . ' ' . $aux->poa_com_descripcion; ?></option>
            <?php } ?>
        </select>
        <br/> <br/>
        <select id="anio" name="anio">
            <option selected="selected" value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
            <option value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
        </select>
        <br/><br/>
        <select id="trimestre" name="trimestre">
            <option value="0">Seleccione --</option>
            <option value="1">Primer Trimestre</option>
            <option value="2">Segundo Trimestre</option>
            <option value="3">Tercer Trimestre</option>
            <option value="4">Cuarto Trimestre</option>
        </select>
        <br/><br/>

        <input id='boton' type="button"  value="Editar Seguimiento" />
        <input type="submit" id="reporte" value="Generar Reporte" />
    </form>
</center>
<div id="mTrimestre" class="mensaje" title="Error">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/cancel.png'); ?>" class="imagenError" />Debe Seleccionar el Trimestre y la Actividad para poder continuar</p>
    </center>
</div>
<div id="mReporte" class="mensaje" title="Error">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/cancel.png'); ?>" class="imagenError" />Debe Seleccionar el Trimestre para poder generar el informe</p>
    </center>
</div>