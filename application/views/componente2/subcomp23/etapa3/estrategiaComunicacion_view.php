<script type="text/javascript">        
    $(document).ready(function(){
 <?php if (isset($guardo)){?>
                $('#guardo').dialog();
                <?php }?>
        var tabla=$("#actores");
        /*ZONA DE BOTONES*/
        $("#agregar").button().click(function(){
            tabla.jqGrid('editGridRow',"new",
            {closeAfterAdd:true,addCaption: "Agregar Actor Estratégico",width:450,
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                bottominfo:"Campos marcados con (*) son obligatorios", 
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                }
            });
        });
        
        $("#editar").button().click(function(){
            var gr = tabla.jqGrid('getGridParam','selrow');
            if( gr != null )
                tabla.jqGrid('editGridRow',gr,
            {closeAfterEdit:true,editCaption: "Editando Actor Estratégico",width:450,
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                bottominfo:"Campos marcados con (*) son obligatorios", 
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                    ;}
            });
            else $('#mensaje2').dialog('open'); 
        });
        
        $("#eliminar").button().click(function(){
            var grs = tabla.jqGrid('getGridParam','selrow');
            if( grs != null ) tabla.jqGrid('delGridRow',grs,
            {msg: "¿Desea Eliminar este Actor Estratégico?",caption:"Eliminando ",
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');                            
                }}); 
            else $('#mensaje2').dialog('open'); 
        });
        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E3/guardarEstrategiaComunicacion') ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        function validaInstitucion(value, colname) {
            if (value == 0 ) return [false,"Seleccione el tipo del actor"];
            else return [true,""];
        }
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E3/cargarActores') . '/' . $est_com_id ?>',
            editurl:'<?php echo base_url('componente2/comp23_E3/gestionarActores') . '/' . $est_com_id ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombres','Fecha','Tipo Actor','Mujeres','Hombre'],
            colModel:[
                {name:'aut_est_id',index:'aut_est_id', width:40,editable:false,editoptions:{size:15} },
                {name:'aut_est_nombre',index:'aut_est_nombre',width:200,editable:true,
                    editoptions:{size:25,maxlength:250}, 
                    formoptions:{label: "Nombre",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'aut_est_fecha',index:'aut_est_fecha',width:200,editable:true,
                    edittype: 'text',
                    editoptions: {size: 10, maxlengh: 10,
                        dataInit: function(element) {
                            $(element).datepicker(
                            {dateFormat: 'dd-mm-yy',
                                buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
                                buttonImageOnly: true
                            
                            })
                        }},
                    formoptions:{label: "Fecha",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'tip_act_id',index:'tip_act_id',editable:true,
                    edittype:"select",width:250,
                    editoptions:{ dataUrl:'<?php echo base_url('componente2/comp23_E3/cargarTiposActores'); ?>'}, 
                    formoptions:{ label: "Tipo Actor",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaInstitucion}
                },
                {name:'aut_est_cantidadm',index:'aut_est_cantidadm',width:120,editable:true,
                    editoptions:{ size:25,dataInit: function(elem){$(elem).bind("keypress", function(e) {return numeros(e)})}}, 
                    formoptions:{ label: "Mujeres",elmprefix:"(*)",elmsuffix:"Con formato 9999"},
                    editrules:{required:true,integer:true} 
                },
                {name:'aut_est_cantidadh',index:'aut_est_cantidadh',width:120,editable:true,
                   editoptions:{ size:25,dataInit: function(elem){$(elem).bind("keypress", function(e) {return numeros(e)})}}, 
                    formoptions:{ label: "Hombres",elmprefix:"(*)",elmsuffix:"Con formato 9999"},
                    editrules:{required:true,integer:true} 
                }
            ],
            multiselect: false,
            caption: "Actores en la Asamblea",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerActores'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerActores',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('aut_est_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        
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
<form class="cmxform" id="planInversionForm" method="post">
    <h2 class="h2Titulos">Etapa 3: Plan Estratégico Participativo</h2>
    <h2 class="h2Titulos">Estrategias de comunicación y gestión</h2>

    <br/><br/>
    <table>
        <tr>
        <td class="tdLugar" ><strong>Departamento:</strong></td>
        <td><?php echo $departamento ?></td>
        <td class="tdEspacio"></td>
        <td class="tdLugar"><strong>Municipio:</strong></td>
        <td ><?php echo $municipio ?></td>    
        </tr>
    </table>
    <br/><br/>
    <table id="actores"></table>
    <div id="pagerActores"></div>
    <div style="position: relative;left: 275px; top: 5px;">
        <input type="button" id="agregar" value="  Agregar  " />
        <input type="button" id="editar" value="   Editar   " />
        <input type="button" id="eliminar" value="  Eliminar  " />
    </div>
    <br/><br/>
    <center>
        <p>Observaciones y/o Recomendaciones:<br/>
            <textarea name="est_com_observacion" cols="48" rows="5"><?php if (isset($est_com_observacion)) echo $est_com_observacion; ?></textarea></p>
        <p > 
            <input type="submit" id="guardar" value="Guardar Estrategia" />
            <input type="button" id="cancelar" value="Cancelar" />
        </p>
    </center>
<input type="text" id="est_com_id" name="est_com_id" value="<?php echo $est_com_id; ?>" style="visibility: hidden" />

</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>
<div id="extension" class="mensaje" title="Error">
    <p>Solo se permiten archivos con la extensión pdf|doc|docx</p>
</div>
<div id="guardo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>