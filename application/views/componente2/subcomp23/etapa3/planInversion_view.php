<script type="text/javascript">        
    $(document).ready(function(){
         <?php if ($guardo){?>
                $('#guardo').dialog();
                <?php }?>
        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E3/guardarPlanInversion') ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        $(".numeric").numeric();
        
        $('.anioA').blur(function() {
            suma=0;
            <?php foreach ($portafolios as $portafolio) { ?>
                suma+=parseFloat($('#anio1_<?php echo $portafolio->por_pro_id ?>').val());
            <?php }?>
            
            $('#saldo_1').val($('#anio_1').val()-suma);
        });
        
        $('.anioB').blur(function() {
            suma=0;
            <?php foreach ($portafolios as $portafolio) { ?>
                suma+=parseFloat($('#anio2_<?php echo $portafolio->por_pro_id ?>').val());
            <?php }?>
            
            $('#saldo_2').val($('#anio_2').val()-suma);
        });
        
        $('.anioC').blur(function() {
            suma=0;
            <?php foreach ($portafolios as $portafolio) { ?>
                suma+=parseFloat($('#anio3_<?php echo $portafolio->por_pro_id ?>').val());
            <?php }?>
            
            $('#saldo_3').val($('#anio_3').val()-suma);
        });
        
        $('.anioD').blur(function() {
            suma=0;
            <?php foreach ($portafolios as $portafolio) { ?>
                suma+=parseFloat($('#anio4_<?php echo $portafolio->por_pro_id ?>').val());
            <?php }?>
            
            $('#saldo_4').val($('#anio_4').val()-suma);
        });
        
        $('.anioE').blur(function() {
            suma=0;
            <?php foreach ($portafolios as $portafolio) { ?>
                suma+=parseFloat($('#anio5_<?php echo $portafolio->por_pro_id ?>').val());
            <?php }?>
            
            $('#saldo_5').val($('#anio_5').val()-suma);
        });
        suma1=0;suma2=0;suma3=0;suma4=0;suma5=0;
        <?php foreach ($portafolios as $portafolio) { ?>
                suma1+=parseFloat($('#anio1_<?php echo $portafolio->por_pro_id ?>').val());
                suma2+=parseFloat($('#anio2_<?php echo $portafolio->por_pro_id ?>').val());
                suma3+=parseFloat($('#anio3_<?php echo $portafolio->por_pro_id ?>').val());
                suma4+=parseFloat($('#anio4_<?php echo $portafolio->por_pro_id ?>').val());
                suma5+=parseFloat($('#anio5_<?php echo $portafolio->por_pro_id ?>').val());
        <?php }?>
            $('#saldo_1').val($('#anio_1').val()-suma1);
            $('#saldo_2').val($('#anio_2').val()-suma2);
            $('#saldo_3').val($('#anio_3').val()-suma3);
            $('#saldo_4').val($('#anio_4').val()-suma4);
            $('#saldo_5').val($('#anio_5').val()-suma5);
            $('.mensaje').dialog({
            autoOpen: false,
            width: 300,
            buttons: {
                "Ok": function() {
                    $(this).dialog("close");
                }
            }
        });
    });
</script>
<form class="cmxform" id="planInversionForm" method="post">
    <h2 class="h2Titulos">Etapa 3: Plan Estratégico Participativo</h2>
    <h2 class="h2Titulos">Plan multianual de inversión</h2>

    <br/><br/>
    <table>
        <tr>
        <td class="tdLugar" ><strong>Departamento:</strong></td>
        <td><?php echo $departamento ?></td>
        <td class="tdEspacio"></td>
        <td class="tdLugar"><strong>Municipio:</strong></td>
        <td ><?php echo $municipio ?></td>    
        </tr>
    </table>
    <br/><br/>
    <p><strong>Indicación:</strong>Los montos a ingresar deben tener el siguiente formato: 999999.99  -->>
