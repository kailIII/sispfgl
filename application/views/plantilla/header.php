<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- IMPORTAR HOJAS DE ESTILO -->
        <link type="text/css" href="<?php echo base_url('resource/css/style.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('resource/css/estilosPropios.css'); ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url('resource/css/demo-page.css'); ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url('resource/css/ui.jqgrid.css'); ?>" rel="stylesheet" />
        <?php if(!isset($principal)) {?>
        <link type="text/css" href="<?php echo base_url('resource/css/redmond/jquery-ui-1.8.22.custom.css'); ?>" rel="stylesheet" />
        <?php }?>
        <link type="text/css" href="<?php echo base_url('resource/css/styleLista.css'); ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url('resource/css/vertical_menu_basic.css'); ?>" rel="stylesheet" />

        <!-- IMPORTAR JAVASRIPT -->
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery-1.7.2.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery-ui-1.8.22.custom.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery.jqGrid.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/i18n/grid.locale-es.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/i18n/jquery.ui.datepicker-es.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/select_replacement.1.0.0.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery.validate.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/AjaxUpload.2.0.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery.hoverIntent.minified.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery.dcverticalmegamenu.1.1.js'); ?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery-ui-tabs-rotate.js'); ?>"></script>
        <title><?php echo $titulo ?></title>
    </head>
    <body>
        <!-- Contenedor principal -->
        <div id="divpagina"> 
            <!-- Encabezado -->
            <?php
            if (!isset($menu) && !isset($mostrar)) {
                ?>                   
                <div style="position: relative; background: #2F589F;left: 840px; width:130px" align="center">
                    <img style="position: relative; top:2px " heigth="20px" width="20px" src="<?php echo base_url('resource/imagenes/login-2.png'); ?>"/>
                    <span class="login1">
                        <a style="font-weight: bold; font-size: 13px; position: relative; top:-5px;" href="<?php echo base_url("auth/login"); ?>" >Iniciar Sesión</a>
                    </span>
                </div>    
            <?php } ?>
            <center>
                <img src="<?php echo base_url('resource/imagenes/banner-pfgl.png'); ?>" height="100px"/>

            </center>
            <div id="divcuerpo">
                <?php if (isset($username)) { ?>
                    <p class="letraazul" >Bienvenido: <?php echo $username; ?>

                        <?php echo anchor('/auth/logout/', 'Salir'); ?>
                    </p>
                <?php } ?>
