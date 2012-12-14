<script type="text/javascript">        
    $(document).ready(function(){
        /*VARIABLES*/
        var tabla=$("#participantes");
        /*ZONA DE BOTONES*/
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
        
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E1/guardarAcuerdoMunicipal/' . $acu_mun_id); ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        /*PARA EL DATEPICKER*/
        $( "#acu_mun_fecha" ).datepicker({
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
        
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E1/cargarParticipantesAM') ?>/acu_mun_id/<?php echo $acu_mun_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E1/gestionParticipantes') ?>/acuerdo_municipal/acu_mun_id/<?php echo $acu_mun_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombres','Apellidos','Sexo','Cargo','Teléfono'],
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
                    editoptions:{ value: '0:Seleccione;f:Femenino;m:Masculino' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaSexo}
                },
                {name:'par_cargo',index:'par_cargo',width:250,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_tel',index:'par_tel',width:100,editable:true,
                    editoptions:{size:10,maxlength:9,dataInit:function(el){$(el).mask("9999-9999",{placeholder:" "});}}, 
                    formoptions:{ label: "Teléfono",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Personal de Enlace Municipal",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerParticipantes'),
            viewrecords: true,
            gridComplete: 
                function(){
                $.getJSON('<?php echo base_url('componente2/comp23_E1/calcularTotalSexo') ?>/acu_mun_id/<?php echo $acu_mun_id; ?>',
                function(data) {
                    $.each(data, function(key, val) {
                        if(key=='rows'){
                            $.each(val, function(id, registro){
                                $("#total").attr('value', registro['cell'][0]);
                                $("#mujeres").attr('value', registro['cell'][1]);
                                $("#hombres").attr('value', registro['cell'][2]);
                            });                    
                        }
                    });
                }); 
            }
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
    });
</script>
<form id="acuerdoMunicipalForm" method="post">

    <h2 class="h2Titulos">Etapa 1: Condiciones Previas</h2>
    <h2 class="h2Titulos">Producto 1: Acuerdo Municipal</h2>
    <br/>
    <table>
        <tr>
        <td width="200"><strong>Departamento:</strong><?php echo $departamento ?></td>
        <td width="200"><strong>Municipio:</strong><?php echo $municipio ?></td>
        <td  width="400"><strong>Fecha: </strong>
            <input <?php if (isset($acu_mun_fecha)) { ?> value='<?php echo date('d/m/y', strtotime($acu_mun_fecha)); ?>'<?php } ?>id="acu_mun_fecha" name="acu_mun_fecha" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td colspan="3"><strong>Proyecto PEP:  </strong><?php echo $proyectoPep ?></td>
        </tr>
    </table>
    <p>¿Consejo Municipal conoce el proceso de planificación? 
        <input type="radio" name="acu_mun_p1" value="true"<?php if (isset($acu_mun_p1) && $acu_mun_p1 == 't') { ?> checked <?php } ?>>SI </input>
        <input type="radio" name="acu_mun_p1" value="false"<?php if (isset($acu_mun_p1) && $acu_mun_p1 == 'f') { ?> checked <?php } ?> >NO </input>
    </p>
    <p>¿Consejo Municipal apoya el proceso? 
        <input type="radio" name="acu_mun_p2" value="true" <?php if (isset($acu_mun_p2) && $acu_mun_p2 == 't') { ?> checked <?php } ?> >SI </input>
        <input type="radio" name="acu_mun_p2" value="false" <?php if (isset($acu_mun_p2) && $acu_mun_p2 == 'f') { ?> checked <?php } ?>>NO </input>
    </p>
    <br/><br/>
    <table>
        <tr>
        <td style="width:80px;"></td>
        <td width="300px">
            <strong>Contrapartida</strong>
        <fieldset style="width:170px;">
            <legend>Aportes de la Municipalidad</legend>
            <?php foreach ($contrapartidas as $aux) { ?>
                <input <?php if (!strcasecmp($aux->con_acu_valor, 't')) { ?>checked <?php } ?> type="checkbox" name="con_<?php echo $aux->con_id; ?>" value="<?php echo $aux->con_id; ?>" ><?php echo $aux->con_nombre; ?></input><br/>
            <?php } ?>
        </fieldset>

        </td>
        <td style="width: 50px;"></td>
        <td>
            <strong>¿Se esta de acuerdo con los criterios de la participación?</strong>
        <fieldset style="width:250px;">
            <legend><strong>Criterios</strong></legend>
            <table>
                <?php foreach ($criterios as $aux) { ?>
                    <tr>
                    <td><?php echo $aux->cri_nombre; ?></td>
                    <td><input type="radio" <?php if (!strcasecmp($aux->cri_acu_valor, 't')) { ?> checked <?php } ?> name="cri_<?php echo $aux->cri_id; ?>" value="true" >SI </input></td>
                    <td><input type="radio" <?php if (!strcasecmp($aux->cri_acu_valor, 'f')) { ?> checked <?php } ?>name="cri_<?php echo $aux->cri_id; ?>" value="false" >NO </input></td>
                    </tr>
                <?php } ?>
            </table>  

        </fieldset>
        </td>
        </tr>
    </table>

    <br/><br/>

    <table id="participantes"></table>
    <div id="pagerParticipantes"></div>

    <div style="position: relative;left: 275px; top: 5px;">
        <input type="button" id="agregar" value="  Agregar  " />
        <input type="button" id="editar" value="   Editar   " />
        <input type="button" id="eliminar" value="  Eliminar  " />
    </div>
    <table style="position: relative;top: 15px;">
        <tr>
        <td>
            <p>Observaciones:<br/><textarea id="acu_mun_observacion" name="acu_mun_observacion" cols="48" rows="5"><?php if (isset($acu_mun_observacion)) echo$acu_mun_observacion; ?></textarea></p>
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
                <td><input class="bordeNo" id="mujeres" type="text" size="5" readonly="readonly" /><br/></td>
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
