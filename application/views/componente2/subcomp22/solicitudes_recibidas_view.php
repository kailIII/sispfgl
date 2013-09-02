<script type="text/javascript">
    $(document).ready(function() {
        /*desabilitado para activas completar comentario de esta linea y retirar display:none; del elemento */
        var jqLista = $('#lista');
        jqLista.jqGrid({
            url: '<?php echo base_url('componente2/comp22/loadSolicitudesMunicipio'); ?>/0',
            datatype: "json",
            height: "100%",
            colNames: ['Id', 'Nombre Completo', 'Proceso', 'Justificación','Inscrito'],
            colModel: [
                {name: 'id', index: 'id', width: 55},
                {name: 'cap_nombres', index: 'cap_nombres', width: 150},
                {name: 'cap_proceso', index: 'cap_proceso', width: 200},
                {name: 'cxp_justificacion', index: 'cxp_justificacion', width: 200},
                {name: 'inscrito', index: 'inscrito', width: 100},
                
            ],
            rowNum: 10,
            rowList: [10, 20, 30],
            pager: '#pagerLista',
            sortname: 'id',
            viewrecords: true,
            sortorder: "desc",
            caption: "Solicitudes Enviadas Por Municipio"
        }).hideCol(['id']);
        
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
                url: '<?php echo base_url('componente2/comp22/loadSolicitudesMunicipio'); ?>/'+ $('#selMun').val(),
                datatype: "json"
            }).trigger("reloadGrid"); 
        });
         
    });
</script>


<center>
    <h2 class="h2Titulos">Capacitaciones</h2>
    <h2 class="h2Titulos">Solicitudes Recibidas por Departamento</h2>
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
    <br/><br/><br/>
    <table id="lista"></table>
    <div id="pagerLista"></div>
    <br/><br/>

</center>
