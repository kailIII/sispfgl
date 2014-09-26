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
    $('.mensaje').dialog({autoOpen: false,width: 300,
        buttons: {"Ok": function() {$(this).dialog("close");}}
    });
    /**/
    
    /*GRID*/
    /*desabilitado para activas completar comentario de esta linea y retirar display:none; del elemento */
    var jqLista = $('#lista');
    jqLista.jqGrid({
       	url: '<?php echo base_url('componente2/comp24_E0/loadUserRol8'); ?>/',
        editurl: '<?php echo base_url('componente2/comp24_E0/gestionUserRol8'); ?>/', 
    	datatype: "json",
        width: 500,
       	colNames:['Usuario','deptos','id'],
       	colModel:[
       		{name:'user_id',index:'user_id', width:55,editable:true},
            {name:'deptos',index:'deptos', width:90,editable:true},
       		{name:'id',index:'id', width:90,editable:true}		
       	],
       	rowNum:10,
       	rowList:[10,20,30],
       	pager: '#pagerLista',
       	sortname: 'id',
        viewrecords: true,
        sortorder: "desc",
        caption:"Usuarios Rol 8",
        ondblClickRow: function(rowid, iRow, iCol, e){
            $('#lista').jqGrid('editRow',rowid,true); 
        }
    });
	$("#lista").jqGrid('navGrid','#pagerLista',
        {edit:false,add:false,del:true,search:true,refresh:false,
        beforeRefresh: function() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    );
    $("#lista").jqGrid('inlineNav',"#pagerLista",{editParams:{keys:true}});
    /**/
    <?php
    //Muestra los dialogos.
    if($this->session->flashdata('message')=='Ok'){echo "$('#efectivo').dialog('open');";}
    //if(isset($asi_tec_id) && $asi_tec_id > 0){echo "formularioShow();";}else{echo "formularioHide();";}
    ?>
});
</script>

<div id="efectivo" class="mensaje" title="Almacenado" style="display: none;">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>
<div id="from_consultor_nuevo" title="Crear Consultor">
</div>

<?php echo form_open('',array('id'=>'frm')) ?>

    <h2 class="h2Titulos"> Condiciones Previas</h2>
    <h2 class="h2Titulos">Elaboración de perfil y PRFM</h2>
    <br/>
    <div id="rpt_frm_bdy">
        <div id="listaContainer">
            <div id="rpt-border"></div>
            <div style="margin-left: 300px;">
                <table id="lista"></table>
                <div id="pagerLista"></div>
            </div>
            <div><?php echo $users; ?></div>
        </div>
        <div id="formulario" style="display: none;">
            <div class="campo">
                <label>Departamento:</label>
                <input id="depto" name="depto" type="text" readonly="readonly" value="<?php echo set_value('depto') ?>" />
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