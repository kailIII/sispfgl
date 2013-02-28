<script type="text/javascript">        
    $(document).ready(function(){
        /*VARIABLES*/
        var myGrid = $('#gestionSolicitud');        
        myGrid.jqGrid({ 
            url: '<?php echo base_url('componente2/comp23_E0/cargarSolicitudes2') . "/0" ?>',
            editurl:'<?php echo base_url('componente2/comp23_E0/editarSolicitud') ?>/0',
            datatype:'json',
            altRows:true,
            colNames:['Id','Nombre del solicitante', 'Fecha Solicitud','Fecha Verificacion', 'Seleccionado',''],
            colModel:[
                {name:'id', index: 'id', width:20,editable:false,editoptions:{size:15}  },
                {name:'nombre_solicitante', index: 'nombre_solicitante',width:300,editable:false,editoptions:{size:50}},
                {name:'fecha_solicitud', index: 'fecha_solicitud',align:'center' ,width:150,editable:false,editoptions:{size:25}  },
                {name:'sel_com_fverificacion', index: 'sel_com_fverificacion',align:'center' ,
                    width:150,editable:true,
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
                      }
                },
                {name:'sel_com_seleccionado',index:'sel_com_seleccionado',width:80,align:'center',editable:true,edittype:"checkbox",editoptions:{value:"Si:No"}},
                {name:'actions',formatter:"actions",editable:false,fixed:true,width:60,
                    formatoptions:{"keys":true,delbutton: false}
                }],  
            rowNum:10,
            rowList:[10,20,30],
            multiselect: false,
            loadonce:true,
            pager: jQuery('#pagergestionSolicitud'),
            viewrecords: true,          
            caption: 'Municipios con solicitudes realizadas',
            height: "100%"
        });
        
        myGrid.jqGrid('navGrid','#pagergestionSolicitud',
        {edit:false,add:false,del:false,
            beforeRefresh: function() {myGrid.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}},
        {},
        {},
        {},
        {multipleSearch:true, 
            multipleGroup:true}
    ).hideCol('id');
 
        /*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){
            $("#comiteInterInstitucionalForm").hide();
            $('#Mensajito').hide();
            $('#selMun').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id='+$('#selDepto').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#selMun').append('<option value="0">--Seleccione Municipio--</option>');
                        $.each(val, function(id, registro){
                            $('#selMun').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });
        }); 
       
        $('#selMun').change(function(){
            $.getJSON('<?php echo base_url('componente2/comp23_E0/contarSolicitudMuni') ?>/'+$('#selMun').val(), 
            function(data) {
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $.each(val, function(id, registro){
                            if(registro['cell'][0]==0){
                                $("#comiteInterInstitucionalForm").hide();   
                                $('#Mensajito').show();
                                $('#Mensajito').val("Este municipio no posee solicitudes de asistencia técnica registradas");
                            }else{
                                $('#Mensajito').hide();
                                $("#comiteInterInstitucionalForm")[0].reset();
                                $('#gestionSolicitud').setGridParam({
                                    url:'<?php echo base_url('componente2/comp23_E0/cargarSolicitudes2') . "/" ?>'+$('#selMun').val(),
                                    datatype:'json',
                                    editurl:'<?php echo base_url('componente2/comp23_E0/editarSolicitud') ?>/'+$('#selMun').val()
                                }).trigger("reloadGrid");
                                $.getJSON('<?php echo base_url('componente2/comp23_E0/obtenerComiteInteristitucional') ?>/'+$('#selMun').val(), 
                                function(datos) {
                                    $.each(datos, function(llave, valor) {
                                        if(llave=='rows'){
                                            $.each(valor, function(index, reg){
                                                $('#mun_id').val(reg['cell'][0]); 
                                                $('#mun_com_observacion').val(reg['cell'][1]);
                                                if(reg['cell'][2]!=null)
                                                    $('#vinietaD').val('Descargar '+reg['cell'][5]);
                                                else
                                                    $('#vinietaD').val('No hay acta por descargar');
                                                $('#mun_act_ruta_archivo').val(reg['cell'][2]);
                                                if(reg['cell'][3]!=null)
                                                    $('#vinietaD2').val('Descargar '+reg['cell'][6]);
                                                else
                                                    $('#vinietaD2').val('No hay propuesta de comité por descargar');
                                                $('#mun_pro_ruta_archivo').val(reg['cell'][3]);
                                                $('#mun_fseleccion').val(reg['cell'][4]);
                                            });
                                        }
                                    });
                                });
                                cargarBoton1();
                                cargarBoton2();
                                $("#comiteInterInstitucionalForm").show();   
                            }
                        });   
                    }
                });
            });
        });
        
        $("#guardar").button().click(function() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('componente2/comp23_E0/guardarComiteInterintitucional'); ?>',
                data: $("#comiteInterInstitucionalForm").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $('#efectivo').dialog('open');
                }
            });
            return false;
        });
        
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
       
        function despuesAgregarEditar2() {
            tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; 
        }
 
        /*PARA EL DATEPICKER*/
        $( "#mun_fseleccion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/

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
        cargarBoton1=function(){
            var button = $('#btn_subir'), interval;
            new AjaxUpload('#btn_subir', {
                action: '<?php echo base_url('componente2/procesoAdministrativo/subirArchivo2') . '/municipio/'; ?>'+ $('#selMun').val()+  '/mun_id/mun_act_',
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
                        $('#mun_act_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                        ext= (response.substring(response.lastIndexOf("."))).toLowerCase(); 
                        if (ext=='.pdf'){
                            $('#mun_act_ruta_archivo').attr({
                                'href': '<?php echo base_url(); ?>'+response,
                                'target':'_blank'
                            });
                        }
                        else{
                            $('#mun_act_ruta_archivo').attr({
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
        }
        $('#btn_descargar').click(function() {
            $.get($(this).attr('href'));
        });
        
        cargarBoton2=function(){
            var button2 = $('#btn_subir2'), interval;
            new AjaxUpload('#btn_subir2', {
                action: '<?php echo base_url('componente2/procesoAdministrativo/subirArchivo2') . '/municipio/'; ?>'+ $('#selMun').val()+  '/mun_id/mun_pro_',
                onSubmit : function(file , ext){
                    if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                        $('#extension').dialog('open');
                        return false;
                    } else {
                        $('#vinieta2').val('Subiendo....');
                        this.disable();
                    }
                },
                onComplete: function(file, response,ext){
                    if(response!='error'){
                        $('#vinieta2').val('Subido con Exito');
                        this.enable();			
                        ext= (response.substring(response.lastIndexOf("."))).toLowerCase();
                        nombre=response.substring(response.lastIndexOf("/")).toLowerCase().replace('/','');
                        $('#vinietaD2').val('Descargar '+nombre);
                        $('#mun_pro_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                        ext= (response.substring(response.lastIndexOf("."))).toLowerCase(); 
                        if (ext=='.pdf'){
                            $('#mun_pro_ruta_archivo').attr({
                                'href': '<?php echo base_url(); ?>'+response,
                                'target':'_blank'
                            });
                        }
                        else{
                            $('#mun_pro_ruta_archivo').attr({
                                'href': '<?php echo base_url(); ?>'+response,
                                'target':'_self'
                            });
                        }
                    }else{
                        $('#vinieta2').val('El Archivo debe ser menor a 1 MB.');
                        this.enable();			
                 
                    }
                 
                }	
            });
        }
        $('#btn_descargar2').click(function() {
            $.get($(this).attr('href'));
        });
        
        $("#comiteInterInstitucionalForm").hide();      
  
    });
</script>
<h2 class="h2Titulos">Etapa 0: Selección de Municipios</h2>
<h2 class="h2Titulos">Selección de municipios por el comite Interinstitucional</h2>
<br/>
<br/>
<table align="center">
    <tr>
    <td class="textD"><strong>Departamento:</strong></td>
    <td>
        <select id='selDepto' name="selDepto">
            <option value='0'>--Seleccione Departamento--</option>
            <?php foreach ($departamentos as $depar) { ?>
                <option value='<?php echo $depar->dep_id; ?>'><?php echo $depar->dep_nombre; ?></option>
            <?php } ?>
        </select>
    </td>
</tr>
<tr>
<td class="textD"><strong>Municipio:</strong></td>
<td >
    <select id='selMun' name="selMun">
        <option value='0'>--Seleccione Municipio--</option>
    </select>
</td>    
</tr>
</table>
<br/>
<br/>
<input value="" class="error" id="Mensajito" type="text" size="100" readonly="readonly" style="border: none;"/>
<form id="comiteInterInstitucionalForm" method="post">
    <center>
        <strong>Fecha de selección de municipios: </strong> 
        <input id="mun_fseleccion" name="mun_fseleccion" type="text" size="10" readonly="readonly"/>
        <br/><br/>
        <table id="gestionSolicitud"></table>  
        <div id="pagergestionSolicitud"></div> 
    </center>
    <table style="position: relative;top: 15px;left:25px">
        <tr>
        <td>
            <table>
                <tr>
                <td><div id="btn_subir2"></div></td>
                <td><input class="letraazul" type="text" id="vinieta2" readonly="readonly" value="Subir Propuesta del Comité" size="30" style="border: none"/></td>
                </tr>
                <tr>
                <td><a id="btn_descargar2"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
                <td><input class="letraazul" type="text" id="vinietaD2" readonly="readonly" size="35" style="border: none"/></td>
                </tr>
            </table> 
        </td>
        <td style="width: 50px"></td>
        <td>
            <table>
                <tr>
                <td><div id="btn_subir"></div></td>
                <td><input class="letraazul" type="text" id="vinieta" readonly="readonly" value="Subir Acta Aprobación" size="30" style="border: none"/></td>
                </tr>
                <tr>
                <td><a id="btn_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
                <td><input class="letraazul" type="text" id="vinietaD" readonly="readonly" size="35" style="border: none"/></td>
                </tr>
            </table> 
        </td>
        </tr>
    </table>
    <br/><br/>
    <p>Observaciones:<br/><textarea id="mun_com_observacion" name="mun_com_observacion" cols="48" rows="5"></textarea></p>
    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Guardar" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
    <input id="mun_act_ruta_archivo" name="mun_act_ruta_archivo" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
    <input id="mun_pro_ruta_archivo" name="mun_pro_ruta_archivo" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
    <input id="mun_id" name="mun_id" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
</form>
<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>

