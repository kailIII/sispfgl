<script type="text/javascript">
    $(document).ready(function() {
        /*desabilitado para activas completar comentario de esta linea y retirar display:none; del elemento */
        var jqLista = $('#lista');
        jqLista.jqGrid({
            url: '<?php echo base_url('poa/seguimiento/cargarComponentes'); ?>',
            datatype: "json",
            colNames: ['Id', 'Código', 'Componente'],
            colModel: [
                {name: 'poa_com_id', index: 'poa_com_id', width: 55},
                {name: 'poa_com_codigo', index: 'poa_com_codigo', width: 70, align: 'center'},
                {name: 'poa_com_descripcion', index: 'poa_com_descripcion', width: 800}
            ],
            rowNum: 10,
            rowList: [10, 20, 30],
            pager: '#pagerLista',
            sortname: 'id',
            viewrecords: true,
            sortorder: "asc",
            multiselect: false,
            loadonce: true,
            height: "100%",
            caption: "Gestión Componentes",
            subGrid: true,
            subGridRowExpanded: function(subgrid_id, row_id) {
                // here we can easy construct the following
                var subgrid_table_id;
                subgrid_table_id = subgrid_id + "_t";
                jQuery("#" + subgrid_id).html("<table id='" + subgrid_table_id + "' class='scroll'></table>");
                jQuery("#" + subgrid_table_id).jqGrid({
                    url: '<?php echo base_url('poa/seguimiento/cargarSubComponentes'); ?>/' + row_id,
                    datatype: "json",
                    colNames: ['Id', 'Código', 'Componente','Acciones'],
                    colModel: [
                        {name: 'h_poa_com_id', index: 'h_poa_com_id', width: 55},
                        {name: 'h_poa_com_codigo', index: 'h_poa_com_codigo', width: 70, align: 'center'},
                        {name: 'h_poa_com_descripcion', index: 'h_poa_com_descripcion', width: 700},
                        {name: 'act', index: 'act', width: 70, sortable: false}
                    ],
                    height: '100%',
                    rowNum: 20,
                    gridComplete: function() {
                        var ids = jQuery("#"+subgrid_table_id).jqGrid('getDataIDs');
                        for (var i = 0; i < ids.length; i++) {
                            var cl = ids[i];
                            if (cl != 0) {
                                ce = "<input type='button' value='Editar' onclick=\"alert("+cl+") \" />";
                                jQuery("#"+subgrid_table_id).jqGrid('setRowData', ids[i], {act: ce});
                            }
                        }
                    },
                }).hideCol(['h_poa_com_id']);
            }
        }).hideCol(['poa_com_id']);

        jqLista.jqGrid('navGrid', '#pagerLista',
                {edit: false, add: false, del: false, refresh: false, search: true,
                    beforeRefresh: function() {
                        jqLista.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
                    }
                }
        );

        $("#editar").button().click(function() {
            var gr = jqLista.jqGrid('getGridParam', 'selrow');
            if (gr != null)
                document.location.href = '<?php echo base_url('poa/seguimiento/gestionarComponente'); ?>/' + jqLista.jqGrid('getGridParam', 'selrow');
            else
                $('#mensaje2').dialog('open');

        });
        $("#subcomponente").button().click(function() {
            var gr = jqLista.jqGrid('getGridParam', 'selrow');
            if (gr != null)
                document.location.href = '<?php echo base_url('poa/seguimiento/agregarSubcomponente'); ?>/' + jqLista.jqGrid('getGridParam', 'selrow');
            else
                $('#mensaje2').dialog('open');

        });
        $("#agregar").button().click(function() {
            document.location.href = '<?php echo base_url('poa/seguimiento/gestionarComponente'); ?>';
        });
        $('.mensaje').dialog({autoOpen: false, width: 300,
            buttons: {"Ok": function() {
                    $(this).dialog("close");
                }}
        });
        /*
         $("#eliminar").button().click(function() {
         var gr = jqLista.jqGrid('getGridParam', 'selrow');
         if (gr != null) {
         $.getJSON('<?php echo base_url('componente2/comp22/eliminarCapacitacion'); ?>/' + jQuery("#lista").jqGrid('getGridParam', 'selrow'),
         function(data) {
         var i = 0;
         $.each(data, function(key, val) {
         if (key == 'rows') {
         $.each(val, function(id, registro) {
         if (registro['cell'][1] == 0) {
         $('#mensaje1').dialog('open');
         jqLista.setGridParam({
         url: '<?php echo base_url('componente2/comp22/loadCapacitaciones/'); ?>/',
         datatype: "json"
         }).trigger("reloadGrid");
         } else {
         $('#mensaje3').dialog('open');
         }
         });
         }
         });
         });
         }
         else
         $('#mensaje2').dialog('open');
         });*/
    });
</script>


<center>
    <h2 class="h2Titulos">Planificación Operativa Anual</h2>
    <h2 class="h2Titulos">Gestión de Información General de los componentes</h2>
    <br/>
    <table id="lista"></table>
    <div id="pagerLista"></div>
    <br/><br/>
    <div id="agregar">Agregar</div>
    <div id="editar">Editar</div>
    <div id="subcomponente">Agregar Subcomponente</div>
</center>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>
<div id="mensaje1" class="mensaje" title="Eliminación">
    <p>Eliminado Correctamente</p>
</div>
<div id="mensaje3" class="mensaje" title="Eliminación">
    <p>No se puede eliminar porque tiene personas Inscritas</p>
    <p>Si desea eliminar este proceso debe realizar las siguientes acciones:</p>
    <ul>
        <li>Desincribir a las personas inscritas</li>
        <li>Regresar a esta pantalla y eliminar el proceso</li>
    </ul>
</div>