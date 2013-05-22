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
.ui-jqgrid .ui-jqgrid-htable th {
    height: 40px;
}
.ui-jqgrid .ui-jqgrid-htable th div {
    height: auto;
}
.ui-th-column, .ui-jqgrid .ui-jqgrid-htable th.ui-th-column {
    white-space: normal;
}	
-->
</style>
<script type="text/javascript">        
$(document).ready(function(){
    /*BASICO*/
    function formularioHide(){$('#listaContainer').show();$('#formulario').hide()}
    function formularioShow(){$('#listaContainer').hide();$('#formulario').show()}
    $("#guardar").button();
    $("#btn_acuerdo_nuevo").button().click(function(){window.location.href = '<?php echo current_url(); ?>/new/'+$('#mun_id').val();});
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
        jqLista.jqGrid('clearGridData')
            .jqGrid('setGridParam', { 
                url: '<?php echo base_url('uep/uep/loadPerfiles'); ?>/' + $('#mun_id').val(), 
                datatype: 'json', 
                page:1 })
            .trigger('reloadGrid');
    });
    /*PARA EL DATEPICKER*/
    $( "#per_fecha_ini" ).datepicker({
        showOn:         'both',
        maxDate:        '+1D',
        buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd/mm/yy',
        onClose: function( selectedDate ) {
            $( "#per_fecha_fin" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    $( "#per_fecha_fin" ).datepicker({
        showOn: 'both',
        maxDate:    '+1D',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd/mm/yy'
    });
    /*FIN DEL DATEPICKER*/
    
    /*GRID*/
    $("#actividades").jqGrid({
        url:'<?php echo base_url('uep/uep/loadObjetivos') . '/' . $tabla_id; ?>',
        editurl:'<?php echo base_url('uep/uep/gestionObjetivos') . '/' . $tabla_id; ?>',
        datatype:'json',
        altRows:true,
        gridview: true,
        height: 300,
        hidegrid: false,
        colNames:['id','Padre','Correlativo','Descripción'],
        colModel:[
            {name:'obj_id',index:'obj_id', width:30,editable:false,editoptions:{size:15},hidden:true },
            {name:'obj_mem_id',index:'obj_mem_id', width:30,editable:false,editoptions:{size:15},hidden:true },
            {name:'obj_correlativo',index:'obj_correlativo', width:123,editable:true,
                edittype:'text',editoptions:{size:20,maxlength:50},
                editrules:{required:true} },
            {name:'obj_descripcion',index:'obj_descripcion', width:500,editable:true,
                edittypr:'text',editoptions:{size:20,maxlength:50},
                editrules:{required:true} }
        ],
        multiselect: false,
        caption: "Objetivos Especificos",
        rowNum:20,
        rowList:[20,50],
        loadonce:true,
        pager: $('#pagerActividades'),
        viewrecords: true,
        ondblClickRow: function(rowid,iRow,iCol,e){
             $('#actividades').jqGrid('editRow',rowid,true); 
        }
    });
    $("#actividades").jqGrid('navGrid','#pagerActividades',
        {edit:true,add:true,del:true,search:true,refresh:false,
        beforeRefresh: function() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    );
    $("#actividades").jqGrid('inlineNav',"#pagerActividades",{editParams:{keys:true}});
    /**/
    /*GRID*/
    $("#acuerdos").jqGrid({
        url:'<?php echo base_url('uep/uep/loadEventos') . '/' . $tabla_id; ?>',
        editurl:'<?php echo base_url('uep/uep/gestionEventos') . '/' . $tabla_id; ?>',
        datatype:'json',
        altRows:true,
        gridview: true,
        height: 300,
        hidegrid: false,
        colNames:['id','Padre','Hora','Actividad','Responsables'],
        colModel:[
            {name:'des_id',index:'des_id', width:30,editable:false,editoptions:{size:15},hidden:true },
            {name:'des_mem_id',index:'des_mem_id', width:30,editable:false,editoptions:{size:15},hidden:true },
            {name:'des_correlativo',index:'des_correlativo', width:123,editable:true,
                edittype:'text',editoptions:{size:20,maxlength:50},
                editrules:{required:true} },
            {name:'des_correlativo',index:'des_correlativo', width:300,editable:true,
                edittype:'text',editoptions:{size:20,maxlength:50},
                editrules:{required:true} },
            {name:'des_responsable',index:'des_responsable', width:200,editable:true,
                edittypr:'text',editoptions:{size:20,maxlength:50},
                editrules:{required:true} }
        ],
        multiselect: false,
        caption: "Desarrollo del Evento",
        rowNum:20,
        rowList:[20,50],
        loadonce:true,
        pager: $('#pagerAcuerdos'),
        viewrecords: true,
        ondblClickRow: function(rowid,iRow,iCol,e){
             $('#acuerdos').jqGrid('editRow',rowid,true); 
        }
    });
    $("#acuerdos").jqGrid('navGrid','#pagerAcuerdos',
        {edit:true,add:true,del:true,search:true,refresh:false,
        beforeRefresh: function() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    );
    $("#acuerdos").jqGrid('inlineNav',"#pagerAcuerdos",{editParams:{keys:true}});
    /**/
    var jqLista = $('#lista');
    jqLista.jqGrid({
       	url: '<?php echo base_url('uep/uep/loadPerfiles'); ?>/' + $('#mun_id').val(),
    	datatype: "json",
        width: 300,
       	colNames:['Id','Fecha','Nombre'],
       	colModel:[
       		{name:'id',index:'id', width:55},
       		{name:'fecha',index:'fecha', width:90},
            {name:'nombre',index:'nombre', width:150}
       	],
       	rowNum:10,
       	rowList:[10,20,30],
       	pager: '#pagerLista',
       	sortname: 'id',
        viewrecords: true,
        sortorder: "desc",
        caption:"Memorias",
        ondblClickRow: function(rowid, iRow, iCol, e){
            window.location.href='<?php echo current_url(); ?>/' + rowid;
        }
    });
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

<?php echo form_open('',array('id'=>'frm')) ?>

    <h2 class="h2Titulos">UEP</h2>
    <h2 class="h2Titulos">Ayuda Memoria</h2>
    <br/>
    <div id="rpt_frm_bdy">
        <div id="listaContainer">
            <div class="campo">
                <label>Departamento</label>
                <?php echo form_dropdown('selDepto',$departamentos,'','id="selDepto"'); ?>
            </div>
            <div class="campo">
                <label>Municipio</label>
                <select id='mun_id' name='mun_id'>
                    <option value='0'>--Seleccione--</option>
                </select>
                <?php echo form_error('mun_id'); ?>
            </div>
            <div style="margin-left: 300px;">
                <table id="lista"></table>
                <div id="pagerLista"></div>
                <div id="btn_seleccionar">Seleccionar</div>
                <div id="btn_acuerdo_nuevo">Crear Nuevo</div>
            </div>
        </div>
        <div id="formulario">
            <div class="campo">
                <label>Departamento:</label>
                <input id="depto" name="depto" type="text" readonly="readonly" value="<?php echo set_value('depto') ?>" />
            </div>
            <div class="campo">
                <label>Municipio:</label>
                <input id="muni" name="muni" type="text" readonly="readonly" value="<?php echo set_value('muni') ?>" />
            </div>
            <?php// echo form_open(); ?>
            <div class="campo">
                <label>Denominación del Evento</label>
                <input id="per_nombre" name="per_nombre" type="text" value="<?php echo set_value('per_nombre') ?>" />
                <?php echo form_error('per_nombre'); ?>
            </div>
            <div class="campo">
                <label>Fecha inicio</label>
                <input id="per_fecha_ini" name="per_fecha_ini" type="text" value="<?php echo set_value('per_fecha_ini') ?>" />
                <?php echo form_error('per_fecha_ini'); ?>
            </div>
            <div class="campo">
                <label>Fecha fin</label>
                <input id="per_fecha_fin" name="per_fecha_fin" type="text" value="<?php echo set_value('per_fecha_fin') ?>" />
                <?php echo form_error('per_fecha_fin'); ?>
            </div>
            <div class="campo">
                <label>Lugar</label>
                <input id="per_lugar" name="per_lugar" type="text" value="<?php echo set_value('per_lugar') ?>" />
                <?php echo form_error('per_lugar'); ?>
            </div>
            <div class="campo">
                <label>Participantes</label>
                <input id="per_participantes" name="per_participantes" type="text" value="<?php echo set_value('per_participantes') ?>" />
                <?php echo form_error('per_participantes'); ?>
            </div>
            <div class="campo">
                <label>Objetivo del Evento</label>
                <input id="per_objetivo" name="per_objetivo" type="text" value="<?php echo set_value('per_objetivo') ?>" />
                <?php echo form_error('per_objetivo'); ?>
            </div>
            <div class="tabla" style="margin-left: 100px;">
                <label></label>
                <table id="actividades"></table>
                <div id="pagerActividades"></div>
            </div>
            <div class="tabla" style="margin-left: 100px;">
                <label></label>
                <table id="acuerdos"></table>
                <div id="pagerAcuerdos"></div>
            </div>
            <div class="campo">
                <label>Observaciones:</label>
                <textarea id="mem_observaciones" name="mem_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('mem_observaciones')?></textarea>
                <?php echo form_error('mem_observaciones'); ?>
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