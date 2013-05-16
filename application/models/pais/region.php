<?php

/*
 * Contiene los metodos para acceder a la tabla REGION
 *
 * @author Ing. Karen Peñate
 */

class Region extends CI_Model {

    private $tabla = 'region';

    public function obtenerRegiones() {
        $this->db->order_by('reg_id', 'asc');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerRegion($reg_id) {
        $this->db->where('reg_id', $reg_id);
        $this->db->order_by('reg_id', 'asc');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerRegionSinConsultora() {
        $query = "SELECT distinct(region.reg_id),  
                         region.reg_nombre
                  FROM 	 municipio,departamento,region
                  WHERE  municipio.dep_id = departamento.dep_id AND
                         departamento.reg_id = region.reg_id AND
                         municipio.cons_id is null
                  ORDER BY region.reg_id";
        $consulta = $this->db->query($query, array());
        return $consulta->result();
    }

    public function obtenerRegionSinGrupo() {
        $query = "SELECT distinct(region.reg_id),  
                         region.reg_nombre
                  FROM 	 municipio,departamento,region
                  WHERE  municipio.dep_id = departamento.dep_id AND
                         departamento.reg_id = region.reg_id AND
                         municipio.grup_id_pep is null
                  ORDER BY region.reg_id";
        $consulta = $this->db->query($query, array());
        return $consulta->result();
    }

}

?>
