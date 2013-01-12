    <h1><?php echo $tema ?></h1>
    <div class="cell-page" id="map-area">
        <iframe width="900" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
                src="<?php echo "http://" . $_SERVER['HTTP_HOST'].'/cgi-bin/mapserv'; ?>?map=/var/www/sispfgl/capas/partidos_de_gobierno/partidospormuni.map&layer=municipios"></iframe>
       
    </div>

