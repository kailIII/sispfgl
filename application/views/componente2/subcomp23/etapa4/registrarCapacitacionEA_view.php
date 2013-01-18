<script type="text/javascript">        
    $(document).ready(function(){
        /*ZONA DE BOTONES*/
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E4/guardarCapacitacion') . "/" . $cap_id; ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/comp23_E4/cancelaCapacitacion') . "/" . $cap_id; ?>';
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
        $( "#cap_fecha" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/ 
        /*GRID MIEMBROS DEL EQUIPO LOCAL DE APOYO*/
        var tabla2=$("#participantes");
        tabla2.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E4/cargarParticipanteIntIns') . '/int_ins_id/' . $int_ins_id . '/' . $cap_id ?>',
            editurl:'<?php echo base_url('componente2/comp23_E1/gestionParticipantesCap') ?>/<?php echo $cap_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Dui','Nombre Completo','Sexo','Cargo','Teléfono','Asistencia',''],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_dui',index:'par_dui', width:100,editable:false},
                {name:'par_nombre',index:'par_nombre',width:150,editable:false},
                {name:'par_sexo',index:'par_sexo',width:50,editable:false},
                {name:'par_cargo',index:'par_cargo',width:100,editable:false},
                {name:'par_tel',index:'par_tel',width:100,editable:false},
                {name:'par_cap_participa',index:'par_cap_participa',width:60,align:'center',editable:true,edittype:"checkbox",editoptions:{value:"Si:No"}},
                {name:'actions',formatter:"actions",editable:false,fixed:true,width:60,
                    formatoptions:{"keys":true,delbutton: false,
                        onSuccess:despuesAgregarEditar2}
                }
            ],
            multiselect: false,
            caption: "Miembros de la Instancia de participacion",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerParticipantes'),
            viewrecords: true,
            gridComplete: 
                function(){
                $.getJSON('<?php echo base_url('componente2/comp23_E1/calcularTotalParticipantes') ?>/<?php echo 'capacitacion/' . $cap_id . "/cap_id"; ?>',
                function(data) {
                    $.each(data, function(key, val) {
                        if(key=='rows'){
                            $.each(val, function(id, registro){
                                $("#total").attr('value', registro['cell'][0]);
                                $("#mujeres").attr('value', registro['cell'][1]);
                                $("#hombres").attr('value', registro['cell'][2]);
                            });                    
                        }
                    });
                }); 
            }
        }).jqGrid('navGrid','#pagerParticipantes',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('par_id');
        function despuesAgregarEditar2() {
            tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; 
        }
        
        /*GRID FACILITADORES*/
        var tabla3=$("#Facilitadores");
        tabla3.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E1/cargarFacilitadores') . '/cap_id/' . $cap_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E1/gestionFacilitadores') . '/cap_id/' . $cap_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombres','Apellidos','Telefono','Email'],
            colModel:[
                {name:'fac_id',index:'fac_id', width:40,editable:false,editoptions:{size:15} },
                {name:'fac_nombre',index:'fac_nombre',width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fac_apellido',index:'fac_apellido',width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Apellidos",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fac_telefono',index:'fac_telefono',width:100,editable:true,
                    editoptions:{size:10,maxlength:9,dataInit:function(el){$(el).mask("9999-9999",{placeholder:" "});}}, 
                    formoptions:{ label: "Teléfono"} 
                },
                {name:'fac_email',index:'fac_email',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Email",elmprefix:"(*)"},
                    editrules:{required:true,email: true} 
                }           
            ],
            multiselect: false,
            caption: "Facilitadores",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerFacilitadores'),
            viewrecords: true     
        }).hideCol('fac_id').jqGrid('navGrid','#pagerFacilitadores',
        {edit:true,add:true,del:true,search:false,refresh:true,
            beforeRefresh: function() {
                tabla3.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            }
        },//OPCIONES
        {closeAfterEdit:true,editCaption: "Editar facilitador",align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar3,width:350,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }    
        },//EDITAR
        {closeAfterAdd:true,addCaption: "Agregar facilitador", align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar3,width:350,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        },//AGREGAR
        {msg: "Desea Eliminar a este Facilitador?",caption:"Eliminando....",
            align:'center',reloadAfterSubmit:true,processData: "Cargando...",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');                            
            }
        }//ELIMINAR
    );
        /* Funcion para regargar los JQGRID FACILITADORES*/
        function despuesAgregarEditar3() {
            tabla3.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; 
        }
        $("#capacitacionForm").validate({
            rules: {
                cap_fecha: {
                    required: true
                },
                cap_lugar: {
                    required: true,
                    maxlength: 50
                },
                cap_tema: {
                    required: true,
                    maxlength: 200
                }
            }
        });   
    });
</script>

<form method="post" id="capacitacionForm">

    <h2 class="h2Titulos">Etapa 1: Condiciones Previas</h2>
    <h2 class="h2Titulos">Producto 4: Capacitaciones Local de Apoyo</h2>
    <table>
        <tr>
        <td class="tdLugar" ><strong>Departamento:</strong></td>
        <td><?php echo $departamento ?></td>
        <td class="tdEspacio"></td>
        <td class="tdLugar"><strong>Municipio:</strong></td>
        <td ><?php echo $municipio ?></td>    
        </tr>
    </table>
    <table>
        <tr>
        <td  ><strong>Fecha de Capacitación: </strong><input readonly="readonly" id="cap_fecha" name="cap_fecha" type="text" size="10" /></td>
        <tr>
        <td colspan="2"><strong>Agenda:</strong><input id="cap_tema" name="cap_tema" type="text" size="40"/></td>
        </tr>
        <tr>
        <td colspan="2"><strong>Lugar:</strong><input id="cap_lugar" name="cap_lugar" type="text" size="40"/></td>
        </tr>
    </table>
    <br/><br/>
    <center>     
        <table id="Facilitadores"></table>
        <div id="pagerFacilitadores"></div>
    </center>  
    <br/><br/>
    <table id="participantes"></table>
    <div id="pagerParticipantes"></div>
    <table style="position: relative;left: 40px;top: 20px;border-color: 2px solid blue">
        <tr>
        <td>
            <p>Observaciones y/o Recomendaciones:<br/>
                <textarea name="cap_observacion" cols="48" rows="5"></textarea></p>

        </td>
        <td>
        <fieldset   style="border-color: #2F589F;height:85px;width:225px;position: relative;left: 50px;">
            <legend align="center"><strong>Cantidad de Participantes</strong></legend>
            <table>
                <tr>
                <td class="textD">Hombres: </td>
                <td><input class="bordeNo" id="hombres" type="text" size="5" readonly="readonly" /></td>
                </tr>
                <tr>
                <td class="textD">Mujeres: </td>
                <td><input class="bordeNo" id="mujeres" type="text" size="5" readonly="readonly" /><br/></td>
                </tr>
                <tr>
                <td class="textD">Total: </td>
                <td><input class="bordeNo" id="total" type="text" size="5" readonly="readonly" /></td>
                </tr>
            </table> 
        </fieldset>
        </td>
        </tr>
    </table>
    <center>
        <div style="position:relative;top: 25px">
            <p > 
                <input type="submit" id="guardar" value="Guardar Capacitación" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>

