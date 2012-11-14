<?php

/*
 * Contiene los metodos para acceder a la tabla FUENTE_SECUNDARIA
 *
 * @author Ing. Karen Peñate
 */

class fuente_secundaria  extends CI_Model {

    private $tabla = 'fuente_secundaria';
    
    public function obtenerFueSec($inv_inf_id) {
        $this->db->where('inv_inf_id', $inv_inf_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    public function agregarFuenteSecundaria($fue_sec_nombre, $fue_sec_fuente , $fue_sec_disponible_en, $fue_sec_anio, $inv_inf_id) {
        $datos = array(
            'fue_sec_nombre ' => $fue_sec_nombre,
            'fue_sec_fuente  ' => $fue_sec_fuente ,
            'fue_sec_disponible_en ' => $fue_sec_disponible_en,
            'fue_sec_anio ' => $fue_sec_anio,
            'inv_inf_id' => $inv_inf_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function editarFuenteSecundaria($fue_sec_id, $fue_sec_nombre, $fue_sec_fuente , $fue_sec_disponible_en, $fue_sec_anio) {
        $datos = array(
            'fue_sec_nombre ' => $fue_sec_nombre,
            'fue_sec_fuente  ' => $fue_sec_fuente ,
            'fue_sec_disponible_en ' => $fue_sec_disponible_en,
            'fue_sec_anio ' => $fue_sec_anio
        );
        $this->db->where('fue_sec_id', $fue_sec_id);
        $this->db->update($this->tabla, $datos);
    }

    public function eliminarFuenteSecundaria($fue_sec_id) {
        $this->db->where('fue_sec_id', $fue_sec_id);
        $this->db->delete($this->tabla);
    }
}

?>
