<script type="text/javascript">        
    $(document).ready(function(){
        
        $("#guardar").button().click(function(){
            if($('#selConsultoras').val()!='0'){
                $('#cons_id').val($('#selConsultoras').val());
                this.form.action='<?php echo base_url('consultor/consultoraC/guardarCoordinador') . '/' . $con_id; ?>';
            }else{
                $('#mensaje3').dialog('open'); 
                return false;
            }
        });
       
        $("#regresar").button().click(function() {
            document.location.href='<?php echo base_url('consultor/consultoraC/coordinadores'); ?>';
        });
        $("#formConsultor").validate({
            rules: {
                con_nombre: {required: true,maxlength: 75},
                con_apellido: {required: true,maxlength: 75},
                con_telefono: {required: true,maxlength: 9},
                con_email: {required: true,maxlength: 100, email:true}
            }
        });
        
        $("#con_telefono").mask("9999-9999");
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
        /*FIN DIALOGOS VALIDACION*/
    
    });
</script>
<h2 class="demoHeaders" align="Center">Registrar Consultor</h2>
<center>
    <form id="formConsultor" method="post">

        <table align="center" style=" border-color: #2F589F; border-style: solid" >
            <tr>
            <td colspan="5"><br/></td>
            </tr>

            <tr>
            <td width="50px"></td>
            <td class="letraazul">Nombres del Consultor</td>
            <td><input id="con_nombre" name="con_nombre" value="<?php echo $con_nombre ?>" size="35"/></td>
            </tr>
            <tr>
            <td width="50px"></td>
            <td class="letraazul">Apellidos del Consultor</td>
            <td><input id="con_apellido" name="con_apellido" value="<?php echo $con_apellido ?>" size="35"/></td>
            </tr>
            <tr>
            <td width="50px"></td>
            <td class="letraazul">Teléfono Personal</td>
            <td><input id="con_telefono" name="con_telefono" value="<?php echo $con_telefono ?>" size="10"/></td>
            </tr>
            <tr>
            <td width="50px"></td>
            <td class="letraazul">Correo Electrónico</td>
            <td><input id="con_email" name="con_email" value="<?php echo $con_email ?>" size="35"/></td>
            </tr>
            <tr>
            <td width="50px"></td>
            <td class="letraazul">Consultora:</td>
            <td><select id='selConsultoras'>
                    <option value='0'>--Seleccione la Consultora--</option>
                    <?php
                    foreach ($consultoras as $consultora) {
                        if ($consultora->cons_id == $cons_id) {
                            ?>
                            <option selected=selected value='<?php echo $consultora->cons_id; ?>'><?php echo $consultora->cons_nombre; ?></option>
                        <?php } else {
                            ?>
                            <option value='<?php echo $consultora->cons_id; ?>'><?php echo $consultora->cons_nombre; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select></td>
            <td></td>
            </tr>
            <tr>
            <td width="50px"></td>
            <td class="letraazul">Región</td>
            <td><input id="reg_id" name="reg_id" value="<?php echo $reg_id ?>" readonly="readonly" style="background:#F2F2F2"/></td>
            </tr>
            <tr>
            <td width="50px"></td>
            <td class="letraazul">Departamento</td>
            <td><input id="dep_id" name="dep_id" value="<?php echo $dep_id ?>" readonly="readonly" style="background:#F2F2F2"/></td>    
            </tr>
            <tr>
            <td width="50px"></td>
            <td class="letraazul">Municipio</td>
            <td><input id="mun_id" name="mun_id" value="<?php echo $mun_id ?>" readonly="readonly" style="background:#F2F2F2"/></td>
            </tr>
            <tr>
            <td width="50px"></td>
            <td class="letraazul">Proyecto PEP:</td>
            <td><textarea id="pro_pep_nombre" name="pro_pep_nombre" readonly="readonly" style="background:#F2F2F2" cols="30" rows="3"><?php echo $pro_pep_nombre ?></textarea></td>
            </tr>
            <tr>
            <td colspan="3" align="center"><br/>
                <input type="submit" value="Guardar" id="guardar" />
                <input type="button" value="Regresar" id="regresar" />
            </td>
            </tr>
        </table>

</center>
<input id="pro_pep_id" name="pro_pep_id" value="<?php echo $pro_pep_id ?>"  style="visibility: hidden"/>
<input id="cons_id" name="cons_id" value="<?php echo $cons_id ?>"  style="visibility: hidden"/>
</form>
<div id="mensaje3" class="mensaje" title="Recuerde:">
    <p>Debe Seleccionar la Consultora del Coordinador
    </p>
</div>
