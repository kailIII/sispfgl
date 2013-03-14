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
 
        /*FIN DIALOGOS VALIDACION*/
        
        /* Calculos */
        $('.txtInput').change(function(){
            
            var d1_up   = parseFloat($('#ind_des_grupo1_pasCir').val()) + ( parseFloat($('#ind_des_grupo1_deuCorPla').val()) + parseFloat($('#ind_des_grupo1_interes').val()) );
            var d1_down = parseFloat($('#ind_des_grupo1_ahoOper').val()) + parseFloat($('#ind_des_grupo1_intDueda').val());
            $('#ind_des_grupo1_total').val(d1_up/d1_down);
            
            var ingOpePer = $('#ind_des_grupo2_ingOpePer').val();
            var deuMunTotal = $('#ind_des_grupo2_deuMunTotal').val();
            $('#ind_des_grupo2_total').val(deuMunTotal/ingOpePer);
        });
        
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
        if(isset($ind_des_id) && $ind_des_id > 0){
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

    <h2 class="h2Titulos">Etapa 0: Condiciones Previas</h2>
    <h2 class="h2Titulos">Indicadores de Desempeno Administrativo y Financiero Municipal</h2>
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
                <label>Indice de Capacidad de Pago</label>
                <div class="comment">Mide la disponibilidad de recursos financieros
                 con que cuenta la municipalidad para hacer frente al pago de la deuda 
                 de corto plazo y se considera escesivo cuando el indicador resultante
                 es un valor negativo, Art. 3 de la Ley de Endeudamiento Municipal:
                 No podra superar el limite maximo de 0.6 veces el ahorro operacional
                 obtenido por la municipalidad en el ejercicio fiscal anterior.</div>
                 <div class="bdy">
                    <div class="frm">
                        <div class="hdr">Indice de Capacidad de Pago</div>
                        <div class="igual">=</div>
                        <div class="col">
                            <div class="row">
                                <span>Pasivo Circulante</span>
                                <input class="txtInput" id="ind_des_grupo1_pasCir" name="ind_des_grupo1_pasCir" value="<?php echo set_value('ind_des_grupo1_pasCir') ?>" /><?php echo form_error('ind_des_grupo1_pasCir'); ?>
                                <span>+ ( Deuda a Corto Plazo</span>
                                <input class="txtInput" id="ind_des_grupo1_deuCorPla" name="ind_des_grupo1_deuCorPla" value="<?php echo set_value('ind_des_grupo1_deuCorPla') ?>" /><?php echo form_error('ind_des_grupo1_deuCorPla'); ?>
                                <span>+ Intereses</span>
                                <input class="txtInput" id="ind_des_grupo1_int" name="ind_des_grupo1_int" value="<?php echo set_value('ind_des_grupo1_int') ?>" /><?php echo form_error('ind_des_grupo1_int'); ?>
                                <span>)</span>
                            </div>
                            <div></div>
                            <hr />
                            <div class="row">
                                <span>Ahorro Operacional</span>
                                <input class="txtInput" id="ind_des_grupo1_ahoOper" name="ind_des_grupo1_ahoOper" value="<?php echo set_value('ind_des_grupo1_ahoOper') ?>" /><?php echo form_error('ind_des_grupo1_ahoOper'); ?>
                                <span>+ Intereses de la deuda</span>
                                <input class="txtInput" id="ind_des_grupo1_intDueda" name="ind_des_grupo1_intDueda" value="<?php echo set_value('ind_des_grupo1_intDueda') ?>" /><?php echo form_error('ind_des_grupo1_intDueda'); ?>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="result centrar">
                    <div class="hdr">Indice Capacidad de Pago</div>
                    <input id="ind_des_grupo1_total" name="ind_des_grupo1_total" type="text" size="100"  value="<?php echo set_value('ind_des_grupo1_total') ?>" readonly=""/>
                 </div>
            </div>
            
            <div class="bigCampo">
                <label>Limite de Endeudamiento Municipal</label>
                <div class="comment">Mide el valor de dinero comprometido con relacion a cada dolar disponible,
                el resultado no debera ser mayor que 1.70, (Art. 5 de la Ley de Endeudamiento Publico Municipal)
                y se concidera aceptable, si cada vez que se determine el indicador, este resulta ser un valor
                decreciente y menor que 1.70.</div>
                 <div class="bdy">
                    <div class="frm">
                        <div class="hdr">Limite de Endeudamiento Municipal</div>
                        <div class="igual">=</div>
                        <div class="col">
                            <div class="row">
                                <span>Deuda Municipal Total</span>
                                <input class="txtInput" id="ind_des_grupo2_deuMunTotal" name="ind_des_grupo2_deuMunTotal" value="<?php echo set_value('ind_des_grupo2_deuMunTotal') ?>" /><?php echo form_error('ind_des_grupo2_deuMunTotal'); ?>
                            </div>
                            <hr />
                            <div class="row">
                                <span>Ingresos Operacionales Percibidos</span>
                                <input class="txtInput" id="ind_des_grupo2_ingOpePer" name="ind_des_grupo2_ingOpePer" value="<?php echo set_value('ind_des_grupo2_ingOpePer') ?>" /><?php echo form_error('ind_des_grupo2_ingOpePer'); ?>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="result centrar">
                    <div class="hdr">Limite de Endeudamiento Municipal</div>
                    <input id="ind_des_grupo2_total" name="ind_des_grupo2_total" type="text" size="100" value="<?php echo set_value('ind_des_grupo2_total') ?>" readonly=""/><?php echo form_error('ind_des_grupo2_total'); ?>
                 </div>
            </div>
            
            <div style="width: 100%;">
                <div style="width: 50%;">
                    <div class="campo">
                        <label>Observaciones</label>
                        <textarea id="ind_des_observaciones" name="ind_des_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('ind_des_observaciones') ?></textarea>
                        <?php echo form_error('ind_des_observaciones'); ?>
                    </div>
                </div>
                <div style="width: 50%;">
                    
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