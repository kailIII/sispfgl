<script type="text/javascript">        
    $(document).ready(function(){
        /*VARIABLES*/
 
       
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E0/guardarSolicitud'); ?>';
        });
        
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
       
       
             
       
        /*GRID */
        var tabla2=$("#listamuni");
        tabla2.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E2/cargarParticipanteGGCap') . '/' . $gru_ges_id . '/' . $cap_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E1/gestionParticipantesCap') ?>/<?php echo $cap_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Region','Departamento','Municipio','Fecha de Solicitud','Fecha de Verificación','Seleccionado',''],
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
            caption: "Miembros del Grupo Gestor",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerlistamuni'),
            viewrecords: true
         
        }).jqGrid('navGrid','#pagerlistamuni',
        {edit:false,add:false,del:false,search:false,refresh:false,
            beforeRefresh: function() {
                tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}
        }
    ).hideCol('par_id');
        function despuesAgregarEditar2() {
            tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; 
        }
        /*           */
 
 
 
 
                
        /*PARA EL DATEPICKER*/
        $( "#f_seleccion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
               
               
               
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


<form id="comiteInterInstitucionalForm" method="post">

    <h2 class="h2Titulos">Etapa 0: Selección de Municipios</h2>
    <h2 class="h2Titulos">Selección de municipios por el comite Interinstitucional</h2>
    <br/>
    <br/>
    <strong>Fecha de selección de municipios: </strong> 
    <input <?php if (isset($f_seleccion)) { ?> value='<?php echo date('d/m/Y', strtotime($f_seleccion)); ?>'<?php } ?>id="f_seleccion" name="f_seleccion" type="text" size="10" readonly="readonly"/>

    <br/>
    <br/>

    <table>
        <tr><td style="width: 100px"></td>
        <td>
            <table id="listamuni"></table>  
            <div id="pagerlistamuni"></div> 
        </td>
        </tr>

    </table>


    <br/>


    <table style="position: relative;top: 15px;">
        <tr>
        <td>
            <p>Observaciones:<br/><textarea id="comentarios" name="observaciones" cols="48" rows="5"><?php if (isset($observaciones)) echo $observaciones; ?></textarea></p>
        </td>
        <td style="width: 50px"></td>
        <td>
            <table>
                <tr>
                <td><div id="btn_subir"></div></td>
                <td><input class="letraazul" type="text" id="vinieta" value="Subir Propuesta" size="30" style="border: none"/></td>
                </tr>
                <tr>
                <td><a <?php if (isset($acu_mun_ruta_archivo) && $acu_mun_ruta_archivo != '') { ?> href="<?php echo base_url() . $acu_mun_ruta_archivo; ?>"<?php } ?>  id="btn_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
                <td><input class="letraazul" type="text" id="vinietaD" <?php if (isset($acu_mun_ruta_archivo) && $acu_mun_ruta_archivo != '') { ?>value="Descargar Propuestas"<?php } else { ?> value="No Hay Propuestas Por Descargar" <?php } ?>size="35" style="border: none"/></td>
                </tr>
            </table> 
        </td>
        </tr>
    </table>




    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Guardar" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
    <input id="acu_mun_ruta_archivo" name="acu_mun_ruta_archivo" <?php if (isset($acu_mun_ruta_archivo) && $acu_mun_ruta_archivo != '') { ?>value="<?php echo $acu_mun_ruta_archivo; ?>"<?php } ?> type="text" size="100" readonly="readonly" style="visibility: hidden"/>

</form>

