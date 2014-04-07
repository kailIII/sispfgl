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
                poa_act_codigo: {
                    required: true,
                    maxlength: 10
                },
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
            <label>Código:</label>
            <input type="text" id="poa_act_codigo" name="poa_act_codigo" value="<?php if (isset($poa_act_codigo)) echo $poa_act_codigo; ?>" style="width: 60px; margin-top: 5px;" />
        </div>
        <div class="campo">
            <label>Descripción:</label>
            <textarea id="poa_act_descripcion" name="poa_act_descripcion" tcols="30" rows="5" wrap="virtual"><?php if (isset($poa_act_descripcion)) echo $poa_act_descripcion; ?></textarea>
        </div>
        <div class="campo">
            <label>Meta Total:</label>
            <input type="text" id="poa_act_meta_total" name="poa_act_meta_total" value="<?php
            if (isset($poa_act_meta_total))
                echo $poa_act_meta_total;
            else
                echo '0';
            ?>"/>
        </div>
        <center style="position: relative;top: 20px">
            <input type="submit" id="guardar" value="Guardar" />
            <input type="button" id="regresar" value="Regresar" />
        </center>
    </div>
    <input type="text" id="poa_com_id" name="poa_com_id" hidden="hidden"  value="<?php echo $poa_com_id; ?>" />
    <input type="text" id="poa_act_id" name="poa_act_id" hidden="hidden"  value="<?php if (isset($poa_act_id)) echo $poa_act_id; ?>" />
    <input type="text" id="poa_act_padre" name="poa_act_padre" hidden="hidden"  value="<?php if (isset($poa_act_padre)) echo $poa_act_padre; ?>" />
    <input type="text" id="anio" name="anio" hidden="hidden"  value="<?php if (isset($anio)) echo $anio; ?>" />
</form>
<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>