<?php


Class matriz_indicadores_model extends CI_Model{

	public function insertar_poa_gr($new_poa_gr,$new_arch) {
		
		$data_dd = array(
          'id_mun' => $new_poa_gr['mun_id'],
          'anio_poa_gr' => $new_poa_gr['anio_gr'],
		  'doc_poa_gr' => $new_arch,
		  'estado_poa_gr' => $new_poa_gr['estado_gr']
        );
        
		
		$this->db->insert('segui_poa_gr', $data_dd); 
		//return $data_sec;
		//$this->db->where('id', $id);
		//$this->db->update('gestionperiodos', $data);
	}
	
	public function get_indicadores($comp) {
			$this->db->like('cod', $comp, 'after');
			$query = $this->db->get('matriz_indicadores');
			return $query->result();
	}
	
	public function actualizar_indicador($ind){
			$data = array(
                'cod' => $ind["cod"],
                'indicador' => $ind["indicador"],
                'linea_base' => $ind["lineabase"],
                'anio_1' => $ind["2011"],
                'anio_2' => $ind["2012"],
                'anio_3' => $ind["2013"],
                'anio_4' => $ind["2014"],
                'anio_5' => $ind["2015"],
                'total' => $ind["total"],
                'comentario' => $ind["comentario"]
            );

			$this->db->where('id', $ind["id"]);
			$this->db->update('matriz_indicadores', $data); 
	}

}

?>
