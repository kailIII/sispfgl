<?php

/*
 * Contiene los metodos para acceder a la tabla detalle_obra
 *
 * @author Ing. Karen Peñate
 */

class detalle_obra extends CI_Model {

    private $tabla = 'detalle_obra';

    public function insertarDetalleObra($rub_id, $obr_id) {
        $datos = array(
            'rub_id' => $rub_id,
            'obr_id' => $obr_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarDetalleObra($det_obr_monto, $rub_id, $obr_id) {
        $datos = array(
            'det_obr_monto' => $det_obr_monto
        );
        $this->db->where('rub_id', $rub_id);
        $this->db->where('obr_id', $obr_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerDetalleObra($rub_id) {
        $this->db->where('rub_id', $rub_id);
        $this->db->order_by('rub_ele_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerLosDetallesObra($rub_id) {
        $this->db->select("obra.obr_id obr_id,
                           $this->tabla.det_obr_monto det_obr_monto"
        );
        $this->db->from($this->tabla);
        $this->db->join('obra', "obra.obr_id = $this->tabla.obr_id");
        $this->db->where("$this->tabla.rub_id", $rub_id);
        $this->db->order_by('det_obr_id');
        $query = $this->db->get();
        return $query->result();
    }

}

?>
