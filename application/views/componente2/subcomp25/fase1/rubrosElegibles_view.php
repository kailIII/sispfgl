<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('componente2/comp25_fase1/guardarRubrosElegibles') ?>',
                data: $("#rubroElegibleForm").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $('#efectivo').dialog('open');
                }
            });
            return false;
        });
        
        $("#rubroElegibleForm").hide();
        /*CARGAR MUNICIPIOS*/
        $('#dep_id').change(function(){ 
            $("#rubroElegibleForm").hide();
            $('#mun_id').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id='+$('#dep_id').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#mun_id').append('<option value="0">--Seleccione Municipio--</option>');
                        $.each(val, function(id, registro){
                            $('#mun_id').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
        $('#mun_id').change(function(){
            $('#rubroElegibleForm')[0].reset();
            if($('#mun_id').val()!=0){
                $.getJSON('<?php echo base_url('componente2/comp25_fase1/cargarRubrosElegibles') . "/" ?>'+$('#mun_id').val(), 
                function(data) {
                    $.each(data, function(key, val) {
                        if(key=='rows'){
                            i=0;
                            $.each(val, function(id, registro){
                                j=1;   
                                $('#rub_id').val(registro['cell'][0]);
                                $('#rub_observacion_general').val(registro['cell'][1]);
                                if(registro['cell'][2]!=null){
                                    if(registro['cell'][2]=="t")
                                        $('input:radio[name=rub_emite_nota]')[0].checked = true; 
                                    else
                                        $('input:radio[name=rub_emite_nota]')[1].checked = true; 
                                }
                                $.each(registro['cell'][3], function(id, valor){
                                    if(valor[0]!=null){
                                        if(valor[0]=="t")
                                            $('input:radio[name=rubro_'+j+']')[0].checked = true; 
                                        else
                                            $('input:radio[name=rubro_'+j+']')[1].checked = true; 
                                    }
                                    $("#conclusion_"+j).val(valor[1]); 
                                    j++;
                                });
                                tabla.setGridParam({
                                    url:'<?php echo base_url('componente2/comp25_fase1/cargarNota') ?>/'+registro['cell'][0],
                                    editurl:'<?php echo base_url('componente2/comp25_fase1/guardarNota') ?>/'+registro['cell'][0],
                                    datatype:'json'
                                }).trigger('reloadGrid');
                                $("#rubroElegibleForm").show();
                            });                    
                        }
                    });
                });              
            }
        });
        /*ZONA DATEPICKER*/
       
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
        
        /*ZONA DE GRID*/
        var tabla=$("#notas");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp25_fase1/cargarNota') ?>/0',
            editurl:'<?php echo base_url('componente2/comp25_fase1/guardarNota') ?>/0',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','No. Correlativo UEP','Fecha de la nota','Observación'],
            colModel:[
                {name:'not_id',index:'not_id', width:40,editable:false,editoptions:{size:15} },
                {name:'not_correlativo',index:'not_correlativo', width:140,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "No.",elmprefix:"(*)"}
                },
                {name:'not_fnota',index:'not_fnota',width:200,editable:true,
                    editoptions: {
                        size: 10, maxlengh: 10,
                        dataInit: function(element) {
                            $(element).datepicker({
                                showOn: 'both',
                                buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
                                buttonImageOnly: true, 
                                dateFormat: 'dd-mm-yy'
                            })
                        }
                    },
                    formoptions:{label: "Fecha de la nota",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'not_observacion',index:'not_observacion',
                    editable:true,width:400,edittype:"textarea",
                    editoptions:{rows:"4",cols:"50"},
                    formoptions:{label: "Observación"}
                }
            ],
            multiselect: false,
            //caption: "Fuentes de Información Primarias",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerNotas'),
            viewrecords: true     
        }).jqGrid('navGrid','#pagerNotas',
        {edit:true,add:true,del:true,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        },//OPCIONES
        {closeAfterEdit:true,editCaption: "Editando la nota",width:700,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }    
        },//EDITAR
        {closeAfterAdd:true,addCaption: "Agregar nota",width:700,
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        },//AGREGAR
        {msg: "¿Desea Eliminar a esta nota?",caption:"Eliminando....",
            align:'center',reloadAfterSubmit:true,processData: "Cargando...",width:300,
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');                            
            }
        }//ELIMINAR
    ).hideCol('not_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
                
    });
</script>
<center>
    <h2 class="h2Titulos">2.1. Elaboración de proyecto</h2>
    <h2 class="h2Titulos">2.1.3. Rubros elegibles a los que puede aplicar acorde al diagnóstico de la UEP</h2>
    <br/>
    <table>
        <tr>
        <td><strong>Departamento</strong></td>
        <td><select id='dep_id'>
                <option value='0'>--Seleccione--</option>
                <?php foreach ($departamentos as $depto) { ?>
                    <option value='<?php echo $depto->dep_id; ?>'><?php echo $depto->dep_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
        <td><strong>Municipio</strong></td>
        <td><select id='mun_id' name='mun_id'>
                <option value='0'>--Seleccione--</option>
            </select>
        </td>
        </tr>
    </table>
</center>
<form id="rubroElegibleForm" method="post">
    <table>
        <tr>
        <td></td>
        <td width="100px"></td>
        <td align="center"><strong>Conclusión</strong></td>
        </tr>
        <?php foreach ($nombreRubros as $rubro) { ?>
            <tr>
            <td><strong><?php echo $rubro->nom_rub_nombre; ?></strong></td>
            <td><input type="radio" name="rubro_<?php echo $rubro->nom_rub_id; ?>" value="true" > SI </input>
                <input type="radio" name="rubro_<?php echo $rubro->nom_rub_id; ?>" value="false"> NO</input>
            </td>
            <td><input name="conclusion_<?php echo $rubro->nom_rub_id; ?>" id="conclusion_<?php echo $rubro->nom_rub_id; ?>" value="" type="text" size="25" maxlength="255" /></td>
            </tr>
        <?php } ?>
    </table>
    <hr size=2 width= 100% />
    <h2 class="h2Titulos">2.1.4. Sugerencias para mejorar el perfil del proyecto</h2>
    <center>
        <p>
            <strong>UEP emite nota para mejorar el perfil del proyecto </strong>
            <input type="radio" name="rub_emite_nota" value="true" > SI </input>
            <input type="radio" name="rub_emite_nota" value="false"> NO</input>
        </p>
        <table id="notas"></table>
        <div id="pagerNotas"></div>
    </center>
    <p>Conclusión General:<br/><textarea name="rub_observacion_general" cols="48" rows="5"></textarea></p>
    <?php //if (strcmp($rol, 'gdrc') == 0) { ?>
        <center>
            <input type="submit" id="guardar" value="Guardar" />
        </center>
    <?php //} ?>
    <input id="rub_id" name="rub_id" value="" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>
<div id="fechaValidacion" class="mensaje" title="Error en fechas">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/cancel.png'); ?>" class="imagenError" />Las fechas deben de ir en orden ascendente</p>
    </center>
</div>
