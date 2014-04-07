<script type="text/javascript">
    $(document).ready(function() {
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
        $('.formulario').dialog({
            autoOpen: false,
            width: 800,
            heigth: 500
        });
        $(".numeric").numeric();
    });
</script>

<center>
    <h2 class="h2Titulos">Planificación Operativa Anual</h2>
    <h2 class="h2Titulos">Planificación para el año <?php echo $anio; ?> </h2>
    <br/>
    <p><strong>Componente:</strong><?php echo $componente; ?></p>
</center>
<p><strong>Indicación:</strong>
<ul>
    <li>Los calculos de los porcentajes se realizan automaticamente al llenar las casillas de las metas</li>
</ul></p>
<div style="overflow:scroll; max-height: 500px;">

    <table id="box-table-a">
        <thead>
            <tr>
            <th scope="col" rowspan="2">Código Presupuestario</th>
            <th scope="col" rowspan="2">Código Actividad</th>
            <th scope="col"  rowspan="2" width='400px'>Actividad</th>
            <th scope="col"  rowspan="2" >Costo Total ($)</th>
            <th scope="col"  rowspan="2" >Acciones</th>
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
                    <td><input type="text" value="<?php echo $aux->poa_act_meta_total ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_meta_total" id="<?php echo $aux->poa_act_id ?>_poa_act_meta_total" style="width: 50px; border: none; background-color: white;" readonly="readonly" /></td>
                    <td><input type="button" value="Editar" id="<?php echo $aux->poa_act_id ?>_editar" />
                        <div id="<?php echo $aux->poa_act_id ?>_dialog" class="formulario" title="Editando <?php echo $aux->poa_act_codigo ?> ">
                            <script type="text/javascript">

                                $("#<?php echo $aux->poa_act_id ?>_editar").click(function() {
                                    $.getJSON('<?php echo base_url($ruta . 'obtenerActividadDetalle') . "/" . $aux->poa_act_id ?>',
                                            function(data) {
                                                var i = 0;
                                                $.each(data, function(key, val) {
                                                    if (key == 'rows') {
                                                        $.each(val, function(id, registro) {
                                                            $('#<?php echo $aux->poa_act_id ?>_poa_act_realiza').val(registro['cell'][1]);
                                                            $('#<?php echo $aux->poa_act_id ?>_poa_act_ftdrs').val(registro['cell'][2]);
                                                            $('#<?php echo $aux->poa_act_id ?>_poa_act_periodo_car').val(registro['cell'][3]);
                                                            $('#<?php echo $aux->poa_act_id ?>_poa_act_periodo_tipo').val(registro['cell'][4]);
                                                            $('#<?php echo $aux->poa_act_id ?>_poa_act_monto_estimado').val(registro['cell'][5]);
                                                            $('#<?php echo $aux->poa_act_id ?>_poa_act_metodo').val(registro['cell'][6]);
                                                            $('#<?php echo $aux->poa_act_id ?>_poa_act_pac').val(registro['cell'][7]);
                                                            $('#<?php echo $aux->poa_act_id ?>_poa_act_mes_inicio').val(registro['cell'][8]);
                                                            $('#<?php echo $aux->poa_act_id ?>_poa_actividad_mes_fin').val(registro['cell'][9]);
                                                            $('#<?php echo $aux->poa_act_id ?>_poa_act_det_contrapartida').val(registro['cell'][10]);
                                                            $('#<?php echo $aux->poa_act_id ?>_poa_act_det_total_proyecto').val(registro['cell'][11]);
                                                            $('#<?php echo $aux->poa_act_id ?>_poa_act_det_meta_acumulada').val(registro['cell'][12]);
                                                            for (var i = 13; i < 25; i++)
                                                            {
                                                                $('#<?php echo $aux->poa_act_id ?>_'+i+'_valor').val(registro['cell'][12]);
                                                            }


                                                        });
                                                    }
                                                });
                                            });
                                    $("#<?php echo $aux->poa_act_id ?>_dialog").dialog('open');
                                });


                                //META PLANIFICADA
                                for (var i = 1; i <= 12; i++) {
                                    $("#<?php echo $aux->poa_act_id ?>_" + i + "_valor").blur(function() {
                                        var suma = 0;
                                        for (var i = 1; i <= 12; i++) {
                                            suma += parseFloat($("#<?php echo $aux->poa_act_id ?>_" + i + "_valor").val());
                                        }
                                        $('#<?php echo $aux->poa_act_id ?>_poa_act_det_birf').val(suma.toFixed(2));
                                        a = parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_det_birf').val());
                                        b = parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_det_contrapartida').val());
                                        $('#<?php echo $aux->poa_act_id ?>_poa_act_det_total_proyecto').val((a + b).toFixed(2))
                                        c = parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_meta_total').val());
                                        d = parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_det_total_proyecto').val());
                                        if (d >= c)
                                            $('#<?php echo $aux->poa_act_id ?>_pendiente').val("0.0");
                                        else
                                            $('#<?php echo $aux->poa_act_id ?>_pendiente').val((c - d).toFixed(2));
                                    });
                                }
                                $("#<?php echo $aux->poa_act_id ?>_poa_act_det_contrapartida").blur(function() {
                                    a = parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_det_birf').val());
                                    b = parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_det_contrapartida').val());
                                    $('#<?php echo $aux->poa_act_id ?>_poa_act_det_total_proyecto').val((a + b).toFixed(2))
                                    c = parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_meta_total').val());
                                    d = parseFloat($('#<?php echo $aux->poa_act_id ?>_poa_act_det_total_proyecto').val());
                                    if (d >= c)
                                        $('#<?php echo $aux->poa_act_id ?>_pendiente').val("0.0");
                                    else
                                        $('#<?php echo $aux->poa_act_id ?>_pendiente').val((c - d).toFixed(2));
                                });

                                $("#<?php echo $aux->poa_act_id ?>_" + (i - 1) + "_valor").blur();
                                $("#<?php echo $aux->poa_act_id ?>_poa_act_ftdrs").datepicker({
                                    showOn: 'both',
                                    buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
                                    buttonImageOnly: true,
                                    dateFormat: 'dd-mm-yy'
                                });

                                $('#guardar_<?php echo $aux->poa_act_id ?>').button().click(function() {
                                    $.ajax({
                                        type: "POST",
                                        url: '<?php echo base_url($ruta . 'guardarPlanificacionAnual') . "/" . $aux->poa_act_id . "/" . $poa_com_id ?>',
                                        data: $("#seguimientoForm_<?php echo $aux->poa_act_id ?>").serialize(), // serializes the form's elements.
                                        success: function(data)
                                        {
                                            $("#<?php echo $aux->poa_act_id ?>_dialog").dialog('close');
                                            $('#efectivo').dialog('open');
                                        }
                                    });
                                    return false;
                                });

                            </script>
                            <form id="seguimientoForm_<?php echo $aux->poa_act_id ?>" method="post" >
                                <table>
                                    <tr>
                                    <td colspan="6" width="200px"><strong>Unidad de Medida</strong></td><td colspan="6"><?php echo $aux->poa_act_unidad_medida ?></td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Cantidad</strong></td><td colspan="6"><?php echo $aux->poa_act_cantidad ?></td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Costo Unitario($)</strong></td><td colspan="6"><?php echo $aux->poa_act_costo_unitario ?></td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Costo Total($)</strong></td><td colspan="6"><input type="text" value="<?php echo $aux->poa_act_meta_total ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_meta_total" id="<?php echo $aux->poa_act_id ?>_poa_act_meta_total" style="width: 80px" readonly="readonly" /></td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Responsable</strong></td><td colspan="6"><?php echo $aux->poa_act_responsable ?></td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Producto</strong></td><td colspan="6"><?php echo $aux->poa_act_producto ?></td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Fecha de Inicio</strong></td>
                                    <td colspan="6"><select name="<?php echo $aux->poa_act_id ?>_poa_act_mes_inicio" id="<?php echo $aux->poa_act_id ?>_poa_act_mes_inicio">
                                            <?php
                                            $informacion['valor'] = $aux->poa_act_mes_inicio;
                                            $this->load->view($ruta . 'select_meses', $informacion);
                                            ?>
                                        </select></td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Fecha de Finalización</strong></td>
                                    <td colspan="6"><select name="<?php echo $aux->poa_act_id ?>_poa_actividad_mes_fin" id="<?php echo $aux->poa_act_id ?>_poa_actividad_mes_fin">
                                            <?php
                                            $informacion['valor'] = $aux->poa_actividad_mes_fin;
                                            $this->load->view($ruta . 'select_meses', $informacion);
                                            ?>
                                        </select></td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Realiza</strong></td>    
                                    <td colspan="6"><input type="text" value="<?php echo $aux->poa_act_realiza ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_realiza" id="<?php echo $aux->poa_act_id ?>_poa_act_realiza" style="width: 150px" /></td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Fecha de entrega de TDRs o ET</strong></td>  
                                    <td colspan="6"><input type="text" value="<?php echo $aux->poa_act_ftdrs ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_ftdrs" id="<?php echo $aux->poa_act_id ?>_poa_act_ftdrs" style="width: 80px" /></td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Periodo ejecución actividad</strong></td> 
                                    <td colspan="6"><div style=" position: relative; width: 120px;">
                                            <input type="text" value="<?php echo $aux->poa_act_periodo_car ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_periodo_car" id="<?php echo $aux->poa_act_id ?>_poa_act_periodo_car" class="numeric" style="width: 30px" />
                                            <select style="width: 80px" id="<?php echo $aux->poa_act_id ?>_poa_act_periodo_tipo" name="<?php echo $aux->poa_act_id ?>_poa_act_periodo_tipo">
                                                <option value="dias" <?php if ($aux->poa_act_periodo_tipo == 'dias') echo "selected=selected"; ?> >Días</option>
                                                <option value="semanas" <?php if ($aux->poa_act_periodo_tipo == 'semanas') echo "selected=selected"; ?> >Semanas</option>
                                                <option value="meses" <?php if ($aux->poa_act_periodo_tipo == 'meses') echo "selected=selected"; ?>>Meses</option>
                                                <option value="anio" <?php if ($aux->poa_act_periodo_tipo == 'anio') echo "selected=selected"; ?>>Años</option>                                
                                            </select>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Monto estimado</strong></td> 
                                    <td colspan="6"><input type="text" class="numeric" value="<?php echo $aux->poa_act_monto_estimado ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_monto_estimado" id="<?php echo $aux->poa_act_id ?>_poa_act_monto_estimado" class="numeric" style="width: 80px"  /></td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Método de contratacion</strong></td> 
                                    <td colspan="6"><input type="text" value="<?php echo $aux->poa_act_metodo ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_metodo" id="<?php echo $aux->poa_act_id ?>_poa_act_metodo" style="width: 80px" /></td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>No. Correlativo en PAC</strong></td>
                                    <td colspan="6"><input type="text" value="<?php echo $aux->poa_act_pac ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_pac" id="<?php echo $aux->poa_act_id ?>_poa_act_pac" style="width: 80px" /></td>
                                    </tr>
                                    <tr>
                                    <td colspan="12"><center><strong>Desembolsos <?php echo $anio ?></center></strong></td>
                                    </tr>
                                    <tr>
                                    <td><strong>Ene</strong></td>
                                    <td><strong>Feb</strong></td>
                                    <td><strong>Mar</strong></td>
                                    <td><strong>Abr</strong></td>
                                    <td><strong>May</strong></td>
                                    <td><strong>Jun</strong></td>
                                    <td><strong>Jul</strong></td>
                                    <td><strong>Ago</strong></td>
                                    <td><strong>Sep</strong></td>
                                    <td><strong>Oct</strong></td>
                                    <td><strong>Nov</strong></td>
                                    <td><strong>Dic</strong></td>
                                    </tr>
                                    <tr>
                                        <?php
                                        foreach ($seguimientos as $seg) {
                                            ?>
                                        <td><input type="text" class="numeric" value="<?php echo $seg->poa_act_seg_desembolso ?>" name="<?php echo $aux->poa_act_id . "_" . $seg->poa_act_seg_mes ?>_valor" id="<?php echo $aux->poa_act_id . "_" . $seg->poa_act_seg_mes ?>_valor" style="width: 80px" /></td>
                                    <?php } ?>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Total BIRF</strong></td>     
                                    <td colspan="6"><input type="text" value="<?php echo $aux->poa_act_det_birf ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_det_birf" id="<?php echo $aux->poa_act_id ?>_poa_act_det_birf" style="width: 80px" readonly="readonly" /></td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Total Contrapartida</strong></td>    
                                    <td colspan="6"><input type="text" value="<?php echo $aux->poa_act_det_contrapartida ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_det_contrapartida" id="<?php echo $aux->poa_act_id ?>_poa_act_det_contrapartida" style="width: 80px" class="numeric" /></td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Total Proyecto</strong></td>  
                                    <td colspan="6"><input type="text" value="<?php echo $aux->poa_act_det_total_proyecto ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_det_total_proyecto" id="<?php echo $aux->poa_act_id ?>_poa_act_det_total_proyecto" style="width: 80px" readonly="readonly" /></td>
                                    </tr>
                                    <tr>
                                    <td colspan="6"><strong>Pendiente para 2014</strong></td>  
                                    <td colspan="6"><input type="text" value="" name="<?php echo $aux->poa_act_id ?>_pendiente" id="<?php echo $aux->poa_act_id ?>_pendiente" style="width: 80px" readonly="readonly" /></td>  
                                    </tr>
                                    <tr>
                                    <td  colspan="12">
                                        <center>
                                            <input id='guardar_<?php echo $aux->poa_act_id ?>' type="button"  value="Guardar Detalle Actividad" />
                                        </center>
                                    </td>
                                    </tr>
                                </table>

                            </form>
                        </div>
                    </td>

                    </tr>
                <?php } else { ?>

                    <tr class='odd'>
                    <td></td>
                    <td><?php echo $aux->poa_act_codigo ?></td>
                    <td><?php echo $aux->poa_act_descripcion ?></td>
                    <td><?php echo $aux->poa_act_meta_total ?></td>
                    <td></td>

                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>
<center style="position: relative;top:15px">
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