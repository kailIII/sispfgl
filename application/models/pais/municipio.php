<?php

/*
 * Contiene los metodos para acceder a la tabla MUNICIPIO
 *
 * @author Ing. Karen Peñate
 */

class Municipio extends CI_Model {
    
    private $tabla = 'municipio';

    public function obtenerMunicipioPorDepartamento($dep_id) {
        $this->db->where('dep_id',$dep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
}

?>
