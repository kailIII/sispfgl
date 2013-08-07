<?php

/*
 * Contiene los metodos para acceder a la tabla PRIORIZACION
 * que en pantalla es el equipo gestor
 *
 * @author Ing. Karen Peñate
 */

class Priorizacion extends CI_Model {

    private $tabla = 'priorizacion';

    public function contarPriPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function agregarPri($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerIdPri($pro_pep_id) {
        $this->db->select('pri_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function actualizarPri($pri_id, $pri_fecha, $pri_observacion) {
        $datos = array(
            'pri_fecha' => $pri_fecha,
            'pri_observacion' => $pri_observacion
        );
        $this->db->where('pri_id', $pri_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerPri($pri_id) {
        $this->db->where('pri_id', $pri_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function verificarPriorizacion($mun_id) {
        $consulta = "SELECT CASE WHEN B.pri_fecha IS NOT NULL THEN 1 ELSE  0 END resultado
                     FROM proyecto_pep A, $this->tabla B
                     WHERE A.pro_pep_id=B.pro_pep_id AND A.mun_id=?";
        $query = $this->db->query($consulta, array($mun_id));
        return $query->result();
    }

    public function verificarParticipantesPriorizacion($mun_id) {
        $consulta = "SELECT count(D.pri_id) valor 
                     FROM proyecto_pep A, $this->tabla B, participante_priorizacion D
                     WHERE A.pro_pep_id=B.pro_pep_id AND D.pri_id=B.pri_id 
	                     AND D.par_pri_participa IS NOT NULL AND A.mun_id=?";
        $query = $this->db->query($consulta, array($mun_id));
        return $query->result();
    }

}

?>
