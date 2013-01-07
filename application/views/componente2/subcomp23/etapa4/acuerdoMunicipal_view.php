<script type="text/javascript">        
    $(document).ready(function(){
        
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E4/guardarAcuerdoMunicipal').'/'.$acu_mun_id; ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/comp23_E4/'); ?>';
        });
        /*PARA EL DATEPICKER*/
        $( "#acu_mun_fecha_borrador").datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        
        $( "#acu_mun_fecha_observacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#acu_mun_fecha_aceptacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        
        function validaSexo(value, colname) {
            if (value == 0 ) return [false,"Seleccione el Sexo del Participante"];
            else return [true,""];
        }
        
        function validaPerteneceA(value, colname) {
            if (value == 0 ) return [false,"Seleccione la pertenencia del participante"];
            else return [true,""];
        }
        
        var tabla=$("#participantes");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E4/cargarParticipantes').'/acu_mun_id/'.$acu_mun_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E2/gestionParticipantes').'/acu_mun_id/'.$acu_mun_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombres','Apellidos','Sexo','Cargo','Pertenece A'],
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
                {name:'par_sexo',index:'par_sexo',editable:true,edittype:"select",width:40,
                    editoptions:{ value: '0:Seleccione;F:Femenino;M:Masculino' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaSexo}
                },
                {name:'par_cargo',index:'par_cargo',width:250,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_tipo',index:'par_tipo',editable:true,edittype:"select",width:125,
                    editoptions:{ value: '0:Seleccione;gg:Grupo Gestor;gl:Gobierno Local' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaPerteneceA}
                }
            ],
            multiselect: false,
            caption: "Personal de Enlace Municipal",
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
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        $("#agregar").button().click(function(){
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
        
        $("#editar").button().click(function(){
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
        
        /*  PARA SUBIR EL ARCHIVO  */
        var button = $('#btn_subir'), interval;
        new AjaxUpload('#btn_subir', {
            action: '<?php echo base_url('componente2/comp23_E1/subirArchivo') . '/acuerdo_municipal/' . $acu_mun_id . '/acu_mun_id'; ?>',
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
                    $('#vinietaD').val('Descargar Archivo');
                    $('#acu_mun_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                    ext= (response.substring(response.lastIndexOf("."))).toLowerCase(); 
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
    });
</script>
<form method="post">
    <h2 class="h2Titulos">Etapa 4: Acompañamiento y Seguimiento</h2>
    <h2 class="h2Titulos">Producto 1: Acuerdo Municipal</h2>

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

    <fieldset style="width:450px;">
        <legend><strong>Elementos mínimos del Acuerdo Municipal</strong></legend>
        <table>
            <tr>
            <td width="350 px">Existe comprimiso de asignar y gestionar recursos para la divulgación e implementaciòn del PEP</td>
            <td><input type="radio" name="acu_mun_p1" value="true" <?php if (isset($acu_mun_p1) && $acu_mun_p1 == 't') { ?> checked <?php } ?>>SI </input>
                <input type="radio" name="acu_mun_p1" value="false"<?php if (isset($acu_mun_p1) && $acu_mun_p1 == 'f') { ?> checked <?php } ?>>NO </input></td>
            </tr>
        </table>
    </fieldset>
    <br/>
    <table>
        <tr> <td><strong>Fecha de presentación del borrador: </strong></td><td><input <?php if (isset($acu_mun_fecha_borrador)) { ?> value='<?php echo date('d/m/y', strtotime($acu_mun_fecha_borrador)); ?>'<?php } ?> id="acu_mun_fecha_borrador" name="acu_mun_fecha_borrador" type="text" size="10" /></td></tr>
        <tr><td><strong>Fecha de superación de observaciones: </strong></td><td><input <?php if (isset($acu_mun_fecha_observacion)) { ?> value='<?php echo date('d/m/y', strtotime($acu_mun_fecha_observacion)); ?>'<?php } ?> id="acu_mun_fecha_observacion" name="acu_mun_fecha_observacion" type="text" size="10"/></td></tr>
        <tr> <td><strong>Fecha de aprobacion del consejo municipal: </td><td></strong><input <?php if (isset($acu_mun_fecha_aceptacion)) { ?> value='<?php echo date('d/m/y', strtotime($acu_mun_fecha_aceptacion)); ?>'<?php } ?> id="acu_mun_fecha_aceptacion" name="acu_mun_fecha_aceptacion" type="text" size="10"/></td></tr>
    </table>
    <br/>
    <table id="participantes"></table>
    <div id="pagerParticipantes"></div>

    <div style="position: relative;left: 275px; top: 5px;">
        <input type="button" id="agregar" value="  Agregar  " />
        <input type="button" id="editar" value="   Editar   " />
        <input type="button" id="eliminar" value="  Eliminar  " />
    </div>
    <br/><br/>
    <p>Observaciones:<br/>
        <textarea name="acu_mun_observacion" cols="48" rows="5"><?php echo$acu_mun_observacion; ?></textarea></p>
    <table>
        <tr>
        <td><div id="btn_subir"></div></td>
        <td><input class="letraazul" type="text" id="vinieta" value="Subir Acuerdo Municipal" size="30" style="border: none"/></td>
        </tr>
        <tr>
        <td><a <?php if (isset($acu_mun_ruta_archivo) && $acu_mun_ruta_archivo != '') { ?> href="<?php echo base_url() . $acu_mun_ruta_archivo; ?>"<?php } ?>  id="btn_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
        <td><input class="letraazul" type="text" id="vinietaD" <?php if (isset($acu_mun_ruta_archivo) && $acu_mun_ruta_archivo != '') { ?>value="Descargar Acuerdo Municipal"<?php } else { ?> value="No Hay Acuerdo Por Descargar" <?php } ?>size="30" style="border: none"/></td>
        </tr>
    </table>
    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Guardar Acuerdo" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
    <input id="acu_mun_ruta_archivo" name="acu_mun_ruta_archivo" <?php if (isset($acu_mun_ruta_archivo) && $acu_mun_ruta_archivo != '') { ?>value="<?php echo $acu_mun_ruta_archivo; ?>"<?php } ?> type="text" size="100" readonly="readonly" style="visibility: hidden"/>
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
