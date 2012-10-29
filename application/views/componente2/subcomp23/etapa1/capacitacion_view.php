    <div style="margin-left: 60px;">
<center>
    <h1>Registrar Capacitaciones del Equipo Local de Apoyo</h1>
</center>
<table align="center" >
    <tr>
        <td align="center" ><a href="<?php echo base_url('componente2/comp23_E1/registrarReunion'); ?>"><img src="<?php echo base_url('resource/imagenes/add.png'); ?>"/></a></td>
    </tr>
    <tr>
        <td class="letraazul" align="center">Registrar Capacitaciòn</td>
    </tr>
</table>
<p></p>
<table align="center">
    <thead>
        <tr>
            <th class="thEstandar"> Fecha</th>
            <th class="thEstandar">Tema</th>
            <th class="thEstandar">Lugar</th>
            <th class="thEstandar">Acciones</th>
        </tr>
    </thead>
    <tbody>
       
        <?php foreach ($capacitaciones as $aux) { ?>
        <tr style="font-size: 14px">
            <td><?php echo date_format(date_create($aux->cap_fecha),"d-m-Y"); ?></td>
            <td><?php echo $aux->cap_tema; ?></td>
            <td><?php echo $aux->cap_lugar ?></td>
            <td><a href="<?php echo base_url('componente2/comp23_E1/editarCapacitacion'); ?>/<?php echo $aux->cap_id; ?>"><img src="<?php echo base_url('resource/imagenes/edit.png'); ?>"/></a>
                <!--<a href="#"><img src="<?php echo base_url('resource/imagenes/pdf.png'); ?>"/></a>-->
            </td>
        </tr>
        <?php } ?>
      
    </tbody>
</table>
</div>    

