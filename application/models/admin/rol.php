<?php

/*
 * Contiene los metodos para acceder a la tabla ROL que maneja
 * los roles del sistema asignado a los usuarios
 *
 * @author Ing. Karen Peñate
 */

class rol extends CI_Model {

    private $tabla = 'rol';

    public function obtenerRoles() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function insertarRol($rol_nombre, $rol_descripcion) {
        $datos = array(
            "rol_nombre" => $rol_nombre,
            "rol_descripcion" => $rol_descripcion
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function editarRol($rol_nombre, $rol_descripcion, $rol_id) {
        $datos = array(
            "rol_nombre" => $rol_nombre,
            "rol_descripcion" => $rol_descripcion
        );
        $this->db->where('rol_id', $rol_id);
        $this->db->update($this->tabla, $datos);
    }

    public function eliminarRol($rol_id) {

        $this->load->model('admin/rol_opcion_sistema', 'rolOpc');
        if ($this->rolOpc->obtenerCuantasOpcionesRoles($rol_id) == 0) {
            $this->db->where('rol_id', $rol_id);
            $this->db->delete($this->tabla);
            $mensaje = 1;
        } else
            $mensaje = 0;
        return $mensaje;
    }

}

?>
