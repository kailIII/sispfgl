<script type="text/javascript">
    $(document).ready(function() {
        $('#boton').button().click(function() {
            if ($('#poa_com_id').val() == 0)
            {
                $('#mTrimestre').dialog('open');
                return false;
            }
            else
                document.location.href = '<?php echo base_url($ruta . 'gestionProgramacionAnual'); ?>/' + $('#anio').val() + "/" + $('#poa_com_id').val();
        });

        $('#reporte').button().click(function() {
            $.ajax({
                type: "POST",
                success: function(response)
                {
                    window.open(response);
                }
            });
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
    });
</script>


<center>
    <h2 class="h2Titulos">Planificación Operativa Anual</h2>
    <h2 class="h2Titulos">Planificación Por Año</h2>
    <br/>
    <form id="formulario" method="post" action="<?php echo base_url('reporte_poa/reportesPOA'); ?>">
        <select id="poa_com_id">
            <option selected="selected" value="0">Seleccione Componente--</option>
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

        <input id='boton' type="button"  value="Editar Programación Anual" />

        <br/><br/>
        <input type="submit" id="reporte" value="Generar Reporte" />

    </form>


</center>
<div id="mTrimestre" class="mensaje" title="Error">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/cancel.png'); ?>" class="imagenError" />Debe Seleccionar el componente para poder continuar</p>
    </center>
</div>

