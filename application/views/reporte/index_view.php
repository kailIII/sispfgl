<script type="text/javascript">        
    $(document).ready(function(){
        $("#reporte1").button().click(function() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('reportes/gdrGeneral'); ?>',
                cache: false,
                success: function(response)
                {
                    window.open(response);
                }
            });
        });
        $("#reporte2").button().click(function() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('reportes/seguimientoReporte'); ?>',
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
<form method="post" action="<?php echo base_url('reportes/gdrGeneral'); ?>">
    <input type="submit" id="reporte1" value="AVANCE 2.5:  FORTALECIMIENTO DE LAS CAPACIDADES MUNICIPALES EN GESTIÓN DE RIESGO DE DESASTRES (GRD)" />
    
</form>
<br/>
<br/>
<form method="post" action="<?php echo base_url('reportes/seguimientoReporte'); ?>">
    <input type="submit" id="reporte2" value="SEGUIMIENTO GESTIÓN DE RIESGO DE DESASTRES DE TODOS LOS DEPARTAMENTOS" />
</form>