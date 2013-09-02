<script type="text/javascript">
    $(document).ready(function() {
        /*desabilitado para activas completar comentario de esta linea y retirar display:none; del elemento */
        var jqLista = $('#lista');
        jqLista.jqGrid({
            url: '<?php echo base_url('componente2/comp22/loadCapacitaciones/'); ?>/', // + $('#mun_id').val(),
            datatype: "json",
            height: "100%",
            colNames: ['Id', 'Proceso', 'Nombre/Tema', 'Fecha'],
            colModel: [
                {name: 'id', index: 'id', width: 55},
                {name: 'cap_proceso', index: 'cap_proceso', width: 150},
                {name: 'cap_nombre', index: 'cap_nombre', width: 200},
                {name: 'cap_fecha', index: 'cap_fecha', width: 100}
            ],
            rowNum: 10,
            rowList: [10, 20, 30],
            pager: '#pagerLista',
            sortname: 'id',
            viewrecords: true,
            sortorder: "desc",
            caption: "Capacitaciones",
            ondblClickRow: function(rowid, iRow, iCol, e) {
                window.location.href = '<?php echo base_url('componente2/comp22/editarCapacitacion'); ?>/' + rowid;
            }
        }).hideCol(['id']);
        jqLista.jqGrid('navGrid','#pagerLista',
        {edit:false,add:false,del:false,refresh:true,search:true,
            beforeRefresh: function() {
                jqLista.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            }
        }
    );         
        $("#btn_seleccionar").button().click(function(){
            var gr = jqLista.jqGrid('getGridParam','selrow');
            if( gr != null )
                document.location.href='<?php echo base_url('componente2/comp22/editarCapacitacion'); ?>/' + jQuery("#lista").jqGrid('getGridParam','selrow');
            else 
                $('#mensaje2').dialog('open'); 
        
        });  
        $("#btn_acuerdo_nuevo").button().click(function() {
            document.location.href='<?php echo base_url('componente2/comp22/crearCapacitacion'); ?>';           
        });
        $('.mensaje').dialog({autoOpen: false,width: 300,
            buttons: {"Ok": function() {$(this).dialog("close");}}
        });
        $("#btn_eliminar").button().click(function(){
            var gr = jqLista.jqGrid('getGridParam','selrow');
            if( gr != null ){
                $.getJSON('<?php echo base_url('componente2/comp22/eliminarCapacitacion'); ?>/' + jQuery("#lista").jqGrid('getGridParam','selrow'),
                function(data) {
                    var i = 0;
                    $.each(data, function(key, val) {
                        if (key == 'rows') {
                            $.each(val, function(id, registro) {
                                if(registro['cell'][1]==0){
                                    $('#mensaje1').dialog('open');
                                    jqLista.setGridParam({
                                        url: '<?php echo base_url('componente2/comp22/loadCapacitaciones/'); ?>/',
                                        datatype: "json"
                                    }).trigger("reloadGrid");                                     
                                }else{
                                    $('#mensaje3').dialog('open'); 
                                }
                            });
                        }
                    });
                });
            }
            else 
                $('#mensaje2').dialog('open');      
        });
    });
</script>


<center>
    <h2 class="h2Titulos">Capacitaciones</h2>
    <h2 class="h2Titulos">Registro de Procesos de Formación</h2>
    <br/>
    <table id="lista"></table>
    <div id="pagerLista"></div>
    <br/><br/>
    <div id="btn_acuerdo_nuevo">Agregar</div>
    <div id="btn_seleccionar">Editar</div>
    <div id="btn_eliminar">Eliminar</div>
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