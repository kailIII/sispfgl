<script type="text/javascript">
    $(document).ready(function($){
        $('#mHorizontal').dcVerticalMegaMenu({
            rowItems: '3',
            speed: 'slow',
            effect: 'slide',
            direction: 'right'
        });
    });
</script>
<?php
 if (!isset($menu) && !isset($mostrar)) {
 ?>                   
<div style="position: relative; background: white;left: 740px; width:150px; top:-50px;" align="center">
    <img style="position: relative;" heigth="30px" width="30px" src="<?php echo base_url('resource/imagenes/login-2.png'); ?>"/>
    <a style="font-weight: bold; font-size: 13px; position: relative; top:-9px " href="<?php echo base_url("auth/login"); ?>" >Iniciar Sesión</a>
</div>    
<?php } ?>
    <div class="demo-container clear">
        <div class="dcjq-vertical-mega-menu">
            <ul id="mHorizontal" class="menu">
                <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
                <?php
                if (isset($menu))
                    echo $menu;
                else {
                    ?>
                    <li><a >Avance</a> </li>                   
                    <li><a >Mapas</a>
                        <ul >
                            <li><a href="<?php echo base_url(); ?>/mapas/showmaps">Partidos Politicos de Gobierno</a></li>
                            <li><a>Proyectos</a></li>
                            <li><a>Mapa de Pobreza</a></li>
                        </ul>
                    </li>
                    <li><a>Productos</a></li>
                    <li><a>Contáctenos</a></li>
                  <!--
                    <li ><a >Carpetas PFGL</a>
                        <ul >
                            <li><a href="<?php echo base_url(); ?>index.php/carpetas_pfgl/subir_archivoxls">Subir Archivo de Excel</a></li>
                        </ul>
                    </li>-->
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>