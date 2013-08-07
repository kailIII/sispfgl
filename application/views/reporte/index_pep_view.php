<script type="text/javascript">
    $(document).ready(function() {
        $("#reporte").button().click(function() {

            if ($('input[name="tipo"]:checked').val() == 5)
                $("#formulario").attr('action', '<?php echo base_url('reportes/avancesPEP'); ?>');
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
    <input type="radio" name="tipo" value="5"> Avances PEP </input>
    <br/>
    <br/>
    <input type="submit" id="reporte" value="Generar Reporte" />

</form>
<br/>
<br/>