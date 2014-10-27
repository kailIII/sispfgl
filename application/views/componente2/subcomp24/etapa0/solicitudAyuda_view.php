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
    $(document).ready(function() {
        /*BASICO*/
        function formularioHide() {
            $('#listaContainer').show();
            $('#formulario').hide()
        }
        function formularioShow() {
            $('#listaContainer').hide();
            $('#formulario').show()
        }
        $("#guardar").button();
        $("#btn_acuerdo_nuevo").button().click(function() {
            $('#frm').submit();
        });
        $("#btn_delete").button();
        $("#btn_seleccionar").button().click(function() {
            document.location.href = '<?php echo current_url(); ?>/' + jQuery("#lista").jqGrid('getGridParam', 'selrow');
        });
        $("#cancelar").button().click(function() {
            document.location.href = '<?php echo base_url(); ?>';
        });
        $('.mensaje').dialog({autoOpen: false, width: 300,
            buttons: {"Ok": function() {
                    $(this).dialog("close");
                }}
        });
        $('#selDepto').change(function() {
            $.ajax({url: '<?php echo base_url('componente2/comp24_E0/getMunicipios') ?>/' + $('#selDepto').val()
            }).done(function(data) {$('#mun_id').children().remove();$('#mun_id').html(data);});
        });
     
       
        
        /*PARA EL DATEPICKER*/
        $("#f_emision").datepicker({
            showOn: 'both',
            maxDate: '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd/mm/yy'
          /*  onClose: function(selectedDate) {
                $("#f_emision").datepicker("option", "minDate", selectedDate);
            }*/
        });
        $("#f_recepcion").datepicker({
            showOn: 'both',
            maxDate: '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd/mm/yy'
        });
<?php
//Muestra los dialogos.
if ($this->session->flashdata('message') == 'Ok') {
    echo "$('#efectivo').dialog('open');";
}
if (isset($mun_id) && $mun_id > 0) {
    echo "formularioShow();";
} else {
    echo "formularioHide();";
}
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
<h2 class="h2Titulos">Registro de Solicitudes</h2>
<br/>
<div id="rpt_frm_bdy">
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
    <div id="rpt-border"></div>
    <div class="campo">
        <label>Fecha de emisión de solicitud:</label>
        <input id="f_emision" name="f_emision" type="text"  value="<?php echo set_value('f_emision') ?>"/>
<?php echo form_error('f_emision'); ?>
    </div>
    <div class="campo">
        <label>Fecha de recepción de solicitud:</label>
        <input id="f_recepcion" name="f_recepcion" type="text"  value="<?php echo set_value('f_recepcion') ?>"/>
<?php echo form_error('f_recepcion'); ?>
    </div>

    <div id="actions" style="position: relative;top: 20px">
        <input type="submit" id="guardar" value="Guardar" />
        <input type="button" id="cancelar" value="Cancelar" />
    </div>
</div>
<?php echo form_close();
$this->load->view('plantilla/footer');
?>