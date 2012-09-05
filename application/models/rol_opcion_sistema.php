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
        $this->db->where('rol_opcion_sistema.rol_id',$rol);
        $query = $this->db->get();
        return $query;
    }
    
    function obtenerOpcionN1($rol){
        $this->db->select('opcion_sistema.opc_sis_id opc_sis_id, 
                           opcion_sistema.opc_sis_url opc_sis_url,
                           opcion_sistema.opc_sis_nombre opc_sis_nombre');
        $this->db->from('rol_opcion_sistema');
        $this->db->join('opcion_sistema', 'rol_opcion_sistema.opc_sis_id = opcion_sistema.opc_sis_id');
        $this->db->where('rol_opcion_sistema.rol_id',$rol);
        $this->db->where('opcion_sistema.opc_opc_sis_id IS NULL');
        $query = $this->db->get();
        return $query;
    }
    
    function obtenerOpcionesOtrosNiveles($rol,$idPadre){
        $this->db->select('opcion_sistema.opc_sis_id opc_sis_id, 
                           opcion_sistema.opc_sis_url opc_sis_url,
                           opcion_sistema.opc_sis_nombre opc_sis_nombre');
        $this->db->from('rol_opcion_sistema');
        $this->db->join('opcion_sistema', 'rol_opcion_sistema.opc_sis_id = opcion_sistema.opc_sis_id');
        $this->db->where('rol_opcion_sistema.rol_id',$rol);
        $this->db->where('opcion_sistema.opc_opc_sis_id',$idPadre);
        $query = $this->db->get();
        return $query;
    }

}

?>
