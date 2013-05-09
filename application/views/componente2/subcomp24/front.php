<?php

/**
 * 
 * 
 * @author Alexis Beltran
 */

$this->load->view('plantilla/header', $titulo);
$this->load->view('plantilla/menu', $menu);

?>


<?php echo form_open('',array('id'=>'frm')) ?>

    <h1 class="h2Titulos">Componente 2.4</h1>
    <br/>
<?php echo form_close();
$this->load->view('plantilla/footer'); ?>