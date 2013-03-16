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
        
        $("#btn_acuerdo_nuevo").button().click(function(){
            $('#frm').submit();
        });
        
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        	/*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){   
            //$("#guardar").hide();
            $('#mun_id').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id='+$('#selDepto').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#mun_id').append('<option value="0">--Seleccione Municipio--</option>');
                        $.each(val, function(id, registro){
                            var text = '<option ';
                            if(registro['cell'][0]=='<?php echo set_value('mun_id'); ?>'){
                                text = text + 'selected="" ';
                            }
                            text = text + 'value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>'
                            $('#mun_id').append(text);
                        });                    
                    }
                });
            });              
        });
        $('#mun_id').change(function(){
            window.location.href = '<?php echo current_url(); ?>/' + $('#mun_id').val();
            $('#Mensajito').hide();
            $("#guardar").show();              
        });
                
        /*PARA EL DATEPICKER*/
        $( "#seg_fecha_emision" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#seg_fecha_recepcion" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#seg_fecha_recepcion" ).datepicker({
            showOn: 'both',
            maxDate:    '+1D',
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
        
        /**/
        var download_path = '<?php $t=set_value('seg_archivo_acuerdo'); if($t!=''){echo base_url($t);}?>';
        if(download_path==''){$('#btn_download').hide();}
        $('#btn_upload').button();
        $('#btn_download').button().click(function(e){
            if(download_path != ''){
                e.preventDefault();  //stop the browser from following
                window.location.href = download_path;
            }
        });
        new AjaxUpload('#btn_upload', {
            action: '<?php echo base_url('componente2/comp24_E0/uploadFile') . '/seguimiento_aprimp/seg_archivo_acuerdo/seg_id/' . $seg_id; ?>',
            onSubmit : function(file , ext){
                if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                    $('#vineta').html('<span class="error">Extension no Permitida</span>');
                    return false;
                } else {
                    $('#vineta').html('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response,ext){
                if(response!='error'){
                    $('#vineta').html('Ok');                    
                    this.enable();
                    download_path = response;
                     $('#btn_download').show();
                }else{
                    $('#vineta').html('<span class="error">Error</span>');
                    this.enable();			
                 
                }/**/
            }	
        });
        /**/
        
        function formularioHide(){
            $('#listaContainer').show();
            $('#formulario').hide()
        }
        
        function formularioShow(){
            $('#listaContainer').hide();
            $('#formulario').show()
        }

        <?php
        //echo '//'.$this->session->keep_flashdata('message');
        if($this->session->flashdata('message')=='Ok'){
            echo "$('#efectivo').dialog('open');";
        }
        if(isset($seg_id) && $seg_id > 0){
            echo "formularioShow();";
        }else{
            echo "formularioHide();";
        }
        ?>
    });
</script>

<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>

<?php echo form_open() ?>

    <h2 class="h2Titulos">Etapa 3: Seguimiento</h2>
    <h2 class="h2Titulos">Aprobacion e Implementacion</h2>
    <br/>
    <div id="rpt_frm_bdy">
        <div id="listaContainer">
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
                <select id='mun_id' name='mun_id'>
                    <option value='0'>--Seleccione--</option>
                </select>
                <?php echo form_error('mun_id'); ?>
            </div>
        </div>
        <div id="formulario" style="display: none;">
            <div class="campo">
                <label>Departamento:</label>
                <input id="depto" name="depto" type="text" readonly="readonly" value="<?php echo set_value('depto') ?>" />
            </div>
            <div class="campo">
                <label>Municipio:</label>
                <input id="muni" name="muni" type="text" readonly="readonly" value="<?php echo set_value('muni') ?>" />
            </div>
            <div id="rpt-border"></div>
            
            <div class="campo">
                <label style="width: 400px;">Conoce el Concejo Municipal, y esta de acuerdo con la aprobacion
                e implementacion de PRFM?</label>
                <span>Si</span><input type="radio" name="seg_is_ok" value="t" <?php echo set_radio('seg_is_ok', 't'); ?>/>
                <span>No</span><input type="radio" name="seg_is_ok" value="f" <?php echo set_radio('seg_is_ok', 'f', TRUE); ?>/>
                <?php echo form_error('seg_is_ok'); ?>
            </div>
            <div class="campo">
                <label style="width: 400px;">Fecha de emision de acuerdo municipal</label>
                <input id="seg_fecha_emision" name="seg_fecha_emision" type="text" readonly="readonly" value="<?php echo set_value('seg_fecha_emision') ?>"/>
                <?php echo form_error('seg_fecha_emision'); ?>
            </div>
            <div class="campo">
                <label style="width: 400px;">Fecha de recepcion de acuero municipal</label>
                <input id="seg_fecha_recepcion" name="seg_fecha_recepcion" type="text" readonly="readonly" value="<?php echo set_value('seg_fecha_recepcion') ?>"/>
                <?php echo form_error('seg_fecha_recepcion'); ?>
            </div>
            <div style="width: 100%;">
                <div style="width: 50%; display: inline-block;">
                    <div class="campoUp">
                        <label style="text-align: left;">Observaciones</label>
                        <textarea id="seg_observaciones" name="seg_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('seg_observaciones')?></textarea>
                        <?php echo form_error('seg_observaciones'); ?>
                    </div>
                </div>
                <div class="campoUp" style="display: inline-block;">
                    <label>Cargar archivo:</label>
                    <div id="fileUpload" style="margin-left: 20px;">
                        <div id="btn_upload" style="display: inline-block;">Subir Acuerdo</div>
                        <a id="btn_download" href="#" style="display: inline-block;">Descargar</a>
                        <div id="vineta" style="display: inline-block;"></div>
                        <div class="uploadText" style="width: 300px;">Para actualizar un archivo basta con subir nuevamente el archivo y este se reemplaza automáticamente. Solo se permiten archivos con extensión pdf, doc, docx</div>
                    </div>
                </div>
            </div>    
            <div id="actions" style="position: relative;top: 20px">
                <input type="submit" id="guardar" value="Guardar" />
                <input type="button" id="cancelar" value="Cancelar" />
            </div>
            <input type="hidden" value="modificado" name="mod" id="mod" />
        </div>
    </div>
<?php echo form_close();
$this->load->view('plantilla/footer'); ?>