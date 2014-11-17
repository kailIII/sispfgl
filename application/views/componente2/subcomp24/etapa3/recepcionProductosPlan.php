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
    $("#btn_seleccionar").button().click(function(){document.location.href='<?php echo current_url(); ?>/' + jQuery("#lista").jqGrid('getGridParam','selrow');});
    $("#cancelar").button().click(function() {document.location.href='<?php echo base_url(); ?>';});
    $('.mensaje').dialog({autoOpen: false,width: 300,
        buttons: {"Ok": function() {$(this).dialog("close");}}
    });
    $('#selDepto').change(function(){   
        $.ajax({url: '<?php echo base_url('componente2/comp24_E0/getMunicipios') ?>/'+$('#selDepto').val()
        }).done(function(data){$('#mun_id').children().remove();$('#mun_id').html(data);});           
    });
    $('#mun_id').change(function(){
        window.location.href = '<?php echo current_url(); ?>/' + $('#mun_id').val();           
    });
    
     
    
    /*GRID*/
    
    $("#miembros").jqGrid({
        url: '<?php echo base_url('componente2/comp24_E3/getRecepcionProductos') . '/' . $acu_mun_id; ?>',
        editurl:'<?php echo base_url('componente2/comp24_E3/gestionRecepcionProductos').'/' . $acu_mun_id; ?>',
        datatype:'json',
        altRows:true,
        gridview: true,
        hidegrid: false,
        colNames:['No.','Padre','Nombre del Producto','Descripción','Observación'],
        colModel:[
            {name:'rec_pro_id',index:'rec_pro_id', width:30,editable:false,editoptions:{size:15},hidden:false },
            {name:'mun_id',index:'mun_id', width:30,editable:false,editoptions:{size:15},hidden:true },
            {name:'rec_pro_nombre_producto',index:'rec_pro_nombre_producto', width:200,editable:true,
                edittype:'text',editoptions:{size:50,maxlength:100},
                editrules:{required:true} },
            {name:'rec_pro_descripcion_producto',index:'rec_pro_descripcion_producto', width:250,editable:true,
                edittypr:'text',editoptions:{size:50,maxlength:100},
                editrules:{} },
            {name:'rec_pro_observaciones',index:'rec_pro_observaciones', width:400,editable:true,editoptions:{size:100},
                edittype:'text',editoptions:{size:100,maxlength:500},
                editrules:{} },
        ],
        multiselect: false,
        caption: "Productos del Plan",
        rowNum:20,
        rowList:[20,50],
        loadonce:true,
        pager: $('#pagerMiembros'),
        viewrecords: true,
        ondblClickRow: function(rowid,iRow,iCol,e){
             $('#miembros').jqGrid('editRow',rowid,true); }
    
    });
    $("#miembros").jqGrid('navGrid','#pagerMiembros',
        {edit:false,add:false,del:false,search:true,refresh:false,
        beforeRefresh: function() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    );
    $("#miembros").jqGrid('inlineNav',"#pagerMiembros",{editParams:{keys:true}});
    
    
      <?php
            //Muestra los dialogos.
            if ($this->session->flashdata('message') == 'Ok') {
                echo "$('#efectivo').dialog('open');";
            }
            if (isset($acu_mun_id) && $acu_mun_id > 0) {
                echo "formularioShow();";
            } else {
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

    <h2 class="h2Titulos"> Seguimiento</h2>
    <h2 class="h2Titulos">Recepción de Productos del Plan</h2>
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
            <div id="rpt-border"></div>
            <div style="margin-left: 300px;display: none;">
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
                <div class="tabla">
                    <label></label>
                    <table id="miembros"></table>
                    <div id="pagerMiembros"></div>
                </div>
            <div style="width: 100%;">
                <div style="width: 50%; display: inline-block;">
                    <div class="campoUp">
                        <label style="text-align: left;">Observaciones y/o Recomendaciones</label>
                        <textarea id="rec_pro_observaciones" name="rec_pro_observaciones" cols="30" rows="5" wrap="virtual" maxlength="500"><?php echo set_value('rec_pro_observaciones')?></textarea>
                        <?php echo form_error('rec_pro_observaciones'); ?>
                    </div>
                </div>
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