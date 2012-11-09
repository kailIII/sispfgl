<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
        $("#agregar").button();
        $("#editar").button();
        $("#eliminar").button();
        $("#guardar").button();
        $("#cancelar").button();
        
        /*PARA EL DATEPICKER*/
        $( "#gru_apo_fecha" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        /*ZONA DE VALIDACIONES*/
        function validar(value, colname) {
            if (value == 0 ) return [false,"Debe Seleccionar una Opción"];
            else return [true,""];
        }
        /*FIN ZONA VALIDACIONES*/
        /*GRID AGREGAR OTROS PARTICIPANTES*/
        var tabla=$("#FuentesPrimaria");
        tabla.jqGrid({
            url:'<?php echo base_url('') ?>',
            //editurl:'welcome/gestionArticulo',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Institución ó Comunidad','Cargo','Telefono','Tipo Información'],
            colModel:[
                {name:'fue_pri_id',index:'fue_pri_id', width:40,editable:false,editoptions:{size:15} },
                {name:'fue_pri_nombre',index:'fue_pri_nombre', width:200,editable:true,editoptions:{size:15}, 
                    formoptions:{label: "Nombre",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fue_pri_institucion',index:'fue_pri_institucion',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Institucion ó Comunidad",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'fue_pri_cargo',index:'fue_pri_cargo',editable:true,edittype:"select",width:200,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Institucion ó Comunidad",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
             
                {name:'fue_pri_telefono',index:'fue_pri_telefono',width:80,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Telefono",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                
                {name:'fue_pri_nombre_doc',index:'fue_pri_nombre_doc',width:150,edittype:"select",
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Tipo Documento",elmprefix:"(*)"},
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
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('fue_pri_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
                
        //AGREGAR
        $("#agregar").click(function(){
            tabla.jqGrid('editGridRow',"new",
            {closeAfterAdd:true,addCaption: "Agregar ",
                align:'center',reloadAfterSubmit:true,width:550,
                processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                bottominfo:"Campos marcados con (*) son obligatorios", 
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                }
            });
        });

        //EDITAR
        $("#editar").click(function(){
            var gr = tabla.jqGrid('getGridParam','selrow');
            if( gr != null )
                tabla.jqGrid('editGridRow',gr,
            {closeAfterEdit:true,editCaption: "Editando ",
                align:'center',reloadAfterSubmit:true,width:550,
                processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                bottominfo:"Campos marcados con (*) son obligatorios", 
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                    }
            });
            else $('#mensaje2').dialog('open'); 
        });
    
        //ELIMINAR
        $("#eliminar").click(function(){
            var grs = tabla.jqGrid('getGridParam','selrow');
            if( grs != null ) tabla.jqGrid('delGridRow',grs,
            {msg: "Desea Eliminar esta ?",caption:"Eliminando ",
                height:100,align:'center',reloadAfterSubmit:true,width:550,
                processData: "Cargando...",
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');                            
                }}); 
            else $('#mensaje2').dialog('open'); });
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
        
        /*GRID MIEMBROS DEL EQUIPO LOCAL DE APOYO*/
        var tabla2=$("#FuentesSecundarias");
        tabla2.jqGrid({
            url:'<?php echo base_url('') ?>',
            //editurl:'welcome/gestionArticulo',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre del Documento','Fuente','Disponible','Año'],
            colModel:[
                {name:'fue_sec_id',index:'fue_sec_id', width:40,editable:false,editoptions:{size:15} },
                {name:'fue_sec_nombre',index:'fue_sec_nombre', width:300,editable:true,editoptions:{size:15}, 
                    formoptions:{label: "Nombre del Documento",elmprefix:"(*)"},
                    editrules:{required:true} },
                      
                {name:'fue_sec_fuente',index:'fue_sec_fuente',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Fuente",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                        
                {name:'fue_sec_disponible_en',index:'fue_sec_disponible_en',width:80,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Disponible",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                
                             
                {name:'fue_sec_anio',index:'fue_sec_anio',width:100,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Año",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
        
            ],
            multiselect: false,
            caption: "Fuentes de Información Secundaria",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#FuentesSecundarias'),
            viewrecords: true     
        }).jqGrid('navGrid','#FuentesSecundarias',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('fue_sec_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar2() {
            tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        } 
    });
</script>

<form method="post">
     <div style="margin-left: 250px;">
        <h2 class="h2Titulos">Etapa 1: Condiciones Previas</h2>
        <h2 class="h2Titulos">Producto 5: Inventario de Información</h2>
         </br></br> </br>
        <table>
            <tr>
            <td ><strong>Departamento:</strong></td>
            <td style="width: 200px" ></td>
            </tr>
            <tr>
            <td ><strong>Municipio:</strong></td>
            <td ></td>    
            </tr>
            <tr>
            <td ><strong>Proyecto Pep:</strong></td>
            <td ></td>    
            
        </table>

        </br></br>
        <table id="FuentesPrimaria"></table>
        <div id="pagerFuentesPrimaria"></div>
        <br></br>
        <table id="FuentesSecundarias"></table>
        <div id="pagerFuentesSecundarias"></div>

        <div style="position: relative;left: 200px;top: 5px">
            <input type="button" id="agregar" value="  Agregar  " />
            <input type="button" id="editar" value="   Editar   " />
            <input type="button" id="eliminar" value="  Eliminar  " />
            <br></br>
        </div>

    
    <table style="position: relative;left: 40px;top: 20px;border-color: 2px solid blue">
        <tr>
        <td>
            <p>Observaciones y/o Recomendaciones:</br>
                <textarea id="acu_mun_observacion" cols="70" rows="5"></textarea></p>

        </td>

        </tr>
    </table>
    <center>
        <div style="position:relative;width: 300px;top: 25px">
            <p > 
                <input type="submit" id="guardar" value="Guardar Reunión" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
        </div>
</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>

