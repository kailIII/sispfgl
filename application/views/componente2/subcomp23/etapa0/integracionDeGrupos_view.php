<script type="text/javascript">        
    $(document).ready(function(){    
        $('#pestanias').tabs();
        function validaMunicipio(value, colname) {
            if (value == 0 ) return [false,"Seleccione el municipio del proyecto"];
            else return [true,""];
        }
        /*CARGAR DEPARTAMENTOS*/
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
            $('#proPep').setGridParam({
                url:'<?php echo base_url('componente2/proyectoPep/cargarProyectosPorMunicipio') ?>?mun_id='+$('#selMun').val(),
                editurl:'<?php echo base_url('componente2/proyectoPep/gestionProyectoPep') ?>?mun_id='+$('select.#selMun').val(),
                datatype:'json'
            }).trigger("reloadGrid"); 
        });
                        
        var tabla=$("#proPep");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/proyectoPep/cargarProyectosPorMunicipio') ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['pro_pep_id','Nombre Proyecto'],//,'Etapa I','Etapa II','Etapa III','Etapa IV'],
            colModel:[
                {name:'id',index:'id', editable:false,editoptions:{size:15} },
                {name:'pro_pep_nombre',index:'pro_pep_nombre',editable:true,
                    edittype:"textarea",editoptions:{rows:"4",cols:"50"},width:'450', 
                    formoptions:{label: "Nombre",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Proyectos PEP",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pager'),
            viewrecords: true,
            gridComplete: 
                function(){
                $.getJSON('<?php echo base_url('componente2/proyectoPep/cuantosPepMuni') . '/'; ?>'+$('select.#selMun').val(),
                function(data) {
                    $.each(data, function(key, val) {
                        if(key=='rows'){
                            $.each(val, function(id, registro){
                                if(registro['cell'][0]!=0){
                                    $('#agregar').hide();
                                }
                                else{
                                    $('#agregar').show();
                                }
                            });                    
                        }
                    });
                }); 
            }
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
            if($('#selDepto').val()!='0' && $('#selRegion').val()!='0'&& $('#selMun').val()!='0'){
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
        $("#editar").button().click(function(){
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

<h3 align="Center">Etapa 0: Seleccion de Municipios</h3>
<h3 align="Center">Registro de la integracion de grupos</h3>
<center>
    
    Consultora
     <select id='selConsul'>
        <option value='0'>--Seleccione Consultora--</option>
    </select>
    <br/><br/>
    Región
    <select id='selRegion'>
        <option value='0'>--Seleccione Region--</option>
        <?php foreach ($regiones as $region) { ?>
            <option value='<?php echo $region->reg_id; ?>'><?php echo $region->reg_nombre; ?></option>
        <?php } ?>
    </select>
    <br/><br/>
    Departamento
    <select id='selDepto'>
        <option value='0'>--Seleccione Departamento--</option>
    </select>
    <br/><br/>
    Municipio
    <select id='selMun'>
        <option value='0'>--Seleccione Municipio--</option>
    </select>

    <br/><br/><br/>
    <table id="proPep"></table>
    <div id="pager"></div>
    <br/><br/>
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
    <p>Debe Seleccionar la Region, el Departamento y el Municipio 
        para poder agregar un nuevo Proyecto PEP
    </p>
</div>