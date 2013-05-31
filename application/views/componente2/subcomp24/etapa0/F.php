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
    $( "#ind_des_fecha" ).datepicker({
        showOn:         'both',
        maxDate:        '+1D',
        buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd/mm/yy'
    });
    /* Calculos */
    $('.txtInput').change(function(){cambios();});
    function cambios(){
        var t;
        $('#ind_des_grupo1_total').val(function(){if(isFinite(t=parseFloat($('#ind_des_grupo1_ingcorpre').val())/parseFloat($('#ind_des_grupo1_gascordev').val()))){return t;}else{return'';}});
        $('#ind_des_grupo2_total').val(function(){if(isFinite(t=parseFloat($('#ind_des_grupo2_gascordev').val())/parseFloat($('#ind_des_grupo2_totgascor').val()))){return t;}else{return'';}});
        $('#ind_des_grupo3_total').val(function(){if(isFinite(t=parseFloat($('#ind_des_grupo3_ejegasinv').val())/parseFloat($('#ind_des_grupo3_totgasinv').val()))){return t;}else{return'';}});
        $('#ind_des_grupo4_total').val(function(){if(isFinite(t=parseFloat($('#ind_des_grupo4_gascordev').val())/parseFloat($('#ind_des_grupo4_ingcorper').val()))){return t;}else{return'';}});
        $('#ind_des_grupo5_total').val(function(){if(isFinite(t=parseFloat($('#ind_des_grupo5_armderdeu').val())/parseFloat($('#ind_des_grupo5_egrtotdev').val()))){return t;}else{return'';}});
        $('#ind_des_grupo6_total').val(function(){if(isFinite(t=parseFloat($('#ind_des_grupo6_gascordev').val())/parseFloat($('#ind_des_grupo6_egrtotdev').val()))){return t;}else{return'';}});
        $('#ind_des_grupo7_total').val(function(){if(isFinite(t=parseFloat($('#ind_des_grupo7_gastotinv').val())/parseFloat($('#ind_des_grupo7_egrtotdev').val()))){return t;}else{return'';}});
        $('#ind_des_grupo8_total').val(function(){if(isFinite(t=parseFloat($('#ind_des_grupo8_gasinvinf').val())/parseFloat($('#ind_des_grupo8_ejegastot').val()))){return t;}else{return'';}});
        $('#ind_des_grupo9_total').val(function(){if(isFinite(t=parseFloat($('#ind_des_grupo9_ingcorper').val())-parseFloat($('#ind_des_grupo9_gascordev').val()))){return t;}else{return'';}});
        $('#ind_des_grupo10_total').val(function(){if(isFinite(t=parseFloat($('#ind_des_grupo10_gastotper').val())/parseFloat($('#ind_des_grupo10_ingcorper').val()))){return t;}else{return'';}});
        $('#ind_des_grupo11_total').val(function(){if(isFinite(t=(1-(parseFloat($('#ind_des_grupo11_ingproper').val()))*100)/parseFloat($('#ind_des_grupo11_gascordev').val()))){return t;}else{return'';}});
        $('#ind_des_grupo12_total').val(function(){if(isFinite(t=parseFloat($('#ind_des_grupo12_valdefser').val())/parseFloat($('#ind_des_grupo12_gastotser').val()))){return t;}else{return'';}});
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
    <h2 class="h2Titulos">Indicadores de Desempeno Administrativo y Financiero Municipal</h2>
    <h2 class="h2Titulos">Indicadores para el Análisis del Comportamiento de los Gastos</h2>
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
        <!-- F1 -->
        <div class="bigCampo">
            <label>Autonomia Operativa</label>
            <div class="comment">Mide la capacidad que tiene el municipio para financiar sus gastos operativos con sus recursos
            propios. Un indicador <span style="color: red;">menor que uno (1)</span> que muestra una situacion deficiente, 
            es decir, el municipio no alcanza a financiar sus gastos operativos con sus recursos propios; 
            <span style="color:red;">igual o mayor de uno (1) </span>la situación es sostenible.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Autonomia Operativa</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Ingresos Corrientes Precibidos</span>
                            <input class="txtInput" id="ind_des_grupo1_ingcorpre" name="ind_des_grupo1_ingcorpre" value="<?php echo set_value('ind_des_grupo1_ingcorpre');?>" />
                            <?php echo form_error('ind_des_grupo1_ingcorpre'); ?>
                        </div>
                        <hr />
                        <div class="row">
                            <span>Gastos Corrientes Devengados</span>
                            <input class="txtInput" id="ind_des_grupo1_gascordev" name="ind_des_grupo1_gascordev" value="<?php echo set_value('ind_des_grupo1_gascordev');?>" />
                            <?php echo form_error('ind_des_grupo1_gascordev'); ?>
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Autonomia Operativa</div>
                <input id="ind_des_grupo1_total" name="ind_des_grupo1_total" type="text" size="100" />
             </div>
        </div>
        <!-- F2 -->
        <div class="bigCampo">
            <label>Eficacia Administrativa</label>
            <div class="comment">Mide el grado de alcance de la meta propuesta. Este indicador permite establecer la brecha existente
            entre el monto fijado (presupuestado) para financiar los gastos operativos y lo realmente ejecutado o gastado.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Autonomia Administrativa</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Gastos Corrientes Devengados</span>
                            <input class="txtInput" id="ind_des_grupo2_gascordev" name="ind_des_grupo2_gascordev" value="<?php echo set_value('ind_des_grupo2_gascordev');?>" />
                            <?php echo form_error('ind_des_grupo2_gascordev'); ?>
                        </div>
                        <hr />
                        <div class="row">
                            <span>Total Gastos Corrientes Presupuestados</span>
                            <input class="txtInput" id="ind_des_grupo2_totgascor" name="ind_des_grupo2_totgascor" value="<?php echo set_value('ind_des_grupo2_totgascor');?>" />
                            <?php echo form_error('ind_des_grupo2_totgascor'); ?>
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Autonomia Administrativa</div>
                <input id="ind_des_grupo2_total" name="ind_des_grupo2_total" type="text" size="100" />
             </div>
        </div>
        
        <div class="bigCampo">
            <label>Eficacia en la Inversión</label>
            <div class="comment">Mide el grado de alcance de la meta propuesta. Este indicador permite establecer la 
            brecha existente entre el monto fijado (presupuestado) para la inversion y lo realmente ejecutado.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Eficacia en la Inversión</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Ejecucion de Gastos de Inversion</span>
                            <input class="txtInput" id="ind_des_grupo3_ejegasinv" name="ind_des_grupo3_ejegasinv" value="<?php echo set_value('ind_des_grupo3_ejegasinv');?>" />
                            <?php echo form_error('ind_des_grupo3_ejegasinv'); ?>
                        </div>
                        <hr />
                        <div class="row">
                            <span>Total de Gastos de Inversion Presupuestados</span>
                            <input class="txtInput" id="ind_des_grupo3_totgasinv" name="ind_des_grupo3_totgasinv" value="<?php echo set_value('ind_des_grupo3_totgasinv');?>" />
                            <?php echo form_error('ind_des_grupo3_totgasinv'); ?>
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Eficacia en la Recaudacion</div>
                <input id="ind_des_grupo3_total" name="ind_des_grupo3_total" type="text" size="100" />
             </div>
        </div>
        
        <div class="bigCampo">
            <label>Eficacia del Gasto</label>
            <div class="comment">Mide el desempeño del gasto corriente frente a los recursos propios (incluido el 25% FODES).
            Busca obtener el mejor resultado posible a menor costo; un indicador igual o menor a uno (1) muestra un gasto apropiado
            o sostenible frente a los resultados propios; mayor a uno (1) es un gasto corriente deficiente o no sostenible.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Eficacia del Gasto</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Gastos Corrientes Devengados</span>
                            <input class="txtInput" id="ind_des_grupo4_gascordev" name="ind_des_grupo4_gascordev" value="<?php echo set_value('ind_des_grupo4_gascordev');?>" />
                            <?php echo form_error('ind_des_grupo4_gascordev'); ?>
                        </div>
                        <hr />
                        <div class="row">
                            <span>Ingresos Corrientes Percibidos</span>
                            <input class="txtInput" id="ind_des_grupo4_ingcorper" name="ind_des_grupo4_ingcorper" value="<?php echo set_value('ind_des_grupo4_ingcorper');?>" />
                            <?php echo form_error('ind_des_grupo4_ingcorper'); ?>
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Eficacia del Gasto</div>
                <input id="ind_des_grupo4_total" name="ind_des_grupo4_total" type="text" size="100" />
             </div>
        </div>
        
        <div class="bigCampo">
            <label>Servicio de la Deuda</label>
            <div class="comment">Mide el peso relativo del servicio de la deuda frente a la ejecucion de los gastos totales.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Servicio de la Deuda</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Armotización del Servicio de la Deuda</span>
                            <input class="txtInput" id="ind_des_grupo5_armderdeu" name="ind_des_grupo5_armderdeu" value="<?php echo set_value('ind_des_grupo5_armderdeu');?>" />
                            <?php echo form_error('ind_des_grupo5_armderdeu'); ?>
                        </div>
                        <hr />
                        <div class="row">
                            <span>Egresos Totales Devengados</span>
                            <input class="txtInput" id="ind_des_grupo5_egrtotdev" name="ind_des_grupo5_egrtotdev" value="<?php echo set_value('ind_des_grupo5_egrtotdev');?>" />
                            <?php echo form_error('ind_des_grupo5_egrtotdev'); ?>
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Servicio de la Deuda</div>
                <input id="ind_des_grupo5_total" name="ind_des_grupo5_total" type="text" size="100" />
             </div>
        </div>
        
        <div class="bigCampo">
            <label>Participacion de los Gastos Operativos</label>
            <div class="comment">Determinar la participacion relativa de las Impuestos dentro de la estructura
            de los ingresos propios percibidos.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Participacion de los Gastos Operativos</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Gastos Corrientes Devengados</span>
                            <input class="txtInput" id="ind_des_grupo6_gascordev" name="ind_des_grupo6_gascordev" value="<?php echo set_value('ind_des_grupo6_gascordev');?>" />
                            <?php echo form_error('ind_des_grupo6_gascordev'); ?>
                        </div>
                        <hr />
                        <div class="row">
                            <span>Egresos Totales Devengados</span>
                            <input class="txtInput" id="ind_des_grupo6_egrtotdev" name="ind_des_grupo6_egrtotdev" value="<?php echo set_value('ind_des_grupo6_egrtotdev');?>" />
                            <?php echo form_error('ind_des_grupo6_egrtotdev'); ?>
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Participacion de los Gastos Operativos</div>
                <input id="ind_des_grupo6_total" name="ind_des_grupo6_total" type="text" size="100" />
             </div>
        </div>
        
        <!-- 7 -->
        <div class="bigCampo">
            <label>Participacion de la Inversión</label>
            <div class="comment">Mide el peso relativo de los gastos de inversión frente a la ejecución de
            los gastos totales.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Participacion de la Inversión</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Gastos Total de Inversión</span>
                            <input class="txtInput" id="ind_des_grupo7_gastotinv" name="ind_des_grupo7_gastotinv" value="<?php echo set_value('ind_des_grupo7_gastotinv');?>" />
                            <?php echo form_error('ind_des_grupo7_gastotinv'); ?>
                        </div>
                        <hr />
                        <div class="row">
                            <span>Egresos Totales Devengados</span>
                            <input class="txtInput" id="ind_des_grupo7_egrtotdev" name="ind_des_grupo7_egrtotdev" value="<?php echo set_value('ind_des_grupo7_egrtotdev');?>" />
                            <?php echo form_error('ind_des_grupo7_egrtotdev'); ?>
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Participacion de la Inversión</div>
                <input id="ind_des_grupo7_total" name="ind_des_grupo7_total" type="text" size="100" />
             </div>
        </div>
        
        <!-- 8 -->
        <div class="bigCampo">
            <label>Inversión en Infraestructura</label>
            <div class="comment">Mide el peso relativo de los gastos de infraestructura frente a la ejecución de
            los gastos totales de inversión.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Inversión en Infraestructura</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Gastos de Inversión en Infraestructura</span>
                            <input class="txtInput" id="ind_des_grupo8_gasinvinf" name="ind_des_grupo8_gasinvinf" value="<?php echo set_value('ind_des_grupo8_gasinvinf');?>" />
                            <?php echo form_error('ind_des_grupo8_gasinvinf'); ?>
                        </div>
                        <hr />
                        <div class="row">
                            <span>Ejecución de Gastos Totales de Inversión</span>
                            <input class="txtInput" id="ind_des_grupo8_ejegastot" name="ind_des_grupo8_ejegastot" value="<?php echo set_value('ind_des_grupo8_ejegastot');?>" />
                            <?php echo form_error('ind_des_grupo8_ejegastot'); ?>
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Inversión en Infraestructura</div>
                <input id="ind_des_grupo8_total" name="ind_des_grupo8_total" type="text" size="100" />
             </div>
        </div>
        
        <!-- 9 -->
        <div class="bigCampo">
            <label>Ahorro Corriente</label>
            <div class="comment">Calcula el saldo (excedente o deficit) entre los ingresos y los gastos corrientes en un
            periodo definido, si el valor es negativo, existe deficit.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Ahorro Corriente</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Ingresos Corrientes Percibios</span>
                            <input class="txtInput" id="ind_des_grupo9_ingcorper" name="ind_des_grupo9_ingcorper" value="<?php echo set_value('ind_des_grupo9_ingcorper');?>" />
                            <?php echo form_error('ind_des_grupo9_ingcorper'); ?>
                            <span>- Gastos Corrientes Devengados</span>
                            <input class="txtInput" id="ind_des_grupo9_gascordev" name="ind_des_grupo9_gascordev" value="<?php echo set_value('ind_des_grupo9_gascordev');?>" />
                            <?php echo form_error('ind_des_grupo9_gascordev'); ?>
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Ahorro Corriente</div>
                <input id="ind_des_grupo9_total" name="ind_des_grupo9_total" type="text" size="100" />
             </div>
        </div>
        
        <!-- 10 -->
        <div class="bigCampo">
            <label>Indice de gasto Personal</label>
            <div class="comment">Calcula el porcentaje de gastos en personal,
            el indicador no debe ser mayor de <span style="color: red;">50%</span></div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Indice de gasto Personal</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Gasto Total en Personal del Ejercicio Fiscal</span>
                            <input class="txtInput" id="ind_des_grupo10_gastotper" name="ind_des_grupo10_gastotper" value="<?php echo set_value('ind_des_grupo10_gastotper');?>" />
                            <?php echo form_error('ind_des_grupo10_gastotper'); ?>
                        </div>
                        <hr />
                        <div class="row">
                            <span>Ingreso Corrientes Percibidos</span>
                            <input class="txtInput" id="ind_des_grupo10_ingcorper" name="ind_des_grupo10_ingcorper" value="<?php echo set_value('ind_des_grupo10_ingcorper');?>" />
                            <?php echo form_error('ind_des_grupo10_ingcorper'); ?>
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Indice de gasto Personal</div>
                <input id="ind_des_grupo10_total" name="ind_des_grupo10_total" type="text" size="100" />
             </div>
        </div>
        
        <!-- 11 -->
        <div class="bigCampo">
            <label>Indice de Subsidio del gasto Corriente <br />(Indice de Subsidio)</label>
            <div class="comment">Calcula el porcentaje de gastos corriente que esta siendo subsidiado con otras fuentes de ingresos.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Indice de Subsidio</div>
                    <div class="igual">=</div>
                    <div class="col">1 - (</div>
                    <div class="col">
                        <div class="row">
                            <span>Ingresos Propios Percibidos</span>
                            <input class="txtInput" id="ind_des_grupo11_ingproper" name="ind_des_grupo11_ingproper" value="<?php echo set_value('ind_des_grupo11_ingproper');?>" />
                            <?php echo form_error('ind_des_grupo11_ingproper'); ?>
                        </div>
                        <hr />
                        <div class="row">
                            <span>Gasto Corriente Devengado</span>
                            <input class="txtInput" id="ind_des_grupo11_gascordev" name="ind_des_grupo11_gascordev" value="<?php echo set_value('ind_des_grupo11_gascordev');?>" />
                            <?php echo form_error('ind_des_grupo11_gascordev'); ?>
                        </div>
                    </div>
                    <div class="col">) x 100</div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Indice de Subsidio</div>
                <input id="ind_des_grupo11_total" name="ind_des_grupo11_total" type="text" size="100" />
             </div>
        </div>
        
        <!-- 12 -->
        <div class="bigCampo">
            <label>Porcentaje de Subsidio Por Prestacion de Los Servicios Basicos <br />(Porcentaje de Subsidio)</label>
            <div class="comment">Calcula el porcentaje de costos que estan siendo subsidiados por la presentación de los
            servicios básicos municipales (Aseo, Disposición final, Alumbrado, Mantenimiento de Vias, etc.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Indice de Subsidio</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Valor del Deficit de los Servicios</span>
                            <input class="txtInput" id="ind_des_grupo12_valdefser" name="ind_des_grupo12_valdefser" value="<?php echo set_value('ind_des_grupo12_valdefser');?>" />
                            <?php echo form_error('ind_des_grupo12_valdefser'); ?>
                        </div>
                        <hr />
                        <div class="row">
                            <span>Gasto Total de los Servicios</span>
                            <input class="txtInput" id="ind_des_grupo12_gastotser" name="ind_des_grupo12_gastotser" value="<?php echo set_value('ind_des_grupo12_gastotser');?>" />
                            <?php echo form_error('ind_des_grupo12_gastotser'); ?>
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Indice de Subsidio</div>
                <input id="ind_des_grupo12_total" name="ind_des_grupo12_total" type="text" size="100" />
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
<?php echo form_close();
$this->load->view('plantilla/footer'); ?>