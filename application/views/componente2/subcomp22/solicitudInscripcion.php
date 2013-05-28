<?php

/**
 * 
 * 
 * @author Alexis Beltran
 */

$this->load->view('plantilla/header', $titulo);
$this->load->view('plantilla/menu', $menu);

?>
<style type="text/css">
<!--
#politica span {
    display: block;
    margin-bottom: 10px;
}
#politica {
    margin: 50px;
    padding-left: 50px;
}
-->
</style>
<script type="text/javascript">        
$(document).ready(function(){
    /*BASICO*/
    function formularioHide(){$('#listaContainer').show();$('#formulario').hide()}
    function formularioShow(){$('#listaContainer').hide();$('#formulario').show()}
    $("#guardar").button();
    $("#btn_acuerdo_nuevo").button().click(function(){$('#frm').submit();});
    $("#btn_seleccionar").button().click(function(){document.location.href='<?php echo current_url(); ?>/' + jQuery("#lista").jqGrid('getGridParam','selrow');});
    $("#cancelar").button().click(function() {document.location.href='<?php echo base_url(); ?>';});
    $('.mensaje').dialog({autoOpen: false,width: 300,
        buttons: {"Ok": function() {$(this).dialog("close");}}
    });
    $('#selDepto').change(function(){   
        $.ajax({url: '<?php echo base_url('componente2/comp24_E0/getMunicipios') ?>/'+$('#selDepto').val()
        }).done(function(data){$('#mun_id').children().remove();$('#mun_id').html(data);});           
    });
    /**/
    $('#mun_id').change(function(){
        window.location.href = '<?php echo current_url(); ?>/' + $('#mun_id').val();
    });
            
    /*PARA EL DATEPICKER*/
    $( "#acu_mun_fecha_conformacion" ).datepicker({
        showOn:         'both',
        maxDate:        '+1D',
        buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd/mm/yy',
        onClose: function( selectedDate ) {
            $( "#acu_mun_fecha_acuerdo" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    $( "#acu_mun_fecha_acuerdo" ).datepicker({
        showOn:         'both',
        maxDate:        '+1D',
        buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd/mm/yy',
        onClose: function( selectedDate ) {
            $( "#acu_mun_fecha_recepcion" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    $( "#par_birthday" ).datepicker({
        showOn: 'both',
        maxDate:    '+1D',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd/mm/yy'
    });
    /*FIN DEL DATEPICKER*/
    
    /*GRID*
    $("#miembros").jqGrid({
        url:'<?php echo base_url('componente2/comp24_E0/acuMun_loadMiembros') . '/' . $acu_mun_id; ?>',
        editurl:'<?php echo base_url('componente2/comp24_E0/acuMun_gestionMiembros') . '/' . $acu_mun_id; ?>',
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
            $.getJSON('<?php echo base_url('componente2/comp24_E0/count_sexo/acumun_miembros/mie_sexo') ?>/acu_mun_id/<?php echo $acu_mun_id; ?>',
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
    /*desabilitado para activas completar comentario de esta linea y retirar display:none; del elemento *
    var jqLista = $('#lista');
    jqLista.jqGrid({
       	url: '<?php echo base_url('componente2/comp24_E0/getAcuerdosMunicipales/'); ?>/' + $('#mun_id').val(),
    	datatype: "json",
        width: 300,
       	colNames:['Id','Fecha'],
       	colModel:[
       		{name:'id',index:'id', width:55},
       		{name:'acu_mun_fecha_acuerdo',index:'acu_mun_fecha_acuerdo', width:90}		
       	],
       	rowNum:10,
       	rowList:[10,20,30],
       	pager: '#pagerLista',
       	sortname: 'id',
        viewrecords: true,
        sortorder: "desc",
        caption:"Acuerdos Municipales",
        ondblClickRow: function(rowid, iRow, iCol, e){
            window.location.href='<?php echo current_url(); ?>/' + rowid;
        }
    });
    /**/
    
    /**
    var download_path = '<?php $t=set_value('acu_mun_archivo_acuerdo'); if($t!=''){echo base_url($t);}?>';
    if(download_path==''){$('#btn_download').hide();}
    $('#btn_upload').button();
    $('#btn_download').button().click(function(e){
        if(download_path != ''){
            e.preventDefault();  //stop the browser from following
            window.location.href = download_path;
        }
    });
    new AjaxUpload('#btn_upload', {
        action: '<?php echo base_url('componente2/comp24_E0/uploadFile') . '/acuerdo_municipal2/acu_mun_archivo_acuerdo/acu_mun_id/' . $acu_mun_id; ?>',
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
             
            }
        }	
    });/**/
    <?php
    //Muestra los dialogos.
    if($this->session->flashdata('message')=='Ok'){echo "$('#efectivo').dialog('open');";}
    if(isset($tabla_id) && $tabla_id > 0){echo "formularioShow();";}else{echo "formularioHide();";}
    ?>
});
</script>

<div id="efectivo" class="mensaje" title="Almacenado" style="display: none;">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>

<?php echo form_open('',array('id'=>'frm_acuerdo_municipal2')) ?>

    <h2 class="h2Titulos">Capacitaciones</h2>
    <h2 class="h2Titulos">Formulario de Registro y Preselección</h2>
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
            <div id="politica">
            <h3>Criterios de  Preselección/elegibilidad para aplicar a Procesos de Formación por parte de los empleados municipales.</h3>
            <span>Ser empleado/a de municipio clasificado como de pobreza extrema alta, severa y moderada (en este orden de prioridad)</span>
            <span>Tiempo mínimo de trabajo en la municipalidad de 3 años</span>
            <span>Nivel mínimo de estudios: Bachillerato</span>
            <span>Relación entre proceso formativo al que aplica y funciones del puesto de trabajo del solicitante</span>
            <span><input type="checkbox" name="par_acepta" value="ok" <?php echo set_checkbox('par_acepta','1'); ?> />He leido los criterios de Preselección/elegibilidad para aplicar a Procesos de Formación</span>
            </div>
            <div style="margin-left: 300px;display: none;">
                <table id="lista"></table>
                <div id="pagerLista"></div>
                <div id="btn_acuerdo_nuevo">Crear Nuevo</div>
            </div>
        </div>
        <div id="formulario" style="display: block;">
            <div class="campo">
                <label>Departamento:</label>
                <input id="depto" name="depto" type="text" readonly="readonly" value="<?php echo set_value('depto') ?>" />
            </div>
            <div class="campo">
                <label>Municipio:</label>
                <input id="muni" name="muni" type="text" readonly="readonly" value="<?php echo set_value('muni') ?>" />
            </div>
            <fieldset style="width: 700px; display: block; vertical-align: top; margin-left: 89px;">
                <legend>Datos Generales</legend>
                <div class="campo">
                    <label style="width: 200px;">Apellidos:</label>
                    <input id="par_apellidos" name="par_apellidos" type="text" value="<?php echo set_value('par_apellidos') ?>"/>
                    <?php echo form_error('par_apellidos'); ?>
                </div>
                <div class="campo">
                    <label style="width: 200px;">Nombres:</label>
                    <input id="par_nombres" name="par_nombres" type="text" value="<?php echo set_value('par_nombres') ?>"/>
                    <?php echo form_error('par_nombres'); ?>
                </div>
                <div class="campo">
                    <label style="width: 200px;">Lugar de Nacimiento:</label>
                    <input id="par_birthplace" name="par_birthplace" type="text" value="<?php echo set_value('par_birthplace') ?>"/>
                    <?php echo form_error('par_birthplace'); ?>
                </div>
                <div class="campo">
                    <label style="width: 200px;">Fecha de Nacimiento:</label>
                    <input id="par_birthday" name="par_birthday" type="text" readonly="readonly" value="<?php echo set_value('par_birthday') ?>" style="width: 150px;"/>
                    <span>Masculino</span><input type="radio" name="par_sexo" value="M" <?php echo set_radio('par_sexo', 'm', TRUE); ?>/>
                    <span>Femenino</span><input type="radio" name="par_sexo" value="F" <?php echo set_radio('par_sexo', 'f'); ?>/>
                <?php echo form_error('par_birthday'); ?>
                </div>
                <div class="campo">
                    <label style="width: 200px;">DUI:</label>
                    <input id="par_dui" name="par_dui" type="text" value="<?php echo set_value('par_dui') ?>"/>
                    <?php echo form_error('par_dui'); ?>
                </div>
            </fieldset>
            <fieldset style="width: 700px; display: block; vertical-align: top; margin-left: 89px;">
                <legend>Domicilio de Residencia Actual</legend>
                <div class="campo">
                    <label style="width: 200px;"></label>
                    <span>Barrio</span><input type="radio" name="par_dir_tipo" value="Barrio" <?php echo set_radio('par_dir_tipo', 'Barrio'); ?>/>
                    <span>Colonia</span><input type="radio" name="par_dir_tipo" value="Colonia" <?php echo set_radio('par_dir_tipo', 'Colonia', TRUE); ?>/>
                    <span>Cantón</span><input type="radio" name="par_dir_tipo" value="Canton" <?php echo set_radio('par_dir_tipo', 'Canton'); ?> />
                </div>
                <div class="campo">
                    <label style="width: 200px;">Nombre:</label>
                    <input id="par_dir_nombre" name="par_dir_nombre" type="text" value="<?php echo set_value('par_dir_nombre') ?>"/>
                    <?php echo form_error('par_dir_nombre'); ?>
                </div>
                <div class="campo">
                    <label style="width: 200px;">Calle:</label>
                    <input id="par_dir_calle" name="par_dir_calle" type="text" value="<?php echo set_value('par_dir_calle') ?>"/>
                    <?php echo form_error('par_dir_calle'); ?>
                </div>
                <div class="campo">
                    <label style="width: 200px;">No. de Casa:</label>
                    <input id="par_dir_casa" name="par_dir_casa" type="text" value="<?php echo set_value('par_dir_casa') ?>"/>
                    <?php echo form_error('par_dir_casa'); ?>
                </div>
            </fieldset>
            <fieldset style="width: 700px; display: block; vertical-align: top; margin-left: 89px;">
                <legend>Telefonos de Contacto</legend>
                <div class="campo">
                    <label style="width: 200px;">Municipales:</label>
                    <input id="par_ins_telefono" name="par_ins_telefono" type="text" value="<?php echo set_value('par_ins_telefono') ?>" style="width: 150px;"/>
                    <input id="par_ins_movil" name="par_ins_movil" type="text" value="<?php echo set_value('par_ins_movil') ?>" style="width: 150px;"/>
                    <?php echo form_error('par_ins_telefono'); ?>
                </div>
                <div class="campo">
                    <label style="width: 200px;">Personales:</label>
                    <input id="par_telefono" name="par_telefono" type="text" value="<?php echo set_value('par_telefono') ?>" style="width: 150px;"/>
                    <input id="par_movil" name="par_movil" type="text" value="<?php echo set_value('par_movil') ?>" style="width: 150px;"/>
                    <?php echo form_error('par_telefono'); ?>
                </div>
            </fieldset>
            <fieldset style="width: 700px; display: block; vertical-align: top; margin-left: 89px;">
                <legend>Información Academica</legend>
                <div class="campo">
                    <label style="width: 200px;">Nivel de Estudios Cursados:</label>
                    <?php 
                    $par_nivel = array(
                        '0'  => 'Seleccione',
                        'Maestria'  => 'Maestría',
                        'Posgrado'    => 'Posgrado',
                        'Grado Universitario'   => 'Grado Universitario',
                        'Bachillerato' => 'Bachillerato',
                        'Tecnico' => 'Técnico',
                        'Educacion Primaria' => 'Educación Primaria',
                    );
                    echo form_dropdown('par_nivel',$par_nivel,set_value('par_nivel','0'));
                    echo form_error('par_nivel'); ?>
                </div>
                <div class="campo">
                    <label style="width: 200px;">Titulos Obtenidos:</label>
                    <textarea id="par_titulos" name="par_titulos" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('par_titulos')?></textarea>
                    <?php echo form_error('par_titulos'); ?>
                </div>
            </fieldset>
            <fieldset style="width: 700px; display: block; vertical-align: top; margin-left: 89px;">
                <legend>Información sobre la Institución</legend>
                <div class="campo">
                    <label style="width: 200px;">Municipalidad:</label>
                    <input id="par_ins_municipio" name="par_ins_municipio" type="text" value="<?php echo set_value('par_ins_municipio') ?>"/>
                    <?php echo form_error('par_ins_municipio'); ?>
                </div>
                <div class="campo">
                    <label style="width: 200px;">Categoria:</label>
                    <input id="par_ins_categoria" name="par_ins_categoria" type="text" value="<?php echo set_value('par_ins_categoria') ?>"/>
                    <?php echo form_error('par_ins_categoria'); ?>
                </div>
                <div class="campo">
                    <label style="width: 200px;">Denominación del Cargo:</label>
                    <input id="par_ins_cargo" name="par_ins_cargo" type="text" value="<?php echo set_value('par_ins_cargo') ?>"/>
                    <?php echo form_error('par_ins_cargo'); ?>
                </div>
                <div class="campo">
                    <label style="width: 200px;">Nivel:</label>
                    <input id="par_ins_nivel" name="par_ins_nivel" type="text" value="<?php echo set_value('par_ins_nivel') ?>"/>
                    <?php echo form_error('par_ins_nivel'); ?>
                </div>
                <div class="campo">
                    <label style="width: 200px;">Tiempo de Servicio:</label>
                    <input id="par_ins_tiempo" name="par_ins_tiempo" type="text" value="<?php echo set_value('par_ins_tiempo') ?>" style="width: 75px;"/>
                    <span>Años</span>
                    <input id="par_ins_tiempo2" name="par_ins_tiempo2" type="text" value="<?php echo set_value('par_ins_tiempo2') ?>" style="width: 75px;"/>
                    <span>Meses</span>
                    <?php echo form_error('par_ins_tiempo'); ?>
                </div>
                <div class="campo">
                    <label style="width: 200px;">Tiempo en Cargo Actual:</label>
                    <input id="par_ins_servicio" name="par_ins_servicio" type="text" value="<?php echo set_value('par_ins_servicio') ?>" style="width: 75px;"/>
                    <span>Años</span>
                    <input id="par_ins_servicio2" name="par_ins_servicio2" type="text" value="<?php echo set_value('par_ins_servicio2') ?>" style="width: 75px;"/>
                    <span>Meses</span>
                    <?php echo form_error('par_ins_servicio'); ?>
                </div>
            </fieldset>
            <div id="actions" style="position: relative;top: 20px">
                <input type="submit" id="guardar" value="Guardar" />
                <input type="button" id="cancelar" value="Cancelar" />
            </div>
            <input type="hidden" value="modificado" name="mod" id="mod" />
        </div>
        <?php echo form_close(); echo form_open('componente2/comp22/addSolicitud/'.$tabla_id); ?>
        <div id="procesos">
            <div class="campo">
                <label>Proceso de Formación que desea participar:</label>
                <?php echo form_dropdown('cap_id',$capacitaciones,set_value('cap_id','0')); ?>
                <?php echo form_error('cap_id'); ?>
            </div>
            <div class="campo">
                <label>Justifique por que desea Participar:</label>
                <textarea id="cxp_justificacion" name="cxp_justificacion" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('cxp_justificacion')?></textarea>
                <?php echo form_error('cxp_justificacion'); ?>
            </div>
            <div id="actions" style="position: relative;top: 20px">
                <input type="submit" id="guardar" value="Enviar" />
                <input type="button" id="cancelar" value="Cancelar" />
            </div>
        </div>
    </div>
<?php echo form_close();
$this->load->view('plantilla/footer'); ?>