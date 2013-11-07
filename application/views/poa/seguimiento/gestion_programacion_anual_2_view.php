<script type="text/javascript">
    $(document).ready(function() {
        $('#guardar').button().click(function() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url($ruta . 'guardarPlanificacionAnual') . "/" . $anio . "/" . $poa_com_id ?>',
                data: $("#seguimientoForm").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $('#efectivo').dialog('open');
                }
            });
            return false;
        });
        
        $('#regresar').button().click(function() {
            document.location.href = '<?php echo base_url($ruta . 'planificacionAnual'); ?>';
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

        $(".numeric").numeric();

<?php
foreach ($actividades as $aux) {
    if (!is_null($aux->poa_act_padre)) {
        ?>
                        $( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).change(function() {
                            if($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val()!=''){
                                var inicio=parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val());
                                var fin= parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val());
                                if(inicio<=fin){
                                    for ( var i = 1; i <= 12; i++ ) {
                                        $("#<?php echo $aux->poa_act_id ?>_"+i).removeAttr("checked");
                                    }
                                    for ( var i = inicio; i <= fin; i++ ) {
                                        $("#<?php echo $aux->poa_act_id ?>_"+i).attr("checked","checked");
                                    }                                                                                                                                                                                       
                                }else{
                                    $('#mayor').dialog('open');
                                    $("#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin option[value="+ (parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())+1) +"]").attr("selected",true);
                                    $( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).change();
                                }
                            }
                        });
                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                        $( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).change(function() {
                            var inicio=parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val());
                            var fin= parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val());
                            if(inicio<=fin){
                                for ( var i = 1; i <= 12; i++ ) {
                                    $("#<?php echo $aux->poa_act_id ?>_"+i).removeAttr("checked");
                                }
                                for ( var i = inicio; i <= fin; i++ ) {
                                    $("#<?php echo $aux->poa_act_id ?>_"+i).attr("checked","checked");
                                }                                                                                                                                                                                       
                            }else{
                                $('#mayor').dialog('open');
                                $("#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin option[value="+ (parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())+1) +"]").attr("selected",true);
                                $( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_inicio" ).change();
                            }
                                                                                                                                                            
                        });
                                                
                        //META PLANIFICADA
                        for ( var i = 1; i <= 12; i++ ){
                            $("#<?php echo $aux->poa_act_id ?>_"+i+"_valor").blur(function() {
                                var suma=0;
                                for ( var i = 1; i <= 12; i++ ) {
                                    suma+=parseFloat($("#<?php echo $aux->poa_act_id ?>_"+i+"_valor").val());
                                }
                                $('#<?php echo $aux->poa_act_id ?>_poa_act_det_birf').val(suma.toFixed(2));
                                a=parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_det_birf').val());
                                b=parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_det_contrapartida').val());
                                $('#<?php echo $aux->poa_act_id ?>_poa_act_det_total_proyecto').val((a+b).toFixed(2))
                                c=parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_meta_total').val());
                                d=parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_det_total_proyecto').val());
                                if(d>=c)
                                    $('#<?php echo $aux->poa_act_id ?>_pendiente').val("0.0");
                                else
                                    $('#<?php echo $aux->poa_act_id ?>_pendiente').val((c-d).toFixed(2));
                            });
                        }
                        $("#<?php echo $aux->poa_act_id ?>_poa_act_det_contrapartida").blur(function() {
                            a=parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_det_birf').val());
                            b=parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_det_contrapartida').val());
                            $('#<?php echo $aux->poa_act_id ?>_poa_act_det_total_proyecto').val((a+b).toFixed(2))
                            c=parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_meta_total').val());
                            d=parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_det_total_proyecto').val());
                            if(d>=c)
                                $('#<?php echo $aux->poa_act_id ?>_pendiente').val("0.0");
                            else
                                $('#<?php echo $aux->poa_act_id ?>_pendiente').val((c-d).toFixed(2));
                        });               
                                       
                        $("#<?php echo $aux->poa_act_id ?>_"+(i-1)+"_valor").blur();
                        if($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val()!="")
                        $( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).change();
        <?php
    }
}
?>
    });
</script>


