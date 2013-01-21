<?php

/*
 * Contiene los metodos para acceder a la tabla ACUERDO_MUNICIPAL
 *
 * @author Ing. Karen Peñate
 */

class Criterio_e0 extends CI_Model {

    private $tabla = 'criterio_e0';
    
    
    public function obtenerCriterios() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
  
    
    public function agregarCriterio($criterio_nombre) {
        $datos = array('criterio_nombre'=>$criterio_nombre);
        $this->db->insert($this->tabla, $datos);
    }
    
      public function editarCriterio($criterio_id, $criterio_nombre) {
        $datos = array(
            'criterio_nombre' => $criterio_nombre
             );
        $this->db->where('criterio_id', $criterio_id);
        $this->db->update($this->tabla, $datos);
    }
 
    public function eliminarCriterio($criterio_id) {
        $this->db->where('criterio_id', $criterio_id);
        $this->db->delete($this->tabla);
    }
    
    /*/*
     * 
     * 
     */
    
        
    
    
    /*para ver si me sirven*/
    public function contarAcuMunPorPep($pro_pep_id,$eta_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->where('eta_id', $eta_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    

    public function obtenerIdAcuMun($pro_pep_id,$eta_id) {
        $this->db->select('acu_mun_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->where('eta_id', $eta_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

     public function obtenerAcuMun($acu_mun_id) {
        $this->db->where('acu_mun_id', $acu_mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
}

?>
