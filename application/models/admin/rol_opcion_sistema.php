<?php

/*
 * Contiene los metodos para acceder a la tabla ROL_OPCION_SISTEMA
 *
 * @author Ing. Karen Peñate
 */

class rol_opcion_sistema extends CI_Model {

    private $tabla = 'rol_opcion_sistema';

    function obtenerOpcionesRoles($rol) {
        $this->db->select('opcion_sistema.opc_sis_id, 
                           opcion_sistema.opc_sis_nombre, 
                           opcion_sistema.opc_sis_url, 
                           opcion_sistema.opc_opc_sis_id');
        $this->db->from('rol_opcion_sistema');
        $this->db->join('opcion_sistema', 'rol_opcion_sistema.opc_sis_id = opcion_sistema.opc_sis_id');
        $this->db->where('rol_opcion_sistema.rol_id', $rol);
        $query = $this->db->get();
        return $query;
    }

    function obtenerOpcionN1($rol) {
        $this->db->select('opcion_sistema.opc_sis_id opc_sis_id, 
                           opcion_sistema.opc_sis_url opc_sis_url,
                           opcion_sistema.opc_sis_nombre opc_sis_nombre');
        $this->db->from('rol_opcion_sistema');
        $this->db->join('opcion_sistema', 'rol_opcion_sistema.opc_sis_id = opcion_sistema.opc_sis_id');
        $this->db->where('rol_opcion_sistema.rol_id', $rol);
        $this->db->where('opcion_sistema.opc_opc_sis_id IS NULL');
        $this->db->order_by('opcion_sistema.opc_sis_orden', 'asc');
        $query = $this->db->get();
        return $query;
    }

    function obtenerOpcionesOtrosNiveles($rol, $idPadre) {
        $this->db->select('opcion_sistema.opc_sis_id opc_sis_id, 
                           opcion_sistema.opc_sis_url opc_sis_url,
                           opcion_sistema.opc_sis_nombre opc_sis_nombre');
        $this->db->from('rol_opcion_sistema');
        $this->db->join('opcion_sistema', 'rol_opcion_sistema.opc_sis_id = opcion_sistema.opc_sis_id');
        $this->db->where('rol_opcion_sistema.rol_id', $rol);
        $this->db->where('opcion_sistema.opc_opc_sis_id', $idPadre);
        $this->db->order_by('opcion_sistema.opc_sis_orden', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function obtenerCuantasOpcionesRoles($rol) {
        $this->db->from('rol_opcion_sistema');
        $this->db->join('opcion_sistema', 'rol_opcion_sistema.opc_sis_id = opcion_sistema.opc_sis_id');
        $this->db->where('rol_opcion_sistema.rol_id', $rol);
        $query = $this->db->count_all_results();
        return $query;
    }

    public function obtenerOpcionesNoAsignadas($rol) {
        $consulta = "SELECT opcion_sistema.opc_sis_id, 
                      opcion_sistema.opc_sis_nombre, 
                      opcion_sistema.opc_opc_sis_id
                    FROM opcion_sistema
                    WHERE opc_sis_id NOT IN (SELECT opc_sis_id
                                             FROM rol_opcion_sistema
                                             WHERE rol_id = ?)";
        $query = $this->db->query($consulta, array($rol));
        return $query->result();
    }

    public function insertarRolOpcion($rol_id, $opc_id) {
        $datos = array(
            "rol_id" => $rol_id,
            "opc_sis_id" => $opc_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function eliminarRolOpcion($rol_id, $opc_id) {
        $datos = array(
            "rol_id" => $rol_id,
            "opc_sis_id" => $opc_id
        );
        $this->db->where($datos);       
        $this->db->delete($this->tabla);
    }
    
    public function cuantasOpcionesAsignadas($opc_sis_id) {
        $this->db->from($this->tabla);
        $this->db->where('opc_sis_id',$opc_sis_id);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

}

?>
