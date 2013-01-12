<script type="text/javascript">        
    $(document).ready(function(){

        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E3/guardarProyeccionIngresos') ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
<?php
if (isset($mon_pro_anio)) {
    echo "$('#tabla1').show();";
    echo "$('#tabla2').show();";
} else {
    echo "$('#tabla1').hide();";
    echo "$('#tabla2').hide();";
}
?>
        $('#agregarAnio').css({'background':'white','border':'none'});
        /*DIALOGOS DE VALIDACION*/
        $('.mensaje').dialog({
            autoOpen: false,
            width: 450,
            buttons: {
                "Ok": function() {
                    $(this).dialog("close");
                }
            }
        });
        /*FIN DIALOGOS VALIDACION*/
        $('#agregarAnio').button().click(function(){
            if($('#pro_ing_anio').val()!=''){
                $.getJSON('<?php echo base_url('componente2/comp23_E3/habilitarAnio') . '/' . $pro_ing_id ?>/'+$('#pro_ing_anio').val(), 
                function(data) {
                    var i=0;
                    $.each(data, function(key, val) {
                        if(key=='rows'){
                            $('#tabla1').show();   
                        }
                    });
                });    
                return false;
            }
            else{
                $('#mensaje').dialog('open');
                $('#pro_ing_anio').focus();
                return false;
            }
        }); 
<?php
$validacion = "";
foreach ($montos as $monto) {
    $validacion.='disponibilidad_financiera_' . $monto->mon_pro_idnombre . ":{number:true},";
    $validacion.='ingresos_' . $monto->mon_pro_idnombre . ":{number:true},";
}
?>
        $("#proyeccionIngresosForm").validate({
            rules: {
                pro_ing_anio: {
                    required: true,
                    maxlength: 4,
                    min:2011,
                    number:true
                },
<?php echo trim($validacion, ','); ?>
            }
        });   
    });
</script>
<form class="cmxform" id="proyeccionIngresosForm" method="post">
    <h2 class="h2Titulos">Etapa 3: Plan Estratégico Participativo</h2>
    <h2 class="h2Titulos">Proyección de ingresos de la municipalidad</h2>

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
    <h2 class="h2Titulos">Proyección de ingresos del primer año</h2>
    <center>
        <p><strong>Dígite el primer año de proyección:</strong><input id="pro_ing_anio"<?php if (isset($mon_pro_anio)) echo 'value="' . $mon_pro_anio . '"'; ?> name="pro_ing_anio" type="text" size="8"/>
            <a id="agregarAnio" style="position: relative;top: 15px;right: 5px" ><img src="<?php echo base_url('resource/imagenes/save.png'); ?>"/></a>
        </p>
    </center>
    <br/> <br/>
    <table id="tabla1" align="center">
        <tr>
        <td></td>
        <td><strong>Disponiblidad Financiera</strong></td>
        <td style="width: 80px"></td>
        <td><strong>Ingresos Proyectados para el año</strong></td>
        </tr>
        <?php foreach ($montos as $monto) { ?>
            <tr>
            <td><strong><?php echo $monto->mon_pro_nombre ?></strong></td>
            <td align="center"><input id="disponibilidad_financiera_<?php echo $monto->mon_pro_idnombre ?>" name="disponibilidad_financiera_<?php echo $monto->mon_pro_idnombre ?>" type="text" size="10"/></td>
            <td style="width: 80px"></td>
            <td align="center"><input id="ingresos_<?php echo $monto->mon_pro_idnombre ?>" name="ingresos_<?php echo $monto->mon_pro_idnombre ?>" type="text" size="10"/></td>
            </tr>
        <?php } ?>
    </table >
    <br/><br/>
    <table id="tabla2" align="center">
        <tr>
        <td colspan="9"><h2 class="h2Titulos">Proyección de los años siguientes</h2></td>
        </tr>
        <tr>
        <td><strong>FODES</strong></td>
        <?php foreach ($fodes as $aux) { ?>
            <td align="center"><input id="<?php echo $aux->mon_pro_nombre . ' ' . $aux->dmon_pro_id ?>" name="disponibilidad_financiera_<?php echo $monto->mon_pro_idnombre ?>" type="text" size="10"/></td>
            <td style="width: 30px"></td>

        <?php } ?>
        </tr>
    </table>
    <center>
        <p>Observaciones y/o Recomendaciones:<br/>
            <textarea name="pro_ing_observacion" cols="48" rows="5"><?php if (isset($pro_ing_observacion)) echo $pro_ing_observacion; ?></textarea></p>
        <p > 
            <input type="submit" id="guardar" value="Guardar Proyección" />
            <input type="button" id="cancelar" value="Cancelar" />
        </p>
    </center>
</form>
<div id="mensaje" class="mensaje" title="Aviso:">
    <p><img src="<?php echo base_url('resource/imagenes/cancel.png'); ?>" heigth="25px" width="25px"/>Debe de llenar el año de proyección para continuar
    </p>
</div>
