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