<script type="text/javascript">
    $(document).ready(function(){
        $('#agregar').click(pasar).button();
        $('#quitar').click(eliminar).button(); 
        $('#selecrol').change(cargarSeleccionado);
        $('#regresar').button().click(function() {
            document.location.href='<?php echo base_url('admin/administracion/rolesSistema'); ?>';
        });    
          
        var myGridDisponibles = $('#gridDisponibles');        
        myGridDisponibles.jqGrid({    
            url: '<?php echo base_url('admin/administracion/consultarOpciones'); ?>',
            datatype:'json',
            altRows:true,   
            height: "100%",
            hidegrid: false,
            colNames:['Id','Nombre','Id Padre'],
            colModel:[            
                { name:'id', index: 'id', width:15,editable:false,editoptions:{size:10}  },
                { name:'opc_nombre', index: 'opc_nombre', width:200,editable:true,editoptions:{size:40}},
                { name:'opc_opc_sis_id', index: 'opc_opc_sis_id', width:60,align:"center",editable:false,editoptions:{size:10}  },
            ],          
            multiselect: false,
            rowNum:15,
            rowList:[15,30,45],
            loadonce:true,
            pager:jQuery('#pagerDis'),
            viewrecords: true,          
            caption: 'Opciones Disponibles del Sistema'
        });
           
        myGridDisponibles.jqGrid('navGrid','#pagerDis',{edit:false,add:false,del:false,refresh:false,search:false,
            beforeRefresh: function() {myGridDisponibles.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}});     
        function despuesAgregarEditar() {
            myGridDisponibles.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
             
        var myGridSeleccionadas = $('#gridSelecc');        
        myGridSeleccionadas.jqGrid({    
            url: '<?php echo base_url('admin/administracion/consultarOpcionesAsignadasRol') . '/0'; ?>',
            datatype:'json',
            altRows:true,   
            height: "100%",
            hidegrid: false,
            colNames:['Id','Nombre','Id Padre'],
            colModel:[            
                { name:'id', index: 'id', width:15,editable:false,editoptions:{size:10}  },
                { name:'opc_nombre', index: 'opc_nombre', width:200,editable:true,editoptions:{size:40}},
                { name:'opc_opc_sis_id', index: 'opc_opc_sis_id', width:60,align:"center",editable:false,editoptions:{size:10}  },
            ],          
            multiselect: false,
            rowNum:15,
            rowList:[15,30,45],
            loadonce:true,
            pager:jQuery('#pagerAsig'),
            viewrecords: true,          
            caption: 'Opciones Asignadas'
        });            
        myGridSeleccionadas.jqGrid('navGrid','#pagerAsig',{edit:false,add:false,del:false,refresh:false,search:false,
            beforeRefresh: function() {myGridSeleccionadas.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}});         
        function despuesAgregarEditar2() {
            myGridSeleccionadas.jqGrid('setGridParam',{datatype:'json',loadonce:true,rowNum:15,
            rowList:[15,30,45],loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
            
        $.getJSON('<?php echo base_url('admin/administracion/obtenerRol'); ?>', function(data) {
            var i=0;
            $.each(data, function(key, val) {
                if(key=='rows'){
                    $.each(val, function(id, registro){
                        $('#selecrol').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                    });                    
                }
            });
        });
  
        function cargarSeleccionado(){
            $('#gridSelecc').setGridParam({url:'<?php echo base_url('admin/administracion/consultarOpcionesAsignadasRol') . '/'; ?>'+$('#selecrol').val()}); 
            despuesAgregarEditar2();
                    
            myGridDisponibles.setGridParam({url:'<?php echo base_url('admin/administracion/consultarOpcionesSinAsignar') . '/'; ?>'+$('#selecrol').val()});
            despuesAgregarEditar();
        }
      
        function pasar(){ 
          
            var id = jQuery("#gridDisponibles").jqGrid('getGridParam','selrow'); 
            if (id) { 
                var ret = jQuery("#gridDisponibles").jqGrid('getRowData',id);                     

                $('#gridSelecc').setGridParam({url:'<?php echo base_url('admin/administracion/insertOpcSeleccRol') . '/'; ?>'+$('#selecrol').val()+'/'+ret.id}); 
                 despuesAgregarEditar2();

                $('#gridDisponibles').setGridParam({url:'<?php echo base_url('admin/administracion/consultarOpcionesSinAsignar') . '/'; ?>'+$('#selecrol').val()});
                 despuesAgregarEditar();
            } 
            else {
                alert("Por favor seleccione una opcion");
            } 
           
        }
       
        function eliminar(){    
            var id = jQuery("#gridSelecc").jqGrid('getGridParam','selrow'); 
            if (id) { 
                var ret = jQuery("#gridSelecc").jqGrid('getRowData',id);                     

                $('#gridSelecc').setGridParam({url:'<?php echo base_url('admin/administracion/deleteOpcSeleccRol') . '/'; ?>'+$('#selecrol').val()+'/'+ret.id}); 
                 despuesAgregarEditar2();
                 despuesAgregarEditar();
            } 
            else {
                alert("Por favor seleccione una opcion");
            }            
        }
   
    });
</script>
<table align="center" >
    <tr>
    <td align="center" colspan="3" ><h1>Asignación de Opciones a Roles del Sistema</h1></td>        
</tr>
<tr>
<td colspan="3" align='right'><input type="button" value="Regresar" id="regresar"/></td>
</tr>
<tr>
<td align='right'>Seleccione un rol: </td>
<td colspan=2 ><select id='selecrol'><option value='0'>Seleccione un rol</option></select></td>        
</tr>
<tr>
<td align="center" valign="top">
    <div id="grid_disponibles" >
        <table id="gridDisponibles" class="scroll" ></table> 
        <div id="pagerDis" class="scroll"></div> 
    </div>            
</td>

<td align="center">
    <p><input  id='agregar' type="button" class="ui-button-text"  value=">>"/></p>
    <p><input id='quitar' type="button"  class="ui-button-text"  value="<<"/></p>
</td>
<td align="center" valign="top">
    <div id="grid_selecc" >
        <table id="gridSelecc" class="scroll" ></table> 
        <div id="pagerAsig" class="scroll"></div> 
    </div> 

</td>
</tr>
</table>