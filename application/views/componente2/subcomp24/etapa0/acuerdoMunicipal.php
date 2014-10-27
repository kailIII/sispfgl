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
            }).done(function(data) {
                $('#mun_id').children().remove();
                $('#mun_id').html(data);
            });
        });
        /**/
        $('#mun_id').change(function() {
            window.location.href = '<?php echo current_url(); ?>/' + $('#mun_id').val();
        });

        /*PARA EL DATEPICKER*/
        $("#acu_mun_fecha_conformacion").datepicker({
            showOn: 'both',
            maxDate: '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd/mm/yy',
            onClose: function(selectedDate) {
                $("#acu_mun_fecha_acuerdo").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#acu_mun_fecha_acuerdo").datepicker({
            showOn: 'both',
            maxDate: '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd/mm/yy',
            onClose: function(selectedDate) {
                $("#acu_mun_fecha_recepcion").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#acu_mun_fecha_recepcion").datepicker({
            showOn: 'both',
            maxDate: '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/

        /*GRID*/
        $("#miembros").jqGrid({
            url: '<?php echo base_url('componente2/comp24_E0/acuMun_loadMiembros') . '/' . $acu_mun_id; ?>',
            editurl: '<?php echo base_url('componente2/comp24_E0/acuMun_gestionMiembros') . '/' . $acu_mun_id; ?>',
            datatype: 'json',
            altRows: true,
            gridview: true,
            hidegrid: false,
            colNames: ['id', 'Padre', 'Nombres', 'Apellidos', 'Sexo', 'Edad', 'Cargo', 'Nivel de Escolaridad', 'Telefono'],
            colModel: [
                {name: 'mie_id', index: 'mie_id', width: 40, editable: false, editoptions: {size: 15}, hidden: true},
                {name: 'acu_mun_id', index: 'acu_mun_id', width: 40, editable: false, editoptions: {size: 15}, hidden: true},
                {name: 'mie_nombre', index: 'mie_nombre', width: 150, editable: true,
                    edittype: 'text', editoptions: {size: 20, maxlength: 50},
                    editrules: {required: true}},
                {name: 'mie_apellidos', index: 'mie_apellidos', width: 150, editable: true,
                    edittypr: 'text', editoptions: {size: 20, maxlength: 50},
                    editrules: {required: true}},
                {name: 'mie_sexo', index: 'mie_sexo', width: 90, editable: true,
                    edittype: 'select', formatter: 'select', editoptions: {value: 'M:Masculino;F:Femenino'},
                    editrules: {required: true}},
                {name: 'mie_edad', index: 'mie_edad', width: 60, editable: true, align: 'center',
                    edittype: 'text', editoptions: {size: 5, maxlength: 2},
                    editrules: {required: true, number: true, minValue: 0, maxValue: 100}},
                {name: 'mie_cargo', index: 'mie_cargo', width: 150, editable: true, editoptions: {size: 30},
                    edittype: 'text', editoptions:{size: 20, maxlength: 50},
                    editrules: {required: false}},
                {name: 'mie_nivel', index: 'mie_nivel', width: 150, editable: true, editoptions: {size: 30},
                    edittype: 'text', editoptions:{size: 20, maxlength: 50},
                    editrules: {}},
                {name: 'mie_telefono', index: 'mie_telefono', width: 80, editable: true, editoptions: {size: 8}, align: 'center',
                    edittype: 'text', editoptions:{size: 10, maxlength: 9, dataInit: function(el) {
                            $(el).mask("9999-9999", {placeholder: " "});
                        }}
                }
            ],
            multiselect: false,
            caption: "Miembros de la Comisión Financiera Municipal",
            rowNum: 10,
            rowList: [10, 20, 30],
            loadonce: true,
            pager: jQuery('#pagerMiembros'),
            viewrecords: true,
            gridComplete:
                    function() {
                        $.getJSON('<?php echo base_url('componente2/comp24_E0/count_sexo/acumun_miembros/mie_sexo') ?>/acu_mun_id/<?php echo $acu_mun_id; ?>',
                                function(data) {
                                    $('#total').val(data['total']);
                                    $('#mujeres').val(data['female']);
                                    $('#hombres').val(data['male']);
                                });
                    }
        });
        $("#miembros").jqGrid('navGrid', '#pagerMiembros',
                {edit: false, add: false, del: true, search: false, refresh: false,
                    beforeRefresh: function() {
                        tabla.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
                    }
                }
        );
        $("#miembros").jqGrid('inlineNav', "#pagerMiembros");
        // Funcion para regargar los JQGRID luego de agregar y editar
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
            return[true, '']; //no error
        }
        /*desabilitado para activas completar comentario de esta linea y retirar display:none; del elemento *
         var jqLista = $('#lista');
         jqLista.jqGrid({
         url: '<?php echo base_url('componente2/comp24_E0/getAcuerdosMunicipales/'); ?>/' + $('#mun_id').val(),
         datatype: "json",
         width: 300,
         colNames:['Id','Fecha'],
         colModel:[
         {name:'id',index:'id', width:55},
         {name:'acu_mun_fecha_acuerdo',index:'acu_mun_fecha_acuerdo', width:90}		
         ],
         rowNum:10,
         rowList:[10,20,30],
         pager: '#pagerLista',
         sortname: 'id',
         viewrecords: true,
         sortorder: "desc",
         caption:"Acuerdos Municipales",
         ondblClickRow: function(rowid, iRow, iCol, e){
         window.location.href='<?php echo current_url(); ?>/' + rowid;
         }
         });
         /**/

        /**/
        var download_path = '<?php $t = set_value('acu_mun_archivo_acuerdo');if ($t != '') {echo base_url($t);} ?>';
        if (download_path == '') {
            $('#btn_download').hide();
        }
        $('#btn_upload').button();
        $('#btn_download').button().click(function(e) {
            if (download_path != '') {
                e.preventDefault();  //stop the browser from following
                window.location.href = download_path;
            }
        });
        new AjaxUpload('#btn_upload', {
            action: '<?php echo base_url('componente2/comp24_E0/uploadFile') . '/acuerdo_municipal2/acu_mun_archivo_acuerdo/acu_mun_id/' . $acu_mun_id; ?>',
            onSubmit: function(file, ext) {
                if (!(ext && /^(pdf|doc|docx)$/.test(ext))) {
                    $('#vineta').html('<span class="error">Extension no Permitida</span>');
                    return false;
                } else {
                    $('#vineta').html('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response, ext) {
                if (response != 'error') {
                    $('#vineta').html('Ok');
                    this.enable();
                    download_path = response;
                    $('#btn_download').show();
                } else {
                    $('#vineta').html('<span class="error">Error</span>');
                    this.enable();

                }/**/
            }
        });
            <?php
            //Muestra los dialogos.
            if ($this->session->flashdata('message') == 'Ok') {
                echo "$('#efectivo').dialog('open');";
            }
            if (isset($acu_mun_id) && $acu_mun_id > 0) {
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

<?php echo form_open('', array('id' => 'frm_acuerdo_municipal2')) ?>

<h2 class="h2Titulos"> Condiciones Previas</h2>
<h2 class="h2Titulos">Acuerdo Municipal</h2>
<br/>
<div id="rpt_frm_bdy">
    <div id="listaContainer">
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
        <div style="margin-left: 300px;display: none;">
            <table id="lista"></table>
            <div id="pagerLista"></div>
            <div id="btn_acuerdo_nuevo">Crear Nuevo</div>
        </div>
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
            <label>Fecha de conformación de comisión municipal:</label>
            <input id="acu_mun_fecha_conformacion" name="acu_mun_fecha_conformacion" type="text" readonly="readonly" value="<?php echo set_value('acu_mun_fecha_conformacion') ?>"/>
<?php echo form_error('acu_mun_fecha_conformacion'); ?>
        </div>
        <div class="campo">
            <label>Fecha de acuerdo municipal:</label>
            <input id="acu_mun_fecha_acuerdo" name="acu_mun_fecha_acuerdo" type="text" readonly="readonly" value="<?php echo set_value('acu_mun_fecha_acuerdo') ?>"/>
<?php echo form_error('acu_mun_fecha_acuerdo'); ?>
        </div>
        <div class="campo">
            <label>Fecha de recepción de acuerdo municipal:</label>
            <input id="acu_mun_fecha_recepcion" name="acu_mun_fecha_recepcion" type="text" readonly="readonly" value="<?php echo set_value('acu_mun_fecha_recepcion') ?>"/>
<?php echo form_error('acu_mun_fecha_recepcion'); ?>
        </div>
        <div class="tabla">
            <label></label>
            <table id="miembros"></table>
            <div id="pagerMiembros"></div>
        </div>
        <div class="campo">
            <label>Cantidad de Participantes:</label>
            <span>Hombres</span>
            <input id="hombres" name="count_male" readonly="" style="width: 50px; text-align: center;" value="0" />
            <span>Mujeres</span>
            <input id="mujeres" name="count_female" readonly="" style="width: 50px; text-align: center;" value="0" />
            <span>Total</span>
            <input id="total" name="count_female" readonly="" style="width: 50px; text-align: center;" value="0" />
        </div>
        <div style="width: 100%;">
            <div style="width: 50%; display: inline-block;">
                <div class="campoUp">
                    <label style="text-align: left;">Observaciones:</label>
                    <textarea id="acu_mun_observaciones" name="acu_mun_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('acu_mun_observaciones') ?></textarea>
<?php echo form_error('acu_mun_observaciones'); ?>
                </div>
            </div>
            <div class="campoUp" style="display: inline-block;">
                <label>Cargar archivo:</label>
                <div id="fileUpload" style="margin-left: 20px;">
                    <div id="btn_upload" style="display: inline-block;">Subir Acuerdo</div>
                    <a id="btn_download" href="#" style="display: inline-block;">Descargar</a>
                    <div id="vineta" style="display: inline-block;"></div>
                    <div class="uploadText" style="width: 300px;">Para actualizar un archivo basta con subir nuevamente el archivo y este se reemplaza automáticamente. Solo se permiten archivos con extensión pdf, doc, docx</div>
                </div>
            </div>
        </div>
        <input id="acu_mun_archivo_acuerdo" name="acu_mun_archivo_acuerdo" value="<?php echo set_value('acu_mun_archivo_acuerdo') ?>" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
        <div id="actions" style="position: relative;top: 20px">
            <input type="submit" id="guardar" value="Guardar" />
            <input type="button" id="cancelar" value="Cancelar" />
        </div>
        <input type="hidden" value="modificado" name="mod" id="mod" />
    </div>
</div>
<?php echo form_close();
$this->load->view('plantilla/footer');
?>