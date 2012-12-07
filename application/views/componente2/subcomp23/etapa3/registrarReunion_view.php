<script type="text/javascript">        
    $(document).ready(function(){
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E2/guardarReunion') ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/comp23_E2/muestraReunion'); ?>/'+$('#reu_id').val();
        });

        /*PARA EL DATEPICKER*/
        $( "#reu_fecha" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo base_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        /*ZONA DE VALIDACIONES*/
        /*GRID MIEMBROS DEL EQUIPO LOCAL DE APOYO*/
        var tabla2=$("#MiembroELA");
        tabla2.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E2/cargarParticipanteGGPri') . '/' . $gru_ges_id . '/' . $pri_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E2/gestionParticipantesPri') ?>/<?php echo $pri_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Nombre Completo','Sexo','Cargo','Teléfono','Participa',''],
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
            viewrecords: true,
            gridComplete: 
                function(){
                $.getJSON('<?php echo base_url('componente2/comp23_E1/calcularTotalSexo') ?>/reu_id/<?php echo $reu_id; ?>',
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
        $("#reunionForm").validate();    
    });
</script>
<form id="reunionForm" method="post">
    <h2 class="h2Titulos">Etapa 2: Diagnóstico del Municipio</h2>
    <h2 class="h2Titulos">Producto 1: Reuniones del Diagnóstico</h2>
    <br/><br/>
    <table>
        <tr>
        <td colspan="2"><strong>Departamento:</strong><?php echo $departamento ?></td>
        <td colspan="2"><strong>Municipio:</strong><?php echo $municipio ?></td>
        </tr>
        <tr>

        <td colspan="4"><strong>Proyecto PEP:</strong><?php echo $proyectoPep ?></td>
        </tr>
        <tr>
        <td colspan="3">
            <p><strong>Nombre de la actividad:</strong><textarea id="reu_resultado" name="reu_resultado" cols="50" rows="1" class="required" ></textarea></p>
        </td>
        <td width="300">
            Fecha: 
            <input id="reu_fecha" name="reu_fecha" readonly="readonly" class="required"  size="10"/>
        </td>
        </tr>
    </table>

    <p>Tema o Agenda a Desarrollar: <textarea id="reu_tema" name="reu_tema" cols="50" rows="2" class="required" maxlength="200" ></textarea></p>
    <p><input type="checkbox" name="pob_comunidad" value="1" >Comunidad</input>
        <input type="checkbox" name="pob_sector" value="1" >Sector</input>
        <input type="checkbox" name="pob_institucion" value="1" >Institución</input>
    </p>
    <table id="participantes"></table>
    <div id="pagerParticipantes"></div>
    <div style="position: relative;left: 275px;top: 5px;">
        <input type="button" id="agregar" value="  Agregar  " />
        <input type="button" id="editar" value="   Editar   " />
        <input type="button" id="eliminar" value="  Eliminar  " />
    </div>
    <p></p>

  <table style="position: relative;top: 15px;">
        <tr>
        <td>
           AQUI IRAN LOS CRITERIOS
        </td>
        <td style="width: 50px"></td>
        <td>
        <fieldset   style="border-color: #2F589F;height:85px;width:175px;position: relative;left: 50px;">
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
     <p>Observaciones:<br/><textarea id="reu_observacion" name="reu_observacion" cols="48" rows="5"><?php if (isset($reu_observacion)) echo$reu_observacion; ?></textarea></p>
    <center>  <p><input type="submit" id="guardar" value="Guardar Reunión" />
            <input type="button" id="cancelar" value="Cancelar" />
        </p>

    </center>
    <input id="reu_id" name="reu_id" value="<?php echo $reu_id ?>" style="visibility: hidden"/>
    <input id="pob_id" name="pob_id" value="<?php echo $pob_id ?>" style="visibility: hidden"/>
    <input type="text" style="visibility: hidden" id="reu_numero" value="<?php echo $reu_numero ?>" name="reu_numero" size="5" readonly="readonly"/> 
</form>
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>