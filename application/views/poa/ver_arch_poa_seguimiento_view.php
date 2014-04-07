<script type="text/javascript">        
   $(document).ready(function(){
        
        $('.mensaje').dialog({
            autoOpen: false,
            width: 300,
            buttons: {
                "Ok": function() {
                    $(this).dialog("close");
                }
            }
        });

		$("input[name^='poa_seguimiento_']").button().click(function(){
			var file = $(this).attr( "name" );
			window.location = '<?php echo base_url('poa/poa/comparar_poa') ?>'+'/'+file;
        });
        
        $("#otro").button().click(function(){
			window.location = '<?php echo base_url('poa/poa/subir_archivo_poa') ?>';
        });
        
        $("#anio").change(function(){
			$("#"+lastyear).hide();
			if($("#anio").val()=='2011'){
				$("#2011").show();
				lastyear=2011;
			}
			if($("#anio").val()=='2012'){
				$("#2012").show();
				lastyear=2012;
			}
			if($("#anio").val()=='2013'){
				$("#2013").show();
				lastyear=2013;
			}
			if($("#anio").val()=='2014'){
				$("#2014").show();
				lastyear=2014;
			}
			if($("#anio").val()=='2015'){
				$("#2015").show();
				lastyear=2015;
			}
        });
        
        var lastyear=2011;
       
	});
</script>

<h3>Archivo Ingresados Seguimiento POA</h3>

	<p>Seleccione el a&ntilde;o de los archivos que desea comparar:</p>
	<select name="anio" size="1" id="anio">
				<option value="2011"<?php echo set_select('anio', '2011'); ?>>2011</option>
				<option value="2012"<?php echo set_select('anio', '2012'); ?>>2012</option>
				<option value="2013"<?php echo set_select('anio', '2013'); ?>>2013</option>
				<option value="2014"<?php echo set_select('anio', '2014'); ?>>2014</option>
				<option value="2015"<?php echo set_select('anio', '2015'); ?>>2015</option>
	</select>
	<?php 
			if(isset($a2011))
				echo $a2011;
			if(isset($a2012))
				echo $a2012;
			if(isset($a2013))
				echo $a2013;
			if(isset($a2014))
				echo $a2014;
			if(isset($a2015))
				echo $a2015;
	?>
	<script>
		$("#2011").show();
	</script>
