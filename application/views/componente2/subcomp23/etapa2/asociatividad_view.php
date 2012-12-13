
<center>
    <h1>Gestionar Asociatividad del Municipio</h1>
</center>
<table align="center" >
    <tr>
        <td align="center" ><a href="<?php echo base_url('componente2/comp23_E2/registrarAsociatividad'); ?>"><img src="<?php echo base_url('resource/imagenes/add.png'); ?>"/></a></td>
    </tr>
    <tr>
        <td class="letraazul" align="center">Registrar Asociatividad</td>
    </tr>
</table>
<p></p>
<table align="center">
    <thead>
        <tr>
            <th class="thEstandar">Nombre</th>
            <th class="thEstandar">Tipo</th>
            <th class="thEstandar">Fecha Constitución</th>
            <th class="thEstandar">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($asociatividades as $aux) { ?>
        <tr style="font-size: 14px">
            <td><?php echo $aux->aso_nombre; ?></td>
            <td><?php echo $aux->tip_nombre; ?></td>
            <td><?php if (!is_null($aux->aso_fecha_constitucion)) echo date_format(date_create($aux->aso_fecha_constitucion),"d-m-Y") ?></td>
            <td><a href="<?php echo base_url('componente2/comp23_E2/editarAsociatividad').'/'.$aux->aso_id; ?>"><img src="<?php echo base_url('resource/imagenes/edit.png'); ?>"/></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
  

