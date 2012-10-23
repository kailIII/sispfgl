
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
        var tabla=$("#participantes");
        tabla.jqGrid({
            url:'<?php echo base_url('') ?>',
            //editurl:'welcome/gestionArticulo',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Dui','Nombres','Apellidos','Sexo','Edad','Proviene R/U','Cargo','Nivel Escolar','Teléfono'],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_dui',index:'par_dui', width:100,editable:true,editoptions:{size:15}, 
                    formoptions:{label: "Dui",elmprefix:"(*)"},
                    editrules:{required:true} },
                
                {name:'par_nombre',index:'par_nombre',width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_apellido',index:'par_apellido',width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Apellidos",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_sexo',index:'par_sexo',editable:true,edittype:"select",width:50,
                    align:"center",
                    editoptions:{ value: '0:Seleccione;F:Femenino; M:Masculino' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validar}
                },
             
                {name:'par_edad',index:'par_edad',width:80,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Edad",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                
                {name:'par_proviene',index:'par_proviene',width:80,edittype:"select",
                    editable:true,
                    editoptions:{ value: '0:Seleccione;u:Urbano; r:Rural' }, 
                    formoptions:{ label: "Proviene de",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validar}
                },
                   
                   
                {name:'par_cargo',index:'par_cargo',width:100,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_nivel_esco',index:'par_nivel_esco',width:100,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Nivel Escolar",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                
                
                {name:'par_tel',index:'par_tel',width:100,editable:true,
                    editoptions:{size:10,maxlength:9}, 
                    formoptions:{ label: "Teléfono",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Agregar Otros Participantes",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerParticipantes'),
            viewrecords: true     
        }).jqGrid('navGrid','#pagerParticipantes',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('par_id');
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
                    ;}
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
        var tabla=$("#MiembroELA");
        tabla.jqGrid({
            url:'<?php echo base_url('') ?>',
            //editurl:'welcome/gestionArticulo',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Dui','Nombres','Apellidos','Sexo','Edad','Proviene R/U','Cargo','Nivel Escolar','Teléfono'],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_dui',index:'par_dui', width:100,editable:true,editoptions:{size:15}, 
                    formoptions:{label: "Dui",elmprefix:"(*)"},
                    editrules:{required:true} },
                
                {name:'par_nombre',index:'par_nombre',width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_apellido',index:'par_apellido',width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Apellidos",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_sexo',index:'par_sexo',editable:true,edittype:"select",width:50,
                    align:"center",
                    editoptions:{ value: '0:Seleccione;F:Femenino; M:Masculino' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validar}
                },
             
                {name:'par_edad',index:'par_edad',width:80,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Edad",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                
                {name:'par_proviene',index:'par_proviene',width:80,edittype:"select",
                    editable:true,
                    editoptions:{ value: '0:Seleccione;u:Urbano; r:Rural' }, 
                    formoptions:{ label: "Proviene de",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validar}
                },
                   
                   
                {name:'par_cargo',index:'par_cargo',width:100,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_nivel_esco',index:'par_nivel_esco',width:100,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Nivel Escolar",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                
                
                {name:'par_tel',index:'par_tel',width:100,editable:true,
                    editoptions:{size:10,maxlength:9}, 
                    formoptions:{ label: "Teléfono",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Miembros del Equipo Local de Apoyo",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerMiembroEla'),
            viewrecords: true     
        }).jqGrid('navGrid','#pagerMiembroEla',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('par_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        
        
        
        /*GRID FACILITADORES*/
        var tabla=$("#Facilitadores");
        tabla.jqGrid({
            url:'<?php echo base_url('') ?>',
            //editurl:'welcome/gestionArticulo',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombres','Apellidos','Telefono','Email'],
            colModel:[
                {name:'con_id',index:'con_id', width:40,editable:false,editoptions:{size:15} },
                {name:'con_nombre',index:'con_nombre',width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'con_apellido',index:'con_apellido',width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Apellidos",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'con_telefono',index:'con_telefono',width:100,editable:true,
                    editoptions:{size:25,maxlength:9}, 
                    formoptions:{label: "Telefono",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'con_email',index:'con_email',width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Amail",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                               
            ],
            multiselect: false,
            caption: "Facilitadores",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerFacilitadores'),
            viewrecords: true     
        }).jqGrid('navGrid','#pagerFacilitadores',
        {edit:false,add:true,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol(['con_id','con_telefono']);
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        
        
    });
    
    
</script>

<form>
   <div style="margin-left: 70px;">
        <h2 class="h2Titulos">Etapa 1: Condiciones Previas</h2>
        <h2 class="h2Titulos">Producto 4: Capacitaciones Local de Apoyo</h2>


        <table>
            <tr>
            <td ><strong>Departamento:</strong></td>
            <td ><strong>Municipio:</strong></td>
            </tr>
            <tr>
            <td  ><strong>Fecha de Capacitaciòn: </strong><input id="cap_fecha" name="cap_fecha" type="text" size="10"/></td>
            <td ><strong>Area de Capacitaciòn:</strong><input id="cap_lugar" name="cap_lugar" type="text" size="40"/></td>
            </tr>
            <tr>
            <td ><strong>Lugar:</strong><input id="cap_lugar" name="cap_lugar" type="text" size="40"/></td>
            </tr>
        </table>
        <br></br>
        <center>     
            <table id="Facilitadores" style="al"></table>
        <div id="pagerFacilitadores"></div>
        </center>  
        <br></br>
        <table id="MiembroELA"></table>
        <div id="pagerMiembroEla"></div>
        <br></br>
        <table id="participantes"></table>
        <div id="pagerParticipantes"></div>

        <div style="position: relative;left: 200px;top: 5px">
            <input type="button" id="agregar" value="  Agregar  " />
            <input type="button" id="editar" value="   Editar   " />
            <input type="button" id="eliminar" value="  Eliminar  " />
            <br></br>
        </div>

    </div>
    <table style="position: relative;left: 40px;top: 20px;border-color: 2px solid blue">
        <tr>
        <td>
            <!-- <div style="float: left; width: 400px;left: 70px;position: relative;top:20px;border: 2px solid black;"> -->

            <p>Observaciones y/o Recomendaciones:</br>
                <textarea id="acu_mun_observacion" cols="48" rows="5"></textarea></p>

        </td>
        <td>
            <!--   </div> --> 

            <!--    <div style="float: left;width: 250;position: relative;left:150px;top: 30px;border: 2px solid black;">-->
        <fieldset   style="border-color: #2F589F;height:85px;width:175px;position: relative;left: 50px;">
            <legend align="center"><strong>Cantidad de Participantes</strong></legend>
            <table>
                <tr>
                <td class="textD">Hombres: </td>
                <td><input class="bordeNo" id="hombres" type="text" size="5" readonly="readonly" /></td>
                </tr>
                <tr>
                <td class="textD">Mujeres: </td>
                <td><input class="bordeNo" id="mujeres" type="text" size="5" readonly="readonly" /></br></td>
                </tr>
                <tr>
                <td class="textD">Total: </td>
                <td><input class="bordeNo" id="total" type="text" size="5" readonly="readonly" /></td>
                </tr>
            </table> 
        </fieldset>
        </td>
        </tr>
    </table>
    <!--   </div>-->



    <center>
        <div style="position:relative;width: 300px;top: 25px">
            <p > 
                <input type="submit" id="guardar" value="Guardar Reunión" />
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

