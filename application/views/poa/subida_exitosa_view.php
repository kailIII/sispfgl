<h3>Archivo Subido con Exito</h3>
<?php 
	echo ''.$upload_data['file_name'];

	if($upload_data['file_name']!='poa_base.xlsx')
		echo '<p>'.anchor('poa/poa/comparar_poa/'.$upload_data['file_name'], 'Realizar Comparativo.').'</p>';
		
	echo '<p>'.anchor('poa/poa/subir_archivo_poa', 'Subir otro archivo').'</p>'; ?>
