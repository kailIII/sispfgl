<script type="text/javascript">        
    $(document).ready(function(){
        /*GRID PARTICIPANTES*/
       
        /*PARA EL DATEPICKER*/
        $( "#pro_fpublicacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        
        /*FIN DEL DATEPICKER*/
        
        /*PARA EL DATEPICKER*/
        $( "#pro_faclara_dudas" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        
        /*FIN DEL DATEPICKER*/
        /*PARA EL DATEPICKER*/
        $( "#pro_fexpresion_interes" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/ 
        
        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/procesoAdministrativo/guardarAdquisicionContrataciones') ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/procesoAdministrativo/adquisicionContrataciones'); ?>';
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
        
        /*  PARA SUBIR EL ARCHIVO  */
        var button = $('#btn_pub_subir'), interval;
        new AjaxUpload('#btn_pub_subir', {
            action: '<?php echo base_url('componente2/procesoAdministrativo/subirArchivo2') . '/proceso/' . $pro_id . '/pro_id/pro_pub_'; ?>',
            onSubmit : function(file , ext){
                if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                    $('#extension').dialog('open');
                    return false;
                } else {
                    $('#pub_vin').val('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response,ext){
                if(response!='error'){
                    $('#pub_vin').val('Subido con Exito');
                    this.enable();			
                    $('#pub_vinD').val('Descargar Archivo');
                    $('#pro_pub_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                    ext= (response.substring(response.lastIndexOf("."))).toLowerCase(); 
                    if (ext=='.pdf'){
                        $('#btn_pub_descargar').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_blank'
                        });
                    }
                    else{
                        $('#btn_pub_descargar').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_self'
                        });
                    }
                }else{
                    $('#pub_vin').val('El Archivo debe ser menor a 1 MB.');
                    this.enable();			
                 
                }
                 
            }	
        });
        $('#btn_pub_descargar').click(function() {
            $.get($(this).attr('href'));
        });
        
        var button = $('#btn_exp_subir'), interval;
        new AjaxUpload('#btn_exp_subir', {
            action: '<?php echo base_url('componente2/procesoAdministrativo/subirArchivo2') . '/proceso/' . $pro_id . '/pro_id/pro_exp_'; ?>',
            onSubmit : function(file , ext){
                if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                    $('#extension').dialog('open');
                    return false;
                } else {
                    $('#exp_vin').val('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response,ext){
                if(response!='error'){
                    $('#exp_vin').val('Subido con Exito');
                    this.enable();			
                    $('#exp_vinD').val('Descargar Archivo');
                    $('#pro_exp_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
                    ext= (response.substring(response.lastIndexOf("."))).toLowerCase(); 
                    if (ext=='.pdf'){
                        $('#btn_exp_descargar').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_blank'
                        });
                    }
                    else{
                        $('#btn_exp_descargar').attr({
                            'href': '<?php echo base_url(); ?>'+response,
                            'target':'_self'
                        });
                    }
                }else{
                    $('#exp_vin').val('El Archivo debe ser menor a 1 MB.');
                    this.enable();			
                 
                }
                 
            }	
        });
        $('#btn_exp_descargar').click(function() {
            $.get($(this).attr('href'));
        });
        function validaSexo(value, colname) {
            if (value == 0 ) return [false,"Seleccione el Tipo de la consultora"];
            else return [true,""];
        }
        /*FIN ZONA VALIDACIONES*/
        /*GRID PARTICIPANTES*/
        /*VARIABLES*/
        var tabla=$("#consultoresInteres");
        /*ZONA DE BOTONES*/
        $("#agregar").button().click(function(){
            tabla.jqGrid('editGridRow',"new",
            {closeAfterAdd:true,addCaption: "Agregar consultora",width:350,
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
            {closeAfterEdit:true,editCaption: "Editando consultora",width:350,
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
            {msg: "¿Desea Eliminar este consultora?",caption:"Eliminando ",
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');                            
                }}); 
            else $('#mensaje2').dialog('open'); 
        });
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/procesoAdministrativo/cargarConsultoraInteres') . '/' . $pro_id ?>',
            editurl:'<?php echo base_url('componente2/procesoAdministrativo/gestionarConsultoresInteres') . '/' . $pro_id ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Tipo'],
            colModel:[
                {name:'con_int_id',index:'con_int_id', width:40,editable:false,editoptions:{size:15} },
                {name:'con_int_nombre',index:'con_int_nombre',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombre:",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'con_int_tipo',index:'con_int_tipo',editable:true,edittype:"select",width:60,
                    editoptions:{ value: '0:Seleccione;Empresa:Empresa;ONG:ONG' }, 
                    formoptions:{ label: "Tipo:",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaSexo}
                }
            ],
            multiselect: false,
            caption: "Consultoras que han manifestado interés",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerConsultoresInteres'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerConsultoresInteres',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('con_int_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
                
    });
</script>

<form id="AdquisicionyContratacionForm" method="post" style="left: 70px;position: relative;">

    <h2 class="h2Titulos">Proceso de Adquisición y Contrataciones</h2>
    <br/>

    <br/><br/>
    <strong>No. Proceso </strong><input value="<?php echo $pro_numero ?>" id="pro_numero" name="pro_numero" type="text" size="10"/>
    <br/>
    <br/>

    <table>
        <tr>
        <td class="textD"><strong>Fecha de publicación: </strong></td> 
        <td><input value="<?php  if ($pro_fpublicacion!="") echo date('d/m/y', strtotime($pro_fpublicacion)); ?>" id="pro_fpublicacion" name="pro_fpublicacion" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td class="textD"> <strong>Fecha de aclaración de dudas: </strong></td>
        <td><input value="<?php  if ($pro_faclara_dudas!="")  echo date('d/m/y', strtotime($pro_faclara_dudas)); ?>" id="pro_faclara_dudas" name="pro_faclara_dudas" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td class="textD"><strong>Fecha limite de expresión de interes: </strong></td>
        <td><input value="<?php  if ($pro_fexpresion_interes!="")  echo date('d/m/y', strtotime($pro_fexpresion_interes)); ?>" id="pro_fexpresion_interes" name="pro_fexpresion_interes" type="text" size="10" readonly="readonly"/></td>
        </tr>
    </table>
    <br/><br/>
    <center>
        <table id="consultoresInteres"></table>
        <div id="pagerConsultoresInteres"></div>
        <br/>
    </center>
    <div style="position: relative;left: 275px; top: 5px;">
        <input type="button" id="agregar" value="  Agregar  " />
        <input type="button" id="editar" value="   Editar   " />
        <input type="button" id="eliminar" value="  Eliminar  " />
        
    </div>
    <br/><br/>
    <table>
        <tr>
        <td><div id="btn_pub_subir"></div></td>
        <td><input class="letraazul" type="text" id="pub_vin" value="Subir Publicación en periódico" size="30" style="border: none"/></td>
        <td width="100"></td>
        <td><div id="btn_exp_subir"></div></td>
        <td><input class="letraazul" type="text" id="exp_vin" value="Subir Expresión de interés" size="30" style="border: none"/></td>
        </tr>
        <tr>
        <td><a <?php if (isset($pro_pub_ruta_archivo) && $pro_pub_ruta_archivo != '') { ?> href="<?php echo base_url() . $pro_pub_ruta_archivo; ?>"<?php } ?>  id="btn_pub_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
        <td><input class="letraazul" type="text" id="pub_vinD" <?php if (isset($pro_pub_ruta_archivo) && $pro_pub_ruta_archivo != '') { ?>value="Descargar Publicación"<?php } else { ?> value="No Hay publicacion para Descargar" <?php } ?>size="30" style="border: none"/></td>
        <td></td>
        <td><a <?php if (isset($pro_exp_ruta_archivo) && $pro_exp_ruta_archivo != '') { ?> href="<?php echo base_url() . $pro_exp_ruta_archivo; ?>"<?php } ?>  id="btn_exp_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
        <td><input class="letraazul" type="text" id="exp_vinD" <?php if (isset($pro_exp_ruta_archivo) && $pro_exp_ruta_archivo != '') { ?>value="Descargar Expresión"<?php } else { ?> value="No Hay explicación de interés para Descargar" <?php } ?>size="30" style="border: none"/></td>
        </tr>
    </table>


    <table style="position: relative;top: 15px;">
        <tr>
        <td>
            <p>Observaciones:<br/><textarea id="pro_observacion1" name="pro_observacion1" cols="48" rows="5"><?php if (isset($pro_observacion1)) echo$pro_observacion1; ?></textarea></p>
        </td>
        <td style="width: 50px"></td>
        </tr>
    </table>


    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Guardar Adquisición y Contratación" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
    <input id="pro_pub_ruta_archivo" name="pro_pub_ruta_archivo" <?php if (isset($pro_pub_ruta_archivo) && $pro_pub_ruta_archivo != '') { ?>value="<?php echo $pro_pub_ruta_archivo; ?>"<?php } ?> type="text" size="100" readonly="readonly" style="visibility: hidden"/>
    <input id="pro_exp_ruta_archivo" name="pro_exp_ruta_archivo" <?php if (isset($pro_exp_ruta_archivo) && $pro_exp_ruta_archivo != '') { ?>value="<?php echo $pro_exp_ruta_archivo; ?>"<?php } ?> type="text" size="100" readonly="readonly" style="visibility: hidden"/>
    <input id="pro_id" name="pro_id" value="<?php echo $pro_id; ?>" style="visibility: hidden"/>
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