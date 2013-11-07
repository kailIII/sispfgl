<script type="text/javascript">
    $(document).ready(function() {
        $("#guardar").button().click(function() {
            $("#actividadForm").submit(function(event) {
                if ($("#actividadForm").validate().form() === true) {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url($ruta . 'guardarActividad') ?>',
                        data: $("#actividadForm").serialize(),
                        success: function(json)
                        {
                            $('#efectivo').dialog('open');
                            $('#poa_act_id').val(json);
                        }
                    });
                    return false;
                }
                return false;

            });
        });

        $('#actividadForm').validate({
            rules: {
                poa_act_descripcion: {
                    required: true
                },
                poa_act_meta_total: {
                    required: true,
                    number: true,
                    min: 0
                }
            }
        });
        $("#regresar").button().click(function() {
            document.location.href = '<?php echo base_url($ruta . 'gestionActividades'); ?>';
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

        //PARA VALIDAR QUE SOLO ESCRIBAN NUMEROS
        $(".numeric").numeric();

        $('.calcular').blur(function() {
            a = $('#poa_act_costo_unitario').val();
            b = $('#poa_act_cantidad').val();
            $('#poa_act_meta_total').val(a * b);
        });

    });
</script>
<center>
    <h2 class="h2Titulos">Planificación Operativa Anual</h2>
    <h2 class="h2Titulos">Gestionar Actividades de los componentes</h2>
    <br/>
</center>
<form id="actividadForm" method="post">
    <div id="rpt_frm_bdy">
        <div class="campo">
            <label>Código Presupuestario:</label>
            <input type="text" id="poa_act_cod_presupuestario" name="poa_act_cod_presupuestario" value="<?php if (isset($poa_act_cod_presupuestario)) echo $poa_act_cod_presupuestario; ?>" style="width: 60px; margin-top: 5px;" />
        </div>
        <div class="campo">
            <label>Código Actividad:</label>
            <input type="text" id="poa_act_codigo" name="poa_act_codigo" value="<?php if (isset($poa_act_codigo)) echo $poa_act_codigo; ?>" style="width: 100px; margin-top: 5px;" />
        </div>
        <div class="campo">
            <label>Actividad:</label>
            <textarea id="poa_act_descripcion" name="poa_act_descripcion" tcols="30" rows="5" wrap="virtual"><?php if (isset($poa_act_descripcion)) echo $poa_act_descripcion; ?></textarea>
        </div>
        <div class="campo">
            <label>Unidad de Medida:</label>
            <input type="text" id="poa_act_unidad_medida" name="poa_act_unidad_medida" value="<?php if (isset($poa_act_unidad_medida)) echo $poa_act_unidad_medida; ?>" />
        </div>
        <div class="campo">
            <label>Cantidad:</label>
            <input type="text" class="numeric calcular" id="poa_act_cantidad" name="poa_act_cantidad" value="<?php
            if (isset($poa_act_cantidad))
                echo $poa_act_cantidad;
            else
                echo '0';
            ?>" style="width: 60px; margin-top: 5px;" />
        </div>
        <p><strong>Indicación:</strong>El costo unitario tener el siguiente formato: 999999.99  -->>
            Donde el 9 significa cualquier número entre el 0 y el 9</p>

        <div class="campo">
            <label>Costo Unitario ($):</label>
            <input type="text" class="numeric calcular" id="poa_act_costo_unitario" name="poa_act_costo_unitario" value="<?php
            if (isset($poa_act_costo_unitario))
                echo $poa_act_costo_unitario;
            else
                echo '0';
            ?>" style="width: 60px; margin-top: 5px;" />
        </div>
        <div class="campo">
            <label>Costo Total ($):</label>
            <input type="text" id="poa_act_meta_total" name="poa_act_meta_total" value="<?php
            if (isset($poa_act_meta_total))
                echo $poa_act_meta_total;
            else
                echo '0';
            ?>" style="width: 60px; margin-top: 5px;" readonly="readonly"/>
        </div>
        <div class="campo">
            <label>Responsable:</label>
            <input type="text" id="poa_act_responsable" name="poa_act_responsable" value="<?php if (isset($poa_act_responsable)) echo $poa_act_responsable; ?>" />
        </div>
        <div class="campo">
            <label>Producto:</label>
            <textarea id="poa_act_producto" name="poa_act_producto" tcols="30" rows="5" wrap="virtual"><?php if (isset($poa_act_producto)) echo $poa_act_producto; ?></textarea>
        </div>
        <center style="position: relative;top: 20px">
            <input type="submit" id="guardar" value="Guardar" />
            <input type="button" id="regresar" value="Regresar" />
        </center>
    </div>
    <input type="text" id="poa_com_id" name="poa_com_id" hidden="hidden"  value="<?php echo $poa_com_id; ?>" />
    <input type="text" id="poa_act_id" name="poa_act_id" hidden="hidden"  value="<?php if (isset($poa_act_id)) echo $poa_act_id; ?>" />
    <input type="text" id="poa_act_padre" name="poa_act_padre" hidden="hidden"  value="<?php if (isset($poa_act_padre)) echo $poa_act_padre; ?>" />
</form>
<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>