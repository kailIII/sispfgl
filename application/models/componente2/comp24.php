<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Class comp24 extends CI_Model{
    
    /**
     * Guarda los datos de 2.4-0-A
     */
    public function insert_solicitud_ayuda($municipio, $fecha_emision, $fecha_recepcion){
        $data_new = array(
            'mun_id'                    =>  $municipio,
            'sol_ayu_fecha_emision'     =>  $fecha_emision,
            'sol_ayu_fecha_recepcion'   =>  $fecha_recepcion
        );
        
        return $this->db->insert('solicitud_ayuda', $data_new);
    }
    
    /**
     * Funciones 2.4-F0-B
     */
    
    public function insert_acuerdo_municipal($municipio, $f_acuerdo, $f_recepcion, $f_conformacion, $miembros, 
            $observaciones){
        $data_new = array(
            'mun_id'                    =>  $municipio,
            'acu_mun_fecha_acuerdo'     =>  $f_acuerdo,
            'acu_mun_fecha_recepcion'   =>  $f_recepcion,
            'acu_mun_fecha_conformacion'=>  $f_conformacion,
            'acu_mun_miembros'          =>  $miembros,
            'acu_mun_observaciones'     =>  $observaciones 
        );
        
        return $this->db->insert('acuerdo_municipal2', $data_new);
    }

	
}    
    
?>
