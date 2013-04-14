<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Class componente24a_model extends CI_Model{

public function get_capacitaciones() {
        $query = $this->db->get('componente24a');
        return $query->result();
    }
    
}
?>
