<?php

/*
 * Contiene los metodos para acceder a la tabla solicitud_asistencia
 *
 * @author Ing. Karen Peñate
 */

class Solicitud_asistencia extends CI_Model {

    private $tabla = 'solicitud_asistencia';

    public function agregarSolictudAsistencia($mun_id) {
        $datos = array(
            'mun_id' => $mun_id
        );

        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarSolictudAsistencia($sol_asis_id, $c1, $c2, $fecha_solicitud, $nombre_solicitante, $cargo, $telefono, $comentarios, $sol_asis_ruta_archivo) {
        $datos = array('nombre_solicitante' => $nombre_solicitante,
            'cargo' => $cargo,
            'telefono' => $telefono,
            'sol_asis_ruta_archivo' => $sol_asis_ruta_archivo,
            'c1' => $c1,
            'c2' => $c2,
            'fecha_solicitud' => $fecha_solicitud,
            'comentarios' => $comentarios
        );
        $this->db->where('sol_asis_id', $sol_asis_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerSolicitudes() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerSolicitudesPorMuni($mun_id) {
        $this->db->where('mun_id', $mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerSolicitudPorId($id_solicitud) {
        $this->db->where('sol_asis_id', $id_solicitud);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function eliminarSolicitud($sol_asis_id) {
        $this->db->where('sol_asis_id', $sol_asis_id);
        $this->db->delete($this->tabla);
    }

    public function obtenerId($mun_id) {
        $this->db->select_max('sol_asis_id');
        $this->db->where('mun_id', $mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

}

?>
