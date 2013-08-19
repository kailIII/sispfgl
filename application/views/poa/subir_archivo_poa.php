<h3>Seleccione el archivo de excel que desea subir &#40;Resumen de Asignacion Financiera POA&#41;.</h3>
<!--<h4>Esto actualizar&aacute; la base de datos de los Proyectos</h4>-->

<?php echo $error;?>

<?php echo form_open_multipart('poa/poa/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="Subir" />

</form>
