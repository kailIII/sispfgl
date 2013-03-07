<?php

/*
 * Contiene los metodos para acceder a la tabla plan_contingencia
 *
 * @author Ing. Karen Peñate
 */

class Plan_contingencia extends CI_Model {

    private $tabla = 'plan_contingencia';

    public function obtenerPlanContingenciales($rev_inf_id,$tipo ) {
        $this->db->where('rev_inf_id ', $rev_inf_id );
        $this->db->where('pla_con_tipo ', $tipo );
        $this->db->order_by('pla_con_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function agregarPlanContingencial($pla_con_numero, $pla_con_nombre, $pla_con_descripcion, $rev_inf_id,$pla_con_fdocumento,$pla_con_tipo ) {
        $datos = array(
            'pla_con_numero' => $pla_con_numero,
            'pla_con_nombre' => $pla_con_nombre,
            'pla_con_descripcion' => $pla_con_descripcion,
            'pla_con_fdocumento'=>$pla_con_fdocumento,
            'pla_con_tipo'=>$pla_con_tipo,
            'rev_inf_id ' => $rev_inf_id 
        );
        $this->db->insert($this->tabla, $datos);
    }
    public function actualizarPlanContingencial($pla_con_id,$pla_con_numero, $pla_con_nombre, $pla_con_descripcion,$pla_con_fdocumento,$pla_con_tipo) {
        $datos = array(
            'pla_con_numero' => $pla_con_numero,
            'pla_con_nombre' => $pla_con_nombre,
            'pla_con_descripcion' => $pla_con_descripcion,
            'pla_con_fdocumento'=>$pla_con_fdocumento,
            'pla_con_tipo'=>$pla_con_tipo
        );
        $this->db->where('pla_con_id',$pla_con_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function eliminarPlanContingencial($pla_con_id) {
        $this->db->where('pla_con_id',$pla_con_id);
        $this->db->delete($this->tabla);
    }

}

?>