<center>
    <h2 class="h2Titulos">Planificación Operativa Anual</h2>
    <h2 class="h2Titulos">Planificación para el año <?php echo $anio; ?> </h2>
    <br/>
    <p><strong>Componente:</strong><?php echo $componente; ?></p>
</center>
<p><strong>Indicación:</strong><ul>
    <li>Solo debe de escribir en las casillas donde su fondo es blanco.</li>
    <li>Para las fechas de Inicio y Fin sebe seleccionar de las listas desplegables los meses correspondientes a las fechas y automaticamente se 
        seleccionan en la parte de los semestres.
    <li>Los calculos de los porcentajes se realizan automaticamente al llenar las casillas de las metas</li>
</ul></p>
<div style="overflow:scroll">
    <form id="seguimientoForm" method="post" >
        <table id="box-table-a">
            <thead>
                <tr>
                <th scope="col" rowspan="2">Código Presupuestario</th>
                <th scope="col" rowspan="2">Código Actividad</th>
                <th scope="col"  rowspan="2" width='400px'>Actividad</th>
                <th scope="col"  rowspan="2" >Unidad de Medida</th>
                <th scope="col"  rowspan="2" >Cantidad</th>
                <th scope="col"  rowspan="2" >Costo Unitario ($)</th>
                <th scope="col"  rowspan="2" >Costo Total ($)</th>
                <th scope="col"  rowspan="2" >Responsable</th>
                <th scope="col"  rowspan="2" >Producto</th>
                <th scope="col" colspan="6" >1º Semestre</th>
                <th scope="col" colspan="6" >2º Semestre</th>
                <th scope="col"  rowspan="2" >Fecha Inicio</th>
                <th scope="col" rowspan="2" >Fecha Fin</th>
                <th scope="col" rowspan="2" >Realiza</th>
                <th scope="col" rowspan="2" >Fecha de entrega de TDRs o ET</th>
                <th scope="col" rowspan="2" >Periodo ejecución actividad</th>
                <th scope="col" rowspan="2" >Monto estimado</th>
                <th scope="col" rowspan="2" >Método de Contratación</th>
                <th scope="col" rowspan="2" >No. Correlativo en PAC</th>
                <th scope="col" colspan="12" >Desembolsos <?php echo $anio ?></th>
                <th scope="col" rowspan="2" >Total BIRF</th>
                <th scope="col" rowspan="2" >Total Contrapartida</th>
                <th scope="col" rowspan="2" >Total Proyecto</th>
                <th scope="col" rowspan="2" >Pendiente para <?php echo $anio + 1 ?></th>
                </tr>
                <tr>
                <th scope="col" >Ene</th>
                <th scope="col" >Feb</th>
                <th scope="col" >Mar</th>
                <th scope="col" >Abr</th>
                <th scope="col" >May</th>
                <th scope="col" >Jun</th>
                <th scope="col" >Jul</th>
                <th scope="col" >Ago</th>
                <th scope="col" >Sep</th>
                <th scope="col" >Oct</th>
                <th scope="col" >Nov</th>
                <th scope="col" >Dic</th>
                <th scope="col" >Ene</th>
                <th scope="col" >Feb</th>
                <th scope="col" >Mar</th>
                <th scope="col" >Abr</th>
                <th scope="col" >May</th>
                <th scope="col" >Jun</th>
                <th scope="col" >Jul</th>
                <th scope="col" >Ago</th>
                <th scope="col" >Sep</th>
                <th scope="col" >Oct</th>
                <th scope="col" >Nov</th>
                <th scope="col" >Dic</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ci = &get_instance();
                $ci->load->model("poa/poa_actividad", 'actividad');
                $ci->load->model("poa/poa_actividad_seguimiento", 'seguimiento');
                $this->load->model('poa/poa_model', 'poa');
                foreach ($actividades as $aux) {
                    $cuantas = $ci->actividad->obtenerCuantasSubActividades($aux->poa_act_id);
                    $seguimientos = $ci->seguimiento->obtenerSeguimientoActividad($aux->poa_act_det_id);
                    if (count($seguimientos) == 0) {
                        for ($i = 1; $i <= 12; $i++) {
                            $datos = array(
                                'poa_act_det_id' => $aux->poa_act_det_id,
                                'poa_act_seg_mes' => $i
                            );
                            $ci->poa->insertar_tabla('poa_actividad_seguimiento', $datos);
                        }
                        $seguimientos = $ci->seguimiento->obtenerSeguimientoActividad($aux->poa_act_det_id);
                    }
                    if ($cuantas == 0) {
                        ?>                
                        <tr>                    
                        <td><?php echo $aux->poa_act_cod_presupuestario ?></td>
                        <td><input value="<?php echo $aux->poa_act_id ?>" name="poa_act_id" hidden="hidden" /><?php echo $aux->poa_act_codigo ?></td>
                        <td><?php echo $aux->poa_act_descripcion ?></td>
                        <td><?php echo $aux->poa_act_unidad_medida ?></td>
                        <td><?php echo $aux->poa_act_cantidad ?></td>
                        <td><?php echo $aux->poa_act_costo_unitario ?></td>
                        <td><input type="text" value="<?php echo $aux->poa_act_meta_total ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_meta_total" id="<?php echo $aux->poa_act_id ?>_poa_act_meta_total" style="width: 50px" readonly="readonly" /></td>
                        <td><?php echo $aux->poa_act_responsable ?></td>
                        <td><?php echo $aux->poa_act_producto ?></td>

                        <td><input name="<?php echo $aux->poa_act_id ?>_1" id="<?php echo $aux->poa_act_id ?>_1" type="checkbox" readonly="readonly"></td>
                        <td><input name="<?php echo $aux->poa_act_id ?>_2" id="<?php echo $aux->poa_act_id ?>_2" type="checkbox" readonly="readonly"></td>
                        <td><input name="<?php echo $aux->poa_act_id ?>_3" id="<?php echo $aux->poa_act_id ?>_3" type="checkbox" readonly="readonly"></td>
                        <td><input name="<?php echo $aux->poa_act_id ?>_4" id="<?php echo $aux->poa_act_id ?>_4" type="checkbox" readonly="readonly"></td>
                        <td><input name="<?php echo $aux->poa_act_id ?>_5" id="<?php echo $aux->poa_act_id ?>_5" type="checkbox" readonly="readonly"></td>
                        <td><input name="<?php echo $aux->poa_act_id ?>_6" id="<?php echo $aux->poa_act_id ?>_6" type="checkbox" readonly="readonly"></td>
                        <td><input name="<?php echo $aux->poa_act_id ?>_7" id="<?php echo $aux->poa_act_id ?>_7" type="checkbox" readonly="readonly"></td>
                        <td><input name="<?php echo $aux->poa_act_id ?>_8" id="<?php echo $aux->poa_act_id ?>_8" type="checkbox" readonly="readonly"></td>
                        <td><input name="<?php echo $aux->poa_act_id ?>_9" id="<?php echo $aux->poa_act_id ?>_9" type="checkbox" readonly="readonly"></td>
                        <td><input name="<?php echo $aux->poa_act_id ?>_10" id="<?php echo $aux->poa_act_id ?>_10" type="checkbox" readonly="readonly"></td>
                        <td><input name="<?php echo $aux->poa_act_id ?>_11" id="<?php echo $aux->poa_act_id ?>_11" type="checkbox" readonly="readonly"></td>
                        <td><input name="<?php echo $aux->poa_act_id ?>_12" id="<?php echo $aux->poa_act_id ?>_12" type="checkbox" readonly="readonly"></td>
                        <td><select name="<?php echo $aux->poa_act_id ?>_poa_act_mes_inicio" id="<?php echo $aux->poa_act_id ?>_poa_act_mes_inicio">
                                <?php
                                $informacion['valor'] = $aux->poa_act_mes_inicio;
                                $this->load->view($ruta . 'select_meses', $informacion);
                                ?>
                            </select></td>
                        <td><select name="<?php echo $aux->poa_act_id ?>_poa_actividad_mes_fin" id="<?php echo $aux->poa_act_id ?>_poa_actividad_mes_fin">
                                <?php
                                $informacion['valor'] = $aux->poa_actividad_mes_fin;
                                $this->load->view($ruta . 'select_meses', $informacion);
                                ?>
                            </select></td>
                        <td><input type="text" value="<?php echo $aux->poa_act_realiza ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_realiza" id="<?php echo $aux->poa_act_id ?>_poa_act_realiza" style="width: 150px" /></td>
                        <td><input type="text" value="<?php echo $aux->poa_act_ftdrs ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_ftdrs" id="<?php echo $aux->poa_act_id ?>_poa_act_ftdrs" style="width: 50px" /></td>
                        <td><div style=" position: relative; width: 120px;">
                                <input type="text" value="<?php echo $aux->poa_act_periodo_car ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_periodo_car" id="<?php echo $aux->poa_act_id ?>_poa_act_periodo_car" class="numeric" style="width: 30px" />
                                <select tyle="width: 50px">
                                    <option value="dias" <?php if ($aux->poa_act_periodo_tipo == 'dias') echo "selected=selected"; ?> >Días</option>
                                    <option value="semanas" <?php if ($aux->poa_act_periodo_tipo == 'semanas') echo "selected=selected"; ?> >Semanas</option>
                                    <option value="meses" <?php if ($aux->poa_act_periodo_tipo == 'meses') echo "selected=selected"; ?>>Meses</option>
                                    <option value="anio" <?php if ($aux->poa_act_periodo_tipo == 'anio') echo "selected=selected"; ?>>Años</option>                                
                                </select>
                            </div>
                        </td>
                        <td><input type="text" value="<?php echo $aux->poa_act_monto_estimado ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_monto_estimado" id="<?php echo $aux->poa_act_id ?>_poa_act_monto_estimado" class="numeric" style="width: 50px"  /></td>
                        <td><input type="text" value="<?php echo $aux->poa_act_metodo ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_metodo" id="<?php echo $aux->poa_act_id ?>_poa_act_metodo" style="width: 50px" /></td>
                        <td><input type="text" value="<?php echo $aux->poa_act_pac ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_pac" id="<?php echo $aux->poa_act_id ?>_poa_act_pac" style="width: 50px" /></td>
                        <?php
                        foreach ($seguimientos as $seg) {
                            ?>
                            <td><input type="text" class="numeric" value="<?php echo $seg->poa_act_seg_desembolso ?>" name="<?php echo $aux->poa_act_id . "_" . $seg->poa_act_seg_mes ?>_valor" id="<?php echo $aux->poa_act_id . "_" . $seg->poa_act_seg_mes ?>_valor" style="width: 50px" /></td>
                        <?php } ?>
                        <td><input type="text" value="<?php echo $aux->poa_act_det_birf ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_det_birf" id="<?php echo $aux->poa_act_id ?>_poa_act_det_birf" style="width: 50px" readonly="readonly" /></td>
                        <td><input type="text" value="<?php echo $aux->poa_act_det_contrapartida ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_det_contrapartida" id="<?php echo $aux->poa_act_id ?>_poa_act_det_contrapartida" style="width: 50px" class="numeric" /></td>
                        <td><input type="text" value="<?php echo $aux->poa_act_det_total_proyecto ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_det_total_proyecto" id="<?php echo $aux->poa_act_id ?>_poa_act_det_total_proyecto" style="width: 50px" readonly="readonly" /></td>
                        <td><input type="text" value="" name="<?php echo $aux->poa_act_id ?>_pendiente" id="<?php echo $aux->poa_act_id ?>_pendiente" style="width: 50px" readonly="readonly" /></td>
                        </tr>
                    <?php } else { ?>
                        <tr class='odd'>
                        <td></td>
                        <td><?php echo $aux->poa_act_codigo ?></td>
                        <td><?php echo $aux->poa_act_descripcion ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $aux->poa_act_meta_total ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>                        
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </form>
</div>
<center style="position: relative;top:15px">
    <input id='guardar' type="button"  value="Guardar Planificación Anual" />
    <input id='regresar' type="button"  value="Regresar" />
</center>
<div id="mayor" class="mensaje" title="Error">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/cancel.png'); ?>" class="imagenError" />La fecha Fin debe ser mayor que la de inicio</p>
    </center>
</div>
<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>