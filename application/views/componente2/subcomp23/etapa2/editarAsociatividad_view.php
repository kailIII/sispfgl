<script type="text/javascript">        
    $(document).ready(function(){
        /*VARIABLES*/
        
        $("#guardar").button().click(function() {
            if($('#selTipo').val()==0)
                $('#mensaje3').dialog('open');
            else
                this.form.action='<?php echo base_url('componente2/comp23_E2/guardarAsociatividad') ?>';
        });
    $("#cancelar").button().click(function() {
        document.location.href='<?php echo base_url('componente2/comp23_E2/muestraAsociatividades'); ?>';
    });

/*PARA EL DATEPICKER*/
$( "#aso_fecha_constitucion" ).datepicker({
    showOn: 'both',
    buttonImage: '<?php echo base_url('resource/imagenes/calendario.png'); ?>',
    buttonImageOnly: true, 
    dateFormat: 'dd/mm/yy'
});
var tabla=$("#participantes");
/*ZONA DE BOTONES*/
$("#agregar").button().click(function(){
tabla.jqGrid('editGridRow',"new",
{closeAfterAdd:true,addCaption: "Agregar ",
align:'center',reloadAfterSubmit:true,
processData: "Cargando...",afterSubmit:despuesAgregarEditar,
bottominfo:"Campos marcados con (*) son obligatorios", width:450,
onclickSubmit: function(rp_ge, postdata) {
    $('#mensaje').dialog('open');
}
});
});
        
$("#editar").button().click(function(){
var gr = tabla.jqGrid('getGridParam','selrow');
if( gr != null )
tabla.jqGrid('editGridRow',gr,
{closeAfterEdit:true,editCaption: "Editando ",
align:'center',reloadAfterSubmit:true,
processData: "Cargando...",afterSubmit:despuesAgregarEditar,
bottominfo:"Campos marcados con (*) son obligatorios",width:450, 
onclickSubmit: function(rp_ge, postdata) {
$('#mensaje').dialog('open');
;}
});
else $('#mensaje2').dialog('open'); 
});
        
$("#eliminar").button().click(function(){
var grs = tabla.jqGrid('getGridParam','selrow');
if( grs != null ) tabla.jqGrid('delGridRow',grs,
{msg: "Desea Eliminar esta ?",caption:"Eliminando ",
align:'center',reloadAfterSubmit:true,
processData: "Cargando...",
onclickSubmit: function(rp_ge, postdata) {
$('#mensaje').dialog('open');                            
}}); 
else $('#mensaje2').dialog('open'); 
});
        
/*GRID PARTICIPANTES*/
tabla.jqGrid({
url:'<?php echo base_url('componente2/comp23_E2/cargarParticipantesAP') ?>/aso_id/<?php echo $aso_id; ?>',
editurl:'<?php echo base_url('componente2/comp23_E2/gestionParticipantes') ?>/asociatividad/aso_id/<?php echo $aso_id; ?>',
datatype:'json',
altRows:true,
height: "100%",
hidegrid: false,
colNames:['id','Nombres','Apellidos','Email','Teléfono','Dirección'],
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
{name:'par_email',index:'par_email',width:200,editable:true,
editoptions:{size:25,maxlength:50}, 
formoptions:{label: "Email",elmprefix:"(*)"},
editrules:{required:true,email: true} 
},
{name:'par_tel',index:'par_tel',width:100,editable:true,
editoptions:{size:10,maxlength:9,dataInit:function(el){$(el).mask("9999-9999",{placeholder:" "});}}, 
formoptions:{ label: "Teléfono",elmprefix:"(*)"},
editrules:{required:true} 
},
{name:'par_direccion',index:'par_direccion',width:120,editable:true,
edittype:"textarea",editoptions:{rows:"4",cols:"20",maxlength:250},width:150, 
formoptions:{ label: "Dirección:",elmprefix:"(*)"},
editrules:{required:true} 
}
],
multiselect: false,
caption: "Participantes en las Reuniones de Diagnóstico del Municipio",
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
        
/*INTEGRADO POR*/
var tabla3=$("#integrado");
tabla3.jqGrid({
url:'<?php echo base_url('componente2/comp23_E2/cargarIntegradores') . "/" . $aso_id; ?>',
editurl:'<?php echo base_url('componente2/comp23_E2/gestionarIntegradores') . "/" . $aso_id; ?>',
datatype:'json',
altRows:true,
height: "100%",
hidegrid: false,
colNames:['id','Nombre'],
colModel:[
{name:'int_aso_id',index:'int_aso_id', width:40,editable:false,editoptions:{size:15} },
{name:'int_aso_nombre',index:'int_aso_nombre',width:100,editable:true,
edittype:"textarea",editoptions:{rows:"4",cols:"20",maxlength:250},width:450, 
formoptions:{label: "Nombre",elmprefix:"(*)"},
editrules:{required:true} 
}           
],
multiselect: false,
caption: "Integrado Por",
rowNum:10,
rowList:[10,20,30],
loadonce:true,
pager: jQuery('#pagerIntegrado'),
viewrecords: true     
}).hideCol('int_aso_id').jqGrid('navGrid','#pagerIntegrado',
{edit:true,add:true,del:true,search:false,refresh:true,
beforeRefresh: function() {
tabla3.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
}
},//OPCIONES
{closeAfterEdit:true,editCaption: "Editando ",align:'center',reloadAfterSubmit:true,
processData: "Cargando...",afterSubmit:despuesAgregarEditar3,
bottominfo:"Campos marcados con (*) son obligatorios", width:350,
onclickSubmit: function(rp_ge, postdata) {
$('#mensaje').dialog('open');
}    
},//EDITAR
{closeAfterAdd:true,addCaption: "Agregar ", align:'center',reloadAfterSubmit:true,
processData: "Cargando...",afterSubmit:despuesAgregarEditar3,width:450,
bottominfo:"Campos marcados con (*) son obligatorios", 
onclickSubmit: function(rp_ge, postdata) {
$('#mensaje').dialog('open');
}
},//AGREGAR
{msg: "Desea Eliminar este registro?",caption:"Eliminando....",
align:'center',reloadAfterSubmit:true,processData: "Cargando...",
onclickSubmit: function(rp_ge, postdata) {
$('#mensaje').dialog('open');                            
}
}//ELIMINAR
);
/* Funcion para regargar los JQGRID FACILITADORES*/
function despuesAgregarEditar3() {
tabla3.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
return[true,'']; 
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
/*FIN DIALOGOS VALIDACION*/
//Validar formulario
$("#asociatividadForm").validate({
rules: {
aso_nombre: {
required: true,
maxlength: 250
},
aso_movil: {
required: true,
maxlength: 250
},
aso_apoyo: {
required: true,
maxlength: 250
}
}
});    
});
</script>
<form id="asociatividadForm" method="post">
    <h2 class="h2Titulos">Etapa 2: Diagnóstico del Municipio</h2>
    <h2 class="h2Titulos">Asociatividad del Municipio</h2>
    <br/><br/>
    <table width="850">
        <tr>
        <td ><strong>Departamento:</strong><?php echo $departamento ?></td>
        <td ><strong>Municipio:</strong><?php echo $municipio ?></td>
        </tr>
        <tr>
        <td colspan="2"><strong>Proyecto PEP:</strong><?php echo $proyectoPep ?></td>
        </tr>
    </table>
    <br/><br/>
    <h1 class="h2Titulos" >Contexto</strong></h1>
    <br/>
    <p><strong>Nombre:</strong><input type="text" id="aso_nombre" name="aso_nombre" value="<?php echo $aso_nombre ;?>" size="60" class="required" /></p>
    <table>
        <tr>
        <td rowspan="2">
            <table id="integrado"></table>
            <div id="pagerIntegrado"></div>
        </td>
        <td width="300">
            Tipo:<select id='selTipo' name="selTipo">
                <option value='0'>--Seleccione Tipo--</option>
                <?php foreach ($tipos as $tipo) { 
                            if($tip_id==$tipo->tip_id){
                ?>
                    <option value='<?php echo $tipo->tip_id; ?>' selected="selected"><?php echo $tipo->tip_nombre; ?></option>
                <?php }
                else{?>
                    <option value='<?php echo $tipo->tip_id; ?>'><?php echo $tipo->tip_nombre; ?></option>
                <?php }
                
                }
                ?>
            </select>
        </td>
        </tr>
        <tr>
        <td width="300">
            Fecha Constitución: 
            <input id="aso_fecha_constitucion" value="<?php echo date_format(date_create($aso_fecha_constitucion),"d-m-Y") ;?>" name="aso_fecha_constitucion" readonly="readonly" class="required"  size="10"/>
        </td>
        </tr>
    </table>
    <p><strong>Móvil de constitución:</strong><input type="text" id="aso_movil" name="aso_movil" value="<?php echo $aso_movil ;?>" size="60" class="required" /></p>
    <p><strong>Recibe apoyo de:</strong><input type="text"id="aso_apoyo" name="aso_apoyo" value="<?php echo $aso_apoyo ;?>"size="60" class="required" /></p>
    <p><strong>¿Tiene unidad técnica?</strong>
        <input type="radio" name="aso_unidad_tecnica" value="true" class="required" <?php if (!strcasecmp($aso_unidad_tecnica, 't')) { ?> checked <?php } ?>  >SI </input>
        <input type="radio" name="aso_unidad_tecnica" value="false" class="required" <?php if (!strcasecmp($aso_unidad_tecnica, 'f')) { ?> checked <?php } ?> >NO </input></p>
    <table id="participantes"></table>
    <div id="pagerParticipantes"></div>
    <div style="position: relative;left: 275px;top: 5px;">
        <input type="button" id="agregar" value="  Agregar  " />
        <input type="button" id="editar" value="   Editar   " />
        <input type="button" id="eliminar" value="  Eliminar  " />
    </div>
    <br/><br/><br/>
    <center>  <p><input type="submit" id="guardar" value="Guardar Asociatividad" />
            <input type="button" id="cancelar" value="Cancelar" />
        </p>
    </center>
    <input type="text"id="aso_id" name="aso_id" value="<?php echo $aso_id; ?>" size="60" style="visibility: hidden;" />
</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>
<div id="mensaje3" class="mensaje" title="Aviso">
    <p>Debe Seleccionar el tipo de la asociatividad</p>
</div>