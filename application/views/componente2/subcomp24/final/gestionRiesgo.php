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
.campoTitulo{
    margin-left: 150px;
    font-weight: bold;
    margin-top: 10px;
    margin-bottom: 10px;
    text-decoration: underline;
}
#rpt_frm_bdy .tabla{
    margin-left: 150px;
}
-->
</style>
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
                    url: '<?php echo base_url('componente2/comp24_Final/loadGesRie'); ?>/' + $('#mun_id').val(), 
                    datatype: 'json', 
                    page:1 })
                .trigger('reloadGrid');
        });
        
        /*GRID*/
        $("#miembros").jqGrid({
            url:'<?php echo base_url('componente2/comp24_Final/loadParticipantes') . '/' . $gesrie_id; ?>',
            editurl:'<?php echo base_url('componente2/comp24_Final/gestionParticipantes') . '/' . $gesrie_id; ?>',
            datatype:'json',
            altRows:true,
            gridview: true,
            hidegrid: false,
            colNames:['id','Padre','Nombre','Institución','Cargo'],
            colModel:[
                {name:'par_id',index:'par_id', width:30,editable:false,editoptions:{size:15},hidden:true },
                {name:'gesrie_id',index:'gesrie_id', width:30,editable:false,editoptions:{size:15},hidden:true },
                {name:'par_nombre',index:'par_nombre', width:200,editable:true,
                    edittype:'text',editoptions:{size:30,maxlength:50},
                    editrules:{required:true} },
                {name:'par_institucion',index:'par_institucion', width:200,editable:true,editoptions:{size:30},
                    edittype:'text',editoptions:{size:30,maxlength:50},
                    editrules:{required:true} },
                {name:'par_cargo',index:'par_cargo', width:200,editable:true,editoptions:{size:30},
                    edittype:'text',editoptions:{size:30,maxlength:50},
                    editrules:{required:true} }
            ],
            multiselect: false,
            caption: "Instituciones Participantes",
            rowNum:20,
            rowList:[20,50],
            loadonce:true,
            pager: $('#pagerMiembros'),
            viewrecords: true,
            ondblClickRow: function(rowid,iRow,iCol,e){
                 $('#miembros').jqGrid('editRow',rowid,true); 
            }
        });
        $("#miembros").jqGrid('navGrid','#pagerMiembros',
            {edit:false,add:false,del:false,search:true,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
            }
        );
        $("#miembros").jqGrid('inlineNav',"#pagerMiembros",{editParams:{keys:true}});
        
        var jqLista = $('#lista');
        jqLista.jqGrid({
           	url: '<?php echo base_url('componente2/comp24_Final/loadGesRie/'); ?>/' + $('#mun_id').val(),
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
        $( "#gesrie_fecha_orden" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#gesrie_fecha_acta" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#gesrie_fecha_acta" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#gesrie_fecha_diagnostico" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#gesrie_fecha_diagnostico" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#gesrie_fecha_socializacion" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#gesrie_fecha_socializacion" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#gesrie_fecha_aprobacion" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#gesrie_fecha_aprobacion" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#gesrie_fecha_inicio" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#gesrie_fecha_inicio" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#gesrie_fecha_aprob_comite" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#gesrie_fecha_aprob_comite" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#gesrie_fecha_acuerdo" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#gesrie_fecha_acuerdo" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#gesrie_fecha_presentacion" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#gesrie_fecha_presentacion" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy',
            onClose: function( selectedDate ) {
                $( "#gesrie_fecha_seguimiento" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#gesrie_fecha_seguimiento" ).datepicker({
            showOn: 'both',
            maxDate:    '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
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
        if(isset($gesrie_id) && $gesrie_id > 0){
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

    <h2 class="h2Titulos">Gestion de Riesgo</h2>
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
            <div class="campoTitulo">Preparación</div>
            <div class="campo">
                <label>Fecha de Orden de Inicio:</label>
                <input id="gesrie_fecha_orden" name="gesrie_fecha_orden" type="text" readonly="readonly" value="<?php echo set_value('gesrie_fecha_orden') ?>"/>
                <?php echo form_error('gesrie_fecha_orden'); ?>
            </div>
            <div class="campo">
                <label>Fecha de Acta de Recepción:</label>
                <input id="gesrie_fecha_acta" name="gesrie_fecha_acta" type="text" readonly="readonly" value="<?php echo set_value('gesrie_fecha_acta') ?>"/>
                <?php echo form_error('gesrie_fecha_acta'); ?>
            </div>
            <div class="campoTitulo">Diagnóstico</div>
            <div class="campo">
                <label>Fecha de Orden de inicio del diagnóstico:</label>
                <input id="gesrie_fecha_diagnostico" name="gesrie_fecha_diagnostico" type="text" readonly="readonly" value="<?php echo set_value('gesrie_fecha_diagnostico') ?>"/>
                <?php echo form_error('gesrie_fecha_diagnostico'); ?>
            </div>
            <div class="campo">
                <label>Fecha de Socializacion:</label>
                <input id="gesrie_fecha_socializacion" name="gesrie_fecha_socializacion" type="text" readonly="readonly" value="<?php echo set_value('gesrie_fecha_socializacion') ?>"/>
                <?php echo form_error('gesrie_fecha_socializacion'); ?>
            </div>
            <div class="tabla">
                <label></label>
                <table id="miembros"></table>
                <div id="pagerMiembros"></div>
            </div>
            <div class="campo">
                <label>Fecha de Acta de Aprobación:</label>
                <input id="gesrie_fecha_aprobacion" name="gesrie_fecha_aprobacion" type="text" readonly="readonly" value="<?php echo set_value('gesrie_fecha_aprobacion') ?>"/>
                <?php echo form_error('gesrie_fecha_aprobacion'); ?>
            </div>
            <div class="campoTitulo">Planificación para Gestión de Riesgo</div>
            <div class="campo">
                <label>Fecha de Incio:</label>
                <input id="gesrie_fecha_inicio" name="gesrie_fecha_inicio" type="text" readonly="readonly" value="<?php echo set_value('gesrie_fecha_inicio') ?>"/>
                <?php echo form_error('gesrie_fecha_inicio'); ?>
            </div>
            <div class="campo">
                <label>Fecha de Acta de aprobación(comite evaluador):</label>
                <input id="gesrie_fecha_aprob_comite" name="gesrie_fecha_aprob_comite" type="text" readonly="readonly" value="<?php echo set_value('gesrie_fecha_aprob_comite') ?>"/>
                <?php echo form_error('gesrie_fecha_aprob_comite'); ?>
            </div>
            <div class="campo">
                <label>Fecha de Acuerdo Municipal de aprobación de Plan:</label>
                <input id="gesrie_fecha_acuerdo" name="gesrie_fecha_acuerdo" type="text" readonly="readonly" value="<?php echo set_value('gesrie_fecha_acuerdo') ?>"/>
                <?php echo form_error('gesrie_fecha_acuerdo'); ?>
            </div>
            <div class="campo">
                <label>Fecha de de Presentación publica del plan GRD:</label>
                <input id="gesrie_fecha_presentacion" name="gesrie_fecha_presentacion" type="text" readonly="readonly" value="<?php echo set_value('gesrie_fecha_presentacion') ?>"/>
                <?php echo form_error('gesrie_fecha_presentacion'); ?>
            </div>
            <div class="campoTitulo">Seguimiento</div>
            <div class="campo">
                <label>Fecha de Inicio:</label>
                <input id="gesrie_fecha_seguimiento" name="gesrie_fecha_seguimiento" type="text" readonly="readonly" value="<?php echo set_value('gesrie_fecha_seguimiento') ?>"/>
                <?php echo form_error('gesrie_fecha_seguimiento'); ?>
            </div>
            <div class="campo">
                <label>Observaciones:</label>
                <textarea id="gesrie_observaciones" name="gesrie_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('gesrie_observaciones')?></textarea>
                <?php echo form_error('gesrie_observaciones'); ?>
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