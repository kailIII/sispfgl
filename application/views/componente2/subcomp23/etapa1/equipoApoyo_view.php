<script type="text/javascript">        
    $(document).ready(function(){
         <?php if (isset($guardo)){?>
                $('#guardo').dialog();
                <?php }?>
        /*VARIABLES*/
        var tabla=$("#participantes");
        /*ZONA DE BOTONES*/
        $("#agregar").button().click(function(){
            tabla.jqGrid('editGridRow',"new",
            {closeAfterAdd:true,addCaption: "Agregar participantes",width:350,
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                bottominfo:"Campos marcados con (*) son obligatorios", 
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                }
            });
        });
        
        $("#editar").button().click(function(){
            var gr = tabla.jqGrid('getGridParam','selrow');
            if( gr != null )
                tabla.jqGrid('editGridRow',gr,
            {closeAfterEdit:true,editCaption: "Editar participante",width:350,
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                bottominfo:"Campos marcados con (*) son obligatorios", 
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');
                    ;}
            });
            else $('#mensaje2').dialog('open'); 
        });
        
        $("#eliminar").button().click(function(){
            var grs = tabla.jqGrid('getGridParam','selrow');
            if( grs != null ) tabla.jqGrid('delGridRow',grs,
            {msg: "¿Desea Eliminar este participante?",caption:"Eliminando ",
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');                            
                }}); 
            else $('#mensaje2').dialog('open'); 
        });
        
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E1/guardarEquipoApoyo/' . $gru_apo_id); ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        /*PARA EL DATEPICKER*/
        $("#gru_apo_fecha").datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd-mm-yy'
        });
        /*FIN DEL DATEPICKER*/
        /*ZONA DE VALIDACIONES*/
        function validar(value, colname) {
            if (value == 0 ) return [false,"Debe Seleccionar una Opción"];
            else return [true,""];
        }
        /*FIN ZONA VALIDACIONES*/
        /*GRID PARTICIPANTES*/
        var tabla=$("#participantes");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E1/cargarParticipanteGA') ?>?gru_apo_id=<?php echo $gru_apo_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E1/gestionParticipantes') ?>/grupo_apoyo/gru_apo_id/<?php echo $gru_apo_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Dui','Nombres','Apellidos','Sexo','Edad','Area R/U','Procedencia','Nivel Escolar','Teléfono'],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_dui',index:'par_dui', width:100,editable:true,
                    editoptions:{size:25,maxlength: 10,dataInit:function(el){$(el).mask("99999999-9",{placeholder:" "});}},
                    formoptions:{label: "DUI"}
                },
                {name:'par_nombre',index:'par_nombre',width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombres",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_apellido',index:'par_apellido',width:100,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Apellidos",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_sexo',index:'par_sexo',editable:true,edittype:"select",width:50,
                    align:"center",
                    editoptions:{ value: '0:Seleccione;M:Mujer;H:Hombre' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validar}
                },
                {name:'par_edad',index:'par_edad',width:80,editable:true,
                    editoptions:{ size:15,dataInit: function(elem){$(elem).bind("keypress", function(e) {return numeros(e)})}}, 
                    formoptions:{ label: "Edad",elmprefix:"(*)"},
                    editrules:{required:true,minValue:12,number:true} 
                },
                {name:'par_proviene',index:'par_proviene',width:80,edittype:"select",
                    editable:true,
                    editoptions:{ value: '0:Seleccione;u:Urbano;r:Rural' }, 
                    formoptions:{ label: "Area",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validar}
                },
                {name:'par_cargo',index:'par_cargo',width:100,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Procedencia",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_nivel_esco',index:'par_nivel_esco',width:100,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Nivel Escolar"}
                },
                {name:'par_tel',index:'par_tel',width:100,editable:true,
                    editoptions:{size:10,maxlength:9,dataInit:function(el){$(el).mask("9999-9999",{placeholder:" "});}}, 
                    formoptions:{ label: "Teléfono"}
                }
            ],
            multiselect: false,
            caption: "Miembros del Equipo Local de Apoyo",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerParticipantes'),
            viewrecords: true,
            gridComplete: 
                function(){
                $.getJSON('<?php echo base_url('componente2/comp23_E1/calcularTotalSexo') ?>/gru_apo_id/<?php echo $gru_apo_id; ?>',
                function(data) {
                    $.each(data, function(key, val) {
                        if(key=='rows'){
                            $.each(val, function(id, registro){
                                $("#total").attr('value', registro['cell'][0]);
                                $("#mujeres").attr('value', registro['cell'][1]);
                                $("#hombres").attr('value', registro['cell'][2]);
                                if(registro['cell'][1]>0)
                                    $("#porcenMujeresSi").attr("checked", true);
                                else
                                    $("#porcenMujeresNo").attr("checked", true);
                                if(registro['cell'][3]<registro['cell'][0])
                                $("#mayor15No").attr("checked", true);
                                else
                                    $("#mayor15Si").attr("checked", true);
                            });                    
                        }
                    });
                }); 
            }
        }).jqGrid('navGrid','#pagerParticipantes',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('par_id');
        /* Funcion para regargar los JQGRID luego de agregar y editar*/
        function despuesAgregarEditar() {
            tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; //no error
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
            
    });
    
    
