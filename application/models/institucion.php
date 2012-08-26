<?php

/*
 * Contiene los metodos para acceder a la tabla INSTITUCION
 *
 * @author Ing. Karen Peñate
 */

class Institucion extends CI_Model {

    public function obtenerInstitucion() {
        $consulta = $this->db->get('institucion');
        return $consulta->result();
    }

}

?>
