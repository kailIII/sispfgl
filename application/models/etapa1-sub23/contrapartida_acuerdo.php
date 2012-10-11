<?php

/*
 * Contiene los metodos para acceder a la tabla CONTRAPARTIDA_ACUERDO
 *
 * @author Ing. Karen Peñate
 */

class Contrapartida_acuerdo extends CI_Model {

    private $tabla = 'contrapartida_acuerdo';

    public function insertarContrapartidaAcuerdo($acu_mun_id, $con_id) {
        $datos = array(
            'acu_mun_id' => $acu_mun_id,
            'con_id' => $con_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarContrapartidaAcuerdo($con_acu_valor, $acu_mun_id, $con_id) {
        $datos = array(
            'con_acu_valor' => $con_acu_valor
        );
        $this->db->where('acu_mun_id', $acu_mun_id);
        $this->db->where('con_id', $con_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerContrapartidaAcuerdo($acu_mun_id) {
        $this->db->where('acu_mun_id', $acu_mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    function obtenerLasContrapartidoAcuerdo($acu_mun_id) {
        $this->db->select('contrapartida.con_id con_id, 
                           contrapartida.con_nombre con_nombre'
                           );
        $this->db->from($this->tabla);
        $this->db->join('contrapartida', 'contrapartida.con_id = contrapartida_acuerdo.con_id');
        $this->db->where('contrapartida_acuerdo.acu_mun_id', $acu_mun_id);
        $query = $this->db->get();
        return $query->result();
    }

}

?>
