<?php

/*
 * Contiene los metodos para acceder a la tabla PROYECCION_INGRESO
 *
 * @author Ing. Karen Peñate
 */
class Proyeccion_ingreso extends CI_Model {

    private $tabla = 'proyeccion_ingreso';
    
    public function agregarProIng($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }
    
    public function contarProIngPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }
    
    public function obtenerProIng($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
    public function editarProyeccionIngreso($pro_ing_id, $pro_ing_observacion) {
        $datos = array(
            'pro_ing_observacion ' => $pro_ing_observacion
        );
        $this->db->where('pro_ing_id', $pro_ing_id);
        $this->db->update($this->tabla, $datos);
    }
    
}

?>
