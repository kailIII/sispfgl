<script type="text/javascript">
    $(document).ready(function() {
        $('#boton').button().click(function() {
            document.location.href = '<?php echo base_url($ruta . 'gestionSeguimientoTrimestral'); ?>/' +$('#anio').val()+"/"+ $('#poa_com_id').val()+"/"+$('#trimestre').val();
        });
    });
</script>


<center>
    <h2 class="h2Titulos">Planificación Operativa Anual</h2>
    <h2 class="h2Titulos">Seguimiento Trimestral del POA</h2>
    <br/>
    <select id="poa_com_id">
        <option selected="selected" value="0">Seleccione--</option>
        <?php foreach ($componentes as $aux) { ?>
            <option value='<?php echo $aux->poa_com_id; ?>'><?php echo $aux->poa_com_codigo . ' ' . $aux->poa_com_descripcion; ?></option>
        <?php } ?>
    </select>
    <br/> <br/>
    <select id="anio">
        <option selected="selected" value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
        <option value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
    </select>
    <br/><br/>
    <select id="trimestre">
        <option value="0">Seleccione --</option>
        <option value="1">Primer Trimestre</option>
        <option value="2">Segundo Trimestre</option>
        <option value="3">Tercer Trimestre</option>
        <option value="4">Cuarto Trimestre</option>
    </select>
    <br/><br/>

    <input id='boton' type="button"  value="Editar Seguimiento" />
</center>


