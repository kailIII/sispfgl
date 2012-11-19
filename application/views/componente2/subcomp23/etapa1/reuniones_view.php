    <div style="margin-left: 60px;">
<center>
    <h1>Registro de Reuniones</h1>
</center>
<table align="center" >
    <tr>
        <td align="center" ><a href="<?php echo base_url('componente2/comp23_E1/registrarReunion'); ?>"><img src="<?php echo base_url('resource/imagenes/add.png'); ?>"/></a></td>
    </tr>
    <tr>
        <td class="letraazul" align="center">Registrar Reunión</td>
    </tr>
</table>
<p></p>
<table align="center">
    <thead>
        <tr>
            <th class="thEstandar"> No</th>
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
            <td><?php echo date_format(date_create($aux->reu_fecha),"d-m-Y") ?></td>
            <td><a href="<?php echo base_url('componente2/comp23_E1/editarReunion'); ?>/<?php echo $aux->reu_id; ?>"><img src="<?php echo base_url('resource/imagenes/edit.png'); ?>"/></a>
                <!--<a href="#"><img src="<?php echo base_url('resource/imagenes/pdf.png'); ?>"/></a>-->
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>    

