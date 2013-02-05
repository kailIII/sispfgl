<?php

/*
 * Contiene los metodos para acceder a la tabla solicitud_asistencia
 *
 * @author Ing. Karen Peñate
 */

class Solicitud_asistencia extends CI_Model {

    private $tabla = 'solicitud_asistencia';

    public function agregarSolictudAsistencia($c1, $c2, $mun_id, $fecha_solicitud, $nombre_solicitante, $cargo, $telefono, $comentarios, $sol_asi_ruta_archivo) {
        $datos = array('nombre_solicitante' => $nombre_solicitante,
            'cargo' => $cargo,
            'telefono' => $telefono,
            'sol_asi_ruta_archivo' => $sol_asi_ruta_archivo,
            'mun_id' => $mun_id,
            'c1' => $c1,
            'c2' => $c2,
            'fecha_solicitud' => $fecha_solicitud,
            'comentarios' => $comentarios
        );

        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarSolictudAsistencia($sol_asis_id, $c1, $c2, $mun_id, $fecha_solicitud, $nombre_solicitante, $cargo, $telefono, $comentarios, $sol_asi_ruta_archivo) {
        $datos = array('nombre_solicitante' => $nombre_solicitante,
            'cargo' => $cargo,
            'telefono' => $telefono,
            'sol_asi_ruta_archivo' => $sol_asi_ruta_archivo,
            'mun_id' => $mun_id,
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

    /*            */

    public function agregarAsociatividad($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerAsociatividades($pro_pep_id) {
        $this->db->select($this->tabla . '.*,
                           tipo.tip_nombre'
        );
        $this->db->from($this->tabla);
        $this->db->join('tipo', 'tipo.tip_id =' . $this->tabla . '.tip_id');
        $this->db->where($this->tabla . '.pro_pep_id', $pro_pep_id);
        $this->db->order_by('aso_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function obtenerAsociatividadId($aso_id) {
        $this->db->where('aso_id', $aso_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function obtenerId($pro_pep_id) {
        $this->db->select_max('aso_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function eliminaAsociatividad($aso_id) {
        $consulta = "DELETE FROM " . $this->tabla . " CASCADE WHERE aso_id=?";
        $this->db->query($consulta, array($aso_id));
    }

}

?>
