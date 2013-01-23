<script type="text/javascript">        
    $(document).ready(function(){
        /*VARIABLES*/
        var tabla=$("#participantes");
        /*ZONA DE BOTONES*/
        $("#agregar").button().click(function(){
            tabla.jqGrid('editGridRow',"new",
            {closeAfterAdd:true,addCaption: "Agregar Participante",width:350,
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                bottominfo:"Campos marcados con (*) son obligatorios", 
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                }
            });
        });
        
        $("#editar").button().click(function(){
            var gr = tabla.jqGrid('getGridParam','selrow');
            if( gr != null )
                tabla.jqGrid('editGridRow',gr,
            {closeAfterEdit:true,editCaption: "Editar Participante ",width:350,
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                bottominfo:"Campos marcados con (*) son obligatorios", 
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                    ;}
            });
            else $('#mensaje2').dialog('open'); 
        });
        
        $("#eliminar").button().click(function(){
            var grs = tabla.jqGrid('getGridParam','selrow');
            if( grs != null ) tabla.jqGrid('delGridRow',grs,
            {msg: "¿Desea Eliminar este participante?",caption:"Eliminando ",
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');                            
                }}); 
            else $('#mensaje2').dialog('open'); 
        });
        
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E2/guardarReunion') ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/comp23_E2/muestraReunion'); ?>/'+$('#reu_id').val();
        });

        /*PARA EL DATEPICKER*/
        $( "#reu_fecha" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo base_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        /*ZONA DE VALIDACIONES*/
        function validaSexo(value, colname) {
            if (value == 0 ) return [false,"Seleccione el Sexo del Participante"];
            else return [true,""];
        }
        function validaInstitucion(value, colname) {
            if (value == 0 ) return [false,"Seleccione la institucion del Participante"];
            else return [true,""];
        }
        /*FIN ZONA VALIDACIONES*/
        /*GRID PARTICIPANTES*/
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E2/cargarParticipantesRDM') ?>/reu_id/<?php echo $reu_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E1/gestionParticipantes') ?>/reunion/reu_id/<?php echo $reu_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombres','Apellidos','Sexo','Edad','Cargo','Teléfono'],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_nombre',index:'par_nombre',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_apellido',index:'par_apellido',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Apellidos",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_sexo',index:'par_sexo',editable:true,edittype:"select",width:50,
                    editoptions:{ value: '0:Seleccione;M:Mujer;H:Hombre' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaSexo}
                },
                {name:'par_edad',index:'par_edad',width:80,editable:true,
                    editoptions:{ size:15,dataInit: function(elem){$(elem).bind("keypress", function(e) {return numeros(e)})}}, 
                    formoptions:{ label: "Edad",elmprefix:"(*)"},
                    editrules:{required:true,number:true,minValue:12} 
                },
                {name:'par_cargo',index:'par_cargo',width:120,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_tel',index:'par_tel',width:100,editable:true,
                    editoptions:{size:10,maxlength:9,dataInit:function(el){$(el).mask("9999-9999",{placeholder:" "});}}, 
                    formoptions:{ label: "Teléfono"} 
                }
            ],
            multiselect: false,
            caption: "Participantes en las Reuniones de Diagnóstico del Municipio",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerParticipantes'),
            viewrecords: true,
            gridComplete: 
                function(){
                $.getJSON('<?php echo base_url('componente2/comp23_E1/calcularTotalSexo') ?>/reu_id/<?php echo $reu_id; ?>',
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
        }).jqGrid('navGrid','#pagerParticipantes',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('par_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        
        /*GRID FACILITADORES*/
        var tabla3=$("#problemas");
        tabla3.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E2/cargarProblemasIdentificados') . '/' . $reu_id . '/reu_id'; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E2/gestionarProblemasIdentificados') . '/' . $reu_id . '/reu_id'; ?>',
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
                    editable:true,
                    editoptions:{ size:15,dataInit: function(elem){$(elem).bind("keypress", function(e) {return numeros(e)})}}, 
                    formoptions:{label: "Prioridad",elmprefix:"(*)"},
                    editrules:{required:true,number:true,minValue:1} 
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
        //Validar formulario
        $("#reunionForm").validate();    
    });
