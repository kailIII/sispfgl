<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Class componente24a_model extends CI_Model{

	public function get_capacitaciones() {
			$query = $this->db->get('componente24a_cap');
			return $query->result();
		}
	
	public function get_asistencias() {
			$query = $this->db->get('componente24a_atm');
			return $query->result();
		}
	
		
	public function get_mun_nombre($id_mun){
			$this->db->where('mun_id', $id_mun);
			$query = $this->db->get('municipio');
			$row = $query->row();
			return $row->mun_nombre;
		}
	
	public function get_area_nombre($id_area){
			$this->db->where('id_area_accion', $id_area);
			$query = $this->db->get('area_accion');
			$row = $query->row();
			return $row->nombre_area_accion;
		}
		
	public function insertar_comp24a_cap($mun_id, $fecha_cap, $tema_cap, $total_mujeres, $total_hombres, $fecha_instalacion, $fecha_operacion, $observaciones) {
		
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
        
        $this->db->insert('componente24a_cap', $data_new); 
        
        
	}
	
	public function insertar_comp24a_atm($mun_id, $fecha_atm, $id_area_accion, $tipo_entidad_asesora, $nombre_entidad_asesora, $monto) {
		
		$data_new = array(
		  'mun_id' => $mun_id,
          'fecha_atm' => $fecha_atm,
          'id_area_accion' => $id_area_accion,
		  'tipo_entidad_asesora' => $tipo_entidad_asesora,
		  'nombre_entidad_asesora' => $nombre_entidad_asesora,
		  'monto' => $monto
        );
        
        $this->db->insert('componente24a_atm', $data_new); 
        
        
	}
}    
    
?>
