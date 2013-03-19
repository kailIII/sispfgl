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
            $('#mun_id').children().remove();
            $.ajax({
                url: '<?php echo base_url('componente2/comp24_E0/getMunicipios') ?>/'+$('#selDepto').val()
            }).done(function(data){
                $('#mun_id').html(data);
            });           
        });
        $('#mun_id').change(function(){
            window.location.href = '<?php echo current_url(); ?>/' + $('#mun_id').val();
            $('#Mensajito').hide();
            $("#guardar").show();              
        });
                
        /*PARA EL DATEPICKER*/
        $( "#rea_pro_fecha_presentacion" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#rea_pro_fecha_vistobueno" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#rea_pro_fecha_vistobueno" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#rea_pro_fecha_aprobacion" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#rea_pro_fecha_aprobacion" ).datepicker({
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
        var download_path = '<?php $t=set_value('rea_pro_archivo_acta'); if($t!=''){echo base_url($t);}?>';
        if(download_path==''){$('#btn_download').hide();}
        $('#btn_upload').button();
        $('#btn_download').button().click(function(e){
            if(download_path != ''){
                e.preventDefault();  //stop the browser from following
                window.location.href = download_path;
            }
        });
        new AjaxUpload('#btn_upload', {
            action: '<?php echo base_url('componente2/comp24_E0/uploadFile') . '/revapro_productos2/rea_pro_archivo_acta/rea_pro_id/' . $rea_pro_id; ?>',
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
        if(isset($rea_pro_id) && $rea_pro_id > 0){
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

    <h2 class="h2Titulos">Etapa 2: Diagnostico y Plan</h2>
    <h2 class="h2Titulos">Revision y Aprovacion de Productos</h2>
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
        <!-- Lado Derecho -->
        <fieldset style="width: 450px; display: inline-block; vertical-align: top;">
            <legend>Productos</legend>
            <div class="campo">
                <label style="text-align: left;">Informe de etapa PRFM</label>
                <span>Si</span><input type="radio" name="rea_pro_is_informe_etapa" value="t" <?php echo set_radio('rea_pro_is_informe_etapa', 't'); ?>/>
                <span>No</span><input type="radio" name="rea_pro_is_informe_etapa" value="f" <?php echo set_radio('rea_pro_is_informe_etapa', 'f', TRUE); ?>/>
                <?php echo form_error('rea_pro_is_informe_etapa'); ?>
            </div>
            <div class="campo">
                <label style="text-align: left;">Borrador PRFM</label>
                <span>Si</span><input type="radio" name="rea_pro_is_borrador" value="t" <?php echo set_radio('rea_pro_is_borrador', 't'); ?>/>
                <span>No</span><input type="radio" name="rea_pro_is_borrador" value="f" <?php echo set_radio('rea_pro_is_borrador', 'f', TRUE); ?>/>
                <?php echo form_error('rea_pro_is_borrador'); ?>
            </div>
            <div class="campo">
                <label style="text-align: left;">Visto bueno de la municipalidad</label>
                <span>Si</span><input type="radio" name="rea_pro_is_visto_bueno" value="t" <?php echo set_radio('rea_pro_is_visto_bueno', 't'); ?>/>
                <span>No</span><input type="radio" name="rea_pro_is_visto_bueno" value="f" <?php echo set_radio('rea_pro_is_visto_bueno', 'f', TRUE); ?>/>
                <?php echo form_error('rea_pro_is_visto_bueno'); ?>
            </div>
        </fieldset>
        
        <!-- Lado Izquierdo -->
        <div style="display: inline-block; vertical-align: top;">
            <div class="campoUp">
                <label>Fecha de presentacion de producto</label>
                <input id="rea_pro_fecha_presentacion" name="rea_pro_fecha_presentacion" type="text" readonly="readonly" value="<?php echo set_value('rea_pro_fecha_presentacion') ?>"/>
                <?php echo form_error('rea_pro_fecha_presentacion'); ?>
            </div>
            <div class="campoUp">
                <label>Fecha de visto bueno</label>
                <input id="rea_pro_fecha_vistobueno" name="rea_pro_fecha_vistobueno" type="text" readonly="readonly" value="<?php echo set_value('rea_pro_fecha_vistobueno') ?>"/>
                <?php echo form_error('rea_pro_fecha_vistobueno'); ?>
            </div>
            <div class="campoUp">
                <label>Fecha de aprobacion concejo Municipal</label>
                <input id="rea_pro_fecha_aprobacion" name="rea_pro_fecha_aprobacion" type="text" readonly="readonly" value="<?php echo set_value('rea_pro_fecha_aprobacion') ?>"/>
                <?php echo form_error('rea_pro_fecha_aprobacion'); ?>
            </div>
            
            <div class="campoUp">
                <label>Cargar archivo:</label>
                <div id="fileUpload" style="margin-left: 20px;">
                    <div id="btn_upload" style="display: inline-block;">Subir Acta</div>
                    <a id="btn_download" href="#" style="display: inline-block;">Descargar</a>
                    <div id="vineta" style="display: inline-block;"></div>
                    <div class="uploadText" style="width: 300px;">Para actualizar un archivo basta con subir nuevamente el archivo y este se reemplaza automáticamente. Solo se permiten archivos con extensión pdf, doc, docx</div>
                </div>
            </div>
        </div>
        
        <div class="campo">
            <label>Observaciones</label>
            <textarea id="rea_pro_observaciones" name="rea_pro_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('rea_pro_observaciones') ?></textarea>
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