</script>

<form method="post">

    <h2 class="h2Titulos">Etapa 1: Condiciones Previas</h2>
    <h2 class="h2Titulos">Producto 3: Equipo Local de Apoyo</h2>


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
        <td ><strong>Lugar:</strong><input id="gru_apo_lugar" <?php if (isset($gru_apo_lugar)) { ?> value='<?php echo $gru_apo_lugar; ?>'<?php } ?> name="gru_apo_lugar" type="text" size="40"/></td>
        <td  ><strong>Fecha: </strong><input readonly="readonly" <?php if (isset($gru_apo_fecha)) { ?> value='<?php echo date('d-m-Y', strtotime($gru_apo_fecha)); ?>'<?php } ?>id="gru_apo_fecha" name="gru_apo_fecha" type="text" size="10"/></td>
        </tr>
    </table>
    <br/><br/>
    <table id="participantes"></table>
    <div id="pagerParticipantes"></div>

    <div style="position: relative;left: 200px;top: 5px">
        <input type="button" id="agregar" value="  Agregar  " />
        <input type="button" id="editar" value="   Editar   " />
        <input type="button" id="eliminar" value="  Eliminar  " />
        <br/><br/>
    </div>


    <table style="position: relative;left: 40px;top: 20px;border-color: 2px solid blue">
        <tr>
        <td>
            <p>¿Los Miembros del Equipo Local de Apoyo Reunen las Características Siguientes?</p>
        <fieldset style="width: 400px;border-color: #2F589F">
            <legend><strong>Características</strong></legend>
            <table>
                <tr>
                <td>Mayores de 15 Años </td>
                <td><input type="radio" id="mayor15Si" name="mayor15" value="true">SI </input></td>
                <td><input type="radio" id="mayor15No"name="mayor15" value="false">NO </input></td>
                </tr>
                <tr>
                <td>Existe participación de Mujeres </td>
                <td><input type="radio" id="porcenMujeresSi" name="porcenMujeres" value="true">SI </input></td>
                <td><input type="radio" id="porcenMujeresNo" name="porcenMujeres" value="false">NO </input></td>    
                </tr>
                <tr>
                <td>Conocen el Territorio </td>
                <td><input type="radio" name="gru_apo_c3" <?php if (!strcasecmp($gru_apo_c3, 't')) { ?> checked <?php } ?>  value="true">SI </input></td>
                <td><input type="radio" name="gru_apo_c3" <?php if (!strcasecmp($gru_apo_c3, 'f')) { ?> checked <?php } ?>value="false">NO </input></td> 
                </tr>
                <tr>
                <td>Tienen Potencial de Liderazgo </td>
                <td><input type="radio" name="gru_apo_c4" <?php if (!strcasecmp($gru_apo_c4, 't')) { ?> checked <?php } ?> value="true">SI </input></td>
                <td><input type="radio" name="gru_apo_c4"<?php if (!strcasecmp($gru_apo_c4, 'f')) { ?> checked <?php } ?> value="false">NO </input></td>   
                </tr>
            </table>  
        </fieldset>
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
    <div style="position:relative;left: 40px;top:25px;">
        <p>Observaciones y/o Recomendaciones:<br/>
            <textarea name="gru_apo_observacion" cols="48" rows="5"><?php if (isset($gru_apo_observacion)) echo$gru_apo_observacion; ?></textarea></p>
    </div>

    <center>
        <br/>
        <p> 
            <input type="submit" id="guardar" value="Guardar Equipo de Apoyo" />
            <input type="button" id="cancelar" value="Cancelar" />
        </p>
    </center>

</form>

<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>
<div id="guardo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>


