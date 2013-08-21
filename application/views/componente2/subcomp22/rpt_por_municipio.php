<?php

/**
 * 
 * 
 * @author Alexis Beltran
 */

$this->load->view('plantilla/header', $titulo);
$this->load->view('plantilla/menu', $menu);

?>
<link href="<?php echo base_url('resource/css/jquery.dataTables.css'); ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url('resource/js/jquery.dataTables.min.js'); ?>" type="text/javascript"></script>
<style type="text/css">
.rpt_title { display: block; font-size: larger; font-weight: bolder; }
.rpt_body { display: block; margin: 15px;  }
</style>
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
        window.location.href = '<?php echo base_url('componente2/comp22/rpt_por_municipio/'); ?>/' + $('#mun_id').val();
    });
            
    /*PARA EL DATEPICKER*/
    $( "#cap_fecha_ini" ).datepicker({
        showOn: 'both',
        //maxDate:    '+1D',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd/mm/yy'
    });
    /*FIN DEL DATEPICKER*/
    
    $("#rpt_data, #rpt_data2").dataTable({
        "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ registros por pagina",
            "sZeroRecords": "No se encontraron registros.",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
            "sInfoFiltered": "(filtered from _MAX_ total records)"
        }
    });
    
    /**/
    <?php
    //Muestra los dialogos.
    if($this->session->flashdata('message')=='Ok'){echo "$('#efectivo').dialog('open');";}
    //if(isset($tabla_id) && $tabla_id > 0){echo "formularioShow();";}else{echo "formularioHide();";}
    ?>
});
</script>

<div id="efectivo" class="mensaje" title="Almacenado" style="display: none;">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>

<?php echo form_open('',array('id'=>'frm_acuerdo_municipal2')) ?>

    <h2 class="h2Titulos">Capacitaciones</h2>
    <h2 class="h2Titulos">Resultados de Procesos de Formación</h2>
    <br/>
    <div id="rpt_frm_bdy">
        <div id="formulario">
            <div class="rpt_title">Participantes Por Municipio</div>
            <div class="campo">
                <label>Departamento</label>
                <?php echo form_dropdown('selDepto', $departamentos, '', 'id="selDepto"'); ?>
            </div>
            <div class="campo">
                <label>Municipio</label>
                <select id='mun_id' name='mun_id'>
                    <option value='0'>--Seleccione--</option>
                </select>
                <?php echo form_error('mun_id'); ?>
            </div>
            <div class="rpt_body">
                <table id="rpt_data">
                    <thead>
                    <tr>
                        <th>Proceso</th>
                        <th>Descripción</th>
                        <th>Hombres</th>
                        <th>Mujeres</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $h = $m = $t = 0;
                    foreach($data as $row): ?>
                    <tr>
                        <td><?php echo $row->proceso; ?></td>
                        <td><?php echo $row->desc; ?></td>
                        <td><?php $h += $row->hombres; echo $row->hombres; ?></td>
                        <td><?php $m += $row->mujeres; echo $row->mujeres; ?></td>
                        <td><?php $t += $row->total;   echo $row->total; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <br /><br /><br />
                <table style="border: 1px solid black;">
                    <tr>
                        <th  style="width: 100px;" rowspan="2">Totales</th>
                        <th style="width: 100px;">Hombres</th>
                        <th style="width: 100px;">Mujeres</th>
                        <th style="width: 100px;">Total</th>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><?php echo $h; ?></td>
                        <td style="text-align: center;"><?php echo $m; ?></td>
                        <td style="text-align: center;"><?php echo $t; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php echo form_close();
$this->load->view('plantilla/footer'); ?>