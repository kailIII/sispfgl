<script type="text/javascript">        
    $(document).ready(function(){
        
        $("#guardar").button().click(function() {
               
           this.form.submit();
            
        });
    });
</script>
<center>
    <h1>SubComponente 2.5.</h1>
    <h1>Gestión de riesgos</h1>
</center>

<p>
    Este subcomponente busca aumentar la capacidad de los gobiernos locales y nacionales
    para realizar una gestión integral del riesgos, de manera articulada con la población
    y otras entidades civiles como asociaciones de desaarrollo comunal ADESCO, organismos 
    de rescate, comités de cuenca y comités de riesgos locales entre otros con similares 
    fines. Se incluirán activades de capacitación de prevención, mitigación, preparación
    y respuesta a riesgos por desastres; también recrearán y/o reforzarán los sistemas 
    municipales y comunitarios de comunicación, dotándolos de equipo básico necesario para 
    un efectivo funcionamiento antes, durante y después de los acontecimientos.
</p>
<form method="post" id="Hola" action="<?php echo base_url('reportes/gdrGeneral');?>">
    <input type="submit" id="guardar" value="Guardar" />
</form>