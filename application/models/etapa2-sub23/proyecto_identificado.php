<?php

/*
 * Contiene los metodos para acceder a la tabla PROYECTO_IDENTIFICADO
 *
 * @author Ing. Karen Peñate
 */

class Proyecto_identificado extends CI_Model {

    private $tabla = 'proyecto_identificado';

    public function obtenerProIde($pri_id) {
        $this->db->where('pri_id', $pri_id);
        $this->db->order_by('pro_ide_prioridad');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function agregarProIde($pro_ide_nombre, $pro_ide_ubicacion, $pro_ide_ff, $pro_ide_monto, $pro_ide_plazoejec, $pro_ide_pbh, $pro_ide_pbm, $pro_ide_prioridad, $pro_ide_estado, $pro_ide_ruta_archivo,$pri_id) {
        $datos = array(
            'pro_ide_nombre' => $pro_ide_nombre,
            'pro_ide_ubicacion' => $pro_ide_ubicacion,
            'pro_ide_ff' => $pro_ide_ff,
            'pro_ide_monto' => $pro_ide_monto,
            'pro_ide_plazoejec' => $pro_ide_plazoejec,
            'pro_ide_pbh' => $pro_ide_pbh,
            'pro_ide_pbm' => $pro_ide_pbm,
            'pro_ide_prioridad' => $pro_ide_prioridad,
            'pro_ide_estado' => $pro_ide_estado,
            'pro_ide_ruta_archivo' => $pro_ide_ruta_archivo,
            'pri_id' => $pri_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function editarProIde($pro_ide_id, $pro_ide_nombre, $pro_ide_ubicacion, $pro_ide_ff, $pro_ide_monto, $pro_ide_plazoejec, $pro_ide_pbh, $pro_ide_pbm, $pro_ide_prioridad, $pro_ide_estado, $pro_ide_ruta_archivo) {
        $datos = array(
            'pro_ide_nombre' => $pro_ide_nombre,
            'pro_ide_ubicacion' => $pro_ide_ubicacion,
            'pro_ide_ff' => $pro_ide_ff,
            'pro_ide_monto' => $pro_ide_monto,
            'pro_ide_plazoejec' => $pro_ide_plazoejec,
            'pro_ide_pbh' => $pro_ide_pbh,
            'pro_ide_pbm' => $pro_ide_pbm,
            'pro_ide_prioridad' => $pro_ide_prioridad,
            'pro_ide_estado' => $pro_ide_estado,
            'pro_ide_ruta_archivo' => $pro_ide_ruta_archivo
        );
        $this->db->where('pro_ide_id', $pro_ide_id);
        $this->db->update($this->tabla, $datos);
    }

    public function eliminarProIden($pro_ide_id) {
        $this->db->where('pro_ide_id', $pro_ide_id);
        $this->db->delete($this->tabla);
    }

}

?>
