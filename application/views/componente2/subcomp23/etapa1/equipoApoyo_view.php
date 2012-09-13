<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
        $("#agregar").button();
        $("#editar").button();
        $("#eliminar").button();
        $("#guardar").button();
        $("#cancelar").button();
        
        /*PARA EL DATEPICKER*/
        $( "#reu_fecha" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        /*ZONA DE VALIDACIONES*/
        function validaSexo(value, colname) {
            if (value == 0 ) return [false,"Seleccione el Sexo del Participante"];
            else return [true,""];
        }
        /*FIN ZONA VALIDACIONES*/
        /*GRID PARTICIPANTES*/
        var tabla=$("#participantes");
        tabla.jqGrid({
            //url: 'welcome/muestraArticulos',
            //editurl:'welcome/gestionArticulo',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Dui','Nombres','Apellidos','Sexo','Edad','Proviene R/U','Cargo','Nivel Escolar','Teléfono'],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_dui',index:'par_dui', width:100,editable:false,editoptions:{size:15} },
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
                    editoptions:{ value: '0:Seleccione;f:Femenino; m:Masculino' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaSexo}
                },
             
                {name:'par_edad',index:'par_edad',width:80,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Edad",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                
                {name:'par_proviene',index:'par_proviene',width:80,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Proviene de",elmprefix:"(*)"},
                    editrules:{required:true} 
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
                height:200,align:'center',reloadAfterSubmit:true,width:550,
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
                height:200,align:'center',reloadAfterSubmit:true,width:550,
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
            
    });
    
    
</script>

<form>
    <div style="position: relative;left: 20px;">
        <h2 class="h2Titulos">Etapa 1: Condiciones Previas</h2>
        <h2 class="h2Titulos">Producto 3: Equipo Local de Apoyo</h2>


        <table>
            <tr>
            <td  width="200"><strong>Departamento:</strong></td>
            <td  width="200"><strong>Municipio:</strong></td>
            </tr>
            <tr>
            <td  width="200"><strong>Lugar:</strong></td>
            <td  width="200"><strong>Fecha: </strong><input id="reu_fecha" name="reu_fecha" type="text" size="10"/></td>
            </tr>

        </table>

        <table id="participantes"></table>
        <div id="pagerParticipantes"></div>

        <div style="position: relative;left: 200px;top: 5px">
            <input type="button" id="agregar" value="  Agregar  " />
            <input type="button" id="editar" value="   Editar   " />
            <input type="button" id="eliminar" value="  Eliminar  " />
            <br></br>
        </div>

    </div>
    <table style="position: relative;top: 20px;border-color: 2px solid blue">
        <tr>
        <td>
            <!-- <div style="float: left; width: 400px;left: 70px;position: relative;top:20px;border: 2px solid black;"> -->
            <p>¿Los Miembros del Equipo Local de Apoyo Reunen las Caracterìsticas Siguientes?</p>
        <fieldset style="width: 400px;border-color: #2F589F">
            <legend><strong>Caracterìsticas</strong></legend>
            <table>
                <tr>
                <td>Mayores de 15 Años </td>
                <td><input type="radio" name="mayor15" value="true">SI </input></td>
                <td><input type="radio" name="mayor15" value="false">NO </input></td>
                </tr>
                <tr>
                <td>El 50% de los Miembros son Mujeres </td>
                <td><input type="radio" name="porcenMujeres" value="true">SI </input></td>
                <td><input type="radio" name="porcenMujeres" value="false">NO </input></td>    
                </tr>
                <tr>
                <td>Conocen el Territorio </td>
                <td><input type="radio" name="conTerritorio" value="true">SI </input></td>
                <td><input type="radio" name="conTerritorio" value="false">NO </input></td> 
                </tr>
                <tr>
                <td>Tienen Potencial de Liderazgo </td>
                <td><input type="radio" name="potencialLider" value="true">SI </input></td>
                <td><input type="radio" name="potencialLider" value="false">NO </input></td>   
                </tr>
            </table>  
        </fieldset>
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

    <div style="position:relative;top:25px;">
        <p>Observaciones:</br>
            <textarea id="acu_mun_observacion" cols="48" rows="5"></textarea></p>
    </div>

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

