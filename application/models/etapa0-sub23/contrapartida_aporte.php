<?php

/*
 * Contiene los metodos para acceder a la tabla CONTRAPARTIDA_APORTE
 *
 * @author Ing. Karen Peñate
 */

class Contrapartida_aporte extends CI_Model {

    private $tabla = 'contrapartida_aporte';

    public function insertarContrapartidaAporte($apo_mun_id, $con_id) {
        $datos = array(
            'apo_mun_id' => $apo_mun_id,
            'con_id' => $con_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarContrapartidaAporte($con_apo_valor, $apo_mun_id, $con_id,$especifique) {
        $datos = array(
            'con_apo_valor' => $con_apo_valor,
            'con_apo_especifique' => $especifique
        );
        $this->db->where('apo_mun_id', $apo_mun_id);
        $this->db->where('con_id', $con_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerContrapartidaAporte($apo_mun_id) {
        $this->db->where('apo_mun_id', $apo_mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerLasContrapartidoAporte($apo_mun_id) {
        $this->db->select('contrapartida.con_id con_id, 
                           contrapartida.con_nombre con_nombre,
                           contrapartida_aporte.con_apo_valor con_apo_valor,
                           contrapartida_aporte.con_apo_especifique con_apo_especifique'
                           );
        $this->db->from($this->tabla);
        $this->db->join('contrapartida', 'contrapartida.con_id = contrapartida_aporte.con_id');
        $this->db->where('contrapartida_aporte.apo_mun_id', $apo_mun_id);
        $this->db->order_by('con_id');
        $query = $this->db->get();
        return $query->result();
    }

}

?>
