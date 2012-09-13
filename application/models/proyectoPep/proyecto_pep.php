<?php

/*
 * Contiene los metodos para acceder a la tabla PROYECTO_PEP
 *
 * @author Ing. Karen Peñate
 */

class Proyecto_pep extends CI_Model {

    private $tabla = 'proyecto_pep';

    public function obtenerProyectoPepPorMun($mun_id) {

        $this->db->where('mun_id', $mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function agregarProyecto($mun_id, $pro_pep_nombre) {
        $datos = array(
            'pro_pep_nombre' => $pro_pep_nombre,
            'mun_id' => $mun_id
        );
        $this->db->insert($this->tabla, $datos);
    }
    
    public function editarProyecto($pro_pep_id, $pro_pep_nombre) {
        $datos = array(
            'pro_pep_nombre' => $pro_pep_nombre
        );
        $this->db->where('pro_pep_id',$pro_pep_id);
        $this->db->update($this->tabla, $datos);
    }

      function obtenerNombreProyectos($pro_pep_id) {
        $this->db->select('proyecto_pep.pro_pep_nombre, 
                           municipio.mun_nombre');
        $this->db->from('proyecto_pep');
        $this->db->join('municipio', ' municipio.mun_id = proyecto_pep.mun_id');
        $this->db->where('proyecto_pep.pro_pep_id ',$pro_pep_id);
        $query = $this->db->get();
        return $query->result();
    }
}

?>
