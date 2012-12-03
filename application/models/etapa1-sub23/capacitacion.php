<?php

/*
 * Contiene los metodos para acceder a la tabla CAPACITACION
 *
 * @author Ing. Karen Peñate
 */

class Capacitacion extends CI_Model {

    private $tabla = 'capacitacion';
    
    public function obtenerCapacitaciones($pro_pep_id,$eta_id) {
        $this->db->where('pro_pep_id',$pro_pep_id);
        $this->db->where('eta_id',$eta_id);
        $this->db->order_by("cap_fecha", "asc");
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function agregarCapacitacion($pro_pep_id,$eta_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id,
            'eta_id' => $eta_id
        );
        $this->db->insert($this->tabla, $datos);
    }
    
    public function editarCapacitacion($cap_fecha,$cap_lugar, $cap_id, $cap_area,$cap_observacion,$cap_tema) {
     /* VARIABLES POST */
        
        $datos = array(
            'cap_fecha' => $cap_fecha,
            'cap_lugar' => $cap_lugar,
            'cap_area' => $cap_area,
            'cap_observacion'=>$cap_observacion,
            'cap_tema'=>$cap_tema
        );
        $this->db->where('cap_id', $cap_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function eliminaCapacitacion($cap_id) {
        $consulta = "DELETE FROM " . $this->tabla . " CASCADE WHERE cap_id=?";
        $query = $this->db->query($consulta, array($cap_id));
    }
    
    public function obtenerIdCapacitacion($pro_pep_id,$eta_id) {
        $this->db->Select_max('cap_id');
        $this->db->where('pro_pep_id',$pro_pep_id);
        $this->db->where('eta_id',$eta_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }   
    
    public function obtenerCapacitacion($cap_id) {
        $this->db->where('cap_id',$cap_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
}

?>
