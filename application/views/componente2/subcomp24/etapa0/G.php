<?php

/**
 * 
 * 
 * @author Alexis Beltran
 */

$this->load->view('plantilla/header', $titulo);
$this->load->view('plantilla/menu', $menu);

?>
<script type="text/javascript">        
$(document).ready(function(){
    /*BASICO*/
    function formularioHide(){$('#listaContainer').show();$('#formulario').hide()}
    function formularioShow(){$('#listaContainer').hide();$('#formulario').show()}
    $("#guardar").button();
    $("#btn_acuerdo_nuevo").button().click(function(){$('#frm').submit();});
    $("#btn_seleccionar").button().click(function(){document.location.href='<?php echo current_url(); ?>/' + jQuery("#lista").jqGrid('getGridParam','selrow');});
    $("#cancelar").button().click(function() {document.location.href='<?php echo base_url(); ?>';});
    $('.mensaje').dialog({autoOpen: false,width: 300,
        buttons: {"Ok": function() {$(this).dialog("close");}}
    });
    $('#selDepto').change(function(){   
        $.ajax({url: '<?php echo base_url('componente2/comp24_E0/getMunicipios') ?>/'+$('#selDepto').val()
        }).done(function(data){$('#mun_id').children().remove();$('#mun_id').html(data);});           
    });
    /**/
    $('#mun_id').change(function(){
        window.location.href = '<?php echo current_url(); ?>/' + $('#mun_id').val();
        $('#Mensajito').hide();
        $("#guardar").show();              
    });
    /*CALCULOS*/
    $('.txtInput').change(function(){cambios();});
    function cambios(){
        $('#per_mun_poblacion').val(function(){
            var t;
            if(isFinite(t=parseInt($('#per_mun_urbana_hombres').val())+parseInt($('#per_mun_urbana_mujeres').val())+parseInt($('#per_mun_rural_hombres').val())+parseInt($('#per_mun_rural_mujeres').val()))){
                return t;
            }else{return '';}
        });
    }
    <?php
    //Muestra los dialogos.
    if($this->session->flashdata('message')=='Ok'){echo "$('#efectivo').dialog('open');";}
    if(isset($mun_id) && $mun_id > 0){echo "formularioShow();";}else{echo "formularioHide();";}
    ?>
});
</script>

<div id="efectivo" class="mensaje" title="Almacenado" style="display: none;">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>
<?php echo form_open() ?>

    <h2 class="h2Titulos"> Condiciones Previas</h2>
    <h2 class="h2Titulos">Perfil del Municipio</h2>
    <br/>
    <div id="rpt_frm_bdy">
        <div id="listaContainer">
            <div class="campo">
                <label>Departamento</label>
                <?php echo form_dropdown('selDepto',$departamentos,'','id="selDepto"'); ?>
            </div>
            <div class="campo">
                <label>Municipio</label>
                <select id='mun_id' name='mun_id'>
                    <option value='0'>--Seleccione--</option>
                </select>
                <?php echo form_error('mun_id'); ?>
            </div>
            <div id="rpt-border"></div>
        </div>
        <div id="formulario" style="display: none;">
            <div class="campo">
                <label>Departamento:</label>
                <input id="depto" name="depto" type="text" readonly="readonly" value="<?php echo set_value('depto') ?>" />
            </div>
            <div class="campo">
                <label>Municipio:</label>
                <input id="muni" name="muni" type="text" readonly="readonly" value="<?php echo set_value('muni') ?>" />
            </div>
            <div class="campo">
                <label>Partido Politico Gobernante</label>
                <input id="per_mun_partido" name="per_mun_partido" type="text" value="<?php echo set_value('per_mun_partido') ?>" />
                <?php echo form_error('per_mun_partido'); ?>
            </div>
            
            <div class="campo">
                <label>Extencion territorial en  KMS<sup>2</sup></label>
                <input id="per_mun_territorio" name="per_mun_territorio" type="text" style="width: 241px; text-align: right; padding-right: 10px;" value="<?php echo set_value('per_mun_territorio') ?>" />
                <?php echo form_error('per_mun_territorio'); ?>
            </div>
            
            <div class="campo">
                <label>Tipologia</label>
                <select id='per_mun_tipologia'>
                    <option value='0'>--Seleccione--</option>
                    <?php
                    for($i=1;$i<5;$i++){
                        echo "<option value='$i'";
                        if(set_value('per_mun_tipologia')==$i){
                            echo ' selected="selected" ';
                        }
                        switch ($i){
                            case 1:
                                echo ">$i-Pobreza Extrema Servera";
                                break;
                             case 2:
                                echo ">$i-Pobreza Extrema Alta";
                                break;
                             case 3:
                                echo ">$i-Pobreza Extrema Moderada";
                                break;
                             case 4:
                                echo ">$i-Pobreza Extrema Baja";
                                break;
                        }
                        echo "\n";
                    }
                     ?>
                </select>
                <?php echo form_error('per_mun_tipologia'); ?>
            </div>
            
            <div class="campo">
                <label>Población</label>
                <table style="margin-left: 213px;">
                <tr>
                	<td></td>
                	<td style="text-align: center;">Hombres</td>
                	<td style="text-align: center;">Mujeres</td>
                </tr>
                <tr>
                	<td>Urbana</td>
                	<td><input class="txtInput" id="per_mun_urbana_hombres" name="per_mun_urbana_hombres" type="text" style="width: 90px; text-align: right; padding-right: 10px;" value="<?php echo set_value('per_mun_urbana_hombres') ?>" />
                        <?php echo form_error('per_mun_urbana_hombres'); ?></td>
                	<td><input class="txtInput" id="per_mun_urbana_mujeres" name="per_mun_urbana_mujeres" type="text" style="width: 90px; text-align: right; padding-right: 10px;" value="<?php echo set_value('per_mun_urbana_mujeres') ?>" />
                        <?php echo form_error('per_mun_urbana_mujeres'); ?></td>
                </tr>
                <tr>
                	<td>Rural</td>
                	<td><input class="txtInput" id="per_mun_rural_hombres" name="per_mun_rural_hombres" type="text" style="width: 90px; text-align: right; padding-right: 10px;" value="<?php echo set_value('per_mun_rural_hombres') ?>" />
                        <?php echo form_error('per_mun_rural_hombres'); ?></td>
                	<td><input class="txtInput" id="per_mun_rural_mujeres" name="per_mun_rural_mujeres" type="text" style="width: 90px; text-align: right; padding-right: 10px;" value="<?php echo set_value('per_mun_rural_mujeres') ?>" />
                        <?php echo form_error('per_mun_rural_mujeres'); ?></td>
                </tr>
                <tr>
                	<td>Total de Población</td>
                	<td colspan="2"><input class="txtInput" id="per_mun_poblacion" name="per_mun_poblacion" type="text" style="width: 150px; text-align: center;" readonly="readonly" value="<?php echo set_value('per_mun_poblacion') ?>" /></td>
                </tr>
                </table>
            </div>
            <div class="campo">
                <label>Observaciones:</label>
                <textarea id="per_mun_observaciones" name="per_mun_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('per_mun_observaciones')?></textarea>
                <?php echo form_error('per_mun_observaciones'); ?>
            </div>       
            <div id="actions" style="position: relative;top: 20px">
                <input type="submit" id="guardar" value="Guardar" />
                <input type="button" id="cancelar" value="Cancelar" />
            </div>
            <input type="hidden" value="modificado" name="mod" id="mod" />
        </div>
    </div>
<?php echo form_close();
$this->load->view('plantilla/footer'); ?>