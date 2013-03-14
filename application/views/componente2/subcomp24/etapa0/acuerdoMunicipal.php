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
            $('#frm_acuerdo_municipal2').submit();
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
                    url: '<?php echo base_url('componente2/comp24_E0/getAcuerdosMunicipales'); ?>/' + $('#mun_id').val(), 
                    datatype: 'json', 
                    page:1 })
                .trigger('reloadGrid');
            $('#Mensajito').hide();
            $("#guardar").show();              
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
        $( "#acu_mun_fecha_recepcion" ).datepicker({
            showOn: 'both',
            maxDate:    '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        
        /*GRID*/
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
        
        /*ARCHIVOS*/
        var button = $('#btn_subir'), interval;
        new AjaxUpload('#btn_subir', {
            action: '<?php echo base_url('componente2/comp23_E1/subirArchivo') . '/acuerdo_municipal2/1/acu_mun_id'; ?>',
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
                    $('#sol_asis_ruta_archivo').val(response);//GUARDA LA RUTA DEL ARCHIVO
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
        if(isset($acu_mun_id) && $acu_mun_id > 0){
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

<?php echo form_open('',array('id'=>'frm_acuerdo_municipal2')) ?>

    <h2 class="h2Titulos">Etapa 0: Condiciones Previas</h2>
    <h2 class="h2Titulos">Acuerdo Municipal</h2>
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
                <label>Fecha de conformacion de comision municipal:</label>
                <input id="acu_mun_fecha_conformacion" name="acu_mun_fecha_conformacion" type="text" readonly="readonly" value="<?php echo set_value('acu_mun_fecha_conformacion') ?>"/>
                <?php echo form_error('acu_mun_fecha_conformacion'); ?>
            </div>
            <div class="campo">
                <label>Fecha de acuerdo municipal:</label>
                <input id="acu_mun_fecha_acuerdo" name="acu_mun_fecha_acuerdo" type="text" readonly="readonly" value="<?php echo set_value('acu_mun_fecha_acuerdo') ?>"/>
                <?php echo form_error('acu_mun_fecha_acuerdo'); ?>
            </div>
            <div class="campo">
                <label>Fecha de recepcion de acuerdo municipal:</label>
                <input id="acu_mun_fecha_recepcion" name="acu_mun_fecha_recepcion" type="text" readonly="readonly" value="<?php echo set_value('acu_mun_fecha_recepcion') ?>"/>
                <?php echo form_error('acu_mun_fecha_recepcion'); ?>
            </div>
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
            <div style="width: 100%;">
                <div style="width: 50%;">
                    <div class="campo1">
                        <label style="text-align: left;">Observaciones</label>
                        <textarea id="acu_mun_observaciones" name="acu_mun_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('acu_mun_observaciones')?></textarea>
                        <?php echo form_error('acu_mun_observaciones'); ?>
                    </div>
                </div>
                <div style="display:inline; width: 50%;">
                    <div>Para actualizar un archivo basta con subir nuevamente el archivo y este se reemplaza automáticamente. Solo se permiten archivos con extensión pdf, doc, docx</div>
                    <div id="btn_subir"></div>
                    <input class="letraazul" type="text" id="vinieta" readonly="readonly" value="Subir Solicitud" size="30" style="border: none"/>
                    <a <?php if (isset($sol_asis_ruta_archivo) && $sol_asis_ruta_archivo != '') { ?> href="<?php echo base_url() . $sol_asis_ruta_archivo; ?>"<?php } ?>  id="btn_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a>
                    <input class="letraazul" type="text" id="vinietaD" readonly="readonly" <?php if (isset($sol_asis_ruta_archivo) && $sol_asis_ruta_archivo != '') { ?>value="Descargar <?php echo $nombreArchivo ?>"<?php } else { ?> value="No Hay Solicitudes Por Descargar" <?php } ?>size="35" style="border: none"/>
                    <?php echo form_error('acu_mun_archivo'); ?>
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