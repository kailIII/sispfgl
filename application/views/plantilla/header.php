<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- IMPORTAR HOJAS DE ESTILO -->
        <link type="text/css" href="<?php echo base_url('resource/css/style.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('menu/pro_drop_1.css'); ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url('resource/css/estilosPropios.css'); ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url('resource/css/demo-page.css'); ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url('resource/css/ui.jqgrid.css'); ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url('resource/css/redmond/jquery-ui-1.8.22.custom.css'); ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url('resource/css/styleLista.css'); ?>" rel="stylesheet" />
        <!-- IMPORTAR JAVASRIPT -->
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery-1.7.2.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery-ui-1.8.22.custom.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery.jqGrid.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/i18n/grid.locale-es.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/i18n/jquery.ui.datepicker-es.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('menu/stuHover.js'); ?>" ></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/select_replacement.1.0.0.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery.validate.js'); ?>"></script>
        
        <title><?php echo $titulo ?></title>
    </head>
    <body>
        <!-- Contenedor principal -->
        <div id="divpagina"> 
            <!-- Encabezado -->
            <center>
                <img src="<?php echo base_url('resource/imagenes/banner-pfgl-g.png'); ?>" height="100px"/>

            </center>
            <div id="divcuerpo">
                <?php if (isset($username)) { ?>
                    <p class="letraazul" >Bienvenido: <?php echo $username; ?>
                    
                    <?php echo anchor('/auth/logout/', 'Salir'); ?>
                        </p>
                <?php } ?>
