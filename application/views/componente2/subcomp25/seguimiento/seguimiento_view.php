<script type="text/javascript">        
    $(document).ready(function(){
        $("#guardar").button().click(function() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('componente2/comp25_seguimiento/guardarSeguimiento') ?>',
                data: $("#seguimientoForm").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $('#efectivo').dialog('open');
                }
            });
            return false;
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
        
        $("#seguimientoForm").hide();
        /*CARGAR MUNICIPIOS*/
        $('#dep_id').change(function(){ 
            $('#mun_id').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id='+$('#dep_id').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#mun_id').append('<option value="0">--Seleccione Municipio--</option>');
                        $.each(val, function(id, registro){
                            $('#mun_id').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });             
        });
        
        $('#mun_id').change(function(){
            $('#seguimientoForm')[0].reset();
            if($('#mun_id').val()!=0){
                $.getJSON('<?php echo base_url('componente2/comp25_seguimiento/cargarSeguimiento') . "/" ?>'+$('#mun_id').val(), 
                function(data) {
                    $.each(data, function(key, val) {
                        if(key=='rows'){
                            $.each(val, function(id, registro){
                                $('#seg_id').val(registro['cell'][0]);
                                $('#seg_forden_preparacion').val(registro['cell'][1]);
                                $('#seg_facta_recepcion').val(registro['cell'][2]);
                                $('#seg_forden_diagnostico').val(registro['cell'][3]);
                                $('#seg_fsocializacion').val(registro['cell'][4]);
                                $('#seg_facta_aprobacion_d').val(registro['cell'][5]);
                                $('#seg_forden_planificacion').val(registro['cell'][6]);
                                $('#seg_facta_aprobacion_p').val(registro['cell'][7]);
                                $('#seg_facuerdo_municipal').val(registro['cell'][8]);
                                $('#seg_fpresentacion_publica').val(registro['cell'][9]);
                                $('#seg_forden_seguimiento').val(registro['cell'][10]);
                                $('#seg_comentario').val(registro['cell'][11]);
                                /* tabla.setGridParam({
                                    url:'<?php echo base_url('componente2/comp25_fase1/cargarNota') ?>/'+registro['cell'][0],
                                    editurl:'<?php echo base_url('componente2/comp25_fase1/guardarNota') ?>/'+registro['cell'][0],
                                    datatype:'json'
                                }).trigger('reloadGrid');*/
                                $("#seguimientoForm").show();
                            });                    
                        }
                    });
                });              
            }else
                $("#seguimientoForm").hide();
        });
        
        /*ZONA DATEPICKER*/
        $( "#seg_forden_preparacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#seg_facta_recepcion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        
        $( "#seg_forden_diagnostico" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#seg_fsocializacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        
        $( "#seg_facta_aprobacion_d" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#seg_forden_planificacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
            
        $( "#seg_facta_aprobacion_p" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        
        $( "#seg_facuerdo_municipal" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#seg_fpresentacion_publica" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#seg_forden_seguimiento" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        /*GRID CRITERIOS ETAPA 0*/
        var tabla=$("#seguimientoGrid");   
        tabla.jqGrid({
            //            url:'<?php echo base_url('componente2/comp23_E0/cargarCriterios') ?>',
            //            editurl:'<?php echo base_url('componente2/comp23_E0/gestionarCriterios') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Criterios'],
            colModel:[
                {name:'criterio_id',index:'criterio_id', width:40,editable:false,editoptions:{size:15} },
                {name:'criterio_nombre',index:'criterio_nombre',width:600,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombre",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            rowNum:15,
            rowList:[15,30,45],
            loadonce:true,
            pager: jQuery('#pagerSeguimientoGrid'),
            viewrecords: true
        
        }).jqGrid('navGrid','#pagerSeguimientoGrid',
        {edit:false,add:false,del:false,search:true,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('criterio_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        
        
        
        
    });
</script>
<center>
    <h2 class="h2Titulos">Gestión de Riesgos</h2>
    <br/>
    <table>
        <tr>
        <td><strong>Departamento</strong></td>
        <td><select id='dep_id'>
                <option value='0'>--Seleccione--</option>
                <?php foreach ($departamentos as $depto) { ?>
                    <option value='<?php echo $depto->dep_id; ?>'><?php echo $depto->dep_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        <td width="50px"></td>
        <td><strong>Municipio</strong></td>
        <td><select id='mun_id' name='mun_id'>
                <option value='0'>--Seleccione--</option>
            </select>
        </td>
        </tr>
    </table>
</center>

<br/><br/>
<form id="seguimientoForm" method="post">

    <table align="center">
        <tr>
        <td colspan="2">
            <strong>Preparación</strong>
            <hr size=2 width=100%/>
        </td>
        </tr>

        <tr>
        <td class="textD">
            <strong>Fecha de orden de inicio</strong>
        </td>
        <td> 
            <input id="seg_forden_preparacion" name="seg_forden_preparacion" type="text" size="10" readonly="readonly"/>        
        </td>
        </tr>
        <tr>
        <td class="textD">
            <strong>Fecha de acta de recepción</strong>
        </td>
        <td>
            <input id="seg_facta_recepcion" name="seg_facta_recepcion" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>

        <tr></tr>
        <tr>    
        <td colspan="2">
            <strong>Diagnóstico</strong> 
            <hr size=2 width=100%/>
        </td>
        </tr>

        <tr>
        <td class="textD">
            <strong>Fecha de orden de inicio del diagnóstico</strong> 
        </td>
        <td>
            <input id="seg_forden_diagnostico" name="seg_forden_diagnostico" type="text" size="10" readonly="readonly"/>        
        </td>
        </tr>
        <tr>
        <td class="textD"> 
            <strong>Fecha de socialización</strong>
        </td>
        <td>
            <input id="seg_fsocializacion" name="seg_fsocializacion" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>


        <tr></tr>
        <tr>
        <td colspan="2">
            <table id="seguimientoGrid"></table>
            <div id="pagerSeguimientoGrid"></div>
        </td>
        </tr>

        <tr>
        <td class="textD"> 
            <strong>Fecha de acta de aprobación</strong>
        </td>
        <td>
            <input id="seg_facta_aprobacion_d" name="seg_facta_aprobacion_d" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>

        <tr>    
        <td colspan="2">
            <strong>Planificación para la gestión de riesgos</strong> 
            <hr size=2 width=100%/>
        </td>
        </tr>

        <tr></tr>
        <tr>
        <td class="textD">
            <strong>Fecha de inicio</strong> 
        </td>
        <td>
            <input id="seg_forden_planificacion" name="seg_forden_planificacion" type="text" size="10" readonly="readonly"/>        
        </td>

        <tr>
        <td class="textD">
            <strong>Fecha de acta de aprobación(comite evaluador)</strong> 
        </td>
        <td>
            <input id="seg_facta_aprobacion_p" name="seg_facta_aprobacion_p" type="text" size="10" readonly="readonly"/>        
        </td>
        </tr>
        <tr>
        <td class="textD"> 
            <strong>Fecha de acuerdo municipal de aprobación de plan</strong>
        </td>
        <td>
            <input id="seg_facuerdo_municipal" name="seg_facuerdo_municipal" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>

        <tr>
        <td class="textD"> 
            <strong>Fecha de presentación pública del plan GDR</strong>
        </td>
        <td>
            <input id="seg_fpresentacion_publica" name="seg_fpresentacion_publica" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>

        <tr></tr>
        <tr>   
        <td colspan="2">
            <strong>Seguimiento</strong> 
            <hr size=2 width=100%/>
        </td>
        </tr>

        <tr>
        <td class="textD">
            <strong>Fecha de inicio</strong> 
        </td>
        <td>
            <input id="seg_forden_seguimiento" name="seg_forden_seguimiento" type="text" size="10" readonly="readonly"/>        
        </td>
        </tr>

        <tr>    
        <td colspan="2">

        </td>
        </tr>

        <tr>
        <td colspan="2" style=" alignment-adjust: central">
            <strong>Comentarios:</strong><br/><textarea id="seg_comentario" name="seg_comentario" cols="50" rows="3"></textarea>
        </td>
        </tr>
        <tr>
        <td colspan="2" align="center">
            <input type="button" id="guardar" value="  guardar  " />  
        </td>
        </tr>
    </table>
    <input id="seg_id" name="seg_id" value="" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
</form>

<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>
<div id="fechaValidacion" class="mensaje" title="Error en fechas">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/cancel.png'); ?>" class="imagenError" />Las fechas deben de ir en orden ascendente</p>
    </center>
</div>
