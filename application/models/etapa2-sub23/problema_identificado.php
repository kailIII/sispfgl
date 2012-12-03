<?php

/*
 * Contiene los metodos para acceder a la tabla PROBLEMA_IDENTIFICADO
 *
 * @author Ing. Karen Peñate
 */

class Problema_identificado extends CI_Model {

    private $tabla = 'problema_identificado';

    public function obtenerProIdePorReunion($valor, $campo) {
        $this->db->where($campo,$valor);
        $this->db->order_by('are_dim_id', 'pro_ide_tema');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function insertarProIde($valor, $campo, $are_dim_id, $pro_ide_tema, $pro_ide_problema, $pro_ide_prioridad) {
        $datos = array(
            $campo => $valor,
            'are_dim_id' => $are_dim_id,
            'pro_ide_tema' => $pro_ide_tema,
            'pro_ide_problema' => $pro_ide_problema,
            'pro_ide_prioridad' => $pro_ide_prioridad
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarProIde($are_dim_id, $pro_ide_tema, $pro_ide_problema, $pro_ide_prioridad, $pro_ide_id) {
        $datos = array(
            'are_dim_id' => $are_dim_id,
            'pro_ide_tema' => $pro_ide_tema,
            'pro_ide_problema' => $pro_ide_problema,
            'pro_ide_prioridad' => $pro_ide_prioridad
        );
        $this->db->where('pro_ide_id', $pro_ide_id);
        $this->db->update($this->tabla, $datos);
    }

    public function eliminarProIde($pro_ide_id) {
        $this->db->where('pro_ide_id', $pro_ide_id);
        $this->db->delete($this->tabla, $datos);
    }

}

?>
