<script type="text/javascript">        
    $(document).ready(function(){
        /*VARIABLES*/
        var myGrid = $('#gestionSolicitud');        
        myGrid.jqGrid({ 
            url: '<?php echo base_url('componente2/comp23_E0/cargarSolicitudes2') . "/0" ?>',
            editurl:'<?php echo base_url('componente2/comp23_E0/borrarSolicitud') ?>',
            datatype:'json',
            altRows:true,
            colNames:['Id','Nombre del solicitante', 'Fecha Solicitud','Fecha Verificacion', 'Seleccionado',''],
            colModel:[
                { name:'id', index: 'id', width:20,editable:false,editoptions:{size:15}  },
                { name:'nombre_solicitante', index: 'nombre_solicitante',width:300,editable:true,editoptions:{size:50}},
                { name:'fecha_solicitud', index: 'fecha_solicitud',align:'center' ,width:150,editable:true,editoptions:{size:25}  },
                { name:'sel_com_fverificacion', index: 'sel_com_fverificacion',align:'center' ,width:150,editable:true,editoptions:{size:25}},
                {name:'sel_com_seleccionado',index:'sel_com_seleccionado',width:80,align:'center',editable:true,edittype:"checkbox",editoptions:{value:"Si:No"}},
                {name:'act',index:'act', width:120,sortable:false}],  
            rowNum:10,
            rowList:[10,20,30],
            multiselect: false,
            loadonce:true,
            gridComplete: function(){
                var ids = jQuery("#gestionSolicitud").jqGrid('getDataIDs');
                for(var i=0;i < ids.length;i++){ 
                    var cl = ids[i];
                    if(cl!=0){
                        ce = "<input style='height:22px;width:60px;' type='submit' value='Editar' onclick=\" $('#idfila').attr('value', '"+cl+"'); this.form.action='<?php echo base_url('componente2/comp23_E0/modificarSolicitudAsistencia') ?>' \" />";
                        myGrid.jqGrid('setRowData',ids[i],{act:ce}); 
                    }} 
            },
            pager: jQuery('#pagergestionSolicitud'),
            viewrecords: true,          
            caption: 'Municipios con solicitudes realizadas',
            height: "100%"
        });
        
        myGrid.jqGrid('navGrid','#pagergestionSolicitud',
        {edit:false,add:false,del:false,
            beforeRefresh: function() {myGrid.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');}},
        {},
        {},
        {},
        {multipleSearch:true, 
            multipleGroup:true}
    ).hideCol('id');
 
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
            $('#gestionSolicitud').setGridParam({
                url:'<?php echo base_url('componente2/comp23_E0/cargarSolicitudes2') . "/" ?>'+$('#selMun').val(),
                datatype:'json'
            }).trigger("reloadGrid"); 
            $('#idfila').val($('#selMun').val());
        });
        
 
       
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E0/guardarSolicitud'); ?>';
        });
        
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
       
        function despuesAgregarEditar2() {
            tabla2.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
            return[true,'']; 
        }
 
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
    <!--
    <strong>Fecha de selección de municipios: </strong> 
    <input <?php if (isset($f_seleccion)) { ?> value='<?php echo date('d/m/Y', strtotime($f_seleccion)); ?>'<?php } ?>id="f_seleccion" name="f_seleccion" type="text" size="10" readonly="readonly"/>
    -->
    <br/>
    <br/>
    <table align="center">
        <tr>
        <td class="textD"><strong>Departamento:</strong></td>
        <td>
            <select id='selDepto' name="selDepto">
                <option value='0'>--Seleccione Departamento--</option>
                <?php foreach ($departamentos as $depar) { ?>
                    <option value='<?php echo $depar->dep_id; ?>'><?php echo $depar->dep_nombre; ?></option>
                <?php } ?>
            </select>
        </td>
        </tr>
        <tr>
        <td class="textD"><strong>Municipio:</strong></td>
        <td >
            <select id='selMun' name="selMun">
                <option value='0'>--Seleccione Municipio--</option>
            </select>
        </td>    
        </tr>
    </table>
    <br/>
    <br/>
    <table>
        <tr>
        <td style="width: 100px"></td>
        <td>
            <table id="gestionSolicitud"></table>  
            <div id="pagergestionSolicitud"></div> 
        </td>
        </tr>
    </table>

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
                <td><input class="letraazul" type="text" id="vinieta" readonly="readonly" value="Subir Acta Aprobación" size="30" style="border: none"/></td>
                </tr>
                <tr>
                <td><a <?php if (isset($acu_mun_ruta_archivo) && $acu_mun_ruta_archivo != '') { ?> href="<?php echo base_url() . $acu_mun_ruta_archivo; ?>"<?php } ?>  id="btn_descargar"><img src='<?php echo base_url('resource/imagenes/download.png'); ?>'/> </a></td>
                <td><input class="letraazul" type="text" id="vinietaD" readonly="readonly" <?php if (isset($acu_mun_ruta_archivo) && $acu_mun_ruta_archivo != '') { ?>value="Descargar Acta"<?php } else { ?> value="No Hay Acta Por Descargar" <?php } ?>size="35" style="border: none"/></td>
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

