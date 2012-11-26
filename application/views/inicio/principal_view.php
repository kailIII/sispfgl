<!-- CSS PARA LA FICHA -->
<style type="text/css" >
    #featured .ui-tabs-panel .info{
        display:none;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $("#featured").tabs({fx:[{opacity: "toggle", duration: 'slow'}, {opacity: "toggle", duration: 'normal'}],
            show: function(event, ui){
                $('#featured .ui-tabs-panel .info').hide();
                var infoheight=$('.info', ui.panel).height();
                $('.info', ui.panel).css('height', '0px').animate({ 'height': infoheight }, 500);
            }
        }).tabs("rotate", 5000, true);
        $('#featured').hover(
        function(){ $('#featured').tabs('rotate', 0, true); },
        function(){ $('#featured').tabs('rotate', 5000, true); }
    );
        $('#featured .ui-tabs-panel a.hideshow').click(function(){
            if($(this).text()=='Hide'){
                $(this).parent('.info').animate({ 'height': '0px' }, 500);
                $(this).text('Show');
            }
            else{
                $(this).parent('.info').animate({ 'height': '70px' }, 500);
                $(this).text('Hide');
            }
            return false;
        });
    });
</script>
<!-- FIN PARA LA CSS DE LA FICHA -->
<center>
    <div id="featured" >
        <ul class="ui-tabs-nav">
            <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-1"><a href="#fragment-1"><img src="<?php echo base_url('resource/imagenes/comp01_peque.jpg'); ?>" alt="" /><span>Promoción de prestación de Servicios Desentralizados</span></a></li>
            <li class="ui-tabs-nav-item" id="nav-fragment-2"><a href="#fragment-2"><img src="<?php echo base_url('resource/imagenes/comp02_peque.jpg'); ?>" alt="" /><span>Fortalecimiento de Gobiernos Locales</span></a></li>
            <li class="ui-tabs-nav-item" id="nav-fragment-3"><a href="#fragment-3"><img src="<?php echo base_url('resource/imagenes/comp03_peque.jpg'); ?>" alt="" /><span>Apoyo Politicas de Descentralización</span></a></li>
            <li class="ui-tabs-nav-item" id="nav-fragment-4"><a href="#fragment-4"><img src="<?php echo base_url('resource/imagenes/comp04_peque.jpg'); ?>" alt="" /><span>Gestión del Proyecto</span></a></li>
        </ul>

        <!-- First Content -->
        <div id="fragment-1" class="ui-tabs-panel" style="">
            <img src="<?php echo base_url('resource/imagenes/comp01.JPG'); ?>" alt="" />
            <div class="info" >
                <a class="hideshow" href="#" ></a>
                <h2><a href="#" >Componente 1</a></h2>
                <p>Subproyectos de infraestructura municipal en áreas como: Agua Potable, Gestión de Desechos Solidos, Caminos Vecinales, etc. <a href="#" >Más</a></p>
            </div>
        </div>

        <!-- Second Content -->
        <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide" style="">
            <img src="<?php echo base_url('resource/imagenes/comp02.jpg'); ?>" alt="" />
            <div class="info" >
                <a class="hideshow" href="#" ></a>
                <h2><a href="#" >Componente 2</a></h2>
                <p>Fortalecer capacidades de los Gobiernos Locales para el desarrollo local, brindando asistencia técnica y capacitación. <a href="#" >Más</a></p>
            </div>
        </div>

        <!-- Third Content -->
        <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide" style="">
            <img src="<?php echo base_url('resource/imagenes/comp03.jpg'); ?>" alt="" />
            <div class="info" >
                <a class="hideshow" href="#" ></a>
                <h2><a href="#" >Componente 3</a></h2>
                <p>Asistencia para el desarrollo de una estrategia de descentralización, que contempla: diagnosticos sectoriales, consultas y consensos. <a href="#" >Más</a></p>
            </div>
        </div>

        <!-- Fourth Content -->
        <div id="fragment-4" class="ui-tabs-panel ui-tabs-hide" style="">
            <img src="<?php echo base_url('resource/imagenes/comp04.JPG'); ?>" alt="" />
            <div class="info" >
                <a class="hideshow" href="#" ></a>
                <h2><a href="#" >Componente 4</a></h2>
                <p>Vela por el efectiva y eficiente administración técnica-financiera del Proyecto, por medio de mecanismos institucionales. <a href="#" >Más</a></p>
            </div>
        </div>

    </div>

<br/>
<hr size=3 width= 50% align=center/>
<hr size=2 width=80% noshade=“noshade” align= center />

<h3  class="h2Titulos">Zonas de influencia</h3>

<a href="<?php echo base_url(); ?>mapas/showmaps"> <img src="<?php echo base_url('resource/imagenes/mapa.png'); ?>" Align="middle" /></a>
</center>