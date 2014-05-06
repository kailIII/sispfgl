<script type="text/javascript">
    $(document).ready(function() {
        $('#guardar').button().click(function() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url($ruta . 'guardarPlanificacionTrimestral') . "/" . $anio . "/" . $poa_com_id. "/" . $poa_act_seg_tri_mes ?>',
                data: $("#seguimientoForm").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $('#efectivo').dialog('open');
                }
            });
            return false;
        });
        
        $('#regresar').button().click(function() {
            document.location.href = '<?php echo base_url($ruta . 'seguimientoPlanificacionAnual'); ?>';
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


    });
</script>


<center>
    <h2 class="h2Titulos">Planificación Operativa Anual</h2>
    <h2 class="h2Titulos">Planificación para el <?php echo $trimestre; ?> Trimestre del año <?php echo $anio; ?> </h2>
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
                <th scope="col">Código</th>
                <th scope="col"  width='400px'>Actividad</th>
                <th scope="col" >Observaciones</th>
                <th scope="col" >Nivel de cumplimiento trimestral acumulado (%)</th>
                <th scope="col"  >Valoración del avance (Por qué, razones del avance obtenido)</th>
                <th scope="col" >Decisiones o medidas correctivas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($actividades as $aux) {
                    if (!is_null($aux->poa_act_padre)) {
                        ?>
                        <tr>                    
                        <td><input value="<?php echo $aux->poa_act_id ?>" name="poa_act_id" hidden="hidden" /><?php echo $aux->poa_act_codigo ?></td>
                        <td><?php echo $aux->poa_act_descripcion ?></td>
                        <td><textarea rows="3" cols="45" id="<?php echo $aux->poa_act_id ?>_poa_act_seg_tri_observacion" name="<?php echo $aux->poa_act_id ?>_poa_act_seg_tri_observacion"><?php echo $aux->poa_act_seg_tri_observacion ?></textarea></td>
                        <td><input type="text" value="<?php echo $aux->poa_act_seg_tri_nivel ?>" name="<?php echo $aux->poa_act_id ?>_poa_act_seg_tri_nivel" id="<?php echo $aux->poa_act_id ?>_poa_act_seg_tri_nivel" class="numeric" style="width: 50px" /></td>
                        <td><textarea rows="3" cols="45" id="<?php echo $aux->poa_act_id ?>_poa_act_seg_tri_valoracion" name="<?php echo $aux->poa_act_id ?>_poa_act_seg_tri_valoracion" ><?php echo $aux->poa_act_seg_tri_valoracion ?></textarea></td>
                        <td><textarea rows="3" cols="45" id="<?php echo $aux->poa_act_id ?>_poa_act_seg_tri_decision" name="<?php echo $aux->poa_act_id ?>_poa_act_seg_tri_decision" ><?php echo $aux->poa_act_seg_tri_decision ?></textarea></td>
                        </tr>
    <?php } else { ?>
                        <tr class='odd'>
                        <td><?php echo $aux->poa_act_codigo ?></td>
                        <td colspan="14"><?php echo $aux->poa_act_descripcion ?></td>
                        </tr>
    <?php }
} ?>
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