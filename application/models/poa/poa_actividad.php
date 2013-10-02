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

    public function obtenerActividadesPadresSeg($poa_com_id) {
        $sql = 'SELECT A.poa_act_descripcion, A.poa_act_codigo,A.poa_act_id
                FROM poa_actividad A LEFT JOIN  poa_actividad_detalle B ON  A.poa_act_id = B.poa_act_id 
                                     LEFT JOIN poa_actividad_seg_tri C ON B.poa_act_det_id = C.poa_act_det_id
                WHERE A.poa_act_padre IS NULL AND A.poa_com_id=?
                ORDER BY A.poa_act_codigo';
        $consulta = $this->db->query($sql, array($poa_com_id));
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

    public function obtenerActividades() {
        $this->db->order_by('poa_act_codigo');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
