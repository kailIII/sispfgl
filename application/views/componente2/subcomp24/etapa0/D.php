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
        $( "#fecha" ).datepicker({
            showOn: 'both',
            maxDate: '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        
        /* Calculos */
        $('.txtInput').change(function(){
            
            var d1_up   = parseFloat($('#t_pasCir').val()) + ( parseFloat($('#t_deuCorPla').val()) + parseFloat($('#t_interes').val()) );
            var d1_down = parseFloat($('#t_ahoOper').val()) + parseFloat($('#t_intDueda').val());
            $('#t_icp').val(d1_up/d1_down);
            
            var ingOpePer = $('#t_ingOpePer').val();
            var deuMunTotal = $('#t_deuMunTotal').val();
            $('#t_iop').val(deuMunTotal/ingOpePer);
        });
        
               
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
    <h2 class="h2Titulos">Indicadores de Desempeno Administrativo y Financiero Municipal</h2>
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
        </div>
        <div class="campo">
            <label>Fecha:</label>
            <input id="fecha" name="fecha" type="text" readonly="readonly" value="<?php echo set_value('fecha') ?>"/>
            <?php echo form_error('fecha'); ?>
        </div>
        <div class="campo">
            <label>Periodo</label>
            <span>Del </span>
            <input id="periodo_ini" name="periodo_ini" type="text" value="<?php echo set_value('periodo_ini') ?>" style="width: 150px;"/>
            <?php echo form_error('periodo_ini'); ?>
            <span>Al</span>
            <input id="periodo_fin" name="periodo_fin" type="text" value="<?php echo set_value('periodo_fin') ?>" style="width: 150px;"/>
            <?php echo form_error('periodo_fin'); ?>
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
                            <input class="txtInput" id="t_pasCir" name="t_pasCir" value="<?php echo set_value('t_pasCir') ?>" /><?php echo form_error('t_pasCir'); ?>
                            <span>+ ( Deuda a Corto Plazo</span>
                            <input class="txtInput" id="t_deuCorPla" name="t_deuCorPla" value="<?php echo set_value('t_deuCorPla') ?>" /><?php echo form_error('t_deuCorPla'); ?>
                            <span>+ Intereses</span>
                            <input class="txtInput" id="t_interes" name="t_interes" value="<?php echo set_value('t_interes') ?>" /><?php echo form_error('t_interes'); ?>
                            <span>)</span>
                        </div>
                        <div></div>
                        <hr />
                        <div class="row">
                            <span>Ahorro Operacional</span>
                            <input class="txtInput" id="t_ahoOper" name="t_ahoOper" value="<?php echo set_value('t_ahoOper') ?>" /><?php echo form_error('t_ahoOper'); ?>
                            <span>+ Intereses de la deuda</span>
                            <input class="txtInput" id="t_intDueda" name="t_intDueda" value="<?php echo set_value('t_intDueda') ?>" /><?php echo form_error('t_intDueda'); ?>
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Indice Capacidad de Pago</div>
                <input id="t_icp" name="t_icp" type="text" size="100"  value="<?php echo set_value('t_icp') ?>" readonly=""/>
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
                            <input class="txtInput" id="t_deuMunTotal" name="t_deuMunTotal" value="<?php echo set_value('t_deuMunTotal') ?>" /><?php echo form_error('t_deuMunTotal'); ?>
                        </div>
                        <hr />
                        <div class="row">
                            <span>Ingresos Operacionales Percibidos</span>
                            <input class="txtInput" id="t_ingOpePer" name="t_ingOpePer" value="<?php echo set_value('t_ingOpePer') ?>" /><?php echo form_error('t_ingOpePer'); ?>
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Limite de Endeudamiento Municipal</div>
                <input id="t_iop" name="t_iop" type="text" size="100" value="<?php echo set_value('t_iop') ?>" readonly=""/><?php echo form_error('t_iop'); ?>
             </div>
        </div>
        
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