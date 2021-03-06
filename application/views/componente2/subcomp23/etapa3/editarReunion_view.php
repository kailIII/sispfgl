<script type="text/javascript">        
    $(document).ready(function(){
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E3/guardarReunion') ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/comp23_E3/muestraReuniones'); ?>';
        });

        /*PARA EL DATEPICKER*/
        $( "#reu_fecha" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo base_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        /*FIN DEL DATEPICKER*/
        /*ZONA DE VALIDACIONES*/
        /*GRID MIEMBROS DEL EQUIPO LOCAL DE APOYO*/
        var tabla2=$("#participantes");
        tabla2.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E3/cargarParticipanteGGReu') . '/' . $gru_ges_id . '/' . $reu_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E3/gestionParticipantesReu') ?>/<?php echo $reu_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Nombre Completo','Sexo','Cargo','Teléfono','Asistencia',''],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_dui',index:'par_dui', width:100,editable:false},
                {name:'par_nombre',index:'par_nombre',width:150,editable:false},
                {name:'par_sexo',index:'par_sexo',width:50,editable:false},
                {name:'par_cargo',index:'par_cargo',width:100,editable:false},
                {name:'par_tel',index:'par_tel',width:100,editable:false},
                {name:'par_reu_participa',index:'par_reu_participa',width:60,align:'center',editable:true,edittype:"checkbox",editoptions:{value:"Si:No"}},
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
            pager: jQuery('#pagerParticipantes'),
            viewrecords: true,
            gridComplete: 
                function(){
                $.getJSON('<?php echo base_url('componente2/comp23_E1/calcularTotalParticipantes') ?>/<?php echo 'reunion/' . $reu_id . "/reu_id"; ?>',
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
        //Validar formulario
        $("#reunionForm").validate({
            rules: {
                reu_fecha: {
                    required: true
                },
                reu_duracion_horas: {
                    required: true,
                    number: true,
                    min: 0,
                    max:12
                },
                reu_duracion_minutos: {
                    required: true,
                    number: true,
                    min: 0,
                    max:59
                },
                reu_tema: {
                    required: true,
                    maxlength: 200
                }     
            }
        });      
    });
</script>
<form id="reunionForm" method="post">
    <h2 class="h2Titulos">Etapa 2: Diagnóstico del Municipio</h2>
    <h2 class="h2Titulos">Producto 1: Reuniones del Diagnóstico</h2>
    <br/><br/>
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
        <td width="300">
            No. de Reunión: <input type="text" id="reu_numero" value="<?php echo $reu_numero ?>" name="reu_numero" size="5" readonly="readonly"/> </td>
        <td width="200">
            Fecha: 
            <input value="<?php echo date_format(date_create($reu_fecha), "d-m-Y") ?>" id="reu_fecha" name="reu_fecha" readonly="readonly" size="10"/>
        </td>
        <td width="160" >
            Duración:
            <input value="<?php echo $reu_duracion_horas ?>" type="text" id="reu_duracion_horas" name="reu_duracion_horas" size="3"/> horas
        </td>
        <td width="200">
            con 
            <input value="<?php echo $reu_duracion_minutos ?>" type="text" id="reu_duracion_minutos" name="reu_duracion_minutos" size="3"/> minutos
        </td>
        </tr>
    </table>

    <p><strong>Agenda a Desarrollar:</strong> <textarea id="reu_tema" name="reu_tema" cols="50" rows="2" class="required" maxlength="200" ><?php echo $reu_tema ?></textarea></p>

    <table id="participantes"></table>
    <div id="pagerParticipantes"></div>
    <table style="position: relative;top: 15px;">
        <tr>
        <td>
        <fieldset style="width:450px;">
            <legend><strong>Resultados alcanzados en la reunión</strong></legend>
            <table>
                <?php foreach ($resultados as $aux) { ?>
                    <tr>
                    <td>
                        <input <?php if (!strcasecmp($aux->res_reu_valor, 't')) { ?>checked <?php } ?> type="checkbox" name="res_<?php echo $aux->res_id; ?>" value="<?php echo $aux->res_id; ?>" ><?php echo $aux->res_nombre; ?></input><br/>
                    </td>
                    </tr>
                <?php } ?>
            </table>  
        </fieldset>
        </td>
        <td style="width: 50px"></td>
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
    <br/>
    <p>Observaciones:<br/><textarea id="reu_observacion" value="<?php echo $reu_observacion ?>" name="reu_observacion" cols="48" rows="5"><?php if (isset($reu_observacion)) echo$reu_observacion; ?></textarea></p>
    <center>  <p><input type="submit" id="guardar" value="Guardar Reunión" />
            <input type="button" id="cancelar" value="Cancelar" />
        </p>

    </center>
    <input id="reu_id" name="reu_id" value="<?php echo $reu_id ?>" style="visibility: hidden"/>
</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>