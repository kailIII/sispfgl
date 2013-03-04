<script type="text/javascript">        
    $(document).ready(function(){
        $("#etapas").hide();
        $("#guardar").button().click(function() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('componente2/comp25_fase1/guardarRevisionInformacion') . '/1' ?>',
                data: $("#revisionInformacion1").serialize(), // serializes the form's elements.
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
        /*CARGAR MUNICIPIOS*/
        $('#dep_id').change(function(){  
            $("#etapas").hide();
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
            $("#etapas").show();
            $.getJSON('<?php echo base_url('componente2/comp25_fase1/cargarRevisionInformacion') . "/" ?>'+$('#mun_id').val(), 
            function(data) {
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $.each(val, function(id, registro){
                            $('#rev_inf_id').val(registro['cell'][0]);
                            if(registro['cell'][1]!=null){
                                if(registro['cell'][1]=="t")
                                    $('input:checkbox[name=rev_inf_plan_municipalidad]').attr("checked","checked");
                                else
                                    $('input:checkbox[name=rev_inf_plan_municipalidad]').attr("checked",false); 
                            }
                            if(registro['cell'][2]!=null){
                                if(registro['cell'][2]=="t"){
                                    $('input:checkbox[name=rev_inf_plan_contingencia]').attr("checked","checked");
                                    $('#plan1').show();
                                }
                                else{
                                    $('input:checkbox[name=rev_inf_plan_contingencia]').attr("checked",false); 
                                    $('#plan1').hide();
                                }
                            }
                            $('#rev_inf_felaboracion').val(registro['cell'][3]);
                            if(registro['cell'][4]!=null){
                                if(registro['cell'][4]=="t"){
                                    $('input:checkbox[name=rev_inf_plan_oformato]').attr("checked","checked");
                                    $('#plan2').show();
                                }
                                else{
                                    $('input:checkbox[name=rev_inf_plan_oformato]').attr("checked",false); 
                                    $('#plan2').hide();
                                }
                            }
                            if(registro['cell'][5]!=null){
                                if(registro['cell'][5]=="t")
                                    $('input:radio[name=rev_inf_gestion_reactiva]')[0].checked = true; 
                                else
                                    $('input:radio[name=rev_inf_gestion_reactiva]')[1].checked = true; 
                            }
                            $('#rev_inf_ogestion_reactiva').val(registro['cell'][6]);
                            if(registro['cell'][7]!=null){
                                if(registro['cell'][7]=="t")
                                    $('input:radio[name=rev_inf_gestion_correctiva]')[0].checked = true; 
                                else
                                    $('input:radio[name=rev_inf_gestion_correctiva]')[1].checked = true; 
                            }
                            $('#rev_inf_ogestion_correctiva').val(registro['cell'][8]);
                            if(registro['cell'][9]!=null){
                                if(registro['cell'][9]=="t")
                                    $('input:radio[name=rev_inf_gestion_prospectiva]')[0].checked = true; 
                                else
                                    $('input:radio[name=rev_inf_gestion_prospectiva]')[1].checked = true; 
                            }
                            $('#rev_inf_ogestion_prospectiva').val(registro['cell'][10]);
                            if(registro['cell'][11]!=null){
                                if(registro['cell'][11]=="t"){
                                    $('input:checkbox[name=rev_inf_plan_comunal]').attr("checked","checked");
                                    $('#plan3').show();
                                }
                                else{
                                    $('input:checkbox[name=rev_inf_plan_comunal]').attr("checked",false);  
                                    $('#plan3').hide();
                                }
                            }
                            if(registro['cell'][12]!=null){
                                if(registro['cell'][12]=="t")
                                    $('input:checkbox[name=rev_inf_mapa]').attr("checked","checked"); 
                                else
                                    $('input:checkbox[name=rev_inf_mapa]').attr("checked",false); 
                            }
                            if(registro['cell'][13]!=null){
                                if(registro['cell'][13]=="t")
                                    $('input:checkbox[name=rev_inf_presentoa]').attr("checked","checked"); 
                                else
                                    $('input:checkbox[name=rev_inf_presentoa]').attr("checked",false); 
                            }
                            $('#rev_inf_conclusion').val(registro['cell'][14]);
                            $('#planContingencial1').setGridParam({
                                url:'<?php echo base_url('componente2/comp25_fase1/cargarPlanContingencial') ?>/1/'+registro['cell'][0],
                                editurl:'<?php echo base_url('componente2/comp25_fase1/guardarPlanContingencial') ?>/1/'+registro['cell'][0],
                                datatype:'json'
                            }).trigger('reloadGrid');
                            $('#planContingencial2').setGridParam({
                                url:'<?php echo base_url('componente2/comp25_fase1/cargarPlanContingencial') ?>/2/'+registro['cell'][0],
                                editurl:'<?php echo base_url('componente2/comp25_fase1/guardarPlanContingencial') ?>/2/'+registro['cell'][0],
                                datatype:'json'
                            }).trigger('reloadGrid');
                            $('#planContingencial3').setGridParam({
                                url:'<?php echo base_url('componente2/comp25_fase1/cargarPlanContingencial') ?>/3/'+registro['cell'][0],
                                editurl:'<?php echo base_url('componente2/comp25_fase1/guardarPlanContingencial') ?>/3/'+registro['cell'][0],
                                datatype:'json'
                            }).trigger('reloadGrid');
                        });
                    }
                });
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
        
        $('#etapas').tabs();
        $('#plan1').hide();
        $('input:checkbox[name=rev_inf_plan_contingencia]').click(function() { 
            if ($('input:checkbox[name=rev_inf_plan_contingencia]').is(':checked')) 
                $('#plan1').show();
            else
                $('#plan1').hide();
        });
        $('#plan2').hide();
        $('input:checkbox[name=rev_inf_plan_oformato]').click(function() { 
            if ($('input:checkbox[name=rev_inf_plan_oformato]').is(':checked')) 
                $('#plan2').show();
            else
                $('#plan2').hide();
        });
        $('#plan3').hide();
        $('input:checkbox[name=rev_inf_plan_comunal]').click(function() { 
            if ($('input:checkbox[name=rev_inf_plan_comunal]').is(':checked')) 
                $('#plan3').show();
            else
                $('#plan3').hide();
        });
        $('#mapas').hide();
        $('input:checkbox[name=rev_inf_mapa]').click(function() { 
            if ($('input:checkbox[name=rev_inf_mapa]').is(':checked')) 
                $('#mapas').show();
            else
                $('#mapas').hide();
        });
        /*PARA LOS DATEPICKER*/
        $( "#rev_inf_fregistro_asesor" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#rev_inf_frevision_uep" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#fecha_conformacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#rev_inf_felaboracion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*ZONA GRID*/
        var tabla=$("#planContingencial1");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp25_fase1/cargarPlanContingencial') ?>/1/'+$('#rev_inf_id').val(),
            editurl:'<?php echo base_url('componente2/comp25_fase1/guardarPlanContingencial') ?>/1/'+$('#rev_inf_id').val(),
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','No.','Nombre del plan','Observaciones','Fecha Documento'],
            colModel:[
                {name:'pla_con_id',index:'pla_con_id', width:40,editable:false,editoptions:{size:15} },
                {name:'pla_con_numero',index:'pla_con_numero', width:40,editable:false,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "No.",elmprefix:"(*)"}
                },
                {name:'pla_con_nombre',index:'pla_con_nombre',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombre del plan:",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'pla_con_descripcion',index:'pla_con_descripcion',
                    editable:true,width:400,edittype:"textarea",
                    editoptions:{rows:"4",cols:"50"},
                    formoptions:{label: "Descripción"}
                },                
                {name:'pla_con_fdocumento',index:'pla_con_fdocumento',width:200,editable:true,
                    editoptions: {
                        size: 10, maxlengh: 10,
                        dataInit: function(element) {
                            $(element).datepicker({
                                showOn: 'both',
                                buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
                                buttonImageOnly: true, 
                                dateFormat: 'dd-mm-yy'
                            })
                        }
                    },
                    formoptions:{label: "Fecha Documento",elmprefix:"(*)"},
                    editrules:{required:true}
                }
            ],
            multiselect: false,
            //caption: "Fuentes de Información Primarias",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerPlanContingencial1'),
            viewrecords: true     
        }).jqGrid('navGrid','#pagerPlanContingencial1',
        {edit:true,add:true,del:true,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        },//OPCIONES
        {closeAfterEdit:true,editCaption: "Editando el plan de contingencia",width:700,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }    
        },//EDITAR
        {closeAfterAdd:true,addCaption: "Agregar Plan de contingencia",width:700,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        },//AGREGAR
        {msg: "¿Desea Eliminar a este plan de contingencia?",caption:"Eliminando....",
            align:'center',reloadAfterSubmit:true,processData: "Cargando...",width:300,
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');                            
            }
        }//ELIMINAR
    ).hideCol('pla_con_id').hideCol('pla_con_numero');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        var tabla2=$("#planContingencial2");
        tabla2.jqGrid({
            url:'<?php echo base_url('componente2/comp25_fase1/cargarPlanContingencial') ?>/2/'+$('#rev_inf_id').val(),
            editurl:'<?php echo base_url('componente2/comp25_fase1/guardarPlanContingencial') ?>/2/'+$('#rev_inf_id').val(),
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','No.','Nombre del plan','Observaciones','Fecha Documento'],
            colModel:[
                {name:'pla_con_id',index:'pla_con_id', width:40,editable:false,editoptions:{size:15} },
                {name:'pla_con_numero',index:'pla_con_numero', width:40,editable:false,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "No.",elmprefix:"(*)"}
                },
                {name:'pla_con_nombre',index:'pla_con_nombre',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombre del plan:",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'pla_con_descripcion',index:'pla_con_descripcion',
                    editable:true,width:400,edittype:"textarea",
                    editoptions:{rows:"4",cols:"50"},
                    formoptions:{label: "Descripción"}
                },                
                {name:'pla_con_fdocumento',index:'pla_con_fdocumento',width:200,editable:true,
                    editoptions: {
                        size: 10, maxlengh: 10,
                        dataInit: function(element) {
                            $(element).datepicker({
                                showOn: 'both',
                                buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
                                buttonImageOnly: true, 
                                dateFormat: 'dd-mm-yy'
                            })
                        }
                    },
                    formoptions:{label: "Fecha Documento",elmprefix:"(*)"},
                    editrules:{required:true}
                }
            ],
            multiselect: false,
            //caption: "Fuentes de Información Primarias",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerPlanContingencial2'),
            viewrecords: true     
        }).jqGrid('navGrid','#pagerPlanContingencial2',
        {edit:true,add:true,del:true,search:false,refresh:false,
            beforeRefresh: function() {
                tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        },//OPCIONES
        {closeAfterEdit:true,editCaption: "Editando el plan de contingencia con otro formato",width:700,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar2,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }    
        },//EDITAR
        {closeAfterAdd:true,addCaption: "Agregar Plan de contingencia con otro formato",width:700,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar2,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        },//AGREGAR
        {msg: "¿Desea Eliminar a este plan de contingencia?",caption:"Eliminando....",
            align:'center',reloadAfterSubmit:true,processData: "Cargando...",width:300,
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');                            
            }
        }//ELIMINAR
    ).hideCol('pla_con_id').hideCol('pla_con_numero');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar2() {
            tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        var tabla3=$("#planContingencial3");
        tabla3.jqGrid({
            url:'<?php echo base_url('componente2/comp25_fase1/cargarPlanContingencial') ?>/3/'+$('#rev_inf_id').val(),
            editurl:'<?php echo base_url('componente2/comp25_fase1/guardarPlanContingencial') ?>/3/'+$('#rev_inf_id').val(),
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','No.','Nombre del plan','Fecha Documento'],
            colModel:[
                {name:'pla_con_id',index:'pla_con_id', width:40,editable:false,editoptions:{size:15} },
                {name:'pla_con_numero',index:'pla_con_numero', width:40,editable:false,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "No.",elmprefix:"(*)"}
                },
                {name:'pla_con_nombre',index:'pla_con_nombre',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombre del plan:",elmprefix:"(*)"},
                    editrules:{required:true} 
                },                
                {name:'pla_con_fdocumento',index:'pla_con_fdocumento',width:200,editable:true,
                    editoptions: {
                        size: 10, maxlengh: 10,
                        dataInit: function(element) {
                            $(element).datepicker({
                                showOn: 'both',
                                buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
                                buttonImageOnly: true, 
                                dateFormat: 'dd-mm-yy'
                            })
                        }
                    },
                    formoptions:{label: "Fecha Documento",elmprefix:"(*)"},
                    editrules:{required:true}
                }
            ],
            multiselect: false,
            //caption: "Fuentes de Información Primarias",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerPlanContingencial3'),
            viewrecords: true     
        }).jqGrid('navGrid','#pagerPlanContingencial3',
        {edit:true,add:true,del:true,search:false,refresh:false,
            beforeRefresh: function() {
                tabla3.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        },//OPCIONES
        {closeAfterEdit:true,editCaption: "Editando el plan de contingencia",width:700,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar3,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }    
        },//EDITAR
        {closeAfterAdd:true,addCaption: "Agregar Plan de contingencia",width:700,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar3,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        },//AGREGAR
        {msg: "¿Desea Eliminar a este plan de contingencia?",caption:"Eliminando....",
            align:'center',reloadAfterSubmit:true,processData: "Cargando...",width:300,
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');                            
            }
        }//ELIMINAR
    ).hideCol('pla_con_id').hideCol('pla_con_numero');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar3() {
            tabla3.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        function validaTipoMapa(value, colname) {
            if (value == 0 ) return [false,"Seleccione un tipo de mapa"];
            else return [true,""];
        }
        var tabla4=$("#mapa");
        tabla4.jqGrid({
            url:'<?php echo base_url('componente2/comp25/cargarParticipantesET') ?>/ela_pro_id/'+$('#rev_inf_id').val(),
            editurl:'<?php echo base_url('componente2/comp23_E1/gestionParticipantes') ?>/elaboracion_proyecto/ela_pro_id/'+$('#rev_inf_id').val(),
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Tipo','Nombre','Descripción'],
            colModel:[
                {name:'map_id',index:'map_id', width:40,editable:false,editoptions:{size:15} },
                {name:'tip_map_id',index:'tip_map_id', editable:true,
                    edittype:"select",width:250,
                    editoptions:{ dataUrl:'<?php echo base_url('componente2/comp25_fase1/cargarTipoMapa'); ?>'}, 
                    formoptions:{ label: "Tipo:",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaTipoMapa}
                },
                {name:'map_nombre',index:'map_nombre',width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombre del mapa:",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'map_descripcion',index:'map_descripcion',
                    editable:true,width:400,edittype:"textarea",
                    editoptions:{rows:"4",cols:"50"},
                    formoptions:{label: "Descripción"}
                }
            ],
            multiselect: false,
            //caption: "Fuentes de Información Primarias",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerMapa'),
            viewrecords: true     
        }).jqGrid('navGrid','#pagerMapa',
        {edit:true,add:true,del:true,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        },//OPCIONES
        {closeAfterEdit:true,editCaption: "Editando el plan de contingencia",width:700,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }    
        },//EDITAR
        {closeAfterAdd:true,addCaption: "Agregar Plan de contingencia",width:700,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        },//AGREGAR
        {msg: "¿Desea Eliminar a este plan de contingencia?",caption:"Eliminando....",
            align:'center',reloadAfterSubmit:true,processData: "Cargando...",width:300,
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');                            
            }
        }//ELIMINAR
    ).hideCol('map_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar4() {
            tabla4.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }        
    });
