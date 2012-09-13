<?php

/*
 * Contiene los metodos para acceder a la tabla REUNION
 *
 * @author Ing. Karen Peñate
 */

class Reunion extends CI_Model {

    private $tabla = 'reunion';

    public function agregarReunion($eta_id, $pro_pep_id, $reu_numero) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id,
            'reu_numero' => $reu_numero,
            'eta_id' => $eta_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function ultimaReunion($pro_pep_id) {
        $consulta = "SELECT COALESCE(max (reu_numero),0) ultima
                   FROM reunion
                   Where pro_pep_id=?";
        $query = $this->db->query($consulta, array($pro_pep_id));
        return $query->result_array();
    }

    public function obtenerReuniones() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerId($eta_id, $pro_pep_id, $reu_numero) {
        $this->db->select('reu_id');
        $this->db->where('eta_id',$eta_id);
        $this->db->where('pro_pep_id',$pro_pep_id);
        $this->db->where('reu_numero',$reu_numero);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function eliminaReunion($reu_id) {
        $consulta = "DELETE FROM " . $this->tabla . " CASCADE WHERE reu_id=?";
        $query = $this->db->query($consulta, array($reu_id));
    }

}

?>
