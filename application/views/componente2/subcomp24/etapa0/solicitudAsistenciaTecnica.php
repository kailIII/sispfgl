<?php

/**
 * 
 * 
 * @author Alexis Beltran
 */

$this->load->view('plantilla/header', $titulo);
$this->load->view('plantilla/menu', $menu);

?>
<script type="text/javascript">        
    $(document).ready(function(){
        
        /*VARIABLES*/
 
       
        $("#guardar").button();
        
        $("#btn_acuerdo_nuevo").button().click(function(){
            $('#frm').submit();
        });
        
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        	/*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){   
            //$("#guardar").hide();
            $('#mun_id').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id='+$('#selDepto').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#mun_id').append('<option value="0">--Seleccione Municipio--</option>');
                        $.each(val, function(id, registro){
                            var text = '<option ';
                            if(registro['cell'][0]=='<?php echo set_value('mun_id'); ?>'){
                                text = text + 'selected="" ';
                            }
                            text = text + 'value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>'
                            $('#mun_id').append(text);
                        });                    
                    }
                });
            });              
        });
        $('#mun_id').change(function(){
            jqLista.jqGrid('clearGridData')
                .jqGrid('setGridParam', { 
                    url: '<?php echo base_url('componente2/comp24_E0/getAsistenciasTecnicas'); ?>/' + $('#mun_id').val(), 
                    datatype: 'json', 
                    page:1 })
                .trigger('reloadGrid');
            $('#Mensajito').hide();
            $("#guardar").show();              
        });
                
        /*PARA EL DATEPICKER*/
        $( "#asi_tec_fecha_solicitud" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#asi_tec_fecha_emision" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#asi_tec_fecha_emision" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#asi_tec_fecha_envio" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#asi_tec_fecha_envio" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#asi_tec_fecha_orden" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#asi_tec_fecha_inicio" ).datepicker({
            showOn: 'both',
            maxDate:    '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        
        /*GRID*/
        $("#miembros").jqGrid({
            url:'<?php echo base_url('componente2/comp24_E0/asitec_loadMiembros') . '/' . $asi_tec_id; ?>',
            editurl:'<?php echo base_url('componente2/comp24_E0/asitec_gestionMiembros') . '/' . $asi_tec_id; ?>',
            datatype:'json',
            altRows:true,
            gridview: true,
            hidegrid: false,
            colNames:['id','Padre','Nombres','Apellidos','Sexo','Edad','Cargo','Nivel de Escolaridad','Telefono'],
            colModel:[
                {name:'mie_id',index:'mie_id', width:40,editable:false,editoptions:{size:15},hidden:true },
                {name:'acu_mun_id',index:'acu_mun_id', width:40,editable:false,editoptions:{size:15},hidden:true },
                {name:'mie_nombre',index:'mie_nombre', width:150,editable:true,
                    edittype:'text',editoptions:{size:20,maxlength:50},
                    editrules:{required:true} },
                {name:'mie_apellidos',index:'mie_apellidos', width:150,editable:true,
                    edittypr:'text',editoptions:{size:20,maxlength:50},
                    editrules:{required:true} },
                {name:'mie_sexo',index:'mie_sexo', width:90,editable:true,
                    edittype:'select',formatter:'select',editoptions:{value:'M:Masculino;F:Femenino'},
                    editrules:{required:true} },
                {name:'mie_edad',index:'mie_edad', width:60,editable:true,align:'center',
                    edittype:'text',editoptions:{size:5,maxlength:2},
                    editrules:{number:true,minValue:18,maxValue:100} },
                {name:'mie_cargo',index:'mie_cargo', width:150,editable:true,editoptions:{size:30},
                    edittype:'text',editoptions:{size:20,maxlength:50},
                    editrules:{required:true} },
                {name:'mie_nivel',index:'mie_nivel', width:150,editable:true,editoptions:{size:30},
                    edittype:'text',editoptions:{size:20,maxlength:50},
                    editrules:{} },
                {name:'mie_telefono',index:'mie_telefono', width:80,editable:true,editoptions:{size:8},align:'center',
                    edittype:'text',editoptions:{size:10,maxlength:9,dataInit:function(el){$(el).mask("9999-9999",{placeholder:" "});}}
                    }
            ],
            multiselect: false,
            caption: "Miembros de la Comisión Financiera Municipal",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerMiembros'),
            viewrecords: true,
            gridComplete: 
                function(){
                $.getJSON('<?php echo base_url('componente2/comp24_E0/count_sexo/asitec_miembros/mie_sexo') ?>/asi_tec_id/<?php echo $asi_tec_id; ?>',
                function(data) {
                    $('#total').val(data['total']);
                    $('#mujeres').val(data['female']);
                    $('#hombres').val(data['male']);
                }); 
            }
        });
        $("#miembros").jqGrid('navGrid','#pagerMiembros',
            {edit:false,add:false,del:true,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
            }
        );
        $("#miembros").jqGrid('inlineNav',"#pagerMiembros");
        // Funcion para regargar los JQGRID luego de agregar y editar
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
        
        var jqLista = $('#lista');
        jqLista.jqGrid({
           	url: '<?php echo base_url('componente2/comp24_E0/getAsistenciasTecnicas/'); ?>/' + $('#mun_id').val(),
        	datatype: "json",
            width: 300,
           	colNames:['Id','Fecha'],
           	colModel:[
           		{name:'id',index:'id', width:55},
           		{name:'asi_tec_fecha_solicitud',index:'asi_tec_fecha_solicitud', width:90}		
           	],
           	rowNum:10,
           	rowList:[10,20,30],
           	pager: '#pagerLista',
           	sortname: 'id',
            viewrecords: true,
            sortorder: "desc",
            caption:"Asistencias Tecnicas",
            ondblClickRow: function(rowid, iRow, iCol, e){
                window.location.href='<?php echo current_url(); ?>/' + rowid;
            }
        });
        /**/
        
        /**/
        var download_path_1 = '<?php $t=set_value('asi_tec_archivo_perfil'); if($t!=''){echo base_url($t);}?>';
        if(download_path_1==''){$('#btn_download_1').hide();}
        $('#btn_upload_1').button();
        $('#btn_download_1').button().click(function(e){
            if(download_path_1 != ''){
                e.preventDefault();  //stop the browser from following
                window.location.href = download_path_1;
            }
        });
        new AjaxUpload('#btn_upload_1', {
            action: '<?php echo base_url('componente2/comp24_E0/uploadFile') . '/asistencia_tecnica/asi_tec_archivo_perfil/asi_tec_id/' . $asi_tec_id; ?>',
            onSubmit : function(file , ext){
                if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                    $('#vineta_1').html('<span class="error">Extension no Permitida</span>');
                    return false;
                } else {
                    $('#vineta_1').html('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response,ext){
                if(response!='error'){
                    $('#vineta_1').html('Ok');                    
                    this.enable();
                    download_path_1 = response;
                     $('#btn_download_1').show();
                }else{
                    $('#vineta_1').html('<span class="error">Error</span>');
                    this.enable();			
                 
                }/**/
            }	
        });
        var download_path_2 = '<?php $t=set_value('asi_tec_archivo_trd'); if($t!=''){echo base_url($t);}?>';
        if(download_path_2==''){$('#btn_download_2').hide();}
        $('#btn_upload_2').button();
        $('#btn_download_2').button().click(function(e){
            if(download_path_2 != ''){
                e.preventDefault();  //stop the browser from following
                window.location.href = download_path_2;
            }
        });
        new AjaxUpload('#btn_upload_2', {
            action: '<?php echo base_url('componente2/comp24_E0/uploadFile') . '/asistencia_tecnica/asi_tec_archivo_trd/asi_tec_id/' . $asi_tec_id; ?>',
            onSubmit : function(file , ext){
                if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                    $('#vineta_2').html('<span class="error">Extension no Permitida</span>');
                    return false;
                } else {
                    $('#vineta_2').html('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response,ext){
                if(response!='error'){
                    $('#vineta_2').html('Ok');                    
                    this.enable();
                    download_path_2 = response;
                     $('#btn_download_2').show();
                }else{
                    $('#vineta_2').html('<span class="error">Error</span>');
                    this.enable();			
                 
                }/**/
            }	
        });
        var download_path_3 = '<?php $t=set_value('asi_tec_archivo_acuerdo'); if($t!=''){echo base_url($t);}?>';
        if(download_path_3==''){$('#btn_download_3').hide();}
        $('#btn_upload_3').button();
        $('#btn_download_3').button().click(function(e){
            if(download_path_3 != ''){
                e.preventDefault();  //stop the browser from following
                window.location.href = download_path_3;
            }
        });
        new AjaxUpload('#btn_upload_3', {
            action: '<?php echo base_url('componente2/comp24_E0/uploadFile') . '/asistencia_tecnica/asi_tec_archivo_acuerdo/asi_tec_id/' . $asi_tec_id; ?>',
            onSubmit : function(file , ext){
                if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                    $('#vineta_3').html('<span class="error">Extension no Permitida</span>');
                    return false;
                } else {
                    $('#vineta_3').html('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response,ext){
                if(response!='error'){
                    $('#vineta_3').html('Ok');                    
                    this.enable();
                    download_path_3 = response;
                     $('#btn_download_3').show();
                }else{
                    $('#vineta_3').html('<span class="error">Error</span>');
                    this.enable();			
                 
                }/**/
            }	
        });
        /**/
               
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
        
        function formularioHide(){
            $('#listaContainer').show();
            $('#formulario').hide()
        }
        
        function formularioShow(){
            $('#listaContainer').hide();
            $('#formulario').show()
        }
 
        
        <?php
        //echo '//'.$this->session->keep_flashdata('message');
        if($this->session->flashdata('message')=='Ok'){
            echo "$('#efectivo').dialog('open');";
        }
        if(isset($asi_tec_id) && $asi_tec_id > 0){
            echo "formularioShow();";
        }else{
            echo "formularioHide();";
        }
        ?>
  
    });
</script>

<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>

<?php echo form_open('',array('id'=>'frm')) ?>

    <h2 class="h2Titulos">Etapa 0: Condiciones Previas</h2>
    <h2 class="h2Titulos">Elaboracion de perfil y PRFM</h2>
    <br/>
    <div id="rpt_frm_bdy">
        <div id="listaContainer">
            <div class="campo">
                <label>Departamento</label>
                <select id='selDepto'>
                    <option value='0'>--Seleccione--</option>
                    <?php foreach ($departamentos as $depto) { ?>
                    <option value='<?php echo $depto->dep_id; ?>'><?php echo $depto->dep_nombre; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="campo">
                <label>Municipio</label>
                <select id='mun_id' name='mun_id'>
                    <option value='0'>--Seleccione--</option>
                </select>
                <?php echo form_error('mun_id'); ?>
            </div>
            <div id="rpt-border"></div>
            <div style="margin-left: 300px;">
                <table id="lista"></table>
                <div id="pagerLista"></div>
                <div id="btn_acuerdo_nuevo">Crear Nuevo</div>
            </div>
        </div>
        <div id="formulario" style="display: none;">
            <div class="campo">
                <label>Departamento:</label>
                <input id="depto" name="depto" type="text" readonly="readonly" value="<?php echo set_value('depto') ?>" />
            </div>
            <div class="campo">
                <label>Municipio:</label>
                <input id="muni" name="muni" type="text" readonly="readonly" value="<?php echo set_value('muni') ?>" />
            </div>
            <div class="campo">
                <label>Fecha de solicitud de asistencia al ISDEM:</label>
                <input id="asi_tec_fecha_solicitud" name="asi_tec_fecha_solicitud" type="text" readonly="readonly" value="<?php echo set_value('asi_tec_fecha_solicitud') ?>"/>
                <?php echo form_error('asi_tec_fecha_solicitud'); ?>
            </div>
            <div class="campo">
                <label>Fecha de emision de acuerdo municipal:</label>
                <input id="asi_tec_fecha_emision" name="asi_tec_fecha_emision" type="text" readonly="readonly" value="<?php echo set_value('asi_tec_fecha_emision') ?>"/>
                <?php echo form_error('asi_tec_fecha_emision'); ?>
            </div>
            <div class="campo">
                <label>Fecha de envio de acuerdo municipal al FISDL:</label>
                <input id="asi_tec_fecha_envio" name="asi_tec_fecha_envio" type="text" readonly="readonly" value="<?php echo set_value('asi_tec_fecha_envio') ?>"/>
                <?php echo form_error('asi_tec_fecha_envio'); ?>
            </div>
            <div class="campo">
                <label>Fecha de orden de inicio:</label>
                <input id="asi_tec_fecha_inicio" name="asi_tec_fecha_inicio" type="text" readonly="readonly" value="<?php echo set_value('asi_tec_fecha_inicio') ?>"/>
                <?php echo form_error('asi_tec_fecha_inicio'); ?>
            </div>
            <div class="campo">
                <label>Consultor:</label>
                <select id="asi_tec_onsultor" name="asi_tec_onsultor">
                	<option value="0">Select</option>
                </select>
                <?php echo form_error('asi_tec_onsultor'); ?>
            </div>
            <div id="rpt-border"></div>
            <div class="tabla">
                <label>Miembros de la comision financiera municipal</label>
                <table id="miembros"></table>
                <div id="pagerMiembros"></div>
            </div>
            <div class="campo">
                <label>Cantidad de Participantes:</label>
                <span>Hombres</span>
                <input id="hombres" name="count_male" readonly="" style="width: 50px; text-align: center;" value="0" />
                <span>Mujeres</span>
                <input id="mujeres" name="count_female" readonly="" style="width: 50px; text-align: center;" value="0" />
                <span>Total</span>
                <input id="total" name="count_female" readonly="" style="width: 50px; text-align: center;" value="0" />
            </div>
            <div class="campo" style="display: inline-block;">
                <label>Cargar archivo:</label>
                <div id="fileUpload" style="display: inline-block;">
                    <div id="btn_upload_1" style="display: inline-block;">Subir Perfil</div>
                    <a id="btn_download_1" href="#" style="display: inline-block;">Descargar</a>
                    <div id="vineta_1" style="display: inline-block;"></div>
                </div>
                <div id="fileUpload" style="margin-left: 325px; margin-top: 10px;">
                    <div id="btn_upload_2" style="display: inline-block;">Subir TRD</div>
                    <a id="btn_download_2" href="#" style="display: inline-block;">Descargar</a>
                    <div id="vineta_2" style="display: inline-block;"></div>
                </div>
                <div id="fileUpload" style="margin-left: 325px; margin-top: 10px;">
                    <div id="btn_upload_3" style="display: inline-block;">Subir Acuerdo</div>
                    <a id="btn_download_3" href="#" style="display: inline-block;">Descargar</a>
                    <div id="vineta_3" style="display: inline-block;"></div>
                </div>
                <div class="uploadText" style="margin-left: 350px;">Para actualizar un archivo basta con subir nuevamente el archivo y este se reemplaza automáticamente. Solo se permiten archivos con extensión pdf, doc, docx</div>
            </div>
            <div class="campo">
                <label style="text-align: left;">Observaciones</label>
                <textarea id="acu_mun_observaciones" name="acu_mun_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('acu_mun_observaciones')?></textarea>
                <?php echo form_error('acu_mun_observaciones'); ?>
            </div>
            <div id="actions" style="position: relative;top: 20px">
                <input type="submit" id="guardar" value="Guardar" />
                <input type="button" id="cancelar" value="Cancelar" />
            </div>
            <input type="hidden" value="modificado" name="mod" id="mod" />
        </div>
    </div>
<?php echo form_close();
$this->load->view('plantilla/footer'); ?>