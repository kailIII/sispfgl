<script type="text/javascript">        
    $(document).ready(function(){
        /*GRID PARTICIPANTES*/
       
        /*PARA EL DATEPICKER*/
        $( "#fecha_inicio" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        
        /*FIN DEL DATEPICKER*/
        
        /*PARA EL DATEPICKER*/
        $( "#fecha_finalizacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        
        /*FIN DEL DATEPICKER*/
       
            
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/comp23_E1/cargarParticipantesAM') ?>/acu_mun_id/<?php echo $acu_mun_id; ?>',
            editurl:'<?php echo base_url('componente2/comp23_E1/gestionParticipantes') ?>/acuerdo_municipal/acu_mun_id/<?php echo $acu_mun_id; ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','nombre','Tipo'],
            colModel:[
                {name:'consul_id',index:'consul_id', width:40,editable:false,editoptions:{size:15} },
                {name:'consul_nombre',index:'consul_nombre',width:200,editable:true,
                    editoptions:{size:25,maxlength:50}, 
                    formoptions:{label: "Consultora",elmprefix:"(*)"},
                    editrules:{required:true} 
                },
                {name:'consul_tipo',index:'consul_tipo',editable:true,edittype:"select",width:40,
                    editoptions:{ value: '0:Seleccione;e:Empresa;o:ONG' }, 
                    formoptions:{ label: "Tipo Consultora",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaconsultora}
                },

            ],
            multiselect: false,
            caption: "Personal de Enlace Municipal",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerParticipantes'),
            viewrecords: true

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
        
        
        
        
        
      
        
    });
</script>


<form id="EvaluacionExpresionesInteres" method="post">

    <h2 class="h2Titulos">Evaluaciones de Expresiones de Interes</h2>
    <h3 class="h2Titulos">Proceso de Evaluación</h3>
    <br/>




    <strong>No. Proceso </strong><input class="procesoNo" id="hombres" type="text" size="10" readonly="readonly" />
    <br/>
    <br/>

    <table><tr>
        <td>
            <strong>Fecha de inicio: </strong>
        </td> 
        <td>
            <input id="fecha_inicio" name="fecha_inicio" type="text" size="10" readonly="readonly"/>
        </td>
        </tr>
        <tr>
        <td> <strong>Fecha de finalización: </strong>
        </td>
        <td>
            <input id="fecha_finalizacion" name="fecha_finalizacion" type="text" size="10" readonly="readonly"/>    
        </td>
        </tr> 
    </table>

    

    <table id="consultorasintersadas"></table>
    <div id="pagerConsultoras"></div>






    <div style="position: relative;left: 275px; top: 5px;">
        <input type="button" id="agregar" value="  Agregar  " />
        <input type="button" id="editar" value="   Editar   " />
        <input type="button" id="eliminar" value="  Eliminar  " />
    </div>







    
    <table style="position: relative;top: 15px;">
        <tr>
        <td>
            <p>Observaciones:<br/><textarea id="acu_mun_observacion" name="acu_mun_observacion" cols="48" rows="5"><?php if (isset($acu_mun_observacion)) echo$acu_mun_observacion; ?></textarea></p>
        </td>
        <td style="width: 50px"></td>
        </tr>
    </table>





    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Guardar Acuerdo" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>

    <input id="acu_mun_ruta_archivo" name="acu_mun_ruta_archivo" <?php if (isset($acu_mun_ruta_archivo) && $acu_mun_ruta_archivo != '') { ?>value="<?php echo $acu_mun_ruta_archivo; ?>"<?php } ?> type="text" size="100" readonly="readonly" style="visibility: hidden"/>

</form>