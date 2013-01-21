<script type="text/javascript">        
    $(document).ready(function(){
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E3/guardarPortafolio') ?>/'+$('#por_pro_id').val();
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/comp23_E3/mostrarPortafolioProyecto'); ?>';
        });
        /*PARA EL DATEPICKER*/
        $( "#por_pro_fecha_desde" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo base_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        
        /*PARA EL DATEPICKER*/
        $( "#por_pro_fecha_hasta" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo base_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        /*GRID*/
        var tabla=$("#fuenteFinanciamiento");
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        /*ZONA DE BOTONES*/
        $("#agregar").button().click(function(){
            tabla.jqGrid('editGridRow',"new",
            {closeAfterAdd:true,addCaption: "Ingresar Fuente de Financiamiento",
                align:'center',reloadAfterSubmit:true,width:600,
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
            {closeAfterEdit:true,editCaption: "Editar Fuente de Financiamiento",
                align:'center',reloadAfterSubmit:true,width:600,
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
            {msg: "Desea Eliminar esta Fuente de Financiamiento?",caption:"Eliminando Fuente de Financiamiento",
                align:'center',reloadAfterSubmit:true,width:400,
                processData: "Cargando...",
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');                            
                }}); 
            else $('#mensaje2').dialog('open'); 
        });
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E3/cargarFuentesFinancimiento') . '/' . $por_pro_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E3/gestionarFuentesFinanciamiento') . '/' . $por_pro_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Fuentes Financiamientos','Monto','Descripción'],
            colModel:[
                {name:'fue_fin_id',index:'fue_fin_id', width:40,editable:false,editoptions:{size:15} },
                {name:'fue_fin_nombre',index:'fue_fin_nombre', width:200,editable:true,
                    editoptions:{size:30,maxlength: 100},
                    formoptions:{label: "Nombre de la fuente:",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fue_fin_monto',index:'fue_fin_monto',width:100,editable:true,
                   editoptions:{ size:25,dataInit: function(elem){$(elem).bind("keypress", function(e) {return numeros(e)})}}, 
                    formoptions:{label: "Monto:",elmprefix:"(*)"},
                    editrules:{required:true, number:true,minValue:0} 
                },
                {name:'fue_fin_descripcion',index:'fue_fin_descripcion',width:300,editable:true,
                    edittype:"textarea",editoptions:{rows:"4",cols:"50",maxlength:300}, 
                    formoptions:{label: "Descripción:"}
                }
            ],
            multiselect: false,
            caption: "Fuente de financiamiento",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerFuenteFinanciamiento'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerFuenteFinanciamiento',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('fue_fin_id');
        /*SUBIR ARCHIVO*/
        var button = $('#btn_subir'), interval;
        new AjaxUpload('#btn_subir', {
            action: '<?php echo base_url('componente2/comp23_E1/subirArchivo') . '/portafolio_proyecto/' . $por_pro_id . '/por_pro_id'; ?>',
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
                    $('#por_pro_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
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
        /*FIN DIALOGOS VALIDACION*/
        //VALIDAR FORMULARIOS
        $("#portafolioProyectoForm").validate({
            rules: {
                por_pro_area: {
                    required: true,
                    maxlength: 300
                },
                por_pro_tema: {
                    required: true,
                    maxlength: 300
                },
                por_pro_nombre: {
                    required: true,
                    maxlength: 300
                },
                por_pro_descripcion: {
                    required: true
                },
                por_pro_ubicacion: {
                    required: true,
                    maxlength: 300
                },
                por_pro_costo_estimado: {
                    required: true,
                    number: true
                },
                por_pro_fecha_desde: {
                    required: true
                },
                por_pro_fecha_hasta: {
                    required: true
                },
                por_pro_beneficiario_h: {
                    required: true,
                    number:true
                },
                por_pro_beneficiario_m: {
                    required: true,
                    number:true
                }
            }
        });   
    });
</script>

<form id="portafolioProyectoForm" method="post">
    <h2 class="h2Titulos">Etapa 3: Plan Estratégico Participativo</h2>
    <h2 class="h2Titulos">Portafolio de Proyectos</h2>
    <h2 class="h2Titulos">Registro de Proyectos</h2>
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
        <tr>
        <td class="textD"><strong>Área:</strong></td>
        <td><input name="por_pro_area" type="text" value="<?php echo $por_pro_area ?>" size="50"/></td>
        </tr>
        <tr>
        <td class="textD"><strong>Tema: </td>
        <td><textarea name="por_pro_tema" cols="57" rows="3"><?php echo $por_pro_tema ?></textarea></td>
        </tr>
        <tr>
        <td class="textD"><strong>Nombre del Proyecto: </td>
        <td><input name="por_pro_nombre" value="<?php echo $por_pro_nombre ?>" type="text" size="50"/></td>
        </tr>
        </tr>
        <tr>
        <td class="textD"><strong>Descripción: </td>
        <td><textarea name="por_pro_descripcion" cols="57" rows="3"><?php echo $por_pro_descripcion ?></textarea></td>
        </tr>
        </tr>
        <tr>
        <td class="textD"><strong>Ubicación: </td>
        <td><input name="por_pro_ubicacion" type="text" size="50" value="<?php echo $por_pro_ubicacion ?>"/></td>
        </tr>
        <tr>
        <td class="textD"><strong>Costo Estimado: </td>
        <td><input name="por_pro_costo_estimado" type="text" size="10" value="<?php echo $por_pro_costo_estimado ?>"/>Con formato 99999.99</td>
        </tr>
    </table> 
    <fieldset style="border-color: #2F589F;position: relative;width: 400px;left:200px;"
              <legend align="center"><strong>Período de Ejecución</strong></legend>
        <table>
            <tr>
            <td colspan="2">Desde:<input value="<?php echo date_format(date_create($por_pro_fecha_desde), "d-m-Y"); ?>"  id="por_pro_fecha_desde" name="por_pro_fecha_desde" readonly="readonly" size="10"/></td>
            <td colspan="2">Hasta:<input value="<?php echo date_format(date_create($por_pro_fecha_hasta), "d-m-Y"); ?>" id="por_pro_fecha_hasta" name="por_pro_fecha_hasta" readonly="readonly" size="10"/></td>
            </tr>
        </table> 
    </fieldset>
    <br/>
    <table id="fuenteFinanciamiento"></table>
    <div id="pagerFuenteFinanciamiento"></div>
    <div style="position: relative;left: 200px;top: 5px">
        <input type="button" id="agregar" value="  Agregar  " />
        <input type="button" id="editar" value="   Editar   " />
        <input type="button" id="eliminar" value="  Eliminar  " />
        <br/><br/>
    </div>
    <fieldset style="border-color: #2F589F;position: relative;width: 400px;left:200px;"
              <legend align="center"><strong>Beneficiarios</strong> Con Formato 999999</legend>
        <table>
            <tr>
            <td colspan="2">Hombres:<input value="<?php echo $por_pro_beneficiario_h ?>" id="por_pro_beneficiario_h" name="por_pro_beneficiario_h"  size="10"/></td>
            <td colspan="2">Mujeres:<input value="<?php echo $por_pro_beneficiario_m ?>" id="por_pro_beneficiario_m" name="por_pro_beneficiario_m" size="10"/></td>
            </tr>
        </table> 
    </fieldset>
    <p>Observaciones y/o recomendaciones:<br/><textarea id="por_pro_observacion" name="por_pro_observacion" cols="48" rows="5"><?php echo $por_pro_observacion ?></textarea></p>
    <table>
        <tr><td colspan="2">Para actualizar un archivo basta con subir nuevamente el archivo y este se reemplaza automáticamente</td></tr>
        <tr>
        <td><div id="btn_subir"></div></td>
        <td><input class="letraazul" type="text" id="vinieta" value="Subir Perfil del Proyecto" size="30" style="border: none"/></td>
        </tr>
        <tr>
        <td><a id="btn_descargar"  <?php if (isset($por_pro_ruta_archivo) && $por_pro_ruta_archivo != '') { ?> href="<?php echo base_url() . $por_pro_ruta_archivo; ?>"<?php } ?> ><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
        <td><input class="letraazul" type="text" id="vinietaD" <?php if (isset($por_pro_ruta_archivo) && $por_pro_ruta_archivo != '') { ?>value="Descargar <?php echo $nombreArchivo ?>"<?php } else { ?> value="No hay perfil para ser descargado" <?php } ?>size="40" style="border: none"/></td>
        </tr>
    </table>
    <center>  <p><input type="submit" id="guardar" value="Guardar Portafolio del Proyecto" />
            <input type="button" id="cancelar" value="Cancelar" />
        </p>

    </center>
    <input id="por_pro_id" name="por_pro_id" value="<?php echo $por_pro_id ?>" style="visibility: hidden"/>
    <input id="por_pro_ruta_archivo" name="por_pro_ruta_archivo" value="<?php echo $por_pro_ruta_archivo ?>" type="text" size="100" style="visibility: hidden"/>
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
