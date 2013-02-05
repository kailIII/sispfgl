<script type="text/javascript">        
    $(document).ready(function(){
        /*GRID PARTICIPANTES*/
       
        /*PARA EL DATEPICKER*/
        $( "#pro_finicio" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        
        /*FIN DEL DATEPICKER*/
        
        /*PARA EL DATEPICKER*/
        $( "#pro_ffinalizacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        
        /*FIN DEL DATEPICKER*/
        
        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/procesoAdministrativo/guardarEvaluacionExpresion') ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/procesoAdministrativo/evaluacionExpresionInteres'); ?>';
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
        /*FIN ZONA VALIDACIONES*/
     
        /*VARIABLES*/
        var tabla=$("#consultoresInteres");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/procesoAdministrativo/cargarConsultoraInteres2') . '/' . $pro_id ?>',
            editurl:'<?php echo base_url('componente2/procesoAdministrativo/gestionarConsultoresInteres') . '/' . $pro_id ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Tipo','Aplica',''],
            colModel:[
                {name:'con_int_id',index:'con_int_id', width:40,editable:false,editoptions:{size:15} },
                {name:'con_int_nombre',index:'con_int_nombre',width:200,editable:false,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombre:",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'con_int_tipo',index:'con_int_tipo',editable:false,edittype:"select",width:60,
                    editoptions:{ value: '0:Seleccione;Empresa:Empresa;ONG:ONG' }, 
                    formoptions:{ label: "Tipo:",elmprefix:"(*)"}
                },
                {name:'con_int_aplica',index:'con_int_aplica',width:60,align:'center',editable:true,edittype:"checkbox",editoptions:{value:"Si:No"}},
                {name:'actions',formatter:"actions",editable:false,fixed:true,width:60,
                    formatoptions:{"keys":true,delbutton: false}
                }
            ],
            multiselect: false,
            caption: "Consultoras que han manifestado interés",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerConsultoresInteres'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerConsultoresInteres',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('con_int_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
        }
                
    });
</script>

<form id="AdquisicionyContratacionForm" method="post" style="left: 70px;position: relative;">

    <h2 class="h2Titulos">Evaluación de expresión de interés</h2>
    <h2 class="h2Titulos">Proceso de evaluación</h2>
    <br/>

    <table>
        <tr>
        <td class="textD"><strong>No. Proceso: </strong></td>
        <td><?php echo $pro_numero ?></td>
        </tr>
        <tr>
        <td class="textD"><strong>Fecha de inicio: </strong></td> 
        <td><input value="<?php if ($pro_finicio != "") echo date('d/m/y', strtotime($pro_finicio)); ?>" id="pro_finicio" name="pro_finicio" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td class="textD"> <strong>Fecha de finalización: </strong></td>
        <td><input value="<?php if ($pro_ffinalizacion != "") echo date('d/m/y', strtotime($pro_ffinalizacion)); ?>" id="pro_ffinalizacion" name="pro_ffinalizacion" type="text" size="10" readonly="readonly"/></td>
        </tr>
    </table>
    <br/><br/>
    <center>
        <table id="consultoresInteres"></table>
        <div id="pagerConsultoresInteres"></div>
        <br/>
    </center>
    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Guardar Evaluación" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
    <input id="pro_id" name="pro_id" value="<?php echo $pro_id; ?>" style="visibility: hidden"/>
</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>
<div id="extension" class="mensaje" title="Error">
    <p>Solo se permiten archivos con la extensión pdf|doc|docx</p>
</div>