</script>
<form id="reunionForm" method="post">
    <h2 class="h2Titulos">Etapa 2: Diagnóstico del Municipio</h2>
    <h2 class="h2Titulos">Producto 1: Reuniones del Diagnóstico</h2>
    <br/><br/>
    <table>
        <tr>
        <td class="tdLugar" ><strong>Departamento:</strong></td>
        <td><?php echo $departamento ?></td>
        <td class="tdEspacio"></td>
        <td class="tdLugar"><strong>Municipio:</strong></td>
        <td ><?php echo $municipio ?></td>    
        </tr>
    </table>
    <table>
        <tr>
        <td>
            <p><strong>Nombre de la actividad:</strong><textarea id="reu_resultado" name="reu_resultado" cols="50" rows="1" class="required" ></textarea></p>
        </td>
        <td>
            Fecha: 
            <input id="reu_fecha" name="reu_fecha" readonly="readonly" class="required"  size="10"/>
        </td>
        </tr>
    </table>

    <p>Tema o Agenda a Desarrollar: <textarea id="reu_tema" name="reu_tema" cols="50" rows="2" class="required" maxlength="200" ></textarea></p>
    <p><input type="checkbox" name="pob_comunidad" value="1" >Comunidad</input>
        <input type="checkbox" name="pob_sector" value="1" >Sector</input>
        <input type="checkbox" name="pob_institucion" value="1" >Institución</input>
    </p>
    <table id="participantes"></table>
    <div id="pagerParticipantes"></div>
    <div style="position: relative;left: 275px;top: 5px;">
        <input type="button" id="agregar" value="  Agregar  " />
        <input type="button" id="editar" value="   Editar   " />
        <input type="button" id="eliminar" value="  Eliminar  " />
    </div>
    <p></p>

    <table style="position: relative;top: 15px;">
        <tr>  
        <td>
            <p>Observaciones:<br/>
                <textarea id="reu_observacion"  name="reu_observacion" cols="48" rows="5"></textarea></p>
        </td>
        <td>
        <fieldset   style="border-color: #2F589F;height:85px;width:225px;position: relative;left: 50px;">
            <legend align="center"><strong>Cantidad de Participantes</strong></legend>
            <table>
                <tr>
                <td class="textD">Hombres: </td>
                <td><input class="bordeNo" id="hombres" type="text" size="5" readonly="readonly" /></td>
                </tr>
                <tr>
                <td class="textD">Mujeres: </td>
                <td><input class="bordeNo" id="mujeres" type="text" size="5" readonly="readonly" /><br/></td>
                </tr>
                <tr>
                <td class="textD">Total: </td>
                <td><input class="bordeNo" id="total" type="text" size="5" readonly="readonly" /></td>
                </tr>
            </table> 
        </fieldset>
        </td>
        </tr>
        <tr>
        <td colspan="2">
            <table id="problemas"></table>
            <div id="pagerproblemas"></div>
        </td>
        </tr>
        <tr>
        <td>
        <fieldset style="width:250px;">
            <legend><strong>Criterios</strong></legend>
            <table>
                <?php foreach ($criterios as $aux) { ?>
                    <tr>
                    <td><?php echo $aux->cri_nombre; ?></td>
                    <td><input type="radio" <?php if (!strcasecmp($aux->cri_reu_valor, 't')) { ?> checked <?php } ?> name="cri_<?php echo $aux->cri_id; ?>" value="true" >SI </input></td>
                    <td><input type="radio" <?php if (!strcasecmp($aux->cri_reu_valor, 'f')) { ?> checked <?php } ?>name="cri_<?php echo $aux->cri_id; ?>" value="false" >NO </input></td>
                    </tr>
                <?php } ?>
            </table>  
            </td>
            </tr>
    </table>
    <center>  <p><input type="submit" id="guardar" value="Guardar Reunión" />
            <input type="button" id="cancelar" value="Cancelar" />
        </p>

    </center>
    <input id="reu_id" name="reu_id" value="<?php echo $reu_id ?>" style="visibility: hidden"/>
    <input id="pob_id" name="pob_id" value="<?php echo $pob_id ?>" style="visibility: hidden"/>
    <input type="text" style="visibility: hidden" id="reu_numero" value="<?php echo $reu_numero ?>" name="reu_numero" size="5" readonly="readonly"/> 
</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>