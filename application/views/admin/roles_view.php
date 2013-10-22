<script type="text/javascript">        
    $(document).ready(function(){
        /*VARIABLES*/
        var tabla=$("#roles");
        /*ZONA DE BOTONES*/
        $("#agregar").button().click(function(){
            tabla.jqGrid('editGridRow',"new",
            {closeAfterAdd:true,addCaption: "Agregar nuevo rol",
                align:'center',reloadAfterSubmit:true,width:400,
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
            {closeAfterEdit:true,editCaption: "Editando rol del sistema",
                align:'center',reloadAfterSubmit:true,width:400,
                processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                bottominfo:"Campos marcados con (*) son obligatorios", 
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                }
            });
            else $('#mensaje2').dialog('open'); 
        });
        
        $("#eliminar").button().click(function(){
            var grs = tabla.jqGrid('getGridParam','selrow');
            if( grs != null ) tabla.jqGrid('delGridRow',grs,
            {msg: "¿ Desea Eliminar este rol?",caption:"Eliminando rol del sistema ",
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                }
            }); 
            else $('#mensaje2').dialog('open'); 
        });
        $("#asignar").button().click(function() {
            document.location.href='<?php echo base_url('admin/administracion/asignarRolesOpciones'); ?>';
        });
        
       
        /*FIN ZONA VALIDACIONES*/
        /*GRID PARTICIPANTES*/
        tabla.jqGrid({
            url:'<?php echo base_url('admin/administracion/obtenerRol') ?>',
            editurl:'<?php echo base_url('admin/administracion/gestionRoles') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Descripción','Código'],
            colModel:[
                {name:'rol_id',index:'rol_id', width:40,editable:false,editrules:{edithidden:false}},
                {name:'rol_nombre',index:'rol_nombre',width:100,editable:true,
                    editoptions:{size:30,maxlength:25}, 
                    formoptions:{label: "Nombres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'rol_descripcion',index:'rol_descripcion',width:400,editable:true,
                    editoptions:{rows:"5",cols:"23",maxlength:100}, edittype:'textarea',
                    formoptions:{label: "Descripción"}
                },
                {name:'rol_codigo',index:'rol_codigo',width:75,editable:true,
                    editoptions:{size:15,maxlength:4}, 
                    formoptions:{label: "Código"},
                    editrules:{required:false} 
                },
            ],
            multiselect: false,
            caption: "Roles de usuarios",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerRoles'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerRoles',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('rol_id');
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

<h2 class="h2Titulos">Administración de Roles</h2>
<br/><br/>
<table align="center">
    <tr>
    <td align="center">
        <input type="button" id="asignar" value="  Asignar Opciones  " />
        <br/>
        <br/>
    </td>
    </tr>
    <tr>
    <td >
        <table id="roles"></table>
        <div id="pagerRoles"></div>
        <br/>
    </td>
</tr>
<tr>
<td align="center">
    <input type="button" id="agregar" value="  Agregar  " />
    <input type="button" id="editar" value="   Editar   " />
    <input type="button" id="eliminar" value="  Eliminar  " />
</td>
</tr>
</table>

<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>
