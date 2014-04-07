<script type="text/javascript">
    $(document).ready(function() {
        $("#guardar").button().click(function() {
            $("#componenteForm").submit(function(event) {
                if ($("#componenteForm").validate().form() == true) {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url($ruta . 'guardarComponente') ?>',
                        data: $("#componenteForm").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $('#efectivo').dialog('open');
                            $("#regresar").show();
                            $("#cancelar").hide();
                        }
                    });
                    return false;
                }
            });
        });
        $('#componenteForm').validate({
            rules: {
                poa_com_descripcion: {
                    required: true
                }
            }
        });
        $("#cancelar").button().click(function() {
            document.location.href = '<?php echo base_url($ruta . 'borrarComponente') . '/'; ?>' + $('#poa_com_id').val();
        });
        $("#regresar").button().click(function() {
            document.location.href = '<?php echo base_url($ruta . 'informacionComponente'); ?>';
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

        var tabla = $("#poa_indicador");
        tabla.jqGrid({
            url: '<?php echo base_url($ruta . 'cargarIndicadores'); ?>/5/'+ $('#poa_com_id').val(),
            editurl: '<?php echo base_url($ruta . 'gestionarIndicadores'); ?>/5/' + $('#poa_com_id').val(),
            datatype: 'json',
            altRows: true,
            height: "100%",
            hidegrid: false,
            colNames: ['id', 'Correlativo', 'Indicador'],
            colModel: [
                {name: 'poa_ind_id', index: 'poa_ind_id', width: 55, editable: false},
                {name: 'correlativo', index: 'correlativo', width: 70, align: 'center', editable: false},
                {name: 'poa_ind_descripcion', index: 'poa_ind_descripcion', width: 800, editable: true,
                    edittype: "textarea", editoptions: {rows: "4", cols: "50"},
                    formoptions: {label: "Indicador", elmprefix: "(*)"},
                    editrules: {required: true}
                }
            ],
            multiselect: false,
            caption: "Indicador de logro a los 5 años:",
            rowNum: 10,
            rowList: [10, 20, 30],
            loadonce: true,
            pager: jQuery('#poa_indicadorPager'),
            viewrecords: true
        }).jqGrid('navGrid', '#poa_indicadorPager',
                {edit: true, add: true, del: true, search: true, refresh: false,
                    beforeRefresh: function() {
                        tabla.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
                    }
                }, //OPCIONES
        {closeAfterEdit: true, editCaption: "Editando Indicador",width:650,
            align: 'center', reloadAfterSubmit: true,
            processData: "Cargando...", afterSubmit: despuesAgregarEditar,
            bottominfo: "Campos marcados con (*) son obligatorios",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        }, //EDITAR
        {closeAfterAdd: true, addCaption: "Agregar Indicador",width:650,
            align: 'center', reloadAfterSubmit: true,
            processData: "Cargando...", afterSubmit: despuesAgregarEditar,
            bottominfo: "Campos marcados con (*) son obligatorios",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        }, //AGREGAR
        {msg: "¿Desea Eliminar este Indicador?", caption: "Eliminando....",
            align: 'center', reloadAfterSubmit: true, processData: "Cargando...",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        }//ELIMINAR
        ).hideCol('poa_ind_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
            return[true, '']; //no error
        }

        var tabla2 = $("#poa_indicador2");
        tabla2.jqGrid({
            url: '<?php echo base_url($ruta . 'cargarIndicadores'); ?>/2/'+ $('#poa_com_id').val(),
            editurl: '<?php echo base_url($ruta . 'gestionarIndicadores'); ?>/2/' + $('#poa_com_id').val(),
            datatype: 'json',
            altRows: true,
            height: "100%",
            hidegrid: false,
            colNames: ['id', 'Correlativo', 'Indicador'],
            colModel: [
                {name: 'poa_ind_id', index: 'poa_ind_id', width: 55, editable: false},
                {name: 'correlativo', index: 'correlativo', width: 70, align: 'center', editable: false},
                {name: 'poa_ind_descripcion', index: 'poa_ind_descripcion', width: 800, editable: true,
                    edittype: "textarea", editoptions: {rows: "4", cols: "50"},
                    formoptions: {label: "Indicador", elmprefix: "(*)"},
                    editrules: {required: true}
                }
            ],
            multiselect: false,
            caption: "Indicador de avance al segundo año:",
            rowNum: 10,
            rowList: [10, 20, 30],
            loadonce: true,
            pager: jQuery('#poa_indicador2Pager'),
            viewrecords: true
        }).jqGrid('navGrid', '#poa_indicador2Pager',
                {edit: true, add: true, del: true, search: true, refresh: false,
                    beforeRefresh: function() {
                        tabla.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
                    }
                },//OPCIONES
        {closeAfterEdit:true,editCaption: "Editando Indicador",width:650,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar2,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }    
        },//EDITAR
        {closeAfterAdd:true,addCaption: "Agregar Indicador",width:650,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar2,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        },//AGREGAR
        {msg: "¿Desea Eliminar este Indicador?",caption:"Eliminando....",
            align:'center',reloadAfterSubmit:true,processData: "Cargando...",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');                            
            }
        }//ELIMINAR
        ).hideCol('poa_ind_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar2() {
            tabla2.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
            return[true, '']; //no error
        }

