<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
        $("#guardar").button();
        $("#cancelar").button();
        /*  PARA SUBIR EL ARCHIVO  */
        var button = $('#btn_subir'), interval;
        new AjaxUpload('#btn_subir', {
            action: '<?php echo base_url('componente2/comp23_E1/subirArchivo') . '/informe_preliminar/' . $inf_pre_id . '/inf_pre_id'; ?>',
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
                    $('#inf_pre_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
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
        /*PARA EL DATEPICKER*/
        $( "#inf_pre_fecha_borrador" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        
        $( "#inf_pre_fecha_observacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#inf_pre_aceptacion" ).datepicker({
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
            url:'<?php echo base_url('componente2/comp23_E1/cargarParticipantesIP') . '/gru_apo_id/' . $gru_apo_id  ?>',
            //editurl:'welcome/gestionArticulo',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombres','Apellidos','Sexo','Cargo'],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_nombre',index:'par_nombre',width:250,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_apellido',index:'par_apellido',width:250,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Apellidos",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_sexo',index:'par_sexo',editable:true,edittype:"select",width:50,
                    editoptions:{ value: '0:Seleccione;f:Femenino; m:Masculino' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaSexo}
                },
             
                {name:'par_cargo',index:'par_cargo',width:250,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Cargo",elmprefix:"(*)"},
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

<form method="post">
    <div style="margin-left: 200px;">
        <h2 class="h2Titulos">Etapa 1: Condiciones Previas</h2>
        <h2 class="h2Titulos">Producto 6: Informe Preliminar del Municipio</h2>

        <br></br>
        <table>
            <tr>
            <td ><strong>Departamento:</strong></td>
            <td><?php echo $departamento ?></td>
            </tr>
            <tr>
            <td ><strong>Municipio:</strong></td>
            <td ><?php echo $municipio ?></td>    
            </tr>
            <tr>
            <td ><strong>Proyecto Pep:</strong></td>
            <td ><?php echo $proyectoPep ?></td>    
            </tr>
        </table>
        <br></br>
  
        <table>
            <tr>
            <td>
            <fieldset style="width:400px;">
                <legend><strong>Cumplimiento de los elementos minimos del informe</strong></legend>
                <table>
                    <?php foreach ($cumplimientosMinimos as $aux) { ?>
                        <tr>
                        <td><?php echo $aux->cum_min_nombre; ?></td>
                        <td><input type="radio" name="<?php echo $aux->cum_min_id; ?>" value="true">SI </input></td>
                        <td><input type="radio" name="<?php echo $aux->cum_min_id; ?>" value="false">NO </input></td>
                        </tr>
                    <?php } ?>
                </table>  

            </fieldset>
            </td>  
            <td style="width: 20px"></td>
            <td>
                <table>
                    <tr style="width: 300px"> <td ><strong>Fecha de presentación del borrador: </strong><input id="inf_pre_fecha_borrador" name="inf_pre_fecha_borrador" type="text" size="10"/></td></tr>
                    <tr><td><strong>Fecha de superación de observaciones: </strong><input id="inf_pre_fecha_observacion" name="inf_pre_fecha_observacion" type="text" size="10"/></td></tr>
                    <tr> <td><strong>Fecha de aprobacion del consejo municipal: </strong><input id="inf_pre_aceptacion" name="inf_pre_aceptacion" type="text" size="10"/></td></tr>
                </table>
                <p><strong>¿Acta de aceptación contiene firmas?</strong></p>
                <table>
                    <tr>
                    <td>Municipalidad</td>
                    <td><input type="radio" name="mayor15" value="true">SI </input></td>
                    <td><input type="radio" name="mayor15" value="false">NO </input></td>
                    </tr>
                    <tr>
                    <td>ISDEM </td>
                    <td><input type="radio" name="porcenMujeres" value="true">SI </input></td>
                    <td><input type="radio" name="porcenMujeres" value="false">NO </input></td>    
                    </tr>
                    <tr>
                    <td>UEP</td>
                    <td><input type="radio" name="conTerritorio" value="true">SI </input></td>
                    <td><input type="radio" name="conTerritorio" value="false">NO </input></td> 
                    </tr>
                </table> 
            </td>
            </tr>
        </table>
        <br></br>

        <table id="participantes"></table>
        <div id="pagerParticipantes"></div>

        <p>Observaciones y/o Recomendaciones:</br>
            <textarea name="inf_pre_observacion" cols="48" rows="5"><?php echo $inf_pre_observacion; ?></textarea></p>
        
      <table>
            <tr>
            <td><div id="btn_subir"></div></td>
            <td><input class="letraazul" type="text" id="vinieta" value="Subir Informe Preliminar" size="60" style="border: none"/></td>
            </tr>
            <tr>
            <td><a <?php if (isset($inf_pre_ruta_archivo) && $inf_pre_ruta_archivo != '') { ?> href="<?php echo base_url() . $inf_pre_ruta_archivo; ?>"<?php } ?>  id="btn_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
            <td><input class="letraazul" type="text" id="vinietaD" <?php if (isset($inf_pre_ruta_archivo) && $inf_pre_ruta_archivo != '') { ?>value="Descargar Declaración de Interés"<?php } else { ?> value="No hay ningún informe preliminar para descargar" <?php } ?>size="50" style="border: none"/></td>
            </tr>
        </table>
    <center>
        <div style="position:relative;width: 300px;top: 25px">
            <p > 
                <input type="submit" id="guardar" value="Guardar Reunión" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
</div>
    <input id="inf_pre_ruta_archivo" name="inf_pre_ruta_archivo" <?php if (isset($inf_pre_ruta_archivo) && $inf_pre_ruta_archivo != '') { ?>value="<?php echo $inf_pre_ruta_archivo; ?>"<?php } ?> type="text" size="100" readonly="readonly" style="visibility: hidden"/>
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
