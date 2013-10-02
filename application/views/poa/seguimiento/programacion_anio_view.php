<script type="text/javascript">
    $(document).ready(function() {
        $('#resultado').hide();
        $('#poa_com_id').change(function() {
            $('#resultado').hide();
            $('#resultado').load('<?php echo base_url($ruta . 'cargarActividades') ?>/' + $('#poa_com_id').val()+"/"+$('#poa_anio').val());
            $('#resultado').show();
        });

        $('#boton').button().click(function() {
            document.location.href = '<?php echo base_url($ruta . 'gestionarActividad'); ?>/' + $('#poa_com_id').val();
        });
    });
</script>


<center>
    <h2 class="h2Titulos">Planificación Operativa Anual</h2>
    <h2 class="h2Titulos">Planificación Por Año</h2>
    <br/>
    <select id="poa_com_id">
        <option selected="selected" value="0">Seleccione--</option>
        <?php foreach ($componentes as $aux) { ?>
            <option value='<?php echo $aux->poa_com_id; ?>'><?php echo $aux->poa_com_codigo . ' ' . $aux->poa_com_descripcion; ?></option>
        <?php } ?>
    </select>
    <br/> <br/>
    <select id="poa_anio">
        <option selected="selected" value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
        <option value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
    </select>
    <br/><br/>
    <input id='boton' type="button"  value="Editar Programación Anual" />
    <br/><br/>
    <div id="resultado"></div>
</center>


