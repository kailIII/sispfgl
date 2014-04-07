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

		$("#comparar").button().click(function(){
			var file = $("#comparar").attr( "name" );
			window.location = '<?php echo base_url('poa/poa/comparar_poa_financiero') ?>'+'/'+file;
        });
        
        $("#otro").button().click(function(){
			window.location = '<?php echo base_url('poa/poa/subir_archivo_poa_financiero') ?>';
        });
       
	});
</script>

<h3>Archivo Subido con Exito</h3>
<?php 
	echo 'Nombre del Archivo: '.$upload_data['file_name'].'<br/><br/>';

	if($upload_data['file_name']!='poa_base.xlsx')
		echo '<input type="button" id="comparar" name="'.$upload_data['file_name'].'" value="Realizar Comparativo"/>';
?>		
<input type="button" id="otro" value="Subir Otro Archivo"/>
