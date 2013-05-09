<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('componente2/comp25_fase1/guardarRubrosElegiblesAplica') ?>',
                data: $("#RubroElegibleAplicaForm").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $('#efectivo').dialog('open');
                }
            });
            return false;
        });
        
        $("#RubroElegibleAplicaForm").hide();
        /*CARGAR MUNICIPIOS*/
        $('#dep_id').change(function(){ 
            $("#RubroElegibleAplicaForm").hide();
            $('#mun_id').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id='+$('#dep_id').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#mun_id').append('<option value="0">--Seleccione Municipio--</option>');
                        $.each(val, function(id, registro){
                            $('#mun_id').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
        $('#mun_id').change(function(){
            $('#RubroElegibleAplicaForm')[0].reset();
            if($('#mun_id').val()!=0){
                $.getJSON('<?php echo base_url('componente2/comp25_fase1/cargarRubrosElegiblesAplica') . "/" ?>'+$('#mun_id').val(), 
                function(data) {
                    $.each(data, function(key, val) {
                        if(key=='rows'){
                            i=0;
                            $.each(val, function(id, registro){
                                j=1;   
                                $('#rub_id').val(registro['cell'][0]);
                                $('#mun_presupuesto').val(registro['cell'][1]);
                                $.each(registro['cell'][2], function(id, valor){
                                    $("#rub_ele_monto_"+j).val(valor[0]); 
                                    j++;
                                });
                                j=1;   
                                $.each(registro['cell'][3], function(id2, valor2){
                                    $("#for_monto_"+j).val(valor2[0]); 
                                    j++;
                                });
                                j=1;   
                                $.each(registro['cell'][4], function(id3, valor3){
                                    $("#det_obra_monto_"+j).val(valor3[0]); 
                                    j++;
                                });
                                $('#totalEstimadoRubEle').val(registro['cell'][5]);
                                $('#totalEstimadoDetFor').val(registro['cell'][6]);
                                $('#totalEstimadoDetObra').val(registro['cell'][7]);
                                $('#rub_nombre_proyecto').val(registro['cell'][8]);
                                $('#rub_observacion').val(registro['cell'][9]);
                                $("#RubroElegibleAplicaForm").show();
                            });                    
                        }
                    });
                });              
            }
        });
        /*ZONA DATEPICKER*/
       
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
        //TODO LO NUMERICO
        
        /*PARA LAS CATEGORIAS*/
        $(".numeric").numeric();
        $('.montoDetFor').blur(function(){
            suma=0;
<?php foreach ($categorias as $categoria) { ?>
                suma+=parseFloat($('#for_monto_<?php echo $categoria->cat_for_id; ?>').val());    
<?php } ?>
            $('#totalEstimadoDetFor').val(suma);
            $('#rub_ele_monto_2').val(suma);
            sumarCategorias.sumar();
        });
        sumarCategorias=function(){}
        sumarCategorias.sumar=function(){
            suma=0;
<?php foreach ($categorias as $categoria) { ?>
                suma+=parseFloat($('#for_monto_<?php echo $categoria->cat_for_id; ?>').val());    
<?php } ?>
            $('#totalEstimadoDetFor').val(suma);
        } 
        
        /*PARA LOS RUBROS*/
        $('.montoDetObra').blur(function(){
            suma2=0;
<?php foreach ($obras as $obra) { ?>
                suma2+=parseFloat($('#det_obra_monto_<?php echo $obra->obr_id; ?>').val());    
<?php } ?>
            $('#totalEstimadoDetObra').val(suma2);
            $('#rub_ele_monto_6').val(suma2);
            sumarRubEle.sumar();
        });
       
        $('.montoRubEle').blur(function(){
            suma=0;
<?php foreach ($nombreRubros as $rubro) { ?>
                suma+=parseFloat($('#rub_ele_monto_<?php echo $rubro->nom_rub_id; ?>').val());    
<?php } ?>
            $('#totalEstimadoRubEle').val(suma);
        });
               
        sumarRubEle=function(){}
        sumarRubEle.sumar=function(){
            suma=0;
<?php foreach ($nombreRubros as $rubro) { ?>
                suma+=parseFloat($('#rub_ele_monto_<?php echo $rubro->nom_rub_id; ?>').val());    
<?php } ?>
            $('#totalEstimadoRubEle').val(suma);
        } 

        
    });
</script>
<center>
    <h2 class="h2Titulos">2.2.1. Datos Generales del Proyecto</h2>
    <h2 class="h2Titulos">2.2.2. Rubros elegibles a lo que aplica</h2>
    <br/>
    <table>
        <tr>
        <td><strong>Departamento</strong></td>
        <td><select id='dep_id'>
                <option value='0'>--Seleccione--</option>
                <?php foreach ($departamentos as $depto) { ?>
                    <option value='<?php echo $depto->dep_id; ?>'><?php echo $depto->dep_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
        <td><strong>Municipio</strong></td>
        <td><select id='mun_id' name='mun_id'>
                <option value='0'>--Seleccione--</option>
            </select>
        </td>
        </tr>
    </table>
</center>
<form id="RubroElegibleAplicaForm" method="post">
    <p style="text-align: right"><strong>Monto Asignado $</strong>
        <input name="mun_presupuesto" id="mun_presupuesto" value="" type="text" size="15" readonly="readonly" class="bordeNo"/>
    </p>
    <p ><strong>Nombre del proyecto</strong>
        <input name="rub_nombre_proyecto" id="rub_nombre_proyecto" value="" type="text" size="50" />
    </p>
    <p><strong>Indicación General:</strong>Los montos a ingresar deben tener el siguiente formato: 999999.99  -->>
        Donde el 9 significa cualquier número entre el 0 y el 9</p>
    <p><strong>Rubros a los que aplica</strong></p>
    <table border="1"cellspacing="0" style="border-color: #2F589F" >
        <tr>
        <td class="thEstandar" width="620" align="center"><strong>Rubros Elegibles</strong></td>
        <td class="thEstandar" width="100" align="center"><strong>Monto Estimado ($)</strong></td>
        </tr>
        <?php foreach ($nombreRubros as $rubro) { ?>
            <tr>
            <td><?php echo $rubro->nom_rub_nombre; ?></td>
            <td><input <?php if ($rubro->nom_rub_id == 6 || $rubro->nom_rub_id == 2 ) echo 'readonly="readonly"' ?>class="montoRubEle numeric" name="rub_ele_monto_<?php echo $rubro->nom_rub_id; ?>" value="0" id="rub_ele_monto_<?php echo $rubro->nom_rub_id; ?>" value="" type="text" size="25" /></td>
            </tr>
        <?php } ?>
        <tr>
        <td style="text-align:right"><strong>Total Estimado</strong></td>
        <td><input name="totalEstimadoRubEle" id="totalEstimadoRubEle" value="0" type="text" size="25" readonly="readonly" /></td>
        </tr>
    </table>
    <br/>    <br/>    <br/>
    <table border="1"cellspacing="0" style="border-color: #2F589F" >
        <tr>
        <td class="thEstandar" width="620" align="center"><strong>Fortalecimiento de la organización municipal y comunitaria
                para la gestión de riesgos</strong></td>
        <td class="thEstandar" width="100" align="center"><strong>Monto Estimado ($)</strong></td>
        </tr>
        <?php foreach ($categorias as $categoria) { ?>
            <tr>
            <td><?php echo $categoria->cat_for_nombre; ?></td>
            <td><input class="montoDetFor numeric" value="0" name="for_monto_<?php echo $categoria->cat_for_id; ?>" id="for_monto_<?php echo $categoria->cat_for_id; ?>" value="" type="text" size="25" /></td>
            </tr>
        <?php } ?>
        <tr>
        <td style="text-align:right"><strong>Total Estimado</strong></td>
        <td><input name="totalEstimadoDetFor" value="0" id="totalEstimadoDetFor" value="" type="text" size="25" readonly="readonly" /></td>
        </tr>
    </table>
    <br/>    <br/>    <br/>
    <table border="1"cellspacing="0" style="border-color: #2F589F" >
        <tr>
        <td class="thEstandar" width="620" align="center"><strong>Detalles de obra y actividades de mitigación </strong></td>
        <td class="thEstandar" width="100" align="center"><strong>Monto Estimado ($)</strong></td>
        </tr>
        <?php foreach ($obras as $obra) { ?>
            <tr>
            <td><?php echo $obra->obr_nombre; ?></td>
            <td><input class="montoDetObra numeric" name="det_obra_monto_<?php echo $obra->obr_id; ?>" value="0" id="det_obra_monto_<?php echo $obra->obr_id; ?>" value="" type="text" size="25" /></td>
            </tr>
        <?php } ?>
        <tr>
        <td style="text-align:right"><strong>Total Estimado</strong></td>
        <td><input name="totalEstimadoDetObra" id="totalEstimadoDetObra"  value="0" type="text" size="25" readonly="readonly" /></td>
        </tr>
    </table>
    <br/>

    <p><strong>Observaciones:</strong><br/><textarea name="rub_observacion" cols="48" rows="5"></textarea></p>
    <?php //if (strcmp($rol, 'gdrc') == 0) {?>
    <center>
        <input type="submit" id="guardar" value="Guardar" />
    </center>
    <?php //} ?>
    <input id="rub_id" name="rub_id" value="" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>
<div id="fechaValidacion" class="mensaje" title="Error en fechas">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/cancel.png'); ?>" class="imagenError" />Las fechas deben de ir en orden ascendente</p>
    </center>
</div>
