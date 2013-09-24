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
            formularioShow();
            //$('#frm').submit();
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
        $("#cap_fecha_ini").datepicker({
            showOn: 'both',
            //maxDate:    '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/

        /*desabilitado para activas completar comentario de esta linea y retirar display:none; del elemento */
        var jqLista = $('#lista');
        jqLista.jqGrid({
            url: '<?php echo base_url('componente2/comp22/loadCapacitaciones/'); ?>/', // + $('#mun_id').val(),
            datatype: "json",
            height: 300,
            colNames: ['Id', 'Proceso', 'Nombre/Tema', 'Fecha','Archivo'],
            colModel: [
                {name: 'id', index: 'id', width: 55},
                {name: 'cap_proceso', index: 'cap_proceso', width: 150},
                {name: 'cap_nombre', index: 'cap_nombre', width: 200},
                {name: 'cap_fecha', index: 'cap_fecha', width: 100},
                {name: 'Subcategory', formatter: 'showlink', formatoptions: {baseLinkUrl: '#'}}
            ],
            rowNum: 10,
            rowList: [10, 20, 30],
            pager: '#pagerLista',
            sortname: 'id',
            viewrecords: true,
            sortorder: "desc",
            caption: "Capacitaciones",
            ondblClickRow: function(rowid, iRow, iCol, e) {
                window.location.href = '<?php echo current_url(); ?>/' + rowid;
            },
            loadComplete: function() {
                var ids = jqLista.getDataIDs();
                for (var i = 0, idCount = ids.length; i < idCount; i++) {
                    $("#" + ids[i] + " a", jqLista[0]).click(function(e) {
                        var hash = e.currentTarget.hash;// string like "#?id=0"
                        if (hash.substring(0, 5) === '#?id=') {
                            var id = hash.substring(5, hash.length);
                            var text = this.textContent || this.innerText;
                            alert("clicked the row with id='" + id + "'. Link contain '" + text + "'");
                            location.href = "http://en.wikipedia.org/wiki/" + text;
                        }
                        e.preventDefault();
                    });
                }
            }
        });
        /**/

        /**/
        var download_path = '<?php
$t = set_value('cap_archivo');
if ($t != '') {
    echo base_url($t);
}
?>';
        if (download_path == '') {
            $('#btn_download').hide();
        }
        $('#btn_upload').button();
        $('#btn_download').button().click(function(e) {
            if (download_path != '') {
                e.preventDefault();  //stop the browser from following
                //window.location.href = download_path;
                window.open(download_path, "", ",height=500,width=400")
            }
        });
        new AjaxUpload('#btn_upload', {
            action: '<?php echo base_url('componente2/comp24_E0/uploadFile') . "/c22_capacitaciones/cap_archivo/cap_id/$tabla_id"; ?>',
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

                }
            }
        });/**/
