<?php

/*
 * Contiene los metodos para acceder a la tabla OPCION_SISTEMA
 *
 * @author Ing. Karen Peñate
 */
class Opcion_sistema extends CI_Model {

    private $tabla = 'opcion_sistema';
    
    public function obtenerOpciones() {
        $this->db->order_by('opc_sis_orden','asc');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function insertarOpcSis($opc_sis_nombre, $opc_sis_url,$opc_opc_sis_id,$opc_sis_orden ) {
        $datos = array(
            "opc_sis_nombre" => $opc_sis_nombre,
            "opc_sis_url" => $opc_sis_url,
            "opc_opc_sis_id"=>$opc_opc_sis_id,
            "opc_sis_orden "=>$opc_sis_orden 
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function editarOpcSis($opc_sis_nombre, $opc_sis_url,$opc_opc_sis_id,$opc_sis_orden, $opc_sis_id) {
        $datos = array(
            "opc_sis_nombre" => $opc_sis_nombre,
            "opc_sis_url" => $opc_sis_url,
            "opc_opc_sis_id"=>$opc_opc_sis_id,
            "opc_sis_orden "=>$opc_sis_orden 
        );
        $this->db->where('opc_sis_id', $opc_sis_id);
        $this->db->update($this->tabla, $datos);
    }

    public function eliminarOpcSis($opc_sis_id) {
        $this->load->model('admin/rol_opcion_sistema', 'OpcSisOpc');
        if ($this->OpcSisOpc->cuantasOpcionesAsignadas($opc_sis_id) == 0) {
            $this->db->where('opc_sis_id', $opc_sis_id);
            $this->db->delete($this->tabla);
            $mensaje = 1;
        } else
            $mensaje = 0;
        return $mensaje;
    }
}

?>
