<?php

/*
 * Contiene los metodos para acceder a la tabla RECIBIDO_MUNICIPALIDAD
 *
 * @author Ing. Karen Peñate
 */

class Recibido_municipalidad extends CI_Model {

    private $tabla = 'recibido_municipalidad';

    public function obtenerRecibidoMunicipalidades($ela_pro_id) {
        $this->db->where('ela_pro_id', $ela_pro_id);
        $this->db->order_by('rec_mun_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function agregarRecibidoMunicipalidad($rec_mun_correlativo, $rec_mun_frecibido, $rec_mun_observacion, $ela_pro_id) {
        $datos = array(
            'rec_mun_correlativo' => $rec_mun_correlativo,
            'rec_mun_frecibido' => $rec_mun_frecibido,
            'rec_mun_observacion' => $rec_mun_observacion,
            'ela_pro_id' => $ela_pro_id
        );
        $this->db->insert($this->tabla, $datos);
    }
    public function actualizarRecibidoMunicipalidad($rec_mun_id,$rec_mun_correlativo, $rec_mun_frecibido, $rec_mun_observacion) {
        $datos = array(
            'rec_mun_correlativo' => $rec_mun_correlativo,
            'rec_mun_frecibido' => $rec_mun_frecibido,
            'rec_mun_observacion' => $rec_mun_observacion
        );
        $this->db->where('rec_mun_id',$rec_mun_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function eliminarRecibidoMunicipalidad($rec_mun_id) {
        $this->db->where('rec_mun_id',$rec_mun_id);
        $this->db->delete($this->tabla);
    }

}

?>
