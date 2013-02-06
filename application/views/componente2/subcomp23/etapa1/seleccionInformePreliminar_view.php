<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
        $("#guardar").button().hide().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E1/cargarInformePreliminar') ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        /*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){   
            $("#guardar").hide();
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
        $('#selMun').change(function(){
            $('#Mensajito').hide();
            $("#guardar").hide();
            $.getJSON('<?php echo base_url('componente2/comp23_E1/verificarProyectoPep') . "/" ?>'+$('#selMun').val(), 
            function(data) {
                $('#Mensajito').hide();
                $.each(data, function(key, val) {
                    if(key=="records"){
                        if(val=="0"){
                            $('#Mensajito').show();
                            $("#guardar").hide();
                            $('#Mensajito').val("Este municipio no posee ningún Proyecto PEP asignado");
                        }else{
                            $('#Mensajito').hide();
                            $("#guardar").show();
                        }
                    }
                });
            });              
        });
        
                
    });
</script>

<!--<form id="AdquisicionyContratacionForm" method="post" style="left: 100px;position: relative;">-->
<form id="selInforPreliminarD" method="post">
    <center>
        <h2 class="h2Titulos">Revisión de productos</h2>
        <h2 class="h2Titulos">Etapa 1: Condiciones Previas</h2>
        <h2 class="h2Titulos">Producto 6: Informe Preliminar del Municipio</h2>
        <br/>
        <table>
            <tr>
            <td><strong>Departamento</strong></td>
            <td><select id='selDepto'>
                    <option value='0'>--Seleccione--</option>
                    <?php foreach ($departamentos as $depto) { ?>
                        <option value='<?php echo $depto->dep_id; ?>'><?php echo $depto->dep_nombre; ?></option>
                    <?php } ?>
                </select>
            </td>
            </tr>
            <td><strong>Municipio</strong></td>
            <td><select id='selMun' name='selMun'>
                    <option value='0'>--Seleccione--</option>
                </select>
            </td>
            </tr>
        </table>
        <input class="error" value="" id="Mensajito" type="text" size="100" readonly="readonly" style="border: none;"/>
        <br/><br/>
        <center style="position: relative;top: 20px">
            <div>
                <p><input type="submit" id="guardar" value="Seleccionar" />
                    <input type="button" id="cancelar" value="Cancelar" />
                </p>
            </div>
        </center>
    </center>
</form>


