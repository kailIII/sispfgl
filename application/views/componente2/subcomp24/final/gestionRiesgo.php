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
            $('#mun_id').children().remove();
            $.ajax({
                url: '<?php echo base_url('componente2/comp24_E0/getMunicipios') ?>/'+$('#selDepto').val()
            }).done(function(data){
                $('#mun_id').html(data);
            });           
        });
        $('#mun_id').change(function(){
            jqLista.jqGrid('clearGridData')
                .jqGrid('setGridParam', { 
                    url: '<?php echo base_url('componente2/comp24_E3/getSegEvaluaciones'); ?>/' + $('#mun_id').val(), 
                    datatype: 'json', 
                    page:1 })
                .trigger('reloadGrid');
        });
        
        /*GRID*/
        $("#miembros").jqGrid({
            url:'<?php echo base_url('componente2/comp24_E3/loadEmpleados') . '/' . $seg_eva_id; ?>',
            editurl:'<?php echo base_url('componente2/comp24_E3/gestionEmpleados') . '/' . $seg_eva_id; ?>',
            datatype:'json',
            altRows:true,
            gridview: true,
            hidegrid: false,
            colNames:['id','Padre','Nombres','Apellidos','Sexo','Edad','Cargo','Telefono','Participa'],
            colModel:[
                {name:'emp_id',index:'emp_id', width:30,editable:false,editoptions:{size:15},hidden:true },
                {name:'acu_mun_id',index:'acu_mun_id', width:30,editable:false,editoptions:{size:15},hidden:true },
                {name:'emp_nombre',index:'emp_nombre', width:123,editable:false,
                    edittype:'text',editoptions:{size:20,maxlength:50},
                    editrules:{required:true} },
                {name:'emp_apellidos',index:'emp_apellidos', width:123,editable:false,
                    edittypr:'text',editoptions:{size:20,maxlength:50},
                    editrules:{required:true} },
                {name:'emp_sexo',index:'emp_sexo', width:90,editable:false,
                    edittype:'select',formatter:'select',editoptions:{value:'M:Masculino;F:Femenino'},
                    editrules:{required:true} },
                {name:'emp_edad',index:'emp_edad', width:50,editable:false,align:'center',
                    edittype:'text',editoptions:{size:5,maxlength:2},
                    editrules:{number:true,minValue:18,maxValue:100} },
                {name:'emp_cargo',index:'emp_cargo', width:123,editable:false,editoptions:{size:30},
                    edittype:'text',editoptions:{size:20,maxlength:50},
                    editrules:{required:true} },
                {name:'emp_telefono',index:'emp_telefono', width:80,editable:true,editoptions:{size:8},align:'center',
                    edittype:'text',editoptions:{size:10,maxlength:9,dataInit:function(el){$(el).mask("9999-9999",{placeholder:" "});}}
                    },
                {name:'participa',index:'participa', width:50,editable:true,align:'center',
                    formatter:'checkbox',formatoptions:{disabled:false},
                    edittype:'checkbox'}
            ],
            multiselect: false,
            caption: "Empleados Municipales",
            rowNum:20,
            rowList:[20,50],
            loadonce:true,
            pager: $('#pagerMiembros'),
            viewrecords: true,
            ondblClickRow: function(rowid,iRow,iCol,e){
                 $('#miembros').jqGrid('editRow',rowid,true); 
            },
            gridComplete: 
                function(){
                $.getJSON('<?php echo base_url('componente2/comp24_E0/count_sexo/empleados/emp_sexo') ?>/emp_mun_id/<?php echo $seg_eva_id; ?>',
                function(data) {
                    $('#total').val(data['total']);
                    $('#mujeres').val(data['female']);
                    $('#hombres').val(data['male']);
                }); 
            }
        });
        $("#miembros").jqGrid('navGrid','#pagerMiembros',
            {edit:false,add:false,del:false,search:true,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
            }
        );
        $("#miembros").jqGrid('inlineNav',"#pagerMiembros",{editParams:{keys:true}});
        
        $("#otros").jqGrid({
            url:'<?php echo base_url('componente2/comp24_E3/loadOtros') . '/' . $seg_eva_id; ?>',
            editurl:'<?php echo base_url('componente2/comp24_E3/gestionOtros') . '/' . $seg_eva_id; ?>',
            datatype:'json',
            altRows:true,
            gridview: true,
            hidegrid: false,
            colNames:['id','Padre','Nombres','Apellidos','Sexo','Edad','Cargo','Telefono'],
            colModel:[
                {name:'par_id',index:'par_id', width:30,editable:false,editoptions:{size:15},hidden:true },
                {name:'acu_mun_id',index:'acu_mun_id', width:30,editable:false,editoptions:{size:15},hidden:true },
                {name:'par_nombre',index:'par_nombre', width:123,editable:false,
                    edittype:'text',editoptions:{size:20,maxlength:50},
                    editrules:{required:true} },
                {name:'par_apellidos',index:'par_apellidos', width:123,editable:false,
                    edittypr:'text',editoptions:{size:20,maxlength:50},
                    editrules:{required:true} },
                {name:'par_sexo',index:'par_sexo', width:90,editable:false,
                    edittype:'select',formatter:'select',editoptions:{value:'M:Masculino;F:Femenino'},
                    editrules:{required:true} },
                {name:'par_edad',index:'par_edad', width:50,editable:false,align:'center',
                    edittype:'text',editoptions:{size:5,maxlength:2},
                    editrules:{number:true,minValue:18,maxValue:100} },
                {name:'par_cargo',index:'par_cargo', width:123,editable:false,editoptions:{size:30},
                    edittype:'text',editoptions:{size:20,maxlength:50},
                    editrules:{required:true} },
                {name:'par_telefono',index:'par_telefono', width:80,editable:true,editoptions:{size:8},align:'center',
                    edittype:'text',editoptions:{size:10,maxlength:9,dataInit:function(el){$(el).mask("9999-9999",{placeholder:" "});}}
                    }
            ],
            multiselect: false,
            caption: "Otros Participantes",
            rowNum:20,
            rowList:[20,50],
            loadonce:true,
            pager: $('#pagerOtros'),
            viewrecords: true,
            ondblClickRow: function(rowid,iRow,iCol,e){
                 $('#otros').jqGrid('editRow',rowid,true); 
            },
            gridComplete: 
                function(){
                $.getJSON('<?php echo base_url('componente2/comp24_E0/count_sexo/empleados/emp_sexo') ?>/emp_mun_id/<?php echo $seg_eva_id; ?>',
                function(data) {
                    $('#total').val(data['total']);
                    $('#mujeres').val(data['female']);
                    $('#hombres').val(data['male']);
                }); 
            }
        });
        $("#otros").jqGrid('navGrid','#pagerOtros',
            {edit:false,add:false,del:false,search:true,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
            }
        );
        $("#otros").jqGrid('inlineNav',"#pagerOtros",{editParams:{keys:true}});
        
        var jqLista = $('#lista');
        jqLista.jqGrid({
           	url: '<?php echo base_url('componente2/comp24_E3/getSegEvaluaciones/'); ?>/' + $('#mun_id').val(),
        	datatype: "json",
            width: 300,
           	colNames:['Id','Fecha'],
           	colModel:[
           		{name:'id',index:'id', width:55},
           		{name:'fecha',index:'fecha', width:90}		
           	],
           	rowNum:10,
           	rowList:[10,20,30],
           	pager: '#pagerLista',
           	sortname: 'id',
            viewrecords: true,
            sortorder: "desc",
            caption:"Seguimiento a Evaluaciones",
            ondblClickRow: function(rowid, iRow, iCol, e){
                window.location.href='<?php echo current_url(); ?>/' + rowid;
            }
        });
        /**/
        
        $( "#seg_eva_fecha_presentacion" ).datepicker({
            showOn: 'both',
            maxDate:    '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        
        /**/
        var download_path = '<?php $t=set_value('seg_eva_archivo_informe'); if($t!=''){echo base_url($t);}?>';
        if(download_path==''){$('#btn_download').hide();}
        $('#btn_upload').button();
        $('#btn_download').button().click(function(e){
            if(download_path != ''){
                e.preventDefault();  //stop the browser from following
                window.location.href = download_path;
            }
        });
        new AjaxUpload('#btn_upload', {
            action: '<?php echo base_url('componente2/comp24_E0/uploadFile') . '/seguimiento_evaluacion/seg_eva_archivo_informe/seg_eva_id/' . $seg_eva_id; ?>',
            onSubmit : function(file , ext){
                if (! (ext && /^(pdf|doc|docx)$/.test(ext))){
                    $('#vineta').html('<span class="error">Extension no Permitida</span>');
                    return false;
                } else {
                    $('#vineta').html('Subiendo....');
                    this.disable();
                }
            },
            onComplete: function(file, response,ext){
                if(response!='error'){
                    $('#vineta').html('Ok');                    
                    this.enable();
                    download_path = response;
                     $('#btn_download').show();
                }else{
                    $('#vineta').html('<span class="error">Error</span>');
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
        if(isset($seg_eva_id) && $seg_eva_id > 0){
            //echo "formularioShow();";
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

    <h2 class="h2Titulos">Etapa Final: Gestion de Riesgo</h2>
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
                <label>Muncicipio:</label>
                <input id="muni" name="muni" type="text" readonly="readonly" value="<?php echo set_value('muni') ?>" />
            </div>
            <div class="campo">
                <label>Fecha de Presentación:</label>
                <input id="seg_eva_fecha_presentacion" name="seg_eva_fecha_presentacion" type="text" readonly="readonly" value="<?php echo set_value('seg_eva_fecha_presentacion') ?>"/>
                <?php echo form_error('seg_eva_fecha_presentacion'); ?>
            </div>
            <div class="campo">
                <label>Lugar:</label>
                <input id="seg_eva_lugar" name="seg_eva_lugar" type="text" value="<?php echo set_value('seg_eva_lugar') ?>"/>
                <?php echo form_error('seg_eva_lugar'); ?>
            </div>
            <div class="tabla">
                <label></label>
                <table id="miembros"></table>
                <div id="pagerMiembros"></div>
            </div>
            <div class="tabla">
                <label></label>
                <table id="otros"></table>
                <div id="pagerOtros"></div>
            </div>
            <div class="campo">
                <label>Cantidad de Empleados:</label>
                <span>Hombres</span>
                <input id="hombres" name="count_male" readonly="" style="width: 50px; text-align: center;" value="0" />
                <span>Mujeres</span>
                <input id="mujeres" name="count_female" readonly="" style="width: 50px; text-align: center;" value="0" />
                <span>Total</span>
                <input id="total" name="count_female" readonly="" style="width: 50px; text-align: center;" value="0" />
            </div>
            <div class="campo">
                <label style="text-align: left; width: 620px;">Incorporo el informe de desempeño administrativo financiero en el informe anual de rendicion de cuenas?</label>
                <span>Si</span><input type="radio" name="seg_eva_is_informe" value="t" <?php echo set_radio('seg_eva_is_informe', 't'); ?>/>
                <span>No</span><input type="radio" name="seg_eva_is_informe" value="f" <?php echo set_radio('seg_eva_is_informe', 'f', TRUE); ?>/>
                <?php echo form_error('seg_eva_is_informe'); ?>
            </div>
            <div style="width: 100%;">
                <div style="width: 50%; display: inline-block;">
                    <div class="campoUp">
                        <label style="text-align: left;">Observaciones y/o Recomendaciones</label>
                        <textarea id="seg_eva_observaciones" name="seg_eva_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('seg_eva_observaciones')?></textarea>
                        <?php echo form_error('seg_eva_observaciones'); ?>
                    </div>
                </div>
                <div class="campoUp" style="display: inline-block;">
                    <label>Cargar archivo:</label>
                    <div id="fileUpload" style="margin-left: 20px;">
                        <div id="btn_upload" style="display: inline-block;">Subir Informe</div>
                        <a id="btn_download" href="#" style="display: inline-block;">Descargar</a>
                        <div id="vineta" style="display: inline-block;"></div>
                        <div class="uploadText" style="width: 300px;">Para actualizar un archivo basta con subir nuevamente el archivo y este se reemplaza automáticamente. Solo se permiten archivos con extensión pdf, doc, docx</div>
                    </div>
                </div>
            </div>
            <input id="archivo" name="archivo" value="<?php echo set_value('archivo') ?>" type="text" size="100" readonly="readonly" style="visibility: hidden"/>
            <div id="actions" style="position: relative;top: 20px">
                <input type="submit" id="guardar" value="Guardar" />
                <input type="button" id="cancelar" value="Cancelar" />
            </div>
            <input type="hidden" value="modificado" name="mod" id="mod" />
        </div>
    </div>
<?php echo form_close();
$this->load->view('plantilla/footer'); ?>