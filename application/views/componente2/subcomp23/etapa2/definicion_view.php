<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E2/guardarDefinicionTema').'/'.$def_id; ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/comp23_E2'); ?>';
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
        /*FIN DIALOGOS VALIDACION*/
        /*PARA EL DATEPICKER*/
        $( "#def_fecha" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        /*ZONA DE VALIDACIONES*/
        function validaInstitucion(value, colname) {
            if (value == 0 ) return [false,"Debe Seleccionar una Opción"];
            else return [true,""];
        }
        /*FIN ZONA VALIDACIONES*/
                        
        /*GRID MIEMBROS DEL EQUIPO LOCAL DE APOYO*/
        var tabla2=$("#MiembroELA");
        tabla2.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E2/cargarParticipanteGGDef') . '/' . $gru_ges_id . '/' . $def_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E2/gestionParticipantesDef') ?>/<?php echo $def_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Dui','Nombre Completo','Sexo','Cargo','Teléfono','Participa',''],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_dui',index:'par_dui', width:100,editable:false},
                {name:'par_nombre',index:'par_nombre',width:150,editable:false},
                {name:'par_sexo',index:'par_sexo',width:50,editable:false},
                {name:'par_cargo',index:'par_cargo',width:100,editable:false},
                {name:'par_tel',index:'par_tel',width:100,editable:false},
                {name:'par_def_participa',index:'par_def_participa',width:60,align:'center',editable:true,edittype:"checkbox",editoptions:{value:"Si:No"}},
                {name:'actions',formatter:"actions",editable:false,fixed:true,width:60,
                    formatoptions:{"keys":true,delbutton: false,
                        onSuccess:despuesAgregarEditar2}
                }
            ],
            multiselect: false,
            caption: "Miembros del Grupo Gestor",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerMiembroEla'),
            viewrecords: true,
            gridComplete: 
                function(){
                $.getJSON('<?php echo base_url('componente2/comp23_E1/calcularTotalParticipantes') ?>/<?php echo $def_id; ?>',
                function(data) {
                    $.each(data, function(key, val) {
                        if(key=='rows'){
                            $.each(val, function(id, registro){
                                $("#total").attr('value', registro['cell'][0]);
                                $("#mujeres").attr('value', registro['cell'][1]);
                                $("#hombres").attr('value', registro['cell'][2]);
                            });                    
                        }
                    });
                }); 
            }
        }).jqGrid('navGrid','#pagerMiembroEla',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('par_id');
        function despuesAgregarEditar2() {
            tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; 
        }
        
        var tabla3=$("#problemas");
        tabla3.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E2/cargarProblemasIdentificados') . '/' . $def_id . '/def_id'; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E2/gestionarProblemasIdentificados') . '/' . $def_id . '/def_id'; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Àrea','Tema','Problema','Prioridad'],
            colModel:[
                {name:'pro_ide_id',index:'pro_ide_id', width:40,editable:false,editoptions:{size:15} },
                {name:'are_dim_id',index:'are_dim_id',editable:true,
                    edittype:"select",width:150,
                    editoptions:{ dataUrl:'<?php echo base_url('componente2/comp23_E2/cargarAreasDimension'); ?>'}, 
                    formoptions:{ label: "Àrea",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaInstitucion}
                },
                {name:'pro_ide_tema',index:'pro_ide_tema',width:100,editable:true,
                    editoptions:{size:25,maxlength:250}, 
                    formoptions:{label: "Tema:",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'pro_ide_problema',index:'pro_ide_problema',editable:true,
                    edittype:"textarea",editoptions:{rows:"4",cols:"20",maxlength:250},width:450, 
                    formoptions:{label: "Problema",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'pro_ide_prioridad',index:'pro_ide_prioridad',width:80,
                    editable:true,editoptions:{size:15}, 
                    formoptions:{label: "Prioridad",elmprefix:"(*)"},
                    editrules:{required:true,number:true} 
                }           
            ],
            multiselect: false,
            caption:"Problemas Identificados",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerproblemas'),
            viewrecords: true     
        }).hideCol('pro_ide_id').jqGrid('navGrid','#pagerproblemas',
        {edit:true,add:true,del:true,search:false,refresh:true,
            beforeRefresh: function() {
                tabla3.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            }
        },//OPCIONES
        {closeAfterEdit:true,editCaption: "Editando Problema Identificado ",align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar3,width:350,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }    
        },//EDITAR
        {closeAfterAdd:true,addCaption: "Agregar Problema Identificado", align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar3,width:350,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        },//AGREGAR
        {msg: "Desea Eliminar a Problema?",caption:"Eliminando....",
            align:'center',reloadAfterSubmit:true,processData: "Cargando...",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');                            
            }
        }//ELIMINAR
    );
        /* Funcion para regargar los JQGRID FACILITADORES*/
        function despuesAgregarEditar3() {
            tabla3.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; 
        }
        /*  PARA SUBIR EL ARCHIVO  */
        var button = $('#btn_subir'), interval;
        new AjaxUpload('#btn_subir', {
            action: '<?php echo base_url('componente2/comp23_E1/subirArchivo') . '/definicion/' . $def_id . '/def_id'; ?>',
            onSubmit : function(file , ext){
                if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                    $('#extension').dialog('open');
                    return false;
                } else {
                    $('#vinieta').val('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response,ext){
                if(response!='error'){
                    $('#vinieta').val('Subido con Exito');
                    this.enable();			
                    $('#vinietaD').val('Descargar Archivo');
                    $('#def_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                    ext= (response.substring(response.lastIndexOf("."))).toLowerCase(); 
                    if (ext=='.pdf'){
                        $('#btn_descargar').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_blank'
                        });
                    }
                    else{
                        $('#btn_descargar').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_self'
                        });
                    }
                }else{
                    $('#vinieta').val('El Archivo debe ser menor a 1 MB.');
                    this.enable();			
                 
                }
                 
            }	
        });
        $('#btn_descargar').click(function() {
            $.get($(this).attr('href'));
        });
    });
