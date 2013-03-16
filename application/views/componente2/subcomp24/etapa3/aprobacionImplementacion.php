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
 
       
        $("#guardar").button();
        
        $("#btn_acuerdo_nuevo").button().click(function(){
            $('#frm').submit();
        });
        
        $("#cancelar").button().click(function() {
            document.location.href='<?php echo base_url(); ?>';
        });
        
        	/*CARGAR MUNICIPIOS*/
        $('#selDepto').change(function(){   
            //$("#guardar").hide();
            $('#mun_id').children().remove();
            $.getJSON('<?php echo base_url('componente2/proyectoPep/cargarMunicipios') ?>?dep_id='+$('#selDepto').val(), 
            function(data) {
                var i=0;
                $.each(data, function(key, val) {
                    if(key=='rows'){
                        $('#mun_id').append('<option value="0">--Seleccione Municipio--</option>');
                        $.each(val, function(id, registro){
                            var text = '<option ';
                            if(registro['cell'][0]=='<?php echo set_value('mun_id'); ?>'){
                                text = text + 'selected="" ';
                            }
                            text = text + 'value="'+registro['cell'][0]+'">'+registro['cell'][1]+'</option>'
                            $('#mun_id').append(text);
                        });                    
                    }
                });
            });              
        });
        $('#mun_id').change(function(){
            window.location.href = '<?php echo current_url(); ?>/' + $('#mun_id').val();
            $('#Mensajito').hide();
            $("#guardar").show();              
        });
                
        /*PARA EL DATEPICKER*/
        $( "#ind_des_fecha" ).datepicker({
            showOn:         'both',
            maxDate:        '+1D',
            buttonImage:    '<?php echo site_url('resource/imagenes/calendario.png'); ?>',
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
        
        /* Calculos */
        $('.txtInput').change(function(){
            cambios();
        });
        
        function formularioHide(){
            $('#listaContainer').show();
            $('#formulario').hide()
        }
        
        function formularioShow(){
            $('#listaContainer').hide();
            $('#formulario').show()
        }
        
        <?php
        //echo '//'.$this->session->keep_flashdata('message');
        if($this->session->flashdata('message')=='Ok'){
            echo "$('#efectivo').dialog('open');";
        }
        if(isset($ind_des_id) && $ind_des_id > 0){
            echo "formularioShow();cambios();";
        }else{
            echo "formularioHide();";
        }
        ?>
    });
</script>

<div id="efectivo" class="mensaje" title="Almacenado">
    <center>
        <p><img src="<?php echo base_url('resource/imagenes/correct.png'); ?>" class="imagenError" />Almacenado Correctamente</p>
    </center>
</div>

<?php echo form_open() ?>

    <h2 class="h2Titulos">Etapa 3: Seguimiento</h2>
    <h2 class="h2Titulos">Aprobacion e Implementacion</h2>
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
        <hr />
        <div id="rpt-border"></div>
        
        <div class="campo">
                <label style="width: 400px;">Conoce el Concejo Municipal, y esta de acuerdo con la aprobacion
                e implementacion de PRFM?</label>
                <span>Si</span><input type="radio" name="t_planTrabajo" value="yes" />
                <span>No</span><input type="radio" name="t_planTrabajo" value="no" checked="checked" />
        </div>
        <div class="campo">
            <label style="width: 400px;">Fecha de emision de acuerdo municipal</label>
            <input <?php if (isset($f_emision)) { ?> value='<?php echo date('d/m/Y', strtotime($f_emision)); ?>'<?php } ?>id="f_presentacion" name="f_presentacion" type="text" size="10" readonly="readonly"/>
        </div>
        <div class="campo">
            <label style="width: 400px;">Fecha de recepcion de acuero municipal</label>
            <input <?php if (isset($f_emision)) { ?> value='<?php echo date('d/m/Y', strtotime($f_emision)); ?>'<?php } ?>id="f_vistobueno" name="f_vistobueno" type="text" size="10" readonly="readonly"/>
        </div>
            
        <div class="campo">
            <label style="width: 400px;">Cargar archivo</label>
            
        </div>
        
        <div class="campoUp">
            <label>Observaciones</label>
            <textarea cols="30" rows="5" wrap="virtual" maxlength="100" style="margin-left: 20px;"></textarea>
        </div>
        
        <div id="actions" style="position: relative;top: 20px">
            <input type="submit" id="guardar" value="Guardar" />
            <input type="button" id="cancelar" value="Cancelar" />
        </div>
    </div>
<?php echo form_close();
$this->load->view('plantilla/footer'); ?>