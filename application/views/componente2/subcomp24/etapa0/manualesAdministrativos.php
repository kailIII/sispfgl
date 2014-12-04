
<?php

/*
 /**
 * 
 * 
 * @Rodrigo Vásquez
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
    /*$("#btn_consultor_add").button();*/
    $("#btn_delete").button();
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
    });
    /*PARA EL DATEPICKER*/
   
    
            
    /*PARA EL DATEPICKER*/
  $( "#man_adm_elaboracion" ).datepicker({
        showOn:         'both',
        maxDate:        '+1D',
        buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd/mm/yy'
      
    });
        
        
    
    /*FIN DEL DATEPICKER*/
    
    /*GRID*/
    /*desabilitado para activas completar comentario de esta linea y retirar display:none; del elemento *
    var jqLista = $('#lista');
    jqLista.jqGrid({
       url: '<?php echo base_url('componente2/comp24_E0/getManuales/'); ?>/' + $('#mun_id').val(),
    	datatype: "json",
        width: 300,
       	colNames:['Id','Fecha'],
       	colModel:[
       		{name:'id',index:'id', width:55},
       		{name:'asi_tec_fecha_solicitud',index:'asi_tec_fecha_solicitud', width:90}		
       	],
       	rowNum:10,
       	rowList:[10,20,30],
       	pager: '#pagerLista',
       	sortname: 'id',
        viewrecords: true,
        sortorder: "desc",
        caption:"Asistencias Tecnicas",
        ondblClickRow: function(rowid, iRow, iCol, e){
            window.location.href='<?php echo current_url(); ?>/' + rowid;
        }
    });
    /**/
    
    /**/
    
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

    <h2 class="h2Titulos"> Diagnóstico Administrativo Financiero</h2>
    <h2 class="h2Titulos">Manuales Administrativos</h2>
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
            <div id="rpt-border"></div>
            <div style="margin-left: 300px;display: none;">
                <table id="lista"></table>
                <div id="pagerLista"></div>
                <div id="btn_seleccionar">Seleccionar</div>
                <div id="btn_acuerdo_nuevo">Crear Nuevo</div>
                <div id="btn_delete">Eliminar</div>
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
            <div class="campo">
                <label>Fecha ingreso de datos:</label>
                <input id="man_adm_elaboracion" name="man_adm_elaboracion" type="text"  value="<?php echo set_value('man_adm_elaboracion') ?>"/>
                <?php echo form_error('man_adm_elaboracion'); ?>
            </div>
            <div class="campo" style="position:relative">
                <label style="text-align: right;">Manual Organizativo y de Funciones </label>
                <span>Si</span><input type="radio" name="man_adm_numero1" value="t" <?php echo set_radio('man_adm_numero1', 't'); ?>/>
                <span>No</span><input type="radio" name="man_adm_numero1" value="f" <?php echo set_radio('man_adm_numero1', 'f'); ?>/>
                <?php echo form_error('man_adm_numero1'); ?>
            </div>
          
            <div class="campo">
                <label style="text-align: right;">Manual de Cargos y Categorias (Descriptor de Puestos)</label>
                <span>Si</span><input type="radio" name="man_adm_numero2" value="t" <?php echo set_radio('man_adm_numero2', 't'); ?>/>
                <span>No</span><input type="radio" name="man_adm_numero2" value="f" <?php echo set_radio('man_adm_numero2', 'f'); ?>/>
                <?php echo form_error('man_adm_numero2'); ?>
            </div>   
            <div class="campo">
                <label style="text-align: right;">Manual de Evaluación del Desempeño</label>
                <span>Si</span><input type="radio" name="man_adm_numero3" value="t" <?php echo set_radio('man_adm_numero3', 't'); ?>/>
                <span>No</span><input type="radio" name="man_adm_numero3" value="f" <?php echo set_radio('man_adm_numero3', 'f'); ?>/>
                <?php echo form_error('man_adm_numero3'); ?>
            </div>   
            <div class="campo">
                <label style="text-align: right;">Manual del Sistema Retributivo (de Ascensos y Salarios)</label>
                <span>Si</span><input type="radio" name="man_adm_numero4" value="t" <?php echo set_radio('man_adm_numero4', 't'); ?>/>
                <span>No</span><input type="radio" name="man_adm_numero4" value="f" <?php echo set_radio('man_adm_numero4', 'f'); ?>/>
                <?php echo form_error('man_adm_numero4'); ?>
            </div>   
            <div class="campo">
                <label style="text-align: right;">Manual de Capacitación</label>
                <span>Si</span><input type="radio" name="man_adm_numero5" value="t" <?php echo set_radio('man_adm_numero5', 't'); ?>/>
                <span>No</span><input type="radio" name="man_adm_numero5" value="f" <?php echo set_radio('man_adm_numero5', 'f'); ?>/>
                <?php echo form_error('man_adm_numero5'); ?>
            </div>   <div class="campo">
                <label style="text-align: right;">Otros</label>
                <span>Si</span><input type="radio" name="man_adm_numero6" value="t" <?php echo set_radio('man_adm_numero6', 't'); ?>/>
                <span>No</span><input type="radio" name="man_adm_numero6" value="f" <?php echo set_radio('man_adm_numero6', 'f'); ?>/>
                <?php echo form_error('man_adm_numero6'); ?>
            </div>   
            <div class="campo">
                <label>Observaciones:</label>
                <textarea id="man_adm_observaciones" name="man_adm_observaciones" cols="30" rows="5" wrap="virtual" maxlength="500"><?php echo set_value('man_adm_observaciones')?></textarea>
                <?php echo form_error('man_adm_observaciones'); ?>
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
?>
