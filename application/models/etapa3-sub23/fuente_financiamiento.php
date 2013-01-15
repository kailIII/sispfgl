<?php

/*
 * Contiene los metodos para acceder a la tabla FUENTE_FINANCIAMIENTO
 *
 * @author Ing. Karen Peñate
 */

class Fuente_financiamiento extends CI_Model {

    private $tabla = 'fuente_financiamiento';

    public function obtenerFueFin($por_pro_id) {
        $this->db->where('por_pro_id', $por_pro_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function agregarFuenteFinanciamiento($fue_fin_nombre, $fue_fin_monto, $fue_fin_descripcion, $por_pro_id) {
        $datos = array(
            'fue_fin_nombre ' => $fue_fin_nombre,
            'fue_fin_monto ' => $fue_fin_monto,
            'fue_fin_descripcion ' => $fue_fin_descripcion,
            'por_pro_id ' => $por_pro_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function editarFuenteFinanciamiento($fue_fin_id, $fue_fin_nombre, $fue_fin_monto, $fue_fin_descripcion) {
        $datos = array(
            'fue_fin_nombre ' => $fue_fin_nombre,
            'fue_fin_monto ' => $fue_fin_monto,
            'fue_fin_descripcion ' => $fue_fin_descripcion
        );
        $this->db->where('fue_fin_id', $fue_fin_id);
        $this->db->update($this->tabla, $datos);
    }

    public function eliminarFuenteFinanciamiento($fue_fin_id) {
        $this->db->where('fue_fin_id', $fue_fin_id);
        $this->db->delete($this->tabla);
    }

}

?>
