<?php

/**
 * 
 * 
 * @author Alexis Beltran
 */

$this->load->view('plantilla/header', $titulo);
$this->load->view('plantilla/menu', $menu);

?>
<script type="text/javascript">        
    $(document).ready(function(){
        /*VARIABLES*/
 
       
        $("#guardar").button().click(function() {
            this.form.action='<?php echo base_url('componente2/comp23_E0/guardarSolicitud'); ?>';
        });
        
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        	/*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){   
            $("#guardar").hide();
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
            $('#Mensajito').hide();
            $("#guardar").hide();
            $.getJSON('<?php echo base_url('componente2/comp23_E1/verificarProyectoPep') . "/" ?>'+$('#selMun').val(), 
            function(data) {
                $('#Mensajito').hide();
                $.each(data, function(key, val) {
                    if(key=="records"){
                        if(val=="0"){
                            $('#Mensajito').show();
                            $("#guardar").hide();
                            $('#Mensajito').val("Este municipio no posee ningún Proyecto PEP asignado");
                        }else{
                            $('#Mensajito').hide();
                            $("#guardar").show();
                        }
                    }
                });
            });              
        });
                
        /*PARA EL DATEPICKER*/
        $( "#f_conformacion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#f_acuerdo" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        $( "#f_recepcion" ).datepicker({
            showOn: 'both',
            buttonImage: '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
            buttonImageOnly: true, 
            dateFormat: 'dd/mm/yy'
        });
        /*FIN DEL DATEPICKER*/
        
        /*GRID*/
        var tabla=$("#miembros");
        tabla.jqGrid({
            url:'<?php echo base_url('componente2/procesoAdministrativo/cargarConsultoraInteres') . '/' . $pro_id ?>',
            editurl:'<?php echo base_url('componente2/procesoAdministrativo/gestionarConsultoresInteres') . '/' . $pro_id ?>',
            datatype:'json',
            altRows:true,
            height: "100%",
            hidegrid: false,
            colNames:['id','Nombres','Apellidos','Sexo','Edad','Nivel de Escolaridad','Telefono'],
            colModel:[
                {name:'con_int_id',index:'con_int_id', width:40,editable:false,editoptions:{size:15} },
                {name:'con_int_id',index:'con_int_id', width:40,editable:false,editoptions:{size:15} },
                {name:'con_int_id',index:'con_int_id', width:40,editable:false,editoptions:{size:15} },
                {name:'con_int_id',index:'con_int_id', width:40,editable:false,editoptions:{size:15} },
                {name:'con_int_nombre',index:'con_int_nombre',editable:true,
                    edittype:"select",width:650,
                    editoptions:{ dataUrl:'<?php echo base_url('componente2/procesoAdministrativo/cargarConsultoras'); ?>'}, 
                    formoptions:{ label: "Nombre:",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaInstitucion}
                },
                {name:'con_int_tipo',index:'con_int_tipo',editable:true,edittype:"select",width:60,
                    editoptions:{ value: '0:Seleccione;Empresa:Empresa;ONG:ONG' }, 
                    formoptions:{ label: "Tipo:",elmprefix:"(*)"},
                    editrules:{custom:true, custom_func:validaSexo}
                }
            ],
            multiselect: false,
            caption: "Consultoras que han manifestado interés",
            rowNum:10,
            rowList:[10,20,30],
            loadonce:true,
            pager: jQuery('#pagerMiembros'),
            viewrecords: true
        }).jqGrid('navGrid','#pagerMiembros',
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
        /**/
        
        /* Calculos */
        
               
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


<?php echo form_open() ?>

    <h2 class="h2Titulos">Etapa 0: Condiciones Previas</h2>
    <h2 class="h2Titulos">Indicadores de Desempeno Administrativo y Financiero Municipal</h2>
    <br/>
    <div id="rpt_frm_bdy">
        <div class="campo">
            <label>Departamento</label>
            <select id='selDepto'>
                <option value='0'>--Seleccione--</option>
                <?php foreach ($departamentos as $depto) { ?>
                    <option value='<?php echo $depto->dep_id; ?>'><?php echo $depto->dep_nombre; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="campo">
            <label>Municipio</label>
            <select id='selMun' name='selMun'>
                <option value='0'>--Seleccione--</option>
            </select>
        </div>
        <div class="campo">
            <label>Fecha:</label>
            <input <?php if (isset($f_conformacion)) { ?> value='<?php echo date('d/m/Y', strtotime($f_conformacion)); ?>'<?php } ?>id="f_conformacion" name="f_conformacion" type="text" size="10" readonly="readonly"/>
        </div>
        <hr />
        <div id="rpt-border"></div>
        
        <div class="bigCampo">
            <label>Indice de Capacidad de Pago</label>
            <div class="comment">Mide la disponibilidad de recursos financieros
             con que cuenta la municipalidad para hacer frente al pago de la deuda 
             de corto plazo y se considera escesivo cuando el indicador resultante
             es un valor negativo, Art. 3 de la Ley de Endeudamiento Municipal:
             No podra superar el limite maximo de 0.6 veces el ahorro operacional
             obtenido por la municipalidad en el ejercicio fiscal anterior.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Indice de Capacidad de Pago</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Pasivo Circulante</span>
                            <input class="txtInput" id="t_pasCir" name="t_pasCir" />
                            <span>+ ( Deuda a Corto Plazo</span>
                            <input class="txtInput" id="t_deuCorPla" name="t_deuCorPla" />
                            <span>+ Intereses</span>
                            <input class="txtInput" id="t_interes" name="t_interes" />
                            <span>)</span>
                        </div>
                        <div></div>
                        <hr />
                        <div class="row">
                            <span>Ahorro Operacional</span>
                            <input class="txtInput" id="t_ahoOper" name="t_ahoOper" />
                            <span>+ Intereses de la deuda</span>
                            <input class="txtInput" id="t_intDueda" name="t_intDueda" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Indice Capacidad de Pago</div>
                <input id="t_icp" name="t_icp" type="text" size="100" />
             </div>
        </div>
        
        <div class="bigCampo">
            <label>Limite de Endeudamiento Municipal</label>
            <div class="comment">Mide el valor de dinero comprometido con relacion a cada dolar disponible,
            el resultado no debera ser mayor que 1.70, (Art. 5 de la Ley de Endeudamiento Publico Municipal)
            y se concidera aceptable, si cada vez que se determine el indicador, este resulta ser un valor
            decreciente y menor que 1.70.</div>
             <div class="bdy">
                <div class="frm">
                    <div class="hdr">Limite de Endeudamiento Municipal</div>
                    <div class="igual">=</div>
                    <div class="col">
                        <div class="row">
                            <span>Deuda Municipal Total</span>
                            <input class="txtInput" id="t_deuMunTotal" name="t_deuMunTotal" />
                        </div>
                        <hr />
                        <div class="row">
                            <span>Ingresos Operacionales Percibidos</span>
                            <input class="txtInput" id="t_ingOpePer" name="t_ingOpePer" />
                        </div>
                    </div>
                </div>
             </div>
             <div class="result centrar">
                <div class="hdr">Limite de Endeudamiento Municipal</div>
                <input id="t_iop" name="t_iop" type="text" size="100" />
             </div>
        </div>
        
        <div style="width: 100%;">
            <div style="width: 50%;">
                <div class="campo">
                    <label>Observaciones</label>
                    <textarea cols="30" rows="5" wrap="virtual" maxlength="100"></textarea>
                </div>
            </div>
            <div style="width: 50%;">
                
            </div>
        </div>
        
        <div id="actions" style="position: relative;top: 20px">
            <input type="submit" id="guardar" value="Guardar" />
            <input type="button" id="cancelar" value="Cancelar" />
        </div>
    </div>
<?php echo form_close();
$this->load->view('plantilla/footer'); ?>