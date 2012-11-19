<?php

/*
 * Contiene los metodos para acceder a la tabla FACILITADOR
 *
 * @author Ing. Karen Peñate
 */

class Facilitador extends CI_Model {

    private $tabla = 'facilitador';

    public function obtenerFacilitadores($cap_id) {
        $this->db->where('cap_id', $cap_id);
         $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function agregarFacilitador($fac_nombre, $fac_apellido, $fac_email,$cap_id,$fac_telefono) {
        $datos = array(
            'fac_nombre' => $fac_nombre,
            'fac_apellido' => $fac_apellido,
            'fac_email' => $fac_email,
            'fac_telefono'=>$fac_telefono,
            'cap_id' => $cap_id
            
        );
        $this->db->insert($this->tabla, $datos);
    }
    
    public function modificarFacilitador($fac_id,$fac_nombre, $fac_apellido, $fac_email,$fac_telefono) {
        $datos = array(
            'fac_nombre' => $fac_nombre,
            'fac_apellido' => $fac_apellido,
            'fac_email' => $fac_email,
            'fac_telefono'=>$fac_telefono,
        );
        $this->db->where('fac_id', $fac_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function eliminarFacilitador($fac_id) {
        $this->db->where('fac_id', $fac_id);
        $this->db->delete($this->tabla);
    }

}

?>
