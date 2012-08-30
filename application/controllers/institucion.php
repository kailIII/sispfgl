<?php

/**
 * Este controlador manejara los metodos relacionadas a las instituciones que se manejan 
 * dentro del sis-pfgl
 *
 * @author Ing. Karen Peñate
 */
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Institucion extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function cargarInstituciones() {
        //PARA CREAR LA LISTA DESPLEGABLE DE LA INSTITUCION
        $this->load->model('institucion', 'institucion');
        $institucion = $this->institucion->obtenerInstitucion();
        echo "<select name='par_institucion'>";
        echo " <option value='0'> Seleccione</option>";
        foreach ($institucion as $aux)
            echo " <option value='" . $aux->ins_id . "'>" . $aux->ins_nombre . "</option>";
        echo "</select>";

       
    }

}

?>
