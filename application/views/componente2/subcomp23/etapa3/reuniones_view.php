
<center>
    <h1>Gestión de Reuniones para Grupo Gestor</h1>
</center>
<table align="center" >
    <tr>
        <td align="center" ><a href="<?php echo base_url('componente2/comp23_E3/registrarReunion'); ?>"><img src="<?php echo base_url('resource/imagenes/add.png'); ?>"/></a></td>
    </tr>
    <tr>
        <td class="letraazul" align="center">Registrar Reunión</td>
    </tr>
</table>
<p></p>
<table align="center">
    <thead>
        <tr>
            <th class="thEstandar">No.</th>
            <th class="thEstandar">Tema</th>
            <th class="thEstandar">Fecha</th>
            <th class="thEstandar">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reuniones as $aux) { ?>
        <tr style="font-size: 14px">
            <td><?php echo $aux->reu_numero; ?></td>
            <td><?php echo $aux->reu_tema; ?></td>
            <td><?php if (!is_null($aux->reu_fecha)) echo date_format(date_create($aux->reu_fecha),"d-m-Y") ?></td>
            <td>
                <a href="<?php echo base_url('componente2/comp23_E3/editarReunion'); ?>/<?php echo $aux->reu_id; ?>"><img src="<?php echo base_url('resource/imagenes/edit.png'); ?>"/></a>
                <a href="<?php echo base_url('componente2/comp23_E3/muestraReunion').'/'.$aux->reu_id; ?>"><img src="<?php echo base_url('resource/imagenes/cancel.png'); ?>" heigth="50px" width="50px"/></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
  

