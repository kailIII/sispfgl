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
                <ul >
                    <li><a href="<?php echo base_url('mapas/showmaps'); ?>">Partidos Politicos de Gobierno</a></li>
                    <li><a>Proyectos</a></li>
                    <li><a>Mapa de Pobreza</a></li>
                </ul>
            </li>
            <li><a>Reportes</a></li>
            <li><a>Contáctenos</a></li>
            <li><a href="http://localhost/limesurvey">Encuestas</a></li>
            <?php
        }
        ?>
    </ul>
    <br style="clear: left" />
</div>

<?php if (isset($username)) { ?>
    <div style="position: relative;top:-25px; left: 650px;">
        <p class="letraazul" >Bienvenido: <?php echo $username; ?>
            <?php echo anchor('/auth/logout/', 'Salir'); ?>
        </p>
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