Donde el 9 significa cualquier número entre el 0 y el 9</p>
    <table border="1"cellspacing="0" style="border-color: #2F589F" >
        <tr>
        <td class="thEstandar"></td>
        <td class="thEstandar" width="220px" align="center"><strong>Disponibilidad Financiera ($)</strong></td>
        <td class="thEstandar" width="100px" align="center"><strong>Año 1 ($)</strong></td>
        <td class="thEstandar" width="100px" align="center"><strong>Año 2 ($)</strong></td>
        <td class="thEstandar" width="100px" align="center"><strong>Año 3 ($)</strong></td>
        <td class="thEstandar" width="100px" align="center"><strong>Año 4 ($)</strong></td>
        <td class="thEstandar" width="100px" align="center"><strong>Año 5 ($)</strong></td>
        </tr>
        <?php
        $sdisponibilidad = 0;
        $sanio = 0;
        foreach ($montos as $monto) {
            $ci = &get_instance();
            $ci->load->model('etapa3-sub23/detmonto_proyeccion', 'dmonPro');
            $disponibilidad = $ci->dmonPro->obtenerDisponiblidadFinanciera($monto->mon_pro_id);
            $sdisponibilidad+=$disponibilidad;
            $anio1 = $monto->mon_pro_ingresos;
            $sanio+=$anio1;
            ?>
            <tr>
            <td class="thEstandar"><strong><?php echo $monto->mon_pro_nombre; ?></strong></td>
            <td align="center"><?php echo number_format($disponibilidad, 2); ?></td>
            <td align="center"><?php echo number_format($anio1, 2); ?></td>
            <?php
            $detmontos = $ci->dmonPro->obtenerDetMontoProyec($monto->mon_pro_id);
            foreach ($detmontos as $detmon) {
                ?>
                <td align="center"><?php echo number_format($detmon->dmon_pro_ingreso, 2); ?></td>

            <?php } ?>
            </tr><?php
    }
        ?>
        <tr>
        <td class="thEstandar"><strong>Totales</strong></td>
        <td align="center"><?php echo number_format($sdisponibilidad, 2); ?></td>
        <td align="center"><input value='<?php echo $sanio; ?>' id="anio_1" name="anio_1" style="border:none" size="10" readonly="readonly"/></td>
        <?php
        $anios = $ci->dmonPro->obtenerAnioDetMontoProyec($pro_ing_id);
        $i = 2;
        foreach ($anios as $aux) {
            ?>
            <td align="center"><input value='<?php echo $ci->dmonPro->obtenerSumaAnios($aux->dmon_pro_anio); ?>' id="anio_<?php echo $i; ?>" style="border:none" size="10" readonly="readonly"  /></td>

            <?php
            $i++;
        }
        ?>
        </tr>
    </table>
    <br/><br/>
    <h2 class="h2Titulos">Año de ejecución del proyecto</h2>
    <br/><br/>
    <table border="1"cellspacing="0" style="border-color: #2F589F">
        <CAPTION><EM>Portafolio de proyectos del municipio</EM></CAPTION>
        <tr>
        <td class="thEstandar" rowspan="2" align="center"><strong>Nombre del Proyecto</strong></td>
        <td class="thEstandar" rowspan="2" align="center"><strong>Ubicación</strong></td>
        <td class="thEstandar" rowspan="2" align="center"><strong>Costo Estimado ($)</strong></td>
        <td class="thEstandar" colspan="5" align="center"><strong>Asignación</strong></td>
        </th>
        <tr>
        <td class="thEstandar" align="center"><strong>Año 1 ($)</strong></td>
        <td class="thEstandar" align="center"><strong>Año 2 ($)</strong></td>
        <td class="thEstandar" align="center"><strong>Año 3 ($)</strong></td>
        <td class="thEstandar" align="center"><strong>Año 4 ($)</strong></td>
        <td class="thEstandar" align="center"><strong>Año 5 ($)</strong></td>
        </tr>
        <?php foreach ($portafolios as $portafolio) { ?>
            <tr>
            <td><?php echo $portafolio->por_pro_nombre ?></td>
            <td><?php echo $portafolio->por_pro_ubicacion ?></td>
            <td align="center"><?php echo $portafolio->por_pro_costo_estimado ?></td>
            <td><input class="numeric anioA" id="anio1_<?php echo $portafolio->por_pro_id; ?>" name="anio1_<?php echo $portafolio->por_pro_id; ?>" value="<?php echo $portafolio->por_pro_anio1; ?>" size="8"/></td>
            <td><input class="numeric anioB" id="anio2_<?php echo $portafolio->por_pro_id; ?>" name="anio2_<?php echo $portafolio->por_pro_id; ?>" value="<?php echo $portafolio->por_pro_anio2; ?>" size="8"/></td>
            <td><input class="numeric anioC" id="anio3_<?php echo $portafolio->por_pro_id; ?>" name="anio3_<?php echo $portafolio->por_pro_id; ?>" value="<?php echo $portafolio->por_pro_anio3; ?>" size="8"/></td>
            <td><input class="numeric anioD" id="anio4_<?php echo $portafolio->por_pro_id; ?>" name="anio4_<?php echo $portafolio->por_pro_id; ?>" value="<?php echo $portafolio->por_pro_anio4; ?>" size="8"/></td>
            <td><input class="numeric anioE" id="anio5_<?php echo $portafolio->por_pro_id; ?>" name="anio5_<?php echo $portafolio->por_pro_id; ?>" value="<?php echo $portafolio->por_pro_anio5; ?>" size="8"/></td>
            </tr>
        <?php } ?>
        <tr>
        <td class="thEstandar" colspan="3" align="right"> SALDOS</td>
        <td><input id="saldo_1" name="saldo_1" size="8" readonly="readonly"/></td>
        <td><input id="saldo_2" name="saldo_2" size="8" readonly="readonly"/></td>
        <td><input id="saldo_3" name="saldo_3" size="8" readonly="readonly"/></td>
        <td><input id="saldo_4" name="saldo_4" size="8" readonly="readonly"/></td>
        <td><input id="saldo_5" name="saldo_5" size="8" readonly="readonly"/></td>

        </tr>
    </table>
    <center>
        <p>Observaciones y/o Recomendaciones:<br/>
            <textarea name="pla_inv_observacion" cols="48" rows="5"><?php if (isset($pla_inv_observacion)) echo $pla_inv_observacion; ?></textarea></p>
        <p > 
            <input type="submit" id="guardar" value="Guardar Plan Inversión" />
            <input type="button" id="cancelar" value="Cancelar" />
        </p>
    </center>
<input id="pla_inv_id" name="pla_inv_id" value="<?php echo $pla_inv_id; ?>" style="visibility:hidden"/>
<input id="pro_pep_id" name="pro_pep_id" value="<?php echo $pro_pep_id; ?>" style="visibility:hidden"/>
</form>
<div id="guardo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>