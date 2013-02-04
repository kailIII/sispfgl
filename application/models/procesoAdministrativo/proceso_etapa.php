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

    public function obtenerValoresEtapas($mun_id,$pes_pro_id) {
        $query = "SELECT 
                    proceso_etapa.mun_id, 
                    nombrefecha_procesoetapa.nomfec_proeta_valor, 
                    proceso_etapa.pro_eta_observacion, 
                    nombrefecha_procesoetapa.nom_fec_apr_id, 
                    proceso_etapa.pro_eta_id, 
                    proceso_etapa.pes_pro_id
                 FROM 
                    proceso_etapa, 
                    nombrefecha_procesoetapa
                 WHERE 
                    proceso_etapa.pro_eta_id = nombrefecha_procesoetapa.pro_eta_id AND
                    proceso_etapa.mun_id = ? AND 
                    proceso_etapa.pes_pro_id  = ?
                 ORDER BY
                    nombrefecha_procesoetapa.nom_fec_apr_id ASC";
        $consulta = $this->db->query($query, array($mun_id,$pes_pro_id));
        return $consulta->result();
    }

}

?>
