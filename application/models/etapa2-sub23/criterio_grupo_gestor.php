<?php

/*
 * Contiene los metodos para acceder a la tabla CRITERIO_GRUPO_GESTOR
 *
 * @author Ing. Karen Peñate
 */

class Criterio_grupo_gestor extends CI_Model {

    private $tabla = 'criterio_grupo_gestor';

    public function insertarCriterioGruGes($gru_ges_id, $cri_id) {
        $datos = array(
            'gru_ges_id' => $gru_ges_id,
            'cri_id' => $cri_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarCriterioGruGes($cri_gru_ges_valor, $gru_ges_id, $cri_id) {
        $datos = array(
            'cri_gru_ges_valor' => $cri_gru_ges_valor
        );
        $this->db->where('gru_ges_id', $gru_ges_id);
        $this->db->where('cri_id', $cri_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerCriterioGruGes($gru_ges_id) {
        $this->db->where('gru_ges_id', $gru_ges_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    function obtenerLosCriteriosGruGes($gru_ges_id) {
        $this->db->select('criterio.cri_id cri_id, 
                           criterio.cri_nombre cri_nombre,
                           criterio_grupo_gestor.cri_gru_ges_valor cri_gru_ges_valor'
        );
        $this->db->from($this->tabla);
        $this->db->join('criterio', 'criterio.cri_id = criterio_grupo_gestor.cri_id');
        $this->db->where('criterio_grupo_gestor.gru_ges_id', $gru_ges_id);
        $this->db->order_by('cri_id');
        $query = $this->db->get();
        return $query->result();
    }

}

?>
