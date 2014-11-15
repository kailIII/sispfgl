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
   /* $("#btn_acuerdo_nuevo").button().click(function(){$('#frm').submit();});
    $("#btn_seleccionar").button().click(function(){document.location.href='<?php echo current_url(); ?>/' + jQuery("#lista").jqGrid('getGridParam','selrow');});*/
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
        jqLista.jqGrid('clearGridData')
            .jqGrid('setGridParam', { 
                url: '<?php echo base_url('componente2/comp24_E0/getManuales'); ?>/' + $('#mun_id').val(), 
                datatype: 'json', page:1 })
            .trigger('reloadGrid');         
    });      
    /*PARA EL DATEPICKER*/
   
    <?php
    //Muestra los dialogos.
    if($this->session->flashdata('message')=='Ok'){echo "$('#efectivo').dialog('open');";}
    if(isset($man_adm_id) && $man_adm_id > 0){echo "formularioShow();";}else{echo "formularioHide();";}
    ?>
});
</script>

<div id="efectivo" class="mensaje" title="Almacenado" style="display: none;">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>

<?php echo form_open('',array('id'=>'frm')) ?>

    <h2 class="h2Titulos"> Condiciones Previas</h2>
    <h2 class="h2Titulos">Registro de Manuales Administrativos</h2>
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
                <input type="hidden" id="mun_id" name="mun_id" value="<?php echo set_value('mun_id'); ?>" />
                <input id="muni" name="muni" type="text" readonly="readonly" value="<?php echo set_value('muni') ?>" />
            </div>
            <div class="tabla">
                <label></label>
                <table id="miembros"></table>
                <div id="pagerMiembros"></div>
            </div>  
            <?php echo form_open(); ?>
            <div style="width: 100%;">
                <div style="width: 50%; display: inline-block;">
                    <p>
                      <input type="checkbox" name="nom_manual1"/>Manual Administrativo1
                    </p>
                    <div class="campo">
                      <label>Comentarios:</label>
                       <textarea id="man_observaciones" name="man_observaciones" cols="30" rows="5" wrap="virtual" maxlength="500"><?php echo set_value('man_observaciones')?></textarea>
                       <?php echo form_error('man_observaciones'); ?>
                    </div>
                </div>    
                <div id="actions" style="position: relative;top: 20px">
                    <input type="submit" id="guardar" value="Guardar" />
                    <input type="button" id="cancelar" value="Cancelar" />
                </div>
                  <input type="hidden" value="modificado" name="mod" id="mod" />
             
            </div>
        </div>    
   </div>   
<?php echo form_close();
$this->load->view('plantilla/footer'); ?>