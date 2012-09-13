<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
        $("#agregar").button();
        $("#editar").button();
        $("#eliminar").button();
        $("#guardar").button();
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/subComp23/muestraReuniones'); ?>';
        });
        
        
        /*PARA EL DATEPICKER*/
        $( "#dec_int_fecha" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo base_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        /*ZONA DE VALIDACIONES*/
        function validaSexo(value, colname) {
            if (value == 0 ) return [false,"Seleccione el Sexo del Participante"];
            else return [true,""];
        }
        function validaInstitucion(value, colname) {
            if (value == 0 ) return [false,"Seleccione la institucion del Participante"];
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
            colNames:['id','Nombres','Apellidos','Sexo','Institución','Cargo'],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_nombre',index:'par_nombre',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_apellido',index:'par_apellido',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Apellidos",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_sexo',index:'par_sexo',editable:true,edittype:"select",width:50,
                    editoptions:{ value: '0:Seleccione;f:Femenino; m:Masculino' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaSexo}
                },
                {name:'par_institucion',index:'par_institucion',editable:true,
                    edittype:"select",width:250,
                    editoptions:{ dataUrl:'<?php echo base_url('componente2/subComp23/cargarInstituciones'); ?>'}, 
                    formoptions:{ label: "Institución",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaInstitucion}
                },
                {name:'par_cargo',index:'par_cargo',width:120,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Participantes en la Asamblea",
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
                align:'center',reloadAfterSubmit:true,
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
                align:'center',reloadAfterSubmit:true,
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
                align:'center',reloadAfterSubmit:true,
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

<form action="<?php echo base_url('componente2/subComp23/'); ?>">
    <h2 class="h2Titulos">Etapa 1: Preparacion de Condiciones Previas</h2>
    <h2 class="h2Titulos">Producto 2: Declaración de Interes de la Población de Participar en el Proceso</h2>
 <br>
    <div style="position: relative;left: 70px;">
        <table>
            <tr>
            <td><strong>Departamento:</strong></td>
            <td width="200px">San Salvador</td>
            <td><strong>Municipio:</strong></td>
            <td width="200px">San Salvador</td>
            <td><strong>Fecha: </strong><input id="dec_int_fecha" name="dec_int_fecha" type="text" size="10"/></td>
            <td></td>   
            </tr>
        </table>

        <p><strong>Lugar : </strong><input id="dec_int_lugar" type="text" size="50"></input></p>
        <br>
        <table id="participantes"></table>
        <div id="pagerParticipantes"></div>

        <div style="position: relative;left: 275px;top: 5px">
            <input type="button" id="agregar" value="  Agregar  " />
            <input type="button" id="editar" value="   Editar   " />
            <input type="button" id="eliminar" value="  Eliminar  " />
        </div>

        </br>

          <table style="position: relative;top: 15px;">
            <tr>
            <td>
                <p><strong>Observaciones:</strong></br><textarea id="acu_mun_observacion" cols="48" rows="5"></textarea></p>
            </td>
            <td style="width: 50px"></td>
            <td>
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
        
         <center style="position: relative;top: 20px">
            
                <p><input type="submit" id="guardar" value="Guardar Declaración" />
                    <input type="button" id="cancelar" value="Cancelar" />
                </p>
            
        </center>
    </div>

</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>