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
    
    public function obtenerActividadesPadresSeg($poa_com_id,$anio) {
        $this->db->join('poa_actividad_detalle',"poa_actividad_detalle.poa_act_id=$this->tabla.poa_act_id");
        $this->db->where('poa_act_padre IS NULL');
        $this->db->where("poa_com_id = $poa_com_id");
        $this->db->where("poa_act_det_anio = $anio");
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

    public function obtenerPorActividadDetalle($poa_com_id, $anio, $ordenamiento) {
        $sql = "SELECT * 
FROM $this->tabla  A JOIN poa_actividad_detalle  B ON A.poa_act_id=B.poa_act_id 
WHERE poa_com_id = ? AND B.poa_act_det_anio=?
ORDER BY A.$ordenamiento";
        $consulta = $this->db->query($sql, array($poa_com_id, $anio));
        return $consulta->result();
    }

    public function obtenerPorActividadDetalleTri($poa_com_id, $anio, $trimestre) {
        $sql = "SELECT * 
FROM $this->tabla  A JOIN poa_actividad_detalle  B ON A.poa_act_id=B.poa_act_id 
    JOIN poa_actividad_seg_tri C ON C.poa_act_det_id=B.poa_act_det_id
WHERE poa_com_id = ? AND B.poa_act_det_anio=? AND C.poa_act_seg_tri_mes=?
ORDER BY poa_act_codigo";
        $consulta = $this->db->query($sql, array($poa_com_id, $anio, $trimestre));
        return $consulta->result();
    }

    public function obtenerCuantasSubActividades($padre) {
        $this->db->from($this->tabla);
        $this->db->where('poa_act_padre', $padre);
        $this->db->group_by('poa_act_id');
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

}

?>
