<?php

/*
 * Contiene los metodos para acceder a la tabla ASOCIATIVIDAD
 *
 * @author Ing. Karen Peñate
 */

class Asociatividad extends CI_Model {

    private $tabla = 'asociatividad';

    public function agregarAsociatividad($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerAsociatividades($pro_pep_id) {
         $this->db->select($this->tabla.'.*,
                           tipo.tip_nombre'
        );
        $this->db->from($this->tabla);
        $this->db->join('tipo', 'tipo.tip_id ='.$this->tabla.'.tip_id');
        $this->db->where($this->tabla.'.pro_pep_id',$pro_pep_id);
        $this->db->order_by('aso_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function obtenerAsociatividadId($aso_id) {
        $this->db->where('aso_id', $aso_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
    public function obtenerId($pro_pep_id) {
        $this->db->select_max('aso_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function actualizarAsociatividad($aso_fecha_constitucion, $aso_nombre, $aso_movil, $aso_apoyo, $aso_unidad_tecnica,$tip_id, $aso_id) {
        $datos = array(
            'aso_fecha_constitucion' => $aso_fecha_constitucion,
            'aso_nombre' => $aso_nombre,
            'aso_unidad_tecnica' => $aso_unidad_tecnica,
            'aso_apoyo' => $aso_apoyo,
            'aso_movil' => $aso_movil,
            'tip_id'=>$tip_id
        );
        $this->db->where('aso_id', $aso_id);
        $this->db->update($this->tabla, $datos);
    }

    public function eliminaAsociatividad($aso_id) {
        $consulta = "DELETE FROM " . $this->tabla . " CASCADE WHERE aso_id=?";
        $this->db->query($consulta, array($aso_id));
    }

}

?>
