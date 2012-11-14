<?php

/*
 * Contiene los metodos para acceder a la tabla FUENTE_PRIMARIA
 *
 * @author Ing. Karen Peñate
 */

class fuente_primaria extends CI_Model {

    private $tabla = 'fuente_primaria';

    public function obtenerFuePri($inv_inf_id) {
        $this->db->where('inv_inf_id', $inv_inf_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function agregarFuentePrimaria($fue_pri_nombre, $fue_pri_institucion, $fue_pri_cargo, $fue_pri_telefono, $fue_pri_tipo_info, $inv_inf_id) {
        $datos = array(
            'fue_pri_nombre ' => $fue_pri_nombre,
            'fue_pri_institucion ' => $fue_pri_institucion,
            'fue_pri_cargo ' => $fue_pri_cargo,
            'fue_pri_telefono ' => $fue_pri_telefono,
            'fue_pri_tipo_info ' => $fue_pri_tipo_info,
            'inv_inf_id' => $inv_inf_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function editarFuentePrimaria($fue_pri_id, $fue_pri_nombre, $fue_pri_institucion, $fue_pri_cargo, $fue_pri_telefono, $fue_pri_tipo_info) {
        $datos = array(
            'fue_pri_nombre ' => $fue_pri_nombre,
            'fue_pri_institucion ' => $fue_pri_institucion,
            'fue_pri_cargo ' => $fue_pri_cargo,
            'fue_pri_telefono ' => $fue_pri_telefono,
            'fue_pri_tipo_info ' => $fue_pri_tipo_info
        );
        $this->db->where('fue_pri_id', $fue_pri_id);
        $this->db->update($this->tabla, $datos);
    }

    public function eliminarFuentePrimaria($fue_pri_id) {
        $this->db->where('fue_pri_id', $fue_pri_id);
        $this->db->delete($this->tabla);
    }

}

?>
