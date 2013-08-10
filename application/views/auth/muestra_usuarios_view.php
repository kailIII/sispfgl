<script type="text/javascript">
    $(document).ready(function() {
        var myGrid = $('#gestionSolicitud');
        myGrid.jqGrid({
            url: '<?php echo base_url('auth/cargarUsuariosJson'); ?>',
            datatype: 'json',
            altRows: true,
            colNames: ['Id', 'Fecha Solicitud', 'Nombre del solicitante', 'Cargo', 'Teléfono', ''],
            colModel: [
                {name: 'id', index: 'id', width: 20, editable: false, editoptions: {size: 15}},
                {name: 'fecha_solicitud', index: 'fecha_solicitud', align: 'center', width: 150, editable: true, editoptions: {size: 25}},
                {name: 'nombre_solicitante', index: 'nombre_solicitante', width: 300, editable: true, editoptions: {size: 50}},
                {name: 'cargo', index: 'cargo', align: 'center', width: 150, editable: true, editoptions: {size: 50}},
                {name: 'telefono', index: 'telefono', width: 60, editable: true, editoptions: {size: 50}},
                {name: 'act', index: 'act', width: 120, sortable: false}],
            rowNum: 10,
            rowList: [10, 20, 30],
            multiselect: false,
            loadonce: true,
            gridComplete: function() {
                var ids = jQuery("#gestionSolicitud").jqGrid('getDataIDs');
                for (var i = 0; i < ids.length; i++) {
                    var cl = ids[i];
                    if (cl != 0) {
                        ce = "<input style='height:22px;width:60px;' type='submit' value='Editar' onclick=\" $('#idfila').attr('value', '" + cl + "'); this.form.action='<?php echo base_url('componente2/comp23_E0/modificarSolicitudAsistencia') ?>' \" />";
                        jQuery("#gestionSolicitud").jqGrid('setRowData', ids[i], {act: ce});
                    }
                }
            },
            pager: jQuery('#pagergestionSolicitud'),
            viewrecords: true,
            caption: 'Gestión de solicitudes',
            height: "100%"
        });

        myGrid.jqGrid('navGrid', '#pagergestionSolicitud',
                {edit: false, add: false, del: true,
                    beforeRefresh: function() {
                        gestionSolicitud.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
                    }},
        {width: 550, height: 200},
        {width: 550, height: 200},
        {msg: "¿Desea eliminar esta Solicitud?", caption: "Eliminando ",
            align: 'center', reloadAfterSubmit: true,
            processData: "Cargando...", width: 300, height: 150,
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }},
        {multipleSearch: true,
            multipleGroup: true}
        ).hideCol('id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar2() {
            tabla.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
            return[true, '']; //no error
        }
    });
</script>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="seleccion" class="mensaje" title="Aviso de la operación">
    <p>Debe seleccionar un municipio para continuar</p>
</div>