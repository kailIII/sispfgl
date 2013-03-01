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
 
       
        $("#guardar").button();
        
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
            $("#guardar").show();              
        });
                
        /*PARA EL DATEPICKER*/
        $( "#f_solicitud" ).datepicker({
            showOn: 'both',
            maxDate: '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#f_emision" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#f_emision" ).datepicker({
            showOn: 'both',
            maxDate: '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#f_envio" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#f_envio" ).datepicker({
            showOn: 'both',
            maxDate: '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#f_orden" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#f_orden" ).datepicker({
            showOn: 'both',
            maxDate: '+1D',
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
    <h2 class="h2Titulos">Elaboracion de perfil y PRFM</h2>
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
            <?php echo form_error('selMun'); ?>
        </div>
        <div id="rpt-border"></div>
        <div class="campo">
            <label>Fecha de solicitud de asistencia al ISDEM:</label>
            <input id="f_solicitud" name="f_solicitud" type="text" readonly="readonly" value="<?php echo set_value('f_solicitud') ?>"/>
            <?php echo form_error('f_solicitud'); ?>
        </div>
        <div class="campo">
            <label>Fecha de emision de acuerdo municipal:</label>
            <input id="f_emision" name="f_emision" type="text" readonly="readonly" value="<?php echo set_value('f_emision') ?>"/>
            <?php echo form_error('f_emision'); ?>
        </div>
        <div class="campo">
            <label>Fecha de envio de acuerdo municipal al FISDL:</label>
            <input id="f_envio" name="f_envio" type="text" readonly="readonly" value="<?php echo set_value('f_envio') ?>"/>
            <?php echo form_error('f_envio'); ?>
        </div>
        <div class="campo">
            <label>Fecha de orden de inicio:</label>
            <input id="f_orden" name="f_orden" type="text" readonly="readonly" value="<?php echo set_value('f_orden') ?>"/>
            <?php echo form_error('f_orden'); ?>
        </div>
        <div class="campo">
            <label>Consultor:</label>
            <select id="t_consultor" name="t_consultor">
            	<option value="0">Select</option>
            </select>
            <?php echo form_error('t_consultor'); ?>
        </div>
        <div id="rpt-border"></div>
        <div class="tabla">
            <label>Miembros de la comision financiera municipal</label>
            <table id="miembros"></table>
            <div id="pagerMiembros"></div>
        </div>
        <div id="rpt-border"></div>
        <div style="width: 100%;">
            <div style="width: 50%;">
                <div class="campo">
                    <label>Observaciones</label>
                    <textarea id="t_observaciones" name="t_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('t_observaciones') ?></textarea>
                </div>
            </div>
            <div style="width: 50%;">
                
            </div>
        </div>
        
        <div id="actions" style="position: relative;top: 20px">
            <input type="submit" id="guardar" value="Guardar" />
            <input type="button" id="cancelar" value="Cancelar" />
        </div>
    </div>
<?php echo form_close();
$this->load->view('plantilla/footer'); ?>