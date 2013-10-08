<?php

/*
 * Contiene los metodos para acceder a la tabla poa_actividad
 *
 * @author Ing. Karen Peñate
 */

class Poa_actividad extends CI_Model {

    private $tabla = 'poa_actividad';

    public function obtenerActividadesPadres($poa_com_id) {
        $this->db->where('poa_act_padre IS NULL');
        $this->db->where("poa_com_id = $poa_com_id");
        $this->db->order_by('poa_act_codigo');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerSubActividades($padre) {
        $this->db->where('poa_act_padre', $padre);
        $this->db->order_by('poa_act_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerUltimoCodigo() {
        $this->db->where('poa_act_padre IS NULL');
        $this->db->order_by('poa_act_id', 'desc');
        return $this->db->get($this->tabla, '1')->row()->poa_act_codigo;
    }

    public function obtenerUltimoCodigoHijo($poa_actp_padre) {
        $this->db->where("poa_act_padre = $poa_actp_padre");
        $this->db->order_by('poa_act_id', 'desc');
        return $this->db->get($this->tabla, '1')->row()->poa_act_codigo;
    }

    public function obtenerActividadComponente($poa_com_id) {
        $this->db->where("poa_com_id = $poa_com_id");
        $this->db->order_by('poa_act_codigo');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerPorActividadDetalle($poa_com_id,$anio) {
        $sql = "SELECT * 
FROM $this->tabla  A JOIN poa_actividad_detalle  B ON A.poa_act_id=B.poa_act_id 
WHERE poa_com_id = ? AND B.poa_act_det_anio=?
ORDER BY poa_act_codigo";
        $consulta = $this->db->query($sql, array($poa_com_id,$anio));
        return $consulta->result();
    }
    
    public function obtenerPorActividadDetalleTri($poa_com_id,$anio) {
        $sql = "SELECT * 
FROM $this->tabla  A JOIN poa_actividad_detalle  B ON A.poa_act_id=B.poa_act_id 
    JOIN poa_actividad_seg_tri C ON C.poa_act_det_id=B.poa_act_det_id
WHERE poa_com_id = ? AND B.poa_act_det_anio=?
ORDER BY poa_act_codigo";
        $consulta = $this->db->query($sql, array($poa_com_id,$anio));
        return $consulta->result();
    }

}

?>
