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
    /*BASICO*/
    function formularioHide(){$('#listaContainer').show();$('#formulario').hide()}
    function formularioShow(){$('#listaContainer').hide();$('#formulario').show()}
    $("#guardar").button();
    $("#btn_acuerdo_nuevo").button().click(function(){$('#frm').submit();});
    $("#btn_seleccionar").button().click(function(){document.location.href='<?php echo current_url(); ?>/' + jQuery("#lista").jqGrid('getGridParam','selrow');});
    $("#cancelar").button().click(function() {document.location.href='<?php echo base_url(); ?>';});
    $('.mensaje').dialog({autoOpen: false,width: 300,
        buttons: {"Ok": function() {$(this).dialog("close");}}
    });
    $('#selDepto').change(function(){   
        $.ajax({url: '<?php echo base_url('componente2/comp24_E0/getMunicipios') ?>/'+$('#selDepto').val()
        }).done(function(data){$('#mun_id').children().remove();$('#mun_id').html(data);});           
    });
    /**/
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
        showOn:         'both',
        maxDate:        '+1D',
        buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd/mm/yy',
        onClose: function( selectedDate ) {
            $( "#seg_fecha_envio" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    $( "#seg_fecha_envio" ).datepicker({
        showOn: 'both',
        maxDate:    '+1D',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd/mm/yy'
    });
    /*FIN DEL DATEPICKER*/
    
    /**/
    var download_path_1 = '<?php $t=set_value('seg_archivo_perfil'); if($t!=''){echo base_url($t);}?>';
    if(download_path_1==''){$('#btn_download_1').hide();}
    $('#btn_upload_1').button();
    $('#btn_download_1').button().click(function(e){
        if(download_path_1 != ''){
            e.preventDefault();  //stop the browser from following
            window.location.href = download_path_1;
        }
    });
    new AjaxUpload('#btn_upload_1', {
        action: '<?php echo base_url('componente2/comp24_E0/uploadFile') . '/seguimiento_3b/seg_archivo_perfil/seg_id/' . $seg_id; ?>',
        onSubmit : function(file , ext){
            if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                $('#vineta_1').html('<span class="error">Extension no Permitida</span>');
                return false;
            } else {
                $('#vineta_1').html('Subiendo....');
                this.disable();
            }
        },
        onComplete: function(file, response,ext){
            if(response!='error'){
                $('#vineta_1').html('Ok');                    
                this.enable();
                download_path_1 = response;
                 $('#btn_download_1').show();
            }else{
                $('#vineta_1').html('<span class="error">Error</span>');
                this.enable();			
             
            }/**/
        }	
    });
    var download_path_2 = '<?php $t=set_value('seg_archivo_tdr'); if($t!=''){echo base_url($t);}?>';
    if(download_path_2==''){$('#btn_download_2').hide();}
    $('#btn_upload_2').button();
    $('#btn_download_2').button().click(function(e){
        if(download_path_2 != ''){
            e.preventDefault();  //stop the browser from following
            window.location.href = download_path_2;
        }
    });
    new AjaxUpload('#btn_upload_2', {
        action: '<?php echo base_url('componente2/comp24_E0/uploadFile') . '/seguimiento_3b/seg_archivo_tdr/seg_id/' . $seg_id; ?>',
        onSubmit : function(file , ext){
            if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                $('#vineta_2').html('<span class="error">Extension no Permitida</span>');
                return false;
            } else {
                $('#vineta_2').html('Subiendo....');
                this.disable();
            }
        },
        onComplete: function(file, response,ext){
            if(response!='error'){
                $('#vineta_2').html('Ok');                    
                this.enable();
                download_path_2 = response;
                 $('#btn_download_2').show();
            }else{
                $('#vineta_2').html('<span class="error">Error</span>');
                this.enable();			
             
            }/**/
        }	
    });
    var download_path_3 = '<?php $t=set_value('seg_archivo_acuerdo'); if($t!=''){echo base_url($t);}?>';
    if(download_path_3==''){$('#btn_download_3').hide();}
    $('#btn_upload_3').button();
    $('#btn_download_3').button().click(function(e){
        if(download_path_3 != ''){
            e.preventDefault();  //stop the browser from following
            window.location.href = download_path_3;
        }
    });
    new AjaxUpload('#btn_upload_3', {
        action: '<?php echo base_url('componente2/comp24_E0/uploadFile') . '/seguimiento_3b/seg_archivo_acuerdo/seg_id/' . $seg_id; ?>',
        onSubmit : function(file , ext){
            if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                $('#vineta_3').html('<span class="error">Extension no Permitida</span>');
                return false;
            } else {
                $('#vineta_3').html('Subiendo....');
                this.disable();
            }
        },
        onComplete: function(file, response,ext){
            if(response!='error'){
                $('#vineta_3').html('Ok');                    
                this.enable();
                download_path_3 = response;
                 $('#btn_download_3').show();
            }else{
                $('#vineta_3').html('<span class="error">Error</span>');
                this.enable();			
             
            }/**/
        }	
    });
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

