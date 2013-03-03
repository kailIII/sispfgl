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
        $('#dep_id').change(function(){ 
            $("#elaboracionProyectoForm").hide();
            $('#mun_id').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id='+$('#dep_id').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#mun_id').append('<option value="0">--Seleccione Municipio--</option>');
                        $.each(val, function(id, registro){
                            $('#mun_id').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
        $('#selMun').change(function(){
            $('#elaboracionProyectoForm')[0].reset();
            $('#consultoresInteres').setGridParam({
                url:'<?php echo base_url('componente2/procesoAdministrativo/cargarConsultoraInteres3') . '/0' ?>',
                datatype:'json'
            }).trigger('reloadGrid');
            $.getJSON('<?php echo base_url('componente2/procesoAdministrativo/cargarSeleccionConsultora') . "/" ?>'+$('#selMun').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $.each(val, function(id, registro){
                            if(registro['cell'][4]!=null){
                                $( "#pro_fenvio_informacion" ).datepicker( "option", "minDate", registro['cell'][4] ); 
                                $( "#pro_flimite_recepcion" ).datepicker( "option", "minDate", registro['cell'][4] ); 
                                $('#consultoresInteres').setGridParam({
                                    url:'<?php echo base_url('componente2/procesoAdministrativo/cargarConsultoraInteres3') . '/' ?>'+registro['cell'][0],
                                    editurl:'<?php echo base_url('componente2/procesoAdministrativo/gestionarConsultoresInteres') . '/'; ?>'+registro['cell'][0],
                                    datatype:'json'
                                }).trigger('reloadGrid');
                                $('#pro_id').val(registro['cell'][0]);
                                $('#pro_numero').val(registro['cell'][1]);
                                $('#pro_fenvio_informacion').val(registro['cell'][2]);
                                $('#pro_flimite_recepcion').val(registro['cell'][3]);
                                $("#elaboracionProyectoForm").show();
                            }
                        });                    
                    }
                });
            });              
        });
        
                
    });
</script>
<center>
    <h2 class="h2Titulos">2.1. Elaboración de proyecto</h2>
    <h2 class="h2Titulos">2.1.1. Entrada</h2>
    <br/>
    <table>
        <tr>
        <td><strong>Departamento</strong></td>
        <td><select id='dep_id'>
                <option value='0'>--Seleccione--</option>
                <?php foreach ($departamentos as $depto) { ?>
                    <option value='<?php echo $depto->dep_id; ?>'><?php echo $depto->dep_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
        <td><strong>Municipio</strong></td>
        <td><select id='mun_id' name='mun_id'>
                <option value='0'>--Seleccione--</option>
            </select>
        </td>
        </tr>
    </table>
</center>
<form id="elaboracionProyectoForm" method="post">



    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Seleccionar" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>

</form>