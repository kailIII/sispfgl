<?php
	$this->load->helper('form');
	include("select_generator.php");  
?>

<?php if(isset($aviso))
	echo $aviso;?>
	
<h1>Agregar Observaci&oacute;n de Consulta Ciudadana o Comit&eacute; de Contralor&iacute;a Ciudadana</h1>
<br/>

<?php $attributes = array('id' => 'myform');
echo form_open('index.php/transparencia/observaciones_cc_ccc/guardar_nueva_obs',$attributes);
	
	require_once('resource/recaptcha-php-1.11/recaptchalib.php');
	$publickey = "6Lfi_-ESAAAAAB2ku6RcKA96vYhtwY74jacOAXxk"; // you got this from the signup page
	echo recaptcha_get_html($publickey);
	?>
    
    
    <br/>
    <input type="submit" value="submit" />
	
<?php echo form_close();?>

<div id="mensaje" class="mensaje" title="Aviso">
    <p>Ok.</p>
</div>
<div id="mensaje1" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para realizar esta acci&oacute;n.</p>
</div>
