<?php

/*
 * Contiene los metodos para acceder a la tabla poa_componente
 *
 * @author Ing. Karen Peñate
 */

class Poa_componente extends CI_Model {

    private $tabla = 'poa_componente';

    public function obtenerComponentesPadres() {
        $this->db->where('poa_com_padre IS NULL');
        $this->db->order_by('poa_com_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerSubComponentes($padre) {
        $this->db->where('poa_com_padre',$padre);
        $this->db->order_by('poa_com_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function obtenerUltimoCodigo() {
        $this->db->where('poa_com_padre IS NULL');
        $this->db->order_by('poa_com_id', 'desc');
        return $this->db->get($this->tabla, '1')->row()->poa_com_codigo;
    }
    public function obtenerUltimoCodigoHijo($poa_comp_padre) {
        $this->db->where("poa_com_padre = $poa_comp_padre");
        $this->db->order_by('poa_com_id', 'desc');
        return $this->db->get($this->tabla, '1')->row()->poa_com_codigo;
    }
}

?>
