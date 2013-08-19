<script type="text/javascript">
    $(document).ready(function() {
        $('#dep_id').hide();
        $('#ldep_id').hide();
        $('#mun_id').hide();
        $('#lmun_id').hide();
        $('input[name="tipo"]').click(function() {

            if ($('input[name="tipo"]:checked').val() == 5) {
                $("#reporte").hide();
                $('#dep_id').show();
                $('#mun_id').show();
                $('#ldep_id').show();
                $('#lmun_id').show();
            } else {
                $("#reporte").show();
                $('#dep_id').hide();
                $('#mun_id').hide();
                $('#ldep_id').hide();
                $('#lmun_id').hide();
            }
        });
        $('#dep_id').change(function() {
            $('#mun_id').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipiosRep') ?>?dep_id=' + $('#dep_id').val(),
                    function(data) {
                        var i = 0;
                        $.each(data, function(key, val) {
                            if (key == 'rows') {
                                $('#mun_id').append('<option value="0">--Seleccione Municipio--</option>');
                                $.each(val, function(id, registro) {
                                    $('#mun_id').append('<option value="' + registro['cell'][0] + '">' + registro['cell'][1] + '</option>');
                                });
                                $("#reporte").show();
                            }
                        });
                    });
        });
        $("#reporte").button().click(function() {

            if ($('input[name="tipo"]:checked').val() == 1)
                $("#formulario").attr('action', '<?php echo base_url('reportes/gdrGeneral'); ?>');
            else
            if ($('input[name="tipo"]:checked').val() == 2)
                $("#formulario").attr('action', '<?php echo base_url('reportes/seguimientoReporte'); ?>');
            else
            if ($('input[name="tipo"]:checked').val() == 3)
                $("#formulario").attr('action', '<?php echo base_url('reportes/resumenEjecutivoReporte'); ?>');
            else
            if ($('input[name="tipo"]:checked').val() == 4)
                $("#formulario").attr('action', '<?php echo base_url('reportes/avancesConsolidadosReporte'); ?>');
            else
            if ($('input[name="tipo"]:checked').val() == 5)
                $("#formulario").attr('action', '<?php echo base_url('reportes/mejoraPerfil'); ?>');
            $.ajax({
                type: "POST",
                cache: false,
                success: function(response)
                {
                    window.open(response);
                }
            });
        });
    });
</script>
<br/>
<br/>
<center>
    <h1>REPORTES</h1>
</center>
<form id="formulario" method="post" action="">
    <input type="radio" name="tipo" value="1" > Avance 2.5: Fortalecimiento de las capacidades municipales en Gestión de Riesgo de Desastres (GRD) </input>
    <br/>
    <input type="radio" name="tipo" value="2"> Seguimiento de Gestión de Riesgos de Desastres de todos los Departamentos </input>
    <br/>
    <input type="radio" name="tipo" value="3"> Resumen Ejecutivo de la Gestión de Riesgos de Desastres </input>
    <br/>
    <input type="radio" name="tipo" value="4"> Avances Consolidados de la Gestión de Riesgos de Desastres </input>
    <br/>
    <input type="radio" name="tipo" value="5"> Sugencias para mejorar el perfil del proyecto 2.5 PFGL</input>
    <table id="ẗabla-id">
        <tr>
        <td><label id="ldep_id"><strong>Departamento</strong></label></td>
        <td><select id='dep_id'>
                <option value='0'>--Seleccione--</option>
                <?php foreach ($deptos as $dep) { ?>
                    <option value='<?php echo $dep->dep_id; ?>'><?php echo $dep->dep_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
        <td><label id="lmun_id"><strong>Municipio</strong></label></td>
        <td><select id='mun_id' name='mun_id'>
                <option value='0'>--Seleccione--</option>
            </select>
        </td>
        </tr>        
    </table>
    <br/>
    <br/>
    <input type="submit" id="reporte" value="Generar Reporte" />

</form>
<br/>
<br/>