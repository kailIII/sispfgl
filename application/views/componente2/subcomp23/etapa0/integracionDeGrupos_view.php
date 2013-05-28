<script type="text/javascript">        
    $(document).ready(function(){    
        /*CARGAR REGIONES DISPONIBLES*/
        $('#selConsul').change(function(){   
            $('#municipios').setGridParam({
                url:'<?php echo base_url('componente2/comp23_E0/cargarMunicipiosGrupo') . '/' ?>'+$('#selConsul').val(),
                datatype:'json'
            }).trigger("reloadGrid"); 
            
            $('#selRegion').children().remove();
            <?php if($rol!='apr') {?>
            $.getJSON('<?php echo base_url('componente2/comp23_E0/cargarRegionesGrupo') ?>', 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#selRegion').append('<option value="0">-- Seleccione --</option>');
                        $.each(val, function(id, registro){
                            $('#selRegion').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });
            $('#selDepto').children().remove();
            $('#selDepto').append('<option value="0">-- Seleccione --</option>');
            $('#selMun').children().remove();
            $('#selMun').append('<option value="0">-- Seleccione --</option>');
            <?php }else{?>
                $('#selRegion').append('<option value="<?php if(isset($reg_id)) echo $reg_id; ?>"><?php if(isset($reg_nombre)) echo $reg_nombre; ?></option>');
                $('#selDepto').children().remove();
                 $.getJSON('<?php echo base_url('componente2/comp23_E0/cargarDeptosDisponiblesGrupo') ?>/'+$('#selRegion').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#selDepto').append('<option value="0">--Seleccione --</option>');
                        $.each(val, function(id, registro){
                            $('#selDepto').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            }); 
            <?php }?>
        });
        
        /*CARGAR DEPARTAMENTOS*/
        $('#selRegion').change(function(){   
            $('#selDepto').children().remove();
            $.getJSON('<?php echo base_url('componente2/comp23_E0/cargarDeptosDisponiblesGrupo') ?>/'+$('#selRegion').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#selDepto').append('<option value="0">--Seleccione--</option>');
                        $.each(val, function(id, registro){
                            $('#selDepto').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        /*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){   
            $('#selMun').children().remove();
            $.getJSON('<?php echo base_url('componente2/comp23_E0/cargarMuniDisponiblesGrupo') ?>/'+$('#selDepto').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#selMun').append('<option value="0">--Seleccione --</option>');
                        $.each(val, function(id, registro){
                            $('#selMun').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
                              
        var tabla=$("#municipios");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E0/cargarMuniDisponiblesGrupo') . '/' ?>'+$('#selMun').val(),
            editurl:'<?php echo base_url('componente2/comp23_E0/actualizarMunicipioGrupo') ?>/'+$('#selMun').val()+'/'+$('#selConsul').val(),
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['mun_id','Municipio'],//,'Etapa I','Etapa II','Etapa III','Etapa IV'],
            colModel:[
                {name:'id',index:'id', editable:false,editoptions:{size:15} },
                {name:'mun_nombre',index:'mun_nombre',editable:false,width:500}
            ],
            multiselect: false,
            caption: "Municipios Seleccionados",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pager'),
            viewrecords: true
        }).jqGrid('navGrid','#pager',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}
            ).trigger('reloadGrid');}
        }
    ).hideCol(['id']);
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
                                
        //AGREGAR
        $("#agregar").button().click(function(){
            if($('#selMun').val()!='0'){
                $.getJSON('<?php echo base_url('componente2/comp23_E0/actualizarMunicipioGrupo') ?>/'+$('#selMun').val()+'/'+$('#selConsul').val(), 
                function(data) {
                    $.each(data, function(key, val) {
                        if(key=='rows'){
                            $.each(val, function(id, registro){
                                datos = {'id':id,'mun_nombre':registro['cell'][1]};
                                tabla.jqGrid('addRowData',id,datos);
                                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
                                return[true,'']; //no error
                            });                    
                        }
                    });
                });
                $('#selMun').children().remove();
                $.getJSON('<?php echo base_url('componente2/comp23_E0/cargarMuniDisponiblesGrupo') ?>/'+$('#selDepto').val(), 
                function(data) {
                    var i=0;
                    $.each(data, function(key, val) {
                        if(key=='rows'){
                            $('#selMun').append('<option value="0">--Seleccione --</option>');
                            $.each(val, function(id, registro){
                                $('#selMun').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                            });                    
                        }
                    });
                });  
            }
            else
                $('#mensaje3').dialog('open'); 
        });
        
        //ELIMINAR
        $("#eliminar").button().click(function(){
            var grs = tabla.jqGrid('getGridParam','selrow');
            if( grs != null ) tabla.jqGrid('delGridRow',grs,
            {msg: "¿Desea desasignar este Municipio?",caption:"Desasignando Municipio",
                align:'center',reloadAfterSubmit:true,afterSubmit:despuesAgregarEditar,
                processData: "Cargando...",
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                    $('#selMun').children().remove();
                    $.getJSON('<?php echo base_url('componente2/comp23_E0/cargarMuniDisponiblesGrupo') ?>/'+$('#selDepto').val(), 
                    function(data) {
                        var i=0;
                        $.each(data, function(key, val) {
                            if(key=='rows'){
                                $('#selMun').append('<option value="0">--Seleccione --</option>');
                                $.each(val, function(id, registro){
                                    $('#selMun').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                                });                    
                            }
                        });
                    });
                }}); 
            else 
                $('#mensaje2').dialog('open'); 
        });
        
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        
        //BOTON DE AGREGAR GRUPO
        $("#agregarGrupo").button().click(function(){
            $('#selMun').children().remove();
            $.getJSON('<?php echo base_url('componente2/comp23_E0/cargarMuniDisponibles') ?>/'+$('#selDepto').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#selMun').append('<option value="0">--Seleccione --</option>');
                        $.each(val, function(id, registro){
                            $('#selMun').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });  
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('componente2/comp23_E0/nuevoGrupo') ?>',
                data: $("#grupoForm").serialize,
                success: function(response)
                {
                    $('#selConsul').append('<option value="'+response+'">'+response+'</option>');
                }
                    
                
            });
            return false;
        });
        /*DIALOGOS DE VALIDACION*/
        $('.mensaje').dialog({
            autoOpen: false,
            width: 400,
            buttons: {
                "Ok": function() {
                    $(this).dialog("close");
                }
            }
        });
        /*FIN DIALOGOS VALIDACION*/
     
    });
</script>

<h3 align="Center">Etapa 0: Seleccion de Municipios</h3>
<h3 align="Center">Registro de la integración de grupos</h3>
<form id="grupoForm" method="post"></form>
<center>
    <table>
        <tr>
        <td class="textD" ><strong>Seleccione el grupo</strong></td>
        <td> <select id='selConsul'>
                <option value='0'>--Seleccione Grupo--</option>
                <?php foreach ($grupos as $grupo) { ?>
                    <option value='<?php echo $grupo->gru_id; ?>'><?php echo $grupo->gru_numero; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
        <?php if( $rol!='apr') {?>
        <tr>
        <td colspan="2">
            <br/>
            <center>
                <input type="button" id="agregarGrupo" value="Agregar Nuevo Grupo" />
            </center>
            <br/>
        </td>
        </tr>
        <?php } ?>
        <tr>
        <td colspan="2">Si desea agregar un municipio a un grupo realice los siguientes pasos:
            <ol>
                <li>La región.</li>
                <li>El departamento.</li>
                <li>El municipio</li>
                <li>Presione botón agregar</li>
            </ol>
        </td>
        </tr>
        <tr>
        <td class="textD" ><strong>Región</strong></td>
        <td>  <select id='selRegion'>
                <option value='0'>--Seleccione Region--</option>
            </select>
        </td>
        </tr>
        <tr>
        <td class="textD" ><strong>Departamento</strong></td>
        <td>
            <select id='selDepto'>
                <option value='0'>--Seleccione Departamento--</option>
            </select>
        </td>
        </tr>
        <tr>
        <td class="textD" ><strong>Municipio</strong></td>
        <td>
            <select id='selMun'>
                <option value='0'>--Seleccione Municipio--</option>
            </select>
        </td>
        </tr>
    </table>
    <br/><br/>
    <input type="button" id="agregar" value="  Asignar  " />
    <input type="button" id="eliminar" value="   Desasignar   " />
    <br/><br/><br/>
    <table id="municipios"></table>
    <div id="pager"></div>


</center>
<div id="mensaje3" class="mensaje" title="Recuerde:">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/alert.png'); ?>" class="imagenError" />
            Debe Seleccionar la Region, el Departamento y el 
            Municipio para poder agruparlo a la consulta seleccionada
        </p>
    </center>
</div>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>Se desasigno el municipio con éxito</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar un municipio a desasignar</p>
</div>