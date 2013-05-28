<?php

/*
 * Contiene los metodos para acceder a la tabla gestion_seguimiento
 *
 * @author Ing. Karen Peñate
 */

class Gestion_seguimiento extends CI_Model {

    private $tabla = 'gestion_seguimiento';

    public function agregarGesSeg($mun_id) {
        $datos = array(
            'mun_id' => $mun_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function contarGesSegPorMuni($mun_id) {
        $this->db->where('mun_id', $mun_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function obtenerGesSeg($mun_id) {
        $this->db->where('mun_id', $mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function editarGesSeg($ges_seg_id, $ges_seg_op1, $ges_seg_op2, $ges_seg_op3, $ges_seg_op4, $ges_seg_op5, $ges_seg_op6, $ges_seg_op7, $ges_seg_fentrega, $ges_seg_fvobo, $ges_seg_fconcejo, $ges_seg_concejo_mun, $ges_seg_isdem, $ges_seg_uep, $ges_seg_acu_ruta_archivo, $ges_seg_act_ruta_archivo, $ges_seg_poa_ruta_archivo, $ges_seg_pip_ruta_archivo, $ges_seg_doc_ruta_archivo, $ges_seg_observacion
    ) {
        $datos = array(
            'ges_seg_op1' => $ges_seg_op1,
            'ges_seg_op2' => $ges_seg_op2,
            'ges_seg_op3' => $ges_seg_op3,
            'ges_seg_op4' => $ges_seg_op4,
            'ges_seg_op5' => $ges_seg_op5,
            'ges_seg_op6' => $ges_seg_op6,
            'ges_seg_op7' => $ges_seg_op7,
            'ges_seg_fentrega' => $ges_seg_fentrega,
            'ges_seg_fvobo' => $ges_seg_fvobo,
            'ges_seg_fconcejo' => $ges_seg_fconcejo,
            'ges_seg_concejo_mun' => $ges_seg_concejo_mun,
            'ges_seg_isdem' => $ges_seg_isdem,
            'ges_seg_uep' => $ges_seg_uep,
            'ges_seg_acu_ruta_archivo' => $ges_seg_acu_ruta_archivo,
            'ges_seg_act_ruta_archivo' => $ges_seg_act_ruta_archivo,
            'ges_seg_poa_ruta_archivo' => $ges_seg_poa_ruta_archivo,
            'ges_seg_pip_ruta_archivo' => $ges_seg_pip_ruta_archivo,
            'ges_seg_doc_ruta_archivo' => $ges_seg_doc_ruta_archivo,
            'ges_seg_observacion' => $ges_seg_observacion
        );
        $this->db->where('ges_seg_id', $ges_seg_id);
        $this->db->update($this->tabla, $datos);
    }

}

?>
