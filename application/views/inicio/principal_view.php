
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
z-index:0;
position:relative;
}
</style>
<!-- FIN PARA LA CSS DE LA FICHA -->
<style type="text/css">
    .Tabla { background-color:#FFFFE0;border-collapse:collapse; }
    .Tabla th { background-color:#24D2A4;color:white; }
    .Tabla td, .myTable th { padding:5px;border:1px solid #24D2A4; }
</style>
<!-- FIN PARA LA CSS DE LOS COMPONENTES -->
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
<script type="text/javascript">
 
    $('.slidedeck').slidedeck({
        speed: 1000,
        autoplay:true,
        index:['1','2','3','4'],
        transition: 'linear',
        key: false}
).vertical();
</script>

<br/>
<center>
    <hr size=3 width= 50% align=center/>
    <hr size=2 width=80% noshade=“noshade” align= center />

    <div id="contenedor">
        <div id="izquierda">
            <p align=center>
                <font face="Arial" size=5>
                    Componente 2
                </font>
            </p>
            <p align=left>
                Este componente consiste en fortalecer las capacidades y el rol de los Gobiernos Locales en los procesos de desarrollo local. Sus objetivos son:
            <ul>
                <li>Proveer asistencia técnica y capacitación a los municipios para desarrollar y fortalecer sus capacidades de gestión administrativa, etc.</li>
                <li>Asistir en la implementación de la Carrera Administrativa Municipal</li>
                <li>Fortalecer procesos y sistemas para incrementar la capacidad de los Gobiernos Locales en le planeamiento participativo para el desarrollo local.</li>
                <li>Fortalecer sistemas administrativos procesos de contrataciones y adquisiciones, gestión financiera transparente de los Gobiernos Locales.</li>
            </ul>
            </p>
        </div>
        <div id="derecha">
            <p align=center>
                <font face="Arial" size=5>
                    Componente 4
                </font>
            </p>
            <p align=left>
                Los objetivos de este componente son:
            <ul>
                <li>Una efectiva y eficiente administración tecnica-financiera del proyecto mediante el establecimiento de mecanismos institucionesles, sistemas administrativos financieros, sistema de información y otros elementos necesarios para la implementación del Proyecto</li>
                <li>El diseño e implementación de un sistema de seguimiento y evaluación que mida los resultados e impactos del proyecto.</li>
                <li>La adquisición de bienes y contratación de servicios de consultaoria en apoyo a la operación del proyecto por parte de la UEP, en coordinación con las estructura del FISDL, ISDEM y SSDT.</li>
                </p>
            </ul>
        </div>
        <div id="centro" >
            <p align=center>
                <font face="Arial" size=5>Componente 3</font>
            </p>
            <p align=left>
                A través de este componente el proyecto proporcionará asistencia para el diseño u desarrollo de una estrategia de descentralización, que contempla: 
                diagnosticos sectoriales, consultas y construcción de consensos sobre dicha estrategia, propuestas de reformas legales y fiscales, y el apoyo para la elaboración de un plan de implementación y acciones iniciales.
            </p>
            <p align=left>
                Este es un esfuerzo nacional que se complementa con las otras acciones del resto de componenetes de este proyecto y que busca cambiar la acutal interrealación de las instituciones del Estado con relación al territorio y el desaroollo local.
            </p>
            <p align=left>
                La UEP será la encargadas de administrar los recursos de este componente y la SSDT se encargará de la ejecución de las actividades del mismo. Dada la relevancia de este tema se ha conformado una Comisión de Descentralización.
            </p>

        </div>
    </div> 

    <br />
    <br />

    <hr size=3 width= 50% align=center/>
    <hr size=2 width=80% noshade=“noshade” align= center />
    <table class="Tabla">
        <tr>
        <th>
            <font face="arial" size=4>
                Promoción  de la Prestación de Servicios Descentralizados
            </font>
        </th>
        <th>
        </th>
        </tr>
        <tr>
        <td width="50%">
            <a href="<?php echo base_url('mapas/showmaps'); ?>">
                <img src="<?php echo base_url('resource/imagenes/mapa.png'); ?>" style="width:100%" />
            </a>
        </td>
        <td width="20%">
        <marquee  behavior="scroll" direction="up" scrollamount ="2">
            <font face="arial" size=3>
                Este componente está dirigido a apoyar 
                financieramente a los gobiernos municipales
                mediante transferenciass directas para la 
                ejecución de sub proyectos de infraestructura
                municipal en las siguientes tipologías:
                <ul>
                    <li>Agua potable y saneamiento</li>
                    <li>Gestión integral de desechos solidos</li>
                    <li>Caminos vecinales y calles urbanas</li>
                    <li>Electificación</li>
                    <li>Prevención de la violencia</li>
                    <li>Otras tipologias de servicios básicos</li>
                </ul>
                Haz click en el mapa o en el menú para visualizar los resultados en el mapa
            </font>

        </marquee>
        </td>
        </tr>
    </table>
</center>