<div id="efectivo" class="mensaje" title="Almacenado" style="display: none;">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>

<?php echo form_open() ?>

    <h2 class="h2Titulos">Etapa 3: Seguimiento</h2>
    <h2 class="h2Titulos">Elaboración de perfil y TDR's para la actividad del plan</h2>
    <br/>
    <div id="rpt_frm_bdy">
        <div id="listaContainer">
            <div class="campo">
                <label>Departamento</label>
                <?php echo form_dropdown('selDepto',$departamentos,'','id="selDepto"'); ?>
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
                <label>Fecha de emisión de acuerdo municipal:</label>
                <input id="seg_fecha_emision" name="seg_fecha_emision" type="text" readonly="readonly" value="<?php echo set_value('seg_fecha_emision') ?>"/>
                    <?php echo form_error('seg_fecha_emision'); ?>
            </div>
            <div class="campo">
                <label>Fecha de recepción de acuero municipal:</label>
                <input id="seg_fecha_recepcion" name="seg_fecha_recepcion" type="text" readonly="readonly" value="<?php echo set_value('seg_fecha_recepcion') ?>"/>
                    <?php echo form_error('seg_fecha_recepcion'); ?>
            </div>
            <div class="campo">
                <label>Fecha de envio de acuerdo municipal:</label>
                <input id="seg_fecha_envio" name="seg_fecha_envio" type="text" readonly="readonly" value="<?php echo set_value('seg_fecha_envio') ?>"/>
                    <?php echo form_error('seg_fecha_envio'); ?>
            </div>
            <div class="campo">
                <label>Registro de Rubros a invertir:</label>
                <span>Asistencia Tecnica</span><input type="radio" name="seg_rubros" value="t" <?php echo set_radio('seg_rubros', 't'); ?>/>
                <span>Equipamiento</span><input type="radio" name="seg_rubros" value="f" <?php echo set_radio('seg_rubros', 'f', TRUE); ?>/>
                <?php echo form_error('seg_rubros'); ?>
            </div>
            <div class="campo">
                <label>Descripcion:</label>
                <textarea id="seg_descripcion" name="seg_descripcion" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('seg_descripcion')?></textarea>
                <?php echo form_error('seg_descripcion'); ?>
            </div>
            <div class="campo" style="display: inline-block;">
                <label>Cargar archivo:</label>
                <div id="fileUpload" style="display: inline-block;">
                    <div id="btn_upload_1" style="display: inline-block;">Subir Perfil</div>
                    <a id="btn_download_1" href="#" style="display: inline-block;">Descargar</a>
                    <div id="vineta_1" style="display: inline-block;"></div>
                </div>
                <div id="fileUpload" style="margin-left: 335px; margin-top: 10px;">
                    <div id="btn_upload_2" style="display: inline-block;">Subir TRD</div>
                    <a id="btn_download_2" href="#" style="display: inline-block;">Descargar</a>
                    <div id="vineta_2" style="display: inline-block;"></div>
                </div>
                <div id="fileUpload" style="margin-left: 335px; margin-top: 10px;">
                    <div id="btn_upload_3" style="display: inline-block;">Subir Acuerdo</div>
                    <a id="btn_download_3" href="#" style="display: inline-block;">Descargar</a>
                    <div id="vineta_3" style="display: inline-block;"></div>
                </div>
                <div class="uploadText" style="margin-left: 350px;">Para actualizar un archivo basta con subir nuevamente el archivo y este se reemplaza automáticamente. Solo se permiten archivos con extensión pdf, doc, docx</div>
            </div>
            <div class="campo">
                <label>Observaciones:</label>
                <textarea id="seg_observaciones" name="seg_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('seg_observaciones')?></textarea>
                <?php echo form_error('seg_observaciones'); ?>
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