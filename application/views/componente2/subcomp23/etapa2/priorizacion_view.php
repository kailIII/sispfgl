<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E2/guardarPriorizacion') . '/' . $pri_id; ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/comp23_E2'); ?>';
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
        /*PARA EL DATEPICKER*/
        $( "#pri_fecha" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        /*ZONA DE VALIDACIONES*/
        function validaInstitucion(value, colname) {
            if (value == 0 ) return [false,"Debe Seleccionar una Opción"];
            else return [true,""];
        }
        /*FIN ZONA VALIDACIONES*/
                        
        /*GRID MIEMBROS DEL EQUIPO LOCAL DE APOYO*/
        var tabla2=$("#MiembroELA");
        tabla2.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E2/cargarParticipanteGGPri') . '/' . $gru_ges_id . '/' . $pri_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E2/gestionParticipantesPri') ?>/<?php echo $pri_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Dui','Nombre Completo','Sexo','Cargo','Teléfono','Participa',''],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_dui',index:'par_dui', width:100,editable:false},
                {name:'par_nombre',index:'par_nombre',width:150,editable:false},
                {name:'par_sexo',index:'par_sexo',width:50,editable:false},
                {name:'par_cargo',index:'par_cargo',width:100,editable:false},
                {name:'par_tel',index:'par_tel',width:100,editable:false},
                {name:'par_pri_participa',index:'par_pri_participa',width:60,align:'center',editable:true,edittype:"checkbox",editoptions:{value:"Si:No"}},
                {name:'actions',formatter:"actions",editable:false,fixed:true,width:60,
                    formatoptions:{"keys":true,delbutton: false,
                        onSuccess:despuesAgregarEditar2}
                }
            ],
            multiselect: false,
            caption: "Miembros del Grupo Gestor",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerMiembroEla'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerMiembroEla',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('par_id');
        function despuesAgregarEditar2() {
            tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; 
        }
            
    });
</script>

<form method="post" id="definicionForm">

    <h2 class="h2Titulos">Etapa 2: Diagnóstico del Municipio</h2>
    <h2 class="h2Titulos">Producto 6: Priorización e implementación de pequeños proyectos de impacto</h2>
    <table>
        <tr>
        <td ><strong>Departamento:</strong><?php echo $departamento ?></td>
        <td ><strong>Municipio:</strong><?php echo $municipio ?></td>
        </tr>
        <tr>
        <td  ><strong>Fecha reunión: </strong><input readonly="readonly" id="pri_fecha" name="pri_fecha" type="text"<?php if (isset($pri_fecha)) { ?> value='<?php echo date('d/m/y', strtotime($pri_fecha)); ?>'<?php } ?> size="10" /></td>
        </tr>
        <tr>
        <td colspan="2"><strong>Proyecto PEP:  </strong><?php echo $proyectoPep ?></td>
        </tr>
    </table>
    <br/><br/>

    <table id="MiembroELA"></table>
    <div id="pagerMiembroEla"></div>
    <br/>
    <table id="problemas"></table>
    <div id="pagerproblemas"></div>
    <br/>

    <p>Observaciones:<br/>
        <textarea id="pri_observacion"  name="pri_observacion" cols="48" rows="5"><?php if (isset($pri_observacion)) echo $pri_observacion; ?></textarea></p>
    <center>
        <div style="position:relative;width: 300px;top: 25px">
            <p > 
                <input type="submit" id="guardar" value="Guardar Definición" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>

</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>


