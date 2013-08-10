<div id="myjquerymenu" class="jquerycssmenu">
    <ul>
        <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
        <?php
        if (isset($menu))
            echo $menu;
        else {
            ?>
            <li><a >Avance</a> </li>                   
            <li><a >Mapas</a>
                <ul style="position:absolute; z-index:1;" >
                    <li><a href="<?php echo base_url('mapas/showmaps'); ?>">Partidos Politicos de Gobierno</a></li>
                    <li><a>Proyectos</a></li>
                    <li><a>Mapa de Pobreza</a></li>
                </ul>
            </li>
            <li><a>Contáctenos</a></li>
            <li><a href="http://sis-pfgl.gob.sv/limesurvey">Encuestas</a></li>
            <li><a>Transparencia</a>
				<ul style="position:absolute; z-index:1;" >
                    <li><a href="<?php echo base_url('transparencia/observaciones_cc_ccc/agregar_obs'); ?>">Observaciones CC y CCC</a></li>
                </ul>
            </li>
            <?php
        }
        ?>
    </ul>
    <br style="clear: left" />
</div>

<?php if (isset($username)) { ?>
    <div style="position: relative;top:-25px; left: 700px;">
        <!-- Opciones:Menu Horizontal  -->
        <ul id="menuh"style="position: relative;top:-1px;left:10px;">
                <li><a href="#"><img src="<?php echo base_url("resource/imagenes/configuracion.png") ?>" height="20px" width="20px"/></a>
                    <ul>
                        <li><?php echo anchor('/auth/change_password/', 'Cambiar Contraseña'); ?></li>
                        <!--<li><a href="manualusuario.pdf"  target="_blank" style="Cursor : help;"><strong>Manual de Usuario</strong></a></li>-->
                        <li><?php echo anchor('/auth/logout/', 'Salir'); ?></li>
                    </ul>
                </li>
            </ul><p class="letraazul" style="position: relative; top:-20px; left: 50px" >Bienvenido: <?php echo $username; ?></p>
    </div>
<?php } ?>
<?php
if (!isset($menu) && !isset($mostrar)) {
    ?>                   
    <div style="position: relative;top:-22px; left: 820px; width:130px" align="center">

        <span class="login1">
            <a style="font-weight: bold; font-size: 13px; position: relative; top:-5px;" href="<?php echo base_url("auth/login"); ?>" ><img style="position: relative; top:4px " heigth="20px" width="20px" src="<?php echo base_url('resource/imagenes/login-2.png'); ?>"/>Iniciar Sesión</a>
        </span>
    </div>    
<?php } ?>
<br/>
<div style="margin-left: 3%; margin-right: 3%">
