<?php

/*
 * Contiene los metodos para acceder a la tabla ELABORACION_PROYECTO
 *
 * @author Ing. Karen Peñate
 */

class Elaboracion_proyecto extends CI_Model {

    private $tabla = 'elaboracion_proyecto';

    public function agregarElaboracionProyecto($mun_id) {
        $datos = array(
            'mun_id' => $mun_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function idPorMunicipio($mun_id) {
        $this->db->where('mun_id', $mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function actualizarAcuMun($ela_pro_id, $ela_pro_carta_exp, $ela_pro_fentrega_idem, $ela_pro_fentrega_uep, $ela_pro_carta_confirmacion, $ela_pro_fconformacion, $ela_pro_observacion) {
        $datos = array(
            'ela_pro_carta_exp' => $ela_pro_carta_exp,
            'ela_pro_fentrega_idem' => $ela_pro_fentrega_idem,
            'ela_pro_fentrega_uep' => $ela_pro_fentrega_uep,
            'ela_pro_carta_confirmacion' => $ela_pro_carta_confirmacion,
            'ela_pro_fconformacion' => $ela_pro_fconformacion,
            'ela_pro_observacion' => $ela_pro_observacion
        );
        $this->db->where('ela_pro_id', $ela_pro_id);
        $this->db->update($this->tabla, $datos);
    }

}

?>
