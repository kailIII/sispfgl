<script type="text/javascript">        
    $(document).ready(function(){
        
        $("#guardar").button().click(function(){
            tabla.jqGrid('editGridRow',"new",
            {closeAfterAdd:true,addCaption: "Guardar Seguimiento",width:350,
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                bottominfo:"Campos marcados con (*) son obligatorios", 
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                }
            });
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
        
        
        
        /*ZONA DATEPICKER*/
        $( "#fec_ord_ini" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#fec_act_rec" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        
        
        $( "#fec_ord_ini_dia" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#fec_soc" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        
        $( "#fec_act_apr" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#fec_ini" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
       
     
        $( "#fec_act_apr_com_eva" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        
        $( "#fec_acu_mun_apr_pla" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#fec_pre_pub_pla" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        $( "#fec_ini_seg" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
       
       
        var tabla=$("#seguimientoGrid");
        
               
        /*GRID CRITERIOS ETAPA 0*/
        
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
            <input id="fec_ord_ini" name="fec_ord_ini" type="text" size="10" readonly="readonly"/>        
        </td>
        </tr>
        <tr>
        <td class="textD">
            <strong>Fecha de acta de recepción</strong>
        </td>
        <td>
            <input id="fec_act_rec" name="fec_act_rec" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>

        <tr></tr>
        <tr>    
        <td colspan="2">
            <strong>Diagnostico</strong> 
            <hr size=2 width=100%/>
        </td>
        </tr>

        <tr>
        <td class="textD">
            <strong>Fecha de orden de inicio del diagnostico</strong> 
        </td>
        <td>
            <input id="fec_ord_ini_dia" name="fec_ord_ini_dia" type="text" size="10" readonly="readonly"/>        
        </td>
        </tr>
        <tr>
        <td class="textD"> 
            <strong>Fecha de socializacion</strong>
        </td>
        <td>
            <input id="fec_soc" name="fec_soc" type="text" size="10" readonly="readonly"/>
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
            <strong>Fecha de acta de aprobacion</strong>
        </td>
        <td>
            <input id="fec_act_apr" name="fec_act_apr" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>

        <tr>    
        <td colspan="2">
            <strong>Planificacion para la gestión de riesgos</strong> 
            <hr size=2 width=100%/>
        </td>
        </tr>

        <tr></tr>
        <tr>
        <td class="textD">
            <strong>Fecha de inicio</strong> 
        </td>
        <td>
            <input id="fec_ini" name="fec_ini" type="text" size="10" readonly="readonly"/>        
        </td>

        <tr>
        <td class="textD">
            <strong>Fecha de acta de aprobación(comite evaluador)</strong> 
        </td>
        <td>
            <input id="fec_act_apr_com_eva" name="fec_act_apr_com_eva" type="text" size="10" readonly="readonly"/>        
        </td>
        </tr>
        <tr>
        <td class="textD"> 
            <strong>Fecha de acuerdo municipal de aprobación de plan</strong>
        </td>
        <td>
            <input id="fec_acu_mun_apr_pla" name="fec_acu_mun_apr_pla" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>

        <tr>
        <td class="textD"> 
            <strong>Fecha de presentación publica del plan GDR</strong>
        </td>
        <td>
            <input id="fec_pre_pub_pla" name="fec_pre_pub_pla" type="text" size="10" readonly="readonly"/>
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
            <input id="fec_ini_seg" name="fec_ini_seg" type="text" size="10" readonly="readonly"/>        
        </td>
        </tr>

        <tr>    
        <td colspan="2">

        </td>
        </tr>

        <tr>
        <td colspan="2" style=" alignment-adjust: central">
            <strong>Comentarios:</strong><br/><textarea id="seg_observaciones" name="seg_observaciones" cols="50" rows="3"></textarea>
        </td>
        </tr>
        <tr>
        <td colspan="2" align="center">
        <input type="button" id="guardar" value="  guardar  " />  
        </td>
        </tr>
    </table>




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
