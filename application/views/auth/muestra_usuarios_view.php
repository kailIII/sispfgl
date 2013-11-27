<script type="text/javascript">
    $(document).ready(function() {
        var myGrid = $('#cargarUsuarios');
        myGrid.jqGrid({
            url: '<?php echo base_url('auth/cargarUsuariosJson'); ?>',
            datatype: 'json',
            altRows: true,
            colNames: ['Id', 'Nombre Usuario', 'Correo Electrónico', 'Rol'],
            colModel: [
                {name: 'id', index: 'id', width: 20, editable: false, editoptions: {size: 15}},
                {name: 'username', index: 'username', align: 'center', width: 100},
                {name: 'email', index: 'email', width: 200},
                {name: 'rol_id', index: 'rol_id', width: 200}
            ],
            rowNum: 20,
            rowList: [20, 40, 60],
            multiselect: false,
            loadonce: true,
            pager: jQuery('#pagerCargarUsuarios'),
            viewrecords: true,
            height: "100%"
        });

        myGrid.jqGrid('navGrid', '#pagerCargarUsuarios',
        {add:false,edit:false,del:false,
            beforeRefresh: function() {myGrid.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}}
    ).hideCol('id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar2() {
            myGrid.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
            return[true, '']; //no error
        }
        $("#agregar").button().click(function(){
            document.location.href='<?php echo base_url('auth/register'); ?>';
        });
        
        $("#editar").button().click(function(){
            var gr = myGrid.jqGrid('getGridParam','selrow');
            if( gr != null )
                $('#mensaje').dialog('open'); 
            else 
                $('#mensaje2').dialog('open'); 
        });
        
        $("#eliminar").button().click(function(){
            var gr = myGrid.jqGrid('getGridParam','selrow');
            if( gr != null ){
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('auth/eliminarUsuario') ?>/'+gr,
                    success: function(data)
                    {
                        $('#efectivo').dialog('open');
                    }
                });
                return false;
                $('#efectivo').dialog('open');
                }
            else 
                $('#mensaje2').dialog('open'); 
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
    });
</script>
<center>
    <h2 class="h2Titulos">Mantenimiento de Usuarios</h2>
    <br/>
    <table id="cargarUsuarios"></table>
    <div id="pagerCargarUsuarios"></div>
    <br/>
    <input type="button" id="agregar" value="Agregar" />
    <input type="button" id="editar" value="Resetear Contraseña" />
    <input type="button" id="eliminar" value="Dar de baja" />
</center>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso de la operación">
    <p>Debe seleccionar un usuario para continuar</p>
</div>