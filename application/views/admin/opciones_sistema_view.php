<script type="text/javascript">
    $(document).ready(function(){
        
        var myGrid = $('#theGrid');        
        myGrid.jqGrid({    
            url: '<?php echo base_url('admin/administracion/consultarOpcionesCompleta'); ?>',
            editurl: '<?php echo base_url('admin/administracion/gestionarOpcionesSistema'); ?>',
            datatype:'json',
            altRows:true,   
            height: "100%",
            hidegrid: false,         
            colNames:['Id','Nombre', 'Enlace', 'Padre','Orden'],
            colModel:[            
                { name:'id', index: 'id', width:15,editable:false,editoptions:{size:10},sorttype:'int',searchtype:"integer", searchrules:{"required":true, "number":true, "maxValue":2000000}   },
                { name:'nombre', index: 'nombre', width:150,editable:true,editoptions:{size:40,maxlength:50},formoptions:{rowpos:1, label: "Nombre", elmprefix:"(*)"},editrules:{required:true}  },
                { name:'enlace', index: 'enlace', width:300,editable:true,editoptions:{size:70,maxlength:150},formoptions:{ rowpos:3, label: "Enlace", elmprefix:"(*)"},editrules:{required:true}  } ,
                { name:'opcpadre', index: 'opcpadre',align:"center", width:50,editable:true,editoptions:{size:40,integer:true} ,formoptions:{rowpos:4, label: "Padre"} },
                { name:'orden', index: 'orden',align:"center", width:50,editable:true,editoptions:{size:40,integer:true} ,formoptions:{rowpos:5, label: "Orden"} } 
            ],
            rowNum:10,
            rowList:[10,20,30],
            multiselect: false,
            loadonce:true,
            pager: jQuery('#pager'),
            viewrecords: true,          
            caption: 'Opciones del sistema'
        });
        
        myGrid.jqGrid('navGrid','#pager',
        {add:false,edit:false,del:false,
            beforeRefresh: function() {$("#theGrid").jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}}
    );
        
        function despuesAgregarEditar() {
            $("#theGrid").jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }   
                 
        $("#agregarOpcionesButton").button().click(function(){
            myGrid.jqGrid('editGridRow',"new",
            {closeAfterAdd:true,addCaption: "Agregar Opciones del Sistema",
                align:'center',reloadAfterSubmit:true,  width: 650,height:200,
                processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                bottominfo:"Campos marcados con (*) son obligatorios", 
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                }
            });
        });
         $("#editarOpcionesButton").button().click(function(){
            var gr = myGrid.jqGrid('getGridParam','selrow');
            if( gr != null )
                myGrid.jqGrid('editGridRow',gr,
            {closeAfterEdit:true,editCaption: "Editando ",
                align:'center',reloadAfterSubmit:true,width: 650,height:200,
                processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                bottominfo:"Campos marcados con (*) son obligatorios", 
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                    ;}
            });
            else $('#mensaje2').dialog('open'); 
        });
       
        //eliminar
        $("#eliminarOpcionesButton").button().click(function(){
            var grs = myGrid.jqGrid('getGridParam','selrow');
            if( grs != null ) myGrid.jqGrid('delGridRow',grs,
            {msg: "Desea Eliminar esta ?",caption:"Eliminando ",
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');                            
                }}); 
            else $('#mensaje2').dialog('open'); 
        });
        //fin
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
    });
</script>
<center>
    <h1 id="DemoHeaders" >Gestión de Opciones del Sistema</h1>
    <table id="theGrid" class="scroll" ></table> 
    <div id="pager"  class="scroll" style="text-align:center;"></div>
    <br></br>

    <input type="button" id="agregarOpcionesButton" value="  Agregar  " />
    <input type="button" id="editarOpcionesButton" value="   Editar   " />
    <input type="button" id="eliminarOpcionesButton" value="  Eliminar  " />
</center>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>
