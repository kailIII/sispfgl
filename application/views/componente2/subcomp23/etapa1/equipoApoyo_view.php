<script type="text/javascript">        
    $(document).ready(function(){
       /*VARIABLES*/
        var tabla=$("#participantes");
        /*ZONA DE BOTONES*/
        $("#agregar").button().click(function(){
            tabla.jqGrid('editGridRow',"new",
            {closeAfterAdd:true,addCaption: "Agregar ",
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
            {closeAfterEdit:true,editCaption: "Editando ",
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
            {msg: "Desea Eliminar esta ?",caption:"Eliminando ",
                align:'center',reloadAfterSubmit:true,
                processData: "Cargando...",
                onclickSubmit: function(rp_ge, postdata) {
                    $('#mensaje').dialog('open');                            
                }}); 
            else $('#mensaje2').dialog('open'); 
        });
        
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E1/guardarGrupoApoyo/'.$gru_apo_id); ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        /*PARA EL DATEPICKER*/
        $( "#gru_apo_fecha" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
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
            colNames:['id','Dui','Nombres','Apellidos','Sexo','Edad','Proviene R/U','Cargo','Nivel Escolar','Teléfono'],
            colModel:[
                {name:'par_id',index:'par_id', width:40,editable:false,editoptions:{size:15} },
                {name:'par_dui',index:'par_dui', width:100,editable:true,editoptions:{size:15}, 
                    formoptions:{label: "Dui"}
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
                    editoptions:{ value: '0:Seleccione;F:Femenino;M:Masculino' }, 
                    formoptions:{ label: "Sexo",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validar}
                },
             
                {name:'par_edad',index:'par_edad',width:80,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Edad",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                
                {name:'par_proviene',index:'par_proviene',width:80,edittype:"select",
                    editable:true,
                    editoptions:{ value: '0:Seleccione;U:Urbano;R:Rural' }, 
                    formoptions:{ label: "Proviene de",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validar}
                },
                   
                   
                {name:'par_cargo',index:'par_cargo',width:100,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'par_nivel_esco',index:'par_nivel_esco',width:100,editable:true,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{ label: "Nivel Escolar",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                
                
                {name:'par_tel',index:'par_tel',width:100,editable:true,
                    editoptions:{size:10,maxlength:9}, 
                    formoptions:{ label: "Teléfono",elmprefix:"(*)"},
                    editrules:{required:true} 
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
                                if(registro['cell'][1]/registro['cell'][0]>=0.5)
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

<form>
    <div style="position: relative;left: 20px;">
        <h2 class="h2Titulos">Etapa 1: Condiciones Previas</h2>
        <h2 class="h2Titulos">Producto 3: Equipo Local de Apoyo</h2>


        <table>
            <tr>
            <td ><strong>Departamento:</strong><?php echo $departamento ?></td>
            <td ><strong>Municipio:</strong><?php echo $municipio ?></td>
            </tr>
            <tr>
            <td ><strong>Lugar:</strong><input id="gru_apo_lugar" name="gru_apo_lugar" type="text" size="40"/></td>
            <td  ><strong>Fecha: </strong><input readonly="readonly" id="gru_apo_fecha" name="gru_apo_fecha" type="text" size="10"/></td>
            </tr>
            <tr>
            <td colspan="2"><strong>Proyecto PEP:  </strong><?php echo $proyectoPep ?></td>
            </tr>

        </table>
        <br></br>
        <table id="participantes"></table>
        <div id="pagerParticipantes"></div>

        <div style="position: relative;left: 200px;top: 5px">
            <input type="button" id="agregar" value="  Agregar  " />
            <input type="button" id="editar" value="   Editar   " />
            <input type="button" id="eliminar" value="  Eliminar  " />
            <br></br>
        </div>

    </div>
    <table style="position: relative;left: 40px;top: 20px;border-color: 2px solid blue">
        <tr>
        <td>
            <!-- <div style="float: left; width: 400px;left: 70px;position: relative;top:20px;border: 2px solid black;"> -->
            <p>¿Los Miembros del Equipo Local de Apoyo Reunen las Caracterìsticas Siguientes?</p>
        <fieldset style="width: 400px;border-color: #2F589F">
            <legend><strong>Caracterìsticas</strong></legend>
            <table>
                <tr>
                <td>Mayores de 15 Años </td>
                <td><input type="radio" id="mayor15Si" name="mayor15" value="true">SI </input></td>
                <td><input type="radio" id="mayor15No"name="mayor15" value="false">NO </input></td>
                </tr>
                <tr>
                <td>El 50% de los Miembros son Mujeres </td>
                <td><input type="radio" id="porcenMujeresSi" name="porcenMujeres" value="true">SI </input></td>
                <td><input type="radio" id="porcenMujeresNo" name="porcenMujeres" value="false">NO </input></td>    
                </tr>
                <tr>
                <td>Conocen el Territorio </td>
                <td><input type="radio" name="conTerritorio" value="true">SI </input></td>
                <td><input type="radio" name="conTerritorio" value="false">NO </input></td> 
                </tr>
                <tr>
                <td>Tienen Potencial de Liderazgo </td>
                <td><input type="radio" name="potencialLider" value="true">SI </input></td>
                <td><input type="radio" name="potencialLider" value="false">NO </input></td>   
                </tr>
            </table>  
        </fieldset>
        </td>
        <td>
            <!--   </div> --> 

            <!--    <div style="float: left;width: 250;position: relative;left:150px;top: 30px;border: 2px solid black;">-->
        <fieldset   style="border-color: #2F589F;height:85px;width:175px;position: relative;left: 50px;">
            <legend align="center"><strong>Cantidad de Participantes</strong></legend>
            <table>
                <tr>
                <td class="textD">Hombres: </td>
                <td><input class="bordeNo" id="hombres" type="text" size="5" readonly="readonly" /></td>
                </tr>
                <tr>
                <td class="textD">Mujeres: </td>
                <td><input class="bordeNo" id="mujeres" type="text" size="5" readonly="readonly" /></br></td>
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
    <!--   </div>-->

    <div style="position:relative;left: 40px;top:25px;">
        <p>Observaciones y/o Recomendaciones:</br>
            <textarea id="acu_mun_observacion" cols="48" rows="5"></textarea></p>
    </div>

    <center>
        <div style="position:relative;width: 300px;top: 25px">
            <p > 
                <input type="submit" id="guardar" value="Guardar Reunión" />
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

