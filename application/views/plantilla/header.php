<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- IMPORTAR HOJAS DE ESTILO -->
        <?php if (!isset($principal)) { ?>
            <link type="text/css" href="<?php echo base_url('resource/css/redmond/jquery-ui-1.8.22.custom.css'); ?>" rel="stylesheet" />
        <?php } ?>
        <link type="text/css" href="<?php echo base_url('resource/css/estilosPropios.css'); ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url('resource/css/menuHorizontal.css'); ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url('resource/css/slidedeck.custom.css'); ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url('resource/css/style.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('resource/css/ui.jqgrid.css'); ?>" rel="stylesheet" />
        <link type="image/png" href="<?php echo base_url('resource/imagenes/pfgl.png'); ?>" rel="Shortcut Icon">

        <!-- IMPORTAR JAVASRIPT -->
        <script type="text/javascript">
            var arrowimages={down:['downarrowclass', '<?php echo base_url('resource/imagenes/arrow-down.gif'); ?>', 25], right:['rightarrowclass', '<?php echo base_url('resource/imagenes/arrow-right.gif'); ?>']}
        </script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/i18n/grid.locale-es.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/i18n/jquery.ui.datepicker-es.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/AjaxUpload.2.0.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery-1.7.2.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery-ui-1.8.22.custom.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery.hoverIntent.minified.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery.jqGrid.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery.maskedinput.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/jquery.validate.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/menuHorizontal.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/js/slidedeck.jquery.js'); ?>"></script>

        <title><?php echo $titulo ?></title>
   
    </head>
    <body>
        <!-- Contenedor principal -->
        <div id="divpagina"> 
            <!-- Encabezado -->
            <center>
                <img src="<?php echo base_url('resource/imagenes/banner-pfgl-2.png'); ?>" height="100px"/>

            </center>
            <div id="divcuerpo">