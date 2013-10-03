<script type="text/javascript">
    $(document).ready(function() {
        $('#boton').button().click(function() {
            document.location.href = '<?php echo base_url($ruta . 'gestionarActividad'); ?>/' + $('#poa_com_id').val();
        });
    });
</script>


<center>
    <h2 class="h2Titulos">Planificación Operativa Anual</h2>
    <h2 class="h2Titulos">Planificación para el año <?php echo $anio; ?> </h2>
    <br/>
    <p><strong>Componente:</strong><?php echo $componente; ?></p>
    <br/><br/>
</center>
<div style="overflow:scroll">
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
        <th scope="col">Ene. - Mar.</th>
        <th scope="col" >Abr. - Jun.</th>
        <th scope="col" >Jul.-Sep.</th>
        <th scope="col" >Oct. - Dic.</th> 
        </tr>
    </thead>
    <tbody>
        <?php foreach ($actividades as $aux){ ?>
        <tr>
        <td><?php echo $aux->poa_act_codigo ?></td>
        <td><?php echo $aux->poa_act_descripcion ?></td>
        </tr>
        <?php }?>
    </tbody>

</table>

        </div>
<input id='boton' type="button"  value="Editar Programación Anual" />




