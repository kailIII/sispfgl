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
        <li class="top"><a class="top_link"><span class="down">Apoyo a Politicas de Descentralizaci&oacute;n</span></a>
             <ul class="sub">
                  <li><a href="<?php echo base_url();?>index.php/componente3/componente3/diag_sect_anal_tran">Diagnosticos Sectoriales y Analisis Transversales</a></li>
                  <li><a href="<?php echo base_url();?>index.php/componente3/componente3/form_conc_disc_poli">Formaci&oacute;n de Consenso y Discuci&oacute;n</a></li>
                  <li><a href="<?php echo base_url();?>index.php/componente3/componente3/elab_plan_imp">Elaboracion del Plan de Implementaci&oacute;n</a></li>
                  <li><a href="<?php echo base_url();?>index.php/componente3/componente3/divu">Divulgaci&oacute;n</a></li>
                  <li><a href="<?php echo base_url();?>index.php/componente3/componente3/docs_desc">Documentos Concernientes</a></li>
             </ul>
        </li>
        <?php
           }   
        ?>
    </ul>
</div>
