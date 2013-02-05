<script type="text/javascript">        
    $(document).ready(function(){
         <?php if (isset($guardo)){?>
                $('#guardo').dialog();
                <?php }?>
        
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E4/guardarIntegracionInstancia') . '/' . $int_ins_id; ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/comp23_E4/'); ?>';
        });
          
        /*PARA EL DATEPICKER*/
        $( "#int_ins_fecha" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        /*  PARA SUBIR EL ARCHIVO  */
        var button = $('#btn_subir'), interval;
        new AjaxUpload('#btn_subir', {
            action: '<?php echo base_url('componente2/comp23_E1/subirArchivo') . '/integracion_instancia/' . $int_ins_id . '/int_ins_id'; ?>',
            onSubmit : function(file , ext){
                if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                    $('#extension').dialog('open');
                    return false;
                } else {
                    $('#vinieta').val('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response,ext){
                if(response!='error'){
                    $('#vinieta').val('Subido con Exito');
                    this.enable();			
                    ext= (response.substring(response.lastIndexOf("."))).toLowerCase();
                    nombre=response.substring(response.lastIndexOf("/")).toLowerCase().replace('/','');
                    $('#vinietaD').val('Descargar '+nombre);
                    $('#int_ins_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                    if (ext=='.pdf'){
                        $('#btn_descargar').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_blank'
                        });
                    }
                    else{
                        $('#btn_descargar').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_self'
                        });
                    }
                }else{
                    $('#vinieta').val('El Archivo debe ser menor a 1 MB.');
                    this.enable();			
                 
                }
                 
            }	
        });
        $('#btn_descargar').click(function() {
            $.get($(this).attr('href'));
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
        var tabla=$("#participantes");
        /*ZONA DE BOTONES*/
        $("#agregar").button().click(function(){
            tabla.jqGrid('editGridRow',"new",
            {closeAfterAdd:true,addCaption: "Agregar Participante",width:350,
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
            {closeAfterEdit:true,editCaption: "Editar Participante ",width:350,
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
            {msg: "¿Desea Eliminar este participante?",caption:"Eliminando ",
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');                            
                }}); 
            else $('#mensaje2').dialog('open'); 
        });
        function validar(value, colname) {
            if (value == 0 ) return [false,"Debe Seleccionar una Opción"];
            else return [true,""];
        }
        /*FIN ZONA VALIDACIONES*/
        /*GRID PARTICIPANTES*/
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E2/cargarParticipanteGG') . '/int_ins_id/' . $int_ins_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E2/gestionParticipantes') . '/int_ins_id/' . $int_ins_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Dui','Nombres','Apellidos','Sexo','Edad','Tipo','Cargo','Teléfono'],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_dui',index:'par_dui', width:100,editable:true,
                    editoptions:{size:25,maxlength: 10,dataInit:function(el){$(el).mask("99999999-9",{placeholder:" "});}},
                    formoptions:{label: "DUI"}
                },
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
                    editoptions:{ value: '0:Seleccione;M:Mujer;H:Hombre' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validar}
                },
                {name:'par_edad',index:'par_edad',width:80,editable:true,
                    editoptions:{ size:15,dataInit: function(elem){$(elem).bind("keypress", function(e) {return numeros(e)})}}, 
                    formoptions:{ label: "Edad",elmprefix:"(*)"},
                    editrules:{required:true,minValue:12,number:true} 
                },
                {name:'par_tipo',index:'par_tipo',width:80,edittype:"select",
                    editable:true,
                    editoptions:{ value: '0:Seleccione;C:Comunidad;S:Sector;I:Institución' }, 
                    formoptions:{ label: "Tipo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validar}
                },
                {name:'par_cargo',index:'par_cargo',width:100,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_tel',index:'par_tel',width:100,editable:true,
                    editoptions:{size:10,maxlength:9,dataInit:function(el){$(el).mask("9999-9999",{placeholder:" "});}}, 
                    formoptions:{ label: "Teléfono"} 
                }
            ],
            multiselect: false,
            caption: "Personas que integran la instancia de participación permanente",
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
    });
