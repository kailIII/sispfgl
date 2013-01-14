<script type="text/javascript">        
    $(document).ready(function(){
        /*VARIABLES*/
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E0/guardarPlanTrabajo'); ?>';
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
       
        /*PARA LOS DATEPICKER*/
        $( "#f_reg_apor_mun" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
         
        /*FIN DEL DATEPICKER*/
    
    });
</script>





<form id="registroAporteMunicipalForm" method="post">

    <h2 class="h2Titulos">Etapa 0: Selección de Municipios</h2>
    <h2 class="h2Titulos">Registro de Aportes de la Municipalidad</h2>
    <br/>

    <table>
        <tr><td style="width: 150px"> 
        <td class="textD"><strong>Departamento:</strong></td>
        <td>
            <select id='selDepto'>
                <option value='0'>--Seleccione Departamento--</option>
                <?php foreach ($departamentos as $depar) { ?>
                    <option value='<?php echo $depar->dep_id; ?>'><?php echo $depar->dep_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
        <tr><td style="width: 150px"> 
        <td class="textD"><strong>Municipio:</strong></td>
        <td >
            <select id='selMun'>
                <option value='0'>--Seleccione Municipio--</option>
            </select>
        </td>    
        </tr>
        <tr><td style="width: 100px"> 
        <td class="textD"><strong>Fecha: </strong> </td>
        <td>
            <input <?php if (isset($f_reg_apor_mun)) { ?> value='<?php echo date('d/m/y', strtotime($f_reg_apor_mun)); ?>'<?php } ?>id="f_reg_apor_mun" name="f_reg_apor_mun" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>  
    </table>
    <br/>

    <table>
        <tr>
        <td style="width: 60px"></td>     
        <td class="textD"><strong>Etapa a la que se aportará:</strong></td>
        <td>
            <select id='selEta'>
                <option value='0'>--Seleccione Etapa--</option>
                <?php foreach ($etapas as $eta) { ?>
                    <option value='<?php echo $eta->eta_id; ?>'><?php echo $eta->eta_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
    </table>

    <br/>


    <table>
        <tr>
        <td>
            <table>
                <tr>
                <td rowspan="7">Seleccione el tipo de aporte</td>
                <td></td>
                <td><strong>Aportes de la municipalidad</strong></td>
                </tr>
                <tr><td><input type="checkbox" name="aportacion" value="local"></td><td>Locales para reuniones</td></tr>
                <tr><td><input type="checkbox" name="tranporte" value="tranporte"></td><td>Transporte</td></tr>
                <tr><td><input type="checkbox" name="alimentacion" value="alimentacion"></td><td>Alimentación</td></tr>
                <tr><td><input type="checkbox" name="material" value="material"></td><td>Materiales y Equipo</td></tr>
                <tr><td><input type="checkbox" name="personal" value="personal"></td><td>Personal</td></tr>
                <tr><td><input type="checkbox" name="Otros" value="Otros"></td><td>Otros</td></tr>

            </table>

        </td>
        <td>
            <table>
                <tr>   
                <td style="width: 30px"></td>    
                <td>
                    <strong>Monto estimado ($)</strong><input type="text" name="mon_est" value="" size="15"/>
                </td>
                </tr>

                <tr>
                <td style="width: 30px"></td> 
                <td>
                    <p><strong>Observaciones:</strong><br/><textarea id="observaciones" name="observaciones" cols="40" rows="5"><?php if (isset($observaciones)) echo $observaciones; ?></textarea></p>
                </td>

                </tr>
            </table>

        </td>

        </tr>
    </table>

    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Guardar Registro" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>

</form>