</script>

<form method="post" id="definicionForm">

    <h2 class="h2Titulos">Etapa 2: Diagnóstico del Municipio</h2>
    <h2 class="h2Titulos">Producto 5: Definición de temas, problemas y ejes principales</h2>
    <table>
        <tr>
        <td ><strong>Departamento:</strong><?php echo $departamento ?></td>
        <td ><strong>Municipio:</strong><?php echo $municipio ?></td>
        </tr>
        <tr>
        <td  ><strong>Fecha reunión: </strong><input readonly="readonly" id="def_fecha" name="def_fecha" type="text"<?php if (isset($def_fecha)) { ?> value='<?php echo date('d/m/y', strtotime($def_fecha)); ?>'<?php } ?> size="10" /></td>
        </tr>
        <tr>
        <td colspan="2"><strong>Proyecto PEP:  </strong><?php echo $proyectoPep ?></td>
        </tr>
    </table>
    <br/><br/>

    <table id="MiembroELA"></table>
    <div id="pagerMiembroEla"></div>
    <br/>
    <table id="problemas"></table>
    <div id="pagerproblemas"></div>
    <br/>
    <table>
        <tr>
        <td><div id="btn_subir"></div></td>
        <td><input class="letraazul" type="text" id="vinieta" value="Subir Informe de desarrollo de priorizacón" size="60" style="border: none"/></td>
        </tr>
        <tr>
        <td><a <?php if (isset($def_ruta_archivo) && $def_ruta_archivo != '') { ?> href="<?php echo base_url() . $def_ruta_archivo; ?>"<?php } ?>  id="btn_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
        <td><input class="letraazul" type="text" id="vinietaD" <?php if (isset($def_ruta_archivo) && $def_ruta_archivo != '') { ?>value="Descargar Informe de Desarrollo "<?php } else { ?> value="El informe de desarrollo no se ha cargado" <?php } ?>size="60" style="border: none"/></td>
        </tr>
    </table>
    <p>Observaciones:<br/>
        <textarea id="def_observacion"  name="def_observacion" cols="48" rows="5"><?php if (isset($def_observacion)) echo $def_observacion; ?></textarea></p>
    <center>
        <div style="position:relative;width: 300px;top: 25px">
            <p > 
                <input type="submit" id="guardar" value="Guardar Definición" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
     <input id="def_ruta_archivo" name="def_ruta_archivo" <?php if (isset($def_ruta_archivo) && $def_ruta_archivo != '') { ?>value="<?php echo $def_ruta_archivo; ?>"<?php } ?> type="text" size="100" readonly="readonly" style="visibility: hidden"/>
</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>
<div id="extension" class="mensaje" title="Error">
    <p>Solo se permiten archivos con la extensión pdf|doc|docx</p>
</div>

