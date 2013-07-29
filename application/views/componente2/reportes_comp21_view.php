<script type="text/javascript">
    $(document).ready(function() {
        $("#reporte").button().click(function() {

            if ($('input[name="tipo"]:checked').val() == 1)
                $("#formulario").attr('action', '<?php echo base_url('componente2/componente21/reporte_ccc_por_region'); ?>');
            else
            if ($('input[name="tipo"]:checked').val() == 2)
                $("#formulario").attr('action', '<?php echo base_url('componente2/componente21/reporte_ccc_por_muni'); ?>');
            else
            if ($('input[name="tipo"]:checked').val() == 3)
                $("#formulario").attr('action', '<?php echo base_url(''); ?>');
            else
            if ($('input[name="tipo"]:checked').val() == 4)
                $("#formulario").attr('action', '<?php echo base_url(''); ?>');
            else
            if ($('input[name="tipo"]:checked').val() == 5)
                $("#formulario").attr('action', '<?php echo base_url('index.php/componente2/componente21/reporte_ccc_por_muni'); ?>');

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
    <h1>Reportes Componente 2.1 CCC</h1>
</center>
<b><label>Seleccione el reporte que desea generar:</label></b>
<form id="formulario" method="post" action="">
    <input type="radio" name="tipo" value="1"> Comites de Contralor&iacute;a Ciudadana por Departamento y Region </input>
    <br/>
    <input type="radio" name="tipo" value="2"> Comites de Contralor&iacute;a Ciudadana por Muicipio </input>
    <br/>
    <br/>
    <center>
		<h1>Reportes Componente 2.1 CCC</h1>
	</center>
	<b><label>Seleccione el reporte que desea generar:</label></b>
	<input type="radio" name="tipo" value="5"> Reporte General de Concultas Ciudadanas</input>
    <br/>
    <br/><br/><input type="submit" id="reporte" value="Generar Reporte" />

</form>
<br/>
<br/>
