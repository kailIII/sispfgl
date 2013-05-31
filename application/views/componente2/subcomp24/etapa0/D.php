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
    });
            
    /*PARA EL DATEPICKER*/
    $( "#ind_des_fecha" ).datepicker({
        showOn:         'both',
        maxDate:        '+1D',
        buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
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
    /* Calculos */
    $('.txtInput').change(function(){cambios();});
    function cambios(){
        var t;
        $('#ind_des_grupo1_total').val(function(){if(isFinite(t=((parseFloat($('#ind_des_grupo1_pascir').val()) + ( parseFloat($('#ind_des_grupo1_deucorpla').val()) + parseFloat($('#ind_des_grupo1_int').val()) ))/(parseFloat($('#ind_des_grupo1_ahoope').val()) + parseFloat($('#ind_des_grupo1_intdeu').val()))))){return t;}else{return'';}});
        $('#ind_des_grupo2_total').val(function(){if(isFinite(t=(parseFloat($('#ind_des_grupo2_deumuntot').val())/parseFloat($('#ind_des_grupo2_ingopeper').val())))){return t;}else{return'';}});
    }
    <?php
    //Muestra los dialogos.
    if($this->session->flashdata('message')=='Ok'){echo "$('#efectivo').dialog('open');";}
    if(isset($ind_des_id) && $ind_des_id > 0){echo "formularioShow();cambios();";}else{echo "formularioHide();";}
    ?>
});
</script>

<div id="efectivo" class="mensaje" title="Almacenado" style="display: none;">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>

<?php echo form_open() ?>

    <h2 class="h2Titulos">Etapa 0: Condiciones Previas</h2>
    <h2 class="h2Titulos">Indicadores de Desempeño Administrativo y Financiero Municipal</h2>
    <h2 class="h2Titulos">Indicadores para el Análisis del Endeudamiento Público</h2>
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
            <div class="campo">
                <label>Fecha:</label>
                <input id="ind_des_fecha" name="ind_des_fecha" type="text" readonly="readonly" value="<?php echo set_value('ind_des_fecha') ?>"/>
                <?php echo form_error('ind_des_fecha'); ?>
            </div>
            <div class="campo">
                <label>Periodo</label>
                <span>Del </span>
                <input id="ind_des_periodo_inicio" name="ind_des_periodo_inicio" type="text" value="<?php echo set_value('ind_des_periodo_inicio') ?>" style="width: 100px;"/>
                <?php echo form_error('ind_des_periodo_inicio'); ?>
                <span>Al</span>
                <input id="ind_des_periodo_fin" name="ind_des_periodo_fin" type="text" value="<?php echo set_value('ind_des_periodo_fin') ?>" style="width: 100px;"/>
                <?php echo form_error('ind_des_periodo_fin'); ?>
            </div>
            <hr />
            <div id="rpt-border"></div>
            
            <div class="bigCampo">
                <label>Índice de Capacidad de Pago</label>
                <div class="comment">Mide la disponibilidad de recursos financieros
                con que cuenta la municipalidad para hacer frente al pago de la deuda
                de corto plazo y se considera excesivo cuando el indicador resultante
                es un valor negativo, Art. 3 de la Ley de Endeudamiento Municipal: No
                podrá superar el límite máximo de 0.6 veces el ahorro operacional
                obtenido por la municipalidad en el ejercicio fiscal anterior.</div>
                 <div class="bdy">
                    <div class="frm">
                        <div class="hdr">Índice de Capacidad de Pago</div>
                        <div class="igual">=</div>
                        <div class="col">
                            <div class="row">
                                <span>Pasivo Circulante</span>
                                <input class="txtInput" id="ind_des_grupo1_pascir" name="ind_des_grupo1_pascir" value="<?php echo set_value('ind_des_grupo1_pascir') ?>" />
                                <?php echo form_error('ind_des_grupo1_pascir'); ?>
                                <span>+ ( Deuda a Corto Plazo</span>
                                <input class="txtInput" id="ind_des_grupo1_deucorpla" name="ind_des_grupo1_deucorpla" value="<?php echo set_value('ind_des_grupo1_deucorpla') ?>" />
                                <?php echo form_error('ind_des_grupo1_deucorpla'); ?>
                                <span>+ Intereses</span>
                                <input class="txtInput" id="ind_des_grupo1_int" name="ind_des_grupo1_int" value="<?php echo set_value('ind_des_grupo1_int') ?>" />
                                <?php echo form_error('ind_des_grupo1_int'); ?>
                                <span>)</span>
                            </div>
                            <div></div>
                            <hr />
                            <div class="row">
                                <span>Ahorro Operacional</span>
                                <input class="txtInput" id="ind_des_grupo1_ahoope" name="ind_des_grupo1_ahoope" value="<?php echo set_value('ind_des_grupo1_ahoope') ?>" />
                                <?php echo form_error('ind_des_grupo1_ahoope'); ?>
                                <span>+ Intereses de la deuda</span>
                                <input class="txtInput" id="ind_des_grupo1_intdeu" name="ind_des_grupo1_intdeu" value="<?php echo set_value('ind_des_grupo1_intdeu') ?>" />
                                <?php echo form_error('ind_des_grupo1_intdeu'); ?>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="result centrar">
                    <div class="hdr">Índice Capacidad de Pago</div>
                    <input id="ind_des_grupo1_total" name="ind_des_grupo1_total" type="text" size="100"  value="<?php echo set_value('ind_des_grupo1_total') ?>" readonly=""/>
                    <?php echo form_error('ind_des_grupo1_total'); ?>
                 </div>
            </div>
            
            <div class="bigCampo">
                <label>Límite de Endeudamiento Municipal</label>
                <div class="comment">Mide el valor de dinero comprometido con relacián a cada dólar disponible,
                el resultado no deberá ser mayor que 1.70, (Art. 5 de la Ley de Endeudamiento Público Municipal)
                y se considera aceptable, si cada vez que se determine el indicador, este resulta ser un valor
                decreciente y menor que 1.70.</div>
                 <div class="bdy">
                    <div class="frm">
                        <div class="hdr">Límite de Endeudamiento Municipal</div>
                        <div class="igual">=</div>
                        <div class="col">
                            <div class="row">
                                <span>Deuda Municipal Total</span>
                                <input class="txtInput" id="ind_des_grupo2_deumuntot" name="ind_des_grupo2_deumuntot" value="<?php echo set_value('ind_des_grupo2_deumuntot') ?>" />
                                <?php echo form_error('ind_des_grupo2_deumuntot'); ?>
                            </div>
                            <hr />
                            <div class="row">
                                <span>Ingresos Operacionales Percibidos</span>
                                <input class="txtInput" id="ind_des_grupo2_ingopeper" name="ind_des_grupo2_ingopeper" value="<?php echo set_value('ind_des_grupo2_ingopeper') ?>" />
                                <?php echo form_error('ind_des_grupo2_ingopeper'); ?>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="result centrar">
                    <div class="hdr">Limite de Endeudamiento Municipal</div>
                    <input id="ind_des_grupo2_total" name="ind_des_grupo2_total" type="text" size="100" value="<?php echo set_value('ind_des_grupo2_total') ?>" readonly=""/>
                    <?php echo form_error('ind_des_grupo2_total'); ?>
                 </div>
            </div>
            <div class="campo">
                <label>Observaciones:</label>
                <textarea id="ind_des_observaciones" name="ind_des_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('ind_des_observaciones') ?></textarea>
                <?php echo form_error('ind_des_observaciones'); ?>
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