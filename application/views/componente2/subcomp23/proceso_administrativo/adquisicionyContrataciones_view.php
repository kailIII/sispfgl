<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/procesoAdministrativo/editarAdquisicionContrataciones') ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        /*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){   
            $('#selMun').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id='+$('#selDepto').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#selMun').append('<option value="0">--Seleccione Municipio--</option>');
                        $.each(val, function(id, registro){
                            $('#selMun').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
                
    });
</script>

<!--<form id="AdquisicionyContratacionForm" method="post" style="left: 100px;position: relative;">-->
<form id="AdquisicionyContratacionForm" method="post">
    <center>
    <h2 class="h2Titulos">Expresiones de Interes</h2>
    <br/>
    <table>
        <!--
        <tr>
        <td><strong>Departamento</strong></td>
        <td><select id='selDepto'>
                <option value='0'>--Seleccione--</option>
                <php foreach ($grupos as $grupo) { ?>
                    <option value='<php echo $grupo->dep_id; ?>'><php echo $grupo->dep_nombre; ?></option>
                <php } ?>
            </select>
        </td>
        </tr>
        <td><strong>Municipio</strong></td>
        <td><select id='selMun' name='selMun'>
                <option value='0'>--Seleccione--</option>
            </select>
        </td>
        </tr>
        -->
        <tr>
        <td colspan="2">Seleccione el grupo para agregarle las consultoras</td>
        </tr>
        <tr>
        <td><strong>Grupo</strong></td>
        <td><select name='selGrupo'>
                <option value='0'>--Seleccione--</option>
                <?php foreach ($grupos as $grupo) { ?>
                    <option value='<?php echo $grupo->gru_id; ?>'><?php echo $grupo->gru_numero; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
    </table>


    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Seleccionar" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
    </center>
</form>


