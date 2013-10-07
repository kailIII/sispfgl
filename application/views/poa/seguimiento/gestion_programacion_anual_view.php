<script type="text/javascript">
    $(document).ready(function() {
        $('#guardar').button().click(function() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url($ruta . 'guardarPlanificacionAnual')."/".$anio."/".$poa_com_id ?>',
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
                            if ($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val()!= ""){
                                if(parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val()) <=  parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val())){
                                    if( $( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val()<=3){
                                        if( parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())<=3 && parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val())<=3){                                    
                                            $("#<?php echo $aux->poa_act_id ?>_trim_01").attr("checked","checked");
                                            $("#<?php echo $aux->poa_act_id ?>_trim_02").removeAttr("checked");
                                            $("#<?php echo $aux->poa_act_id ?>_trim_03").removeAttr("checked");
                                            $("#<?php echo $aux->poa_act_id ?>_trim_04").removeAttr("checked"); 
                                                                                                                                                                        
                                        }else{
                                            if( parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())<=3 && parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val())<=6){
                                                $("#<?php echo $aux->poa_act_id ?>_trim_01").attr("checked","checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_02").attr("checked","checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_03").removeAttr("checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_04").removeAttr("checked"); 
                                            }else{
                                                if( parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())<=3 && parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val())<=9){
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_01").attr("checked","checked");
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_02").attr("checked","checked");
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_03").attr("checked","checked");
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_04").removeAttr("checked"); 
                                                }else{
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_01").attr("checked","checked");
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_02").attr("checked","checked");
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_03").attr("checked","checked");
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_04").attr("checked","checked");
                                                }
                                            }
                                        }
                                    }else{
                                        if( $( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val()<=6){
                                            if( parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())<=6 && parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val())<=6){                                    
                                                $("#<?php echo $aux->poa_act_id ?>_trim_01").removeAttr("checked");    
                                                $("#<?php echo $aux->poa_act_id ?>_trim_02").attr("checked","checked");                                             
                                                $("#<?php echo $aux->poa_act_id ?>_trim_03").removeAttr("checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_04").removeAttr("checked"); 
                                            }else{
                                                if( parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())<=6 && parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val())<=9){
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_01").removeAttr("checked");
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_02").attr("checked","checked");
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_03").attr("checked","checked");
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_04").removeAttr("checked"); 
                                                }else{  
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_01").removeAttr("checked");
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_02").attr("checked","checked");
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_03").attr("checked","checked");
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_04").attr("checked","checked");
                                                }
                                            }
                                        }else{
                                            if( $( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val()<=9){
                                                if( parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())<=9 && parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val())<=9){                                    
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_01").removeAttr("checked");    
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_02").removeAttr("checked");    
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_03").attr("checked","checked");   
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_04").removeAttr("checked"); 
                                                }else{                                                
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_01").removeAttr("checked");    
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_02").removeAttr("checked");    
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_03").attr("checked","checked");    
                                                    $("#<?php echo $aux->poa_act_id ?>_trim_04").attr("checked","checked");
                                                }
                                            }else{
                                                $("#<?php echo $aux->poa_act_id ?>_trim_01").removeAttr("checked");    
                                                $("#<?php echo $aux->poa_act_id ?>_trim_02").removeAttr("checked");    
                                                $("#<?php echo $aux->poa_act_id ?>_trim_03").removeAttr("checked");      
                                                $("#<?php echo $aux->poa_act_id ?>_trim_04").attr("checked","checked");
                                            }
                                        }
                                    }
                                }else{
                                    $('#mayor').dialog('open');
                                    $("#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin option[value="+ (parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())+1) +"]").attr("selected",true);
                                    $( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).change();
                                }
                            }
                        });
                                                                                                                                                                                                                                                                                                        
                        $( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).change(function() {
                            if(parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val()) <=  parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val())){
                                if( $( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val()<=3){
                                    if( parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())<=3 && parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val())<=3){                                    
                                        $("#<?php echo $aux->poa_act_id ?>_trim_01").attr("checked","checked");
                                        $("#<?php echo $aux->poa_act_id ?>_trim_02").removeAttr("checked");
                                        $("#<?php echo $aux->poa_act_id ?>_trim_03").removeAttr("checked");
                                        $("#<?php echo $aux->poa_act_id ?>_trim_04").removeAttr("checked"); 
                                                                                                                                                                        
                                    }else{
                                        if( parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())<=3 && parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val())<=6){
                                            $("#<?php echo $aux->poa_act_id ?>_trim_01").attr("checked","checked");
                                            $("#<?php echo $aux->poa_act_id ?>_trim_02").attr("checked","checked");
                                            $("#<?php echo $aux->poa_act_id ?>_trim_03").removeAttr("checked");
                                            $("#<?php echo $aux->poa_act_id ?>_trim_04").removeAttr("checked"); 
                                        }else{
                                            if( parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())<=3 && parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val())<=9){
                                                $("#<?php echo $aux->poa_act_id ?>_trim_01").attr("checked","checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_02").attr("checked","checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_03").attr("checked","checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_04").removeAttr("checked"); 
                                            }else{
                                                $("#<?php echo $aux->poa_act_id ?>_trim_01").attr("checked","checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_02").attr("checked","checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_03").attr("checked","checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_04").attr("checked","checked");
                                            }
                                        }
                                    }
                                }else{
                                    if( $( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val()<=6){
                                        if( parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())<=6 && parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val())<=6){                                    
                                            $("#<?php echo $aux->poa_act_id ?>_trim_01").removeAttr("checked");    
                                            $("#<?php echo $aux->poa_act_id ?>_trim_02").attr("checked","checked");                                             
                                            $("#<?php echo $aux->poa_act_id ?>_trim_03").removeAttr("checked");
                                            $("#<?php echo $aux->poa_act_id ?>_trim_04").removeAttr("checked"); 
                                        }else{
                                            if( parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())<=6 && parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val())<=9){
                                                $("#<?php echo $aux->poa_act_id ?>_trim_01").removeAttr("checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_02").attr("checked","checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_03").attr("checked","checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_04").removeAttr("checked"); 
                                            }else{  
                                                $("#<?php echo $aux->poa_act_id ?>_trim_01").removeAttr("checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_02").attr("checked","checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_03").attr("checked","checked");
                                                $("#<?php echo $aux->poa_act_id ?>_trim_04").attr("checked","checked");
                                            }
                                        }
                                    }else{
                                        if( $( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val()<=9){
                                            if( parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())<=9 && parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).val())<=9){                                    
                                                $("#<?php echo $aux->poa_act_id ?>_trim_01").removeAttr("checked");    
                                                $("#<?php echo $aux->poa_act_id ?>_trim_02").removeAttr("checked");    
                                                $("#<?php echo $aux->poa_act_id ?>_trim_03").attr("checked","checked");   
                                                $("#<?php echo $aux->poa_act_id ?>_trim_04").removeAttr("checked"); 
                                            }else{                                                
                                                $("#<?php echo $aux->poa_act_id ?>_trim_01").removeAttr("checked");    
                                                $("#<?php echo $aux->poa_act_id ?>_trim_02").removeAttr("checked");    
                                                $("#<?php echo $aux->poa_act_id ?>_trim_03").attr("checked","checked");    
                                                $("#<?php echo $aux->poa_act_id ?>_trim_04").attr("checked","checked");
                                            }
                                        }else{
                                            $("#<?php echo $aux->poa_act_id ?>_trim_01").removeAttr("checked");    
                                            $("#<?php echo $aux->poa_act_id ?>_trim_02").removeAttr("checked");    
                                            $("#<?php echo $aux->poa_act_id ?>_trim_03").removeAttr("checked");      
                                            $("#<?php echo $aux->poa_act_id ?>_trim_04").attr("checked","checked");
                                        }
                                    }
                                }
                            }else{
                                $('#mayor').dialog('open');
                                $("#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin option[value="+ (parseInt($( "#<?php echo $aux->poa_act_id; ?>_poa_act_mes_inicio" ).val())+1) +"]").attr("selected",true);
                                $( "#<?php echo $aux->poa_act_id; ?>_poa_actividad_mes_fin" ).change();
                            }
                        });
                        //META ACUMULADA
                        $('#<?php echo $aux->poa_act_id ?>_poa_act_det_meta_acumulada').blur(function() {
                            a = $('#<?php echo $aux->poa_act_id ?>_poa_act_det_meta_acumulada').val();
                            b = $('#<?php echo $aux->poa_act_id ?>_poa_act_meta_total').val();
                            if(b==0)
                                $('#<?php echo $aux->poa_act_id ?>_poa_act_det_porcentaje_acumulado').val("0");
                            else
                                $('#<?php echo $aux->poa_act_id ?>_poa_act_det_porcentaje_acumulado').val(((a/b)*100).toFixed(0));
                            $('#<?php echo $aux->poa_act_id ?>_poa_act_det_meta_planificada').blur();
                        });
                        //META PLANIFICADA
                        $('#<?php echo $aux->poa_act_id ?>_poa_act_det_meta_planificada').blur(function() {
                            a = $('#<?php echo $aux->poa_act_id ?>_poa_act_det_meta_planificada').val();
                            b = $('#<?php echo $aux->poa_act_id ?>_poa_act_meta_total').val();
                            if(b==0)
                                $('#<?php echo $aux->poa_act_id ?>_poa_act_det_porcentaje_planificada').val("0");
                            else
                                $('#<?php echo $aux->poa_act_id ?>_poa_act_det_porcentaje_planificada').val(((a/b)*100).toFixed(0));
                            //PLANIFICADO ACUMULADO
                            a = $('#<?php echo $aux->poa_act_id ?>_poa_act_det_porcentaje_planificada').val();
                            b = $('#<?php echo $aux->poa_act_id ?>_poa_act_det_porcentaje_acumulado').val();
                            $('#<?php echo $aux->poa_act_id ?>_poa_act_det_planificado_acumulado').val(parseFloat(a)+parseFloat(b));
                                            
                            a = $('#<?php echo $aux->poa_act_id ?>_poa_act_det_planificado_acumulado').val();
                            b = 100.00-parseFloat(a);
                            if(b<0.00)
                                $('#<?php echo $aux->poa_act_id ?>_poa_act_det_pendiente').val("0");
                            else
                                $('#<?php echo $aux->poa_act_id ?>_poa_act_det_pendiente').val(b.toFixed(0));
                        });
                        $('#<?php echo $aux->poa_act_id ?>_poa_act_det_meta_acumulada').blur();
                        $('#<?php echo $aux->poa_act_id ?>_poa_act_det_meta_planificada').blur();
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
                <th scope="col" rowspan="2">Código</th>
                <th scope="col"  rowspan="2" width='400px'>Actividad</th>
                <th scope="col" colspan="2" >1º Semestre</th>
                <th scope="col" colspan="2" >2º Semestre</th>
                <th scope="col"  rowspan="2" >Fecha Inicio</th>
                <th scope="col" rowspan="2" >Fecha Fin</th>
                <th scope="col" rowspan="2" >Meta Total</th>
                <th scope="col" rowspan="2" >Meta Acumulada a Dic <?php echo $anio - 1; ?> </th>
                <th scope="col" rowspan="2" >% Planificado a Dic <?php echo $anio - 1; ?> </th>
                <th scope="col" rowspan="2" >Meta Planificada para <?php echo $anio; ?> </th>
                <th scope="col"  rowspan="2">% Planificado para <?php echo $anio; ?> </th>
                <th scope="col"  rowspan="2">% Acumulado para <?php echo $anio; ?> </th>
                <th scope="col"  rowspan="2">% Pendiente Planificar para <?php echo $anio + 1; ?> y <?php echo $anio + 2; ?> </th>
                </tr>
                <tr>
                <th scope="col" >Ene - Mar</th>
                <th scope="col" >Abr - Jun</th>
                <th scope="col" >Jul -- Sep</th>
                <th scope="col" >Oct - Dic</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actividades as $aux) { ?>
                    <?php if (!is_null($aux->poa_act_padre)) { ?>
                        <tr>                    
                        <td><input value="<?php echo $aux->poa_act_id ?>" name="poa_act_id" hidden="hidden" /><?php echo $aux->poa_act_codigo ?></td>
                        <td><?php echo $aux->poa_act_descripcion ?></td>
                        <td><input name="<?php echo $aux->poa_act_id ?>_trim_01" id="<?php echo $aux->poa_act_id ?>_trim_01" type="checkbox" readonly="readonly"></td>
                        <td><input name="<?php echo $aux->poa_act_id ?>_trim_02" id="<?php echo $aux->poa_act_id ?>_trim_02" type="checkbox" readonly="readonly"></td>
                        <td><input name="<?php echo $aux->poa_act_id ?>_trim_03" id="<?php echo $aux->poa_act_id ?>_trim_03" type="checkbox" readonly="readonly"></td>
                        <td><input name="<?php echo $aux->poa_act_id ?>_trim_04" id="<?php echo $aux->poa_act_id ?>_trim_04" type="checkbox" readonly="readonly"></td>
                        <td><select name="<?php echo $aux->poa_act_id ?>_poa_act_mes_inicio" id="<?php echo $aux->poa_act_id ?>_poa_act_mes_inicio">
                                <?php
                                $informacion['valor']= $aux->poa_act_mes_inicio;
                                $this->load->view($ruta . 'select_meses',$informacion);
                                ?>
                            </select></td>
                        <td><select name="<?php echo $aux->poa_act_id ?>_poa_actividad_mes_fin" id="<?php echo $aux->poa_act_id ?>_poa_actividad_mes_fin">
                                <?php
                                $informacion['valor']= $aux->poa_actividad_mes_fin;
                                $this->load->view($ruta . 'select_meses',$informacion);
                                ?>
                            </select></td>
                        <td><input type="text" value="<?php echo $aux->poa_act_meta_total ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_meta_total" id="<?php echo $aux->poa_act_id ?>_poa_act_meta_total" style="width: 50px" readonly="readonly" /></td>
                        <td><input type="text" value="<?php echo $aux->poa_act_det_meta_acumulada ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_det_meta_acumulada" id="<?php echo $aux->poa_act_id ?>_poa_act_det_meta_acumulada" class="numeric" style="width: 50px" /></td>
                        <td><input type="text" value="" name="<?php echo $aux->poa_act_id ?>_poa_act_det_porcentaje_acumulado" id="<?php echo $aux->poa_act_id ?>_poa_act_det_porcentaje_acumulado" style="width: 50px" readonly="readonly" /></td>
                        <td><input type="text" value="<?php echo $aux->poa_act_det_meta_planificada ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_det_meta_planificada" id="<?php echo $aux->poa_act_id ?>_poa_act_det_meta_planificada" class="numeric" style="width: 50px" /></td>
                        <td><input type="text" value="" name="<?php echo $aux->poa_act_id ?>_poa_act_det_porcentaje_planificada" id="<?php echo $aux->poa_act_id ?>_poa_act_det_porcentaje_planificada" style="width: 50px" readonly="readonly" /></td>
                        <td><input type="text" value="" name="<?php echo $aux->poa_act_id ?>_poa_act_det_planificado_acumulado" id="<?php echo $aux->poa_act_id ?>_poa_act_det_planificado_acumulado" style="width: 50px" readonly="readonly" /></td>
                        <td><input type="text" value="" name="<?php echo $aux->poa_act_id ?>_poa_act_det_pendiente" id="<?php echo $aux->poa_act_id ?>_poa_act_det_pendiente" style="width: 50px" readonly="readonly" /></td>
                        </tr>
                    <?php } else { ?>
                        <tr class='odd'>
                        <td><?php echo $aux->poa_act_codigo ?></td>
                        <td colspan="14"><?php echo $aux->poa_act_descripcion ?></td>
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