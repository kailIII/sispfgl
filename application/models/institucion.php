<?php

/*
 * Contiene los metodos para acceder a la tabla INSTITUCION
 *
 * @author Ing. Karen Peñate
 */

class Institucion extends CI_Model {

    private $tabla = 'institucion';
    public function obtenerInstitucion() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
