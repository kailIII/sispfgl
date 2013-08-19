<script type="text/javascript">
    $(document).ready(function() {
        $("#reporte").button().click(function() {

            if ($('input[name="tipo"]:checked').val() == 1)
                $("#formulario").attr('action', '<?php echo base_url('reportes/consolidadoModalidadFormacion'); ?>');
            else if ($('input[name="tipo"]:checked').val() == 2)
                $("#formulario").attr('action', '<?php echo base_url('reportes/consolidadoModalidadPorDepto'); ?>');
            else if ($('input[name="tipo"]:checked').val() == 3)
                $("#formulario").attr('action', '<?php echo base_url('reportes/consolidadoClasificacionMunicipio'); ?>');
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
    <input type="radio" name="tipo" value="1"> Consolidad por modalidad de formación </input>
    <br/>
    <input type="radio" name="tipo" value="2"> Capacitados por Departamento y Municipio </input>
    <br/>
    <input type="radio" name="tipo" value="3"> Capacitados Según Clasificación del Municipio </input>
    <br/>
    <br/>
    <input type="submit" id="reporte" value="Generar Reporte" />

</form>
<br/>
<br/>