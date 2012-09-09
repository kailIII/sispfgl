<?php

/*
 * Contiene los metodos para acceder a la tabla PROYECTO_PEP
 *
 * @author Ing. Karen Peñate
 */

class Proyecto_pep extends CI_Model {

    private $tabla = 'proyecto_pep';

    public function obtenerProyectoPepPorDepto($dep_id) {
        
        $this->db->select('*');
        $this->db->from($this->tabla);
        $this->db->join('municipio', 'municipio.mun_id ='.$this->tabla.'.mun_id');
        $this->db->where('municipio.dep_id',$dep_id);
        $consulta = $this->db->get();
        return $consulta->result();
    }

}

?>
