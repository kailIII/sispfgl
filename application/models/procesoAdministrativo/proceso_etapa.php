<?php

/*
 * Contiene los metodos para acceder a la tabla proceso_etapa
 *
 * @author Ing. Karen Peñate
 */

class Proceso_etapa extends CI_Model {

    private $tabla = 'proceso_etapa';

    public function insertarProcesoEtapa($mun_id, $pes_pro_id) {
        $datos = array(
            'mun_id' => $mun_id,
            'pes_pro_id' => $pes_pro_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarProcesoEtapa($pro_eta_observacion, $pro_eta_id) {
        $datos = array(
            'pro_eta_observacion' => $pro_eta_observacion
        );
        $this->db->where('pro_eta_id', $pro_eta_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerProcesoEtapa($mun_id) {
        $this->db->where('mun_id', $mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerMaxId() {
        $this->db->select_max('pro_eta_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    function obtenerLosProcesosEtapa($mun_id) {
        $this->db->select('pestania_proceso.pes_pro_nombre pes_pro_nombre, 
                           proceso_etapa.pro_eta_id pro_eta_id,
                           proceso_etapa.pro_eta_observacion pro_eta_observacion'
        );
        $this->db->from($this->tabla);
        $this->db->join('pestania_proceso', 'pestania_proceso.pes_pro_id = proceso_etapa.pes_pro_id');
        $this->db->where('proceso_etapa.mun_id', $mun_id);
        $this->db->order_by('pro_eta_id');
        $query = $this->db->get();
        return $query->result();
    }

}

?>
