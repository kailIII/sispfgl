<?php

/*
 * Contiene los metodos para acceder a la tabla DEPARTAMENTO
 *
 * @author Ing. Karen Peñate
 */

class Departamento extends CI_Model {

    private $tabla = 'departamento';

    public function obtenerDepartamentosPorRegion($reg_id) {
        $this->db->where('reg_id', $reg_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerIdDepartamentosPorRegion($reg_id) {
        $this->db->select('dep_id');
        $this->db->where('reg_id', $reg_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerDepartamentos() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerIdPorNombre($dep_nombre) {
        $this->db->select('dep_id');
        $this->db->where('dep_nombre', $dep_nombre);
        $consulta = $this->db->get($this->tabla);
        $departamento=$consulta->result();
        return $departamento[0]->dep_id;
    }

}

?>
