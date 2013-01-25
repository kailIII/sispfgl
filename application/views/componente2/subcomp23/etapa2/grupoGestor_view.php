<script type="text/javascript">        
    $(document).ready(function(){
        /*VARIABLES*/
          <?php if ($guardo){?>
                $('#guardo').dialog();
                <?php }?>
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
            {closeAfterEdit:true,editCaption: "Editar Participante",width:350,
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
            this.form.action='<?php echo base_url('componente2/comp23_E2/guardarGrupoGestor'); ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/comp23_E2'); ?>';
        });
        
        /*PARA EL DATEPICKER*/
        $("#gru_ges_fecha").datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        /*FIN DEL DATEPICKER*/
        /*ZONA DE VALIDACIONES*/
        function validar(value, colname) {
            if (value == 0 ) return [false,"Debe Seleccionar una Opción"];
            else return [true,""];
        }
        /*FIN ZONA VALIDACIONES*/
        /*GRID PARTICIPANTES*/
        var tabla=$("#participantes");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E2/cargarParticipanteGG') . '/gru_ges_id/' . $gru_ges_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E2/gestionParticipantes') . '/gru_ges_id/' . $gru_ges_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Dui','Nombres','Apellidos','Sexo','Edad','Tipo','Procedencia','Teléfono'],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_dui',index:'par_dui', width:100,editable:true,
                    editoptions:{size:25,maxlength: 10,dataInit:function(el){$(el).mask("99999999-9",{placeholder:" "});}},
                    formoptions:{label: "DUI"}
                },
                {name:'par_nombre',index:'par_nombre',width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_apellido',index:'par_apellido',width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Apellidos",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_sexo',index:'par_sexo',editable:true,edittype:"select",width:50,
                    align:"center",
                    editoptions:{ value: '0:Seleccione;M:Mujer;H:Hombre' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validar}
                },
                {name:'par_edad',index:'par_edad',width:80,editable:true,
                    editoptions:{ size:15,dataInit: function(elem){$(elem).bind("keypress", function(e) {return numeros(e)})}}, 
                    formoptions:{ label: "Edad",elmprefix:"(*)"},
                    editrules:{required:true,minValue:12,number:true} 
                },
                {name:'par_tipo',index:'par_tipo',width:80,edittype:"select",
                    editable:true,
                    editoptions:{ value: '0:Seleccione;C:Comunidad;S:Sector;I:Institución' }, 
                    formoptions:{ label: "Tipo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validar}
                },
                {name:'par_cargo',index:'par_cargo',width:100,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Procedencia",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_tel',index:'par_tel',width:100,editable:true,
                    editoptions:{size:10,maxlength:9,dataInit:function(el){$(el).mask("9999-9999",{placeholder:" "});}}, 
                    formoptions:{ label: "Teléfono"} 
                }
            ],
            multiselect: false,
            caption: "Miembros del Grupo Gestor",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerParticipantes'),
            viewrecords: true
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
            
    });
    
    
</script>

<form method="post">

    <h2 class="h2Titulos">Etapa 2: Diagnóstico del Municipio</h2>
    <h2 class="h2Titulos">Producto 2: Integración del Grupo Gestor</h2>


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
        <td ><strong>Lugar:</strong><input id="gru_ges_lugar" <?php if (isset($gru_ges_lugar)) { ?> value='<?php echo $gru_ges_lugar; ?>'<?php } ?> name="gru_ges_lugar" type="text" size="40"/></td>
         <td style="width: 150px"></td>
        <td  ><strong>Fecha: </strong><input readonly="readonly" <?php if (isset($gru_ges_fecha)) { ?> value='<?php echo date('d-m-Y', strtotime($gru_ges_fecha)); ?>'<?php } ?>id="gru_ges_fecha" name="gru_ges_fecha" type="text" size="10"/></td>
        </tr>
        <tr>
        <td colspan="2"></td>
        </tr>

    </table>
    <br/><br/>
    <table id="participantes"></table>
    <div id="pagerParticipantes"></div>

    <div style="position: relative;left: 200px;top: 5px">
        <input type="button" id="agregar" value="  Agregar  " />
        <input type="button" id="editar" value="   Editar   " />
        <input type="button" id="eliminar" value="  Eliminar  " />
        <br/><br/>
    </div>
    <p><strong>¿Existe acuerdo sobre funciones, modalidad de funcionamiento y toma de decisiones?</strong>
        <input type="radio" name="gru_ges_acuerdo" value="true" class="required" <?php if (!strcasecmp($gru_ges_acuerdo, 't')) { ?> checked <?php } ?>  >SI </input>
        <input type="radio" name="gru_ges_acuerdo" value="false" class="required" <?php if (!strcasecmp($gru_ges_acuerdo, 'f')) { ?> checked <?php } ?> >NO </input></p>


    <table>
        <tr>
        <td><fieldset style="width:250px;">
            <legend><strong>Criterios</strong></legend>
            <table>
                <?php foreach ($criterios as $aux) { ?>
                    <tr>
                    <td><?php echo $aux->cri_nombre; ?></td>
                    <td><input type="radio" <?php if (!strcasecmp($aux->cri_gru_ges_valor, 't')) { ?> checked <?php } ?> name="cri_<?php echo $aux->cri_id; ?>" value="true" >SI </input></td>
                    <td><input type="radio" <?php if (!strcasecmp($aux->cri_gru_ges_valor, 'f')) { ?> checked <?php } ?> name="cri_<?php echo $aux->cri_id; ?>" value="false" >NO </input></td>
                    </tr>
                <?php } ?>
            </table> 
        </fieldset></td>
        <td><p>Observaciones y/o Recomendaciones:<br/>
                <textarea name="gru_ges_observacion" cols="48" rows="5"><?php if (isset($gru_ges_observacion)) echo $gru_ges_observacion; ?></textarea></p>
        </td>
        </tr>
    </table>    
    <center>
        <br/>
        <p> 
            <input type="submit" id="guardar" value="Guardar Grupo Gestor" />
            <input type="button" id="cancelar" value="Cancelar" />
        </p>
    </center>
    <input id="gru_ges_id" name="gru_ges_id" value="<?php echo $gru_ges_id ?>" style="visibility: hidden"/>
</form>

<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>
<div id="guardo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>

