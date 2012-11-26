<script type="text/javascript">
    $(document).ready(function(){  
        $('.slidedeck').slidedeck({
            speed: 1000,
            autoplay:true,
            index:['1','2','3','4'],
            transition: 'linear',
            key: false}
    ).vertical();
    });
</script>
<style  type="text/css">
    #slidedeck_frame{
        width:500px;
        height:300px;
        margin-left: 90px;
    }
</style>
<!-- FIN PARA LA CSS DE LA FICHA -->

<div id="slidedeck_frame">
    <dl class="slidedeck">
        <dt class="red">Componente</dt>
        <dd>
            <ul class="slidesVertical">
                <img src="<?php echo base_url('resource/imagenes/1.jpg'); ?>" alt="" />
            </ul>
        </dd>
        <dt class="blue">Componente</dt>
        <dd>
            <ul class="slidesVertical">
                <img src="<?php echo base_url('resource/imagenes/2.jpg'); ?>" alt="" />
            </ul>
        </dd>
        <dt class="violet">Componente</dt>
        <dd>
            <ul class="slidesVertical">
                <img src="<?php echo base_url('resource/imagenes/3.jpg'); ?>" alt="" />
            </ul>
        </dd>

        <dt class="green">Componente</dt>
        <dd>
            <ul class="slidesVertical">
                <img src="<?php echo base_url('resource/imagenes/4.jpg'); ?>" alt="" />
            </ul>
        </dd>

    </dl>
</div>
<br/>
<center>
    <hr size=3 width= 50% align=center/>
    <hr size=2 width=80% noshade=“noshade” align= center />

    <h3  class="h2Titulos">Zonas de influencia</h3>

    <a href="<?php echo base_url('mapas/showmaps'); ?>"> <img src="<?php echo base_url('resource/imagenes/mapa.png'); ?>" Align="middle" /></a>
</center>