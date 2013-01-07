<script type="text/javascript">        
    $(document).ready(function(){

        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E3/guardarProyeccionIngresos') ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        $("#proyeccionIngresosForm").validate({
            rules: {
                pro_ing_anio: {
                    required: true,
                    maxlength: 4,
                    number:true
                }
            }
        });   
        
    });
</script>
<form id="proyeccionIngresosForm" method="post">
    <h2 class="h2Titulos">Etapa 3: Plan Estratégico Participativo</h2>
    <h2 class="h2Titulos">Proyección de ingresos de la municipalidad</h2>

    <br/><br/>
    <table>
        <tr>
        <td class="tdLugar" ><strong>Departamento:</strong></td>
        <td><?php echo $departamento ?></td>
        <td class="tdEspacio"></td>
        <td class="tdLugar"><strong>Municipio:</strong></td>
        <td ><?php echo $municipio ?></td>    
        </tr>
    </table>
    <br/><br/>
    <h2 class="h2Titulos">Proyección mensual de ingresos del primer año</h2>
    <center>
        <p><strong>Dígite el primer año de proyección:</strong><input id="pro_ing_anio" name="pro_ing_anio" type="text" size="8"/></p>
    </center>
    <br/> <br/>
    <table align="center" >
        <tr>
        <td></td>
        <td><strong>Disponiblidad Financiera</strong></td>
        <td style="width: 80px"></td>
        <td><strong>Ingresos Proyectados para el año</strong></td>
        </tr>
        <?php foreach ($montos as $monto){ ?>
        <tr>
        <td><strong><?php echo $monto->mon_pro_nombre ?></strong></td>
        <td align="center"><input id="mon_pro_dispo_financiera" name="mon_pro_dispo_financiera" type="text" size="10"/></td>
        <td style="width: 80px"></td>
        <td align="center"><input id="mon_pro_ingresos" name="mon_pro_ingresos" type="text" size="10"/></td>
        </tr>
        <?php } ?>
    </table>
    <h2 class="h2Titulos">Proyección de los años siguientes</h2>
    <center>
    <p>Observaciones y/o Recomendaciones:<br/>
        <textarea name="pro_pep_observacion" cols="48" rows="5"><?php if (isset($pro_pep_observacion)) echo $pro_pep_observacion; ?></textarea></p>

    
        <p > 
            <input type="submit" id="guardar" value="Guardar Proyección" />
            <input type="button" id="cancelar" value="Cancelar" />
        </p>
    </center>

    <input id="pro_pep_ruta_archivo" name="pro_pep_ruta_archivo" <?php if (isset($pro_pep_ruta_archivo) && $pro_pep_ruta_archivo != '') { ?>value="<?php echo $pro_pep_ruta_archivo; ?>"<?php } ?> type="text" size="100" readonly="readonly" style="visibility: hidden"/>
</form>
