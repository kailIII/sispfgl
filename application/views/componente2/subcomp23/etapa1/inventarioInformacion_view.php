<script type="text/javascript">        
    $(document).ready(function(){
         <?php if ($guardo){?>
                $('#guardo').dialog();
                <?php }?>
        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E1/guardarInventarioInformacion') . "/" . $inv_inf_id; ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        /*PARA EL DATEPICKER*/
        $( "#gru_apo_fecha" ).datepicker({
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
        /*GRID Otros asistentes*/
        var tabla=$("#FuentesPrimaria");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E1/cargarFuentes') . '/' . $inv_inf_id . '/p' ?>',
            editurl:'<?php echo base_url('componente2/comp23_E1/gestionarFuentes') . '/' . $inv_inf_id . '/p' ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Institución ó Comunidad','Cargo','Telefono','Tipo Información'],
            colModel:[
                {name:'fue_pri_id',index:'fue_pri_id', width:40,editable:false,editoptions:{size:15} },
                {name:'fue_pri_nombre',index:'fue_pri_nombre', width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombre",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fue_pri_institucion',index:'fue_pri_institucion',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Institucion ó Comunidad",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'fue_pri_cargo',index:'fue_pri_cargo',editable:true,width:200,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fue_pri_telefono',index:'fue_pri_telefono',width:80,editable:true,
                    editoptions:{size:10,maxlength:9,dataInit:function(el){$(el).mask("9999-9999",{placeholder:" "});}}, 
                    formoptions:{ label: "Teléfono"} 
                },
                {name:'fue_pri_tipo_info',index:'fue_pri_tipo_info',width:150,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{ label: "Tipo de información",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Fuentes de Información Primarias",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerFuentesPrimaria'),
            viewrecords: true     
        }).jqGrid('navGrid','#pagerFuentesPrimaria',
        {edit:true,add:true,del:true,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        },//OPCIONES
        {closeAfterEdit:true,editCaption: "Editando Fuentes Primarias ",width:450,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }    
        },//EDITAR
        {closeAfterAdd:true,addCaption: "Agregar Nuevas Fuentes Primarias ",width:450,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        },//AGREGAR
        {msg: "¿Desea Eliminar a esta Fuente?",caption:"Eliminando....",
            align:'center',reloadAfterSubmit:true,processData: "Cargando...",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');                            
            }
        }//ELIMINAR
    ).hideCol('fue_pri_id');
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
        /*ZONA DE VALIDACIONES*/
        function validar(value, colname) {
            if (value == 0 ) return [false,"Debe Seleccionar una Opción"];
            else return [true,""];
        }
        /*FIN ZONA VALIDACIONES*/
        /*GRID MIEMBROS DEL EQUIPO LOCAL DE APOYO*/
        var tabla2=$("#FuentesSecundarias");
        tabla2.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E1/cargarFuentes') . '/' . $inv_inf_id . '/s' ?>',
            editurl:'<?php echo base_url('componente2/comp23_E1/gestionarFuentes') . '/' . $inv_inf_id . '/s' ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre del Documento','Fuente','Disponible','Año'],
            colModel:[
                {name:'fue_sec_id',index:'fue_sec_id', width:40,editable:false,editoptions:{size:15} },
                {name:'fue_sec_nombre',index:'fue_sec_nombre', width:300,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Nombre del Documento",elmprefix:"(*)"},
                    editrules:{required:true} },
                {name:'fue_sec_fuente',index:'fue_sec_fuente',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Fuente",elmprefix:"(*)"},
                    editrules:{required:true} 
                },  
                {name:'fue_sec_disponible_en',index:'fue_sec_disponible_en',width:80,
                    editable:true,edittype:"select",
                    editoptions:{ value: '0:Seleccione;Electrónica:Electrónica;Impresa:Impresa' },
                    formoptions:{ label: "Disponible",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validar}
                },     
                {name:'fue_sec_anio',index:'fue_sec_anio',width:100,editable:true,
                    editoptions:{size:25}, 
                    formoptions:{ label: "Año",elmprefix:"(*)"},
                    editrules:{required:true,integer:true} 
                }
            ],
            multiselect: false,
            caption: "Fuentes de Información Secundaria",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerFuentesSecundarias'),
            viewrecords: true     
        }).jqGrid('navGrid','#pagerFuentesSecundarias',
        {edit:true,add:true,del:true,search:false,refresh:false,
            beforeRefresh: function() {
                tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        },//OPCIONES
        {closeAfterEdit:true,editCaption: "Editando Fuentes Secundarias ",
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar2,width:450,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }    
        },//EDITAR
        {closeAfterAdd:true,addCaption: "Agregar Nuevas Fuentes Secundarias ",
            align:'center',reloadAfterSubmit:true,width:450,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar2,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        },//AGREGAR
        {msg: "¿Desea Eliminar a esta Fuente?",caption:"Eliminando....",
            align:'center',reloadAfterSubmit:true,processData: "Cargando...",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');                            
            }
        }//ELIMINAR
    ).hideCol('fue_sec_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar2() {
            tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        } 
    });
</script>

<form method="post">
    <h2 class="h2Titulos">Etapa 1: Condiciones Previas</h2>
    <h2 class="h2Titulos">Producto 5: Inventario de Información</h2>
    <br/><br/> <br/>
    <table>
        <tr>
        <td class="tdLugar" ><strong>Departamento:</strong></td>
        <td><?php echo $departamento ?></td>
        <td class="tdEspacio"></td>
        <td class="tdLugar"><strong>Municipio:</strong></td>
        <td ><?php echo $municipio ?></td>    
        </tr>
     </table>
    <br/><br/><br/><br/>
    <table id="FuentesPrimaria"></table>
    <div id="pagerFuentesPrimaria"></div>
    <br/><br/>
    <table id="FuentesSecundarias"></table>
    <div id="pagerFuentesSecundarias"></div>
    <table style="position: relative;left: 40px;top: 20px">
        <tr>
        <td>
            <p>Observaciones y/o Recomendaciones:<br/>
                <textarea name="inv_inf_observacion" cols="70" rows="5"><?php echo $inv_inf_observacion; ?></textarea></p>
        </td>
        </tr>
    </table>
    <center>
        <div style="position:relative;width: 500px;top: 25px">
            <input type="submit" id="guardar" value="Guardar Inventario Información" />
            <input type="button" id="cancelar" value="Cancelar" />
        </div>
    </center>
</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="guardo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>

