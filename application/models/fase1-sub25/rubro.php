<?php

/*
 * Contiene los metodos para acceder a la tabla rubro
 *
 * @author Ing. Karen Peñate
 */

class Rubro extends CI_Model {

    private $tabla = 'rubro';

  public function agregarRubro($mun_id) {
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

    public function actualizarRubro($rub_id, $rub_observacion_general, $rub_emite_nota,  $rub_observacion) {
        $datos = array(
            'rub_observacion_general' => $rub_observacion_general,
            'rub_emite_nota' => $rub_emite_nota,
            'rub_observacion' => $rub_observacion
        );
        $this->db->where('rub_id', $rub_id);
        $this->db->update($this->tabla, $datos);
    }
    
     public function actualizarRubro2($rub_id, $rub_nombre_proyecto,  $rub_observacion) {
        $datos = array(
            'rub_nombre_proyecto' => $rub_nombre_proyecto,
            'rub_observacion' => $rub_observacion
        );
        $this->db->where('rub_id', $rub_id);
        $this->db->update($this->tabla, $datos);
    }
}

?>