<?php
if (is_null($poa_com_descripcion))
    echo '$("#regresar").hide();';
else
    echo '$("#cancelar").hide();';
?>

    });
</script>
<center>
    <h2 class="h2Titulos">Planificación Operativa Anual</h2>
    <h2 class="h2Titulos">Gestión de Información General de los componentes</h2>
    <br/>
</center>
<form id="componenteForm" method="post">
    <div id="rpt_frm_bdy">
        <div class="campo">
            <p>Este código es sugerido, usted puede modificarlo si lo desea</p>
            <label>Código:</label>
            <input type="text" id="poa_com_codigo" name="poa_com_codigo" value="<?php echo $poa_com_codigo; ?>" style="width: 60px; margin-top: 5px;" />
            
        </div>
        <div class="campo">
            <label>Componente:</label>
            <textarea id="poa_comp_padre" name="poa_comp_padre" readonly="readonly" cols="30" rows="5" wrap="virtual"><?php echo $poa_comp_padre; ?></textarea>
        </div>
        <div class="campo">
            <label>SubComponente:</label>
            <textarea id="poa_com_descripcion" name="poa_com_descripcion" cols="30" rows="5" wrap="virtual"><?php echo $poa_com_descripcion; ?></textarea>
        </div>
         <div class="campo">
            <p>Las siguientes opciones solo se deben introducir si son necesarias para el Subcomponente de lo
            contrario en el reporte aparecerán las definidas para el componente al que pertenecen. </p>
        </div>
        <div class="campo">
            <label>Objetivo específico al que aporta:</label>
            <textarea id="poa_com_objetivo" name="poa_com_objetivo" cols="30" rows="5" wrap="virtual"><?php echo $poa_com_objetivo; ?></textarea>
        </div>
        <div class="campo">
            <label>Resultado estratégico al que aporta:</label>
            <textarea id="poa_com_resultado" name="poa_com_resultado" cols="30" rows="5" wrap="virtual"><?php echo $poa_com_resultado; ?></textarea>
        </div>
        <center style="position: relative;top: 20px">
            <input type="submit" id="guardar" value="Guardar" />
            <input type="button" id="regresar" value="Regresar" />
            <input type="button" id="cancelar" value="Cancelar" />
        </center>
        <center style="position: relative;top: 30px">
            <table id="poa_indicador"></table>
            <div id="poa_indicadorPager"></div>
        </center>
        <center style="position: relative;top: 50px">
            <table id="poa_indicador2"></table>
            <div id="poa_indicador2Pager"></div>
            <br/>
            <br/>
        </center>
    </div>
    <input type="text" id="poa_com_id" name="poa_com_id" hidden="hidden"  value="<?php echo $poa_com_id; ?>" />
</form>
<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>