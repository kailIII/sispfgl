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
	
	public function cap_por_depto(){
		$query = $this->db->query("select D.dep_nombre as depto, count(Mun.comp_id) cant
									from (select dep_id, C.mun_id, comp_id
										from componente24a_cap C, municipio M 
										where C.mun_id=M.mun_id) as Mun
									right outer join departamento D 
										on (Mun.dep_id=D.dep_id)
									group by D.dep_nombre
									order by D.dep_nombre;");
		return $query->result();
	}
	
	public function atm_por_depto(){
		$query = $this->db->query("select D.dep_nombre as depto, count(Mun.comp_id) cant
									from (select dep_id, C.mun_id, comp_id
										from componente24a_atm C, municipio M 
										where C.mun_id=M.mun_id) as Mun
									right outer join departamento D 
										on (Mun.dep_id=D.dep_id)
									group by D.dep_nombre
									order by D.dep_nombre;");
		return $query->result();
	}
	
	public function cap_por_region(){
		$query = $this->db->query("select R.reg_nombre reg,sum(cant) suma
									from (select D.dep_nombre as depto, D.reg_id regid, count(Mun.comp_id) cant
										from (select dep_id, C.mun_id, comp_id
											from componente24a_cap C, municipio M 
											where C.mun_id=M.mun_id) as Mun
										right outer join departamento D 
										on (Mun.dep_id=D.dep_id)
										group by D.dep_nombre,D.reg_id
										order by D.dep_nombre) as ccdepto
									right outer join region R
									on (ccdepto.regid=R.reg_id)
									group by R.reg_nombre
									order by R.reg_nombre;");
		return $query->result();
	}
	
	public function atm_por_region(){
		$query = $this->db->query("select R.reg_nombre reg,sum(cant) suma
									from (select D.dep_nombre as depto, D.reg_id regid, count(Mun.comp_id) cant
										from (select dep_id, C.mun_id, comp_id
											from componente24a_atm C, municipio M 
											where C.mun_id=M.mun_id) as Mun
										right outer join departamento D 
										on (Mun.dep_id=D.dep_id)
										group by D.dep_nombre,D.reg_id
										order by D.dep_nombre) as ccdepto
									right outer join region R
									on (ccdepto.regid=R.reg_id)
									group by R.reg_nombre
									order by R.reg_nombre;");
		return $query->result();
	}
	
	public function total_m_cap(){
		$query = $this->db->query("select sum(total_mujeres) as total
									from componente24a_cap;");
		return $query->row();
	}
	
	public function total_h_cap(){
		$query = $this->db->query("select sum(total_hombres) as total
									from componente24a_cap;");
		return $query->row();
	}
	
	public function prom_m_por_cap(){
		$tcc=$this->total_cap()->total;
		$tm=$this->total_m_cap()->total;
		if($tcc==0)
			return 0;
		else return ($tm/$tcc);
	}
	
	public function prom_h_por_cap(){
		$tcc=$this->total_cap()->total;
		$th=$this->total_h_cap()->total;
		if($tcc==0)
			return 0;
		else return ($th/$tcc);
	}
	
	public function total_cap(){
		$query = $this->db->query("select count(*) as total
									from componente24a_cap;");
		return $query->row();
	}
	
	public function total_atm(){
		$query = $this->db->query("select count(*) as total
									from componente24a_atm;");
		return $query->row();
	}
	
	public function total_ong(){
		$query = $this->db->query("select count(*) as total
									from componente24a_atm
									where tipo_entidad_asesora='ONG';");
		return $query->row();
	}
	
	public function total_fc(){
		$query = $this->db->query("select count(*) as total
									from componente24a_atm
									where tipo_entidad_asesora='Firma Consultora';");
		return $query->row();
	}
	
	public function total_ci(){
		$query = $this->db->query("select count(*) as total
									from componente24a_atm
									where tipo_entidad_asesora='Consultor Individual';");
		return $query->row();
	}
	
	public function total_otro(){
		$query = $this->db->query("select count(*) as total
									from componente24a_atm
									where tipo_entidad_asesora='Otro';");
		return $query->row();
	}
	
	public function total_por_area_accion(){
		$query = $this->db->query("select nombre_area_accion as nombre, count(comp_id) as cant
									from componente24a_atm C inner join area_accion A
									on C.id_area_accion=A.id_area_accion
									group by nombre_area_accion;");
		return $query->result();
	}
	
}    
    
?>
