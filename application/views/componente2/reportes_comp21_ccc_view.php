<script type="text/javascript">        
    $(document).ready(function(){
        $("#reporte1").button().click(function() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('componente2/componente21/reporte_ccc_por_region'); ?>',
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
                url: '<?php echo base_url('componente2/componente21/reporte_ccc_por_muni'); ?>',
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
<form method="post" action="<?php echo base_url('componente2/componente21/reporte_ccc_por_region'); ?>">
    <input type="submit" id="reporte1" value="CCC por Departamento y Region" />
    
</form>
<br/>
<br/>
<form method="post" action="<?php echo base_url('componente2/componente21/reporte_ccc_por_muni'); ?>">
    <input type="submit" id="reporte2" value="CCC por Muicipio" />
</form>
