<script type="text/javascript">
    $(document).ready(function() {
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
    <br/>
    <input type="submit" id="reporte" value="Generar Reporte" />

</form>
<br/>
<br/>