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
        $( "#f_ord_ini" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#f_ent_pla" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#f_rec_obs" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#f_sup_obs" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#f_vis_bue_plan" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#f_rec_con_mun" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#f_rec_pro_fin" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
   
        /*FIN DEL DATEPICKER*/
               
     
  
    });
</script>





<form id="planTrabajoConsulForm" method="post">

    <h2 class="h2Titulos">Etapa 0: Seleccion de Municipios</h2>
    <h2 class="h2Titulos">Plan de trabajo de las consultoras</h2>
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
    </table>
    <br/>

    <table>
        <tr><td style="width: 100px"> 
        <td class="textD"><strong>Fecha de orden de inicio: </strong> </td>
        <td>
            <input <?php if (isset($f_ord_ini)) { ?> value='<?php echo date('d/m/Y', strtotime($f_ord_ini)); ?>'<?php } ?>id="f_ord_ini" name="f_ord_ini" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>   
        <tr><td style="width: 100px"> 
        <td class="textD"><strong>Fecha de entrega de plan: </strong> </td>
        <td>
            <input <?php if (isset($f_ent_pla)) { ?> value='<?php echo date('d/m/Y', strtotime($f_ent_pla)); ?>'<?php } ?>id="f_ent_pla" name="f_ent_pla" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>  
        <tr><td style="width: 100px"> 
        <td class="textD"><strong>Fecha de recepción de observaciones: </strong> </td>
        <td>
            <input <?php if (isset($f_rec_obs)) { ?> value='<?php echo date('d/m/Y', strtotime($f_rec_obs)); ?>'<?php } ?>id="f_rec_obs" name="f_rec_obs" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>  
        <tr><td style="width: 100px"> 
        <td class="textD"><strong>Fecha de visto bueno: </strong> </td>
        <td>
            <input <?php if (isset($f_sup_obs)) { ?> value='<?php echo date('d/m/Y', strtotime(f_sup_obs)); ?>'<?php } ?>id="f_sup_obs" name="f_sup_obs" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>  
        <tr><td style="width: 100px"> 
        <td class="textD"><strong>Fecha de visto bueno al plan: </strong> </td>
        <td>
            <input <?php if (isset($f_vis_bue_plan)) { ?> value='<?php echo date('d/m/Y', strtotime($f_vis_bue_plan)); ?>'<?php } ?>id="f_vis_bue_plan" name="f_vis_bue_plan" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>  
        <tr><td style="width: 100px"> 
        <td class="textD"><strong>Fecha de presentación al Consejo Municipal: </strong> </td>
        <td>
            <input <?php if (isset($f_rec_con_mun)) { ?> value='<?php echo date('d/m/Y', strtotime($f_rec_con_mun)); ?>'<?php } ?>id="f_rec_con_mun" name="f_rec_con_mun" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>  
        <tr><td style="width: 100px"> 
        <td class="textD"><strong>Fecha de recepción del producto final UEP: </strong> </td>
        <td>
            <input <?php if (isset($f_rec_pro_fin)) { ?> value='<?php echo date('d/m/Y', strtotime($f_rec_pro_fin)); ?>'<?php } ?>id="f_rec_pro_fin" name="f_rec_pro_fin" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>  

    </table>
    <br/>
    <table><tr><td style="width: 50px"> <td><p><strong>¿Acta de aceptación contiene firmas?</strong></p></td></tr></table>
    <table>
        <tr><td style="width: 100px"> 
        <td>Municipalidad</td>
        <td>
            <input type="radio" name="municipalidad" value="true"<?php if (isset($municipalidad) && $municipalidad == 't') { ?> checked <?php } ?>>SI </input>
            <input type="radio" name="municipalidad" value="false"<?php if (isset($municipalidad) && $municipalidad == 'f') { ?> checked <?php } ?> >NO </input>
        </td>
        <td style="width: 150px"> </td>
        <td><div id="btn_subir"></div></td>
        <td><input class="letraazul" type="text" id="vinieta" readonly="readonly" value="Subir Acta" size="30" style="border: none"/></td>


        </tr>

        <tr><td style="width: 100px"> 
        <td>ISDEM</td>
        <td>
            <input type="radio" name="isdem" value="true" <?php if (isset($isdem) && $isdem == 't') { ?> checked <?php } ?> >SI </input>
            <input type="radio" name="isdem" value="false" <?php if (isset($isdem) && $isdem == 'f') { ?> checked <?php } ?>>NO </input>
        </td>
        <td style="width: 150px"> </td>
        <td><a <?php if (isset($acu_mun_ruta_archivo) && $acu_mun_ruta_archivo != '') { ?> href="<?php echo base_url() . $acu_mun_ruta_archivo; ?>"<?php } ?>  id="btn_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
        <td><input class="letraazul" type="text" id="vinietaD" readonly="readonly" <?php if (isset($acu_mun_ruta_archivo) && $acu_mun_ruta_archivo != '') { ?>value="Descargar Acta"<?php } else { ?> value="No Hay Actas Por Descargar" <?php } ?>size="35" style="border: none"/></td>



        </tr>
        <tr><td style="width: 100px"> 
        <td>UEP</td>
        <td>
            <input type="radio" name="uep" value="true" <?php if (isset($uep) && $uep == 't') { ?> checked <?php } ?> >SI </input>
            <input type="radio" name="uep" value="false" <?php if (isset($uep) && $uep == 'f') { ?> checked <?php } ?>>NO </input>
        </td>
        <td style="width: 150px"> </td>
        <td>

        </td>


        </tr>
    </table>

    <center>
        <table style="position: relative;top: 15px;">
            <tr>
            <td>
                <p>Comentarios:<br/><textarea id="comentarios" name="comentarios" cols="60" rows="5"><?php if (isset($comentarios)) echo$comentarios; ?></textarea></p>
            </td>
            <td style="width: 50px"></td>


            </tr>
        </table>
    </center>



    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Guardar Solicitud" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>

</form>

<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>
<div id="extension" class="mensaje" title="Error">
    <p>Solo se permiten archivos con la extensión pdf|doc|docx</p>
</div>
