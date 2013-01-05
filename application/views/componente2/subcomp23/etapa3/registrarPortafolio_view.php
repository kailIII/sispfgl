
<script type="text/javascript">        
    $(document).ready(function(){
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E3/guardarReunion') ?>';
        });
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url('componente2/comp23_E3/muestraReunion'); ?>/'+$('#reu_id').val();
        });

        /*PARA EL DATEPICKER*/
        $( "#por_pro_fecha_desde" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo base_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        
          /*PARA EL DATEPICKER*/
        $( "#por_pro_fecha_hasta" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo base_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        
        /*ZONA DE VALIDACIONES*/
        /*GRID FUENTES DE FINANCIAMIENTO*/
        var tabla=$("#fuentesDeFinanciamiento");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E1/cargarFuentes') . '/' . $inv_inf_id . '/p' ?>',
            editurl:'<?php echo base_url('componente2/comp23_E1/gestionarFuentes') . '/' . $inv_inf_id . '/p' ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombre','Institución ó Comunidad','Cargo','Telefono','Tipo Información'],
            colModel:[
                {name:'fue_pri_id',index:'fue_pri_id', width:40,editable:false,editoptions:{size:15} },
                {name:'fue_pri_nombre',index:'fue_pri_nombre', width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Nombre",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fue_pri_institucion',index:'fue_pri_institucion',width:200,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{label: "Institucion ó Comunidad",elmprefix:"(*)"},
                    editrules:{required:true}
                },
                {name:'fue_pri_cargo',index:'fue_pri_cargo',editable:true,width:200,
                    editoptions:{size:25,maxlength:30}, 
                    formoptions:{label: "Cargo",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fue_pri_telefono',index:'fue_pri_telefono',width:80,editable:true,
                    editoptions:{size:10,maxlength:9,dataInit:function(el){$(el).mask("9999-9999",{placeholder:" "});}}, 
                    formoptions:{ label: "Teléfono",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'fue_pri_tipo_info',index:'fue_pri_tipo_info',width:150,editable:true,
                    editoptions:{size:25,maxlength:100}, 
                    formoptions:{ label: "Tipo Documento",elmprefix:"(*)"},
                    editrules:{required:true} 
                }
            ],
            multiselect: false,
            caption: "Fuentes de Información Primarias",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerFuentesPrimaria'),
            viewrecords: true     
        }).jqGrid('navGrid','#pagerFuentesPrimaria',
        {edit:true,add:true,del:true,search:false,refresh:false,
            beforeRefresh: function() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        },//OPCIONES
        {closeAfterEdit:true,editCaption: "Editando Fuentes Primarias ",
            align:'center',reloadAfterSubmit:true,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }    
        },//EDITAR
        {closeAfterAdd:true,addCaption: "Agregar Nuevas Fuentes Primarias ",
            align:'center',reloadAfterSubmit:true,width:350,
            processData: "Cargando...",afterSubmit:despuesAgregarEditar,
            bottominfo:"Campos marcados con (*) son obligatorios", 
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');
            }
        },//AGREGAR
        {msg: "¿Desea Eliminar a esta Fuente?",caption:"Eliminando....",
            align:'center',reloadAfterSubmit:true,processData: "Cargando...",
            onclickSubmit: function(rp_ge, postdata) {
                $('#mensaje').dialog('open');                            
            }
        }//ELIMINAR
    ).hideCol('fue_pri_id');
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
        //Validar formulario
        $("#reunionForm").validate();    
    });
</script>

<form id="portafoliosForm" method="post">
    <h2 class="h2Titulos">Etapa 3: Plan Estratégico Participativo</h2>
    <h2 class="h2Titulos">Portafolio de Proyectos</h2>
    <h2 class="h2Titulos">Ragistro de Proyectos</h2>
    <br/><br/>
    <table>
        <tr>
        <td colspan="2"><strong>Departamento:</strong><?php echo $departamento ?></td>
        <td colspan="2"><strong>Municipio:</strong><?php echo $municipio ?></td>
        </tr>
        <tr>

        <td colspan="4"><strong>Proyecto PEP:</strong><?php echo $proyectoPep ?></td>
        </tr>
    </table>

    <table>             
        <tr>
        <td class="textD">Área: </td>

        <td><input id="por_pro_area" type="text" size="50"/></td>
        </tr>
        <tr>
        <td class="textD">Tema: </td>
        <td><textarea id="por_pro_area" name="por_pro_tema" cols="57" rows="3"></textarea></td>
        </tr>
        <tr>
        <td class="textD">Nombre del Proyecto: </td>
        <td><input id="por_pro_nombre" type="text" size="50"/></td>
        </tr>
        </tr>
        <tr>
        <td class="textD">Descripción: </td>
        <td><textarea id="por_pro_descripcion" name="por_pro_tema" cols="57" rows="3"></textarea></td>
        </tr>
        </tr>
        <tr>
        <td class="textD">Ubicación: </td>
        <td><input id="por_pro_ubicacion" type="text" size="50"/></td>
        </tr>
        <tr>
        <td class="textD">Costo Estimado: </td>
        <td><input id="por_pro_costo_estimado" type="text" size="10"/></td>
        </tr>
    </table> 


    <table>
        <hr>Periodo</hr>
        <tr>
        <td colspan="2">Desde:<input id="por_pro_fecha_desde" name="por_pro_fecha_desde" readonly="readonly" class="required"  size="10"/></td>
        <td colspan="2">Hasta:<input id="por_pro_fecha_hasta" name="por_pro_fecha_hasta" readonly="readonly" class="required"  size="10"/></td>
        </tr>
    </table> 






    <table id="fuentesDeFinanciamiento"></table>
    <div id="pagerFuentesDeFinanciamiento"></div>
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
    <br/>


    <p>Observaciones:<br/><textarea id="reu_observacion" name="reu_observacion" cols="48" rows="5"><?php if (isset($reu_observacion)) echo$reu_observacion; ?></textarea></p>
    <center>  <p><input type="submit" id="guardar" value="Guardar Fuente de Financiamiento" />
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