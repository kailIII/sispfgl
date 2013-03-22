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
        jqLista.jqGrid('clearGridData')
            .jqGrid('setGridParam', { 
                url: '<?php echo base_url('componente2/comp24_E0/getManuales'); ?>/' + $('#mun_id').val(), 
                datatype: 'json', page:1 })
            .trigger('reloadGrid');         
    });      
    /*PARA EL DATEPICKER*/
    $( "#man_adm_elaboracion" ).datepicker({
        showOn:'both',maxDate:'+1D',buttonImage:'<?php echo site_url('resource/imagenes/calendario.png'); ?>',buttonImageOnly: true, dateFormat: 'dd/mm/yy',
        onClose: function(selectedDate){
            $( "#man_adm_aprobacion" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    $( "#man_adm_aprobacion" ).datepicker({
        showOn: 'both',
        maxDate:    '+1D',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd/mm/yy'
    });
    /*FIN DEL DATEPICKER*/
    
    /*GRID*/
    var jqLista = $('#lista');
    jqLista.jqGrid({
       	url: '<?php echo base_url('componente2/comp24_E0/getManuales/'); ?>/' + $('#mun_id').val(),
    	datatype: "json",
        width: 300,
       	colNames:['Id','Nombre'],
       	colModel:[
       		{name:'id',index:'id', width:55},
       		{name:'man_adm_nombre',index:'man_adm_nombre', width:150}		
       	],
       	rowNum:10,
       	rowList:[10,20,30],
       	pager: '#pagerLista',
       	sortname: 'id',
        viewrecords: true,
        sortorder: "desc",
        caption:"Manuales Administrativos",
        ondblClickRow: function(rowid, iRow, iCol, e){
            window.location.href='<?php echo current_url(); ?>/' + rowid;
        }
    });
    <?php
    //Muestra los dialogos.
    if($this->session->flashdata('message')=='Ok'){echo "$('#efectivo').dialog('open');";}
    if(isset($mun_id) && $mun_id > 0){echo "formularioShow();";}else{echo "formularioHide();";}
    ?>
});
</script>

<div id="efectivo" class="mensaje" title="Almacenado" style="display: none;">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>

<?php echo form_open('',array('id'=>'frm')) ?>

    <h2 class="h2Titulos">Etapa 0: Condiciones Previas</h2>
    <h2 class="h2Titulos">Registro de Manuales Administrativos</h2>
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
            <div id="rpt-border"></div>
            <div style="margin-left: 300px;">
                <table id="lista"></table>
                <div id="pagerLista"></div>
                <div id="btn_seleccionar">Seleccionar</div>
                <div id="btn_acuerdo_nuevo">Crear Nuevo</div>
            </div>
        </div>
        <?php echo form_close(); echo form_open(); ?>
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
            <div class="campo">
                <label>Nombre del manual</label>
                <input id="man_adm_nombre" name="man_adm_nombre" type="text" value="<?php echo set_value('man_adm_nombre') ?>" />
                <?php echo form_error('man_adm_nombre'); ?>
            </div>
            
            <div class="campo">
                <label>Fecha de elaboración</label>
                <input id="man_adm_elaboracion" name="man_adm_elaboracion" type="text" readonly="readonly" value="<?php echo set_value('man_adm_elaboracion') ?>"/>
                <?php echo form_error('man_adm_elaboracion'); ?>
            </div>
            
            <div class="campo">
                <label>¿Se encuentra vigente?</label>
                <span>Si</span><input type="radio" name="man_adm_vigente" value="t" <?php echo set_radio('man_adm_vigente', 't'); ?>/>
                <span>No</span><input type="radio" name="man_adm_vigente" value="f" <?php echo set_radio('man_adm_vigente', 'f', TRUE); ?>/>
                <?php echo form_error('man_adm_vigente'); ?>
            </div>
            
            <div class="campo">
                <label>Fecha de aprobación</label>
                <input id="man_adm_aprobacion" name="man_adm_aprobacion" type="text" readonly="readonly" value="<?php echo set_value('man_adm_aprobacion') ?>"/>
                <?php echo form_error('man_adm_aprobacion'); ?>
            </div>
            
            <div class="campo">
                <label>¿Es utilizado?</label>
                <span>Si</span><input type="radio" name="man_adm_utilizado" value="t" <?php echo set_radio('man_adm_utilizado', 't'); ?>/>
                <span>No</span><input type="radio" name="man_adm_utilizado" value="f" <?php echo set_radio('man_adm_utilizado', 'f', TRUE); ?>/>
                <?php echo form_error('man_adm_utilizado'); ?>
            </div>
            <div class="campo">
                <label>Comentarios:</label>
                <textarea id="acu_mun_observaciones" name="acu_mun_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('acu_mun_observaciones')?></textarea>
                <?php echo form_error('acu_mun_observaciones'); ?>
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