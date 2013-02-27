<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Class componente26_model extends CI_Model{

	public function get_capacitaciones() {
			$query = $this->db->get('componente26_cap');
			return $query->result();
		}
	
	public function get_consultorias() {
			$query = $this->db->get('componente26_con');
			return $query->result();
		}
	
	public function get_equi() {
			$query = $this->db->get('componente26_equi');
			return $query->result();
		}
		
	public function get_mun_nombre($id_mun){
			$this->db->where('mun_id', $id_mun);
			$query = $this->db->get('municipio');
			$row = $query->row();
			return $row->mun_nombre;
		}
		
	public function insertar_comp26_cap($nombre_cap, $fecha_cap, $nomb_capacitador, $total_mujeres, $total_hombres, $monto_cap, $entidad) {
		
		$data_new = array(
		  'nombre_cap' => $nombre_cap,
          'fecha_cap' => $fecha_cap,
          'nombre_capacitador' => $nomb_capacitador,
		  'total_hombres' => $total_hombres,
		  'total_mujeres' => $total_mujeres,
		  'monto_cap' => $monto_cap,
		  'entidad' => $entidad
        );
        
        $this->db->insert('componente26_cap', $data_new); 
        
        
	}
	
	public function insertar_comp26_con($nombre_con, $fecha_con, $nomb_consultor, $monto_con, $entidad) {
		
		$data_new = array(
		  'nombre_con' => $nombre_con,
          'fecha_con' => $fecha_con,
          'nombre_consultor' => $nomb_consultor,
		  'monto_con' => $monto_con,
		  'entidad' => $entidad
        );
        
        $this->db->insert('componente26_con', $data_new); 
        
        
	}
	
	public function insertar_comp26_equi($desc_equi, $fecha_equi, $monto_equi, $entidad) {
		
		$data_new = array(
		  'desc_equi' => $desc_equi,
          'fecha_equi' => $fecha_equi,
          'monto_equi' => $monto_equi,
		  'entidad' => $entidad
        );
        
        $this->db->insert('componente26_equi', $data_new); 
        
        
	}
	
	
		
}    
    
?>
