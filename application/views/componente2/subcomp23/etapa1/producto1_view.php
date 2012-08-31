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
        $( "#reu_fecha" ).datepicker({
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
                {name:'par_sexo',index:'par_sexo',editable:true,edittype:"select",width:30,
                    editoptions:{ value: '0:Seleccione;f:Femenino; m:Masculino' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaSexo}
                },
                {name:'par_institucion',index:'par_institucion',editable:true,
                    edittype:"select",width:200,
                    editoptions:{ dataUrl:'<?php echo base_url('componente2/subComp23/cargarInstituciones'); ?>'}, 
                    formoptions:{ label: "Institución",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaInstitucion}
                },
                {name:'par_cargo',index:'par_cargo',width:100,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Participantes",
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
    <h2 class="h2Titulos">Etapa 1: Condiciones Previas</h2>
    <h2 class="h2Titulos">Producto 1: Acuerdo Municipal</h2>
    <h2 class="h2Titulos">Registro de Reuniones</h2>
    <div style="position: relative;left: 70px;">
        <table>
            <tr>
                <td><strong>Departamento:</strong></td>
                <td></td>
                <td><strong>Municipio:</strong></td>
            </tr>
            <tr>
                <td width="200">No. de Reunión: <input type="text" id="reu_numero" size="5" readonly="readonly"/> </td>
                <td width="200">Fecha: <input id="reu_fecha" name="reu_fecha" type="text" size="10"/></td>
                <td width="200"><p>Duración en Horas:<input type="text" id="reu_duracion_horas" size="5"/></p></td>
            </tr>
        </table>
        <p>Tema o Agenda a Desarrollar: <textarea id="reu_tema" cols="50" rows="2"></textarea></p>
        <table id="participantes"></table>
        <div id="pagerParticipantes"></div>
        <div style="position: relative;left: 200px;">
            <input type="button" id="agregar" value="  Agregar  " />
            <input type="button" id="editar" value="   Editar   " />
            <input type="button" id="eliminar" value="  Eliminar  " />
        </div>
        <p></p>
        <fieldset class="filsetParticipantes" style="position: relative;left: 300px;">
            <legend><strong>Cantidad de Participantes</strong></legend>
            <center>
                Hombres <input id="hombres" type="text" size="5" readonly="readonly"/>
                Mujeres <input id="mujeres" type="text" size="5" readonly="readonly"/>
                Total<input id="total" type="text" size="5" readonly="readonly"/>
            </center>
        </fieldset>
        <p>Resultado de la Reunión:</br> <textarea id="reu_resultado" cols="30" rows="5"></textarea></p>
        <p style="position: absolute;left: 300px;top:300px;">Observaciones y/o Recomendaciones:</br><textarea id="reu_observacion" cols="30" rows="5"></textarea></p>
        <p style="position: relative;left: 200px;"><input type="submit" id="guardar" value="Guardar Reunión" />
        <input type="button" id="cancelar" value="Cancelar" />
        </p>
    </div>
</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>