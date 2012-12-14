<<<<<<< HEAD
<div style="margin-left: 200px;">
    <h1><?php echo $tema; echo base_url(); ?></h1>
=======
    <h1><?php echo $tema ?></h1>
>>>>>>> 4a38cca24803fcac4b445f1452594b1262fbbfcd
    <div class="cell-page" id="map-area">
        <iframe width="800" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
                src="<?php echo "http://" . $_SERVER['HTTP_HOST'].'/cgi-bin/mapserv'; ?>?map=/var/www/sispfgl/capas/partidos_de_gobierno/partidospormuni.map&layers=all"></iframe>
       
    </div>

