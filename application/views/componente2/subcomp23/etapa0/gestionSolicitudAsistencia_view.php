<script type="text/javascript">        
    $(document).ready(function(){
        /*VARIABLES*/
        var myGrid = $('#gestionSolicitud');        
        myGrid.jqGrid({ 
            url: '<?php echo base_url('componente2/comp23_E0/cargarSolicitudes') . "/0" ?>',
            editurl:'<?php echo base_url('componente2/comp23_E0/borrarSolicitud') ?>',
            datatype:'json',
            altRows:true,
            colNames:['Id','Fecha Solicitud', 'Nombre del solicitante', 'Cargo', 'Teléfono',''],
            colModel:[
                { name:'id', index: 'id', width:20,editable:false,editoptions:{size:15}  },
                { name:'fecha_solicitud', index: 'fecha_solicitud',align:'center' ,width:150,editable:true,editoptions:{size:25}  },
                { name:'nombre_solicitante', index: 'nombre_solicitante',width:300,editable:true,editoptions:{size:50}},
                { name:'cargo', index: 'cargo',align:'center',width:150,editable:true,editoptions:{size:50}},
                { name:'telefono', index: 'telefono',width:60,editable:true,editoptions:{size:50}},
                {name:'act',index:'act', width:120,sortable:false}],            
            rowNum:10,
            rowList:[10,20,30],
            multiselect: false,
            loadonce:true,
            gridComplete: function(){
                var ids = jQuery("#gestionSolicitud").jqGrid('getDataIDs');
                for(var i=0;i < ids.length;i++){ 
                    var cl = ids[i];
                    if(cl!=0){
                        ce = "<input style='height:22px;width:60px;' type='submit' value='Editar' onclick=\" $('#idfila').attr('value', '"+cl+"'); this.form.action='<?php echo base_url('componente2/comp23_E0/modificarSolicitudAsistencia') ?>' \" />";
                        jQuery("#gestionSolicitud").jqGrid('setRowData',ids[i],{act:ce}); 
                    }} 
            },
            pager: jQuery('#pagergestionSolicitud'),
            viewrecords: true,          
            caption: 'Unidades Organizativas',
            height: "100%"
        });
        
        myGrid.jqGrid('navGrid','#pagergestionSolicitud',
        {edit:false,add:false,del:true,
            beforeRefresh: function() {gestionSolicitud.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}},
        {width:550,height:200},
        {width:550,height:200},
        {msg: "¿Desea eliminar esta Solicitud?",caption:"Eliminando ",
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",width:300,height:150,
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');                            
            }},
        {multipleSearch:true, 
            multipleGroup:true}
    ).hideCol('id');
 
        /*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){   
            $('#selMun').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id='+$('#selDepto').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#selMun').append('<option value="0">--Seleccione Municipio--</option>');
                        $.each(val, function(id, registro){
                            $('#selMun').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });
        }); 
        /*CARGAR PROYECTOS PEP*/
        $('#selMun').change(function(){
            $('#gestionSolicitud').setGridParam({
                url:'<?php echo base_url('componente2/comp23_E0/cargarSolicitudes') . "/" ?>'+$('#selMun').val(),
                datatype:'json'
            }).trigger("reloadGrid"); 
        });
        
        
        $("#agregarS").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E0/agregarSolicitudAsistencia'); ?>';
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
    });               
</script>     
<form id="gestionSolicitudForm" method="post">
    <h2 class="h2Titulos">Etapa 0: Selección de Municipios</h2>
    <h2 class="h2Titulos">Solicitud de asistencia técnica para la elaboración de planes estratégicos participadtivos</h2>
    <br/>
    <p>A continuación se presentan todas las solicitudes técnicas registradas para cada municipio en donde se requiere realizar un proyecto PEP</p>
    <br/>
    <br/>
    <table align="center">
        <tr>
        <td class="textD"><strong>Departamento:</strong></td>
        <td>
            <select id='selDepto' name="selDepto">
                <option value='0'>--Seleccione Departamento--</option>
                <?php foreach ($departamentos as $depar) { ?>
                    <option value='<?php echo $depar->dep_id; ?>'><?php echo $depar->dep_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
        <tr>
        <td class="textD"><strong>Municipio:</strong></td>
        <td >
            <select id='selMun' name="selMun">
                <option value='0'>--Seleccione Municipio--</option>
            </select>
        </td>    
        </tr>
    </table>

    <center style="position: relative;top: 20px">
        <div>
            <p>
                <input type="submit" id="agregarS" name="agregarS" value="Agregar Solicitud  de Asistencia"  />
            </p>
        </div>
    </center>
    <br/>
    <table>
        <tr>
        <td style="width: 100px"></td>
        <td>
            <table id="gestionSolicitud"></table>  
            <div id="pagergestionSolicitud"></div> 
        </td>
        </tr>
    </table>
    <input id="idfila" type="text" name="idfila" value="" style="visibility: hidden"/>
</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>