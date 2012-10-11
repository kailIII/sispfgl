<?php

/*
 * Contiene los metodos para acceder a la tabla Criterio_ACUERDO
 *
 * @author Ing. Karen Peñate
 */

class Criterio_acuerdo extends CI_Model {

    private $tabla = 'criterio_acuerdo';

    public function insertarCriterioAcuerdo($acu_mun_id, $cri_id) {
        $datos = array(
            'acu_mun_id' => $acu_mun_id,
            'cri_id' => $cri_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarCriterioAcuerdo($con_acu_valor, $acu_mun_id, $con_id) {
        $datos = array(
            'con_acu_valor' => $con_acu_valor
        );
        $this->db->where('acu_mun_id', $acu_mun_id);
        $this->db->where('con_id', $con_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerCriterioAcuerdo($acu_mun_id) {
        $this->db->where('acu_mun_id', $acu_mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    function obtenerLosCriteriosAcuerdo($acu_mun_id) {
        $this->db->select('criterio.cri_id cri_id, 
                           criterio.cri_nombre cri_nombre'
                           );
        $this->db->from($this->tabla);
        $this->db->join('criterio', 'criterio.cri_id = criterio_acuerdo.cri_id');
        $this->db->where('criterio_acuerdo.acu_mun_id', $acu_mun_id);
        $query = $this->db->get();
        return $query->result();
    }

}

?>
