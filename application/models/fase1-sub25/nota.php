<?php

/*
 * Contiene los metodos para acceder a la tabla nota
 *
 * @author Ing. Karen Peñate
 */

class Nota extends CI_Model {

    private $tabla = 'nota';

    public function obtenerNotas($rub_id) {
        $this->db->where('rub_id ', $rub_id );
        $this->db->order_by('not_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function agregarNota($not_correlativo, $not_fnota, $not_observacion, $rub_id) {
        $datos = array(
            'not_correlativo' => $not_correlativo,
            'not_fnota' => $not_fnota,
            'not_observacion' => $not_observacion,
            'rub_id ' => $rub_id 
        );
        $this->db->insert($this->tabla, $datos);
    }
    public function actualizarNota($not_id,$not_correlativo, $not_fnota, $not_observacion) {
        $datos = array(
            'not_correlativo' => $not_correlativo,
            'not_fnota' => $not_fnota,
            'not_observacion' => $not_observacion
        );
        $this->db->where('not_id',$not_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function eliminarNota($not_id) {
        $this->db->where('not_id',$not_id);
        $this->db->delete($this->tabla);
    }

}

?>
