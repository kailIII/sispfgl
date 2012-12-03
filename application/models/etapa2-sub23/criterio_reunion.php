<?php

/*
 * Contiene los metodos para acceder a la tabla CRITERIO_REUNION
 *
 * @author Ing. Karen Peñate
 */

class Criterio_reunion extends CI_Model {

    private $tabla = 'criterio_reunion';

    public function insertarCriterioReunion($reu_id, $cri_id) {
        $datos = array(
            'reu_id' => $reu_id,
            'cri_id' => $cri_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarCriterioReunion($cri_reu_valor, $reu_id, $cri_id) {
        $datos = array(
            'cri_reu_valor' => $cri_reu_valor
        );
        $this->db->where('reu_id', $reu_id);
        $this->db->where('cri_id', $cri_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerCriterioReunion($reu_id) {
        $this->db->where('reu_id', $reu_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    function obtenerLosCriteriosReunion($reu_id) {
        $this->db->select('criterio.cri_id cri_id, 
                           criterio.cri_nombre cri_nombre,
                           criterio_reunion.cri_reu_valor cri_reu_valor'
        );
        $this->db->from($this->tabla);
        $this->db->join('criterio', 'criterio.cri_id = criterio_reunion.cri_id');
        $this->db->where('criterio_reunion.reu_id', $reu_id);
        $this->db->order_by('cri_id');
        $query = $this->db->get();
        return $query->result();
    }

}

?>
