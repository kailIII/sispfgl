<?php

/*
 * Contiene los metodos para acceder a la tabla DETMONTO_PROYECCION
 *
 * @author Ing. Karen Peñate
 */

class Detmonto_proyeccion extends CI_Model {

    private $tabla = 'detmonto_proyeccion';

    public function agregarDetMontoProyeccion($mon_pro_id, $dmon_pro_anio, $dmon_pro_correlativo) {
        $datos = array(
            'dmon_pro_anio' => $dmon_pro_anio,
            'dmon_pro_correlativo' => $dmon_pro_correlativo,
            'mon_pro_id' => $mon_pro_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function insertadoAnio($mon_pro_id) {
        $this->db->where('mon_pro_id', $mon_pro_id);
        $this->db->from($this->tabla);
        return $this->db->count_all_results();
    }

    public function editarDetMontoProyeccion($mon_pro_id, $dmon_pro_anio, $dmon_pro_correlativo) {
        $datos = array(
            'dmon_pro_anio' => $dmon_pro_anio
        );
        $this->db->where('mon_pro_id', $mon_pro_id);
        $this->db->where('dmon_pro_correlativo', $dmon_pro_correlativo);
        $this->db->update($this->tabla, $datos);
    }

}

?>
