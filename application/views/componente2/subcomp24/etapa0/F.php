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
        <!-- -->
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
                            <input class="txtInput" id="t_ingTotPer" name="t_ingTotPer" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Gastos Corrientes Devengados</span>
                            <input class="txtInput" id="t_gasTotDev" name="t_gasTotDev" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Autonomia Operativa</div>
                <input id="t_F1_total" name="t_F1_total" type="text" size="100" />
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
                            <input class="txtInput" id="t_ingProDev" name="t_ingProDev" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Total Gastos Corrientes Presupuestados</span>
                            <input class="txtInput" id="t_totIngDev" name="t_totIngDev" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Autonomia Administrativa</div>
                <input id="t_F2_total" name="t_F2_total" type="text" size="100" />
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
                            <input class="txtInput" id="t_ingProDev" name="t_ingProDev" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Total de Gastos de Inversion Presupuestados</span>
                            <input class="txtInput" id="t_totIngDev" name="t_totIngDev" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Eficacia en la Recaudacion</div>
                <input id="t_F3_total" name="t_F3_total" type="text" size="100" />
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
                            <input class="txtInput" id="t_F4_monProPer" name="t_F4_monProPer" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Ingresos Corrientes Percibidos</span>
                            <input class="txtInput" id="t_F4_monProPre" name="t_F4_monProPre" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Eficacia del Gasto</div>
                <input id="t_F4_total" name="t_F4_total" type="text" size="100" />
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
                            <input class="txtInput" id="t_F5_ingTasPer" name="t_F5_ingTasPer" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Egresos Totales Devengados</span>
                            <input class="txtInput" id="t_F5_ingProPer" name="t_F5_ingProPer" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Servicio de la Deuda</div>
                <input id="t_F5_total" name="t_F5_total" type="text" size="100" />
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
                            <input class="txtInput" id="t_F6_ingImpPer" name="t_F6_ingImpPer" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Egresos Totales Devengados</span>
                            <input class="txtInput" id="t_F6_ingProPer" name="t_F6_ingProPer" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Participacion de los Gastos Operativos</div>
                <input id="t_F6_total" name="t_F6_total" type="text" size="100" />
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
                            <input class="txtInput" id="t_F6_ingImpPer" name="t_F6_ingImpPer" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Egresos Totales Devengados</span>
                            <input class="txtInput" id="t_F6_ingProPer" name="t_F6_ingProPer" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Participacion de la Inversión</div>
                <input id="t_F7_total" name="t_F7_total" type="text" size="100" />
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
                            <input class="txtInput" id="t_F6_ingImpPer" name="t_F6_ingImpPer" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Ejecución de Gastos Totales de Inversión</span>
                            <input class="txtInput" id="t_F6_ingProPer" name="t_F6_ingProPer" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Inversión en Infraestructura</div>
                <input id="t_F8_total" name="t_F8_total" type="text" size="100" />
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
                            <input class="txtInput" id="t_F6_ingImpPer" name="t_F6_ingImpPer" />
                            <span>- Gastos Corrientes Devengados</span>
                            <input class="txtInput" id="t_F6_ingProPer" name="t_F6_ingProPer" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Ahorro Corriente</div>
                <input id="t_F9_total" name="t_F9_total" type="text" size="100" />
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
                            <input class="txtInput" id="t_F6_ingImpPer" name="t_F6_ingImpPer" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Ingreso Corrientes Percibidos</span>
                            <input class="txtInput" id="t_F6_ingProPer" name="t_F6_ingProPer" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Indice de gasto Personal</div>
                <input id="t_F10_total" name="t_F10_total" type="text" size="100" />
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
                            <input class="txtInput" id="t_F6_ingImpPer" name="t_F6_ingImpPer" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Gasto Corriente Devengado</span>
                            <input class="txtInput" id="t_F6_ingProPer" name="t_F6_ingProPer" />
                        </div>
                    </div>
                    <div class="col">) x 100</div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Indice de Subsidio</div>
                <input id="t_F11_total" name="t_F11_total" type="text" size="100" />
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
                            <input class="txtInput" id="t_F6_ingImpPer" name="t_F6_ingImpPer" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Gasto Total de los Servicios</span>
                            <input class="txtInput" id="t_F6_ingProPer" name="t_F6_ingProPer" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Indice de Subsidio</div>
                <input id="t_F12_total" name="t_F12_total" type="text" size="100" />
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