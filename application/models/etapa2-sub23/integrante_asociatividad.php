<?php

/*
 * Contiene los metodos para acceder a la tabla INTEGRANTE_ASOCIATIVIDAD
 *
 * @author Ing. Karen Peñate
 */

class Integrante_asociatividad extends CI_Model {

    private $tabla = 'integrante_asociatividad';

    public function obtenerIntegranteAsociatividades($aso_id) {
        $this->db->where('aso_id', $aso_id);
         $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function agregarIntegranteAsociatividad($int_aso_nombre,$aso_id) {
        $datos = array(
            'int_aso_nombre' => $int_aso_nombre,
            'aso_id' => $aso_id
        );
        $this->db->insert($this->tabla, $datos);
    }
    
    public function modificarIntegranteAsociatividad($int_aso_id,$int_aso_nombre) {
        $datos = array(
            'int_aso_nombre' => $int_aso_nombre
        );
        $this->db->where('int_aso_id', $int_aso_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function eliminarIntegranteAsociatividad($int_aso_id) {
        $this->db->where('int_aso_id', $int_aso_id);
        $this->db->delete($this->tabla);
    }

}

?>
