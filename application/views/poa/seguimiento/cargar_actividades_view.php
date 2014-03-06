<?php
$ci = &get_instance();
$ci->load->model('poa/poa_actividad', 'actividad');
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.boton').button();
    });
</script>
<table id="box-table-a">
    <thead>
        <tr>
        <th scope="col">Código</th>
        <th scope="col" >Actividad</th>
        <th scope="col" width='350px'>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($actividades as $aux) { ?>
            <tr class='odd'>
            <td><?php echo $aux->poa_act_codigo; ?></td>
            <td><?php echo $aux->poa_act_descripcion; ?></td>
            <td><input class='boton' type="button" onclick="location.href=('<?php echo base_url($ruta . "gestionarActividad") . "/" . $poa_com_id ."/".$aux->poa_act_det_anio. "/" . $aux->poa_act_id; ?>')" value="Editar" />
            <!--    <input class='boton' type="button" onclick="alert(<?php echo $aux->poa_act_id; ?>)" value="Eliminar" />-->
                <input class='boton' type="button" onclick="location.href=('<?php echo base_url($ruta . "gestionarSubActividad") . "/" . $poa_com_id . "/" . $aux->poa_act_id."/".$aux->poa_act_det_anio; ?>')" value="Agregar SubActividad" /></td>
            </tr>
            <?php if (count($ci->actividad->obtenerSubActividades($aux->poa_act_id)) != 0) { ?>
                <?php foreach ($ci->actividad->obtenerSubActividades($aux->poa_act_id) as $aux2) { ?>
                    <tr class='odd'>
                    <td><?php echo $aux2->poa_act_codigo; ?></td>
                    <td><?php echo $aux2->poa_act_descripcion; ?></td>
                    <td><input class='boton' type="button"  onclick="location.href=('<?php echo base_url($ruta . "gestionarActividad") . "/" . $poa_com_id ."/".$aux->poa_act_det_anio. "/" . $aux2->poa_act_id; ?>')" value="Editar" />
                    <!--    <input class='boton' type="button" onclick="alert(<?php echo $aux2->poa_act_id; ?>)" value="Eliminar" />-->
                        <input class='boton' type="button" onclick="location.href=('<?php echo base_url($ruta . "gestionarSubActividad") . "/" . $poa_com_id ."/" . $aux2->poa_act_id."/".$aux->poa_act_det_anio; ?>')" value="Agregar SubActividad" />
                    </td>
                    </tr>
                    <?php if (count($ci->actividad->obtenerSubActividades($aux2->poa_act_id)) != 0) { ?>
                        <?php foreach ($ci->actividad->obtenerSubActividades($aux2->poa_act_id) as $aux3) { ?>
                            <tr class='odd'>
                            <td><?php echo $aux3->poa_act_codigo; ?></td>
                            <td><?php echo $aux3->poa_act_descripcion; ?></td>
                            <td><input class='boton' type="button"  onclick="location.href=('<?php echo base_url($ruta . "gestionarActividad") . "/" . $poa_com_id."/".$aux->poa_act_det_anio . "/" . $aux3->poa_act_id; ?>')" value="Editar" />
                            <!--    <input class='boton' type="button" onclick="alert(<?php echo $aux3->poa_act_id; ?>)" value="Eliminar" />-->
                                <input class='boton' type="button" onclick="location.href=('<?php echo base_url($ruta . "gestionarSubActividad") . "/" . $poa_com_id . "/" . $aux3->poa_act_id."/".$aux->poa_act_det_anio; ?>')" value="Agregar SubActividad" /></td>
                            </tr>
                            <?php if (count($ci->actividad->obtenerSubActividades($aux3->poa_act_id)) != 0) { ?>
                                <?php foreach ($ci->actividad->obtenerSubActividades($aux3->poa_act_id) as $aux4) { ?>
                                    <tr class='odd'>
                                    <td><?php echo $aux4->poa_act_codigo; ?></td>
                                    <td><?php echo $aux4->poa_act_descripcion; ?></td>
                                    <td><input class='boton' type="button"  onclick="location.href=('<?php echo base_url($ruta . "gestionarActividad") . "/" . $poa_com_id."/".$aux->poa_act_det_anio . "/" . $aux4->poa_act_id; ?>')" value="Editar" />
                                    <!--    <input class='boton' type="button" onclick="alert(<?php echo $aux4->poa_act_id; ?>)" value="Eliminar" />-->
                                        <input class='boton' type="button" onclick="location.href=('<?php echo base_url($ruta . "gestionarSubActividad") . "/" . $poa_com_id . "/" . $aux4->poa_act_id."/".$aux->poa_act_det_anio; ?>')" value="Agregar SubActividad" /></td>
                                    </tr>
                                    <?php if (count($ci->actividad->obtenerSubActividades($aux4->poa_act_id)) != 0) { ?>
                                        <?php foreach ($ci->actividad->obtenerSubActividades($aux4->poa_act_id) as $aux5) { ?>
                                            <tr>
                                            <td><?php echo $aux5->poa_act_codigo; ?></td>
                                            <td><?php echo $aux5->poa_act_descripcion; ?></td>
                                            <td><input class='boton' type="button"  onclick="location.href=('<?php echo base_url($ruta . "gestionarActividad") . "/" . $poa_com_id."/".$aux->poa_act_det_anio. "/" . $aux5->poa_act_id; ?>')" value="Editar" />
                                                <input class='boton' type="button" onclick="location.href=('<?php echo base_url($ruta . "gestionarSubActividad") . "/" . $poa_com_id . "/" . $aux5->poa_act_id."/".$aux->poa_act_det_anio; ?>')" value="Agregar SubActividad" /></td>
                                    <!--    <input class='boton' type="button" onclick="alert(<?php echo $aux4->poa_act_id; ?>)" value="Eliminar" /></td>-->
                                            </tr>
                                            <?php if (count($ci->actividad->obtenerSubActividades($aux5->poa_act_id)) != 0) { ?>
                                                <?php foreach ($ci->actividad->obtenerSubActividades($aux5->poa_act_id) as $aux6) { ?>
                                                    <tr>
                                                    <td><?php echo $aux6->poa_act_codigo; ?></td>
                                                    <td><?php echo $aux6->poa_act_descripcion; ?></td>
                                                    <td><input class='boton' type="button"  onclick="location.href=('<?php echo base_url($ruta . "gestionarActividad") . "/" . $poa_com_id."/".$aux->poa_act_det_anio. "/" . $aux6->poa_act_id; ?>')" value="Editar" />
                                            <!--    <input class='boton' type="button" onclick="alert(<?php echo $aux4->poa_act_id; ?>)" value="Eliminar" /></td>-->
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>