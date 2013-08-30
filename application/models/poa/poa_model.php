<?php


Class poa_model extends CI_Model{

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
	
	public function insertar_poa_rf($new_poa_rf,$new_arch) {
		
		$data_dd = array(
          'id_mun' => $new_poa_rf['mun_id'],
          'anio_poa_rf' => $new_poa_rf['anio_rf'],
		  'doc_poa_rf' => $new_arch,
		  'estado_poa_rf' => $new_poa_rf['estado_rf']
        );
        
		
		$this->db->insert('segui_poa_rf', $data_dd); 
		//return $data_sec;
		//$this->db->where('id', $id);
		//$this->db->update('gestionperiodos', $data);
	}
	
	public function get_docs_gr() {
			$query = $this->db->get('segui_poa_gr');
			return $query->result();
		}
		
	public function get_docs_rf() {
			$query = $this->db->get('segui_poa_rf');
			return $query->result();
		}
	
	public function get_mun_nombre($id_mun){
			$this->db->where('mun_id', $id_mun);
			$query = $this->db->get('municipio');
			$row = $query->row();
			return $row->mun_nombre;
		}
	
	public function actualizar_estado_poa_gr($gr){
			$data = array(
                'estado_poa_gr' => $gr["estado"]
            );

			$this->db->where('id_poa_gr', $gr["id"]);
			$this->db->update('segui_poa_gr', $data); 
	}
	
	public function actualizar_estado_poa_rf($rf){
			$data = array(
                'estado_poa_rf' => $rf["estado"]
            );

			$this->db->where('id_poa_rf', $rf["id"]);
			$this->db->update('segui_poa_rf', $data); 
	}

}

?>
