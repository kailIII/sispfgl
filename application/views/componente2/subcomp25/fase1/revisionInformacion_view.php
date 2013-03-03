<script type="text/javascript">        
    $(document).ready(function(){
        /*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){  
            $("#etapas").hide();
            $('#Mensajito').hide();
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
            $("#etapas").hide();
            $('#Mensajito').hide();
            $.getJSON('<?php echo base_url('componente2/procesoAdministrativo/cargarAprobacionProductos') . "/" ?>'+$('#selMun').val(), 
            function(data) {
                $("#etapas").hide();
                $('#Mensajito').hide();
                $.each(data, function(key, val) {
                    if(key=="records"){
                        if(val=="0"){
                            $('#Mensajito').show();
                            $('#Mensajito').val("Este proyecto no esta registrado");
                        }
                    }
                    if(key=='rows'){
                        $.getJSON('<?php echo base_url('componente2/procesoAdministrativo/cargarUltimaFechaProTecFin') . "/" ?>'+$('#selMun').val(), 
                        function(datos) {
                            $.each(datos, function(keys,valores) {
                                if(keys=='rows'){
                                    $.each(valores, function(id, registroFecha){
                                        if(registroFecha['cell'][1]!=null){
                                            i=0;
                                            ultimaFecha=registroFecha['cell'][1];
                                            $.each(val, function(id, registro){
                                                j=1;                                              
                                                $('#pro_eta_id_'+(i+1)).val(registro['cell'][0]);
                                                $('#pro_eta_observacion_'+(i+1)).val(registro['cell'][2]);
                                                $.each(registro['cell'][1], function(id, valor){
                                                    $("#eta"+(i+1)+"_fecha"+j).val(valor); 
                                                    $("#eta"+(i+1)+"_fecha"+j).datepicker( "option", "minDate", ultimaFecha); 
                                                    j++;
                                                });
                                                if($("#eta"+(i+1)+"_fecha"+(j-1)).val()=='')
                                                    $("#etapas").tabs("disable", i+1);
                                                else
                                                    ultimaFecha=$("#eta"+(i+1)+"_fecha"+(j-1)).val();
                                                i++;
                                            });
                                            if(i!=0){
                                                $("#etapas").show();
                                            }
                                        }else{
                                            $('#Mensajito').show();
                                            $('#Mensajito').val("Debe de registrar primero las fechas de la etapa: Pedido de propuesta técnica y financiera");
                                        }
                                    }); 
                                }
                            });
                        });
                    }//
                });
            });              
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
        
        $('#etapas').tabs();
           /*PARA LOS DATEPICKER*/
        $( "#fecha_conformacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
    });
</script>
<center>
    <h2 class="h2Titulos">Procesos de recepción y aprobación de productos</h2>
    <br/>
    <table>
        <tr>
        <td><strong>Departamento</strong></td>
        <td><select id='selDepto'>
                <option value='0'>--Seleccione--</option>
                <?php foreach ($departamentos as $depto) { ?>
                    <option value='<?php echo $depto->dep_id; ?>'><?php echo $depto->dep_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
        <td><strong>Municipio</strong></td>
        <td><select id='selMun' name='selMun'>
                <option value='0'>--Seleccione--</option>
            </select>
        </td>
        </tr>
    </table>
</center>


<br/>

<div id="etapas">
    <ul>
        <li><a href="#parte1">parte 1</a></li>
        <li><a href="#parte2">parte 2</a></li>
    </ul>
    <div id="parte1">
        <form id="revisionInformacion1" method="post"></form>

    </div>
    <div id="parte2">
        <form id="revisionInformacion2" method="post">

            <table>
                <tr>
                <td><input type="checkbox" name="comprociv"><strong>Comisión Municipal de protección civil conformada</strong></td>
                <td width="30px"> </td>
                <td> <strong>Fecha de conformación</strong>   <input id="fecha_conformacion" name="apo_mun_faprobacion" type="text" size="10" readonly="readonly"/></td>
                </tr>
                
            </table>
            <p><input type="checkbox" name="comprociv"><strong> Presento estructura organizativa</strong></p>













        </form>
    </div>

</div>

