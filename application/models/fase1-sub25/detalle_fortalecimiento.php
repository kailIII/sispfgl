<?php

/*
 * Contiene los metodos para acceder a la tabla detalle_fortalecimiento
 *
 * @author Ing. Karen Peñate
 */

class detalle_fortalecimiento extends CI_Model {

    private $tabla = 'detalle_fortalecimiento';

    public function insertarDetalleFortalecimiento($rub_id, $cat_for_id) {
        $datos = array(
            'rub_id' => $rub_id,
            'cat_for_id' => $cat_for_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarDetalleFortalecimiento($for_monto, $rub_id, $cat_for_id) {
        $datos = array(
            'for_monto' => $for_monto
        );
        $this->db->where('rub_id', $rub_id);
        $this->db->where('cat_for_id', $cat_for_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerDetalleFortalecimiento($rub_id) {
        $this->db->where('rub_id', $rub_id);
        $this->db->order_by('rub_ele_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerLosDetallesFortalecimiento($rub_id) {
        $this->db->select("categoria_fortalecimiento.cat_for_id cat_for_id,
                           $this->tabla.for_monto for_monto"
        );
        $this->db->from($this->tabla);
        $this->db->join('categoria_fortalecimiento', "categoria_fortalecimiento.cat_for_id = $this->tabla.cat_for_id");
        $this->db->where("$this->tabla.rub_id", $rub_id);
        $this->db->order_by('cat_for_id');
        $query = $this->db->get();
        return $query->result();
    }

}

?>
