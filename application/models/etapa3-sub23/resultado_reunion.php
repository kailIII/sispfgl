<?php

/*
 * Contiene los metodos para acceder a la tabla RESULTADO_REUNION
 *
 * @author Ing. Karen Peñate
 */

class Resultado_reunion extends CI_Model {

    private $tabla = 'resultado_reunion';

    public function insertarResultadoReunion($reu_id, $res_id) {
        $datos = array(
            'reu_id' => $reu_id,
            'res_id' => $res_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarResultadoReunion($res_reu_valor, $reu_id, $res_id) {
        $datos = array(
            'res_reu_valor' => $res_reu_valor
        );
        $this->db->where('reu_id', $reu_id);
        $this->db->where('res_id', $res_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerResultadoReunion($reu_id) {
        $this->db->where('reu_id', $reu_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    function obtenerLosResultadosReunion($reu_id) {
        $this->db->select('resultado.res_id res_id, 
                           resultado.res_nombre res_nombre,
                           resultado_reunion.res_reu_valor res_reu_valor'
        );
        $this->db->from($this->tabla);
        $this->db->join('resultado', 'resultado.res_id = resultado_reunion.res_id');
        $this->db->where('resultado_reunion.reu_id', $reu_id);
        $this->db->order_by('res_id');
        $query = $this->db->get();
        return $query->result();
    }

}

?>