</script>
<center>
    <h2 class="h2Titulos">2.1. Elaboración de proyecto</h2>
    <h2 class="h2Titulos">2.1.2 Revisión de la información presentada</h2>
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
        </tr>
        <td><strong>Municipio</strong></td>
        <td><select id='mun_id' name='mun_id'>
                <option value='0'>--Seleccione--</option>
            </select>
        </td>
        </tr>
    </table>
</center>
<br/><br/>
<table>
    <tr>
    <td>
        <strong>Fecha de registro (Asesor)</strong> 
        <input id="rev_inf_fregistro_asesor" name="rev_inf_fregistro_asesor" type="text" size="10" readonly="readonly"/>        
    </td>
    <td width="40"></td>
    <td>
        <strong>Fecha de revisión UEP</strong> 
        <input id="rev_inf_frevision_uep" name="rev_inf_frevision_uep" type="text" size="10" readonly="readonly"/>

    </td>
</tr>
</table>
<p><strong>Municipalidad adjunto documentación de gestión de riesgos</strong>
    <input type="radio" name="rev_inf_adjunto_doc" value="true" > SI </input>
    <input type="radio" name="rev_inf_adjunto_doc" value="false"> NO </input>
</p>
<br/>

<div id="etapas">
    <ul>
        <li><a href="#parte1">Primera Parte</a></li>
        <li><a href="#parte2">Segunda Parte</a></li>
    </ul>
    <div id="parte1">
        <form id="revisionInformacion1" method="post">
            <p><strong>a. Planes y mapas de gestión de riesgos</strong>

            </p>
            <hr size=2 width= 100% />
            <p style="text-align: right">
                <strong>Fecha de elaboración</strong> 
                <input id="rev_inf_felaboracion" name="rev_inf_felaboracion" type="text" size="10" readonly="readonly"/>
            </p>
            <p>
                <input type="checkbox" name="rev_inf_plan_municipalidad"/>Plan municipal de protección civil,prevención y mitigación de desastres
            </p>
            <p>
                <input type="checkbox" name="rev_inf_plan_contingencia"/>Planes contingenciales de protección civil
            </p>
            <div id="plan1">
                <table id="planContingencial1"></table>
                <div id="pagerPlanContingencial1"></div>
            </div>
            <p>
                <input type="checkbox" name="rev_inf_plan_oformato"/>Planes con otro formato
            </p>
            <div id="plan2">
                <table id="planContingencial2"></table>
                <div id="pagerPlanContingencial2"></div>
            </div>
            <p><strong>En la información que presentó, hay evidencias de planificación en los enfoques:</strong>
            <table>
                <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="center"><strong>Observaciones</strong></td>
                </tr>
                <tr>
                <td><strong>i. Gestión reactiva(momento de emergencia)</strong></td>
                <td width="40"></td>
                <td> <input type="radio" name="rev_inf_gestion_reactiva" value="true" > SI </input>
                    <input type="radio" name="rev_inf_gestion_reactiva" value="false"> NO</input>
                </td>
                <td width="40"></td>
                <td><input id="rev_inf_ogestion_reactiva" name="rev_inf_ogestion_reactiva" value="" type="text" size="30" /></td>
                </tr>
                <tr>
                <td><strong>ii. Gestión correctiva(atiende riesgos existentes)</strong></td>
                <td width="40"></td>
                <td> <input type="radio" name="rev_inf_gestion_correctiva" value="true" > SI </input>
                    <input type="radio" name="rev_inf_gestion_correctiva" value="false"> NO</input>
                </td>
                <td width="40"></td>
                <td><input id="rev_inf_ogestion_correctiva" name="rev_inf_ogestion_correctiva" value="" type="text" size="30" /></td>
                </tr>
                <tr>
                <td><strong>iii. Gestión prospectiva(atiende riesgos futuros)</strong></td>
                <td width="40"></td>
                <td> <input type="radio" name="rev_inf_gestion_prospectiva" value="true" > SI </input>
                    <input type="radio" name="rev_inf_gestion_prospectiva" value="false"> NO</input>
                </td>
                <td width="40"></td>
                <td><input id="rev_inf_ogestion_prospectiva" name="rev_inf_ogestion_prospectiva" value="" type="text" size="30" /></td>
                </tr>
            </table>
            </p>
            <p>
                <input type="checkbox" name="rev_inf_plan_comunal"/>Planes comunales de protección civil, prevención y mitigación de desastres
            </p>
            <div id="plan3">
                <table id="planContingencial3"></table>
                <div id="pagerPlanContingencial3"></div>
            </div>

            <p>
                <input type="checkbox" name="rev_inf_mapa">Mapas
            </p>
            <div id="mapas">
                <table id="mapa"></table>
                <div id="pagerMapa"></div>
            </div>
            <p>
                <input type="checkbox" name="rev_inf_presentoa"/>No presento documentación
            </p>
            <p><strong>Conclusiones:</strong><br/><textarea id="rev_inf_conclusion" name="rev_inf_conclusion" cols="48" rows="5"></textarea></p>
            <input id="rev_inf_id" name="rev_inf_id" value="" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
            <center>
                <p><input type="submit" id="guardar" value="Guardar" />
                </p>
            </center>
        </form>

    </div>
    <div id="parte2">
        <form id="revisionInformacion2" method="post">

            <table>
                <tr>
                <td><input type="checkbox" name="comprociv"><strong>Comisión Municipal de protección civil conformada</strong></td>
                <td width="30px"> </td>
                <td> <strong>Fecha de conformación</strong> 
                    <input id="fecha_conformacion" name="apo_mun_faprobacion" type="text" size="10" readonly="readonly"/></td>
                </tr>

            </table>
            <p><input type="checkbox" name="comprociv"><strong> Presento estructura organizativa</strong></p>












            <input id="rev_inf_id2" name="rev_inf_id2" value="" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
        </form>
    </div>

</div>
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
