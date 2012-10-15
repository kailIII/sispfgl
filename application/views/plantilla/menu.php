<div>
    <span class="preload1"></span>
    <span class="preload2"></span>
    <ul id="nav">
        <li class="top"><a href="<?php echo base_url(); ?>" class="top_link"><span>Inicio</span></a></li>
        <?php 
            if(isset($menu))
                echo $menu;
            else{    
        ?>
        <li class="top"><a class="top_link"><span class="down">Institución</span></a>
            <ul class="sub">
                <li><a>Estructura Organizativa</a></li>
                <li><a>Marco Institucional</a></li>
                <li><a>Area Interna</a></li>
            </ul>
        </li>
        <li class="top"><a class="top_link"><span>Contactenos</span></a></li>
        <li class="top"><a href="<?php echo base_url("auth/login"); ?>" class="top_link"><span>Iniciar Sesión</span></a></li>
        <li class="top"><a class="top_link"><span class="down">Mapas</span></a>
             <ul class="sub">
                  <li><a href="<?php echo base_url();?>index.php/mapas/showmaps">Partidos Politicos de Gobierno</a></li>
                  <li><a>Proyectos</a></li>
                  <li><a>Mapa de Pobreza</a></li>
             </ul>
        </li>
        <li class="top"><a class="top_link"><span class="down">Carpetas PFGL</span></a>
             <ul class="sub">
                  <li><a href="<?php echo base_url();?>index.php/carpetas_pfgl/subir_archivoxls">Subir Archivo de Excel</a></li>
             </ul>
        </li>
        <?php
           }   
        ?>
    </ul>
</div>
