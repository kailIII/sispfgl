<center>
    <h1>Gestión de Portafolio Proyecto</h1>
</center>
<table align="center" >
    <tr>
    <td align="center" ><a href="<?php echo base_url('componente2/comp23_E3/registrarPortafolio'); ?>"><img src="<?php echo base_url('resource/imagenes/add.png'); ?>"/></a></td>
</tr>
<tr>
<td class="letraazul" align="center">Gestionar Portafolio</td>
</tr>
</table>
<p></p>
<table align="center">
    <thead>
        <tr>
        <th class="thEstandar">Nombre</th>
        <th class="thEstandar">Tema</th>
        <th class="thEstandar">Área</th>
        <th class="thEstandar">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($portafolios as $aux) { ?>
            <tr style="font-size: 14px">
            <td><?php echo $aux->por_pro_nombre; ?></td>
            <td><?php echo $aux->por_pro_tema; ?></td>
            <td><?php echo $aux->por_pro_area; ?></td>
            <td><a href="<?php echo base_url('componente2/comp23_E3/editarPortafolio').'/'.$aux->por_pro_id; ?>"><img src="<?php echo base_url('resource/imagenes/edit.png'); ?>"/></a>
                <!--<a href="#"><img src="<?php echo base_url('resource/imagenes/pdf.png'); ?>"/></a>-->
            </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


