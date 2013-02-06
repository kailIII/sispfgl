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
		
	public function get_mun_nombre($id_mun){
			$this->db->where('mun_id', $id_mun);
			$query = $this->db->get('municipio');
			$row = $query->row();
			return $row->mun_nombre;
		}
		
	public function insertar_comp24a($mun_id, $fecha_cap, $tema_cap, $total_mujeres, $total_hombres, $fecha_instalacion, $fecha_operacion, $observaciones) {
		
		$data_new = array(
		  'mun_id' => $mun_id,
          'fecha_cap' => $fecha_cap,
          'tema_cap' => $tema_cap,
		  'total_mujeres' => $total_mujeres,
		  'total_hombres' => $total_hombres,
		  'fecha_instalacion' => $fecha_instalacion,
		  'fecha_operacion' => $fecha_operacion,
		  'observaciones' => $observaciones
        );
        
        $this->db->insert('componente24a', $data_new); 
        
        
	}
}    
    
?>
