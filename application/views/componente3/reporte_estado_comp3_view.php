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
        
                		/*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){   
            $('#selMun').children().remove();
            $.getJSON('<?php echo base_url('componente3/componente3/cargarMunicipios');?>'+'?dep_id='+$('#selDepto').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#selMun').append('<option value="0">--Seleccione Municipio--</option>');
                        $.each(val, function(id, registro){
                            $('#selMun').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
        $('#selMun').change(function(){
			var id_mun=$('#selMun').val();
			var datos = {id_mun:id_mun};
			$.post('<?php echo base_url('componente3/componente3/get_estado_comp3') ?>', datos,function(data){
				//		$('#email_valid').empty();
					//	if(data=='1')
							$('#divestado').append('<img src="<?php echo base_url("resource/imagenes/dsat.png") ?>" height="200px" width="200px"/>');
				//		else $('#email_valid').append('<spam style="color:red">invalido!</spam>');
			});
		});
        
    });
</script>
<?php
	$this->load->helper('form');
	$this->load->helper('email');
	include("select_generator.php");  
?>

<?php if(isset($aviso))
	echo $aviso;?>
	
<h1>Reporte de Estado Componente 3</h1>
<br/>

<?php $attributes = array('id' => 'myform');
	echo form_open('transparencia/observaciones_cc_ccc/guardar_nueva_obs',$attributes);
?>	

<div id="divestado" style="float:left;height:250px;width:250px;">
	<?php 
		if(isset($img))
			echo $img;
	?>
</div>
<div id="info" >
	<?php 
		if(isset($msg))
			echo $msg;
		if(isset($info))
			echo $info;
		if(isset($pb))
			echo $pb;//progress bar
		if(isset($rpt_detalle))
			echo $rpt_detalle;
	?>
</div>

<div id="divpost" ></div>
<?php echo form_close();?>

<div id="mensaje" class="mensaje" title="Aviso">
    <p>Ok.</p>
</div>
