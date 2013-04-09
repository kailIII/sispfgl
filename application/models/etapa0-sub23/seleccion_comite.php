<?php

/*
 * Contiene los metodos para acceder a la tabla seleccion_comite
 *
 * @author Ing. Karen Peñate
 */

class Seleccion_comite extends CI_Model {

    private $tabla = 'seleccion_comite';

    public function agregarSeleccionComite($sol_asis_id) {
        $datos = array(
            'sol_asis_id' => $sol_asis_id
        );

        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerId($sol_asis_id) {
        $this->db->where('sol_asis_id', $sol_asis_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function actualizarSeleccionComite($sel_com_id, $sel_com_seleccionado, $sel_com_fverificacion,$mun_id) {
        if (strcmp($sel_com_seleccionado, 'Si') == 0) {
            $num = $this->contarSeleccionados($mun_id);
            if ($num != 0)
                $sel_com_seleccionado = 'No';
        }
        $datos = array(
            'sel_com_seleccionado' => $sel_com_seleccionado,
            'sel_com_fverificacion' => $sel_com_fverificacion
        );
        $this->db->where('sol_asis_id', $sel_com_id);
        $this->db->update($this->tabla, $datos);
    }
    
      public function contarSeleccionados($mun_id) {
        $this->db->from($this->tabla);
        $this->db->join('solicitud_asistencia', 'solicitud_asistencia.sol_asis_id = seleccion_comite.sol_asis_id');
        $this->db->where('solicitud_asistencia.mun_id', $mun_id);
        $this->db->where('seleccion_comite.sel_com_seleccionado', 'Si');
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

}

?>
