<?php

/**
 * 
 * 
 * @author Alexis Beltran
 */

$this->load->view('plantilla/header', $titulo);
$this->load->view('plantilla/menu', $menu);

?>
<script type="text/javascript">        
    $(document).ready(function(){
        /*VARIABLES*/
 
       
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E0/guardarSolicitud'); ?>';
        });
        
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        	/*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){   
            $("#guardar").hide();
            $('#selMun').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id='+$('#selDepto').val(), 
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
            $('#Mensajito').hide();
            $("#guardar").hide();
            $.getJSON('<?php echo base_url('componente2/comp23_E1/verificarProyectoPep') . "/" ?>'+$('#selMun').val(), 
            function(data) {
                $('#Mensajito').hide();
                $.each(data, function(key, val) {
                    if(key=="records"){
                        if(val=="0"){
                            $('#Mensajito').show();
                            $("#guardar").hide();
                            $('#Mensajito').val("Este municipio no posee ningún Proyecto PEP asignado");
                        }else{
                            $('#Mensajito').hide();
                            $("#guardar").show();
                        }
                    }
                });
            });              
        });
                
        /*PARA EL DATEPICKER*/
        $( "#f_emision" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#f_recepcion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
               
        /*DIALOGOS DE VALIDACION*/
        $('.mensaje').dialog({
            autoOpen: false,
            width: 300,
            buttons: {
                "Ok": function() {
                    $(this).dialog("close");
                }
            }
        });
 
        /*FIN DIALOGOS VALIDACION*/
  
    });
</script>


<?php echo form_open() ?>

    <h2 class="h2Titulos">Etapa 0: Condiciones Previas</h2>
    <h2 class="h2Titulos">Registro de Solicitud</h2>
    <br/>
    <div id="rpt_frm_bdy">
        <div class="campo">
            <label>Departamento</label>
            <select id='selDepto'>
                <option value='0'>--Seleccione--</option>
                <?php foreach ($departamentos as $depto) { ?>
                    <option value='<?php echo $depto->dep_id; ?>'><?php echo $depto->dep_nombre; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="campo">
            <label>Municipio</label>
            <select id='selMun' name='selMun'>
                <option value='0'>--Seleccione--</option>
            </select>
        </div>
        <div id="rpt-border"></div>
        <div class="campo">
            <label>Fecha de emision de solicitud:</label>
            <input <?php if (isset($f_emision)) { ?> value='<?php echo date('d/m/Y', strtotime($f_emision)); ?>'<?php } ?>id="f_emision" name="f_emision" type="text" size="10" readonly="readonly"/>
        </div>
        <div class="campo">
            <label>Fecha de recepcion de solicitud:</label>
            <input <?php if (isset($f_recepcion)) { ?> value='<?php echo date('d/m/Y', strtotime($f_recepcion)); ?>'<?php } ?>id="f_recepcion" name="f_recepcion" type="text" size="10" readonly="readonly"/>
        </div>
        
        <div id="actions" style="position: relative;top: 20px">
            <input type="submit" id="guardar" value="Guardar" />
            <input type="button" id="cancelar" value="Cancelar" />
        </div>
    </div>
<?php echo form_close();
$this->load->view('plantilla/footer'); ?>