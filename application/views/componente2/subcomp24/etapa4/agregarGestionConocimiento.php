<?php

/**
 * 
 * 
 * @author Rodrigo Escalante
 */
$this->load->view('plantilla/header', $titulo);
$this->load->view('plantilla/menu', $menu);
?>
<script type="text/javascript">
    $(document).ready(function() {
        /*BASICO*/
        function formularioHide() {
            $('#listaContainer').show();
            $('#formulario').hide()
        }
        function formularioShow() {
            $('#listaContainer').hide();
            $('#formulario').show()
        }
        $("#guardar").button();
        $("#btn_acuerdo_nuevo").button().click(function() {
            $('#frm').submit();
        });
        $("#btn_seleccionar").button().click(function() {
            document.location.href = '<?php echo current_url(); ?>/' + jQuery("#lista").jqGrid('getGridParam', 'selrow');
        });
        $("#cancelar").button().click(function() {
            document.location.href = '<?php echo base_url(); ?>';
        });
        $('.mensaje').dialog({autoOpen: false, width: 300,
            buttons: {"Ok": function() {
                    $(this).dialog("close");
                }}
        });
        $('#selDepto').change(function() {
            $.ajax({url: '<?php echo base_url('componente2/comp24_E0/getMunicipios') ?>/' + $('#selDepto').val()
            }).done(function(data) {
                $('#mun_id').children().remove();
                $('#mun_id').html(data);
            });
        });
        /**/
        $('#mun_id').change(function() {
            window.location.href = '<?php echo current_url(); ?>/' + $('#mun_id').val();
        });

        /*PARA EL DATEPICKER*/
        $("#gescon_fecha").datepicker({
            showOn: 'both',
            maxDate: '+1D',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true,
            dateFormat: 'dd/mm/yy',
            onClose: function(selectedDate) {
                $("#gescon_fecha").datepicker("option", "minDate", selectedDate);}});        

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
            {name:'par_institucion',index:'par_institucion', width:300,editable:true,editoptions:{size:30},
                edittype:'text',editoptions:{size:55,maxlength:50},
                editrules:{required:true} },
            {name:'par_cargo',index:'par_cargo', width:123,editable:true,editoptions:{size:30},
                edittype:'text',editoptions:{size:20,maxlength:50},
                editrules:{required:false} },
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
   $("#miembros").jqGrid('inlineNav', "#pagerMiembros");
        // Funcion para regargar los JQGRID luego de agregar y editar
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam', {datatype: 'json', loadonce: true}).trigger('reloadGrid');
            return[true, ''];} //no error
        
  /*desabilitado para activas completar comentario de esta linea y retirar display:none; del elemento 
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
         });     */        
            <?php
            //Muestra los dialogos.
            if ($this->session->flashdata('message') == 'Ok') {
                echo "$('#efectivo').dialog('open');";
            }
            if (isset($gescon_id) && $gescon_id > 0) {
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
<?php echo form_open('', array('id' => 'frm_acuerdo_municipal2')) ?>
<h2 class="h2Titulos"> Gestion del Conocimiento</h2>
<h2 class="h2Titulos">Agregar Gestion</h2>
<br/>
<div id="rpt_frm_bdy">
    <div id="listaContainer">
        <<div class="campo">
            <label>Departamento</label>
            <?php echo form_dropdown('selDepto', $departamentos, '', 'id="selDepto"'); ?>
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
            <label>Municipio:</label>
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
                <textarea id="gescon_observaciones" name="gescon_observaciones" rows="5" wrap="virtual" maxlength="500"><?php echo set_value('gescon_observaciones')?></textarea>
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
$this->load->view('plantilla/footer');


?>
