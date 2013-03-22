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
#rpt_frm_bdy .tabla{
    margin-left: 100px;
}
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
        jqLista.jqGrid('clearGridData')
            .jqGrid('setGridParam', { 
                url: '<?php echo base_url('componente2/comp24_E4/getCapacitaciones'); ?>/' + $('#mun_id').val(), 
                datatype: 'json', 
                page:1 })
            .trigger('reloadGrid');
    });
    
    /*GRID*/
    $("#concejo").jqGrid({
        url:'<?php echo base_url('componente2/comp24_E4/loadConcejo') . '/' . $cap_id; ?>',
        editurl:'<?php echo base_url('componente2/comp24_E4/gestionConcejo') . '/' . $cap_id; ?>',
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
            {name:'participa',index:'participa', width:80,editable:true,align:'center',
                formatter:'checkbox',formatoptions:{disabled:false},
                edittype:'checkbox'}
        ],
        multiselect: false,
        caption: "Participantes Miembros del Concejo Municipal",
        rowNum:20,
        rowList:[20,50],
        loadonce:true,
        pager: $('#pagerConcejo'),
        viewrecords: true,
        gridComplete: 
            function(){
            $.getJSON('<?php echo base_url('componente2/comp24_E4/count_sexo/') ?>',
            function(data) {
                $('#total').val(data['total']);
                $('#mujeres').val(data['female']);
                $('#hombres').val(data['male']);
            }); 
        }
    });
    $("#concejo").jqGrid('navGrid','#pagerConcejo',
        {edit:false,add:false,del:false,search:true,refresh:false,
        beforeRefresh: function() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    );
    
    $("#comision").jqGrid({
        url:'<?php echo base_url('componente2/comp24_E4/loadComision') . '/' . $cap_id; ?>',
        editurl:'<?php echo base_url('componente2/comp24_E4/gestionComision') . '/' . $cap_id; ?>',
        datatype:'json',
        altRows:true,
        gridview: true,
        hidegrid: false,
        colNames:['id','Padre','Nombres','Apellidos','Sexo','Edad','Cargo','Telefono','Participa'],
        colModel:[
            {name:'mie_id',index:'mie_id', width:30,editable:false,editoptions:{size:15},hidden:true },
            {name:'cap_id',index:'cap_id', width:30,editable:false,editoptions:{size:15},hidden:true },
            {name:'mie_nombre',index:'mie_nombre', width:123,editable:false,
                edittype:'text',editoptions:{size:20,maxlength:50},
                editrules:{required:true} },
            {name:'mie_apellidos',index:'mie_apellidos', width:123,editable:false,
                edittypr:'text',editoptions:{size:20,maxlength:50},
                editrules:{required:true} },
            {name:'mie_sexo',index:'mie_sexo', width:90,editable:false,
                edittype:'select',formatter:'select',editoptions:{value:'M:Masculino;F:Femenino'},
                editrules:{required:true} },
            {name:'mie_edad',index:'mie_edad', width:50,editable:false,align:'center',
                edittype:'text',editoptions:{size:5,maxlength:2},
                editrules:{number:true,minValue:18,maxValue:100} },
            {name:'mie_cargo',index:'mie_cargo', width:123,editable:false,editoptions:{size:30},
                edittype:'text',editoptions:{size:20,maxlength:50},
                editrules:{required:true} },
            {name:'mie_telefono',index:'mie_telefono', width:80,editable:true,editoptions:{size:8},align:'center',
                edittype:'text',editoptions:{size:10,maxlength:9,dataInit:function(el){$(el).mask("9999-9999",{placeholder:" "});}}
                },
            {name:'participa',index:'participa', width:80,editable:true,align:'center',
                formatter:'checkbox',formatoptions:{disabled:false},
                edittype:'checkbox'}
        ],
        multiselect: false,
        caption: "Participantes Miembros de la Comision Financiera",
        rowNum:20,
        rowList:[20,50],
        loadonce:true,
        pager: $('#pagerComision'),
        viewrecords: true,
        gridComplete: 
            function(){
            $.getJSON('<?php echo base_url('componente2/comp24_E4/count_sexo/') ?>',
            function(data) {
                $('#total').val(data['total']);
                $('#mujeres').val(data['female']);
                $('#hombres').val(data['male']);
            }); 
        }
    });
    $("#comision").jqGrid('navGrid','#pagerComision',
        {edit:false,add:false,del:false,search:true,refresh:false,
        beforeRefresh: function() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    );
    
    $("#otros").jqGrid({
        url:'<?php echo base_url('componente2/comp24_E4/loadOtros') . '/' . $cap_id; ?>',
        editurl:'<?php echo base_url('componente2/comp24_E4/gestionOtros') . '/' . $cap_id; ?>',
        datatype:'json',
        altRows:true,
        gridview: true,
        hidegrid: false,
        colNames:['id','Padre','Nombres','Apellidos','Sexo','Edad','Cargo','Telefono'],
        colModel:[
            {name:'par_id',index:'par_id', width:30,editable:false,editoptions:{size:15},hidden:true },
            {name:'acu_mun_id',index:'acu_mun_id', width:30,editable:false,editoptions:{size:15},hidden:true },
            {name:'par_nombre',index:'par_nombre', width:123,editable:true,
                edittype:'text',editoptions:{size:20,maxlength:50},
                editrules:{required:true} },
            {name:'par_apellidos',index:'par_apellidos', width:123,editable:true,
                edittypr:'text',editoptions:{size:20,maxlength:50},
                editrules:{required:true} },
            {name:'par_sexo',index:'par_sexo', width:90,editable:true,
                edittype:'select',formatter:'select',editoptions:{value:'M:Masculino;F:Femenino'},
                editrules:{required:true} },
            {name:'par_edad',index:'par_edad', width:50,editable:true,align:'center',
                edittype:'text',editoptions:{size:5,maxlength:2},
                editrules:{number:true,minValue:18,maxValue:100} },
            {name:'par_cargo',index:'par_cargo', width:123,editable:true,editoptions:{size:30},
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
            $.getJSON('<?php echo base_url('componente2/comp24_E4/count_sexo/') ?>',
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
       	url: '<?php echo base_url('componente2/comp24_E4/getCapacitaciones/'); ?>/' + $('#mun_id').val(),
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
    <?php
    //echo '//'.$this->session->keep_flashdata('message');
    if($this->session->flashdata('message')=='Ok'){
        echo "$('#efectivo').dialog('open');";
    }
    if(isset($cap_id) && $cap_id > 0){
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
    <h2 class="h2Titulos">Capacitación al Concejo Municipal y Comisión Financiera</h2>
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
                <input id="cap_fecha" name="cap_fecha" type="text" readonly="readonly" value="<?php echo set_value('cap_fecha') ?>"/>
                <?php echo form_error('cap_fecha'); ?>
            </div>
            <div class="campo">
                <label>Area de Capacitación o Tema:</label>
                <input id="cap_tema" name="cap_tema" type="text" value="<?php echo set_value('cap_tema') ?>"/>
                <?php echo form_error('cap_tema'); ?>
            </div>
            <div class="campo">
                <label>Lugar:</label>
                <input id="cap_lugar" name="cap_lugar" type="text" value="<?php echo set_value('cap_lugar') ?>"/>
                <?php echo form_error('cap_lugar'); ?>
            </div>
            <div class="campo">
                <label>Facilitador:</label>
                <input id="cap_facilitador" name="cap_facilitadores" type="text" value="<?php echo set_value('cap_facilitadores') ?>"/>
                <?php echo form_error('cap_facilitadores'); ?>
            </div>
            <div class="tabla">
                <label></label>
                <table id="facilitadores"></table>
                <div id="pagerFacilitadores"></div>
            </div>
            <div class="tabla">
                <label></label>
                <table id="concejo"></table>
                <div id="pagerConcejo"></div>
            </div>
            <div class="tabla">
                <label></label>
                <table id="comision"></table>
                <div id="pagerComision"></div>
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
                <label>Observaciones y/o Recomendaciones</label>
                <textarea id="cap_observaciones" name="cap_observaciones" cols="30" rows="5" wrap="virtual" maxlength="100"><?php echo set_value('cap_observaciones')?></textarea>
                <?php echo form_error('cap_observaciones'); ?>
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