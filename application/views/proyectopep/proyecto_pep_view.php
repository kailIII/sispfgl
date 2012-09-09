<script type="text/javascript">        
    $(document).ready(function(){    
        $('#pestanias').tabs();
        function validaMunicipio(value, colname) {
            if (value == 0 ) return [false,"Seleccione el municipio del proyecto"];
            else return [true,""];
        }
        /*GRID PARTICIPANTES*/
        $('#selRegion').change(function(){   
            $('#selDepto').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarDepartamentos') ?>?reg_id='+$('#selRegion').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#selDepto').append('<option value="0">--Seleccione Departamento--</option>');
                        $.each(val, function(id, registro){
                            $('#selDepto').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
        $('#selDepto').change(function(){
            $('#proPep').setGridParam({
                url:'<?php echo base_url('componente2/proyectoPep/cargarProyectosPorRegion') ?>?dep_id='+$('#selDepto').val(),
                datatype:'json'
            }).trigger("reloadGrid"); 
        });
        
        $("#agregar").button();
        $("#editar").button();
                
        var tabla=$("#proPep");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/proyectoPep/cargarProyectosPorRegion') ?>',
            editurl:'<?php echo base_url('componente2/proyectoPep/gestionarProyectoPep') ?>?reg_id='+$('#selRegion').val()+'&dep_id='+$('#selDepto').val(),
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['pro_pep_id','Nombre Proyecto','Municipio','Etapa I','Etapa II','Etapa III','Etapa IV'],
            colModel:[
                {name:'id',index:'id', editable:false,editoptions:{size:15} },
                {name:'pro_pep_nombre',index:'pro_pep_nombre',editable:true,
                    edittype:"textarea",editoptions:{rows:"4",cols:"50"},width:'450', 
                    formoptions:{label: "Nombre",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'mun_id',index:'mun_id',editable:true,
                    edittype:"select",
                    editoptions:{ dataUrl:'<?php echo base_url('componente2/proyectoPep/cargarMunicipios'); ?>?dep_id='+$('#selDepto').val()},  
                    formoptions:{ label: "Municipio",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaMunicipio}
                },
                {name:'etapa1',index:'etapa1',editable:false,
                    edittype:"checkbox",width:60,
                    editoptions: { value:"SI:NO" }
                },
                {name:'etapa2',index:'etapa2',editable:false,
                    edittype:"checkbox",width:60,
                    editoptions: { value:"SI:NO"}
                },
                {name:'etapa3',index:'etapa3',editable:false,
                    edittype:"checkbox",width:60,
                    editoptions: { value:"SI:NO"}
                },
                {name:'etapa4',index:'etapa4',editable:false,
                    edittype:"checkbox",width:60,
                    editoptions: { value:"SI:NO"}
                }
            ],
            multiselect: false,
            caption: "Proyectos PEP",
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
        $("#agregar").click(function(){
            if($('#selDepto').val()!='0' && $('#selRegion').val()!='0'){
                tabla.jqGrid('editGridRow',"new",
                {closeAfterAdd:true,addCaption: "Agregar ",width:'500',
                    reloadAfterSubmit:true,top:'300',left:'300',
                    processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                    bottominfo:"Campos marcados con (*) son obligatorios", 
                    onclickSubmit: function(rp_ge, postdata) {
                        $('#mensaje').dialog('open');
                    }
                });
            }
            else
                $('#mensaje3').dialog('open'); 
            
        });

        //EDITAR
        $("#editar").click(function(){
        
            var gr = tabla.jqGrid('getGridParam','selrow');
            if( gr != null )
                tabla.jqGrid('editGridRow',gr,
            {closeAfterEdit:true,editCaption: "Editando ",
                top:'300',left:'300',width:'500',
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                bottominfo:"Campos marcados con (*) son obligatorios", 
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                    ;}
            });
            else $('#mensaje2').dialog('open'); 
        
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
     
    });
</script>
<h2 class="demoHeaders" align="Center">Proyectos PEP</h2>
<p>En las siguientes pestañas se muestran los proyectos PEP que actualmente estan 
    desarrollandose en el Programa de Fortalecimiento de Gobiernos Locales. Estos proyectos
    estan dividos por las 5 regiones que conforman El Salvador.</p>
<p>Seleccione la Región para poder ver los proyectos.</p>
<center>
    <select id='selRegion'>
        <option value='0'>--Seleccione Region--</option>
        <?php foreach ($regiones as $region) { ?>
            <option value='<?php echo $region->reg_id; ?>'><?php echo $region->reg_nombre; ?></option>
        <?php } ?>
    </select>
    </br></br></br>
    <select id='selDepto'>
        <option value='0'>--Seleccione Departamento--</option>
    </select>
</center>
</br></br></br>
<table id="proPep"></table>
<div id="pager"></div>
<center>
    <input type="button" id="agregar" value="  Agregar  " />
    <input type="button" id="editar" value="   Editar   " />

</center>
<!-- SON LOS MENSAJES DE VALIDACION DE CAMPOS -->
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>
<div id="mensaje3" class="mensaje" title="Recuerde:">
    <p>Debe Seleccionar la Region y el Departamento del Proyecto para poder
        agregar un nuevo Proyecto PEP
    </p>
</div>