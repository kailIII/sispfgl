<script type="text/javascript">
    $(document).ready(function() {
        /*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function() {
            $('#selMun').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id=' + $('#selDepto').val(),
                    function(data) {
                        var i = 0;
                        $.each(data, function(key, val) {
                            if (key == 'rows') {
                                $('#selMun').append('<option value="0">--Seleccione Municipio--</option>');
                                $.each(val, function(id, registro) {
                                    $('#selMun').append('<option value="' + registro['cell'][0] + '">' + registro['cell'][1] + '</option>');
                                });
                            }
                        });
                    });
        });
        $('#selMun').change(function() {
            jqLista.setGridParam({
                url: '<?php echo base_url('componente2/comp22/obtenerParticipantesPorMunicipio'); ?>/' + $('#selMun').val(),
                datatype: "json"
            }).trigger("reloadGrid");
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

        var jqLista = $('#lista');
        jqLista.jqGrid({
            url: '<?php echo base_url('componente2/comp22/obtenerParticipantesPorMunicipio'); ?>/0',
            datatype: "json",
            height: "100%",
            colNames: ['Id', 'Nombre Completo del Solicitante'],
            colModel: [
                {name: 'id', index: 'id', width: 55},
                {name: 'cap_nombres', index: 'cap_nombres', width: 400}
            ],
            rowNum: 10,
            rowList: [10, 20, 30],
            pager: '#pagerLista',
            sortname: 'id',
            viewrecords: true,
            sortorder: "asc",
        }).hideCol(['id']);

        $("#agregar").button().click(function() {
            document.location.href = '<?php echo base_url('componente2/comp22/solicitudInscripcion'); ?>';
        });

        $("#editar").button().click(function() {
            var gr = jqLista.jqGrid('getGridParam', 'selrow');
            if (gr != null)
                document.location.href = '<?php echo base_url('componente2/comp22/editarSolicitudInscripcion'); ?>/' + gr;
            else
                $('#mensaje2').dialog('open');

        });


        $("#eliminar").button().click(function() {
            var gr = jqLista.jqGrid('getGridParam', 'selrow');
            if (gr != null) {
                $.getJSON('<?php echo base_url('componente2/comp22/eliminarParticipante'); ?>/' + gr,
                        function(data) {
                            var i = 0;
                            $.each(data, function(key, val) {
                                if (key == 'rows') {
                                    $.each(val, function(id, registro) {
                                        if (registro['cell'][1] == 0) {
                                            $('#mensaje1').dialog('open');
                                            jqLista.setGridParam({
                                                url: '<?php echo base_url('componente2/comp22/obtenerParticipantesPorMunicipio'); ?>/' + $('#selMun').val(),
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
        });


    });
</script>


<center>
    <h2 class="h2Titulos">Capacitaciones</h2>
    <h2 class="h2Titulos">Formulario de Registro y Preselección</h2>
    <br/>
    <table>
        <tr>
        <td><strong>Departamento</strong></td>
        <td><select id='selDepto'>
                <option value='0'>--Seleccione--</option>
                <?php foreach ($departamentos as $grupo) { ?>
                    <option value='<?php echo $grupo->dep_id; ?>'><?php echo $grupo->dep_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
        <td><strong>Municipio</strong></td>
        <td><select id='selMun' name='selMun'>
                <option value='0'>--Seleccione--</option>
            </select>
        </td>
        </tr>
    </table>
</center>
<br/>
<center>
    <table id="lista"></table>
    <div id="pagerLista"></div>    
    <br/>
    <input type="button" id="agregar" value="Agregar Solicitud" />
    <input type="button" id="editar" value="Editar Solicitud" />
    <input type="button" id="eliminar" value="Eliminar Solicitud" />
</center>

<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>
<div id="mensaje3" class="mensaje" title="Eliminación">
    <p>No se puede eliminar este participante porque ya esta inscrito en un proceso.</p>
    <p>Si desea eliminar a esta persona debe realizar las siguientes acciones:</p>
    <ul>
        <li>Desincribirla del proceso en el cual esta inscrito</li>
        <li>Regresar a esta pantalla y eliminar al solicitante</li>
    </ul>
</div>
<div id="mensaje1" class="mensaje" title="Eliminación">
    <p>Eliminado Correctamente</p>
</div>