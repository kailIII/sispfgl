<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
         <?php if (isset($guardo)){?>
                $('#guardo').dialog();
                <?php }?>
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E2/guardarPriorizacion') . '/' . $pri_id; ?>';
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
        $( "#pri_fecha" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        /*FIN DEL DATEPICKER*/
        /*ZONA DE VALIDACIONES*/
        function validar(value, colname) {
            if (value == 0 ) return [false,"Debe Seleccionar una opción"];
            else return [true,""];
        }
        /*FIN ZONA VALIDACIONES*/
                        
        /*GRID MIEMBROS DEL EQUIPO LOCAL DE APOYO*/
        var tabla2=$("#MiembroELA");
        tabla2.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E2/cargarParticipanteGGPri') . '/' . $gru_ges_id . '/' . $pri_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E2/gestionParticipantesPri') ?>/<?php echo $pri_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Nombre Completo','Sexo','Cargo','Teléfono','Participa',''],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_dui',index:'par_dui', width:100,editable:false},
                {name:'par_nombre',index:'par_nombre',width:150,editable:false},
                {name:'par_sexo',index:'par_sexo',width:50,editable:false},
                {name:'par_cargo',index:'par_cargo',width:100,editable:false},
                {name:'par_tel',index:'par_tel',width:100,editable:false},
                {name:'par_pri_participa',index:'par_pri_participa',width:60,align:'center',editable:true,edittype:"checkbox",editoptions:{value:"Si:No"}},
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
            viewrecords: true
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
        
        var tabla=$("#problemas");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E2/cargarProyectosIdentificados') . '/' . $pri_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E2/gestionarProyectosIdentificados') . '/' . $pri_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre del proyecto','Ubicación','F.F.','Monto','Ejecución(meses)','PBHombres','PBMujeres','Prioridad','Estados'],
            colModel:[
                {name:'pro_ide_id',index:'pro_ide_id', width:40,editable:false,editoptions:{size:15} },
                {name:'pro_ide_nombre',index:'pro_ide_nombre',width:150,editable:true,
                    edittype:"textarea",editoptions:{rows:"4",cols:"30"},
                    formoptions:{label: "Nombre del Proyecto",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'pro_ide_ubicacion',index:'pro_ide_ubicacion',width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Ubicación:",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'pro_ide_ff',index:'pro_ide_ff',width:110,edittype:"select",editable:true,
                    editoptions:{ value: '0:Seleccione;GL:Gobierno Local;GC:Gobierno Central' }, 
                    formoptions:{ label: "Fuente Financiamiento:",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validar}
                },
                {name:'pro_ide_monto',index:'pro_ide_monto',width:80,editable:true,
                    editoptions:{size:25,dataInit: function(elem){$(elem).bind("keypress", function(e) {return numeros(e)})}}, 
                    formoptions:{ label: "Monto",elmprefix:"(*)"},
                    editrules:{required:true,number:true,minvalue:0} 
                },
                {name:'pro_ide_plazoejec',index:'pro_ide_plazoejec',width:120,editable:true,
                    editoptions:{ size:15,dataInit: function(elem){$(elem).bind("keypress", function(e) {return numeros(e)})}}, 
                    formoptions:{label: "Plazo Ejecución",elmprefix:"(*)",elmsuffix:"meses"},
                    editrules:{required:true,number:true,minvalue:0} 
                },
                {name:'pro_ide_pbh',index:'pro_ide_pbh',width:80,editable:true,
                    editoptions:{ size:25,dataInit: function(elem){$(elem).bind("keypress", function(e) {return numeros(e)})}}, 
                    formoptions:{label: "Población Beneficiaria Hombres",elmprefix:"(*)"},
                    editrules:{required:true,number:true,minvalue:0} 
                },
                {name:'pro_ide_pbm',index:'pro_ide_pbm',width:80,editable:true,
                    editoptions:{ size:25,dataInit: function(elem){$(elem).bind("keypress", function(e) {return numeros(e)})}},   
                    formoptions:{label: "Población Beneficiaria Mujeres",elmprefix:"(*)"},
                    editrules:{required:true,number:true,minvalue:0} 
                },
                {name:'pro_ide_prioridad',index:'pro_ide_prioridad', width:80,editable:true,
                    editoptions:{size:15},formoptions:{label: "Prioridad",elmprefix:"(*)"},
                    editrules:{required:true,integer:true,minvalue:0} 
                },
                {name:'pro_ide_estado',index:'pro_ide_estado',width:80,edittype:"select",editable:true,
                    editoptions:{ value: '0:Seleccione;I:Identificado;P:Perfil;G:Gestión;E:En Ejecución;F:Finalizado' }, 
                    formoptions:{ label: "Estado:",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validar}
                }
            ],
            multiselect: false,
            caption: "Pequeños Proyectos Identificados",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerProblemas'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerProblemas',
        {edit:true,add:true,del:true,search:false,refresh:true,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        },//OPCIONES
        {closeAfterEdit:true,editCaption: "Editando Pequeños Proyectos Identificados",
            align:'center',reloadAfterSubmit:true,width:500,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }    
        },//EDITAR
        {closeAfterAdd:true,addCaption: "Agregar Pequeños Proyectos Identificados",
            align:'center',reloadAfterSubmit:true,width:500,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        },//AGREGAR
        {msg: "Desea Eliminar a este Proyecto?",caption:"Eliminando....",
            align:'center',reloadAfterSubmit:true,processData: "Cargando...",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');                            
            }
        }//ELIMINAR
    ).hideCol('pro_ide_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; 
        }
            
    });
</script>

<form method="post" id="definicionForm">

    <h2 class="h2Titulos">Etapa 2: Diagnóstico del Municipio</h2>
    <h2 class="h2Titulos">Producto 5: Priorización e implementación de pequeños proyectos de impacto</h2>
    <br/><br/><br/>
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
        <td  ><strong>Fecha reunión: </strong><input readonly="readonly" id="pri_fecha" name="pri_fecha" type="text"<?php if (isset($pri_fecha)) { ?> value='<?php echo date('d-m-Y', strtotime($pri_fecha)); ?>'<?php } ?> size="10" /></td>
        </tr>
        <tr>
        <td colspan="2"></td>
        </tr>
    </table>
    <br/><br/>

    <table id="MiembroELA"></table>
    <div id="pagerMiembroEla"></div>
    <br/>
    <br/>
    <p style="position: relative;left: 500px">PB: Población Beneficiaria --- F.F.: Fuente Financiamiento</p>
    <table id="problemas"></table>
    <div id="pagerProblemas"></div>
    <br/>

    <p>Observaciones:<br/>
        <textarea id="pri_observacion"  name="pri_observacion" cols="48" rows="5"><?php if (isset($pri_observacion)) echo $pri_observacion; ?></textarea></p>
    <center>
        <div style="position:relative;top: 25px">
            <p > 
                <input type="submit" id="guardar" value="Guardar Definición" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>

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