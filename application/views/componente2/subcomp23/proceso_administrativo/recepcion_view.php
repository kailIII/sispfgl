<script type="text/javascript">        
    $(document).ready(function(){
        $("#cancelar").button().hide().click(function() {
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
        
        $('#selMun').change(function(){
            $('#propuestaTecnicaForm')[0].reset();
            $("#cancelar").hide();
            $("#guardar").hide();
            $.getJSON('<?php echo base_url('componente2/procesoAdministrativo/cargarPropuestaTecnica') . "/" ?>'+$('#selMun').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $.each(val, function(id, registro){
                            $('#pro_id').val(registro['cell'][0]);
                            $('#pro_numero').val(registro['cell'][1]);
                            $('#pro_fsolicitud').val(registro['cell'][2]);
                            $('#pro_frecepcion').val(registro['cell'][3]);
                            $('#pro_faperturatecnica').val(registro['cell'][4]);
                            $('#pro_faperturafinanciera').val(registro['cell'][5]);
                            $('#pro_fcierre_negociacion').val(registro['cell'][6]);
                            $('#pro_ffirma_contrato').val(registro['cell'][7]);
                            $('#pro_observacion2').val(registro['cell'][8]);
                            $("#cancelar").show();
                            $("#guardar").show();
                        });                    
                    }
                });
            });              
        });
        
        $("#pro_fsolicitud" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        
       /*ZONA DE BOTONES*/
        $("#guardar").button().hide().click(function() {
            this.form.action='<?php echo base_url('componente2/procesoAdministrativo/guardarProceso') . "/4" ?>';
        });
               
      
        /*DIALOGOS DE VALIDACION*/
        $('.mensaje').dialog({
            autoOpen: false,
            width: 300,
            buttons: {
                "Ok": function() {
                    $(this).dialog("close");
                }
            }
        });
                      
    });
</script>



<center>
    <h2 class="h2Titulos">Pedido de propuesta técnica y financiera</h2>
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
</center>
<br/><br/><br/>
<form id="propuestaTecnicaForm" method="post">
    <table class="procesoAdmin" border="0" cellspacing="0" >
        <tr>
        <td class="textD"><strong>No. Proceso: </strong></td>
        <td> <input value="" id="pro_numero" name="pro_numero" type="text" size="10" readonly="readonly" style="border: none; background: white;"/></td>
        </tr>
        <tr>
        <td class="textD"><strong>Fecha de solicitud: </strong></td> 
        <td><input value="" id="pro_fsolicitud" name="pro_fsolicitud" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td class="textD"> <strong>Fecha de recepción: </strong></td>
        <td><input value="" id="pro_frecepcion" name="pro_frecepcion" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td colspan="2" class="fechaAdmin" >Fecha de apertura</td>
        </tr>
        <tr>
        <td class="textD fechaAdmin"> <strong>Técnica: </strong></td>
        <td class="fechaAdmin"><input value="" id="pro_faperturatecnica" name="pro_faperturatecnica" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td class="textD fechaAdmin"> <strong>Financiera: </strong></td>
        <td class="fechaAdmin"><input value="" id="pro_faperturafinanciera" name="pro_faperturafinanciera" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td colspan="2" class="fechaAdmin" ></td>
        </tr>
        <tr>
        <td class="textD"> <strong>Fecha de cierre de negociación: </strong></td>
        <td><input value="" id="pro_fcierre_negociacion" name="pro_fcierre_negociacion" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td class="textD"> <strong>Fecha de firma de contrato: </strong></td>
        <td><input value="" id="pro_ffirma_contrato" name="pro_ffirma_contrato" type="text" size="10" readonly="readonly"/></td>
        </tr>
    </table>
    <br/><br/>
    <table style="position: relative;top: 15px;">
        <tr>
        <td>
            <p>Observaciones:<br/><textarea id="pro_observacion2" name="pro_observacion2" cols="48" rows="5"></textarea></p>
        </td>
        <td style="width: 50px"></td>
        </tr>
    </table>
    <center style="position: relative;top: 20px">
        <input type="submit" id="guardar" value="Guardar" />
        <input type="button" id="cancelar" value="Cancelar" />
    </center>
    <input id="pro_id" name="pro_id" value="" style="visibility: hidden"/>    
</form>

<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
