<h3>Seleccione el archivo de excel que desea subir &#40;Carpetas PFGL&#41;.</h3>
<h4>Esto actualizar&aacute; la base de datos de los Proyectos</h4>

<?php echo $error;?>

<?php echo form_open_multipart('index.php/carpetas_pfgl/subir_archivoxls/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="Subir" />

</form>