<?php
//Muestra los dialogos.
if ($this->session->flashdata('message') == 'Ok') {
    echo "$('#efectivo').dialog('open');";
}
if (isset($tabla_id) && $tabla_id != 0) {
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

<h2 class="h2Titulos">Capacitaciones</h2>
<h2 class="h2Titulos">Registro de Procesos de Formación</h2>
<br/>
<div id="rpt_frm_bdy">
    <div id="listaContainer">
        <div id="rpt-border"></div>
        <div style="margin-left: 200px;">
            <table id="lista"></table>
            <div id="pagerLista"></div>
            <div id="btn_seleccionar">Seleccionar</div>
            <div id="btn_acuerdo_nuevo">Crear Nuevo</div>
        </div>
    </div>
    <div id="formulario" style="display: none;">
        <div class="campo">
            <label>Capacitación Id:</label>
            <input id="cap_id" name="cap_id" type="text" readonly="readonly" value="<?php echo set_value('cap_id') ?>"/>
            <?php echo form_error('cap_id'); ?>
        </div>
        <div class="campo">
            <label>No. Proceso de Formación:</label>
            <input id="cap_proceso" name="cap_proceso" type="text" value="<?php echo set_value('cap_proceso') ?>"/>
            <?php echo form_error('cap_proceso'); ?>
        </div>
        <div class="campo">
            <label>Area de Capacitación o Tema:</label>
            <input id="cap_area" name="cap_area" type="text" value="<?php echo set_value('cap_area') ?>"/>
            <?php echo form_error('cap_area'); ?>
        </div>
        <div class="campo">
            <label>Nombre de la Sede:</label>
            <input id="cap_sede" name="cap_sede" type="text" value="<?php echo set_value('cap_sede') ?>"/>
            <?php echo form_error('cap_sede'); ?>
            <?php //echo form_dropdown('sed_id',$cap_sede,set_value('sed_id','0')); echo form_error('sed_id');   ?>
        </div>
        <div class="campo">
            <label>Modalidad del proceso:</label>
            <?php
            echo form_dropdown('mod_id', $cap_modalidad, set_value('mod_id', '0'));
            echo form_error('mod_id');
            ?>
        </div>
        <div class="campo">
            <label>Nombre del Capacitación:</label>
            <input id="cap_nombre" name="cap_nombre" type="text" value="<?php echo set_value('cap_nombre') ?>"/>
            <?php echo form_error('cap_nombre'); ?>
        </div>
        <div class="campo">
            <label>Entidad Capacitadora:</label>
            <input id="cap_entidad" name="cap_entidad" type="text" value="<?php echo set_value('cap_entidad') ?>"/>
            <?php echo form_error('cap_entidad'); ?>
        </div>
        <div class="campo">
            <label>Nivel al que va dirigido:</label>
            <?php
            $cap_nivel = array(
                '0' => 'Seleccione',
                'Dirección' => 'Dirección',
                'Administrativo' => 'Administrativo',
                'Técnico' => 'Técnico',
                'Operativo' => 'Operativo',
            );
            echo form_dropdown('cap_nivel', $cap_nivel, set_value('cap_nivel', '0'));
            echo form_error('cap_nivel');
            ?>
        </div>
        <div class="campo">
            <label>Nombre del Facilitador:</label>
            <input id="cap_facilitador" name="cap_facilitador" type="text" value="<?php echo set_value('cap_facilitador') ?>"/>
            <?php echo form_error('cap_facilitador'); ?>
        </div>
        <div class="campo">
            <label>Fecha de Inicio:</label>
            <input id="cap_fecha_ini" name="cap_fecha_ini" type="text" value="<?php echo set_value('cap_fecha_ini') ?>"/>
            <?php echo form_error('cap_fecha_ini'); ?>
        </div>
        <div class="campo">
            <label>Duración:</label>
            <input id="cap_duracion" name="cap_duracion" type="text" value="<?php echo set_value('cap_duracion') ?>" style="width: 145px;"/>
            <?php
            $cap_duracion = array(
                '0' => 'Seleccione',
                'Años' => 'Años',
                'Meses' => 'Meses',
                'Semanas' => 'Semanas',
                'Días' => 'Días',
                'Horas' => 'Horas'
            );
            echo form_dropdown('cap_duracion_tipo', $cap_duracion, set_value('cap_duracion_tipo', '0'), 'style="width: 100px;"');
            echo form_error('cap_duracion');
            ?>
        </div>
        <div class="campo">
            <label>Descripción:</label>
            <textarea id="cap_descripcion" name="cap_descripcion" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('cap_descripcion') ?></textarea>
            <?php echo form_error('cap_descripcion'); ?>
        </div>
        <div style="width: 100%;">
            <div style="width: 50%; display: inline-block;">
                <div class="campoUp">
                    <label style="text-align: left;">Observaciones:</label>
                    <textarea id="cap_observaciones" name="cap_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('cap_observaciones') ?></textarea>
                    <?php echo form_error('cap_observaciones'); ?>
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
        <input id="archivo" name="archivo" value="<?php echo set_value('archivo') ?>" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
        <div id="actions" style="position: relative;top: 20px">
            <input type="submit" id="guardar" value="Guardar" />
            <input type="button" id="cancelar" value="Cancelar" />
        </div>
        <input type="hidden" value="modificado" name="mod" id="mod" />
    </div>
</div>
<?php
echo form_close();
$this->load->view('plantilla/footer');
?>