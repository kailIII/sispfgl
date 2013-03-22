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
        jqLista.jqGrid('clearGridData')
            .jqGrid('setGridParam', { 
                url: '<?php echo base_url('componente2/comp24_E4/loadGescon'); ?>/' + $('#mun_id').val(), 
                datatype: 'json', 
                page:1 })
            .trigger('reloadGrid');
    });
    
    /*FEchas*/
    $( "#gescon_fecha" ).datepicker({
        showOn: 'both',
        maxDate:    '+1D',
        buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
        buttonImageOnly: true, 
        dateFormat: 'dd/mm/yy'
    });
    
    
    /*GRID*/
    $("#miembros").jqGrid({
        url:'<?php echo base_url('componente2/comp24_E4/loadParticipantes') . '/' . $gescon_id; ?>',
        editurl:'<?php echo base_url('componente2/comp24_E4/gestionParticipantes') . '/' . $gescon_id; ?>',
        datatype:'json',
        altRows:true,
        gridview: true,
        hidegrid: false,
        colNames:['id','Padre','Nombres','Apellidos','Institución','Cargo','Telefono'],
        colModel:[
            {name:'par_id',index:'par_id', width:30,editable:false,editoptions:{size:15},hidden:true },
            {name:'acu_mun_id',index:'acu_mun_id', width:30,editable:false,editoptions:{size:15},hidden:true },
            {name:'par_nombre',index:'par_nombre', width:123,editable:true,
                edittype:'text',editoptions:{size:20,maxlength:50},
                editrules:{required:true} },
            {name:'par_apellidos',index:'par_apellidos', width:123,editable:true,
                edittypr:'text',editoptions:{size:20,maxlength:50},
                editrules:{required:true} },
            {name:'par_institucion',index:'par_institucion', width:123,editable:true,editoptions:{size:30},
                edittype:'text',editoptions:{size:20,maxlength:50},
                editrules:{required:true} },
            {name:'par_cargo',index:'par_cargo', width:123,editable:true,editoptions:{size:30},
                edittype:'text',editoptions:{size:20,maxlength:50},
                editrules:{required:true} },
            {name:'par_telefono',index:'par_telefono', width:80,editable:true,editoptions:{size:8},align:'center',
                edittype:'text',editoptions:{size:10,maxlength:9,dataInit:function(el){$(el).mask("9999-9999",{placeholder:" "});}}
                }
        ],
        multiselect: false,
        caption: "Participantes",
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
       	url: '<?php echo base_url('componente2/comp24_E4/loadGescon/'); ?>/' + $('#mun_id').val(),
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
        caption:"Reuniones",
        ondblClickRow: function(rowid, iRow, iCol, e){
            window.location.href='<?php echo current_url(); ?>/' + rowid;
        }
    });
    <?php
    //echo '//'.$this->session->keep_flashdata('message');
    if($this->session->flashdata('message')=='Ok'){
        echo "$('#efectivo').dialog('open');";
    }
    if(isset($gescon_id) && $gescon_id > 0){
        echo "formularioShow();";
    }else{
        echo "formularioHide();";
    }
    ?>

});
</script>

<div id="efectivo" class="mensaje" title="Almacenado" style="display: none;">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>

<?php echo form_open('',array('id'=>'frm')) ?>

    <h2 class="h2Titulos">Etapa 4: Gestión del Conocimiento</h2>
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
                <div id="btn_seleccionar">Seleccionar</div>
                <div id="btn_acuerdo_nuevo">Crear Nuevo</div>
            </div>
        </div>
        <?php echo form_close(); echo form_open(); ?>
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
                <input id="gescon_fecha" name="gescon_fecha" type="text" readonly="readonly" value="<?php echo set_value('gescon_fecha') ?>"/>
                <?php echo form_error('gescon_fecha'); ?>
            </div>
            <div class="campo">
                <label>Tematica a tratar:</label>
                <input id="gescon_tematica" name="gescon_tematica" type="text" value="<?php echo set_value('gescon_tematica') ?>"/>
                <?php echo form_error('gescon_tematica'); ?>
            </div>
            <div class="tabla">
                <label></label>
                <table id="miembros"></table>
                <div id="pagerMiembros"></div>
            </div>
            <div class="campo">
                <label>Observaciones</label>
                <textarea id="gescon_observaciones" name="gescon_observaciones" rows="5" wrap="virtual"><?php echo set_value('gescon_observaciones')?></textarea>
                <?php echo form_error('gescon_observaciones'); ?>
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