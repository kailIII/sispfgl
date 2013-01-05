<script type="text/javascript">        
    $(document).ready(function(){
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E3/guardarPortafolioProyecto') ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/comp23_E3/muestraPortafolio'); ?>/'+$('#por_pro_id').val();
        });

        /*PARA EL DATEPICKER*/
        $( "#por_pro_fecha_desde" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo base_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        
        /*PARA EL DATEPICKER*/
        $( "#por_pro_fecha_hasta" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo base_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        
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
        /*FIN DIALOGOS VALIDACION*/
        //VALIDAR FORMULARIOS
        $("#portafolioProyectoForm").validate({
            rules: {
                por_pro_area: {
                    required: true,
                    maxlength: 300
                },
                por_pro_tema: {
                    required: true,
                    maxlength: 300
                },
                por_pro_nombre: {
                    required: true,
                    maxlength: 300
                },
                por_pro_descripcion: {
                    required: true
                },
                por_pro_ubicacion: {
                    required: true,
                    maxlength: 300
                },
                por_pro_costo_estimado: {
                    required: true,
                    number: true
                },
                por_pro_fecha_desde: {
                    required: true
                },
                por_pro_fecha_hasta: {
                    required: true
                },
                por_pro_beneficiario_h: {
                    required: true,
                    number:true
                },
                por_pro_beneficiario_m: {
                    required: true,
                    number:true
                }
            }
        });   
    });
</script>

<form id="portafolioProyectoForm" method="post">
    <h2 class="h2Titulos">Etapa 3: Plan Estratégico Participativo</h2>
    <h2 class="h2Titulos">Portafolio de Proyectos</h2>
    <h2 class="h2Titulos">Ragistro de Proyectos</h2>
    <br/><br/>
    <table>
        <tr>
        <td colspan="2"><strong>Departamento:</strong><?php echo $departamento ?></td>
        <td colspan="2"><strong>Municipio:</strong><?php echo $municipio ?></td>
        </tr>
        <tr>

        <td colspan="4"><strong>Proyecto PEP:</strong><?php echo $proyectoPep ?></td>
        </tr>
    </table>

    <table>             
        <tr>
        <td class="textD"><strong>Área:</strong> </td>
        <td><input name="por_pro_area" type="text" size="50"/></td>
        </tr>
        <tr>
        <td class="textD">Tema: </td>
        <td><textarea name="por_pro_tema" cols="57" rows="3"></textarea></td>
        </tr>
        <tr>
        <td class="textD">Nombre del Proyecto: </td>
        <td><input name="por_pro_nombre" type="text" size="50"/></td>
        </tr>
        </tr>
        <tr>
        <td class="textD">Descripción: </td>
        <td><textarea name="por_pro_descripcion" cols="57" rows="3"></textarea></td>
        </tr>
        </tr>
        <tr>
        <td class="textD">Ubicación: </td>
        <td><input name="por_pro_ubicacion" type="text" size="50"/></td>
        </tr>
        <tr>
        <td class="textD">Costo Estimado: </td>
        <td><input name="por_pro_costo_estimado" type="text" size="10"/></td>
        </tr>
    </table> 
    <fieldset style="border-color: #2F589F;position: relative;width: 400px;left:200px;"
        <legend align="center"><strong>Período de Ejecución</strong></legend>
        <table>
            <tr>
            <td colspan="2">Desde:<input id="por_pro_fecha_desde" name="por_pro_fecha_desde" readonly="readonly" size="10"/></td>
            <td colspan="2">Hasta:<input id="por_pro_fecha_hasta" name="por_pro_fecha_hasta" readonly="readonly" size="10"/></td>
            </tr>
        </table> 
    </fieldset>
    <br/>
    <fieldset style="border-color: #2F589F;position: relative;width: 400px;left:200px;"
        <legend align="center"><strong>Beneficiarios</strong></legend>
        <table>
            <tr>
            <td colspan="2">Hombres:<input id="por_pro_beneficiario_h" name="por_pro_beneficiario_h"  size="10"/></td>
            <td colspan="2">Mujeres:<input id="por_pro_beneficiario_m" name="por_pro_beneficiario_m" size="10"/></td>
            </tr>
        </table> 
    </fieldset>
    <p>Observaciones y/o recomendaciones:<br/><textarea id="por_pro_observacion" name="por_pro_observacion" cols="48" rows="5"></textarea></p>
    <center>  <p><input type="submit" id="guardar" value="Guardar Portafolio del Proyecto" />
            <input type="button" id="cancelar" value="Cancelar" />
        </p>

    </center>
    <input id="por_pro_id" name="por_pro_id" value="<?php echo $por_pro_id ?>" style="visibility: hidden"/>
</form>

<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>