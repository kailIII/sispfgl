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
 
       
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E0/guardarSolicitud'); ?>';
        });
        
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
            $("#guardar").hide();
            $.getJSON('<?php echo base_url('componente2/comp23_E1/verificarProyectoPep') . "/" ?>'+$('#selMun').val(), 
            function(data) {
                $('#Mensajito').hide();
                $.each(data, function(key, val) {
                    if(key=="records"){
                        if(val=="0"){
                            $('#Mensajito').show();
                            $("#guardar").hide();
                            $('#Mensajito').val("Este municipio no posee ningún Proyecto PEP asignado");
                        }else{
                            $('#Mensajito').hide();
                            $("#guardar").show();
                        }
                    }
                });
            });              
        });
                
        /*PARA EL DATEPICKER*/
        $( "#f_conformacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#f_acuerdo" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#f_recepcion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        
        
        /* Calculos */
        
               
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
            <input <?php if (isset($f_conformacion)) { ?> value='<?php echo date('d/m/Y', strtotime($f_conformacion)); ?>'<?php } ?>id="f_conformacion" name="f_conformacion" type="text" size="10" readonly="readonly"/>
        </div>
        <hr />
        <div id="rpt-border"></div>
        
        <div class="bigCampo">
            <label>Resultado Presupuestario</label>
            <div class="comment">Determina el comportamiento de la ejecucion</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Resultado Presupuestario</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Ingresos Totales Precibidos</span>
                            <input class="txtInput" id="t_ingTotPer" name="t_ingTotPer" />
                            <span>- Gastos Totales Devengados</span>
                            <input class="txtInput" id="t_gasTotDev" name="t_gasTotDev" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Resultado Presupuestario</div>
                <input id="t_E1_total" name="t_E1_total" type="text" size="100" />
             </div>
        </div>
        
        <div class="bigCampo">
            <label>Autonomia Financiera</label>
            <div class="comment">Mide el valor de dinero comprometido con relacion a cada dolar disponible,
            el resultado no debera ser mayor que 1.70, (Art. 5 de la Ley de Endeudamiento Publico Municipal)
            y se concidera aceptable, si cada vez que se determine el indicador, este resulta ser un valor
            decreciente y menor que 1.70.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Autonomia Financiera</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Ingresos Propios Devengados</span>
                            <input class="txtInput" id="t_ingProDev" name="t_ingProDev" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Total de Ingresos Devengados</span>
                            <input class="txtInput" id="t_totIngDev" name="t_totIngDev" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Autonomia Financiera</div>
                <input id="t_E2_total" name="t_E2_total" type="text" size="100" />
             </div>
        </div>
        
        <div class="bigCampo">
            <label>Eficacia en la Recaudacion</label>
            <div class="comment">Mide el valor de dinero comprometido con relacion a cada dolar disponible,
            el resultado no debera ser mayor que 1.70, (Art. 5 de la Ley de Endeudamiento Publico Municipal)
            y se concidera aceptable, si cada vez que se determine el indicador, este resulta ser un valor
            decreciente y menor que 1.70.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Eficacia en la Recaudacion</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Monto de Ingresos Propios Percibidos en el Ano de Impuestos y Tasas de Credito</span>
                            <input class="txtInput" id="t_ingProDev" name="t_ingProDev" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Total de Ingresos Devengados</span>
                            <input class="txtInput" id="t_totIngDev" name="t_totIngDev" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Eficacia en la Recaudacion</div>
                <input id="t_E3_total" name="t_E3_total" type="text" size="100" />
             </div>
        </div>
        
        <div class="bigCampo">
            <label>Eficacia en la Ejecucion Presupuestaria de Ingresos Propiedades Percibidos (Eficacia en la Ejecucion)</label>
            <div class="comment">Mide el grado de alcance de la meta propuesta. Este indicador permite establecer la brecha
            existente entre el monto fijado (presupuestado) y lo realmente ejecutado o recaudado. 
            <span style="color: red;">Entre mas se acerque a 100, mejor el indicador de eficiacia en la presupuestacion de ingresos.</span></div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Eficacia en la Ejecucion</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Monto de Ingresos Propios Percibidos en el Ano</span>
                            <input class="txtInput" id="t_E4_monProPer" name="t_E4_monProPer" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Monto de ingresos Propios Presupuestado</span>
                            <input class="txtInput" id="t_E4_monProPre" name="t_E4_monProPre" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Eficacia en la Ejecucion</div>
                <input id="t_E4_total" name="t_E4_total" type="text" size="100" />
             </div>
        </div>
        
        <div class="bigCampo">
            <label>Participacion de Ingresos por Tasas</label>
            <div class="comment">Determinar la participacion relativa de las tasas dentro de la estructura
            de los ingresos propios percibidos.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Participacion de Ingresos por Tasas</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Total de Ingresos por Tasas Percibidos</span>
                            <input class="txtInput" id="t_E5_ingTasPer" name="t_E5_ingTasPer" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Total de Ingresos Propios Percibidos</span>
                            <input class="txtInput" id="t_E5_ingProPer" name="t_E5_ingProPer" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Participacion de Ingresos por Tasas</div>
                <input id="t_E5_total" name="t_E5_total" type="text" size="100" />
             </div>
        </div>
        
        <div class="bigCampo">
            <label>Participacion de Ingresos por Impuestos</label>
            <div class="comment">Determinar la participacion relativa de las Impuestos dentro de la estructura
            de los ingresos propios percibidos.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Participacion de Ingresos por Impuestos</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Total de Ingresos por Impuestos Percibidos</span>
                            <input class="txtInput" id="t_E6_ingImpPer" name="t_E6_ingImpPer" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Total de Ingresos Propios Percibidos</span>
                            <input class="txtInput" id="t_E6_ingProPer" name="t_E6_ingProPer" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Participacion de Ingresos por Impuestos</div>
                <input id="t_E6_total" name="t_E6_total" type="text" size="100" />
             </div>
        </div>
        
        <div style="width: 100%;">
            <div style="width: 50%;">
                <div class="campo">
                    <label>Observaciones</label>
                    <textarea cols="30" rows="5" wrap="virtual" maxlength="100"></textarea>
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