</script>
<form method="post">
    <h2 class="h2Titulos">Etapa 4: Acompañamiento y Seguimiento</h2>
    <h2 class="h2Titulos">Producto 2: Integración de Instancia de participación</h2>

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
    <table>
        <tr>  <td ><strong>Fecha: </strong></td>
        <td><input <?php if (isset($int_ins_fecha)) { ?> value='<?php echo date('d-m-Y', strtotime($int_ins_fecha)); ?>'<?php } ?>id="int_ins_fecha" name="int_ins_fecha" type="text" size="10" readonly="readonly"/></td>
        </tr>
    </table>
    <table id="participantes"></table>
    <div id="pagerParticipantes"></div>

    <div style="position: relative;left: 200px;top: 5px">
        <input type="button" id="agregar" value="  Agregar  " />
        <input type="button" id="editar" value="   Editar   " />
        <input type="button" id="eliminar" value="  Eliminar  " />
        <br/><br/>
    </div>
    <br/><br/>
    <p><strong>Cuenta la instancia de participación con </strong></p>
    <ul>
        <li>
            Plan de trabajo: 
            <input type="radio" name="int_ins_plan_trabajo" value="true"<?php if (isset($int_ins_plan_trabajo) && $int_ins_plan_trabajo == 't') { ?> checked <?php } ?>>SI </input>
            <input type="radio" name="int_ins_plan_trabajo" value="false"<?php if (isset($int_ins_plan_trabajo) && $int_ins_plan_trabajo == 'f') { ?> checked <?php } ?> >NO </input>
        </li>
        <li>
            Reglamento interno: 
            <input type="radio" name="int_ins_reglamento_int" value="true" <?php if (isset($int_ins_reglamento_int) && $int_ins_reglamento_int == 't') { ?> checked <?php } ?> >SI </input>
            <input type="radio" name="int_ins_reglamento_int" value="false" <?php if (isset($int_ins_reglamento_int) && $int_ins_reglamento_int == 'f') { ?> checked <?php } ?>>NO </input>   
        </li>
    </ul>
    <fieldset style="width:500px;">
        <legend><strong>¿En la elección de miembros de la instancia de participación permanente, se tomarón encuenta los criterios?</strong></legend>
        <center>
            <table>
                <?php foreach ($criterios as $aux) { ?>
                    <tr>
                    <td><?php echo $aux->cri_nombre; ?></td>
                    <td><input type="radio" <?php if (!strcasecmp($aux->cri_int_valor, 't')) { ?> checked <?php } ?> name="cri_<?php echo $aux->cri_id; ?>" value="true" >SI </input></td>
                    <td><input type="radio" <?php if (!strcasecmp($aux->cri_int_valor, 'f')) { ?> checked <?php } ?>name="cri_<?php echo $aux->cri_id; ?>" value="false" >NO </input></td>
                    </tr>
                <?php } ?>
            </table>  
        </center>
    </fieldset>
    <p>Observaciones:<br/>
        <textarea name="int_ins_observacion" cols="48" rows="5"><?php echo$int_ins_observacion; ?></textarea></p>
    <table>
        <tr><td colspan="2">Para actualizar un archivo basta con subir nuevamente el archivo y este se reemplaza automáticamente. Solo se permiten archivos con extensión pdf, doc, docx</td></tr>
        <tr>
        <td><div id="btn_subir"></div></td>
        <td><input class="letraazul" type="text" id="vinieta" readonly="readonly" value="Subir Acta de Constitucion" size="30" style="border: none"/></td>
        </tr>
        <tr>
        <td><a <?php if (isset($int_ins_ruta_archivo) && $int_ins_ruta_archivo != '') { ?> href="<?php echo base_url() . $int_ins_ruta_archivo; ?>"<?php } ?>  id="btn_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
        <td><input class="letraazul" type="text" id="vinietaD" readonly="readonly" <?php if (isset($int_ins_ruta_archivo) && $int_ins_ruta_archivo != '') { ?>value="Descargar <?php echo $nombreArchivo ?>"<?php } else { ?> value="No hay acta para descargar" <?php } ?>size="30" style="border: none"/></td>
        </tr>
    </table>
    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Guardar Integración de Instancia" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
    <input id="int_ins_ruta_archivo" name="int_ins_ruta_archivo" <?php if (isset($int_ins_ruta_archivo) && $int_ins_ruta_archivo != '') { ?>value="<?php echo $int_ins_ruta_archivo; ?>"<?php } ?> type="text" size="100" readonly="readonly" style="visibility: hidden"/>
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