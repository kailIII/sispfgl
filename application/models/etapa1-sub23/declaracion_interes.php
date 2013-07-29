<?php

/*
 * Contiene los metodos para acceder a la DECLARACION_INTERES
 *
 * @author Ing. Karen Peñate
 */

class Declaracion_interes extends CI_Model {

    private $tabla = 'declaracion_interes';

    public function contarDecIntPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function agregarDecInt($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerIdDecInt($pro_pep_id) {
        $this->db->select('dec_int_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function actualizarDecInt($dec_int_id, $dec_int_fecha, $dec_int_lugar, $dec_int_comentario, $dec_int_ruta_archivo) {
        $datos = array(
            'dec_int_fecha' => $dec_int_fecha,
            'dec_int_lugar' => $dec_int_lugar,
            'dec_int_comentario' => $dec_int_comentario,
            'dec_int_ruta_archivo' => $dec_int_ruta_archivo
        );
        $this->db->where('dec_int_id', $dec_int_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerDecInt($dec_int_id) {
        $this->db->where('dec_int_id', $dec_int_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function verificarDeclaracionInteres($mun_id){
        $consulta = "SELECT CASE WHEN dec_int_fecha IS NOT NULL AND dec_int_lugar IS NOT NULL AND dec_int_ruta_archivo IS NOT NULL then 1 ELSE  0 END resultado
            FROM proyecto_pep A, $this->tabla B
            WHERE A.pro_pep_id=B.pro_pep_id AND A.mun_id=?";
        $query = $this->db->query($consulta, array($mun_id));
        return $query->result();   
    }
}

?>
