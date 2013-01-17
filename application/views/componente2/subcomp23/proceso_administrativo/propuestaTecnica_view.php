<script type="text/javascript">        
    $(document).ready(function(){
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        /*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){   
            $('#selMun').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id='+$('#selDepto').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#selMun').append('<option value="0">--Seleccione Municipio--</option>');
                        $.each(val, function(id, registro){
                            $('#selMun').append('<option value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>');
                        });                    
                    }
                });
            });              
        });
        
        $('#selMun').change(function(){
            $.getJSON('<?php echo base_url('componente2/procesoAdministrativo/cargarPropuestaTecnica') . "/" ?>'+$('#selMun').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $.each(val, function(id, registro){
                            $('#consultoresInteres').setGridParam({
                                url:'<?php echo base_url('componente2/procesoAdministrativo/cargarConsultoraInteres2') . '/' ?>'+registro['cell'][0],
                                datatype:'json'
                            }).trigger('reloadGrid');
                            $('#pro_id').val(registro['cell'][0]);
                            $('#pro_numero').val(registro['cell'][1]);
                            $('#pro_finicio').val(registro['cell'][2]);
                            $('#pro_ffinalizacion').val(registro['cell'][3]);
                        });                    
                    }
                });
            });              
        });
        
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
            this.form.action='<?php echo base_url('componente2/procesoAdministrativo/guardarProceso') . "/2" ?>';
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
            url:'<?php echo base_url('componente2/procesoAdministrativo/cargarConsultoraInteres2') . '/0' ?>',
            editurl:'<?php echo base_url('componente2/procesoAdministrativo/gestionarConsultoresInteres') . '/0' ?>',
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
                {name:'con_int_aplica',index:'con_int_aplica',width:60,align:'center',editable:true,
                    edittype:"checkbox",editoptions:{value:"Si:No"}},
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


<form id="SeleccionConsultoraForm" method="post">
    <center>
        <h2 class="h2Titulos">Pedido de propuesta técnica y financiera</h2>
        <br/>
        <table>
            <tr>
            <td><strong>Departamento</strong></td>
            <td><select id='selDepto'>
                    <option value='0'>--Seleccione--</option>
                    <?php foreach ($departamentos as $depto) { ?>
                        <option value='<?php echo $depto->dep_id; ?>'><?php echo $depto->dep_nombre; ?></option>
                    <?php } ?>
                </select>
            </td>
            </tr>
            <td><strong>Municipio</strong></td>
            <td><select id='selMun' name='selMun'>
                    <option value='0'>--Seleccione--</option>
                </select>
            </td>
            </tr>
        </table>
    </center>
    <br/><br/><br/>
    <table style="right:-150px;position: relative;">
        <tr>
        <td class="textD"><strong>No. Proceso: </strong></td>
        <td> <input value="" id="pro_numero" name="pro_numero" type="text" size="10" readonly="readonly" style="border: none; background: white;"/></td>
        </tr>
        <tr>
        <td class="textD"><strong>Fecha de inicio: </strong></td> 
        <td><input value="" id="pro_finicio" name="pro_finicio" type="text" size="10" readonly="readonly"/></td>
        </tr>
        <tr>
        <td class="textD"> <strong>Fecha de finalización: </strong></td>
        <td><input value="" id="pro_ffinalizacion" name="pro_ffinalizacion" type="text" size="10" readonly="readonly"/></td>
        </tr>
    </table>
    <br/><br/>
    <center>
        <table id="consultoresInteres"></table>
        <div id="pagerConsultoresInteres"></div>
        <br/>
    </center>
    <center style="position: relative;top: 20px">
        <input type="submit" id="guardar" value="Guardar" />
        <input type="button" id="cancelar" value="Cancelar" />
    </center>
    <input id="pro_id" name="pro_id" value="" style="visibility: hidden"/>
</form>

<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>
