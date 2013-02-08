<?php

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

    <h2 class="h2Titulos">Etapa 0: Condiciones Previas</h2>
    <h2 class="h2Titulos">Selección de municipios por el comite Interinstitucional</h2>
    <br/>
    <br/>
    <strong>Fecha de emision de solicitud: </strong> 
    <input <?php if (isset($f_seleccion)) { ?> value='<?php echo date('d/m/Y', strtotime($f_seleccion)); ?>'<?php } ?>id="f_seleccion" name="f_seleccion" type="text" size="10" readonly="readonly"/>
    <br />
    <strong>Fecha de recepcion de solicitud: </strong> 
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

    <center style="position: relative;top: 20px">
        <div>
            <p><input type="submit" id="guardar" value="Guardar" />
                <input type="button" id="cancelar" value="Cancelar" />
            </p>
        </div>
    </center>
    <input id="acu_mun_ruta_archivo" name="acu_mun_ruta_archivo" <?php if (isset($acu_mun_ruta_archivo) && $acu_mun_ruta_archivo != '') { ?>value="<?php echo $acu_mun_ruta_archivo; ?>"<?php } ?> type="text" size="100" readonly="readonly" style="visibility: hidden"/>

</form>

<?php $this->load->view('plantilla/footer'); ?>